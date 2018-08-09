<?php
    session_start();
    require_once '../util/Session.php';
    
    $Usuario=  Session::getSesion("user");
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title></title>
    
    <!--Bootstrap y fontawesome-->
    <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome-animation.min.css" rel="stylesheet" type="text/css"/>
    
    <link async href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    
    <!-- text fonts -->
	<!--<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />-->
    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <!--<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />-->
    <link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
    
    <!--Inicia para el spiner cargando-->
    <link async href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <!--Termina para el spiner cargando-->
                  
    <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
    <link async href="../../css/modal.css" rel="stylesheet" type="text/css"/>
<!--    <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>-->

    <!--jquery-->
        <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
    <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>
    <!--<script src="../../js/jqueryblockUI.js" type="text/javascript"></script>-->
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/sweetalert2/6.4.1/sweetalert2.js"></script>
    <!--<script src="../../js/filtroSupremo.js" type="text/javascript"></script>-->

    <!--<script src="../../js/dhtmlxFunctions.js" type="text/javascript"></script>-->
    <!--<script src="../../js/formulario.js" type="text/javascript"></script>-->
    <script src="../../js/tools.js" type="text/javascript"></script>
    <style>
        .jsgrid-header-row>.jsgrid-header-cell
        {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
        }
            .modal-body{color:#888;max-height: calc(100vh - 110px);overflow-y: auto;}                    
            .modal-lg{width: 100%;}
            .modal {/*En caso de que quieras modificar el modal*/z-index: 1050 !important;}
            body{overflow:hidden;}
       
      
  
        fieldset {padding: 1px;}
		.readonly{ background: #F2F2F2 }
		td { margin: 2px; padding: 2px; }
		.inputhdr{font-weight: bold;padding-left: 5px;}

        </style>
</head>
<!-- <body> -->
<body class="no-skin" >
    <!--<div id="loader"></div>-->
    
    <?php
        require_once 'EncabezadoUsuarioView.php';
        if(isset($_REQUEST["accion"]))
            $accion = $_REQUEST["accion"];
        else
            $accion = -1;

        // $titulosTable = 
            // array("No.","Requisito","Registro","Frecuencia","Clave Documento",
            //     "Adjuntar Evidencia","Fecha de Registro","Usuario","Acción Correctiva","Plan de Acción","Desviación","Validación","Opcion");
    ?>
    
    <div id="headerFiltros" style="position: fixed;">

        <button onClick="" type="button" 
        class="btn btn-success" data-toggle="modal" data-target="#nuevaReporteModal">
            Agregar Nuevo Reporte Diario
        </button>
<button type="button" onclick="seleccionReporte()">Generar Reporte
    <img src="../../images/base/_excel.png" width="30px" height="30px">
</button>
<!--        <button id="btnAgregarEvidenciasRefrescar" type="button" 
        class="btn btn-info " onclick="refresh();" >
            <i class="glyphicon glyphicon-repeat"></i> 
        </button>-->

        <!--<i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>-->

    </div>
    
    <div style="height: 50px"></div>

<!--            <table class="table table-bordered table-striped header_fijo" id="idTable">
                <tr>
                    <th class="table-headert" with="35%" colspan="5" style="background:#9aca40"></td>
                    <th class="table-headert" with="35%" colspan="5" style="background:#6FB3E0">Responsable de Evidencia</td>
                    <th class="table-headert" with="30%" colspan="3" style="background:#DCDCDC">Supervisión</td>
                </tr>
                <tr>
                <?php foreach($titulosTable as $index=>$value)
                { if($index<5){ ?>
                <th class="table-headert backgroundTdTable" width="35%"><?php echo $value ?></th>
                <?php }
                
                  if($index>4 && $index<10){?>  
                <th class="table-headert backgroundTdTable2" width="35%"><?php echo $value ?></th>
                <?php }
                
                if($index>9){ ?>
                    <th class="table-headert backgroundTdTable3" width="30%"><?php echo $value ?></th>
                <?php }                
                }
                 ?>
                    
                </tr>
                
                <tbody class="hideScrollBar" id="bodyTable" style="position: absolute"> 
                    
                </tbody>
            </table>-->
    
    <div id="grid"></div>

</body>




<!-- Inicio de Seccion Modal Crear nueva Evidencia-->
<div class="modal draggable fade" id="nuevaReporteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="closeLetra">X</span>
                </button>
		        <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Crear Nuevo Reporte</h4>
            </div>

            <div class="modal-body">
	<form id="forma" name="forma" method="post" class="frmcss" style="width:100%; overflow: hidden;"  >
	<fieldset>
	<table>
		<tr>
			<td>Cumplimiento</td>
			<td><input type="text" id="contrato" name ="contrato" value="" readonly class="inputhdr"> </td>
		</tr>
<!--		<tr>
			<td>Orden</td>
			<td><input type="text" id ="orden" value="" readonly class="inputhdr"> </td>
		</tr>-->
		<tr>
			<td>Fecha</td>
			<td><input type="date" name ="fecha"  id="fecha"  class="inputhdr" > </td>
		</tr>
		</table>
	</fieldset>
	<div style="position: relative;width: 100%;height: 4px;"></div>	
	
<!--	<fieldset>
		<table>
			<tr><td><button id="deshabilitar" type="button" onclick="">Deshabilitar</button></td>
			<td><button id="reporte" type="button" onclick="descargarReporte();">Generar reporte</button></td></tr>
		</table>
	</fieldset>-->
	
	<div style="position: relative;width: 100%;height: 10px;"></div>	
	<fieldset><legend><b>Precargado a seleccionar</b></legend>
		<table>
		<tr>
                    <td><label style="cursor: pointer;padding-left: 3px;">Region fiscal<div id="region_fiscal"></div></label></td>
			<td><label style="cursor: pointer;padding-left: 3px;">Punto de medicion<div id="pm"></div></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Tag del patin de medicion<div id="tpm"></div></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Tipo de medidor<div id="tm"></div></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Clasificacion de sistema de medicion<div id="clasificacionsistemamedicion"></div></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Tipo de Hidrocarburo<div id="th"></div></label></td>
		</tr>
		</table>
	</fieldset>
	<div style="position: relative;width: 100%;height: 8px;"></div>
	<fieldset><legend><b>Datos Ingresados Manualmente</b></legend>
		<table>
		<tr>
			
			<td><label style="cursor: pointer;padding-left: 3px;">Presion<pre><input name=""  type="text"   ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Temperatura<pre><input name=""  type="text"  ></label></td>
			<td><label style="cursor: pointer;padding-left: 3px;">Producción de Petróleo Medido Neto [bbl/día]<pre><input name=""  type="text"  ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">°API<pre>   <input name="" type="text" checked ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">% S<pre>    <input name=""  type="text"  ></label></td>
                </tr>
		<tr>
			
		</tr>
		<tr>
			
			
                        <td><label style="cursor: pointer;padding-left: 3px;">% H₂O <pre>  <input name=""  type="text"  ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Producción de Gas Medido<pre><input name="pgmedido" type="text" ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Poder Calorífico de Gas<pre><input name="podercalorifico"   type="text" ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Peso Molecular de Gas<pre><input name="pesomolecular"  type="text"  ></label></td>
                        <td><label style="cursor: pointer;padding-left: 3px;">Energía de Gas<pre> <input name="egas"  type="text"  ></label></td>
		</tr>
		<tr>
			
			
			
                         
                         <td><label style="cursor: pointer;padding-left: 3px;">Eventos<pre><input name="eventos"  type="text" ></label></td>
                </tr>
		
                <tr>
                 
                    
                </tr>
		</table>
	</fieldset>
	<div style="position: relative;width: 100%;height: 5px;"></div>
	</form>
                
                <div class="form-group" method="post">
                    <button type="submit" id="btn_guardar_reportediario" class="btn crud-submit btn-info">Crear Reporte</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Final de Seccion Modal-->







<div class="modal draggable fade" id="evidenciasPrueba" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabelMostrarRegistros">Lista Registros</h4>
        </div>

        <div class="modal-body">
            <div id="listadatosGrid"></div>
        </div> 
      </div> 
    </div> 
</div> 





<!--cierre del modal Mensaje-->
<script>
    loadData();
		
    
    function loadData(){
         $.ajax({
			url 		: '../Controller/CumplimientosController.php?Op=contratoselec&obt=true',
			data		: {contrato:"<?php  echo Session::getSesion ("s_cont")?>"},
			success 	: function(r) {
//				console.log(r);
                                    $("#contrato").val(r["clave_cumplimiento"]);
                                    precargados();
				}
	});
    }
    
    function seleccionReporte()
    { 

//var jsonObj = {
//                
//        }
//        alert();
// jsonObj["1"] = "Diario" ;
//  jsonObj["2"] = "Mensual" ;
  

                swal({
  title: 'Selecciona un reporte ',
  input: 'select',
//  html:s,
//  html:'<input type=\'text\' disabled>',
  inputOptions:{"1":"DIARIO","2":"MENSUAL"},
  inputPlaceholder: 'selecciona un reporte ',
  showCancelButton: false,
  showLoaderOnConfirm: true,
   allowEscapeKey:false,
   allowOutsideClick: false,
   showConfirmButton: true,
   confirmButtonText:"Seleccionar",
  inputValidator: function (value) {
    return new Promise(function (resolve, reject) {
      if (value !== '') {
        resolve();
      } else {
        reject('requieres seleccionar ');
      }
    });
  },
  preConfirm: function() {
    return new Promise(function(resolve) {
      setTimeout(function() {
        resolve()
      }, 1000)
    })
  }
}).then(function (result) {
  swal({
    type: 'success',
    html: 'Seleccion Exitosa '
  });

//alert("d");
  });
   
 }
 
    function precargados()
    {
        region_fiscal="<select>";
        pm="<select>";
        tpm="<select>";
        tm="<select>";
        clasificacionsistemamedicion="<select>";
        th="<select>";
        
        $.ajax({
            url 		: '../Controller/CatalogoProcesosController.php?Op=listar',
            success 	: function(r)
            {
                console.log(r);
//                                    $("#contrato").val(r["clave_cumplimiento"]);
                $.each(r,function (index,value)
                {
                    region_fiscal+="<option>"+value["region_fiscal"]+"</option>";
                    pm+="<option>"+value["ubicacion"]+"</option>";
                    tpm+="<option>"+value["tag_patin"]+"</option>";
                    tm+="<option>"+value["tipo_medidor"]+"</option>";
                    clasificacionsistemamedicion+="<option>"+value["clasificacion"]+"</option>";
                    th+="<option>"+value["hidrocarburo"]+"</option>";
                });
                $("#region_fiscal").html(region_fiscal);
                $("#pm").html(pm);
                $("#tpm").html(tpm);
                $("#tm").html(region_fiscal);
                $("#clasificacionsistemamedicion").html(clasificacionsistemamedicion);
                $("#th").html(th);
            }
        });
    }
    
    function descargarReporte(){
        
	var urlx ='rpd_print.action?paramContrato=${contrato}&paramIdCentroTrabajo=';
	parent.blockPageReport("Preparando Reporte diario");//
  	$.fileDownload(urlx, {
	  successCallback: function (url) { parent.unBlockPageReport(); },
	    failCallback: function (html, url) { 
	    	parent.unBlockPageReport(); 
	    	dhtmlx.alert({	title:"OMG",	type:"alert-error",text:"Ocurrio un error al generar el reporte diario intentelo nuevamente."  	});
	    }
	});      		
}
    
   var gridInstance,db={};
    // var data="";
    // var dataTemp="";




    dataRegistro="";
    dataListado=[];
    dataTodo=[];

    $(function()
    {
//alert("ds");
//        listarDatos();
//        $.jGrowl("Eliminacion Exitosa", { header: '' })
            
            // $("#IDTEMA_NUEVAEVIDENCIAMODAL").val().onChange(function()
            // {
            //     alert("Cambio al id del tema");
            // });
             
    });

    $('#BTN_CREAR_NUEVAEVIDENCIAMODAL').click(function()
    {
//        $("#grid").jsGrid("insertItem", { Name: "John", Age: 25, Country: 2 }).done(function() {
//            console.log("insertion completed");
//        });
        claveRegistro = $("#IDREGISTRO_NUEVAEVIDENCIAMODAL").val();
        claveTema = $("#IDTEMA_NUEVAEVIDENCIAMODAL").val();
        if(claveTema!=-1 && claveRegistro!=-1)
        {
            $.ajax
            ({
                url: '../Controller/EvidenciasController.php?Op=CrearEvidencia',
                type: 'POST',
                data: "ID_REGISTRO="+dataRegistro.id_registro,
                async:false,
                beforesend:function (){
                    alert("se empezaran a listar los datos");
                },
                success:function(data)
                {
                   
                    (data==true)?
                    (
                        swalSuccess("Se creo la evidencia"),
//                window.location.href=""
                        // swal({
                        // title: '',text: 'Se creo la evidencia',
                        // showCancelButton: false,showConfirmButton: false,
                        // type:"success"
                        // }),
//                        $('#FRECUENCIA_NUEVAEVIDENCIAMODAL').html(""),
//                        $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html(""),
//                        $('#NOMBRE_NUEVAEVIDENCIAMODAL').html(""),
//                        $('#nuevaEvidenciaModal .close').click(),
//                        listarDatos()

                            refresh()
                    )
                    :swalErro("Error al crear");
                    }
                    
            });
        }
        else
        {
            swal("","Selecciona Correctamente","warning");
        }
    });
    
 

    function loadSpinner()
    {
        // alert("se cargara otro ");
        myFunction();
    }






    
    



        



    

   

    
</script>





    <!--Inicia para el spiner cargando-->
    <script src="../../js/loaderanimation.js" type="text/javascript"></script>
    <!--Termina para el spiner cargando-->
    
    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js"></script>
    <!--Para abrir alertas de aviso, success,warning, error-->
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>

    <!--Para abrir alertas del encabezado-->
    <script src="../../assets/probando/js/ace-elements.min.js"></script>
    <script src="../../assets/probando/js/ace.min.js"></script>

    <!-- js cargar archivo -->
<!--    <script src="../../assets/FileUpload/js/jquery.min.js"></script>
    <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>-->
 
</body>
</html>



