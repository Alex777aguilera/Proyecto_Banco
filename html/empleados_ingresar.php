<?php
    require('conexion.php');
    $sql_gen = "SELECT idGenero, genero FROM genero";
    $result1 = mysqli_query($con, $sql_gen);

    $sql_carg = "SELECT idCargo, cargo FROM cargo";
    $result2 = mysqli_query($con, $sql_carg);
  

/*
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
      }
    } else {
      echo "0 results";
    }
*/
    mysqli_close($con);
?>

<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ingresar Empleados</title>

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
                        <h4 class="page-title">Registro de Empleados</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Registro de Empleados</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
            
	     	<div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" id="formulario" action="empleados_ingresar_pr.php" method="POST">
                                <div class="card-body">
                                    <input type="hidden" name="accion" id="accion" value="">
                                    <input type="hidden" name="edad" id="edad">
                                    <h4 class="card-title">Información personal</h4>
                                    <div class="form-group row">
                                        <label for="identidad"
                                            class="col-sm-3 text-end control-label col-form-label">N° de Identidad</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtIdentidad" name="identidad" 
                                                placeholder="0000-0000-00000. Escriba aquí su número de identidad (RNP)." autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nombre"
                                            class="col-sm-3 text-end control-label col-form-label">Nombre</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtNombre" name="nombre" 
                                                placeholder="Escriba aquí su nombre" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="apellido" class="col-sm-3 text-end control-label col-form-label">Apellido</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtApellido" name="apellido" 
                                                placeholder="Escriba aquí su apellido" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="direccion"
                                            class="col-sm-3 text-end control-label col-form-label">Dirección</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txtDireccion" name="direccion" 
                                                placeholder="Escriba su dirección completa aquí (100 carácteres max.)" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="cono1"
                                            class="col-sm-3 text-end control-label col-form-label">Género</label>
                                        <div class="col-sm-3">
                                            <select class="select2 form-select shadow-none" id="cbxGenero" name="genero" 
                                                style="width: 100%; height:36px;">
                                                <option>Seleccione su género</option>
                                                <optgroup label="Binario">
                                                    <?php
                                                            if (mysqli_num_rows($result1) > 0) {
                                                              while($row = mysqli_fetch_assoc($result1)) {
                                                                echo "<option value='" . $row["idGenero"]. "'>" . $row["genero"]. "</option>";
                                                              }
                                                            } else {
                                                              echo "<option>No hay registros.</option>";
                                                            }
                                                    ?>
                                                </optgroup>
                                                <!--
                                                <optgroup label="No Binario">
                                                    <option value="otros">Otros</option>
                                                </optgroup>
                                                -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label for="cono1"
                                            class="col-sm-3 text-end control-label col-form-label">Cargo</label>
                                        <div class="col-sm-3">
                                            <select class="select2 form-select shadow-none" id="cbxCargo" name="cargo" 
                                                style="width: 100%; height:36px;">
                                                <option>Seleccione su cargo</option>
                                                <optgroup label="Tipo de Usuario">
                                                    <?php
                                                            if (mysqli_num_rows($result2) > 0) {
                                                              while($row = mysqli_fetch_assoc($result2)) {
                                                                echo "<option value='" . $row["idCargo"]. "'>" . $row["cargo"]. "</option>";
                                                              }
                                                            } else {
                                                              echo "<option>No hay registros.</option>";
                                                            }
                                                    ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="edad" class="col-sm-3 text-end control-label col-form-label">Fecha de Nacimiento:</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="txtFechaEdad" name="fechaEdad" class="form-control mydatepicker" placeholder="dd/mm/yyyy" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary" onclick="revisarCampos()">Registrar empleado</button>
                                    </div>
                                </div>
                            </form>
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