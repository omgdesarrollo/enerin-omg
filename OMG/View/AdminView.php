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
        
                
        <!-- <link href="../../css/loaderanimation.css" rel="stylesheet" type="text/css"/>
        <script src="../../js/loaderanimation.js" type="text/javascript"></script>       -->
        
        <!--en esta seccion es para poder abrir el modal--> 
        <!--<script src="../../assets/probando/js/bootstrap.min.js" type="text/javascript"></script>-->             
        <!--<link href="../../codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>-->
        <!--<link rel="stylesheet" type="text/css" href="../../codebase/dhtmlx.css"/>-->
        <!--<script src="../../codebase/dhtmlx.js"></script>-->
        <!--aqui termina la seccion para poder abrir el modal-->
        <link href="../../css/modal.css" rel="stylesheet" type="text/css"/>
        <!-- swal -->
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
        <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <!-- <script src="../../assets/probando/js/ace-elements.min.js"></script>
        <script src="../../assets/probando/js/ace.min.js"></script>         -->
                
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
            /* ::-webkit-scrollbar
            {
                display: none;
            } */
            /* Oculta los scroll */

    /*Finaliza estilos para mantener fijo el header*/                
        </style>
    </head>

    <!-- <div id="winVP"> -->
    <body class="no-skin" onload="loadSpinner()">
        <div id="loader"></div>
        <?php
            require_once 'EncabezadoUsuarioView.php';
        ?>

        <div style="height: 5px"></div>
        <div style="position: fixed;">

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarUsuario">
                Agregar Usuario
            </button>
        </div>

        <div style="height: 50px"></div>

<!-- <div class="table-fixed-header" style="display:block;" id="myDiv" class="animate-bottom"> -->
    <div class="table-container">
        <table id="idTable" style="width:100%" class="tbl-qa">
            <tr>
                <th class="table-header">Usuario</th>
                <th class="table-header">Nombre</th>
                <!-- <th class="table-header">Apellido Paterno</th> -->
                <!-- <th class="table-header">Apellido Materno</th> -->
                <th class="table-header">Correo</th>
                <th class="table-header">Categoria</th>
                <th class="table-header">Permisos</th>
            </tr>
            <tbody id="bodyTableAgregar">
            </tbody>
        </table>
    </div>

        <!-- Modal agregar usuario -->
        <div class="modal draggable fade" id="agregarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Empleado/Usuario: </label>
                            <div class="dropdown">
                                <input style="width:60%" type="text" class="dropdown-toggle" id="NOMBREESCRITURA_AGREGARUSUARIO" data-toggle="dropdown" onkeyup="buscarEmpleados(this)"/>
                                    <ul style="width:60%;cursor:pointer;" class="dropdown-menu" id="dropdownEvent" role="menu" 
                                    aria-labelledby="menu1"></ul>* Este sera el nombre de usuario.
                            </div>
                        </div>
                        <div id="INFO_AGREGARUSUARIO">
                            <div class="form-group">
                                Nombre:
                            </div>
                            <div class="form-group">
                                Correo:
                            </div>
                            <div class="form-group">
                                Categoria:
                            </div>
                            <div class="form-group" method="post">
                                <button type="submit" class="btn crud-submit btn-info">Agregar Usuario</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin del modal agregar usuario -->

        <!-- Modal modificar permisos -->
        <div class="modal draggable fade" id="modificarPermisos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                    </div>

                    <div class="modal-body" style="width: -webkit-fill-available;">
                        <div class="form-group">
                            <div class="table-container" style="max-height:none;">
                                <table style="width:100%" class="tbl-qa">
                                    <tr>
                                        <th class="table-header">Menu</th>
                                        <th class="table-header">Vistas</th>
                                        <th class="table-header">Ver</th>
                                        <th class="table-header">Guardar</th>
                                        <th class="table-header">Modificar</th>
                                        <th class="table-header">Eliminar</th>
                                    </tr>
                                    <tbody id="bodyTablePermisos">

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="form-group" method="post">
                            <button type="submit" id="BTN_MODIFICARPERMISOS" onClick="" class="btn crud-submit btn-info">Guardar Cambios</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- fin del modal agregar usuario -->

    </body>
    <!-- </div> -->


