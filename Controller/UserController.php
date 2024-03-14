<?php

require_once('../Model/User.php'); // Include User Class

class UserController {

  private $db;

  public function __construct() {

    require_once('../config/database.php');

    try {
      $this->db = new PDO(
        'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME,
        DB_USER,
        DB_PASSWORD
      );
    } catch (PDOException $e) {
      echo "Error connecting to database: " . $e->getMessage();
      exit;
    }
  }

  // User Registration
  public function register($nome, $cognome, $email, $password) {
    session_start();
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $this->db->prepare("
      INSERT INTO utenti (nome, cognome, email, password)
      VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cognome);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $hashedPassword);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      // Store user information in session
      $_SESSION['user_nome'] = $nome;
      $_SESSION['user_cognome'] = $cognome;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_id'] = $this->db->lastInsertId();

      // Send email notification
      $to = $email;
      $subject = 'Registration Successful';
      $message = 'Hello ' . $nome . '! Thank you for registering with us.';
      $headers = 'From: kalpesh.v2web@gmail.com' . "\r\n" .
          'Reply-To: kalpesh.v2web@gmail.com' . "\r\n" .
          'X-Mailer: PHP/' . phpversion();

      // Send the email
      if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully.";
      } else {
          echo "Failed to send email.";
      }
      return true;
    } else {
      return false;
    }
  }

  // User Login
  public function login($email, $password) {
    session_start();

    // $to_email = "shreya.v2web@gmail.com";
    // $subject = "Simple Email Test via PHP";
    // $body = "Hi,nn This is test email send by PHP Script";
    // $headers = "From: sender\'s email";
    
    // if (mail($to_email, $subject, $body, $headers)) {
    //     echo "Email successfully sent to $to_email...";
    // } else {
    //     echo "Email sending failed...";
    // }
    // die;
    $stmt = $this->db->prepare("
      SELECT * FROM utenti WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_cognome'] = $user['cognome'];
        $_SESSION['user_isAdmin'] = $user['isAdmin'];

        // echo $_SESSION['user_id'];
        // die;
        return new User($user['id'], $user['nome'], $user['cognome'], $user['email'], $user['password'], $user['isAdmin']);
        // return true;
        exit();

    } else {
      return false;
    }
  }

  // Password Reset (basic implementation)
  public function resetPassword($email, $newPassword) {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $stmt = $this->db->prepare("
      UPDATE utenti SET password = ? WHERE email = ?");
    $stmt->bindParam(1, $hashedPassword);
    $stmt->bindParam(2, $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function verifyPassword($userId, $currentPassword) {
    
    $stmt = $this->db->prepare("
      SELECT password FROM utenti WHERE id = ?");
    $stmt->bindParam(1, $userId);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($currentPassword, $result['password'])) {
      // Passwords match
      return true;
      } else {
          // Passwords do not match
          return false;
      }
  
  }

  public function changePassword($userId, $currentPassword, $newPassword) {

    // Prepare and execute a query to fetch the user's current password hash from the database
    $stmt = $this->db->prepare("SELECT password FROM utenti WHERE id = ?");
    $stmt->bindParam(1, $userId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($currentPassword, $result['password'])) {
        // Hash the new password
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
        // echo $hashedNewPassword;
        // die;
        // Prepare and execute a query to update the user's password in the database
        $updateStmt = $this->db->prepare("UPDATE utenti SET password = ? WHERE id = ?");
        $updateStmt->bindParam(1, $hashedNewPassword);
        $updateStmt->bindParam(2, $userId);
        $updateStmt->execute();
        // Check if the password was successfully updated
        if ($updateStmt->rowCount() == 1) {
            // Password successfully changed
            return true;
        } else {
            // Failed to update password
            return false;
        }
    } else {
      echo "Current password does not match";
      die;
        // Current password does not match
        return false;
    }
}


}

?>