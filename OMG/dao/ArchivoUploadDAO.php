<?php

require_once '../ds/AccesoDB.php';
class ArchivoUploadDAO
{
    // ya no se utilizar (JR)
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

    // ya no se utiliza (JR)
    public function listar_archivos($id_documento)
    {
        try
        {
            $query = "SELECT tab_documento_dir.DIR FROM documento_dir tab_documento_dir WHERE tab_documento_dir.ID_DOCUMENTO_ENTRADA = '$id_documento'";
            $db= AccesoDB::getInstancia();
            $lista = $db->executeQuery($query);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
        }
    }

    // ya no se utiliza (JR)
    public function eliminar_archivo($id_documento,$nombre_archivo)
    {
        try
        {
            $query = "DELETE FROM documento_dir WHERE id_documento_entrada = $id_documento AND dir = '$nombre_archivo' ";
            $db= AccesoDB::getInstancia();
            $res = $db->executeQueryUpdate($query);
            echo "delete res: ".$res;
            return $res;
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function obtener_limite_archivos()
    {
        try
        {
            $query = "SELECT tbmodulos.limite_archivos FROM modulos tbmodulos";
            $db= AccesoDB::getInstancia();
            $exito= $db->executeQuery($query);
            return $exito;
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
}
?>