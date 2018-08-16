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
}
?>
