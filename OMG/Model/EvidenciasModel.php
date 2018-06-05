<?php

require_once '../dao/EvidenciasDao.php';
require_once '../Pojo/EvidenciasPojo.php';

class EvidenciasModel
{
    public function listarEvidencias()
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencias();
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    
    public function listarEvidencia($ID_EVIDENCIA)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencia($ID_EVIDENCIA);

            return $rec;
        }catch(Exception $e)
        {
            throw $e;
            return false;
        }
    }


    public function getClavesDocumentos($cadena)
    {
        try
        {
            $dao = new EvidenciasDAO();
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
            $dao = new EvidenciasDAO();
            $rec = $dao->crearEvidencia($claveDocumento);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
            return false;
        }
    }
    
    
    public function iniciarEnVacio($id_evidencias)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->iniciarEnVacio($id_evidencias);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    

    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_EVIDENCIAS)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec= $dao->actualizarEvidenciaPorColumna($COLUMNA, $VALOR, $ID_EVIDENCIAS);
            return $rec;
        }catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
    
    public function eliminarEvidencia ($id_evidencias)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $dao->eliminarEvidencia($id_evidencias);
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
            
    
}
?>