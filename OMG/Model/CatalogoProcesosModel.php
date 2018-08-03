<?php
require_once '../dao/CatalogoProcesosDAO.php';

class CatalogoProcesosModel{

public function listarCatalogo($CONTRATO)
{
    try
    {
        $dao=new CatalogoProcesosDAO();
        $lista= $dao->listarCatalogo($CONTRATO);
        return $lista;
    }catch (Exception $ex)
    {
        throw $ex;
        return -1;
    }
}


}
?>
