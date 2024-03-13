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