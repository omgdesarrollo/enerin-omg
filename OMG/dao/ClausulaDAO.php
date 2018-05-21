<?php
require_once '../ds/AccesoDB.php';
class ClausulaDAO{

    public function mostrarClausulas(){
        try{
//            $query="SELECT TBCLAUSULAS.ID_CLAUSULA ID_CLAUSULA, TBCLAUSULAS.CLAUSULA, TBCLAUSULAS.SUB_CLAUSULA,
//                    TBCLAUSULAS.DESCRIPCION_CLAUSULA, TBCLAUSULAS.DESCRIPCION_SUB_CLAUSULA,TBEMPLEADOS.ID_EMPLEADO,
//                    TBEMPLEADOS.NOMBRE_EMPLEADO, TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO,
//                    TBCLAUSULAS.TEXTO_BREVE, TBCLAUSULAS.DESCRIPCION, TBCLAUSULAS.PLAZO
//                    FROM CLAUSULAS TBCLAUSULAS
//
//                    JOIN EMPLEADOS TBEMPLEADOS ON TBCLAUSULAS.ID_EMPLEADO=TBEMPLEADOS.ID_EMPLEADO";
            
            
            $query="SELECT tbclausulas.id_clausula id_clausula, tbclausulas.clausula, tbclausulas.sub_clausula,
                    tbclausulas.descripcion_clausula, tbclausulas.descripcion_sub_clausula,tbempleados.id_empleado,
                    tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno,
                    tbclausulas.descripcion, tbclausulas.plazo
                    FROM clausulas tbclausulas

                    JOIN empleados tbempleados ON tbclausulas.id_empleado=tbempleados.id_empleado ORDER BY  cast(tbclausulas.clausula  as unsigned )";
            
            
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
            $query="SELECT id_clausula, clausula, sub_clausula, descripcion_clausula, descripcion_sub_clausula FROM clausulas GROUP BY clausula ORDER BY clausula ASC";
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
public function loadAutoComplete($cadena){
    try{
            $query="SELECT tbclausulas.sub_clausula,tbclausulas.descripcion_clausula FROM clausulas tbclausulas WHERE tbclausulas.clausula  like '$cadena%'";

            
//            $query="SELECT ID_EMPLEADO  FROM EMPLEADOS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
        
            return $lista;
            
    } catch (Exception $ex) {

    }
}
    
    
    
    
    public function insertarClausulas($clausula,$sub_clausula,$descripcion_clausula,
                                      $descripcion_sub_clausula,$descripcion,
                                      $plazo,$id_empleado){
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(id_clausula)+1 as id_clausula FROM clausulas";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_clausula"];
            }
             if($id_nuevo==NULL){
                $id_nuevo=0;
            }
//            $query="INSERT INTO CLAUSULAS (ID_CLAUSULA,CLAUSULA,SUB_CLAUSULA,DESCRIPCION_CLAUSULA, DESCRIPCION_SUB_CLAUSULA,
//							  TEXTO_BREVE,DESCRIPCION,PLAZO,ID_EMPLEADO)
                                                          

            $query="INSERT INTO clausulas (id_clausula,clausula,sub_clausula,descripcion_clausula, descripcion_sub_clausula,
                                           descripcion,plazo,id_empleado)
                                                          
							  
            VALUES ($id_nuevo,'$clausula','$sub_clausula','$descripcion_clausula', '$descripcion_sub_clausula',
		   '$descripcion','$plazo', $id_empleado);";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
    
    
    
    
    public function actualizarClausula($id_clausula,$clausula,$sub_clausula,$descripcion_clausula,
                                       $descripcion_sub_clausula,$descripcion,$plazo,$requisito,$id_empleado){
        try{
             $query="UPDATE clausulas SET clausula='$clausula', sub_clausula='$sub_clausula',"
                     . " descripcion_clausula='$descripcion_clausula',"
                     . " descripcion_sub_clausula='$descripcion_sub_clausula',"
                     . " descripcion='$descripcion', plazo='$plazo', REQUISITO='$requisito', id_empleado='$id_empleado'"
                     . " WHERE id_clausula=$id_clausula";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
           throw $ex; 
        }
        
    }
    
    
    
    public function actualizarClausulaPorColumna($COLUMNA,$VALOR,$ID_CLAUSULA){
         
        try{
            $query="UPDATE clausulas SET ".$COLUMNA."='".$VALOR."'  WHERE id_clausula=$ID_CLAUSULA";
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
            $query="DELETE FROM clausulas WHERE id_clausula=$id_clausula";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
