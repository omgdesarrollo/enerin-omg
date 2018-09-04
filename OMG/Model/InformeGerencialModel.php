<?php

require_once '../dao/InformeGerencialDAO.php';
require_once '../Pojo/InformeGerencialPojo.php';
class InformeGerencialModel{
    
    public function  listarInformeGerencial(){
        try{
            $dao=new InformeGerencialDAO();
            $rec=$dao->mostrarInformeGerencial();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    

    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_INFORME_GERENCIAL){
        try{
            $dao=new InformeGerencialDAO();
            $rec= $dao->actualizarInformeGerencialPorColumna($COLUMNA, $VALOR, $ID_INFORME_GERENCIAL);
            
        } catch (Exception $ex) {

        }
    }
    
    
    
    public function eliminar(){
        try{
            $dao= new InformeGerencialDAO();
            $pojo= new InformeGerencialPojo();
            $dao->eliminarInformeGerencial($pojo->getId_informe_gerencial());
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>