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
      return true;
    } else {
      return false;
    }
  }

  // User Login
  public function login($email, $password) {
    $stmt = $this->db->prepare("
      SELECT * FROM utenti WHERE email = ?");
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      return new User($user['id'], $user['nome'], $user['cognome'], $user['email'], $user['password'], $user['isAdmin']); // Return a User object
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
}

?>