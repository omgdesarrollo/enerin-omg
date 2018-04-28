<?php
require_once '../ds/AccesoDB.php';
class DocumentoSalidaDAO{

    public function mostrarDocumentosSalida(){
        try{
            $query="SELECT TBDOCUMENTO_SALIDA.ID_DOCUMENTO_SALIDA,TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA,
                    TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA,TBDOCUMENTO_SALIDA.FOLIO_SALIDA,
                    TBDOCUMENTO_SALIDA.FECHA_ENVIO, TBDOCUMENTO_SALIDA.ASUNTO,
                    TBENTIDAD_REGULADORA.CLAVE_ENTIDAD,TBDOCUMENTO_SALIDA.DESTINATARIO,
                    TBEMPLEADOS.NOMBRE_EMPLEADO,TBEMPLEADOS.APELLIDO_PATERNO, 
                    TBEMPLEADOS.APELLIDO_MATERNO, TBDOCUMENTO_SALIDA.DOCUMENTO,
                    TBDOCUMENTO_SALIDA.OBSERVACIONES FROM DOCUMENTO_SALIDA TBDOCUMENTO_SALIDA

                    JOIN DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA ON
                    TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA=TBDOCUMENTO_SALIDA.ID_DOCUMENTO_ENTRADA

                    JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
                    TBENTIDAD_REGULADORA.ID_ENTIDAD=TBDOCUMENTO_ENTRADA.ID_ENTIDAD

                    JOIN CLAUSULAS TBCLAUSULAS ON
                    TBCLAUSULAS.ID_CLAUSULA=TBDOCUMENTO_ENTRADA.ID_CLAUSULA

                    JOIN EMPLEADOS TBEMPLEADOS ON TBEMPLEADOS.ID_EMPLEADO=TBCLAUSULAS.ID_EMPLEADO";


            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
 
    
    public function insertarDocumentosSalida($id_documento_entrada,$folio_salida,$fecha_envio,$asunto,$destinatario,$documento,$observaciones){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(ID_DOCUMENTO_SALIDA)+1 as ID_DOCUMENTO_SALIDA from DOCUMENTO_SALIDA";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_DOCUMENTO_SALIDA"];
            }
            
            if ($id_nuevo==NULL) {
                $id_nuevo=0;
            }
            
            
            $query="INSERT INTO DOCUMENTO_SALIDA (ID_DOCUMENTO_SALIDA,ID_DOCUMENTO_ENTRADA,FOLIO_SALIDA,FECHA_ENVIO,ASUNTO,DESTINATARIO,
						  DOCUMENTO,OBSERVACIONES)
										
                                          VALUES ($id_nuevo,$id_documento_entrada,'$folio_salida','$fecha_envio','$asunto','$destinatario',
                                                  '$documento','$observaciones');";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    
    
    
    
    public function actualizarClausula($id_clausula,$clausula,$sub_clausula,$descripcion_clausula,$descripcion_sub_clausula,$texto_breve,$descripcion,$plazo){
        try{
             $query="UPDATE CLAUSULAS SET CLAUSULA='$clausula', SUB_CLAUSULA='$sub_clausula', DESCRIPCION_CLAUSULA='$descripcion_clausula', DESCRIPCION_SUB_CLAUSULA='$descripcion_sub_clausula', TEXTO_BREVE='$texto_breve', DESCRIPCION='$descripcion',PLAZO='$plazo' WHERE ID_CLAUSULA=$id_clausula";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    
    public function actualizarDocumentoSalidaPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO_SALIDA){
         
        try{
            $query="UPDATE DOCUMENTO_SALIDA SET ".$COLUMNA."='".$VALOR."'  WHERE ID_DOCUMENTO_SALIDA=$ID_DOCUMENTO_SALIDA";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    
    public function eliminarClausula($id_clausula){
        try{
            $query="DELETE FROM CLAUSULAS WHERE ID_CLAUSULA=$id_clausula";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
