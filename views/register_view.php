<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/register_style.css">
  
  <script src="../js/registerOK.js" type="text/javascript"> </script>
  <title>Formulario Registro</title>
</head>

<body>
  <section class="form-register">
    <form action="../controllers/register_controller.php" method="POST">
      <h4>Formulario Registro</h4>
      <input class="controls" type="text" name="name" id="name" placeholder="Ingrese su Nombre de Usuario" required>
      <input class="controls" type="email" name="email" id="email" placeholder="Ingrese su Correo" required>
      <!--Imprime mensaje de error-->
      <?php if (isset($email_err)) { ?>
        <p class="error"><?php echo $email_err; ?></p>
      <?php } ?>
      <input class="controls" type="password" name="password" id="password" placeholder="Ingrese su Contraseña" required>
      <!--Imprime mensaje de error-->
      <?php if (isset($error_clave)) { ?>
        <p class="error"><?php echo $error_clave; ?></p>
      <?php } ?></br/>
      <select id="unittype" name="shift" required>
        <option value="" selected> --Escoge su turno--</option>
        <option value="m"> Mañana</option>
        <option value="t"> Tarde </option>
      </select>
      <p>Estoy de acuerdo con <a href="https://www.script.legal/TerminosYCondiciones">Terminos y Condiciones</a></p>
      <input class="botons" type="submit" name="submit" value="Registrar" onclick="return registerOK()">
      <p><a href="../index.php">¿Ya tengo Cuenta?</a></p>
    </form>
  </section>

</body>

</html>