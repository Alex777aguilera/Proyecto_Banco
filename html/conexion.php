<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'financiera1.sql');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($con === false){
        die("ERROR: No se pudo conectar a la base de datos " . mysqli_connect_error());
    }
?>