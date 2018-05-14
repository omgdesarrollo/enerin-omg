<?php

require_once '../dao/DocumentoDAO.php';
require_once '../Pojo/DocumentoPojo.php';

class DocumentoModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  listarDocumentos(){
        try{
            $dao=new DocumentoDAO();
            $rec=$dao->mostrarDocumentos();
            
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    public function  listarDocumentosComboBox(){
        try{
            $dao=new DocumentoDAO();
            $rec=$dao->mostrarDocumentosComboBox();
            
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
    public function verificacionExisteClaveandDocumento($registro,$cualverificar){
        try{
            $dao= new DocumentoDAO();
//            if($cualverificar=="clavedocumento"){
                $rec=$dao->verificacionExisteClaveandDocumento($registro,$cualverificar);
//            }
            
            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
        
    }
    
    
    public function insertar($pojo){
        try{
            $dao=new DocumentoDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarDocumentos($pojo->getClave_documento(),$pojo->getDocumento(),$pojo->getId_empleado());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO){
        try{
            $dao=new DocumentoDAO();
            $rec= $dao->actualizarDocumentoPorColumna($COLUMNA, $VALOR, $ID_DOCUMENTO);
            
        } catch (Exception $ex) {

        }
    }
    
    
    
    public function eliminar(){
        try{
            $dao= new DocumentoDAO();
            $pojo= new DocumentoPojo();
            $dao->eliminarClausula($pojo->getIdDocumento());
//            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
    
    
}

?>