<?php
require_once '../ds/AccesoDB.php';
class ValidacionDocumentoDAO{

    public function mostrarValidacionDocumentos(){
        try{
            
            $query="SELECT tbvalidacion_documento.id_validacion_documento, tbdocumentos.id_documento, tbdocumentos.clave_documento,
                    tbdocumentos.documento, tbasignacion_tema_requisito.requisito, tbdocumentos.registros,
		 
                    tbempleados.id_empleado id_empleado_documento, tbempleados.nombre_empleado nombre_empleado_documento,
                    tbempleados.apellido_paterno apellido_paterno_documento, tbempleados.apellido_materno apellido_materno_documento,

                    tbclausulas.clausula, tbclausulas.descripcion_clausula,

                    tbclausulas.id_empleado id_empleado_tema, tbempleados_tema.nombre_empleado nombre_empleado_tema,
                    tbempleados_tema.apellido_paterno apellido_paterno_tema, tbempleados_tema.apellido_materno apellido_materno_tema,

                    tbvalidacion_documento.documento_archivo, 
                    tbvalidacion_documento.validacion_documento_responsable, tbvalidacion_documento.observacion_documento,
                    tbvalidacion_documento.validacion_tema_responsable, tbvalidacion_documento.observacion_tema,
                    tbvalidacion_documento.plan_accion, tbvalidacion_documento.desviacion_mayor

                    FROM validacion_documento tbvalidacion_documento


                    JOIN documentos tbdocumentos ON 
                    tbdocumentos.id_documento=tbvalidacion_documento.id_documento

                    JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON
                    tbasignacion_tema_requisito.id_documento=tbdocumentos.id_documento

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado

                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbasignacion_tema_requisito.id_clausula


                    JOIN empleados tbempleados_tema ON tbempleados_tema.id_empleado=tbclausulas.id_empleado";
            

            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
 public function obtenerInfoPorIdValidacionDocumento($id_validacion_documento){
     try{
         $query="SELECT tbvalidacion_documento.id_validacion_documento, tbdocumentos.id_documento, tbdocumentos.clave_documento,
                    tbdocumentos.documento,
		 
                    tbempleados.id_empleado id_empleado_documento, tbempleados.nombre_empleado nombre_empleado_documento,
                    tbempleados.apellido_paterno apellido_paterno_documento, tbempleados.apellido_materno apellido_materno_documento,

                    tbclausulas.clausula, tbclausulas.descripcion_clausula,

                    tbclausulas.id_empleado id_empleado_tema, tbempleados_tema.nombre_empleado nombre_empleado_tema,
                    tbempleados_tema.apellido_paterno apellido_paterno_tema, tbempleados_tema.apellido_materno apellido_materno_tema,

                    tbvalidacion_documento.documento_archivo, 
                    tbvalidacion_documento.validacion_documento_responsable, tbvalidacion_documento.observacion_documento,
                    tbvalidacion_documento.validacion_tema_responsable, tbvalidacion_documento.observacion_tema,
                    tbvalidacion_documento.plan_accion, tbvalidacion_documento.desviacion_mayor

                    FROM validacion_documento tbvalidacion_documento


                    JOIN documentos tbdocumentos ON 
                    tbdocumentos.id_documento=tbvalidacion_documento.id_documento

                    JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON
                    tbasignacion_tema_requisito.id_documento=tbdocumentos.id_documento

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado

                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbasignacion_tema_requisito.id_clausula


                    JOIN empleados tbempleados_tema ON tbempleados_tema.id_empleado=tbclausulas.id_empleado 
                    WHERE tbvalidacion_documento.ID_VALIDACION_DOCUMENTO=$id_validacion_documento";
         
         
         
         
         
     } catch (Exception $ex) {
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
    
    
    
    public function actualizarValidacionDocumentoPorColumna($COLUMNA,$VALOR,$ID_VALIDACION_DOCUMENTO){
         
        try{
            $query="UPDATE validacion_documento SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_validacion_documento=$ID_VALIDACION_DOCUMENTO";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
            return $result;
        } catch (Exception $ex) {
           throw $ex;
           return false;
        }
    }
    
    
    
    
    
    public function eliminarValidacionDocumento($id_validacion_documento){
        try{
            $query="DELETE FROM validacion_documento WHERE id_validacion_documento=$id_validacion_documento";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
