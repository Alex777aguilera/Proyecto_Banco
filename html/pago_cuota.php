<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pago Cuota</title>
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
                        <h4 class="page-title">Pago Cuota</h4>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal">
                                <div class="card-body">
                                    <h4 class="card-title">REGISTRE SU CUOTA</h4>
                                    <div class="row mb-3">

                                    <label class="col-md-2 mt-2" >Seleccione Prestamo: </label>
                                    <div class="col-md-3">

                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" name="planpago">

                                            <?php 
                                                require_once "conexion.php";
                                                

                                                $query = $db->prepare("SELECT * FROM `prestamos` as pr 
                                                    INNER JOIN cuenta as c ON pr.idCuenta = c.idCuenta
                                                    INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente");
                                               
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                 foreach ($data as $valores) {
                                                     echo "<option>--- Seleccione ---</option>";
                                                     echo "<optgroup label='Prestamos'>";
                                                     echo '<option value='.$valores[idPrestamo].'>'.$valores[idPrestamo].'-'.$valores[nombres].'-'.$valores[numeroCuenta]. '</option>';
                                                     echo "</optgroup>";
                                                    }
                                            ?>  
                                           
                                        </select>

                                    </div>
                                    
                                    <label for="lname"
                                            class="col-sm-1 control-label col-form-label">Monto a Pagar: </label>
                                        <div class="col-md-3">
                                            <input type="password" class="form-control" id="monto"
                                                placeholder="monto" name="monto">
                                        </div>

                                </div>
                                    
                                    <div class="row-lg-10">
                                        
                                        <div class="col-lg-3">
                                            <label for="lname"
                                            class="col-sm-8 control-label col-form-label" >Fecha de la Cuota</label>
                                            
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-autoclose"
                                                    placeholder="mm/dd/yyyy">
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
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

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
            
	     	<?php
                    
                        require_once "conexion.php";
                        // WHERE n.nacionalidad = '$busqueda'
                        $sql = "SELECT * FROM registrocliente";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0)
                            {
                            echo "<div class='card'>";
                                echo "<div class='card-body'>";
                                    echo "<h5 class='card-title'>Basic Datatable</h5>";
                                        echo "<div class='table-responsive'>";
                                            echo "<table id='zero_config' class='table table-striped table-bordered'>";
                                                echo "<thead>";
                                                    echo "<tr>";
                                                        echo "<th>ID</th>";
                                                        echo "<th>Prestamo</th>";
                                                        echo "<th>Monto Pagado</th>";
                                                        echo "<th>Fecha de pago</th>";
                                                        
                                                    echo "</tr>";
                                                echo "</thead>";
                                                echo "<tbody>";
                                                while($row = mysqli_fetch_array($result)){
                                                echo "<tr>";
                                                echo "<td>" . $row['idRegistroCliente'] . "</td>";
                                                echo "<td>" . $row['nombres'] . "</td>";
                                                echo "<td>" . $row['apellidos'] . "</td>";
                                                
                                                echo "<td>";
                                                    echo "<a href='#' title='Ver' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                    echo "<a href='#' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                    echo "<a href='#' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
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

function soloNumeros(e)
{
    var key = e.keycode || e.which;
    var tecla = String.fromCharCode(key).toLowerCase();
    numeros = ".0123456789";
    especiales = [44, 45, 46];
    tecla_especial = false;

    for(var i in especiales)
    {
        if(key == especiales)
        {
            tecla_especial = true;
            break;
        }
    }

    if(numeros.indexOf(tecla) == -1 && !tecla_especial)
    {

        return false;
    }

}
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
        

    </script>
