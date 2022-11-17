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
                        <li><a href="tournament_view.php">Torneos</a></li>
                        <li><a href="profile_controller.php">Mi cuenta</a></li>
                        <li><a href="../index.php">Cerrar sesión <img src="../img/apagado.png" alt="cerrar sesión"></a></li>
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

          >
          <!-- ***** Profile Start ***** -->
          <div class="profile">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>A cerca de</em>    <?php echo $_SESSION['username']; ?></h4>
              </div>
              <div class="item">
                <ul>
                  <li><img src="../img/clip-02.jpg" alt="" class="clip-02"></li>
                  <li><h4>Usuario</h4><span><?php echo $_SESSION['username']; ?></span></li>
                  <li><h4>Email</h4><span><?php echo $_SESSION['email']; ?></span></li>
                  <li><h4>Victorias</h4><span>0</span></li>
                  <li><div class="online"><a href="#">Online</a></div></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="main-button">
                <a href="profile_controller.php">Mi cuenta</a>
              </div>
            </div>
          </div>
          <!-- ***** Gaming Library End ***** -->
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

  <script src="../js/isotope.min.js"></script>
  <script src="../js/owl-carousel.js"></script>
  <script src="../js/custom.js"></script>


  </body>

</html>
