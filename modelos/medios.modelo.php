<?php

require_once "conexion.php";

class ModeloMedios{

	/*=============================================
	CREAR MEDIOS DE PAGO
	=============================================*/

	static public function mdlIngresarMedio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(medio) VALUES (:medio)");

		$stmt->bindParam(":medio", $datos, PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	MOSTRAR MEDIOS DE PAGO
	=============================================*/

	static public function mdlMostrarMedios($tabla, $item, $valor){

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
	EDITAR MEDIOS
	=============================================*/

	static public function mdlEditarMedio($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET medio = :medio WHERE id = :id");

		$stmt -> bindParam(":medio", $datos["medio"], PDO::PARAM_STR);
		$stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	/*=============================================
	BORRAR MEDIO DE PAGO
	=============================================*/

	static public function mdlBorrarMedio($tabla, $datos){

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

}

