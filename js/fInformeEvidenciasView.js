
parametroscheck={"validado":"false","no_validado":"false","sin_documento":"false"};

function inicializarFiltros()
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            { id:"noneUno", type:"none"},
        //     { id: "tema",name:"Tema", type: "text"},
        //     { id: "registro",name:"Registro", type: "text"},
        //     { id: "frecuencia",name:"Frecuencia", type: "combobox",data:frecuenciaData,descripcion:"frecuencia"},
        //     { id: "clave_documento",name:"Clave Documento", type: "text"},
        //     { id: "fecha_creacion",name:"Fecha Creación", type: "date"},
        //     // { id: "adjuntar_evidencia",name:"Adjuntar Evidencia", type: "text"},
        //     { id:"noneDos", type:"none"},
        //     { id: "fecha_registro",name:"Fecha Registro", type: "date"},
        //     { id: "usuario",name:"Usuario", type: "text"},
        //     { id:"noneTres", type:"none"},
        //     { id:"noneCuatro", type:"none"},
        //     { id:"noneCinco", type:"none"},
        //     { id:"noneSeis", type:"none"},
        //     // { id: "accion_correctiva",name:"Accion Correctiva", type: "text"},
        //     // { id: "plan_accion",name:"Plan Accion", type: "text"},
        //     // { id: "desviacion",name:"Desviacion", type: "text"},
        //     // { id: "validacion",name:"Validacion", type: "text"},
        //     {name:"opcion",id:"opcion",type:"opcion"}
        //     // { id:"delete", name:"Opción", type:"customControl",sorting:""},
        { id: "tema",title:"Tema", type: "text"},
        { id: "tema_responsable",title:"Responsable Tema",type:"text"},
        { id: "requisito",title:"Requisito", type: "none"},
        { id: "registro",title:"Registro", type: "text"},
        { id: "frecuencia",title:"Frecuencia", type: "combobox",data:frecuenciaData,descripcion:"frecuencia"},
        { id: "clave_documento",title:"Clave Documento", type: "text"},
        { id: "documento_responsable",title:"Responsable Documento",type:"text"},
        { id: "evidencia",title:"Evidencia", type: "none"},
        { id: "fecha_registro",title:"Fecha Registro", type: "date"},
        { id: "fecha_creacion",title:"Fecha Evidencia", type: "date"},
        // { name: "usuario",title:"Usuario", type: "text", width:250, editing:false }

        { id: "accion_correctiva",title:"Accion Correctiva", type: "none"},
        // { name: "plan_accion",title:"Plan Accion", type: "text", width: 160, editing:false },
        { id: "desviacion",title:"Desviacion", type: "none"},
        { id: "avance_plan",title:"Avance del Plan", type: "text"},
        { id: "estatus",title:"Estatus", type: "combobox",data:estatusFiltro,descripcion:"estatus"},
        { id:"delete", name:"Opción", type:"opcion",sorting:""},
        ];
        resolve();
    });
}

    // $(function (){
//      alert("tene");
// $('#checkValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//             alert("esta en "+$(this).is(':checked'));
//            parametroscheck["validado"]="false";
//            alert("validados");
//        }else{
//            alert("esta  "+$(this).is(':checked'));
            //  parametroscheck["validado"]=$(this).is(':checked');
//        }
//alert("checkeado  "+parametroscheck["validado"]);
    // cargar("validados");
//alert("d"+parametroscheck["validado"]+"  no validados  "+parametroscheck["no_validado"] );
    // });
    
// $('#checkNoValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
// parametroscheck["no_validado"]=$(this).is(':checked');
//     cargar("novalidados");
//     });
    
// $('#checkSinDocumento').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
// parametroscheck["sin_documento"]=$(this).is(':checked');
//     cargar("sindocumento");
//     });
    
    
    // }); //CIERRA EL $(FUNCTION)
    
    
// function cargar(key){
//     switch (key) {
//         case "validados":

//         //        alert("entraste en validados");
//                 listarDatos();
//         break;
        
//         case "novalidados":
//             listarDatos();
//         //        alert("no validados");
//         break;
        
//         case "sindocumento":
//             listarDatos();
//         //        alert("sin documento");
//         break;
        
//         default:

//         break;
//     }
// }
// months = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

