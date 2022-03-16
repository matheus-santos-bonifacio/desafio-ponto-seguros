<?php

class UserService {
  private UserRepository $user_repository;

  public function __construct()
  {
    $this->user_repository = new UserRepository();
  }

  public function verifyIfShowPage() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
  }

  public function showUsers() {
    echo home($this->user_repository->listUsers());
  }

  public function deleteUser() {
    if ($this->verifyIfShowPage()) {
      header('Location: /index.php');
    }

    $this->user_repository->deleteUser($_POST['id']);
    $this->user_repository->commit();
    header('Location: /index.php');
  }

  public function updateUser() {
    $token = hash("sha256", random_bytes(5));

    if ($this->verifyIfShowPage()) {
      echo userPage('update', $_GET['id'], $token);
      return;
    }

    if ($token != $_POST['_token'])
      header('Location: /index.php');

    $user = new User($_POST['id'], $_POST['name'], $_POST['age'], $_POST['email']);
    $this->user_repository->updateUser($user);
    $this->user_repository->commit();
    header('Location: /index.php');
  }
  
  public function createUser() {
    $token = hash("sha256", random_bytes(5));

    if ($this->verifyIfShowPage()) {
      echo userPage('create', null, $token);
      return;
    }

    if ($token != $_POST['_token'])
      header('Location: /index.php');

    $user = new User(null, $_POST['name'], $_POST['age'], $_POST['email']);
    $this->user_repository->createUser($user);
    $this->user_repository->commit();
    header('Location: /index.php');
  }
}
