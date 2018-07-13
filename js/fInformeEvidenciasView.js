
parametroscheck={"validado":"false","no_validado":"false","sin_documento":"false"};  
    $(function (){
//      alert("tene");
$('#checkValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//             alert("esta en "+$(this).is(':checked'));
//            parametroscheck["validado"]="false";
//            alert("validados");
//        }else{
//            alert("esta  "+$(this).is(':checked'));
             parametroscheck["validado"]=$(this).is(':checked');
//        }
//alert("checkeado  "+parametroscheck["validado"]);
    cargar("validados");
//alert("d"+parametroscheck["validado"]+"  no validados  "+parametroscheck["no_validado"] );
    });
    
$('#checkNoValidado').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
parametroscheck["no_validado"]=$(this).is(':checked');
    cargar("novalidados");
    });
    
$('#checkSinDocumento').click(function() {
//        if (!$(this).is(':checked')) {
//            return confirm("Estas seguro que desea quitarle la seleccion");
//        }
//alert("d");
parametroscheck["sin_documento"]=$(this).is(':checked');
    cargar("sindocumento");
    });
    
    
    }); //CIERRA EL $(FUNCTION)
    
    
function cargar(key){
    switch (key) {
        case "validados":

        //        alert("entraste en validados");
                listarDatos();
        break;
        
        case "novalidados":
            listarDatos();
        //        alert("no validados");
        break;
        
        case "sindocumento":
            listarDatos();
        //        alert("sin documento");
        break;
        
        default:

        break;
    }
}


function listarDatos()
{
    $.ajax
    ({
        url: '../Controller/InformeEvidenciasController.php?Op=listarparametros(v,nv,sd)',
        type: 'POST',
        data:parametroscheck,
        beforeSend:function()
        {
            $('#loader').show();
        },
        success:function(datos)
        {
//            data = datos;
            construirTable(datos);
        },
        error:function(error)
        {
            $('#loader').hide();
        }
    });
}

function construirTable(datos)
{
    cargaTodo=0;
    tempData="";
    
    $.each(datos,function(index,value){
        
            tempData += construir(value,cargaTodo);
    });
     
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



function loadSpinner(){
        myFunction();
}

    