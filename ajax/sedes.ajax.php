<?php

require_once "../controladores/sedes.controlador.php";
require_once "../modelos/sedes.modelo.php";

class AjaxSedes{

	/*=============================================
	EDITAR SEDES
	=============================================*/	

	public $idSede;

	public function ajaxEditarSede(){

		$item = "id";
		$valor = $this->idSede;

		$respuesta = ControladorSedes::ctrMostrarSedes($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SEDES
=============================================*/	
if(isset($_POST["idSede"])){

	$sede = new AjaxSedes();
	$sede -> idCategoria = $_POST["idSede"];
	$sede -> ajaxEditarSede();
}
