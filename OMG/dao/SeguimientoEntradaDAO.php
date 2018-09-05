<?php
require_once '../ds/AccesoDB.php';
class SeguimientoEntradaDAO{
    
    
        public function mostrarSeguimientoEntradas()
    {
        try{
                $query="SELECT tbseguimiento_entrada.id_seguimiento_entrada, tbseguimiento_entrada.avance_programa, 
                        tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_entrada, tbautoridad_remitente.clave_autoridad,
                        tbdocumento_entrada.asunto,
                        tbempleados.id_empleado id_empleadotema, CONCAT(tbempleados.nombre_empleado,' ', 
                        tbempleados.apellido_paterno,' ',tbempleados.apellido_materno) AS nombre_completotema,
                        tbempleadosplan.id_empleado,
                        tbdocumento_entrada.fecha_asignacion, tbdocumento_entrada.fecha_limite_atencion, tbdocumento_entrada.fecha_alarma,
                        tbdocumento_entrada.status_doc, tbdocumento_entrada.documento, tbdocumento_entrada.observaciones FROM
                        seguimiento_entrada tbseguimiento_entrada
                        JOIN   documento_entrada tbdocumento_entrada ON 
                        tbdocumento_entrada.id_documento_entrada=tbseguimiento_entrada.id_documento_entrada                    
                        JOIN temas tbtemas ON tbtemas.id_tema=tbdocumento_entrada.id_tema		 
                        JOIN autoridad_remitente tbautoridad_remitente ON
                        tbautoridad_remitente.id_autoridad=tbdocumento_entrada.id_autoridad
                        JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado							
                        JOIN empleados tbempleadosplan ON tbempleadosplan.id_empleado=tbseguimiento_entrada.id_empleado";
            

            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
        
    

//    public function mostrarSeguimientoEntradas()
//    {
//        try{
//                $query="SELECT tbseguimiento_entrada.id_seguimiento_entrada, tbseguimiento_entrada.avance_programa, 
//                    tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_entrada, tbautoridad_remitente.clave_autoridad,
//                    tbdocumento_entrada.asunto,
//       
//		 tbempleados.id_empleado id_empleadotema, tbempleados.nombre_empleado nombre_empleadotema, 
//		 tbempleados.apellido_paterno apellido_paternotema, tbempleados.apellido_materno apellido_maternotema,
//		 
//		 tbseguimiento_entrada.id_empleado id_empleadoplan, tbempleadosplan.nombre_empleado nombre_empleadoplan,
//		 tbempleadosplan.apellido_paterno apellido_paternoplan, tbempleadosplan.apellido_materno apellido_maternoplan,
// 		 
//		 tbdocumento_entrada.fecha_asignacion, tbdocumento_entrada.fecha_limite_atencion, tbdocumento_entrada.fecha_alarma,
//                 tbdocumento_entrada.status_doc, tbdocumento_entrada.documento, tbdocumento_entrada.observaciones FROM
//                 seguimiento_entrada tbseguimiento_entrada
//		 
//                    JOIN   documento_entrada tbdocumento_entrada ON 
//                    tbdocumento_entrada.id_documento_entrada=tbseguimiento_entrada.id_documento_entrada
//                    
//                    JOIN temas tbtemas ON tbtemas.id_tema=tbdocumento_entrada.id_tema
//		 
//                    JOIN autoridad_remitente tbautoridad_remitente ON
//                    tbautoridad_remitente.id_autoridad=tbdocumento_entrada.id_autoridad
//
//                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
//                    
//                    JOIN empleados tbempleadosplan ON tbempleadosplan.id_empleado=tbseguimiento_entrada.id_empleado";
//            
//
//            $db=  AccesoDB::getInstancia();
//            $lista=$db->executeQuery($query);
//            
//
//            return $lista;
//    }  catch (Exception $ex){
//        //throw $rec;
//        throw $ex;
//    }
//    }
    
    
    public function insertar($id_documento_entrada){
        try{
             $query_obtenerMaximo_mas_uno="SELECT max(id_seguimiento_entrada)+1 as id_seguimiento_entrada FROM seguimiento_entrada";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo_seguimiento_entrada=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo_seguimiento_entrada= $value["id_seguimiento_entrada"];
            }
            
            if($id_nuevo_seguimiento_entrada==NULL){
                $id_nuevo_seguimiento_entrada=0;
            }                                                                                                                           
            
            $query="INSERT INTO seguimiento_entrada (id_seguimiento_entrada,id_documento_entrada,id_empleado)VALUES"
                    . "($id_nuevo_seguimiento_entrada,$id_documento_entrada,0)";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
         } catch (Exception $ex) {

        }
    }
    
    
    public function actualizarSeguimientoEntradaPorColumna($COLUMNA,$VALOR,$ID_SEGUIMIENTO_ENTRADA){
         
        try{
            $query="UPDATE seguimiento_entrada SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_seguimiento_entrada=$ID_SEGUIMIENTO_ENTRADA";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarSeguimientoEntrada($id_seguimiento_entrada){
        try{
            $query="DELETE FROM seguimiento_entrada WHERE id_seguimiento_entrada=$id_seguimiento_entrada";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
