<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ahorro a Plazo Fijo</title>
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
                        <h4 class="page-title">Ahorro a Plazo Fijo</h4>
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
            <form action="plazofijo.php" method="post">
                        <h5 class="page-title">No.Cuenta</h5><input id="cuenta" name="cuenta" type="text" require>
                        <h5 class="page-title">Monto</h5><input id="monto" name="monto" type="text" require>
                        <h5 class="page-title">Plazo</h5><input id="plazo" name="plazo" type="number" min=1 max=5 require>
                        <input type="submit" value="Guardar">
	     	        <?php
                    $filtro = 0;
                    $monto = 0;
                    $plazo = 0;
                    $tasa = 0;
                        require_once "conexion.php";
                        if(isset($_POST['cuenta'])){//Validmaos el método post
                            $filtro = $_POST['cuenta'];
                            $monto = $_POST['monto'];
                            $plazo = $_POST['plazo'];
                        }
                        if($monto>= 5000 && $monto<=100000){
                            if($plazo ==1){
                                $tasa = 1;
                            }elseif($plazo ==2){
                                $tasa = 1.5;
                            }elseif($plazo ==3){
                                $tasa = 2;
                            }elseif($plazo ==4){
                                $tasa = 2.5;
                            }elseif($plazo ==5){
                                $tasa = 3;
                            }
                        
                            $sql1 = "UPDATE cuenta SET tasa = $tasa, plazo = $plazo, montoFijo =$monto 
                            WHERE idCuenta = $filtro AND idtipoCuenta = 2";
                            
                            if (mysqli_query($con, $sql1)) {
                                echo "Acción realizada correctamente";
                            } else {
                                echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
                            }
                            //Aquí mostramos el historial de los depositos realizados 
                            $sql = "SELECT c.idCuenta, rc.nombres, c.montoFijo, c.plazo, c.tasa
                            FROM transaccioncuenta as tc INNER JOIN cuenta as c on tc.idCuenta = c.idCuenta
                                                        INNER JOIN registrocliente rc on rc.idRegistroCliente = c.idRegistroCliente
                            WHERE idtipoCuenta = 2 and c.idCuenta = '$filtro';";
                            
                            mysqli_close($con);
                        }else{
                            echo "Monto rechazado, el deposito de entrar en el rango de 5,000-100,000";
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
