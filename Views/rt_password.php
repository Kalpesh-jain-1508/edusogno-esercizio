  <?php
    error_reporting (E_PARSE);
    // Include and initialize UserController
    require_once('../Controller/UserController.php');
    $userController = new UserController(); // Replace with connection details

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

