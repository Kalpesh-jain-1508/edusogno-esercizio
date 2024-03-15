<?php
    error_reporting (E_PARSE);

    session_start();
    
    require_once('../config/database.php');
    require_once('../Controller/EventController.php');
    $eventController = new EventController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $nome = $_POST['nome'];
      $cognome = $_POST['eventdate'];
      $attendees = $_POST['attendees'];
      $id=$_POST['id'];

          $user = $eventController->editEvent($id,$nome,$cognome, $attendees);
          
          if ($user) {

            header("Location: ./adminHome.php");

            $mailsender = explode(',', $attendees);

                foreach ($mailsender as $user_mail) {

                    $to = 'kalpesh.v2web@gmail.com';
                    $subject = 'New Event Created';
                    $message = 'Hello!' . "\n" . 'events Updates. Please visit our website to see the events';
                    $headers = 'From: '.$user_mail."\r\n".
                    'Reply-To: '.$user_mail."\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                    // Send the email
                    if (@mail($to, $subject, $message, $headers)) {
                    echo "Email sent successfully.";
                    } else {
                    echo "Failed to send email.";
                    }
        
                }
    
                exit;
            }              
            else {
                
                header("Location: ./eventEdit.php?error=Failed to update");
                exit; // Stop further execution
            }
    }

?>
