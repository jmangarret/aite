<?php
ini_set("display_errors", 0);
require_once "conexion.php";
$db = new Conexion();
//Form post
if($link=$db->conectar()){    
	//Si se envia el form regsitramos usuario
	if ($_POST){
		$nombre =$_POST['nombre'];
		$telf 	=$_POST['telf'];
		$email 	=$_POST['email'];
		$sql 	="INSERT INTO usuarios(nombre,telf,email) VALUES('$nombre','$telf','$email')";
		$qry 	=$link->query($sql);
		//Buscamos usuario recien agregado
		$sql 	="SELECT MAX(codUsuario) FROM usuarios";
		$qry 	=$link->query($sql);
		$row 	= $qry->fetch_array(MYSQLI_BOTH);
		$cod1	=$row[0];
		//Asociamos amigos
		if ($_POST['amigo'])
		$amigos	=($_POST['amigo'] ? $_POST['amigo'] : NULL);	
		if ($amigos)
		foreach ($amigos as $amigo) {
			$sql="INSERT INTO amigos(codUsuario, codUsuario2) VALUES($cod1,$amigo)";
			$link->query($sql);
			//Asociacion Bidireccional
			$sql="INSERT INTO amigos(codUsuario, codUsuario2) VALUES($amigo,$cod1)";
			$link->query($sql);
		}
	}
	//Listamos usuarios
	$tabla ="<table class='table' align='center'>";
	$tabla.="<thead>";
	$tabla.="<tr class='info'>";
	$tabla.="<th class='text-center'>#</th>";
	$tabla.="<th class='text-center'>Nombre</th>";
	$tabla.="<th class='text-center'>Telf</th>";
	$tabla.="<th class='text-center'>Email</th>";
	$tabla.="<th class='text-center'>Amigos</th>";
	$tabla.="</tr>";
	$tabla.="</thead>";
	$tabla.="<tbody>";
	$sql="SELECT * FROM usuarios";
	$qry=$link->query($sql);
	while ($row = $qry->fetch_array(MYSQLI_ASSOC))
	{
		$tabla.="<tr>";		
		$tabla.="<td>".$row["codUsuario"]."</td>";		
		$tabla.="<td>".$row["nombre"]."</td>";		
		$tabla.="<td>".$row["telf"]."</td>";		
		$tabla.="<td>".$row["email"]."</td>";
		$tabla.="<td>";	
		//Buscamos amigos
		$amigos="";
		$sqlAmigos ="SELECT codUsuario2 FROM amigos WHERE codUsuario=".$row["codUsuario"];
		$qryAmigos =$link->query($sqlAmigos);
		while ($rowAmigos=$qryAmigos->fetch_array(MYSQLI_ASSOC)){
			$sqlAmigo ="SELECT nombre FROM usuarios WHERE codUsuario=".$rowAmigos["codUsuario2"];
			$qryAmigo =$link->query($sqlAmigo);
			$rowAmigo = $qryAmigo->fetch_array(MYSQLI_ASSOC);
			$tabla.="<li>".$rowAmigo["nombre"];			
		}
		$tabla.="</td>";
		$tabla.="</tr>";
	}
	$tabla.="</tbody>";
	$tabla.="</table>";
	echo $tabla;
}
?>