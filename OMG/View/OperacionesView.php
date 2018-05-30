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
    <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>

    <!-- text fonts -->
	<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />
    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
    <link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
    
    <!--Inicia para el spiner cargando-->
    <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <!--Termina para el spiner cargando-->
                  
    <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
    
 

    <style>
        .modal
        {
            overflow: hidden;
        }
        .modal-dialog{
            margin-right: 0;
            margin-left: 0;
        }
        .modal-header{
            height:30px;background-color:#444;
            color:#ddd;
        }
        .modal-title{
            margin-top:-10px;
            font-size:16px;
        }
        .modal-header .close{
            margin-top:-10px;
            color:#fff;
        }
        .modal-body{
            color:#888;
            /*max-height: calc(100vh - 210px);*/
            max-height: calc(100vh - 110px);
            overflow-y: auto;
        }
        .modal-body p {
            text-align:center;
            padding-top:10px;
        }
        .validar_formulario{
            background: blue; 
            width: 120px; 
            color: white; 
        }
        .table-fixed-header{
            display: table; /* 1 */
            position: relative;
            padding-top: calc(~'2.5em + 2px'); /* 2 */
    
            table{
                margin: 0;
                margin-top: calc(~"-2.5em - 2px"); /* 2 */
            }
            thead th{
                white-space: nowrap;
                &:before{
                    content: attr(data-header);
                    position: absolute;
                    top: 0;
                    padding: .5em 1em; /* 3 */
                    margin-left: -1em; /* 4 */
                }
            }
        }
        .table-container {
            max-height: 70vh; /* 5 */
            overflow-y: auto; /* 5 */
            &:before{
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                min-height: 2.5em;             /* 6 */
                border-bottom: 2px solid #DDD; /* 6 */
                background: #f1f1f1;           /* 6 */
            }
        }
        </style>        
</head>
<body>
<!-- <body class="no-skin" onload="loadSpinner()"> -->
    <!-- <div id="loader"></div> -->
    <?php
        require_once 'EncabezadoUsuarioView.php';
        $filtrosArray = array(
            array("name"=>"Clave","column"=>0),
            array("name"=>"Nombre Documento","column"=>1),
            array("name"=>"Responsable","column"=>2),
            array("name"=>"Clasificación","column"=>6),
            // array("name"=>"Clave Evidencia","column"=>"text"),
        );
        $titulosTable = 
            array("Clave","Nombre Documento","Responsable Documento","Registros","Documento Adjunto",
                "Fecha Registro","Clasificación","Desviación","Acción Correctiva Inmediata","Validación",
                "Plan de Acción","Ingresar Oficio Atención","Oficio de Atención");
    ?>
    <div style="position: fixed;">

        <button onClick="" type="button" 
        class="btn btn-success" data-toggle="modal" data-target="#nuevoRegistroModal">
            Agregar Nuevo Registro
        </button>

        <button id="btnAgregarOperacionesRefrescar" type="button" 
        class="btn btn-info " onclick="refresh();" >
            <i class="glyphicon glyphicon-repeat"></i> 
        </button>

        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>

        <?php foreach($filtrosArray as $value)
        { ?>
        <input type="text" onkeyup="filterTable(this)" 
        placeholder="<?php echo $value['name'] ?>" style="width: 120px;">
        <?php } ?>
    </div>
    <div style="height: 50px"></div>

    <div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom">
        <div class="table-container">
            <table id="idTable" class="tbl-qa">
                <tr>
                <?php foreach($titulosTable as $value)
                { ?>
                    <th class="table-header"><?php echo $value ?></th>
                <?php } ?>
                </tr>
                
                <tbody id="bodyTable">
                    
                </tbody>
            </table>
        </div>
    </div>
</body>


