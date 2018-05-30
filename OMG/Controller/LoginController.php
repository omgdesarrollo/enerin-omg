<?php
//este controlador solo atiende un requerimiento
//el requerimiento que atiende es el de inicio de sesion
session_start();
require_once '../Model/LoginModel.php';
require_once '../util/Session.php';
try {
    //datos
    $usuario=$_REQUEST["usuario"];
    $clave=$_REQUEST["pass"];
   
    //proceso
    $model=new LoginModel();
    $recUser=$model->validar($usuario,$clave);
    
    $hora = date('H:i');
$session_id = session_id();
$token = hash('sha256', $hora.$session_id);
$recUser["tokenseguridad"]=$token;
//$json["tokenseguridad"]=$token;
    
//    echo json_encode($recUser);
//    echo "dato";
    Session::setSesion("user",$recUser);


//  $jsonToken["tokenseguridad"]=$token;
//    Session::setSesion("token",$jsonToken);
//    Session::setSesion("user", $token);
    



    
    $jsondata['success']=true;
    $jsondata['message']='Correcto';
//    $jsondata['seguridad']=$token;
   
    //para redireccionar se guarda en una variable el link
//    $target="../View/main.php";
}  catch (Exception $e){
    Session::setSesion("error",$e->getMessage());
    Session::setSesion("usuario", $usuario);
//    $target="../View/panelprincipal.php";
//     $target="../View/main.php";
   
    $jsondata['success']=false;
    $jsondata['message']='Incorrecto';
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
//header("location: $target");
?>

