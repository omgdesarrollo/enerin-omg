<?php
require_once '../ds/AccesoDB.php';
class InformeValidacionDocumentosDAO{
    public function listarValidaciones($v)
    {
        try
        {
            $query="SELECT tbvalidacion_documento.id_validacion_documento, tbdocumentos.id_documento, tbdocumentos.clave_documento,
 		 tbdocumentos.documento,tbdocumentos.contrato,
		 tbempleados.id_empleado,concat(tbempleados.nombre_empleado,' ',tbempleados.apellido_paterno,' ',tbempleados.apellido_materno) nombrecompleto,  
		 tbvalidacion_documento.validacion_tema_responsable
                 FROM validacion_documento tbvalidacion_documento
                 JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbvalidacion_documento.id_documento
                 JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado 
                 WHERE tbdocumentos.contrato= ".$v["param"]["contrato"];
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);   
            return $lista;    
        } catch (Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }
    public function obtenerTemayResponsable ($id_documento)
    {
        try{
            $query="SELECT tbtemas.nombre as nombre_tema,tbasignacion_tema_requisito.id_tema, tbtemas.no, tbempleados.id_empleado, tbempleados.nombre_empleado, 
		    tbempleados.apellido_paterno, tbempleados.apellido_materno

                    FROM validacion_documento tbvalidacion_documento

                    JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbvalidacion_documento.id_documento
                    JOIN registros tbregistros ON tbregistros.id_documento=tbdocumentos.id_documento
                    JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_registro=tbregistros.id_registro
                    JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito=tbrequisitos_registros.id_requisito
                    JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos ON
                    tbasignacion_tema_requisito_requisitos.id_requisito=tbrequisitos.id_requisito
                    JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON 
                    tbasignacion_tema_requisito.id_asignacion_tema_requisito=tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito
                    JOIN temas tbtemas ON tbtemas.id_tema=tbasignacion_tema_requisito.id_tema
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                    WHERE tbdocumentos.id_documento=$id_documento GROUP BY tbtemas.no";    
            $db= AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);          
            return $lista;            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }   
    public function obtenerRequisitosporDocumento($id_documento)
    {
        try
        {     
            $query="SELECT tbrequisitos.id_requisito, tbrequisitos.requisito
                    FROM documentos tbdocumentos

                    JOIN registros tbregistros ON tbregistros.id_documento=tbdocumentos.id_documento
                    JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_registro=tbregistros.id_registro
                    JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito=tbrequisitos_registros.id_requisito
                    WHERE tbdocumentos.id_documento=$id_documento GROUP BY tbrequisitos.requisito";      
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);        
            return $lista;
        }  catch (Exception $ex){
            throw $ex;
            return false;
        }
    } 
    public function obtenerRegistrosPorDocumento($id_documento)
    {
        try
        { 
            $query="SELECT tbregistros.id_registro, tbregistros.registro
                    FROM documentos tbdocumentos
                    JOIN registros tbregistros ON tbregistros.id_documento=tbdocumentos.id_documento
                    WHERE tbdocumentos.id_documento=$id_documento GROUP BY tbregistros.registro";       
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        }  catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
    
    public function obtenerContratos($ID_CUMPLIMIENTO)
    {
        try
        {
            $query="SELECT tbcumplimientos.id_cumplimiento,tbcumplimientos.clave_cumplimiento,tbcumplimientos.cumplimiento
                    FROM cumplimientos tbcumplimientos
                    WHERE tbcumplimientos.id_cumplimiento=$ID_CUMPLIMIENTO";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista[0];
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    /*no borrar preguntar antes de hacerlo si se requiere modificar de aqui para abajo */ 
    
     public function obtenerTodosLosEmpleadosQueSonResponsableDelDocumento(){
         try{
             $query="SELECT tbempleados.id_empleado, concat(tbempleados.nombre_empleado,' ',tbempleados.apellido_paterno,' ',tbempleados.apellido_materno) nombrecompleto
                     FROM validacion_documento tbvalidacion_documento
                     JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbvalidacion_documento.id_documento
                     JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado 
                     WHERE tbdocumentos.contrato=1 GROUP BY nombrecompleto";
             $db=  AccesoDB::getInstancia();
             $lista=$db->executeQuery($query);
                return $lista;
         } catch (Exception $ex) {

         }
     }
      
     
    
    
    
}

?>

