<?php
  session_start();
  if ($_SESSION['cargo'] != 'Gerente' && $_SESSION['cargo'] != 'Escritorio' && $_SESSION['cargo'] != 'Caja') {
    header("location:redireccion.php");
  }
?>
<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Prestamo</title>
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
                        <h4 class="page-title">Solicitud de Prestamo</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Prestamo</li>
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
                            <form class="form-horizontal" method="POST" id="formulario1" action="prestamo.php"> 
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="row mb-3">

                                    <label class="col-md-3 mt-2" >Seleccione Cuenta del cliente: </label>
                                    <div class="col-md-5">

                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" name="idCuenta" id="idCuenta" required="" onchange="numer(this.value);">
                                            <option value="">--- Seleccione ---</option>
                                            <optgroup label='Cuenta'>
                                            <?php 
                                                require_once "conexion.php";
                                                


                                                $query = $db->prepare("SELECT * FROM cuenta as c    INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente WHERE idTipoCuenta = '1'");
                                               
                                                $query->execute();
                                                $data = $query->fetchAll();

                                                 foreach ($data as $valores) {
                                                     
                                                     echo '<option value='.$valores[idCuenta].'>'.$valores[idCuenta].'-'.$valores[nombres].' '.$valores[apellidos].'-'.$valores[numeroCuenta]. '</option>';
                                                     
                                                    }
                                                    
                                            ?>  
                                           </optgroup>
                                        </select>

                                    </div>
                                    
                                    <label for="lname"
                                            class="col-sm-1 control-label col-form-label">Monto : </label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="monto"onkeypress="return soloNumeros(event)"
                                                placeholder="monto" name="monto" required="">
                                                
                                        </div>

                                </div>
                                <div class="row mb-6">
                                    <label class="col-md-3 mt-2" >Seleccione el plazo: </label>
                                    <div class="col-md-2">
                                        <select class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;" name="plazo" id="plazo" onchange="dato(this.value);" required="">
                                            <option value="" >--- Seleccione ---</option>
                                             <optgroup label='Plazo'>
                                                <option value="1">1 año</option>
                                                <option value="2">2 año</option>
                                                <option value="3">3 año</option>
                                                <option value="4">4 año</option>
                                                <option value="5">5 año</option>
                                                <option value="6">6 año</option>
                                            </optgroup>
                                        </select>

                                    </div>

                                        <div id="Itasa">
                                            
                                        </div>
                                        
                                </div>
                                    
                                    
                                    
                                </div>
                                <div class="border-top">
                                    <div class="card-body">

                                        <button class="btn btn-primary" id="enviar">Agregar</button>
                                        
                                    </div>
                                </div>
                            </form>
                            
                                <div class="card-body">
                                     <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
               
                
                $idCuenta = $_POST['idCuenta'];
                $saldo = (double)$_POST['monto'];
                $plazo = $_POST['plazo'];
                $numeroCuotas = 0;
                    $interes = 0;

                   // $saldo = $_POST['monto'];
                    
                    if ($_POST['plazo'] == 1) {
                        $numeroCuotas = 12;
                        $interes = 0.12;
                    }else if($_POST['plazo'] == 2){
                        $numeroCuotas = 24;
                        $interes = 0.24;
                    }else if($_POST['plazo'] == 3){
                        $numeroCuotas = 36;
                        $interes = 0.36;
                    }else if($_POST['plazo'] == 4){
                        $numeroCuotas = 48;
                        $interes = 0.48;
                    }else if($_POST['plazo'] == 5){
                        $numeroCuotas = 60;
                        $interes = 0.60;
                    }else if($_POST['plazo'] == 6){
                        $numeroCuotas = 72;
                        $interes = 0.72;
                    }
                
                
               $fecha = date('Y-m-d');
                
                $query_registro = "INSERT INTO prestamos (`idCuenta`, `monto`, `fechaInicioPrestamo`, `plazo`, `tasa`) VALUES ('$idCuenta','$saldo','$fecha','$plazo','$interes')"; 
                 
                 

                $result = mysqli_query($con, $query_registro);

                if ($result) {
                                $ultimo_id = mysqli_insert_id($con); 
                            }else{
                               echo "No se creo registro";
                            }

                // // Plan pago

                
        
                    $tasaInteresMensual = number_format(($interes / 11.83), 6,'.', '');
                    // echo 'Tasa Interes Mensual: ' . $tasaInteresMensual . "<br>";
                    $cuota = (double)$saldo / ((1-pow((1+(double)$tasaInteresMensual), -$numeroCuotas)) / (double)$tasaInteresMensual);
                    $cuota = number_format((double)$cuota, 2,'.', '');
                    // echo "Esta es la cuota: " . $cuota . "<br>";
                    
                    // echo "Tasa Interes Mensual tipo: ".gettype($tasaInteresMensual) ."<br>";
                    // echo "Cuota Tipo: ".gettype($cuota) ."<br>"; 
                    // echo "Saldo Tipo: ".gettype($saldo) ."<br>"; 


                    $fechaIni = date('Y-m-d');
                    $fechaFin = date('Y-m-d');
                    $diferencia;
                    try {
                        for ($i=1; $i <= $numeroCuotas; $i++) {     
                            $fechaFin = date('Y-m-d', strtotime($fechaIni.'+ 1 month'));
                            $diferenciaDias = DiferenciaDias($fechaIni,$fechaFin);
                            $fechaIni = $fechaFin;

                            $interesMensual;
                            $interesMensual = (double)($saldo * (($interes/360) * (int)$diferenciaDias));
                            $interesMensual = number_format($interesMensual, 2,'.', '');

                            $abonoCapital;
                            if ($i == $numeroCuotas) {
                                $abonoCapital = ((double)$cuota - (double)$interesMensual) - ((double)$cuota - (double)$interesMensual - (double)$saldo);
                            }else{
                                $abonoCapital = ((double)$cuota - (double)$interesMensual);
                            }
                            $saldo = $saldo - (double)$abonoCapital;

                            $sql = "INSERT INTO `plandepago` (`idPrestamo`, `numeroCuota`, `monto`, `intereses`, `letraMensual`,`saldo`, `fechaPago`, `estadoLetra`)
                            VALUES ('$ultimo_id', $i,".(double)$cuota.",".(double)$interesMensual.",$abonoCapital,$saldo,'$fechaIni',0)";
                            mysqli_query($con, $sql);

                            
                        }
                        // echo 'Datos Guardados<br>'; 
                         if (mysqli_query($con, $sql)) {
                            echo "<a href='pdfprestamo.php?idP=$ultimo_id' class='btn btn-success'target='_blank' style='color: white;'>Generar pdf</a>";

                            } else {
                                // header('location: prestamo.html?mensaje="error"');
                                // exit();
                            }
                    } catch (\Throwable $th) {
                        // echo "Reventó";
                    }
            }

                function DiferenciaDias($fechaInicial,$fechaFinal){
                    $fechaRestFin = date_create($fechaInicial);
                    $fechaRestIni = date_create($fechaFinal);
                    $diferencia = date_diff($fechaRestFin,$fechaRestIni)->format('%a');
                    //echo "Diferencia: " . $diferencia . "<br>";
                    return $diferencia;
                }
            
            

         ?>
                                
                            </div>
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

