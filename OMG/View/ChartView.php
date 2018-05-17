<?php
session_start();
require_once '../util/Session.php';
$Usuario=  Session::getSesion("user");

$Lista = Session::getSesion("listarDocumentosEntrada");

$a = 0; // Variable para "En proceso(En Tiempo)"
$b = 0; // Variable para "En proceso(Alerta Vencida)"        
$c = 0; // Variable para "En proceso(Tiempo Limite)"
$d = 0; // Variable para "En proceso(Tiempo Vencido)"
$e = 0; // Variable para "Suspendido"
$f = 0; // Variable para "Terminado"

foreach ($Lista as $filas) { 


//Inicia Status Logico
                                    $alarm = new Datetime($filas['fecha_alarma']);
                                    $alarm = strftime("%d-%B-%y",$alarm -> getTimestamp());
                                    $alarm = new Datetime($alarm);
                                    
                                    $flimite = new Datetime($filas['fecha_limite_atencion']);// Guarda en una variable la fecha de la base de datos
                                    $flimite = strftime("%d-%B-%y",$flimite -> getTimestamp());// Esta da el formato: dia. mes y año, sin guardar las horas 
                                    $flimite = new Datetime($flimite);//Se guarda en este formato y se reinicializan las horas a 00.
                                    
                                    $hoy = new Datetime();
                                    $hoy = strftime("%d - %B - %y");
                                    $hoy = new Datetime($hoy);
                               

                                    
                                    if($filas["status_doc"]== 1){

                                        if ($flimite <= $hoy){

                                            if($flimite == $hoy){
                                                
                                                //echo "Tiempo Limite";
                                                $c++;
                                                
                                            } else {
                                                
                                                //echo "Tiempo Vencido";
                                                $d++;
                                            }
                                                  
                                        } else{
                                            
                                          if ($alarm <= $hoy){
                                              
                                              //echo "Alerta Vencida";
                                              $b++;
                                              
                                          } else {
                                                  //echo "En Tiempo";
                                                  $a++;
                                              }                                           
                                        }
                                       
                                     
                                    } //Primer If 
                                    
                                  
                                    if($filas["status_doc"]== 2){
                                        //echo "Suspendido";
                                        $e++;
                                        
                                    } if($filas["status_doc"]== 3){
                                        echo "Terminado";
                                        $f++;
                                    } 
                                   
                                    //Termina Status Logico    
	                                                                        
} //foreach


?>



<!DOCTYPE html>
<html>
<head>
	<title>Pie</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	
<!--        <link href="dhtmlxChart_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
        <script src="dhtmlxChart_v51_std/codebase/dhtmlxchart.js" type="text/javascript"></script>
        <link href="dhtmlxChart_v51_std/codebase/dhtmlxchart.css" rel="stylesheet" type="text/css"/>-->


<link href="../../assets/dhtmlxChart_v51_std/codebase/fonts/font_roboto/roboto.css" rel="stylesheet" type="text/css"/>
<link href="../../assets/dhtmlxChart_v51_std/codebase/dhtmlxchart.css" rel="stylesheet" type="text/css"/>
<script src="../../assets/dhtmlxChart_v51_std/codebase/dhtmlxchart.js" type="text/javascript"></script>
	<script>
		var myPieChart;
		function doOnLoad() {
			myPieChart = new dhtmlXChart({
				view:"pie3D",
				container:"chart1",
				value:"#entradas#",
				color:"#color#",
				label:"#status#",
				pieInnerText:"#entradas#",
				shadow:0
			});
                        
                        var datos = [
	{ entradas: "<?php echo $a; ?>", status:"En proceso(En Tiempo)", color: "#ee3639" },
	{ entradas: "<?php echo $b; ?>", status:"En proceso(Alerta Vencida)", color: "#ee9e36" },
	{ entradas: "<?php echo $c; ?>", status:"En proceso(Tiempo Limite)", color: "#eeea36" },
	{ entradas: "<?php echo $d; ?>", status:"En proceso(Tiempo Vencido)", color: "#eeea36" },
	{ entradas: "<?php echo $e; ?>", status:"Suspendido", color: "#eeea36" },
	{ entradas: "<?php echo $f; ?>", status:"Terminado", color: "#a9ee36" }

];
                        
                        
			myPieChart.parse(datos,"json");
                        			
		}
	</script>
</head>
<body onload="doOnLoad();">


<?php




?>





	<table>
		<tr>
			<td>Documentos de Entrada</td>
		</tr>
                
		<tr>
			<td><div id="chart1" style="width:600px;height:350px;border:1px solid #c0c0c0;"></div></td>
		</tr>
	</table>






</body>
</html>
