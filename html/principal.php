<?php

require_once "conexion.php";
//---------------------------------------------------------------------------------------------//
//Preparar la consulta para la base de datos
$sql1 = "SELECT
tc.descripcion as 'tipo_cuenta',
count(*) as 'cuenta'
FROM tipocuenta tc INNER JOIN cuenta c on tc.idTipoCuenta = c.idtipoCuenta
group by tc.descripcion";

//ejecutar la consulta en la base de datos
$consulta = $con->query($sql1);

//pasar los datos devueltos de la base de datos a un Array PHP (Arreglo)
$datos  = $consulta->fetch_all(MYSQLI_ASSOC);
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
$sql_generos = "SELECT
g.genero,
count(*) as personas
from registrocliente as c 
inner join genero as g on c.idGenero = g.idGenero
group by g.genero";

$consulta_genero = $con->query($sql_generos);
$generos = $consulta_genero->fetch_all(MYSQLI_ASSOC);
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
$sql_depositos = "SELECT 
concat(rc.nombres, ' ' ,rc.apellidos) as cliente,
sum(tc.montoTransaccion) as depositos
from transaccioncuenta tc
inner join cuenta c on c.idCuenta = tc.idCuenta
inner join registrocliente rc on rc.idRegistroCliente = c.idRegistroCliente
where tc.idTipoTransaccion = 1
group by concat(rc.nombres, ' ' ,rc.apellidos)
order  by depositos desc
limit 10";

$consulta_depositos = $con->query($sql_depositos);
$depositos = $consulta_depositos->fetch_all(MYSQLI_ASSOC);
//---------------------------------------------------------------------------------------------//

//---------------------------------------------------------------------------------------------//
$sql_fechas = "SELECT
fechaTransaccion as Dia,
sum(case when idTipoTransaccion = 1 then  montoTransaccion end) as depositos,
sum(case when idTipoTransaccion = 2 then  montoTransaccion end) as retiros
from transaccioncuenta
group by fechaTransaccion
order by Dia asc
limit 20";
$consulta_fechas = $con->query($sql_fechas);
$fechas = $consulta_fechas->fetch_all(MYSQLI_ASSOC);
//---------------------------------------------------------------------------------------------//


//Incluyo el archivo de enlaces separando las cabeceras del HTML de los Script de Javascrip 
include 'enlaces_fn.php';

?>

