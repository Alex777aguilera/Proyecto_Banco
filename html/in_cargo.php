<?php
      require_once "conexion.php";


           $txt_cargo = "";
    
           if (isset($_POST['save3'])) {
              $cargo_ = $_POST['txt_cargo'];
              $query = "INSERT INTO cargo(cargo) VALUES ('$cargo_')";
              $result = mysqli_query($con, $query);
                  if(!$result) {
                    die("Query Failed.");
                  }
                                
                  $_SESSION['message'] = 'Task Saved Successfully';
                  $_SESSION['message_type'] = 'success';
                  header('Location: cargo.php');
                                
              }
    ?>