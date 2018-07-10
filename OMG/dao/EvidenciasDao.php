<?php

require_once '../ds/AccesoDB.php';
class EvidenciasDAO
{
    public function listarEvidencias($ID_USUARIO,$CONTRATO)
    {
        try
        {
            $query = "SELECT tbusuarios.id_empleado,tbrequisitos.id_requisito,tbrequisitos.requisito,
            tbregistros.id_registro,tbregistros.registro,tbregistros.frecuencia,
            tbdocumentos.clave_documento,tbevidencias.desviacion,
            tbevidencias.id_evidencias,tbevidencias.id_usuario,tbevidencias.accion_correctiva,tbevidencias.validacion_supervisor,
            tbempleados.id_empleado,(SELECT tbusuario2.id_usuario FROM usuarios tbusuario2 WHERE tbusuario2.id_empleado=tbempleados.id_empleado)AS id_responsable , (
                SELECT CONCAT(tbempleados.nombre_empleado,' ',
                    tbempleados.apellido_paterno,' ',tbempleados.apellido_materno)
                    FROM empleados tbempleados
                    JOIN usuarios tbusuariosU ON tbusuariosU.id_empleado = tbempleados.id_empleado
                    WHERE tbusuariosU.id_usuario = tbevidencias.id_usuario
                ) AS usuario, (SELECT IF(tbevidencias.id_usuario=$ID_USUARIO,1,0) ) AS validador,
                ( SELECT IF( tbempleados.id_empleado = (SELECT tbempleado.id_empleado FROM usuarios tbusuario,empleados tbempleado 
				    WHERE tbusuario.id_empleado = tbempleado.id_empleado AND tbusuario.id_usuario = $ID_USUARIO),1,0) ) AS responsable
            
            FROM temas tbtemas
            LEFT JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON tbasignacion_tema_requisito.id_tema=tbtemas.id_tema
        	LEFT JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos
            ON tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito = tbasignacion_tema_requisito.id_asignacion_tema_requisito
			LEFT JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito = tbasignacion_tema_requisito_requisitos.id_requisito
			LEFT JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_requisito = tbrequisitos.id_requisito
            LEFT JOIN registros tbregistros ON tbregistros.id_registro = tbrequisitos_registros.id_registro
	    	LEFT JOIN evidencias tbevidencias ON tbevidencias.id_registro = tbregistros.id_registro
			LEFT JOIN empleados tbempleados ON tbempleados.id_empleado = tbtemas.id_empleado
			LEFT JOIN usuarios tbusuarios ON tbusuarios.id_empleado = tbempleados.id_empleado
            LEFT JOIN documentos tbdocumentos ON tbdocumentos.id_documento = tbregistros.id_documento
            
            WHERE tbtemas.contrato=$CONTRATO AND (tbregistros.registro<>'NULL' AND tbevidencias.validacion_supervisor<>'NULL' AND tbusuarios.id_usuario = $ID_USUARIO AND LOWER(tbtemas.identificador) 
			LIKE '%catalogo%' OR tbevidencias.id_usuario = $ID_USUARIO)";
            
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    
    
    public function listarEvidencia($ID_EVIDENCIA,$ID_USUARIO)
    {
        try
        {
            $query = "SELECT tbusuarios.id_empleado,tbrequisitos.id_requisito,tbrequisitos.requisito,
            tbregistros.id_registro,tbregistros.registro,tbregistros.frecuencia,
            tbdocumentos.clave_documento,tbevidencias.desviacion,
            tbevidencias.id_evidencias,tbevidencias.id_usuario,tbevidencias.accion_correctiva,tbevidencias.validacion_supervisor,
            tbempleados.id_empleado,(SELECT tbusuario2.id_usuario FROM usuarios tbusuario2 WHERE tbusuario2.id_empleado=tbempleados.id_empleado)AS id_responsable,
            (
                SELECT CONCAT(tbempleados.nombre_empleado,' ',
                    tbempleados.apellido_paterno,' ',tbempleados.apellido_materno)
                    FROM empleados tbempleados
                    JOIN usuarios tbusuariosU ON tbusuariosU.id_empleado = tbempleados.id_empleado
                    WHERE tbusuariosU.id_usuario = tbevidencias.id_usuario
                ) AS usuario, (SELECT IF(tbevidencias.id_usuario=$ID_USUARIO,1,0) ) AS validador,
                ( SELECT IF( tbempleados.id_empleado = (SELECT tbempleado.id_empleado FROM usuarios tbusuario,empleados tbempleado 
				    WHERE tbusuario.id_empleado = tbempleado.id_empleado AND tbusuario.id_usuario = $ID_USUARIO),1,0) ) AS responsable
            
            FROM temas tbtemas
            LEFT JOIN asignacion_tema_requisito tbasignacion_tema_requisito ON tbasignacion_tema_requisito.id_tema=tbtemas.id_tema
        	LEFT JOIN asignacion_tema_requisito_requisitos tbasignacion_tema_requisito_requisitos
            ON tbasignacion_tema_requisito_requisitos.id_asignacion_tema_requisito = tbasignacion_tema_requisito.id_asignacion_tema_requisito
			LEFT JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito = tbasignacion_tema_requisito_requisitos.id_requisito
			LEFT JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_requisito = tbrequisitos.id_requisito
            LEFT JOIN registros tbregistros ON tbregistros.id_registro = tbrequisitos_registros.id_registro
	    	LEFT JOIN evidencias tbevidencias ON tbevidencias.id_registro = tbregistros.id_registro
			LEFT JOIN empleados tbempleados ON tbempleados.id_empleado = tbtemas.id_empleado
			LEFT JOIN usuarios tbusuarios ON tbusuarios.id_empleado = tbempleados.id_empleado
            LEFT JOIN documentos tbdocumentos ON tbdocumentos.id_documento = tbregistros.id_documento
            
            WHERE tbevidencias.id_evidencias = $ID_EVIDENCIA AND tbregistros.registro<>'NULL' AND tbevidencias.validacion_supervisor<>'NULL' AND tbusuarios.id_usuario = $ID_USUARIO AND LOWER(tbtemas.identificador) 
			LIKE '%catalogo%' OR tbevidencias.id_usuario = $ID_USUARIO";
            $db = AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            
            return $lista;
        }
        catch(Exception $ex)
        {
            throw $ex;
            return false;
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
    public function crearEvidencia($ID_USUARIO,$ID_REGISTRO)
    {
        try
        {
            $query = "INSERT INTO evidencias (id_registro,id_usuario)
                     VALUES ($ID_REGISTRO,$ID_USUARIO)";
            $db = AccesoDB::getInstancia();
            $res = $db->executeQueryUpdate($query);
            return $res;
        }catch(Exection $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function iniciarEnVacio($id_evidencias)
    {
        try
        {
            $query="UPDATE evidencias

                    SET clasificacion='',desviacion='',accion_correctiva='',validacion_supervisor='false',plan_accion='',
                    ingresar_oficio_atencion='',oficio_atencion=''

                    WHERE id_evidencias=$id_evidencias";
            
            $db=  AccesoDB::getInstancia();
            $lista = $db->executeQueryUpdate($query);            
            return $lista;
            
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }

    

    public function actualizarEvidenciaPorColumna($COLUMNA,$VALOR,$ID_EVIDENCIAS)
    {     
        try
        {
            $query="UPDATE evidencias SET ".$COLUMNA."='".$VALOR."'"
                 ." WHERE id_evidencias=$ID_EVIDENCIAS";
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);

            return $result;
        }catch (Exception $ex)
        {
           throw $ex;
           return false;
        }
    }
    
    public function eliminarEvidencia($id_evidencias)
    {
        try
        {
            $query="DELETE FROM evidencias

            WHERE id_evidencias=$id_evidencias";
            
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);
            
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    public function listarRegistros($CADENA,$ID_TEMA)
    {
        try
        {
            // tbregistros.frecuencia,
            $query="SELECT tbtemas.nombre, tbtemas.id_tema, tbregistros.id_registro, tbregistros.registro, tbdocumentos.documento, tbregistros.frecuencia, tbdocumentos.clave_documento, tbrequisitos.id_requisito, tbrequisitos.requisito,
            CONCAT(tbempleados.nombre_empleado,' ',tbempleados.apellido_paterno,' ',tbempleados.apellido_materno) AS nombre
            FROM registros tbregistros
            JOIN documentos tbdocumentos ON tbregistros.id_documento = tbdocumentos.id_documento
            JOIN empleados tbempleados ON tbdocumentos.id_empleado = tbempleados.id_empleado
            JOIN requisitos_registros tbrequisitos_registros ON tbrequisitos_registros.id_registro = tbregistros.id_registro
            JOIN requisitos tbrequisitos ON tbrequisitos.id_requisito = tbrequisitos_registros.id_requisito
            JOIN asignacion_tema_requisito_requisitos tbasignacion_trr ON tbasignacion_trr.id_requisito = tbrequisitos.id_requisito
            JOIN asignacion_tema_requisito tbasignacion_tr ON tbasignacion_tr.id_asignacion_tema_requisito = tbasignacion_trr.id_asignacion_tema_requisito
            JOIN temas tbtemas ON tbasignacion_tr.id_tema = tbtemas.id_tema
            WHERE tbregistros.id_documento <> -1 AND tbtemas.id_tema = $ID_TEMA AND LOWER(tbregistros.registro) LIKE '%$CADENA%'";

            $db= AccesoDB::getInstancia();
            $result= $db->executeQuery($query);
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    public function listarTemas($CADENA,$ID_USUARIO,$CONTRATO)
    {
        try
        {
            $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion
                FROM usuarios_temas tbusuarios_temas
                JOIN  temas tbtemas ON tbusuarios_temas.id_tema = tbtemas.id_tema
                WHERE tbusuarios_temas.id_usuario = $ID_USUARIO AND
                LOWER(tbtemas.nombre) LIKE '%$CADENA%' AND tbtemas.padre = 0
                AND tbtemas.contrato=$CONTRATO AND tbtemas.identificador LIKE '%catalogo%'";
            // echo $query;
            $db= AccesoDB::getInstancia();        
            $lista= $db->executeQuery($query);
            return $lista;
            // var_dump($lista);
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function mandarAccionCorrectiva($ID_EVIDENCIA,$MENSAJE,$COLUMNA)
    {
        try
        {
            $db= AccesoDB::getInstancia();
            $query="UPDATE evidencias SET ".$COLUMNA." = '$MENSAJE'
                 WHERE id_evidencias=$ID_EVIDENCIA";
            $result= $db->executeQueryUpdate($query);
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}
