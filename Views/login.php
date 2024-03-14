<?php
    // error_reporting (E_PARSE);
    // Include and initialize UserController
    require_once('../Controller/UserController.php');

    $userController = new UserController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = $userController->login($email, $password);
// print_r($user);
// print_r($_SESSION['user_isAdmin']);
// die;
      if ($user) {
        // Login successful, handle user session or redirect
        if($_SESSION['user_isAdmin'] == 1) {
          header("Location: adminHome.php");
        } else {
          header("Location: home.php");
        }

      } else {

        header("Location: ../index.php?error=Incorrect username or password");
        exit; // Stop further execution
      }
    }
?>