<?php
require_once '../ds/AccesoDB.php';
class SeguimientoEntradaDAO{

    public function mostrarSeguimientoEntradas(){
        try{
//            $query="SELECT TBSEGUIMIENTO_ENTRADA.ID_SEGUIMIENTO_ENTRADA, TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA, 
//		 TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA, TBENTIDAD_REGULADORA.CLAVE_ENTIDAD, TBDOCUMENTO_ENTRADA.ASUNTO,
//       
//		 TBEMPLEADOS.ID_EMPLEADO ID_EMPLEADOTEMA, TBEMPLEADOS.NOMBRE_EMPLEADO NOMBRE_EMPLEADOTEMA, 
//		 TBEMPLEADOS.APELLIDO_PATERNO APELLIDO_PATERNOTEMA, TBEMPLEADOS.APELLIDO_MATERNO APELLIDO_MATERNOTEMA,
//		 
//		 TBSEGUIMIENTO_ENTRADA.ID_EMPLEADO ID_EMPLEADOPLAN, TBEMPLEADOSPLAN.NOMBRE_EMPLEADO NOMBRE_EMPLEADOPLAN,
//		 TBEMPLEADOSPLAN.APELLIDO_PATERNO APELLIDO_PATERNOPLAN, TBEMPLEADOSPLAN.APELLIDO_MATERNO APELLIDO_MATERNOPLAN,
// 		 
//		 TBDOCUMENTO_ENTRADA.FECHA_LIMITE_ATENCION, TBDOCUMENTO_ENTRADA.STATUS_DOC,TBDOCUMENTO_ENTRADA.DOCUMENTO,
//                 TBDOCUMENTO_ENTRADA.OBSERVACIONES FROM SEGUIMIENTO_ENTRADA TBSEGUIMIENTO_ENTRADA
//		 
//                    JOIN   DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA ON 
//                    TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA=TBSEGUIMIENTO_ENTRADA.ID_DOCUMENTO_ENTRADA
//                    
//                    JOIN CLAUSULAS TBCLAUSULAS ON TBCLAUSULAS.ID_CLAUSULA=TBDOCUMENTO_ENTRADA.ID_CLAUSULA
//		 
//                    JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
//                    TBENTIDAD_REGULADORA.ID_ENTIDAD=TBDOCUMENTO_ENTRADA.ID_ENTIDAD
//
//                    JOIN EMPLEADOS TBEMPLEADOS ON TBEMPLEADOS.ID_EMPLEADO=TBCLAUSULAS.ID_EMPLEADO
//                    
//                    JOIN EMPLEADOS TBEMPLEADOSPLAN ON TBEMPLEADOSPLAN.ID_EMPLEADO=TBSEGUIMIENTO_ENTRADA.ID_EMPLEADO";

            
            $query="SELECT tbseguimiento_entrada.id_seguimiento_entrada, tbdocumento_entrada.id_documento_entrada, 
		 tbdocumento_entrada.folio_entrada, tbentidad_reguladora.clave_entidad, tbdocumento_entrada.asunto,
       
		 tbempleados.id_empleado id_empleadotema, tbempleados.nombre_empleado nombre_empleadotema, 
		 tbempleados.apellido_paterno apellido_paternotema, tbempleados.apellido_materno apellido_maternotema,
		 
		 tbseguimiento_entrada.id_empleado id_empleadoplan, tbempleadosplan.nombre_empleado nombre_empleadoplan,
		 tbempleadosplan.apellido_paterno apellido_paternoplan, tbempleadosplan.apellido_materno apellido_maternoplan,
 		 
		 tbdocumento_entrada.fecha_limite_atencion, tbdocumento_entrada.fecha_alarma, tbdocumento_entrada.status_doc,
                 tbdocumento_entrada.documento, tbdocumento_entrada.observaciones FROM seguimiento_entrada tbseguimiento_entrada
		 
                    JOIN   documento_entrada tbdocumento_entrada ON 
                    tbdocumento_entrada.id_documento_entrada=tbseguimiento_entrada.id_documento_entrada
                    
                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbdocumento_entrada.id_clausula
		 
                    JOIN entidad_reguladora tbentidad_reguladora ON
                    tbentidad_reguladora.id_entidad=tbdocumento_entrada.id_entidad

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbclausulas.id_empleado
                    
                    JOIN empleados tbempleadosplan ON tbempleadosplan.id_empleado=tbseguimiento_entrada.id_empleado";
            

            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
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
