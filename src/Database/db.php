<?php

class DB {
  private string $db;
  private string $host;
  private string $dbName;
  private string $user;
  private string $password;

  private ?PDO $connection;

  public function __construct() {
    $this->db = getenv('DATABASE');
    $this->host = getenv('DATABASE_HOST');
    $this->dbName = getenv('MYSQL_DATABASE');
    $this->user = getenv('MYSQL_USER');
    $this->password = getenv('MYSQL_PASSWORD');
  }

  public function openConnection() {
    $this->connection = new PDO("$this->db:host=$this->host;dbname=$this->dbName", $this->user, $this->password);
    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $this->connection;
  }

  public function closeConnection() {
    $this->connection = null;
  }
}
