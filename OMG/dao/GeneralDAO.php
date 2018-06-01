<?php
require_once '../ds/AccesoDB.php';

class GeneralDAO{
    
    
    public function actualizarColumnaPorTabla($TABLA,$COLUMNA,$VALOR,$ID,$ID_CONTEXT){
        try {
            $query="UPDATE $TABLA SET $COLUMNA=$VALOR WHERE $ID_CONTEXT=$ID";
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);
            
            return $result;
            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
}

?>