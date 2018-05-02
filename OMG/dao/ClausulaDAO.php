<?php
require_once '../ds/AccesoDB.php';
class ClausulaDAO{

    public function mostrarClausulas(){
        try{
            $query="SELECT TBCLAUSULAS.ID_CLAUSULA ID_CLAUSULA, TBCLAUSULAS.CLAUSULA, TBCLAUSULAS.SUB_CLAUSULA,
                    TBCLAUSULAS.DESCRIPCION_CLAUSULA, TBCLAUSULAS.DESCRIPCION_SUB_CLAUSULA,TBEMPLEADOS.ID_EMPLEADO,
                    TBEMPLEADOS.NOMBRE_EMPLEADO, TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO,
                    TBCLAUSULAS.TEXTO_BREVE, TBCLAUSULAS.DESCRIPCION, TBCLAUSULAS.PLAZO
                    FROM CLAUSULAS TBCLAUSULAS

                    JOIN EMPLEADOS TBEMPLEADOS ON TBCLAUSULAS.ID_EMPLEADO=TBEMPLEADOS.ID_EMPLEADO";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }


    public function mostrarClausulasComboBox(){
        try{
            $query="SELECT ID_CLAUSULA, CLAUSULA, SUB_CLAUSULA, DESCRIPCION_CLAUSULA, DESCRIPCION_SUB_CLAUSULA FROM CLAUSULAS";
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

    
    public function insertarClausulas($clausula,$sub_clausula,$descripcion_clausula,
                                      $descripcion_sub_clausula,$texto_breve,$descripcion,
                                      $plazo,$id_empleado){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(ID_CLAUSULA)+1 as ID_CLAUSULA from CLAUSULAS";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["ID_CLAUSULA"];
            }
            
            $query="INSERT INTO CLAUSULAS (ID_CLAUSULA,CLAUSULA,SUB_CLAUSULA,DESCRIPCION_CLAUSULA, DESCRIPCION_SUB_CLAUSULA,
							  TEXTO_BREVE,DESCRIPCION,PLAZO,ID_EMPLEADO) 
							  
            VALUES ($id_nuevo,'$clausula','$sub_clausula','$descripcion_clausula', '$descripcion_sub_clausula','$texto_breve',
			 '$descripcion','$plazo', $id_empleado);";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    
    
    
    
    public function actualizarClausula($id_clausula,$clausula,$sub_clausula,$descripcion_clausula,
                                       $descripcion_sub_clausula,$texto_breve,$descripcion,$plazo,$requisito,$id_empleado){
        try{
             $query="UPDATE CLAUSULAS SET CLAUSULA='$clausula', SUB_CLAUSULA='$sub_clausula',"
                     . " DESCRIPCION_CLAUSULA='$descripcion_clausula',"
                     . " DESCRIPCION_SUB_CLAUSULA='$descripcion_sub_clausula', TEXTO_BREVE='$texto_breve',"
                     . " DESCRIPCION='$descripcion', PLAZO='$plazo', REQUISITO='$requisito', ID_EMPLEADO='$id_empleado'"
                     . " WHERE ID_CLAUSULA=$id_clausula";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    
    
    public function actualizarClausulaPorColumna($COLUMNA,$VALOR,$ID_CLAUSULA){
         
        try{
            $query="UPDATE CLAUSULAS SET ".$COLUMNA."='".$VALOR."'  WHERE ID_CLAUSULA=$ID_CLAUSULA";
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarClausula($id_clausula){
        try{
            $query="DELETE FROM CLAUSULAS WHERE ID_CLAUSULA=$id_clausula";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
