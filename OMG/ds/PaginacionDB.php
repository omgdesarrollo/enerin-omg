<?php
/**
* Conección a la base de datos
*/
class Conection
{
	protected $conection;

	function __construct()
	{
               $parametros = parse_ini_file("../conf/conexion.ini");
               
		$user = $parametros["02"];
		$password = $parametros["03"];
		$db_name = $parametros["04"];
		$host = $parametros["01"];
		$conection_info = "mysql:host=$host;dbname=$db_name";             
		try
		{
		    $this->conection = new PDO($conection_info, $user, $password);
		    $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $this->conection->exec("set character set utf8");
		}
		catch (Exception $ex)
		{
		    echo "Ocurrió un error. Detalles: " . $ex->getMessage();
		    exit();
		}
	}
}
?>
