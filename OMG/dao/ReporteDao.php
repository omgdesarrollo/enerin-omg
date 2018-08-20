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
    
    public function listarReportesporFecha2($FECHA_INICIO,$FECHA_FINAL,$CONTRATO)
    {
        try
        {
            $query="SELECT tbomg_reporte_produccion.id_reporte, tbomg_reporte_produccion.id_contrato, tbomg_reporte_produccion.omgc1,
		 tbomg_reporte_produccion.omgc2, tbomg_reporte_produccion.omgc3, tbomg_reporte_produccion.omgc4, tbomg_reporte_produccion.omgc5,
		 tbomg_reporte_produccion.omgc6, tbomg_reporte_produccion.omgc7, tbomg_reporte_produccion.omgc8, tbomg_reporte_produccion.omgc9,
		 tbomg_reporte_produccion.omgc10, tbomg_reporte_produccion.omgc11, tbomg_reporte_produccion.omgc12, tbomg_reporte_produccion.omgc13,
		 tbomg_reporte_produccion.omgc14, tbomg_reporte_produccion.omgc15, tbomg_reporte_produccion.omgc16, tbomg_reporte_produccion.omgc17,
		 tbomg_reporte_produccion.omgc18		 
                 FROM omg_reporte_produccion tbomg_reporte_produccion
                 WHERE tbomg_reporte_produccion.omgc1 BETWEEN '$FECHA_INICIO' AND '$FECHA_FINAL' AND tbomg_reporte_produccion.id_contrato=$CONTRATO";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
        public function buscarID($CONTRATO,$CADENA)
    {
        try
        {
            $query="SELECT DISTINCT tbasignaciones_contrato.clave_contrato, tbasignaciones_contrato.region_fiscal, tbcatalogo_produccion.ubicacion,
                    tbcatalogo_produccion.tag_patin, tbcatalogo_produccion.tipo_medidor
                    FROM catalogo_produccion tbcatalogo_produccion
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion
                    WHERE tbasignaciones_contrato.contrato = $CONTRATO AND tbasignaciones_contrato.region_fiscal LIKE '%$CADENA%' GROUP BY tbcatalogo_produccion.ubicacion";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
            return $exito;
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
            $query="SELECT DISTINCT tbasignaciones_contrato.region_fiscal
                    FROM asignaciones_contrato tbasignaciones_contrato
                    WHERE tbasignaciones_contrato.contrato=$CONTRATO";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);

            return $exito;            
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
            $query="SELECT tbcatalogo_produccion.tag_patin
                    FROM catalogo_produccion tbcatalogo_produccion
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion 
                    WHERE tbcatalogo_produccion.ubicacion='$UBICACION' AND  tbasignaciones_contrato.CONTRATO=$CONTRATO GROUP BY tbcatalogo_produccion.tag_patin";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);

            return $exito;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function obtenerTagMedidor($TAG_PATIN,$CONTRATO)
    {
        try
        {
            $query="SELECT tbcatalogo_produccion.tag_medidor
            FROM catalogo_produccion tbcatalogo_produccion
            JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion 
            WHERE tbcatalogo_produccion.tag_patin='$TAG_PATIN' AND  tbasignaciones_contrato.CONTRATO=$CONTRATO";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
//            echo "Este es el query: ".json_encode($query);
            return $exito;                        
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function obtenerTipoMedidor($TAG_MEDIDOR,$CONTRATO)
    {
        try
        {
            $query="SELECT tbcatalogo_produccion.id_catalogop, tbcatalogo_produccion.tipo_medidor, tbcatalogo_produccion.clasificacion, tbcatalogo_produccion.hidrocarburo
                    FROM catalogo_produccion tbcatalogo_produccion
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion 
                    WHERE tbcatalogo_produccion.tag_medidor='$TAG_MEDIDOR' AND  tbasignaciones_contrato.CONTRATO=$CONTRATO";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
//            echo "Este es el query: ".json_encode($query);
            return $exito;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
}

?>

