<?php
require_once '../dao/ReporteValidacionDocumentosDAO.php';

class ReporteValidacionDocumentosModel{
        
    public function listarValidaciones()
    {
        try
        {
            $dao=new ReporteValidacionDocumentosDAO();
            $lista= $dao->listarValidaciones();
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
}

?>

