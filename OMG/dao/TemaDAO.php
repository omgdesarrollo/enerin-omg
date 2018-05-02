<?php
require_once '../ds/AccesoDB.php';
class TemaDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarTemas(){
        try{
            $query="SELECT ID_TEMA \"ID_TEMA\", CODIGO_TEMA, TEMA FROM TEMAS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        }catch (Exception $e){
        //throw $rec;
        throw $e;
    }
    }
    
    public function insertarTemas($codigo_tema,$tema){
        
        try{
            $query="INSERT INTO TEMAS(ID_TEMA,CODIGO_TEMA, TEMA)VALUES('$codigo_tema','$tema')";
            $db=  AccesoDB::getInstancia();
            $db->executeQuery($query);
//            $rec=$lista[0];
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
   
    /*
    public function actualizarTema($id_tema,$codigo_tema,$tema){
//    public function actualizarEmpleado($Id_Empleado,$Correo){
        try{
            $query="UPDATE TEMAS SET CODIGO_TEMA='$codigo_tema',TEMA='$tema' WHERE ID_TEMA=$id_tema";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
     */
    
    
    public function actualizarTemaPorColumna($COLUMNA,$VALOR,$id_tema){
         
        try{
            $query="UPDATE TEMAS SET ".$COLUMNA."='".$VALOR."'  WHERE ID_TEMA=$id_tema";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarTema($id_tema){
        try{
            $query="DELETE FROM TEMAS WHERE ID_TEMA=$id_tema";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            return $lista[0];
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
}

?>
