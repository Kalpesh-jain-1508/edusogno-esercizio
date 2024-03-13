<?php
    error_reporting (E_PARSE);
    
    require_once('../config/database.php');
    require_once('../Controller/EventController.php');
    $eventController = new EventController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['nome'];
      $cognome = $_POST['eventdate'];
      $id=$_POST['id'];
     
     
     
          $user = $eventController->editEvent($id,$nome,$cognome);
          
          if ($user) {
              
              header("Location: ./adminHome.php");
              exit;
              
            } else {
                
                header("Location: ./eventEdit.php?error=Failed to update");
                exit; // Stop further execution
            }
        }      
    

?>
