<?php
require_once '../ds/AccesoDB.php';
class LoginDAO{
    public function consultarPorUsuario($_paramUsuario,$_paramPassword){
        try{
            $query="call iniciarSesion('$_paramUsuario','$_paramPassword')";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            $rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
            }
            return $rec;
    } catch (Exception $e){
        throw $rec;
    }
    }
    
    
    public function validarExistenciaDePermisoParaUsuario($ID_USUARIO)
    {
        try
        {
            $query="SELECT COUNT(*) AS Res 
                    FROM usuarios_vistas tbusuarios_vistas
                    JOIN estructura tbestructura ON tbusuarios_vistas.id_estructura = tbestructura.id_estructura
                    JOIN vistas tbvistas ON tbvistas.id_vistas = tbestructura.id_vistas
                    WHERE  tbusuarios_vistas.id_usuario='$ID_USUARIO' AND (tbusuarios_vistas.edit='true' OR tbusuarios_vistas.delete='true' OR tbusuarios_vistas.new='true'
                    OR tbusuarios_vistas.consult='true')";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }
}
?>
