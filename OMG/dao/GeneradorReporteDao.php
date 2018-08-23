<?php
require_once '../ds/AccesoDB.php';
class GeneradorReporteDao {
        public function listarReportesporFecha($FECHA_INICIO,$FECHA_FINAL,$CUMPLIMIENTO)
    {
            
        try
        {
            $query="SELECT 
                 tbasignaciones_contrato.region_fiscal,tbasignaciones_contrato.clave_contrato,tbcatalogoproduccion.ubicacion,
                 tbcatalogoproduccion.tag_patin,tbcatalogoproduccion.tipo_medidor,tbcatalogoproduccion.tag_medidor,tbcatalogoproduccion.clasificacion,
                 tbcatalogoproduccion.hidrocarburo,  tbomg_reporte_produccion.omgc1,
		 sum(tbomg_reporte_produccion.omgc2)/count(*) as omgc2,sum(tbomg_reporte_produccion.omgc3)/count(*) as omgc3, sum(tbomg_reporte_produccion.omgc4)/count(*) as omgc4,sum(tbomg_reporte_produccion.omgc5)/count(*) as omgc5,
		 sum(tbomg_reporte_produccion.omgc6)/count(*) as omgc6, tbomg_reporte_produccion.omgc7, tbomg_reporte_produccion.omgc8, tbomg_reporte_produccion.omgc9,
		 sum(tbomg_reporte_produccion.omgc10)/count(*) as omgc10,sum(tbomg_reporte_produccion.omgc11)/count(*) as omgc11, sum(tbomg_reporte_produccion.omgc12)/count(*) as omgc12,sum(tbomg_reporte_produccion.omgc13)/count(*) as omgc13,
		 sum(tbomg_reporte_produccion.omgc14)/count(*) as omgc14,sum(tbomg_reporte_produccion.omgc15)/count(*) as omgc15,sum(tbomg_reporte_produccion.omgc16)/count(*) as omgc16,sum(tbomg_reporte_produccion.omgc17)/count(*) as omgc17,
		 tbomg_reporte_produccion.omgc18               
                FROM omg_reporte_produccion tbomg_reporte_produccion
                 JOIN catalogo_produccion tbcatalogoproduccion ON tbcatalogoproduccion.ID_CATALOGOP=tbomg_reporte_produccion.ID_CATALOGOP
                 JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.ID_ASIGNACION=tbcatalogoproduccion.ID_ASIGNACION
                 WHERE tbomg_reporte_produccion.omgc1 BETWEEN '$FECHA_INICIO' AND '$FECHA_FINAL'  AND
                 tbasignaciones_contrato.CONTRATO=$CUMPLIMIENTO"
                    . ""
                    . "  group by tbcatalogoproduccion.TAG_MEDIDOR";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    public function listarReportesDiariosFechaInicioaFechaFinal($FECHA_INICIO,$FECHA_FINAL,$CUMPLIMIENTO)
    {
         
        try {
            $query="SELECT tbasignaciones_contrato.region_fiscal,tbasignaciones_contrato.clave_contrato,tbcatalogoproduccion.ubicacion,
        tbcatalogoproduccion.tag_patin,tbcatalogoproduccion.tipo_medidor,tbcatalogoproduccion.tag_medidor,tbcatalogoproduccion.clasificacion,
        tbcatalogoproduccion.hidrocarburo,  tbomg_reporte_produccion.omgc1,
		 tbomg_reporte_produccion.omgc2,tbomg_reporte_produccion.omgc3 , tbomg_reporte_produccion.omgc4,tbomg_reporte_produccion.omgc5,
		 tbomg_reporte_produccion.omgc6, tbomg_reporte_produccion.omgc7, tbomg_reporte_produccion.omgc8, tbomg_reporte_produccion.omgc9,
		 tbomg_reporte_produccion.omgc10,tbomg_reporte_produccion.omgc11, tbomg_reporte_produccion.omgc12,tbomg_reporte_produccion.omgc13,
		tbomg_reporte_produccion.omgc14,tbomg_reporte_produccion.omgc15,tbomg_reporte_produccion.omgc16,tbomg_reporte_produccion.omgc17,
		 tbomg_reporte_produccion.omgc18
                FROM omg_reporte_produccion tbomg_reporte_produccion
                 JOIN catalogo_produccion tbcatalogoproduccion ON tbcatalogoproduccion.ID_CATALOGOP=tbomg_reporte_produccion.ID_CATALOGOP
                 JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.ID_ASIGNACION=tbcatalogoproduccion.ID_ASIGNACION
                 WHERE tbomg_reporte_produccion.omgc1 BETWEEN '$FECHA_INICIO' AND '$FECHA_FINAL'  AND
                 tbasignaciones_contrato.CONTRATO=$CUMPLIMIENTO";
                     
                     $db=  AccesoDB::getInstancia();
                     $lista = $db->executeQuery($query);
                     return $lista;
        } catch (Exception $e) {
            throw $ex;
            return -1;
        }   
    }
    
    public function listarReportePorMonthAndYear($MONTH,$YEAR,$CONTRATO)
    {
        try
        {
            $query="SELECT * FROM omg_reporte_produccion tbomg_reporte_produccion
                    JOIN catalogo_produccion tbcatalogo_produccion ON tbcatalogo_produccion.id_catalogop=tbomg_reporte_produccion.id_catalogop
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion
                    WHERE MONTH(tbomg_reporte_produccion.omgc1) = $MONTH AND YEAR(tbomg_reporte_produccion.omgc1) = $YEAR 
                    AND tbasignaciones_contrato.contrato =$CONTRATO";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}
