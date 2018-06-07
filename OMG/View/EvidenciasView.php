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

    <!--jquery-->
    <script src="../../js/jquery.js" type="text/javascript"></script>
    <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
    
    <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
    
    <script src="../../js/jquery.js" type="text/javascript"></script>


    <style>
        
        .modal-body{
            color:#888;
            /*max-height: calc(100vh - 210px);*/
            max-height: calc(100vh - 110px);
            overflow-y: auto;
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
        .backgroundTdTable
        {
            background: gold;
        }
        .nuevoTdTable
        {
            border-bottom: 1px solid gold;
            background: lightgoldenrodyellow;
        }
        
        </style>
</head>
<!-- <body> -->
<body class="no-skin" onload="loadSpinner()">
    <div id="loader"></div>
    
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
            array("Clave","Nombre Documento","Responsable Documento","Registros","Achivo Adjunto",
                "Fecha Registro","Clasificación","Acción Correctiva Inmediata","Plan de Acción","Desviación","Validación","Opcion"
                /*,"Ingresar Oficio Atención","Oficio de Atención"*/);
    ?>
    
    <div style="position: fixed;">

        <button onClick="" type="button" 
        class="btn btn-success" data-toggle="modal" data-target="#nuevaEvidenciaModal">
            Agregar Nuevo Registro
        </button>

        <button id="btnAgregarEvidenciasRefrescar" type="button" 
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

    <!-- <div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom"> -->
        <div class="table-container">
            <table id="idTable" class="tbl-qa">
                <tr>
                <?php foreach($titulosTable as $index=>$value)
                { if($index<4){ ?>
                <th class="backgroundTdTable"><?php echo $value ?></th>
                <?php }else{ ?>
                    <th class="table-header"><?php echo $value ?></th>
                <?php   } 
                } ?>
                </tr>
                
                <tbody id="bodyTable">
                    
                </tbody>
            </table>
        </div>
    <!-- </div> -->
</body>




<!-- Inicio de Seccion Modal Crear nueva Evidencia-->
<div class="modal draggable fade" id="nuevaEvidenciaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                <div class="form-group">
                    <input id="ID_NUEVAEVIDENCIAMODAL" type="text" value="" style="display: none"/>
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
          <h4 class="modal-title" id="myModalLabel">Lista Registros</h4>
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
	<div class="modal-dialog" role="document">
        <!-- <div id="loaderModalMostrar"></div> -->
		<div class="modal-content">
                        
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">Archivos Adjuntos</h4>
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
          <h4 class="modal-title" id="myModalLabel">Mandar Notificación</h4>
        </div>

        <div class="modal-body">
            <div class="form-group">
                <label class="control-label" for="title">Mensaje:</label>
                <textarea id="textAreaNotificacionModal" class="form-control" ></textarea>
            </div>

            <div class="form-group" method="post" >
                <button onClick="notificar()" type="submit" id="subirArchivos"  class="btn crud-submit btn-info">Enviar</button>
            </div>
        </div>
      </div>
    </div>
</div>
<!--cierre del modal Mensaje-->

<script>

    var data="";
    var dataTemp="";
    var si_hay_cambio=false;
    
    $(function()
    {
        listarDatos();
    });
    
    function saveSingleToDatabase(Obj,tabla,columna,id,contexto) {
      
            if(si_hay_cambio==true){
            $("#btnAgregarEvidenciasRefrescar").prop("disabled",true);
            
            $(Obj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
            
            saveOneToDatabase(Obj.innerHTML,columna,tabla,id,contexto);
            
            si_hay_cambio=false;

        } 

    }
                
                
    function saveComboToDatabase(Obj,tabla,columna,id,contexto)
    {
        valortmp = $(Obj)[0];
        Objtmp=valortmp[valortmp.selectedIndex].innerHTML;
        //poner alerta para valores
        // alert(Objtmp);
        if(Objtmp!=" ")
        {
            swal({
                    title:"SELECCIONAR",
                    text: "Una vez seleccionado no se puede cambiar",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
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
            beforeSend:function()
            {
                $('#loader').show();
            },
            success:function(datos)
            {
                data = datos;
                reconstruirTable(datos);
            },
            error:function(error)
            {
                $('#loader').hide();
            }
        });
    }


    function refresh()
    {       
        listarDatos();
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
                url: '../Controller/EvidenciasController.php?Op=getClavesDocumentos',
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
                        tempData += "+=$="+apellidos+"+=$="+value.ID_DOCUMENTO+"'>";
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
        if(tempData.length == 4)
        {
            $('#CLAVE_NUEVAEVIDENCIAMODAL2').html(tempData[0]);
            $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html(tempData[1]);
            $('#NOMBRE_NUEVAEVIDENCIAMODAL').html(tempData[2]);
            $('#ID_NUEVAEVIDENCIAMODAL').val(tempData[3]);
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
        clave = $('#ID_NUEVAEVIDENCIAMODAL').val();
        if(clave!="")
        {

            $.ajax
            ({
                url: '../Controller/EvidenciasController.php?Op=CrearEvidencia',
                type: 'POST',
                data: 'CLAVE_DOCUMENTO='+clave,
                success:function(data)
                {
                    (data)?
                    (swal({
                        title: '',text: 'Se creo la evidencia',
                        showCancelButton: false,showConfirmButton: false,
                        type:"success"
                        }),
                        $('#CLAVE_NUEVAEVIDENCIAMODAL2').html(""),
                        $('#DOCUMENTO_NUEVAEVIDENCIAMODAL').html(""),
                        $('#NOMBRE_NUEVAEVIDENCIAMODAL').html(""),
                        $('#nuevaEvidenciaModal .close').click(),
                        listarDatos()
                    )
                    :swal({
                        title: '',
                        text: 'Error al crear',
                        showCancelButton: false,
                        showConfirmButton: false,
                        type:"error"
                    });
                    setTimeout(function(){swal.close();},1500);

                }
            });
        }
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
    
    function reconstruirTable(data)
    {
        cargaTodo=0;
        tempData = "";
        $.each(data,function(index,value)
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
                  async: false,
                  success: function(todo)
                  {
                    tempData += reconstruir(todo,value,cargaTodo);
                  }
                });
        });
        $('#bodyTable').html(tempData);
        $('#loader').hide();
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

    function reconstruir(todo,value,carga)
    {
        tempData = "";
        tempArchivo="";
        // $.each(todo,function(index,value)
        // {
            nametmp="";
            if(carga==0)
            tempData += "<tr id='registro_"+value.id_evidencias+"'>";
            tempData += "<td class='nuevoTdTable'>"+value.clave_documento+"</td>";
            tempData += "<td class='nuevoTdTable'>"+value.documento+"</td>";
            tempData += "<td class='nuevoTdTable'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";                    
            tempData += "<td class='nuevoTdTable' style='font-size: -webkit-xxx-large;'><button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success'";
            tempData += "data-toggle='modal' data-target='#mostrarRegistrosModal'>";
            tempData += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i> Ver</button></td>";
            
            tempData += "<td style='font-size: -webkit-xxx-large'><button onClick='mostrar_urls("+value.id_evidencias+");'";
            tempData += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
            tempData += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button></td>";
            $.each(todo[0],function(index2,value2)
            {
                nametmp = value2.split("^");
                tempArchivo = nametmp[0];
                // fechaAdjunto=nametmp[0];
                tempData += "<td>"+nametmp[0]+"</td>";
                if(value.clasificacion=="")
                {
                    tempData += "<td><select class='select'";
                    tempData += "onchange=\"saveComboToDatabase(this,'evidencias','clasificacion',"+value.id_evidencias+",'id_evidencias')\">";
                    tempData += "<option value='0' selected></option>";
                    tempData += "<option value='DIARIO'>DIARIO</option>";
                    tempData += "<option value='MENSUAL'>MENSUAL</option>";
                    tempData += "<option value='BIMESTRAL'>BIMESTRAL</option>";
                    tempData += "<option value='ANUAL'>ANUAL</option>";
                    tempData += "<option value='TIEMPO INDEFINIDO'>TIEMPO INDEFINIDO</option>";
                    tempData += "</select></td>";
                }
                else
                {
                    tempData += "<td>"+value.clasificacion+"</td>";
                }
                tempData += "<td contenteditable='true' onBlur=\"saveSingleToDatabase(this,'evidencias','accion_correctiva',"+value.id_evidencias+",'id_evidencias')\"";
                tempData += " onkeyup=\"detectarsihaycambio(this)\">"+value.accion_correctiva+"</td>";
                tempData += "<td style='font-size: -webkit-xxx-large'><button class='btn btn-info' onClick='#("+value.id_evidencias+");'>";
                tempData += "Cargar Programa</button></td>";

                tempData += "<td style='font-size: -webkit-xxx-large'><button onClick='MandarNotificacion("+value.id_documento+");' type='button' class='btn btn-success'";
                tempData += "data-toggle='modal' data-target='#MandarNotificacionModal'>";
                tempData += "<i class='ace-icon fa fa-envelope' style='font-size: 20px;'></i> Escribir desviación</button></td>";

                tempData += "<td style='font-size: -webkit-xxx-large;'><input type='checkbox' style='width:40px;height:40px;margin:28px 0 0;' name='checkbox'";
                if(value.validacion_supervisor=='true')
                    tempData += " checked disabled";
                else
                    tempData += " onchange=\"saveCheckBoxToDataBase(this,'evidencias','validacion_supervisor','id_evidencias',"+value.id_evidencias+")\"";
                tempData += "></td>"
            });
            if(tempArchivo=="")
            {
                tempData += "<td></td><td></td><td></td><td></td><td></td><td></td>";
                tempData += "<td>";
                tempData += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                tempData += "onclick='eliminarEvidencia("+value.id_evidencias+");'>";
                tempData += "<i class=\"fa fa-trash\"></i></button></td>";
            }
            if(carga==0)
            tempData += "</tr>";
        // });
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
                (eliminado==true)?(swal("","Se elimino la evidencia","success"),$('#registro_'+id_evidencias).remove()):swal("","No se pudo eliminar","error");
                setTimeout(function(){swal.close();},1000);
            },
            error:function()
            {
                swal("","Error del servidor","error");
                setTimeout(function(){swal.close();},1000);
            }
        });
    }
    function saveCheckBoxToDataBase(checkbox,tabla,column,context,id)
    {
        id_validacion_documento=id;
        columna=column;
        objetocheckbox=checkbox;
        var checked = $(objetocheckbox).filter('[type=checkbox]')[0]['checked'];
        if(checked==true)
        {
            swal({
                title: "VALIDAR",
                text: "Una vez validada la evidencia no podra desvalidarla, confirme",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
                },function(isConfirm)
                {
                    if(isConfirm)
                    {
                        $.ajax({
                            url: "../Controller/GeneralController.php?Op=ModificarColumna",
                            type: "POST",
                            data: "TABLA="+tabla+"&COLUMNA="+column+"&ID_CONTEXTO="+context+"&ID="+id+"&VALOR="+true,
                            success: function(data)
                            {
                                if(data)
                                {
                                    $(objetocheckbox).attr('disabled','true');
                                    swal("","Evidencia validada");
                                    setTimeout(function(){swal.close();},1000);
                                    if(columna=="desviacion_mayor")
                                    {
                                        enviar_notificacion();
                                    }
                                }
                            }
                            });
                    }
                    else
                    {
                        inputs = $(objetocheckbox).filter('[type=checkbox]');
                        inputs[0]['checked']=false;
                    }
            });
        }
    }

    function notificar(Obj)
    {
        mensaje = $(textAreaNotificacionModal).val();
        enviar_notificacion(mensaje,'admin',0,false);//msj,para,tipomsj,atendido
    }

    function enviar_notificacion(mensaje,para,tipoMensaje,atendido)
    {
        //   var u=$("#user").val();
          $.ajax({
             url:"../Controller/NotificacionesController.php?Op=EnviarNotificacionHibry",
             data: "PARA="+para+"&MENSAJE="+mensaje+"&ATENDIDO="+atendido+"&TIPO_MENSAJE="+tipoMensaje,
             success:function(response)
             {
                (response==true)?
                swal("","Mensaje enviado","success"):swal("","No se pudo enviar la notificacion","error");
                setTimeout(function(){swal.close();},1500);
             },
             error:function()
             {
                swal("","Error del servidor","error");
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
        ModalCargaArchivo += "<input type='file' name='files[]'></span>";
        ModalCargaArchivo += "<span class='fileupload-process'></span></div>";
        ModalCargaArchivo += "<div class='fileupload-progress' >";
        // ModalCargaArchivo += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
        ModalCargaArchivo += "<div class='progress-extended'>&nbsp;</div>";
        ModalCargaArchivo += "</div></div>";
        ModalCargaArchivo += "<table role='presentation'><tbody class='files'></tbody></table></form>";

    $("#subirArchivos").click(function()
    {
        agregarArchivosUrl();
    });

    function mostrar_urls(id_evidencia)
    {
        var tempDocumentolistadoUrl = "";
        URL = 'filesEvidenciaDocumento/'+id_evidencia;
        $.ajax({
          url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
          type: 'GET',
          data: 'URL='+URL,
          success:function(creado)
          {
            if(creado)
            {
              $.ajax({
                  url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                  type: 'GET',
                  data: 'URL='+URL,
                  success: function(todo)
                  {
                      // console.log(todo[0].length);
                      if(todo[0].length!=0)
                      {
                              tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                              $.each(todo[0], function (index,value)
                              {
                                      nametmp = value.split("^");
                                      name;
                                      fecha = nametmp[0];
                                      $.each(nametmp, function(index,value)
                                      {
                                              if(index!=0)
                                                      (index==1)?name=value:name+="-"+value;
                                      });
                                      tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                                      tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\">"+name+"</a></td>";
                                      tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                                      tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                                      tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                              });
                              tempDocumentolistadoUrl += "</tbody></table>";
                      }
                      if(tempDocumentolistadoUrl == "")
                      {
                            tempDocumentolistadoUrl = " No hay archivos agregados ";
                            $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
                      }
                      else
                      {
                        $('#DocumentolistadoUrlModal').html("");
                      }
                      tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdEvidenciaDocumento' type='text' style='display:none;' value='"+id_evidencia+"'>";
                      $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
                      $('#fileupload').fileupload
                      ({
                        url: '../View/',
                      });
                  }
              });
            }
            else
            {
              swal("","Error del servidor","error");
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
    function borrarArchivo(url)
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
                mostrar_urls(ID_EVIDENCIA_DOCUMENTO);
                refresh();
                //eliminar parte del registro en la base de datos
                swal("","Archivo eliminado");
                setTimeout(function(){swal.close();},1000);
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
          if(creado)
            $('.start').click();
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
    noArchivo=0;
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
    {% if(t == 1){ if( $('#tempInputIdEvidenciaDocumento').length > 0 ) { var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val(); mostrar_urls(ID_EVIDENCIA_DOCUMENTO); reconstruirRow(ID_EVIDENCIA_DOCUMENTO); noArchivo=0; } } %}
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
        <script src="../../assets/FileUpload/js/jquery.min.js"></script>
        <script src="../../assets/FileUpload/js/jquery-ui.min.js"></script>
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