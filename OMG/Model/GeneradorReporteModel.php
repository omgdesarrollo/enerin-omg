<?php
require_once '../dao/GeneradorReporteDao.php';
require_once '../Model/Exportar.php';
class GeneradorReporteModel {
    public function listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CUMPLIMIENTO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->listarReportesporFecha($FECHA_INICIO, $FECHA_FINAL, $CUMPLIMIENTO); 
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function listarReportesDiariosFechaInicioaFechaFinal($FECHA_INICIO, $FECHA_FINAL, $CUMPLIMIENTO)
    {
        try {
            $dao=new GeneradorReporteDao();
            $rec= $dao->listarReportesDiariosFechaInicioaFechaFinal($FECHA_INICIO, $FECHA_FINAL, $CUMPLIMIENTO);
            return $rec;
        } catch (Exception $e) {
        }
    }
    
    
    public function listarReportePorMonthAndYear($MONTH, $YEAR,$CONTRATO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->listarReportePorMonthAndYear($MONTH, $YEAR,$CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function sumaByMonthAndYear($MONTH, $YEAR, $CONTRATO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->sumaByMonthAndYear($MONTH, $YEAR, $CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function sumaDereportesDiariosByMonthAndYear($MONTH, $YEAR, $CONTRATO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->sumaDereportesDiariosByMonthAndYear($MONTH, $YEAR, $CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function insertarPorcentajesMolares($MONTH,$YEAR, $OMG2C1,$OMG2C2,$OMG2C3,$OMG2C4,$OMG2C5,$OMG2C6,$OMG2C7,$OMG2C8,$OMG2C9,$OMG2C10,$OMG2C11,$CONTRATO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->insertarPorcentajesMolares($MONTH,$YEAR, $OMG2C1,$OMG2C2,$OMG2C3,$OMG2C4,$OMG2C5,$OMG2C6,$OMG2C7,$OMG2C8,$OMG2C9,$OMG2C10,$OMG2C11,$CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function porcentajesMolaresByMonthAndYear($MONTH, $YEAR, $CONTRATO)
    {
        try
        {
            $dao=new GeneradorReporteDao();
            $rec= $dao->porcentajesMolaresByMonthAndYear($MONTH, $YEAR, $CONTRATO);
            
            return $rec;
        } catch (Exception$ex)
        {
            throw $ex;
            return -1;
        }
    }
}
