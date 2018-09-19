<?php

require_once '../dao/ControlTemasDAO.php';

class ControlTemasModel {
    //put your code here
    
    public function listarTemas($CONTRATO, $CADENA)
    {
        try 
        {
            $dao= new ControlTemasDAO();
            $rec= $dao->listarTemas($CONTRATO, $CADENA);
            
            return $rec;
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    
}

?>
