<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<!-- Bootstrap 4 CSS CDN Link -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Bootstrap 4 JavaScript and jQuery CDN Link -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

</head>
<body>
<div class="container containernews">
    <h3><label for="id">Id: </label><span id="id" value="<?php echo $usuarios[0]['id']?>"> <?php echo $usuarios[0]['id']?></span></h3>
    <h3><label for="nombre" style="display:block;">Nombre</label></h3>
    <input type="text" id="nombre" name="nombre" value="<?php echo $usuarios[0]['nombre']?>" required>
    <h3><label for="apellidos" style="display:block;">Apellidos</label></h3>
    <input type="text" id="apellidos" name="apellidos" value="<?php echo $usuarios[0]['apellidos']?>" required>
    <h3><label for="mail" style="display:block;">Mail</label></h3>
    <input type="text" id="mail" name="mail" value="<?php echo $usuarios[0]['mail']?>" required>
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="permiso" <?php if ($usuarios[0]['permiso'] == 1):?> checked<?php endif;?>>
  <label class="form-check-label" for="flexCheckDefault">
    Permiso para ver noticias privadas
  </label>
</div>
<button class="btn btn-success confirmar">Confirmar</button>
</div>
<div
  class="modal fade"
  id="modalaceptar"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">Cambios realizados con éxito</div>
      <div class="modal-footer">
        <a class="btn btn-primary" href = "<?php echo base_url(); ?>/Cadmin/usuarios">Continuar</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
$('.confirmar').click(function(){
    const id = $('#id').attr('value');
    const nombre = $('#nombre').val();
    const apellidos = $('#apellidos').val();
    const mail = $('#mail').val();
    const permiso = $('#permiso').is(':checked');
    $.ajax({
        url:"<?= base_url('Cadmin/confirmarEdicionUsuario'); ?>",
        method:'post',
        data:{id, nombre, apellidos, mail, permiso},
        success:function(res){
            res = JSON.parse(res);
            console.log('ok');
            $('#modalaceptar').modal('show');
        }
    });
});
</script>