<?php
require_once('../db/conexion.php');

class Usuario{


	private $IdUser;
	private $NombreUser;
	private $PassUser;
	

	public function Usuario(){

		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}
	}


	public function getId(){
		return $this->IdUser;

	}

	public function _constructor1($IdUser){

		$this->IdUser=$IdUser;		

		
	}


	public function _constructor2($NombreUser,$PassUser){

		$this->NombreUser=$NombreUser;		
		$this->PassUser=$PassUser;
	}


	public function _constructor3($IdUser,$NombreUser,$PassUser){
		$this->IdUser=$IdUser;		
		$this->NombreUser=$NombreUser;
		$this->PassUser=$PassUser;


	}


	

	public function loguear(){
		$datos =new Conexion();
		$mysql =$datos->conectar();


		$query=mysqli_query($mysql,"CALL login('$this->NombreUser','$this->PassUser')") or die($mysql->error); 
		$mysql =$datos->Desconectar($mysql);


		while ($row =mysqli_fetch_array($query))
		{

			if ($this->PassUser==$row['PassUser'] && $this->NombreUser==$row['NombreUser']) {
				$_SESSION['session'] = true;
				$_SESSION['id']=$row['IdUser'];
				$_SESSION['nombre']=$row['NombreUser'];

				return true;
			}	

			else {

				return false;
			}

		}

	}

	public function registrarUsuario(){
		$datos = new Conexion();
		$mysql = $datos->conectar();   
		$user=$_SESSION['id'];
		$query= mysqli_query($mysql,"CALL registrarUsuario('$this->IdUser','$this->NombreUser','$this->PassUser')");
		$mysql = $datos->Desconectar($mysql);
	}

}

?>