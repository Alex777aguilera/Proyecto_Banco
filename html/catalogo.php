


<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Principal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
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
                        <h4 class="page-title">Formularios</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Formularios</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
	     	<div class="row">
                    
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <form class="form-horizontal" action="in_cuenta.php" method="POST">
                                <div class="card-body">
                                    <h4 class="card-title">Tipo de Cuenta</h4>
                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-sm-3 text-end control-label col-form-label">Descripcion</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="txt_cuenta" name="txt_cuenta"
                                                placeholder="Descripcion de la Cuenta">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                    
                                        <button type="submit" name="save" value="save" class="btn btn-primary" style= margin-left:80px>Submit</button>
                                    </div>
                                </div>
                            </form>

                            <?php
                              require_once "conexion.php";


                                   $sql = "SELECT *
                                   FROM tipoCuenta ";
                                   if($result = mysqli_query($con, $sql)){
                                      if(mysqli_num_rows($result) > 0) {
                               
                                          echo "<div class='row'>";
                                          echo "<div class='col-md-10' style= margin-left:100px>";
                                          echo "<div class='card'>";
                                          echo "<table class='table table-bordered table-striped'>";
                                          echo "<thead>";
                                          echo "<tr>";
                                          echo "<th>ID</th>";
                                          echo "<th>Descripcion Tipo transaccion</th>";
                                          echo "</tr>";
                                          echo "</thead>";
                                          echo "<tbody>";
                                          while($row = mysqli_fetch_array($result)){
                                          echo "<tr>";
                                          echo "<td>" . $row['idTipoCuenta'] . "</td>";
                                          echo "<td>" . $row['descripcion'] . "</td>";
                                          echo "<td>";
                                          echo "<a href='update_cuenta.php?id=". $row['idTipoCuenta'] ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                          echo "<a href='delete_cuenta.php?id=". $row['idTipoCuenta'] ."' title='Eliminar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                          echo "</td>";
                                          }
                                         echo "</tbody>";
                                         echo "</table>";
                                         echo "</div>";
                                         echo "</div>";
                                         echo "</div>";


                                          mysqli_free_result($result);;
                                         }else{
                                         echo "<p class='lead'><em>No Existe</em></p>";
                                        }
                                        }


                                       
                    //cerrar conexion
                                         mysqli_close($con);
                
                        
                              
                            ?>

                           

                            
                
                            
                        </div>
                    </div>
                <!-- editor -->
             </div>
             
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

