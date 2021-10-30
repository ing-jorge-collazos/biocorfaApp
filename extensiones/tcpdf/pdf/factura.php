<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirFactura{

public $codigo;

public function traerImpresionFactura(){

//TRAEMOS LA INFORMACIÓN DE LA VENTA

$itemVenta = "codigo";
$valorVenta = $this->codigo;

$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

$fecha = substr($respuestaVenta["fecha"],0,-8);
$productos = json_decode($respuestaVenta["productos"], true);
$neto = number_format($respuestaVenta["neto"],2);
$impuesto = number_format($respuestaVenta["impuesto"],2);
$total = number_format($respuestaVenta["total"],2);

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

$itemCliente = "id";
$valorCliente = $respuestaVenta["id_cliente"];

$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

$itemVendedor = "id";
$valorVendedor = $respuestaVenta["id_vendedor"];

$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

//REQUERIMOS LA CLASE TCPDF

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

//$pdf->AddPage('P', 'A7');

$page_format = array(
    'MediaBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 300, 'ury' => 74), 
    //'CropBox' => array ('llx' => 0, 'lly' => 0, 'urx' => 210, 'ury' => 297), 
    //'BleedBox' => array ('llx' => 5, 'lly' => 5, 'urx' => 205, 'ury' => 292), 
    //'TrimBox' => array ('llx' => 10, 'lly' => 10, 'urx' => 200, 'ury' => 287), 
    //'ArtBox' => array ('llx' => 15, 'lly' => 15, 'urx' => 195, 'ury' => 282), 
    'Dur' => 3, 
    'trans' => array(
     'D' => 1.5, 
     'S' => 'Split', 
     'Dm' => 'V', 
     'M' => 'O' 
    ), 
    'Rotate' => 0, 
    'PZ' => 1, 
); 

// Check the example n. 29 for viewer preferences 

// add first page --- 
$pdf->AddPage('P', $page_format, false, false); 

//---------------------------------------------------------

$bloque1 = <<<EOF

<table style="font-size:12px;">

	<tr>
	
		<td style="width:160px; text-align:center; font-weight:bold">
		DIGITAL STORE VRC
		</td>

	</tr>

	


</table>

<table style="font-size:9px; text-align:center">

	<tr>
		
		<td style="width:160px;">
	
			<div>
				<br>
				NIT: 10857937565-1
				
				<br>
				Fecha: $fecha

				<br>
				Dirección: Calle 25 # 7-23 

				<br>
				Gran Plaza Ipiales

				<br>
				Teléfono: 317 844 4099

				<br>
				FACTURA N.$valorVenta


				</div>

		</td>

	</tr>


</table>

<table style="font-size:9px; text-align:left">
	<tr>
		
		<td style="width:180px;">
	
			<div>

				_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
				<br><br>
				DATOS CLIENTE:	
				<br>				
				Cliente: $respuestaCliente[nombre]
				
				<br>					
				Documento: $respuestaCliente[documento]

				<br>					
				Domicilio: $respuestaCliente[direccion]

				<br>					
				e-mail: $respuestaCliente[email]

				<br>
				_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
				
				<br><br>
				DETALLE:
				<br>
				Cantidad. Valor Unitario. Valor Total.
				<br>
			</div>

		</td>

	</tr>


</table>
											
			

EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');

// ---------------------------------------------------------


foreach ($productos as $key => $item) {

$valorUnitario = number_format($item["precio"], 2);

$precioTotal = number_format($item["total"], 2);

$bloque2 = <<<EOF

<table style="font-size:9px;">

	<tr>
	
		<td style="width:160px; text-align:left">
		$item[descripcion] 

		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:center">
		$item[cantidad] * $$valorUnitario= $$precioTotal
		<br>
		</td>


	</tr>


</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}

// ---------------------------------------------------------

$bloque3 = <<<EOF

<table style="font-size:9px; text-align:left">
<div>
	_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
	</div>
	<br>
	PAGO:
	<br>
</table>
<table style="font-size:9px; text-align:rigth">


	<tr>
	
		<td style="width:80px;">
			 NETO: 
		</td>

		<td style="width:80px;">
			$ $neto
		</td>

	</tr>
	<tr>
	
		<td style="width:80px;">
			 DESCUENTO: 
		</td>

		<td style="width:80px;">
			$0
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 IMPUESTO: 
		</td>

		<td style="width:80px;">
			$0
		</td>

	</tr>

	<tr>
	
		<td style="width:160px; text-align:rigth">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px; font-size:10px; font-weight:bold">
			 TOTAL: 
		</td>

		<td style="width:80px; font-size:10px">
			$ $total
		</td>

	</tr>

	
</table>
<table style="font-size:9px; text-align:Center">
<tr>
	
		<td style="width:160px;">
		
			<br>
			_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
			<br>
			<br>
			Caja N.1 ---> Cajero: $respuestaVendedor[nombre] 
			<br><br>
			_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
			<br>
		</td>

	</tr>
</table>
<table style="font-size:7px; text-align:Center">
<tr>
	
		<td style="width:160px;">
		
			<br>
			¡Para garantias conservar los empaques, la garantia no aplica: a golpes, choques electricos
			o mal uso por parte del comprador!
			
		</td>

	</tr>
</table>

<table style="font-size:8px; font-weight:bold; text-align:Center">
<tr>
	
		<td style="width:160px;">
		_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _
			<br>
			¡¡¡Gracias por preferinos!!!
			<br>
			Impreso por CECONFI
		</td>

	</tr>
</table>


EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
//SALIDA DEL ARCHIVO 

//$pdf->Output('factura.pdf', 'D');
$pdf->Output('factura.pdf');


}
}

$factura = new imprimirFactura();
$factura -> codigo = $_GET["codigo"];
$factura -> traerImpresionFactura();


?>