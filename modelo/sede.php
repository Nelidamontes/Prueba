<?php

class Sede
{

	private $idsede;
	private $sede;




	public function Sede()
	{
		$parametros=func_get_args();
		$cantidad=func_num_args();
		$funcionConstructor= '_constructor'.$cantidad;

		if (method_exists($this, $funcionConstructor))
		{
			call_user_func_array(array($this,$funcionConstructor), $parametros);

			
		}


	}


	public function _constructor1($idsede)
	{
		$this->idsede=$idsede;
	}


	
public function getId(){
	return $this->idsede;

	
}
	public function set ($campo, $valor)
	{
		$this->$campo=$valor;
	
	}

}

?>