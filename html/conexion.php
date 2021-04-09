<<<<<<< HEAD
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'financiera');

    $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if($con === false){
        die("ERROR: No se pudo conectar a la base de datos " . mysqli_connect_error());
    }
=======
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

    if($con === false){
        die("ERROR: No se pudo conectar a la base de datos " . mysqli_connect_error());
    }
>>>>>>> af845570d7a78c0d12c95de51dc43d4a53833d8f
?>