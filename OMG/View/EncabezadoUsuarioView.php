



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


?>
<!--<div class="main-encabezado">-->

<div id="navbar" class="navbar navbar-default ace-save-state ">
            
            <div class="navbar-container ace-save-state" id="navbar-container">
                <div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							OMG APPS
						</small>
					</a>
				</div>
                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav" style="height: 10%">
                    <!--seccion de inicio de sesion de alarmas--> 
        <li class="purple dropdown-modal">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#">
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
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
								<span class="badge badge-success">0</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-envelope-o"></i>
									Cantidad de Mensajes
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar">
									


										<li>
											<a href="#" class="clearfix">
												<img src="../../assets/probando/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
												<span class="msg-body">
													<span class="msg-title">
														<span class="blue">aqui va el usuario remitente:</span>
														aqui va el mensaje
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>aqui va la fecha en que lo envio </span>
													</span>
												</span>
											</a>
										</li>
									</ul>
								</li>

								<li class="dropdown-footer">
									<a href="inbox.html">
										<!--ver todos los mensajes-->
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
                        
                        <!--cierre de seccion de mensajes-->
                        
                        
                        
                        <!--seccion de info usuario-->
                            <li class="light-blue dropdown-modal">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="../../assets/probando/images/avatars/avatar.png" alt="<?php echo $Usuario["NOMBRE_USUARIO"]; ?>" />
					<span class="user-info">
						<small>Bienvenido,</small>
						<?php echo $Usuario["NOMBRE_USUARIO"]; ?>
					</span>

<!--								<i class="ace-icon fa fa-caret-down"></i>-->
				</a>

					
			    </li>
                        <!--fin de seccion de info usuario-->
                        
                        
                        
                        
                        
                    </ul>
                    
                    
                </div>
                
            </div>
</div>

