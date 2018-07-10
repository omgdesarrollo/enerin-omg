<?php
require_once '../ds/AccesoDB.php';
class AutoridadRemitenteDAO{

    public function mostrarAutoridadesRemitentes()
    {
        try{
                        
            $query="SELECT id_autoridad, clave_autoridad, descripcion, direccion, telefono, extension, 
		           email,direccion_web FROM autoridad_remitente";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            

            return $lista;
    }  catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
    }
    
    
    public function listarAutoridadRemitente($ID_AUTORIDAD)
    {
        try
        {
            $query="SELECT autoridad_remitente.id_autoridad, autoridad_remitente.clave_autoridad, autoridad_remitente.descripcion,
                            autoridad_remitente.direccion, autoridad_remitente.telefono, autoridad_remitente.extension, 
                            autoridad_remitente.email, autoridad_remitente.direccion_web	
                    FROM autoridad_remitente
                    WHERE autoridad_remitente.id_autoridad=$ID_AUTORIDAD";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }




    public function mostrarAutoridadesRemitentesComboBox()
    {
        try{
                        
            $query="SELECT id_autoridad, clave_autoridad, descripcion, direccion, telefono, extension, 
		           email,direccion_web FROM autoridad_remitente";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
    }  catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
    }
    

    public function insertarAutoridadRemitente($clave_autoridad,$descripcion,$direccion,$telefono,$extension,$email,$direccion_web)
    {
        
        try{
            
            $query_obtenerMaximo_mas_uno="SELECT max(id_autoridad)+1 as id_autoridad from autoridad_remitente";
            $db_obtenerMaximo_mas_uno=AccesoDB::getInstancia();
            $lista_id_nuevo_autoincrementado=$db_obtenerMaximo_mas_uno->executeQuery($query_obtenerMaximo_mas_uno);
            $id_nuevo=0;
          
            foreach ($lista_id_nuevo_autoincrementado as $value) {
               $id_nuevo= $value["id_autoridad"];
            }
            
            if($id_nuevo==NULL){
                $id_nuevo=0;
            }
                        
            $query="INSERT INTO autoridad_remitente(id_autoridad, clave_autoridad, descripcion, direccion, telefono, extension, email, direccion_web)"
                    . "VALUES($id_nuevo,'$clave_autoridad','$descripcion','$direccion','$telefono','$extension','$email','$direccion_web')";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }   
    }
    
    public function actualizarAutoridadRemitentePorColumna($COLUMNA,$VALOR,$id_autoridad)
    {
         
        try{
            $query="UPDATE autoridad_remitente SET ".$COLUMNA."='".$VALOR."'  WHERE id_autoridad=$id_autoridad";
     
            $db= AccesoDB::getInstancia();
            $result= $db->executeQueryUpdate($query);

        } catch (Exception $ex) 
        {
           throw $ex;
           return false;
        }
    }
    
    public function eliminarAutoridadRemitente($id_autoridad)
    {
        try{
            $query="DELETE FROM autoridad_remitente WHERE id_autoridad=$id_autoridad";
            
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
            
        } catch (Exception $ex) 
        {
            throw $ex;
            return false;
        }
    }
}

?>
