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

    public function actualizar($TABLA,$COLUMNAS_VALOR,$ID_CONTEXTO)
    {
        try
        {
            $dao=new GeneralDAO();
            $query="UPDATE $TABLA ";

            $index=0;
            foreach($COLUMNAS_VALOR as $key=>$value)
            {
                if($index!=0)
                    $query .= " , ";
                $query .= "SET $key = '$value'";
                $index++;
            }
            foreach($ID_CONTEXTO as $key=>$value)
            {
                $query .= " WHERE $key = $value ";
            }
            // listar por ID no se puede ya que cada vista lista de difentes formas
            $update = $dao->actualizar($query);
            return ($update!=0)?1:0;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }    
    }
    
}

?>