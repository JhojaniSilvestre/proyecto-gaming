<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sala gaming | User Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login_style.css">
</head>

<body class="body-login d-flex align-items-center">
    <div class="container">
        <div class="card border-primary mx-auto">
            <div class="card-body px-4 py-4">
                <h3 class="card-title text-center mb-3 text-white">Login Usuario</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="card-body ">
                    <div class="form-group mb-3">
                        <label for="email" class="text-white mb-2">Email:</label><br>
                        <input type="email" name="email" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="clave" class="text-white mb-2">Contraseña:</label><br>
                        <input type="password" name="clave" placeholder="Contraseña" class="form-control" required>
                    </div>
                    <div class="form-group d-flex justify-content-center mt-4">
                        <input type="submit" name="submit" value="Iniciar Sesión" class="btn btn-primary rounded-0">
                    </div>
                </form>
                <!-- Imprimo msj error-->
                <?php if (isset($loginErr)) { ?>
                    <?php echo "<ul>"; ?>
                    <?php echo "<li class='text-danger'>" . $loginErr . "</li>"; ?>
                    <?php echo "</ul>"; ?>
                <?php } ?>
                <!-- fin msj error -->
            </div>
            <div class="card-footer mb-3">
                <div class="d-flex justify-content-center links">
                    <a class="text-white text-decoration-none" href="./register_controller.php">¿No tienes una Cuenta?</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>