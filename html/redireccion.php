<?php 
    session_start();
    if ($_SESSION['cargo'] == 'Gerente') {
        header("location:principal.php");
    }else if($_SESSION['cargo'] == 'Caja'){
        header("location:pago_cuota.php");
    }else if($_SESSION['cargo'] == 'Escritorio'){
        header("location:formularios.php");
    }else if(isset($_SESSION['cargo'])){
        header("location:index.php");
    }
?>