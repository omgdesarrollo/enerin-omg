<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RequisitosPojo
 *
 * @author francisco
 */
class RequisitosPojo {
    //put your code here
    
    private $Id_Requisito;
    private $Clave_Requisito;
    private $Requisito;
    
    public function getIdRequisito(){
        return $this->Id_Requisito;
    }
    public function setIdRequisito($Id_Requisito){
        $this->Id_Requisito=$Id_Requisito;
    }
    public function getClaveRequisito(){
        return $this->Clave_Requisito;
    }
    public function setClaveRequisito($Clave_Requisito){
           $this->setClaveRequisito=$Clave_Requisito;
    }
    public function getRequisito(){
        $this->getRequisito();
    }
    public function setRequisito($Requisito){
        $this->Requisito=$Requisito;
    }
}
