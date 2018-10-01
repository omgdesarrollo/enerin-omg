
<?php

require_once '../dao/Gantt_TareaDao.php';
require_once '../Model/NotificacionesModel.php';
// require_once '../Pojo/GanttPojo.php';
class Gantt_TareasModel{
    //put your code here
    
    public function listarRegistrosGanttTareas($VALUE)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec = $dao->listarRegistrosGanttTareas($VALUE);
            $duracionTotal=0;
            // $id_tarea = array();
            $bandera=1;
            $array = array();
            $cont=0;
            $id_tarea = $dao->totalDeDiasPorTarea($VALUE);//obtener todo s los padres
            $totalPadreCero = $dao->totalPadreCero($VALUE);
            // $total['total']= $dao->totalDeDiasPorTarea($VALUE);
            // foreach ($rec as $key => $value)
            // {
            //     if($value["parent"] == 0)
            //     {
            //         $id_tarea[$cont]["id"] = $value["id"];
            //         $cont++;
            //     }
                // if($bandera==1)
                // {
                //     if($value["parent"] == 0)
                //     $bandera=0;
                // }
                // $duracionTotal+= $rec["duration"] ;
            //     if($value['parent']!=0)
            //     {
            //         $rec[$key]['porcentaje_por_actividad']= $value['duration']*100/$total['total'];
            //     }else{
            //         $rec[$key]['porcentaje_por_actividad']= $value['duration']*100/$value['duration'];
            //     }
            //     $rec[$key]['total_dias']= $total['total'];
            // }
            // var_dump($id_tarea);
            if($totalPadreCero!=0)
            {
                foreach($id_tarea as $key => $value)
                {
                    $bandera=1;
                    foreach($rec as $k => $v)
                    {
                        if($bandera==1)
                        {
                            $id_tarea[$key]["duracion_total"] = 0;
                            $bandera=0;
                        }
                        if($v["parent"]==$value["id"] && $v["parent"]!=0 )
                        {
                            $id_tarea[$key]["duracion_total"] += $v["duration"];
                        }
                    }
                }
                // foreach($id_tarea as $k => $val)
                // {
                    foreach($rec as $key => $value)
                    {
                        if($value["parent"]!=0)
                        //  && $val["id"]==$value["parent"])
                        {
                            // $index = array_search($value["parent"],$id_tarea,true);
                            // echo $id_tarea[$index]["duracion_total"];
                            foreach($id_tarea as $k => $v)
                            {
                                if($value["parent"]==$v["id"])
                                $value["ponderado_programado"]==-1 ?
                                    $rec[$key]["porcentaje_por_actividad"]= round($value["duration"]*100/$v["duracion_total"],2) : 
                                    $rec[$key]["porcentaje_por_actividad"]= round($value["ponderado_programado"],2);
                                // $value["ponderado_programado"]==-1 ?
                                //     $rec[$key]["porcentaje_por_actividad"]= $value["duration"]*100/$v["duracion_total"] : 
                                //     $rec[$key]["porcentaje_por_actividad"]= $value["ponderado_programado"];
                            }
                        }
                        else
                        {
                            $value["ponderado_programado"]!=-1 ?
                                $rec[$key]["porcentaje_por_actividad"] = round($value["ponderado_programado"],2) :
                                $rec[$key]["porcentaje_por_actividad"] = round(100/$totalPadreCero,2);

                            // $value["ponderado_programado"]!=-1 ?
                            //     $rec[$key]["porcentaje_por_actividad"] = $value["ponderado_programado"] :
                            //     $rec[$key]["porcentaje_por_actividad"] = 100/$totalPadreCero;
                        }
                    }
            }
            // var_dump($rec);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
//    public function calcularPorcentajePorActividad()
//    {
//        try 
//        {
////            $contador=0;
//            $dao=new Gantt_TareaDao();
//            $rec= $dao->calcularPorcentajePorActividad();
//            $total= $dao->totalDeDiasPorTarea();
////            echo "este es rec: ".json_encode($total);
//            
//            foreach ($rec as $key=>$value) 
//            {
////                $rec[$contador]['porcentaje_por_actividad']= $value['duration']*100/$total;
////                $rec[$contador]['total_dias']= $total;
////                $contador++;      
//                $rec[$key]['porcentaje_por_actividad']= $value['duration']*100/$total;
//                $rec[$key]['total_dias']= $total;
//            }
//            
//            return $rec;
//        } catch (Exception $ex) 
//        {
//            throw $ex;
//        }
//    }


