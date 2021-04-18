<?php 
//---- Consulta Guardar ----
     require_once "conexion.php";
    if ($_POST == true) {
        
        if (empty($_POST['planpago']) == false) {
            $p = $_POST['planpago'];
           
            $fecha = "" . date("Y") . "-" . date("m") . "-" . date("d");

            $sql="SELECT * FROM `plandepago` as pp 
                INNER JOIN prestamos AS pr ON pp.idPrestamo = pr.idPrestamo 
                WHERE idPlanPago = '$p'";
            $sql2 = "UPDATE plandepago set estadoLetra = 1 where idPlanPago = '$p'";

                $consulta = mysqli_query($con, $sql);
                $row = mysqli_fetch_array($consulta);
                $m = "". $row['letraMensual'] ."";

            $query_registro = "INSERT INTO pagoletra (`idPlanPago`, `montoPagado`, `fechaPago`) VALUES ('$p','$m','$fecha')"; 
             
             // $respuesta = new stdClass();

             $result = mysqli_query($con, $query_registro);
            mysqli_query($con, $sql2);

             // if(!$result) {

             //    $respuesta->mensaje = "Se guardo correctamente";
                
             // }else{
             //    $respuesta->mensaje = "Ocurrió un error";
             // }
             //    echo json_encode($respuesta);

             // $_SESSION['message'] = 'Task Saved Successfully';
             // $_SESSION['message_type'] = 'success';
            echo $result;
            
        }else{
            echo "no entro";
        }     
    }


 ?>
