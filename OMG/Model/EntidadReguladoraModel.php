<?php

require_once '../dao/EntidadReguladoraDAO.php';
require_once '../Pojo/EntidadReguladoraPojo.php';

class EntidadReguladoraModel{


    
    public function  listarEntidadesReguladoras(){
        try{
            $dao=new EntidadReguladoraDAO();
            $rec=$dao->mostrarEntidadesReguladoras();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    public function  listarEntidadesReguladorasComboBox(){
        try{
            $dao=new EntidadReguladoraDAO();
            $rec=$dao->mostrarEntidadesReguladorasComboBox();
            
            /*if($rec==NULL){
            throw new Exception("Usuario no existe !!!!!");
            }
            if($rec["CONTRA"]!=$clave){
            throw  new Exception("Clave Incorrecta!!!!!");
            }*/            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    
    


    public function insertar($pojo){
        try{
            
            $dao=new EntidadReguladoraDAO();
            
            $dao->insertarEntidadReguladora($pojo->getClaveEntidad(),$pojo->getDescripcion(),$pojo->getDireccion(),$pojo->getTelefono(),
                                               $pojo->getExtension(),$pojo->getEmail(),$pojo->getDireccionWeb());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    

    /*
    public function actualizar($pojo){
        try{
            $dao= new EntidadReguladoraDAO();

        $dao->actualizarEntidadReguladora($pojo->getIdEntidad(),$pojo->getClaveEntidad(),$pojo->getDescripcion(),$pojo->getDireccion(),$pojo->getTelefono(),$pojo->getExtension(),$pojo->getEmail(),$pojo->getDireccionWeb());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    */
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_ENTIDAD){
        try{
            $dao=new EntidadReguladoraDAO();
            $rec= $dao->actualizarEntidadReguladoraPorColumna($COLUMNA, $VALOR, $ID_ENTIDAD);
            
        } catch (Exception $ex) {

        }
    }
    

    
    
    public function eliminar(){
        try{
            $dao= new EntidadReguladoraDAO();
            $pojo= new EntidadReguladoraPojo();
            $dao->eliminarEntidadReguladora($pojo->getIdEntidad());
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>