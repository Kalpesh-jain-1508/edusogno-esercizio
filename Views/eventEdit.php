<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Registration</title>
  <link rel="stylesheet" href="../assets/styles/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"
        integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="../assets/js/script.js"></script>
</head>
<body>

  <header>
        <div class="logo">
            <a href="../index.php">
                <img src="../assets/img/Group181.png" alt="logo" width="100%">
            </a>
        </div>
    </header>


    <section class="account">
        <div class="form">
          <h3>Aggiorna evento</h3>
            <div class="formData">
              <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
                }
              ?>
              <p id="error-message" class="error"></p>

              <form action="./edit.php" onsubmit="return validateForm()" name="UpdateEventForm" method="post">
             
                    <?php  
                        require_once('../Controller/EventController.php');
                        $eventController = new EventController();

                        // Fetch events
                        $events = $eventController->getEvents($_GET['id']);
                        
                    // Check if events are retrieved successfully
                    ?>
                        <div class="input-group">
                            <label for="">Nome Evento</label>
                            <input type="hidden" name="id" value="<?php echo $events->id ?>">
                            <input type="text" placeholder="Mario" name="nome" value="<?php echo $events->nome_evento; ?>">
                        </div>
                        
                        <div class="input-group">
                            <label for="">Attendees</label>
                            <input type="textarea" placeholder="example@gmail.com, example2@gmail" name="attendees" value="<?php echo $events->attendees; ?>">
                        </div>
            
                        <div class="input-group">
                            <label for="">Inserisci il cognome</label>
                            <input type="date" id="eventDateInput" name="eventdate">
                        </div>

                
                        <div>
                            <button class="form-btn">Update</button>
                        </div>

              </form>
            </div>
        </div>
    </section>

    <script>
      
      function validateForm() {
          var nome = document.forms["UpdateEventForm"]["nome"].value;
          var cognome = document.forms["UpdateEventForm"]["eventdate"].value;
          var attendees = document.forms["UpdateEventForm"]["attendees"].value;

          var errorMessage = document.getElementById("error-message");

          if (nome.trim() === "" || cognome.trim() === "" || attendees.trim() === "") {
              errorMessage.textContent = "Tutti i campi sono obbligatori!";
              return false;
          }
          return true;
      }
   
    // Get the formatted date from PHP and convert it to the format accepted by the date input field (YYYY-MM-DD)
    var formattedDate = '<?php echo date('Y-m-d', strtotime($events->data_evento)); ?>';

    // Set the value of the date input field
    document.getElementById('eventDateInput').value = formattedDate;
</script>
  
</body>
</html>

