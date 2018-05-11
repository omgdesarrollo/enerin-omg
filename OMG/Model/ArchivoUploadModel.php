<?php

require_once '../dao/ArchivoUploadDAO.php';

class ArchivoUploadModel{
    
    public function insertar_archivos($id_documento,$urls)
    {
        try
        {
            $dao = new ArchivoUploadDAO();
            // echo $urls;
            foreach($urls as $url)
            {
                // $rec = 
                $dao->insertar_archivos($id_documento,$url);
            }
            // return $rec;
        }catch(Exception $e)
        {
            throw $e;
        }
    }
    public function obtener_urls()
    {
        try
        {
            $dao = new ArchivoUploadDAO();
            $lista = $dao->listar_archivos($id_documento);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
        }
    }
}
?>
