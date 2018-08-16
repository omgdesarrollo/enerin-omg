<?php

require_once '../dao/AutoridadRemitenteDAO.php';
require_once '../Pojo/AutoridadRemitentePojo.php';

class AutoridadRemitenteModel{


    
    public function  listarAutoridadesRemitentes()
    {
        try{
            $dao=new AutoridadRemitenteDAO();
            $rec['autoridades']=$dao->mostrarAutoridadesRemitentes();
            $lista=array();
            $contador=0;
            
            foreach ($rec['autoridades'] as $value) 
            {
                $lista['autoridades'][$contador]= array(
                    "id_autoridad"=>$value["id_autoridad"],
                    "clave_autoridad"=>$value["clave_autoridad"],
                    "descripcion"=>$value["descripcion"],
                    "direccion"=>$value["direccion"],
                    "telefono"=>$value["telefono"],
                    "extension"=>$value["extension"],
                    "email"=>$value["email"],
                    "direccion_web"=>$value["direccion_web"],
                    "resultado"=>$dao->verificarExistenciadeAutoridadenDocumentoEntrada($value["id_autoridad"])
                );
                $contador++;
            }
            
            return $lista;
        }  catch (Exception $ex)
        {
            throw  $ex;
            return -1;
        }
    }
    
    
    public function  listarAutoridadesRemitentes2()
    {
        try{
            $dao=new AutoridadRemitenteDAO();
            $rec=$dao->mostrarAutoridadesRemitentes();
            
            
            return $rec;
        }  catch (Exception $ex)
        {
            throw  $ex;
            return -1;
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
            return -1;
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
        return -1;
    }
    }
    
    
    
    


    public function insertar($pojo)
    {
        try{
            
            $dao=new AutoridadRemitenteDAO();
            $lista=array();
            $contador=0;
            
            $exito= $dao->insertarAutoridadRemitente($pojo->getClave_autoridad(),$pojo->getDescripcion(),$pojo->getDireccion(),$pojo->getTelefono(),
                                               $pojo->getExtension(),$pojo->getEmail(),$pojo->getDireccion_web());
            
            if($exito[0] = 1)
            {
                $rec = $dao->listarAutoridadRemitente($exito['id_nuevo']);
                
                foreach ($rec as $value) 
                {
                    $lista['autoridades'][$contador]= array(
                        "id_autoridad"=>$value["id_autoridad"],
                        "clave_autoridad"=>$value["clave_autoridad"],
                        "descripcion"=>$value["descripcion"],
                        "direccion"=>$value["direccion"],
                        "telefono"=>$value["telefono"],
                        "extension"=>$value["extension"],
                        "email"=>$value["email"],
                        "direccion_web"=>$value["direccion_web"],
                        "resultado"=>$dao->verificarExistenciadeAutoridadenDocumentoEntrada($value["id_autoridad"])
                    );
                  $contador++;  
                }
                return $lista;
            }            
            else
//                return $exito[0];
            return $lista;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
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
            return -1;
        }
    }
    

    
    
    public function eliminar($pojo)
    {
        try{
            $dao= new AutoridadRemitenteDAO();            
            $validacion= $dao->verificarExistenciadeAutoridadenDocumentoEntrada($pojo->getId_autoridad());
            
            if($validacion==0)
            {
                $exito= $dao->eliminarAutoridadRemitente($pojo->getId_autoridad());
            }
            
            return $exito;
            
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
}

?>