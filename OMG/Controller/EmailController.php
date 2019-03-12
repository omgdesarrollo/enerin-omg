<?php

session_start();
require_once '../Model/EmailModel.php';
require_once '../util/Session.php';
require_once '../Pojo/ConexionesBDPojo.php';

$Op=$_REQUEST["Op"];

switch ($Op) {
    case "recuperarPassword":
        header('Content-type: application/json; charset=utf-8');
//     ini_set( 'display_errors', 1 );
//     error_reporting( E_ALL );   
//$to= $_REQUEST[""];//aqui va el correo  que se conoce como el usuario
//$asunto=$_REQUEST["asunto"];
//$mensaje=$_REQUEST["mensaje"];
$urlResetearPassword = 'http://'.$_SERVER['HTTP_HOST']."/APPS/OMG/Controller/EmailController.php?Op=resetearPasswordDesdeCorreo";
//echo "tienes enlace  ".$enlace_actual;
$data= json_decode($_REQUEST["listaDatos"],true);

//$tipoUrl=$_REQUEST["t"] ;
    //proceso
//    echo "e ".$tipoUrl;
//Session::setSesion("tipo",$tipoUrl);
$usuario="";
$tipoUrl="";
$recUser;
$baseUri="";
foreach ($data as $key => $value) {
   $usuario=$value["usuario"]; 
   $tipoUrl=$value["t"];
   $baseUri=$value["baseUri"];
}
//echo "el tipo ".$tipoUrl;
Session::setSesion("tipo",$tipoUrl);    
ConexionesBDPojo::dataBD($tipoUrl);

 $model=new EmailModel();
 $existeUsuario=$model->verificarUsuarioExiste(array("usuario"=>$usuario,"baseUri"=>$baseUri,"urlResetearPassword"=>$urlResetearPassword,"cliente"=>$tipoUrl));
 echo json_encode($existeUsuario);
 break;
    case "resetearPasswordDesdeCorreo":
//        echo "entro".$_REQUEST["cliente"];
        Session::setSesion("tipo",$_REQUEST["cliente"]);
        ConexionesBDPojo::dataBD($_REQUEST["cliente"]);
         $model=new EmailModel();
         $value=array("usuario"=>$_REQUEST["usuario"],"correo"=>$_REQUEST["correo"]);
         $model->resetearPassword($value);
         header("location:".$_REQUEST['baseUri']);
    break;
    
    
}
?>
