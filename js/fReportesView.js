$(function (){
   precargados();
    listarDatosReportes();
     construirGrid();


//
//  jBoxReportes.jBox = new jBox('Modal', {
//    
//    // Unique id for CSS access
//    id: 'jBoxReportes',
//    
//    // Dimensions
//    width: 920,  // TODO move to global var
//    height: 350,
//    
//    // Attach to elements
//    attach: '#DemoLogin',
//    
//    // Create the content with the html provided in global var
//    content: '<div>' + jBoxReportes.html.form +'</div>',
//    
//    // When the jBox is being initialized add internal functions
//    onInit: function () {
//      
//      // Internal function to show content
//      this.showContent = function (id, force) {
//        
//        // Abort if an ajax call is loading
//        if (!force && $('#LoginWrapper').hasClass('request-running')) return null;
//        
//        // Set the title depending on id
//        this.setTitle(jBoxReportes.title[id]);
//        
//        // Show content depending on id
//        $('.login-container.active').removeClass('active');
//        $('#LoginContainer-' + id).addClass('active');
//        
//        // Remove error tooltips
//        // TODO only loop through active elements or store tooltips in global var rather than on the element
//        $.each(jBoxReportes.textfieldTooltips, function (id, tt) {
//          $('#' + id).data('jBoxTextfieldError') && $('#' + id).data('jBoxTextfieldError').close();
//        });
//      };
//      
//      // Initially show content for login
//      this.showContent('login', true);
//      
//      // Add focus and blur events to textfields
//      $.each(jBoxReportes.textfieldTooltips, function (id, tt) {
//        
//        // Focus an textelement
//        $('#' + id).on('focus', function () {
//          
//          // When there is an error tooltip close it
//          $(this).data('jBoxTextfieldError') && $(this).data('jBoxTextfieldError').close();
//          
//          // Remove the error state from the textfield
//          $(this).removeClass('textfield-error');
//          
//          // Store the tooltip jBox in the elements data
//          if (!$(this).data('jBoxTextfieldTooltip')) {
//            
//            // TODO create a small jbox plugin
//            
//            $(this).data('jBoxTextfieldTooltip', new jBox('Tooltip', {
//              width: 310, // TODO use modal width - 10
//              theme: 'TooltipSmall',
//              addClass: 'LoginTooltipSmall',
//              target: $(this),
//              position: {
//                x: 'left',
//                y: 'top'
//              },
//              outside: 'y',
//              offset: {
//                y: 6,
//                x: 8
//              },
//              pointer: 'left:17',
//              content: tt,
//              animation: 'move'
//            }));
//          }
//          $(this).data('jBoxTextfieldTooltip').open();
//          
//        // Loose focus of textelement
//        }).on('blur', function () {
//          $(this).data('jBoxTextfieldTooltip').close();
//        });
//      });
//      
//      // Internal function to show errors
//      this.showError = function (element, message) {
//        
//        if (!element.data('errorTooltip')) {
//          
//          // TODO add the error class here
//          
//          element.data('errorTooltip', new jBox('Tooltip', {
//            width: 310,
//            theme: 'TooltipError',
//            addClass: 'LoginTooltipError',
//            target: element,
//            position: {
//              x: 'left',
//              y: 'top'
//            },
//            outside: 'y',
//            offset: {
//              y: 6
//            },
//            pointer: 'left:9',
//            content: message,
//            animation: 'move'
//          }));
//        }
//        
//        element.data('errorTooltip').open();
//      };
//      
//      // Internal function to change checkbox state
//      this.toggleCheckbox = function () {
//        // Abort if an ajax call is loading
//        if ($('#LoginWrapper').hasClass('request-running')) return null;
//        
//        $('.login-checkbox').toggleClass('login-checkbox-active');
//      };
//      
//      // Add checkbox events to checkbox and label
//      $('.login-checkbox, .login-checkbox-label').on('click', function () {
//        this.toggleCheckbox();
//      }.bind(this));
//      
//      // Parse an ajax repsonse
//      this.parseResponse = function(response) {
//      	try {
//      		response = JSON.parse(response.responseText || response);
//      	} catch (e) {}
//      	return response;
//      };
//      
//      // Show a global error
//      this.globalError = function () {
//        new jBox('Notice', {
//          color: 'red',
//          content: 'Oops, something went wrong.',
//          attributes: {
//            x: 'right',
//            y: 'bottom'
//          }
//        });
//      };
//      
//      // Internal function to disable or enable the form while request is running
//      this.startRequest = function() {
//        this.toggleRequest();
//      }.bind(this);
//      
//      this.completeRequest = function() {
//        this.toggleRequest(true);
//      }.bind(this);
//      
//      this.toggleRequest = function (enable) {
//        $('#LoginWrapper')[enable ? 'removeClass' : 'addClass']('request-running');
//        $('#LoginWrapper button')[enable ? 'removeClass' : 'addClass']('loading-bar');
//        $('#LoginWrapper input, #LoginWrapper button').attr('disabled', enable ? false : 'disabled');
//      }.bind(this);
//      
//      // Bind ajax login function to login button
//      $('#LoginContainer-login button').on('click', function () {
//        $.ajax({
//          url: 'https://stephanwagner.me/PlaygroundLogin/login',
//          data: {
//            username: $('#loginUsername').val(),
//            password: $('#loginPassword').val(),
//            remember: $('.login-checkbox').hasClass('login-checkbox-active') ? 1 : 0
//          },
//          method: 'post',
//          beforeSend: function () {
//            this.startRequest();
//          }.bind(this),
//          
//          // Ajax call successfull
//          success: function (response) {
//            this.completeRequest();
//            response = this.parseResponse(response);
//            
//            // Login successfull
//            if (response.success) {
//              
//              this.close();
//              
//              new jBox('Notice', {
//                color: 'green',
//                content: 'You are now logged in',
//                attributes: {
//                  x: 'right',
//                  y: 'bottom'
//                }
//              });
//              
//              
//              // Redirect or own login behavior here
//              
//            
//            // Login failed
//            } else {
//              // Shake submit button
//              this.animate('shake', {element: $('#LoginContainer-login button')});
//              
//              if (response.errors) {
//                // Show error on textfields, for login no error tooltips neccessary, username or password is wrong
//                $('#loginUsername, #loginPassword').addClass('textfield-error');
//              } else {
//                // Backend error
//                this.globalError();
//              }
//            }
//          }.bind(this),
//          
//          // Ajax call failed
//          error: function () {
//            this.completeRequest();
//            this.animate('shake', {element: $('#LoginContainer-login button')});
//            this.globalError();
//          }.bind(this)
//        });
//      
//      }.bind(this));
//      
//      // Bind ajax register function to register button
//      $('#LoginContainer-register button').on('click', function () {
//        $.ajax({
//          url: 'https://stephanwagner.me/PlaygroundLogin/register',
//          data: {
//            username: $('#registerUsername').val(),
//            email: $('#registerEmail').val(),
//            password: $('#registerPassword').val()
//          },
//          method: 'post',
//          beforeSend: function () {
//            this.startRequest();
//          }.bind(this),
//          
//          success: function (response) {
//            this.completeRequest();
//            response = this.parseResponse(response);
//            
//            // Registration successfull
//            if (response.success) {
//              
//              this.close();
//              
//              new jBox('Notice', {
//                color: 'green',
//                content: 'Your account was created',
//                attributes: {
//                  x: 'right',
//                  y: 'bottom'
//                }
//              });
//              
//              
//              // Redirect or own register behavior here
//              
//            
//            // Registration failed
//            } else {
//              // Shake submit button
//              this.animate('shake', {element: $('#LoginContainer-register button')});
//              
//              if (response.errors) {
//                
//                // Loop through errors and open tooltips
//                $.each(response.errors, function (id, error) {
//                  
//                  // TODO Only one tooltip at a time
//                  
//                  var id_selector = 'register' + (id).substr(0,1).toUpperCase() + (id).substr(1);
//                  
//                  $('#' + id_selector).addClass('textfield-error');
//                  
//                  if (!$('#' + id_selector).data('jBoxTextfieldError')) {
//                    $('#' + id_selector).data('jBoxTextfieldError', new jBox('Tooltip', {
//                      width: 310,
//                      theme: 'TooltipError',
//                      addClass: 'LoginTooltipError',
//                      target: $('#' + id_selector),
//                      position: {
//                        x: 'left',
//                        y: 'top'
//                      },
//                      outside: 'y',
//                      offset: {
//                        y: 6,
//                        x: 8
//                      },
//                      pointer: 'left:17',
//                      //content: error,
//                      animation: 'move'
//                    }));
//                  }
//                  
//                  $('#' + id_selector).data('jBoxTextfieldError').setContent(error).open();
//                  
//                });
//                
//              // Backend error
//              } else {
//                this.globalError();
//              }
//            }
//          }.bind(this),
//          
//          // Ajax call failed
//          error: function () {
//            this.completeRequest();
//            this.animate('shake', {element: $('#RegisterContainer-login button')});
//            this.globalError();
//          }.bind(this)
//        });
//      
//      }.bind(this));
//      
//    },
//    onOpen: function () {
//      
//      // Go back to login when we open the modal
//      this.showContent('login', true);
//      
//    },
//    onClose: function () {
//        
//        // TODO reset form completely
//        // TODO only close jBox with close button, not on overlay click
//        
//        // Remove error tooltips
//        // TODO Better to reset the form, this loop is also in showContent
//        $.each(jBoxReportes.textfieldTooltips, function (id, tt) {
//          $('#' + id).data('jBoxTextfieldError') && $('#' + id).data('jBoxTextfieldError').close();
//        });
//        
//    }
//  });
  
  
  //seccion de evento del datalist cuando seleccionas una opcion
//	$("input[name=eleccioncontratos]").change(function() {
//        		var value=$("input[name=eleccioncontratos]").val();
////                var data=$('#opcionescontratos [value="' + value + '"]').data('ejemplo');
//              alert(value);
//        		});
//termina seccion del datalist
  
  
});

