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
    public function crearEvidencia($claveDocumento)
    {
        try
        {
            $dao = new OperacionesDAO();
            $rec = $dao->crearEvidencia($claveDocumento);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
            return false;
        }
    }
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_EVIDENCIAS){
        try{
            $dao=new OperacionesDao();
            $rec= $dao->actualizarEvidenciaPorColumna($COLUMNA, $VALOR, $ID_EVIDENCIAS);
            return $rec;
        } catch (Exception $ex) {

        }
    }
    
    
}
?>