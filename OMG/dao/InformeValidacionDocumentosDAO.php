<?php
require_once '../ds/AccesoDB.php';


class InformeValidacionDocumentosDAO{
    
    
    public function listarValidaciones($v)
    {
        $query_concat="";
        if($v["param"]["v"]=="true"){
//            echo "fue false";
//            $query_concat.="AND ";
            $query_concat.="AND( tbvalidacion_documento.validacion_tema_responsable='true'";
            if($v["param"]["n_v"]=="true"){
                        $query_concat.="   or tbvalidacion_documento.validacion_tema_responsable='false')";
            }else{
                 $query_concat.=")";
            }
        }
        if($v["param"]["n_v"]=="true"){
            $query_concat.=" AND tbvalidacion_documento.validacion_tema_responsable='false'";
            
        }
//        else
//        {
//            $query_concat.="AND tbvalidacion_documento.validacion_tema_responsable=false";
//        }
//        if($v["param"]["s_d"]=="false"){
//            
//        }else{
//            $query_concat.="AND tbvalidacion_documento.validacion_tema_responsable=false";
//        }
//        
        try
        {
            $query="SELECT tbvalidacion_documento.id_validacion_documento, tbdocumentos.id_documento, tbdocumentos.clave_documento,
 		 tbdocumentos.documento,

		 tbempleados.id_empleado, tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno,  	

		 tbvalidacion_documento.validacion_tema_responsable

                FROM validacion_documento tbvalidacion_documento
                JOIN documentos tbdocumentos ON tbdocumentos.id_documento=tbvalidacion_documento.id_documento
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbdocumentos.id_empleado 
                WHERE tbdocumentos.contrato= ".$v["param"]["contrato"]."  ".$query_concat;
//            echo json_encode($query);
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
            $query="SELECT tbasignacion_tema_requisito.id_tema, tbtemas.no, tbempleados.id_empleado, tbempleados.nombre_empleado, 
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

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
}

?>

