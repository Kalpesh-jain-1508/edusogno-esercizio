<?php
    error_reporting (E_PARSE);
    
    require_once('../config/database.php');
    require_once('../Controller/EventController.php');
    $eventController = new EventController();

     
          $user = $eventController->deleteEvent($_GET['id']);
          
          if ($user) {
              
              header("Location: ./adminHome.php");
              exit;
              
            } else {
                
                header("Location: ./adminHome.php?error=Delete Failed");
                exit; // Stop further execution
            }
         
    

?>
