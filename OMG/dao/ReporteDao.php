<?php
require_once '../ds/AccesoDB.php';

class ReporteDao{

    public function listarReportes($CONTRATO)
    {
        try
        {
            $query="SELECT tbasignaciones_contrato.id_asignacion, tbasignaciones_contrato.clave_contrato, tbasignaciones_contrato.region_fiscal,
                    tbasignaciones_contrato.contrato,
                    tbcatalogo_produccion.ubicacion, tbcatalogo_produccion.tag_patin, tbcatalogo_produccion.tipo_medidor,
                    tbcatalogo_produccion.tag_medidor, tbcatalogo_produccion.clasificacion,
                    tbcatalogo_produccion.hidrocarburo,tbomg_reporte.id_reporte,tbomg_reporte.omgc1,tbomg_reporte.omgc2,tbomg_reporte.omgc3,
                    tbomg_reporte.omgc4,tbomg_reporte.omgc5,tbomg_reporte.omgc6,tbomg_reporte.omgc7,tbomg_reporte.omgc8,tbomg_reporte.omgc9,
                    tbomg_reporte.omgc10,tbomg_reporte.omgc11,tbomg_reporte.omgc12,tbomg_reporte.omgc13,tbomg_reporte.omgc14,tbomg_reporte.omgc15,
                    tbomg_reporte.omgc16,tbomg_reporte.omgc17,tbomg_reporte.omgc18
                    FROM catalogo_produccion tbcatalogo_produccion
                    JOIN omg_reporte_produccion tbomg_reporte ON tbomg_reporte.id_catalogop=tbcatalogo_produccion.id_catalogop
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion
                    WHERE tbasignaciones_contrato.contrato = $CONTRATO";
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            return $lista;
          
            } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
    
    public function listarReporte($ID_REPORTE,$CONTRATO)
    {
        try
        {
            $query="SELECT tbasignaciones_contrato.id_asignacion, tbasignaciones_contrato.clave_contrato, tbasignaciones_contrato.region_fiscal,
                    tbasignaciones_contrato.contrato,
                    tbcatalogo_produccion.ubicacion, tbcatalogo_produccion.tag_patin, tbcatalogo_produccion.tipo_medidor,
                    tbcatalogo_produccion.tag_medidor, tbcatalogo_produccion.clasificacion,
                    tbcatalogo_produccion.hidrocarburo,tbomg_reporte.id_reporte,tbomg_reporte.omgc1,tbomg_reporte.omgc2,tbomg_reporte.omgc3,
                    tbomg_reporte.omgc4,tbomg_reporte.omgc5,tbomg_reporte.omgc6,tbomg_reporte.omgc7,tbomg_reporte.omgc8,tbomg_reporte.omgc9,
                    tbomg_reporte.omgc10,tbomg_reporte.omgc11,tbomg_reporte.omgc12,tbomg_reporte.omgc13,tbomg_reporte.omgc14,tbomg_reporte.omgc15,
                    tbomg_reporte.omgc16,tbomg_reporte.omgc17,tbomg_reporte.omgc18
                    FROM catalogo_produccion tbcatalogo_produccion
                    JOIN omg_reporte_produccion tbomg_reporte ON tbomg_reporte.id_catalogop=tbcatalogo_produccion.id_catalogop
                    JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion
                    WHERE tbomg_reporte.id_reporte=$ID_REPORTE AND tbasignaciones_contrato.contrato = $CONTRATO";
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
                    LEFT JOIN asignaciones_contrato tbasignaciones_contrato ON tbasignaciones_contrato.id_asignacion=tbcatalogo_produccion.id_asignacion
                    WHERE tbasignaciones_contrato.contrato = $CONTRATO AND lower(tbasignaciones_contrato.region_fiscal) = lower('$CADENA') 
                    GROUP BY tbcatalogo_produccion.ubicacion";
            
            $db = AccesoDB::getInstancia();
            $exito = $db->executeQuery($query);
            return $exito;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function buscarID2($CONTRATO,$CADENA)
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
    
    public function insertarReporte($FECHA_CREACION,$ID_CATALOGOP,$USUARIO)
    {
        try
        {
            $query_obtenerMaximo_mas_uno="SELECT max(id_reporte)+1 as id_reporte FROM omg_reporte_produccion";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_reporte"];
            }
             if($id_nuevo==NULL){
                $id_nuevo=0;
            }
            
           $query="INSERT INTO omg_reporte_produccion (omgc1,omgc2,omgc3,omgc4,omgc5,omgc6,omgc7,omgc8,omgc9,omgc10,omgc11,omgc12,omgc13,omgc14,omgc15,												
                   omgc16,omgc17,omgc18,id_catalogop,usuario)
                   VALUES('$FECHA_CREACION',null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,$ID_CATALOGOP,$USUARIO)";
           
           $db=  AccesoDB::getInstancia();
           $exito = $db->executeUpdateRowsAfected($query);
           return ($exito != 0)?[0=>1,"id_nuevo"=>$id_nuevo]:[0=>0,"id_nuevo"=>$id_nuevo ];
           
//           $db = AccesoDB::getInstancia();
//           $lista = $db->executeQueryUpdate($query);
//           return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }               
    }
    
    
    public function verificarTagMedidor($ID_CATALOGOP)
    {
        try
        {
            $query="SELECT tbcatalogo_produccion.tag_medidor
                    FROM catalogo_produccion tbcatalogo_produccion
                    WHERE tbcatalogo_produccion.id_catalogop=$ID_CATALOGOP";
            
            $db= AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista[0]['tag_medidor'];           
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function verificarSiExisteElTagMedidorPorFecha($TAG_MEDIDOR,$FECHA_CREACION)
    {
        try
        {
            $query="SELECT COUNT(*) AS resultado
                    FROM omg_reporte_produccion tbomg_reporte_produccion
                    JOIN catalogo_produccion tbcatalogo_produccion ON tbcatalogo_produccion.id_catalogop=tbomg_reporte_produccion.id_catalogop 
                    WHERE tbcatalogo_produccion.tag_medidor='$TAG_MEDIDOR' AND tbomg_reporte_produccion.omgc1='$FECHA_CREACION'";
            
            $db= AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista[0]['resultado'];
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
}

?>

