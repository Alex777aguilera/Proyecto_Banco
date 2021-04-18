<?php
    require_once "conexion.php";
    $sql = "SELECT * FROM `pagoletra` as pl 
    INNER JOIN plandepago as pp ON pl.idPlanPago = pp.idPlanPago 
    INNER JOIN prestamos AS pr ON pp.idPrestamo = pr.idPrestamo 
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
                                    echo "<th>ID</th>";
                                    echo "<th>Codigo</th>";
                                    echo "<th>Nombre del Cliente</th>";
                                    echo "<th>Monto Pagado</th>";
                                    echo "<th>Fecha de pago</th>";
                                    echo "<th>acciones</th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>" . $row['idPagoLetra'] . "</td>";
                            echo "<td>" . $row['idPlanPago'] . "</td>";
                            echo "<td>" . $row['nombres'] . " ". $row['apellidos'] ."</td>";
                            echo "<td>" . $row['montoPagado'] . "</td>";
                            echo "<td>" . $row['fechaPago'] . "</td>";
                            
                            echo "<td>";

                                echo "<a href='updatepagocuota.php?id=". $row['idPagoLetra'] ."' title='Actualizar' data-toggle='tooltip'><span class=' fas fa-edit'></span></a>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"; 

                                echo "<a href='pdfpagocuota.php?id=". $row['idPagoLetra'] ."' title='PDF' data-toggle='tooltip'><span class='fas fa-file-pdf'></span></a>";
                            echo "</td>";
                        }
                        echo "</tbody>";
                    echo "</table>";

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