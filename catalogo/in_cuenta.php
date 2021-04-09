<?php 



    require_once "conexion.php";
                            
                    
    $txt_cuenta="";

                         
    if (isset($_POST['save'])) {
        $cuenta_ = $_POST['txt_cuenta'];
        $query = "INSERT INTO tipocuenta(descripcion) VALUES ('$cuenta_')";
        $result = mysqli_query($con, $query);
            if(!$result) {
                 die("Query Failed.");
            }
                              
        $_SESSION['message'] = 'Task Saved Successfully';
        $_SESSION['message_type'] = 'success';
         header('Location: catalogo.php');
                              
    }
 ?>