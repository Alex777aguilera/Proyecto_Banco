<?php

include("conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM cargo WHERE idCargo = $id";
  $result = mysqli_query($con, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Removed Successfully';
  $_SESSION['message_type'] = 'danger';
  header('Location: ver_cargo.php');
}

?>