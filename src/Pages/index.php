<?php

function home(array $users) {
  $rows = "";

  foreach ($users as $user) {
    $row = <<<ROW
    <form method='GET'>
      <tr>
        <th scope="row">$user->id</th>
        <td>$user->name</td>
        <td>$user->age</td>
        <td>$user->email</td>
        <input type='hidden' name='id' value='$user->id'>
        <input type='hidden' name='name' value='$user->name'>
        <input type='hidden' name='age' value='$user->age'>
        <input type='hidden' name='email' value='$user->email'>
        <td><button type='submit' formaction='/update.php' class="btn btn-dark">edit</button></td>
        <td><button type='submit' formaction='/delete.php' formmethod='POST' class="btn btn-dark">delete</button></td>
      </tr>
    </form>
    ROW;

    $rows .= $row;
  }

  $table = <<<TABLE
  <a href="/create.php" class="btn btn-dark">Register user</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Age</th>
        <th scope="col">Email</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
      $rows
    </tbody>
  </table>
  TABLE;

  return baseLayout('home', $table);
}
