<?php
require_once '../dao/ConsultasDAO.php';

class ConsultasModel{
    
    public function ListarConsultas($CONTRATO)
    {
        try
        {
            $dao=new ConsultasDAO();
            $rec= $dao->ListarConsultas($CONTRATO);
            
            return $rec;
        } catch (Exception $ex)
        {
            throw $ex;
            return-1;
        }
    }
    
}


?>