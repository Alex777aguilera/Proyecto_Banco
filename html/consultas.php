<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Consultas</title>
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
                        <h4 class="page-title">Consultas</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Consultas</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
                    <form action="consultas.php" method="post">
                    <h5 class="page-title">No.Cuenta</h5><input id="filtro" name="filtro" type="text">
                        <input type="submit" value="Buscar">
                    </form>
	     	<?php
                    
                        require_once "conexion.php";
                        $filtro = $_POST['filtro']; 
                        $sql = "SELECT rc.identidad, rc.nombres, rc.apellidos, c.idtipoCuenta, c.montoNormal
                        FROM cuenta as c INNER JOIN registrocliente as rc on c.idRegistroCliente = rc.idRegistroCliente
                        where c.idtipoCuenta = 1 and c.idCuenta = '$filtro'";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<div>";
                                    //echo $filtro;
                                echo "</div>";
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Nombres</th>";
                                            echo "<th>Apellidos</th>";
                                            echo "<th>Tipo de Cuenta</th>";
                                            echo "<th>Saldo Actual</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['identidad'] . "</td>";
                                            echo "<td>" . $row['nombres'] . "</td>";
                                            echo "<td>" . $row['apellidos'] . "</td>";
                                            $tipo=0;
                                            $descripcion = "";
                                            $tipo = $row['idtipoCuenta'];
                                                if($tipo==1){
                                                    $descripcion = "Ahorros Retirables";
                                                }else if($tipo==2){
                                                    $descripcion = "Ahorros Plazo Fijo";
                                                }
                                            echo "<td> $descripcion </td>";    
                                            echo "<td>" . $row['montoNormal'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                echo "</table>";

                                mysqli_free_result($result);;
                            }else{
                                echo "<p class='lead'><em>No hay regitros</em></p>";
                            }
                        }
                        mysqli_close($con);
                    ?>
	    </div>
        <!--  -->

        <?php require_once('footer.php'); ?>
    </div>

    
 </div>
</body>
<?php require_once('enlaces.php'); ?>	
</html>
