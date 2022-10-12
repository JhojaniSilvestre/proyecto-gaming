<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/register_style.css">
  <title>Formulario Registro</title>
</head>
<body>
  <section class="form-register">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST"></form>
        <h4>Formulario Registro</h4>
        <input class="controls" type="text" name="name" id="name" placeholder="Ingrese su Nombre de Usuario">
        <input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo">
        <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña">
        <label><input type="checkbox" id="morning_turn" value="morning"> Turno Mañana</label><br>
        <input type="checkbox" id="evening-turn" value="evening"><label> Turno Tarde</label>
        <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
        <input class="botons" type="submit" value="Registrar">
        <p><a href="../index.php">¿Ya tengo Cuenta?</a></p>
    </form>   
  </section>

</body>
</html>