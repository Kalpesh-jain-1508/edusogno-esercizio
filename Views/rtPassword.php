
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
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
          <h3>cambiare la password</h3>
            <div class="formData">

              <p id="error-message" class="error"></p>

              <form action="./rt_password.php" onsubmit="return validateForm()" name="resetpassword" method="post">
                        
                        <input type="hidden" name="id" value=<?php echo $_GET['email'] ?>>
                        <div class="input-group">
                            <label for="">nuova password</label>
                            <input type="text" placeholder="Mario" name="new_password">
                        </div>

                        <div class="input-group">
                            <label for="">Conferma password</label>
                            <input type="text" placeholder="Mario" name="confirm_password">
                        </div>
                                        
                        <div>
                            <button class="form-btn">Aggiorna password</button>
                        </div>

              </form>
            </div>
        </div>
    </section>

    <script>
      
      function validateForm() {
          var new_password = document.forms["resetpassword"]["new_password"].value;
          var confirm_password = document.forms["resetpassword"]["confirm_password"].value;

          var errorMessage = document.getElementById("error-message");

          if (new_password.trim() === "" || confirm_password.trim() === "") {
              errorMessage.textContent = "Tutti i campi sono obbligatori!";
              return false;
          }
          if (new_password !== confirm_password) {
            errorMessage.textContent = "conferma password non corrisponde!";
            return false;
          }
          return true;
      }
</script>
  
</body>
</html>

