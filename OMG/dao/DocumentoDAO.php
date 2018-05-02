
<?php

require_once '../ds/AccesoDB.php';
class DocumentoDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarDocumentos(){
        try{
            $query="SELECT TBDOCUMENTOS.ID_DOCUMENTO, TBDOCUMENTOS.CLAVE_DOCUMENTO, TBDOCUMENTOS.DOCUMENTO,
                    TBEMPLEADOS.ID_EMPLEADO, TBEMPLEADOS.NOMBRE_EMPLEADO, TBEMPLEADOS.APELLIDO_PATERNO,
                    TBEMPLEADOS.APELLIDO_MATERNO FROM DOCUMENTOS TBDOCUMENTOS

                    JOIN EMPLEADOS TBEMPLEADOS ON TBEMPLEADOS.ID_EMPLEADO=TBDOCUMENTOS.ID_EMPLEADO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
        
            return $lista;
    
            
    }  catch (Exception $e){
        //throw $rec;
        throw $e;
    }
    }

    public function mostrarDocumentosComboBox(){
        try{
            $query="SELECT ID_DOCUMENTO, CLAVE_DOCUMENTO, DOCUMENTO FROM DOCUMENTOS";
//            $query="SELECT ID_EMPLEADO  FROM EMPLEADOS";
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
    
    

    public function insertarDocumentos($clave_documento,$documento,$id_empleado){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(ID_DOCUMENTO)+1 as ID_DOCUMENTO from DOCUMENTOS";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_DOCUMENTO"];
            }
            
            $query="INSERT INTO DOCUMENTOS(ID_DOCUMENTO,CLAVE_DOCUMENTO,DOCUMENTO,ID_EMPLEADO)"
                    . "VALUES($id_nuevo,'$clave_documento','$documento',$id_empleado)";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    
    
    public function actualizarDocumentoPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO){
         
        try{
            $query="UPDATE DOCUMENTOS SET ".$COLUMNA."='".$VALOR."'  WHERE ID_DOCUMENTO=$ID_DOCUMENTO";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    
    public function eliminarDocumento($id_documento){
        try{
            $query="DELETE FROM DOCUMENTOS WHERE ID_DOCUMENTO=$id_documento";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }


}
?>
