<?php
session_start(); 
include('../db/conexion1.php');
include('../modelo/usuario.php');



class controladorUsuarios{


	private $obj; 


	public function logueo(){
		$obj= new usuario(
			$_REQUEST['NombreUser'],
			$_REQUEST['PassUser']

		);	
		var_dump($obj);
		if($obj->loguear()){
			echo $_SESSION['id'];
			echo "no mostro nada";
			header ("Location:../vista/inicio.php");
		}
		else{
			header ("Location:../vista/index.php");
		}
		
	}


}

$controlador = new controladorUsuarios;



if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1) {
	$funcion = 'registrar';
	//header('Location:../vista/inicio.php');
}
elseif (isset($_REQUEST['ingresar']) && ($_REQUEST['ingresar'])==2) {
	
	$funcion = 'logueo';
	header('Location:../vista/inicio.php');
}


if (method_exists($controlador, $funcion)) {

	call_user_func(array($controlador, $funcion));
}

?>