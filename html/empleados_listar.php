<?php
    require('conexion.php');
    $sql_gen = "SELECT * FROM registroempleado";
    $result1 = mysqli_query($con, $sql_gen);

    mysqli_close($con);
?>
<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Listar Empleados</title>

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
                        <h4 class="page-title">Listado de Empleados</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Listado de Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
            
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-0">Tabla de Empleados Registrados</h5>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-weight: bold;"># (ID)</th>
                                        <th scope="col" style="font-weight: bold;">N° de Identidad</th>
                                        <th scope="col" style="font-weight: bold;">Nombre</th>
                                        <th scope="col" style="font-weight: bold;">Apellido</th>
                                        <th scope="col" style="font-weight: bold;">Edad</th>
                                        <th scope="col" style="font-weight: bold;">Dirección</th>
                                        <th scope="col" style="font-weight: bold;">Cargo (ID)</th>
                                        <th scope="col" style="font-weight: bold;">Género (ID)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php
                                            if (mysqli_num_rows($result1) > 0) {
                                                while($row = mysqli_fetch_assoc($result1)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row["idRegistroEmpleado"]. "</td>";
                                                    echo "<td>" . $row["identidad"]. "</td>";
                                                    echo "<td>" . $row["nombres"]. "</td>";
                                                    echo "<td>" . $row["apellidos"]. "</td>";
                                                    echo "<td>" . $row["edad"]. "</td>";
                                                    echo "<td>" . $row["direccion"]. "</td>";
                                                    echo "<td>" . $row["idCargo"]. "</td>";
                                                    echo "<td>" . $row["idGenero"]. "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<th colspan='8'>No hay registros.</th>";
                                            }
                                        ?>
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
            </div>
	    </div>
        <?php require_once('footer.php'); ?>
    </div>

    
 </div>
</body>
<?php require_once('enlaces.php'); ?>	
</html>
<script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function () {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function (value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        /*
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        */
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../js/empleados.js"></script>