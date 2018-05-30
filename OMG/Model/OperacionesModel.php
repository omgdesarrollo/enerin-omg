<?php

require_once '../dao/OperacionesDAO.php';
require_once '../Pojo/OperacionesEntradaPojo.php';

class OperacionesModel
{
    public function listarOperaciones()
    {
        try
        {
            $dao = new OperacionesDAO();
            $rec = $dao->listarOperaciones();
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    public function getClavesDocumentos($cadena)
    {
        try
        {
            $dao = new OperacionesDAO();
            $rec = $dao->getClavesDocumentos($cadena);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
}
?>