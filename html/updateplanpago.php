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
            <br>


            <?php 

                require_once "conexion.php";

                $id = $_GET['id'];
                // if (isset($_GET['id'])) {
                //     $id = $_GET['id'];
                    // $update = true;
                    $sql = "SELECT * FROM plandepago WHERE idPlanPago=$id";
                    

                    if($result = mysqli_query($con,$sql)){
                       
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_array($result);
                                $idpp = $row['id'];
                                $idpr = $row['idPrestamo'];
                                $monto = $row['monto'];
                                $interes = $row['intereses'];
                                $letram = $row['letraMensual'];
                                $fecha = $row['fechaPago'];
                                $estadol = $row['estadoLetra'];

                            mysqli_free_result($result);;
                        }
                    }
                    

                // }

             ?>

	    <!-- Parte en donde se trabajara -->
	    <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                        <div class="card">
                            <form class="form-horizontal" action="plan_pago.php" method="POST" id="formulario">
                                <div class="card-body">
                                    <h4 class="card-title">Transaccion</h4>
                                    <div class="row mb-3">
                                        <hr>
                                    <label for="lname" class="col-md-2 control-label col-form-label">Prestamo</label>
                                    <div class="col-md-4">
                                        <select class="select2 form-select shadow-none" name="prestamo" id="prestamo" onchange="dato(this.value);" style="width: 100%; height:36px;" value="<?php echo "$prestamo" ?>">
                                            <?php 
                                                

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
                                    <label for="lname" class="col-md-2 control-label col-form-label">Monto</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="monto" onkeypress="return soloNumeros(event)"
                                                placeholder="Monto..." name="monto" value="<?php echo "$monto" ?>">
                                        </div>
                                </div>
                                    
                                    <div class="row mb-3">
                                        <label for="lname"
                                            class="col-sm-3 control-label col-form-label">Intereses</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="intereses" onkeypress="return soloNumeros(event)"
                                                placeholder="Intereses" name="intereses" value="<?php echo "$interes" ?>">
                                        </div>
                                    
                                        <label for="lname" class="col-md-2 control-label col-form-label">Letra Mensual</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="Lmensual" name="Lmensual" onkeypress="return soloNumeros(event)" 
                                                placeholder="Letra mensual.." value="<?php echo "$letram" ?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-3">
                                
                                        <label for="lname"
                                            class="col-sm-3 control-label col-form-label">Fecha de Pago</label>
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-autoclose"
                                                    placeholder="mm/dd/yyyy" name="fecha_pago" value="<?php echo "$fecha" ?>">
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                               
                                        <label class="col-md-3">Estado letra</label>
                                        <div  for="lname" class="col-lg-2 control-label col-form-label">
                                            <select class="select2 form-select shadow-none"
                                                style="width: 100%; height:36px;" name="Eletra" value="<?php echo "$estadol" ?>">
                                                <option>--- Seleccione ---</option>
                                                <optgroup label="Estado">
                                                    <option value="0">Activo</option>
                                                    <option value="1">Inactivo</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button class="btn btn-primary" id="enviar">Agregar</button>
                                    </div>
                                </div>
                            </form>
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
            todayHighlight: true,
            format: 'yyyy-mm-dd'

            
        });

    </script>

   <script >
    
    $(document).ready(function(){
      $("#enviar").click(function(){
        var formulario = $("#formulario").serializeArray();
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "actualizarplanpago.php",
          data: formulario,

          success:function(r){
                if(r==1){
                    alert("SE AGREGO EXITOSAMENTE");
                    
                    /*$('#ingresos').val('');
                    $('#ocupacion').val('');
                    $('#direccion').val('');
                    $('#edad').val('');
                    $('#apellido').val('');
                    $('#nombre').val('');
                    $('#id').val('');
                    $('#genero').val('');*/
                }
                else{
                    alert("LOS CAMPOS ESTAN VACIOS");
                }
            }

        });
       

      });
      

        /*function limpiarformulario(formulario){
      
      $(formulario).find('input').each(function() {
          switch(this.type) {
              case 'password':
            case 'text':
                    $(this).val('');
                  break;
              case 'checkbox':
              case 'radio':
                  this.checked = false;
              }
          });
      
          $(formulario).find('select').each(function() {
              $("#"+this.id + " option[value=0]").attr("selected",true);
      
        });
      }*/
    });
</script>