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
 
    
    public function insertar($pojo){
        try{
            $dao=new AsignacionTemaRequisitoDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarAsignacionTemaRequisito($pojo->getId_clausula(),$pojo->getRequisito());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    
    
    public function actualizar($pojo){
        try{
            $dao= new AsignacionTemaRequisitoDAO();
//            $pojo= new EmpleadoPojo();
//            $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(),$pojo->getNombreEmpleado(),$pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(), $pojo->getCategoria(),$pojo->getCorreo());
//        $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
        $dao->actualizarClausula($pojo->getId_asignacion_tema_requisito(),$pojo->getId_clausula(),$pojo->getRequisito());
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
