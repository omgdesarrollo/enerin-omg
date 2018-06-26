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
            $query="SELECT tbestructura.id_estructura, tbestructura.id_submodulos,tbestructura.descripcion, tbestructura.id_vistas,tbvistas.nombre, tbusuarios_vistas.EDIT,
            tbusuarios_vistas.delete, tbusuarios_vistas.new,tbusuarios_vistas.consult 
            FROM usuarios_vistas tbusuarios_vistas
            JOIN estructura tbestructura ON tbusuarios_vistas.id_estructura = tbestructura.id_estructura
            JOIN vistas tbvistas ON tbvistas.id_vistas = tbestructura.id_vistas
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
    
    
    public function listarSubmodulos()
    {
        try
        {
           $query="SELECT tbsubmodulos.id_submodulos, tbsubmodulos.nombre
                   FROM submodulos tbsubmodulos WHERE tbsubmodulos.id_submodulos != 1";
           
           $db= AccesoDB::getInstancia();
           $lista= $db->executeQuery($query);
           
           return $lista;
           
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function listarVistasDeSubmodulos($ID_SUBMODULOS)
    {
        try
        {
          $query="SELECT tbestructura.id_submodulos,tbestructura.id_estructura, tbestructura.descripcion  
                  FROM estructura tbestructura
                  WHERE  tbestructura.id_submodulos=$ID_SUBMODULOS";
                  
          $db= AccesoDB::getInstancia();        
          $lista= $db->executeQuery($query);
          
          return $lista;
          
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }


    public function listarTemas($CADENA,$ID_USUARIO)
    {
        try
        {
            $query="SELECT tbtemas.id_tema,tbtemas.no, tbtemas.nombre, tbtemas.descripcion
                    FROM temas tbtemas
                    WHERE tbtemas.nombre LIKE '%$CADENA%' AND tbtemas.padre=0
                    AND tbtemas.id_tema 
                    NOT IN( SELECT tbusuario_temas.id_tema FROM usuarios_temas tbusuario_temas 
                    WHERE tbusuario_temas.id_usuario=$ID_USUARIO )";

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
    
    
    public function listarTemasPorUsuario($ID_USUARIO)
    {
        try
        {
            $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion
                    FROM usuarios_temas tbusuarios_temas
                    JOIN temas tbtemas ON tbtemas.id_tema = tbusuarios_temas.id_tema
                    WHERE tbusuarios_temas.id_usuario = $ID_USUARIO";

            $db= AccesoDB::getInstancia();
            $lista= $db->executeQuery($query);
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
            $lista['resultado'] = $db->executeQueryUpdate($query);
            $lista['id_usuario'] = $id_nuevo;

            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarUsuarioTema($ID_USUARIO, $ID_TEMA)
    {
        try
        {
            $query="INSERT INTO usuarios_temas (id_usuario,id_tema) VALUES ($ID_USUARIO,$ID_TEMA)";
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
           
            return $lista;            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    

    public function actualizarUsuariosVistasPorColumna($COLUMNA,$VALOR,$ID_USUARIO,$ID_ESTRUCTURA)
    {
        try
        {
            $query="UPDATE usuarios_vistas tbusuarios_vistas 
                    SET tbusuarios_vistas.".$COLUMNA."= '".$VALOR."' WHERE tbusuarios_vistas.id_usuario=$ID_USUARIO AND tbusuarios_vistas.id_estructura=$ID_ESTRUCTURA";
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;        
        }
    }
    
    
    public function eliminarUsuarioTema($ID_USUARIO,$ID_TEMA)
    {
        try
        {
          $query="DELETE FROM usuarios_temas
                  WHERE id_usuario=$ID_USUARIO AND id_tema=$ID_TEMA";
          $db= AccesoDB::getInstancia();
          $lista= $db->executeQueryUpdate($query);
          return $lista;
          
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function ConsultarExisteUsuario($USUARIO)
    {
        try
        {
          $query="SELECT COUNT(*) AS res 
                  FROM usuarios tbusuarios
                  WHERE tbusuarios.nombre_usuario=$USUARIO";
          
          $db= AccesoDB::getInstancia();
          $lista= $db->executeQuery($query);
          return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    public function verificarPass($USUARIO,$CONTRASENA)
    {
        try
        {
            $query="SELECT COUNT(*) AS res 
                  FROM usuarios tbusuarios
                  WHERE tbusuarios.id_usuario=$USUARIO
                  AND tbusuarios.contra='$CONTRASENA'";
            // echo $query;
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQuery($query);
            // echo $lista[0]['res'];
            return $lista[0];
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    public function cambiarPass($USUARIO,$CONTRASENA,$VALOR)
    {
        try
        {
            $query="UPDATE usuarios tbusuarios
                SET tbusuarios.contra= '".$VALOR."'
                WHERE tbusuarios.id_usuario=$USUARIO
                AND tbusuarios.contra='$CONTRASENA'";
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            echo "d ".$query;
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
}


?>

