<?php
require_once '../Model/CatalogoProcesosModel.php';
class SeleccionConceptoReporteModel {
    //put your code here
    
    
        public function  evaluarVista($value,$tipo_catalogo_o_reporte){       
        $modelCatalogoProcesosModel= new CatalogoProcesosModel();
        $vista=$modelCatalogoProcesosModel->obtenerVista_Concepto_Seleccionado($value) ;
        $vista["vistaHtml"]="";
            switch ($tipo_catalogo_o_reporte){
            case "catalogo":
                switch($vista["vista"]){
                    case "Catalogo_Produccion": 
                       $vista["vistaHtml"]="#catalogoProcesos";
                       return $vista;
                    break;

                    default :
                        return "D:";
                }    
            break;
            case "reporte":
                switch($vista["vista"]){
                    case "Catalogo_Produccion": 
                       $vista["vistaHtml"]="#reporteProduccion";
                       return $vista;
                    break;

                    default :
                        return "D:";
                    }  
            default:
            break;
        }
       
        
    }
}
