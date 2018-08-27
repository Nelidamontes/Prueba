<?php
require_once('../db/conexion.php');


class Proceso{



	private $idProceso;
	private $numProceso;
	private $descripcion;
	private $sede;	
	private $presupuesto;



	public function Proceso(){
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);
			
		}
	}

	public function getId(){
		return $this->idProceso;
	}
	public function _constructor1($idProceso){
		$this->idProceso=$idProceso;
	}


	public function _constructor4($numProceso,$descripcion,$sede,$presupuesto){
		$this->numProceso=$numProceso;
		$this->descripcion=$descripcion;
		$this->sede=$sede;
		$this->presupuesto=$presupuesto;
	}

	public function _constructor5($numProceso,$descripcion,$sede,$presupuesto,$idProceso){
		$this->numProceso=$numProceso;
		$this->descripcion=$descripcion;
		$this->sede=$sede;
		$this->presupuesto=$presupuesto;
		$this->idProceso=$idProceso;

	}



	public function registrarProceso(){
		$datos = new Conexion();
		$mysql = $datos->conectar();

		$mysql->query("CALL crearProceso('$this->numProceso','$this->descripcion','$this->sede','$this->presupuesto')") or die($mysql->error);
		$mysql = $datos->Desconectar($mysql);

	}


	public function modificarProceso(){
		$datos = new Conexion();
		$mysql = $datos->conectar();
 

		$mysql->query("CALL modificarProceso('$this->numProceso','$this->descripcion','$this->sede','$this->presupuesto','$this->idProceso')") or die($mysql->error); 
		$mysql = $datos->Desconectar($mysql);
	}

	

}
?>