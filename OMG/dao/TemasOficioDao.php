<?php
require_once '../ds/AccesoDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TemasOficioDao
 *
 * @author Daniel
 */
class TemasOficioDao {
    //put your code here
    
    
    
    
    public function listarDetallesSeleccionados($ID)
{
    try
    {

         $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                 tbempleados.id_empleado ,tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
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
}
