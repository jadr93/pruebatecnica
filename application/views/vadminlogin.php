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
      <?php if (isset($loginerror)): ?>
      <div class="alert alert-danger" role="alert">
        Datos incorrectos
      </div>
      <?php endif ?>
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->

    <!-- Login Form -->
    <form action="<?php echo base_url(); ?>Cadmin/login" method="POST">
    <p></p>
      <input type="text" id="login" class="fadeIn first" name="login" placeholder="login" required>
      <input type="text" id="password" style="-webkit-text-security: square;" class="fadeIn second" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn third" value="Accede">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    </div>

  </div>
</div>

</body>
</html>