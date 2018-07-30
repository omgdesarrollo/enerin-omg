<?php

require_once '../dao/DocumentoDAO.php';
require_once '../Pojo/DocumentoPojo.php';
require_once '../Model/EmpleadoModel.php';

class DocumentoModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  listarDocumentos($contrato){
        try{
            $dao=new DocumentoDAO();
            $model=new EmpleadoModel();
            
            $rec['doc']=$dao->mostrarDocumentos($contrato);
            $rec['empl']=$model->listarEmpleadosComboBox();
            
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
    
    
    public function insertar($pojo,$CONTRATO){
        try{
            $dao=new DocumentoDAO();
//            $pojo=new EmpleadoPojo();
//            echo "lo traje aun en el model  ".$CONTRATO;
           $dao->insertarDocumentos($pojo->getClave_documento(),$pojo->getDocumento(),$pojo->getId_empleado(),$CONTRATO);
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