<?php

require_once '../dao/TemaDAO.php';

class TemaModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  listarTemas(){
        try{
            $dao=new TemaDAO();
            $rec=$dao->mostrarTemas();
            
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
    
    public function insertar($pojo){
        try{
            $dao=new TemaDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarTemas($pojo->getCodigoTema(),$pojo->getTema());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    public function actualizar($pojo){
        try{
            $dao= new TemaDAO();
//            $pojo= new EmpleadoPojo();
//            $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(),$pojo->getNombreEmpleado(),$pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(), $pojo->getCategoria(),$pojo->getCorreo());
//        $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
        $dao->actualizarTema($pojo->getIdTema(), $pojo->getCodigoTema(), $pojo->getTema());
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$id_tema){
        try{
            $dao=new TemaDAO();
            $rec= $dao->actualizarTemaPorColumna($COLUMNA, $VALOR, $id_tema);
            
        } catch (Exception $ex) {

        }
    }
    public function eliminar(){
        try{
            $dao= new TemaDAO();
            $pojo= new TemaPojo();
            $dao->eliminarTema($pojo->getIdTema());
//            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}

?>