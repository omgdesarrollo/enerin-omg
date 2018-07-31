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
    
    
    public function actualizarColumnas($TABLA, $COLUMNAS,$ID,$CONTRATO)
    {
        try
        {
            $ROWS="";
            $columna_id="";
            $valor_id="";
                    
            $CADENA="UPDATE $TABLA SET $ROWS,contrato=$CONTRATO  
                     WHERE $ID";
            
            $prueba=$ID[0][0];
            
            echo "valores del ID: ".json_encode($prueba);

//            $ID = json_decode($columna_id);        
//            echo "valor ID: ".json_decode($columna_id);
            
            $dao=new GeneralDAO();
            $rec= $dao->actualizarColumnas($CADENA);
            
            foreach ($COLUMNAS as $index => $value) {
                
                $ROWS=$COLUMNAS[$index][$value];
            }
//            echo "Valores Columnas: ".json_encode($COLUMNAS);
            echo "valor ROWS: ".json_encode($ROWS);
//            return $CADENA;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
}

?>