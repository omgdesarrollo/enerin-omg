
$( function() {
	function log( message ) {
      $( "<div>" ).text( message ).prependTo( "#log" );
      $( "#log" ).scrollTop( 0 );
    }
 
    $( "#birds" ).autocomplete({
      source: function( request, response ) {
        $.ajax( {
          url: "../Controller/AdminController.php?Op=BusquedaEmpleado",
//          dataType: "jsonp",
          data: {
            CADENA: request.term,
            fa:"d"
          },
          success: function( data ) {
            response( data );
          }
        } );

//            buscarEmpleados(request.term);
      },
      minLength: 1,
      select: function( event, ui ) {
        log( "Selected: " + ui.item.value + " aka " + ui.item.id );
      }
    } );
	} );
	
// inicializa el objeto de estructura de filtros
inicializarFiltros = ()=>
{
    return new Promise((resolve,reject)=>
    {
        filtros = [
            { id: "no", type: "none"},
            { id: "nombre_usuario", type: "text",},
            { id: "nombre", title:"Nombre", type: "text"},
            { id: "correo", title:"Correo", type: "text"},
            { id: "categoria", title:"Categoria", type: "text"},
            { id: "permisos", title:"Vistas", type: "none"},
            { id: "temas", title:"Temas", type: "none"},
            { id: "cumplimientos", title:"Contratos", type: "none"},
            { id:"opcion",type:"opcion"}
        ];
        if(window.top.variables_super_globales["cumplimientos"]!=true)
        {
            filtros.splice(6,1); 
        }
        resolve();
    });
}

// construye el objeto de la fila de la tabla (jsGrid)
reconstruir = (value,index)=>
{
    tempData = new Object();
    ultimoNumeroGrid = index;

    tempData["id_principal"] = [{id_usuario:value.id_usuario}];
    tempData["no"] = index;
    tempData["nombre_usuario"] = value.nombre_usuario;
    tempData["nombre"] = value.nombre;
    tempData["correo"] = value.correo;
    tempData["categoria"] = value.categoria;

    tempData["permisos"] = "<button onClick='modificarPermisos("+value.id_usuario+");' type='button' class='btn btn_agregar btn-success'";
    tempData["permisos"] += "data-toggle='modal' data-target='#modificarPermisos'>";
    tempData["permisos"] += "<i class='ace-icon fa fa-pencil' style='font-size: 20px;'></i></button>";

    tempData["temas"] = "<button onClick='modificarTemas("+value.id_usuario+");' type='button' class='btn btn_agregar btn-success'";
    tempData["temas"] += "data-toggle='modal' data-target='#modificarTemas'>";
    tempData["temas"] += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i></button>";

    tempData["cumplimientos"] = "<button onClick='abrirCumplimientos("+value.id_usuario+");' type='button' class='btn btn_agregar btn-success'";
    tempData["cumplimientos"] += "data-toggle='modal' data-target='#permisosContratos'>";
    tempData["cumplimientos"] += "<i class='ace-icon fa fa-book' style='font-size: 20px;'></i></button>";

    tempData["delete"] = tempData["id_principal"];
    tempData["delete"].push({eliminar:0});
    tempData["delete"].push({editar:1});
    
    return tempData;
}

// lista y construye el cuerpo de la tabla (jsGrid)
listarDatos = ()=>
{
    return new Promise((resolve,reject)=>
    {
        // console.log("valoes:  ",window.top.variables_super_globales);
        __datos=[];
        $.ajax({
            url: '../Controller/AdminController.php?Op=Listar',
            type:"GET",
            beforeSend:()=>
            {
                growlWait("Solicitud","Solicitando Datos...");
            },
            success:(data)=>
            {
                if(typeof(data)=="object")
                {
                    growlSuccess("Solicitud","Registros obtenidos");
                    dataListado = data;
                    $.each(data,(index,value)=>
                    {
                        __datos.push( reconstruir(value,index+1) );
                    });
                    DataGrid = __datos;
                    gridInstance.loadData();
                    resolve();
                }
                else
                {
                    growlSuccess("Solicitud","No Existen Registros");
                    reject();
                }
            },
            error:(e)=>
            {
                growlError("Error","Error en el servidor");
                reject();
            }
        });
    });
}

