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
    
    
}

?>

