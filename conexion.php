<?php
require_once "config.php";
class Conexion
{
    protected $db;

    public function conectar()
    {
    	$db = new mysqli(HOST, USER, PASS, DBNAME);
		if ($db->connect_error) {
		    die("Lo sentimos, no se ha podido conectar con MySQL: " . $db->connect_error);
		} 
        return $db;
    }
}