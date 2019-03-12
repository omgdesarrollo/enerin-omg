
<?php
require_once '../util/Session.php';
require_once '../Pojo/ConexionesBDPojo.php';
session_start();
$sesion_tipo=Session::getSesion("tipo");
$tipo="";
//if(isset($sesion_tipo)){
    
$tipo= ConexionesBDPojo::dataBD($sesion_tipo);
//}else{
//  $tipo=  
//}
// session_start();
// session_unset();
session_destroy();
// foreach( $_SESSION as $key => $value )
// {
//     echo json_encode($key);
//     echo json_encode($value);
// }
?>

<?php
header('location: login.php?t='.$tipo["05"]);
?>
 <script>
//            console.log("el valo "+window.top.$("#typePorSiLaSeSessionExpira").val());
//            console.log("E  ",window.top.typePorSiLaSeSessionExpira);
//            console.log("d ",$("#informacion").parent().context.referrer);
//             window.location.href=""+$("#informacion").parent().context.referrer;
//                window.location.href="login.php?t="+window.top.typePorSiLaSeSessionExpira;
</script>



