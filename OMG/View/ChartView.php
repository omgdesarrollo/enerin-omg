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
				value:"#sales#",
				color:"#color#",
				label:"#month#",
				pieInnerText:"#sales#",
				shadow:0
			});
                        
                        var datos = [
	{ sales:"20", month:"Jan", color: "#ee3639" },
	{ sales:"30", month:"Feb", color: "#ee9e36" },
	{ sales:"50", month:"Mar", color: "#eeea36" },
	{ sales:"40", month:"Apr", color: "#a9ee36" },
	{ sales:"70", month:"May", color: "#36d3ee" },
	{ sales:"80", month:"Jun", color: "#367fee" },
	{ sales:"60", month:"Jul", color: "#9b36ee" }
];
                        
                        
			myPieChart.parse(datos,"json");
                        			
		}
	</script>
</head>
<body onload="doOnLoad();">
	<table>
		<tr>
			<td>Documentos de Entrada</td>
		</tr>
                
		<tr>
			<td><div id="chart1" style="width:400px;height:250px;border:1px solid #c0c0c0;"></div></td>
		</tr>
	</table>
</body>
</html>
