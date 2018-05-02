<?php
session_start();
require_once '../util/Session.php';
$error=Session::eliminarSesion("error");
$usuario=Session::eliminarSesion("usuario");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0 minimum-scale=1.0">
	<!--<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>-->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/inputable.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/loaderanimation.js" type="text/javascript"></script>
    <script src="../../js/inputable.js" type="text/javascript"></script>

      <script>
        function editableTable(){
//            document.getElementById('editable1').contentEditable = true; 
//            document.getElementById('editable2').contentEditable = true; 
//            document.getElementById('editable3').contentEditable = true; 
//            document.getElementById('editable4').contentEditable = true; 
//            document.getElementById('editable5').contentEditable = true;  
            
        }
    </script>
</head>

<body onload="myFunction();">
 <div id="loader"></div>
 <div style="display:none;" id="myDiv" class="animate-bottom">
<div class="container">
  
  	<div class="row justify-content-between" >
      <div class="col-4">
      <h1>Requisitos</h1>
      </div>
      <div class="col-4"><a href="#"> <button type="button" class="btn btn-primary">Nuevo</button> </a></div>
  	</div>
<input type="text" id="myInput" onkeyup="filtroTable()" placeholder="Busca por Clave de requisito" title="Type in a name">

  	<div class="row">
      	<div class="col">         
        	<table class="table table-info table-striped table-sm table-hover table-bordered table-responsive-lg" id="myTable">
        		<thead class="thead-primary text-dark">
        			<th>ID</th>
        			<th id="editable1">CLAVE DEL REQUISITO</th>
        			<th id="editable2">REQUISITO</th>
              <th><center>OPCIONES</center></th>
              
        		</thead>

			<?php 

        $Lista = Session::getSesion("listarRequisitos");

        foreach ($Lista as $filas) {  
        ?>
				<tr  class='table-success text-dark'>
	       			<td><?php echo $filas['ID_REQUISITO']; ?></td>
	       			<td><?php echo $filas['CLAVE_REQUISITO']; ?></td>
	       			<td><?php echo $filas['REQUISITO']; ?></td>

             <td><button type="button" class="btn btn-warning" onclick="editableTable();">Modificar</button>
                  <a href="#"> <button type="button" class="btn btn-danger">Eliminar</button></a>
              </td>                	
        </tr> 
                            
                            <?php    
                                }

                             ?>

			</table>
	
		</div>
  	</div>  
</div>
 </div>

</body>
</html>