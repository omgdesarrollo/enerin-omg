<?php

require_once '../ds/AccesoDB.php';

class ArchivoUploadDAO
{
    public function insertar_archivos($id_documento,$url)
    {
        try{
            
            $query = "INSERT INTO documento_dir (id_documento_entrada, dir) VALUES ('$id_documento', '$url')";
            $db=  AccesoDB::getInstancia();
            // $lista=
            $db->executeQueryUpdate($query);
            
            // return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
        }
    }
    public function listar_archivos()
    {

    }
}
?>