
function listarDatos(queRetornar)
{
//    alert("Entro a listar datos");
    __datos=[];
    
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/DocumentosController.php?Op=Listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer (data)
    {        
        $.each(data.doc,function(index,value){
//          alert("Valores each: "+value);

            __datos.push({
                "id_principal":[{'id_documento':value.id_documento}],
                "clave_documento":value.clave_documento,
                "documento":value.documento,
//                "Responsable del Documento":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno           
                "id_empleado":value.id_empleado
            })
        });
    }
    
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    
   if(queRetornar==1)
   {
       console.log(__datos);
      return __datos; 
   }else{
      return __datosCBE;
      console.log(__datosCBE);
   }
//   
//   console.log(__datos);

//    return __datos;
}


function listarjsGrid()
{  
    db={
                loadData: function(filter) {
//                    console.log("Entro al loadData");
//                    console.log(listarDatos(1));
                        return listarDatos(1);
              },
                  insertItem: function(item) {
                      return item;
              },
           } 
           
    window.db = db; 
    
    $("#jsGrid").jsGrid({
        
        onInit: function(args){
            gridInstance=args;
              jsGrid.ControlField.prototype.editButton=true;
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
        editing: true,
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
                { name: "no",title:"No.Sub-Tema", type: "text", width: 150, validate: "required" },
                { name: "nombre",title:"Sub-Tema", type: "text", width: 150, validate: "required" },
                { name: "requisito",title:"Requisito", type: "text", width: 150, validate: "required" },
                { name: "penalizacion",title:"Penalizacion", type: "text", width: 150, validate: "required" },
                { name: "registro",title:"Registro", type: "text", width: 150, validate: "required" },
                { name: "id_evidencia",title:"Evidencia", type: "text", width: 150, validate: "required" },
                { name: "id_cumplimiento",title:"Cumplimiento", type: "text", width: 150, validate: "required" },
                
                {type:"control"}
        ],
        
        onItemUpdated: function(args) {
//            console.log(args);
            saveUpdateToDatabase(args);
        },
    
        
            
    
        onItemDeleting: function(args) {
//            console.log(args);
            eliminarDocumento(args);

        }
        
    });
}



function loadSpinner()
{
        myFunction();
}


