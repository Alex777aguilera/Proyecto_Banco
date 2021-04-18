
<?php


$conet=mysqli_connect('localhost','root','','financiera1');
    $id = $_POST['id'];
    $ident = $_POST['descripcion'];

    $sql = "UPDATE `tipotransaccion` SET `descripcion`='$ident' WHERE  `idTipoTransaccion`='$id'";
    
    echo mysqli_query($conet,$sql);
?>
