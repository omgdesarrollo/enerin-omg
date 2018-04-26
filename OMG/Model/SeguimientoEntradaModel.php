<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../dao/SeguimientoEntradaDAO.php';
require_once '../Pojo/SeguimientoEntradaPojo.php';
class SeguimientoEntradaModel{
    
    public function  listarSeguimientoEntradas(){
        try{
            $dao=new SeguimientoEntradaDAO();
            $rec=$dao->mostrarSeguimientoEntradas();
            
            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
    
    

    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_SEGUIMIENTO_ENTRADA){
        try{
            $dao=new SeguimientoEntradaDAO();
            $rec= $dao->actualizarSeguimientoEntradaPorColumna($COLUMNA, $VALOR, $ID_SEGUIMIENTO_ENTRADA);
            
        } catch (Exception $ex) {

        }
    }
    
    
    
    public function eliminar(){
        try{
            $dao= new SeguimientoEntradaDAO();
            $pojo= new SeguimientoEntradaPojo();
            $dao->eliminarSeguimientoEntrada($pojo->getIdSeguimientoEntrada());
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>