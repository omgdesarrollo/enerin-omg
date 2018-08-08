
function construirGrid(__datos)
{
    // $("#jsGrid").html("");
    // $("#jsGrid").jsGrid("destroy");
    jsGrid.fields.FValidacionDocumento = fieldValidacionDocumento;
    jsGrid.fields.FValidacionTema = fieldValidacionTema;
    $("#jsGrid").jsGrid({
        // onInit: function(args)
        // {
            // jsGrid.ControlField.prototype.editButton=true;
            //  jsGrid.ControlField.prototype.deleteButton=false;
        //     jsGrid.Grid.prototype.autoload=true;
        // },
        // onDataLoading: function(args)
        // {
        //     $("#loader").show();
        // },
        // onDataLoaded:function(args)
        // {
        //     $("#loader").hide();
        // },
        width: "100%",
        height: "300px",
        editing: false,
        heading: true,
        sorting: true,
        paging: true,
        pageSize: 5,
        pageButtonCount: 5,
        data: __datos,
        fields: 
        [
            { name: "id_principal",visible:false},
            { name: "no", title:"No.", type: "text", width: 40},
            { name: "clave_documento", title:"Clave Documento", type: "text", width: 100},
            { name: "documento", title:"Documento", type: "text", width: 130},
            { name: "responsable_documento", title:"Responsable Documento", type: "text", width: 130},
            { name: "tema_responsableBTN", title:"Temas y Resposables", type: "text", width: 100},
            { name: "mostrar_urlsBTN", title:"Archivo Adjunto", type: "text", width: 127},
            { name: "requisitosBTN", title:"Requisitos", type: "text", width: 92,},
            { name: "registrosBTN", title:"Registros", type: "text", width: 92,},
            { name: "validacion_documento_responsable", title:"Validación Resposable Documento", type: "FValidacionDocumento", width: 100},
            { name: "validacion_tema_responsable", title:"Validación Resposable Tema", type: "FValidacionTema", width: 100},
            { name: "observaciones", title:"Observaciones", type: "text", width: 112},
            { name: "desviacion_mayor", title:"Desviación Mayor", type: "text", width: 90},
            // {name:"cancel", type:"control", }
        ],
        // onItemUpdated: function(args)
        // {
        //     console.log(args);
        //     columnas={};
        //     id_afectado=args["item"]["id_principal"][0];
        //     $.each(args["item"],function(index,value)
        //     {
        //         if(args["previousItem"][index] != value && value!="")
        //         {
        //             if(index!="id_principal" && !value.includes("<button"))
        //             {
        //                     columnas[index]=value;
        //             }
        //         }
        //     });
        //     if(Object.keys(columnas).length!=0)
        //     {
        //         $.ajax({
        //                 url: '../Controller/GeneralController.php?Op=Actualizar',
        //                 type:'GET',
        //                 data:'TABLA=empleados'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
        //                 success:function(exito)
        //                 {
        //                     console.log(exito);
        //                 }
        //         });
        //     }
        // }
    });
}

var fieldValidacionDocumento = function(config)
{
    jsGrid.Field.call(this, config);
};

var fieldValidacionTema = function(config)
{
    jsGrid.Field.call(this, config);
};

fieldValidacionDocumento.prototype = new jsGrid.Field
({
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
                console.log("haber cuando entra aqui");
                console.log(date1);
                console.log(date2);
        },
        itemTemplate: function(value,todo)
        {
            console.log(value);
            noClass = "fa-times-circle-o";
            yesClass = "fa-check-circle-o";
            tempData = "";
            if(value=="true")
            {
                tempData = "<i class='fa "+yesClass+"' style='color:#02ff00;";
            }
            else
            {
                tempData = "<i class='fa "+noClass+"' style='color:red;";
            }
            tempData += "font-size: xx-large;cursor:pointer' aria-hidden='true'";
            if(todo.permiso_total==1)
                tempData += "onClick='validarDocumentoR(this,\"validacion_documento_responsable\","+todo.id_principal[0].id_validacion_documento+","+todo.id_documento+","+todo.no+")'";
            else
            {
                if(todo.soy_responsable==0)
                tempData += "onClick='validarDocumentoR(this,\"validacion_documento_responsable\","+todo.id_principal[0].id_validacion_documento+","+todo.id_documento+","+todo.no+")'";
                else
                tempData += "onClick='noAcceso(this)'";
            }
            tempData += "></i>";
            return tempData;
            // return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button', type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});

        },
        insertTemplate: function(value)
        {
            // console.log("insertTemplate");
            // return value;
        },
        editTemplate: function(value)
        {
            // console.log("editTemplate");
        },
        insertValue: function()
        {
            // console.log("insertValue");
        },
        editValue: function()
        {
            // console.log("editValue");
        }
});

