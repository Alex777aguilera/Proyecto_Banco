<?php 
	$conet=mysqli_connect('localhost','root','','financiera1');
	$idpagol = $_POST['id'];
	$idplan = $_POST['p'];
	$monto = $_POST['m'];
	$fecha = $_POST['f'];

	$sql = "UPDATE `pagoletra` SET `idPlanPago`= '$idplan',`montoPagado`= '$monto',`fechaPago`= '$fecha' WHERE `idPagoLetra` = '$idpagol'";

	echo mysqli_query($conet,$sql);

 ?>