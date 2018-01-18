<?php
require_once "conexion.php";
$db = new Conexion();

if($link=$db->conectar()){
	//Vaciamos amigos    
	$sql="TRUNCATE amigos";
	$qry=$link->query($sql);
	//Vaciamos usuarios
	$sql="TRUNCATE usuarios";
	$qry=$link->query($sql);

	echo "Data Eliminada Completamente!";
}
?>