<?php
require_once '../dao/CatalogoProcesosDAO.php';

class CatalogoProcesosModel{

public function listarCatalogoProcesos()
{
    try
    {
        $dao=new CatalogoProcesosDAO();
        $rec= $dao->listarCatalogoProcesos();
        
        return $rec;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


}
?>
