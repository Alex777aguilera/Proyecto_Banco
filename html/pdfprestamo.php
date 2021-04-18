<?php 
//---- Consulta Guardar ----
	if ($_GET==true) {
	   $idPrestamo = $_GET['idP'];

	require_once '../vendor/autoload.php';
	require_once ('conexion.php');
	$sql = "SELECT pr.idPrestamo, rc.nombres, rc.apellidos, pr.monto, pr.plazo, pr.tasa, rc.ingresosTotales  FROM `plandepago` as pp 
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
	$fp = "". date('Y-m-d') ."";


	$mpdf = new \Mpdf\Mpdf();
      $mpdf->WriteHTML("<hr>");
			$mpdf->WriteHTML("<h2 style='margin-left: 260px;'>* PRESTAMO *</h2>" );
$mpdf->WriteHTML("<hr>");
        $mpdf->WriteHTML("<img src='../assets/images/LogoOB.png' alt='homepage' class='light-logo' width='350px' height='150px' style='margin-left: 165px;'/>");
		            $mpdf->WriteHTML("<br>" );
$mpdf->WriteHTML("<hr>");
            $mpdf->WriteHTML("<br>" );
		    $mpdf->WriteHTML("<b>Codg. de Prestamo: </b> $idpr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha: </b> $fp " );
            $mpdf->WriteHTML("<br>" );  
            $mpdf->WriteHTML("<b>Nombre del Cliente:</b> $nc &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Prestamo Aprobado: </b> $m Lps." );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Plazo: </b> $plz años" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Tasa </b> $ts %" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Ingresos Totales : </b> $it Lps." );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );            
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" );				
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<br>" );
            
            
$mpdf->WriteHTML("<hr>");

$mpdf->WriteHTML("<br>" );
$mpdf->WriteHTML("<hr>");  

$mpdf->WriteHTML("<br>" );
$mpdf->WriteHTML("<hr>");     
$mpdf->WriteHTML("<h2 style='margin-left: 220px;'>* Plan de Pagos *</h2>" ); 
$sql = "SELECT * FROM `plandepago` WHERE idPrestamo = '$idpr'"; 
if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0)
        {
$mpdf->WriteHTML("<table id='zero_config' class='table table-striped table-bordered'>");
                            $mpdf->WriteHTML("<thead>");
                                $mpdf->WriteHTML("<tr>");
                                    $mpdf->WriteHTML("<th>| ID |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| Codigo |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>|  Monto |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| Interes |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| L. Mensual |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| Fecha |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| Estado |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| #Cuota |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                    $mpdf->WriteHTML("<th>| Saldo |</th>");
                                    $mpdf->WriteHTML("<hr>");
                                $mpdf->WriteHTML("</tr>");
                            $mpdf->WriteHTML("</thead>");
                            $mpdf->WriteHTML("<tbody>");
                            while($row = mysqli_fetch_array($result)){
                            $mpdf->WriteHTML("<tr>");
                            $mpdf->WriteHTML("<td><center>" . $row['idPlanPago'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>". $row['idPrestamo'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['monto'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['intereses'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['letraMensual'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['fechaPago'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['estadoLetra'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['numeroCuota'] . "</centyer></td>");
                            $mpdf->WriteHTML("<td><center>" . $row['saldo'] . "</centyer></td>");
                            }
                        $mpdf->WriteHTML("</tbody>");
                    $mpdf->WriteHTML("</table>");
            }
      }
	// $name = 'PagoCuota.pdf';
	$mpdf->Output('Prestamo.pdf', 'I');
	}else{
	    header('location: error.html');
	}
 ?>