<?php 
	$conet=mysqli_connect('localhost','root','','financiera1');
	$id = $_GET['id'];
	$idprestamo = $_POST['prestamo'];
	$monto = $_POST['monto'];
	$interes = $_POST['interes'];
	$letram = $_POST['letram'];
	$fecha = $_POST['fecha'];
	$estadol = $_POST['estadol'];

	$sql = "UPDATE `plandepago` SET `idPrestamo`='$idprestamo',`monto`='$monto',`intereses`='$interes',`letraMensual`='$letram',`fechaPago`='$fecha',`estadoLetra`='$estadol' WHERE `idPlanPago` = '$id'";

	echo mysqli_query($conet,$sql);

 ?>