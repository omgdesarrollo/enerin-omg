<?php
require_once '../ds/AccesoDB.php';
class EntidadReguladoraDAO{

    public function mostrarEntidadesReguladoras(){
        try{
            $query="SELECT ID_ENTIDAD ID_ENTIDAD, CLAVE_ENTIDAD, DESCRIPCION, DIRECCION, TELEFONO, EXTENSION, EMAIL,"
                 . "DIRECCION_WEB FROM ENTIDAD_REGULADORA";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    public function mostrarEntidadesReguladorasComboBox(){
        try{
            $query="SELECT ID_ENTIDAD ID_ENTIDAD, CLAVE_ENTIDAD, DESCRIPCION, DIRECCION, TELEFONO, EXTENSION, EMAIL,"
                 . "DIRECCION_WEB FROM ENTIDAD_REGULADORA";
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
    
    
    
    

    public function insertarEntidadReguladora($clave_entidad,$descripcion,$direccion,$telefono,$extension,$email,$direccion_web){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(ID_ENTIDAD)+1 as ID_ENTIDAD from ENTIDAD_REGULADORA";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
          
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_ENTIDAD"];
            }
            if($id_nuevo==NULL){
                $id_nuevo=0;
            }
            
            
            $query="INSERT INTO ENTIDAD_REGULADORA(ID_ENTIDAD, CLAVE_ENTIDAD, DESCRIPCION, DIRECCION, TELEFONO, EXTENSION, EMAIL, DIRECCION_WEB)"
                    . "VALUES($id_nuevo,'$clave_entidad','$descripcion','$direccion','$telefono','$extension','$email','$direccion_web')";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
/*
    public function actualizarEntidadReguladora($id_entidad,$clave_entidad,$descripcion,$direccion,$telefono,$extension,$email,$direccion_web){
        try{  
             $query="UPDATE ENTIDAD_REGULADORA SET CLAVE_ENTIDAD='$clave_entidad', DESCRIPCION='$descripcion', DIRECCION='$direccion', TELEFONO='$telefono', EXTENSION='$extension', EMAIL='$email', DIRECCION_WEB='$direccion_web' WHERE ID_ENTIDAD=$id_entidad";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
 */
    
    
    public function actualizarEntidadReguladoraPorColumna($COLUMNA,$VALOR,$id_entidad){
         
        try{
            $query="UPDATE ENTIDAD_REGULADORA SET ".$COLUMNA."='".$VALOR."'  WHERE ID_ENTIDAD=$id_entidad";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    public function eliminarEntidadReguladora($id_entidad){
        try{
            $query="DELETE FROM ENTIDAD_REGULADORA WHERE ID_ENTIDAD=$id_entidad";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
