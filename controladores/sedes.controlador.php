<?php

class ControladorSedes{

	/*=============================================
	CREAR SEDES
	=============================================*/

	static public function ctrCrearSede(){

		if(isset($_POST["nuevaSede"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSede"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#°+().- ]+$/', $_POST["nuevaDireccion"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaCiudad"])){

				$tabla = "sedes";

				$datos = array ("sede"=>$_POST["nuevaSede"],
								"direccion"=>$_POST["nuevaDireccion"],
								"ciudad"=>$_POST["nuevaCiudad"]);

				$respuesta = ModeloSedes::mdlIngresarSede($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sedes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR SEDES
	=============================================*/

	static public function ctrMostrarSedes($item, $valor){

		$tabla = "sedes";

		$respuesta = ModeloSedes::mdlMostrarSedes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR SEDES
	=============================================*/

	static public function ctrEditarSede(){

		if(isset($_POST["editarSede"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarSede"])&&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ#°+().- ]+$/', $_POST["editarDireccion"]) &&
			   preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCiudad"])){


				$tabla = "sedes";

				$datos = array("id"=>$_POST["idSede"],
							   "sede"=>$_POST["editarSede"],
							   "direccion"=>$_POST["editarDireccion"],
							   "ciudad"=>$_POST["editarCiudad"]);

				$respuesta = ModeloSedes::mdlEditarSede($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sedes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR SEDE
	=============================================*/

	static public function ctrBorrarSede(){

		if(isset($_GET["idSede"])){

			$tabla ="Sedes";
			$datos = $_GET["idSede"];

			$respuesta = ModeloSedes::mdlBorrarSede($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';
			}
		}
		
	}
}
