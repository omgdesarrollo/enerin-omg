

function listarDatos()
{
//    alert("Entro a listar datos");
    __datos=[];
    __datosCBE=[];
    
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/DocumentosController.php?Op=Listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    
    var variablefunciondatos=function obtenerDatosServer (data)
    {
        $.each(data.empl,function(index,value){
//            alert(data.empl);
              __datosCBE.push({
                "Name":value.nombre_empleado+" "+value.apellido_paterno+" "+value.apellido_materno,
                "id_empleado":value.id_empleado           
              });
//              alert(__datosCBE);
                
        });
//        console.log(__datosCBE);
        
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
    
    $("#jsGrid").jsGrid({
        width: "100%",
        height: "300px",
        editing: true,
        heading: true,
        sorting: true,
        paging: true,
        
       
        data: __datos,
        fields: [
                { name: "id_principal",visible:false },
                { name: "clave_documento",title:"Clave del Documento", type: "text", width: 80, validate: "required" },
                { name: "documento",title:"Nombre del Documento", type: "text", width: 150, validate: "required" },
                { name: "id_empleado",title:"Responsable del Documento", type: "select", items:__datosCBE,valueField: "id_empleado", textField: "Name", width: 150, validate: "required" },
                {type:"control"}
        ],
        
         onItemUpdated: function(args) {
//             alert(args['item']['Clave del Documento']+""+args['item']['Nombre del Documento']+""+args['item']['Responsable del Documento']);
//        alert("Entro al Updated: "+args); 
        saveUpdateToDatabase(args);
//        console.log(args);
    }
        
    });
}

function saveUpdateToDatabase(args) 
{ 
//      console.log("Valor del args en el save: "+args['item']['id_principal'][0]);

      console.log(args);
//      columnas=new Object();
      columnas={};
      id_afectado=args['item']['id_principal'][0];
      console.log(id_afectado);
//      columnas['nombre']="nom";

      $.each(args['item'],function(index,value){
          if(args['previousItem'][index]!=value && value!="")
          {
//              console.log("Entro aqui");
              columnas[index]=value;
          }
//          console.log(args['previousItem'][index]);
      });
      
      $.ajax({
          url:"../Controller/GeneralController.php?Op=updateColumnas",
          type:"POST",
          data:'TABLA="documentos" &COLUMNAS='+columnas+' &ID='+id_afectado+'',
          success:function()
          {
              
          }
      });
      
//      console.log(columnas);
      
}


function loadSpinner(){
        myFunction();
}