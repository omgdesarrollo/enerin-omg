// para usar este complemento
// 1. agregar etiqueta <div id="jsFileUpload"></div>
// 2. inicializar componente crea el modal para mostrar los archivos cargados (Opcional)
// 3. definir la ruta donde se guardaran los archivos antes de la carpeta final ($fileUpload["url"])
// 
// 
// var _limite_upload_activado_jsUpload = true;

class fileUpload
{
    constructor(data)
    {
        this.url = data.url;//ruta de archivos antes de la carpeta final definida por el identificador del registro ligado a un archivo
        this.title_modal = data.title_modal;//titulo del modal de archivos
        this.title_date = "Fecha de Subida";//
        this.title_name_file = "Nombre";
        this.limite_upload_activado = false;//limita si se sube un archivo o varios archivos (false,true)

        this.tabla_archivos;
        this.seccion_carga;
        this.btn_carga;

        this.objModal;
        this.update_modal = true;
        this.after_delete = ()=>{};

        this.before_upload = ()=>{return new Promise((resolve,reject)=>{resolve()});};
        this.after_upload = ()=>{};
        this.modal_upload_file = "";

        // if(data.berofe_upload!=undefined)
        //     this.berofe_upload = data.berofe_upload;
        // if(data.after_upload!=undefined)
        //     this.after_upload = data.after_upload;
        // if(data.update_modal!=undefined)
        //     this.update_modal = data.update_modal;
        // if(data.after_delete!=undefined)
        //     this.after_delete = data.after_delete;
        if(data.limite_upload_activado!=undefined)
            this.limite_upload_activado = data.limite_upload_activado;
        if(data.title_date!=undefined)
            this.title_date = data.title_date;
        if(data.title_name_file!=undefined)
            this.title_name_file = data.title_name_file;

        this.modal_upload_file = "<form id='fileupload' method='POST' enctype='multipart/form-data'>"+
        "<div class='fileupload-buttonbar'>"+
        "<div class='fileupload-buttons'>"+
        "<span class='fileinput-button'>"+
        "<span id='spanAgregarDocumento'><a >Agregar Archivos(Click o Arrastrar)...</a></span>"+
        "<input type='file' name='files[]'"+ (this.limite_upload_activado?"":"multiple")+
        "></span>"+
        "<span class='fileupload-process'></span></div>"+
        "<div class='fileupload-progress' >"+
        "<div class='progress-extended'>&nbsp;</div>"+
        "</div></div>"+
        "<table role='presentation'><tbody class='files'></tbody></table></form>";


        this.script_add_jsFileUpload = 
        // '<div>'+
        '<script id="template-upload" type="text/x-tmpl">'+
            // '{% %}'+
            // '{% for(var i=0,file; file=o.files[i]; i++) %}'+
            // '{% console.log("tam",o.options.archivos_tam); %}'+
            '{% if(o.options.archivos_tam == 1){ %}'+
            // '{% { %}'+
                '{% let file=o.files[0];%}'+
                    '<tr class="template-upload" style="width:100%">'+
                        '<td>'+
                            '<span class="preview"></span>'+
                        '</td>'+
                        '<td>'+
                            '<p class="name">{%=file.name%}</p>'+
                            '<strong class="error"></strong>'+
                        '</td>'+
                    // <!-- <td> -->
                    // <!-- <p class="size">Processing...</p> -->
                    // <!-- <div class="progress"></div> -->
                    // <!-- </td> -->
                        '<td>'+
                            '{% if (!o.options.autoUpload){ %}'+
                            // '{% { %}'+
                                // '{% if(o.options.archivos_tam == 0) %}'+
                                // '{% { %}'+
                                    '<button class="start" style="display:none;padding: 0px 4px 0px 4px;" disabled>Start</button>'+
                                // '{% } %}'+
                            '{% } %}'+
                            // '{% if (!i) %}'+
                            // '{% { %}'+
                                '<button class="cancel" style="padding: 1px 4px 1px 4px;color:white;background:#6fb3e0">Cancel</button>'+
                            // '{% } %}'+
                        '</td>'+
                '</tr>'+
            '{% } %}'+
            // '{% if('+this.limite_upload_activado+') { console.log("yo3"); _limite_upload_activado_jsUpload=false; } %}'+
            // '{% if(i==0){ $(".fileupload-buttonbar").html(""); } }%}'+
            '{% if(o.options.limite_upload_activado) { o.options.archivos_tam = 0; } %}'+
            '</script>';


        this.script_upload_jsFileUpload = 
        '<script id="template-download" type="text/x-tmpl">'+
            '{% var t = $("#fileupload").fileupload("active"); var i,file; %}'+
            '{% for (i=0,file; file=o.files[i]; i++){ %}'+
            // '{% console.log("as",o); %}'+
                // '<tr class="template-download">'+
                //     '<td>'+
                //     '<span class="preview">'+
                //             '{% if (file.thumbnailUrl) %}'+
                //             '{% { %}'+
                //                 '<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>'+
                //             '{% } %}'+
                //     '</span>'+
                //     '</td>'+
                //     '<td>'+
                //     '<p class="name">'+
                //             '<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?"data-gallery":""%}>{%=file.name%}</a>'+
                //     '</p>'+
                //     '</td>'+
                    // '<td>'+
                    // '<span class="size">{%=o.formatFileSize(file.size)%}</span>'+
                    // '</td>'+
                    // <!-- <td> -->
                    // <!-- <button class="delete" style="padding: 0px 4px 0px 4px;" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>Delete</button> -->
                    // <!-- <input type="checkbox" name="delete" value="1" class="toggle"> -->
                    // <!-- </td> -->
                '</tr>'+
            '{% } %}'+
            '{% if(t==1) { growlSuccess("Cargar Archivo","Archivo Subido Correctamente"); o.options.fn_after_upload(o.options.archivos_tam); o.options.fn_after_upload_user() } %}'+
            // '{% if(t == 1){ if( $("#tempInputIdEvidenciaDocumento").length > 0 ) { var ID_EVIDENCIA_DOCUMENTO = $("#tempInputIdEvidenciaDocumento").val();var ID_PARA_DOCUMENTO = $("#tempInputIdParaDocumento").val(); mostrar_urls(ID_EVIDENCIA_DOCUMENTO,"1",false,ID_PARA_DOCUMENTO); growlSuccess("Subir Archivo","Archivo Cargado"); actualizarEvidencia(ID_EVIDENCIA_DOCUMENTO,1); noArchivo=0; } } %}'+
            // '{%  %}';
            '</script>';

        this.init();
    }

