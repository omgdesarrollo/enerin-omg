<?php
require_once '../ds/AccesoDB.php';
class EmpleadoDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarEmpleados(){
        try{
            $query="SELECT ID_EMPLEADO ID_EMPLEADO, NOMBRE_EMPLEADO, CATEGORIA, APELLIDO_PATERNO, APELLIDO_MATERNO, CORREO, FECHA_CREACION 
                            FROM EMPLEADOS ORDER BY NOMBRE_EMPLEADO  ";
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
            $query="SELECT ID_EMPLEADO, NOMBRE_EMPLEADO, APELLIDO_PATERNO, APELLIDO_MATERNO FROM EMPLEADOS";
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
            $query_obtenerMaximo_mas_uno="SELECT max(ID_EMPLEADO)+1 as ID_EMPLEADO from EMPLEADOS";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_EMPLEADO"];
            }
            $query=" INSERT INTO EMPLEADOS(ID_EMPLEADO,NOMBRE_EMPLEADO,CATEGORIA,APELLIDO_PATERNO,APELLIDO_MATERNO,CORREO)VALUES($id_nuevo,'$Nombre','$Categoria','$Apellido_Paterno','$Apellido_Materno','$Correo');";
            
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
            $query="UPDATE EMPLEADOS SET NOMBRE_EMPLEADO='$Nombre',APELLIDO_PATERNO='$Apellido_Paterno',APELLIDO_MATERNO='$Apellido_Materno',CORREO='$Correo',CATEGORIA='$Categoria' WHERE ID_EMPLEADO=$Id_Empleado";
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
            $query="UPDATE EMPLEADOS SET ".$COLUMNA."='".$VALOR."'  WHERE ID_EMPLEADO=$ID_EMPLEADO";
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
            $query="DELETE FROM EMPLEADOS WHERE ID_EMPLEADO=$Id_Empleado";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            return $lista[0];
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
