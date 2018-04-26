<?php
session_start();
require_once '../util/Session.php';
?>
<html>
    <head>
      <title></title>
	
		<!--<script src="http://code.jquery.com/jquery-1.10.2.js"></script>-->
                <!--<link href="../../assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
                <script src="../../js/jquery.js" type="text/javascript"></script>
		<script>
		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
//                    alert("entraste aqui ");
			$(editableObj).css("background","#FFF url(../../images/base/loaderIcon.gif) no-repeat right");
			$.ajax({
                                url: "../Controller/TemasController.php?Op=Modificar",
				type: "POST",
				data:'column='+column+'&editval='+editableObj.innerHTML+'&id='+id,
				success: function(data){
					$(editableObj).css("background","#FDFDFD");
				}   
		   });
		}
		</script>
    </head>
    <body>		
	   <table class="tbl-qa">
		  <thead>
			  <tr>
				<th class="table-header" width="10%">NUMERACION</th>
				<th class="table-header">CODIGO DEL TEMA</th>
				<th class="table-header">TEMA</th>
			  </tr>
		  </thead>
		  <tbody>
		  <?php
                  
                  
                  
//		  foreach($faq as $k=>$v) {
                  $Lista = Session::getSesion("listarTemas");

		foreach ($Lista as $k=>$filas) { 
		  ?>
			  <tr class="table-row">
				<td><?php echo $k+1; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'CODIGO_TEMA','<?php echo $Lista[$k]["ID_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $Lista[$k]["CODIGO_TEMA"]; ?></td>
                                <td contenteditable="true" onBlur="saveToDatabase(this,'TEMA','<?php echo $Lista[$k]["ID_TEMA"]; ?>')" onClick="showEdit(this);"><?php echo $Lista[$k]["TEMA"]; ?></td>
                                  
			  </tr>
		<?php
		}
		?>
		  </tbody>
		</table>
    </body>
</html>
