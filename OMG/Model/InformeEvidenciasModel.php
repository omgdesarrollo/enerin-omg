<?php
 require_once '../dao/InformeEvidenciasDAO.php';

 class InformeEvidenciasModel{
     
     public function listarEvidencias($CONTRATO)
     {
         try
         {
             $dao=new InformeEvidenciasDAO();
             $lista= $dao->listarEvidencias($CONTRATO);
             
             return $lista;
         } catch (Exception $ex)
         {
             throw $ex;
             return false;
         }
     }
     
     public function obtenerTemayResponsable($ID_DOCUMENTO, $CONTRATO)
     {
         try
         {
             $dao=new InformeEvidenciasDAO();
             $lista= $dao->obtenerTemayResponsable($ID_DOCUMENTO, $CONTRATO);
             
             return $lista;
         } catch (Exception $ex)
         {
             throw $ex;
             return false;
         }
     }
     
     public function obtenerRequisitosporDocumento($ID_DOCUMENTO, $CONTRATO)
     {
         try
         {
             $dao=new InformeEvidenciasDAO();
             $lista= $dao->obtenerRequisitosporDocumento($ID_DOCUMENTO, $CONTRATO);
             
             return $lista;
         } catch (Exception $ex)
         {
             throw $ex;
             return false;
         }
     }
     
     public function obtenerRegistrosporDocumento ($ID_DOCUMENTO,$CONTRATO)
     {
         try
         {
             $dao=new InformeEvidenciasDAO();
             $lista= $dao->obtenerRegistrosporDocumento($ID_DOCUMENTO,$CONTRATO);
             
             return $lista;
         } catch (Exception $ex)
         {
             throw $ex;
             return false;
         }
     }
     
 }

?>

