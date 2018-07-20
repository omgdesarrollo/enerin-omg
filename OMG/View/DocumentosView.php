<?php
session_start();

require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible"  content="overview &amp; stats"  />
		<meta charset="utf-8" />
		<title>OMG APPS</title>

		<meta name="description" content="overview &amp; " />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
                <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
                
                <!--Para abrir alertas de aviso, success,warning, error-->       
                <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	
                <!--Inicia para el spiner cargando-->
                <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
                <!--Termina para el spiner cargando-->
                
                <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
                <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>                
                <script src="../../js/jquery.js" type="text/javascript"></script>
                <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
<style>
        
.modal-body{
color:#888;
max-height: calc(100vh - 110px);
overflow-y: auto;
}                    

#sugerenciasclausulas {
width:350px;
height:5px;
overflow: auto;
}  
body{
overflow:hidden;     
}

.hideScrollBar{
width: 100%;
height: 100%;
overflow: auto;
margin-right: 14px;
padding-right: 28px; /*This would hide the scroll bar of the right. To be sure we hide the scrollbar on every browser, increase this value*/
padding-bottom: 15px; /*This would hide the scroll bar of the bottom if there is one*/
}
        
</style>   
                
                
                

</head>

<body class="no-skin" onload="loadSpinner()">
    <!--<div>Cargando...</div>-->
    <div id="loader"></div>
           
	
<?php		
    require_once 'EncabezadoUsuarioView.php';
?>
          
<div style="height: 5px"></div>             
             
<div style="position: fixed;">        
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
    Agregar-Documento
</button>

<button type="button" class="btn btn-info " id="btnrefrescar" onclick="refresh();" >
    <i class="glyphicon glyphicon-repeat"></i> 
</button>
    
<button type="button" onclick="window.location.href='../ExportarView/exportarDocumentosView/exportarDocumentosViewExcel.php'">
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>     
<button type="button" onclick="window.location.href='../ExportarView/exportarDocumentosView/exportarDocumentosViewWord.php'">
    <img src="../../images/base/word.png" width="30px" height="30px"> 
</button>
<button type="button" onclick="window.location.href='../ExportarView/'">
    <img src="../../images/base/pdf.png" width="30px" height="30px"> 
</button>

   <input type="text" id="idInputClaveDocumento" onkeyup="filterTableClaveDocumento()" placeholder="Clave del Documento" style="width: 150px">
   <input type="text" id="idInputNombreDocumento" onkeyup="filterTableNombreDocumento()" placeholder="Nombre del Documento" style="width: 160px">
   <input type="text" id="idInputResponsableDocumento" onkeyup="filterTableResponsableDocumento()" placeholder="Responsable del Documento" style="width: 190px">
   <?php
   //foreach ($filtrosArray as $value)
   { ?> 
<!--    <input id="<?php echo $value['id'] ?>" type="text" onkeyup="filtroSupremo()" 
    placeholder="<?php echo $value['name'] ?>" style="width: 120px;">  -->
   <?php } ?>
    
    <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>
</div>
	     
<div style="height: 40px"></div>
          

<table class="table table-bordered table-striped header_fijo" id="idTable">
    <thead >
    <tr class="">
     <!--<th class="table-headert" width="8%">No.</th>-->
     <th class="table-headert" width="24%">Clave del Documento</th>
     <th class="table-headert" width="24%">Nombre del Documento</th>
     <th class="table-headert" width="24%">Responsable del Documento</th>
     <!--<th class="table-headert" width="24%">Opcion</th>-->
    </tr>
   </thead>

   <tbody class="hideScrollBar"  id="datosGenerales" style="position: absolute">
   </tbody>

</table>

        
                
                <!-- Inicio de Seccion Modal Nuevo Documento-->
       <div class="modal draggable fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nuevo Documento</h4>
		      </div>

		      <div class="modal-body">
		      	
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Clave del Documento:</label>
                                                        <textarea  id="CLAVE_DOCUMENTO" class="form-control" data-error="Ingrese la Clave del Documento" required></textarea>
							<div class="help-block with-errors"></div>
                                                        <div id="msgerrorclave" ></div>
						</div>
                                    
                                                <div class="form-group">
                                                   
							<label class="control-label" for="title">Documento:</label>
                                                        <textarea  id="DOCUMENTO" class="form-control " data-error="Ingrese el Documento" required></textarea>
							<div class="help-block with-errors"></div>
						</div>
                                    
                                    
                                    
                                                <div class="form-group">
							<label class="control-label" for="title">Responsable del Documento:</label>
                                                        
                                                        <select   id="ID_EMPLEADOMODAL" class="select1">
                                                                
                                                                <?php
                                                                $cbxEmp = Session::getSesion("listarEmpleadosComboBox");
                                                                foreach ($cbxEmp as $value) {
                                                                ?>
                                                                
                                                                <option value="<?php echo "".$value["id_empleado"] ?>"  ><?php echo "".$value["nombre_empleado"]." ".$value["apellido_paterno"]." ".$value["apellido_materno"]; ?></option>
                                                                
                                                                <?php                                                                
                                                                }                                    
                                                                ?>
                                                        </select>
                                                        
							<div class="help-block with-errors"></div>
						</div>
                                                                                                                                    
						<div class="form-group">
                                                    <button type="submit" id="btn_guardar"  class="btn crud-submit btn-info">Guardar</button>
                                                    <button type="submit" id="btn_limpiar"  class="btn crud-submit btn-info">Limpiar</button>
						</div>


		      </div>
		    </div>

		  </div>
		</div>
       <!--Final de Seccion Modal-->

                
                
<script>

      var id_clausula,si_hay_cambio=false;
//              dataListado = [];
     
//      filtros = '<?php echo json_encode($filtrosArray) ?>';

</script>

                <script src="../../js/fDocumentosView.js" type="text/javascript"></script>

               <!--Inicia para el spiner cargando-->
               <script src="../../js/loaderanimation.js" type="text/javascript"></script>
               <!--Termina para el spiner cargando--> 

               <!--Bootstrap-->
               <script src="../../assets/probando/js/bootstrap.min.js"></script>
               
               <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
               
               <!--Para abrir alertas del encabezado-->
               <script src="../../assets/probando/js/ace-elements.min.js"></script>
               <script src="../../assets/probando/js/ace.min.js"></script>
     
	</body>
        
        
        
</html>
