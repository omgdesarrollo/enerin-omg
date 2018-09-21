<?php

require_once '../dao/TemaDAO.php';
require_once '../dao/EmpleadoDAO.php';
class TemaModel{
    
    
    public function  mostrarTemas($cadena,$contrato)
    {
        try
        {
            $dao=new TemaDAO();
            $rec=$dao->mostrarTemas($cadena,$contrato);                       
            
            $resultadoArbol;
            $contador=0;
            foreach ($rec as $value)
            {  
                $resultadoArbol[$contador]=array($value['id_tema'],$value['padre'],$value['no']."-".$value['nombre']);                
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
    
    
    public function listarTemasComboBox($cadena, $contrato)
    {
        try
        {
            $dao=new TemaDAO();
            $lista= $dao->mostrarTemasComboBox($cadena, $contrato);
            
            return $lista;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }




    public function listarHijos($CADENA,$CONTRATO,$ID)
    {
        try
        {
            $dao= new TemaDAO();
            $daoEmpleado=new EmpleadoDAO();
            $rec['datosHijos']= $dao->listarHijos($CADENA,$CONTRATO,$ID);
            $rec['detalles']= $dao->listarDetallesSeleccionados($ID);
            $rec['comboEmpleados']=$daoEmpleado->mostrarEmpleadosComboBox();
            return $rec;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    public function insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR,$CONTRATO)
    {
        try
        {
            $dao=new TemaDAO();
            $rec= $dao->insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR,$CONTRATO);
            
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
    
    
    public function eliminarNodoParaOficios($ID)
    {
        try
        {
            $dao=new TemaDAO();
            $resultado= $dao->verificarSiTemaEstaEnDocumentoDeEntrada($ID);
            $rec=false;
//            echo "este es el resultado: ". json_encode($resultado);
            if($resultado==0)
            {
                $rec= $dao->eliminarNodo($ID);
                $rec=true;
            }
            
            return $rec;            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    
}

?>