<?php
  session_start();
  if ($_SESSION['cargo'] != 'Gerente' && $_SESSION['cargo'] != 'Escritorio' && $_SESSION['cargo'] != 'Caja') {
    header("location:redireccion.php");
  }
?>
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
                        <h4 class="page-title">Proyección</h4>
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
                    <!-- Metodo donde mandamos el filtro para la consulta-->
                    <form action="proyeccion.php" method="post"> 
                        <h5 class="page-title">No.Cuenta</h5><input id="cuenta" name="cuenta" type="text" require>
                        <h5 class="page-title">Años de Proyección</h5><input id="tiempo" name="tiempo"  type="number" min=1 max=5 require>
                        <input type="submit" value="Buscar"> 
                            <?php
                            
                                require_once "conexion.php";
                                $cuenta=0; //inicializada en cero para evitar errores de undefined
                                $tiempo=0;
                                $interes=0;
                                $plazo=0;
                                $montoFijo=0;
                                $sub=0;
                                $total=0;
                                if(isset($_POST['cuenta'])){ //Validamos el método post
                                    $cuenta = $_POST['cuenta'];
                                    $tiempo = $_POST['tiempo'];
                                    
                                }
                                
                                //Query para visualizar los datos actuales de la cuenta
                                $sql = "SELECT  c.idtipoCuenta, c.tasa, c.plazo, c.montoFijo 
                                FROM cuenta as c
                                WHERE c.idCuenta =$cuenta AND c.idtipoCuenta =2";
                                if($result = mysqli_query($con, $sql)){
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        echo "<table class='table table-bordered table-striped'>";
                                            echo "<thead>";
                                                echo "<tr>";
                                                    echo "<th>Monto Depositado</th>";
                                                    echo "<th>Tasa</th>";
                                                    echo "<th>Plazo Proyectado</th>";
                                                    echo "<th>Monto Proyectado</th>";
                                                echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";
                                                //Aquí solo vamos a extraer el monto porque se necesita en el insert
                                            while($row = mysqli_fetch_array($result)){
                                                $montoFijo = $row['montoFijo'];
                                                $tasa = $row['tasa'];
                                                $plazo = $row['plazo'];
                                            
                                                if($tiempo<=$plazo){

                                                    if($tiempo ==1){
                                                        echo "<td> $montoFijo </td>";
                                                        echo "<td> $tasa % </td>";
                                                        echo "<td> $tiempo años</td>";
                                                        $interes = $montoFijo*($tasa/100);
                                                        $sub = $interes*12;
                                                        $total= $montoFijo+$sub;
                                                        echo "<td> $total </td>";

                                                    }elseif($tiempo ==2){
                                                        echo "<td> $montoFijo </td>";
                                                        echo "<td> $tasa % </td>";
                                                        echo "<td> $tiempo años</td>";
                                                        $interes = $montoFijo*($tasa/100);
                                                        $sub = $interes*24;
                                                        $total= $montoFijo+$sub;
                                                        echo "<td> $total </td>";

                                                    }elseif($tiempo ==3){
                                                        echo "<td> $montoFijo </td>";
                                                        echo "<td> $tasa % </td>";
                                                        echo "<td> $tiempo años</td>";
                                                        $interes = $montoFijo*($tasa/100);
                                                        $sub = $interes*36;
                                                        $total= $montoFijo+$sub;
                                                        echo "<td> $total </td>";

                                                    }elseif($tiempo ==4){
                                                        echo "<td> $montoFijo </td>";
                                                        echo "<td> $tasa % </td>";
                                                        echo "<td> $tiempo años</td>";
                                                        $interes = $montoFijo*($tasa/100);
                                                        $sub = $interes*48;
                                                        $total= $montoFijo+$sub;
                                                        echo "<td> $total </td>";

                                                    }elseif($tiempo ==5){
                                                        echo "<td> $montoFijo </td>";
                                                        echo "<td> $tasa % </td>";
                                                        echo "<td> $tiempo años</td>";
                                                        $interes = $montoFijo*($tasa/100);
                                                        $sub = $interes*60;
                                                        $total= $montoFijo+$sub;
                                                        echo "<td> $total </td>";

                                                    }


                                                }else{
                                                    echo "El tiempo solicitado extiende el plazo original de deposito";
                                                    echo "<td> N/A </td>";
                                                    echo "<td> N/A </td>";
                                                    echo "<td> N/A </td>";
                                                    echo "<td> N/A </td>";
                                                }




                                                
                                                echo "</tr>";
                                            }
                                                echo "</tbody>";
                                        echo "</table>";
                                            //INCOMPLETO, NO TOCAR!!!!    
                                        mysqli_free_result($result);;
                                    }else{
                                       echo "La cuenta debe ser de Plazo Fijo"; 
                                    }
                                }
                                mysqli_close($con);
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
