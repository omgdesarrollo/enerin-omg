<?php
require_once '../ds/AccesoDB.php';

class InformeEvidenciasDAO{
    
    public function listarEvidencias($v)
    {
        $query_concat="";
        if($v["param"]["v"]=="true"){
            
            $query_concat.="AND( tbevidencias.validacion_supervisor='true'";
            if($v["param"]["n_v"]=="true"){
                        $query_concat.="   or tbevidencias.validacion_supervisor='false')";
            }else{
                 $query_concat.=")";
            }
        }
        if($v["param"]["n_v"]=="true"){
            $query_concat.=" AND tbevidencias.validacion_supervisor='false'";            
        }
        
        try
        {
            $query="SELECT tbevidencias.id_evidencias,tbevidencias.desviacion,tbevidencias.accion_correctiva,tbevidencias.validacion_supervisor,
                    tbdocumentos.id_documento,tbdocumentos.clave_documento,
                    tbempleados.nombre_empleado,
		    tbregistros.frecuencia		 	
                    FROM evidencias tbevidencias
                    JOIN registros tbregistros ON tbregistros.id_registro=tbevidencias.id_registro  
                    JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbregistros.id_documento
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado
                    WHERE tbdocumentos.contrato=".$v["param"]["contrato"]." ".$query_concat;
            
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function obtenerTemayResponsable ($ID_DOCUMENTO,$CONTRATO)
    {
        try
        {
            $query="SELECT tbasignacion_tema_requisito.id_tema, tbtemas.no, tbempleados.id_empleado, tbempleados.nombre_empleado, 
                    tbempleados.apellido_paterno, tbempleados.apellido_materno
                    FROM evidencias tbevidencias
                    JOIN registros tbregistros ON tbregistros.id_registro=tbevidencias.id_registro
                    JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbregistros.id_documento
                    JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_registro=tbregistros.id_registro
                    JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito=tbrequisitos_registros.id_requisito
                    JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos 
                    ON tbasignacion_tema_requisito_requisitos.id_requisito=tbrequisitos.id_requisito
                    JOIN asignacion_tema_requisito tbasignacion_tema_requisito 
                    ON tbasignacion_tema_requisito.id_asignacion_tema_requisito=tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito
                    JOIN temas tbtemas ON tbtemas.id_tema=tbasignacion_tema_requisito.id_tema
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                    WHERE tbdocumentos.id_documento=$ID_DOCUMENTO AND tbdocumentos.contrato=$CONTRATO GROUP BY tbtemas.no";
//            echo json_encode($query);
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function obtenerRequisitosporDocumento($ID_DOCUMENTO,$CONTRATO)
    {
        try
        {
            $query="SELECT tbrequisitos.id_requisito, tbrequisitos.requisito
                    FROM documentos tbdocumentos
                    JOIN registros tbregistros ON tbregistros.id_documento=tbdocumentos.id_documento
                    JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_registro=tbregistros.id_registro
                    JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito=tbrequisitos_registros.id_requisito
                    WHERE tbdocumentos.id_documento=$ID_DOCUMENTO AND tbdocumentos.contrato=$CONTRATO GROUP BY tbrequisitos.requisito";
            
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function obtenerRegistrosporDocumento($ID_DOCUMENTO,$CONTRATO)
    {
        try
        {
            $query="SELECT tbregistros.id_registro, tbregistros.registro
                    FROM documentos tbdocumentos
                    JOIN registros tbregistros ON tbregistros.id_documento=tbdocumentos.id_documento
                    WHERE tbdocumentos.id_documento=$ID_DOCUMENTO AND tbdocumentos.contrato=$CONTRATO GROUP BY tbregistros.registro";
            
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}

?>


