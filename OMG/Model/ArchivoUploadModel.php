<?php

require_once '../dao/ArchivoUploadDAO.php';
require_once 'DocumentoEntradaModel.php';

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
    public function obtener_urls($id_documento)
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
    public function eliminar_archivo($id_documento,$nombre_archivo)
    {
        try
        {
            $dao = new ArchivoUploadDAO();
            $res = $dao->eliminar_archivo($id_documento,$nombre_archivo);
            return $res;
        }catch(Exception $ex)
        {
            throw $ex;
        }
    }
    public function eliminar_archivoFisico($id_documento,$nombre_archivo,$data)
    {
        if($data==true)
        {
            $model=new DocumentoEntradaModel();
            $value;
            $id_cumplimientos = $model->getIdCumplimiento($id_documento);
            foreach($id_cumplimientos as $value)
            {}
            $url = 'C:xampp/htdocs/enerin-omg/archivos/files/'.$value['ID_CUMPLIMIENTO'].'/'.$id_documento.'/'.$nombre_archivo;//Cambiar ruta del servidor a local y viceversa
            // echo "mostrando url: ".$url;
            $data = unlink($url);
        }
        return $data;
    }
}
?>
