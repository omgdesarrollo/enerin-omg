
<link href="../../assets/bootstrap/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<?php

date_default_timezone_set("America/Mexico_city");
$Alarmas = Session::getSesion("Alarmas");
$alarma;
$NotificacionesAlarma = array();
$numeroAlarmas = 0;
foreach($Alarmas as $alarma)
{
	// print_r($alarma);
	$alarm = new Datetime($alarma['fecha_alarma']);
	$flimite = new Datetime($alarma['fecha_limite_atencion']);
	$hoy = new Datetime();
	$al = strftime("%d - %B - %y");
	$hoy = new Datetime($al);
	if($flimite<=$hoy)
	{
		$NotificacionesAlarma[$numeroAlarmas]["AFECTADO"] = "FOLIO ".$alarma['folio_entrada']." DEL ".$alarma['clave_cumplimiento'];
			if($flimite == $hoy)
			{
				$NotificacionesAlarma[$numeroAlarmas]["MENSAJE"] = "TIEMPO VENCIDO";//mensaje automatico
			}
			else
			{
				$dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$flimite -> getTimestamp()));
				$dias = $dias / 86400;
				$NotificacionesAlarma[$numeroAlarmas]["MENSAJE"] = "TIEMPO VENCIDO ".$dias." DIA(S)";//mensaje automatico	
			}
		$numeroAlarmas++;
	}
	else
	{
		if($alarma['fecha_alarma'] != "0000-00-00")
		{
			$NotificacionesAlarma[$numeroAlarmas]["AFECTADO"] = "FOLIO ".$alarma['folio_entrada']." DEL ".$alarma['clave_cumplimiento'];
			if($alarm == $hoy)
			{
				$NotificacionesAlarma[$numeroAlarmas]["MENSAJE"] = "ALARMA - ".$alarma['mensaje_alerta'];//agregar campoDB para que el usuario ingrese su mensaje
			}
			else
			{
				$dias = strtotime(strftime("%d-%B-%y",$hoy -> getTimestamp())) - strtotime(strftime("%d-%B-%y",$alarm -> getTimestamp()));
				$dias = $dias / 86400;
				$NotificacionesAlarma[$numeroAlarmas]["MENSAJE"] = " ALARMA VENCIDA ".$dias." DIA(S)"." - ".$alarma['mensaje_alerta'];
			}
		$numeroAlarmas++;
		}
	}
}


// $notifacionescompletas= Session::getSesion("notificacionescompletas");
// $contadorNotificaciones=0;
// foreach ($notifacionescompletas as $value){
//     $contadorNotificaciones++;
// }



?>
<div class="main-encabezado">

<div id="navbar" class="navbar navbar-default ace-save-state">
            
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							OMG APPS
						</small>
					</a>
				</div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation" style=" z-index: 2;">
                    <ul class="nav ace-nav" style="height: 10%">
                    <!--seccion de inicio de sesion de alarmas--> 
        <li class="purple dropdown-modal">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#"   >
				    <i class="ace-icon fa fa-bell icon-animated-bell"></i>
					<span class="badge badge-important"><?php echo $numeroAlarmas;?></span>
				</a>

				<!-- <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close"> -->
				<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close" style="overflow:hidden;width:320px;height:350px;left:414px;right:auto;top:20px;overflow-y:scroll">
					<li class="dropdown-header">
					     <i class="ace-icon fa fa-exclamation-triangle"></i>
						<?php echo $numeroAlarmas." NOTIFICACIONES"; ?>
					</li>

						<li class="dropdown-content" >
							<ul class="dropdown-menu dropdown-navbar navbar-pink">
							<?php foreach($NotificacionesAlarma as $item)
							{ ?>
								<li>
									<a href="#">
									    <div class="clearfix">
										<span class="pull-left">
										    <i class="btn btn-xs no-hover btn-pink fa fa-user"></i>
											<?php echo $item['AFECTADO']." - ".$item['MENSAJE']; ?>
										</span>
										<!-- <span class="pull-right badge badge-info">+1</span> -->
									    </div>
									</a>
								</li>
							<?php } ?>
							</ul>
						</li>

						<!-- <li class="dropdown-footer"> -->
									<!-- <a href="#"> -->
										<!--VER MAS NOTIFICACIONES-->
										<!-- <i class="ace-icon fa fa-arrow-right"></i> -->
									<!-- </a> -->
						<!-- </li> -->
				</ul>
			</li>
                        <!--seccion de cierre  alarmas-->
                        
                        <!--inicio de seccion de mensajes-->
                        
                        <li class="green dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" id="CANTIDAD_NOTIFICACIONES2">
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header" id="CANTIDAD_NOTIFICACIONES">
									
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar" id="LISTA_NOTIFICACIONES">
									</ul>
								</li>

<!--								<li class="dropdown-footer">
									<a href="inbox.html">
										ver todos los mensajes
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>-->
							</ul>
						</li>
                        
                        <!--cierre de seccion de mensajes-->
                        
                        
                        
                        <!--seccion de info usuario-->
                            <li class="light-blue dropdown-modal">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="../../assets/probando/images/avatars/user.jpg" alt="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" />
					<span class="user-info">
						<small>Bienvenido,</small>
                                                    <div id=""><?php echo $Usuario["NOMBRE_USUARIO"]; ?></div>
                                                   <?php 
                                                   ($Usuario['NOMBRE_USUARIO']!="")? ($obuser=$Usuario["NOMBRE_USUARIO"]) :$obuser="";
                                                   
                                                       ?>
                                                    
                                                    <input id="user" type="hidden" value="<?php  echo $obuser ?> "> 
                                                    <input id="ts" type="hidden" value="<?php  echo $Usuario['tokenseguridad'] ?> "> 
                                                   
					</span>

