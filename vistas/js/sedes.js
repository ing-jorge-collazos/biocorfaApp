/*=============================================
EDITAR SEDE
=============================================*/
$(".tablas").on("click", ".btnEditarSede", function(){

	var idSede = $(this).attr("idSede");

	var datos = new FormData();
	datos.append("idSede", idSede);

	$.ajax({
		url: "ajax/sedes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#idSede").val(respuesta["id"]);
     		$("#editarSede").val(respuesta["sede"]);
     		$("#editarDireccion").val(respuesta["direccion"]);
     		$("#editarCiudad").val(respuesta["ciudad"]);


     	}

	})


})

/*=============================================
ELIMINAR SEDE
=============================================*/
$(".tablas").on("click", ".btnEliminarSede", function(){

	 var idSede = $(this).attr("idSede");

	 swal({
	 	title: '¿Está seguro de borrar la sede?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar la sede!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=sedes&idSede="+idSede;

	 	}

	 })

})