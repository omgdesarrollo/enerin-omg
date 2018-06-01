<?php
require_once '../dao/ActualizarColumnaPorTablaDAO.php';


class ActualizarColumnaPorTablaModel{
    
    
    
    public function actualizarPorColumna($TABLA,$COLUMNA,$VALOR,$ID) {
        try {

            $dao=new ActualizarColumnaPorTablaDAO()
            $rec= $dao->actualizarColumnaPorTabla($TABLA,$COLUMNA,$VALOR,$ID);        
            
        } catch (Exception $ex) {
            throw $ex;
        }
            
    }
    
    
}

?>