<?php

namespace app\core;

use app\helpers\DBHelper;
use Exception;
use PDO;
use PDOException;
use PDOStatement;

class BaseRepository
{
  protected static function queryAllRecords(string $sql, IRowMapper $rowMapper, ...$params): array
  {
    try {
      $conn = DBHelper::getInstance()->getConnection();
      $stmt = $conn->prepare($sql);
      self::bindParams($stmt, $params);
      $stmt->execute();
      $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $rowMapper->mapRow($rs);
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
  }

  protected static function queryOneRecord(string $sql, IRowMapper $rowMapper, ...$params)
  {
    $record = self::queryAllRecords($sql, $rowMapper, ...$params)[0];
    return empty($record) ? null : $record;
  }

  protected static function update(string $sql, ...$params): bool
  {
    try {
      $conn = DBHelper::getInstance()->getConnection();
      $stmt = $conn->prepare($sql);
      self::bindParams($stmt, $params);
      $stmt->execute($params);
      return true;
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    } catch (Exception $e) {
      throw new Exception($e->getMessage());
    }
    return false;
  }

  protected static function insert(string $sql, ...$params): int
  {
    try {
      $conn = DBHelper::getInstance()->getConnection();
      $stmt = $conn->prepare($sql);
      self::bindParams($stmt, $params);

      $stmt->execute($params);
      $lastInsertId = $conn->lastInsertId();

      return $lastInsertId;
    } catch (PDOException $e) {
      throw new Exception("Failed to execute SQL: " . $e->getMessage());
    } catch (Exception $e) {
      throw new Exception("Error in insert function: " . $e->getMessage());
    }
    return -1;
  }

  private static function bindParams(PDOStatement $stmt, array $params): void
  {
    $len = count($params);
    for ($i = 0; $i < $len; $i++) {
      if (gettype($params[$i]) === "integer") {
        $stmt->bindParam($i + 1, $params[$i], PDO::PARAM_INT);
      } else if (gettype($params[$i]) === "boolean") {
        $stmt->bindParam($i + 1, $params[$i], PDO::PARAM_BOOL);
      } else if (gettype($params[$i]) === "double" || gettype($params[$i]) === "string") {
        $stmt->bindParam($i + 1, $params[$i], PDO::PARAM_STR);
      } else if (gettype($params[$i]) === "NULL") {
        $stmt->bindParam($i + 1, $params[$i], PDO::PARAM_NULL);
      }
    }
  }
}
