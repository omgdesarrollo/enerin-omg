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
    
    
    public function listarUsuarioVistas($ID_USUARIO)
    {
        try
        {
            $query="SELECT tbusuarios_vistas.id_submodulos, tbusuarios_vistas.id_vistas, tbusuarios_vistas.id_usuario, tbusuarios_vistas.EDIT,
		           tbusuarios_vistas.delete, tbusuarios_vistas.new,tbusuarios_vistas.consult 

                           FROM usuarios_vistas tbusuarios_vistas

                           WHERE tbusuarios_vistas.id_usuario=$ID_USUARIO";
            
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