fieldValidacionTema.prototype = new jsGrid.Field
({
        css: "date-field",
        align: "center",
        sorter: function(date1, date2)
        {
                console.log("haber cuando entra aqui");
                console.log(date1);
                console.log(date2);
        },
        itemTemplate: function(value,todo)
        {
            no = "fa-times-circle-o";
            yes = "fa-check-circle-o";
            tempData = "";
            if(todo.validacion_tema_responsable=="true")
            {
                tempData = "<i class='fa "+yes+"' style='color:#02ff00;";
            }
            else
            {
                tempData = "<i class='fa "+no+"' style='color:red;";
            }
            tempData += "font-size: xx-large;cursor:pointer' aria-hidden='true'";
            
            if(todo.soy_responsable==1)
                tempData += "onClick='validarTemaR(this,\"validacion_tema_responsable\","+todo.id_validacion_documento+","+todo.id_documento+","+todo.id_usuarioD+")'";
            else
                tempData += "onClick='noAcceso(this)'";
            tempData += "></i>";
            return tempData;
            // return this._inputDate = $("<input>").attr( {class:'jsgrid-button jsgrid-delete-button', type:'button',onClick:"preguntarEliminar("+JSON.stringify(todo)+")"});
        },
        insertTemplate: function(value)
        {
            // console.log("insertTemplate");
            // return value;
        },
        editTemplate: function(value)
        {
            // console.log("editTemplate");
        },
        insertValue: function()
        {
            // console.log("insertValue");
        },
        editValue: function()
        {
            // console.log("editValue");
        }
});

