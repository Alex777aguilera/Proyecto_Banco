<?php
    //$conet=mysqli_connect('localhost','root','','financiera1');
    require_once "conexion.php";
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $genero = $_POST['genero'];
    $ocupacion = $_POST['ocupacion'];
    $ingreso = $_POST['ingreso'];
    $montoInicial = $_POST['montoInicial'];

    $sql = "INSERT INTO registrocliente (identidad, nombres, apellidos, edad, direccion, idGenero, ocupacion, ingresosTotales) 
            VALUES ('$id','$nombre','$apellido','$edad','$direccion','$genero','$ocupacion','$ingreso')";
   
    echo mysqli_query($con,$sql);
    
                                
                                $idc = 0;
                                $sql1 = "SELECT MAX(idRegistroCliente) AS idRegistroCliente FROM registrocliente";
                                                
                                     if($result1 = mysqli_query($con, $sql1))
                                     {
                                        if(mysqli_num_rows($result1) > 0)
                                        {
                                            //Aquí solo vamos a extraer el monto porque se necesita en el insert
                                            while($row = mysqli_fetch_array($result1)){
                                                           
                                              $idc = $row['idRegistroCliente'];
                                          }
                                                            
                        
                                             mysqli_free_result($result1);;
                                        }else{
                                                        
                                        }
                                     }
                                $sql2 = "INSERT INTO cuenta(fechaCreacion, idtipoCuenta, idRegistroCliente, montoNormal)
                                VALUES (CURDATE(),1,$idc,$montoInicial)";
                                if (mysqli_query($con, $sql2)) {
                                    //echo "New record created successfully";
                                } else {
                                    //echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                                }
                            
                                $sql3 = "INSERT INTO cuenta(fechaCreacion, idtipoCuenta, idRegistroCliente, montoNormal)
                                VALUES (CURDATE(),2,$idc,0)";
                                if (mysqli_query($con, $sql3)) {
                                    //echo "New record created successfully";
                                } else {
                                    //echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
                                }
                                mysqli_close($con);
                            	 
?>