<!-- Inicio modal Registros -->
<!--<div class="modal draggable fade" id="mostrar-registros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <div id="loaderModalMostrar"></div>
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabel">Lista Registros</h4>
        </div>

        <div class="modal-body">
          
            <div id="RegistrosListado"></div>
  
        </div> cierre div class-body 
      </div> cierre div class modal-content 
    </div> cierre div class="modal-dialog" 
</div> cierre del modal Requisitos-->

<!-- Inicio de Seccion Modal Crear nueva Entrada-->
<div class="modal draggable fade" id="nuevoRegistroModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
		        <h4 class="modal-title" id="myModalLabel">Crear Nueva Evidencia</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="title">Clave Documento:</label>
                    <input type="text" class="" onkeyup="getClavesDocumento(this)"/>
                    <select id="CLAVE_NUEVAEVIDENCIAMODAL" class="select1" onchange="select_clavesModal(this)">
                        <option>Sin especificar</option>
                    </select>

                    <div class="help-block with-errors"></div>
				</div>
                <div class="form-group">
                    Clave: <label id="CLAVE_NUEVAEVIDENCIAMODAL2" class="control-label" for="title"></label>
                </div>
                <div class="form-group">
                    Documento: <label id="DOCUMENTO_NUEVAEVIDENCIAMODAL" class="control-label" for="title"></label>
                </div>
                <div class="form-group">
                    Responsable del Documento: <label id="NOMBRE_NUEVAEVIDENCIAMODAL" class="control-label" for="title"></label>
                </div>
                <div class="form-group" method="post">
                    <button type="submit" id="BTN_CREAR_NUEVAEVIDENCIAMODAL" class="btn crud-submit btn-info">Crear Evidencia</button>
                </div>
            </div>
        </div>
    </div>
</div>
       <!--Final de Seccion Modal--> 

