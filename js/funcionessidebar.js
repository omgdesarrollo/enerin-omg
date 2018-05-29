function loadDataSideBarCatalogoInformacion(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "empleados", text: "Empleados", icon: "empleados.jpg"},
          {id: "clausulas", text: "Temas", icon: "temas.jpg"},          
          {id: "documentos", text: "Documentos", icon: "documentosn.jpg"},
          //{id: "cumplimientos", text: "Cumplimientos", icon: "cumplimientos.png"},
          {type: "separator"},
          //{id: "asignaciontema", text: "Asignacion de Tema - Empleado", icon: "asignaciontema.jpg"},
          {id: "asignaciontemasrequisitos", text: "Asignacion de Tema - Requisito - Documento", icon: "asignacionrequisitos.png"},
          //{id: "asignaciondocumentostemas", text: "Asignacion de Documento - Tema", icon: "asignaciondocumento.png"}  

        ]
      });
      
                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                             
                                   switch(id){
                                       case "empleados":
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");                                           
                                            $("#sidebarObjV").load('InyectarVistasView.php #empleados');
                                            //$("#sidebarObjV").load('EmpleadosView.php');
                                       break;  


                                       case "clausulas":
                                            consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
                                            $("#sidebarObjV").load('InyectarVistasView.php #clausulas');
                                       break;
                                       

//                                       case "requisitos":
//                                            consultarInformacion("../Controller/RequisitosController.php?Op=Listar");
//                                            $("#sidebarObjV").load('InyectarVistasView.php #requisitos');
//                                       break;
                                       

                                       case "documentos":             
                                             consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
                                             consultarInformacion("../Controller/DocumentosController.php?Op=Listar");
                                             consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Alarmas");
                                            $("#sidebarObjV").load('InyectarVistasView.php #documentos');
                                       break;
                                       

                                       case "asignaciontemasrequisitos":
                                             consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                             consultarInformacion("../Controller/ClausulasController.php?Op=mostrarcombo");
                                             consultarInformacion("../Controller/DocumentosController.php?Op=mostrarcombo");                                             
                                            $("#sidebarObjV").load('InyectarVistasView.php #asignaciontemasrequisitos');
                                       break;


                                       case "asignaciondocumentostemas":
                                             
                                             consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=mostrarcombo");                                          
                                             consultarInformacion("../Controller/DocumentosController.php?Op=mostrarcombo");
                                             consultarInformacion("../Controller/ClausulasController.php?Op=mostrarcombo");
                                             consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                             consultarInformacion("../Controller/AsignacionTemasRequisitosController.php?Op=Listar");
                                             consultarInformacion("../Controller/AsignacionDocumentosTemasController.php?Op=Listar");
                                             
                                            $("#sidebarObjV").load('InyectarVistasView.php #asignaciondocumentostemas');                                                                                 
                                       break;
                                   }
      });
                        
    }




function loadDataSideBarOficiosCatalogos(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "empleados", text: "Empleados", icon: "empleados.jpg"},
          {id: "entidadesreguladoras", text: "Autoridad Remitente", icon: "entidadreguladora.png"},
//          {id: "cumplimientos", text: "Cumplimientos", icon: "cumplimientos.png"},
          {id: "clausulas", text: "Temas", icon: "temas.jpg"}
          /*{type: "separator"},
          {id: "asignaciontema", text: "Asignacion de Tema - Empleado", icon: "asignaciontema.jpg"},
          {id: "asignacionrequisitos", text: "Asignacion de Requisito - Tema", icon: "asignacionrequisitos.png"},
          {id: "asignaciontemadocumento", text: "Asignacion de Tema - Documento", icon: "asignaciondocumento.png"}*/  
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "empleados":
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");                                           
                                            $("#sidebarObjV").load('InyectarVistasView.php #empleados');
                                            //$("#sidebarObjV").load('EmpleadosView.php');
                                       break;  
                                       

                                       case "entidadesreguladoras":
                                            consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=Listar");
                                            $("#sidebarObjV").load('InyectarVistasView.php #entidadesReguladoras');
                                       break;
                                       

                                       case "cumplimientos":
                                             consultarInformacion("../Controller/CumplimientosController.php?Op=Listar");
                                            $("#sidebarObjV").load('InyectarVistasView.php #cumplimientos');
                                       break;
                                      

                                       case "clausulas":
                                            consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
                                            $("#sidebarObjV").load('InyectarVistasView.php #clausulas');                             
                                       break;
                                   }
      });
                        
    }




