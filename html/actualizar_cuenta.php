<?php


$conet=mysqli_connect('localhost','root','','financiera1');
    $id = $_POST['id'];
    $ident = $_POST['descripcion'];

    $sql = "UPDATE `tipocuenta` SET `descripcion`='$ident' WHERE  `idTipoCuenta`='$id'";
    
    echo mysqli_query($conet,$sql);
?>
