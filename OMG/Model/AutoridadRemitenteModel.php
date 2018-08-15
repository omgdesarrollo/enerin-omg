<?php

require_once '../dao/AutoridadRemitenteDAO.php';
require_once '../Pojo/AutoridadRemitentePojo.php';

class AutoridadRemitenteModel{


    
    public function  listarAutoridadesRemitentes()
    {
        try{
            $dao=new AutoridadRemitenteDAO();
            $rec=$dao->mostrarAutoridadesRemitentes();
            
            
            return $rec;
    }  catch (Exception $ex)
    {
        throw  $ex;
        return false;
    }
    }
    
    
    public function listarAutoridadRemitente($ID_AUTORIDAD)
    {
        try
        {
            $dao=new AutoridadRemitenteDAO();
            $rec= $dao->listarAutoridadRemitente($ID_AUTORIDAD);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
        
    }


    public function  listarAutoridadesRemitentesComboBox()
    {
        try{
            
            $dao=new AutoridadRemitenteDAO();
            $rec=$dao->mostrarAutoridadesRemitentesComboBox();
                       
            return $rec;
    }  catch (Exception $ex)
    {
        throw  $ex;
        return false;
    }
    }
    
    
    
    


    public function insertar($pojo)
    {
        try{
            
            $dao=new AutoridadRemitenteDAO();
            
            $exito= $dao->insertarAutoridadRemitente($pojo->getClave_autoridad(),$pojo->getDescripcion(),$pojo->getDireccion(),$pojo->getTelefono(),
                                               $pojo->getExtension(),$pojo->getEmail(),$pojo->getDireccion_web());
            
            if($exito[0] = 1)
            {
                $lista = $dao->listarAutoridadRemitente($exito['id_nuevo']);
            }            
            else
                return $exito[0];
            return $lista;
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
    
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_AUTORIDAD)
    {
        try{
            $dao=new AutoridadRemitenteDAO();
            $rec= $dao->actualizarAutoridadRemitentePorColumna($COLUMNA, $VALOR, $ID_AUTORIDAD);
           
            
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
    

    
    
    public function eliminar()
    {
        try{
            $dao= new AutoridadRemitenteDAO();
            $pojo= new AutoridadRemitentePojo();
            $dao->eliminarAutoridadRemitente($pojo->getId_autoridad());
        
            
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
}

?>