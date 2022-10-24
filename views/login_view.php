<html>
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sala gaming | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_style.css">
</head>
      
<body class="body-login d-flex align-items-center">
        <div class="container">
        <h1 class="text-center login-title">Inicio de Sesión</h1>
            <!--Aplicacion-->
            <div class="card border-success mt-3 mb-3 mx-auto">
                <!--<div class="card-header">Login Usuario</div>-->
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="card-body ">
                        <div class="form-group mb-2">
                            <label for="email" class="login_txt mb-2">Email:</label><br>
                            <input type="email" name="email" placeholder="Email" class="form-control">
                            <!--Imprime mensaje de error-->
                            <?php if (isset($email_err)) {?>
                                <p class="error"><?php echo $email_err; ?></p><br>
                            <?php } ?>
                        </div>
                        <div class="form-group mb-2">
                            <label for="clave" class="login_txt mb-2">Contraseña:</label><br>
                            <input type="password" name="clave" placeholder="Contraseña" class="form-control">
                            <!--Imprime mensaje de error-->
                            <?php if (isset($clave_err)) {?>
                                <p class="error"><?php echo $clave_err; ?></p>
                            <?php } ?>
                        </div>				
                        <div class="form-group d-flex justify-content-center mt-3">
                            <input type="submit" name="submit" value="Iniciar Sesión" class="btn btn-dark btn-lg border-success">
                        </div>
                    </form>
                </div>
                <div class="card-footer mb-3">
                    <div class="d-flex justify-content-center links">
                        <a class="login_txt" href="controllers/register_controller.php">¿No tienes una Cuenta?</a>
                    </div>
			    </div>
            </div>
        </div>
    </div>
</body>
</html>