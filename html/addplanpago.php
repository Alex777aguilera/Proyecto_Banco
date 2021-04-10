<?php 
//---- Consulta Guardar ----
     require_once "conexion.php";
    if ($_POST == true) {
        echo $_POST['prestamo'],"<br>",$_POST['monto'],"<br>",$_POST['intereses'], "<br>",$_POST['Lmensual'], "<br>",$_POST['fecha_pago'], "<br>",$_POST['Eletra'];
        if (empty($_POST['prestamo']) == false) {
            $pr = $_POST['prestamo'];
            $m = $_POST['monto'];
            $i = $_POST['intereses'];
            $lm = $_POST['Lmensual'];
            $fp = $_POST['fecha_pago'];
            $el = $_POST['Eletra'];
            
            $query_registro = "INSERT INTO plandepago (`idPrestamo`, `monto`, `intereses`, `letraMensual`, `fechaPago`, `estadoLetra`) VALUES ('$pr','$m','$i','$lm','$fp','$el')"; 
             
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