<?php

require_once '../ds/AccesoDB.php';
class OperacionesDao
{
    public function mostrarOperaciones()
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
            tbempleados.NOMBRE_EMPLEADO,tbdocumentos.REGISTROS FROM documentos tbdocumentos 
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
}
