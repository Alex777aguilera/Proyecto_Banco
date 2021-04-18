<?php 
//---- Consulta Guardar ----
	if ($_GET==true) {
	   $idPrestamo = $_GET['idP'];

	require_once '../vendor/autoload.php';
	require_once ('conexion.php');
	$sql = "SELECT * FROM `plandepago` as pp 
            INNER JOIN prestamos AS pr ON pp.idPrestamo = pr.idPrestamo 
            INNER JOIN cuenta as c ON pr.idCuenta = c.idCuenta 
            INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente WHERE pp.idPrestamo  = '$idPrestamo'";


	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$idpr = "". $row['idPrestamo'] ."";
	$nc = "". $row['nombres'] ." ". $row['apellidos'] ."";
	$m = "". $row['monto'] ."";
	$plz = "". $row['plazo'] ."";
	$ts = "". $row['tasa'] ."";
	$it = "". $row['ingresosTotales'] ."";
	$lm = "". $row['letraMensual'] ."";
	$numc = "". $row['numeroCuota'] ."";
	$s = "". $row['saldo'] ."";
	$fp = "". $row['fechaInicioPrestamo'] ."";
	$ncuenta = "". $row['numeroCuenta'] ."";

	$mpdf = new \Mpdf\Mpdf();
			$mpdf->WriteHTML("<h2 style='margin-left: 260px;'>* PRESTAMO *</h2>" );
$mpdf->WriteHTML("<hr>");
        $mpdf->WriteHTML("<img src='../assets/images/LogoOB.png' alt='homepage' class='light-logo' width='350px' height='150px' style='margin-left: 165px;'/>");
		            $mpdf->WriteHTML("<br>" );
$mpdf->WriteHTML("<hr>");
		    $mpdf->WriteHTML("<b>Codg. de Prestamo: </b> $idpr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha: </b> $fp " );
            $mpdf->WriteHTML("<br>" );  
            $mpdf->WriteHTML("<b>Nombre del Cliente:</b> $nc &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>#Cuenta: </b> $ncuenta" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Prestamo Adquirido: </b> $m" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Plazo: </b> $plz años" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Tasa </b> $ts" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Ingresos Totales son: </b> $it" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );            
            $mpdf->WriteHTML("<b>Letra Mensual: </b> $lm" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>#Cuota: </b> $numc" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );				
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Saldo del Plan de PagoCuota: </b> $s" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );  
$mpdf->WriteHTML("<hr>");
$mpdf->WriteHTML("<hr>");


	// $name = 'PagoCuota.pdf';
	$mpdf->Output('Prestamo.pdf', 'I');
	}else{
	    header('location: error.html');
	}
 ?>