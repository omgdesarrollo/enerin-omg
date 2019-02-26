<?php

class SeguridadModel {


public function encriptarPassword($value){
  return md5($value["password"]); 
}



}
