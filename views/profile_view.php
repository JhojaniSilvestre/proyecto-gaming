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
                        <li><a href="booking_view.php">Reservas</a></li>
                        <li><a href="tournament_view.php">Torneos</a></li>
                        <li><a href="profile_controller.php">Mi cuenta</a></li>
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

          <!-- ***** Banner Start ***** -->
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
                      <p>Aún no te has inscrito en níngun torneo. ¿A qué estas esperando?. Incribete YA pulsando el siguiente enlace</p>
                      <div class="main-border-button">
                        <a href="#">Torneos</a>
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
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2022 Sala Gaming IES Leonardo Da Vinci. 
          
          <br>Design: Eduardo Zafra Martín & Jhojani Silvestre Beltrán Distributed By <a href="https://www.ifpleonardo.com" target="_blank" >IES Leonardo Da Vinci</a></p>
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
