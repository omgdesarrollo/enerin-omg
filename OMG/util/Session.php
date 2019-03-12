<?php


class Session{
    public static function  existeSesion($name){
        $rpta=FALSE;
        if(isset($_SESSION[$name])){
            $rpta=true;
        }
        return $rpta;
    } 
    //veifica si no existe una secion
    public static function NoExisteSesion($name){
        $rpta=TRUE;
        if(isset($_SESSION[$name])){
            $rpta=false;
        }
        return $rpta;
    }
    //retorna el valor de un atributo de sesion
    public static function getSesion($name){
        $value=NULL;
        if(self::existeSesion($name)){
            $value=$_SESSION[$name];
        }else{
//            echo "<script> window.parent.location.href='login.php';</script>";
//            echo "<script> window.location.href='SessionExpiroView.php';</script>";
            header('Location:../View/SessionExpiroView.php');
            exit();
        }
        return $value;
    }
    //Retorna el valor de un atributo de sesion y lo elimina
    public static function eliminarSesion($name){
        $value=NULL;
        if (self::existeSesion($name)){
            $value=$_SESSION[$name];
            self:: removeSesion($name);
        }
        return $value;
    }
    //guarda un atributo en sesion
    public static function  setSesion($name,$value){
        $_SESSION[$name]=$value;
    }
    //elimina un atributo de sesion
    public static function removeSesion($name){
        unset($_SESSION[$name]);
    }
}
?>


