<?php
require_once "conexion.php";
$db = new Conexion();

if($link=$db->conectar()){    
	//Listamos amigos

	$sql="SELECT * FROM usuarios";
	$qry=$link->query($sql);
	$lista="<label for='amigos'>Amigos: </label>";
	while ($row = $qry->fetch_array(MYSQLI_ASSOC))
	{
	    $cod 	=$row["codUsuario"];
	    $nombre =$row["nombre"];
	    $lista.="<li><input type='checkbox' name='amigo[]' value='$cod'>$nombre</li>";
	}

	echo $lista;
}
?>