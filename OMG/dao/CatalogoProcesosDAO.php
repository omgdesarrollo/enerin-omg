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

    public function listarUno($ID_CONTRATO)
    {
        try
        {
            $query="SELECT tbcatalogo_reporte.id_contrato, tbcatalogo_reporte.clave_contrato, tbcatalogo_reporte.region_fiscal,
            tbcatalogo_reporte.ubicacion, tbcatalogo_reporte.tag_patin, tbcatalogo_reporte.tipo_medidor,
            tbcatalogo_reporte.tag_medidor, tbcatalogo_reporte.clasificacion,
            tbcatalogo_reporte.hidrocarburo
            FROM catalogo_reporte tbcatalogo_reporte
            WHERE tbcatalogo_reporte.id_contrato = $ID_CONTRATO";
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
            if($exito==1)
                $exito = $db->executeQuery("SELECT LAST_INSERT_ID()")[0]["LAST_INSERT_ID()"];
            else
                $exito = -2;
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

    public function buscarTagMedidor($CONTRATO,$TAG_MEDIDOR)
    {
        try
        {
            $query="SELECT COUNT(*) AS resultado
                    FROM catalogo_reporte tbcatalogo_reporte
                    WHERE tbcatalogo_reporte.tag_medidor = '$TAG_MEDIDOR' AND tbcatalogo_reporte.contrato = $CONTRATO";
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
            return $exito[0]["resultado"];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function permisoDeEliminar($ID_CONTRATO)
    {
        try
        {
            $query="SELECT COUNT(*) AS resultado FROM omg_reporte tbomg_reporte WHERE tbomg_reporte.id_contrato = $ID_CONTRATO";
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
            return $exito[0]["resultado"];
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function eliminarRegistro($ID_CONTRATO)
    {
        try
        {
            $query="DELETE FROM catalogo_reporte WHERE id_contrato = $ID_CONTRATO";
            $db = AccesoDB::getInstancia();
            $exito = $db->executeUpdateRowsAfected($query);
            return $exito;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}


?>

