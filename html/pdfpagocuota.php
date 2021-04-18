<?php 
//---- Consulta Guardar ----
if ($_GET==true) {
   $id = $_GET['id'];

require_once '../vendor/autoload.php';
require_once ('conexion.php');
$sql = "SELECT pl.idPagoLetra, rc.nombres, rc.apellidos,pp.idPlanPago,
pr.monto as montoPrestamo, pp.monto as montoPlanPago, pp.Intereses,pr.tasa,rc.ingresosTotales
FROM `pagoletra` as pl INNER JOIN plandepago as pp ON pl.idPlanPago = pp.idPlanPago 
INNER JOIN prestamos AS pr ON pp.idPrestamo = pr.idPrestamo 
INNER JOIN cuenta as c ON pr.idCuenta = c.idCuenta 
INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente 
WHERE idPagoLetra = '$id' ";


$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$idl = "". $row['idPagoLetra'] ."";
$nc = "". $row['nombres'] ." ". $row['apellidos'] ."";
$idp = "". $row['idPlanPago'] ."";
$mpr = "". $row['montoPrestamo'] ."";
$mp = "". $row['montoPlanPago'] ."";
$fp = "". date("Y-m-d") ."";
$int = "". $row['Intereses'] ."";
$tasa = "". $row['tasa'] ."";
$it = "". $row['ingresosTotales'] ."";





$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML("<h2 style='margin-left: 200px;'>* Recibo Pago de Letra *</h2>" );
$mpdf->WriteHTML("<hr>");
        $mpdf->WriteHTML("<img src='../assets/images/LogoOB.png' alt='homepage' class='light-logo' width='350px' height='150px' style='margin-left: 165px;'/>");
$mpdf->WriteHTML("<hr>");
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<b>Nombre del Cliente:</b> $nc&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Fecha: </b> $fp " );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Codg Plan de Pago: </b> $idp" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<b>Cuota: </b> $mp" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<b>Intereses de la cuota: </b> $int" );
            $mpdf->WriteHTML("<br>" );  
            $mpdf->WriteHTML("<b>Tasa: </b> $tasa" );
            $mpdf->WriteHTML("<br>" );  
            $mpdf->WriteHTML("<b>Prestamo Adquirido: </b> $mpr" );
            $mpdf->WriteHTML("<br>" );
            $mpdf->WriteHTML("<b>Ingresos Totales son: </b> $it" );
            $mpdf->WriteHTML("<br>" ); 
            $mpdf->WriteHTML("<br>" ); 
$mpdf->WriteHTML("<hr>");
$mpdf->WriteHTML("<hr>");

// $name = 'PagoCuota.pdf';
$mpdf->Output('ReciboPagoCuota.pdf', 'I');
}else{
    header('location: error.html');
}

// $mpdf->WriteHTML("<table id='zero_config' class='table table-striped table-bordered'>");
//                         $mpdf->WriteHTML("<thead>");
//                             $mpdf->WriteHTML("<tr>");
//                                 $mpdf->WriteHTML("<th>Codg Plan de Pago</th>");
//                                 $mpdf->WriteHTML("<th>Monto Pagado</th>");
//                                 $mpdf->WriteHTML("<th>Fecha de pago</th>");
//                             $mpdf->WriteHTML("</tr>");
//                         $mpdf->WriteHTML("</thead>");
//                         $mpdf->WriteHTML("<tbody>");
//                            $mpdf->WriteHTML("<tr>"); 
//                                 $mpdf->WriteHTML("<td>"); 
//                                     $mpdf->WriteHTML($idp);
//                                 $mpdf->WriteHTML("</td>");
//                                 $mpdf->WriteHTML("<td>"); 
//                                     $mpdf->WriteHTML($mp);
//                                 $mpdf->WriteHTML("</td>");
//                                 $mpdf->WriteHTML("<td>"); 
//                                     $mpdf->WriteHTML($fp);
//                                 $mpdf->WriteHTML("</td>");
//                         $mpdf->WriteHTML("</tbody>");
//                     $mpdf->WriteHTML("</table>");

 ?>
