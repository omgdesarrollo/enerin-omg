<?php 
require_once '../ds/AccesoDB.php';
class PermisosDAO{
    
    public function mostrarPermisos($id_usuario) {
        try {
           $query="SELECT tbpermisos.idpermisos, tbpermisos.descripcion, tbpermisos.Agregar, tbpermisos.Eliminar,tbpermisos.Modificar,
 		 tbpermisos.Consultar,
 		 
 		 tbvistas.nombre
		  
                FROM permisos tbpermisos

                JOIN usuarios_y_empleados tbusuarios_y_empleados ON tbusuarios_y_empleados.idpermisos=tbpermisos.idpermisos

                JOIN vistas_permisos tbvistas_permisos ON tbvistas_permisos.idpermisos=tbusuarios_y_empleados.idpermisos

                JOIN vistas tbvistas ON tbvistas.id_vistas=tbvistas_permisos.id_vistas

                WHERE tbusuarios_y_empleados.id_usuario=$id_usuario"; 
            
        }catch(Exception $ex)
        {
            throw $ex;
        
    }
}
    
    
    
    
    
    
}


?>