function loadDataSideBarOficiosDocumentacion(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "documentosEntrada", text: "Documento entrada", icon: "documentoentrada.png"},
          {id: "documentosSalida", text: "Documento salida", icon: "documentosalida.png"}
          
            
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "documentosEntrada":
                                            consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                            consultarInformacion("../Controller/CumplimientosController.php?Op=mostrarcombo");
                                            consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=mostrarcombo");
                                            consultarInformacion("../Controller/ClausulasController.php?Op=mostrarcombo");
                                            consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Alarmas");
                                            $("#sidebarObjV").load('InyectarVistasView.php #documentosEntrada');
                                       break;  
                                       

                                       case "documentosSalida":
                                            consultarInformacion("../Controller/DocumentosSalidaController.php?Op=Listar");
                                            consultarInformacion("../Controller/DocumentosEntradaController.php?Op=mostrarcombo");
                                            $("#sidebarObjV").load('InyectarVistasView.php #documentosSalida');
                                       break;
                                                                              
                                   }
      });
                        
    }
    
    function loadDataSideBarOficiosVistas(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "seguimientoentradas", text: "Seguimiento", icon: "seguimiento.png"},
          {id: "informegerencial", text: "Informe Gerencial", icon: "informegerencial.png"}
            
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "seguimientoentradas":
                                            consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                            consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
                                            $("#sidebarObjV").load('InyectarVistasView.php #seguimientoentradas');
                                       break; 
                                       

                                       case "informegerencial":
                                            consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
                                            consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
                                            consultarInformacion("../Controller/InformeGerencialController.php?Op=Listar");
                                            $("#sidebarObjV").load('InyectarVistasView.php #informegerencial');
                                       break;
                                                                              
                                   }
      });
                        
    }
    function loadDataSideBarCumplimientosDocumentos(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "validaciondocumentos", text: "Validacion de Documentos", icon: "registrovalidaciondocumentos.jpg"},
          //{id: "formatodedocumento", text: "Formato de Documento", icon: "informegerencial.png"}
            
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "validaciondocumentos":
                                            consultarInformacion("../Controller/ValidacionDocumentosController.php?Op=Listar");

                                            $("#sidebarObjV").load('InyectarVistasView.php #validaciondocumentos');
                                       break;  
                                       

                                       case "formatodedocumentos":
                                          
                                       break;
                                                                              
                                   }
      });
                        
    } 
    
    
       function loadDataSideBarCumplimientosOperaciones(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
        template:'tiles',
        width: 350,
        items: [
          {id: "seguimientooperaciones", text: "Seguimiento Operaciones", icon: "seguimientooperaciones.jpg"},
        ]
      });
            mySidebar.attachEvent("onSelect", function(id, value){
                switch(id)
                {
                    case "seguimientooperaciones":
                    // consultarInformacion("../Controller/ValidacionDocumentosController.php?Op=Listar");
                    $("#sidebarObjV").load('InyectarVistasView.php #seguimientooperaciones');
                    break;
                }
      });
                        
    } 
    
      function loadDataSideBarCumplimientosPlanDeAccion(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "solicitudatenciondesviacion", text: "Solicitud Atencion Desviacion", icon: "solicituddesviacion.gif"},
            {id: "asignacionreponsableplan", text: "Asignacion Responsable Plan", icon: "asignacionresponsableplan.jpg"},
           {id: "generarplan", text: "Generar Plan", icon: "generarplan.jpg"},
            {id: "seguimiento", text: "seguimiento", icon: "seguimiento.png"}
            
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "solicitudatenciondesviacion":
                                          
                                       break;  
                                        case "asignacionreponsableplan":
                                          
                                       break;  
                                        case "generarplan":
                                          
                                       break;  
                                        case "seguimiento":
                                          
                                       break;  
                                       
                                                                              
                                   }
      });
                        
    }  
    
    