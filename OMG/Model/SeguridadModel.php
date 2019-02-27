<?php

class SeguridadModel {


public function encriptarPassword($value){
  return sha1(md5($value["password"])); 
}
}
