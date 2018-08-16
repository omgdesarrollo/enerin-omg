<?php
require_once '../Model/CatalogoProcesosModel.php';
class SeleccionConceptoReporteModel {
    //put your code here
    
    
        public function  evaluarVista($value){       
        $modelCatalogoProcesosModel= new CatalogoProcesosModel();
        $vista=$modelCatalogoProcesosModel->obtenerVista_Concepto_Seleccionado($value) ;
        $vista["vistaHtml"]="";
        switch($vista["vista"]){
            case "Catalogo_Produccion": 
               $vista["vistaHtml"]="#catalogoProcesos";
               return $vista;
            break;
            default :
                return "D:";
        }
        
    }
}
