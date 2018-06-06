<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DocumentoSalidaModel
 *
 * @author usuario
 */
require_once '../dao/DocumentoSalidaDAO.php';
require_once '../Pojo/DocumentoSalidaPojo.php';

class DocumentoSalidaModel {
    //put your code here
    public function  listarDocumentosSalida(){
        try{
            $dao=new DocumentoSalidaDAO();
            $rec=$dao->mostrarDocumentosSalida();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    public function insertar($pojo){
        try{
            $dao=new DocumentoSalidaDAO();
            
           $dao->insertarDocumentosSalida($pojo->getId_documento_entrada(),$pojo->getFolio_salida(),$pojo->getFecha_envio(),
                                          $pojo->getAsunto(),$pojo->getDestinatario(),$pojo->getObservaciones());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    public function actualizar($pojo){
        try{
            $dao= new ClausulaDAO();
        $dao->actualizarClausula($pojo->getIdClausula(),$pojo->getClausula(),$pojo->getSubClausula(),
                $pojo->getDescripcionClausula(),$pojo->getDescripcionSubClausula(),$pojo->getTextoBreve(),
                $pojo->getDescripcion(),$pojo->getPlazo());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO_SALIDA){
        try{
            $dao=new DocumentoSalidaDAO();
            $rec= $dao->actualizarDocumentoSalidaPorColumna($COLUMNA, $VALOR, $ID_DOCUMENTO_SALIDA);
            
        } catch (Exception $ex) {

        }
    }
    
    
    
    public function eliminar(){
        try{
            $dao= new ClausulaDAO();
            $pojo= new ClausulaPojo();
            $dao->eliminarClausula($pojo->getIdClausula());
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>