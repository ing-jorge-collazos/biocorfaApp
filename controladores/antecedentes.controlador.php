<?php

class ControladorAntecedentes{

	/*=============================================
	CREAR ANTECEDENTES
	=============================================*/

	static public function ctrCrearAntecedentes(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
		       preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidos"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[°#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "antecedentes";

			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "apellidos"=>$_POST["nuevoApellidos"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "email"=>$_POST["nuevoEmail"],
					           "genero"=>$_POST["nuevoGenero"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);

			   	$respuesta = ModeloAntecedentes::mdlIngresarAntecedentes($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El antecedente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "antecedentes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El antecedente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "antecedentes";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR ANTECEDENTES DEL CLIENTES
	=============================================*/

	static public function ctrMostrarAntecedentes($item, $valor){

		$tabla = "antecedentes";

		$respuesta = ModeloAntecedentes::mdlMostrarAntecedentes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR ANTECEDENTES DEL CLIENTE
	=============================================*/

	static public function ctrEditarAntecedentes(){

		if(isset($_POST["editarantecedentes"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDocumento"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMotivoconsulta"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarOtrosantecentes"])){

			   	$tabla = "antecedentes";

			   	$datos = array("documento_cliente"=>$_POST["documento_cliente"],
			   				   "motivoconsulta"=>$_POST["editarMotivoconsulta"],
					           "otrosantecentes"=>$_POST["editarOtrosantecentes"]);

			   	$respuesta = ModeloAntecedentes::mdlEditarAtecedentes($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El antecedente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "antecedentes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El antecedente no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "antecedentes";

							}
						})

			  	</script>';



			}

		}

	}

	
	/*=============================================
	ELIMINAR ANTECEDENTES DEL CLIENTE
	=============================================*/

	static public function ctrEliminarAntecedentes(){

		if(isset($_GET["idCliente"])){

			$tabla ="antecedentes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloAntecedentes::mdlEliminarAntecedentes($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El antecedente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "antecedentes";

								}
							})

				</script>';

			}		

		}

	}

}

