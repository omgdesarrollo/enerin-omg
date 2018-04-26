<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmpleadoPojo
 *
 * @author francisco
 */
class EntidadReguladoraPojo {
    //put your code here
    private $id_entidad;
    private $clave_entidad='';
    private $descripcion='';
    private $direccion='';
    private $telefono='';
    private $extension='';
    private $email='';
    private $direccion_web='';

     
    
    public function getIdEntidad(){
        return $this->Id_Entidad;
    } 
    public function setIdEntidad($id_entidad){
        $this->Id_Entidad=$id_entidad;
    }


    public function getClaveEntidad(){
        return $this->Clave_Entidad;
    }
    public function setClaveEntidad($clave_entidad){
        $this->Clave_Entidad=$clave_entidad;
    }


    public function getDescripcion(){
        return $this->Descripcion;
    }
    public function setDescripcion($descripcion){
       $this->Descripcion=$descripcion;
    }


    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
       $this->Direccion=$direccion;
    }


    public function getTelefono(){
        return $this->Telefono;
    }
    public function setTelefono($telefono){
       $this->Telefono=$telefono;
    }


    public function getExtension(){
        return $this->Extension;
    }
    public function setExtension($extension){
       $this->Extension=$extension;
    }


    public function getEmail(){
        return $this->Email;
    }
    public function setEmail($email){
       $this->Email=$email;
    }


    public function getDireccionWeb(){
        return $this->Direccion_Web;
    }
    public function setDireccionWeb($direccion_web){
       $this->Direccion_Web=$direccion_web;
    }

}