<script>
    function loadSpinner()
    {
        myFunction();
    }
    loadUsuarios();

    function loadUsuarios()
    {
        $.ajax({
            url: '../Controller/AdminController.php?Op=Listar',
            type: 'GET',
            beforeSend:function()
            {
                $('#loader').show();
            },
            success:function(usuarios)
            {
                tempData = "";
                $.each(usuarios,function(index,value)
                {
                    tempData += "<tr id='registro_"+value.id_usuario+"'>";
                    tempData += construirTablaAgregar(value);
                    tempData += "</tr>";
                });
                $('#bodyTableAgregar').html(tempData);
            },
            error:function(error)
            {
                swalError("Error en el servidor");
            }
        });
    }

    function loadUsuario()
    {

    }

    function construirTablaAgregar(value)
    {
        // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
        tempData = "<td>"+value.nombre_usuario+"</td>";
        tempData += "<td>"+value.nombre+"</td>";
        // tempData += "<td>"+value.apellido_paterno+"</td>";
        // tempData += "<td>"+value.apellido_materno+"</td>";
        tempData += "<td>"+value.correo+"</td>";
        tempData += "<td>"+value.categoria+"</td>";
        tempData += "<td><button onClick='modificarPermisos("+value.id_usuario+");' type='button' class='btn btn-success'";
        tempData += "data-toggle='modal' data-target='#modificarPermisos'>";
        tempData += "<i class='ace-icon fa fa-envelope' style='font-size: 20px;'></i></button></td>";
        return tempData;
    }

    // console.log($('#NOMBREESCRITURA_AGREGARUSUARIO').left());

    function buscarEmpleados(data)
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
                        // nombre = value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno;
                        datos = value.correo+"^_^"+value.nombre+"^_^"+value.categoria+"^_^"+value.id_empleado;
                        tempData += "<li role='presentation'><a role='menuitem' tabindex='-1'";
                        tempData += "onClick='seleccionarItem(\""+datos+"\")'>";
                        tempData += value.nombre+"</a></li>";
                    });
                    $("#dropdownEvent").html(tempData);
                }
            });
        }
    }

    function seleccionarItem(usuarioDatos)
    {
        datos = usuarioDatos.split("^_^");
        EmpleadoDataG = datos;
        // usuario = datos[0].split("@");
        $('#NOMBREESCRITURA_AGREGARUSUARIO').val(datos[0]);
        textoHTML = "<div class='form-group'>Nombre: <label class='control-label'>"+datos[1]+"</label></div>";
        textoHTML += "<div class='form-group'>Correo: <label class='control-label'>"+datos[0]+"</label></div>";
        textoHTML += "<div class='form-group'>Categoria: <label class='control-label'>"+datos[2]+"</label></div>";
        textoHTML += "<div class='form-group' method='post'><button onClick='agregarUsuarioBtn()'";
        textoHTML += "type='submit' class='btn crud-submit btn-info'>Agregar Usuario</button></div>*La contraseña es el correo del empleado";
        $("#INFO_AGREGARUSUARIO").html(textoHTML);
    }
    var EmpleadoDataG;
    function agregarUsuarioBtn()
    {
        usuario = $('#NOMBREESCRITURA_AGREGARUSUARIO').val();
        if(usuario!="")
        {
            $.ajax({
                url: '../Controller/AdminController.php?Op=AgregarUsuario',
                type: 'POST',
                data: 'ID_EMPLEADO='+EmpleadoDataG[3]+"&NOMBRE_USUARIO="+usuario,
                beforeSend:function()
                {
                    $('#loader').show();
                },
                success:function(creado)
                {

                    if(creado.resultado==true)
                    {
                        EmpleadoDataObj=[];
                        EmpleadoDataObj['id_usuario']=creado.id_usuario;
                        EmpleadoDataObj['nombre']=EmpleadoDataG[1];
                        EmpleadoDataObj['correo']=EmpleadoDataG[0];
                        EmpleadoDataObj['categoria']=EmpleadoDataG[2];
                        EmpleadoDataObj['nombre_usuario']=usuario;

                        tempData = "<tr id='registro_"+creado.id_usuario+"'>";
                        tempData += construirTablaAgregar(EmpleadoDataObj);
                        tempData += "</tr>";

                        $('#bodyTableAgregar').append(tempData);
                        swalSuccess('Usuario Creado');
                        $('#agregarUsuario .close').click()
                    }
                    else
                    {
                        swalError('No creado, Error en el servidor');
                    }
                },
                error:function(error)
                {
                    swalError('No creado, Error en el servidor');
                }
            });
        }
        else
        {
            //mandar alertas que no este vacio usuario
        }
    }
    function swalSuccess(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"success"
            });
        setTimeout(function(){swal.close();},1500);
        $('#loader').hide();
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

    function modificarPermisos(id)
    {
        // construirTablaPermisos();
        $.ajax({
            url: '../Controller/AdminController.php?Op=ListarPermisos',
            type:'GET',
            data: "ID_USUARIO="+id,
            beforeSend:function()
            {
                $('#loader').show();
            },
            success:function(permisos)
            {
                // tempData = "";
                construirTablaPermisosDatos();
                
                asignarPermisosTabla();
                $('#loader').hide();
            },
            error:function()
            {
                swalError('Error del servidor');
            }
        });
    }
    var submodulo={
        'Catalogo':['Empleados','Temas','Documentos','Asignacion Tema Requisito'],
        'Cumplimientos':['Validacion','evidencias'],
        'Informes Geneciales':['Informe'],
        'Oficios':['Empleados','Autoridad Remitente','Temas','Documento Salida','Documentos Salida','Seguimiento Entrada','Informe Gerencial']
        };
        console.log(submodulo);
        textCheckBox = "<input type='checkbox' style='width:40px;height:40px;margin:7px 0 0;'";
    function construirTablaPermisosDatos()
    {
        // tempData="";
        $.ajax({
            url: '../Controller/AdminController.php?Op=CrearTablaPermisos',
            type: 'GET',
            success:function(tabla)
            {
                tempData = tabla;
                $('#bodyTablePermisos').html(tempData);
                // console.log(tabla);
                // return tempData;
            }
        });
        // var tempData="";
        // var idEstruct=2;
        // $.each(submodulo,function(index,value)
        // {
        //     tempData += "<tr>";
        //     tempData2 = "";
        //     tempData3 = "";
        //     cont=0;
        //     $.each(value,function(ind,val)
        //     {
        //         console.log(val);
        //         cont++;
        //         if(cont==1)
        //         {
        //             //ver/guardar/editar/eliminar
        //             tempData2 =  "<td onClick='alert();' style='border-top:1px solid;'>"+val+"</td>";
        //             // tempData2 += "<td id='view_"+idEstruct+"' style='border-top: 1px solid;'>"+textCheckBox;
        //             // tempData2 += "onchange=\"saveCheckBoxToDataBase(this,'view','"+idEstruct+"')\" ></td>";

        //             // tempData2 += "<td id='consult_"+idEstruct+"' style='border-top: 1px solid;'>"+textCheckBox;
        //             // tempData2 += "onchange=\"saveCheckBoxToDataBase(this,'consult','"+idEstruct+"')\" ></td>";

        //             // tempData2 += "<td id='edit_"+idEstruct+"' style='border-top: 1px solid;'>"+textCheckBox;
        //             // tempData2 += "onchange=\"saveCheckBoxToDataBase(this,'edit','"+idEstruct+"')\" ></td>";

        //             // tempData2 += "<td id='delet_"+idEstruct+"' style='border-top: 1px solid;'>"+textCheckBox
        //             // tempData2 += "onchange=\"saveCheckBoxToDataBase(this,'delete','"+idEstruct+"')\" ></td></tr>";
        //             tempData2 += "<td onClick=\"saveCheckBoxToDataBase(this,'view','"+idEstruct+"')\" id='view_"+idEstruct+"' style='border-top: 1px solid;cursor:pointer;'></td>";

        //             tempData2 += "<td onClick=\"saveCheckBoxToDataBase(this,'new','"+idEstruct+"')\" id='new_"+idEstruct+"' style='border-top: 1px solid;cursor:pointer;'></td>";

        //             tempData2 += "<td onClick=\"saveCheckBoxToDataBase(this,'edit','"+idEstruct+"')\" id='edit_"+idEstruct+"' style='border-top: 1px solid;cursor:pointer;'></td>";

        //             tempData2 += "<td onClick=\"saveCheckBoxToDataBase(this,'delete','"+idEstruct+"')\" id='delet_"+idEstruct+"' style='border-top: 1px solid;cursor:pointer;'></td></tr>";
        //         }
        //         else
        //         {
        //             tempData3 += "<tr><td>"+val+"</td>";

        //             // tempData3 += "<td id='view_"+idEstruct+"'>"+textCheckBox;
        //             // tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'view','"+idEstruct+"')\" ></td>";

        //             // tempData3 += "<td id='consult_"+idEstruct+"'>"+textCheckBox;
        //             // tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'consult','"+idEstruct+"')\" ></td>";

        //             // tempData3 += "<td id='edit_"+idEstruct+"'>"+textCheckBox;
        //             // tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'edit','"+idEstruct+"')\" ></td>";

        //             // tempData3 += "<td id='delet_"+idEstruct+"'>"+textCheckBox
        //             // tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'delete','"+idEstruct+"')\" ></td></tr>";
        //             tempData3 += "<td id='view_"+idEstruct+"' style='cursor:pointer;'>"+textCheckBox;
        //             tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'view','"+idEstruct+"')\" ></td>";

        //             tempData3 += "<td id='consult_"+idEstruct+"' style='cursor:pointer;'>"+textCheckBox;
        //             tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'consult','"+idEstruct+"')\" ></td>";

        //             tempData3 += "<td id='edit_"+idEstruct+"' style='cursor:pointer;'>"+textCheckBox;
        //             tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'edit','"+idEstruct+"')\" ></td>";

        //             tempData3 += "<td id='delet_"+idEstruct+"' style='cursor:pointer;'>"+textCheckBox
        //             tempData3 += "onchange=\"saveCheckBoxToDataBase(this,'delete','"+idEstruct+"')\" ></td></tr>";
        //         }
        //         idEstruct++;
        //     });
        //     tempData += "<td style='border-top: 1px solid;' rowspan='"+cont+"'>"+index+"</td>";
        //     tempData += tempData2+tempData3;
        // });
    }

    function asignarPermisosTabla(permisos)
    {
        idEstructura=2;
        no = "<i class='fa fa-check-circle-o' style='font-size: xx-large;' aria-hidden='true'></i>";
        yes = "<i class='fa fa-check-circle-o' style='font-size: xx-large;' aria-hidden='true'></i>";
        $.each(permisos,function(index,value)
        {
            if(value.edit=='true')
                $('#edit_'+idEstructura).html(yes);
            else
                $('#edit_'+idEstructura).html(no);
            if(value.edit=='true')
                $('#view_'+idEstructura).html(yes);
            else
                $('#view_'+idEstructura).html(no);
            if(value.edit=='true')
                $('#consult_'+idEstructura).html(yes);
            else
                $('#consult_'+idEstructura).html(no);
            if(value.edit=='true')
                $('#delet_'+idEstructura).html(yes);
            else
                $('#delet_'+idEstructura).html(no);
            idEstructura++;
        });
    }
    function saveCheckBoxToDataBase(Obj,column,idEstructura)
    {
        //el id de usuario obtenerlo desde afuera
        console.log(Obj);
        console.log(column);
        console.log(idEstructura);
        $(Obj).html("<i class='fa fa-check-circle-o' style='font-size: xx-large;' aria-hidden='true'></i>");
        ObjI = Obj.getElementsByTagName("i");
        console.log(ObjI[0]);
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