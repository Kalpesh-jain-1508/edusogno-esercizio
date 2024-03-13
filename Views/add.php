<?php
    error_reporting (E_PARSE);
    
    require_once('../config/database.php');
    require_once('../Controller/EventController.php');
    $eventController = new EventController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['nome'];
      $cognome = $_POST['eventdate'];
      $attendees=$_POST['attendees'];
     
          $user = $eventController->addEvent($nome,$attendees, $cognome);
          
          if ($user) {
              
              header("Location: ./adminHome.php");
              exit;
              
            } else {
                
                header("Location: ./eventAdd.php?error=Failed to Add");
                exit; // Stop further execution
            }
        }      
    

?>
