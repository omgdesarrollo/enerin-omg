<?php
require_once '../ds/AccesoDB.php';

class AdminDAO{
    
    public function listarUsuarios()
    {
        try
        {
            $query="SELECT tbusuarios.id_usuario, tbusuarios.nombre_usuario,
		    CONCAT (tbempleados.nombre_empleado,' ', tbempleados.apellido_paterno,' ', tbempleados.apellido_materno)
            AS nombre, tbempleados.categoria, tbempleados.correo
            FROM usuarios tbusuarios
            JOIN empleados tbempleados ON tbempleados.id_empleado=tbusuarios.id_empleado
            WHERE tbusuarios.id_empleado != 0";
            
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
    
    
    public function insertarUsuario($ID_EMPLEADO, $NOMBRE_USUARIO)
    {
        try
        {
            $query_obtenerMaximo_mas_uno="SELECT max(id_usuario)+1 as id_usuario from usuarios";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_usuario"];
            }
            
            $query ="INSERT INTO usuarios (id_usuario, nombre_usuario, contra, id_empleado) VALUES($id_nuevo,'$NOMBRE_USUARIO',
                    (SELECT tbempleados.correo FROM empleados tbempleados
                    WHERE tbempleados.id_empleado=$ID_EMPLEADO),$ID_EMPLEADO)";
            
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQueryUpdate($query);

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
}





?>

