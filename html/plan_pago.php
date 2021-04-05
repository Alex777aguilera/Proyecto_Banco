<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Plan de Pago</title>
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
                        <h4 class="page-title">Plan de Pago</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Plan de Pago</li>
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
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">Transaccion</h4>
                                    <div class="row mb-3">

                                    <label class="col-md-3 mt-3">Single Select</label>
                                    <div class="col-md-3">
                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;">
                                            <?php 
                                            require_once "conexion.php";
                                            $query ="SELECT * FROM `prestamos` as p INNER JOIN cuenta as c ON p.idCuenta = c.idCuenta";                                           while ($valores = mysqli_fetch_array($query))  {
                                            echo "<option>Select</option>";
                                            echo "<optgroup label='Prestamos'>";
                                            echo '<option value="'.$valores[idPrestamo].'">'.$valores[idPrestamo].'</option>';
                                            echo "</optgroup>";
                                            }
                                             ?>
                                           
                                        </select>
                                    </div>
                                    <label for="lname" class="col-sm-3 control-label col-form-label">Last
                                            Name</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="lname"
                                                placeholder="Last Name Here">
                                        </div>
                                </div>
                                    
                                    <div class="row mb-3">
                                        <label for="lname"
                                            class="col-sm-3 control-label col-form-label">Password</label>
                                        <div class="col-md-3">
                                            <input type="password" class="form-control" id="lname"
                                                placeholder="Password Here">
                                        </div>
                                    
                                        <label for="email1"
                                            class="col-sm-3 control-label col-form-label">Company</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="email1"
                                                placeholder="Company Name Here">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="cono1"
                                            class="col-sm-3 control-label col-form-label">Contact No</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="cono1"
                                                placeholder="Contact No Here">
                                        </div>
                                    
                                        <label for="cono1"
                                            class="col-sm-3 control-label col-form-label">Message</label>
                                        <div class="col-md-3">
                                            <textarea class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary">Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
	     	<?php
                        $sql = "SELECT * FROM plandepago";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>ID</th>";
                                            echo "<th>Prestamo</th>";
                                            echo "<th>Monto</th>";
                                            echo "<th>Intereses</th>";
                                            echo "<th>Letra Mensual</th>";
                                            echo "<th>Fecha Pago</th>";
                                            echo "<th>Estado</th>";
                                            echo "<th>Acción</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>" . $row['idPlanPago'] . "</td>";
                                        echo "<td>" . $row['idPrestamo'] . "</td>";
                                        echo "<td>" . $row['monto'] . "</td>";
                                        echo "<td>" . $row['intereses'] . "</td>";
                                        echo "<td>" . $row['letraMensual'] . "</td>";
                                        echo "<td>" . $row['fechaPago'] . "</td>";
                                        echo "<td>" . $row['estadoLetra'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='#' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='#' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='#' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
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
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>


