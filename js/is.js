jQuery(document).ready(function(){
				jQuery("#loginform").submit(function(e){
//                                    alert("ya entro aqui ");
					e.preventDefault();
					var formData = jQuery(this).serialize();
					$.ajax({
						type: "POST",
						url: "../Controller/LoginController.php",
						data: formData,
						success: function(r){
                                                    if(r.success==true){
                                                        var delay = 1000;
                                                        if(r.accesos=="si"){
//                                                            $.jGrowl("Acceso a vistas exitosa", { sticky: true });
                                                            var delay = 1000;
                                                            if(r.contrato=="si"){
//                                                                 $.jGrowl("Tiene contrato Asginado", { sticky: true });
                                                                    $.jGrowl("Cargando  Porfavor Espere......", { sticky: true });
                                                                    $.jGrowl("Bienvenido", { header: 'Acceso Permitido' });
                                                                    var delay = 1000;
                                                                    setTimeout(function(){ window.location = 'principalmodulos.php'  }, delay);  
                                                            }else{
                                                                 $.jGrowl("Error no  tiene contrato asignado", { header: 'Error acceso contratos' });
                                                                 var delay = 1000;
                                                            }
                                                        }else
                                                        {
                                                              $.jGrowl("Error no tiene acceso al menos en una vista", { header: 'Error acceso a la vista' });
                                                                 var delay = 1000;
                                                        }
                                                    }
                                                    else
                                                    {
                                                        if(r.success==false){
                                                             $.jGrowl("Porfavor checa tu Usuario y Password", { header: 'Error de inicio de sesion' });
                                                             var delay = 1000;
                                                        }
                                                    }
							},
                                                        error:function(){
//                                                            alert("hubo un error al tratar de realizar la peticion ajax ");
                                                            $.jGrowl("Error......", { sticky: true });
                                                        }
								});
								return false;
							});
						});

