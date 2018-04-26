<?php

require_once '../ds/AccesoDB.php';
class RequisitoDAO{
    //consulta los datos de un empleado por su nombre de usuario
    public function mostrarRequisitos(){
        try{
            $query="SELECT ID_REQUISITO, CLAVE_REQUISITO, REQUISITO FROM REQUISITOS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
        
            return $lista;
    

    }  catch (Exception $e){
        throw $e;
    }
    }
}

?>
