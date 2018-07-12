<?php
require_once '../dao/InformeValidacionDocumentosDAO.php';

class InformeValidacionDocumentosModel{
        
    public function listarValidaciones($v,$ID_CUMPLIMIENTO)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $lista= $dao->listarValidaciones($v);
            
            $resultado;
            foreach($lista as $value)
            {
                $list= $dao->obtenerContratos($value['id_cumplimiento'],$ID_CUMPLIMIENTO);
            $lista['']= $list;
                echo json_encode($lista); 
            }                                    
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function obtenerTemayResponsable($id_documento){
        try{
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerTemayResponsable($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){            
            throw $ex;
            return false;
        }
        
        
    }
    
    
    public function  obtenerRequisitosporDocumento($id_documento)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerRequisitosporDocumento($id_documento);
         
            return $rec;
        } catch (Exception $ex){
            throw  $ex;
            return false;
        }
    }
    
    public function obtenerRegistrosPorDocumento($id_documento)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerRegistrosPorDocumento($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
    
}

?>

