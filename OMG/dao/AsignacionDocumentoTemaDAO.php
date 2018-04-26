<?php

require_once '../ds/AccesoDB.php';

class AsignacionDocumentoTemaDAO {
    //put your code here
    public function mostrarAsignacionDocumentosTemas(){
        try{
            $query="SELECT TBASIGNACION_DOCUMENTO_TEMA.ID_ASIGNACION_DOCUMENTO_TEMA, TBDOCUMENTOS.ID_DOCUMENTO, 
                    TBDOCUMENTOS.CLAVE_DOCUMENTO, TBDOCUMENTOS.DOCUMENTO,
                    TBASIGNACION_TEMA_REQUISITO.ID_ASIGNACION_TEMA_REQUISITO, TBASIGNACION_TEMA_REQUISITO.ID_CLAUSULA,
                    TBCLAUSULAS.DESCRIPCION_CLAUSULA,
                    TBASIGNACION_TEMA_REQUISITO.REQUISITO FROM ASIGNACION_DOCUMENTO_TEMA TBASIGNACION_DOCUMENTO_TEMA

                    JOIN DOCUMENTOS TBDOCUMENTOS ON TBASIGNACION_DOCUMENTO_TEMA.ID_DOCUMENTO=TBDOCUMENTOS.ID_DOCUMENTO

                    JOIN ASIGNACION_TEMA_REQUISITO TBASIGNACION_TEMA_REQUISITO ON
                    TBASIGNACION_DOCUMENTO_TEMA.ID_ASIGNACION_TEMA_REQUISITO=TBASIGNACION_TEMA_REQUISITO.ID_ASIGNACION_TEMA_REQUISITO

                    JOIN CLAUSULAS TBCLAUSULAS ON TBCLAUSULAS.ID_CLAUSULA=TBASIGNACION_TEMA_REQUISITO.ID_CLAUSULA";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    public function insertarAsignacionDocumentoTema($id_documento,$id_asignacion_tema_requisito){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(ID_ASIGNACION_DOCUMENTO_TEMA)+1 as ID_ASIGNACION_DOCUMENTO_TEMA from ASIGNACION_DOCUMENTO_TEMA";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_ASIGNACION_DOCUMENTO_TEMA"];
            }
            
            
            $query="INSERT INTO ASIGNACION_DOCUMENTO_TEMA (ID_ASIGNACION_DOCUMENTO_TEMA,ID_DOCUMENTO,ID_ASIGNACION_TEMA_REQUISITO) VALUES ($id_nuevo,$id_documento,$id_asignacion_tema_requisito)";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    
    
    
    
    public function actualizarAsignacionDocumentoTemaPorColumna($COLUMNA,$VALOR,$ID_ASIGNACION_DOCUMENTO_TEMA){
         
        try{
            $query="UPDATE ASIGNACION_DOCUMENTO_TEMA SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE ID_ASIGNACION_DOCUMENTO_TEMA=$ID_ASIGNACION_DOCUMENTO_TEMA";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarAsignacionDocumentoTema($ID_ASIGNACION_DOCUMENTO_TEMA){
        try{
            $query="DELETE FROM ASIGNACION_DOCUMENTO_TEMA WHERE ID_ASIGNACION_DOCUMENTO_TEMA=$ID_ASIGNACION_DOCUMENTO_TEMA";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
}
