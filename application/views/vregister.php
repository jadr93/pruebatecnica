<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap 4 CSS CDN Link -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Bootstrap 4 JavaScript and jQuery CDN Link -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

</head>
<body>

<div class="wrapper fadeInDown">
      <?php if (isset($yaexiste)): ?>
      <div class="alert alert-danger" role="alert">
        Existe un usuario con esos datos
      </div>
      <?php endif ?>
  <div id="formContent">
    <form action="<?php echo base_url(); ?>Clogin/register" method="POST">
    <p></p>
      <input type="text" id="mail" class="fadeIn first" name="mail" placeholder="mail" required>
      <input type="text" id="password" style="-webkit-text-security: square;" class="fadeIn first" name="password" placeholder="password" required>
      <input type="text" id="nombre" class="fadeIn second" name="nombre" placeholder="nombre" required>
      <input type="text" id="apellidos" class="fadeIn second" name="apellidos" placeholder="apellidos" required>
      <div style="display:flex;justify-content:center"><?php echo $this->recaptcha->render(); ?></div>
      <input type="submit" class="fadeIn third" value="Regístrate">
    </form>

    <div id="formFooter">
      <a href="<?php echo base_url(); ?>Clogin">¿Ya tienes cuenta?</a>
    </div>

  </div>
</div>

</body>
</html>