
function listarDatos()
{
//    alert("Entro a listar datos");
    __datos=[];
    
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/ConsultasController.php?Op=Listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer (data)
    {        
        $.each(data,function(index,value){
//          alert("Valores each: "+value);

            __datos.push({
                "id_principal":[{'id_tema':value.id_tema}],
                "no":value.no,
                "nombre":value.nombre,
//                "Responsable del Documento":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno           
                "id_empleado":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
                "total_requisitos":value.total_requisitos,
                "resultado":value.resultado,
                "total_registros":value.total_registros,
                
            })
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    
    return __datos;
}


function listarjsGrid()
{  
    db={
                loadData: function(filter) {
//                    console.log("Entro al loadData");
//                    console.log(listarDatos(1));
                        return listarDatos();
              },
                  insertItem: function(item) {
                      return item;
              },
           } 
           
    window.db = db; 
    
    $("#jsGrid").jsGrid({
        
        onInit: function(args){
            gridInstance=args;
                jsGrid.ControlField.prototype.editButton=false;
                jsGrid.ControlField.prototype.deleteButton=false;
                jsGrid.Grid.prototype.autoload=true;
        }, 
        onDataLoading: function(args) {
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
        heading: true,
        sorting: true,
        paging: true,
        controller:db,
        filtering:true,
//        data: __datos,
        fields: [
                { name: "id_principal",visible:false },
                { name: "no",title:"No.Tema", type: "text", width: 80, validate: "required" },
                { name: "nombre",title:"Tema", type: "text", width: 150, validate: "required" },
                { name: "id_empleado",title:"Responsable del Tema", type: "text", width: 150, validate: "required" },
//                { name: "no",title:"No.Sub-Tema", type: "text", width: 150, validate: "required" },
//                { name: "nombre",title:"Sub-Tema", type: "text", width: 150, validate: "required" },
                { name: "total_requisitos",title:"Requisito", type: "text", width: 150, validate: "required" },
                { name: "resultado",title:"Penalizacion", type: "text", width: 150, validate: "required" },
                { name: "total_registros",title:"Registro", type: "text", width: 150, validate: "required" },
                
                {type:"control"}
        ]
                
    });
}



function loadSpinner()
{
        myFunction();
}


