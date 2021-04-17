<?php
      require_once "conexion.php";


           $txt_genero = "";
    
           if (isset($_POST['save2'])) {
              $genero_ = $_POST['txt_genero'];
              $query = "INSERT INTO genero(genero) VALUES ('$genero_')";
              $result = mysqli_query($con, $query);
                  if(!$result) {
                    die("Query Failed.");
                  }
                                
                  $_SESSION['message'] = 'Task Saved Successfully';
                  $_SESSION['message_type'] = 'success';
                  header('Location: genero.php');
                                
              }
    ?>