function mostrar_urls(id_evidencia)
{
    var tempData=[];
    URL = 'filesEvidenciaDocumento/'+id_evidencia;
    // $.ajax({
    //     url: '../Controller/ArchivoUploadController.php?Op=CrearUrl',
    //     type: 'GET',
    //     data: 'URL='+URL,
    //     success:function(creado)
    //     {
    //     if(creado)
    //     {
            $.ajax({
            url: '../Controller/ArchivoUploadController.php?Op=listarUrls',
            type: 'GET',
            data: 'URL='+URL,
            async:false,
            success: function(todo)
            {
                console.log(todo);
                if(todo[0].length!=0)
                {
                    // tempDocumentolistadoUrl = "<table class='tbl-qa'><tr><th class='table-header'>Fecha de subida</th><th class='table-header'>Nombre</th><th class='table-header'></th></tr><tbody>";
                    $.each(todo[0], function (index,value)
                    {
                        nametmp = value.split("^-O-^-M-^-G-^");
                        fecha = new Date(nametmp[0]*1000);
                        fecha = fecha.getDay() +" "+ months[fecha.getMonth()] +" "+ fecha.getFullYear() +" "+fecha.getHours()+":"+fecha.getMinutes()+":"+fecha.getSeconds();
                        tempData["name"] = "<a href=\""+todo[1]+"/"+value+"\" download='"+nametmp[1]+"'>"+nametmp[1]+"</a>";
                        tempData["fecha"] = fecha;
                        // tempDocumentolistadoUrl += "<button style=\"font-size:x-large;color:#39c;background:transparent;border:none;\"";
                        // tempDocumentolistadoUrl += "onclick='borrarArchivo(\""+URL+"/"+value+"\");'>";
                        // tempDocumentolistadoUrl += "<i class=\"fa fa-trash\"></i></button>";
                        // tempDocumentolistadoUrl += "</td></tr>";
                    });
                    // tempDocumentolistadoUrl += "</tbody></table>";
                }
                else
                {
                    tempData["name"] = " Sin archivo";
                    tempData["fecha"] = " ----------- ";
                }
                // $('#DocumentolistadoUrl').html(tempDocumentolistadoUrl);
            }
            });
            console.log(tempData);
            return tempData;
        // }
        // else
        // {
        //     swal("Error en el servidor");
        // }
        // }
    // });
}

function listarDatos()
{
    return new Promise((resolve,reject)=>
    {
        URL = 'filesEvidenciaDocumento/';
        __datos=[];
        $.ajax({
            url: '../Controller/InformeEvidenciasController.php?Op=Listar',
            type: 'GET',
            data:"URL="+URL,
            beforeSend:function()
            {
                growlWait("Solicitud","Solicitando Datos...");
            },
            success:function(data)
            {
                if(typeof(data)=="object")
                {
                    growlSuccess("Solicitud","Registros obtenidos");
                    dataListado = data;
                    $.each(data,function (index,value)
                    {
                        __datos.push( reconstruir(value,index+1) );
                    });
                    // console.log(__datos);
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve();
                }
                else
                {
                    growlSuccess("Solicitud","No Existen Registros de Evidencias");
                    reject();
                }
            },
            error:function(e)
            {
                // console.log(e);
                growlError("Error","Error en el servidor");
                reject();
            }
        });
    });
}

function reconstruir(value,index)
{
    ultimoNumeroGrid = index;
    tempData = new Object();
    
    tempData["no"] = ultimoNumeroGrid;
    tempData["id_principal"] = [];
    tempData["id_principal"].push({'id_evidencias':value.id_evidencias});
    
    tempData["tema"] = value.tema;
    tempData["tema_responsable"] = value.tema_responsable;

    //  tempData["requisito"] = "<div><p>"+value.requisito+"</p></div>";
     tempData["requisito"] = value.requisito;
//    tempData["requisito"] = "<td class='celda' width='10%' style='font-size: -webkit-xxx-large'><button type='button' class='btn btn-success'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
    tempData["registro"] = value.registro;
    tempData["frecuencia"] = value.frecuencia;

    tempData["clave_documento"] = value.clave_documento;
    tempData["documento_responsable"] = value.documento_responsable;

    if(value.archivosUpload[0].length != 0)
    {
            todoArchivo = value.archivosUpload[0][0].split("^-O-^-M-^-G-^");
            tempData["evidencia"] = "<a href='"+value.archivosUpload[1]+"' download='"+todoArchivo[1]+"'>"+todoArchivo[1]+"</a>";
            tempData["fecha_registro"] = getFechaStamp(todoArchivo[0]);
    }
    else
    {
        tempData["evidencia"] = "Sin Archivo";
        tempData["fecha_registro"] = "Sin Fecha";
    }
    tempData["fecha_creacion"] = getSinFechaFormato(value.fecha_creacion);

    tempData["desviacion"] = value.desviacion;
    tempData["accion_correctiva"] = value.accion_correctiva;
    tempData["avance_plan"]=(value.avance_plan*100).toFixed(2)+"%";
    tempData["estatus"] = value.estatus;
    // tempData["delete"] = [];
    tempData["delete"]=tempData["id_principal"];
    tempData["delete"].push({eliminar:0});
    tempData["delete"].push({editar:0});
    return tempData;
}
   
