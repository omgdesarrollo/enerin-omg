<?php


require_once '../dao/SeguimientoEntradaDAO.php';
require_once '../Pojo/SeguimientoEntradaPojo.php';
require_once '../dao/GanttDao.php';

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
    
//    public function insert
    public function insertar($id_documento_entrada){
        try{
                $dao=new SeguimientoEntradaDAO();
                $dao->insertar($id_documento_entrada);
        }catch (Exception $ex) {
                 throw  $ex;
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