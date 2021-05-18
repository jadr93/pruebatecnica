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

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">

</head>
<div class="container containernews">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Editar</th>
                <th scope="col">Borrar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <th scope="row" id="id" value="<?php echo $usuario['id']?>"><?php echo $usuario['id']?></th>
                <td scope="row"><?php echo $usuario['nombre']?> <?php echo $usuario['apellidos']?></th>
                <td scope="row"><?php echo $usuario['mail']?></th>
                <td scope="row"><a class="btn btn-warning" href="<?php echo base_url(); ?>Cadmin/editarUsuario/<?php echo $usuario['id']?>">Editar</a></th>
                <td scope="row"><a class="btn btn-danger borrar">Borrar</a></th>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
        
        <a href="<?php echo base_url(); ?>Cadmin/crearUsuario/" class="btn btn-success">Crear</a>
        <a class="btn btn-warning" href="<?php echo base_url(); ?>Cadmin">Volver</a></th>
    </div>
</div>
<div
  class="modal fade"
  id="modalborrar"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">Usuario borrado con éxito</div>
      <div class="modal-footer">
        <a class="btn btn-primary" href = "<?php echo base_url(); ?>Cadmin/usuarios">Continuar</a>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<script>
$('.borrar').click(function(){
    const id = $(this).parent().siblings('#id').attr('value');
    console.log(id);
    $.ajax({
        url:"<?= base_url('Cadmin/borrarUsuario'); ?>",
        method:'post',
        data:{id},
        success:function(res){
            res = JSON.parse(res);
            console.log('ok');
            $('#modalborrar').modal('show');
        }
    });
});
</script>