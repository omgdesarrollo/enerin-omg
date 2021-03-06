<?php
require_once '../ds/AccesoDB.php';
class LoginDAO{
    
    /*
      *============================================================================
         *@comment accede al procedimiento para poder autenticarse como usuario
         *@author francisco reyes vazconcelos fvazconcelos@enerin.mx
         *@param $_paramUsuario : el usuario, format: string
         *@param $_paramPassword : el password , format: string  
         *@return $rec : retorna los datos del usuario 
      *============================================================================
    */     
    public function consultarPorUsuario($_paramUsuario,$_paramPassword)
    {     
        try{
//            $query="call iniciarSesion('$_paramUsuario','$_paramPassword')";
           $query="SELECT tbusuarios.NOMBRE_USUARIO ,tbusuarios.CONTRA,tbusuarios.ID_USUARIO,tbusuarios.FONDO_COLOR   
                from usuarios tbusuarios  
                WHERE 
                tbusuarios.NOMBRE_USUARIO='$_paramUsuario'
                AND 
                tbusuarios.CONTRA=SHA1(MD5('$_paramPassword'))";
            $db = AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
//             echo "dd".json_encode($lista);
//            echo  var_dump($query);
            $rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
//                echo "entro aqui ";
            }
//            echo "mandara ".json_encode($rec);
            return $rec;
        } catch (Exception $e){
                throw $e;
            }
    }
    /*
      *============================================================================
         *@comment empty   
         *@author francisco reyes vazconcelos fvazconcelos@enerin.mx
         *@param $ID_USUARIO : el id del usuario, format: INT
         *@return $lista 
      *============================================================================
    */
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
            
            return $lista[0];
            
        } catch (Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }
    /*
      *============================================================================
         *@comment obtiene cantidad de cumplimientos o contratos  por usuario 
         *@author francisco reyes vazconcelos fvazconcelos@enerin.mx
         *@param $ID_USUARIO : el id del usuario , format: INT
         *@return $lista 
      *============================================================================
    */
    public function validarContratoPorUsuario($ID_USUARIO)
    {
        try
        {
            $query="SELECT count(*) as resultado
                    FROM usuarios_cumplimientos tbusuarios_cumplimientos
                    WHERE tbusuarios_cumplimientos.acceso='true' AND tbusuarios_cumplimientos.ID_USUARIO=$ID_USUARIO";
//            echo json_encode("Entro al sql:".$query);
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
//        echo json_encode("Aqui entro:".$lista);
        
            return $lista[0];
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}
?>