    init()
    {
        let obj = $("<div>",{"class":"modal fade"});
        let obj2 = $("<div>",{"class":"modal-dialog","role":"document"});
        let obj3 = $("<div>",{"class":"modal-content"}).append('<div class="modal-header">'+
                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
                    '<span aria-hidden="true" class="closeLetra">X</span></button>'+
                    '<h4 class="modal-title">'+this.title_modal+'</h4>'+
                    '</div>');
        let obj4 = $("<div>",{"class":"modal-body"});
        let obj5 = $("<div>");//DocumentolistadoUrl
        let obj6 = $("<div>",{"class":"form-group"});
        let obj7 = $("<div>");//DocumentolistadoUrlModal
        let obj8 = $("<div>",{"class":"form-group","method":"post"});
        let btn = $('<button>',{"type":"submit","class":"btn crud-submit btn-info botones_vista_tabla","style":"width:100%"});
        //agregar evento al botton para subir archivos, verificar si hay espacio para mas archivos y verificar si existe un archivo para evidencia,
        // intentar que sea el usuario que limite el numero de archivos por registro
        $(btn).html("Adjuntar Archivo");
        $(obj8).html(btn);
        $(obj6).html(obj7);
        $(obj4).html(obj5);
        $(obj4).append(obj6);
        $(obj4).append(obj8);
        $(obj3).append(obj4);
        $(obj2).html(obj3);
        $(obj).html(obj2);
        this.tabla_archivos = obj5;
        this.seccion_carga = obj7;
        this.btn_carga = btn;
        this.objModal = obj;
        $("#jsFileUpload").append(obj);
        
        // $("body").append("<script id='template-upload' type='text/x-tmpl'></script>");
        $("body").append(this.script_add_jsFileUpload);
        $("body").append(this.script_upload_jsFileUpload);
        // $("#jsScriptUpload").html(this.script_add_jsFileUpload);
        // $("#jsScriptUpload").html("this.script_add_jsFileUpload");
        // $("#jsScriptUpload").append(this.script_upload_jsFileUpload);
        // $("body").append("<script id='template-download' type='text/x-tmpl'></script>");
    }
    
