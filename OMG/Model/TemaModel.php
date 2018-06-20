<?php

require_once '../dao/TemaDAO.php';

class TemaModel{
    
    
    public function  mostrarTemas()
    {
        try
        {
            $dao=new TemaDAO();
            $rec=$dao->mostrarTemas();                       
            
            $resultadoArbol;
            $contador=0;
            foreach ($rec as $value)
            {
                
            $resultadoArbol[$contador]= array(
                array($value['no'],$value['padre'],$value['descripcion']),                
            );
                $contador++;
            }    
            
            return $resultadoArbol;
        }  catch (Exception $e)
        {
            throw  $e;
        }
    }
  
    
}

?>