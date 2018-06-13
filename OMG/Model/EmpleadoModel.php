<?php

require_once '../dao/EmpleadoDAO.php';
require_once '../Pojo/EmpleadoPojo.php';
class EmpleadoModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
//    private $idEmpleado;
//    private $Nombre_Empleado='';
//    private $Apellido_Paterno='';
//    private $Apellido_Materno='';
//    private $Categoria='';
//    private $Correo='';
//    private $Fecha_Creacion='NOW()';
    
    public function  listarEmpleados(){
        try{
            $dao=new EmpleadoDAO();
            $rec=$dao->mostrarEmpleados();
            
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
    
    
    public function listarEmpleado($ID_EMPLEADO){
        try
        {
            $dao = new EmpleadoDAO();
            $rec = $dao->listarEmpleado($ID_EMPLEADO);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    
        public function  listarEmpleadosComboBox(){
        try{
            $dao=new EmpleadoDAO();
            $rec=$dao->mostrarEmpleadosComboBox();
            
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
            $dao=new EmpleadoDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarEmpleados($pojo->getNombreEmpleado(),$pojo->getCategoria(), $pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(),$pojo->getCorreo());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    public function actualizar($pojo){
        try{
            $dao= new EmpleadoDAO();
//            $pojo= new EmpleadoPojo();
//            $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(),$pojo->getNombreEmpleado(),$pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(), $pojo->getCategoria(),$pojo->getCorreo());
//        $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
        $dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_EMPLEADO){
        try{
            $dao=new EmpleadoDAO();
            $rec= $dao->actualizarEmpleadoPorColumna($COLUMNA, $VALOR, $ID_EMPLEADO);
            
        } catch (Exception $ex) {

        }
    }
    public function eliminar(){
        try{
            $dao= new EmpleadoDAO();
            $pojo= new EmpleadoPojo();
            $dao->eliminarEmpleado($pojo->getIdEmpleado());
//            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    public function BusquedaEmpleado($cadena)
    {
        try{
            $dao= new EmpleadoDAO();
            $lista = $dao->BusquedaEmpleado($cadena);
            return $lista;
        }catch(Exception $er)
        {
            return false;
            throw $er;
        }
    }
}

?>