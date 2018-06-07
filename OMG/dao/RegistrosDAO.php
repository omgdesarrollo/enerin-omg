<?php
require_once '../ds/AccesoDB.php';

class RegistrosDAO
{
    
    public function mostrarRegistros ($cadena)
    {
        try
        {
            $query="SELECT tbregistros.id_registro, tbregistros.registro

                    FROM registros tbregistros

                    WHERE tbregistros.registro like '%$cadena%'";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function insertarRegistros($registro)
    {
        try
        {
            $query="INSERT INTO registros(id_registro,registro)

                    VALUES (null,'$registro');";
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    
}


?>
