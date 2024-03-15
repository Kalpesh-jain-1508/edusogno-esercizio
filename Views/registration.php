<?php
    error_reporting (E_PARSE);
    
    require_once('../config/database.php');
    require_once('../Controller/UserController.php');


    $userController = new UserController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['nome'];
      $cognome = $_POST['cognome'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $isAdmin = $_POST['isAdmin'];
      
      $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

      $getEmail ="SELECT email FROM utenti WHERE email = '$email'";

      $result = $conn->query($getEmail);

    if ($result->num_rows > 0) {
      // echo "test1";
      // die;
      header("Location: ./register.php?error=Already Registered Email");
    } else {
      // echo "test2";
      //   die;
          $user = $userController->register($nome, $cognome, $email, $password, $isAdmin);
          
          if ($user) {

            header("Location: home.php");

            // Send email notification
            $to = 'kalpesh.v2web@gmail.com';
            $subject = 'Registration Successful';
            $message = 'Hello! Thank you for registering with us.';
            $headers = 'From: '.$email."\r\n".
            'Reply-To: '.$email."\r\n" .
            'X-Mailer: PHP/' . phpversion();

            // Send the email
            if (@mail($to, $subject, $message, $headers)) {
              echo "Email sent successfully.";
            } else {
              echo "Failed to send email.";
            }
            
            exit;
              
            } else {
                
                header("Location: ./register.php?error=Registration Failed");
                exit; // Stop further execution
            }
        }      
    }

?>
