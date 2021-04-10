<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ver Cliente</title>
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
                        <h4 class="page-title">Ver Cliente</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Pago Cuota</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            
          

        <!-- Parte en donde se trabajara -->
       
            
	     	<?php
                    
                        require_once "conexion.php";
                        $sql = "SELECT r.idRegistroCliente,r.identidad,r.nombres,r.apellidos,r.edad,r.direccion,g.genero,r.ocupacion,r.ingresosTotales FROM registrocliente r inner JOIN genero g ON r.idGenero = g.idGenero";
                        if($result = mysqli_query($con,$sql)){
                            if(mysqli_num_rows($result) > 0)
                            {
                            echo "<div class='card'>";
                                echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>Basic Datatable</h5>";
                                        echo "<div class='table-responsive'>";
                                            echo "<table id='zero_config' class='table table-striped table-bordered'>";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                    echo "<th>Identidad (ID)</th>";
                                                    echo "<th>Nombres</th>";
                                                    echo "<th>Apellidos</th>";
                                                    echo "<th>Edad</th>";
                                                    echo "<th>Direccion</th>";
                                                    echo "<th>Genero</th>";
                                                    echo "<th>Ocupacion</th>";
                                                    echo "<th>Ingreso</th>";
                                                    echo "<th>Acción</th>";
                                                        
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                echo "<td>" . $row['identidad'] . "</td>";
                                                echo "<td>" . $row['nombres'] . "</td>";
                                                echo "<td>" . $row['apellidos'] . "</td>";
                                                echo "<td>" . $row['edad'] . "</td>";
                                                echo "<td>" . $row['direccion'] . "</td>";
                                                echo "<td>" . $row['genero'] . "</td>";
                                                echo "<td>" . $row['ocupacion'] . "</td>";
                                                echo "<td>" . $row['ingresosTotales'] . "</td>";
                                                
                                                echo "<td>";
                                                    echo "<a href='editar_cliente.php?id=". $row['idRegistroCliente'] ."' title='' data-toggle='tooltip'><span class='fas fa-pencil-alt'></span></a>";
                                                echo "</td>";
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
                    ?>
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

function dato(valor) {
    
alert(valor);
    
}



    </script>
