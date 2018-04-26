<?php
require_once '../ds/AccesoDB.php';
class LoginDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function consultarPorUsuario($_paramUsuario,$_paramPassword){
        try{
            $query="call iniciarSesion('$_paramUsuario','$_paramPassword')";
         //   $query="SELECT NOMBRE_USUARIO,CONTRA FROM USUARIOS WHERE NOMBRE_USUARIO='$_paramUsuario' AND CONTRA='$_paramPassword';";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            $rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
            }
            return $rec;
    }  catch (Exception $e){
        throw $rec;
    }
    }
}
?>
