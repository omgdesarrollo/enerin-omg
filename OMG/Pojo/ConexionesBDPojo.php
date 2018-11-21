<?php

class ConexionesBDPojo {

    
//conexion local
    private static $dataLocal=array(
        "01"=>"localhost",
        "02"=>"root",
        "03"=>"",
        "04"=>"databaseomg",
        "05"=>"interno"
    );
//Conexion oficina
    private static $dataOficina=array(
        "01"=>"198.71.228.11",
        "02"=>"useromgbd",
        "03"=>"enerinomg1*:*",
        "04"=>"databaseomgoficina",
        "05"=>"oficina"
    );
    //Conexion Cliente asepro
     private static $dataCliente=array(
        "01"=>"198.71.228.11",
        "02"=>"useromgbd",
        "03"=>"enerinomg1*:*",
        "04"=>"databaseomgcliente",
        "05"=>"cliente"
    );
    //Conexion web cliente1
    private static $dataWeb1=array(
        "01"=>"198.71.228.11",
        "02"=>"useromgbd",
        "03"=>"enerinomg1*:*",
        "04"=>"databaseomgweb1",
        "05"=>"web1"
    );
   
    //Conexion web Cliente2
    private static $dataWeb2=array(
        "01"=>"198.71.228.11",
        "02"=>"useromgbd",
        "03"=>"enerinomg1*:*",
        "04"=>"databaseomgweb2",
        "05"=>"web2"
    );
    
    public static function dataBD($valueBD){
        if($valueBD=="interno"){
         return self::$dataLocal;
        }
        if($valueBD=="oficina"){
         return self::$dataOficina;
        }
        if($valueBD=="cliente"){
         return self::$dataCliente;
        }
        if($valueBD=="web1"){
         return self::$dataWeb1;
        }
        if($valueBD=="web2"){
         return self::$dataWeb2;
        }
    }
    
    
    
    
    
}
