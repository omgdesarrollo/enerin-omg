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
    
    <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    
    <!-- text fonts -->
	<!--<link rel="stylesheet" href=".../../assets/probando/css/fonts.googleapis.com.css" />-->
    <!-- ace styles -->
    <link rel="stylesheet" href="../../assets/probando/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <!--<link rel="stylesheet" href=".../../assets/probando/css/ace-skins.min.css" />-->
    <link rel="stylesheet" href="../../assets/probando/css/ace-rtl.min.css" />
    
    <!--Inicia para el spiner cargando-->
    <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
    <!--Termina para el spiner cargando-->
                  
    <link href="../../css/paginacion.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
    <link href="../../css/tabla.css" rel="stylesheet" type="text/css"/>

    <!--jquery-->
    <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    
<!--    <link href="../../assets/jsgrid/jsgrid-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/jsgrid/jsgrid.min.css" rel="stylesheet" type="text/css"/>
    <script src="../../assets/jsgrid/jsgrid.min.js" type="text/javascript"></script>-->
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
                <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
    
    <script src="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.js" type="text/javascript"></script>
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/dhtmlx.css" rel="stylesheet" type="text/css"/>
    <link href="../../assets/dhtmlxSuite_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
    <script src="../../js/filtroSupremo.js" type="text/javascript"></script>
    <script src="../../js/fEvidenciasView.js" type="text/javascript"></script>
    
      <!--<script src="../ajax/ajaxHibrido.js" type="text/javascript"></script>-->
    <!--<script src="../../js/jquery.js" type="text/javascript"></script>-->

