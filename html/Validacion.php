<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['usuario'];
        $code = $_POST['contra'];

        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'financiera1');

        $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if($con === false){
            die("ERROR: No se pudo conectar a la base de datos " . mysqli_connect_error());
        }

        $user = $_POST['usuario'];
        $code = $_POST['contra'];
        $consulta = "SELECT CONCAT(emp.nombres,' ',emp.apellidos) as nombreCompleto, ca.idCargo as idCargo, ca.cargo as cargo
        FROM usuario as us INNER JOIN registroempleado as emp on us.idRegistroEmpleado = emp.idRegistroEmpleado
                            INNER JOIN cargo as ca on emp.idCargo = ca.idCargo
                                            where us.username = '$user' and us.password = '$code'";
        $res=mysqli_query($con,$consulta);
        $fila = mysqli_fetch_row($res);
        $valor=mysqli_num_rows($res);
        

      /*  if($valor > 0 && $fila[2] == 'admin'){
            $_SESSION['nombreCompleto'] = $fila[0];
            $_SESSION['cargo'] = $fila[2];
            header("location:principal.php");
        }else if($valor > 0 && $fila[2] == 'cajero'){
            header("location:cajero.php");
        }else if($valor > 0 && $fila[2] == 'prestamista'){
            header("location:principal.php");
        }else if($valor > 0 && $fila[2] == 'normal'){
            header("location:principal.php");
        }*/

        if($valor > 0){
            $_SESSION['nombreCompleto'] = $fila[0];
            $_SESSION['cargo'] = $fila[2];
            header("location:redireccion.php");
        }else{
            $_SESSION['usuario_valido'] = false; 
            header("location:index.php");
        }
    
 

}



    /*$sql = "SELECT *
    FROM usuario U 
    JOIN cargo C
    ON U.idcargo = C.idcargo
    JOIN nacionalidad N ON P.idnacionalidad =N.idnacionalidad
    JOIN  departamento D ON p.idpersona = D.idempleado
    JOIN municipio M ON D.idempleado = M.iddepartamento
    JOIN registro R ON  P.idpersona = R.idpersona
    ";*/
    