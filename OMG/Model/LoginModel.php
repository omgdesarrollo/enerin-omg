<?php
require_once '../dao/LoginDAO.php';
require_once '../Model/AdminModel.php';
require_once '../Model/SeguridadModel.php';
class LoginModel{
    /*
      *============================================================================
        valida los datos del usuario 
         *@author francisco reyes vazconcelos fvazconcelos@enerin.mx
         *@param $usuario : El id del seguimiento de entrada, format: INT
         *@param $clave : el password , format: string  
         *@return $rec : retorna el registro del usuario como un arreglo asociativo 
      *============================================================================
    */     
    public function  validar($usuario,$clave){
        try{
            $dao=new LoginDAO();
            $modelAdmin=new AdminModel();
            $modelSeguridad= new SeguridadModel();
            $values=array("password"=>$clave);
            
//            $clave=$modelSeguridad->encriptarPassword($values);
//            echo "d".$clave;
                    
            $rec["usuario"]=$dao->consultarPorUsuario($usuario,$clave);
            
//            echo "valor rec:".json_encode($rec["usuario"]);
            
            if($rec["usuario"]==NULL){
            throw new Exception("Usuario no existe !!!!!");
            }
            if($rec["usuario"]["CONTRA"]!=$clave){
            throw  new Exception("Clave Incorrecta!!!!!");
            }
            
        if($dao->validarExistenciaDePermisoParaUsuario($rec["usuario"]["ID_USUARIO"])["Res"]!=0){
                $rec["accesos"]= $modelAdmin->listarUsuarioVistas($rec["usuario"]["ID_USUARIO"]);
            } else {
                $rec["accesos"]="";
            }
            
            if($dao->validarContratoPorUsuario($rec["usuario"]["ID_USUARIO"])["resultado"]!=0){
                $rec["contrato"]="si";
            }else{
                $rec["contrato"]="no";
            }
                        
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
     /*
      *============================================================================
        obtener contratos por id del usuario  que tengas permisos a true
         *@author francisco reyes vazconcelos fvazconcelos@enerin.mx
         *@param $ID_USUARIO : El id del usuario, format: INT
         *@param $clave : el password , format: string  
         *@return $rec : retorna los ccumplimientos o contratos el el cuat tenga permido el usuario
      *============================================================================
    */     
    public function validarContratoPorUsuario($ID_USUARIO)
    {
        try
        {
            $dao=new LoginDAO();
            $rec= $dao->validarContratoPorUsuario($ID_USUARIO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
}

?>