<?php

namespace app\helpers;

use PDO;

class DBHelper
{
  private string $db_connection;
  private string $db_host;
  private string $db_port;
  private string $db_database;
  private string $db_username;
  private string $db_password;
  private array $db_option;

  private $conn;
  private static DBHelper $instance;

  private function __construct()
  {
    $this->db_connection = $_ENV['DB_CONNECTION'];
    $this->db_host = $_ENV['DB_HOST'];
    $this->db_port = $_ENV['DB_PORT'];
    $this->db_database = $_ENV['DB_DATABASE'];
    $this->db_username = $_ENV['DB_USERNAME'];
    $this->db_password = $_ENV['DB_PASSWORD'];

    $this->db_option = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];

    $this->conn = new PDO("{$this->db_connection}:host={$this->db_host};dbname={$this->db_database};", $this->db_username, $this->db_password, $this->db_option);
  }

  public static function getInstance(): DBHelper
  {
    if (!isset(self::$instance)) {
      self::$instance = new DBHelper();
    }

    return self::$instance;
  }

  public function getConnection()
  {
    return $this->conn;
  }
}