<script>

    var data="";
    var dataTemp="";
    $(function()
    {
        $.ajax
        ({
            url: '../Controller/OperacionesController.php?Op=Listar',
            type: 'GET',
            success:function(datos)
            {
                data = datos;
                reconstruirTable(datos);
            }
        });
    });

    function mostrarRegistros(id_documento)
    {
        ValoresRegistros = "<ul>";
        alert("Registros"+id_documento);
        
        $.ajax
        ({
            url:"../Controller/OperacionesController.php?op=MostrarRegistrosPorDocumento",
            type: 'POST',
            data: 'ID_DOCUMENTO'+id_documento,
            success:function(responseregistros)
            {
                $.each(responseregistros, function(index,value){
                    ValoresRegistros+="<li>"+value.registros+"</li>";                   
                });
        ValoresRegistros += "</ul>";
                
                $('#RegistrosListado').html(ValoresRegistros);
                
            }
            
        })
    }
    
    function refresh()
    {
        // consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
        window.location.href="OperacionesView.php";
    }
    function filterTable(Obj)
    {
        console.log($(Obj).attr("placeholder"));
        // console.log($(Obj).attr("type"));
        // console.log(columna);

    }
    function loadSpinner()
    {
        // alert("se cargara otro ");
        myFunction();
    }
    function getClavesDocumento(Obj)
    {
        tempData="";
        cadena = $(Obj).val();
        if(cadena!="")
        {
            $.ajax
            ({
                url: '../Controller/OperacionesController.php?Op=getClavesDocumentos',
                type: 'GET',
                data: "CADENA="+cadena,
                success:function(data)
                {
                    if(data!="")
                    tempData += "<option value=''></option>";
                    $.each(data,function(index,value)
                    {
                        apellidos = value.NOMBRE_EMPLEADO;
                        if(value.APELLIDO_PATERNO!=null)
                        {
                            apellidos += " "+value.APELLIDO_PATERNO+" "+value.APELLIDO_MATERNO;
                        }
                        tempData += "<option value='"+value.CLAVE_DOCUMENTO+"+=$="+value.DOCUMENTO;
                        tempData += "+=$="+apellidos+"'>";
                        tempData += value.CLAVE_DOCUMENTO+"</option>";
                    });
                    $('#CLAVE_NUEVAEVIDENCIAMODAL').html(tempData);
                }
            });
        }
        else
        {
            tempData = "<option>Sin especificar</option>";
            $('#CLAVE_NUEVAEVIDENCIAMODAL').html(tempData);
        }
    }

    function select_clavesModal(Obj)
    {
        tempData = $(Obj).prop("value");
        tempData = tempData.split("+=$=");
        if(tempData.length == 3)
        {
            $('#CLAVE_NUEVAEVIDENCIAMODAL2').html(tempData[0]);
            $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html(tempData[1]);
            $('#NOMBRE_NUEVAEVIDENCIAMODAL').html(tempData[2]);
        }
        else
        {
            $('#CLAVE_NUEVAEVIDENCIAMODAL2').html("");
            $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html("");
            $('#NOMBRE_NUEVAEVIDENCIAMODAL').html("");
        }
    }

    $('#BTN_CREAR_NUEVAEVIDENCIAMODAL').click(function()
    {
        clave = $('#CLAVE_NUEVAEVIDENCIAMODAL2')[0].innerHTML;
        $.ajax
        ({
            url: '../Controller/OperacionesController?Op=crearEvidencia',
            type: 'POST',
            data: 'CLAVE_DOCUMENTO='+clave,
            success:function(data)
            {

            }
        });
    });

    function filterTableAsunt()
    {
        var input, filter, table, tr, td, i;
        input = document.getElementById("idInputAsunto");
        filter = input.value.toUpperCase();
        table = document.getElementById("idTable");
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++)
        {
            td = tr[i].getElementsByTagName("td")[4];
            if (td)
            {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
                {
                    tr[i].style.display = "";
                }else
                {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    function getDataTable()
    {        
        // $('#bodyTable').html(data);
        $.ajax
        ({
            url: '../Controller/OperacionesController.php?Op=getDataTable',
            type: 'GET',
            // data: '',
            success:function(dataT)
            {
                reconstruirTable(dataT);
            }
        });
    }
    function reconstruirTable(data)
    {
        tempData = "";
        $.each(data,function(index,value)
        {
            tempData += "<tr>";
            tempData += "<td>"+value.clave_documento+"</td>";
            tempData += "<td>"+value.documento+"</td>";
            tempData += "<td>"+value.nombre_empleado+value.apellido_paterno+value.apellido_materno+"</td>";
            tempData += "<td>"+value.registros+"</td>";
            tempData += "<td><button onClick='mostrar_urls();'";
            tempData += "type='button' class='btn btn-success' data-toggle='modal' data-target='#create-itemUrls'>";
            tempData += "Mostrar Documentos</button></td>";
            tempData += "<td>"+value.clasificacion+"</td>";
            tempData += "<td>"+value.desviacion+"</td>";
            tempData += "<td>La fecha</td>";
            tempData += "<td>"+value.accion_correctiva+"</td>";
            tempData += "<td>"+value.validacion_supervisor+"</td>";
            tempData += "<td>"+value.plan_accion+"</td>";
            tempData += "<td>"+value.ingresar_oficio_atencion+"</td>";
            tempData += "<td>"+value.oficio_atencion+"</td>";
            tempData += "</tr>";
        });
        $('#bodyTable').html(tempData);
    }
</script>

        <!--Inicia para el spiner cargando-->
        <script src="../../js/loaderanimation.js" type="text/javascript"></script>
        <!--Termina para el spiner cargando-->
        
        <!--jquery-->
        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>

        
        <!--Bootstrap-->
        <script src="../../assets/probando/js/bootstrap.min.js"></script>
        <!--Para abrir alertas de aviso, success,warning, error-->
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>

        <!--Para abrir alertas del encabezado-->
        <script src="../../assets/probando/js/ace-elements.min.js"></script>
        <script src="../../assets/probando/js/ace.min.js"></script>        
        <script src="../../assets/probando/js/ace-extra.min.js"></script>


</body>
</html>