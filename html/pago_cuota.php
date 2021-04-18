<?php
  session_start();
  if ($_SESSION['cargo'] != 'Gerente' && $_SESSION['cargo'] != 'Caja' ) {
    header("location:redireccion.php");
  }
?>
<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pago Cuota</title>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                        <h4 class="page-title">PAGO DE CUOTA</h4>
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
                            <form class="form-horizontal" id="formulario"> 
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="row mb-3">

                                    <label class="col-md-3 mt-2" >Seleccione su plan de Pago: </label>
                                    <div class="col-md-5">

                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" name="planpago" id="planpago">
                                            <option value="0">--- Seleccione ---</option>

                                            <?php 
                                                require_once "conexion.php";
                                                


                                                $query = $db->prepare("SELECT pp.monto, rc.nombres, rc.apellidos,pp.idPlanPago, pp.numeroCuota  FROM `plandepago` as pp 
                                                    INNER JOIN prestamos AS pr ON pp.idPrestamo = pr.idPrestamo 
                                                    INNER JOIN cuenta as c ON pr.idCuenta = c.idCuenta 
                                                    INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente WHERE estadoLetra = '0' 
                                                        ");
                                               
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                
                                                echo "<optgroup label='Plan de Pago'>";
                                                 foreach ($data as $valores) {
                                                    $sl = ''.$valores[estadoLetra]. '';
                                                    if ($sl == 0) {
                                                        $sl = "No Cancelado";
                                                    
                                                     echo '<option value='.$valores[idPlanPago].'>'.$valores[idPlanPago].'-'.$valores[nombres].'-'.$valores[apellidos]. '-' .$valores[numeroCuota]. '-' .$valores[monto]. '-' .$sl.'</option>';
                                                    }
                                                     
                                                    }
                                                    echo "</optgroup>";
                                            ?>  
                                           
                                        </select>

                                    </div>
                                    
                                </div>
                                    
                                    <div class="row-lg-10">
                                        
                                        <div class="col-lg-3">
                                            <label for="lname"
                                            class="col-sm-8 control-label col-form-label" ><?php 
                                            $fecha = "" . date("Y") . "-" . date("m") . "-" . date("d"); 
                                            // echo $fecha; ?></label>
                                            
                                        </div>
                                        <!-- <div class="col-lg-3">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="datepicker-autoclose"
                                                    placeholder="mm/dd/yyyy" name="fecha">
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->


                                    
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
	     	<div id="Tabla">
                     
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





function dato(valor) {
    
//alert(valor);
    
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

    $(buscar());

//-- actualizar tabla --
function buscar(query)
{
    $.ajax(
        {
            url: 'T_pagocuota.php',
            type: 'POST',
            dataType: 'html',
            data: {query, query},
        })
        .done(function(resp)
        {
            $("#Tabla").html(resp);
        })
        .fail(function()
        {
            console.log("Error");
        })
}

$(document).on('klick', '#enviar', function()
{ 
    

})

        
        $(document).ready(function(){
          $("#enviar").click(function(){
            var formulario = $("#formulario").serialize();
            $.ajax({
              type: "POST",
              url: "addpagocuota.php",
              data: formulario,

              success:function(r){
                alert (r);
                    if(r==1){
                        alert("SE AGREGO EXITOSAMENTE");
                        $(buscar());
                        $('#planpago').val('0');
                        $('#monto').val('');
                        


                    }
                    else{
                        alert("LOS CAMPOS ESTAN VACIOS");
                    }
                }

            });
            return false;

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