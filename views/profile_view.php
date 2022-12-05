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


</head>

<body>

  <!-- ** Header Area Start ** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ** Logo Start ** -->
            <a href="welcome_controller.php" class="logo">
              <img src="../img/gamin-room-logo-purple.png" alt="">
            </a>
            <!-- ** Logo End ** -->
            <!-- ** Menu Start ** -->
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
            <!-- ** Menu End ** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ** Header Area End ** -->

  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ** Banner Start ** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4">
                    <img src="../img/profile.jpg" alt="" style="border-radius: 23px;">
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">
                      <span>Online</span>
                      <h4><?php echo $_SESSION['username']; ?></h4>
                      <p>Aún no has participado en níngun torneo. ¿A qué estas esperando?. Pulsa AQUÍ para ver cuando es el siguiente!!</p>
                      <div class="main-border-button">
                        <a href="../controllers/userTournament_controller.php">Torneos</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 align-self-center">
                    <ul>
                      <li>Usuario<span><?php echo $_SESSION['username']; ?></span></li>
                      <li>Email <span><?php echo $_SESSION['email']; ?></span></li>
                      <li>Contraseña<span><?php echo $_SESSION['clave']; ?></span></li>
                      <li>Victorias <span>0</span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="page-content">

                <!-- ** Tournament form Start ** -->
                <ul>
                  <li><a href="#misReservas">Mis Reservas</a></li>
                  <li><a href="#misTorneos">Mis Torneos</a></li>
                </ul>
                <div class="tournament-area" id="misReservas">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="heading-section text-center text">
                        <h4><em>Mis</em> Reservas</h4>
                      </div>
                      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                        <table class="table">
                          <thead>
                            <tr>
                              <th>ID Reserva</th>
                              <th>Fecha</th>
                              <th>Sitio</th>
                              <th>Responsable</th>
                              <th>Acción</th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- Imprimo datos tabla-->
                            <?php if (empty($misReservas) === false) { ?>
                              <?php foreach ($misReservas as $fila) : ?>
                                <?php echo "<tr>"; ?>
                                <td><?php echo $fila[0]; ?></td>
                                <td><?php echo $fila[1]; ?></td>
                                <td><?php echo $fila[2]; ?></td>
                                <?php if ($fila[3] == 0) { ?>
                                  <td>No</td>
                                <?php  } else { ?>
                                  <td>Si</td>
                                <?php  } ?>
                                <td>
                                  <a href="profile_controller.php?id_booking=<?php echo $fila[0]; ?>" class="btn btn-outline-success me-3">Cancelar</a>
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
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="page-content">

                        <!-- ** Tournament form Start ** -->

                        <div class="tournament-area" id="misTorneos">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="heading-section text-center">
                                <h4><em>Mis</em> Torneos</h4>
                              </div>
                              <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>ID Torneo</th>
                                      <th>Torneo</th>
                                      <th>Juego</th>
                                      <th>Fecha</th>
                                      <th>Sitio</th>
                                      <th>Responsable</th>
                                      <th>Acción</th>


                                    </tr>
                                  </thead>
                                  <tbody>
                                    <!-- Imprimo datos tabla-->
                                    <?php if (empty($misTorneos) === false) { ?>
                                      <?php foreach ($misTorneos as $fila) : ?>
                                        <?php echo "<tr>"; ?>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo $fila[2]; ?></td>
                                        <td><?php echo $fila[3]; ?></td>
                                        <td><?php echo $fila[4]; ?></td>
                                        <?php if ($fila[5] == 0) { ?>
                                          <td>No</td>
                                        <?php  } else { ?>
                                          <td>Si</td>
                                        <?php  } ?>

                                        <td>
                                          <a href="profile_controller.php?id_tournament=<?php echo $fila[0]; ?>" class="btn btn-outline-success me-3">Cancelar</a>
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