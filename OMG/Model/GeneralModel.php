<?php
require_once '../dao/GeneralDAO.php';


class GeneralModel{
    
    
    
    public function actualizarPorColumna($TABLA,$COLUMNA,$VALOR,$ID,$ID_CONTEXT) {
        try
        {
            $dao=new GeneralDAO();
            $rec= $dao->actualizarColumnaPorTabla($TABLA, $COLUMNA, $VALOR, $ID,$ID_CONTEXT);
            return $rec;
            
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }    
    }
    
    
}

?>