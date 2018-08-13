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

    public function actualizar($TABLA,$COLUMNAS_VALOR,$ID_CONTEXTO,$REGION)
    {
        try
        {
            $dao=new CatalogoProcesosDAO();
            $query="";
            $query2= "";
            $index=0;
            $index2=0;
            $update=-1;
            $update2=-1;
            foreach($COLUMNAS_VALOR as $key=>$value)
            {
                if($key != "clave_contrato" && $key != "region_fiscal")
                {
                    if($index!=0)
                    {
                        $query .= " , ";
                    }
                        $query .= $key ."= '".utf8_decode( $value )."'";
                    $index++;
                }
                else
                {
                    if($index2!=0)
                        $query2 .= " , ";
                    $query2 .= "$key = '".utf8_decode( $value )."'";
                    $index2=1;
                }
            }
            if($query!="")
            {
                $query = "UPDATE $TABLA SET ".$query;
                foreach($ID_CONTEXTO as $key=>$value)
                {
                    $query .= " WHERE $key = '".utf8_decode( $value )."'";
                }
                $update = $dao->actualizar($query);
                $update != 0 ? 1 : 0;
            }
            if($query2!="")
            {
                $query2 = "UPDATE $TABLA SET ".$query2;
                $query2 .= " WHERE region_fiscal = '".utf8_decode( $REGION )."'";
                // $update ? $dao->listarQuery(" SELECT * FROM  ");// listar todos lo que tengan la region fiscal
                $update2 = $dao->actualizar($query2);
                // if($update2!=0)?$dao->
            }
            return $update==-1 ? $update2!=0 ? 2 : -2 : $update==0 ? $update2!=0 ? 3 : -3 : $update2!=0 ? 4 : -4;//2 se hizo el segundo, 3 no se hizo el primero solo el segundo, 4 se hizo todo
        }catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }    
    }
}
?>
