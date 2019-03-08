<?php
require_once '../ds/AccesoDB.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Clase para todo lo que tenga que ver con correo conmbinado con consultas hacia la base de datos
 *
 * @author francisco reyes vazconcelos fvazconcelos@enerin.mx
 */
class EmailDao {
    //put your code here  
    public function verificarUsuarioExiste($value){
        try
        {
         $list;
//            $query="select if(count(*)=0,false,true) as existeusuario from usuarios tbusuarios where tbusuarios.nombre_usuario='".$value["usuario"]."'";
            $query="select tbempleados.correo as correo from usuarios tbusuarios 
            join empleados tbempleados on tbempleados.id_empleado = tbusuarios.id_empleado  
            where tbusuarios.nombre_usuario='".$value["usuario"]."'";
//            echo json_encode("Entro al sql:".$query);
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
             if(empty($lista)){
                 $list[]=array("existeusuario"=>"0");
             }else{
                  $list[]=array("existeusuario"=>"1","correo"=>$lista[0]["correo"]);
//                  $list[]=;
             }
//        echo "Aqui entro:".json_encode($list);
            return $list;
            
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        } 
    }
    
     public function resetearPassword($value)
    {
        try
        {
            $query="UPDATE usuarios tbusuarios
                SET tbusuarios.contra= '".$value["correo"]."'"."
                WHERE tbusuarios.nombre_usuario='".$value["usuario"]."'";
            echo "query ".$query;
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            return $lista;
        }catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
    
    
    
}
