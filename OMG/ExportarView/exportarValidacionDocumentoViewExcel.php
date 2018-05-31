<?php
session_start();
require_once '../util/Session.php';

//establecemos el timezone para obtener la hora local
date_default_timezone_set('America/Lima');
 
//la fecha y hora de exportación sera parte del nombre del archivo Excel
$fecha = date("d-m-Y H:i:s");
 
//Inicio de exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Reporte_ValidacionDocumentos-$fecha.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");
 
    

$Lista = Session::getSesion("listarValidacionDocumentos");
$table="";
$requisitos="";
$i=0;
$i2=0;
$entrar=false;
$limite=sizeof($Lista);


foreach($Lista as $in=>$filas){
    $requisitos="";
    if($i2<$limite)
    {
        foreach ($Lista as $index2=>$filas2){
            if($Lista[$i2]['id_validacion_documento']==$filas2['id_validacion_documento'])
            {
                $requisitos.=$filas2['requisito']."<br>";
                $i=$index2;
                $entrar=true;
            }       
        }
        if($entrar)
        {
        $table.="<tr><td>".$Lista[$i]['clave_documento']."</td>"
                . "<td>".$Lista[$i]['documento']."</td>"
                . "<td>".$Lista[$i]['nombre_empleado_documento']." ".$Lista[$i]['apellido_paterno_documento']." ".$Lista[$i]['apellido_materno_documento']."</td>"
                . "<td>".$requisitos."</td>"
                . "<td>".$Lista[$i]['registros']."</td>"
                . "</tr>";
        }
        $i2=$i+1;
    }
}

echo "<table>
            <tr>
                <th style='background:#CCC; color:#000'>
                Clave Documento
                </th>
                <th style='background:#CCC; color:#000'>
                Nombre Documento
                </th>
                <th style='background:#CCC; color:#000'>
                Responsable del documento
                </th>
                <th style='background:#CCC; color:#000'>
                Requisitos
                </th>
                <th style='background:#CCC; color:#000'>
                Registros
                </th>
            </tr>".$table."

 
    </table>";

    
?>


