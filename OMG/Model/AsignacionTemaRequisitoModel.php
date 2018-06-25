<?php

require_once '../dao/AsignacionTemaRequisitoDAO.php';
require_once '../Pojo/AsignacionTemaRequisitoPojo.php';

class AsignacionTemaRequisitoModel {
    //put your code here
    
    public function  listarAsignacionTemasRequisitos(){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
            $rec=$dao->mostrarAsignacionTemasRequisitos();
            
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    public function  listarAsignacionTemasRequisitosComboBox(){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
            $rec=$dao->mostrarAsignacionTemasRequisitosComboBox();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
 
    
    
    public function  obtenerRequisitosporDocumento($id_documento){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
            $rec=$dao->obtenerRequisitosporDocumento($id_documento);
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    
    
    public function obtenerTemayResponsable($id_documento){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
            $rec=$dao->obtenerTemayResponsable($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){            
            throw $ex;
        }
        
        
    }
    
    
    
    public function insertar($pojo){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarAsignacionTemaRequisito($pojo->getId_clausula(),$pojo->getRequisito(),$pojo->getId_Documento());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
   
    public function insertarRequisitos($ID_ASIGNACION,$requisito)
    {
        try
        {
            $dao=new AsignacionTemaRequisitoDAO();
            $rec= $dao->insertarRequisito($requisito);
            $ID_REQUISITO= $dao->obtenerMaximoRequisito();
            $resultado= $dao->insertarRequisitoTablaCompuesta($ID_ASIGNACION, $ID_REQUISITO);
            
            
            return $resultado;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarRegistros()
    {
        try
        {
            $dao=new AsignacionTemaRequisitoDAO($ID_REQUISITO,$registro,$id_documento);
            $rec= $dao->insertarRegistro($registro,$id_documento);
            $ID_REGISTRO= $dao->obtenerMaximoRegistro();
            $resultado= $dao->insertarRegistroTablaCompuesta($ID_REQUISITO, $ID_REGISTRO);
            
            return $resultado;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }        

    public function actualizar($pojo){
        try{
            $dao= new AsignacionTemaRequisitoDAO();
//            $pojo= new EmpleadoPojo();
//            $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(),$pojo->getNombreEmpleado(),$pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(), $pojo->getCategoria(),$pojo->getCorreo());
//        $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
        $dao->actualizarClausula($pojo->getId_asignacion_tema_requisito(),$pojo->getId_clausula(),$pojo->getRequisito(),$pojo->getId_Documento());
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_ASIGNACION_TEMA_REQUISITO){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
            $rec= $dao->actualizarAsignacionTemaRequisitoPorColumna($COLUMNA, $VALOR, $ID_ASIGNACION_TEMA_REQUISITO);
            
        } catch (Exception $ex) {

        }
    }
    
    
    public function eliminar(){
        try{
            $dao= new AsignacionTemaRequisitoDAO();
            $pojo= new AsignacionTemaRequisitoPojo();
            $dao->eliminarAsignacionTemaRequisito($pojo->getId_asignacion_tema_requisito());
//            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
