<?php
require_once '../dao/GeneralDAO.php';
require_once '../dao/EvidenciasDAO.php';


class GeneralModel{
    
    
    
    public function actualizarPorColumna($TABLA,$COLUMNA,$VALOR,$ID,$ID_CONTEXT) {
        try
        {
            $dao=new GeneralDAO();
            $rec= $dao->actualizarColumnaPorTabla($TABLA, $COLUMNA, $VALOR, $ID,$ID_CONTEXT);
            
            if($COLUMNA=='validacion_supervisor')
            {
                $dao=new EvidenciasDAO();
                $rec= $dao->actualizarFechaValidacion($ID);
            }
            
            return $rec;
            
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }    
    }
    
    
}

?>