$('#idCuenta').change(function(e){

 $('#idCuenta').find("option:selected").each(function(){

        if ($(this).val().trim() == '') {

            alert('falta un campo');
        
                
        }


    })
  
 
  
 });


// function numer(numero){
   
//      <?php $variable = 1; ?>
//       var php = "<?php echo $variable; ?>";
//        alert(php);
//     <?php $consul = "SELECT * FROM cuenta as c INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente WHERE idCuenta = '1'";

//      ?>
    
    
// }

function dato(plazo) {
    
    var Vtasa = 0;
    if(plazo == 1){
         Vtasa = 0.12;

    }else if(plazo == 2){
        Vtasa = 0.24;
    }else if(plazo == 3){
        Vtasa = 0.32;
    }else if(plazo == 4){
        Vtasa = 0.48;
    }else if(plazo == 5){
        Vtasa = 0.60;
    }else if(plazo == 6){
        Vtasa = 0.72;
    }

    var coghtml = `
            <label for="lname"class="col-sm-1 control-label col-form-label">Tasa : </label>
                 <div class="col-md-2">
                        <input type="text" class="form-control" id="tasa" name="tasa"disabled="">
                 </div>
        `;

    document.getElementById('Itasa').innerHTML = coghtml;
    document.getElementById('tasa').value = Vtasa;

    
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

$(actabla());

//-- actualizar tabla --
function actabla(query)
{
    $.ajax(
        {
            url: 'Tprestamo.php',
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

 </script>