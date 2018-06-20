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
                
            $resultadoArbol[$contador]=
                array($value['id_tema'],$value['padre'],$value['no']."-".$value['nombre']);                
                $contador++;
            }    
            
            return $resultadoArbol;
        }  catch (Exception $e)
        {
            throw  $e;
        }
    }
  
    
    public function listarHijos($ID_TEMA)
    {
        try
        {
            $dao= new TemaDAO();
            $rec= $dao->listarHijos($ID_TEMA);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}

?>