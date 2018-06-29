<?php
require_once '../ds/AccesoDB.php';

class TemaDAO{
    

   
public function mostrarTemas($cadena)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo, tbtemas.padre,
		tbtemas.identificador
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.identificador LIKE '%$cadena%'";

        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;

    }catch (Exception $ex)
    {       
        throw $ex;
        return false;
    }
}

public function listarHijos($ID)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
		FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.padre=$ID";
        
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
                tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
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


public function insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR)
{
    try
    {
        $query="INSERT INTO temas (no,nombre,descripcion,plazo,padre,id_empleado,identificador) 
                VALUES ($NO,'$NOMBRE','$DESCRIPCION','$PLAZO',$NODO,'$ID_EMPLEADO','$IDENTIFICADOR')";
        
        $db= AccesoDB::getInstancia();
        $lista= $db->executeQueryUpdate($query);
           
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