<!--<link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>
   <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>-->

   <!-- JSGRID -->
   
    <style>
        .jsgrid-header-row>.jsgrid-header-cell
        {
                background-color:#307ECC ;      /* orange */
                font-family: "Roboto Slab";
                font-size: 1.2em;
                color: white;
                font-weight: normal;
        }

        .modal-body{
        color:#888;
        max-height: calc(100vh - 110px);
        overflow-y: auto;
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
        
        .validar_formulario{
            background: blue; 
            width: 120px; 
            color: white; 
        }

 
         .modal-lg{width: 100%;}
        </style>
</head>
<!-- <body> -->
<body class="no-skin" >
    <div id="loader"></div>
    
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
        class="btn btn-success" data-toggle="modal" data-target="#nuevaEvidenciaModal">
            Agregar Nuevo Registro
        </button>

        <button id="btnAgregarEvidenciasRefrescar" type="button" 
        class="btn btn-info " onclick="refresh();" >
            <i class="glyphicon glyphicon-repeat"></i> 
        </button>

        <i class="ace-icon fa fa-search" style="color: #0099ff;font-size: 20px;"></i>

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
<div class="modal draggable fade" id="nuevaEvidenciaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
		        <h4 class="modal-title" id="myModalLabelNuevaEvidencia">Crear Nueva Evidencia</h4>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label class="control-label">Temas: </label>
                    <div class="dropdown">
                        <input style="width:100%" type="text" class="dropdown-toggle" id="NOMBRETEMA_NUEVAEVIDENCIA" data-toggle="dropdown" onkeyup="buscarTemas(this)" autocomplete="off"/>
                            <ul style="width:100%;cursor:pointer;" class="dropdown-menu" id="dropdownEventTemasEvidencia" role="menu" 
                            aria-labelledby="NOMBRETEMA_NUEVAEVIDENCIA">
                            <!-- <li role='presentation'><a role='menuitem' tabindex='-1'>jose</a></li>
                            <li role='presentation'><a role='menuitem' tabindex='-1'>jesus</a></li> -->
                            </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Registro: </label>
                    <div class="dropdown">
                        <input style="width:100%" type="text" class="" id="NOMBREREGISTRO_NUEVAEVIDENCIA" data-toggle="dropdown" onkeyup="buscarRegistros(this)" autocomplete="off"/>
                            <ul style="width:100%;cursor:pointer;" class="dropdown-menu" id="dropdownEventRegistroEvidencia" role="menu" 
                            aria-labelledby="NOMBREREGISTRO_NUEVAEVIDENCIA">
                            <!-- <li role='presentation'><a role='menuitem' tabindex='-1'>JAJA</a></li>
                            <li role='presentation'><a role='menuitem' tabindex='-1'>JIJI</a></li> -->
                            </ul>
                    </div>
                </div>

                <div class="form-group">
                    <strong>Frecuencia: </strong><label id="FRECUENCIA_NUEVAEVIDENCIAMODAL" class="control-label" for="title"></label>
                </div>
                <div class="form-group">
                    <strong>Documento: </strong><label id="DOCUMENTO_NUEVAEVIDENCIAMODAL" class="control-label" for="title"></label>
                </div>
                <div class="form-group">
                    <strong>Responsable del Documento: </strong><label id="NOMBRE_NUEVAEVIDENCIAMODAL" class="control-label" for="title"></label>
                </div>
                <div class="form-group">
                    <input id="ID_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                    <input id="IDTEMA_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                    <input id="IDREGISTRO_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
                </div>

                <div class="form-group" method="post">
                    <button type="submit" id="BTN_CREAR_NUEVAEVIDENCIAMODAL" class="btn crud-submit btn-info">Crear Evidencia</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Final de Seccion Modal-->

<!-- Inicio modal Registros -->
<div class="modal draggable fade" id="mostrarRegistrosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">                
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
          <h4 class="modal-title" id="myModalLabelMostrarRegistros">Lista Registros</h4>
        </div>

        <div class="modal-body">
            <div id="RegistrosListado"></div>
        </div> 
      </div> 
    </div> 
</div> 
<!--cierre del modal Registros-->



<!-- Inicio de Seccion Modal Archivos-->
<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog " role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">
                        
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabelItermUrls">Archivos Adjuntos</h4>
            </div>

            <div class="modal-body">
                <div id="DocumentolistadoUrl"></div>

                    
                <div class="form-group">
                    <div id="DocumentolistadoUrlModal"></div>
                </div>

                <div class="form-group" method="post" >
                    <button type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Adjuntar Archivo</button>
                </div>
            </div><!-- cierre div class-body -->
        </div><!-- cierre div class modal-content -->
    </div><!-- cierre div class="modal-dialog" -->
</div><!-- cierre del modal -->

<!-- Inicio modal Mensaje -->
<div class="modal draggable fade" id="MandarNotificacionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabelMandarNotificacion">Mandar Notificación</h4>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label" for="title">Mensaje:</label>
                    <textarea id="textAreaNotificacionModal" class="form-control" ></textarea>
                </div>
                <div class="form-group" method="post" id="BTNENVIAR_MANDARNOTIFICACIONMODAL"></div>
            </div>
        </div>
    </div>
</div>


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
    
    var myGrid;
		function doOnLoad(){
			myGrid = new dhtmlXGridObject('gridbox');
			myGrid.setImagePath("../../../codebase/imgs/");
			myGrid.setHeader("Sales, Book Title, Author");
			myGrid.setInitWidths("70,250,*");
			myGrid.setColAlign("right,left,left");
			myGrid.setColTypes("dyn,ed,ed");
			myGrid.setColSorting("int,str,str");
			myGrid.init();
			myGrid.load("../common/data.json","json");
		}
    
    
    
   var gridInstance,db={};
    // var data="";
    // var dataTemp="";
    months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    
    filtros = [{'name':'Clave Documento','id':'clave_documento'},{'name':'Responsable Documento','id':'usuario'},{'name':'Frecuencia','id':'frecuencia'}];
    construirFiltros();
    function construirFiltros()
    {
        tempData = "";
        $.each(filtros,function(index,value)
        {
            console.log(value);
            tempData += "<input id='"+value.id+"' type='text' onkeyup='filtroSupremo()' placeholder='"+value.name+"' style='width: auto;'>";
        });
        $("#headerFiltros").append(tempData);
    }

    var si_hay_cambio=false;
    dataRegistro="";
    dataListado=[];
    dataTodo=[];
    __refresh=false;

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
                    // swal({
                    //     title: '',
                    //     text: 'Error al crear',
                    //     showCancelButton: false,
                    //     showConfirmButton: false,
                    //     type:"error"
                    // });
//                     listarDatos();
//                     $("#jsGrid").jsGrid("refresh");

//                        var gridInstance;     
//                    console.log(gridInstance);
//                    $("#jsGrid").jsGrid("insertItem");
//                     gridInstance = args.grid;  
//                    gridInstance["data"].push(
//                        {id_evidencia: "77", no: 11, requisito: "Elbueno", registro: "Vamos", frecuencia: "DIARIO"});
//                 $("#jsGrid").jsGrid("refresh");
//                         gridInstance["data"].

//                    var $grid = $("#jsGrid");
////                    $grid.jsGrid("option", "pageIndex", 1);
////                    $grid.jsGrid("loadData");
////                    $grid["0"]["draggable"]=true;
//                    console.log("lo va hacer ");
//                    console.log($grid);    
////                    $("#jsGrid").html("");
//                    __refresh=false;
//                    listarDatos();
                    
//                    $("#jsGrid").jsGrid("option", "data",__datosGlobales);
                    }
                    
            });
        }
        else
        {
            swal("","Selecciona Correctamente","warning");
        }
    });
    
    function saveSingleToDatabase(Obj,tabla,columna,id,contexto)
    {
      
            if(si_hay_cambio==true){
            $("#btnAgregarEvidenciasRefrescar").prop("disabled",true);
            
            $(Obj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            
            saveOneToDatabase(Obj.innerHTML,columna,tabla,id,contexto);
            
            si_hay_cambio=false;
        }
    }

    var tempo = 1;

    function saveComboToDatabase(Obj,tabla,columna,id,contexto)
    {
        valortmp = $(Obj)[0];
        Objtmp=valortmp[valortmp.selectedIndex].innerHTML;
        //poner alerta para valores
        // alert(Objtmp);
        // setInterval(function()
        // {
        //     $.ajax({
        //         url:'../Controller/EvidenciasController.php?Op=a',
        //         success:function(data)
        //         {
        //             console.log(tempo);
        //             tempo++;
        //         }
        //     });
        // },1500);
        if(Objtmp!=" ")
        {
            swal({
                    title:"SELECCIONAR",
                    text: "Una vez seleccionado no se puede cambiar",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    // confirmButtonText: tempo,
                    }, function(isConfirm)
                    {
                        if(isConfirm)
                        {
                            $('#loader').show();
                            saveOneToDatabase(Objtmp,columna,tabla,id,contexto);
                        }
                        else
                            $(Obj)[0].selectedIndex=0;
                    }
                );
        }
    }

    function detectarsihaycambio() {
                    
        si_hay_cambio=true;
    }
     
    function listarDatos()
    {
        $.ajax
        ({
            url: '../Controller/EvidenciasController.php?Op=Listar',
            type: 'GET',
            async:false,
            beforeSend:function()
            {
//                $('#loader').show();
            },
            success:function(datos)
            {
                dataListado = datos;
                reconstruirTable(datos);
            },
            error:function(error)
            {
//                $('#loader').hide();
            }
        });
    }
    noArchivo=0;

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

    function buscarTemas(data)
    {
        cadena = $(data).val().toLowerCase();        
        tempData="";
        if(cadena!="")
        {
            $.ajax({
                url: '../Controller/EvidenciasController.php?Op=BuscarTema',
                type: 'GET',
                data: 'CADENA='+cadena,
                async:false,
                success:function(temas)
                {
                    // console.log(temas);
                    $.each(temas,function(index,value)
                    {
                        // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
                        // datos = value.id_tema+"^_^"+value.no+"^_^"+value.nombre+"^_^"+value.descripcion;
                        tempData += "<li role='presentation'><a role='menuitem' tabindex='-1'";
                        tempData += " onClick='seleccionarItemTemas("+JSON.stringify(value)+")'> ";
                        tempData += value.no+" - "+value.nombre+"</a></li>";
                    });
                    $("#dropdownEventTemasEvidencia").html(tempData);
                }
            });
        }
        $("#FRECUENCIA_NUEVAEVIDENCIAMODAL").html("");
        $("#DOCUMENTO_NUEVAEVIDENCIAMODAL").html("");
        $("#NOMBRE_NUEVAEVIDENCIAMODAL").html("");
        $('#NOMBREREGISTRO_NUEVAEVIDENCIA').val("");
        $("#IDTEMA_NUEVAEVIDENCIAMODAL").val(-1);
        $("#dropdownEventRegistroEvidencia").html("");
    }

    function seleccionarItemTemas(usuarioTemas)
    {
        $('#NOMBRETEMA_NUEVAEVIDENCIA').val(usuarioTemas.no+" - "+usuarioTemas.nombre);
        $("#IDTEMA_NUEVAEVIDENCIAMODAL").val(usuarioTemas.id_tema);
    }

    function seleccionarItemRegistro(Registros)
    {
        $('#NOMBREREGISTRO_NUEVAEVIDENCIA').val(Registros.registro);
        $('#NOMBRETEMA_NUEVAEVIDENCIA').attr("disabled","true");
        $("#IDREGISTRO_NUEVAEVIDENCIAMODAL").val(Registros.id_registro);
        $("#FRECUENCIA_NUEVAEVIDENCIAMODAL").html(Registros.frecuencia);
        $("#DOCUMENTO_NUEVAEVIDENCIAMODAL").html(Registros.documento);
        $("#NOMBRE_NUEVAEVIDENCIAMODAL").html(Registros.nombre);
        dataRegistro=Registros;
        console.log(dataRegistro);
    }

    function buscarRegistros(Obj)
    {
        idTema = $("#IDTEMA_NUEVAEVIDENCIAMODAL").val();
        cadena = $(Obj).val().toLowerCase();
        // alert();
        tempData="";
        if(idTema!=-1)
        {
            if(cadena!="")
            {
                $.ajax({
                    url: '../Controller/EvidenciasController.php?Op=BuscarRegistro',
                    type: 'GET',
                    data: 'ID_TEMA='+idTema+"&CADENA="+cadena,
                    async:false,
                    success:function(registros)
                    {
                        $.each(registros,function(index,value)
                        {
                            // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
                            // datos = value.id_tema+"^_^"+value.no+"^_^"+value.nombre+"^_^"+value.descripcion;
                            tempData += "<li role='presentation'><a role='menuitem' tabindex='-1'";
                            tempData += "onClick='seleccionarItemRegistro("+JSON.stringify(value)+")'>";
                            tempData += value.registro+"</a></li>";
                        });
                        $("#dropdownEventRegistroEvidencia").html(tempData);
                    },
                    error:function()
                    {
                        swalError("Error en el servidor");
                    }
                });
            }
            else
            {
                $("#FRECUENCIA_NUEVAEVIDENCIAMODAL").html("");
                $("#DOCUMENTO_NUEVAEVIDENCIAMODAL").html("");
                $("#NOMBRE_NUEVAEVIDENCIAMODAL").html("");
                $('#NOMBRETEMA_NUEVAEVIDENCIA').removeAttr("disabled");
                $("#IDREGISTRO_NUEVAEVIDENCIAMODAL").val(-1);
            }
        }
        else
        {
            swal("","Debe seleccionar tema primero","info");
        }
    }

    // function construir(usuarioTemas)
    // {
    //     tempData = "<tr id='idTema_"+usuarioTemas.id_tema+"' >";
    //     tempData += "<td>"+usuarioTemas.no+"</td>";
    //     tempData += "<td>"+usuarioTemas.nombre+"</td>";
    //     tempData += "<td>"+usuarioTemas.descripcion+"</td>";
    //     tempData += "<td>";
    //     tempData += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
    //     tempData += "onclick='eliminarTema("+usuarioTemas.id_tema+");'>";
    //     tempData += "<i class=\"fa fa-trash\"></i></button></td></tr>";
    //     return tempData;
    // }

    // function getClavesDocumento(Obj)
    // {
    //     tempData="";
    //     cadena = $(Obj).val();
    //     if(cadena!="")
    //     {
    //         $.ajax
    //         ({
    //             url: '../Controller/EvidenciasController.php?Op=getClavesDocumentos',
    //             type: 'GET',
    //             data: "CADENA="+cadena,
    //             success:function(data)
    //             {
    //                 if(data!="")
    //                 tempData += "<option value=''></option>";
    //                 $.each(data,function(index,value)
    //                 {
    //                     apellidos = value.NOMBRE_EMPLEADO;
    //                     if(value.APELLIDO_PATERNO!=null)
    //                     {
    //                         apellidos += " "+value.APELLIDO_PATERNO+" "+value.APELLIDO_MATERNO;
    //                     }
    //                     tempData += "<option value='"+value.CLAVE_DOCUMENTO+"+=$="+value.DOCUMENTO;
    //                     tempData += "+=$="+apellidos+"+=$="+value.ID_DOCUMENTO+"'>";
    //                     tempData += value.CLAVE_DOCUMENTO+"</option>";
    //                 });
    //                 $('#CLAVE_NUEVAEVIDENCIAMODAL').html(tempData);
    //             }
    //         });
    //     }
    //     else
    //     {
    //         tempData = "<option>Sin especificar</option>";
    //         $('#CLAVE_NUEVAEVIDENCIAMODAL').html(tempData);
    //     }
    // }

    // function select_clavesModal(Obj)
    // {
    //     tempData = $(Obj).prop("value");
    //     tempData = tempData.split("+=$=");
    //     if(tempData.length == 4)
    //     {
    //         $('#CLAVE_NUEVAEVIDENCIAMODAL2').html(tempData[0]);
    //         $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html(tempData[1]);
    //         $('#NOMBRE_NUEVAEVIDENCIAMODAL').html(tempData[2]);
    //         $('#ID_NUEVAEVIDENCIAMODAL').val(tempData[3]);
    //     }
    //     else
    //     {
    //         $('#CLAVE_NUEVAEVIDENCIAMODAL2').html("");
    //         $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html("");
    //         $('#NOMBRE_NUEVAEVIDENCIAMODAL').html("");
    //     }
    // }

    // function filterTableAsunt()
    // {
    //     var input, filter, table, tr, td, i;
    //     input = document.getElementById("idInputAsunto");
    //     filter = input.value.toUpperCase();
    //     table = document.getElementById("idTable");
    //     tr = table.getElementsByTagName("tr");

    //     for (i = 0; i < tr.length; i++)
    //     {
    //         td = tr[i].getElementsByTagName("td")[4];
    //         if (td)
    //         {
    //             if (td.innerHTML.toUpperCase().indexOf(filter) > -1)
    //             {
    //                 tr[i].style.display = "";
    //             }else
    //             {
    //                 tr[i].style.display = "none";
    //             }
    //         }
    //     }
    // }
//    function getDataTable()
//    {        
//        // $('#bodyTable').html(data);
//        $.ajax
//        ({
//            url: '../Controller/EvidenciasController.php?Op=getDataTable',
//            type: 'GET',
//            // data: '',
//            success:function(dataT)
//            {
//                reconstruirTable(dataT);
//            }
//        });
//    }

    function reconstruirTable(datos)
    {
        __datos=[];
        $.each(datos,function(index,value)
        {
            URL = 'filesEvidenciaDocumento/'+value.id_evidencias;
            $.ajax({
                    url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
                    type: 'GET',
                    data: 'URL='+URL,
                    });
            $.ajax({
                  url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                  type: 'GET',
                  data: 'URL='+URL,
                  async:false,
                  success: function(todo)
                  {
                        __datos.push(reconstruir(todo,value,index++));
                  }
                });
        });
//        moverA();
//            mover()
        return __datos;   
    }

    function construir(datosF)
    {
         db={
                loadData: function(filter) {
                        return listarDatosTodos();
              },
                  insertItem: function(item) {
                      return item;
              },
           } 
           
      window.db = db;   
$("#grid").jsGrid({
        onInit: function(args){
            gridInstance=args;
              jsGrid.ControlField.prototype.editButton=false;
              jsGrid.Grid.prototype.autoload=true;
        }, onDataLoading: function(args) {
            $("#loader").show();
    },
    onDataLoaded:function(args){
        $("#loader").hide();
    },
    onRefreshing: function(args) {
    },
        width: "100%",
        height: "300px",
//        editing: true,
        filtering:true,
        inserting:true,
        heading: true,
        sorting: true,
        paging: true,
        autoload:true,
        pageSize: 10,
        pageButtonCount: 5,
//        pageLoading :true,
        updateOnResize: true,
        confirmDeleting: true,
        controller:db,
        rowClick: function(args)
        {
        },
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
        { name: "id_evidencia", type: "text",fields:"f", width: "auto",visible:false },
        { name: "no", title:"No",type: "text", width: 28 },
        { name: "requisito",title:"Requisito", type: "text", width: 150 },
        { name: "registro",title:"Registro", type: "text", width: 150  },
        { name: "frecuencia",title:"Frecuencia", type: "text", width: 120  },
        { name: "clave_documento",title:"Clave Documento", type: "text",  width: 128 },
        { name: "adjuntar_evidencia",title:"Adjuntar Evidencia", type: "text",  width: 140 },
        { name: "fecha_registro",title:"Fecha Registro", type: "text", width: 120 },
        { name: "usuario",title:"Usuario", type: "text", width:150 },
        { name: "accion_correctiva",title:"Accion Correctiva", type: "text", width: 130},
        { name: "plan_accion",title:"Plan Accion", type: "text", width: 170 },
        { name: "desviacion",title:"Desviacion", type: "text", width: 120},
        {name: "validacion",title:"Validacion", type: "text", width: 200 },
        {type: "control" },
        {name:"eliminar",visible:false}
    ],
     onOptionChanged:function(a){
              },
          onItemDeleted: function(args){
              if(args["item"]["eliminar"]=="si"){
                  eliminarEvidencia(args["item"]["id_evidencia"]);
              }
          },
          onItemDeleting: function(args) {
              if(args["item"]["eliminar"]=="si"){
//                    args["item"]["eliminar"]="si";
                    eliminarEvidenciaGrid(args,args["item"]["id_evidencia"]);   
                }
                else{
                    args.cancel = true;
                    args["item"]["eliminar"]="no";
                     swal("","Error no se puede Eliminar ya contiene archivos adjuntos","error");
                    setTimeout(function(){swal.close();},1500);
                }
          },
          onItemInserting: function(args) {
            },
            onItemInserted:function (args){
            }
        });
      
    }
        function refresh()
    {       
        ejecutarPrimeraVez=false;
        ejecutando=false;
        clearInterval(intervalA);
        clearTimeout(timeOutA);
        $("#grid").jsGrid("render").done(function() {
            swalSuccess("Datos Cargados Exitosamente");
        });
//$("#grid").jsGrid("refresh");
    }
    function listarDatosTodos()
    {
        d=[];
        $.ajax
        ({
            url: '../Controller/EvidenciasController.php?Op=Listar',
            type: 'GET',
            async:false,
            beforeSend:function()
            {
//                $('#loader').show();
            },
            success:function(datos)
            {
                dataListado = datos;
                d=reconstruirTable(datos);
            },
            error:function(error)
            {
//                $('#loader').hide();
            }
        });
        return d;
    }
    
    
    
       function eliminarEvidenciaGrid(args,id_evidencias)
    {
        $.ajax({
            url: '../Controller/EvidenciasController.php?Op=EliminarEvidencia',
            type: 'POST',
            data: 'ID_EVIDENCIA='+id_evidencias,
            async:false,
            success:function(eliminado)
            {
                 if(eliminado==true){swalSuccess("Se elimino la evidencia");}else{swalError("No se pudo eliminar"); args.cancel = true;  }
            },
            error:function()
            {
                swalError("Error del servidor");
            }
        });
    }

    // function reconstruirTable(data)
    // {
    // }

