<?php
require_once '../ds/AccesoDB.php';

class CatalogoProcesosDAO{
    
    
public function listarCatalogoProcesos()
{
    try
    {
        $query="SELECT tbcatalogo_procesos.id_catalogo, tbcatalogo_procesos.clave_contrato, tbcatalogo_procesos.region_fiscal, 
		 tbcatalogo_procesos.ubicacion_punto_medicion, tbcatalogo_procesos.tag_patin_medicion,
		 tbcatalogo_procesos.tipo_medidor,tbcatalogo_procesos.tag_medidor,
		 tbcatalogo_procesos.clasificacion_sistema_medicion, tbcatalogo_procesos.tipo_hidrocarburo
		 	
                FROM catalogo_procesos tbcatalogo_procesos";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);

        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


}


?>

