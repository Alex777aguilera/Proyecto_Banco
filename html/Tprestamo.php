<?php
require_once "conexion.php";

                        // Tabla registros
                        $sql = "SELECT * FROM `prestamos` as pr 
                                                    INNER JOIN cuenta as c ON pr.idCuenta = c.idCuenta
                                                    INNER JOIN registrocliente as rc ON c.idRegistroCliente = rc.idRegistroCliente";
                        if($result = mysqli_query($con, $sql)){
                            if(mysqli_num_rows($result) > 0)
                            {
                    echo "<div class='card'>";
                        echo "<div class='card-body'>";
                            echo "<h5 class='card-title'>Basic Datatable</h5>";
                                echo "<div class='table-responsive'>";
                                    echo "<table id='zero_config' class='table table-striped table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Codigo-prestamos</th>";
                                            echo "<th>Nombre Cliente</th>";
                                            echo "<th>Cuenta</th>";
                                            echo "<th>Monto</th>";
                                            echo "<th>Fecha</th>";
                                            echo "<th>Plazo</th>";
                                            echo "<th>Intereses</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['idPrestamo'] . "</td>";
                                            echo "<td>" . $row['nombres'] . "" . $row['apellidos'] . "</td>";
                                            echo "<td>" . $row['idCuenta'] . "</td>";
                                            echo "<td>" . $row['monto'] . "</td>";
                                            echo "<td>" . $row['fechaInicioPrestamo'] . "</td>";
                                            echo "<td>" . $row['plazo'] . " años</td>";
                                            echo "<td>" . $row['tasa'] . "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                echo "</table>";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";

                                mysqli_free_result($result);;
                            }else{
                                echo "<p class='lead'><em>No hay regitros</em></p>";
                            }
                        }
                        mysqli_close($con);
                    ?>
<script>
	$('#zero_config').DataTable();
</script>