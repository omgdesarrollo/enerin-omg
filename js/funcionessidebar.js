function loadDataSideBarCatalogoInformacion(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "empleados", text: "Empleados", icon: "empleados.jpg"},
          {id: "temas", text: "Temas", icon: "temas.jpg"},          
          {id: "documentos", text: "Documentos", icon: "documentosn.jpg"},
          //{id: "cumplimientos", text: "Cumplimientos", icon: "cumplimientos.png"},
          {type: "separator"},
          {id: "asignaciontemasrequisitos", text: "Asignacion de Tema - Requisito - Documento", icon: "asignacionrequisitos.png"}
          //{id: "asignaciondocumentostemas", text: "Asignacion de Documento - Tema", icon: "asignaciondocumento.png"}  

        ]
      });
      
                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                             
                                   switch(id){
                                       case "empleados":
//                                            consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");                                           
                                            $("#sidebarObjV").load('InyectarVistasView.php #empleados');
                                            //$("#sidebarObjV").load('EmpleadosView.php');
                                       break;  


                                       case "temas":
                                            $("#sidebarObjV").load('InyectarVistasView.php #temas');
                                       break;
                                     

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
    
    function loadDataInformeGerencial(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
   
        consultarInformacion("../Controller/DocumentosEntradaController.php?Op=Listar");
        consultarInformacion("../Controller/SeguimientoEntradasController.php?Op=Listar");
        consultarInformacion("../Controller/InformeGerencialController.php?Op=Listar");
        $("#sidebarObjV").load('InyectarVistasView.php #informegerencial');
                            
    }
    function loadDataSideBarCumplimientosDocumentos(){
        
        
        consultarInformacion("../Controller/ValidacionDocumentosController.php?Op=Listar");
        $("#sidebarObjV").load('InyectarVistasView.php #validaciondocumentos');                       
    }
        function loadViewUsuario()
        {
            $("#sidebarObjV").load('InyectarVistasView.php #administrarUsuario');
        }
    
    
       function loadDataSideBarCumplimientosEvidencias(){

          $("#sidebarObjV").load('InyectarVistasView.php #seguimientoevidencias');
                     
    }
    
    function loadDataSideBarAjustesUsuario(){
//         mySidebar = myLayout.cells("a").attachSidebar();
   
    mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "permisos", text: "Permisos", icon: "cumplimientos.png"},
          {id: "ajustes", text: "Ajustes", icon: "ajustes.png"}
          
            
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "permisos":
                                            $("#sidebarObjV").load('InyectarVistasView.php #documentosEntrada');
                                       break;  
                                       

                                       case "ajustes":
                                            $("#sidebarObjV").load('InyectarVistasView.php #documentosSalida');
                                       break;
                                                                              
                                   }
      });
                        
    }
    
    
    