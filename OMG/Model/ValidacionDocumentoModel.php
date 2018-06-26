<?php


require_once '../dao/ValidacionDocumentoDAO.php';
require_once '../Pojo/ValidacionDocumentoPojo.php';


class ValidacionDocumentoModel{
    
    public function  listarValidacionDocumentos(){
        try{
            $dao=new ValidacionDocumentoDAO();
            $rec=$dao->mostrarValidacionDocumentos();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    public function obtenerInfoPorIdValidacionDocumento($id_validacion_documento)
    {
        try{
             $dao=new ValidacionDocumentoDAO();
            $rec=$dao->obtenerInfoPorIdValidacionDocumento($id_validacion_documento);
            return $rec;
      
        } catch (Exception $ex) {

        }    
    }
    
    public function obtenerTemayResponsable($id_documento){
        try{
            $dao=new ValidacionDocumentoDAO();
            $rec=$dao->obtenerTemayResponsable($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){            
            throw $ex;
            return false;
        }
        
        
    }
    
    
    public function  obtenerRequisitosporDocumento($id_documento)
    {
        try
        {
            $dao=new ValidacionDocumentoDAO();
            $rec=$dao->obtenerRequisitosporDocumento($id_documento);
         
            return $rec;
        } catch (Exception $ex){
            throw  $ex;
            return false;
        }
    }
    
    public function obtenerRegistrosPorDocumento($id_documento)
    {
        try
        {
            $dao=new ValidacionDocumentoDAO();
            $rec=$dao->obtenerRegistrosPorDocumento($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
    
//    public function insert
    public function insertar($id_documento_entrada){
        try{
                $dao=new SeguimientoEntradaDAO();
                $dao->insertar($id_documento_entrada);
        }catch (Exception $ex) {
                 throw  $ex;
        }
    }

    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_VALIDACION_DOCUMENTO){
        try{
            $dao=new ValidacionDocumentoDAO();
            $rec= $dao->actualizarValidacionDocumentoPorColumna($COLUMNA, $VALOR, $ID_VALIDACION_DOCUMENTO);
            
            return $rec;
        } catch (Exception $ex) {
            return false;
        }
    }
    
    
    
    public function eliminar(){
        try{
            $dao= new ValidacionDocumentoDAO();
            $pojo= new ValidacionDocumentoPojo();
            $dao->eliminarValidacionDocumento($pojo->getId_validacion_documento());
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}

?>