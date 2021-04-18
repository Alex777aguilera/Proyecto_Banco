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


$mpdf = new \Mpdf\Mpdf();

$mpdf->WriteHTML($idPrestamo);


// $name = 'PagoCuota.pdf';
$mpdf->Output('Prestamo.pdf', 'I');
}else{
    header('location: error.html');
}
 ?>