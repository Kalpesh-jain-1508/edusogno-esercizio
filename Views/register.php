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
          <h3>Crea il tuo account</h3>
            <div class="formData">
              <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
                    }
                ?>
              <p id="error-message" class="error"></p>

              <form action="./registration.php" onsubmit="return validateForm()" name="registrationForm" method="post">

                <div class="input-group">
                    <label for="">Inserisci il nome</label>
                    <input type="hidden" name="isAdmin" value="0">
                    <input type="text" placeholder="Mario" name="nome">
                </div>

                <div class="input-group">
                    <label for="">Inserisci il cognome</label>
                    <input type="text" placeholder="Rossi" name="cognome">
                </div>

                <div class="input-group">
                    <label for="">Inserisci l’email</label>
                    <input type="email" placeholder="name@example.com" name="email">
                </div>

                <div class="input-group">
                    <label for="">Inserisci la password</label>
                    <div class="input-pass">
                        <input type="password" placeholder="Scrivila qui" name="password" id="password">
                        <i class="fa-solid fa-eye" onclick="showPass()"></i>
                    </div>
                </div>

                <div>
                    <button class="form-btn">REGISTRATI</button>
                </div>

              </form>              
              <div class="copy-right">
                  <a href="../index.php">Hai già un account? <span>Accedi</span></a>
              </div>
            </div>
        </div>
    </section>

    <script>
      
      function validateForm() {
          var nome = document.forms["registrationForm"]["nome"].value;
          var cognome = document.forms["registrationForm"]["cognome"].value;
          var email = document.forms["registrationForm"]["email"].value;
          var password = document.forms["registrationForm"]["password"].value;

          var errorMessage = document.getElementById("error-message");

          if (nome.trim() === "" || cognome.trim() === "" || email.trim() === "" || password.trim() === "") {
              errorMessage.textContent = "Tutti i campi sono obbligatori!";
              return false;
          }
          return true;
      }
  </script>
</body>
</html>

