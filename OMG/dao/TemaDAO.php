<?php
require_once '../ds/AccesoDB.php';

class TemaDAO{
    

   
public function mostrarTemas()
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo, tbtemas.padre
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado";

        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;

    }catch (Exception $ex)
    {       
        throw $ex;
        return false;
    }
}

public function mostrarSubtemas($ID_TEMA)
{
    try
    {
        $query="SELECT tbtemas.no, tbtemas.nombre
                FROM temas tbtemas
                WHERE tbtemas.padre=$ID_TEMA";
        
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
