<?php
session_start();
require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>OMG APPS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
        <link href="../../assets/probando/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../../assets/probando/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!--<link rel="stylesheet" href="assets/css/bootstrap.min.css" />-->
                <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
		<!--<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />-->
		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />
		<link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
                
        <!--Inicia para el spiner cargando-->
        <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/loaderanimation.js" type="text/javascript"></script>
        <!--Termina para el spiner cargando-->
        
        <script src="../../js/jquery.js" type="text/javascript"></script>
		<script src="../../assets/probando/js/ace-extra.min.js"></script>
                
        <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
        
                
        <!--<link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>-->
        <!--<script src="../../js/loaderanimation.js" type="text/javascript"></script>-->      
        
        <!--en esta seccion es para poder abrir el modal--> 
        <!--<script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>-->             
        <!--<link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>-->
        <!--<link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>-->
        <!--<script src="../../codebase/dhtmlx.js"></script>-->
        <!--aqui termina la seccion para poder abrir el modal-->
        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
                
                
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
            
            div#winVP{
                position: relative;
                height: 350px;
                border: 1px solid #dfdfdf;
                margin: 10px;
		    }
            /*Inicia estilos para mantener fijo el header*/
            .table-fixed-header{
                display: table; /* 1 */
                position: relative;
                padding-top: calc(~'2.5em + 2px'); /* 2 */
    
                table {
                    margin: 0;
                    margin-top: calc(~"-2.5em - 2px"); /* 2 */
                }
    
                thead th{
                    white-space: nowrap;
            
                    /* 3 - apply same styling as for thead th */
                    /* 4 - compensation for padding-left */
                    &:before {
                        content: attr(data-header);
                        position: absolute;
                        top: 0;
                        padding: .5em 1em; /* 3 */
                        margin-left: -1em; /* 4 */
                    }
                }
            }

            /* 5 - setting height and scrolling */
            .table-container {
                max-height: 70vh; /* 5 */
                overflow-y: auto; /* 5 */
                    
                /* 6 - same styling as for thead th */
                &:before {
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
    /*Finaliza estilos para mantener fijo el header*/                
        </style>
    </head>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarUsuario">
        Agregar Usuario
    </button>

    <div id="winVP">
        <body class="no-skin" onload="loadSpinner()">
            <div id="loader"></div>

            <div style="height: 5px"></div>
                
                <div style="position: fixed;">
        </body>
        </body>
    </div>

    <div class="modal draggable fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <!-- <label class="control-label" for="title">Nombre Usuario: </label>
                        <input type="text" class="" onkeyup="getClavesDocumento(this)"/>
                        <select id="CLAVE_NUEVAEVIDENCIAMODAL" class="select1" onchange="select_clavesModal(this)">
                            <option>Sin especificar</option>
                        </select> -->
                        <div class="dropdown">
                            <input type="text" class="dropdown-toggle" id="menu1" data-toggle="dropdown" onkeyup="getClavesDocumento(this)"/>
                                <ul class="dropdown-menu" id="dropdownEvent" role="menu" 
                                aria-labelledby="menu1"></ul>
                        </div>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function loadSpinner()
    {
        myFunction();
    }
    function getClavesDocumento(data)
    {
        cadena = $(data).val().toLowerCase();
        tempData="";
        if(cadena!="")
        {
            $.ajax({
                url: '../Controller/AdminController.php?Op=BusquedaEmpleado',
                type: 'GET',
                data: 'CADENA='+cadena,
                success:function(usuarios)
                {
                    $.each(usuarios,function(index,value)
                    {
                        // console.log(value);
                        tempData +="<li role='presentation'><a role='menuitem' tabindex='-1' href='#'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</a></li>";
                    });
                    $("#dropdownEvent").html(tempData);
                }
            });
        }
    }
</script>
<script src="../../js/loaderanimation.js" type="text/javascript"></script>
                <!--Termina para el spiner cargando-->

    <!--Bootstrap-->
    <script src="../../assets/probando/js/bootstrap.min.js"></script>
    <!--Para abrir alertas de aviso, success,warning, error-->
    <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>

    <!--Para abrir alertas del encabezado-->
    <script src="../../assets/probando/js/ace-elements.min.js"></script>
    <script src="../../assets/probando/js/ace.min.js"></script>
</script>