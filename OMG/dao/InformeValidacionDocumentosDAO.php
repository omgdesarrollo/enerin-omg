<?php
require_once '../ds/AccesoDB.php';


class InformeValidacionDocumentosDAO{
    
    
    public function listarValidaciones($v)
    {
        $query_concat="";
        if($v["param"]["v"]=="true"){
//            echo "fue false";
//            $query_concat.="AND ";
            $query_concat.="AND tbvalidacion_documento.validacion_tema_responsable='true'";
            if($v["param"]["n_v"]=="true"){
//                 if($v["param"]["n_v"]=="false"){
                        $query_concat.="   or tbvalidacion_documento.validacion_tema_responsable='false'";
//                    }
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
                WHERE tbdocumentos.CONTRATO= ".$v["param"]["contrato"]."  ".$query_concat;
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
    
    
    
}




?>

