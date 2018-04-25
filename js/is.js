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
                                                    //alert("d  "+r.message);
//                                                    alert("el response tiene "+r.message);
							if(r.success==true)
									{
							$.jGrowl("Cargando  Porfavor Espere......", { sticky: true });
							$.jGrowl("Bienvenido", { header: 'Acceso Permitido' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'principalmodulos.php'  }, delay);  
							}else if (r.success == true){
							$.jGrowl("Bienvenido", { header: 'Acceso Permitido' });
							var delay = 1000;
							setTimeout(function(){ window.location = 'sipasoelusuariopero entro en otro modo c'  }, delay);  
							}else
							{
                                                        if(r.success==false){
							  $.jGrowl("Porfavor checa tu Usuario y Password", { header: 'Error de inicio de sesion' });
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

