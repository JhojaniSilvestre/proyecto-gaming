<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Gaming Room</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/owl.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../css/web_style.css">
    <link rel="stylesheet" href="../css/booking_style.css">

</head>

<body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="welcome_controller.php" class="logo">
                            <img src="../img/gamin-room-logo-purple.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->

                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="welcome_controller.php">Home</a></li>
                            <li><a href="../controllers/booking_controller.php">Reservas</a></li>
                            <li><a href="../controllers/userTournament_controller.php" class="active">Torneos</a></li>
                            <li><a href="incidents_controller.php">Incidencias</a></li>
                            <li><a href="profile_controller.php">Mi cuenta</a></li>
                            <li><a href="../views/logout_view.php">Cerrar sesion <img src="../img/apagado.png" alt=""></a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Tournament form Start ***** -->

                    <div class="tournament-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section text-center">
                                    <h4><em>Torneos</em> turno Mañana</h4>
                                </div>
                                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID Torneo</th>
                                                <th>Nombre</th>
                                                <th>Juego</th>
                                                <th>Fecha/Hora</th>
                                                <th>Responsable</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Imprimo datos tabla-->
                                            <?php if (empty($tournamentsMorning) === false) { ?>
                                                <?php foreach ($tournamentsMorning as $fila) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php foreach ($fila as $celda) : ?>
                                                        <!--imprimo los datos columna de la fila en la celda"-->
                                                        <?php echo "<td>" . $celda . "</td>"; ?>
                                                    <?php endforeach; ?>
                                                    <td>
                                                        <a href="inscription_controller.php?id=<?php echo $fila[0]; ?>" class="btn btn-outline-success me-3">Inscribirse</a>
                                                    </td>
                                                    <?php echo "</tr>"; ?>
                                                <?php endforeach; ?>
                                            <?php } ?>

                                            <!-- fin datos -->
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>

                </div>
                </main>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="page-content">
                                <div class="tournament-area">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="heading-section text-center">
                                                <h4><em>Torneos</em> turno Tarde</h4>
                                            </div>
                                            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>ID Torneo</th>
                                                            <th>Nombre</th>
                                                            <th>Juego</th>
                                                            <th>Fecha/Hora</th>
                                                            <th>Responsable</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Imprimo datos tabla-->
                                                        <?php if (empty($tournamentsEvening) === false) { ?>
                                                            <?php foreach ($tournamentsEvening as $fila) : ?>
                                                                <?php echo "<tr>"; ?>
                                                                <?php foreach ($fila as $celda) : ?>
                                                                    <!--imprimo los datos columna de la fila en la celda"-->
                                                                    <?php echo "<td>" . $celda . "</td>"; ?>
                                                                <?php endforeach; ?>
                                                                <?php echo "</tr>"; ?>
                                                            <?php endforeach; ?>
                                                        <?php } ?>
                                                        <!-- fin datos -->
                                                    </tbody>
                                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </main>


                            <footer>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>Copyright © 2022 Sala Gaming IES Leonardo Da Vinci.

                                                <br>Design: Eduardo Zafra Martín & Jhojani Silvestre Beltrán Distributed By <a href="https://www.ifpleonardo.com" target="_blank">IES Leonardo Da Vinci</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </footer>


                            <!-- Scripts -->
                            <!-- Bootstrap core JavaScript -->
                            <script src="../js/jquery.min.js"></script>
                            <script src="../js/bootstrap.min.js"></script>
                            <script src="../js/custom.js"></script>
</body>

</html>