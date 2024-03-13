<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
</head>
<body>
  <h1>Reset Password</h1>
  <form action="reset_password.php" method="post">
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>
    <label for="newPassword">New Password:</label><br>
    <input type="password" name="newPassword" id="newPassword" required><br><br>
    <button type="submit">Reset Password</button>
  </form>
  <?php
    // Include and initialize UserController
    require_once('../Controller/UserController.php');
    $userController = new UserController($dsn, $username, $password); // Replace with connection details

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $newPassword = $_POST['newPassword'];

      if ($userController->resetPassword($email, $newPassword)) {
        echo "Password reset successful!";
      } else {
        echo "Password reset failed!";
      }
    }
  ?>
</body>
</html
