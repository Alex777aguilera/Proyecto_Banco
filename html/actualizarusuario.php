<?php
   // $conet=mysqli_connect('localhost','root','','financiera1');
   require_once "conexion.php";
    $id = $_POST['id'];
    $nombre = $_POST['usuari'];
    $contra = $_POST['contra'];
    $empleado = $_POST['empleado'];

        try {
                $sql = "UPDATE `usuario` SET `username`='$nombre',`password`='$contra',`idRegistroEmpleado`='$empleado' 
                WHERE `idUsuario`='$id'";  
                echo mysqli_query($con,$sql);
        } catch (Exception $e) {
                $e->getMessage();
        }
    
    
    
?>
