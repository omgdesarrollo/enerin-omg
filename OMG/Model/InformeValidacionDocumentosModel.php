<?php
require_once '../dao/InformeValidacionDocumentosDAO.php';

class InformeValidacionDocumentosModel{
        
    public function listarValidaciones($v)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $lista= $dao->listarValidaciones($v);
            
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

