<?php
    session_start();
   
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin'] == 1 ) {
            header("Location: ./Views/adminHome.php");
        } else {
            header("Location: ./Views/home.php");
        }
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Login</title>
  <link rel="stylesheet" href="./assets/styles/style.css">
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
        <script src="./assets/js/script.js"></script>
</head>
<body>
  <!-- <h1>Login</h1>
  <form action="<?php // echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="email">Email:</label><br>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" required><br><br>
    <button type="submit">Login</button>
  </form> -->

  <header>
        <div class="logo">
            <a href="../index.php">
                <img src="./assets/img/Group181.png" alt="logo" width="100%">
            </a>
        </div>
    </header>


    <section class="account">
        <div class="form" style="top: 48%;">
          <h3>Hai già un account?</h3>
          <div class="formData">
              <?php
                    if (isset($_GET['error'])) {
                        echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
                    }
                ?>

            <form action="./Views/login.php" method="post">

                <div class="input-group">
                    <label for="">Inserisci l’e-mail</label>
                    <input type="email" name="email" placeholder="name@example.com">
                </div>

                <div class="input-group">
                    <label for="">Inserisci la password</label>
                    <div class="input-pass">
                        <input type="password" name="password" placeholder="Scrivila qui" id="password">
                        <i class="fa-solid fa-eye" onclick="showPass(this)"></i>
                    </div>
                    <a href="./Views/resetPassword.php" class="reset_password">Resetta la password</a>
                </div>

                <div>
                    <button class="form-btn">ACCEDI</button>
                </div>
                
              </form>

              <div class="copy-right">
                  <a href="./Views/register.php">Non hai ancora un profilo? <span>Registrati</span></a>
              </div>
          </div>
        </div>
    </section>
  
</body>
</html>