function confirmarBorrarRegistroEvidencia(){
     swal({
          title: "ELIMINAR",
          text: "Al eliminar este registro se eliminara toda la evidencia registrada. ¿Desea continuar?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
          confirmButtonText: "Eliminar",
          cancelButtonText: "Cancelar",
        },function(res){
            if(res){
                  swal("","Eliminacion Exitosa","success");
              }
              else{
                 swal("","Error Al Eliminar","Error");
             }
        });
    }
        



    function reconstruirRow(id)
    {
        cargaUno=1;
        tempData = "";
        $.ajax({
            url: "../Controller/EvidenciasController.php?Op=ListarEvidencia",
            type: 'GET',
            data: 'ID_EVIDENCIA='+id,
            success:function(datos)
            {
                URL = 'filesEvidenciaDocumento/'+id;
                $.ajax({
                    url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                    type: 'GET',
                    data: 'URL='+URL,
                    // async: false,
                    success: function(todo)
                    {
                        $.each(datos,function(index,value)
                        {
                            tempData = reconstruir(todo,value,cargaUno);
                            $('#registro_'+id).html(tempData);
                            $('#loader').hide();
                            swal("","Modificado","success");
                            setTimeout(function(){swal.close();},1000);
                        });
                    },
                    error:function()
                    {
                        swal("","Error del servidor","error");
                        setTimeout(function(){swal.close();},1000);
                    }
                });
            },
            error:function()
            {
                swal("","Error del servidor","error");
                setTimeout(function(){swal.close();},1000);
            }
        });
    }

    function reconstruir2(todo,value,carga,contador)
    {
        tempData = "";
        tempArchivo="";
        noCheck = "<i class='fa fa-times-circle-o' style='font-size: xx-large;color:red;cursor:pointer' aria-hidden='true'";//cambiar color azul
        yesCheck = "<i class='fa fa-check-circle-o' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true'";
        noMsj = "<i class='fa fa-file-o' style='font-size: xx-large;color:#6FB3E0;cursor:pointer' aria-hidden='true'></i>";
        yesMsj = "<i class='ace-icon fa fa-file-text-o icon-animated-bell' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true'></i>";
        denegado = "<i class='fa fa-ban' style='font-size: xx-large;color:red;' aria-hidden='true'></i>";
        // $.each(todo,function(index,value)
        // {
            nametmp="";
            if(carga==0)
            tempData += "<tr name='registro_"+value.id_evidencias+"' id='registro_"+value.id_evidencias+"'>";
            tempData += "<td class='nuevoTdTable'  width='5%'>"+contador+"</td>";
            tempData += "<td class='nuevoTdTable' width='5%'>"+value.requisito+"</td>";
            tempData += "<td class='nuevoTdTable' width='5%'>"+value.registro+"</td>";
            tempData += "<td class='nuevoTdTable' width='10%'>"+value.frecuencia+"</td>";
            tempData += "<td class='nuevoTdTable' width='10%'>"+value.clave_documento+"</td>";
            // tempData += "<td class='nuevoTdTable'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";
            // tempData += "<td class='nuevoTdTable' style='font-size: -webkit-xxx-large;'><button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success'";
            // tempData += "data-toggle='modal' data-target='#mostrarRegistrosModal'>";
            // tempData += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i> Ver</button></td>";
            
            tempData += "<td style='font-size: -webkit-xxx-large;width:5% '><button onClick='mostrar_urls("+value.id_evidencias+","+value.validador+","+value.validacion_supervisor+","+value.id_usuario+");'";
            tempData += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
            tempData += "<i class='fa fa-cloud-upload' style='font-size: 15px'></i> Adjuntar</button></td>";
            $.each(todo[0],function(index2,value2)
            {
                nametmp = value2.split("^-O-^-M-^-G-^");
                fecha = new Date(nametmp[0]*1000);
                fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                tempData += "<td style='width:10%'>"+fecha+"</td>";
                // if(value.clasificacion=="")
                // {
                //     tempData += "<td><select class='select'";
                //     tempData += "onchange=\"saveComboToDatabase(this,'evidencias','clasificacion',"+value.id_evidencias+",'id_evidencias')\">";
                //     tempData += "<option value='0' selected></option>";
                //     tempData += "<option value='DIARIO'>DIARIO</option>";
                //     tempData += "<option value='MENSUAL'>MENSUAL</option>";
                //     tempData += "<option value='BIMESTRAL'>BIMESTRAL</option>";
                //     tempData += "<option value='ANUAL'>ANUAL</option>";
                //     tempData += "<option value='TIEMPO INDEFINIDO'>TIEMPO INDEFINIDO</option>";
                //     tempData += "</select></td>";
                // }
                // else
                // {
                    // tempData += "<td>"+value.clasificacion+"</td>";
                // }

                tempData += "<td width='10%'>"+value.usuario+"</td>";
                
                tempData += "<td width='5%' style='font-size: -webkit-xxx-large' onClick='MandarNotificacion("+value.id_responsable+","+value.responsable+",\""+value.accion_correctiva+"\","+value.id_evidencias+","+value.validador+");' data-toggle='modal' data-target='#MandarNotificacionModal'>";

                if(value.accion_correctiva!="")
                {
                    tempData += yesMsj+"</td>";
                }
                else
                {
                    tempData += noMsj+"</td>";
                }
                // if(value.validador=="0")
                // {
                    tempData += "<td width='10%' style='font-size: -webkit-xxx-large'><button id='btn_cargaGantt' class='btn btn-info' onClick='cargarprogram("+value.id_evidencias+","+value.validacion_supervisor+");'>";
                    if(value.validacion_supervisor=="true")
                        tempData += "Vizualizar Programa";
                    else
                        tempData += "Cargar Programa";
                    
                    tempData += "</button></td>";
                    tempData += "<td width='10%' style='font-size: -webkit-xxx-large' onClick='MandarNotificacionDesviacion("+value.id_usuario+","+value.responsable+",\""+value.desviacion+"\","+value.id_evidencias+");' data-toggle='modal' data-target='#MandarNotificacionModal'>";
                // }
                    if(value.desviacion!="")
                    {
                        tempData += yesMsj+"</td>";
                    }
                    else
                    {
                        tempData += noMsj+"</td>";
                    }

                if(value.responsable=="1")
                {                    
                    tempData += "<td width='5%' style='font-size: -webkit-xxx-large;'>";
                    if(value.validacion_supervisor=="true")
                        tempData += yesCheck;
                    else
                        tempData += noCheck;
                    tempData += "onclick=\"validarEvidencia(this,'evidencias','validacion_supervisor','id_evidencias',"+value.id_evidencias+","+value.id_usuario+")\"></i></td>";
                }
                else
                {
                    // tempData += "<td style='font-size: -webkit-xxx-large'>"+denegado+"</td>";
                    // tempData += "<td style='font-size: -webkit-xxx-large'>"+denegado+"</td>";
                    if(value.validacion_supervisor=='true')
                        tempData += "<td width='5%' style='font-size: -webkit-xxx-large'>"+yesCheck+" onClick='swalInfo(\"Validado por el responsable\")'></i>";
                    else
                        tempData += "<td width='5%' style='font-size: -webkit-xxx-large'>"+noCheck+" onClick='swalInfo(\"Aun no validado\")'></i>";
                        tempData += "</td>";
                }

                // tempData += "<td style='font-size: -webkit-xxx-large'><button onClick='MandarNotificacion("+value.id_documento+");' type='button' class='btn btn-success'";
                // tempData += "data-toggle='modal' data-target='#MandarNotificacionModal'>";

                // tempData += "<td contenteditable='true' onBlur=\"saveSingleToDatabase(this,'evidencias','accion_correctiva',"+value.id_evidencias+",'id_evidencias')\"";
                // tempData += " onkeyup=\"detectarsihaycambio(this)\">"+value.accion_correctiva+"</td>";

                // $tempData2 .= "<td onClick=\"saveCheckBoxToDataBase(this,'consult','$val[id_estructura]')\" id='consult_$val[id_estructura]'
                //  style='border-top: 1px solid;border-right: 1px solid;cursor:pointer;'></td>"; aqui hacer lo del check validacion
            });
            if(tempArchivo=="")
            {
                
                    tempData += "<td width='5%'></td><td>"+value.usuario+"</td>";
                    tempData += "<td width='5%'></td><td></td><td></td><td></td>";
                    if(value.responsable!="1" || value.validador==1)
                    {
                        tempData += "<td width='5%'>";
                        tempData += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                        tempData += "onclick='eliminarEvidencia("+value.id_evidencias+");'>";
                        tempData += "<i class=\"fa fa-trash\"></i></button></td>";
                    }
            }
            if(carga==0)
            tempData += "</tr>";
        // });
        return tempData;
    }

    // jajaja();
    // function jajaja()
    // {
    //     var b = {};
    //     b.val = "yo";
    //     b.lol = "tu";
    //     console.log(b);
    // }
    
    function reconstruir(todo,value,contador)//listo
    {
        tempData = new Object();
        tempArchivo="";
        noCheck = "<i class='fa fa-times-circle-o' style='font-size: xx-large;color:red;cursor:pointer' aria-hidden='true'></i>";
        yesCheck = "<i class='fa fa-check-circle-o' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true'></i>";
        noMsj = "<i class='fa fa-file-o' style='font-size: xx-large;color:#6FB3E0;cursor:pointer' aria-hidden='true'></i>";
        yesMsj = "<i class='ace-icon fa fa-file-text-o icon-animated-bell' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true'></i>";
        denegado = "<i class='fa fa-ban' style='font-size: xx-large;color:red;' aria-hidden='true'></i>";
            nametmp="";
            // if(carga==0)
            tempData.id_evidencia = value.id_evidencias;
            tempData.no = contador;
            tempData.requisito = value.requisito;
            tempData.registro = value.registro;
            tempData.frecuencia = value.frecuencia;
            tempData.clave_documento = value.clave_documento;
            
            tempData.adjuntar_evidencia = "<button onClick='mostrar_urls("+value.id_evidencias+","+value.validador+","+value.validacion_supervisor+","+value.id_usuario+");'";
            tempData.adjuntar_evidencia += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
            tempData.adjuntar_evidencia += "<i class='fa fa-cloud-upload' style='font-size: 15px'></i> Adjuntar</button>";
            $.each(todo[0],function(index2,value2)
            {
                tempArchivo="a";
                nametmp = value2.split("^-O-^-M-^-G-^");
                fecha = new Date(nametmp[0]*1000);
                fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                tempData.fecha_registro = fecha;

                tempData.usuario = value.usuario;

                tempData.accion_correctiva = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;' onClick='MandarNotificacion("+value.id_responsable+","+value.responsable+",\""+value.accion_correctiva+"\","+value.id_evidencias+","+value.validador+");' data-toggle='modal' data-target='#MandarNotificacionModal'>";
                if(value.accion_correctiva!="")
                {
                    tempData.accion_correctiva += yesMsj+"</button>";
                }
                else
                {
                    tempData.accion_correctiva += noMsj+"</button>";
                }
                
                tempData.plan_accion = "<button id='btn_cargaGantt' class='btn btn-info' onClick='cargarprogram("+value.id_evidencias+","+value.validacion_supervisor+");'>";
                if(value.validacion_supervisor=="true")
                    tempData.plan_accion += "Vizualizar Programa";
                else
                    tempData.plan_accion += "Cargar Programa";
                
                tempData.plan_accion += "</button>";

                tempData.desviacion = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;' onClick='MandarNotificacionDesviacion("+value.id_usuario+","+value.responsable+",\""+value.desviacion+"\","+value.id_evidencias+");' data-toggle='modal' data-target='#MandarNotificacionModal'>";
                if(value.desviacion!="")
                {
                    tempData.desviacion += yesMsj+"</button>";
                }
                else
                {
                    tempData.desviacion += noMsj+"</button>";
                }
                
                if(value.responsable=="1")
                {                    
                    tempData.validacion = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;' onClick='validarEvidencia(this,\"evidencias\",\"validacion_supervisor\",\"id_evidencias\","+value.id_evidencias+","+value.id_usuario+")'>";
                    if(value.validacion_supervisor=="true")
                        tempData.validacion += yesCheck+"</button>";
                    else
                        tempData.validacion += noCheck+"</button>";
                }
                else
                {
                    if(value.validacion_supervisor=='true')
                    {
                        tempData.validacion = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;' onClick='swalInfo(\"Validadopor el responsable\")'>";
                        tempData.validacion += yesCheck+"</button>";
                    }
                    else
                    {
                        tempData.validacion = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;'  onClick='swalInfo(\"Aun no validado\")'>";
                        tempData.validacion += noCheck+"</button>";
                    }
                }
            });
            if(tempArchivo=="")
            {
                    tempData.fecha_registro="";
                    tempData.usuario=value.usuario;
                    tempData.accion_correctiva="";
                    tempData.plan_accion="";
                    tempData.desviacion="";
                    tempData.validacion="";
                    if(value.responsable!="1" || value.validador==1)
                    {                        
                        tempData.opcion = "<button style='font-size:x-large;color:#39c;background:transparent;border:none;'";
                        tempData.opcion += "onclick='eliminarEvidencia("+value.id_evidencias+");'>";
                        tempData.opcion += "<i class='fa fa-trash'></i></button>";
                         tempData["eliminar"]="si";
                    }
                    else{
                        tempData.opcion="";
                         tempData["eliminar"]="no";
                    }

            }else{
            tempData.opcion="";
            tempData["eliminar"]="no";
            }
        return tempData;
    }

    function eliminarEvidencia(id_evidencias)
    {
        $.ajax({
            url: '../Controller/EvidenciasController.php?Op=EliminarEvidencia',
            type: 'POST',
            data: 'ID_EVIDENCIA='+id_evidencias,
            success:function(eliminado)
            {
//                (eliminado==true)?(swalSuccess("Se elimino la evidencia"),$('#registro_'+id_evidencias).remove()):swalError("No se pudo eliminar");
                 (eliminado==true)?(swalSuccess("Se elimino la evidencia")):swalError("No se pudo eliminar");
            },
            error:function()
            {
                swalError("Error del servidor");
            }
        });
    }

    // function validarEvidencia(checkbox,tabla,column,context,id,idPara)
    // {

    // }
    function validarEvidencia(checkbox,tabla,column,context,id,idPara)
    {
       
        no = "<i class='fa fa-times-circle-o' style='font-size: xx-large;color:red;cursor:pointer' aria-hidden='true' onclick=\"validarEvidencia(this,'evidencias','validacion_supervisor','id_evidencias',"+id+","+idPara+")\"></i>";
        yes = "<i class='fa fa-check-circle-o' style='font-size: xx-large;color:#02ff00;cursor:pointer' aria-hidden='true' onclick=\"validarEvidencia(this,'evidencias','validacion_supervisor','id_evidencias',"+id+","+idPara+")\"></i>";
        id_validacion_documento=id;
        objetocheckbox=checkbox;
        Obj = $(checkbox);
        Obj = Obj[0].children;
        ($(Obj).hasClass('fa-times-circle-o'))?valor=true:valor=false;
        // alert(valor);
        // alguno = $(checkbox).parent();
        // var checked = $(objetocheckbox).filter('[type=checkbox]')[0]['checked'];
        // if(checked==true)
        // {
        //     swal({
        //         title: "VALIDAR",
        //         text: "Una vez validada la evidencia no podra desvalidarla, confirme",
        //         type: "warning",
        //         showCancelButton: true,
        //         closeOnConfirm: false,
        //         showLoaderOnConfirm: true,
        //         },function(isConfirm)
        //         {
        //             if(isConfirm)
        //             {
                        $.ajax({
                            url: "../Controller/EvidenciasController.php?Op=ModificarColumna",
                            type: "POST",
                            data: "COLUMNA="+column+"&ID_CONTEXTO="+context+"&ID_EVIDENCIA="+id+"&VALOR="+valor,
                            success: function(data)
                            {
                                if(data==true)
                                {
                                    $(Obj[0]).removeClass( (valor==true)?'fa-times-circle-o' : "fa-check-circle-o" );
                                    $(Obj[0]).addClass( (valor==true)? 'fa-check-circle-o' : 'fa-times-circle-o' );
                                    $(Obj[0]).css("color", (valor==true)? "#02ff00" : "red" );

                                    enviar_notificacion( ((valor==true)?
                                     "Ha sido validada una Evidencia por ":
                                     "Ha sido desvalidada una Evidencia por "),idPara,0,false,"EvidenciasView.php?accion="+id);
                                     $("#btn_cargaGantt").html( (valor==true)?"Vizualizar Programa":"Cargar Programa" );
                                }
                            },
                            error:function()
                            {
                                swalError("Error en el servidor");
                            }
                            });
        //             }
        //             else
        //             {
        //                 inputs = $(objetocheckbox).filter('[type=checkbox]');
        //                 inputs[0]['checked']=false;
        //             }
        //     });
        // }
    }
    
    function MandarNotificacionDesviacion(idPara,responsable,msj,idEvidencia)
    {
        if(responsable==1)
        {
            tempData = "<button onClick='notificar("+idPara+","+idEvidencia+",\"desviacion\")' type='submit' id='subirArchivos'  class='btn crud-submit btn-info form-control'>Enviar</button>";
            $("#BTNENVIAR_MANDARNOTIFICACIONMODAL").html(tempData);
            $("#textAreaNotificacionModal").val(msj);
            $("#myModalLabelMandarNotificacion").html("Mandar Desviación");
        }
        else
        {
            $("#BTNENVIAR_MANDARNOTIFICACIONMODAL").html("");
            $("#textAreaNotificacionModal").val(msj);
            $("#myModalLabelMandarNotificacion").html("Desviación Recibida");
        }
    }

    function MandarNotificacion(idPara,responsable,msj,idEvidencia,validador)
    {
        if(responsable!=1 || validador==1)
        {
            tempData = "<button onClick='notificar("+idPara+","+idEvidencia+",\"accion_correctiva\")' type='submit' id='subirArchivos'  class='btn crud-submit btn-info form-control'>Enviar</button>";
            $("#BTNENVIAR_MANDARNOTIFICACIONMODAL").html(tempData);
            $("#textAreaNotificacionModal").val(msj);
            $("#myModalLabelMandarNotificacion").html("Enviar Accion Correctiva");
        }
        else
        {
            $("#BTNENVIAR_MANDARNOTIFICACIONMODAL").html("");
            $("#textAreaNotificacionModal").val(msj);
            $("#myModalLabelMandarNotificacion").html("Accion Correctiva Recibida");
        }
    }

    function notificar(idPara,idEvidencia,columna)
    {
        mensaje = $("#textAreaNotificacionModal").val();
        if(columna=='accion_correctiva')
            enviar_notificacion("Ha recibido una Acción Correctiva de ",idPara,0,false,"EvidenciasView.php?accion="+idEvidencia);//msj,para,tipomsj,atendido,asunto
        else
            enviar_notificacion("Ha recibido una Desviación de ",idPara,0,false,"EvidenciasView.php?accion="+idEvidencia);//msj,para,tipomsj,atendido,asunto
        $.ajax({
              url: '../Controller/EvidenciasController.php?Op=MandarAccionCorrectiva',
              type: 'GET',
              data: 'ID_EVIDENCIA='+idEvidencia+'&MENSAJE='+mensaje+'&COLUMNA='+columna,
              success:function(enviado)
              {
                  (enviado==true)?(
                      swalSuccess("Accion correctiva enviada"),
                      reconstruirRow(idEvidencia)
                      ):swalError("No se pudo enviar accion correctiva");
              },
              error:function()
              {
                  swalError("Error en el servidor");
              }
          });
    }
    
    function enviar_notificacion(mensaje,para,tipoMensaje,atendido,asunto)
    {
          $.ajax({
             url:"../Controller/NotificacionesController.php?Op=EnviarNotificacionHibry",
             data: "PARA="+para+"&MENSAJE="+mensaje+"&ATENDIDO="+atendido+"&TIPO_MENSAJE="+tipoMensaje+"&ASUNTO="+asunto,
             success:function(response)
             {
                (response==true)?
                swalSuccess("Se notifico del cambio "):swalError("No se pudo notificar");
             },
             error:function()
             {
                swalError("Error en el servidor");
             }
          });
    }

    function saveOneToDatabase(valor,columna,tabla,id,contexto)
    {
        $.ajax({
                url: "../Controller/GeneralController.php?Op=ModificarColumna",
                type: 'GET',
                data: 'TABLA='+tabla+'&COLUMNA='+columna+'&VALOR='+valor+'&ID='+id+'&ID_CONTEXTO='+contexto,
                success: function(modificado)
                {
                    if(modificado==true)
                    {
                        reconstruirRow(id);
                        // $('#loader').hide();
                        // swal("","Modificado","success");
                        // setTimeout(function(){swal.close();},1000);
                    }
                    else
                    {
                        $('#loader').hide();
                        swal("","Ocurrio un error al modificar", "error");
                    }
                  $("#btnAgregarEvidenciasRefrescar").prop("disabled",false);  
                },
                error:function()
                {
                    $('#loader').hide();
                    swal("","Ocurrio un error al modificar", "error");
                    $("#btnAgregarEvidenciasRefrescar").prop("disabled",false);
                }
            });
    }
    
    function saveCheckToDatabase(Obj,columna,tabla,id)
    {

    }

    var ModalCargaArchivo = "<form id='fileupload' method='POST' enctype='form-data'>";
        ModalCargaArchivo += "<div class='fileupload-buttonbar'>";
        ModalCargaArchivo += "<div class='fileupload-buttons'>";
        ModalCargaArchivo += "<span class='fileinput-button'>";
        ModalCargaArchivo += "<span id='spanAgregarDocumento'><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
        ModalCargaArchivo += "<input type='file' name='files[]' ></span>";
        ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
        ModalCargaArchivo += "<div class='fileupload-progress' >";
        // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
        ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
        ModalCargaArchivo += "</div></div>";
        ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";

    $("#subirArchivos").click(function()
    {
        agregarArchivosUrl();
        $("#subirArchivos").attr("disabled",true);
    });

    function mostrar_urls(id_evidencia,validador,validado,id_para)
    {
        // $('#loader').show();
        var tempDocumentolistadoUrl = "";
        URL = 'filesEvidenciaDocumento/'+id_evidencia;
        $.ajax({
          url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
          type: 'GET',
          data: 'URL='+URL,
        //   async:false,
          success:function(creado)
          {
            if(creado==1)
            {
              $.ajax({
                  url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                  type: 'GET',
                  data: 'URL='+URL,
                //   async:false,
                  success: function(todo)
                  {
                      // console.log(todo[0].length);
                      if(todo[0].length!=0)
                      {
                              tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                              $.each(todo[0], function (index,value)
                              {
                                      nametmp = value.split("^-O-^-M-^-G-^");
                                      name;
                                      fecha = new Date(nametmp[0]*1000);
                                      fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                                      $.each(nametmp, function(index,value)
                                      {
                                              if(index!=0)
                                                      (index==1)?name=value:name+="-"+value;
                                      });
                                      tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                      tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+name+"'>"+name+"</a></td><td>";
                                      if(validador=="1")
                                      {
                                        if(validado==false)
                                        {
                                            tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                                            tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                                            tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
                                        }
                                      }
                                      tempDocumentolistadoUrl += "</td></tr>";
                              });
                              tempDocumentolistadoUrl += "</tbody></table>";
                      }
                      if(tempDocumentolistadoUrl == "")
                      {
                            tempDocumentolistadoUrl = " No hay archivos agregados ";
                            if(validador=="1")
                            {
                                if(validado==false)
                                {
                                    $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                                }
                            }
                      }
                      else
                      {
                        $('#DocumentolistadoUrlModal').html("");
                      }
                      tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdEvidenciaDocumento' type='text' style='display:none;' value='"+id_evidencia+"'>"
                      tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdParaDocumento' type='text' style='display:none;' value='"+id_para+"'>";
                      $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                      $('#fileupload').fileupload
                      ({
                        url: '../View/',
                      });
                      $("#subirArchivos").removeAttr("disabled");
                    //   $('#loader').hide();
                  }
              });
            }
            else
            {
              swal("","Error del servidor","error");
              $('#loader').hide();
            }
          }
        });
    }
    // function aumentador()
    // {
    //     alert();
    //     $.ajax({
    //         // url:"../Controller/GeneralController.php?a",
    //         success:function()
    //         {
    //             valor--;
    //         }
    //     });
    // }
    // valor = 8;
    function borrarArchivo(url,id_para)
    {
        // setInterval(aumentador(), 3000);
        swal({
          title: "ELIMINAR",
          text: "Al eliminar este documento se eliminara toda la evidencia registrada. ¿Desea continuar?",
          type: "warning",
          showCancelButton: true,
          closeOnConfirm: false,
          showLoaderOnConfirm: true,
          confirmButtonText: "Eliminar",
          cancelButtonText: "Cancelar",
        },function()
        {
          var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();
          $.ajax({
            url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
            type: 'POST',
            data: 'URL='+url,
            success: function(eliminado)
            {
              if(eliminado)
              {
                mostrar_urls(ID_EVIDENCIA_DOCUMENTO,"1",false,id_para);
//                refresh();
                //eliminar parte del registro en la base de datos
                swal("","Archivo eliminado");
                setTimeout(function(){swal.close();},1000);
                 refresh();
              }
              else
                swal("","Ocurrio un error al elimiar el documento", "error");
            },
            error:function()
            {
              swal("","Ocurrio un error al elimiar el documento", "error");
            }
          });
        });
    }

    function agregarArchivosUrl()
    {
      var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();
      url = 'filesEvidenciaDocumento/'+ID_EVIDENCIA_DOCUMENTO,
      $.ajax({
        url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
        type: 'GET',
        data: 'URL='+url,
        success:function(creado)
        {
          if(creado){
            $('.start').click();
//            refresh();
            }
//        gridInstance["data"]["fecha_registro"]="d";
//        console.log(gridInstance);
        },
        error:function()
        {
          swal("","Error del servidor","error");
        }
      });
    }

    function mostrarRegistros(id_documento)
    {
        ValoresRegistros = "<ul>";
        //alert("Registros"+id_documento);
        
        $.ajax
        ({
            url:"../Controller/EvidenciasController.php?Op=MostrarRegistrosPorDocumento",
            type: 'POST',
            data: 'ID_DOCUMENTO='+id_documento,
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
    intervalA="";
    timeOutA="";
    mover = '<?php echo $accion; ?>';
    // contador=1;
    cambio=1;
    ejecutando=false;
    ejecutarPrimeraVez=true;
    
    function moverA()
    {
        if(mover!="-1" && ejecutando==false && ejecutarPrimeraVez==true)
        {
            if($("#registro_"+mover)[0]!=undefined)
            {
                ejecutando=true;
                window.location = "#registro_"+mover;
                ObjB = $("#registro_"+mover)[0];
                css = $(ObjB).css("background");
                intervalA = setInterval(function()
                {
                    if(cambio==1)
                    {
                        $(ObjB).css("background","#DEB887");
                        cambio=0;
                    }
                    else
                    {
                        $(ObjB).css("background",css);
                        cambio=1;
                    }
                },500);
                timeOutA = setTimeout(function(){
                    clearInterval(intervalA);
                    $(ObjB).css("background",css);
                    ejecutando=false;
                    // contador=1;
                    ejecutarPrimeraVez=false;
                },10000);
            }
            else
            {
                swalInfo("El registro al que desea acceder no existe");
            }
        }
    }

    function swalError(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"error"
            });
        setTimeout(function(){swal.close();$('#agregarUsuario .close').click()},1500);
        $('#loader').hide();
    }
//    listarDatosGrid();
//    construirGrid(dataTodo);
//    listarDatos();
    construir();
//      construir(dataTodo);
    function cargarprogram(v,validado)
    {
//    alert("el valor de la evidencia es "+v);
//alert("e:  "+validado);
    window.location.href="GanttEvidenciaView.php?id_evid="+v;
    
    }
    
    
    
    
    
    
    
</script>

<script id="template-upload" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload" style="width:100%">
            <td>
            <span class="preview"></span>
            </td>
            <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error"></strong>
            </td>
            <td>
            <p class="size">Processing...</p>
            <!-- <div class="progress"></div> -->
            </td>
            <td>
            {% if (!i && !o.options.autoUpload) { if(noArchivo==0){ %}
                    <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
            {% } } %}
            {% if (!i) { %}
                    <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button>
            {% } %}
            </td>
        </tr>
        {% if(i==0){ $('.fileupload-buttonbar').html(""); } %}
    {% noArchivo=1; } %}
</script>

<script id="template-download" type="text/x-tmpl">
    {% var t = $('#fileupload').fileupload('active'); var i,file;%}
    {% for (i=0,file; file=o.files[i]; i++) { %}
        <tr class="template-download">
            <td>
            <span class="preview">
                    {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                    {% } %}
            </span>
            </td>
            <td>
            <p class="name">
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            </td>
            <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
            </td>
            <!-- <td> -->
            <!-- <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> -->
            <!-- <input type="checkbox" name="delete" value="1" class="toggle"> -->
            <!-- </td> -->
        </tr>
    {% } %}
    {% if(t == 1){ if( $('#tempInputIdEvidenciaDocumento').length > 0 ) { var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();var ID_PARA_DOCUMENTO = $('#tempInputIdParaDocumento').val(); mostrar_urls(ID_EVIDENCIA_DOCUMENTO,'1',false,ID_PARA_DOCUMENTO); refresh(); noArchivo=0; } } %}
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
    <script src="../../assets/FileUpload/js/tmpl.min.js"></script>
    <script src="../../assets/FileUpload/js/load-image.all.min.js"></script>
    <script src="../../assets/FileUpload/js/canvas-to-blob.min.js"></script>
    <script src="../../assets/FileUpload/js/jquery.blueimp-gallery.min.js"></script>
    <script src="../../assets/FileUpload/js/jquery.iframe-transport.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-process.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-image.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-audio.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-video.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-validate.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-ui.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-jquery-ui.js"></script>
    <script src="../../assets/FileUpload/js/main.js"></script>
    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
    <noscript><link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">
</body>
</html>



