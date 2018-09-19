<?php

require_once '../ds/AccesoDB.php';
class ControlTemasDAO {
    //put your code here
    
    
    public function listarTemas($CONTRATO,$CADENA)
    {
        try 
        {
            $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.fecha_inicio
                    FROM temas tbtemas
                    WHERE tbtemas.padre= 0 AND tbtemas.contrato=$CONTRATO AND tbtemas.identificador LIKE '%$CADENA%'";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
        
            return $lista;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
    
}

?>
