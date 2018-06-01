<?php
require_once '../dao/GeneralDAO.php';


class GeneralModel{
    
    
    
    public function actualizarPorColumna($TABLA,$COLUMNA,$VALOR,$ID) {
        try {

            $dao=new GeneralDAO()
            $rec= $dao->actualizarColumnaPorTabla($TABLA,$COLUMNA,$VALOR,$ID);        
            
        } catch (Exception $ex) {
            throw $ex;
        }
            
    }
    
    
}

?>