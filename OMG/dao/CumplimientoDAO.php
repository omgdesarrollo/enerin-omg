<?php
require_once '../ds/AccesoDB.php';
class CumplimientoDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarCumplimientos(){
        try{
            $query="SELECT ID_CUMPLIMIENTO, CLAVE_CUMPLIMIENTO, CUMPLIMIENTO FROM CUMPLIMIENTOS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    public function mostrarCumplimientosComboBox(){
        try{
            $query="SELECT ID_CUMPLIMIENTO, CLAVE_CUMPLIMIENTO, CUMPLIMIENTO FROM CUMPLIMIENTOS";
//            $query="SELECT ID_EMPLEADO  FROM EMPLEADOS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            /*$rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
            }
            return $rec;*/

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    
    
    public function mostrarCumplimientosPorUsuario($usuario){
        try{
            $query="SELECT tbcumplimientos.CLAVE_CUMPLIMIENTO FROM USUARIOS  JOIN CUMPLIMIENTOS tbcumplimientos ON usuarios.ID_USUARIO=tbcumplimientos.ID_USUARIO where usuarios.NOMBRE_USUARIO='$usuario'";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    
    public function insertarCumplimientos($clave_cumplimiento,$cumplimiento){
        
        try{
            $query="INSERT INTO CUMPLIMIENTOS(ID_CUMPLIMIENTO,CLAVE_CUMPLIMIENTO,CUMPLIMIENTO)VALUES('$clave_cumplimiento','$cumplimiento')";
            $db=  AccesoDB::getInstancia();
            $db->executeQuery($query);
//            $rec=$lista[0];
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
//    public function actualizarEmpleado($Id_Empleado,$Nombre,$Apellido_Paterno,$Apellido_Materno,$Categoria,$Correo){
    public function actualizarEmpleado($id_cumplimiento,$clave_cumplimiento,$cumplimiento){
        try{
//            $query="UPDATE EMPLEADOS SET NOMBRE_EMPLEADO='$Nombre',APELLIDO_PATERNO='$Apellido_Paterno',APELLIDO_MATERNO='$Apellido_Materno',CORREO='$Correo'";
             $query="UPDATE CUMPLIMIENTOS SET CLAVE_CUMPLIMIENTO='$clave_cumplimiento', CUMPLIMIENTO='$cumplimiento' WHERE ID_CUMPLIMIENTO=$id_cumplimiento";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    public function eliminarEmpleado($id_cumplimiento){
        try{
            $query="DELETE FROM CUMPLIMIENTOS WHERE ID_CUMPLIMIENTO=$id_cumplimiento";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            return $lista[0];
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
