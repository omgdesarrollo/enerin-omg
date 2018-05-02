<?php

require_once '../dao/ClausulaDAO.php';
require_once '../Pojo/ClausulaPojo.php';


class ClausulaModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
//    private $idEmpleado;
//    private $Nombre_Empleado='';
//    private $Apellido_Paterno='';
//    private $Apellido_Materno='';
//    private $Categoria='';
//    private $Correo='';
//    private $Fecha_Creacion='NOW()';
    
    public function  listarClausulas(){
        try{
            $dao=new ClausulaDAO();
            $rec=$dao->mostrarClausulas();
            
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



    public function  listarClausulasComboBox(){
        try{
            $dao=new ClausulaDAO();
            $rec=$dao->mostrarClausulasComboBox();
            
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
            $dao=new ClausulaDAO();
//            $pojo=new EmpleadoPojo();
            
           $dao->insertarClausulas($pojo->getClausula(),$pojo->getSubClausula(),$pojo->getDescripcionClausula(),
                                   $pojo->getDescripcionSubClausula(),$pojo->getTextoBreve(),$pojo->getDescripcion(),
                                   $pojo->getPlazo(),$pojo->getIdEmpleado());
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    
    public function actualizar($pojo){
        try{
            $dao= new ClausulaDAO();
//            $pojo= new EmpleadoPojo();
//            $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(),$pojo->getNombreEmpleado(),$pojo->getApellidoPaterno(),$pojo->getApellidoMaterno(), $pojo->getCategoria(),$pojo->getCorreo());
//        $rec=$dao->actualizarEmpleado($pojo->getIdEmpleado(), $pojo->getCorreo());
        $dao->actualizarClausula($pojo->getIdClausula(),$pojo->getClausula(),$pojo->getSubClausula(),
                                 $pojo->getDescripcionClausula(),$pojo->getDescripcionSubClausula(),
                                 $pojo->getTextoBreve(),$pojo->getDescripcion(),$pojo->getPlazo(),$pojo->getIdEmpleado());
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    public function actualizarPorColumna($COLUMNA,$VALOR,$ID_CLAUSULA){
        try{
            $dao=new ClausulaDAO();
            $rec= $dao->actualizarClausulaPorColumna($COLUMNA, $VALOR, $ID_CLAUSULA);
            
        } catch (Exception $ex) {

        }
    }
    
    
    public function eliminar(){
        try{
            $dao= new ClausulaDAO();
            $pojo= new ClausulaPojo();
            $dao->eliminarClausula($pojo->getIdClausula());
//            return $rec;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    
}

?>