function saveUpdateToDatabase(args)//listo
{
//    console.log("argumetnso  ",args);
        columnas=new Object();
        entro=0;
        id_afectado = args['item']['id_principal'][0];
        
//        console.log("trae el id afectado ",id_afectado);
        verificar = 0;
        
    
//        console.log("dentro de then ",resolve);
        $.each(args['item'],(index,value)=>
        {
                if(args['previousItem'][index]!=value && value!="")
                {
                        if(index!='id_principal' && !value.includes("<button") && index!="delete")
                        {
                                columnas[index]=value;
                        }
                }
        });
        
        if(Object.keys(columnas).length != 0 && verificar==0)
        {
         verificarUsuarioExiste({"nombre_usuario":args.item.nombre_usuario}).then(function(resolve){  
        if(resolve["repetido"]=="no"){//valida si el nombre de usuario esta repetido
            $.ajax({
                url:"../Controller/GeneralController.php?Op=Actualizar",
                type:"POST",
                data:'TABLA=usuarios'+'&COLUMNAS_VALOR='+JSON.stringify(columnas)+"&ID_CONTEXTO="+JSON.stringify(id_afectado),
                beforeSend:()=>
                {
                        growlWait("Actualización","Espere...");
                },
                success:(data)=>
                {
                        if(data==1)
                        {
                                growlSuccess("Actualización","Se actualizaron los campos");
                                 
                                    actualizarUsuario(id_afectado.id_usuario);
                            
                        }
                        else
                        {
                                growlError("Actualización","No se pudo actualizar");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
            });
             }
             else
             {
                 growlError("Actualización","No se pudo actualizar debido a que el usuario ya existe");
                                componerDataGrid();
                                gridInstance.loadData();
             }
         });//aqui va el cierre del then    
        }
        else
        {
                componerDataGrid();
                gridInstance.loadData();
        }
        
        
//        }//cierra el if de donde compara si el nombre de usuario existe
//        else{
////            growlError("Actualización","No se pudo actualizar debido a que el usuario ya existe");
////                                componerDataGrid();
////                                gridInstance.loadData();
//        }
        
//         });//aqui cierra la funcion del then    
}



function actualizarUsuario(id_usuario)
{
    console.log("es  ",id_usuario);
        $.ajax({
                url:'../Controller/AdminController.php?Op=ListarUsuario',
                type: 'GET',
                data:'ID_USUARIO='+id_usuario,
                success:function(datos)
                {
                        if(typeof(datos)=="object")
                        {
                            $.each(datos,function(index,value){
                                    componerDataListado(value);
                            });
                            componerDataGrid();
                            gridInstance.loadData();
                        }
                        else
                        {
                                growlError("Actualizar Vista","No se pudo actualizar la vista, refresque");
                                componerDataGrid();
                                gridInstance.loadData();
                        }
                },
                error:function()
                {
                        componerDataGrid();
                        gridInstance.loadData();
                        growlError("Error","Error del servidor");
                }
        });
}

function verificarUsuarioExiste(args){
    console.log("tiene ",args);
    return new Promise(function(resolve,reject){
      $.ajax({
                url:'../Controller/AdminController.php?Op=ConsultarExisteUsuario',
                type: 'GET',
                data:'NOMBRE_USUARIO='+args["nombre_usuario"],
                success:function(data)
                {
                    
                    //1 : es que no esta repetido  
                    if(data==1){
                        
                        resolve({"repetido":"no"});
                    }
                    else{
                        resolve({"repetido":"si"});
                    }
//                    console.log("devolvio  ",data);
                },
                error:function()
                {
                    reject();   
                }
        });
    });
    
}


function componerDataGrid()//listo
{
    __datos = [];
    $.each(dataListado,function(index,value){
        __datos.push(reconstruir(value,index+1));
    });
    DataGrid = __datos;
}


function componerDataListado(value)// id de la vista documento, listo
{
    id_vista = value.id_usuario;
    id_string = "id_usuario";
    $.each(dataListado,function(indexList,valueList)
    {
        $.each(valueList,function(ind,val)
        {
            if(ind == id_string)
                    ( val==id_vista) ? dataListado[indexList]=value : console.log();
        });
    });
}
// reconstruye los datos de la vista
refresh = ()=>
{
    inicializarFiltros().then((resolve)=>
    {
        construirFiltros();
        listarDatos();
    },(error)=>
    {
        growlError("Error!","Error al construir la vista, recargue la página");
    });
}