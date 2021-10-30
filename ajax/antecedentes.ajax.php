<?php

require_once "../controladores/antecedentes.controlador.php";
require_once "../modelos/antecedentes.modelo.php";

class AjaxAntecedentes{

	/*=============================================
	EDITAR ANTECEDENTES DEL CLIENTE
	=============================================*/	

	public $idCliente;

	public function ajaxEditarAntecedentes(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorAntecedentes::ctrMostrarAntecedentes($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR ANTECENTE CLIENTE ??????
=============================================*/	

if(isset($_POST["idCliente"])){

	$cliente = new AjaxClientes();
	$cliente -> idCliente = $_POST["idCliente"];
	$cliente -> ajaxEditarCliente();

}