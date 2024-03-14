  <?php
    error_reporting (E_PARSE);
    // Include and initialize UserController
    require_once('../Controller/UserController.php');
    $userController = new UserController(); // Replace with connection details

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];
      // Send email notification
      $to = $email;
      $subject = 'Reset Password';
      $message = 'Hello! Please click on the following link to reset your password: https://phpstack-277837-4393675.cloudwaysapps.com/Views/rtPassword.php?email=' . $email;
      $headers = 'From: kalpesh.v2web@gmail.com' . "\r\n" .
          'Reply-To: kalpesh.v2web@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      // Send the email
      if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
        header("Location: ../index.php");
        exit;
      } else {
        return false;
        exit;
        echo "Failed to send email.";
      }
    }
  ?>

