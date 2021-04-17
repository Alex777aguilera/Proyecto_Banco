<?php 

    require_once "conexion.php";
                            
        $txt_transaccion = "";
                            

         if (isset($_POST['save1'])) {
            $transaccion_ = $_POST['txt_transaccion'];
            $query = "INSERT INTO tipotransaccion(descripcion) VALUES ('$transaccion_')";
            $result = mysqli_query($con, $query);
                if(!$result) {
                  die("Query Failed.");
                }
                              
                $_SESSION['message'] = 'Task Saved Successfully';
                $_SESSION['message_type'] = 'success';
                header('Location: tipo_transaccion.php');
                              
            }

                           

                        
    
                            
 ?>