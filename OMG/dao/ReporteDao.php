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
//            $hoy = new Datetime();
//            $fsuma = new Datetime("0000-00-01");
//            $al = strftime("%Y-%m-%d");
//            $hoy = new Datetime($al)+1;
//            echo json_encode($hoy);
//            $nuevafecha = date('Y-m-j');
            
        
//        echo json_encode($nuevafecha);
              
//            for($v=1;$v<500000;$v++){
              
//            $nuevafecha = strtotime ( '+1 day' , strtotime ( $nuevafecha ) ) ;
//            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
            
//        echo json_encode($nuevafecha);
//            $al = strftime("%Y-%m-%d"); 
//            $query="INSERT INTO `databaseomg`.`omg_reporte_produccion` (`ID_CONTRATO`, `OMGC1`, `OMGC2`, `OMGC3`, `OMGC4`, `OMGC5`, `OMGC6`, `OMGC7`, `OMGC8`, `OMGC9`, `OMGC10`, `OMGC11`, `OMGC12`, `OMGC13`, `OMGC14`, `OMGC15`, `OMGC16`, `OMGC17`, `OMGC18`) VALUES ('1','$nuevafecha', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2', '2018-08-15 12:03:45')";
//         $db=  AccesoDB::getInstancia();
//            $db->executeQueryUpdate($query);
//            
//            }
          
            } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
        
    }
    
    public function listarReportesporFecha($FECHA_INICIO,$FECHA_FINAL,$CONTRATO)
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

    
    
    
    
}


?>

