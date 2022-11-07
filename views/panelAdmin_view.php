<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Panel Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">



    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
                    Bienvenido/a Admin <span class="text-info">Usuario</span>
                </a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
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

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="text-white fw-bold h3">Dashboard</h1>
                </div>

                <div class="row">
                    <div class="col-md-4 order-sm-2 order-md-1">
                        <div class="card">
                            <img src="../img/popular-07.jpg" class="card-img-top rounded p-4" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 order-sm-1 order-md-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-row justify-content-between m-3">
                                    <h4 class="card-title mb-1">Administrar</h4>
                                    <p class="text-muted mb-1">Acciones</p>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="preview-list">
                                            <div class="preview-item border-bottom d-flex justify-content-between m-3">
                                                <div class="preview-thumbnail pb-2">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-square fa-stack-2x"></i>
                                                        <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                    Victorias
                                                </div>
                                                <div class="preview-item-content">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <a src="#">Crear</a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="preview-item border-bottom d-flex justify-content-between m-3">
                                                <div class="preview-thumbnail pb-2">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-square fa-stack-2x"></i>
                                                        <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                    Victorias
                                                </div>
                                                <div class="preview-item-content">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <a src="#">Crear</a>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="preview-item border-bottom d-flex justify-content-between m-3">
                                                <div class="preview-thumbnail pb-2">
                                                    <span class="fa-stack fa-2x">
                                                        <i class="fa-solid fa-square fa-stack-2x"></i>
                                                        <i class="fa-solid fa-trophy fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                    Victorias
                                                </div>
                                                <div class="preview-item-content">
                                                    <button type="button" class="btn btn-outline-primary">
                                                        <a src="#">Crear</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="../css/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>