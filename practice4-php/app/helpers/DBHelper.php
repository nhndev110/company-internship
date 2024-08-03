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

    $this->conn = new PDO("{$this->db_connection}:host={$this->db_host};dbname={$this->db_database}", $this->db_username, $this->db_password);
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
