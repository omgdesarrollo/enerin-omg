<?php
require_once '../ds/AccesoDB.php';

class GeneralDAO{
    
    
    public function actualizarColumnaPorTabla($TABLA,$COLUMNA,$VALOR,$ID){
        try {
            $query="UPDATE $TABLA SET $COLUMNA=$VALOR WHERE ID=$ID";
            
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);
        
            
        } catch (Exception $ex){
            throw $ex;
        }
                
    }
    
}

?>