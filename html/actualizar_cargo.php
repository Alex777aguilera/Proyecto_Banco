<?php


$conet=mysqli_connect('localhost','root','','financiera1');
    $id = $_POST['id'];
    $ident = $_POST['descripcion'];

    $sql = "UPDATE `cargo` SET `cargo`='$ident' WHERE  `idCargo`='$id'";
    
    echo mysqli_query($conet,$sql);
?>