function reconstruir(value,index)
{
    tempData = new Object();
    tempData["no"] = index;
    tempData["id_principal"] = [{"id_contrato":value.id_contrato}];
    tempData["region_fiscal"] = value.region_fiscal;
    tempData["clave_contrato"] = value.clave_contrato;
    tempData["ubicacion"] = value.ubicacion;
    tempData["tag_patin"] = value.tag_patin;
    tempData["tipo_medidor"] = value.tipo_medidor;
    tempData["tag_medidor"] = value.tag_medidor;
    tempData["clasificacion"] = value.clasificacion;
    tempData["hidrocarburo"] = value.hidrocarburo;
    tempData["omgc1"] = value.omgc1;
    tempData["omgc2"] = value.omgc2;
    tempData["omgc3"] = value.omgc3;
    tempData["omgc4"] = value.omgc4;
    tempData["omgc5"] = value.omgc5;
    tempData["omgc6"] = value.omgc6;
    tempData["omgc7"] = value.omgc7;
    tempData["omgc8"] = value.omgc8;
    tempData["omgc9"] = value.omgc9;
    tempData["omgc10"] = value.omgc10;
    tempData["omgc11"] = value.omgc11;
    tempData["omgc12"] = value.omgc12;
    tempData["omgc13"] = value.omgc13;
    tempData["omgc14"] = value.omgc14;
    tempData["omgc15"] = value.omgc15;
    tempData["omgc16"] = value.omgc16;
    tempData["omgc17"] = value.omgc17;
    tempData["omgc18"] = value.omgc18;
    tempData["delete"] = "1";
    return tempData;
}
function listarDatosReportes()//listarDatos
{
    __datos=[];
    datosParamAjaxValues={};
    datosParamAjaxValues["url"]="../Controller/ReportesController.php?Op=listar";
    datosParamAjaxValues["type"]="POST";
    datosParamAjaxValues["async"]=false;
    var variablefunciondatos=function obtenerDatosServer(data)
    {
        dataListado = data;
        $.each(data,function (index,value)
        {
            __datos.push( reconstruir(value,index++) );
        });
    }
    var listfunciones=[variablefunciondatos];
    ajaxHibrido(datosParamAjaxValues,listfunciones);
    DataGrid = __datos;
//    return 1;
}

