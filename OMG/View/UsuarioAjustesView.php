<?php
    session_start();
    require_once '../util/Session.php';
//$error=Session::eliminarSesion("error");
//$usuario=Session::eliminarSesion("usuario");
// if (Session:: existeSesion("user")){
//     header("location: principalmodulos.php");
//     return;
// }
?>
<html>
    <head>
        <title>OMG</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../../css/estilo.css">
        <link href="../../assets/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" type="text/css"/>

        <link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
		<!-- Libreria java scritp de bootstrap -->
        <!-- <script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
                <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->

        <script src="../../js/jquery.js" type="text/javascript"></script>
        <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>


        <!-- <script src="../../js/jquery.min.js" type="text/javascript"></script> -->
        <script src="../../assets/vendors/jGrowl/jquery.jgrowl.js" type="text/javascript"></script>

        <script src="../../assets/colorPicker2/jquery.wheelcolorpicker.js" type="text/javascript"></script>
        <link href="../../assets/colorPicker2/css/wheelcolorpicker.css" rel="stylesheet" type="text/css"/>

        <!-- <script src="../../assets/colorPicker/jquery.mousewheel.min.js" type="text/javascript"></script> -->
        <!-- <script src="../../assets/colorPicker/colorPicker.min.js" type="text/javascript"></script> -->
        <!-- <script src="../../js/is.js" type="text/javascript"></script> -->
        <!-- <script src="../../js/tooltip.js" type="text/javascript"></script> -->

        <noscript><link async rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link async rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui-noscript.css"></noscript>
        <link async rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload.css">
        <link async rel="stylesheet" href="../../assets/FileUpload/css/jquery.fileupload-ui.css">

        <!-- <script src="../../angular/angular.min.js" type="text/javascript"></script> -->

        <!-- swalAlert -->
        <script src="../../assets/bootstrap/js/sweetalert.js" type="text/javascript"></script>
        <link href="../../assets/bootstrap/css/sweetalert.css" rel="stylesheet" type="text/css"/>
        <style>
        /* #fileupload
        {
            text-align:center;
        } */
        body
        {
            height:100%;
        }
        .jQWCP-wWidget
        {
            top:45px !important;
            left:5px !important;
            width:auto !important;
            /* display:table !important; */
        }
        #demo:focus
        {
            /* border:0px;
            background:transparent;
            color:transparent; */
        }
        #demo
        {
            width:0px;
            height:0px;
            top:10px;
            left:10px;
            /* border:0px;
            background:transparent;
            color:transparent; */
        }
        /* td,th{padding:10px} */
        /* table[role="presentation"]
        {
            width:100%;
            text-align:center;
        } */
        </style>
    </head>
    <body>

    <!-- <div style="width:128px;">
   <input style="width:100px;" id="mycolor" class="colorPicker evo-cp0" />
   <div class="evo-colorind" style="background-color:#8db3e2"></div>
