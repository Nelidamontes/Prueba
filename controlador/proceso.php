<?php
session_start();
require('../db/conexion.php');
require('../modelo/proceso.php');



class controladorProceso{


	private $obj; 



	public function registrar()

	{

		$obj= new Proceso(	
			$_REQUEST['num'],
			$_REQUEST['descripcion'],
			$_REQUEST['sede'],	
			$_REQUEST['presupuesto']
		);
		var_dump($obj);
		$obj->registrarProceso();
		echo "Proceso registrado";

	}


	public function modificar(){
		$obj=new Proceso(		
			$_REQUEST['num'],
			$_REQUEST['descripcion'],
			$_REQUEST['sede'],	
			$_REQUEST['presupuesto'],
			$_REQUEST['idproceso']
		);
		var_dump($obj);
		$obj->modificarProceso();
		echo "Proceso Modificado";
	}

}

echo $_SESSION['id'];


$controlador = new controladorProceso;

if(isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==1) {
	
	$funcion = 'registrar';
	//header('Location:../vista/inicio.php');
}

elseif (isset($_REQUEST['funcion']) && ($_REQUEST['funcion'])==2) {
	
	$funcion = 'modificar';
	//header('Location:../vista/inicio.php');
}

if (method_exists($controlador, $funcion)) {

	call_user_func(array($controlador, $funcion));
}

?>