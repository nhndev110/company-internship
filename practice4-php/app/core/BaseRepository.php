<?php

namespace app\core;

use app\helpers\DBHelper;
use PDO;
use PDOStatement;

class BaseRepository
{
  public static function query(string $sql, IRowMapper $rowMapper, ...$params)
  {
    $conn = DBHelper::getInstance()->getConnection();
    $stmt = $conn->prepare($sql);
    self::bindParams($stmt, $params);
    $stmt->execute();
    $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rowMapper->mapRow($rs);
  }

  private static function bindParams(PDOStatement $stmt, array $params)
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
