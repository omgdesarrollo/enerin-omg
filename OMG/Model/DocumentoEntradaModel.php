<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../dao/DocumentoEntradaDAO.php';
require_once '../Pojo/DocumentoEntradaPojo.php';
class DocumentoEntradaModel{
    
    public function getFechaAlarma()
    {
        try
        {
            $dao = new DocumentoEntradaDAO();


            $rec = $dao->getFechaAlarma();

            return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }

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
        $data=array();        
        try{
            $dao=new DocumentoEntradaDAO();
            //$carpeta ='enerin-omgapps.com/enerin-omg/archivos/files/'.$pojo->getIdCumplimiento();
             $carpeta ='../../archivos/files/'.$pojo->getIdCumplimiento();
            if(!file_exists($carpeta))
            {
                mkdir($carpeta,0777,true);
            }
            $id_nuevo=$dao->traer_ultimo_insertado();
            $exito_inserccion=$dao->insertarDocumentosEntrada($pojo->getIdCumplimiento(),$pojo->getFolioReferencia(),
                   $pojo->getFolioEntrada(),$pojo->getFechaRecepcion(),$pojo->getAsunto(),$pojo->geRemitente(),
                   $pojo->getIdEntidad(),$pojo->getIdClausula(),$pojo->getClasificacion(),$pojo->getStatusDoc(),
                   $pojo->getFechaAsignacion(),$pojo->getFechaLimiteAtencion(),$pojo->getFechaAlarma(),
                   $pojo->getDocumento(),$pojo->getObservaciones(),$pojo->getMensajeAlerta());
            
            $carpeta = $carpeta."/".$id_nuevo;
            if(!file_exists($carpeta))
            {
                mkdir($carpeta,0777,true);
            }
            $data[0]=$pojo->getIdCumplimiento();
            $data[1]=$id_nuevo;
            $data[2]=$exito_inserccion;
        } catch (Exception $ex) {
                throw $ex;
        }
        return $data;
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