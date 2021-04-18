<?php
  session_start();
  if ($_SESSION['cargo'] != 'Gerente') {
    header("location:redireccion.php");
  }
?>


<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Actualizar Tipo Cuenta</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
</head>
<body>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php

$id = $_GET['id'];

require_once "conexion.php";
$sql = "SELECT tipocuenta FROM descripcion WHERE idTipoCuenta = $id;";
if($result = mysqli_query($con,$sql)){
    if(mysqli_num_rows($result) > 0)
    {
    
                        while($row = mysqli_fetch_array($result)){
                        $id = $row['idTipoCuenta'];
                        $identidad  = $row['descripcion'];
                        
                    }
        mysqli_free_result($result);;
    }else{
        echo "<p class='lead'><em>No hay regitros</em></p>";
    }
}

?>
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
                    <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal"  action="update_cuenta.php" method="POST" id="ajax" >
                                <div class="card-body">
                               
                                    <h4 class="card-title">Actualizar Tipo Cuenta</h4>
                                    <input type="text"  visibility: hidden class="form-control" name="id" id="id" placeholder="ID"    required value="<?php echo $id ?>" >
                                    <div class="form-group row">
                                    
                                 
                                  
                                        <label for="fname"
                                            class="col-sm-4 text-end control-label col-form-label">Descripcion</label>
                                        <div class="col-sm-4">
        
                                            <input type="text" class="form-control" name="descripcion" id="descripcion" 
                                                placeholder="Descripcion de la Cuenta" >
                                                
                                        </div>

                                        <div class="col-sm-4">
                                        <button type="submit" name="update" value="update" id="btnactualizar" class="btn btn-primary" style= margin-left:10px >Update</button>
                                        </div>

                                    </div>
                                    
                                </div>
                            
                            </form>
                            


                            
                        </div>     
                    </div>
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

<script>
$('#zero_config').DataTable();

function dato(valor) {
    
alert(valor);
    
}

$(document).ready(function(){
        $('#btnactualizar').click(function(){
            var datos=$('#ajax').serialize();

            $.ajax({
                type: "POST",
                url: "actualizar_cuenta.php",
                data: datos,
                success:function(r){
                    if(r==1){
                        alert("SE AGREGO EXITOSAMENTE");
                        
                        $('#descripcion').val('');
                        $('#id').val('');
                        
                        window.location.href = "ver_cuenta.php";

                    }
                    else{
                        alert("LOS CAMPOS ESTAN VACIOS");
                    }
                }

            });
            return false;
      });
    });

    </script>