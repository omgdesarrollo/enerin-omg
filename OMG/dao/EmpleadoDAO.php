<?php
require_once '../ds/AccesoDB.php';
class EmpleadoDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarEmpleados(){
        try{
//            $query="SELECT ID_EMPLEADO, NOMBRE_EMPLEADO, CATEGORIA, APELLIDO_PATERNO, APELLIDO_MATERNO, CORREO, FECHA_CREACION 
//                            FROM EMPLEADOS ORDER BY NOMBRE_EMPLEADO";

              $query="SELECT id_empleado, nombre_empleado, categoria, apellido_paterno, apellido_materno, correo, fecha_creacion 
                            FROM empleados order by nombre_empleado";            


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
    
    public function mostrarEmpleadosComboBox(){
        try{
            $query="SELECT id_empleado, nombre_empleado, apellido_paterno, apellido_materno FROM empleados";
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
    
    
    
    public function insertarEmpleados($Nombre,$Categoria,$Apellido_Paterno,$Apellido_Materno,$Correo){
        
        try{
            
//            $query="INSERT INTO EMPLEADOS(ID_EMPLEADO,NOMBRE_EMPLEADO,CATEGORIA,APELLIDO_PATERNO,APELLIDO_MATERNO,CORREO,FECHA_CREACION)VALUES('$Nombre','$Categoria','$Apellido_Paterno','$Apellido_Materno','$Correo')";
            $query_obtenerMaximo_mas_uno="SELECT max(id_empleado)+1 as id_empleado from empleados";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_empleado"];
            }
            $query="INSERT INTO empleados(id_empleado,nombre_empleado,categoria,apellido_paterno,apellido_materno,correo)VALUES($id_nuevo,'$Nombre','$Categoria','$Apellido_Paterno','$Apellido_Materno','$Correo');";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            $rec=$lista[0];
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    public function actualizarEmpleado($Id_Empleado,$Nombre,$Apellido_Paterno,$Apellido_Materno,$Categoria,$Correo){
//    public function actualizarEmpleado($Id_Empleado,$Correo){
        try{
            $query="UPDATE empleados SET nombre_empleado='$Nombre',apellido_paterno='$Apellido_Paterno',apellido_materno='$Apellido_Materno',correo='$Correo',categoria='$Categoria' WHERE id_empleado=$Id_Empleado";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    public function actualizarEmpleadoPorColumna($COLUMNA,$VALOR,$ID_EMPLEADO){
         try{
            $query="UPDATE empleados SET ".$COLUMNA."='".$VALOR."'  WHERE id_empleado=$ID_EMPLEADO";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    public function eliminarEmpleado($Id_Empleado){
        try{
            $query="DELETE FROM empleados WHERE id_empleado=$Id_Empleado";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            return $lista[0];
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
