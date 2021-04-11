
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'financiera1');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    $usuario = 'root';
    $password = '';
   	$db = new PDO('mysql:host=localhost;dbname=financiera1', $usuario, $password);
    $connect = new mysqli("localhost", "root", "", "financiera1") or die('Error al conectar'. mysqli_error($connect));

    mysqli_set_charset($con,"utf8");   //Coloca el formato de carácteres como UTF-8.
    //mysqli_query($con,"SET time_zone = '-06:00'"); //Zona horaria actual.

    if($con === false){
        die("ERROR: No se pudo conectar a la base de datos " . mysqli_connect_error());
    }

?>