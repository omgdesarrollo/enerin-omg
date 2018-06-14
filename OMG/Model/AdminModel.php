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
    
}


?>

