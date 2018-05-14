<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">

 
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
 
<style type='text/css'>
body
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
<center><h1>Control de Tareas Version 1.0.0</h1></center>
<!--<center><h2>Informe Operativo</h2></center>-->
  <!-- not responsive yet -->
<!-- Beginning header -->

    <div>
	<div align="left"><IMG src="/OMG-TAREAS_NUEVAS/Pages/imagenes/logo.jpg" width="160"></div>
        <a href='/OMG-TAREAS_NUEVAS/Pages/vista_seguimiento.html'>Regresar al Menu Principal</a>
<!--        <br>
        <br>
        <br>
        
        <form action="empleado_administrador_sistema_guardar/add">
        <button class="btn btn-primary">Añadir Personal</button>
        </form>-->
        
    </div>
<!-- End of header-->
    <div style='height:35px;'></div>  
    <div>
<?php echo $output; ?>
 
    </div>
<!-- Beginning footer -->
<div>Todos los derechos reservados</div>
<!-- End of Footer -->
</body>
</html>