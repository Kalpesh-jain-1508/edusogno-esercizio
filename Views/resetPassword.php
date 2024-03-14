
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
          <h3>Resetta la password</h3>
            <div class="formData">
              <p id="error-message" class="error"></p>

              <form action="./reset_password.php" onsubmit="return validateForm()" name="resetpassword" method="post">
                        <div class="input-group">
                            <label for="">E-mail</label>
                            <input type="email" placeholder="name@example.com" name="email">
                        </div>
                                        
                        <div>
                            <button class="form-btn">Inviare una mail</button>
                        </div>
              </form>
            </div>
        </div>
    </section>

    <script>
      
      function validateForm() {
          var email = document.forms["resetpassword"]["email"].value;

          var errorMessage = document.getElementById("error-message");

          if (email.trim() === "") {
              errorMessage.textContent = "Tutti i campi sono obbligatori!";
              return false;
          }
          return true;
      }
</script>
  
</body>
</html>

