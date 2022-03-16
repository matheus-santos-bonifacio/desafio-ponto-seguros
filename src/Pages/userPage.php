<?php

function userPage(string $operation, ?int $user_id, string $token) {
  $input_with_user_id = $user_id != null ? "<input type='hidden' name='id' value='$user_id'>" : null;

  $form = <<<FORM
  <form method='POST' action='$operation.php'>
    <input type='hidden' name='_token' value='$token'>
    $input_with_user_id
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" name="name" aria-describedby="Person name">
    </div>
    <div class="mb-3">
      <label for="age" class="form-label">Age</label>
      <input type="number" class="form-control" name="age">
    </div>
    <div class="mb-3">
      <label class="email"class="form-label">Email</label>
      <input type="email" class="form-control" name="email">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>	
  FORM;

	return baseLayout('register', $form);
}