    public function insertarGanttTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->insertarGanttTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    
    public static function actualizarGanttTareas($COLUMNAS,$ID)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $query= "UPDATE gantt_tareas SET";
            $index=0;
            foreach ($COLUMNAS as $key => $value) 
            { 
                if($index!=0)
                {
                    $query.=" , ";
                }
                
                $query .= " $key = '$value'";
                $index++;
            }
            
            $query.= "WHERE id = $ID";
            $update= $dao->actualizarGanttTareas($query);
            return ($update!=0)?1:0;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    public static function actualizarGanttTareasDeTablaDetalles($COLUMNAS,$ID)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $query= "UPDATE gantt_tareas SET";
            $index=0;
            foreach ($COLUMNAS as $key => $value) 
            { 
                if($index!=0)
                {
                    $query.=" , ";
                }
                
                $query .= " $key = '$value'";
                $index++;
            }
            
            $query.= "WHERE id = $ID";
            $update= $dao->actualizarGanttTareas($query);
            return ($update!=0)?1:0;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public static function actualizarExisteProgramaTareas($VALUES)
    {
        try
        {            
            $dao=new Gantt_TareaDao();
            $rec= $dao->actualizarExisteProgramaTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $xe; 
            return -1;
        }
    }
    
    
    public static function actualizarAvanceProgramaTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->actualizarAvanceProgramaTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    

