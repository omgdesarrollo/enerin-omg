<?php
require_once '../ds/AccesoDB.php';

class ReporteDao{

    public function listarReportes($CONTRATO)
    {
        try
        {
            $query="SELECT tbcatalogo_reporte.id_contrato, tbcatalogo_reporte.clave_contrato, tbcatalogo_reporte.region_fiscal,
            tbcatalogo_reporte.ubicacion, tbcatalogo_reporte.tag_patin, tbcatalogo_reporte.tipo_medidor,
            tbcatalogo_reporte.tag_medidor, tbcatalogo_reporte.clasificacion,
            tbcatalogo_reporte.hidrocarburo,tbomg_reporte.omgc1,tbomg_reporte.omgc2,tbomg_reporte.omgc3,tbomg_reporte.omgc4
            ,tbomg_reporte.omgc5,tbomg_reporte.omgc6,tbomg_reporte.omgc7,tbomg_reporte.omgc8,tbomg_reporte.omgc9,tbomg_reporte.omgc10,tbomg_reporte.omgc11
            ,tbomg_reporte.omgc12,tbomg_reporte.omgc13,tbomg_reporte.omgc14,tbomg_reporte.omgc15,tbomg_reporte.omgc16
            ,tbomg_reporte.omgc17,tbomg_reporte.omgc18
            FROM catalogo_reporte tbcatalogo_reporte
            JOIN omg_reporte_produccion tbomg_reporte ON tbomg_reporte.ID_CONTRATO=tbcatalogo_reporte.ID_CONTRATO
           WHERE tbcatalogo_reporte.contrato = $CONTRATO";
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


?>

