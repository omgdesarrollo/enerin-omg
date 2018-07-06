<?php
require_once '../dao/ReporteValidacionDocumentosDAO.php';

class ReporteValidacionDocumentosModel{
        
    public function listarValidaciones($v)
    {
        try
        {
            $dao=new ReporteValidacionDocumentosDAO();
            $lista= $dao->listarValidaciones($v);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
}

?>

