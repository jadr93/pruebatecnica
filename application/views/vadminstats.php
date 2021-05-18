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

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.js"></script>

<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">


</head>
<div class="container containernews">
    <div style="text-align:center;margin:50px">
    <h1>Usuarios totales: <?php echo $usuarios['0']['count']?></h1>
    <h1>Noticias totales: <?php echo $noticias['0']['count']?></h1>
    </div>
    <table class="table" id="tablanoticias">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Visitas totales</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($noticiasvisitas as $noticia): ?>
            <tr class="noticia">
                <td scope="row" id="id" value="<?php echo $noticia['id']?>"><?php echo $noticia['id']?></th>
                <td scope="row" id="titulo"><?php echo $noticia['titulo']?></th>
                <td scope="row"><?php echo $noticia['fecha']?></th>
                <td scope="row" id="visitas"><?php echo $noticia['visitas']?></th>
            </tr>
        <?php endforeach; ?>

    </table>
    <canvas style="margin:0 auto" id="barChart" width="400" height="400"></canvas>
</div>
</body>
</html>

<script>
jQuery(document).ready(function() {
    var users = [];
<?php foreach ($noticiasvisitas as $noticia): ?>
    users.push('<?php echo $noticia['titulo']?>');
<?php endforeach; ?>
console.log(users);
var chartDiv = $("#barChart");
var myChart = new Chart(chartDiv, {
    type: 'pie',
    data: {
        labels: [<?php foreach ($noticiasvisitas as $noticia): ?>
                    '<?php echo $noticia['titulo']?>',
                <?php endforeach; ?>],
        datasets: [
        {
            data: [<?php foreach ($noticiasvisitas as $noticia): ?>
                    '<?php echo $noticia['visitas']?>',
                <?php endforeach; ?>],
            backgroundColor: [
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB",
            "#FF6384",
            "#4BC0C0",
            "#FFCE56",
            "#E7E9ED",
            "#36A2EB"
            ]
        }]
    },
    options: {
        title: {
            display: true,
            text: 'Gráfico de visitas'
        },
		responsive: false,
maintainAspectRatio: false,
    }
});
    });
</script>