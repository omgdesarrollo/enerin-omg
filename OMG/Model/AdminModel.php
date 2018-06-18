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
    
}

?>

