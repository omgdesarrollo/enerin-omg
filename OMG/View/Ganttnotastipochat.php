<html>
	<head>
		
		<title>Gantt Notas</title>
               
                <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link href="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
		<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

                <script src="../../assets/firebase/js/jquery.min.js" type="text/javascript"></script>
                <script src="../../js/jquery-ui.min.js" type="text/javascript"></script>
                <link href="../../assets/firebase/css/style.css" rel="stylesheet" type="text/css"/>
                
                <style type="text/css">
                    .heading {
                        background-color: #006699;
                    }
                    .newMessage-heading {
                        background-color: #35756c;
                    }
                    #heading-user{
                        color:#ffffff;
                    }
                    .otrosreponsablesdelaactividad{
                        color: #cc0000;
                        font-size: 16;
                    }
                    .responsabletarea{
                        color:#000000;
                        font-size: 16;
                    }
                    
                </style>
	</head>
	<body>
		<!--<div class="container" id="chat-realtime">-->
		<div class="" id="chat-realtime">
			<div class="row app-one">
					<div class="col-sm-4 side">
						<div class="side-one">
							<div class="row heading">
                                                           
								<div class="col-sm-3 col-xs-2 heading-avatar">
									<div class="heading-avatar-icon">
										<img class="me" src="../../images/base/user.jpg">
                                                                             
									</div>                                        
								</div>
                                                            <div id="heading-user" class="col-sm-9 col-xs-2">
                                                                
                                                            </div>
                                                                 
<!--								<div class="col-sm-2 col-xs-2  heading-logout  pull-right">
									<i class="fa fa-sign-out fa-2x  pull-right" aria-hidden="true"></i>
								</div>-->
<!--                                                            <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
									<i class="fa fa-paperclip fa-2x  pull-right" aria-hidden="true"></i>
								</div>-->
<!--								<div class="col-sm-2 col-xs-2 heading-compose  pull-right">
									<i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
								</div>-->
                                                            
<!--                                                                <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
									<i class="fa fa-paperclip fa-2x  pull-right" aria-hidden="true"></i>
								</div>
                                                            -->
                                                           
<!--								<div class="col-sm-2 col-xs-2 heading-home  pull-right" data-tipe="rooms" data-avatar="../../images/base/File_List.png" id="Public">
									<span class="inbox-status">0</span>
									<i class="fa fa-home fa-2x  pull-right" aria-hidden="true"></i>
								</div>-->
							</div>
							
							<div class="row searchBox">
								<div class="col-sm-12 searchBox-inner">
									<div class="form-group has-feedback">
										<input id="searchText" type="text" class="form-control" name="searchText" placeholder="Buscar Actividades Con Notas Asignadas">
									</div>
								</div>
							</div>
							<div class="row sideBar">
								<!-- side1 -->
                                                         
                                                                
							</div>
						</div>
                                            
						<div class="side-two">
							<div class="row newMessage-heading">
								<div class="row newMessage-main">
									<div class="col-sm-2 col-xs-2 newMessage-back">
										<i class="fa fa-arrow-left" aria-hidden="true"></i>
									</div>
									<div class="col-sm-10 col-xs-10 newMessage-title">
										Mensaje Privado
									</div>
								</div>
							</div>
							<div class="row composeBox">
								<div class="col-sm-12 composeBox-inner">
									<div class="form-group has-feedback">
										<!--<input id="composeText" type="text" class="form-control" name="searchText" placeholder="Search People">-->
                                                                                <input id="composeText" type="text" class="form-control" name="searchText" placeholder="Buscar Responsables">
									</div>
								</div>
							</div>
							<div class="row compose-sideBar">
								<!-- side2 -->
							</div>
						</div>
					</div>
					<div class="col-sm-8 conversation">
						<div class="row heading">
<!--							<div class="col-sm-1 col-xs-1 user-back">
								<i class="fa fa-arrow-left" aria-hidden="true"></i>
							</div>-->
<!--							<div class="col-sm-1 col-md-1 col-xs-3 heading-avatar">
								<div class="heading-avatar-icon">
									<img class="you" src="">
								</div>
							</div>-->
							<div class="col-sm-6 col-xs-4 heading-name">
								<p id="heading-name-meta"></p>
								<span id="heading-online"></span>
                                                                <!--<span id="heading-online">En Linea</span>-->
							</div>
							<div class="col-sm-1 user-fork ">
                                                            <div id="quienestalogeado"></div>
								<!--<a href="energia Integral" title="Visita Nuestra Pagina" target="_BLANK"><i class="fa fa-code-fork fa-2x" aria-hidden="true"></i></a>-->
							</div>
						</div>
						<div class="row message" id="conversation">
							<p class="messages">
								<!-- message -->
							</p>
							<div class="row message-previous">
								<div class="col-sm-12 previous">
									<a>
									<!--Show Previous Message!-->
                                                                        Mostrar Mensaje Previos
									</a>
								</div>
							</div>
							<div class="message-scroll">
								<div id="scroll">
									<a>
									<i class="fa fa-chevron-down"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="row imagetmp">
								<div id="reviewImg"></div>
						</div>
						<div class="row reply">
<!--							<div class="col-sm-1 col-xs-1 reply-recording" align="center">
								<label class="btn btn-default fileinput">
								<i class="fa fa-camera fa-2x" aria-hidden="true"></i> <input type="file" id="fileinput" multiple style="display: none;">
								</label>	
							</div>-->
							<div class="col-sm-10 col-xs-10 reply-main">
                                                            <div id="campoParaEnviarNota">
                                                                <!--<textarea class="form-control" data-emojiable="true" rows="1" id="comment" readonly=""></textarea>-->
                                                            </div>
							</div>
							<div class="col-sm-1 col-xs-1 reply-send" id="send">
								<!--<i class="fa fa-send fa-2x pull-right" aria-hidden="true"></i>-->
							</div>
						</div>
					</div>
			</div>
		</div>
		<!-- Firebase -->
		<script src="//www.gstatic.com/firebasejs/3.9.0/firebase.js"></script>
                <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
                <!--<script src="../../assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>-->
                <script src="../../js/fNotashistoricasGantt.js" type="text/javascript"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
                
                
                <script>
//                     document.getElementsByClassName('app-one')[0].style.display = "none";
//                      document.getElementsByClassName('app-one')[0].style.display = "block";
//                      obtenerActividadesTodasLasQuePertenezco().then(function (){
//                          alert("exitoso");
//                      });
                        
                        
                        
                        
                    function obtenerActividadesTodasLasQuePertenezco(){
                        return new Promise(function(resolve,reject){
                       $.ajax({
                          url:'../Controller/GanttTareasController.php?Op=mostrarNotasHistoricas',
                          type:'POST',
                          success:function(datos)
                          {
                              
//                             if(datos.length!=0){
//                                  document.getElementsByClassName('app-one')[0].style.display = "block";
//                             }
                                document.getElementsByClassName('app-one')[0].style.display = "block";
                                document.getElementById("heading-name-meta").innerHTML = "Todas Las Notas";
                                document.getElementById("heading-online").innerHTML = "Actividades";
                              resolve();
                          },
                          error:function()
                          {
                              alert("error en el servidor");
                          }
                      });
                      
                      
                        });
                    }
                </script>
                
                
                
                
                
               
                
	</body>
</html>