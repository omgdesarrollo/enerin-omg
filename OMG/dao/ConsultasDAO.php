<?php
require_once '../ds/AccesoDB.php';

class ConsultasDAO{

    public function ListarConsultas($CONTRATO)
    {
        try
        {
          $query="SELECT tbtemas.id_tema,tbtemas.no, tbtemas.nombre, tbasignacion_tema_requisito.id_asignacion_tema_requisito,
                    tbempleados.id_empleado,tbempleados.nombre_empleado,tbempleados.apellido_paterno,tbempleados.apellido_materno,
                    (SELECT COUNT(*) FROM asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos WHERE tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito=tbasignacion_tema_requisito.id_asignacion_tema_requisito) 
                    AS total_requisitos,
                    (SELECT COUNT(*) FROM requisitos_registros tbrequisitos_registros WHERE tbrequisitos_registros.id_requisito=tbasignacion_tema_requisito_requisitos.id_requisito) 
                    AS total_registros,
                    tbrequisitos.id_requisito,                    
                    (SELECT IF(COUNT(*)=0,'sin penalizacion','con penalizacion')
                    FROM requisitos tbrequisitos WHERE tbrequisitos.id_requisito=tbasignacion_tema_requisito_requisitos.id_requisito AND tbrequisitos.penalizacion='true')
                    AS resultado                     
                    FROM temas tbtemas
                    LEFT JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado 
                    LEFT JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON tbasignacion_tema_requisito.id_tema=tbtemas.id_tema
                    LEFT JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos ON
                    tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito=tbasignacion_tema_requisito.id_asignacion_tema_requisito
                    LEFT JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito=tbasignacion_tema_requisito_requisitos.id_requisito
                    LEFT JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_requisito=tbasignacion_tema_requisito_requisitos.id_requisito
                    WHERE tbtemas.padre=0 AND tbtemas.CONTRATO=$CONTRATO GROUP BY tbtemas.no";
          
          $db=  AccesoDB::getInstancia();
          $lista=$db->executeQuery($query);
          
          return $lista;          
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    public function listarRequisitosConPenalizacion($ID_ASIGNACION_TEMA)
    {
        try
        {
            $query="SELECT if(COUNT(*)=0,'sin penalizacion','con penalizacion ') AS resultado
                    FROM requisitos tbrequisitos
                    JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos 
                    ON tbasignacion_tema_requisito_requisitos.id_requisito=tbrequisitos.id_requisito
                    WHERE tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito=$ID_ASIGNACION_TEMA AND tbrequisitos.penalizacion='true'";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
          
            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }


    
} 


?>

