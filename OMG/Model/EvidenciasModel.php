<?php

require_once '../dao/EvidenciasDao.php';
require_once '../Pojo/EvidenciasPojo.php';

class EvidenciasModel
{
    public function listarEvidencias($ID_USUARIO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencias($ID_USUARIO);
            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    
    public function listarEvidencia($ID_EVIDENCIA,$ID_USUARIO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencia($ID_EVIDENCIA,$ID_USUARIO);

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
    public function crearEvidencia($ID_USUARIO,$ID_REGISTRO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->crearEvidencia($ID_USUARIO,$ID_REGISTRO);
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
            $result = $dao->eliminarEvidencia($id_evidencias);
            
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function listarRegistros($CADENA,$ID_TEMA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $result = $dao->listarRegistros($CADENA,$ID_TEMA);            
            return $result;
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function listarTemas($CADENA,$ID_USUARIO)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->listarTemas($CADENA,$ID_USUARIO);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}
?>