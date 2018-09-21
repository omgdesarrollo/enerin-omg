<?php

require_once '../dao/EvidenciasDAO.php';
require_once '../Pojo/EvidenciasPojo.php';

class EvidenciasModel
{
    public function listarEvidencias($ID_USUARIO,$CONTRATO)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->listarEvidencias($ID_USUARIO,$CONTRATO);
            
            foreach ($rec as $key => $value) 
            {
                $rec[$key]['programa_cargado']= $dao->verificarSiHayCargadoProgramaGantt($value['id_evidencias']);
            }
            
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
    public function crearEvidencia($ID_USUARIO,$ID_REGISTRO,$FECHA_CREACION)
    {
        try
        {
            $dao = new EvidenciasDAO();
            $rec = $dao->crearEvidencia($ID_USUARIO,$ID_REGISTRO,$FECHA_CREACION);
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

    

    public function actualizarPorColumna($COLUMNA,$CONTEXTO,$ID_EVIDENCIAS,$VALOR)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec= $dao->actualizarEvidenciaPorColumna($COLUMNA,$CONTEXTO,$ID_EVIDENCIAS,$VALOR);
            if($COLUMNA=="validacion_supervisor")
            {
                $rec = $dao->actualizarFechaValidacion($ID_EVIDENCIAS);
            }
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

    public function listarTemas($CADENA,$ID_USUARIO,$CONTRATO)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->listarTemas($CADENA,$ID_USUARIO,$CONTRATO);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE,$COLUMNA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE,$COLUMNA);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function checarDisponiblidad($ID_REGISTRO,$FECHA)
    {
        try
        {
            $dao=new EvidenciasDAO();
            $rec = $dao->checarDisponiblidad($ID_REGISTRO,$FECHA);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
//    public function actualizarFechaValidacion($ID_EVIDENCIAS, $VALIDACION)
//    {
//        try
//        {
//            $dao=new EvidenciasDAO();
//            $rec= $dao->actualizarFechaValidacion($ID_EVIDENCIAS, $VALIDACION);
//            
//            return $rec;
//        } catch (Exception $ex)
//        {
//            throw $ex;
//            return false;
//        }
//    }
    
}
?>