$(function (){
//    construirFormulario();
  
});

function ventanaWindowsEmergente(){
 var dhxWins = new dhtmlXWindows();
//var layoutWin = dhxWins.createWindow("w1", 20, 20, 600, 400);
 dhxWins.attachViewportTo("myventana");
 var layoutWin=dhxWins.createWindow({id:"emp", text:"OMG", left: 20, top: 30,width:1338,  height:405,  center:true,resize: true,park:true,modal:true	});
 layoutWin.attachURL("ReportesAddView.php", null, true);  
}







