<?php
require_once '../ds/AccesoDB.php';

class AdminDAO{
    
    public function listarUsuarios ()
    {
        try
        {
            $query="SELECT tbusuarios.id_usuario, tbusuarios.nombre_usuario,
		 
		 tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno,
		 tbempleados.categoria, tbempleados.correo  		

                 FROM usuarios tbusuarios

                 JOIN empleados tbempleados ON tbempleados.id_empleado=tbusuarios.id_empleado";
            
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

