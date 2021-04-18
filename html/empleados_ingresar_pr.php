
<?php
    //$conet=mysqli_connect('localhost','root','','financiera1');
    require_once "conexion.php";
    $id = $_POST['identidad'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $edad = $_POST['edad'];
    $genero = $_POST['genero'];
    $cargo = $_POST['cargo'];

    $sql = "INSERT INTO registroempleado(identidad, nombres, apellidos, edad, direccion, idCargo, idGenero) 
			VALUES ('$id','$nombre','$apellido','$edad','$direccion','$genero','$cargo')";
   
    echo mysqli_query($con,$sql);
                              
	$idc = 0;
	$sql1 = "SELECT MAX(idRegistroEmpleado) AS idRegistroEmpleado FROM registroempleado";
					
		 if($result1 = mysqli_query($con, $sql1))
		 {
			if(mysqli_num_rows($result1) > 0)
			{
				//Aquí solo vamos a extraer el monto porque se necesita en el insert
				while($row = mysqli_fetch_array($result1)){
							   
				  $idc = $row['idRegistroEmpleado'];
			  }
								

				 mysqli_free_result($result1);;
			}else{
							
			}
		 }
	$sql2 = "INSERT INTO usuario(username,idRegistroEmpleado)
	VALUES ('$nombre',$idc)";
	if (mysqli_query($con, $sql2)) {
		//echo "New record created successfully";
	} else {
		//echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
	}

	mysqli_close($con);
                            	 
?>