    mostrar_urls(carpeta,detener,permiso)
    {
        // $("#template-upload").html(this.script_add_jsFileUpload);
        // $("#template-download").html(this.script_upload_jsFileUpload);

        // _limite_upload_activado_jsUpload = true;
        // let tempDocumentolistadoUrl = "";
        let URL = this.url+"/"+carpeta;
        $(this.tabla_archivos).html("");
        $(this.seccion_carga).html("");
        $(this.btn_carga).css("display","none");
        $(this.btn_carga)[0]["onclick"] = ()=>{this.subir_Archivo(carpeta);};
        console.log("1");
        $.ajax({
            url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
            type: 'GET',
            data: 'URL='+this.url+"/"+carpeta,
            success:(todo)=>
            {
                if(todo[0].length!=0)
                {
                    let obj = $("<table>",{"style":'min-width:100%;max-width:100%'});
                    let obj2 = $("<tr>").html("<th class='table-header'>"+this.title_date+"</th><th class='table-header'>Nombre</th><th class='table-header'></th>");
                    let obj3 = $("<tbody>");
                    $(obj).html(obj2);
                    $(obj).append(obj3);
                    // tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>"+this.titulo_fecha+"</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                    $.each(todo[0],(index,value)=>
                    {
                        let nametmp = value.split("^-O-^-M-^-G-^");
                        let name = nametmp[1];
                        let fecha = getFechaStamp(nametmp[0]);

                        let fila = $("<tr>",{"class":'table-row'}).append("<td>"+fecha+"</td>");
                        $(fila).append("<td><a download='"+name+"' href=\""+todo[1]+"/"+value+"\" target='blank'>"+name+"</a></td>");

                        // ><td>"+fecha+"</td><td>}";)
                        // let nombre = $("<a>",{"download":name,"href":todo[1]+"/"+value,"target":'blank'}).append(name);
                        // tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                        // tempDocumentolistadoUrl += "<a download='"+name+"' href=\""+todo[1]+"/"+value+"\" target='blank'>"+name+"</a></td><td>";
                        if(permiso==1)
                        {
                            let btn = $("<button>",{"style":"font-size:x-large;color:#39c;background:transparent;border:none;"}).append("<i class=\"fa fa-trash\"></i>");
                            btn[0]["onclick"] = ()=>{this.borrarArchivo(URL+"/"+value,carpeta)};
                            $(fila).append($("<tb>").append(btn));
                            // tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                            // tempDocumentolistadoUrl += "onclick='"+()=>{this.borrarArchivo("\""+URL+"/"+value+"\"")};+"'>";
                            // tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
                        }
                        $(obj3).append(fila);
                        // tempDocumentolistadoUrl += "</td></tr>";
                    });
                    $(this.tabla_archivos).append(obj);
                    // tempDocumentolistadoUrl += "</tbody></table>";
                }else
                    $(this.tabla_archivos).append("No hay archivos agregados");
                    if(detener==1)
                    {
                        $(this.seccion_carga).html(this.modal_upload_file);
                        $(this.btn_carga).css("display","");
                        // let valor = this.limite_upload_activado?
                        $('#fileupload').fileupload({
                            url: '../View/',
                            carpeta:carpeta,
                            limite_upload_activado: this.limite_upload_activado,
                            archivos_tam:1,
                            fn_after_upload:(detener_temp)=>{this.mostrar_urls(carpeta,detener_temp,permiso)},
                            fn_after_upload_user:()=>{this.after_upload({"id":carpeta});}
                        });
                    // }
                    }
                // }
                // else
                // {
                    // $('#DocumentolistadoUrlModal').html("");
                // }
                // tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdEvidenciaDocumento' type='text' style='display:none;' value='"+id_evidencia+"'>"
                // tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdParaDocumento' type='text' style='display:none;' value='"+id_para+"'>";
                // console.log(tempDocumentolistadoUrl);
                // $(this.tabla_archivos).html(tempDocumentolistadoUrl);
                // $("#subirArchivos").removeAttr("disabled");
                $(this.objModal).modal();
            }
        });
    }

    borrarArchivo = (url,id)=>
    {
        swal({
            title: "ELIMINAR",
            text: "Al eliminar este documento se eliminara toda la evidencia registrada. ¿Desea continuar?",
            type: "warning",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true,
            confirmButtonText: "Eliminar",
            cancelButtonText: "Cancelar",
        },()=>
        {
            $.ajax({
                url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
                type: 'POST',
                data: 'URL='+url,
                success:(eliminado)=>
                {
                    if(eliminado>0)
                    {
                        this.after_delete({"id":id});
                        swal.close();
                    }
                    else
                    {
                        growlError("Error Eliminar Archivo","No se pudo eliminar el archivo");
                    }
                },
                error:function()
                {
                    growlError("Error Eliminar Archivo","Error en el servidor");
                }
            });
        });
    }

    subir_Archivo = (carpeta)=>
    {
        let url = this.url+'/'+carpeta;
        this.before_upload().then((resolve)=>{
            $.ajax({
                url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
                type: 'GET',
                data: 'URL='+url,
                success:(creado)=>
                {
                    if(creado)
                    {
                        growlWait("Subir Archivo","Cargando Archivo Espere...");
                        $('.start').click();
                    }
                    else
                        growlError("Error","Ocurrio Un Error Al Obtener La Dirección De Subida");
                },
                error:()=>
                {
                    growlError("Error Eliminar Archivo","Error en el servidor");
                }
            });
        },(error)=>{});
    }

}

