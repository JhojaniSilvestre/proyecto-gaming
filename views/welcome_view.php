<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Gaming Room</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../css/web_style.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                            <li><a href="welcome_controller.php" class="active">Home</a></li>
                            <li><a href="../controllers/booking_controller.php">Reservas</a></li>
                            <li><a href="../controllers/userTournament_controller.php">Torneos</a></li>
                            <li><a href="incidents_controller.php">Incidencias</a></li>
                            <li><a href="profile_controller.php">Mi cuenta</a></li>
                            <li><a href="../index.php">Cerrar sesion <img src="../img/apagado.png" alt=""></a></li>
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

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6>Bienvenido <?php echo $_SESSION['username']; ?> a la sala gaming</h6>
                                    <h4><em>Reserva</em> tu puesto aquí</h4>
                                    <div class="main-button">
                                        <a href="../controllers/booking_controller.php">Reserva YA</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->

                    <div class="row mt-5">
                        <div class="col-lg-8">
                            <div class="featured-games header-text">
                                <div class="heading-section text-center">
                                    <h4><em>Torneos</em> Actuales</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID Torneo</th>
                                                <th>Nombre</th>
                                                <th>Juego</th>
                                                <th>Fecha/Hora</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Imprimo datos tabla-->
                                            <?php if (empty($torneos) === false) { ?>
                                                <?php foreach ($torneos as $fila) : ?>
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
                                <div class="main-button text-center mt-4">
                                    <a href="userTournament_controller.php">Inscríbete</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="top-ranking">
                                <div class="heading-section text-center">
                                    <h4><em>Top</em> Jugadores</h4>
                                </div>
                                <?php if (empty($ranking) === false) { ?>
                                    <?php foreach ($ranking as  $clave => $fila) : ?>
                                        <?php echo "<ul>"; ?>
                                        <li>
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-6 d-flex align-items-center">
                                                    <span><?php echo $clave; ?></span>
                                                    <span class="fa-stack fa-1x">
                                                        <i class="fa-solid fa-circle fa-stack-2x"></i>
                                                        <i class="fa-solid fa-chess-queen fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                    <h6><i class="fa fa-check"></i><?php echo $fila[0]; ?></h6>
                                                </div>
                                                <div class="col-3">
                                                    <label class="wins"><?php echo $fila[1]; ?></label>
                                                </div>
                                            </div>
                                        </li>
                                        <?php echo "</ul>"; ?>
                                    <?php endforeach; ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

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

    <script src="../js/isotope.min.js"></script>
    <script src="../js/owl-carousel.js"></script>
    <script src="../js/custom.js"></script>


</body>

</html>