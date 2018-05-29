<?php
//establecemos el timezone para obtener la hora local
date_default_timezone_set('America/Lima');
 
//la fecha y hora de exportación sera parte del nombre del archivo Excel
$fecha = date("d-m-Y H:i:s");
 
//Inicio de exportación en Excel
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=Reporte_ValidacionDocumentos-$fecha.xls"); //Indica el nombre del archivo resultante
header("Pragma: no-cache");
header("Expires: 0");
 
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
  </tr>
 
  </table>";
 
?>
