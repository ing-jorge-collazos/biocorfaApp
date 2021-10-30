<?php

class ControladorMedios{

	/*=============================================
	CREAR MEDIOS DE PAGO
	=============================================*/

	static public function ctrCrearMedio(){

		if(isset($_POST["nuevoMedio"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMedio"])){

				$tabla = "medios";

				$datos = $_POST["nuevoMedio"];

				$respuesta = ModeloMedios::mdlIngresarMedio($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El medio de pago ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "medios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El medio de pago no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "medios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR MEDIOS DE PAGO
	=============================================*/

	static public function ctrMostrarMedios($item, $valor){

		$tabla = "medios";

		$respuesta = ModeloMedios::mdlMostrarMedios($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR MEDIOS DE PAGO
	=============================================*/

	static public function ctrEditarMedio(){

		if(isset($_POST["editarMedio"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMedio"])){

				$tabla = "medios";

				$datos = array("medio"=>$_POST["editarMedio"],
							   "id"=>$_POST["idMedio"]);

				$respuesta = ModeloMedios::mdlEditarMedio($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El medio de pago ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "medios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El medio de pago no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "medios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR MEDIOS DE PAGO
	=============================================*/

	static public function ctrBorrarMedio(){

		if(isset($_GET["idMedio"])){

			$tabla ="Medios";
			$datos = $_GET["idMedio"];

			$respuesta = ModeloMedios::mdlBorrarMedio($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El medio de pago ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "medios";

									}
								})

					</script>';
			}
		}
		
	}
}
