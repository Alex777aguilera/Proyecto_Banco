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
	<title>Acualizar Cliente</title>
</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php

                $id = $_GET['id'];
                
                require_once "conexion.php";
                $sql = "SELECT r.idRegistroCliente,r.identidad,r.nombres,r.apellidos,r.edad,r.direccion,g.genero,r.ocupacion,r.ingresosTotales FROM registrocliente r inner JOIN genero g ON r.idGenero = g.idGenero  WHERE r.idRegistroCliente = $id;";
                if($result = mysqli_query($con,$sql)){
                    if(mysqli_num_rows($result) > 0)
                    {
                    
                                        while($row = mysqli_fetch_array($result)){
                                        $id = $row['idRegistroCliente'];
                                        $identidad  = $row['identidad'];
                                        $nombre = $row['nombres'];
                                        $apellido  = $row['apellidos'];
                                        $edad = $row['edad'];
                                        $direccion  = $row['direccion'];
                                        $genero = $row['genero'];
                                        $ocupacion  = $row['ocupacion'];
                                        $ingresos = $row['ingresosTotales'];
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
                        <h4 class="page-title">Actualizar Cliente</h4>
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
                     <form class="form-horizontal" action="" method="POST" id="ajax">
                        <div class="card-body">
                            <h4 class="card-title">Editar Informacion de la persona</h4>
            
            <!--Id que trae con el metodo post -->
             <div class="row mb-3">
                <label for="lname" class="col-sm-3 control-label col-form-label">id </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID"    required value="<?php echo $id ?>">
                </div>
             
             <!--N Identidad de la persona -->
             
                <label for="lname" class="col-sm-2 control-label col-form-label">Identidad (ID)</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="identidad" id="identidad" placeholder="Identidad"  required value="<?php echo $identidad ?>">
                </div>
             </div>

             <!-- Nombre de la persona -->
             <div class="row mb-3">
                <label for="lname" class="col-sm-2 control-label col-form-label">Nombre de la Persona</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" id="nombre"  required placeholder="Nombre Completo " value="<?php echo $nombre ?>">
                </div>

             <!-- Apellido de la persona -->
                <label for="lname" class="col-sm-2 control-label col-form-label">Apellidos</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="apellido" id="apellido"  required placeholder="Apellidos " value="<?php echo $apellido ?>">
                </div>
             </div>

             <!-- Edad de la persona -->
             <div class="form-group row">
                <label for="lname" class="col-sm-2 control-label col-form-label">Edad de la persona</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="edad" id="edad" required placeholder="Edad " value="<?php echo $edad ?>">
                </div>

             <!-- Direccion del domicilios -->
                <label for="lname" class="col-sm-2 control-label col-form-label">Direccion del Domicilio</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="direccion" id="direccion"  required placeholder="Direccion " value="<?php echo $direccion ?>">
                </div>
             </div>

             <!-- Ocupaciion -->
             <div class="form-group row">
                <label for="lname" class="col-sm-2 control-label col-form-label">Ocupacion</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="ocupacion" id="ocupacion"  required placeholder="Ocupacion " value="<?php echo $ocupacion ?>">
                </div>

             <!-- Ingresos -->
                                    <div class="col-md-2">
                                        <span>Ingreso</span>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group">
                                            <input name="ingreso" type="text" class="form-control"  required placeholder="lps,5.000"
                                                aria-label="Recipient 's username" aria-describedby="basic-addon2" id="ingresos" value="<?php echo $ingresos ?>">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">HN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

             
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Genero</label>
                                    <div class="col-md-9" id="genero">
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
                                </div>
                               
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary" name="btnactualizar" id="btnactualizar">Editar</button>
                                </div>
                            </div>
                            </form>
                        </div>
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
$('#zero_config').DataTable();

function dato(valor) {
    
alert(valor);
    
}

$(document).ready(function(){
        $('#btnactualizar').click(function(){
            var datos=$('#ajax').serialize();

            $.ajax({
                type: "POST",
                url: "actualizarcliente.php",
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
                        $('#identidad').val('');
                        $('#genero').val('');
                        window.location.href = "vercliente.php";

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