//    var listfunciones=[variablefunciondatos];
//    ajaxHibrido(datosParamAjaxValues,listfunciones); 
   
//        $("#jsGrid").jsGrid({
//         width: "100%",
//         height: "300px",
//         heading: true,
//         sorting: true,
//         paging: true,
 
//         data: __datos,
//         fields: [
//                 { name: "No", type: "text", width: 80, validate: "required" },
//                 { name: "Tema", type: "text", width: 150, validate: "required" },
//                 { name: "Requisitos", type: "text", width: 150, validate: "required" },
//                 { name: "Registros", type: "text", width: 150, validate: "required" },
// //                { name: "Clave del Documento",textField: "Clave documento", type: "text", width: 150, validate: "required" },
//                 { name: "Clave del Documento", type: "text", width: 200, validate: "required" },    
//                 { name: "Responsable del Documento", type: "text", width: 250, validate: "required" },
//                 { name: "Frecuencia", type: "text", width: 150, validate: "required" },
//                 { name: "Evidencia", type: "text", width: 150, validate: "required" },
//                 { name: "Fecha de Registro", type: "text", width: 150, validate: "required" },
//                 { name: "Desviacion", type: "text", width: 150, validate: "required" },
//                 { name: "Accion Correctiva", type: "text", width: 150, validate: "required" },
//                 { name: "Avance del Plan", type: "text", width: 150, validate: "required" },
//                 { name: "status", type: "text", width: 150, validate: "required" }
//         ]
//     });
// }


// function construirTable(datos)
// {
//     cargaTodo=0;
//     tempData="";
    
//     $.each(datos,function(index,value){
        
//             tempData += construir(value,cargaTodo);
//     });
    
// //    $.each(datos["info"],function(index,value){
// //        value["clave_cumplimiento"]=datos["detallesContrato"]["clave_cumplimiento"];
// //        value["cumplimiento"]=datos["detallesContrato"]["cumplimiento"];
// //            tempData += construir(value,cargaTodo);
// //    });
     
//     $("#datosGenerales").html(tempData);
//     $("#loader").hide();
// }


// function mostrarTemaResponsable(id_documento)
// {
//     ValoresTemaResponsable = "<table class='tbl-qa'>\n\
//                                 <tr>\n\
//                                     <th class='table-header'>Tema</th>\n\
//                                     <th class='table-header'>Responsable del Tema</th>\n\
//                                 </tr>\n\
//                                 <tbody>";
    
//     $.ajax({
//         url:'../Controller/InformeEvidenciasController.php?Op=MostrarTemayResponsable',
//         type:'POST',
//         data:'ID_DOCUMENTO='+id_documento,
//         success:function(datosTemaResponsable)
//         {
//             $.each(datosTemaResponsable,function(index,value){
//                 ValoresTemaResponsable+="<tr><td>"+value.no+"</td>" ;
//                 ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
//             });
//                 ValoresTemaResponsable += "</tbody></table>";
//                 $('#TemayResponsableListado').html(ValoresTemaResponsable);
//         }
//     });
// }

// function mostrarRequisitos(id_documento)
// {
//         ValoresRequisitos = "<ul>";

//         $.ajax ({
//             url: "../Controller/InformeEvidenciasController.php?Op=MostrarRequisitosPorDocumento",
//             type: 'POST',
//             data: 'ID_DOCUMENTO='+id_documento,
//             success:function(datosRequisitos)
//             {
//                $.each(datosRequisitos,function(index,value){
                
//                 ValoresRequisitos+="<li>"+value.requisito+"</li>";                                       

//                });
//            ValoresRequisitos += "</ul>";     
//                $('#RequisitosListado').html(ValoresRequisitos);
//             }
//         });
// }

// function mostrarRegistros(id_documento)
// {
//  ValoresRegistros = "<ul>";

//  $.ajax ({
//      url:"../Controller/InformeEvidenciasController.php?Op=MostrarRegistrosPorDocumento",
//      type: 'POST',
//      data: 'ID_DOCUMENTO='+id_documento,
//      success:function(datosRegistros)
//      {
//          $.each(datosRegistros,function(index,value){
//             ValoresRegistros+="<li>"+value.registro+"</li>"; 
//          });

// ValoresRegistros += "</ul>";
//          $('#RegistrosListado').html(ValoresRegistros);
//      }
//  })
// }



// function loadSpinner(){
//         myFunction();
// }

    