function construirGrid()
{
//    jsGrid.fields.customControl = MyCControlField;
        db=
        {
            loadData: function()
            {
                return DataGrid;
            },
        };
    
    $("#jsGrid").jsGrid({
         onInit: function(args)
         {
             gridInstance=args.grid;
             jsGrid.Grid.prototype.autoload=true;
         },
        onDataLoading: function(args)
        {
//            loadBlockUi();
        },
        onDataLoaded:function(args)
        {
//            $('.jsgrid-filter-row').removeAttr("style",'display:none');
        },
        width: "100%",
        height: "300px",
        autoload:true,
        heading: true,
        sorting: true,
//        sorter:true,
        paging: true,
        controller:db,
        pageLoading:false,
        pageSize: 10,
        pageButtonCount: 5,
        updateOnResize: true,
        confirmDeleting: true,
        pagerFormat: "Pages: {first} {prev} {pages} {next} {last}    {pageIndex} of {pageCount}",
        fields: [
                { name:"id_principal", visible:false},
                { name:"clave_contrato", title: "ID del Contrato o Asignación", type: "text", width: 150, validate: "required" },
                { name:"region_fiscal", title: "Region Fiscal", type: "text", width: 150, validate: "required" },
                { name:"ubicacion", title: "Ubicación del Punto de Medición", type: "text", width: 150, validate: "required" },
                { name:"tag_patin", title: "Tag del Patin de Medición", type: "text", width: 130, validate: "required" },
                { name:"tipo_medidor", title: "Tipo de Medidor", type: "text", width: 150, validate: "required" },    
                { name:"tag_medidor", title: "Tag del Medidor", type: "text", width: 130, validate: "required" },
                { name:"clasificacion", title: "Clasificación del Sistema de Medición", type: "text", width: 150, validate: "required" },
                { name:"hidrocarburo", title: "Tipo de Hidrocarburo", type: "text", width: 150, validate: "required" },
                { name:"omgc1", title: "Fecha Produccion", type: "text", width: 150, validate: "required" },
                { name:"omgc2", title: "Presion", type: "text", width: 150, validate: "required" },
                { name:"omgc3", title: "Temperatura", type: "text", width: 150, validate: "required" },
                { name:"omgc4", title: "Produccion de Petroleo", type: "text", width: 150, validate: "required" },
                { name:"omgc5", title: "°AP(PETROLEO)I", type: "text", width: 150, validate: "required" },
                { name:"omgc6", title: "%S(PETROLEO)", type: "text", width: 150, validate: "required" },
                { name:"omgc7", title: "Sal", type: "text", width: 150, validate: "required" },
                { name:"omgc8", title: "%H20(PETROLEO)", type: "text", width: 150, validate: "required" },
                { name:"omgc9", title: "Produccion de condensado Medido Neto", type: "text", width: 190, validate: "required" },
                { name:"omgc10", title: "°API(CONDENSADO)", type: "text", width: 170, validate: "required" },
                { name:"omgc11", title: "%S(CONDENSADO)", type: "text", width: 170, validate: "required" },
                { name:"omgc12", title: "%H20(CONDENSADO)", type: "text", width: 180, validate: "required" },
                { name:"omgc13", title: "Produccion de gas medido", type: "text", width: 180, validate: "required" },
                { name:"omgc14", title: "Poder Calorifico de gas", type: "text", width: 180, validate: "required" },
                { name:"omgc15", title: "Peso Molecular de gas", type: "text", width: 150, validate: "required" },
                { name:"omgc16", title: "Energia de gas", type: "text", width: 150, validate: "required" },
                { name:"omgc17", title: "Eventos", type: "text", width: 150, validate: "required" },
                { name:"omgc18", title: "Fecha Real Reporte", type: "text", width: 190, validate: "required" }
                
//                { name:"delete", title:"Opción", type:"customControl" }
        ]
        
        
    });
}

