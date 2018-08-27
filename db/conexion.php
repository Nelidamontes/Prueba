<?php

class Conexion{

	private $host="localhost";
	private $password="";
	private $user="root";
	private $dbName="prueba";

	public  function conectar(){
		$mysql = new mysqli($this->host,$this->user,$this->password,$this->dbName);
		if ($mysql->connect_error)
			die('Problemas con la conexion a la base de datos');
		return $mysql;
	}
	public function desconectar($mysql){
		$mysql->close();
		return $mysql;
	}	
	
}
?>


