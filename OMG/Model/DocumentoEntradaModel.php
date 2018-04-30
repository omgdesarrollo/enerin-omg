<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../dao/DocumentoEntradaDAO.php';
require_once '../Pojo/DocumentoEntradaPojo.php';
class DocumentoEntradaModel{
    
    public function  listarDocumentosEntrada(){
        try{
            $dao=new DocumentoEntradaDAO();
            $rec=$dao->mostrarDocumentosEntrada();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    public function  listarDocumentosEntradaComboBox(){
        try{
            $dao=new DocumentoEntradaDAO();
            $rec=$dao->mostrarDocumentosEntradaComboBox();
            
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
    
    
    public function traer_ultimo_insertado(){
        try{
             $dao=new DocumentoEntradaDAO();
             $rec=$dao->traer_ultimo_insertado();
             return $rec;
        } catch (Exception $ex) {

        }
    }
    
    public function insertar($pojo){
        try{
            $dao=new DocumentoEntradaDAO();
            
           $dao->insertarDocumentosEntrada($pojo->getIdCumplimiento(),$pojo->getFolioReferencia(),
                   $pojo->getFolioEntrada(),$pojo->getFechaRecepcion(),$pojo->getAsunto(),$pojo->geRemitente(),
                   $pojo->getIdEntidad(),$pojo->getIdClausula(),$pojo->getClasificacion(),$pojo->getStatusDoc(),
                   $pojo->getFechaAsignacion(),$pojo->getFechaLimiteAtencion(),$pojo->getFechaAlarma(),
                   $pojo->getDocumento(),$pojo->getObservaciones());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    /*
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
    */
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_DOCUMENTO_ENTRADA){
        try{
            $dao=new DocumentoEntradaDAO();
            $rec= $dao->actualizarDocumentoEntradaPorColumna($COLUMNA, $VALOR, $ID_DOCUMENTO_ENTRADA);
            
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