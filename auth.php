<?php
require_once "conexion.php";
$db = new Conexion();

if($link=$db->conectar()){
	if ($_POST){
		$login 	=$_POST["login"];
		$pass	=md5($_POST["pass"]);
		$sql 	="SELECT * FROM accesos WHERE login='$login' AND password='$pass' ";
		$qry 	=$link->query($sql);
		if ($qry->num_rows>0){
			header("location: frmUsuario.php");
		}else{
			header("location: index.php?e=true");
		}	
	}
}
?>