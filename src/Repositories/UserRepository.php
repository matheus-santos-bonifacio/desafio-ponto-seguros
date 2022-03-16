<?php

require __DIR__ . '/../Entities/User.php';

class UserRepository {
  private ?PDO $connection;
  private array $statements = [];

  public function __construct() {
    $db = new DB();
    $this->connection = $db->openConnection();
  }

  public function listUsers(): array {
    $users = $this->connection->query("SELECT id, name, age, email FROM users")->fetchAll(PDO::FETCH_CLASS);

    return $users;
  }

  public function createUser(User $user): void {
    array_push($this->statements, [
      'statement' => $this->connection->prepare("INSERT INTO users (name, age, email) VALUES (:name, :age, :email);"),
      'params' => ['name' => $user->name, 'age' => $user->age, 'email' => $user->email]
    ]);
  }

  public function updateUser(User $user): void {
    array_push($this->statements, [
      'statement' => $this->connection->prepare("UPDATE users SET name = :name, age = :age, email = :email WHERE id = :id;"),
      'params' => ['name' => $user->name, 'age' => $user->age, 'email' => $user->email, 'id' => $user->id]
    ]);
  }

  public function deleteUser(int $id): void {
    array_push($this->statements, [
      'statement' => $this->connection->prepare("DELETE FROM users WHERE id = :id;"),
      'params' => ['id' => $id]
    ]);
  }

  public function commit() {
    array_map(function($array) {
      $array['statement']->execute($array['params']);
    }, $this->statements);

    $this->connection = null;
  }
}
