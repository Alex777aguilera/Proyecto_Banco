<?php 
//---- Consulta Guardar ----
     require_once "conexion.php";
    if ($_POST == true) {
        echo $_POST['planpago'],"<br>",$_POST['monto'],"<br>",$_POST['fecha'];
        if (empty($_POST['planpago']) == false) {
            $p = $_POST['planpago'];
            $m = $_POST['monto'];
            $f = $_POST['fecha'];


            $query_registro = "INSERT INTO pagoletra (`idPlanPago`, `montoPagado`, `fechaPago`) VALUES ('$p','$m','$f')"; 
             
             $respuesta = new stdClass();

             $result = mysqli_query($con, $query_registro);
             if(!$result) {

                $respuesta->mensaje = "Se guardo correctamente";
                
             }else{
                $respuesta->mensaje = "Ocurrió un error";
             }
                echo json_encode($respuesta);

             $_SESSION['message'] = 'Task Saved Successfully';
             $_SESSION['message_type'] = 'success';
            echo "entro";
        }else{
            echo "no entro";
        }     
    }


 ?>