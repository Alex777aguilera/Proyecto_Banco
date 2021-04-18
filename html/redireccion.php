<?php 
    session_start();
    if ($_SESSION['cargo'] == 'Gerente') {
        header("location:principal.php");
    }else if($_SESSION['cargo'] == 'Caja'){
        header("location:depositos.php");
    }else if($_SESSION['cargo'] == 'Escritorio'){
        header("location:prestamo.php");
    }else if(isset($_SESSION['cargo'])){
        header("location:index.php");
    }
?>