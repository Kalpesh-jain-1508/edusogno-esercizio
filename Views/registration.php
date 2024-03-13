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

    echo $getEmail;
    print_r($result);

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
              exit;
              
            } else {
                
                header("Location: ./register.php?error=Registration Failed");
                exit; // Stop further execution
            }
        }      
    }

?>
