<?php

class User {
  public ?int $id;
  public string $name;
  public int $age;
  public string $email;

  public function __construct(?int $id, string $name, int $age, string $email) {
    $this->id = $id;
    $this->name = $name;
    $this->age = $age;
    $this->email = $email;
  }
}
