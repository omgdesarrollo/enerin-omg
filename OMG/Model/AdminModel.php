<?php
require_once '../dao/AdminDAO.php';

class AdminModel{
    
    public function listarUsuarios()
    {
        try
        {
           $dao=new AdminDAO();
           $rec=$dao->listarUsuarios();          
           
           return $rec;
           
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
            $dao=new AdminDAO();
            $rec= $dao->listarUsuarioVistas($ID_USUARIO);
            
            return $rec;
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
            $dao=new AdminDAO();
            $rec= $dao->listarSubmodulos();
            $resultado;
            foreach($rec as $index=>$value)
            {
                $val = $dao->listarVistasDeSubmodulos($value['id_submodulos']);
                // foreach($dao->listarVistasDeSubmodulos($value['id_submodulos']) as $val)
                // {
                    $resultado[$value['nombre']] = $val;
                    // array_push($resultado[$value['nombre']]=>$val);
                // }
                // array_push($resultado[$value['nombre']]=>$value);
            }
            return $resultado;
        }
        catch(Exception $ex)
        {
            throw $ex;
            return $ex;
        }
    }
    
    public function listarTemas($CADENA,$ID_USUARIO)
    {
        try
        {
            $dao=new AdminDAO();
            $rec = $dao->listarTemas($CADENA);
            return $rec;
            // var_dump($rec);
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
            $dao=new AdminDAO();
            $rec= $dao->listarTemasPorUsuario($ID_USUARIO);
            return $rec;
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
            $dao=new AdminDAO();
            $rec= $dao->insertarUsuario($ID_EMPLEADO, $NOMBRE_USUARIO);
            
            return$rec;
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
            $dao=new AdminDAO();
            $rec= $dao->insertarUsuarioTema($ID_USUARIO, $ID_TEMA);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    
    public function actualizarUsuariosVistasPorColumna($COLUMNA, $VALOR, $ID_USUARIO, $ID_ESTRUCTURA)
    {
        try
        {
            $dao=new AdminDAO();
            $rec= $dao->actualizarUsuariosVistasPorColumna($COLUMNA, $VALOR, $ID_USUARIO, $ID_ESTRUCTURA);
            
            return $rec;
            
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
            $dao=new AdminDAO();
            $rec= $dao->eliminarUsuarioTema($ID_USUARIO,$ID_TEMA);            
            return $rec;
        } catch(Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}

?>

