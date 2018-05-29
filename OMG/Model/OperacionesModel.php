<?php

require_once '../dao/OperacionesDAO.php';
require_once '../Pojo/OperacionesPojo.php';

class OperacionesModel
{
    public function listarOperaciones()
    {
        try
        {
            $dao = new OperacionesDAO();
            $rec = $dao->mostrarOperaciones();
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    public function getClavesDocumentos()
    {
        try
        {
            $dao = new OperacionesDAO();
            $rec = $dao->getClavesDocumentos();
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
}
?>