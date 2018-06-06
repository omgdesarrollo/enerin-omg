<?php
require_once '../ds/AccesoDB.php';
class DocumentoSalidaDAO{

    public function mostrarDocumentosSalida(){
        try{
            
            
            $query="SELECT tbdocumento_salida.id_documento_salida,tbdocumento_entrada.id_documento_entrada,
                    tbdocumento_entrada.folio_entrada,tbdocumento_salida.folio_salida,
                    tbdocumento_salida.fecha_envio, tbdocumento_salida.asunto,
                    tbentidad_reguladora.clave_entidad,tbdocumento_salida.destinatario,
                    tbempleados.nombre_empleado,tbempleados.apellido_paterno, 
                    tbempleados.apellido_materno, tbdocumento_salida.documento,
                    tbdocumento_salida.observaciones FROM documento_salida tbdocumento_salida

                    JOIN documento_entrada tbdocumento_entrada ON
                    tbdocumento_entrada.id_documento_entrada=tbdocumento_salida.id_documento_entrada

                    JOIN entidad_reguladora tbentidad_reguladora ON
                    tbentidad_reguladora.id_entidad=tbdocumento_entrada.id_entidad

                    JOIN clausulas tbclausulas ON
                    tbclausulas.id_clausula=tbdocumento_entrada.id_clausula

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbclausulas.id_empleado";


            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
  
    
 
    
    public function insertarDocumentosSalida($id_documento_entrada,$folio_salida,$fecha_envio,$asunto,$destinatario,$observaciones){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(id_documento_salida)+1 as id_documento_salida FROM documento_salida";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_documento_salida"];
            }
            
            if ($id_nuevo==NULL) {
                $id_nuevo=0;
            }
                        
            
             $query="insert into documento_salida (id_documento_salida,id_documento_entrada,folio_salida,fecha_envio,asunto,destinatario,observaciones)
                                                  
                                                    
                                          VALUES ($id_nuevo,$id_documento_entrada,'$folio_salida','$fecha_envio','$asunto','$destinatario','$observaciones');";
            
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
            $query="UPDATE documento_salida SET ".$COLUMNA."='".$VALOR."'  WHERE id_documento_salida=$ID_DOCUMENTO_SALIDA";

     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);

        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    
    public function eliminarClausula($id_clausula){
        try{
            $query="DELETE FROM documento_salida WHERE id_documento_salida=$id_clausula";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
