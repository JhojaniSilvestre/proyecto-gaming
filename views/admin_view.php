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
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
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
                        <li class="nav-item  menu-items active">
                            <a class="nav-link" aria-current="page" href="#">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-gauge-simple-high fa-stack-1x fa-inverse"></i>
                                </span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="#">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-regular fa-user fa-stack-1x fa-inverse"></i>
                                </span>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="#">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-laptop fa-stack-1x fa-inverse"></i>
                                </span>
                                Torneos
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="#">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-gamepad fa-stack-1x fa-inverse"></i>
                                </span>
                                Juegos
                            </a>
                        </li>
                        <li class="nav-item menu-items">
                            <a class="nav-link" aria-current="page" href="#">
                                <span class="fa-stack fa-1x">
                                    <i class="fa-solid fa-circle fa-stack-2x"></i>
                                    <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                </span>
                                Victorias
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
                    <h1 class="text-white fw-bold h3">Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-md-4 order-2 order-md-1 mt-4 mt-md-0 d-flex align-items-stretch">
                        <div class="card">
                            <img src="../img/banner-bg.jpg" class="card-img-top rounded p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Panel Admin</h5>
                                <p class="card-text">En este panel podrás crear y gestionar todos los torneos, juegos, victorias y usuarios de la web.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 order-1 order-md-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between m-3">
                                    <h4 class="card-title mb-1">Administrar</h4>
                                    <p class="text-muted mb-1">Acciones Rápidas</p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-item d-flex justify-content-between m-3">
                                            <div class="preview-thumbnail pb-2">
                                                <span class="fa-stack fa-2x">
                                                    <i class="fa-solid fa-square fa-stack-2x text-primary"></i>
                                                    <i class="fa-solid fa-laptop fa-stack-1x fa-inverse"></i>
                                                </span>
                                                <span class="preview-text fs-5 fw-bold">Torneos</span>
                                            </div>
                                            <div class="preview-item-content d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a src="#">Crear</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="preview-item d-flex justify-content-between m-3">
                                            <div class="preview-thumbnail pb-2">
                                                <span class="fa-stack fa-2x">
                                                    <i class="fa-solid fa-square fa-stack-2x text-success"></i>
                                                    <i class="fa-solid fa-gamepad fa-stack-1x fa-inverse"></i>
                                                </span>
                                                <span class="preview-text fs-5 fw-bold">Juegos</span>
                                            </div>
                                            <div class="preview-item-content d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-success">
                                                    <a src="#">Añadir</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="preview-item d-flex justify-content-between m-3">
                                            <div class="preview-thumbnail pb-2">
                                                <span class="fa-stack fa-2x">
                                                    <i class="fa-solid fa-square fa-stack-2x text-danger"></i>
                                                    <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                                </span>
                                                <span class="preview-text fs-5 fw-bold">Victorias</span>
                                            </div>
                                            <div class="preview-item-content d-flex align-items-center">
                                                <button type="button" class="btn btn-outline-danger">
                                                    <a src="#">Añadir</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!----------------------------------------END MAIN SECTION ------------------------------------------>
        </div>
    </div>
<!---------------------------------- Scripts ---------------------------->
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>