function listarDatos()
{
     __datos=[];
     datosParamAjaxValues={};
     datosParamAjaxValues["url"]='../Controller/ValidacionDocumentosController.php?Op=ListarTodo',
     datosParamAjaxValues["type"]="POST";
     datosParamAjaxValues["async"]=false;
     var variablefunciondatos=function obtenerDatosServer(data)
    {
        dataListado = data;
        $.each(data,function(index,value)
        {
            __datos.push( reconstruir(value,index) );
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);

    construirGrid(__datos);
}

function reconstruir(documento,numero)
{
    no = "fa-times-circle-o";
    yes = "fa-check-circle-o";
    tempData = new Object();

    tempData["no"] = numero;
    tempData["id_principal"] = [{"id_validacion_documento":documento.id_validacion_documento}];
    tempData["id_documento"] = documento.id_documento;
    tempData["id_usuarioD"] = documento.id_usuarioD;
    tempData["soy_responsable"] = documento.soy_responsable;
    tempData["permiso_total"] = documento.permiso_total;
    tempData["clave_documento"] = documento.clave_documento;
    tempData["documento"] = documento.documento;
    tempData["responsable_documento"] = documento.responsable_documento;


    tempData["tema_responsableBTN"] = "<button onClick='mostrarTemaResponsable("+documento.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'>";
    tempData["tema_responsableBTN"] += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>";

    if(documento.soy_reponsable == "0")
        tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\""+documento.validacion_documento_responsable+"\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>";
    else
    {
        if(documento.permiso_total == 1)
        {
            tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\""+documento.validacion_documento_responsable+"\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>";
        }
        else
        {
            tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\"true\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>";
        }
    }

    // if(documento.permiso_total == 1)
    // {
    //     if(documento.soy_responsable==1)
    //         tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\"true\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>";
    //     else
    //         tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\""+documento.validacion_documento_responsable+"\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>";
    // }
    // else
    //     tempData["mostrar_urlsBTN"] = "<button onClick='mostrar_urls("+documento.id_validacion_documento+",\"false\");' type='button' class='btn btn-primary' data-toggle='modal' data-target='#create-itemUrls'>"

    tempData["mostrar_urlsBTN"] += "<i class='fa fa-cloud-upload' style='font-size: 20px'></i> Adjuntar</button>";

    tempData["requisitosBTN"] = "<button onClick='mostrarRequisitos("+documento.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'>";
    tempData["requisitosBTN"] += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>";

    tempData["registrosBTN"] = "<button onClick='mostrarRegistros("+documento.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'>";
    tempData["registrosBTN"] += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>";

    tempData["validacion_documento_responsable"] = documento.validacion_documento_responsable;

    // if(documento.validacion_documento_responsable=="true")
    // {
    //     tempData["validacion_documento_responsable"] = "<i class='fa "+yes+"' style='color:#02ff00;";
    // }
    // else
    // {
    //     tempData["validacion_documento_responsable"] = "<i class='fa "+no+"' style='color:red;";
    // }
    // tempData["validacion_documento_responsable"] += "font-size: xx-large;cursor:pointer' aria-hidden='true'";
    // if(documento.permiso_total==1)
    //     tempData["validacion_documento_responsable"] += "onClick='validarDocumentoR(this,\"validacion_documento_responsable\","+documento.id_validacion_documento+","+documento.id_documento+")'";
    // else
    // {
    //     if(documento.soy_responsable==0)
    //     tempData["validacion_documento_responsable"] += "onClick='validarDocumentoR(this,\"validacion_documento_responsable\","+documento.id_validacion_documento+","+documento.id_documento+")'";
    //     else
    //     tempData["validacion_documento_responsable"] += "onClick='noAcceso(this)'";
    // }
    // tempData["validacion_documento_responsable"] += "></i>";

    tempData["validacion_tema_responsable"] = documento.validacion_tema_responsable;

    // if(documento.validacion_tema_responsable=="true")
    // {
    //     tempData["validacion_tema_responsable"] = "<i class='fa "+yes+"' style='color:#02ff00;";
    // }
    // else
    // {
    //     tempData["validacion_tema_responsable"] = "<i class='fa "+no+"' style='color:red;";
    // }
    // tempData["validacion_tema_responsable"] += "font-size: xx-large;cursor:pointer' aria-hidden='true'";
    
    // if(documento.soy_responsable==1)
    //     tempData["validacion_tema_responsable"] += "onClick='validarTemaR(this,\"validacion_tema_responsable\","+documento.id_validacion_documento+","+documento.id_documento+","+documento.id_usuarioD+")'";
    // else
    //     tempData["validacion_tema_responsable"] += "onClick='noAcceso(this)'";
    // tempData["validacion_tema_responsable"]+="></i>";

    // tempData+="<td>";
    tempData["observaciones"] = "<i data-toggle='modal' data-target='#mostrar-observaciones' onClick='mostrarObservacionesInicio("+documento.id_validacion_documento+")' class='ace-icon fa fa-comments' style='font-size:20px;cursor:pointer'></i>";
    tempData["desviacion_mayor"] = "X";
    return tempData;
}

function reconstruirTable(_datos)
{
    __datos=[];
    console.log(_datos);
    $.each(_datos,function(index,value)
    {
        __datos.push(reconstruir(value,index));
    });
    // $("#jsGrid").jsGrid("loadData");
    construirGrid(__datos);
    $("#loader").hide();
}

function mostrar_urls(id_validacion_documento,detenerCargas)
{
    var tempDocumentolistadoUrl = "";
    URL = 'filesValidacionDocumento/'+id_validacion_documento;   
    $.ajax({
        url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
        type: 'GET',
        data: 'URL='+URL,
        success: function(todo)
        {
            if(todo[0].length!=0)
            {
                tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                $.each(todo[0], function (index,value)
                {
                    nametmp = value.split("^-O-^-M-^-G-^");
                    fecha = new Date(nametmp[0]*1000);
                    fecha = fecha.getDate() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                    
                    tempDocumentolistadoUrl += "<tr class='table-row'><td>"+fecha+"</td><td>";
                    tempDocumentolistadoUrl += "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a></td>";
                    if(detenerCargas!="true")
                    {
                        tempDocumentolistadoUrl += "<td><button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                        tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                        tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button></td></tr>";
                    }
                    else
                        tempDocumentolistadoUrl += "<td></td>";
                });
                tempDocumentolistadoUrl += "</tbody></table>";
            }
            if(tempDocumentolistadoUrl == "")
            {
                    tempDocumentolistadoUrl = " No hay archivos agregados ";
            }
            tempDocumentolistadoUrl = tempDocumentolistadoUrl + "<br><input id='tempInputIdValidacionDocumento' type='text' style='display:none;' value='"+id_validacion_documento+"'>";                  
        if(detenerCargas!="true")
            $('#DocumentolistadoUrlModal').html(ModalCargaArchivo);
        else
            $('#DocumentolistadoUrlModal').html("");
        $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
        $('#fileupload').fileupload
        ({
            url: '../View/',
        });
        }
    });
}