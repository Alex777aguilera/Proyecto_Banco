<?php
require("conexion.php");
if(isset($_POST['accion']) AND $_POST['accion'] == "insertar"){
	$sql = "INSERT INTO registroempleado(identidad, nombres, apellidos, edad, direccion, idCargo, idGenero) VALUES ('" . $_POST["identidad"] . "','" . $_POST["nombre"] . "','" . $_POST["apellido"] . "','" . $_POST["edad"] . "','" . $_POST["direccion"] . "','" . $_POST["cargo"] . "','" . $_POST["genero"] . "')";

    $resultado = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)>0) {
    	echo "<script>alert('Guardado exitosamente.');</script>";
    	echo "<script> window.location.href = 'empleados_ingresar.php'; </script>";
    }
    else{
    	echo "<script>alert('ERROR: No se pudo guardar el registro.');</script>";
    	echo "<script> window.location.href = 'empleados_ingresar.php'; </script>";
    }

} else {
	echo "<script>alert('NO se pudo llevar acabo la operación correctamente.');</script>";
	echo "<script> window.location.href = 'empleados_ingresar.php'; </script>";
}

?>