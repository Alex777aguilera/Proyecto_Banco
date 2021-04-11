<?php
    $conet=mysqli_connect('localhost','root','','financiera1');
    $id = $_POST['id'];
    $ident = $_POST['identidad'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];
    $ocupacion = $_POST['ocupacion'];
    $ingreso = $_POST['ingreso'];

    $sql = "UPDATE `registrocliente` SET `identidad`='$ident',`nombres`='$nombre',`apellidos`='$apellido',`edad`='$edad',`direccion`='$direccion',`idGenero`='$genero',`ocupacion`='$ocupacion',`ingresosTotales`='$ingreso' WHERE  `idRegistroCliente`='$id'";
    
    echo mysqli_query($conet,$sql);
?>

