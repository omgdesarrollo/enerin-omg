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
}
