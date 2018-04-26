<?php
require_once '../ds/AccesoDB.php';
class SeguimientoEntradaDAO{

    public function mostrarSeguimientoEntradas(){
        try{
            $query="SELECT TBSEGUIMIENTO_ENTRADA.ID_SEGUIMIENTO_ENTRADA, TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA, TBDOCUMENTO_ENTRADA.FOLIO_ENTRADA,
                    TBENTIDAD_REGULADORA.CLAVE_ENTIDAD, TBDOCUMENTO_ENTRADA.ASUNTO, TBEMPLEADOS.NOMBRE_EMPLEADO,
                    TBEMPLEADOS.ID_EMPLEADO, TBEMPLEADOS.APELLIDO_PATERNO, TBEMPLEADOS.APELLIDO_MATERNO,
		              TBDOCUMENTO_ENTRADA.FECHA_LIMITE_ATENCION, TBDOCUMENTO_ENTRADA.STATUS_DOC,TBDOCUMENTO_ENTRADA.DOCUMENTO,
                    TBDOCUMENTO_ENTRADA.OBSERVACIONES FROM SEGUIMIENTO_ENTRADA TBSEGUIMIENTO_ENTRADA
		 
                    JOIN   DOCUMENTO_ENTRADA TBDOCUMENTO_ENTRADA ON 
                    TBDOCUMENTO_ENTRADA.ID_DOCUMENTO_ENTRADA=TBSEGUIMIENTO_ENTRADA.ID_DOCUMENTO_ENTRADA
		 
                    JOIN ENTIDAD_REGULADORA TBENTIDAD_REGULADORA ON
                    TBENTIDAD_REGULADORA.ID_ENTIDAD=TBDOCUMENTO_ENTRADA.ID_ENTIDAD

                    JOIN CLAUSULAS TBCLAUSULAS ON TBCLAUSULAS.ID_CLAUSULA=TBDOCUMENTO_ENTRADA.ID_CLAUSULA

                    JOIN EMPLEADOS TBEMPLEADOS ON TBEMPLEADOS.ID_EMPLEADO=TBSEGUIMIENTO_ENTRADA.ID_EMPLEADO";


            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex){
        //throw $rec;
        throw $ex;
    }
    }
    
    
    public function insertar($id_documento_entrada){
        try{
             $query_obtenerMaximo_mas_uno="SELECT max(ID_SEGUIMIENTO_ENTRADA)+1 as ID_SEGUIMIENTO_ENTRADA from SEGUIMIENTO_ENTRADA";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo_seguimiento_entrada=0;
            
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo_seguimiento_entrada= $value["ID_SEGUIMIENTO_ENTRADA"];
            }
            
                                                                                                                                        
            
            $query="INSERT INTO SEGUIMIENTO_ENTRADA (ID_SEGUIMIENTO_ENTRADA,ID_DOCUMENTO_ENTRADA,ID_EMPLEADO)VALUES($id_nuevo_seguimiento_entrada,$id_documento_entrada,0)";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
         } catch (Exception $ex) {

        }
    }
    
    public function actualizarSeguimientoEntradaPorColumna($COLUMNA,$VALOR,$ID_SEGUIMIENTO_ENTRADA){
         
        try{
            $query="UPDATE SEGUIMIENTO_ENTRADA SET ".$COLUMNA."='".$VALOR."'  "
                 . "WHERE ID_SEGUIMIENTO_ENTRADA=$ID_SEGUIMIENTO_ENTRADA";
            
//             $query="UPDATE EMPLEADOS SET CORREO='$Correo' WHERE ID_EMPLEADO=$Id_Empleado";
     
            $db= AccesoDB::getInstancia();
           $result= $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    
    public function eliminarSeguimientoEntrada($id_seguimiento_entrada){
        try{
            $query="DELETE FROM SEGUIMIENTO_ENTRADA WHERE ID_SEGUIMIENTO_ENTRADA=$id_seguimiento_entrada";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}

?>
