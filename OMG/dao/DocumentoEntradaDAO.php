<?php
require_once '../ds/AccesoDB.php';
class DocumentoEntradaDAO{

    public function getFechaAlarma()
    {
        try
        {
//            $query = "select tbdocumento_entrada.FOLIO_ENTRADA,tbcumplimientos.CLAVE_CUMPLIMIENTO,
//            tbdocumento_entrada.FECHA_LIMITE_ATENCION,tbdocumento_entrada.FECHA_ALARMA, tbdocumento_entrada.MENSAJE_ALERTA
//            from documento_entrada tbdocumento_entrada join cumplimientos tbcumplimientos on 
//            tbcumplimientos.ID_CUMPLIMIENTO = tbdocumento_entrada.ID_CUMPLIMIENTO where tbdocumento_entrada.STATUS_DOC = 1";
            
            $query = "SELECT tbdocumento_entrada.folio_entrada,tbcumplimientos.clave_cumplimiento,
            tbdocumento_entrada.fecha_limite_atencion,tbdocumento_entrada.fecha_alarma, tbdocumento_entrada.mensaje_alerta
            FROM documento_entrada tbdocumento_entrada
            
            JOIN cumplimientos tbcumplimientos ON tbcumplimientos.id_cumplimiento = tbdocumento_entrada.id_cumplimiento where tbdocumento_entrada.status_doc = 1";

            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    
    public function mostrarDocumentosEntrada(){
        try{
//            $query="SELECT TBCUMPLIMIENTOS.ID_CUMPLIMIENTO, TBCUMPLIMIENTOS.CLAVE_CUMPLIMIENTO, 
//                TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA, TBDOCUMENTO_ENTRADA.FOLIO_REFERENCIA,
//                TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA, TBDOCUMENTO_ENTRADA.FECHA_RECEPCION,
//                TBDOCUMENTO_ENTRADA.ASUNTO, TBDOCUMENTO_ENTRADA.REMITENTE,
//                TBENTIDAD_REGULADORA.ID_ENTIDAD, TBENTIDAD_REGULADORA.CLAVE_ENTIDAD,
//                TBCLAUSULAS.ID_CLAUSULA, TBCLAUSULAS.CLAUSULA, TBEMPLEADOS.NOMBRE_EMPLEADO,
//                TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO,
//                TBDOCUMENTO_ENTRADA.CLASIFICACION, TBDOCUMENTO_ENTRADA.STATUS_DOC,
//                TBDOCUMENTO_ENTRADA.FECHA_ASIGNACION, TBDOCUMENTO_ENTRADA.FECHA_LIMITE_ATENCION,
//                TBDOCUMENTO_ENTRADA.FECHA_ALARMA, TBDOCUMENTO_ENTRADA.DOCUMENTO,
//                TBDOCUMENTO_ENTRADA.OBSERVACIONES FROM DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA 
//
//                JOIN CUMPLIMIENTOS TBCUMPLIMIENTOS ON
//                TBDOCUMENTO_ENTRADA.ID_CUMPLIMIENTO=TBCUMPLIMIENTOS.ID_CUMPLIMIENTO 
//                    
//                JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
//                TBDOCUMENTO_ENTRADA.ID_ENTIDAD=TBENTIDAD_REGULADORA.ID_ENTIDAD 
//                    
//                JOIN CLAUSULAS TBCLAUSULAS ON
//                TBDOCUMENTO_ENTRADA.ID_CLAUSULA=TBCLAUSULAS.ID_CLAUSULA
//
//                JOIN EMPLEADOS TBEMPLEADOS ON TBCLAUSULAS.ID_EMPLEADO=TBEMPLEADOS.ID_EMPLEADO";
            
            $query="SELECT tbcumplimientos.id_cumplimiento, tbcumplimientos.clave_cumplimiento, 
                tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_referencia,
                tbdocumento_entrada.folio_entrada, tbdocumento_entrada.fecha_recepcion,
                tbdocumento_entrada.asunto, tbdocumento_entrada.remitente,
                tbentidad_reguladora.id_entidad, tbentidad_reguladora.clave_entidad,
                tbclausulas.id_clausula, tbclausulas.clausula, tbempleados.nombre_empleado,
                tbempleados.apellido_paterno, tbempleados.apellido_materno,
                tbdocumento_entrada.clasificacion, tbdocumento_entrada.status_doc,
                tbdocumento_entrada.fecha_asignacion, tbdocumento_entrada.fecha_limite_atencion,
                tbdocumento_entrada.fecha_alarma, tbdocumento_entrada.documento,
                tbdocumento_entrada.observaciones FROM documento_entrada tbdocumento_entrada 

                JOIN cumplimientos tbcumplimientos ON
                tbdocumento_entrada.id_cumplimiento=tbcumplimientos.id_cumplimiento 
                    
                JOIN entidad_reguladora tbentidad_reguladora ON
                tbdocumento_entrada.id_entidad=tbentidad_reguladora.id_entidad 
                    
                JOIN clausulas tbclausulas ON
                tbdocumento_entrada.id_clausula=tbclausulas.id_clausula

                JOIN empleados tbempleados ON tbclausulas.id_empleado=tbempleados.id_empleado";


            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    
    public function mostrarDocumentosEntradaComboBox(){
        try{
//            $query="SELECT TBCUMPLIMIENTOS.ID_CUMPLIMIENTO, TBCUMPLIMIENTOS.CLAVE_CUMPLIMIENTO, 
//                TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA, TBDOCUMENTO_ENTRADA.FOLIO_REFERENCIA,
//                TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA, TBDOCUMENTO_ENTRADA.FECHA_RECEPCION,
//                TBDOCUMENTO_ENTRADA.ASUNTO, TBDOCUMENTO_ENTRADA.REMITENTE,
//                TBENTIDAD_REGULADORA.ID_ENTIDAD, TBENTIDAD_REGULADORA.CLAVE_ENTIDAD,
//                TBCLAUSULAS.ID_CLAUSULA, TBCLAUSULAS.CLAUSULA, TBEMPLEADOS.NOMBRE_EMPLEADO,
//                TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO,
//                TBDOCUMENTO_ENTRADA.CLASIFICACION, TBDOCUMENTO_ENTRADA.STATUS_DOC,
//                TBDOCUMENTO_ENTRADA.FECHA_ASIGNACION, TBDOCUMENTO_ENTRADA.FECHA_LIMITE_ATENCION,
//                TBDOCUMENTO_ENTRADA.FECHA_ALARMA, TBDOCUMENTO_ENTRADA.DOCUMENTO,
//                TBDOCUMENTO_ENTRADA.OBSERVACIONES FROM DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA 
//                JOIN CUMPLIMIENTOS TBCUMPLIMIENTOS ON
//                TBDOCUMENTO_ENTRADA.ID_CUMPLIMIENTO=TBCUMPLIMIENTOS.ID_CUMPLIMIENTO 
//                    
//                JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
//                TBDOCUMENTO_ENTRADA.ID_ENTIDAD=TBENTIDAD_REGULADORA.ID_ENTIDAD 
//                    
//                JOIN CLAUSULAS TBCLAUSULAS ON
//                TBDOCUMENTO_ENTRADA.ID_CLAUSULA=TBCLAUSULAS.ID_CLAUSULA
//
//                JOIN EMPLEADOS TBEMPLEADOS ON TBCLAUSULAS.ID_EMPLEADO=TBEMPLEADOS.ID_EMPLEADO";
            
            
            $query="SELECT tbcumplimientos.id_cumplimiento, tbcumplimientos.clave_cumplimiento, 
                tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_referencia,
                tbdocumento_entrada.folio_entrada, tbdocumento_entrada.fecha_recepcion,
                tbdocumento_entrada.asunto, tbdocumento_entrada.remitente,
                tbentidad_reguladora.id_entidad, tbentidad_reguladora.clave_entidad,
                tbclausulas.id_clausula, tbclausulas.clausula, tbempleados.nombre_empleado,
                tbempleados.apellido_paterno, tbempleados.apellido_materno,
                tbdocumento_entrada.clasificacion, tbdocumento_entrada.status_doc,
                tbdocumento_entrada.fecha_asignacion, tbdocumento_entrada.fecha_limite_atencion,
                tbdocumento_entrada.fecha_alarma, tbdocumento_entrada.documento,
                tbdocumento_entrada.observaciones FROM documento_entrada tbdocumento_entrada 
                
                JOIN cumplimientos tbcumplimientos ON
                tbdocumento_entrada.id_cumplimiento=tbcumplimientos.id_cumplimiento 
                    
                JOIN entidad_reguladora tbentidad_reguladora ON
                tbdocumento_entrada.id_entidad=tbentidad_reguladora.id_entidad 
                    
                JOIN clausulas tbclausulas ON
                tbdocumento_entrada.id_clausula=tbclausulas.id_clausula

                JOIN empleados tbempleados ON tbclausulas.id_empleado=tbempleados.id_empleado
";
            
            
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
    
    public function traer_ultimo_insertado(){
         $query_obtenerMaximo_mas_uno="SELECT max(id_documento_entrada) as id_documento_entrada FROM documento_entrada";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_documento_entrada"];
            }
            
            
            if($id_nuevo==null){
                $id_nuevo=0;
            } 
            return $id_nuevo; 
    }
    
    
    
    public function insertarDocumentosEntrada($id_cumplimiento,$folio_referencia,$folio_entrada,$fecha_recepcion,$asunto,$remitente,$id_entidad,
                                             $id_clausula,$clasificacion,$status_doc,$fecha_asignacion,$fecha_limite_atencion,$fecha_alarma,
                                             $documento,$observaciones,$mensaje_alerta){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(id_documento_entrada)+1 as id_documento_entrada from documento_entrada";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_documento_entrada"];
            }
            
            if($id_nuevo==NULL){
                $id_nuevo=0;
            }
            
//            $query="INSERT INTO DOCUMENTO_ENTRADA (ID_DOCUMENTO_ENTRADA,ID_CUMPLIMIENTO,FOLIO_REFERENCIA,FOLIO_ENTRADA,FECHA_RECEPCION,ASUNTO,REMITENTE,
//					           ID_ENTIDAD,ID_CLAUSULA,CLASIFICACION,STATUS_DOC,FECHA_ASIGNACION,FECHA_LIMITE_ATENCION,FECHA_ALARMA,
//					           DOCUMENTO,OBSERVACIONES,MENSAJE_ALERTA)
                                                   

            $query="INSERT INTO documento_entrada (id_documento_entrada,id_cumplimiento,folio_referencia,folio_entrada,fecha_recepcion,asunto,remitente,
					           id_entidad,id_clausula,clasificacion,status_doc,fecha_asignacion,fecha_limite_atencion,fecha_alarma,
					           documento,observaciones,mensaje_alerta)

                    
                                    VALUES($id_nuevo,$id_cumplimiento,'$folio_referencia','$folio_entrada','$fecha_recepcion','$asunto','$remitente',$id_entidad,
                                           $id_clausula,'$clasificacion','$status_doc','$fecha_asignacion','$fecha_limite_atencion',
                                          '$fecha_alarma','$documento','$observaciones','$mensaje_alerta');";
            
            $db=  AccesoDB::getInstancia();
//            try{
           $exito_inserccion= $db->executeQueryUpdate($query); 
//            } catch (Exception $ex) {
//
//            }
           
           
        } catch (Exception $ex) {
                throw $ex;
        }
        return $exito_inserccion;
    }
    
    /*
    public function actualizarClausula($id_clausula,$clausula,$sub_clausula,$descripcion_clausula,$descripcion_sub_clausula,$texto_breve,$descripcion,$plazo){
        try{
             $query="UPDATE CLAUSULAS SET CLAUSULA='$clausula', SUB_CLAUSULA='$sub_clausula', DESCRIPCION_CLAUSULA='$descripcion_clausula', DESCRIPCION_SUB_CLAUSULA='$descripcion_sub_clausula', TEXTO_BREVE='$texto_breve', DESCRIPCION='$descripcion',PLAZO='$plazo' WHERE ID_CLAUSULA=$id_clausula";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }*/
    
    
    public function actualizarDocumentoEntradaPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO_ENTRADA){
         
        try{
            $query="UPDATE documento_entrada SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_documento_entrada=$ID_DOCUMENTO_ENTRADA";
            
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
            $query="DELETE FROM documento_entrada WHERE id_documento_entrada=$id_clausula";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    public function getIdCumplimiento($ID_DOCUMENTO_ENTRADA)
    {
        try
        {
            $query = "SELECT documento_entrada.ID_CUMPLIMIENTO FROM documento_entrada WHERE id_documento_entrada = $ID_DOCUMENTO_ENTRADA";
            $db= AccesoDB::getInstancia();
            $dato = $db->executeQuery($query);
            return $dato;
        } catch(Except $ex)
        {
            throw $ex;
        }
    }
}

?>
