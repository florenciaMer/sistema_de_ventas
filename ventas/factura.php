<?php

// Include necessary files and initialize TCPDF
include('../app/config.php');
require_once('../app/TCPDF-main/tcpdf.php');
include('../layout/sesion.php');
// Fetch required GET parameters
$nro_venta_get = $_GET['nro_venta'];
$id_cliente_get = $_GET['id_cliente'];

// Fetch customer and company information
include('../app/controllers/configuraciones/listado_de_configuraciones.php');
include('../app/controllers/clientes/listado_de_clientes.php');

// Initialize variables to hold fetched data
$id_informacion = $nombre_empresa = $actividad = $sucursal = $domicilio = $zona = $telefono = $pais = '';
$nombre_cliente = $nit_ci_cliente = $celular_cliente = $correo_cliente = '';

// Fetch company information
foreach ($informaciones_datos as $info) {
    $id_informacion = $info['id_informacion'];
    $nombre_empresa = $info['nombre_empresa'];
    $actividad = $info['actividad'];
    $sucursal = $info['sucursal'];
    $domicilio = $info['domicilio'];
    $zona = $info['zona'];
    $telefono = $info['telefono'];
    $pais = $info['pais'];
}

// Fetch customer information
foreach ($clientes_datos as $cliente) {
    if ($cliente['id_cliente'] == $id_cliente_get) {
        $nombre_cliente = $cliente['nombre_cliente'];
        $nit_ci_cliente = $cliente['nit_ci_cliente'];
        $celular_cliente = $cliente['celular_cliente'];
        $correo_cliente = $cliente['correo_cliente'];
    }
}

// Create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(200, 200), true, 'UTF-8', false);

// Set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor('Florencia Merzario'); // Replace with actual author name
$pdf->setTitle('Factura'); // Replace with actual title
$pdf->setSubject('Invoice for Sale'); // Replace with actual subject
$pdf->setKeywords('TCPDF, PDF, invoice, sale');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->setMargins(5, 5, 5);

// Set auto page breaks
$pdf->setAutoPageBreak(TRUE, 5);

// Set font
$pdf->setFont('Helvetica', 7);

// Add a page
$pdf->AddPage();



// Construct HTML content for the PDF
$html = '
    <div>
        <p>
            <b>Empresa ID:</b> '.$id_informacion.'<br>
            <b>'.$nombre_empresa.'</b><br>
            SUCURSAL NRO '.$sucursal.'<br>
            DIRECCION: '.$domicilio.'<br>
            ZONA: '.$zona.'<br>
            TELEFONO: '.$telefono.'<br>
            PAIS: '.$pais.'<br>
            ----------------------------------------------<br>
            <div style="text-align:left">
                <b>Datos del Cliente</b><br>
                <b>Señor:</b> '.$nombre_cliente.'<br>
                <b>Ci del Cliente:</b> '.$nit_ci_cliente.'<br>
                ----------------------------------------------<br>
                Detalle de compra: <br>';

// Fetch cart details for the given sale
			$sql_carrito = "SELECT * FROM carrito 
							INNER JOIN almacen ON almacen.id_producto = carrito.id_producto
							WHERE nro_venta = $nro_venta_get";

			$query_carrito = $pdo->prepare($sql_carrito);
			$query_carrito->execute();
			$carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
			$html .='<table class="table">
			<thead>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Subtotal</th>
				</tr>
			</thead>';
			$total =(int) 0;
			foreach ($carrito_datos as $carrito) {
				$html .= '<tbody><tr>';
				$nombre_producto = $carrito['nombre'];
				$cantidad = (int)$carrito['cantidad_carrito'];
				$precio = (float)$carrito['precio_venta'];
				$subtotal = (int) $cantidad * (float)$precio;
				$total =   $total+ $subtotal;

				// Append product details to HTML
				$html .= '<td>'.$nombre_producto.'</td>';
				$html .= '<td>'.$cantidad.'</td>';
				$html .= '<td>'.$precio.'</td>';
				$html .= '<td> $'.$subtotal.'</td>';
			
				
				$html .= '</tr><br>';
				
				'--------------------------<br>';
			}
			$html .= 
			'  </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" style="text-align: right;"><b>Total:</b></td>
                            <td> $'.$total.'</td>
                        </tr>
                    </tfoot>
                </table>
			';

$html .= '
             ----------------------------------------------<br>
                Usuario: '.$emailSesion.'<br>
                ----------------------------------------------<br>
            </div>
        </p>
    </div>';

$pdf->writeHTML($html, true, false, true, false, '');



// Output the HTML content as PDF

$style = array(
    'border' =>0,
    'vpadding' =>'3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false,
    'module_width' => 1,
    'module_height' =>1
);
$QR = 'Factura realizada por el sistema de ventas Florencia Merzario';
$pdf->write2DBarcode($QR, 'QRCODE', 25, 150,105,35,$style);

// Close and output PDF document
$pdf->Output('factura.pdf', 'I'); // I: send the file inline to the browser

// END OF FILE
