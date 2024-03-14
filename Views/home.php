<?php 
 session_start();
 
    if (isset($_SESSION['user_id'])) {
        if (isset($_SESSION['user_isAdmin']) && $_SESSION['user_isAdmin'] == 1) {
            header("Location: ./adminHome.php");
            exit();
        }
    } else {
        // Redirect to login page
        header("Location: ../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
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
        <div class="dropdown">
            <button class="btn btn-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-bars"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./changePassword.php">Change Password</a></li>
                <li><a class="dropdown-item" href="./logout.php">Logout</a></li>
            </ul>
        </div>
    </header>

    <section class="account">
        <div class="form acc" style="top: 40%;">
            <h3>Ecco tutti gli eventi</h3>
            <div class="event-list">
                <?php
                    // Include and initialize EventController
                    require_once('../Controller/EventController.php');
                    $eventController = new EventController();

                    // Fetch events
                    $events = $eventController->getAllEvents();
                    // echo $events;
                    // Check if events are retrieved successfully
                    if ($events) {
                        // Display events
                        foreach ($events as $event) {
                            echo '<div class="event">';
                            echo '<h2>' . $event->nome_evento . '</h2>';
                            echo '<p>' . $event->data_evento . '</p>';
                            echo '<button>JOIN</button>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>No events found.</p>';
                    }
                ?>
            </div>
        </div>
    </section>

    <!-- <section class="account">
        <div class='form acc' style="top: 40%;">
            <h3>Ciao NOME ecco i tuoi eventi</h3>

            <div class="event-list">
                <div class="event">
                    <h2>Nome evento</h2>
                    <p>15-10-2022 15:00</p>
                    <button>JOIN</button>
                </div>

                <div class="event">
                    <h2>Nome evento</h2>
                    <p>15-10-2022 15:00</p>
                    <button>JOIN</button>
                </div>

                <div class="event">
                    <h2>Nome evento</h2>
                    <p>15-10-2022 15:00</p>
                    <button>JOIN</button>
                </div>
            </div>

        </div>
    </section> -->

</body>

</html>