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
              <li><a href="../controllers/userTournament_controller.php">Torneos</a></li>
              <li><a href="../controllers/incidents_controller.php">Incidencias</a></li>
              <li><a href="profile_controller.php" class="active">Mi cuenta</a></li>
              <li><a href="../views/logout_view.php">Cerrar sesion <img src="../img/profile-header.jpg" alt=""></a></li>
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
                <?php if(isset($mensajeOk)){ echo $mensajeOk; } ?>
                    <!-- ***** Booking form Start ***** -->
                    <div class="booking-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section text-center">
                                    <h4><em>Reserva</em> Tu Puesto <em>para el torneo</em></h4>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-7 col-sm-10">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                            <input type="hidden" id="date" name="date" value="<?php echo $date; ?>">
                                            <input type="hidden" id="gameName" name="gameName" value="<?php echo $gameName; ?>">
                                            <input type="hidden" id="name" name="name" value="<?php echo $name; ?>">
                                            <input type="hidden" id="id_user" name="id_user" value="<?php echo $_SESSION['id_user']; ?>">

                                            <div class="main-profile ">
                                                <div class="row">
                                                <div class="col-lg-12 align-self-center">
                                                    <ul>
                                                    <li>Nombre del torneo<span><?php echo $name; ?></span></li>
                                                    <li>Fecha <span><?php echo $date ?></span></li>
                                                    <li>Juego<span><?php echo $gameName; ?></span></li>
                                                    </ul>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="text-center div-btn">
                                                <button name="disponibilidad" type="submit" class="btn-disponible">Sitios disponibles para este torneo</button>
                                            </div>

                                                <!-- Imprimo puestos disponibles-->
                                                <?php if (empty($puestos) === false) { ?>
                                                    <div class="col-md-12">
                                                        <select name="seat" class=" mt-3">
                                                            <!--recorro el array  -->
                                                            <?php foreach ($puestos as $seat_id) : ?>
                                                                <?php echo "<option>" . $seat_id . "</option>"; ?>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                <?php } ?>
                                                <!-- fin  -->
                                                <div class="form-button mt-3 d-flex justify-content-center">
                                                    <a class="btn btn-primary rounded-pill me-3 px-3 py-3" href="userTournament_controller.php">Volver</a>
                                                    <button name="submit" type="submit" class="btn-form">Reservar</button>
                                                </div>
                                                <!-- Imprimo msj error-->
                                                <?php if (empty($errors) === false) { ?>
                                                    <?php echo "<ul>"; ?>
                                                    <?php foreach ($errors as $error) : ?>
                                                        <?php echo "<li class='text-danger'>" . $error . "</li>"; ?>
                                                    <?php endforeach; ?>
                                                    <?php echo "</ul>"; ?>
                                                <?php } ?>
                                                <!-- fin msj error -->
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Booking form end ***** -->

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