<!--								<i class="ace-icon fa fa-caret-down"></i>-->
				</a>

					
			    </li>
                        <!--fin de seccion de info usuario-->
                        
                        
                        
                        
                        
                    </ul>
                    
                    
                </div>
                
            </div>
</div>

</div>
<script>
	listarNotificaciones();
	// setInterval(function(){listarNotificaciones();},20000);
	function listarNotificaciones()
	{
		$.ajax({
			url: '../Controller/NotificacionesController.php?Op=mostrarNotificaciones->Responsable',
			type: 'GET',
			success:function(notificaciones)
			{
				construirNotificaciones(notificaciones);
			}
		});
	}
	function construirNotificaciones(notificaciones)
	{
		cantidad=0;
		tempData2="";
		// console.log(notificaciones);
		$.each(notificaciones,function(index,value)
		{
			// direcciones = value.dir;
			tempData2 += "<a style='cursor:pointer;text-decoration:none;float:left;padding:5px;width:90%;border-bottom:1px #6FB3E0 solid' onClick='irAVista(\""+value.asunto+"\",\""+value.id_contrato+"\")'>";
			tempData2 += "<li style='padding-top:5px;'>";
			tempData2 += "<img src='../../assets/probando/images/avatars/user.jpg' class='msg-photo' alt='admin' />";
			tempData2 += "<span class='msg-body'><span class='msg-title'><span class='blue'>"+value.mensaje+" "+value.nombre;
			tempData2 += "</span></span>";
			tempData2 += "<span class='msg-time'><i class='ace-icon fa fa-clock-o'></i><span>"+value.fecha_envio+"(Enviado)</span>";
			tempData2 += "</span></span></li></a>";
			tempData2 += "<i style='color:red;background:transparent;border:none;cursor:pointer;float:left;font-size:x-large;padding:5px'";
			tempData2 += "onClick=\"borrarNotificacion("+value.id_notificaciones+")\" class='ace-icon fa fa-times-circle'></i>";
			cantidad++;
		});
		// console.log(tempData);
		$("#CANTIDAD_NOTIFICACIONES").html("<i class='ace-icon fa fa-envelope-o'></i>Cantidad de Mensajes("+cantidad+")");
		$("#CANTIDAD_NOTIFICACIONES2").html("<i class='ace-icon fa fa-envelope icon-animated-vertical'></i><span class='badge badge-success'>"+cantidad+"</span>");
		$("#LISTA_NOTIFICACIONES").html(tempData2);
	}
	function irAVista(direccion,contrato)
	{
		id_contrato = '<?php echo Session::getSesion("s_cont");?>';
		urlActual = window.location.pathname.split("/");
		urlIr = direccion.split("?");
		if(contrato==id_contrato)
		{
			if(urlIr[0]==urlActual[urlActual.length-1])
			{
				registro = urlIr[1].split("=");
				mover = registro[1];
				// contador=1;
				ejecutarPrimeraVez=true;
				moverA();
			}
			else
			{
				swal({
                    title:"",
                    text: "Esta accion cambiara la vista\n¿Desea dejar esta vista?",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    // confirmButtonText: tempo,
                    }, function()
                    {
						window.location.href = direccion;
                    }
                );
			}
		}
		else
		{
			swal({
                    title:"",
                    text: "Esta accion cambiara el contrato y la vista\n¿Desea ejecutar esta acción?",
                    type: "warning",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    // confirmButtonText: tempo,
                    }, function()
                    {
						$.ajax({
							url:'../Controller/CumplimientosController.php?Op=contratoselec',
							type:'GET',
							data:'c='+contrato+"&obt=false",
							success:function(r)
							{
								window.location.href = direccion;
								window.top.$("#desc").html("CONTRATO("+r.clave_cumplimiento+")");
								window.top.$("#infocontrato").html("Contrato Seleccionado:<br>("+r.clave_cumplimiento+")"); 
                                                                
							},
							error:function()
							{
								swalError("Error al cambiar de contrato");
							}
						});
                    }
                );
		}

	}
	function borrarNotificacion(idNoti)
	{
		$.ajax({
			url: '../Controller/NotificacionesController.php?Op=EliminarNotificacion',
			type: 'GET',
			data: 'ID_NOTIFICACION='+idNoti,
			success:function(eliminado)
			{
				if(eliminado==true)
				{
					swalSuccess("Eliminado");
					listarNotificaciones();
				}
				else
				swalError("No se pudo eliminar");
			},
			error:function()
			{
				swalError("Error en el servidor");
			}
		});
	}
	function swalSuccess(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"success"
            });
        setTimeout(function(){swal.close();},1500);
        $('#loader').hide();
    }
    
    function swalInfo(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"info"
            });
        setTimeout(function(){swal.close();},1500);
        $('#loader').hide();
    }

    function swalError(msj)
    {
        swal({
                title: '',
                text: msj,
                showCancelButton: false,
                showConfirmButton: false,
                type:"error"
            });
        setTimeout(function(){swal.close();$('#agregarUsuario .close').click()},1500);
        $('#loader').hide();
    }
</script>