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
    <h3><label for="titulo">Id: </label><span id="id" value="<?php echo $noticias[0]['id']?>"> <?php echo $noticias[0]['id']?></span></h3>
    <h3><label for="titulo" style="display:block;">Título</label></h3>
    <input type="text" id="titulo" name="titulo" value="<?php echo $noticias[0]['titulo']?>" required>
    <h3><label for="titulo" style="display:block;margin-top:10px">Contenido</label></h3>
    <textarea rows="15" id="contenido" name="contenido" value="password" style="text-align:left" required><?php echo $noticias[0]['contenido']?></textarea>
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="privada" <?php if ($noticias[0]['privada'] == 1):?> checked<?php endif;?>>
  <label class="form-check-label" for="flexCheckDefault">
    Privada
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="publicada" <?php if ($noticias[0]['publicada'] == 1):?> checked<?php endif;?>>
  <label class="form-check-label" for="flexCheckChecked">
    Publicada
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
        <a class="btn btn-primary" href = "<?php echo base_url(); ?>/Cadmin/noticias">Continuar</a>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
$('.confirmar').click(function(){
    const id = $('#id').attr('value');
    const titulo = $('#titulo').val();
    const contenido = $('#contenido').val();
    const privada = $('#privada').is(':checked');
    const publicada = $('#publicada').is(':checked');
    console.log(privada);
    $.ajax({
        url:"<?= base_url('Cadmin/confirmarEdicion'); ?>",
        method:'post',
        data:{id, titulo, contenido, privada, publicada},
        success:function(res){
            res = JSON.parse(res);
            console.log('ok');
            $('#modalaceptar').modal('show');
        }
    });
});
</script>