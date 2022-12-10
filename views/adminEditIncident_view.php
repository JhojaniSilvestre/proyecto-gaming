<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Panel Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilo customizado -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!--Trae el estilo del formulario-->
    <link href="../css/booking_style.css" rel="stylesheet">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./admin_controller.php">
            <img src="../img/gamin-room-logo-purple.png" alt="gaming room logo" class="img-logo-admin">
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="w-100"></div>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">
                    <span class="fa-1x me-1">
                        <i class="fa-solid fa-house-chimney-user"></i>
                    </span>
                    Bienvenido/a Admin <span class="text-info"><?php echo $_SESSION['username']; ?></span>
                </a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <!----------------------------------------START SIDEBAR ------------------------------------------>
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-5">
                    <ul class="nav flex-column">
                        <li class="nav-item  menu-items">
                            <a class="nav-link" aria-current="page" href="../controllers/admin_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-gauge-simple-high fa-stack-1x fa-inverse"></i>
                                </span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="adminUsers_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-regular fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item menu-items ">
                            <a class="nav-link" aria-current="page" href="adminTournament_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-laptop fa-stack-1x fa-inverse"></i>
                                </span>
                                Torneos
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="crud_games/games_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-gamepad fa-stack-1x fa-inverse"></i>
                                </span>
                                Juegos
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="adminWins_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                </span>
                                Victorias
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="adminBooking_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-circle-exclamation fa-stack-1x fa-inverse"></i>
                                </span>
                                Reservas
                            </a>
                        </li>
                        <li class="nav-item menu-items active">
                            <a class="nav-link" aria-current="page" href="adminIncidents_controller.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-circle-exclamation fa-stack-1x fa-inverse"></i>
                                </span>
                                Incidencias
                            </a>
                        </li>
                        <hr class="bg-danger border-2 border-top mx-2">
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="../index.php">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-right-from-bracket fa-stack-1x fa-inverse"></i>
                                </span>
                                Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!----------------------------------------START MAIN SECTION ------------------------------------------>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="text-white fw-bold h3">Editar Incidencia</h1>
                </div>
                <div class="row">
                    <div class="card col-lg-5 col-10 mx-auto">
                        <div class="card-body px-2 py-3 px-md-3 py-md-5">
                            <h3 class="card-title text-left mb-3">Editar información de la incidencia</h3>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                <div>
                                    <input type="text" name="title" id="title" value="<?php echo $title; ?>">
                                </div>
                                <div>
                                    <input type="date" name="date" id="date" value="<?php echo $date; ?>">
                                </div>
                                <div>
                                    <input type="text" name="description" id="description" value="<?php echo $description; ?>">
                                </div>
                                <div class="text-center mb-2">
                                    <a href="adminIncidents_controller.php" class="btn btn-secondary text-decoration-none text-white">Volver</a>
                                    <button type="submit" name="edit" class="ms-2 btn btn-success">Actualizar</button>
                                </div>
                                <!-- Imprimo msj error-->
                                <?php if (isset($errors)) { ?>
                                    <?php echo $errors; ?>
                                <?php } ?>
                                <!-- fin msj error -->
                            </form>
                        </div>
                    </div>
                </div>

            </main>
            <!----------------------------------------END MAIN SECTION ------------------------------------------>
        </div>
    </div>
    <!---------------------------------- Scripts ---------------------------->
    <script src="../../js/bootstrap.bundle.min.js"></script>

</body>

</html>