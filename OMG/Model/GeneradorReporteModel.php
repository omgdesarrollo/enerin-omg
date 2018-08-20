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
//            return self::calcular($rec);
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    public static function calcular($array){
        try{
            $lista1;
            $listados;
            $arrayData=$array;
            $contador=0;
            $fecha_produccion;
            $suma_presion=0;
            $temperatura=0;
            $produccion_petroleo_medido_neto=0;
            $densidad_petroleo_en_grados_api=0;
            $contenido_azufre_porcentaje_asociado_al_petroleo=0;
             $sal_asociado_al_petroleo=0;
            $agua_asociado_al_petroleo=0;
            $produccion_condensado_medido_neto=0;
            $densidad_condensado_grados_api=0;
            $contenido_azufre_asociado_condensado=0;
            $agua_asociado_condensado=0;
              $produccion_de_gas=0;
              $poder_calorifico_gas=0;
              $peso_molecular_gas=0;
              $energia_gas=0;
            
           
            foreach ($array as $key1 => $value1) {
//                if($value["tag_medidor"]){
                $suma_presion=0;
                $temperatura=0;
                $produccion_petroleo_medido_neto=0;
                $densidad_petroleo_en_grados_api=0;
                
                    foreach ($arrayData as $key2 => $value2) {
                        if($value1["tag_medidor"]==$value2["tag_medidor"]){
                            $suma_presion+=$value2["omgc2"];
                            $temperatura+=$value2["omgc3"];
                            $produccion_petroleo_medido_neto+=$value2["omgc4"];
                            $densidad_petroleo_en_grados_api+=$value2["omgc5"];
//                            $contenido_azufre_porcentaje_asociado_al_petroleo+=$value2["omgc6"];
//                            $sal_asociado_al_petroleo+=$value2["omgc7"];
//                            $agua_asociado_al_petroleo+=$value2["omgc8"];
//                            $produccion_condensado_medido_neto+=$value2["omgc9"];
//                            $densidad_condensado_grados_api+=$value2["omgc10"];
//                            $contenido_azufre_asociado_condensado+=$value2["omgc11"];
//                            $agua_asociado_condensado+=$value2["omgc12"];
//                            $produccion_de_gas+=$value2["omgc13"];
//                            $poder_calorifico_gas+=$value2["omgc14"];
//                            $peso_molecular_gas+=$value2["omgc15"];
//                            $energia_gas+=$value2["omgc16"];
//                            $eventos+=$value2["omgc17"];
                            
//                            $text_presion+="omcg2";
                        }
                    }
                    
                    //presion es omgc2
                    //temperatura es omgc3
               $lista1[$contador]=array("tag_medidor"=>$value1["tag_medidor"],
                   "omgc1"=>"-----",
                   "omgc2"=>$suma_presion,
                   "omgc3"=>$temperatura,
                   "omgc4"=>$produccion_petroleo_medido_neto,
                   "omgc5"=>$densidad_petroleo_en_grados_api
                   );
               
               
                $contador++;
            }
            
//            $lista2[]
//            foreach($lista as $key3=>$value3){
//                echo json_encode($value3["tag_medidor"]);
//            }
//             Sarray_not_unique($raw_array);
            
//            return array_unique($lista1, SORT_REGULAR);
            return $array;
        }catch (Exception $ex) {
        }
    }
public static function  array_not_unique($raw_array) {
    $dupes = array();
    natcasesort($raw_array);
    reset ($raw_array);

    $old_key    = NULL;
    $old_value    = NULL;
    foreach ($raw_array as $key => $value) {
        if ($value === NULL) { continue; }
        if ($old_value == $value) {
            $dupes[$old_key]    = $old_value;
            $dupes[$key]        = $value;
        }
        $old_value    = $value;
        $old_key    = $key;
    }
return $dupes;
}
    
}
