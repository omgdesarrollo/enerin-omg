<?php

require_once '../dao/RegistrosDAO.php';


class RegistrosModel{
    
    public function  listarRegistros($cadena)
    {
        try
        {
            $dao=new RegistrosDAO();
            $rec= $dao->mostrarRegistros($cadena);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    public function generarDatosArbol($id_asignacion,$todo)
    {
        try
        {
            $datosArbol = array();
            $dao=new RegistrosDAO();
            $requisitos= $dao->obtenerRequisitos($id_asignacion);
            foreach($requisitos as $index=>$resultado)
            {
                $requisitos[$index][0] = $dao->obtenerRegistros($resultado['id_requisito']);
            }
            return $requisitos;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    

    public function insertar($registro)
    {
        try
        {
            $dao=new RegistrosDAO();
            $dao->insertarRegistros($registro);
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
}    

?>
