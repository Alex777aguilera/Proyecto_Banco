<?php
    $conet=mysqli_connect('localhost','root','','financiera1');
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];
    $ocupacion = $_POST['ocupacion'];
    $ingreso = $_POST['ingreso'];

    $sql = "INSERT INTO registrocliente (identidad, nombres, apellidos, edad, direccion, idGenero, ocupacion, ingresosTotales) 
            VALUES ('$id','$nombre','$apellido','$edad','$direccion','$genero','$ocupacion','$ingreso')";
    
    echo mysqli_query($conet,$sql);
?>

