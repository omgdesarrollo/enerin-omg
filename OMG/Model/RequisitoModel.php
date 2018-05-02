<?php

require_once '../dao/RequisitoDAO.php';

class RequisitoModel{
    //valida los datos del usuario.
    //retorna el registro del usuario como un arreglo asociativo
    public function  listarRequisitos() {
        try{
            $dao=new RequisitoDAO();
            $rec=$dao->mostrarRequisitos();
            

            
            return $rec;
    }  catch (Exception $e){
        throw  $e;
    }
    }
}

?>