$fileUpload = new Object();

$fileUpload["modal_upload_file"] = "<form id='fileupload' method='POST' enctype='multipart/form-data'>";
$fileUpload["modal_upload_file"] += "<div class='fileupload-buttonbar'>";
$fileUpload["modal_upload_file"] += "<div class='fileupload-buttons'>";
$fileUpload["modal_upload_file"] += "<span class='fileinput-button'>";
$fileUpload["modal_upload_file"] += "<span id='spanAgregarDocumento'><a >Agregar Archivos(Click o Arrastrar)...</a></span>";
$fileUpload["modal_upload_file"] += "<input type='file' name='files[]' multiple></span>";
$fileUpload["modal_upload_file"] += "<span class='fileupload-process'></span></div>";
$fileUpload["modal_upload_file"] += "<div class='fileupload-progress' >";
// $fileUpload["modal_upload_file"] += "<div class='progress' role='progressbar' aria-valuemin='0' aria-valuemax='100'></div>";
$fileUpload["modal_upload_file"] += "<div class='progress-extended'>&nbsp;</div>";
$fileUpload["modal_upload_file"] += "</div></div>";
$fileUpload["modal_upload_file"] += "<table role='presentation'><tbody class='files'></tbody></table></form>";

// $fileUpload["url"] = "";
// $fileUpload["tabla_archivos"] = "";
// $fileUpload["seccion_carga"] = "";
// $fileUpload["btn_carga"] = "";
// $fileUpload["objModal"] = "";



