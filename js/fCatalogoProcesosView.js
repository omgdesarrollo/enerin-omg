listarDatos();


function listarDatos()
{

     __datos=[];
//        contador=1;
        datosParamAjaxValues={};
        datosParamAjaxValues["url"]="../Controller/CatalogoProcesosController.php?Op=listar";
        datosParamAjaxValues["type"]="POST";
        datosParamAjaxValues["async"]=false;
        var variablefunciondatos=function obtenerDatosServer (data){

        $.each(data,function (index,value){

        __datos.push({
//            "No":contador++,
//            "Tema":"<button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
//            "Requisitos":"<button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
//            "Registros":"<button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button>",
            "Clave del Contrato":value.clave_contrato,
            "Region Fiscal":value.region_fiscal,
            "Ubicacion del Punto de Medicion":value.ubicacion_punto_medicion,
            "Tag del Patin de Medicion":value.tag_patin_medicion,
            "Tipo de Medidor":value.tipo_medidor,
            "Tag del Medidor":value.tag_medidor,
            "clasificacion del Sistema de Medicion":value.clasificacion_sistema_medicion,
            "Tipo de Hidrocarburo":value.tipo_hidrocarburo
        })
        });
//        console.log(__datos);
   }
   
   var listfunciones=[variablefunciondatos];
   ajaxHibrido(datosParamAjaxValues,listfunciones); 
   
       $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        heading: true,
        sorting: true,
        paging: true,
 
        data: __datos,
        fields: [
                { name: "Clave del Contrato", type: "text", width: 80, validate: "required" },
                { name: "Region Fiscal", type: "text", width: 150, validate: "required" },
                { name: "Ubicacion del Punto de Medicion", type: "text", width: 150, validate: "required" },
                { name: "Tag del Patin de Medicion", type: "text", width: 150, validate: "required" },
                { name: "Tipo de Medidor", type: "text", width: 150, validate: "required" },    
                { name: "Tag del Medidor", type: "text", width: 150, validate: "required" },
                { name: "clasificacion del Sistema de Medicion", type: "text", width: 150, validate: "required" },
                { name: "Tipo de Hidrocarburo", type: "text", width: 150, validate: "required" }
        ]
    });
}


function construirTable(datos)
{
    cargaTodo=0;
    tempData="";
    
    $.each(datos,function(index,value){
        
            tempData += construir(value,cargaTodo);
    });
    
//    $.each(datos["info"],function(index,value){
//        value["clave_cumplimiento"]=datos["detallesContrato"]["clave_cumplimiento"];
//        value["cumplimiento"]=datos["detallesContrato"]["cumplimiento"];
//            tempData += construir(value,cargaTodo);
//    });
     
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}

function construir(value,cargaTodo)
{
    tempData="";
    
    if(cargaTodo==0)
        tempData += "<tr id='registro_"+value.id_evidencias+"'>";
        tempData += "<td class='celda' width='10%' style='font-size: -webkit-xxx-large'><button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
        tempData += "<td class='celda' width='10%' style='font-size: -webkit-xxx-large'><button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
        tempData += "<td class='celda' width='10%' style='font-size: -webkit-xxx-large'><button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
        tempData += "<td class='celda' width='15%'>"+value.clave_documento+"</td>";
        tempData += "<td class='celda' width='15%'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";
        tempData += "<td class='celda' width='15%'>"+value.frecuencia+"</td>";
        tempData += "<td width='10%'style='font-size: -webkit-xxx-large'><button onClick='mostrar_urls("+value.id_evidencias+","+value.validador+","+value.validacion_supervisor+","+value.id_usuario+");'";
        tempData += "type='button' class='btn btn-info' data-toggle='modal' data-target='#create-itemUrls'>";
        tempData += "<i class='fa fa-cloud-upload' style='font-size: 15px'></i> Ver</button></td>";
        tempData += "<td class='celda' width='5%'>Fecha Registro</td>"
        tempData += "<td class='celda' width='15%'>"+value.desviacion+"</td>";
        tempData += "<td class='celda' width='15%'>"+value.accion_correctiva+"</td>";
        tempData += "<td class='celda' width='5%'>Avance del Programa</td>"
        if(value.validacion_supervisor=="true")
                {
                   tempData += "<td class='celda' width='10%'>Validado</td>";
                }
                if (value.validacion_supervisor=="false")
                {
                   tempData += "<td class='celda' width='10%'>En Proceso</td>"; 
                }
     if(cargaTodo==0)
        tempData += "</tr>";
    
    return tempData;
}


function mostrarTemaResponsable(id_documento)
{
    ValoresTemaResponsable = "<table class='tbl-qa'>\n\
                                <tr>\n\
                                    <th class='table-header'>Tema</th>\n\
                                    <th class='table-header'>Responsable del Tema</th>\n\
                                </tr>\n\
                                <tbody>";
    
    $.ajax({
        url:'../Controller/InformeEvidenciasController.php?Op=MostrarTemayResponsable',
        type:'POST',
        data:'ID_DOCUMENTO='+id_documento,
        success:function(datosTemaResponsable)
        {
            $.each(datosTemaResponsable,function(index,value){
                ValoresTemaResponsable+="<tr><td>"+value.no+"</td>" ;
                ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";
            });
                ValoresTemaResponsable += "</tbody></table>";
                $('#TemayResponsableListado').html(ValoresTemaResponsable);
        }
    });
}

function mostrarRequisitos(id_documento)
{
        ValoresRequisitos = "<ul>";

        $.ajax ({
            url: "../Controller/InformeEvidenciasController.php?Op=MostrarRequisitosPorDocumento",
            type: 'POST',
            data: 'ID_DOCUMENTO='+id_documento,
            success:function(datosRequisitos)
            {
               $.each(datosRequisitos,function(index,value){
                
                ValoresRequisitos+="<li>"+value.requisito+"</li>";                                       

               });
           ValoresRequisitos += "</ul>";     
               $('#RequisitosListado').html(ValoresRequisitos);
            }
        });
}

function mostrarRegistros(id_documento)
{
 ValoresRegistros = "<ul>";

 $.ajax ({
     url:"../Controller/InformeEvidenciasController.php?Op=MostrarRegistrosPorDocumento",
     type: 'POST',
     data: 'ID_DOCUMENTO='+id_documento,
     success:function(datosRegistros)
     {
         $.each(datosRegistros,function(index,value){
            ValoresRegistros+="<li>"+value.registro+"</li>"; 
         });

ValoresRegistros += "</ul>";
         $('#RegistrosListado').html(ValoresRegistros);
     }
 })
}



function loadSpinner(){
        myFunction();
}

    