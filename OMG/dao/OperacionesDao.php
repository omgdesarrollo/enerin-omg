<?php

require_once '../ds/AccesoDB.php';
class OperacionesDao
{
    public function listarOperaciones()
    {
        try
        {
            $query = "SELECT tbevidencias.id_evidencias, tbdocumentos.id_documento, tbdocumentos.clave_documento, tbdocumentos.documento,
                    tbdocumentos.registros,

                    tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno,

                    tbevidencias.clasificacion, tbevidencias.desviacion, tbevidencias.accion_correctiva, tbevidencias.validacion_supervisor,
                    tbevidencias.plan_accion, tbevidencias.INGRESAR_OFICIO_ATENCION, tbevidencias.oficio_atencion

                    FROM evidencias tbevidencias

                    JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbevidencias.id_documento

                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    public function getClavesDocumentos($cadena)
    {
        try
        {
            $query = "SELECT tbdocumentos.ID_DOCUMENTO, tbdocumentos.CLAVE_DOCUMENTO,tbdocumentos.DOCUMENTO,
            tbempleados.NOMBRE_EMPLEADO,tbempleados.APELLIDO_PATERNO,tbempleados.APELLIDO_MATERNO,tbdocumentos.REGISTROS FROM documentos tbdocumentos 
            JOIN empleados tbempleados ON tbempleados.ID_EMPLEADO = tbdocumentos.ID_EMPLEADO
            WHERE tbdocumentos.DOCUMENTO LIKE '%$cadena%'";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    public function crearEvidencia($claveDocumento)
    {
        try
        {
            $query = "INSERT INTO evidencias (id_documento,clasificacion,desviacion,accion_correctiva,validacion_supervisor,plan_accion,
								ingresar_oficio_atencion,oficio_atencion)
                     VALUES ('$claveDocumento','','','','false','','false','false')";
            
            $db = AccesoDB::getInstancia();
            $res = $db->executeQueryUpdate($query);
            return $res;
        }catch(Exection $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function actualizarEvidenciaPorColumna($COLUMNA,$VALOR,$ID_EVIDENCIAS){
         
        try{
            $query="UPDATE evidencias SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE id_evidencias=$ID_EVIDENCIAS";
            

     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);

            return $result;
        } catch (Exception $ex) {
           throw $ex;
           return false;
        }
    }
    
    
    
}
