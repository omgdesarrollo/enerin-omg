<?php
require_once '../Model/CatalogoProcesosModel.php';
class SeleccionConceptoReporteModel {
    //put your code here
    
    
        public function  evaluarVista($value){       
        $modelCatalogoProcesosModel= new CatalogoProcesosModel();
        $vista=$modelCatalogoProcesosModel->obtenerVista_Concepto_Seleccionado($value) ;
        
////        echo "d".$vista;
//        echo "d".json_encode($vista);
        switch($vista["vista"]){
            case "Catalogo_Produccion":
                echo "e";
            break;
        }
        
    }
}
