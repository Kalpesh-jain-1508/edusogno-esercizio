<?php

class User {

    public $id;
    public $nome;
    public $cognome;
    public $email;
    public $password;
    public $isAdmin;
  
    public function __construct($id, $nome, $cognome, $email, $password, $isAdmin) {
      $this->id = $id;
      $this->nome = $nome;
      $this->cognome = $cognome;
      $this->email = $email;
      $this->password = password_hash($password, PASSWORD_DEFAULT); // Hash password during construction
      $this->isAdmin = $isAdmin;
    }

    public function getId() {
        return $this->id;
      }
    
      public function getNome() {
        return $this->nome;
      }
    
      public function getCognome() {
        return $this->cognome;
      }
    
      public function getEmail() {
        return $this->email;
      }
    
      // public function getPassword() {
      //   return $this->password; // Not recommended to return password for security reasons
      // }

}

?>