    public function eliminarGanttTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->eliminarGanttTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public  static function verificarParentHijoEnTarea($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->verificarParentHijoEnTarea($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public static function avanceProgramaTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->AvanceProgramaTareas($VALUES);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public static function verificarSiExisteIDTareaEnGanttTareas($VALUES)
    {
        try
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->verificarSiExisteIDTareaEnGanttTareas($VALUES);        
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }


    
    public function insertarTareasGantt($data,$id_tarea){
       
        
        try{
            $inserccion;
            $lista_tareas_verificadas;
            $dao= new Gantt_TareaDao();
            $modelGantt= new Gantt_TareasModel();
//            $modelGanttTareasModel= new Gantt_TareasModel();
            $dataNotificacion=array();
            $lista_tareas_verificadas=self::verificarTareasExiste($data);
            foreach ($data as $value) {
                if (isset($value["id"])) {
                   foreach ($lista_tareas_verificadas as $value2) {
                        if($value["id"]==$value2["id"]){
                                if($value2["cantidad"]==0){
                                    
                                if(isset($value["parent"])){//para checar que se envio el parent 
                                    
                                    if($value["parent"]!=""){
                                         $value["progress"]=0;
//                                          $value["user"];
//                                         echo "entro en insertas;";
                                         $value["id_tarea"]=$id_tarea;
                                         $value["existeprograma"]=1;
//                                         echo json_encode($value);
                                         $dao->insertarGanttTareas($value);
                                         
                                        $modelGantt->guardarNotificacionResponsable($value);
                                       
                                         
                                         
                                         
//                                         echo "entro";
                                         self:: actualizarExisteProgramaTareas($value);
//                                         if(isset($value["status"])){
//                                             
//                                         }
                                         
                                    }
                                }
                                    
                                }
                                else{
                                     if($value["!nativeeditor_status"]=='deleted'){
                                         echo "entro a eliminar la tarea";
                                         $dao->eliminarGanttTareas($value["id"]);
//                                         $dao->deleteTareasDe_Gantt_Seguimiento_Entrada($value);    
                                    }else{
                                        echo "entro en actualizar";
//                                         $dao->updateTareas($value); 
                                        
                                         if (!isset($value["progress"])) {
                                             $value["progress"]=0;
                                         }
                                         if(isset($value["status"])){
                                            self::actualizarGanttTareas(array("text"=>$value["text"],"start_date"=>$value["start_date"],"duration"=>$value["duration"],"progress"=>$value["progress"],"parent"=>$value["parent"],"user"=>$value["user"],"notas"=>$value["notas"],"status"=>$value["status"]), $value["id"]);
                                         }else{                                        
                                            self::actualizarGanttTareas(array("text"=>$value["text"],"start_date"=>$value["start_date"],"duration"=>$value["duration"],"progress"=>$value["progress"],"parent"=>$value["parent"],"user"=>$value["user"],"notas"=>$value["notas"]), $value["id"]);
                                         }
//                                         $model->actualizarGanttTareas
//                                         $dao->updateTareasId_EmpleadoXIdGantt_En_Tabla_Seguimiento_entrada($value);
                                    }
                                }
                        }
                    }
                }
            }
            self::actualizarAvanceProgramaTareas(array("avance"=>self::avanceProgramaTareas(array("id_tarea"=>$id_tarea)),"id_tarea"=>$id_tarea));
            
            
             if(Gantt_TareasModel::verificarSiExisteIDTareaEnGanttTareas(array("id_tarea"=>Session::getSesion("dataGantt_id_tarea")))=="true"){
              Gantt_TareasModel::actualizarExisteProgramaTareas(array("existeprograma"=>1,"id_tarea"=>Session::getSesion("dataGantt_id_tarea")));
          }else{
               Gantt_TareasModel::actualizarExisteProgramaTareas(array("existeprograma"=>0,"id_tarea"=>Session::getSesion("dataGantt_id_tarea")));
          }      
        
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    
    public static function verificarTareasExiste($array){
        try{
            $dao= new Gantt_TareaDao();
            $numeroenlistaposicion=0;
            $lista_tarea_verificada_si_existe;
            foreach ($array as $value) {
                if (isset($value["id"])) {
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["id"]= $value["id"];
                    $lista_tarea_verificada_si_existe[$numeroenlistaposicion]["cantidad"]=$dao->verificarTareaExiste($value)[0]["cantidad"];
                    $numeroenlistaposicion++;
                }
            }
            return $lista_tarea_verificada_si_existe;
        } catch (Exception $ex) {
            throw  $ex;
        }
    }
    
    
    public function obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO)
    {
        try
        {
            $dao=new GanttDao();
            $rec= $dao->obtenerFolioEntradaSeguimiento($ID_SEGUIMIENTO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public  function calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada)
    {
        try
        {
            $dao=new GanttDao();
             $rec= $dao->calculoAvanceProgramaGeneral($id_seguimiento_que_lleva_al_folio_de_entrada);
             echo "s  : ".$rec[0]["total_avance_programa"];
             $value["id_seguimiento"]=$id_seguimiento_que_lleva_al_folio_de_entrada;
             $value["avance_programa"]=$rec[0]["total_avance_programa"];
            $dao->updateAvanceProgramaGeneral($value);
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    

      public function guardarNotificacionResponsable($values){
      try{
//           echo json_encode($values);
            $contrato= Session::getSesion("s_cont");
            $id_usuario=Session::getSesion("user");
            $asunto="";
            $dao=new Gantt_TareaDao();
            $idparaquien= $dao->obtenerUsuarioPorIdEmpleado($values["user"]);
            $model=new NotificacionesModel();
            
             $mensaje="Se le asigno una tarea ".$values["text"]." por el Usuario: ";
             $tipo_mensaje= 0;
             $atendido= 'false';
             $asunto="";
//            echo ""+$ID;
             
             
            $model->guardarNotificacionHibry($id_usuario['ID_USUARIO'], $idparaquien, $mensaje, $tipo_mensaje, $atendido,$asunto,$contrato);
            
            
            
            
//            echo "valores rec: ".json_encode($rec);
            return true;
        }catch (Exception $ex)
        {
            return false;
        }
    
    
    }

    public function listarEmpleadosNombreCompleto()
    {
       try
       {
           $dao=new Gantt_TareaDao();
           $rec= $dao->listarEmpleadosNombreCompleto();
           
           return $rec;
       } catch (Exception $ex)
       {
           throw $ex;
           return -1;
       }
    }
    
    public function guardarPonderados($LISTA)
    {
        echo "entro ";  
        try
        {
            $dao=new Gantt_TareaDao();
            $respuestas = array();
            $res = "";
            // var_dump($LISTA);
            foreach($LISTA as $key => $value)
            {
                $respuestas[$key]["id"] = $value["id"];
                $respuestas[$key]["res"] =self::actualizarGanttTareas(array("ponderado_programado"
                                          =>$value["ponderado_programado"]),$value["id"]);
//                        $dao->guardarPonderados($value["id"],$value["ponderado_programado"]);
            }
            foreach($respuestas as $key => $value)
            {
                if($value["res"]==0)
                {
                    $res .= "Error al actualizar la tarea con id = +".$value['id']." \n";
                }
            }
            return $res=="" ? 1 : $res;
        }
        catch(Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function guardarNota($Lista)
    {
        try 
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->guardarNota($Lista);
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
    
    public function guardarStatus($Lista)
    {
        try 
        {
            $dao=new Gantt_TareaDao();
            $rec= $dao->guardarStatus($Lista);
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }

}
