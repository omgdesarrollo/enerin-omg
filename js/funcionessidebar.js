

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
                     var evid=    mySidebar.attachEvent("onSelect", function(id, value){
                             
                                   switch(id){
                                       case "empleados":
//                                            consultarInformacion("../Controller/EmpleadosController.php?Op=Listar");                                           
                                            $("#sidebarObjV").load('InyectarVistasView.php #empleados');
//                                                  mySidebar.detachEvent(evid);
                                            //$("#sidebarObjV").load('EmpleadosView.php');
                                       break;  


                                       case "temas":
                                            consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
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
          {id: "empleadosoficios", text: "Empleados", icon: "empleados.jpg"},
          {id: "autoridadesRemitentes", text: "Autoridad Remitente", icon: "entidadreguladora.png"},
          {id: "temasoficios", text: "Temas", icon: "temas.jpg"}
          /*{type: "separator"},*/
  
        ]
      });

                                 
                         mySidebar.attachEvent("onSelect", function(id, value){
                                   switch(id){
                                       case "empleadosoficios":
//                                            consultarInformacion("../Controller/EmpleadosOficiosController.php?Op=Listar");                                           
                                            $("#sidebarObjV").load('InyectarVistasView.php #empleadosoficios');
                                            //$("#sidebarObjV").load('EmpleadosView.php');
                                       break;  
                                       

                                       case "autoridadesRemitentes":
//                                            consultarInformacion("../Controller/EntidadesReguladorasController.php?Op=Listar");
                                            $("#sidebarObjV").load('InyectarVistasView.php #autoridadesRemitentes');
                                       break;
                                       

                                       case "cumplimientos":
                                             consultarInformacion("../Controller/CumplimientosController.php?Op=Listar");
                                            $("#sidebarObjV").load('InyectarVistasView.php #cumplimientos');
                                       break;
                                      

                                       case "temasoficios":
//                                            consultarInformacion("../Controller/ClausulasController.php?Op=Listar");
//                                            consultarInformacion("../Controller/EmpleadosController.php?Op=mostrarcombo");
                                            $("#sidebarObjV").load('InyectarVistasView.php #temasoficios');                             
                                       break;
                                   }
      });
                        
    }




function loadDataSideBarOficiosDocumentacion()
{
    
   
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
                
    
    function loadDataSideBarCumplimientosEvidencias()
    {
        $("#sidebarObjV").load('InyectarVistasView.php #seguimientoevidencias');
    }
    
    
    function loadDataSideBarTareas()
    {
        
        mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "empleadosTareas", text: "Empleados", icon: "empleados.jpg"},
          {id: "tareas", text: "Registrar Tareas", icon: "registrarTareas.png"}
          
            
        ]
      });

                                 
        mySidebar.attachEvent("onSelect", function(id, value){
                  switch(id){
                      case "empleadosTareas":
                            $("#sidebarObjV").load('InyectarVistasView.php #empleadosTareas'); 
                      break;  


                      case "tareas":
                           $("#sidebarObjV").load('InyectarVistasView.php #tareas');
                      break;

                  }
      });
    }
    
    
    
    function loadDataSideBarContratos()
    {
        $("#sidebarObjV").load('InyectarVistasView.php #cambiarcontrato');
    }
    
    
    function loadDataSideBarInformeCumplimientos()
    {
        mySidebar = new dhtmlXSideBar({
        parent: "sidebarObj",
        icons_path: "../../images/base/",    
                                template:'tiles',
        width: 350,
        items: [
          {id: "informesValidacionDocumentos", text: "Informe Validacion de Documentos", icon: "documentos.png"},
          {id: "informesEvidencias", text: "Informe de Evidencias", icon: "operaciones.png"}
          
            
        ]
      });

                                 
        mySidebar.attachEvent("onSelect", function(id, value){
                  switch(id){
                      case "informesValidacionDocumentos":
                           $("#sidebarObjV").load('InyectarVistasView.php #informesValidacionDocumentos');
                      break;  


                      case "":
                           $("#sidebarObjV").load('InyectarVistasView.php #');
                      break;

                  }
      });
        
    }
    
    
    function loadViewUsuario()
    {
        $("#sidebarObjV").load('InyectarVistasView.php #administrarUsuario');
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
                                            $("#sidebarObjV").load('InyectarVistasView.php #administrarUsuario');
                                       break;  
                                       

                                       case "ajustes":
                                            // $("#sidebarObjV").load('UsuarioAjustesView.php');
                                            $("#sidebarObjV").load('InyectarVistasView.php #ajustesUsuario');
                                       break;
                                                                              
                                   }
      });
      
                        
    }
    
    
    