<?php
require_once '../ds/AccesoDB.php';

class GeneralDAO{
    
    
    public function actualizarColumnaPorTabla($TABLA,$COLUMNA,$VALOR,$ID,$ID_CONTEXT)
    {
//        echo "entro aqui ";
        try {
            $query="UPDATE $TABLA SET $COLUMNA='$VALOR' WHERE $ID_CONTEXT=$ID";
//            echo $query;
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);
            
            return $result;
            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
    
    public function actualizarColumnas()
    {
        try
        {
            $query="";
            
        } catch(Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }


    public function eliminarRegistroPorTabla($TABLA,$ID)
    {
        try 
        {
            $query="DELETE FROM $TABLA WHERE ID=$ID ";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
    
}

?>