<?php

require_once('../Model/Event.php'); // Include Event Class

class EventController {

  private $db; // Replace with your database connection object
  private $table = 'eventi';

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

  // Get all Events (Admin Only)
  public function getAllEvents() {
    $stmt = $this->db->prepare("SELECT * FROM eventi");
    $stmt->execute();
    $events = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events[] = new Event($row['id'], $row['nome_evento'], $row['attendees'], $row['data_evento']);
    }

    // echo json_encode($events);
    return $events;
  }
  public function getEvents($id) {
    $stmt = $this->db->prepare("SELECT * FROM eventi where id = $id");
    $stmt->execute();
    

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $events = new Event($row['id'], $row['nome_evento'], $row['attendees'], $row['data_evento']);
    }
    
    // echo json_encode($events);
    return $events;
  }

  // Add Event (Admin Only)
  public function addEvent($nome, $attendees, $cognome) {
    $stmt = $this->db->prepare("
      INSERT INTO eventi (nome_evento, attendees, data_evento) 
      VALUES (?, ?, ?)"); 
      $stmt->bindParam(1, $nome);
      $stmt->bindParam(2, $attendees);
      $stmt->bindParam(3, $cognome);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
        return true;
      } else {
          // No rows affected, maybe the record doesn't exist
          echo "No rows affected. Maybe the record doesn't exist.";
          return false;
      }
  }

  // Edit Event (Admin Only)
  public function editEvent($id, $nome, $cognome) {
    $stmt = $this->db->prepare("
        UPDATE eventi SET nome_evento = ?, data_evento = ? 
        WHERE id = ?");

    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $cognome);
    $stmt->bindParam(3, $id);
    // Bind parameters
    // $stmt->bind_param("si", $nome, $id);
    
    // Execute the statement
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Update successful
        return true;
    } else {
        // No rows affected, maybe the record doesn't exist
        echo "No rows affected. Maybe the record doesn't exist.";
        return false;
    }
}


  // Delete Event (Admin Only)
  public function deleteEvent($id) {
   
    $stmt = $this->db->prepare("
      DELETE FROM eventi WHERE id = ?");
      
      $stmt->bindParam(1, $id);      
      $stmt->execute();


    if ($stmt->rowCount() > 0) {
      // Update successful
      return true;
    } else {
        // No rows affected, maybe the record doesn't exist
        echo "No rows affected. Maybe the record doesn't exist.";
        return false;
    }
  }
}

?>