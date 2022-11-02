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
                            <li><a href="welcome_controller.php" class="active">Home</a></li>
                            <li><a href="booking_view.php">Reservas</a></li>
                            <li><a href="tournament_view.php">Torneos</a></li>
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

                    <!-- ***** Booking form Start ***** -->
                    <div class="booking-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="heading-section text-center">
                                    <h4><em>Reserva</em> Tu Puesto</h4>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-6 col-sm-10">
                                        <div class="item-content">
                                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                                <div class="col-md-12">
                                                    <input type="text" name="name" placeholder="E-mail" required>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <input type="email" name="email" placeholder="E-mail Acompañante (Opcional)">
                                                </div>

                                                <div class="col-md-12">
                                                    <select class=" mt-3" required>
                                                            <option selected disabled value="">Puesto</option>
                                                            <!--recorro el array  -->
                                                            <?php foreach($seats as $seat_id) : ?>
                                                                    <?php echo "<option>".$seat_id."</option>"; ?>
                                                            <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <input type="date" name="fecha" required>
                                                </div>

                                                <div class="col-md-12 mt-3">
                                                    <label class="mb-3 mr-1" for="shift">Hora:</label>

                                                    <input type="radio" class="btn-check" name="shift" id="m" value="m" autocomplete="off" required>
                                                    <label class="btn btn-sm btn-outline-secondary" for="m">11:15 - 11:40</label>

                                                    <input type="radio" class="btn-check" name="shift" id="t" value="t" autocomplete="off" required>
                                                    <label class="btn btn-sm btn-outline-secondary" for="t">17:45 - 18:15</label>
                                                </div>

                                                <div class="form-button mt-3 d-flex justify-content-center">
                                                    <button id="submit" type="submit" class="btn-form">Reservar</button>
                                                </div>
                                            </form>
                                        </div>
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