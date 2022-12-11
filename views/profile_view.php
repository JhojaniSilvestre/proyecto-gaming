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
              <li><a href="../index.php">Cerrar sesion <img src="../img/apagado.png" alt=""></a></li>
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
          <!-- ** Perfil usuario info ** -->
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
                      <p>Aún no has participado en níngun torneo. ¿A qué estas esperando?. Pulsa
                        AQUÍ para ver cuando es el siguiente!!</p>
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
                      <li>Victorias <span><?php echo $winUser; ?></span></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ** Perfil usuario end ** -->

          <div class="row">
            <div class="col-lg-12">
              <!-- ** Tournament form Start ** -->
              <ul class="enlace mt-3">
                <li><a href="#misTorneos">Mis Torneos</a></li>
              </ul>

              <div class="tournament-area" id="misReservas">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="heading-section text-center text">
                      <h4><em>Mis</em> Reservas</h4>
                    </div>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                      <div class="table-responsive">
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
                                <!-- recorro los datos de cada fila-->
                                <?php foreach ($fila as $celda) : ?>
                                  <!--imprimo cada dato-->
                                  <?php echo "<td>" . $celda . "</td>"; ?>
                                <?php endforeach; ?>
                                <td>
                                  <a type="submit" class="btn btn-outline-success me-3" onclick="cancelarBookingOK(<?php echo $fila[0]; ?>)">Cancelar</a>
                                </td>
                                <?php echo "</tr>"; ?>
                              <?php endforeach; ?>
                            <?php } ?>

                            <!-- fin datos -->
                          </tbody>
                        </table>
                      </div>
                    </main>
                  </div>
                </div>
              </div>
              <!-- ** Tournament form Start ** -->
              <div class="tournament-area mt-5" id="misTorneos">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="heading-section text-center">
                      <h4><em>Mis</em> Torneos</h4>
                    </div>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                      <div class="table-responsive">
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
                                <!-- recorro los datos de cada fila-->
                                <?php foreach ($fila as $celda) : ?>
                                  <!--imprimo cada dato-->
                                  <?php echo "<td>" . $celda . "</td>"; ?>
                                <?php endforeach; ?>
                                <td>
                                  <a type="submit" class="btn btn-outline-success me-3" onclick="cancelarTournOK(<?php echo $fila[0]; ?>)">Cancelar</a>
                                </td>
                                <?php echo "</tr>"; ?>
                              <?php endforeach; ?>
                            <?php } ?>

                            <!-- fin datos -->
                          </tbody>
                        </table>
                      </div>
                    </main>
                  </div>
                </div>
              </div>
              <!-- ** Tournament form End ** -->

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
          <p>Copyright © 2022 Sala Gaming IES Leonardo Da
            Vinci.

            <br>Design: Eduardo Zafra Martín & Jhojani
            Silvestre
            Beltrán Distributed By <a href="https://www.ifpleonardo.com" target="_blank">IES Leonardo Da
              Vinci</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="../js/confirmacionOK.js" type="text/javascript"> </script>

  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <script src="../js/isotope.min.js"></script>
  <script src="../js/owl-carousel.js"></script>
  <script src="../js/custom.js"></script>
</body>

</html>