// $fileUpload["new"] = (url,titulo)=>
// {
//     $fileUpload["url"] = url;
//     // $fileUpload["titulo_modal"] = titulo_modal;
//     let obj = $("<div>",{"class":"modal fade"});
//     let obj2 = $("<div>",{"class":"modal-dialog","role":"document"});
//     let obj3 = $("<div>",{"class":"modal-content"}).append('<div class="modal-header">'+
//                 '<button type="button" class="close" data-dismiss="modal" aria-label="Close">'+
//                 '<span aria-hidden="true" class="closeLetra">X</span></button>'+
//                 '<h4 class="modal-title">'+titulo+'</h4>'+
//                 '</div>');
//     let obj4 = $("<div>",{"class":"modal-body"});
//     let obj5 = $("<div>");//DocumentolistadoUrl
//     let obj6 = $("<div>",{"class":"form-group"});
//     let obj7 = $("<div>");//DocumentolistadoUrlModal
//     let obj8 = $("<div>",{"class":"form-group","method":"post"});
//     let btn = $('<button>',{"type":"submit","class":"btn crud-submit btn-info botones_vista_tabla","style":"width:100%"});
//     $(btn).html("Adjuntar Archivo");
//     $(obj8).html(btn);
//     $(obj6).html(obj7);
//     $(obj4).html(obj5);
//     $(obj4).append(obj6);
//     $(obj4).append(obj8);
//     $(obj3).append(obj4);
//     $(obj2).html(obj3);
//     $(obj).html(obj2);
//     $fileUpload["tabla_archivos"] = obj5;
//     $fileUpload["seccion_carga"] = obj7;
//     $fileUpload["btn_carga"] = btn;
    
    // let temp = 
    //     // '<div class="modal draggable fade" id="create-itemUrls" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> '+
    //     '<div class="modal-dialog " role="document">'+// <!-- <div id="loaderModalMostrar"></div> -->
    //         '<div class="modal-content">'+
    //             '<div class="modal-header">'+
    //             '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="closeLetra">X</span></button>'+
    //             '<h4 class="modal-title" id="myModalLabelItermUrls">'+titulo+'</h4>'+
    //             '</div>'+
    //             '<div class="modal-body">'+
    //                 '<div id="DocumentolistadoUrl"></div>'+
    //                 '<div class="form-group">'+
    //                     '<div id="DocumentolistadoUrlModal"></div>'+
    //                 '</div>'+
    //                 '<div class="form-group" method="post" >'+
    //                     '<button type="submit" id="subirArchivos" class="btn crud-submit btn-info botones_vista_tabla" style="width:100%">Adjuntar Archivo</button>'+
    //                 '</div>'+
    //             '</div>'+// <!-- cierre div class-body -->
    //         '</div>'+//<!-- cierre div class modal-content -->
    //     '</div>';//<!-- cierre div class="modal-dialog" -->
    // // '</div>';
    // $(obj).html(temp);
//     $fileUpload["objModal"] = obj;
//     $("#jsFileUpload").append(obj);
//     return $.extend({},$fileUpload);
// };

// $fileUpload["mostrar_urls"] = (carpeta,detener)=>
// {
//     var tempDocumentolistadoUrl = "";
//     // URL = 'filesEvidenciaDocumento/'+id_evidencia;
//     $($fileUpload["objModal"]).modal();

