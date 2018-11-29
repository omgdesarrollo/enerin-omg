<?php
require_once '../ds/AccesoDB.php';

class TemaDAO{
    

   
public function mostrarTemas($cadena,$contrato)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo, tbtemas.padre,
		tbtemas.identificador,tbtemas.padre_general,tbtemas.responsable_general
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.identificador LIKE '%$cadena%'    and  tbtemas.contrato=$contrato ORDER BY cast(NO as UNSIGNED) ";
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;
    }catch (Exception $ex)
    {       
        throw $ex;
        return false;
    }
}


public function mostrarTemasComboBox($cadena,$contrato)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion
                FROM temas tbtemas
                WHERE tbtemas.PADRE=0 AND tbtemas.identificador LIKE '%$cadena%' AND tbtemas.contrato=$contrato";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


public function listarHijos($CADENA,$CONTRATO,$ID)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
		FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.identificador LIKE '%$CADENA%' AND tbtemas.contrato=$CONTRATO AND tbtemas.padre=$ID";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}

public function listarDetallesSeleccionados($ID)
{
    try
    {
        $query="SELECT tbtemas.id_tema, tbtemas.no, tbtemas.nombre, tbtemas.descripcion, tbtemas.plazo,
                tbempleados.id_empleado,tbempleados.nombre_empleado, tbempleados.apellido_paterno, tbempleados.apellido_materno	
                FROM temas tbtemas
                JOIN empleados tbempleados ON tbempleados.id_empleado=tbtemas.id_empleado
                WHERE tbtemas.id_tema=$ID";
        
        $db=  AccesoDB::getInstancia();
        $lista=$db->executeQuery($query);
        
        return $lista;
               
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}


public function insertarNodo($NO,$NOMBRE,$DESCRIPCION,$PLAZO,$NODO,$ID_EMPLEADO,$IDENTIFICADOR,$CONTRATO)
{
    try
    {
        $query="INSERT INTO temas (no,nombre,descripcion,plazo,padre,id_empleado,identificador,contrato) 
                VALUES ('$NO','$NOMBRE','$DESCRIPCION','$PLAZO',$NODO,'$ID_EMPLEADO','$IDENTIFICADOR',$CONTRATO)";
        $db= AccesoDB::getInstancia();
        $lista= $db->executeQueryUpdate($query);
        
//        echo "valor lista: ".json_encode($lista);
        return $lista;
        
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}

public function eliminarNodo($ID)
{
    try
    {
        $query="DELETE FROM temas WHERE temas.id_tema=$ID";
        
        $db= AccesoDB::getInstancia();
        $lista= $db->executeQueryUpdate($query);
        
        return $lista;
  
    } catch (Exception $ex)
    {
        throw $ex;
        return false;
    }
}

    public function verificarSiTemaEstaEnDocumentoDeEntrada($ID_TEMA)
    {
        try 
        {
            $query="SELECT IF(COUNT(tbdocumento_entrada.id_tema)=0,0,1) AS resultado
                    FROM documento_entrada tbdocumento_entrada
                    WHERE tbdocumento_entrada.id_tema=$ID_TEMA";
            
            $db=  AccesoDB::getInstancia();
            $lista=$db->executeQuery($query);
        
            return $lista[0]['resultado'];            
        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }

    }

        public function listarTodosTemas()
    {
        try 
        {
            $db= AccesoDB::getInstancia();
            $query="UPDATE temas SET padre_general = id_tema, resposable_general = id_emplado WHERE padre = 0";
            $db->executeQueryUpdate($query);

            $query="SELECT tbtemas.id_tema,tbtemas.id_empleado
                    FROM temas tbtemas WHERE tbtemas.padre = 0";
            $lista= $db->executeQuery($query);
            return $lista;

        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
      public function obtenerHijosTema($ID_TEMA)
    {
        try
        {
            $query="SELECT tbtemas.id_tema
            FROM temas tbtemas
            WHERE tbtemas.padre = $ID_TEMA";
            // echo $query;

            $db= AccesoDB::getInstancia();
            $result= $db->executeQuery($query);
            return $result;
        } catch (Exception $ex)
        {
            throw $ex;
            return false;
        }
    }
    
     public function cambiarDatosTema($ID_TEMA,$PADRE,$RESP)
    {
        try 
        {
            $query="UPDATE temas SET padre_general = $PADRE, responsable_general = $RESP
                    WHERE id_tema = $ID_TEMA";
            $db= AccesoDB::getInstancia();
            $lista= $db->executeQueryUpdate($query);
            return $lista;

        } catch (Exception $ex) 
        {
            throw $ex;
            return -1;
        }
    }
    

}

?>
