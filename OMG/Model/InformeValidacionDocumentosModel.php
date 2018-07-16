<?php
require_once '../dao/InformeValidacionDocumentosDAO.php';

class InformeValidacionDocumentosModel{
        
    public function listarValidaciones($v)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $lista["info"]= $dao->listarValidaciones($v);
            $lista["detallesContrato"]=$dao->obtenerContratos($v["param"]["contrato"]);
//          echo "con ".json_encode($contratos);  
//            $categoria=array();
//            $valores=array();
//            $principal = array($categoria,$valores);
//
//            array_push($principal[0],"tipo");
//            array_push($principal[1],"pordia","porhora");
//            array_push($array, $contratos);
            
//            
//            $resultado;
//            foreach($lista as $value)
//            {
//                $list["descripcion_contratos"]= $dao->obtenerContratos($value['id_cumplimiento']);
////            $lista['']= $list;
//                echo "list ".json_encode($list); 
//            }                                    
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    public function obtenerTemayResponsable($id_documento){
        try{
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerTemayResponsable($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){            
            throw $ex;
            return false;
        }
        
        
    }
    
    
    public function  obtenerRequisitosporDocumento($id_documento)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerRequisitosporDocumento($id_documento);
         
            return $rec;
        } catch (Exception $ex){
            throw  $ex;
            return false;
        }
    }
    
    public function obtenerRegistrosPorDocumento($id_documento)
    {
        try
        {
            $dao=new InformeValidacionDocumentosDAO();
            $rec=$dao->obtenerRegistrosPorDocumento($id_documento);
            
            return $rec;
            
        } catch (Exception $ex){
            throw $ex;
            return false;
        }
    }
    
    
}

?>

