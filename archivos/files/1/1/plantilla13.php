<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<!--<meta http-equiv="Content-Type" content="text/html; charset=big5">-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Status', 'Cantidad'],
          ['En tiempo',  <?php echo $a; ?>],
          ['En alerta',  <?php echo $b; ?>],
          ['Terminado', <?php echo $c; ?>],
        
        ]);

        var options = {
          title: 'Documentos de entrada',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>


<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 

<style type='text/css'>
{
    font-family: Arial;
    font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
    text-decoration: underline;
}
</style>

</head>


<body>
    

<!--<div class="container">-->
    
    <div class="row align-items-start">
        
        <div class="col-lg-4">
          <div><IMG src="../../imagenes/logo.jpg" width="160"></div>
          <a href='../../../Pages/vista_administrador_sistema.php'>Regresar al Menu Principal</a>
        </div>


        <div class="col-lg-4">
          <div id="piechart_3d" style="width: 500px; height: 350px;"></div>      
        </div>
        
    </div>

<!--</div>-->
  



<div style='height:35px;'></div>
    
<div> <?php echo $output; ?></div>


<!-- Beginning footer -->
<!--<div>Todos los derechos reservados</div>-->
<!-- End of Footer -->


</body>
</html>