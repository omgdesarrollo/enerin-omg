<?php
require_once '../dao/LoginDAO.php';
require_once '../Model/AdminModel.php';

class LoginModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  validar($usuario,$clave){
        try{
            $dao=new LoginDAO();
            $modelAdmin=new AdminModel();
            
            $rec["usuario"]=$dao->consultarPorUsuario($usuario,$clave);
            
            
            if($rec["usuario"]==NULL){
            throw new Exception("Usuario no existe !!!!!");
            }
            if($rec["usuario"]["CONTRA"]!=$clave){
            throw  new Exception("Clave Incorrecta!!!!!");
            }
            
<<<<<<< HEAD
        if($dao->validarExistenciaDePermisoParaUsuario($rec["usuario"]["ID_USUARIO"])[0]["Res"]!=0){
                $rec["accesos"]= $modelAdmin->listarUsuarioVistas($rec["usuario"]["ID_USUARIO"]);
            } else {
                $rec["accesos"]="";
            }
=======
//        if($dao->validarExistenciaDePermisoParaUsuario($rec["usuario"]["ID_USUARIO"])["Res"]!=0){
//                $rec["accesos"]= $modelAdmin->listarUsuarioVistas($rec["usuario"]["ID_USUARIO"]);
//            } else {
//                $rec["accesos"]="";
//            }
>>>>>>> 21ce6aa11e1a88dcc43fd3e78847177d5d6c0a93
                        
            $rec["accesos"]= $modelAdmin->listarUsuarioVistas($rec["usuario"]["ID_USUARIO"]);
//            echo json_encode($rec);
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
}

?>