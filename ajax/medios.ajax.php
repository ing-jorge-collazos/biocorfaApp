<?php

require_once "../controladores/medios.controlador.php";
require_once "../modelos/medios.modelo.php";

class AjaxMedios{

	/*=============================================
	EDITAR MEDIOS DE PAGO
	=============================================*/	

	public $idMedio;

	public function ajaxEditarMedio(){

		$item = "id";
		$valor = $this->idMedio;

		$respuesta = ControladorMedios::ctrMostrarMedios($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR MEDIOS DE PAGO
=============================================*/	
if(isset($_POST["idMedio"])){

	$medio = new AjaxMedios();
	$medio -> idMedio = $_POST["idMedio"];
	$medio -> ajaxEditarMedio();
}
