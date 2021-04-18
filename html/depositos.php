<?php
  session_start();
  if ($_SESSION['cargo'] != 'Gerente' && $_SESSION['cargo'] != 'Caja' ) {
    header("location:redireccion.php");
  }
?>
<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Depositos</title>
</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
	<?php require_once('menu_base.php'); ?>	


    <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Depositos en Cuenta de Ahorro</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
            <!-- Metodo donde mandamos el filtro y el monto ingresado a la cuenta-->
            <form action="depositos.php" method="post">
                    <h5 class="page-title">No.Cuenta</h5><input id="cuenta" name="cuenta" type="text" require>
                    <h5 class="page-title">Monto</h5><input id="monto" name="monto" type="text" require>
                    <input type="submit" value="Guardar">
                    <?php
                    //inicializadas en cero para evitar errores de undefined
                    $filtro = 0;
                    $monto = 0;
                    $tipo = 1;
                    $montoActual = 0;
                    $montoNormal = 0;
                        require_once "conexion.php";
                        if(isset($_POST['cuenta'])){//Validmaos el método post
                            $filtro = $_POST['cuenta'];
                            $monto = $_POST['monto'];
                            
                        }
                        //Query para visualizar los datos actuales de la cuenta
                        $sql1 = "SELECT rc.identidad, rc.nombres, rc.apellidos, c.idtipoCuenta, c.montoNormal
                        FROM cuenta as c INNER JOIN registrocliente as rc on c.idRegistroCliente = rc.idRegistroCliente
                        where c.idCuenta = '$filtro'";
                        
                        if($result1 = mysqli_query($con, $sql1)){
                            if(mysqli_num_rows($result1) > 0)
                            {
                                    //Aquí solo vamos a extraer el monto porque se necesita en el insert
                                    while($row = mysqli_fetch_array($result1)){
                                        $montoNormal = $row['montoNormal'];
                                        $tipo = $row['idtipoCuenta'];
                                    } 
                                    

                                mysqli_free_result($result1);;
                            }else{
                                
                            }
                        }
                        //sumamos el monto ingresado y el montoNormal extraido en la query anterior
                        $montoActual = $monto + $montoNormal;
                        if($tipo == 1)
                        {
                            //Insertamos en la tabla transaccioncuenta, pendiente de fecha idTipoTransaccion 1
                            $sql2 = "INSERT INTO transaccioncuenta (idCuenta, fechaTransaccion, montoTransaccion, saldoActual, saldoTotal, idTipoTransaccion)
                                    VALUES ($filtro,CURDATE(), $monto, $montoNormal, $montoActual, 1)";
                            if (mysqli_query($con, $sql2)) {
                                //echo "New record created successfully";
                            } else {
                                //echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                            }
                            //Aquí actualizamos el saldo actual de la tabla cuenta
                            $sql3 = "UPDATE cuenta SET montoNormal= $montoActual WHERE idCuenta = $filtro";
                            if (mysqli_query($con, $sql3)) {
                                //echo "New record created successfully";
                            } else {
                                //echo "Error: " . $sql3 . "<br>" . mysqli_error($con);
                            }
                            //Aquí mostramos el historial de los depositos realizados 
                            $sql = "SELECT c.idCuenta, rc.nombres, tc.fechaTransaccion, tc.montoTransaccion, tc.saldoActual, tc.saldoTotal
                            FROM transaccioncuenta as tc INNER JOIN cuenta as c on tc.idCuenta = c.idCuenta
                                                        INNER JOIN registrocliente rc on rc.idRegistroCliente = c.idRegistroCliente
                            WHERE tc.idTipoTransaccion = 1 and c.idCuenta = '$filtro';";
                            if($result = mysqli_query($con, $sql)){
                                if(mysqli_num_rows($result) > 0)
                                {
                                echo "<div class='card'>";
                                    echo "<div class='card-body'>";
                                        echo "<h5 class='card-title'>Basic Datatable</h5>";
                                            echo "<div class='table-responsive'>";
                                                echo "<table id='zero_config' class='table table-bordered table-striped'>";
                                                    echo "<thead>";
                                                        echo "<tr>";
                                                            echo "<th>No.Cuenta</th>";
                                                            echo "<th>Nombres</th>";
                                                            echo "<th>Fecha</th>";
                                                            echo "<th>Monto Depositado</th>";
                                                            echo "<th>Saldo Anterior</th>";
                                                            echo "<th>Saldo Actual</th>";
                                                        echo "</tr>";
                                                    echo "</thead>";
                                                    echo "<tbody>";
                                                        while($row = mysqli_fetch_array($result)){
                                                            echo "<tr>";
                                                                echo "<td>" . $row['idCuenta'] . "</td>";
                                                                echo "<td>" . $row['nombres'] . "</td>";
                                                                echo "<td>" . $row['fechaTransaccion'] . "</td>";
                                                                echo "<td>" . $row['montoTransaccion'] . "</td>";
                                                                echo "<td>" . $row['saldoActual'] . "</td>";
                                                                echo "<td>" . $row['saldoTotal'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                     echo "</tbody>";
                                                echo "</table>";
                                             echo "</div>"; 
                                        echo "</div>";
                                    echo "</div>";           
                                    mysqli_free_result($result);;
                                }else{
                                    echo "<p class='lead'><em>No hay regitros</em></p>";
                                }
                            }
                            mysqli_close($con); 
                        }else {
                            echo "<p class='lead'><em>No se puede realizar la transacción</em></p>";
                        }
                    ?>
                    
            </form>
	     	
	    </div>
        <!--  -->

        <?php require_once('footer.php'); ?>
    </div>

    
 </div>
</body>
<?php require_once('enlaces.php'); ?>	
</html>

<script>

$('#zero_config').DataTable();

    </script>