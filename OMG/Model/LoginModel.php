<?php
require_once '../dao/LoginDAO.php';
class LoginModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  validar($usuario,$clave){
        try{
            $dao=new LoginDAO();
            $rec=$dao->consultarPorUsuario($usuario,$clave);
            if($rec==NULL){
            throw new Exception("Usuario no existe !!!!!");
            }
            if($rec["CONTRA"]!=$clave){
            throw  new Exception("Clave Incorrecta!!!!!");
            }
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
}
?>