<?php

require('user_validator.php');

$errors = [];

if (isset($_POST['submit'])) {
  // validate entries
  $validation = new UserValidator($_POST);
  $errors = $validation->validateForm();

  // if errors is empty --> save data to db
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP OOP</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>

  <div class="new-user">
    <h2>Create a new user</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

      <label>Username: </label>
      <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') : ''; ?>">
      <div class="error">
        <?php echo $errors['username'] ?? ''; ?>
      </div>
      <label>Email: </label>
      <input type="text" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') : ''; ?>">
      <div class="error">
        <?php echo $errors['email'] ?? ''; ?>
      </div>
      <input type="submit" value="Submit" name="submit">

    </form>
  </div>

</body>

</html>