  <?php
    error_reporting (E_PARSE);
    // Include and initialize UserController
    require_once('../Controller/UserController.php');
    $userController = new UserController(); // Replace with connection details

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $email = $_POST['email'];

            $to = 'kalpesh.v2web@gmail.com';
            $subject = 'Reset Password';
            $message = 'Hello! Please click on the following link to reset your password: http://localhost/projects/php/Views/rtPassword.php?email=' . $email;
            $headers = 'From: '.$email."\r\n".
            'Reply-To: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion();

            // Send the email
            if (@mail($to, $subject, $message, $headers)) {
              echo "Email sent successfully.";
            } else {
              echo "Failed to send email.";
            }
    }
  ?>