</div> -->
    <!-- <input id="colorPicker" type="color"></input> -->
    <div id="headerOpciones" style="position:fixed;width:100%;margin: 10px 0px 0px 0px;padding: 0px 25px 0px 5px;">
        <button id="cambiarFondoBtn" type="button" class="btn btn-success btn_agregar">Cambiar Fondo</button>
        <button id="cambiarFondoAccionBtn" type="button" class="btn btn-success btn_agregar" disabled>Guardar Fondo</button>
    </div>
    <input type="text" id="demo" data-wheelcolorpicker>
    <br><br><br>
    <div id="filesPhoto"></div>
    <div id="Contenedor" style="margin: 0px auto;height:fit-content">
        <div id="contenedorFotoPerfil" class="Icon">
            <!-- <span id="fotoPerfilCambio" class="glyphicon glyphicon-user" style="cursor:pointer"></span> -->
        </div>
		<!-- <div class="ContentForm"> -->
        <div class="form-group">
		 	<!-- <form id="loginform"  method="post" name="FormEntrar"> -->
            <!-- <label class="control-label">Contraseña Actual: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span> -->
                <!-- <input onBlur="verificarPass(this)" id="contraActual" type="password" class="form-control" placeholder="******" required> -->
                <!-- <input id="contraActual" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassActual"><i style="color:red" class="glyphicon glyphicon-remove"></i></span> -->
            <!-- </div> -->
            <!-- <br> -->

            <!-- <label class="control-label">Contraseña Nueva: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span>
                <input onKeyup="checarPass(this)" id="contraNueva" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassNueva"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div>
            <br>

            <label class="control-label">Repetir Contraseña: </label>
            <div class="input-group input-group-lg">
                <span class="input-group-addon" id=""><i class="glyphicon glyphicon-lock"></i></span>
                <input onKeyup="checarPass(this)" id="contraNueva2" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassNueva2"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div>
            <br> -->

            <div id="inputs_pass" style="margin-bottom:10px">
            <!-- <div id="label"></div>
                <label class="control-label">Contraseña Actual: </label>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="contraActual" type="password" class="form-control" placeholder="******" required>
                    <span class="input-group-addon" id="iconPassActual"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
                </div> -->
            </div>
            
            <!-- <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span> -->
                <!-- <input onBlur="verificarPass(this)" id="contraActual" type="password" class="form-control" placeholder="******" required> -->
                <!-- <input id="contraActual" type="password" class="form-control" placeholder="******" required>
                <span class="input-group-addon" id="iconPassActual"><i style="color:red" class="glyphicon glyphicon-remove"></i></span>
            </div> -->
            <div id="botones"></div>

            <!-- <button onClick="cambiarPass()" title="Haga clic aquí para cambiar contraseña" class="btn btn-lg btn-primary btn-block btn-signin">
            Cambiar Contraseña</button> -->
				<!--<div class="opcioncontra"><a href="">Olvidaste tu contraseña?</a></div>-->
            <!-- </form> -->
        </div>

     </div>
     <script>

        var btn_cambiarPass = $("<button>",{onClick:"cambiarPass()",title:"Haga click aquí para cambiar contraseña",
            class:"btn btn-lg btn-primary btn-block btn-signin"}).append('Cambiar Contraseña <i class="fa fa-paper-plane-o" aria-hidden="true"></i>');

        var btn_siguiente = $("<button>",{title:"Haga click aquí para introducir nueva contraseña",class:"btn btn-lg btn-primary btn-block btn-signin"})
        .append('Siguiente <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>');

        var inp_passActual = $("<input>",{type:"password",class:"form-control",placeholder:"******"});
        var inp_passNueva1 = $("<input>",{type:"password",class:"form-control",placeholder:"******"});
        var inp_passNueva2 = $("<input>",{type:"password",class:"form-control",placeholder:"******"});

        // crea un objecto parte del formulario para introducir contraseña actual, nuevo o repetir
        crearObjectoPass = (obj)=>
        {
            let objTemp = $("<div>",{class:"input-group input-group-lg"});
            let obj2Temp = $("<span>",{class:"input-group-addon"}).append('<i class="fa fa-key" aria-hidden="true"></i>');
            $(objTemp).append(obj2Temp);
            $(objTemp).append(obj);
            return objTemp;
        }

        // crea la primera parte del formulario, peticion de contraseña actual
        iniciarFormulario = ()=>
        {
            console.log($("#botones"));
            $("#inputs_pass").html('<label class="control-label">Contraseña Actual:</label>');
            $("#inputs_pass").append(crearObjectoPass(inp_passActual));
            $("#botones").html(btn_siguiente);
        }

        $(btn_siguiente)[0]["onclick"] = ()=>
        {
            $(inp_passActual).val()!=""?
                verificarPass(inp_passActual)
            :growlError("Campo Vacio","*Contraseña Actual");
        };

        $(btn_cambiarPass)[0]["onclick"] = ()=>
        {
            checarPass();
        };

        // okpass=false;
        // okpassN=false;
        iniciarFormulario();
        noArchivo = 1;
        Frame = $(this)[0].frameElement;
        $(Frame).css("height","100%");
        var parentFrame = $(Frame).parent();
        $(parentFrame).css("height","100%");

        $(document).ready(()=>{
            var colorView = <?php
            $color = "";
            if(Session:: NoExisteSeSion("colorFondo_Vista"))
                $color = Session::getSesion("user")["FONDO_COLOR"];
            else
                $color = Session::getSesion("colorFondo_Vista");
            echo "'$color'";
            ?>;
            $("style").append("::-webkit-scrollbar-thumb{ background-color:"+colorView+" !important;} .dhxlayout_base_material div.dhx_cell_layout div.dhx_cell_hdr{background-color:"+colorView+" !important;opacity:0.8 !important; }");
            $('#demo').wheelColorPicker();
        });
        
        $(()=>{

            $("#cambiarFondoBtn").click(()=>{
                $("#demo").focus();
            });

            $("#demo").focus(()=>{
                $(".jQWCP-wWidget").css("display","table");
            });

            $("#demo").on("change",()=>{
                let color = $("#demo").wheelColorPicker('getValue');
                $("#cambiarFondoAccionBtn").removeAttr("disabled");
                $("#cambiarFondoAccionBtn").css({"background":"#"+color,"opacity":0.8});
            });

            $("#cambiarFondoAccionBtn").click(()=>{
                let color = $("#demo").wheelColorPicker('getValue');
                cambiarColorDB(color);
            });
        });

        // cambia el color de los menu, barra de desplazamientos y encabezados, recarga la pagina
        cambiarColorDB = (newColor)=>
        {
            $.ajax({
                url: '../Controller/AdminController.php?Op=CambiarColor',
                type: 'POST',
                data: 'COLOR=#'+newColor,
                beforeSend:()=>
                {
                    growlWait("Cambiar Color Fondo","...");
                },
                success:(resp)=>
                {
                    if(resp==1)
                    {
                        growlSuccess("Cambiar Color Fondo","Cambiado.<br>Recarga en breve...");
                        $("#cambiarFondoAccionBtn").attr("disabled",true);
                        setTimeout(() => {
                            window.parent.location.reload();
                        }, 2000);
                    }
                    else
                    {
                        growlError("Error Cambiar Color Fondo","No se pudo cambiar el color de fondo");
                    }
                },
                error:()=>
                {
                    growlError("Error","Error en el servidor");
                }
            });
        }

        limpiarFormulario = ()=>
        {
            // no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            clearInterval(outTime);
            swal({
                    title:"",
                    text: "Se agoto el tiempo de espera para el cambio de contraseña",
                    type: "info",
                    showCancelButton: false,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Recargar",
                    },()=>
                    {
                        outTime = setInterval(function(){limpiarFormulario();},35000);
                        limpiar();
                        iniciarFormulario();
                        swal.close();
                    }
                );
        }

        limpiar = ()=>
        {
            $(inp_passActual).val("");
            $(inp_passNueva1).val("");
            $(inp_passNueva2).val("");

            // $("#iconPassActual").html(no);
            // $("#iconPassNueva").html(no);
            // $("#iconPassNueva2").html(no);

            // okpass=false;
            // okpassN=false;
        }
        outTime = setInterval(function(){limpiarFormulario();},35000);

        // actualiza la contraseña del usuario, y se cierra la sesion
        cambiarPass = ()=>
        {
            contraA = $(inp_passActual).val();
            contraN = $(inp_passNueva1).val();
            if(contraA != contraN)
            {
                $.ajax({
                    url: '../Controller/AdminController.php?Op=CambiarPass',
                    type: 'POST',
                    data: "NEW_PASS="+contraN,
                    success:(exito)=>
                    {
                        if(exito>0)
                        {
                            clearInterval(outTime);
                            swal({
                                title:"",
                                text: "La contraseña se ha cambiado. Inicie sesion de nuevo",
                                type: "info",
                                showCancelButton: false,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                                confirmButtonText: "Salir",
                                },()=>
                                {
                                    window.parent.location.href="Logout.php";
                                }
                            );
                            setTimeout(function(){swal.close();window.parent.location.href="Logout.php";},7000);
                        }
                        else
                        {
                            // swalError("No se pudo hacer el cambio de contraseña");
                            growlError("Error","No se pudo cambiar la contraseña.<br>Reintente");
                        }
                    },
                    error:()=>
                    {
                        // swalError("Error en el servidor");
                        growlError("Error","Error en el servidor")
                    }
                });
            }
            else
            {
                // swal("","No puedes utilizar tu misma contraseña","info");
                growlError("Aviso","No puedes utilizar la contraseña anterior")
            }
        }

        // function verificarTodo()
        // {
        //     //contraActual,contraNueva,contraNueva2
        //     contraA = $("#contraActual").val();
        //     contraN = $("#contraNueva").val();
        //     contraN2 = $("#contraNueva2").val();

        //     if(contraN!="")
        //     {
        //     }
        //     if(contraN2!="")
        //     {
        //     }
        // }
        
        // verifica que contraseña nueva y repetir contraseña nueva sean iguales
        checarPass = ()=>
        {
            let msj = "";
            let pass = $(inp_passNueva1).val();
            let passN = $(inp_passNueva2).val();
            // yes = "<i style='color:#02ff00' class='glyphicon glyphicon-ok'></i>";
            // no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            if(pass!="" && passN!="")
            {                
                if(pass == passN)
                {
                    // $("#iconPassNueva").html(yes);
                    // $("#iconPassNueva2").html(yes);
                    // okpassN=true;
                    cambiarPass();
                }
                else
                {
                    // $("#iconPassNueva").html(no);
                    // $("#iconPassNueva2").html(no);
                    // okpassN=false;
                    growlError("Contraseña Incorrecta","Las Contraseñas No Coinciden");
                }
            }
            else
            {
                if(pass=="")
                    msj = "*Nueva Contraseña<br>";
                if(passN=="")
                    msj += "*Respetir Contraseña";
                // $("#iconPassNueva").html(no);
                // $("#iconPassNueva2").html(no);
                // okpassN=false;
                growlError("Campos Vacios",msj);
            }
        }

        // verifica si la contraseña actual es correcta
        verificarPass = (Obj)=>
        {
            contrasena = $(Obj).val();
            yes = "<i style='color:#02ff00' class='glyphicon glyphicon-ok'></i>";
            no = "<i style='color:red' class='glyphicon glyphicon-remove'></i>";
            $.ajax({
                url: '../Controller/AdminController.php?Op=VerificarPass',
                type: 'GET',
                data: 'PASS='+contrasena,
                beforeSend:()=>
                {
                    growlWait("Verificar","Esperando Verificación Contraseña...");
                },
                success:(correcta)=>
                {
                    if(correcta==true)
                    {
                        // $("#iconPassActual").html(yes);
                        // okpass=true;
                        growlSuccess("Verificar","Contraseña Verificada Con Exito...");
                        $("#inputs_pass").html('<label class="control-label">Nueva Contraseña:</label>');
                        $("#inputs_pass").append(crearObjectoPass(inp_passNueva1));
                        $("#inputs_pass").append('<label class="control-label">Respetir Contraseña:</label>');
                        $("#inputs_pass").append(crearObjectoPass(inp_passNueva2));
                        $("#botones").html(btn_cambiarPass);
                    }
                    else
                    {
                        growlError("Verificar","La contraseña No Es Correcta");
                        // okpass=false;
                        // $("#iconPassActual").html(no);
                    }
                },
                error:()=>
                {
                    okpass=false;
                    growlErrror("Error","Error en el servidor");
                }
            });
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

        agregarArchivosUrl = ()=>
        {
            usuario = <?php echo Session::getSesion("user")["ID_USUARIO"] ?>;
            var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();
            url = 'filePerfilesUsuario/'+usuario,
            $.ajax({
                url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                type: 'GET',
                data: 'URL='+url+"&SIN_CONTRATO=X",
                success:(creado)=>
                {
                    if(creado==1)
                    {
                        growlWait("Subir Imagen","Cargando Imagen Espere...");
                        $('.start').click();
                    }
                },
                error:()=>
                {
                    growlError("Error","Error en el servidor");
                }
            });
        }

        mostrar_urls = ()=>
        {
            return new Promise((resolve,reject)=>{
                let usuario = <?php echo Session::getSesion("user")["ID_USUARIO"] ?>;
                let tempDocumentolistadoUrl = "";
                URL = 'filePerfilesUsuario/'+usuario,
                $.ajax({
                    url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
                    type: 'GET',
                    data: 'URL='+URL+"&SIN_CONTRATO=''",
                    // async:false,
                    success:(todo)=>
                    {
                        $("#filesPhoto").html("<form id='fileupload' method='POST' enctype='form-data' style='display:none'>"+
                        "<div class='fileupload-buttonbar'><div class='fileupload-buttons'>"+
                        "<span id='fileBtn' class='fileinput-button'><span id='spanAgregarDocumento'><a >Agregar Archivos(Click o Arrastrar)...</a></span>"+
                        "<input type='file' name='files[]' ></span><span class='fileupload-process'></span></div>"+
                        "<div class='fileupload-progress'><div class='progress-extended'>&nbsp;</div></div></div>"+
                        "<table role='presentation'><tbody class='files'></tbody></table></form>");
                        if(todo[0].length!=0)
                        {
                            ultimo = todo[0].length;
                            let inp = '<img onclick="fotoPerfilCambio()" src="'+todo[1]+"/"+todo[0][ultimo-1]+'" class="img-circle" style="width:140px;height:140px;margin-top:5px;cursor:pointer">';
                            $("#contenedorFotoPerfil").html(inp);
                        }
                        else
                            $("#contenedorFotoPerfil").html('<span onclick="fotoPerfilCambio()" class="glyphicon glyphicon-user" style="cursor:pointer"></span></div>');

                        noArchivo=1;
                        resolve();
                    }
                });
            });
        }
       
        fotoPerfilCambio = ()=>
        {
            $("input[type='file']").click();
        }
        mostrar_urls().then((resolve)=>{ $('#fileupload').fileupload({url: '../View/'});console.log("primera");},(error)=>{  console.log("d");}        );
       
    </script>
    <script id="template-upload" type="text/x-tmpl">
    {% let error = 0; %}
    {%for (var i=0, file; file=o.files[i]; i++) { %}
        <tr class="template-upload" style="width:100%">
            <td>
                <span class="preview"></span>
            </td>
            <!-- <td> -->
            <!-- <p class="name">{%=file.name%}</p> -->
            <!-- <strong class="error"></strong> -->
            <!-- </td> -->
            <!-- <td> -->
            <!-- <p class="size">Processing...</p> -->
            <!-- <div class="progress"></div> -->
            <!-- </td> -->
            <td>
            {% if (!i && !o.options.autoUpload) { if(noArchivo==1){ if(file.type.split("/")[0]=="image"){ noArchivo=0; %}
                    <button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>
            {% }else{ error = 1; } } } %}
            {% if (!i) { %}
                    <!-- <button class="cancel" style="padding: 0px 4px 0px 4px;color:white">Cancel</button> -->
            {% } %}
            </td>
        </tr>
        {% if(i==0){ if(error==1) growlError("Error Imagen","Formato de Imagen no Compatible"); else{  setTimeout(agregarArchivosUrl,200);         } } %}
    <!-- {%  } %} -->
</script>

<script id="template-download" type="text/x-tmpl">
    {%  var t = $('#fileupload').fileupload('active'); var i,file; %}
    {% for (i=0,file; file=o.files[i]; i++) { %}
        <!-- <tr class="template-download" style="width:100%"> -->
            <!-- <td>
            <span class="preview"> -->
            <!-- {%  %} -->
                    <!-- {% if (file.thumbnailUrl) { %} -->
                    <!-- <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery> -->
                    <!-- <img src="{%=file.thumbnailUrl%}"></img> -->
                    <!-- </a> -->
                    <!-- {% } %} -->
            <!-- </span>
            </td> -->
            <!-- <td> -->
            <!-- <p class="name"> -->
                    <!-- <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a> -->
                    <!-- <img src="{%=file.thumbnailUrl%}"></img> -->
            <!-- </p> -->
            <!-- </td> -->
            <!-- <td>
            <!-- <span class="size">{%=o.formatFileSize(file.size)%}</span> -->
            </td> -->
            <!-- <td> -->
            <!-- <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> -->
            <!-- <input type="checkbox" name="delete" value="1" class="toggle"> -->
            <!-- </td> -->
        <!-- </tr> -->
    {% } %}
    {% growlSuccess("","Imagen Cargada"); mostrar_urls().then(()=>{ $('#fileupload').fileupload({url: '../View/'}); }); %}
</script>
<!-- <script src="../../assets/probando/js/bootstrap.min.js"></script> -->

    <script  src="../../assets/FileUpload/js/tmpl.min.js"></script>
    <script  src="../../assets/FileUpload/js/load-image.all.min.js"></script>
    <script  src="../../assets/FileUpload/js/canvas-to-blob.min.js"></script>
    <script  src="../../assets/FileUpload/js/jquery.blueimp-gallery.min.js"></script>
    <script  src="../../assets/FileUpload/js/jquery.iframe-transport.js"></script>
    <script  src="../../assets/FileUpload/js/jquery.fileupload.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-process.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-image.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-audio.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-video.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-validate.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-ui.js"></script>
    <script src="../../assets/FileUpload/js/jquery.fileupload-jquery-ui.js"></script>
    <!-- <script src="../../assets/FileUpload/js/main.js"></script> -->
    <body>
</html>