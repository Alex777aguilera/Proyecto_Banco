
<!DOCTYPE html>
<html dir="Banco_web" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Acualizar Usuario</title>
</head>
<body>
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php

            if(isset($_GET['id'])){
                $id = $_GET['id'];
                
                require_once "conexion.php";
                $sql = "SELECT u.idUsuario, u.username,u.password,r.nombres FROM usuario u INNER JOIN registroempleado r ON u.idRegistroEmpleado = r.idRegistroEmpleado WHERE u.idUsuario = $id";
                if($result = mysqli_query($con,$sql)){
                    if(mysqli_num_rows($result) > 0)
                    {
                    
                                        while($row = mysqli_fetch_array($result)){
                                        $id = $row['idUsuario'];
                                        $usuario  = $row['username'];
                                        $contra = $row['password'];
                                        $empleado  = $row['nombres'];

                                    }
                        mysqli_free_result($result);;
                    }else{
                        echo "<p class='lead'><em>No hay regitros</em></p>";
                    }
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
                        <h4 class="page-title">Actualizar Usuario</h4>
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
                     <form class="form-horizontal" action="editar_usuario.php" method="POST" id="ajax">
                        <div class="card-body">
                            <h4 class="card-title">Editar Informacion de la persona</h4>
            
            <!--Id que trae con el metodo post -->
             <div class="row mb-3">
                <label for="lname" class="col-sm-3 control-label col-form-label">id </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="id" id="id" placeholder="ID"    required value="<?php echo $id ?>">
                </div>
             
             <!-- -->
             
                <label for="lname" class="col-sm-2 control-label col-form-label">Nombre de Usuario</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="usuari" id="usuari" placeholder="Nombre de Usuario"  required value="<?php echo $usuario ?>">
                </div>
             </div>

             <!-- -->
             <div class="row mb-3">
                <label for="lname" class="col-sm-2 control-label col-form-label">Contraseña del Usuario</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="contra" id="contra"  required placeholder="Contraseña del Usuario " value="<?php echo $contra ?>">
                </div>
            </div>
             
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <div class="form-group row">
                                    <label class="col-md-3 mt-3">Empelado</label>
                                    <div class="col-md-9" id="empleado">
                                        <select class="select2 form-select shadow-none"style="width: 100%; height:36px;" name="empleado">
                                            <option value=""><?php echo $empleado ?></option>
                                            <?php
                                            require_once "conexion.php";

                                                $sql="SELECT idRegistroEmpleado,nombres FROM registroempleado";
                                                $resultado = mysqli_query($con, $sql) or die (mysqli_error($conexcion));
                                                while($lista=mysqli_fetch_assoc($resultado))
                                                
                                                echo "<option  value='".$lista["idRegistroEmpleado"]."'>".$lista["nombres"]."</option>"; 
                                               
                                          ?>
                                        
                                        </select>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary" name="btnactualizar" id="btnactualizar">Editar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                  </div>
             </div>

        </div>
       

<?php
    if($_POST == true){

        $id = $_POST['id'];
        $nombre = $_POST['usuari'];
        $contra = $_POST['contra'];
        $empleado = $_POST['empleado'];

        echo $_POST['id'];
      try {
                $sql = "UPDATE `usuario` SET `username`='$nombre',`password`='$contra',`idRegistroEmpleado`='$empleado' 
                WHERE `idUsuario`='$id'";  
                $e = mysqli_query($con,$sql);
            if($e == 1) {
                    echo "<script> 
                    window.location='lista_usuario.php';
                    </script>" ;

                }
                
        } catch (Exception $e) {
                $e->getMessage();
        }
    
    }
    
    
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

/*$(document).ready(function(){
        $('#btnactualizar').click(function(){
            var datos=$('#ajax').serialize();
            //var fd = new FormData(document.getElementById("ajax"));
            $.ajax({
                type: "POST",
                url: "actualizarusuario.php",
                data: datos,
                success:function(r){
                    if(r==1){
                        alert("SE AGREGO EXITOSAMENTE");
                        
                      

                    }
                    else{
                        alert("LOS CAMPOS ESTAN VACIOS");
                       
                        
                    }
                }

            });
            return false;
      });
    });*/

    </script>