<!DOCTYPE html>
<html dir="Banco_web" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Principal</title>

    <?= cabeceras() //Cabeceras de HTML, CSS y meta tags 
    ?>
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <?php require_once('menu_base.php'); ?>



        <div class="page-wrapper" style="background-color: white;">
            <div style="margin-top:20px;" class="container container-fluid mt-4">

                <h2>Principal</h2>

                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

                <div class="row text-center">
                    <div class="col-md-6">
                        <h4>Cuentas por tipo</h4>
                        <hr>
                        <canvas id="grafico1"></canvas>
                        <script>
                            //pasamos el arreglo PHP a un objeto JSON para poder manejarlo en javascript
                            var data_php = <?= json_encode($datos) ?>;

                            //con las siguientes dos variables vamos a separar los datos que vienen de la consulta, 1 arreglo para los datos y otro para los encabezados
                            // datos => contiene la informacion del count(*) de la base de datos
                            // encabezados => contiene los tipos de cuenta devueltos en la base de datos
                            var datos = [];
                            var encabezados = [];

                            //data_count => contador de iteraciones, registra la cantidad de ciclos que tendra al recorrer el arreglo de datos
                            var data_count = 0;

                            // data_php.map => recorre los datos del arreglo que viene de la base de datos
                            data_php.map((x) => {
                                //la funcion .push() crea un elemento nuevo en los arreglos de datos y en cabezados
                                datos.push(x.cuenta)
                                encabezados.push(x.tipo_cuenta)
                                //aumentamos el contador en cada ciclo
                                data_count++;
                            })


                            //A continuacion utilizamos la libreria de Chat.js para generar nuestros graficos

                            //toda la siguiente configuracion es para generar el grafico
                            var ctx = document.getElementById('grafico1').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'doughnut',

                                // The data for our dataset
                                data: {
                                    labels: encabezados, //variable de encabezados
                                    datasets: [{
                                        label: 'Grafico de tipos de cuenta', //nombre del grafico
                                        backgroundColor: [ //arreglo que contiene los colores del grafico, si agregamos elementos agregamos colores
                                            'rgb(255, 99, 132,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                        ],
                                        borderColor: [ //colores de los borders del grafico
                                            'rgb(255, 99, 132,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                        ],
                                        data: datos //variable que contiene los datos
                                    }]
                                },

                                // Configuration options go here
                                options: {}
                            });
                        </script>
                    </div>
                    <div class="col-md-6">
                        <h4>Clientes por genero</h4>
                        <hr>
                        <canvas id="grafico2"></canvas>
                        <script>
                            //pasamos el arreglo PHP a un objeto JSON para poder manejarlo en javascript
                            var generos = <?= json_encode($generos) ?>;

                            //con las siguientes dos variables vamos a separar los datos que vienen de la consulta, 1 arreglo para los datos y otro para los encabezados
                            // datos => contiene la informacion del count(*) de la base de datos
                            // encabezados => contiene los tipos de cuenta devueltos en la base de datos
                            var datos_g = [];
                            var encabezados_g = [];

                            //data_count => contador de iteraciones, registra la cantidad de ciclos que tendra al recorrer el arreglo de datos
                            var data_count_g = 0;

                            // data_php.map => recorre los datos del arreglo que viene de la base de datos
                            generos.map((x) => {
                                //la funcion .push() crea un elemento nuevo en los arreglos de datos y en cabezados
                                datos_g.push(x.personas)
                                encabezados_g.push(x.genero)
                                //aumentamos el contador en cada ciclo
                                data_count_g++;
                            })


                            //A continuacion utilizamos la libreria de Chat.js para generar nuestros graficos

                            //toda la siguiente configuracion es para generar el grafico
                            var ctx = document.getElementById('grafico2').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'bar',

                                // The data for our dataset
                                data: {
                                    labels: encabezados_g, //variable de encabezados
                                    datasets: [{
                                        label: 'Grafico de clientes por genero', //nombre del grafico
                                        backgroundColor: [ //arreglo que contiene los colores del grafico, si agregamos elementos agregamos colores
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgb(255, 99, 132,0.9)',
                                        ],
                                        borderColor: [ //colores de los borders del grafico
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgb(255, 99, 132,0.9)',

                                        ],
                                        data: datos_g //variable que contiene los datos
                                    }]
                                },

                                // Configuration options go here
                                options: {}
                            });
                        </script>
                    </div>
                </div>

                <hr style="background-color: indigo;">

                <div class="row text-center">
                    <div class="col-md-6">
                        <h4>Depositos</h4>
                        <hr>
                        <canvas id="grafico3"></canvas>
                        <script>
                            //pasamos el arreglo PHP a un objeto JSON para poder manejarlo en javascript
                            var depositos = <?= json_encode($depositos) ?>;

                            //con las siguientes dos variables vamos a separar los datos que vienen de la consulta, 1 arreglo para los datos y otro para los encabezados
                            // datos => contiene la informacion del count(*) de la base de datos
                            // encabezados => contiene los tipos de cuenta devueltos en la base de datos
                            var datos_d = [];
                            var encabezados_d = [];

                            //data_count => contador de iteraciones, registra la cantidad de ciclos que tendra al recorrer el arreglo de datos
                            var data_count_d = 0;

                            // data_php.map => recorre los datos del arreglo que viene de la base de datos
                            depositos.map((x) => {
                                //la funcion .push() crea un elemento nuevo en los arreglos de datos y en cabezados
                                datos_d.push(x.depositos)
                                encabezados_d.push(x.cliente)
                                //aumentamos el contador en cada ciclo
                                data_count_d++;
                            })


                            //A continuacion utilizamos la libreria de Chat.js para generar nuestros graficos

                            //toda la siguiente configuracion es para generar el grafico
                            var ctx = document.getElementById('grafico3').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'bar',

                                // The data for our dataset
                                data: {
                                    labels: encabezados_d, //variable de encabezados
                                    datasets: [{
                                        label: 'Grafico de tipos de cuenta', //nombre del grafico
                                        backgroundColor: [ //arreglo que contiene los colores del grafico, si agregamos elementos agregamos colores
                                            'rgb(255, 99, 132,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgba(235, 201, 52,0.9)',
                                            'rgba(52, 235, 137,0.9)',
                                            'rgba(52, 229, 235,0.9)',
                                            'rgba(159, 52, 235,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgba(235, 201, 52,0.9)',
                                            'rgba(52, 235, 137,0.9)',
                                            'rgba(52, 229, 235,0.9)',
                                            'rgba(159, 52, 235,0.9)'
                                        ],
                                        borderColor: [ //colores de los borders del grafico
                                            'rgb(255, 99, 132,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgba(235, 201, 52,0.9)',
                                            'rgba(52, 235, 137,0.9)',
                                            'rgba(52, 229, 235,0.9)',
                                            'rgba(159, 52, 235,0.9)',
                                            'rgba(54, 162, 235, 0.9)',
                                            'rgba(235, 201, 52,0.9)',
                                            'rgba(52, 235, 137,0.9)',
                                            'rgba(52, 229, 235,0.9)',
                                            'rgba(159, 52, 235,0.9)'
                                        ],
                                        data: datos_d //variable que contiene los datos
                                    }]
                                },

                                // Configuration options go here
                                options: {}
                            });
                        </script>
                    </div>
                    <div class="col-md-6">
                        <h4>Clientes por genero</h4>
                        <hr>
                        <canvas id="grafico4"></canvas>
                        <script>
                            //pasamos el arreglo PHP a un objeto JSON para poder manejarlo en javascript
                            var fechas = <?= json_encode($fechas) ?>;

                            //con las siguientes dos variables vamos a separar los datos que vienen de la consulta, 1 arreglo para los datos y otro para los encabezados
                            // datos => contiene la informacion del count(*) de la base de datos
                            // encabezados => contiene los tipos de cuenta devueltos en la base de datos
                            var depositos_f = [];
                            var retiros_f = [];
                            var encabezados_f = [];

                            //data_count => contador de iteraciones, registra la cantidad de ciclos que tendra al recorrer el arreglo de datos
                            var data_count_f = 0;

                            // data_php.map => recorre los datos del arreglo que viene de la base de datos
                            fechas.map((x) => {
                                //la funcion .push() crea un elemento nuevo en los arreglos de datos y en cabezados
                                depositos_f.push(x.depositos)
                                retiros_f.push(x.retiros)
                                encabezados_f.push(x.Dia)
                                //aumentamos el contador en cada ciclo
                                data_count_f++;
                            })

                            console.log(retiros_f)
                            console.log(depositos_f)


                            var ctx = document.getElementById("grafico4");
                            var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: encabezados_f,
                                            datasets: [{
                                                    label: 'Depositos',
                                                    lineTension: 0.5,
                                                    borderColor: "rgba(78, 115, 223, 1)",
                                                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                                                    data: depositos_f,
                                                },
                                                {
                                                    label: "retiros",
                                                    borderColor: "red",
                                                    data: retiros_f
                                                },
                                                
                                            ],
                                        },
                                        options:{}
                                    })

                                        //A continuacion utilizamos la libreria de Chat.js para generar nuestros graficos

                                        //toda la siguiente configuracion es para generar el grafico
                                        /*var ctx = document.getElementById('grafico4').getContext('2d');
                                        var chart = new Chart(ctx, {
                                            // The type of chart we want to create
                                            type: 'bar',

                                            // The data for our dataset
                                            data: {
                                                labels: encabezados_g, //variable de encabezados
                                                datasets: [{
                                                    label: 'Grafico de clientes por genero', //nombre del grafico
                                                    backgroundColor: [ //arreglo que contiene los colores del grafico, si agregamos elementos agregamos colores
                                                        'rgba(54, 162, 235, 0.9)',
                                                        'rgb(255, 99, 132,0.9)',                                            
                                                    ],
                                                    borderColor: [ //colores de los borders del grafico
                                                        'rgba(54, 162, 235, 0.9)',
                                                        'rgb(255, 99, 132,0.9)',
                                                        
                                                    ],
                                                    data: datos_g //variable que contiene los datos
                                                }]
                                            },

                                            // Configuration options go here
                                            options: {}
                                        });*/
                        </script>
                    </div>
                </div>


            </div>

        </div>





        <?php require_once('footer.php'); ?>



    </div>


    <?= scripts() ?>





</body>

</html>




<?php
$consulta->free_result();
$con->close();
?>