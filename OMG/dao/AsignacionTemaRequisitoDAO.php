<?php

require_once '../ds/AccesoDB.php';

class AsignacionTemaRequisitoDAO {
    //put your code here
    public function mostrarAsignacionTemasRequisitos(){
        try{

            
            $query="SELECT tbasignacion_tema_requisito.id_asignacion_tema_requisito, 
                    tbclausulas.id_clausula, tbclausulas.clausula, tbclausulas.descripcion_clausula,
                    tbasignacion_tema_requisito.requisito, tbdocumentos.id_documento, tbdocumentos.clave_documento
                    FROM asignacion_tema_requisito tbasignacion_tema_requisito
		 
                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbasignacion_tema_requisito.id_clausula
                    
                    JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbasignacion_tema_requisito.id_documento";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    public function mostrarAsignacionTemasRequisitosComboBox(){
        try{

            
            
            $query="SELECT tbasignacion_tema_requisito.id_asignacion_tema_requisito, 
                    tbclausulas.id_clausula, tbclausulas.clausula, tbclausulas.descripcion_clausula,
                    tbasignacion_tema_requisito.requisito FROM asignacion_tema_requisito tbasignacion_tema_requisito
		 
                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbasignacion_tema_requisito.id_clausula";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            /*$rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
            }
            return $rec;*/

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    
    public function obtenerRequisitosporDocumento($id_documento){
        try{
            
            $query="SELECT tbasignacion_tema_requisito.id_asignacion_tema_requisito, tbasignacion_tema_requisito.requisito

                    FROM  asignacion_tema_requisito tbasignacion_tema_requisito WHERE tbasignacion_tema_requisito.id_documento=$id_documento";
         
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    public function obtenerTemayResponsable ($id_documento){
        try{
            $query="SELECT tbclausulas.clausula, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno

                    FROM  asignacion_tema_requisito tbasignacion_tema_requisito

                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbasignacion_tema_requisito.id_clausula

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbclausulas.id_empleado

                    WHERE tbasignacion_tema_requisito.id_documento=$id_documento";
            
            
            $db= AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
            
        } catch (Exception $ex){
            throw $ex;
        }
    }
    
    
    public function insertarAsignacionTemaRequisito($id_clausula,$requisito,$id_documento){
        
        try{
            
//            $query_obtenerMaximo_mas_uno="SELECT max(ID_ASIGNACION_TEMA_REQUISITO)+1 as ID_ASIGNACION_TEMA_REQUISITO from ASIGNACION_TEMA_REQUISITO";
            $query_obtenerMaximo_mas_uno="SELECT max(id_asignacion_tema_requisito)+1 as id_asignacion_tema_requisito FROM asignacion_tema_requisito";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_asignacion_tema_requisito"];
            }
             if($id_nuevo==NULL){
                $id_nuevo=0;
            }
            $query="INSERT INTO asignacion_tema_requisito(id_asignacion_tema_requisito,id_clausula,requisito,id_documento)"
                    . "VALUES($id_nuevo,$id_clausula,'$requisito',$id_documento)";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    

    
    public function actualizarAsignacionTemaRequisito($id_asignacion_tema_requisito, $id_clausula,$requisito){
        try{
             $query="UPDATE asignacion_tema_requisito SET id_clausula='$id_clausula', requisito='$requisito',"
                  . "WHERE id_asignacion_tema_requisito=$id_asignacion_tema_requisito";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    
    
    public function actualizarAsignacionTemaRequisitoPorColumna($COLUMNA,$VALOR,$ID_ASIGNACION_TEMA_REQUISITO){
         
        try{
            $query="UPDATE asignacion_tema_requisito SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_asignacion_tema_requisito=$ID_ASIGNACION_TEMA_REQUISITO";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarAsignacionTemaRequisito($id_asignacion_tema_requisito){
        try{
            $query="DELETE FROM asignacion_tema_requisito WHERE id_asignacion_tema_requisito=$id_asignacion_tema_requisito";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
}