function precargados()
    {
     var _data=""; 
//     var  clave_contrato='<input list="opcionescontratos" name="eleccioncontratos" /><datalist id="opcionescontratos">'
         clave_contrato="<select>";
//        region_fiscal='<input list="opciones" name="opciones" /><datalist id="opciones"><option </datalist>';
        region_fiscal="<select>";
        pm="<select>";
        tpm="<select>";
        tm="<select>";
        clasificacionsistemamedicion="<select>";
        th="<select>";
        
        $.ajax({
            url : '../Controller/ReportesController.php?Op=listar',
            success 	: function(r)
            {
//                console.log(r);
//                                    $("#contrato").val(r["clave_cumplimiento"]);
                $.each(r,function (index,value)
                {
                    clave_contrato+="<option value="+value['clave_contrato']+">"+value['clave_contrato']+"</option>";
                   region_fiscal+="<option value="+value['region_fiscal']+">"+value['region_fiscal']+"</option>";
                    pm+="<option value="+value['ubicacion']+">"+value["ubicacion"]+"</option>";
                    tpm+="<option value="+value['tag_patin']+">"+value["tag_patin"]+"</option>";
                    tm+="<option value="+value['tipo_medidor']+">"+value["tipo_medidor"]+"</option>";
                    clasificacionsistemamedicion+="<option value="+value['clasificacion']+">"+value["clasificacion"]+"</option>";
                    th+="<option value="+value['hidrocarburo']+">"+value["hidrocarburo"]+"</option>";
                });
//                clave_contrato+="</datalist>"
                $("#clave_contrato").html(clave_contrato);
                $("#contrato").html(clave_contrato);
                $("#region_fiscal").html(region_fiscal);
                $("#pm").html(pm);
                $("#tpm").html(tpm);
                $("#tm").html(region_fiscal);
                  $("#clasificacionsistemamedicion").html(clasificacionsistemamedicion);
                     $("#th").html(th);
//                jBoxReportes.html.form=_data;
                
//                $("#clasificacionsistemamedicion").html(clasificacionsistemamedicion);
//                $("#th").html(th);
            }
        });
    }
    