//     $.ajax({
//         url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
//         type: 'GET',
//         data: 'URL='+$fileUpload["url"]+"/"+carpeta,
//         // async:false,
//         success:(todo)=>
//         {
//             if(todo[0].length!=0)
//             {
//                 tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
//                 $.each(todo[0],(index,value)=>
//                 {
//                     nametmp = value.split("^-O-^-M-^-G-^");
//                     name = nametmp[1];
//                     fecha = getFechaStamp(nametmp[0]);
//                     // fecha = new Date(nametmp[0]*1000);
//                     // fecha = fecha.getDate()+" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
//                     // $.each(nametmp, function(index,value)
//                     // {
//                     //     if(index!=0)
//                     //         (index==1)?name=value:name+="-"+value;
//                     // });
//                     tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
//                     tempDocumentolistadoUrl += "<a download='"+name+"' href=\""+todo[1]+"/"+value+"\" target='blank'>"+name+"</a></td><td>";
//                     // if(validador=="1")
//                     // {
//                         // if(validado==false)
//                         // {
//                             tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
//                             tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
//                             tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
//                         // }
//                     // }
//                     tempDocumentolistadoUrl += "</td></tr>";
//                 });
//                 tempDocumentolistadoUrl += "</tbody></table>";
//             }
//             if(tempDocumentolistadoUrl == "")
//             {
//                 tempDocumentolistadoUrl = " No hay archivos agregados ";
//                 if(detener==1)
//                 {
//                     // if(validado==false)
//                     // {
//                         // $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
//                         $($fileUpload["seccion_carga"]).html($fileUpload["modal_upload_file"])
//                     // }
//                 }
//             }
//             else
//             {
//                 $('#DocumentolistadoUrlModal').html("");
//             }
//             // tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdEvidenciaDocumento' type='text' style='display:none;' value='"+id_evidencia+"'>"
//             // tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdParaDocumento' type='text' style='display:none;' value='"+id_para+"'>";
//             // console.log(tempDocumentolistadoUrl);
//             $($fileUpload["tabla_archivos"]).html(tempDocumentolistadoUrl);
//             // $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
//             $('#fileupload').fileupload
//             ({
//                 url: '../View/',
//             });
//             // $("#subirArchivos").removeAttr("disabled");
//         }
//     });
// }

// borrarArchivo = (url,id_para)=>
// {
//     // setInterval(aumentador(), 3000);
//     swal({
//         title: "ELIMINAR",
//         text: "Al eliminar este documento se eliminara toda la evidencia registrada. ¿Desea continuar?",
//         type: "warning",
//         showCancelButton: true,
//         closeOnConfirm: false,
//         showLoaderOnConfirm: true,
//         confirmButtonText: "Eliminar",
//         cancelButtonText: "Cancelar",
//     },function()
//     {
//         var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();
//         $.ajax({
//             url: "../Controller/ArchivoUploadController.php?Op=EliminarArchivo",
//             type: 'POST',
//             data: 'URL='+url,
//             success: function(eliminado)
//             {
//             if(eliminado)
//             {
//                 growlSuccess("Eliminacion de Archivo","Archivo Eliminado");
//                 mostrar_urls(ID_EVIDENCIA_DOCUMENTO,"1",false,id_para);
//                 actualizarEvidencia(ID_EVIDENCIA_DOCUMENTO,0);
//                 // setTimeout(function(){
//                     swal.close();
//                 // },1000);
//                 //  refresh();
//             }
//             else
//             {
//                 growlError("Error Rliminar Archivo","No se pudo eliminar el archivo");
//             }
//                 //porner los growl
//                 // swal("","Ocurrio un error al elimiar el documento", "error");
//             },
//             error:function()
//             {
//                 growlError("Error Eliminar Archivo","Error en el servidor");
//             //   swal("","Ocurrio un error al elimiar el documento", "error");
//             }
//         });
//     });
// }

// agregarArchivosUrl = ()=>
// {
//     var ID_EVIDENCIA_DOCUMENTO = $('#tempInputIdEvidenciaDocumento').val();
//     url = 'filesEvidenciaDocumento/'+ID_EVIDENCIA_DOCUMENTO,
//     $.ajax({
//         url: "../Controller/ArchivoUploadController.php?Op=CrearUrl",
//         type: 'GET',
//         data: 'URL='+url,
//         success:function(creado)
//         {
//             if(creado)
//             {
//                 growlWait("Subir Archivo","Cargando Archivo Espere...");
//                 $('.start').click();
//             }
//         },
//         error:function()
//         {
//             // swal("","Error del servidor","error");
//             growlError("Error Eliminar Archivo","Error en el servidor");
//         }
//       });
// }

// $fileUpload["show_"] = mostrar_urls;