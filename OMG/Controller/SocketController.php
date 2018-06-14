<?php


$Op=$_REQUEST["Op"];
    switch($Op){
        case "abrirConeccionSegundoPlano":
            
            $socket= socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
            socket_bind($socket,'0.0.0.0',65500);
            socket_listen($socket);
            echo "esperando coneccion";
            $con=false;
            switch(@socket_select($r = array($socket), $w = array($socket), $e = array($socket), 60)) 
            {
                case 2:
                echo "Conexión rechazada!\n\n";
                break;
                case 1:
                echo "Conexión aceptada!\n\n";
                $conn = @socket_accept($socket);
                break;
                case 0:
                echo "Tiempo de espera excedido!\n\n";
                break;
            }
            if ($conn !== false) {
                
            }
        break;
        
        case  "establecerConeccion":
            $host = "127.0.0.1";
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $puerto = 65500;

            if (socket_connect($socket, $host, $puerto))
            {
            echo "\nConexion Exitosa, puerto: " . $puerto;
            }
            else
            {
            echo "\nLa conexion TCP no se pudo realizar, puerto: ".$puerto;
            }
            socket_close($socket);
        break;
        
    }
    
    
    
?>
