<?php

require_once "conexion.php";

class ModeloAntecedentes{

	/*=============================================
	CREAR ANTECEDENTES DEL CLIENTE
	=============================================*/

	static public function mdlIngresarAntecedentes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(documento_cliente, motivoconsulta, otrosantecentes) VALUES (:documento_cliente, :motivoconsulta, :otrosantecentes)");

		$stmt->bindParam(":documento_cliente", $datos["documento_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":motivoconsulta", $datos["motivoconsulta"], PDO::PARAM_STR);
		$stmt->bindParam(":otrosantecentes", $datos["otrosantecentes"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR ANTECEDENTES DEL CLIENTES
	=============================================*/

	static public function mdlMostrarAntecedentes($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	EDITAR ANTECEDENTES DEL CLIENTE
	=============================================*/

	static public function mdlEditarAntecedentes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento_cliente = :documento_cliente, motivoconsulta = :motivoconsulta, otrosantecentes = :otrosantecentes WHERE id = :id");

		$stmt->bindParam(":documento_cliente", $datos["documento_cliente"], PDO::PARAM_STR);
		$stmt->bindParam(":motivoconsulta", $datos["motivoconsulta"], PDO::PARAM_STR);
		$stmt->bindParam(":otrosantecentes", $datos["otrosantecentes"], PDO::PARAM_STR);
		
		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	ELIMINAR ANTECEDENTES NO ESTA EL BOTON
	=============================================*/

	static public function mdlEliminarAntecedentes($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	ACTUALIZAR CLIENTE
	=============================================*/

	static public function mdlActualizarAntecedentes($tabla, $item1, $valor1, $valor){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":id", $valor, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

}