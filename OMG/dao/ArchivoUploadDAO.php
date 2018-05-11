<?php

require_once '../ds/AccesoDB.php';

class ArchivoUploadDAO
{
    public function insertar_archivos($id_documento,$url)
    {
        try
        {
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
    public function listar_archivos($id_documento)
    {
        try
        {
            $query = "SELECT tab_documento_dir.DIR FROM documento_dir tab_documento_dir where tab_documento_dir.ID_DOCUMENTO_ENTRADA = '$id_documento'";
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery();
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
        }
    }
}
?>