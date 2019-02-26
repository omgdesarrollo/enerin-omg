<?php

require_once '../ds/AccesoDB.php';
class InformeGerencialDAO
{
    // lista documento de entrada con seguimiento
    public function listarInformeGerencial()
    {
        try
        {
            $query="SELECT tbdocumento_entrada.id_documento_entrada, tbdocumento_entrada.folio_entrada, tbautoridad_remitente.clave_autoridad, tbdocumento_entrada.asunto,
                    tbempleados.id_empleado, CONCAT(tbempleados.nombre_empleado,' ', tbempleados.apellido_paterno,' ',tbempleados.apellido_materno) AS nombre_completo,
                    tbdocumento_entrada.fecha_asignacion, tbdocumento_entrada.fecha_limite_atencion, tbdocumento_entrada.fecha_alarma, 
                    tbdocumento_entrada.status_doc		 			 		
                    FROM seguimiento_entrada tbseguimiento_entrada
                    JOIN documento_entrada tbdocumento_entrada ON tbdocumento_entrada.id_documento_entrada=tbseguimiento_entrada.id_documento_entrada
                    JOIN autoridad_remitente tbautoridad_remitente ON tbautoridad_remitente.id_autoridad=tbdocumento_entrada.id_autoridad
                    JOIN temas tbtemas ON tbtemas.id_tema=tbdocumento_entrada.id_tema
                    JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado";
            
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