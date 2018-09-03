<?php
require_once '../ds/AccesoDB.php';

class TemaDAO{
    

   
public function mostrarTemas($cadena,$contrato)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo, tbtemas.padre,
		tbtemas.identificador
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.identificador LIKE '%$cadena%'    and  tbtemas.contrato=$contrato ORDER BY cast(NO as UNSIGNED) ";
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;
    }catch (Exception $ex)
    {       
        throw $ex;
        return false;
    }
}


public function mostrarTemasComboBox($cadena,$contrato)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion
                FROM temas tbtemas
                WHERE tbtemas.PADRE=0 AND tbtemas.identificador LIKE '%$cadena%' AND tbtemas.contrato=$contrato";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


public function listarHijos($CADENA,$CONTRATO,$ID)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
		FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.identificador LIKE '%$CADENA%' AND tbtemas.contrato=$CONTRATO AND tbtemas.padre=$ID";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}

public function listarDetallesSeleccionados($ID)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                tbempleados.id_empleado,tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.id_tema=$ID";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        
        return $lista;
               
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


public function insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR,$CONTRATO)
{
    try
    {
        $query="INSERT INTO temas (no,nombre,descripcion,plazo,padre,id_empleado,identificador,contrato) 
                VALUES ('$NO','$NOMBRE','$DESCRIPCION','$PLAZO',$NODO,'$ID_EMPLEADO','$IDENTIFICADOR',$CONTRATO)";
        $db= AccesoDB::getInstancia();
        $lista= $db->executeQueryUpdate($query);
        
//        echo "valor lista: ".json_encode($lista);
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}

public function eliminarNodo($ID)
{
    try
    {
        $query="DELETE FROM temas WHERE temas.id_tema=$ID";
        
        $db= AccesoDB::getInstancia();
        $lista= $db->executeQueryUpdate($query);
        
        return $lista;
  
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


}

?>
