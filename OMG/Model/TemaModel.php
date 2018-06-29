<?php

require_once '../dao/TemaDAO.php';

class TemaModel{
    
    
    public function  mostrarTemas($cadena)
    {
        try
        {
            $dao=new TemaDAO();
            $rec=$dao->mostrarTemas($cadena);                       
            
            $resultadoArbol;
            $contador=0;
            foreach ($rec as $value)
            {
                
            $resultadoArbol[$contador]=
                array($value['id_tema'],$value['padre'],$value['no']."-".$value['nombre']);                
                $contador++;
            }    
            if($contador!=0)
            return $resultadoArbol;
            else
                return "";
        }  catch (Exception $e)
        {
            throw  $e;
        }
    }
  
    
    public function listarHijos($ID)
    {
        try
        {
            $dao= new TemaDAO();
            $rec['datosHijos']= $dao->listarHijos($ID);
            $rec['detalles']= $dao->listarDetallesSeleccionados($ID);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
   
    public function insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR)
    {
        try
        {
            $dao=new TemaDAO();
            $rec= $dao->insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;        
        }
    }
    
    
    public function eliminarNodo($ID)
    {
        try
        {
            $dao=new TemaDAO();
            $rec= $dao->eliminarNodo($ID);
            
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
}

?>