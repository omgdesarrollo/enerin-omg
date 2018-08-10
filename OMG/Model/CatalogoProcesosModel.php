<?php
require_once '../dao/CatalogoProcesosDAO.php';

class CatalogoProcesosModel{

    public function listarCatalogo($CONTRATO)
    {
        try
        {
            $dao=new CatalogoProcesosDAO();
            $lista= $dao->listarCatalogo($CONTRATO);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function listarUno($ID_CONTRATO)
    {
        try
        {
            $dao=new CatalogoProcesosDAO();
            $lista= $dao->listarUno($ID_CONTRATO);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function guardarCatalogo($CONTRATO,$DATOS)
    {
        try
        {
            $dao=new CatalogoProcesosDAO();
            // INSERT INTO asignacion_tema_requisito(id_asignacion_tema_requisito,id_clausula,requisito,id_documento)"
            // . "VALUES($id_nuevo,$id_clausula,'$requisito',$id_documento)";
            $bandera=0;
            $query = "INSERT INTO catalogo_reporte(";
            $queryC = "";
            $queryV = "VALUES(";
            foreach($DATOS as $key=>$value)
            {
                if($bandera!=0)
                {
                    $queryC.=",";
                    $queryV.=",";
                }
                $queryC.=$key;
                $queryV.= "'$value'";
                $bandera=1;
            }

            $query .= $queryC.",contrato) ".$queryV.",$CONTRATO)";
            $exito = $dao->guardarCatalogo($query);
            return $exito;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function buscarID($CADENA,$CONTRATO)
    {
        try
        {
            $dao = new CatalogoProcesosDAO();
            $lista = $dao->buscarID($CADENA,$CONTRATO);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function buscarRegionesFiscales($CONTRATO)
    {
        try
        {
            $dao = new CatalogoProcesosDAO();
            $lista = $dao->buscarRegionesFiscales($CONTRATO);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function buscarTagMedidor($CONTRATO,$TAG_MEDIDOR)
    {
        try
        {
            $dao = new CatalogoProcesosDAO();
            $exito = $dao->buscarTagMedidor($CONTRATO,$TAG_MEDIDOR);
            return $exito;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }

    public function eliminarRegistro($ID_CONTRATO)
    {
        try
        {
            $dao = new CatalogoProcesosDAO();
            $permiso = $dao->permisoDeEliminar($ID_CONTRATO);
            $exito = 0;
            if($permiso == 0)
            {
                $exito = $dao->eliminarRegistro($ID_CONTRATO);
                if($exito != 1 )
                    $exito = -3;
            }
            else
                $exito = -2;
            return $exito;
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
}
?>
