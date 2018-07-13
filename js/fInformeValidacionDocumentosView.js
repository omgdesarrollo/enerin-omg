//listarDatos();
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
    
    
    
    //seccion de click del boton  graficar
    
    $("#btnGraficar").click(function (){
//window.location
alert("has enbtrado");
//   var dhxWins = new dhtmlXWindows();
////var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
// dhxWins.attachViewportTo("ventanawindows");
// var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:1338,  height:505,  center:true,resize: true,park:true,modal:true	});
// layoutWin.attachURL("GraficasInformeValidacionView.php", null, true);
    
    });
    
    
    });

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
    
//    console.log(parametroscheck);

//data=[];
// $.getJSON("../Controller/ReporteValidacionDocumentosController.php?Op=listar", function (result) {
//                        if (dataLength !== result.length) {
//                            for (var i = dataLength; i < result.length; i++) {
//                                data.push({
//                                    x: result[i].id_validacion_documento
//                                });
//                            }
//                            dataLength = result.length;
//                            chart.render();
//                        }
//                    });
////                   alert("");
//console.log(data);
                    
                    
    $.ajax
    ({
        url: '../Controller/InformeValidacionDocumentosController.php?Op=listarparametros(v,nv,sd)',
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


function construirTable(data)
{
    cargaTodo=0;
    tempData="";
    
    $.each(data["info"],function(index,value){
        value["clave_cumplimiento"]=data["detallesContrato"]["clave_cumplimiento"];
        value["cumplimiento"]=data["detallesContrato"]["cumplimiento"];
            tempData += construir(value,cargaTodo);
    });
     
    $("#datosGenerales").html(tempData);
    $("#loader").hide();
}


function construir(value,carga)
{
    tempData = "";
    
                if(carga==0)
                tempData += "<tr id='registro_"+value.id_validacion_documento+"'>";
                tempData += "<td class='celda' width='5%'>"+value.clave_cumplimiento+"</td>"
                tempData += "<td class='celda' width='10%'>"+value.cumplimiento+"</td>"
                tempData += "<td class='celda' width='10%'><button onClick='mostrarTemaResponsable("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-temaresponsable'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
                tempData += "<td class='celda' width='10%'><button onClick='mostrarRequisitos("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-requisitos'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
                tempData += "<td class='celda' width='10%'><button onClick='mostrarRegistros("+value.id_documento+");' type='button' class='btn btn-success' data-toggle='modal' data-target='#mostrar-registros'><i class='ace-icon fa fa-book' style='font-size: 20px;'></i>Ver</button></td>";
                tempData += "<td class='celda' width='15%'>"+value.clave_documento+"</td>";
                tempData += "<td class='celda' width='15%'>"+value.documento+"</td>";
                tempData += "<td class='celda' width='15%'>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td>";
                if(value.validacion_tema_responsable=="true")
                {
                   tempData += "<td class='celda' width='10%'>Validado</td>";
                }
                if (value.validacion_tema_responsable=="false")
                {
                   tempData += "<td class='celda' width='10%'>En Proceso</td>"; 
                }
                
                if(carga==0)
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
    $.ajax ({
        url:"../Controller/InformeValidacionDocumentosController.php?Op=MostrarTemayResponsable",
        type:'POST',
        data:'ID_DOCUMENTO='+id_documento,
        success:function(responseTemayResponsable)
        {
            $.each(responseTemayResponsable,function(index,value){
              ValoresTemaResponsable+="<tr><td>"+value.no+"</td>" ;
              ValoresTemaResponsable+="<td>"+value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno+"</td></tr>";  

            });

            ValoresTemaResponsable += "</tbody></table>";
            $('#TemayResponsableListado').html(ValoresTemaResponsable);
        }

    })

}
    
    
function mostrarRequisitos(id_documento)
{
        ValoresRequisitos = "<ul>";

        $.ajax ({
            url: "../Controller/InformeValidacionDocumentosController.php?Op=MostrarRequisitosPorDocumento",
            type: 'POST',
            data: 'ID_DOCUMENTO='+id_documento,
            success:function(responserequisitos)
            {
               $.each(responserequisitos,function(index,value){
                
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
     url:"../Controller/InformeValidacionDocumentosController.php?Op=MostrarRegistrosPorDocumento",
     type: 'POST',
     data: 'ID_DOCUMENTO='+id_documento,
     success:function(responseregistros)
     {
         $.each(responseregistros,function(index,value){
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
