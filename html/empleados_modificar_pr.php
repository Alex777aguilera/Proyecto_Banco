<?php
require("conexion.php");
if(isset($_POST['accion']) AND $_POST['accion'] == "actualizar"){
	$sql = "UPDATE registroempleado SET identidad='". $_POST['identidad'] ."', nombres='". $_POST['nombre'] ."', apellidos='". $_POST["apellido"] ."', edad='". $_POST["edad"] ."', direccion='". $_POST["direccion"] ."', idCargo='". $_POST["cargo"] ."', idGenero='". $_POST["genero"] ."' WHERE idRegistroEmpleado='". $_POST['idEmpleado'] ."'";

    $resultado = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)>0) {
    	echo "<script>alert('Guardado exitosamente.');</script>";
    	echo "<script> window.location.href = 'empleados_modificar_consulta.php'; </script>";
    }
    else{
    	echo "<script>alert('ERROR: No se pudo guardar el registro.');</script>";
    	//echo "<script> window.location.href = 'empleados_modificar_consulta.php'; </script>";
    }

} elseif (isset($_POST['accion']) AND $_POST['accion'] == "eliminar") {
    $sql = "DELETE FROM registroempleado WHERE idRegistroEmpleado='". $_POST['idEmpleado'] ."'";

    $resultado = mysqli_query($con, $sql);

    if (mysqli_affected_rows($con)>0) {
        echo "<script>alert('Registro eliminado exitosamente.');</script>";
        echo "<script> window.location.href = 'empleados_modificar_consulta.php'; </script>";
    }
    else{
        echo "<script>alert('ERROR: No se pudo guardar el registro.');</script>";
        echo "<script> window.location.href = 'empleados_modificar_consulta.php'; </script>";
    }
}

 else {
	echo "<script>alert('NO se pudo llevar acabo la operación correctamente.');</script>";
	echo "<script> window.location.href = 'empleados_modificar_consulta.php'; </script>";
}

?>