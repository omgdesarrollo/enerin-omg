<?php
require_once '../ds/AccesoDB.php';
class InformeGerencialDAO{

    public function mostrarInformeGerencial(){
        try{
//            $query="SELECT TBINFORME_GERENCIAL.ID_INFORME_GERENCIAL, TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA, TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA,
//                    TBENTIDAD_REGULADORA.CLAVE_ENTIDAD, TBDOCUMENTO_ENTRADA.ASUNTO, TBEMPLEADOS.NOMBRE_EMPLEADO, TBEMPLEADOS.ID_EMPLEADO,
//                    TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO, TBDOCUMENTO_ENTRADA.FECHA_LIMITE_ATENCION, TBDOCUMENTO_ENTRADA.STATUS_DOC,
//                    TBDOCUMENTO_ENTRADA.DOCUMENTO
//                    
//                    FROM INFORME_GERENCIAL TBINFORME_GERENCIAL
//		 
//                    JOIN   DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA ON 
//                    TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA=TBINFORME_GERENCIAL.ID_DOCUMENTO_ENTRADA
//
//                    JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
//                    TBENTIDAD_REGULADORA.ID_ENTIDAD=TBDOCUMENTO_ENTRADA.ID_ENTIDAD
//
//                    JOIN CLAUSULAS TBCLAUSULAS ON TBCLAUSULAS.ID_CLAUSULA=TBDOCUMENTO_ENTRADA.ID_CLAUSULA
//
//                    JOIN EMPLEADOS TBEMPLEADOS ON TBEMPLEADOS.ID_EMPLEADO=TBCLAUSULAS.ID_EMPLEADO";
            
            
            $query="SELECT tbinforme_gerencial.id_informe_gerencial, tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_entrada,
                    tbentidad_reguladora.clave_entidad, tbdocumento_entrada.asunto, tbempleados.nombre_empleado, tbempleados.id_empleado,
                    tbempleados.apellido_paterno, tbempleados.apellido_materno, tbdocumento_entrada.fecha_limite_atencion, tbdocumento_entrada.status_doc,
                    tbdocumento_entrada.documento FROM informe_gerencial tbinforme_gerencial
		 
                    JOIN   documento_entrada tbdocumento_entrada ON 
                    tbdocumento_entrada.id_documento_entrada=tbinforme_gerencial.id_documento_entrada

                    JOIN entidad_reguladora tbentidad_reguladora ON
                    tbentidad_reguladora.id_entidad=tbdocumento_entrada.id_entidad

                    JOIN clausulas tbclausulas ON tbclausulas.id_clausula=tbdocumento_entrada.id_clausula

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbclausulas.id_empleado";
            
            
            


            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    
    
    public function actualizarInformeGerencialPorColumna($COLUMNA,$VALOR,$ID_INFORME_GERENCIAL){
         
        try{
            $query="UPDATE informe_gerencial SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_informe_gerencial=$ID_INFORME_GERENCIAL";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarInformeGerencial($ID_INFORME_GERENCIAL){
        try{
            $query="DELETE FROM informe_gerencial WHERE id_informe_gerencial=$ID_INFORME_GERENCIAL";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>


