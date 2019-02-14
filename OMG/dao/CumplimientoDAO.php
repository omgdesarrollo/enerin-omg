<?php

require_once '../ds/AccesoDB.php';
class CumplimientoDAO
{
    // lista contratos (cumplimientos) de acuerdo al identificador de usuario ($ID_USUARIO)
    public function mostrarCumplimientos($ID_USUARIO)
    {
        try
        {
            $query="SELECT tbcumplimientos.id_cumplimiento, tbcumplimientos.clave_cumplimiento, 
                tbcumplimientos.cumplimiento,tbusuarios_cumplimientos.acceso
                FROM cumplimientos tbcumplimientos
                JOIN usuarios_cumplimientos tbusuarios_cumplimientos ON tbusuarios_cumplimientos.id_cumplimiento = tbcumplimientos.id_cumplimiento
                JOIN usuarios tbusuarios ON tbusuarios.id_usuario = tbusuarios_cumplimientos.id_usuario
                WHERE tbusuarios.id_usuario = $ID_USUARIO";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            return $lista;
        }  catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    // lista un registro de cumplimiento de acuerdo al identificador de cumplimiento (ID_CUMPLIMIENTO)
    public function mostrarCumplimiento($ID_CUMPLIMIENTO)
    {
        try
        {
            $query="SELECT tbcumplimientos.id_cumplimiento, tbcumplimientos.clave_cumplimiento, 
                    tbcumplimientos.cumplimiento
                    FROM cumplimientos tbcumplimientos
                    WHERE tbcumplimientos.id_cumplimiento=$ID_CUMPLIMIENTO";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);

            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return -1;
        }
    }
    
    // listar contratos (cumplimientos)
    public function mostrarCumplimientosComboBox(){
        try{
                        //$query="SELECT ID_CUMPLIMIENTO, CLAVE_CUMPLIMIENTO, CUMPLIMIENTO FROM CUMPLIMIENTOS";
                        $query="SELECT id_cumplimiento, clave_cumplimiento, cumplimiento FROM cumplimientos";
//            $query="SELECT ID_EMPLEADO  FROM EMPLEADOS";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            
            /*$rec = NULL;
            if (count($lista)==1){
                $rec=$lista[0];
            }
            return $rec;*/
            return $lista;
        }  catch (Exception $ex){
            //throw $rec;
            throw $ex;
        }
    }

    // lista informacion de un contrato (cumplimiento) de acuerdo al contrato ($v["contrato"])
    public function detallesContratoSeleccionado($v)
    {
        try{
            $query="SELECT tbcumplimientos.id_cumplimiento,tbcumplimientos.clave_cumplimiento,tbcumplimientos.cumplimiento 
                    FROM cumplimientos tbcumplimientos  
                    WHERE tbcumplimientos.id_cumplimiento=".$v["contrato"];
            $db= AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista[0];
        } catch (Exception $ex)
        {
        }
    }

    // lista clave cumplimiento de acuerdo al nombre de usuario ($usuario)
    public function mostrarCumplimientosPorUsuario($usuario)
    {
        try{
            //$query="SELECT tbcumplimientos.CLAVE_CUMPLIMIENTO FROM USUARIOS  JOIN CUMPLIMIENTOS tbcumplimientos ON usuarios.ID_USUARIO=tbcumplimientos.ID_USUARIO where usuarios.NOMBRE_USUARIO='$usuario'";
            $query="SELECT tbcumplimientos.clave_cumplimiento FROM usuarios  
            JOIN cumplimientos tbcumplimientos ON usuarios.id_usuario=tbcumplimientos.id_usuario where usuarios.nombre_usuario='$usuario'";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        } catch (Exception $ex) {
                throw $ex;
        }
    }
    
    // no se utiliza
    public function insertarCumplimientos($clave_cumplimiento,$cumplimiento)
    {
        try{
            $query="INSERT INTO cumplimientos(id_cumplimiento,clave_cumplimiento,cumplimiento)VALUES('$clave_cumplimiento','$cumplimiento')";
            $db=  AccesoDB::getInstancia();
            $db->executeQuery($query);
//            $rec=$lista[0];
//            return $rec;
        } catch (Exception $ex) {
                throw $ex;
        }   
    }
    
//    public function actualizarEmpleado($Id_Empleado,$Nombre,$Apellido_Paterno,$Apellido_Materno,$Categoria,$Correo){

    // actualiza un cumplimiento de acuerdo al identificador del cumplimiento ($id_cumplimiento)
    public function actualizarEmpleado($id_cumplimiento,$clave_cumplimiento,$cumplimiento)
    {
        try{
//            $query="UPDATE EMPLEADOS SET NOMBRE_EMPLEADO='$Nombre',APELLIDO_PATERNO='$Apellido_Paterno',APELLIDO_MATERNO='$Apellido_Materno',CORREO='$Correo'";
             $query="UPDATE cumplimientos SET clave_cumplimiento='$clave_cumplimiento', cumplimiento='$cumplimiento' WHERE id_cumplimiento=$id_cumplimiento";
     
            $db= AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            $db->executeQuery($query);
//            return $lista[0];
        } catch (Exception $ex) {
           throw $ex; 
        }
    }
    
    // lista contratos (cumplimientos) de acuerdo al identificador de usuario ($ID_USUARIO) y con acceso verdadero (true)
    public function obtenerContratosPorUsuarioPermiso($ID_USUARIO)
    {
        try
        {
            $query="SELECT tbusuarios_cumplimientos.id_cumplimiento, tbcumplimientos.clave_cumplimiento, tbcumplimientos.cumplimiento
                    FROM usuarios_cumplimientos tbusuarios_cumplimientos
                    JOIN cumplimientos tbcumplimientos ON tbcumplimientos.id_cumplimiento=tbusuarios_cumplimientos.id_cumplimiento
                    WHERE tbusuarios_cumplimientos.acceso='true' AND tbusuarios_cumplimientos.id_usuario=$ID_USUARIO";
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
            return $lista;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }

    // no se utiliza
    public function eliminarEmpleado($id_cumplimiento)
    {
        try{
            $query="DELETE FROM cumplimientos WHERE id_cumplimiento=$id_cumplimiento";
            $db=  AccesoDB::getInstancia();
            $db->executeQueryUpdate($query);
//            return $lista[0];
        } catch (Exception $ex) {
                throw $ex;
        }
    }
}
?>