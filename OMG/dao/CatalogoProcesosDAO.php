<?php
require_once '../ds/AccesoDB.php';

class CatalogoProcesosDAO{
    
    
    public function listarCatalogo($CONTRATO)
    {
        try
        {
            $query="SELECT tbcatalogo_reporte.id_contrato, tbcatalogo_reporte.clave_contrato, tbcatalogo_reporte.region_fiscal,
            tbcatalogo_reporte.ubicacion, tbcatalogo_reporte.tag_patin, tbcatalogo_reporte.tipo_medidor,
            tbcatalogo_reporte.tag_medidor, tbcatalogo_reporte.clasificacion,
            tbcatalogo_reporte.hidrocarburo
            FROM catalogo_reporte tbcatalogo_reporte
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

    public function guardarCatalogo($QUERY)
    {
        try
        {
            $db=  AccesoDB::getInstancia();
            $exito = $db->executeQueryUpdate($QUERY);
            return $exito;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function buscarID($CADENA,$CONTRATO)
    {
        try
        {
            $query="SELECT DISTINCT tbcatalogo_reporte.clave_contrato, tbcatalogo_reporte.region_fiscal, tbcatalogo_reporte.ubicacion
                    FROM catalogo_reporte tbcatalogo_reporte
                    WHERE tbcatalogo_reporte.contrato = $CONTRATO AND tbcatalogo_reporte.region_fiscal LIKE '%$CADENA%'";
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
            $query="SELECT DISTINCT tbcatalogo_reporte.region_fiscal
                    FROM catalogo_reporte tbcatalogo_reporte
                    WHERE tbcatalogo_reporte.contrato = $CONTRATO";
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
            return $exito;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}


?>

