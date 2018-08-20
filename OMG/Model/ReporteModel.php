<?php
require_once '../dao/ReporteDao.php';
  class ReporteModel{
        public function listarReportes($CONTRATO)
        {
            try
            {
                $dao=new ReporteDao();
                $lista= $dao->listarReportes($CONTRATO);   
                return $lista;
            }catch (Exception $ex)
            {
                throw $ex;
                return -1;
            }
        }
    
    public function listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $rec= $dao->listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CONTRATO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function buscarID($CONTRATO, $CADENA)
    {
        try
        {
            $dao=new ReporteDao();
            $lista= $dao->buscarID($CONTRATO, $CADENA);
                    
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function buscarRegionesFiscales($CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $lista= $dao->buscarRegionesFiscales($CONTRATO);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function obtenerTagPatin($UBICACION,$CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $lista= $dao->obtenerTagPatin($UBICACION,$CONTRATO);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function obtenerTagMedidor($TAG_PATIN, $CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $lista= $dao->obtenerTagMedidor($TAG_PATIN, $CONTRATO);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function obtenerTipoMedidor($TAG_MEDIDOR, $CONTRATO)
    {
        try
        {
            $dao=new ReporteDao();
            $lista= $dao->obtenerTipoMedidor($TAG_MEDIDOR, $CONTRATO);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;        
        } 
    }
    
}
?>
