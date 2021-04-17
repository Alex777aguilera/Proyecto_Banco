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
                    <!-- Metodo donde mandamos el filtro para la consulta-->
                    <form action="consultas.php" method="post"> 
                    <h5 class="page-title">No.Cuenta</h5><input id="filtro" name="filtro" type="text" require>
                        <input type="submit" value="Buscar">
                    </form>
	     	<?php
                    
                        require_once "conexion.php";
                        $filtro=0; //inicializada en cero para evitar errores de undefined
                        $montoFijo=0;
                        $tasa=0;
                        $plazo=0;
                        if(isset($_POST['filtro'])){ //Validamos el método post
                            $filtro = $_POST['filtro'];
                            
                        }
                        //Query para visualizar los datos actuales de la cuenta
                        $sql = "SELECT c.tasa, c.plazo,c.montoFijo
                        FROM cuenta as c 
                        where c.idCuenta = '$filtro'";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result1) > 0)
                            {
                                    //Aquí solo vamos a extraer el monto porque se necesita en el insert
                                    while($row = mysqli_fetch_array($result1)){
                                        $montoFijo = $row['montoFijo'];
                                        $tasa = $row['tasa'];
                                        $tasa = $row['plazo'];
                                    } 
                                    
                                    //INCOMPLETO, NO TOCAR!!!!    
                                mysqli_free_result($result1);;
                            }else{
                                
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
