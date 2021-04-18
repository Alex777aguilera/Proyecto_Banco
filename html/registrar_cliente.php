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
	<title>Registro Cliente</title>
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
                        <h4 class="page-title">Registro Del Cliente</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
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
                            <form class="form-horizontal" action="" method="POST" id="ajax">
                                <div class="card-body">
                                    <h4 class="card-title">Informacion de la persona</h4>
                                    <!--N Identidad de la persona -->
             <div class="form-group row">
                <label for="id" class="col-sm-3 text-end control-label col-form-label">Identidad (ID)</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID"  required>
                </div>
             </div>

             <!-- Nombre de la persona -->
             <div class="form-group row">
                <label for="lname" class="col-sm-2 control-label col-form-label">Nombre de la Persona</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" id="nombre"  required placeholder="Nombre Completo ">
                </div>
            

             <!-- Apellido de la persona -->
                <label for="lname" class="col-sm-1 control-label col-form-label">Apellidos</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="apellido" id="apellido"  required placeholder="Apellidos ">
                </div>
             </div>

             <!-- Edad de la persona -->
             <div class="form-group row">
                <label  for="lname" class="col-sm-2 control-label col-form-label">Edad de la persona</label>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="edad" id="edad" required placeholder="Edad ">
                </div>
            
             <!-- Direccion del domicilios -->
                <label for="lname" class="col-sm-2 control-label col-form-label">Direccion del Domicilio</label>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="direccion" id="direccion"  required placeholder="Direccion ">
                </div>
             </div>
             
              <div class="form-group row">  
             <!-- Ocupaciion -->
                <label for="lname" class="col-sm-2 control-label col-form-label">Ocupacion</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="ocupacion" id="ocupacion"  required placeholder="Ocupacion ">
                </div>

             <!-- Ingresos -->
                                    <div class="col-md-1">
                                        <span>Ingreso</span>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input name="ingreso" type="text" class="form-control"  required placeholder="lps,5.000"
                                                aria-label="Recipient 's username" aria-describedby="basic-addon2" id="ingresos">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">HN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

             
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="form-group row">
                                    <label class="col-md-2 mt-3">Genero</label>
                                    <div class="col-md-3" id="genero">
                                        <select class="select2 form-select shadow-none"style="width: 100%; height:36px;" name="genero">
                                            <option value="">--Seleccionar--</option>
                                            <?php
                                            require_once "conexion.php";

                                                $sql="SELECT idGenero,genero FROM genero";
                                                $resultado = mysqli_query($con, $sql) or die (mysqli_error($conexcion));
                                                while($lista=mysqli_fetch_assoc($resultado))
                                                
                                                echo "<option  value='".$lista["idGenero"]."'>".$lista["genero"]."</option>"; 
                                                mysqli_close($con);
                                          ?>
                                        
                                        </select>
                                    </div>
                                        <div class="col-md-2">
                                            <span>Monto Inicial</span>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <input name="montoInicial" type="text" class="form-control"  required placeholder="Lps.1000"
                                                    aria-label="Recipient 's username" aria-describedby="basic-addon2" id="montoInicial">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="basic-addon2">HN</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
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

    <div class="form-group row">
    </div>

</body>
<?php require_once('enlaces.php'); ?>	
</html>



<script>
    $(document).ready(function(){
        $('#btnguardar').click(function(){
            var datos=$('#ajax').serialize();

            $.ajax({
                type: "POST",
                url: "insertarcliente.php",
                data: datos,
                success:function(r){
                    if(r==1){
                        alert("SE AGREGO EXITOSAMENTE");
                        
                        $('#ingresos').val('');
                        $('#ocupacion').val('');
                        $('#direccion').val('');
                        $('#edad').val('');
                        $('#apellido').val('');
                        $('#nombre').val('');
                        $('#id').val('');
                        $('#genero').val('');
                        $('#montoInicial').val('');
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