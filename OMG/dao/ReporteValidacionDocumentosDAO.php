<?php
require_once '../ds/AccesoDB.php';


class ReporteValidacionDocumentosDAO{
    
    
    public function listarValidaciones($v)
    {
        try
        {
            $query="SELECT tbvalidacion_documento.id_validacion_documento, tbdocumentos.id_documento, tbdocumentos.clave_documento,
 		 tbdocumentos.documento,

		 tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno,  	

		 tbvalidacion_documento.validacion_tema_responsable

                FROM validacion_documento tbvalidacion_documento
                JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbvalidacion_documento.id_documento
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado 
                WHERE tbdocumentos.CONTRATO= ".$v["param"]["contrato"];
            
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }
    
    
    
}




?>

