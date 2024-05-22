<?php switch ($this->session->userdata('tipo')) {
  case 0:
    ?>

<section class="tables">
    
        <div class="row">
            <div class="col text-center">
                <img src="<?= base_url()?>uploads/fondo_animado.gif" style="background-size: cover; height: 80vh;" class="d-inline-block">
            </div>
        </div>

</section><?php
    break;
  
  case 1:
    ?>
<!-- Client Section-->
<section class="client">
    <?php if(isset($_SESSION['id_user_direccion']) && $this->session->userdata('id_user_direccion') == ""){ ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Alto Costo</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/1">
                        <img src="<?= base_url() ?>img/022.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Control Vehicular</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/3">
                        <img src="<?= base_url() ?>img/023.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Almacen General</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/4">
                        <img src="<?= base_url() ?>img/024.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Compras</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/7">
                        <img src="<?= base_url() ?>img/027.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Project Manager</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/19">
                        <img src="<?= base_url() ?>img/033.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Sistemas</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/2">
                        <img src="<?= base_url() ?>img/035.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Contratista</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/12">
                        <img src="<?= base_url() ?>img/029.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else{ ?>
    <div class="container-fluid">
        <div class= "row">
            <div class="col-xl-3">
                <div class="form-group">
                    <label>Estatus</label>
                    <select class="form-control" id="estatus_herramienta">
                        <option value="">Todo</option>
                        <option value="RENTA">Renta</option>
                        <option value="VENTA">Venta</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empalmadora</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_empalmadora"><?= $total_global_empalmadora ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="empalmadora"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>OTDR</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_otdr"><?= $total_global_otdr ?></strong><br><span>Totales</span></div>
                            <canvas id="otdr"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Medidor de Tráfico</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_medidor_trafico"><?= $total_global_medidor_trafico ?></strong><br><span>Totales</span></div>
                            <canvas id="medidor_trafico"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Medidor de Potencia</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_power_meter"><?= $total_global_power_meter ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="power_meter"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Luz Visible</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_luz_visible"><?= $total_global_luz_visible ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="luz_visible"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Fiber Cleaver</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_fiber_cleaver"><?= $total_global_fiber_cleaver ?></strong><br><span>Totales</span></div>
                            <canvas id="fiber_cleaver"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Corte de tubo holgado</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_corte_tubo_holgado"><?= $total_global_corte_tubo_holgado ?></strong><br><span>Totales</span></div>
                            <canvas id="corte_tubo_holgado"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Corte Longitudinal</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_corte_longitudinal"><?= $total_global_corte_longitudinal ?></strong><br><span>Totales</span></div>
                            <canvas id="corte_longitudinal"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            
              
            <!-- Line Chart            -->
            <div class="chart col-12">
                <div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda" name="busqueda">
                    </div>
                </div>
                <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
                    <canvas width="1100" height="420" id="lineChart"></canvas>
                </div>
                <div id="pagination_lineChart" class="bg-white has-shadow" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12" style="margin: 100px 0px;">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Total costos</h3><small>Alto Costo</small>
                        <div class="text-right">
                            <div class="col-3">
                            <select class="form-control" id="estatus" onchange="obtener_costos_estatus(this)">
                                <option value="">Almacen y Asignados</option>
                                <option value="almacen">Almacen</option>
                                <option value="asignado">Asignado</option>
                                <option value="descompuesto">Descompuesto</option>
                                <option value="robado">Robado</option>
                                <option value="abuso de confianza">abuso de confianza</option>
                            </select>
                            </div>
                        </div>
                        <div class="chart text-center">
                            <!--<canvas id="costosAltoCosto"></canvas>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</section>


<script>
/*global $, document, Chart, LINECHART, data, options, window*/
<?php
    echo "var total_costos = ". json_encode($totalCostos). ";\n";   
?>
$(document).ready(function() {

    'use strict';

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        var LINECHART = $('#lineChart');
        var myLineChart = new Chart(LINECHART, {
            type: 'horizontalBar',
            options: {
                responsive: true,

                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,

                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        categoryPercentage: 1.0,
                        barPercentage: 0.5
                    }]
                },
                legend: {
                    display: legendState
                }
            },
            data: {
                labels: [],
                datasets: [{
                        label: "Stock mínimo",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#f15765",
                        borderColor: '#f15765',
                        pointBorderColor: '#da4c59',
                        pointHoverBackgroundColor: '#da4c59',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 0,
                        data: [],
                        spanGaps: false
                    },
                    {
                        label: "Existencias",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#54e69d",
                        borderColor: "#54e69d",
                        pointHoverBackgroundColor: "#44c384",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "#44c384",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                ]
            }
        });

        function graficar_consumibles_alto_costo(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/graficaConsumiblesAltoCosto",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChart.data.labels = productos;
                    myLineChart.data.datasets[0].data = minimos;
                    myLineChart.data.datasets[1].data = maximos;
                    myLineChart.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_consumibles_alto_costo(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficar_consumibles_alto_costo(0);
        $("#busqueda").on("keyup",function(){
            graficar_consumibles_alto_costo(0);
        });

        // ------------------------------------------------------- //
        // Pie Chart
        // ------------------------------------------------------ //
        <?php
    if (isset($estatus_empalmadora)) {
    echo "var array_labels_empalmadora = ". json_encode($estatus_empalmadora ). ";\n";
    echo "var array_total_empalmadora = ".json_encode($total_empalmadora) . ";\n";
    
    ?>

        var PIECHART = $('#empalmadora');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_empalmadora,
                datasets: [{
                    data: array_total_empalmadora,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_otdr)) {
    echo "var array_labels_otdr = ". json_encode($estatus_otdr ). ";\n";
    echo "var array_total_otdr = ".json_encode($total_otdr) . ";\n";
    
    ?>

        var PIECHART = $('#otdr');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_otdr,
                datasets: [{
                    data: array_total_otdr,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado        
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_medidor_trafico)) {
    echo "var array_labels_medidor_trafico = ". json_encode($estatus_medidor_trafico ). ";\n";
    echo "var array_total_medidor_trafico = ".json_encode($total_medidor_trafico) . ";\n";
    
    ?>

        var PIECHART = $('#medidor_trafico');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_medidor_trafico,
                datasets: [{
                    data: array_total_medidor_trafico,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        '#F79AA8',
                        "#f2993e"

                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_power_meter)) {
    echo "var array_labels_power_meter = ". json_encode($estatus_power_meter). ";\n";
    echo "var array_total_power_meter = ".json_encode($total_power_meter) . ";\n";
    
    ?>

        var PIECHART = $('#power_meter');
        var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_power_meter,
                datasets: [{
                    data: array_total_power_meter,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#3f65ec", //color justificacion
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#3f65ec",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });
        <?php } ?>


        <?php
    if (isset($estatus_luz_visible)) {
    echo "var array_labels_luz_visible = ". json_encode($estatus_luz_visible ). ";\n";
    echo "var array_total_luz_visible = ".json_encode($total_luz_visible) . ";\n";
    
    ?>

        var PIECHART = $('#luz_visible');
        var myPieChart5 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_luz_visible,
                datasets: [{
                    data: array_total_luz_visible,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#71d1f2", //color descompuesto
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_fiber_cleaver)) {
    echo "var array_labels_fiber_cleaver = ". json_encode($estatus_fiber_cleaver ). ";\n";
    echo "var array_total_fiber_cleaver = ".json_encode($total_fiber_cleaver) . ";\n";
    
    ?>

        var PIECHART = $('#fiber_cleaver');
        var myPieChart6 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_fiber_cleaver,
                datasets: [{
                    data: array_total_fiber_cleaver,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        "#3f65ec", //color justificacion   
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#3f65ec',
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_tubo_holgado)) {
    echo "var array_labels_corte_tubo_holgado = ". json_encode($estatus_corte_tubo_holgado ). ";\n";
    echo "var array_total_corte_tubo_holgado = ".json_encode($total_corte_tubo_holgado) . ";\n";
    
    ?>

        var PIECHART = $('#corte_tubo_holgado');
        var myPieChart7 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_tubo_holgado,
                datasets: [{
                    data: array_total_corte_tubo_holgado,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_longitudinal)) {
    echo "var array_labels_corte_longitudinal = ". json_encode($estatus_corte_longitudinal ). ";\n";
    echo "var array_total_corte_longitudinal = ".json_encode($total_corte_longitudinal) . ";\n";
    
    ?>

        var PIECHART = $('#corte_longitudinal');
        var myPieChart8 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_longitudinal,
                datasets: [{
                    data: array_total_corte_longitudinal,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    ?>

    $("#estatus_herramienta").on("change", function(){
        var select_estatus_value = $(this).val();
        var array_herramientas = [{tipo:"EMPALMADORA", categoria:"alto"}, {tipo:"OTDR", categoria:"alto"}, {tipo:"MEDIDOR DE TRAFICO", categoria:"mediano"}, {tipo:"POWER METER S", categoria:"mediano"}, {tipo:"LUZ VISIBLE", categoria:"mediano"}, {tipo:"FIBER CLEAVER", categoria:"mediano"}, {tipo:"TUBO HOLGADO", categoria:"mediano"}, {tipo:"CORTE LONGITUDINAL", categoria:"mediano"}];
        var estatus = $('#estatus').val();
        $.ajax({
            url: "<?= base_url()?>Inicio/obtenerHerramientasAltoCosto",
            type: "POST",
            dataType: "json",
            data: {
                estatus: array_herramientas,
                tipo_estatus: select_estatus_value
            },
            success: function(result) {
                myPieChart1.data.labels = result["EMPALMADORA"].estatus;
                myPieChart1.data.datasets[0].data = result["EMPALMADORA"].total;
                myPieChart1.update();
                $("#total_global_empalmadora").html(result["EMPALMADORA"].total_global);

                myPieChart2.data.labels = result["OTDR"].estatus;
                myPieChart2.data.datasets[0].data = result["OTDR"].total;
                myPieChart2.update();
                $("#total_global_otdr").html(result["OTDR"].total_global);

                myPieChart3.data.labels = result["MEDIDOR DE TRAFICO"].estatus;
                myPieChart3.data.datasets[0].data = result["MEDIDOR DE TRAFICO"].total;
                myPieChart3.update();
                $("#total_global_medidor_trafico").html(result["MEDIDOR DE TRAFICO"].total_global);

                myPieChart4.data.labels = result["POWER METER S"].estatus;
                myPieChart4.data.datasets[0].data = result["POWER METER S"].total;
                myPieChart4.update();
                $("#total_global_power_meter").html(result["POWER METER S"].total_global);

                myPieChart5.data.labels = result["LUZ VISIBLE"].estatus;
                myPieChart5.data.datasets[0].data = result["LUZ VISIBLE"].total;
                myPieChart5.update();
                $("#total_global_luz_visible").html(result["LUZ VISIBLE"].total_global);

                myPieChart6.data.labels = result["FIBER CLEAVER"].estatus;
                myPieChart6.data.datasets[0].data = result["FIBER CLEAVER"].total;
                myPieChart6.update();
                $("#total_global_fiber_cleaver").html(result["FIBER CLEAVER"].total_global);

                myPieChart7.data.labels = result["TUBO HOLGADO"].estatus;
                myPieChart7.data.datasets[0].data = result["TUBO HOLGADO"].total;
                myPieChart7.update();
                $("#total_global_corte_tubo_holgado").html(result["TUBO HOLGADO"].total_global);

                myPieChart8.data.labels = result["CORTE LONGITUDINAL"].estatus;
                myPieChart8.data.datasets[0].data = result["CORTE LONGITUDINAL"].total;
                myPieChart8.update();
                $("#total_global_corte_longitudinal").html(result["CORTE LONGITUDINAL"].total_global);

            },
            error: function(result) {
                console.log("Ocurrio un error, intente mas tarde.")
            }
        });
    });

    }) /*End Pace*/
});
graficar_costos_AC();
        console.log(total_costos);
        var myBarChart5;

        function graficar_costos_AC() {
            var herramientas = [];
            var array_total_costos = [];
            for (var r = 1; r <= total_costos.length; r++) {
                var index = r - 1;
                if (total_costos != undefined) {
                    array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                    herramientas[index] = total_costos[index].categoria;
                } else {
                    array_total_costos[index] = 0;
                }
            }
            //$("#total_ganancias").html(total_ganancias);
            var BARCHART5 = $("#costosAltoCosto");
            myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: herramientas,
                    datasets: [{
                        data: array_total_costos,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: ['#55e6a0', '#71d1f2', '#f2993e'],
                        hoverBackgroundColor: ['#55e6a0', '#71d1f2', '#f2993e']
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

function obtener_costos_estatus(e) {
            //alert('si');
            var estatus = $('#estatus').val();
            $.ajax({
                url: "<?= base_url()?>Inicio/obtenerCostosEstatus",
                type: "POST",
                data: {
                    estatus: estatus
                },
                success: function(result) {
                    result = JSON.parse(result);
                    console.log(result);   
                    var total_costos = result;   
                    var herramientas = [];         
                    var array_total_costos = [];
                    for (var r = 1; r <= total_costos.length; r++) {
                        var index = r - 1;
                        if (total_costos != undefined) {
                            array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                            herramientas[index] = total_costos[index].categoria;
                        } else {
                            array_total_costos[index] = 0;
                        }
                    }                    
                    console.log(myBarChart5.data.labels[0]);                    
                    myBarChart5.data.labels = herramientas;
                    myBarChart5.data.datasets[0].data = array_total_costos;                   
                    console.log(myBarChart5.data.datasets);
                    myBarChart5.update();
                    //$("#total_salidas").html(total_salidas);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            })
        }
        
</script>

<?php 
    break;

case 2:
    ?>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Laptops Internas</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_laptops"><?= $total_global_sistemas_laptops ?></strong><br><span>Totales</span>
                                </div>
                                <canvas id="sistemas_laptops" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Laptops Especiales</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_laptops_especiales"><?= $total_global_sistemas_laptops_especiales ?></strong>
                                    <br>
                                    <span>Totales</span>
                                </div>
                                <canvas id="sistemas_laptops_especiales" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Desktops</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_desktops"><?= $total_global_sistemas_desktops ?></strong><br><span>Totales</span>
                                </div>
                                <canvas id="sistemas_desktops" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Celulares</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_celulares"><?= $total_global_sistemas_celulares ?></strong><br><span>Totales</span>
                                </div>
                                <canvas id="sistemas_celulares" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Impresoras</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_impresoras"><?= $total_global_sistemas_impresoras ?></strong><br><span>Totales</span>
                                </div>
                                <canvas id="sistemas_impresoras" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Monitores</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_monitores"><?= $total_global_sistemas_monitores ?></strong>
                                    <br>
                                    <span>Totales</span>
                                </div>
                                <canvas id="sistemas_monitores" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Proyectores</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_proyectores"><?= $total_global_sistemas_proyectores ?></strong>
                                    <br>
                                    <span>Totales</span>
                                </div>
                                <canvas id="sistemas_proyectores" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Plotters</h3><small>Estatus actual</small>
                            <div class="chart text-center">
                                <div class="text">
                                    <strong id="total_global_sistemas_plotters"><?= $total_global_sistemas_plotters ?></strong>
                                    <br>
                                    <span>Totales</span>
                                </div>
                                <canvas id="sistemas_plotters" height="300"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
    <div class="container-fluid">
        
<div class="bg-info col-xl-12 col-sm-12" style="overflow: hidden; padding:10px 8px;">
<div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 8px;">
<div class="container text-align:center">
<div class="row">

    
    
    <div class="col-lg-8 col-md-8 col-sm-4 col-xs-4">
    <h2>Productividad De Asignaciones Por Usuario Sistemas.</h2>
        <div class="form-group">
            <label for="anio">"Año Actual"</label>
            <select name="anioasignados" class="form-control form-select-sm selector_anio" style="background-color:#FFFFFF; " id="anioasignados"
                onchange="graficar_productividad_de_sistemas()">
                
            </select>
        </div>
    </div>
</div>
    <div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs mg-b-10">
                    <div class="card-body" id="contenedor">
                    <canvas id="asignacionessistemas" width="1200" height="450"  ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
    </section>
    <!--grafica sistemas-->
<script>
   
   var selector_anio = $(".selector_anio");
var anio_actual_selector = new Date().getFullYear();
for (var r = 2023; r >= 2021; r--) {
  selector_anio.append("<option value='" + r + "'>" + r + "</option>");
}
for (var r = anio_actual_selector; r >= 2024; r--) {
  selector_anio.append("<option value='" + r + "'>" + r + "</option>");
}
$('.selector_a[name="anio_actual"]').val(anio_actual_selector);
$('.selector_a[name="anio_actualV"]').val(anio_actual_selector);
$('.selector_a[name="anio_actualV"]').val(anio_actual_selector);
var nombres_usuarios = [];
    var BARCHART77 = $("#asignacionessistemas");
    myBarChart77 = new Chart(BARCHART77, {
        
        type: 'bar',
        stack: '',
        data: {
            labels: [],
            datasets: [{
                label: [],
                data: [],
                borderWidth: [1, 1, 1, 1],
                backgroundColor: ["#6806FF", "#6806FF", "#6806FF"],
                hoverBackgroundColor: ["#FF0000", "#00FF00", "#0000FF"]
            }, {
                label: [],
                data: [],
                borderWidth: [1, 1, 1, 1],
                backgroundColor: ["#FA7AEE", "#FA7AEE", "#FA7AEE"],
                hoverBackgroundColor: ["#FFFF00", "#FF00FF", "#00FFFF"]
            }, {
                label: [],
                data: [],
                borderWidth: [1, 1, 1, 1],
                backgroundColor: ["#45ECC6", "#45ECC6", "#45ECC6"],
                hoverBackgroundColor: ["#FF8000", "#0080FF", "#8000FF"]
            }]
        },
        options: {
            legend: {
                display: true
            }
        }
    });    
    graficar_productividad_de_sistemas();
    function graficar_productividad_de_sistemas(){
            $.ajax({
                url: "<?= base_url()?>Sistemas/usuario_asignacionessistemas",
                type: "POST",
                data:{
                    year: $("#anioasignados").val(),
                },
                dataType: "json",
                success: function(result) {
                    var backgroundColor = ['#669DF8', '#F33424', '#5FFFA5', '#E6BAF7', '#E6BAF7', '#E6BAF7'];
                    var hoverBackgroundColor = ['#C42BFE', '#C42BFE', '#C42BFE', '#C42BFE', '#C42BFE', '#C42BFE'];
                    var array_datasets = [];
                    var obj_mantenimientos = {};
                    var nombresUsuarios = ["Ramon Cuevas Martinez", "Laura Hernandez Colin", "Miguel Angel Reyna Cruz"];
                    for(var r=0; r<result.usuario.length; r++){
                        var idtbl_users = result.usuario[r].idtbl_users;
                        obj_mantenimientos[idtbl_users] = {nombre: result.usuario[r].nombre_usuario, data:new Array(12)};
                        for(var r1=0; r1<result.asignaciones.length; r1++){
                          
                            var id_usuario_mantenimiento = result.asignaciones[r1].idtbl_users;
                            if(idtbl_users == id_usuario_mantenimiento){
                                obj_mantenimientos[idtbl_users].data[parseInt(result.asignaciones[r1].FECHA)-1] = result.asignaciones[r1];
                            }
                        }
                    }
                    console.log("IRONMAN",obj_mantenimientos);
                    var index = 0;
                    var total = 0;
                    
                    for(var key in obj_mantenimientos){
                        var item = obj_mantenimientos[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                            }else{
                                item.data[r1] = parseInt(item.data[r1].asignaciones);
                                total += item.data[r1];
                            }
                        }
                        
                        console.log(key, total);
                        if(total > 0){
                            array_datasets.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }                                        
                    myBarChart77.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChart77.data.datasets = array_datasets;
                    console.log('AQYUUU',myBarChart77.data);
                    myBarChart77.data.datasets.forEach(function(dataset, index) {
                        dataset.label = nombresUsuarios[index];
                    });
                    myBarChart77.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }
        graficar_productividad_de_sistemas();
        $("#usuariosistemas").on("change",function(){
            graficar_productividad_de_sistemas();
        });
        $("#anioasignado").on("change",function(){
            graficar_productividad_de_sistemas();
        });
</script>

<!--emiliano-->

    <script>
        var myLineChartServices;
        $(document).ready(function() {

        'use strict';

        Pace.on('done', function() {
            // ------------------------------------------------------- //
            // Line Chart
            // ------------------------------------------------------ //
            var legendState = true;
            if ($(window).outerWidth() < 576) {
                legendState = false;
            }

            /*<?php

            echo "var array_labels = ". json_encode($labels ). ";\n";
            echo "var array_minimos = ".json_encode( $minimos) . ";\n";
            echo "var array_stock = ". json_encode($stock ). ";\n";
            ?>*/
            var LINECHART0 = $('#lineChart0');
            myLineChartServices = new Chart(LINECHART0, {
                    type: 'horizontalBar',
                    options: {
                        responsive: true,
                        scales: {
                            xAxes: [{
                                stacked: true,
                                display: true,

                            }],
                            yAxes: [{
                                stacked: true,
                                display: true,
                                categoryPercentage: 1.0,
                                barPercentage: 0.5
                            }]
                        },
                        legend: {
                            display: legendState
                        }
                    },
                    data: {
                        labels: [],
                        datasets: [
                            {
                                label: "Stock mínimo",
                                fill: true,
                                lineTension: 0,
                                backgroundColor: "#f15765",
                                borderColor: '#f15765',
                                pointBorderColor: '#da4c59',
                                pointHoverBackgroundColor: '#da4c59',
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                borderWidth: 1,
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBorderColor: "#fff",
                                pointHoverBorderWidth: 2,
                                pointRadius: 1,
                                pointHitRadius: 0,
                                data: [],
                                spanGaps: false
                            },
                            {
                                label: "Existencias",
                                fill: true,
                                lineTension: 0,
                                backgroundColor: "#54e69d",
                                borderColor: "#54e69d",
                                pointHoverBackgroundColor: "#44c384",
                                borderCapStyle: 'butt',
                                borderDash: [],
                                borderDashOffset: 0.0,
                                borderJoinStyle: 'miter',
                                borderWidth: 1,
                                pointBorderColor: "#44c384",
                                pointBackgroundColor: "#fff",
                                pointBorderWidth: 1,
                                pointHoverRadius: 5,
                                pointHoverBorderColor: "#fff",
                                pointHoverBorderWidth: 2,
                                pointRadius: 1,
                                pointHitRadius: 10,
                                data: [],
                                spanGaps: false
                            }
                        ]
                    }
                });

            function graficar_sistemas_laptops(offset){
                $.ajax({
                    url: "<?= base_url()?>inicio/grafica_sistemas_laptops",
                    type: "POST",
                    data:{
                        offset:offset,
                        busqueda: $("#busqueda0").val()
                    },
                    dataType: "json",
                    success: function(result) {
                        var productos = [];
                        var minimos = [];
                        var maximos = [];
                        for(var r=0; r<result.registros.length; r++){
                            productos.push(result.registros[r].descripcion);
                            minimos.push(parseFloat(result.registros[r].minimo));
                            maximos.push(parseFloat(result.registros[r].existencias));
                        }
                        myLineChartServices.data.labels = productos;
                        myLineChartServices.data.datasets[0].data = minimos;
                        myLineChartServices.data.datasets[1].data = maximos;
                        myLineChartServices.update();
                        
                        var pagination = $("#pagination_lineChart0 ul");
                        pagination.html("");
                        var totalPagination = Math.ceil(result.total/result.limit);
                        if(totalPagination == 0){
                            totalPagination = 1;
                        }
                        var currentPagination = result.offset/result.limit+1;
                        var startPagination;
                        var endPagination;
                        if(currentPagination == 1){
                            startPagination = 1;
                            endPagination = 3;
                        }else if(currentPagination == totalPagination){
                            startPagination = totalPagination - 2;
                            endPagination = totalPagination;
                        }else{
                            startPagination = currentPagination - 1;
                            endPagination = currentPagination + 1;
                        }
                        pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                        pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                        for(var r=startPagination; r<=endPagination; r++){
                            if(r<=totalPagination){
                                pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                            }else{
                                break;
                            }
                        }
                        pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                        pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                        pagination.find("a").on('click',function(event){
                            event.preventDefault();
                            var index = $(this).data("index");
                            var offset = (index - 1) * result.limit;
                            graficar_sistemas_laptops(offset);
                        });
                    },
                    error: function(result) {
                        console.log("Ocurrio un error, intente mas tarde.")
                    }
                });
            }


            graficar_sistemas_laptops(0);
            $("#busqueda0").on("keyup",function(){
                graficar_sistemas_laptops(0);
            });

            

            <?php
                if (isset($estatus_sistemas_laptops)) {
                echo "var array_labels_sistemas_laptops = ". json_encode($estatus_sistemas_laptops). ";\n";
                echo "var array_total_sistemas_laptops = ".json_encode($total_sistemas_laptops) . ";\n";     
            ?>

            var PIECHART = $('#sistemas_laptops');
            var myPieChart0 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_laptops,
                datasets: [{
                    data: array_total_sistemas_laptops,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#b07243', //Abuso de confianza
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#8c8585', //Descompuesto
                        '#71d1f2', //Justificación
                        '#FFAA00', //Obsolecencia
                        '#ff874f'  //Robado
                    ],
                    hoverBackgroundColor: [
                        '#b07243',
                        '#0363ff',
                        '#55e6a0',
                        '#fca9a9',
                        '#8c8585',
                        '#71d1f2',
                        '#FFAA00',
                        '#ff874f'
                    ]
                }]
            }
        });

        <?php }
        if (isset($estatus_sistemas_laptops_especiales)) {
            echo "var array_labels_sistemas_laptops_especiales = ". json_encode($estatus_sistemas_laptops_especiales). ";\n";
            echo "var array_total_sistemas_laptops_especiales = ".json_encode($total_sistemas_laptops_especiales) . ";\n";     
        ?>

var PIECHART = $('#sistemas_laptops_especiales');
            var myPieChart6 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                tooltips:{
                    backgroundColor: 'rgba(0, 0, 0, 1)',
                    yAlign: 'above',
                    callbacks:{
                        labelTextColor:function(tooltipItem, chart){
                            return '#FFFFFF';
                        }
                    }
                },
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_laptops_especiales,
                datasets: [{
                    data: array_total_sistemas_laptops_especiales,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#fc0303', //Dañado
                        '#8c8585', //Descompuesto
                        '#e0f595', //Justificación
                        '#ff874f'  //Robado

                    ],
                    hoverBackgroundColor: [
                        '#0363ff',
                        '#55e6a0',
                        '#fca9a9',
                        '#fc0303',
                        '#8c8585',
                        '#e0f595',
                        '#ff874f'

                    ]
                }]
            }
        });

        <?php } 
        if (isset($estatus_sistemas_desktops)) {
            echo "var array_labels_sistemas_desktops = ". json_encode($estatus_sistemas_desktops). ";\n";
            echo "var array_total_sistemas_desktops = ".json_encode($total_sistemas_desktops) . ";\n";
        ?>

            var PIECHART = $('#sistemas_desktops');
            var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_desktops,
                datasets: [{
                    data: array_total_sistemas_desktops,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#fc0303', //Dañado
                        '#8c8585', //Descompuesto
                        '#e0f595', //Obsolecencia
                    ],
                    hoverBackgroundColor: [
                        '#0363ff',
                        '#55e6a0',
                        '#fca9a9',
                        '#fc0303',
                        '#8c8585',
                        '#e0f595',
                    ]
                }]
            }
        });

        <?php } 
        if (isset($estatus_sistemas_celulares)) {
            echo "var array_labels_sistemas_celulares = ". json_encode($estatus_sistemas_celulares). ";\n";
            echo "var array_total_sistemas_celulares = ".json_encode($total_sistemas_celulares) . ";\n";
        ?>

            var PIECHART = $('#sistemas_celulares');
            var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_celulares,
                datasets: [{
                    data: array_total_sistemas_celulares,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#b07243', //Abuso de confianza
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#fc0303', //Dañado
                        '#8c8585', //Descompuesto
                        '#e0f595', //Obsolecencia
                        '#ff874f'  //Robado
                    ],
                    hoverBackgroundColor: [
                        '#b07243', //Abuso de confianza
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#fc0303', //Dañado
                        '#8c8585', //Descompuesto
                        '#e0f595', //Obsolecencia
                        '#ff874f'  //Robado
                    ]
                }]
            }
        });

        <?php } 
        if (isset($estatus_sistemas_impresoras)) {
            echo "var array_labels_sistemas_impresoras = ". json_encode($estatus_sistemas_impresoras). ";\n";
            echo "var array_total_sistemas_impresoras = ".json_encode($total_sistemas_impresoras) . ";\n";
        ?>

            var PIECHART = $('#sistemas_impresoras');
            var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_impresoras,
                datasets: [{
                    data: array_total_sistemas_impresoras,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#8c8585', //Descompuesto
                        '#e0f595' //Obsolecencia
                        
                    ],
                    hoverBackgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#8c8585', //Descompuesto
                        '#e0f595' //Obsolecencia
                    ]
                }]
            }
        });

        <?php }
        if (isset($estatus_sistemas_monitores)) {
            echo "var array_labels_sistemas_monitores = ". json_encode($estatus_sistemas_monitores). ";\n";
            echo "var array_total_sistemas_monitores = ".json_encode($total_sistemas_monitores) . ";\n";
        ?>

            var PIECHART = $('#sistemas_monitores');
            var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                tooltips:{
                    backgroundColor: 'rgba(0, 0, 0, 1)',
                    yAlign: 'above',
                    callbacks:{
                        labelTextColor:function(tooltipItem, chart){
                            return '#FFFFFF';
                        }
                    }
                },
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_monitores,
                datasets: [{
                    data: array_total_sistemas_monitores,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#8c8585', //Descompuesto
                        '#e0f595' //Obsolecencia
                    ],
                    hoverBackgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#fca9a9', //Baja
                        '#8c8585', //Descompuesto
                        '#e0f595' //Obsolecencia
                    ]
                }]
            }
        });

        <?php }
        if (isset($estatus_sistemas_proyectores)) {
            echo "var array_labels_sistemas_proyectores = ". json_encode($estatus_sistemas_proyectores). ";\n";
            echo "var array_total_sistemas_proyectores = ".json_encode($total_sistemas_proyectores) . ";\n";
        ?>

            var PIECHART = $('#sistemas_proyectores');
            var myPieChart5 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                tooltips:{
                    backgroundColor: 'rgba(0, 0, 0, 1)',
                    yAlign: 'above',
                    callbacks:{
                        labelTextColor:function(tooltipItem, chart){
                            return '#FFFFFF';
                        }
                    }
                },
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_proyectores,
                datasets: [{
                    data: array_total_sistemas_proyectores,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#e0f595' //Obsolecencia
                    ],
                    hoverBackgroundColor: [
                        '#0363ff', //Almacen
                        '#55e6a0', //Asignado
                        '#e0f595' //Obsolecencia
                    ]
                }]
            }
        });

        <?php }
        if (isset($estatus_sistemas_plotters)) {
            echo "var array_labels_sistemas_plotters = ". json_encode($estatus_sistemas_plotters). ";\n";
            echo "var array_total_sistemas_plotters = ".json_encode($total_sistemas_plotters) . ";\n";
        ?>

            var PIECHART = $('#sistemas_plotters');
            var myPieChart6 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                tooltips:{
                    backgroundColor: 'rgba(0, 0, 0, 1)',
                    yAlign: 'above',
                    callbacks:{
                        labelTextColor:function(tooltipItem, chart){
                            return '#FFFFFF';
                        }
                    }
                },
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistemas_plotters,
                datasets: [{
                    data: array_total_sistemas_plotters,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //Asignado
                        '#8c8585', //Descompuesto
                        '#B5F04D'  //Vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0', //Asignado
                        '#8c8585', //Descompuesto
                        '#B5F04D' //Vendido
                    ]
                }]
            }
        });

        <?php } ?>


        $("#estatus_sistemas").on("change", function(){
            var select_estatus_value = $(this).val();
            var array_sistemas = [{tipo:"LAPTOPS"}];
            var estatus = $('#estatus').val();
            $.ajax({
                url: "<?= base_url()?>Inicio/obtenerDispositivosSistemas",
                type: "POST",
                dataType: "json",
                data: {
                    estatus: array_sistemas,
                    tipo_estatus: select_estatus_value
                },
                success: function(result) {
                    myPieChart0.data.labels = result["LAPTOPS"].estatus;
                    myPieChart0.data.datasets[0].data = result["LAPTOPS"].total;
                    myPieChart0.update();
                    $("#total_global_sistemas_laptops").html(result["LAPTOPS"].total_global);

                    myPieChart6.data.labels = result["LAPTOPS ESPECIALES"].estatus;
                    myPieChart6.data.datasets[0].data = result["LAPTOPS ESPECIALES"].total;
                    myPieChart6.update();
                    $("#total_global_sistemas_laptops_especiales").html(result["LAPTOPS ESPECIALES"].total_global);

                    myPieChart1.data.labels = result["DESKTOPS"].estatus;
                    myPieChart1.data.datasets[0].data = result["DESKTOPS"].total;
                    myPieChart1.update();
                    $("#total_global_sistemas_desktops").html(result["DESKTOPS"].total_global);

                    myPieChart2.data.labels = result["CELULARES"].estatus;
                    myPieChart2.data.datasets[0].data = result["CELULARES"].total;
                    myPieChart2.update();
                    $("#total_global_sistemas_celulares").html(result["CELULARES"].total_global);

                    myPieChart3.data.labels = result["IMPRESORAS"].estatus;
                    myPieChart3.data.datasets[0].data = result["IMPRESORAS"].total;
                    myPieChart3.update();
                    $("#total_global_sistemas_impresoras").html(result["IMPRESORAS"].total_global);

                    myPieChart4.data.labels = result["MONITORES"].estatus;
                    myPieChart4.data.datasets[0].data = result["MONITORES"].total;
                    myPieChart4.update();
                    $("#total_global_sistemas_monitores").html(result["MONITORES"].total_global);

                    myPieChart5.data.labels = resutl["PROYECTORES"].estatus;
                    myPieChart5.data.datasets[0].data = result["PROYECTORES"].total;
                    myPieChart5.update();
                    $("#total_global_sistemas_proyectores").html(result["PROYECTORES"].total_global);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        });

    })

});
    </script>

<!--<section class="tables">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <img src="<?= base_url()?>uploads/estevez-background.jpg" class="d-inline-block">
            </div>
        </div>
    </div>
</section>-->
<?php
    break;
    case 3: 
?>
<!-- dashboard control vehicular -->
<section class="client">
    <?php if($this->session->userdata('modulos') != NULL && $this->session->userdata('modulos') != '' && $this->session->userdata('modulo_activo') == ''){ ?>
        <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <?php foreach($this->session->userdata('modulos') AS $key => $value){ ?>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1><?= $key ?></h1>
                        <a href="<?= base_url() ?>inicio/cambio-modulo/<?= $value ?>">
                        <img src="<?= base_url() ?>img/<?= $key ?>.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
        <?php } ?>
    <?php if($this->session->userdata('modulo_activo') == 3 || $this->session->userdata('modulo_activo') == 4){ ?>
    <section class="client">
    <div class="container-fluid">
        <div class="row">
            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Utilitario</h3><small>Estatus actual</small>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="marca_estatus_utilitario" class="form-control marca" data-target="modelo_estatus_utilitario" data-tipo="utilitario">
                                        <option value="">SELECCIONE MARCA</option>
                                        <?php foreach ($unidades_marca as $value) { ?>
                                            <option value="<?= $value->marca ?>"><?= $value->marca ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="modelo_estatus_utilitario" class="form-control modelo">
                                        <option value="">SELECCIONE MODELO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_vehiculos_utilitario"></strong><br><span>Totales</span>
                            </div>
                            <canvas id="vehiculos_utilitario"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->

            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Maquinaria</h3><small>Estatus actual</small>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="marca_estatus_maquinaria" class="form-control marca" data-target="modelo_estatus_maquinaria" data-tipo="maquinaria">
                                        <option value="">SELECCIONE MARCA</option>
                                        <?php foreach ($unidades_marca as $value) { ?>
                                            <option value="<?= $value->marca ?>"><?= $value->marca ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="modelo_estatus_maquinaria" class="form-control modelo">
                                        <option value="">SELECCIONE MODELO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_vehiculos_maquinaria"></strong><br><span>Totales</span>
                            </div>
                            <canvas id="vehiculos_maquinaria"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->

            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Camioneta</h3><small>Estatus actual</small>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="marca_estatus_camioneta" class="form-control marca" data-target="modelo_estatus_camioneta" data-tipo="camioneta">
                                        <option value="">SELECCIONE MARCA</option>
                                        <?php foreach ($unidades_marca as $value) { ?>
                                            <option value="<?= $value->marca ?>"><?= $value->marca ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="modelo_estatus_camioneta" class="form-control modelo">
                                        <option value="">SELECCIONE MODELO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_vehiculos_camioneta"></strong><br><span>Totales</span>
                            </div>
                            <canvas id="vehiculos_camioneta"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->

            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Unidades</h3>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_unidades_control_vehicular ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="unidades_control_vehicular"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->

            <!--<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>-->
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Unidades por marca y modelo</h3><small>Estatus actual</small>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="marca" class="form-control marca" data-target="modelo">
                                        <option value="">SELECCIONE MARCA</option>
                                        <?php foreach ($unidades_marca as $value) { ?>
                                            <option value="<?= $value->marca ?>"><?= $value->marca ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-4">
                                <div class="form-group">
                                    <select id="modelo" class="form-control modelo">
                                        <option value="">SELECCIONE MODELO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="chart text-center">
                            <div class="text"><strong class="total_unidades_control_vehicular_marca_modelo">0</strong><br><span>Totales</span>
                            </div>
                            <canvas id="unidades_control_vehicular_marca_modelo"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Line Chart            -->
            <div class="chart col-lg-12 col-12">
                <div class="text-right bg-white" style="padding: 15px 5px;">
                    <select id="select_anio"></select>
                </div>
                <div class="bg-white">
                    <h3 style="padding: 15px 5px;">Costo seguros por mes y año</h3>
                    <canvas width="800" height="350" id="grafica_seguros_costos_mes_anio"></canvas>
                </div>
                <div class="bg-white">
                    <h3 style="padding: 15px 5px;">Costo verificaciones por mes y año</h3>
                    <canvas width="800" height="350" id="grafica_verificaciones_costos_mes_anio"></canvas>
                </div>
            </div>
            <div class="col-xs-0 col-sm-1 col-md-2 col-lg-2">
            </div>
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <h3 style="padding: 15px 5px;">Mínimos y máximos refacciones</h3>
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda" name="busqueda">
                    </div>
                </div>
                <div class="bg-white">
                    <canvas width="1100" height="480" id="lineChart"></canvas>
                </div>
                <div id="pagination_lineChart" class="bg-white" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <div class="text-right">
                        <select id="mecanicos1" class="mecanicos"></select>
                        <select name="rt0">
                            <option value="">Todos</option>
                            <option value="mantemiento_correctivo">Mantenimiento Correctivo</option>
                            <option value="mantemiento_preventivo">Mantenimiento Preventivo</option>
                            <option value="mantemiento_preventivo_menor">Mantenimiento Preventivo Menor</option>
                            <option value="mantemiento_preventivo_mayor">Mantenimiento Preventivo Mayor</option>
                            <option value="desgaste">Desgaste</option>
                            <option value="predictivo">Predictivo</option>
                        </select>
                        <input type="date" name="fecha_inicio_rango_fecha">
                        <input type="date" name="fecha_final_rango_fecha">
                        <button id="productividadControlVehicularPorRangoFecha">Buscar</button>
                    </div>
                    <h3 style="padding: 15px 5px;">Total servicios por rango de fecha</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="servicios_rango_fecha" width="800" height="350"></canvas>
                    </div>
                    <h3 style="padding: 15px 5px;">Productividad por rango de fecha</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="productividad_rango_fecha" width="800" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <div class="text-right">
                        <select id="select_anio_servicio"></select>
                        <select id="mecanicos" class="mecanicos"></select>
                    </div>
                    <h3 style="padding: 15px 5px;">Total servicios por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="servicios_anios_mes" width="800" height="350"></canvas>
                    </div>
                    <h3 style="padding: 15px 5px;">Productividad por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="productividad_anios_mes" width="800" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <h3 style="padding: 15px 5px;">Total servicios por mes y año (Comparativa)</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-servicios-general" width="800" height="350"></canvas>
                    </div>
                    <h3 style="padding: 15px 5px;">Productividad por mes y año (Comparativa)</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-productividad-general" width="800" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
/*global $, document, Chart, LINECHART, data, options, window*/
$(document).ready(function() {

    'use strict';

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        <?php

        echo "var array_labels = ". json_encode($labels). ";\n";
    echo "var array_minimos = ".json_encode($minimos) . ";\n";
    echo "var array_stock = ". json_encode($stock). ";\n";
    ?>

        var select_anio = $('#select_anio');
        var currentYear = new Date().getFullYear();
        for(var r=2021; r<=currentYear; r++){
                select_anio.append($("<option value='" + r + "'>" + r + "</option>"));
        }
        select_anio.val(currentYear);
        select_anio.on("change", function(){
            costoSeguroVerificacionMesAnio();
        });

        var vehiculos_utilitario = $("#vehiculos_utilitario");
        var chart_vehiculos_utilitario = new Chart(vehiculos_utilitario, {
            type: 'doughnut',
            options: {
                //responsive: true,
                cutoutPercentage: 90,
                legend: {
                    display: false
                }
            },
            data: {
                labels: [],
                datasets: [
                    {
                        data: [],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: 
                        [
                            '#55e6a0', //color almacen
                            "#f4e150", //color asignado
                            "#ff0000", //color dañado
                            "#71d1f2", //color descompuesto       
                            '#F79AA8', //color robado
                            "#55e6a0",
                            '#F79AA8', //color robado
                            '#008902', //color vendido
                        ],
                        hoverBackgroundColor: 
                        [
                            '#55e6a0',
                            "#f4e150",
                            "#ff0000",
                            "#71d1f2",
                            '#F79AA8',
                            "#55e6a0",
                            '#F79AA8',
                            '#008902'
                        ]
                    }
                ]
            }
        });

        var vehiculos_maquinaria = $("#vehiculos_maquinaria");
        var chart_vehiculos_maquinaria = new Chart(vehiculos_maquinaria, {
            type: 'doughnut',
            options: {
                //responsive: true,
                cutoutPercentage: 90,
                legend: {
                    display: false
                }
            },
            data: {
                labels: [],
                datasets: [
                    {
                        data: [],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: 
                        [
                            '#55e6a0', //color almacen
                            "#f4e150", //color asignado
                            "#ff0000", //color dañado
                            "#71d1f2", //color descompuesto       
                            '#F79AA8', //color robado
                            "#55e6a0",
                            '#F79AA8', //color robado
                            '#008902', //color vendido
                        ],
                        hoverBackgroundColor: 
                        [
                            '#55e6a0',
                            "#f4e150",
                            "#ff0000",
                            "#71d1f2",
                            '#F79AA8',
                            "#55e6a0",
                            '#F79AA8',
                            '#008902'
                        ]
                    }
                ]
            }
        });

        var vehiculos_camioneta = $("#vehiculos_camioneta");
        var chart_vehiculos_camioneta = new Chart(vehiculos_camioneta, {
            type: 'doughnut',
            options: {
                //responsive: true,
                cutoutPercentage: 90,
                legend: {
                    display: false
                }
            },
            data: {
                labels: [],
                datasets: [
                    {
                        data: [],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: 
                        [
                            '#55e6a0', //color almacen
                            "#f4e150", //color asignado
                            "#ff0000", //color dañado
                            "#71d1f2", //color descompuesto       
                            '#F79AA8', //color robado
                            "#55e6a0",
                            '#F79AA8', //color robado
                            '#008902', //color vendido
                        ],
                        hoverBackgroundColor: 
                        [
                            '#55e6a0',
                            "#f4e150",
                            "#ff0000",
                            "#71d1f2",
                            '#F79AA8',
                            "#55e6a0",
                            '#F79AA8',
                            '#008902'
                        ]
                    }
                ]
            }
        });



        function indicadorEstatusAutosControlVehicular(marca, modelo, tipo){
            $.ajax({
                url: "<?= base_url()?>inicio/indicadorEstatusAutosControlVehicular",
                type: "POST",
                dataType: "json",
                data: { marca : marca, modelo : modelo, tipo: tipo },
                success: function(result) {
                    var label = [];
                    var data = [];
                    var item = null;
                    if(tipo == "" || tipo == "utilitario"){
                        item = result.utilitario;
                        for(var r=0; r<item.arrayEstatus.length; r++){
                            label.push(item.arrayEstatus[r].estatus);
                            data.push(parseInt(item.arrayEstatus[r].total));
                        }
                        chart_vehiculos_utilitario.data.labels = label;
                        chart_vehiculos_utilitario.data.datasets[0].data = data;
                        chart_vehiculos_utilitario.update();
                        $("#total_vehiculos_utilitario").html(item.total);
                    }
                    if(tipo == "" || tipo == "maquinaria"){
                        label = [];
                        data = [];
                        item = result.maquinaria;
                        for(var r=0; r<item.arrayEstatus.length; r++){
                            label.push(item.arrayEstatus[r].estatus);
                            data.push(parseInt(item.arrayEstatus[r].total));
                        }
                        chart_vehiculos_maquinaria.data.labels = label;
                        chart_vehiculos_maquinaria.data.datasets[0].data = data;
                        chart_vehiculos_maquinaria.update();
                        $("#total_vehiculos_maquinaria").html(item.total);
                    }
                    if(tipo == "" || tipo == "camioneta"){
                        label = [];
                        data = [];
                        item = result.camioneta;
                        for(var r=0; r<item.arrayEstatus.length; r++){
                            label.push(item.arrayEstatus[r].estatus);
                            data.push(parseInt(item.arrayEstatus[r].total));
                        }
                        chart_vehiculos_camioneta.data.labels = label;
                        chart_vehiculos_camioneta.data.datasets[0].data = data;
                        chart_vehiculos_camioneta.update();
                        $("#total_vehiculos_camioneta").html(item.total);
                    }
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }
        indicadorEstatusAutosControlVehicular("","","");

        var BARCHART5 = $('#servicios_rango_fecha');
        var myBarChartServices5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });
        
        var BARCHART6 = $('#productividad_rango_fecha');
        var myBarChartServices6 = new Chart(BARCHART6, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });

        function productividadControlVehicularPorRangoFecha(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/productividadControlVehicularPorRangoFecha",
                type: "POST",
                dataType: "json",
                data: { 
                    fecha_inicio: $("input[name='fecha_inicio_rango_fecha']").val(),
                    fecha_final: $("input[name='fecha_final_rango_fecha']").val(),
                    rt0: $("select[name='rt0']").val(),
                    id_mecanicos: $("#mecanicos1").val()
                },
                success: function(result) {
                    console.log(result);
                    var servicios_labels = [];
                    var servicios_data = [];
                    var productividad_label = [];
                    var productividad_data = [];
                    for(var r=0; r<result.total_servicios.length; r++){
                        servicios_labels.push(result.total_servicios[r].fecha);
                        servicios_data.push(parseFloat(result.total_servicios[r].total));
                    }
                    for(var r=0; r<result.total_productividad.length; r++){
                        productividad_label.push(result.total_productividad[r].fecha);
                        productividad_data.push(parseFloat(result.total_productividad[r].productividad));
                    }
                    myBarChartServices5.data.labels = servicios_labels;
                    myBarChartServices5.data.datasets[0].data = servicios_data;
                    myBarChartServices5.update();
                    myBarChartServices6.data.labels = productividad_label;
                    myBarChartServices6.data.datasets[0].data = productividad_data;
                    myBarChartServices6.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }
        var date = new Date();
        date = date.getFullYear() + "-" + ("0" + (date.getMonth()+1)).slice(-2) + "-" + ("0" + date.getDate()).slice(-2);
        $("input[name='fecha_inicio_rango_fecha']").val(date);
        $("input[name='fecha_final_rango_fecha']").val(date);
        productividadControlVehicularPorRangoFecha();
        $("#productividadControlVehicularPorRangoFecha").on("click", function(){
            productividadControlVehicularPorRangoFecha();
        });

        var BARCHART1 = $("#grafica_seguros_costos_mes_anio");
        var myBarChart1 = new Chart(BARCHART1, {
            type: 'bar',
            stack: '',
            data: {
                labels: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
                datasets: [{
                    data: [],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"
                    ], hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"
                    ]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                }
            }
        });

        var BARCHART2 = $("#grafica_verificaciones_costos_mes_anio");
        var myBarChart2 = new Chart(BARCHART2, {
            type: 'bar',
            stack: '',
            data: {
                labels: ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"],
                datasets: [{
                    data: [],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"
                    ], hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"
                    ]
                }]
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                }
            }
        });

        var self = this;
        $(".marca").on('change', function(e){
            var value = $(this).val();
            $.ajax({
                url: "<?= base_url()?>inicio/unidades_control_vehicular_modelo",
                method: "POST",
                data: { marca : value, categoria_vehiculo: $(e.currentTarget).data("tipo") == undefined ? "" : $(e.currentTarget).data("tipo")},
                dataType: "json",
                success : function(resp){
                    var elemento = $(e.currentTarget);
                    var modelo = $("#"+elemento.data("target"));
                    modelo.html("");
                    modelo.append("<option value=''>SELECCIONE MODELO</option>");
                    for(var r=0; r<resp.length; r++){
                        modelo.append("<option value='" + resp[r].modelo + "'>" + resp[r].modelo + "</option>");
                    }
                    if(elemento.attr("id") != 'marca'){
                        indicadorEstatusAutosControlVehicular(value, "", elemento.data("tipo"));
                    }
                }, error: function(){
                    console.log("Error, intente mas tarde");     
                }
            });
        });


        $(".modelo").on('change', function(e){
            var elemento_marca = $(e.currentTarget);
            var id_elemento_marca = elemento_marca.attr("id");
            var elemento = "marca";
            if(id_elemento_marca == 'modelo_estatus_utilitario'){
                elemento = "marca_estatus_utilitario";
            }else if(id_elemento_marca == 'modelo_estatus_maquinaria'){
                elemento = "marca_estatus_maquinaria";
            }else if(id_elemento_marca == 'modelo_estatus_camioneta'){
                elemento = "marca_estatus_camioneta";
            }
            var marca = $("#" + elemento).val();
            var modelo = $(this).val();
            if($(e.currentTarget).attr("id") == 'modelo'){
                $.ajax({
                    url: "<?= base_url()?>inicio/unidades_control_vehicular_marca_modelo",
                    method: "POST",
                    data: { marca : marca, modelo : modelo },
                    dataType: "json",
                    success : function(resp){
                        console.log(resp);
                        var labels = [];
                        var data = [];
                        var total = 0;
                        for(var r=0; r<resp.length; r++){
                            labels.push(resp[r].estatus);
                            data.push(resp[r].total);
                            total += parseInt(resp[r].total);
                        }
                        myPieChart2.data.labels = labels;
                        myPieChart2.data.datasets[0].data = data;
                        myPieChart2.update();
                        $(".total_unidades_control_vehicular_marca_modelo").html(total);
                    }, error: function(){
                        console.log("Error, intente mas tarde");     
                    }
                });
            }else{
                indicadorEstatusAutosControlVehicular(marca, modelo, $("#" + elemento).data("tipo"));
            }
        });

        function costoSeguroVerificacionMesAnio(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/costoSeguroVerificacionMesAnio",
                type: "POST",
                dataType: "json",
                data:{
                    anio: select_anio.val()
                },
                success: function(result) {
                    var array_costo_seguro_mes_anio = new Array(12);
                    var array_costo_verificacion_mes_anio = new Array(12);
                    var index = 0;
                    for(var r=1; r<=12; r++){
                        if(result.costo_seguro_mes_anio[index] != undefined && result.costo_seguro_mes_anio[index].mes == r){
                            if(result.costo_seguro_mes_anio[index].costo != null){
                                array_costo_seguro_mes_anio[r-1] = parseFloat(result.costo_seguro_mes_anio[index].costo);
                            }else{
                               array_costo_seguro_mes_anio[r-1] = 0; 
                            }
                            index++;
                        }else{
                            array_costo_seguro_mes_anio[r-1] = 0;
                        }
                    }
                    index = 0;
                    for(var r=1; r<=12; r++){
                        if(result.costo_verificacion_mes_anio[index] != undefined && result.costo_verificacion_mes_anio[index].mes == r){
                            if(result.costo_verificacion_mes_anio[index].costo != null){
                                array_costo_verificacion_mes_anio[r-1] = parseFloat(result.costo_verificacion_mes_anio[index].costo);
                            }else{
                                array_costo_verificacion_mes_anio[r-1] = 0; 
                            }
                            index++;
                        }else{
                            array_costo_verificacion_mes_anio[r-1] = 0;
                        }
                    }
                    myBarChart1.data.datasets[0].data = array_costo_seguro_mes_anio;
                    myBarChart1.update();
                    myBarChart2.data.datasets[0].data = array_costo_verificacion_mes_anio;
                    myBarChart2.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }
        costoSeguroVerificacionMesAnio();
    }) /*End Pace*/
    <?php
    if (isset($estatus_unidades)) {
        echo "var array_labels_unidades = ". json_encode($estatus_unidades). ";\n";
        echo "var array_total_unidades = ".json_encode($total_unidades) . ";\n"; ?>
        var PIECHART = $('#unidades_control_vehicular');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                responsive: true,
                cutoutPercentage: 90,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_unidades,
                datasets: [
                    {
                        data: array_total_unidades,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: 
                        [
                            '#55e6a0', //color almacen
                            "#f4e150", //color asignado
                            "#55e6a0",
                            //"#ff0000", //color dañado
                            "#71d1f2", //color descompuesto       
                            '#F79AA8', //color robado
                            '#008902' //color vendido
                        ],
                        hoverBackgroundColor: 
                        [
                            '#55e6a0',
                            "#f4e150",
                            "#55e6a0",
                            //"#ff0000",
                            "#71d1f2",
                            '#F79AA8',
                            '#008902'
                        ]
                    }
                ]
            }
        });
    <?php
    }
    ?>

    var PIECHART2 = $('#unidades_control_vehicular_marca_modelo');
    var myPieChart2 = new Chart(PIECHART2, {
        type: 'doughnut',
        options: {
            responsive: true,
            cutoutPercentage: 90,
            legend: {
                display: false
            }
        },
        data: {
            labels: [],
            datasets: [
                {
                    data: [],
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: 
                    [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        //"#55e6a0",
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: 
                    [
                        '#55e6a0',
                        "#f4e150",
                        //"#55e6a0",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }
            ]
        }
    });

});
</script>
<script>
        var myBarChartServices1;
        var myBarChartServices2;
        var myLineChartServices;
        var myBarChartServices3;
        var myBarChartServices4;
        function graficas(){
            var select_anio = $('#select_anio_servicio');
            var currentYear = new Date().getFullYear();
            for(var r=2021; r<=currentYear; r++){
                select_anio.append($("<option value='" + r + "'>" + r + "</option>"));
            }
            select_anio.val(currentYear);
            select_anio.on("change", function(){
                productiviad_control_vehicular();
            });
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/todoLosMecanicos",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    var mecanicos = $('.mecanicos');
                    mecanicos.append($("<option value=''>Todos</option>"));
                    for(var r=0; r<result.length; r++){
                        mecanicos.append($("<option value='" + result[r].idtbl_users + "'>" + result[r].nombre + "</option>"));
                    }
                    mecanicos.on("change", function(){
                        productiviad_control_vehicular();
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
            var BARCHART = $('#servicios_anios_mes');
            myBarChartServices1 = new Chart(BARCHART, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });
            var BARCHART2 = $('#productividad_anios_mes');
            myBarChartServices2 = new Chart(BARCHART2, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
            var legendState = true;
            if ($(window).outerWidth() < 576) {
                legendState = false;
            }
            var LINECHART = $('#lineChart');
            myLineChartServices = new Chart(LINECHART, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });
            var BARCHART3 = $("#bar-chart-servicios-general");
            myBarChartServices3 = new Chart(BARCHART3, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    }
                }
            });
            var BARCHART4 = $("#bar-chart-productividad-general");
            myBarChartServices4 = new Chart(BARCHART4, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
        }

        function indicadores_servicios(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/indicadoresServicios",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    $("#total_autos").html(result.total_autos);
                    $("#total_servicios_corriente").html(result.total_servicios_corriente);
                    $("#total_servicios_caducados").html(result.total_servicios_caducados);
                    $("#total_servicios_proximos").html(result.total_servicios_proximos);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function productiviad_control_vehicular(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/productividadControlVehicular",
                type: "POST",
                dataType: "json",
                data: {
                    anio:$('#select_anio_servicio').val(),
                    id_mecanicos: $('#mecanicos').val()
                },
                success: function(result) {
                    var servicios_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_servicios_anio_mes[index] != undefined && result.total_servicios_anio_mes[index].mes == (r+1)){
                            servicios_anios_mes[r] = result.total_servicios_anio_mes[index].total;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(servicios_anios_mes[r] == undefined){
                            servicios_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices1.data.datasets[0].data = servicios_anios_mes;
                    myBarChartServices1.update();

                    var productividad_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_productividad_anio_mes[index] != undefined && result.total_productividad_anio_mes[index].mes == (r+1)){
                            productividad_anios_mes[r] = result.total_productividad_anio_mes[index].productividad;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(productividad_anios_mes[r] == undefined){
                            productividad_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices2.data.datasets[0].data = productividad_anios_mes;
                    myBarChartServices2.update();

                    // Inicio ...
                    var array_datasets_servicios = [];
                    var array_datasets_productividad = [];

                    var obj = {};
                    for(var r=0; r<result.mecanicos.length; r++){
                        var id_usuario = result.mecanicos[r].idtbl_users;
                        obj[id_usuario] = {nombre: result.mecanicos[r].nombre, data:new Array(12), productividad: new Array(12)};
                        for(var r1=0; r1<result.total_productividad_general_mecanicos_anio.length; r1++){
                            var id_usuario_mantenimiento = result.total_productividad_general_mecanicos_anio[r1].idtbl_users;
                            if(id_usuario == id_usuario_mantenimiento){
                                obj[id_usuario].data[parseInt(result.total_productividad_general_mecanicos_anio[r1].mes)-1] = result.total_productividad_general_mecanicos_anio[r1];
                            }
                        }
                    }
                    var backgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var hoverBackgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var index = 0;
                    var total = 0;
                    
                    for(var key in obj){
                        var item = obj[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                                item.productividad[r1] = 0;
                            }else{
                                item.productividad[r1] = parseInt(item.data[r1].productividad);
                                item.data[r1] = parseInt(item.data[r1].total_servicios);
                                total += item.data[r1];
                            }
                        }
                        if(total > 0){
                            array_datasets_servicios.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            array_datasets_productividad.push({label:item.nombre, data:item.productividad, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                                                            
                    myBarChartServices3.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices3.data.datasets = array_datasets_servicios;
                    myBarChartServices3.update();

                    myBarChartServices4.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices4.data.datasets = array_datasets_productividad;
                    myBarChartServices4.update();
                    // Fin ....

                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function graficar_refacciones_control_vehicular(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_control_vehicular_refacciones",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices.data.labels = productos;
                    myLineChartServices.data.datasets[0].data = minimos;
                    myLineChartServices.data.datasets[1].data = maximos;
                    myLineChartServices.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_refacciones_control_vehicular(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficas();
        //indicadores_servicios();
        productiviad_control_vehicular();
        graficar_refacciones_control_vehicular(0);
        $("#busqueda").on("keyup",function(){
            graficar_refacciones_control_vehicular(0);
        });
</script>
<!-- fin de dashboard control vehicular -->
<?php }elseif($this->session->userdata('modulo_activo') == 2){ ?>
    <section class="dashboard-counts no-padding-bottom personal_dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                    <div class="row">
                        <!-- Item -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Total Autos</span>
                                </div>
                                <div class="number"><strong id="total_autos"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-warning" style="color:white;"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios proximos </span>
                                </div>
                                <div class="number"><strong id="total_servicios_proximos"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios </span>
                                </div>
                                <div class="number"><strong id="total_servicios"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios caducados </span>
                                </div>
                                <div class="number"><strong id="total_servicios_caducados"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios al corriente</span>
                                </div>
                                <div class="number"><strong id="total_servicios_corriente"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-blue"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Autos sin KM definido</span>
                                </div>
                                <div class="number"><strong id="total_sin_km_definido"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    $this->load->model('Controlvehicular_model');
    $resultados = $this->Controlvehicular_model->mecanicadisponible();
    $resultados2 = $this->Controlvehicular_model->mecanicadisponiblecorrectivo();            
    $resultados3 = $this->Controlvehicular_model->mecanicadisponiblepredictivos();
    $resultados4 = $this->Controlvehicular_model->totalidservicio();
    
    ?>
    
    
    <section>
        <div class="row">
            <div class="container text-align:center">
                <div class="container-fluid">
                    <div class="bg-blue has-shadow" style="overflow: hidden; padding: 10px 8px;">
                        <div class="bg-white has-shadow col-xl-12 ">
                            <div class="table-responsive">
                                <h3 style="color: black;">Servicios</h3>
                <table class="table table-bordered border-primary" >
                    <thead>
                        <tr style="background-color: #33DAFF;">
                        <th scope="col">Descripción</th>
                        <th scope="col">2021</th>
                        <th scope="col">2022</th>
                        <th scope="col">2023</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $suma_preventivos_2021 = 0;
                        $suma_preventivos_2022 = 0;
                        $suma_preventivos_2023 = 0;
                        $suma_correctivos_2021 = 0;
                        $suma_correctivos_2022 = 0;
                        $suma_correctivos_2023 = 0;
                        $suma_predictivos_2021 = 0;
                        $suma_predictivos_2022 = 0;
                        $suma_predictivos_2023 = 0;
                        ?>
                    <tr style="background-color: #D9F8FF;">
                    <th scope="row">Preventivos</th>
                    <?php foreach ($resultados as $resultado): ?>
                        <?php if ($resultado->anio == 2021): ?>
                        <td><?php echo isset($resultado->suma_checklist) ? $resultado->suma_checklist : ''; ?></td>
                        <?php $suma_preventivos_2021 += $resultado->suma_checklist; ?>
                        <?php elseif ($resultado->anio == 2022): ?>
                        <td><?php echo isset($resultado->suma_checklist) ? $resultado->suma_checklist : ''; ?></td>
                        <?php $suma_preventivos_2022 += $resultado->suma_checklist; ?>
                        <?php elseif ($resultado->anio == 2023): ?>
                        <td><?php echo isset($resultado->suma_checklist) ? $resultado->suma_checklist : ''; ?></td>
                        <?php $suma_preventivos_2023 += $resultado->suma_checklist; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                    </tr>
                    <tr style="background-color: #D9F8FF;">
                    <th scope="row">Correctivos</th>
                    <?php foreach ($resultados2 as $resultado): ?>
                        <?php if ($resultado->anio == 2021): ?>
                        <td><?php echo isset($resultado->suma_correctivo) ? $resultado->suma_correctivo : ''; ?></td>
                        <?php $suma_correctivos_2021 += $resultado->suma_correctivo; ?>
                        <?php elseif ($resultado->anio == 2022): ?>
                        <td><?php echo isset($resultado->suma_correctivo) ? $resultado->suma_correctivo : ''; ?></td>
                        <?php $suma_correctivos_2022 += $resultado->suma_correctivo; ?>
                        <?php elseif ($resultado->anio == 2023): ?>
                        <td><?php echo isset($resultado->suma_correctivo) ? $resultado->suma_correctivo : ''; ?></td>
                        <?php $suma_correctivos_2023 += $resultado->suma_correctivo; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tr>
                    <tr style="background-color: #D9F8FF;">
                    <th scope="row">Predictivos</th>
                    <?php foreach ($resultados3 as $resultado): ?>
                        <?php if ($resultado->anio == 2021): ?>
                        <td><?php echo isset($resultado->suma_predictivo) ? $resultado->suma_predictivo : ''; ?></td>
                        <?php $suma_predictivos_2021 += $resultado->suma_predictivo; ?>
                        <?php elseif ($resultado->anio == 2022): ?>
                        <td><?php echo isset($resultado->suma_predictivo) ? $resultado->suma_predictivo : ''; ?></td>
                        <?php $suma_predictivos_2022 += $resultado->suma_predictivo; ?>
                        <?php elseif ($resultado->anio == 2023): ?>
                        <td><?php echo isset($resultado->suma_predictivo) ? $resultado->suma_predictivo : ''; ?></td>
                        <?php $suma_predictivos_2023 += $resultado->suma_predictivo; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tr>
                    <tr style="background-color: #D9F8FF;">
                    <th scope="row">Total de Servicios</th>
                    <?php foreach ($resultados4 as $resultado): ?>
                        <?php if ($resultado->anio == 2021): ?>
                        <td><?php echo $suma_preventivos_2021 + $suma_correctivos_2021 + $suma_predictivos_2021; ?></td>
                        <?php elseif ($resultado->anio == 2022): ?>
                        <td><?php echo $suma_preventivos_2022 + $suma_correctivos_2022 + $suma_predictivos_2022; ?></td>
                        <?php elseif ($resultado->anio == 2023): ?>
                        <td><?php echo $suma_preventivos_2023 + $suma_correctivos_2023 + $suma_predictivos_2023; ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    </tr>
                    </tbody>
                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <?php 
$this->load->model('Controlvehicular_model');
$resultados = $this->Controlvehicular_model->mecanicosservicios();
$correctivos = $this->Controlvehicular_model->mecanicosservicioscorrectivos();
$resultados2 = $this->Controlvehicular_model->mecanicosserviciospreventivos();
$mecanicosserviciospredictivos = $this->Controlvehicular_model->mecanicosserviciospredictivos();
?>

    <!--emiliano tabla mecanicos 2023-->
    <section>
        <div class="container-fluid">
            <div class="bg-white has-shadow col-xl-12 ">
        <div class="table-responsive">
                    <table style="width: 100%" class="dataTble table table-striped table-sm">
                    <thead>
                    <tr style="background-color: #A2FF50;">
                        <th scope="col">Mecanicos</th>
                        <th scope="col">Correctivos</th>
                        <th scope="col">Preventivos</th>
                        <th scope="col">Predictivos</th>
                        <th scope="col">Total Servicios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultados as $resultado): ?>
                        <tr style="background-color: #B3F4CF;">
                            <td style="background-color: #73FBAF;"><?php echo $resultado->nombre; ?></td>
                            <td style="background-color: #D7F7E5;">
                            <?php 
                                $totalcorrectivos = 0;
                                foreach ($correctivos as $correctivo)
                                {
                                    if($correctivo->tbl_users_idtbl_users == $resultado->tbl_users_idtbl_users){
                                        echo $correctivo->idcorrectivos . "<br>";
                                        $totalcorrectivos += $correctivo->idcorrectivos;
                                    }
                                }
                            ?>
                            </td>
                            <td style="background-color: #D7F7E5;">
                                <?php
                                    $totalPreventivos = 0;
                                    foreach ($resultados2 as $resultado2) {
                                        if ($resultado2->tbl_users_idtbl_users == $resultado->tbl_users_idtbl_users) {
                                            echo $resultado2->idpreventivos . "<br>";
                                            $totalPreventivos += $resultado2->idpreventivos;
                                        }
                                    }
                                ?>
                            </td>
                            <td style="background-color: #D7F7E5;">
                                <?php
                                    $totalPredictivos = 0;
                                    foreach ($mecanicosserviciospredictivos as $predictivo) {
                                        if ($predictivo->tbl_users_idtbl_users == $resultado->tbl_users_idtbl_users) {
                                            echo $predictivo->idpredictivos . "<br>";
                                            $totalPredictivos += $predictivo->idpredictivos;
                                        }
                                    }
                                ?>
                            </td>
                            <td style="background-color: #D7F7E5;">
                            <?php echo $totalcorrectivos + $totalPreventivos + $totalPredictivos; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                        </div>
                 </div>
        </div>
    </section>
    
    
    <section class="">
        <!--container-fluid-->
        <!-- Work Amount  -->
        <div class="col-xl-12 col-lg-12">
            <div class="work-amount card">
                <div class="card-body">
                    <div class="text-right">
                        <select id="select_anio"></select>
                        <select id="mecanicos" class="mecanicos"></select>
                    </div>
                    <h3>Total servicios por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="servicios_anios_mes" width="800" height="350"></canvas>
                    </div>
                    <h3>Productividad por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="productividad_anios_mes" width="800" height="350"></canvas>
                    </div>
                    <h3>Total servicios por mes y año (Comparativa)</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-servicios-general" width="800" height="350"></canvas>
                    </div>
                    <h3>Productividad por mes y año (Comparativa)</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-productividad-general" width="800" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Line Chart            -->
        <div class="chart col-lg-12 col-12">
            <div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" id="busqueda" name="busqueda">
                </div>
            </div>
            <div class="bg-white d-flex align-items-center justify-content-center has-shadow">
                <canvas width="1100" height="480" id="lineCahrt"></canvas>
            </div>
            <div id="pagination_lineChart" class="bg-white has-shadow" style="padding-bottom: 10px;">
                <ul class="pagination justify-content-center"></ul>
            </div>
        </div>
    </section>
    <script>
        var myBarChartServices1;
        var myBarChartServices2;
        var myLineChartServices;
        var myBarChartServices3;
        var myBarChartServices4;
        function graficas(){
            var select_anio = $('#select_anio');
            var currentYear = new Date().getFullYear();
            for(var r=2021; r<=currentYear; r++){
                select_anio.append($("<option value='" + r + "'>" + r + "</option>"));
            }
            select_anio.val(currentYear);
            select_anio.on("change", function(){
                productiviad_control_vehicular();
            });
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/todoLosMecanicos",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    var mecanicos = $('#mecanicos');
                    mecanicos.append($("<option value=''>Todos</option>"));
                    for(var r=0; r<result.length; r++){
                        mecanicos.append($("<option value='" + result[r].idtbl_users + "'>" + result[r].nombre + "</option>"));
                    }
                    mecanicos.on("change", function(){
                        productiviad_control_vehicular();
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
            var BARCHART = $('#servicios_anios_mes');
            myBarChartServices1 = new Chart(BARCHART, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });
            var BARCHART2 = $('#productividad_anios_mes');
            myBarChartServices2 = new Chart(BARCHART2, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
            var legendState = true;
            if ($(window).outerWidth() < 576) {
                legendState = false;
            }
            var LINECHART = $('#lineCahrt');
            myLineChartServices = new Chart(LINECHART, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });
            var BARCHART3 = $("#bar-chart-servicios-general");
            myBarChartServices3 = new Chart(BARCHART3, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    }
                }
            });
            var BARCHART4 = $("#bar-chart-productividad-general");
            myBarChartServices4 = new Chart(BARCHART4, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
        }

        function indicadores_servicios(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/indicadoresServicios",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    $("#total_autos").html(result.total_autos);
                    $("#total_servicios_corriente").html(result.total_servicios_corriente);
                    $("#total_servicios").html(result.total_servicios);
                    $("#total_servicios_caducados").html(result.total_servicios_caducados);
                    $("#total_servicios_proximos").html(result.total_servicios_proximos);
                    $("#total_sin_km_definido").html(result.total_sin_km_definido);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function productiviad_control_vehicular(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/productividadControlVehicular",
                type: "POST",
                dataType: "json",
                data: {
                    anio:$('#select_anio').val(),
                    id_mecanicos: $('#mecanicos').val()
                },
                success: function(result) {
                    var servicios_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_servicios_anio_mes[index] != undefined && result.total_servicios_anio_mes[index].mes == (r+1)){
                            servicios_anios_mes[r] = result.total_servicios_anio_mes[index].total;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(servicios_anios_mes[r] == undefined){
                            servicios_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices1.data.datasets[0].data = servicios_anios_mes;
                    myBarChartServices1.update();

                    var productividad_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_productividad_anio_mes[index] != undefined && result.total_productividad_anio_mes[index].mes == (r+1)){
                            productividad_anios_mes[r] = result.total_productividad_anio_mes[index].productividad;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(productividad_anios_mes[r] == undefined){
                            productividad_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices2.data.datasets[0].data = productividad_anios_mes;
                    myBarChartServices2.update();

                    // Inicio ...
                    var array_datasets_servicios = [];
                    var array_datasets_productividad = [];

                    var obj = {};
                    for(var r=0; r<result.mecanicos.length; r++){
                        var id_usuario = result.mecanicos[r].idtbl_users;
                        obj[id_usuario] = {nombre: result.mecanicos[r].nombre, data:new Array(12), productividad: new Array(12)};
                        for(var r1=0; r1<result.total_productividad_general_mecanicos_anio.length; r1++){
                            var id_usuario_mantenimiento = result.total_productividad_general_mecanicos_anio[r1].idtbl_users;
                            if(id_usuario == id_usuario_mantenimiento){
                                obj[id_usuario].data[parseInt(result.total_productividad_general_mecanicos_anio[r1].mes)-1] = result.total_productividad_general_mecanicos_anio[r1];
                            }
                        }
                    }
                    var backgroundColor = ['#248E', '#23BBCA', '#FEDC06', '#60EBA1', '#F298EB', '#F21818', '#F89B38', '#F8386F'];
                    var hoverBackgroundColor = ['#7792E4', '#8FE3EB', '#FEE860', '#8BF7BE', '#E9B8E5', '#F76B6B', '#F9B46C', '#F389A8'];
                    var index = 0;
                    var total = 0;
                    
                    for(var key in obj){
                        var item = obj[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                                item.productividad[r1] = 0;
                            }else{
                                item.productividad[r1] = parseInt(item.data[r1].productividad);
                                item.data[r1] = parseInt(item.data[r1].total_servicios);
                                total += item.data[r1];
                            }
                        }
                        if(total > 0){
                            array_datasets_servicios.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            array_datasets_productividad.push({label:item.nombre, data:item.productividad, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                                                            
                    myBarChartServices3.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices3.data.datasets = array_datasets_servicios;
                    myBarChartServices3.update();

                    myBarChartServices4.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices4.data.datasets = array_datasets_productividad;
                    myBarChartServices4.update();
                    // Fin ....

                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function graficar_refacciones_control_vehicular(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_control_vehicular_refacciones",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices.data.labels = productos;
                    myLineChartServices.data.datasets[0].data = minimos;
                    myLineChartServices.data.datasets[1].data = maximos;
                    myLineChartServices.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_refacciones_control_vehicular(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficas();
        //indicadores_servicios();
        productiviad_control_vehicular();
        graficar_refacciones_control_vehicular(0);
        $("#busqueda").on("keyup",function(){
            graficar_refacciones_control_vehicular(0);
        });
    </script>
    
    <?php }elseif($this->session->userdata('modulo_activo') == 1){ ?>
        
    <section class="dashboard-counts no-padding-bottom personal_dashboard" id="">   
    <div class="col-xl-2 container-fluid">
    <a  id="btnexportar" href="<?php echo base_url() ?>ControlVehicular/excel_status/" class="btn btn-secondary buttons-excel buttons-html5 btn-success" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
    </div>
    </section>
    <section class="dashboard-counts no-padding-bottom personal_dashboard" id="">   
    <div class="container-fluid">
            <div class="row">
                <div class="bg-info col-xl-12 col-sm-12" style="overflow: hidden; padding:10px 8px;">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                <div class="container-fluid">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover table-bordered" id="tbcursos">
                            <thead>
                                <tr>
                                    <th data-priority="1">Activo</th>
                                    <th>Asignados</th>
                                    <th>Colisión</th>
                                    <th>Disponible</th>
                                    <th>Perdida Total</th>
                                    <th>Robado</th>
                                    <th>Taller</th>
                                    <th>Programado</th>
                                    <th>Trámite</th>
                                    <th>Vendidas</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php foreach($modelos AS $key => $value){ ?>
                                    <tr>
                                        <?php $modelo = strtr($value->modelo, " ", "_"); ?>
                                        <td style="width: 100px"><?= $value->modelo ?><input type="hidden" class="modelos" value="<?= $value->modelo ?>" id="<?= $value->modelo. '_' . $key ?>"></td>
                                        <td style="width: 100px" id="<?= $modelo ?>_asignado">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_colision">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_disponible">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_perdida_total">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_robado">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_taller">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_programado">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_tramite_vehicular">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_vendida">0</td>
                                        <td style="width: 100px" id="<?= $modelo ?>_total">0</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                <th style="width: 100px">Total</th>
                                <th style="width: 100px" id="total_asignados">0</th>
                                <th style="width: 100px" id="total_colision">0</th>
                                <th style="width: 100px" id="total_disponible">0</th>
                                <th style="width: 100px" id="total_perdida">0</th>
                                <th style="width: 100px" id="total_robado">0</th>
                                <th style="width: 100px" id="total_taller">0</th>
                                <th style="width: 100px" id="total_programado">0</th>
                                <th style="width: 100px" id="total_tramite">0</th>
                                <th style="width: 100px" id="total_vendida">0</th>
                                <th style="width: 100px" id="total_total">0</th>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!--Emiliano-->

<?php
$this->load->model('Controlvehicular_model');
$resultados = $this->Controlvehicular_model->autosestatus();
?>
<section>
    <div class="row">
        <div class="container text-align:center">
        <div class="container-fluid">
            <div class="bg-blue has-shadow" style="overflow: hidden; padding: 10px 8px;">
                <div class="bg-white has-shadow col-xl-12 ">
                
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered" id="estatus">
                        <!--thead align="center" class="table-bordered">
                            <th style="background-color: #33DAFF;" id="sum">0</th>
                        </thead-->
                        <br>
                        <thead align="center" class="table-bordered">
                            <tr>
                            <th style="background-color: #33DAFF;">Reporte General Activo</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php
                                $totalSum = 0;
                                foreach ($resultados as $resultado) {
                                    $totalSum += $resultado->total; 
                                ?>
                                <tr class="d-flex">
                                   <td style="width: 100px" class="col-6" style="text-align: center;"><?php echo $resultado->estatus; ?></td>
                                    <td style="width: 100px;" class="col-6"><?php echo $resultado->total; ?></td>
                                </tr>
                                <?php
                                }
                                ?>
                                <tr class="d-flex">
                                    <td style="width: 0px" class="col-6"><strong>Total:</strong></td>
                                    <td style="max-width: 0px;" class="col-6"><strong><?php echo $totalSum; ?></strong></td>
                                </tr>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
<script>
    var tabla = document.getElementById("estatus");
var totalAsignados = document.getElementById("total_asignados");
var sum = document.getElementById("sum");

 //Realiza la suma de los valores relevantes
var asignados = parseFloat(totalAsignados.textContent);
var disponibles = parseFloat(tabla.rows[2].cells[1].textContent);
var reparacion = parseFloat(tabla.rows[3].cells[1].textContent);
var tramite = parseFloat(tabla.rows[4].cells[1].textContent);
var tramites = parseFloat(tabla.rows[6].cells[1].textContent);
var suma = asignados + disponibles + tramite + reparacion + tramites;

 //Muestra el resultado en la parte deseada de la tabla
sum.textContent = suma.toString();
</script>

<section>
    
    <div class="row">
        <div class="container text-align:center">
            <div class="container-fluid">
                <div class="bg-info has-shadow" style="overflow: hidden; padding: 10px 8px;">
                   
                <div class="bg-white has-shadow col-xl-12 ">
                    
                    <h2 class="p-3 mb-2 bg-white text-dark">Unidades Por Año.</h2> 
                   
                        <div class="table-responsive">
                            <select id="automodelo" onchange="llenarTabla(this.value)" class="custom-select custom-select-sm">
                                <option value="">Seleccionar</option>
                                <?php foreach ($modelos as $modelo): ?>
                                    <option value="<?php echo $modelo->modelo; ?>"><?php echo $modelo->modelo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        
                            <table class="table table-bordered border-success" id="modelos" >
                            <thead>
                                <h1>Total de Unidades Por Año</h1>
                                <tr>
                                    <th style="background-color: #5FFFA5;">"Año"</th>
                                    <th style="background-color: #5FFFA5;">"Cantidad"</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="body">
                                <tr style="background-color: #C7F9E8;">
                                    <td style="width: 100px background-color: #C7F9E8;" class="col-6"></td>
                                    <td style="width: 100px background-color: #C7F9E8;" class="col-6"></td>                                    
                                </tr>
                            </tbody>
                            </table>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function llenarTabla(modelo) {
    $.ajax({
        url: '<?php echo base_url("ControlVehicular/modelosautos"); ?>',
        type: 'POST',
        dataType: 'json',
        data: { automodelo: modelo },
        success: function (response) {
            var tabla = $('#modelos tbody');
            tabla.empty();

            $.each(response.modelos, function (index, modelo) {
                var fila = $('<tr>');
                fila.append('<td style="background-color: #FCFFBD;">' + modelo.anio + '</td>');
                fila.append('<td style="background-color: #FCFFBD;">' + modelo.total + '</td>');
                tabla.append(fila);
            });
        }
    });
}
</script>
    <br>
    <br>
    <br>
<div class="container-fluid">
<div class="bg-danger col-xl-12 col-sm-12" style="overflow: hidden; padding:10px 8px;">
<div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 8px;">
<div class="container text-align:center">
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
            <label>USUARIOS</label>
            <div class="content-select">
            <select class="form-control custom-select" onchange="graficar_productividad_de_asignaciones()" name="usuarioa" id="usuarioa">
                <?php 
                  foreach($usus as $usu){?>
                <option value="<?= $usu->idtbl_users;?>"><?= $usu->nombre;?></option>
                <?php }?>
            </select>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
        <div class="form-group">
            <label for="anio">Año Actual</label>
            <select name="anioasignado" class="form-control custom-select selector_anio" id="anioasignado"
                onchange="graficar_productividad_de_asignaciones()">
            </select>
        </div>
    </div>
</div>
    <div class="product-sales-area mg-tb-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="white-box analytics-info-cs mg-b-10">
                    <div class="card-body" id="contenedor">
                <h3>Productividad De Asignaciones de Unidades</h3><small>Control Vehicular
                </small>
                    <canvas id="asignacionusuarios" width="1200" height="450"  ></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<script>          
    var selector_anio = $(".selector_anio");
        var anio_actual_selector = new Date().getFullYear();
        for(var r=2020; r<=anio_actual_selector; r++){
            selector_anio.append("<option value='" + r +  "'>" + r + "</option>")
        }
        $('.selector_a[name="anio_actual"]').val(anio_actual_selector);
        $('.selector_a[name="anio_actualV"]').val(anio_actual_selector);
        $('.selector_a[name="anio_actualV"]').val(anio_actual_selector);
       
    var BARCHART77 = $("#asignacionusuarios");
    myBarChart77 = new Chart(BARCHART77, {
        type: 'bar',
        stack: '',
        data: {
            labels: [],
            datasets: [{
                label: 2022,
                data: [],
                borderWidth: [1, 1, 1, 1],
                backgroundColor: "#33FFF0",
                hoverBackgroundColor: "#33FFF0"
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });    
    function graficar_productividad_de_asignaciones(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/usuario_asignaciones",
                type: "POST",
                data:{
                    year: $("#anioasignado").val(),
                    usuario: $("#usuarioa").val()
                },
                dataType: "json",
                success: function(result) {
                    var backgroundColor = ['#F91604', '#F91604', '#F91604', '#F91604', '#F91604', '#F91604'];
                    var hoverBackgroundColor = ['#FFC390', '#FFC390', '#FFC390', '#F118F5', '#F118F5', '#F118F5'];
                    
                    var array_datasets = [];

                    var obj_mantenimientos = {};
                    for(var r=0; r<result.usuario.length; r++){
                        
                        var idtbl_users = result.usuario[r].idtbl_users;
                        obj_mantenimientos[idtbl_users] = {nombre: result.usuario[r].nombre_usuario, data:new Array(12)};
                        for(var r1=0; r1<result.asignaciones.length; r1++){
                          
                            var id_usuario_mantenimiento = result.asignaciones[r1].idtbl_users;
                            if(idtbl_users == id_usuario_mantenimiento){
                                obj_mantenimientos[idtbl_users].data[parseInt(result.asignaciones[r1].FECHA)-1] = result.asignaciones[r1];
                            }
                        }
                    }
                    console.log("EmilianoSPSS",obj_mantenimientos);
                    var index = 0;
                    var total = 0;
                    for(var key in obj_mantenimientos){
                        var item = obj_mantenimientos[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                            }else{
                                item.data[r1] = parseInt(item.data[r1].asignaciones);
                                total += item.data[r1];
                            }
                        }
                        console.log(key, total);
                        if(total > 0){
                            array_datasets.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                    console.log(">> ", array_datasets);
                                                            
                    myBarChart77.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChart77.data.datasets = array_datasets;
                    console.log('AQYUUU',myBarChart77.data);
                    myBarChart77.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }
        graficar_productividad_de_asignaciones();
        $("#usuarioa").on("change",function(){
            graficar_productividad_de_asignaciones();
        });

        $("#anioasignado").on("change",function(){
            graficar_productividad_de_asignaciones();
        });

    
</script>
<!--general-->
    <script>
    
    $(document).ready(function() {
  //event.preventDefault();
    console.log("entro");
    var asignados = 0;
    var colision = 0;
    var disponible = 0;
    var perdida_total = 0;
    var robado = 0;
    var taller = 0;
    var programado = 0;
    var tramite = 0;
    var vendidos = 0;
    var totales = 0;

  $( ".modelos" ).each(function( index ) {
  //var neodata = $(this).text();
  var modelo = $(this).val();
  var id_select = $(this).attr("id");
  
  $.ajax({
    url: "<?= base_url()?>ControlVehicular/getAutosModelo",
    type: "post",
    data: 'modelo='+ modelo,
    dataType: 'json',
    processData: false,
    success : function(data) {
      //console.log(data[0]);

        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        var total = 0;
        var progress = '';
        var progress_total = '';
        
        $.each(data, function (i, item) {
            if(parseInt(item.total) > 0){
            progress = "<div class='progressgraphic'>"+item.total+"<div role='progressbar' style='width: "+item.total+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
            }else{
                progress = "0";
            }
            total += parseInt(item.total);
            if(parseInt(total) > 0){
            progress_total = "<div class='progressgraphic'>"+total+"<div role='progressbar' style='width: "+total+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
            }else{
                progress_total = "0";
            }
            var cadena = item.modelo;
            var cadena_final = cadena.replaceAll(" ", "_");
            var estatus = item.estatus;
            var estatus_final = estatus.replaceAll(" ", "_");
            $('#'+cadena_final+'_'+estatus_final).html(progress);
            
            $('#'+cadena_final+'_total').html(progress_total);
            if(item.estatus == 'asignado'){
                asignados = asignados + parseInt(item.total);
            }
            else if(item.estatus == 'colision'){
                colision = colision + parseInt(item.total);
            }
            else if(item.estatus == 'disponible'){
                disponible = disponible + parseInt(item.total);
            }
            else if(item.estatus == 'perdida total'){
                perdida_total = perdida_total + parseInt(item.total);
            }
            else if(item.estatus == 'robado'){
                robado = robado + parseInt(item.total);
            }
            else if(item.estatus == 'taller'){
                taller = taller + parseInt(item.total);
            }
            else if(item.estatus == 'programado'){
                programado = programado + parseInt(item.total);
            }
            else if(item.estatus == 'tramite vehicular'){
                tramite = tramite + parseInt(item.total);
            }
            else if(item.estatus == 'vendida'){
                vendidos = vendidos + parseInt(item.total);
            }
            totales = asignados + colision + disponible + perdida_total + robado + taller + programado + tramite + vendidos;
        });

        promedio_total = (totales/totales)*100;
        promedio_asignados = (asignados/totales)*100;
        promedio_colision = (colision/totales)*100;
        promedio_disponible = (disponible/totales)*100;
        promedio_perdida_total = (perdida_total/totales)*100;
        promedio_robado = (robado/totales)*100;
        promedio_taller = (taller/totales)*100;
        promedio_programado = (programado/totales)*100;
        promedio_tramite = (tramite/totales)*100;
        promedio_vendidos = (vendidos/totales)*100;
        //$('#recibe').selectpicker('refresh');
        progress_asignados = "<div class='progressgraphic'>"+asignados+"<div role='progressbar' style='width: "+promedio_asignados+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_colision = "<div class='progressgraphic'>"+colision+"<div role='progressbar' style='width: "+promedio_colision+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_disponible = "<div class='progressgraphic'>"+disponible+"<div role='progressbar' style='width: "+promedio_disponible+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_perdida_total = "<div class='progressgraphic'>"+perdida_total+"<div role='progressbar' style='width: "+promedio_perdida_total+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_robado = "<div class='progressgraphic'>"+robado+"<div role='progressbar' style='width: "+promedio_robado+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_taller = "<div class='progressgraphic'>"+taller+"<div role='progressbar' style='width: "+promedio_taller+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_programado = "<div class='progressgraphic'>"+programado+"<div role='progressbar' style='width: "+promedio_programado+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_tramite = "<div class='progressgraphic'>"+tramite+"<div role='progressbar' style='width: "+promedio_tramite+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_vendidos = "<div class='progressgraphic'>"+vendidos+"<div role='progressbar' style='width: "+promedio_vendidos+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";
        progress_total_total = "<div class='progressgraphic'>"+totales+"<div role='progressbar' style='width: "+promedio_total+"%; height: 6px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar bg-blue'></div></div>";

        $('#total_asignados').html(progress_asignados);
        $('#total_colision').html(progress_colision);
        $('#total_disponible').html(progress_disponible);
        $('#total_perdida').html(progress_perdida_total);
        $('#total_robado').html(progress_robado);
        $('#total_taller').html(progress_taller);
        $('#total_programado').html(progress_programado);
        $('#total_tramite').html(progress_tramite);
        $('#total_vendida').html(progress_vendidos);
        $('#total_total').html(progress_total_total);

      },
      error : function(data) {
        console.log(data);
      }
      
    });

  });

});
    
    </script>
    <?php } ?>
<?php
    break;
    case 4:
?>
<?php if($this->session->userdata('id') != 50){ ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
    <div class="work-amount card">
    <div class="card-body">
        <h3>Consumibles Almacén General</h3>
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>CN-CAB-OPT-003 “F.O 48H”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_fibra_optica"><?= $total_global_fibra_optica ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="fibra_optica"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>CN-ETI-AUT-002 “ETIQUETA ESTEVEZ”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_etiqueta"><?= $total_global_etiqueta ?></strong><br><span>Totales</span></div>
                            <canvas id="etiqueta_estevez"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                

                    <div class="card-body">
                        <h3>CN-CIN-PAN-001 “CINCHO”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_cincho ?></strong><br><span>Totales</span></div>
                            <canvas id="cincho"></canvas>
                        </div>
                    </div>
                
            </div>
        </div>
</div>
</div>
    </div>
</section>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
    <div class="work-amount card">
    <div class="card-body">
        <h3>Herramientas Almacén General</h3>
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-FLE-ANC-001 “FLEJADORA”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_fibra_optica"><?= $total_global_flejadora ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="flejadora"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-ESC-FIB-001 “ESCALERA 8.5 mts”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_etiqueta"><?= $total_global_escalera_85 ?></strong><br><span>Totales</span></div>
                            <canvas id="escalera_85"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-ESC-FIB-002 “ESCALERA 7.3” mts</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_escalera_73 ?></strong><br><span>Totales</span></div>
                            <canvas id="escalera_73"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-JUE-DES-010 “DESARMADORES 8pza”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_desarmador_pza ?></strong><br><span>Totales</span></div>
                            <canvas id="desarmadores_pza"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-JUE-DES-011 “DESARMADORES DE CAJA”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_desarmador_caja ?></strong><br><span>Totales</span></div>
                            <canvas id="desarmadores_caja"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-INV-COR-002 “INVERSOR 750W”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_inversor ?></strong><br><span>Totales</span></div>
                            <canvas id="inversor"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-PIN-ELE-001 “PINZA ELECTRICISTA”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_pinza_electricista ?></strong><br><span>Totales</span></div>
                            <canvas id="pinza_electricista"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-PIN-COR-003 “PINZA CORTE DIAGONAL”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_pinza_corte ?></strong><br><span>Totales</span></div>
                            <canvas id="pinza_corte"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>HR-PIN-PUN-002 “PINZA DE PUNTA”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_cincho"><?= $total_global_pinza_punta ?></strong><br><span>Totales</span></div>
                            <canvas id="pinza_punta"></canvas>
                        </div>
                    </div>                
            </div>
</div>
</div>
        </div>
    </div>
</section>
<section class="client">
    <div class="container-fluid">
    <div class="work-amount card">
    <div class="card-body">
        <h3>Equipo de Protección Personal</h3>
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">

                    <div class="card-body">
                        <h3>EP-CAS-BLA-001 “CASCO BLANCO”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_casco_blanco ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="casco_blanco"></canvas>
                        </div>
                    </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                    <div class="card-body">
                        <h3>EP-CAS-AMA-001 “CASCO AMARILLO”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_casco_amarillo ?></strong><br><span>Totales</span></div>
                            <canvas id="casco_amarillo"></canvas>
                        </div>
                    </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>EP-CAS-NAR-001 “CASCO NARANJA”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_casco_naranja ?></strong><br><span>Totales</span></div>
                            <canvas id="casco_naranja"></canvas>
                        </div>
                    </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">

                    <div class="card-body">
                        <h3>EP-CHA-EST-002 “CHALECO ESTEVEZ”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_chaleco_seguridad ?></strong><br><span>Totales</span></div>
                            <canvas id="chaleco_seguridad"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>EP-LEN-SEG-003 “LENTE DE SEGURIDAD”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_lente_seguridad ?></strong><br><span>Totales</span></div>
                            <canvas id="lente_seguridad"></canvas>
                        </div>
                    </div>                
            </div>

             <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>EP-GUA-PIE-001 “GUANTES DE SEGURIDAD”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_guante_de_piel ?></strong><br><span>Totales</span></div>
                            <canvas id="guante_de_piel"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>EP-BAR-SME-001 “BARBOQUEJO”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_barbiquejo ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="barbiquejo"></canvas>
                        </div>
                    </div>
            </div>
        </div>
</div>
</div>
    </div>
</section>
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="col-12">
                <div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 8px;">
                <h3 style="padding: 15px 5px;">Mínimos y máximos Almacen General</h3>
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda" name="busqueda">
                    </div>
                </div>
            </div>
            <div class="chart col-12">
                <div class="line-chart bg-white d-fle
                x align-items-center justify-content-center has-shadow">
                    <canvas width="1100" height="500" id="lineChart"></canvas>
                </div>
            </div>
            <div class="col-12">
                <div id="pagination_lineChart" class="bg-white has-shadow" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <h3 style="padding: 15px 5px;">Mínimos y máximos EPP</h3>
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda3" name="busqueda">
                    </div>
                </div>
                <div class="bg-white">
                    <canvas width="1100" height="480" id="lineChart4"></canvas>
                </div>
                <div id="pagination_lineChart4" class="bg-white" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <h3 style="padding: 15px 5px;">Mínimos y máximos refacciones</h3>
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda2" name="busqueda">
                    </div>
                </div>
                <div class="bg-white">
                    <canvas width="1100" height="480" id="lineChart3"></canvas>
                </div>
                <div id="pagination_lineChart3" class="bg-white" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="col-12">
                <div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 8px;">
                    <div class="float-right">
                        <select id="estatus" name="estatus" class="form-control" value="almacen">
                            <option value="almacen">Almacen</option>
                            <option value="dañado">Dañado</option>
                            <option value="robado">Robado</option>
                            <option value="justificacion">Justificación</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="chart col-12">
                <div class="line-chart bg-white d-fle
                x align-items-center justify-content-center has-shadow">
                    <canvas width="1100" height="504" id="lineChart2"></canvas>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
        var LINECHART = $('#lineChart');
        var myLineChart = new Chart(LINECHART, {
            type: 'horizontalBar',
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,

                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        categoryPercentage: 1.0,
                        barPercentage: 0.5
                    }]
                },
                legend: {
                    display: true
                }
            },
            data: {
                labels: [],
                datasets: [{
                        label: "Stock mínimo",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#f15765",
                        borderColor: '#f15765',
                        pointBorderColor: '#da4c59',
                        pointHoverBackgroundColor: '#da4c59',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 0,
                        data: [],
                        spanGaps: false
                    },
                    {
                        label: "Existencias",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#54e69d",
                        borderColor: "#54e69d",
                        pointHoverBackgroundColor: "#44c384",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "#44c384",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                ]
            }
        });

        <?php
    if (isset($estatus_casco_amarillo)) {
    echo "var array_labels_casco_amarillo = ". json_encode($estatus_casco_amarillo ). ";\n";
    echo "var array_total_casco_amarillo = ".json_encode($total_casco_amarillo) . ";\n";
    
    ?>

        var PIECHART = $('#casco_amarillo');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_amarillo,
                datasets: [{
                    data: array_total_casco_amarillo,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_casco_blanco)) {
    echo "var array_labels_casco_blanco = ". json_encode($estatus_casco_blanco ). ";\n";
    echo "var array_total_casco_blanco = ".json_encode($total_casco_blanco) . ";\n";
    
    ?>

        var PIECHART = $('#casco_blanco');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_blanco,
                datasets: [{
                    data: array_total_casco_blanco,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_casco_naranja)) {
    echo "var array_labels_casco_naranja = ". json_encode($estatus_casco_naranja ). ";\n";
    echo "var array_total_casco_naranja = ".json_encode($total_casco_naranja) . ";\n";
    
    ?>

        var PIECHART = $('#casco_naranja');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_naranja,
                datasets: [{
                    data: array_total_casco_naranja,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_lente_seguridad)) {
    echo "var array_labels_lente_seguridad = ". json_encode($estatus_lente_seguridad ). ";\n";
    echo "var array_total_lente_seguridad = ".json_encode($total_lente_seguridad) . ";\n";
    
    ?>

        var PIECHART = $('#lente_seguridad');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_lente_seguridad,
                datasets: [{
                    data: array_total_lente_seguridad,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_chaleco_seguridad)) {
    echo "var array_labels_chaleco_seguridad = ". json_encode($estatus_chaleco_seguridad ). ";\n";
    echo "var array_total_chaleco_seguridad = ".json_encode($total_chaleco_seguridad) . ";\n";
    
    ?>

        var PIECHART = $('#chaleco_seguridad');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_chaleco_seguridad,
                datasets: [{
                    data: array_total_chaleco_seguridad,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    /*   ------------------------------------------------------------------           */

    if (isset($estatus_guante_de_piel)) {
    echo "var array_labels_guante_de_piel = ". json_encode($estatus_guante_de_piel). ";\n";
    echo "var array_total_guante_de_piel = ".json_encode($total_guante_de_piel) . ";\n";
    
    ?>

        var PIECHART = $('#guante_de_piel');
        var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_guante_de_piel,
                datasets: [{
                    data: array_total_guante_de_piel,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });
        <?php } ?>


        <?php
    if (isset($estatus_impermeable_chico)) {
    echo "var array_labels_impermeable_chico = ". json_encode($estatus_impermeable_chico ). ";\n";
    echo "var array_total_impermeable_chico = ".json_encode($total_impermeable_chico) . ";\n";
    
    ?>

        var PIECHART = $('#impermeable_chico');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_impermeable_chico,
                datasets: [{
                    data: array_total_impermeable_chico,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_impermeable_grande)) {
    echo "var array_labels_impermeable_grande = ". json_encode($estatus_impermeable_grande ). ";\n";
    echo "var array_total_impermeable_grande = ".json_encode($total_impermeable_grande) . ";\n";
    
    ?>

        var PIECHART = $('#impermeable_grande');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_impermeable_grande,
                datasets: [{
                    data: array_total_impermeable_grande,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_impermeable_extra_grande)) {
    echo "var array_labels_impermeable_extra_grande = ". json_encode($estatus_impermeable_extra_grande ). ";\n";
    echo "var array_total_impermeable_extra_grande = ".json_encode($total_impermeable_extra_grande) . ";\n";
    
    ?>

        var PIECHART = $('#impermeable_extra_grande');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_impermeable_extra_grande,
                datasets: [{
                    data: array_total_impermeable_extra_grande,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_poncho_impermeable)) {
    echo "var array_labels_poncho_impermeable = ". json_encode($estatus_poncho_impermeable ). ";\n";
    echo "var array_total_poncho_impermeable = ".json_encode($total_poncho_impermeable) . ";\n";
    
    ?>

        var PIECHART = $('#poncho_impermeable');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_poncho_impermeable,
                datasets: [{
                    data: array_total_poncho_impermeable,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_protector_auditivo)) {
    echo "var array_labels_protector_auditivo = ". json_encode($estatus_protector_auditivo ). ";\n";
    echo "var array_total_protector_auditivo = ".json_encode($total_protector_auditivo) . ";\n";
    
    ?>

        var PIECHART = $('#protector_auditivo');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_protector_auditivo,
                datasets: [{
                    data: array_total_protector_auditivo,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_poliester)) {
    echo "var array_labels_poliester = ". json_encode($estatus_poliester ). ";\n";
    echo "var array_total_poliester = ".json_encode($total_poliester) . ";\n";
    
    ?>

        var PIECHART = $('#poliester');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_poliester,
                datasets: [{
                    data: array_total_poliester,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    
    if (isset($estatus_chaleco_tipo_casaca)) {
    echo "var array_labels_chaleco_tipo_casaca = ". json_encode($estatus_chaleco_tipo_casaca ). ";\n";
    echo "var array_total_chaleco_tipo_casaca = ".json_encode($total_chaleco_tipo_casaca) . ";\n";
    
    ?>

        var PIECHART = $('#chaleco_tipo_casaca');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_chaleco_tipo_casaca,
                datasets: [{
                    data: array_total_chaleco_tipo_casaca,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_barbiquejo)) {
    echo "var array_labels_barbiquejo = ". json_encode($estatus_barbiquejo ). ";\n";
    echo "var array_total_barbiquejo = ".json_encode($total_barbiquejo) . ";\n";
    
    ?>

        var PIECHART = $('#barbiquejo');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_barbiquejo,
                datasets: [{
                    data: array_total_barbiquejo,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_lente_confort)) {
    echo "var array_labels_lente_confort = ". json_encode($estatus_lente_confort ). ";\n";
    echo "var array_total_lente_confort = ".json_encode($total_lente_confort) . ";\n";
    
    ?>

        var PIECHART = $('#lente_confort');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_lente_confort,
                datasets: [{
                    data: array_total_lente_confort,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    ?>

    <?php
        if (isset($estatus_flejadora)) {
            echo "var array_labels_flejadora = ". json_encode($estatus_flejadora ). ";\n";
            echo "var array_total_flejadora = ".json_encode($total_flejadora) . ";\n";
            
    ?>

        var PIECHART = $('#flejadora');
        var myPieChart20 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_flejadora,
                datasets: [{
                    data: array_total_flejadora,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_escalera_85)) {
            echo "var array_labels_escalera_85 = ". json_encode($estatus_escalera_85 ). ";\n";
            echo "var array_total_escalera_85 = ".json_encode($total_escalera_85) . ";\n";
            
    ?>

        var PIECHART = $('#escalera_85');
        var myPieChart21 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_escalera_85,
                datasets: [{
                    data: array_total_escalera_85,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_escalera_73)) {
            echo "var array_labels_escalera_73 = ". json_encode($estatus_escalera_73 ). ";\n";
            echo "var array_total_escalera_73 = ".json_encode($total_escalera_73) . ";\n";
            
    ?>

        var PIECHART = $('#escalera_73');
        var myPieChart22 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_escalera_73,
                datasets: [{
                    data: array_total_escalera_73,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_desarmador_pza)) {
            echo "var array_labels_desarmador_pza = ". json_encode($estatus_desarmador_pza ). ";\n";
            echo "var array_total_desarmador_pza = ".json_encode($total_desarmador_pza) . ";\n";
            
    ?>

        var PIECHART = $('#desarmadores_pza');
        var myPieChart23 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_desarmador_pza,
                datasets: [{
                    data: array_total_desarmador_pza,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_desarmador_caja)) {
            echo "var array_labels_desarmador_caja = ". json_encode($estatus_desarmador_caja ). ";\n";
            echo "var array_total_desarmador_caja = ".json_encode($total_desarmador_caja) . ";\n";
            
    ?>

        var PIECHART = $('#desarmadores_caja');
        var myPieChart24 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_desarmador_caja,
                datasets: [{
                    data: array_total_desarmador_caja,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_inversor)) {
            echo "var array_labels_inversor = ". json_encode($estatus_inversor ). ";\n";
            echo "var array_total_inversor = ".json_encode($total_inversor) . ";\n";
            
    ?>

        var PIECHART = $('#inversor');
        var myPieChart25 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_inversor,
                datasets: [{
                    data: array_total_inversor,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_pinza_electricista)) {
            echo "var array_labels_pinza_electricista = ". json_encode($estatus_pinza_electricista ). ";\n";
            echo "var array_total_pinza_electricista = ".json_encode($total_pinza_electricista) . ";\n";
            
    ?>

        var PIECHART = $('#pinza_electricista');
        var myPieChart26 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_pinza_electricista,
                datasets: [{
                    data: array_total_pinza_electricista,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_pinza_corte)) {
            echo "var array_labels_pinza_corte = ". json_encode($estatus_pinza_corte ). ";\n";
            echo "var array_total_pinza_corte= ".json_encode($total_pinza_corte) . ";\n";
            
    ?>

        var PIECHART = $('#pinza_corte');
        var myPieChart27 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_pinza_corte,
                datasets: [{
                    data: array_total_pinza_corte,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

    <?php
        if (isset($estatus_pinza_punta)) {
            echo "var array_labels_pinza_punta = ". json_encode($estatus_pinza_punta ). ";\n";
            echo "var array_total_pinza_punta= ".json_encode($total_pinza_punta) . ";\n";
            
    ?>

        var PIECHART = $('#pinza_punta');
        var myPieChart28 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_pinza_punta,
                datasets: [{
                    data: array_total_pinza_punta,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


    <?php
        }
    ?>

        function graficar_consumibles(offset){
            $.ajax({
                url: "<?= base_url()?>almacen/getCatalogoExistencias",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChart.data.labels = productos;
                    myLineChart.data.datasets[0].data = minimos;
                    myLineChart.data.datasets[1].data = maximos;
                    myLineChart.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item " + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_consumibles(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficar_consumibles(0);
        $("#busqueda").on("keyup",function(){
            graficar_consumibles(0);
        });

        var LINECHART2 = $("#lineChart2");
        var myLineChart2 = new Chart(LINECHART2, {
                type: 'bar',
                stack: '',
                data: {
                    label: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: 'dataset'
                    }
                }
        });

        function costos_almacen_por_categoria(){
            $.ajax({
                url: "<?= base_url()?>almacen/getCostoAlmacenPorCategoria",
                type: "POST",
                data:{
                    estatus: $("#estatus").val()
                },
                dataType: "json",
                success: function(result) {
                    var backgroundColor = ['#55e6a0', '#71d1f2', '#f2993e'];
                    var hoverBackgroundColor = ['#55e6a0', '#71d1f2', '#f2993e'];
                    var labels = [];
                    var categorias = [];
                    var index = 0;
                    for(var r=0; r<result.length; r++){
                        labels.push(result[r].categoria);
                        categorias.push({label:result[r].categoria, data:[parseFloat(result[r].total).toFixed(2)], borderWidth: [0, 0, 0, 0], backgroundColor: backgroundColor[index], hoverBackgroundColor: hoverBackgroundColor[index]});
                        if(index != 0 && index%2 == 0){
                            index = 0;
                        }else{
                            index++;
                        }
                    }
                    console.log(categorias);
                    myLineChart2.data.datasets = categorias;
                    myLineChart2.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        costos_almacen_por_categoria();

        $("#estatus").on("change",function(){
            costos_almacen_por_categoria();
        });
        var legendStateR = true;
            if ($(window).outerWidth() < 576) {
                legendStateR = false;
            }
        var LINECHART3 = $('#lineChart3');
            myLineChartServices3 = new Chart(LINECHART3, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendStateR
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });

        function graficar_refacciones_control_vehicular(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_control_vehicular_refacciones",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda2").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices3.data.labels = productos;
                    myLineChartServices3.data.datasets[0].data = minimos;
                    myLineChartServices3.data.datasets[1].data = maximos;
                    myLineChartServices3.update();
                    
                    var pagination = $("#pagination_lineChart3 ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_refacciones_control_vehicular(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }


        graficar_refacciones_control_vehicular(0);
        $("#busqueda2").on("keyup",function(){
            graficar_refacciones_control_vehicular(0);
        });


        var legendState = true;
            if ($(window).outerWidth() < 576) {
                legendState = false;
            }
        var LINECHART4 = $('#lineChart4');
            myLineChartServices = new Chart(LINECHART4, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });

        function graficar_equipo_proteccion(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_equipo_proteccion",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda3").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices.data.labels = productos;
                    myLineChartServices.data.datasets[0].data = minimos;
                    myLineChartServices.data.datasets[1].data = maximos;
                    myLineChartServices.update();
                    
                    var pagination = $("#pagination_lineChart4 ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_equipo_proteccion(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }


        graficar_equipo_proteccion(0);
        $("#busqueda3").on("keyup",function(){
            graficar_equipo_proteccion(0);
        });
        <?php
    if (isset($estatus_fibra_optica)) {
        echo "var array_labels_fibra_optica = ". json_encode($estatus_fibra_optica). ";\n";
        echo "var array_total_fibra_optica = ".json_encode($total_fibra_optica) . ";\n"; ?>
        console.log('fb', array_total_fibra_optica);
        var PIECHART10 = $('#fibra_optica');
        var myPieChart10 = new Chart(PIECHART10, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_fibra_optica,
                datasets: [{
                    data: array_total_fibra_optica,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });

        <?php
    } ?>

<?php
    if (isset($estatus_etiqueta)) {
        echo "var array_labels_etiqueta = ". json_encode($estatus_etiqueta). ";\n";
        echo "var array_total_etiqueta = ".json_encode($total_etiqueta) . ";\n"; ?>        
        var PIECHART11 = $('#etiqueta_estevez');
        var myPieChart11 = new Chart(PIECHART11, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_etiqueta,
                datasets: [{
                    data: array_total_etiqueta,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });

        <?php
    } ?>

<?php
    if (isset($estatus_cincho)) {
        echo "var array_labels_cincho = ". json_encode($estatus_cincho). ";\n";
        echo "var array_total_cincho = ".json_encode($total_cincho) . ";\n"; ?>  
        console.log('cincho',array_labels_cincho);
        var PIECHART12 = $('#cincho');
        var myPieChart12 = new Chart(PIECHART12, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_cincho,
                datasets: [{
                    data: array_total_cincho,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });

        <?php
    } ?>
    
    });
</script>
<?php }else{ ?>
    <!-- Client Section-->
<section class="client">
    <div class="container-fluid">
    <div class="work-amount card">
    <div class="card-body">
        <h3>Consumibles Almacén General</h3>
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>AD-OFI-SIS-007 “Sistema Mesh”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_sistema_mesh"><?= $total_global_sistema_mesh ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="sistema_mesh"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">                

                    <div class="card-body">
                        <h3>CN-ONT-ISC-001 “ONT ISCOM”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong id="total_global_ont_iscom"><?= $total_global_ont_iscom ?></strong><br><span>Totales</span></div>
                            <canvas id="ont_iscom"></canvas>
                        </div>
                    </div>                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                

                    <div class="card-body">
                        <h3>CN-REP-STR-001 “Roku”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_roku"><?= $total_global_roku ?></strong><br><span>Totales</span></div>
                            <canvas id="roku"></canvas>
                        </div>
                    </div>
                
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                

                    <div class="card-body">
                        <h3>CN-VEC-MAX-001 “Vector Max”</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong id="total_global_vector_max"><?= $total_global_vector_max ?></strong><br><span>Totales</span></div>
                            <canvas id="vector_max"></canvas>
                        </div>
                    </div>
                
            </div>
        </div>
</div>
</div>
    </div>
</section>



<script>
    $(document).ready(function(){
        

        <?php
    if (isset($estatus_sistema_mesh)) {
    echo "var array_labels_sistema_mesh = ". json_encode($estatus_sistema_mesh ). ";\n";
    echo "var array_total_sistema_mesh = ".json_encode($total_sistema_mesh) . ";\n";
    
    ?>

        var PIECHART = $('#sistema_mesh');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_sistema_mesh,
                datasets: [{
                    data: array_total_sistema_mesh,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_ont_iscom)) {
    echo "var array_labels_ont_iscom = ". json_encode($estatus_ont_iscom ). ";\n";
    echo "var array_total_ont_iscom = ".json_encode($total_ont_iscom) . ";\n";
    
    ?>

        var PIECHART = $('#ont_iscom');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_ont_iscom,
                datasets: [{
                    data: array_total_ont_iscom,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_roku)) {
    echo "var array_labels_roku = ". json_encode($estatus_roku ). ";\n";
    echo "var array_total_roku = ".json_encode($total_roku) . ";\n";
    
    ?>

        var PIECHART = $('#roku');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_roku,
                datasets: [{
                    data: array_total_roku,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_vector_max)) {
    echo "var array_labels_vector_max = ". json_encode($estatus_vector_max ). ";\n";
    echo "var array_total_vector_max = ".json_encode($total_vector_max) . ";\n";
    
    ?>

        var PIECHART = $('#vector_max');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_vector_max,
                datasets: [{
                    data: array_total_vector_max,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php } ?>

     


    });
</script>
<?php } ?>
<?php
    break;

    case 5:
    ?>
<section class="dashboard-counts no-padding-bottom personal_dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="bg-white has-shadow col-xl-6 col-sm-6">
                <div class="row">
                <!-- Item -->
                <div class="col-xl-12 col-sm-12">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-violet"><i class="icon-user"></i></div>
                        <div class="title"><span>Total Contrataciones</span>
                        </div>
                        <div class="number"><strong><?= $totalContrataciones ?></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-6 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-green"><i class="icon-user"></i></div>
                        <div class="title"><span>Total Contrataciones Activas</span>
                        </div>
                        <div class="number"><strong><?= $totalContratacionesActivas ?></strong></div>
                    </div>
                </div>
                <!-- Item -->
                <div class="col-xl-6 col-sm-6">
                    <div class="item d-flex align-items-center">
                        <div class="icon bg-red"><i class="icon-user"></i></div>
                        <div class="title"><span>Total Contrataciones Inactivas</span>
                        </div>
                        <div class="number"><strong><?= $totalSalidas ?></strong></div>
                    </div>
                </div>
                </div>
            </div>
            <div class="bg-white has-shadow col-xl-6 col-sm-6">
                <div class="row">
                    <!-- Item -->
                    <div class="col-xl-12 col-sm-12">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-violet"><i class="icon-user"></i></div>
                            <div class="title"><span>Personal Activo</span>
                            </div>
                            <div class="number"><strong><?= $totalContratacionesActivas ?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-6 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-green"><i class="icon-user"></i></div>
                            <div class="title"><span>Personal Semanal</span>
                            </div>
                            <div class="number"><strong><?= $personal_semanal ?></strong></div>
                        </div>
                    </div>
                    <!-- Item -->
                    <div class="col-xl-6 col-sm-6">
                        <div class="item d-flex align-items-center">
                            <div class="icon bg-red"><i class="icon-user"></i></div>
                            <div class="title"><span>Personal Quincenal</span>
                            </div>
                            <div class="number"><strong><?= $personal_quncena ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="dashboard-counts no-padding-bottom personal_dashboard">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>Edad Promedio</span></div>
                    <div class="number"><strong><?= number_format($edadPromedio, 2) ?></strong></div>
                </div>
            </div>
            <!-- Item -->
            <div class="col-xl-6 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-violet"><i class="icon-user"></i></div>
                <div class="title"><span>Duración Promedio en la Compañia</span>
                </div>
                <div class="number"><strong><?= number_format($duracionPromedio, 2) ?></strong></div>
              </div>
            </div>
          </div>
    </div>
</section>
<!--<section class="dashboard-counts no-padding-bottom personal_dashboard">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <div class="col-xl-6 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-green"><i class="icon-user"></i></div>
                <div class="title"><span>Inversión Mensual (Bruto)</span>
                </div>
                <div class="number"><strong><?= $sueldoBrutoPorMes ?></strong></div>
              </div>
            </div>
            <div class="col-xl-6 col-sm-6">
              <div class="item d-flex align-items-center">
                <div class="icon bg-green"><i class="icon-user"></i></div>
                <div class="title"><span>Inversión Mensual (Neto)</span>
                </div>
                <div class="number"><strong><?= $sueldosNetoPorMes ?></strong></div>
              </div>
            </div>
          </div>
    </div>
</section>-->
<!-- Dashboard Header Section    -->
<section class="dashboard-header dashboard-counts personal_dashboard">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Statistics -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">

                    <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
                    <div class="title"><a href="<?= base_url() ?>personal/contratos-vencidos">Contratos Vencidos</a></div>
                    <div class="number"><strong><?= $contratos_vencidos ?></strong></div>
                </div>

            </div>

            <!-- Statistics -->
            <div class="col-xl-6 col-sm-6">
                <div class="item d-flex align-items-center">

                    <div class="icon bg-orange"><i class="fa fa-tasks"></i></div>
                    <div class="title"><a href="<?= base_url() ?>personal/contratos-vencidos">Contratos a vencer en los próximos 15 días</a>
                    </div>
                    <div class="number">
                        <strong><?= $contratos_proximos_a_vencer ?></strong>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<div>
    <div class="container-fluid">
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-5 col-lg-5">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empleados por Genero</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $totalContratacionesActivas ?></strong><br><span>Totales</span></div>
                            <canvas id="empleados_genero"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Work Amount  -->
            <div class="col-xl-5 col-lg-5">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Fuente Empleos</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $totalFuenteEmpleos ?></strong><br><span>Total Empleados</span></div>
                            <canvas id="fuente_empleos"></canvas>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
</div>
<section class="client personal_dashboard">
        <!-- Work Amount  -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empleados por rango de edad</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <canvas id="empeleados_rango_edad"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Work Amount  -->
            <!--<div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Inversión Mensual (Bruto)</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <canvas id="sueldo_bruto_departamento"></canvas>
                        </div>
                    </div>
                </div>
            </div>-->
        <!-- Work Amount  -->
            <!--<div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Inversión Mensual (Neto)</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <canvas id="sueldo_neto_departamento"></canvas>
                        </div>
                    </div>
                </div>
            </div>-->

        <!-- Work Amount  -->
        <div class="col-xl-12 col-lg-12">
          <div class="work-amount card">

            <div class="card-body">
              <h3>Contrataciones por año</h3><small>Estatus actual</small>
              <div class="chart text-center">
                <canvas id="contrataciones_anios"></canvas>
              </div>
            </div>
        </div>
        </div>
            <!-- Work Amount  -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empleados por patrón</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <canvas id="empleados_ubicacion"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Work Amount  -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empleados por patrón y departamento</h3><small>Estatus actual</small>
                        <div class="text-right">
                            <select id="selectorEmpresas" style="width:100%; max-width: 300px;" onchange="obtener_empleados_ubicacion_departamento(this)">
                                <?php foreach ($empresas as $value) { ?>
                                <option value="<?= $value->idtbl_empresas ?>"><?= $value->empresa ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="chart text-center">
                            <canvas id="empleados_ubicacion_departamento"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Work Amount  -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Empleados por establecimiento</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <canvas id="empleados_establecimiento"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Work Amount  -->
        <div class="col-xl-12 col-lg-12">
          <div class="work-amount card">
            <div class="card-body">
              <div class="row">
                  <div class="col-6">
                      <div class="form-group">
                          <label for="anio">Año</label>
                          <select name="anio_actual" class="form-control selector_anio" onchange="obtener_contrataciones_salidas_anio_mes()">
                          </select>
                      </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                      <label for="anio">Año Comparación</label>
                      <select name="anio_anterior" class="form-control selector_anio" onchange="obtener_contrataciones_salidas_anio_mes()">
                      </select>
                  </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label for="departamento">Departamento</label>
                        <select name="departamento" class="form-control selector_departamento" onchange="obtener_contrataciones_salidas_anio_mes()">
                            <option value="">Todos</option>
                            <?php foreach ($departamentos as $value) {?>
                                <option value="<?= $value->idtbl_departamentos ?>"><?= $value->departamento ?></option> 
                            <?php } ?>
                        </select>
                    </div>                      
                  </div>
              </div>
              <h3>Grafico Mensual</h3><small>Estatus actual</small>
              <div class="row">
                  <div class="col-md-3 indicador_grafica" >
                      <div class="indicador">
                          <div>Empleados Activos</div>
                          <div id="total_empleados_activos"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="empleados_anio_mes"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica" >
                      <div class="indicador">
                          <div>Contrataciones</div>
                          <div id="total_contrataciones"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="contrataciones_anio_mes"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica">
                      <div class="indicador">
                          <div>Salidas</div>
                          <div id="total_salidas"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="salidas_anio_mes"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica">
                      <div class="indicador">
                          <div>Porcentaje Rentención</div>
                          <div id="porcentaje_total_contrataciones"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="porcentaje_contrataciones_anio_mes"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica">
                      <div class="indicador">
                          <div>Porcentaje Salidas</div>
                          <div id="porcentaje_total_salidas"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="porcentaje_salidas_anio_mes"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica">
                      <div class="indicador">
                          <div>Media IRP</div>
                          <div id="irp_total"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="irp"></canvas>
                      </div>
                  </div>
                  <div class="col-md-3 indicador_grafica">
                      <div class="indicador">
                          <div>IRP ANUAL</div>
                          <div id="irp_total_anio"></div>
                      </div>
                  </div>
                  <div class="col-md-9">
                      <div class="chart text-center">
                        <canvas id="irp_anio"></canvas>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
       </div>
    </div>
</section>
<script type="text/javascript">

            var array_labels_empleados_genero = ["Femenino", "Maculino"];
            <?php
                echo "var array_total_empleados_genero = ".json_encode($empleadosPorGenero) . ";\n";
            ?>
            var PIECHART = $('#empleados_genero');
            var myPieChart1 = new Chart(PIECHART, {
                type: 'doughnut',
                options: {
                    cutoutPercentage: 80,
                    legend: {
                        display: false
                    }
                },
                data: {
                    labels: array_labels_empleados_genero,
                    datasets: [{
                        data: array_total_empleados_genero,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: [
                            '#55e6a0',
                            "#f4e150",
                            "#71d1f2",
                            "#ff0000"

                        ],
                        hoverBackgroundColor: [
                            '#55e6a0',
                            "#f4e150",
                            "#71d1f2",
                            "#ff0000"

                        ]
                    }]
                }
            });

            <?php
                echo "var array_fuente_empleos = ".json_encode($fuenteEmpleos) . ";\n";
            ?>

            var array_labels_fuente_empleos = [];
            var array_total_fuente_empleos = [];

            for(var r=0; r<array_fuente_empleos.length; r++){
                array_labels_fuente_empleos.push(array_fuente_empleos[r].descripcion);
                array_total_fuente_empleos.push(array_fuente_empleos[r].total);
            }

            var PIECHART8 = $('#fuente_empleos');
            var myPieChart8 = new Chart(PIECHART8, {
                type: 'doughnut',
                options: {
                    cutoutPercentage: 80,
                    legend: {
                        display: false
                    }
                },
                data: {
                    labels: array_labels_fuente_empleos,
                    datasets: [{
                        data: array_total_fuente_empleos,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: [
                            '#55e6a0',
                            "#f4e150",
                            "#71d1f2",
                            "#ff0000",
                            '#55e6a0',
                            "#f4e150",
                            "#71d1f2",
                            "#ff0000"
                        ],
                        hoverBackgroundColor: [
                            '#55e6a0',
                            "#f4e150",
                            "#71d1f2",
                            "#ff0000"

                        ]
                    }]
                }
            });

            <?php
                echo "var empleados_rango_edad = ".json_encode($edadPorRangos) . ";\n";
            ?>

            var BARCHART5 = $('#empeleados_rango_edad');
            var myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["<30", "30-40", "50+"],
                    datasets: [{
                            label: "Femenino",
                            data: empleados_rango_edad.femenino,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: '#55e6a0',
                            hoverBackgroundColor: '#55e6a0'
                        },{
                            label: "Masculino",
                            data: empleados_rango_edad.masculino,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: "#71d1f2",
                            hoverBackgroundColor: "#71d1f2"
                        }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: { display: true }
                }
            });

            <?php
                echo "var sueldoBrutoMesDepartamento = ".json_encode($sueldoBrutoMesDepartamento) . ";\n";
            ?>

            var array_labels_sueldo_bruto_departamento = [];
            var array_total_sueldo_bruto_departamento = [];
            for(var r=0; r<sueldoBrutoMesDepartamento.length; r++){
                array_labels_sueldo_bruto_departamento.push(sueldoBrutoMesDepartamento[r].departamento);
                array_total_sueldo_bruto_departamento.push(parseFloat(sueldoBrutoMesDepartamento[r].total).toFixed(2));
            }
            var BARCHART6 = $('#sueldo_bruto_departamento');
            var myBarChart6 = new Chart(BARCHART6, {
                type: 'horizontalBar',
                stack: '',
                data: {
                    labels: array_labels_sueldo_bruto_departamento,
                    datasets: [{
                            data: array_total_sueldo_bruto_departamento,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: '#55e6a0',
                            hoverBackgroundColor: '#55e6a0'
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });

            <?php
                echo "var sueldoNetoMesDepartamento = ".json_encode($sueldoNetoMesDepartamento) . ";\n";
            ?>

            var array_labels_sueldo_neto_departamento = [];
            var array_total_sueldo_neto_departamento = [];
            for(var r=0; r<sueldoNetoMesDepartamento.length; r++){
                array_labels_sueldo_neto_departamento.push(sueldoNetoMesDepartamento[r].departamento);
                array_total_sueldo_neto_departamento.push(parseFloat(sueldoNetoMesDepartamento[r].total).toFixed(2));
            }
            var BARCHART7 = $('#sueldo_neto_departamento');
            var myBarChart7 = new Chart(BARCHART7, {
                type: 'horizontalBar',
                stack: '',
                data: {
                    labels: array_labels_sueldo_neto_departamento,
                    datasets: [{
                            data: array_total_sueldo_neto_departamento,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: '#55e6a0',
                            hoverBackgroundColor: '#55e6a0'
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });

            <?php
                echo "var contrataciones_anios = ".json_encode($contratacionesPorAnio) . ";\n";
            ?>
            var array_labels_contrataciones_anios = [];
            var array_total_contrataciones_anios = [];
            for(var r=0; r<contrataciones_anios.length; r++){
                array_labels_contrataciones_anios.push(contrataciones_anios[r].anio);
                array_total_contrataciones_anios.push(contrataciones_anios[r].total);
            }
            var BARCHART2 = $('#contrataciones_anios');
            var myBarChart2 = new Chart(BARCHART2, {
                type: 'horizontalBar',
                stack: '',
                data: {
                    labels: array_labels_contrataciones_anios,
                    datasets: [{
                            data: array_total_contrataciones_anios,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });

            <?php
                echo "var empleados_ubucacion = ".json_encode($empleadosPorUbicacion) . ";\n";
            ?>

            var array_labels_empleados_ubucacion = [];
            var array_total_empleados_ubucacion = [];
            for(var r=0; r<empleados_ubucacion.length; r++){
                array_labels_empleados_ubucacion.push(empleados_ubucacion[r].empresa);
                array_total_empleados_ubucacion.push(empleados_ubucacion[r].total);
            }
            var BARCHART = $('#empleados_ubicacion');
            var myBarChart1 = new Chart(BARCHART, {
                type: 'horizontalBar',
                stack: '',
                data: {
                    labels: array_labels_empleados_ubucacion,
                    datasets: [{
                            data: array_total_empleados_ubucacion,
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });

        var selector_anio = $(".selector_anio");
        var anio_actual_selector = new Date().getFullYear();
        for(var r=2013; r<=anio_actual_selector; r++){
            selector_anio.append("<option value='" + r +  "'>" + r + "</option>")
        }
        $('.selector_anio[name="anio_actual"]').val(anio_actual_selector);
        $('.selector_anio[name="anio_anterior"]').val(anio_actual_selector-1);

        <?php
            echo "var total_empleados_activos_actual = " . $totalEmpleadosPorAnioActual . ";\n";
            echo "var total_empleados_activos_anterior = " . $totalEmpleadosPorAnioAnterior . ";\n";
            echo "var contrataciones_anios_mes = ".json_encode($contratacionesPorAnioMes) . ";\n";
            echo "var personal_activo_por_anio_mes = ".json_encode($personalActivoPorAnioMes).";\n";
        ?>
        /* ***** Grafica Empeleados Activos ***** */
        var array_total_empleados_activos_actual = [];
        var array_total_empleados_activos_anterior = [];

        /* ***** Graficas Contrataciones ***** */
        var myBarChart3;
        var array_total_contrataciones_actual_anios_mes = [];
        var array_total_contrataciones_anterior_anios_mes = [];
        graficar_contrataciones_anios_mes(); 
        function graficar_contrataciones_anios_mes(){
            var meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
            var total_contrataciones = 0;
            var indexMesActual = 0;
            var indexMesAnterior = 0;
            for(var r=1; r<=12; r++){
                var index = r-1;
                if(contrataciones_anios_mes.actual_anio[indexMesActual] != undefined &&contrataciones_anios_mes.actual_anio[indexMesActual].mes == r){
                    array_total_contrataciones_actual_anios_mes[index] = parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                    total_contrataciones += parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                    array_total_empleados_activos_actual[index] = personal_activo_por_anio_mes.actual_anio[index] - parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                    indexMesActual++;
                }else{
                    array_total_contrataciones_actual_anios_mes[index] = 0;
                    if(personal_activo_por_anio_mes.actual_anio[indexMesActual] != undefined){
                        array_total_empleados_activos_actual[index] = personal_activo_por_anio_mes.actual_anio[index];
                        //indexMesActual++;
                    }else{
                        array_total_empleados_activos_actual[index] = 0;
                    }
                }
                if(contrataciones_anios_mes.anterior_anio[indexMesAnterior] != undefined &&contrataciones_anios_mes.anterior_anio[indexMesAnterior].mes == r){
                    array_total_contrataciones_anterior_anios_mes[index] = parseInt(contrataciones_anios_mes.anterior_anio[indexMesAnterior].total);
                    array_total_empleados_activos_anterior[index] = personal_activo_por_anio_mes.anterior_anio[index] - parseInt(contrataciones_anios_mes.anterior_anio[indexMesAnterior].total);
                    indexMesAnterior++;
                }else{
                    array_total_contrataciones_anterior_anios_mes[index] = 0;
                    if(personal_activo_por_anio_mes.anterior_anio[indexMesAnterior]){
                        array_total_empleados_activos_anterior[index] = personal_activo_por_anio_mes.anterior_anio[index];
                        //indexMesAnterior++;
                    }else{
                        array_total_empleados_activos_anterior[index] = 0;
                    }
                }
            }
            $("#total_contrataciones").html(total_contrataciones);
            var BARCHART3 = $('#contrataciones_anio_mes');
            myBarChart3 = new Chart(BARCHART3, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_total_contrataciones_actual_anios_mes,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_total_contrataciones_anterior_anios_mes,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
        }

        <?php
            echo "var salidad_anios_mes = ".json_encode($salidasPorAnioMes) . ";\n";
        ?>

        /* ***** Grafica salidas ***** */
        var myBarChart4; 
        var array_total_salidass_actual_anios_mes = [];
        var array_total_salidas_anterior_anios_mes = [];
        graficar_salidas_anios_mes();
        function graficar_salidas_anios_mes(){
            var meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
            var total_salidas = 0;
            var indexMesActual = 0;
            var indexMesAnterior = 0;
            for(var r=1; r<=12; r++){
                var index = r-1;
                if(salidad_anios_mes.actual_anio[indexMesActual] != undefined && salidad_anios_mes.actual_anio[indexMesActual].mes == r){
                    array_total_salidass_actual_anios_mes[index] = parseInt(salidad_anios_mes.actual_anio[indexMesActual].total);
                    total_salidas += parseInt(salidad_anios_mes.actual_anio[indexMesActual].total);
                    indexMesActual++;
                }else{
                    array_total_salidass_actual_anios_mes[index] = 0;
                }
                if(salidad_anios_mes.anterior_anio[indexMesAnterior] != undefined && salidad_anios_mes.anterior_anio[indexMesAnterior].mes == r){
                    array_total_salidas_anterior_anios_mes[index] = parseInt(salidad_anios_mes.anterior_anio[indexMesAnterior].total);
                    indexMesAnterior++;
                }else{
                    array_total_salidas_anterior_anios_mes[index] = 0;
                }
            }
            $("#total_salidas").html(total_salidas);

            var BARCHART4 = $('#salidas_anio_mes');
            myBarChart4 = new Chart(BARCHART4, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_total_salidass_actual_anios_mes,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_total_salidas_anterior_anios_mes,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
        }

        var myBarChart10;
        var myBarChart11;
        var myBarChart12;
        var myBarChart13;
        var array_total_porcentaje_contrataciones_actual = [];
        var array_total_porcentaje_contrataciones_anterior = [];
        var array_total_porcentaje_salida_actual = [];
        var array_total_porcentaje_salida_anterior = [];
        var array_irp_actual = [];
        var array_irp_anterior = []; 
        total_empleados_activos();
        function total_empleados_activos(){
            var meses = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];

            var BARCHART10 = $('#empleados_anio_mes');
            myBarChart10 = new Chart(BARCHART10, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_total_empleados_activos_actual,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_total_empleados_activos_anterior,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
            $("#total_empleados_activos").html(total_empleados_activos_actual);
            var total_irp_actual_anio = 0;
            var total_irp_anterior_anio = 0;
            var total_a = {anterior_anio:0, actual_anio:0};
            var total_d = {anterior_anio:0, actual_anio:0};
            var total_f1 = {anterior_anio:0, actual_anio:0};
            var total_f2 = {anterior_anio:0, actual_anio:0};

            var total_porcentaje_contrataciones = 0;
            var total_porcentaje_salida = 0;
            var total_irp = 0;
            for(var r=1; r<=12; r++){
                var index = r - 1;
                array_total_porcentaje_contrataciones_actual[index] = (array_total_empleados_activos_actual[index] + array_total_contrataciones_actual_anios_mes[index]) * 100 / (array_total_empleados_activos_actual[index] + array_total_contrataciones_actual_anios_mes[index] + array_total_salidass_actual_anios_mes[index]);
                array_total_porcentaje_contrataciones_anterior[index] = (array_total_empleados_activos_anterior[index] + array_total_contrataciones_anterior_anios_mes[index]) * 100 / (array_total_empleados_activos_anterior[index] +array_total_contrataciones_anterior_anios_mes[index] +array_total_salidas_anterior_anios_mes[index]);
                array_total_porcentaje_salida_actual[index] = array_total_salidass_actual_anios_mes[index] * 100 / (array_total_empleados_activos_actual[index] +array_total_contrataciones_actual_anios_mes[index] +array_total_salidass_actual_anios_mes[index]);
                array_total_porcentaje_salida_anterior[index] = array_total_salidas_anterior_anios_mes[index] * 100 / (array_total_empleados_activos_anterior[index] + 
                    array_total_contrataciones_anterior_anios_mes[index] +array_total_salidas_anterior_anios_mes[index]);

                array_total_porcentaje_contrataciones_actual[index] = isNaN(array_total_porcentaje_contrataciones_actual[index]) ? "0.00" : array_total_porcentaje_contrataciones_actual[index].toFixed(2);
                array_total_porcentaje_contrataciones_anterior[index] = isNaN(array_total_porcentaje_contrataciones_anterior[index]) ? "0.00" : array_total_porcentaje_contrataciones_anterior[index].toFixed(2);
                array_total_porcentaje_salida_actual[index] = isNaN(array_total_porcentaje_salida_actual[index]) ? "0.00" : array_total_porcentaje_salida_actual[index].toFixed(2);
                array_total_porcentaje_salida_anterior[index] = isNaN(array_total_porcentaje_salida_anterior[index]) ? "0.00" : array_total_porcentaje_salida_anterior[index].toFixed(2);

                total_porcentaje_contrataciones += (array_total_porcentaje_contrataciones_actual[index] == "0.00" ? 100 : parseFloat(array_total_porcentaje_contrataciones_actual[index]));
                total_porcentaje_salida += parseFloat(array_total_porcentaje_salida_actual[index]);

                var a = parseFloat(array_total_contrataciones_actual_anios_mes[index]);
                var d = parseFloat(array_total_salidass_actual_anios_mes[index]);
                var f1 = parseFloat(array_total_empleados_activos_actual[index]);
                var f2 = parseFloat(f1 + a);

                array_irp_actual[index] = ((a-d)/((f1+f2)/2)*100).toFixed(2);
                array_irp_actual[index] = isNaN(array_irp_actual[index]) ? "0.00" : array_irp_actual[index];
                total_irp += parseFloat(array_irp_actual[index]);
                
                total_a.actual_anio += a;
                total_d.actual_anio += d;
                total_f1.actual_anio += f1;
                total_f2.actual_anio += f2;

                a = array_total_contrataciones_anterior_anios_mes[index];
                d = array_total_salidas_anterior_anios_mes[index];
                f1 = array_total_empleados_activos_anterior[index];
                f2 = f1 + a;
                array_irp_anterior[index] = ((a-d)/((f1+f2)/2)*100).toFixed(2);
                array_irp_anterior[index] = isNaN(array_irp_anterior[index]) ? "0.00" : array_irp_anterior[index];
                
                total_a.anterior_anio += a;
                total_d.anterior_anio += d;
                total_f1.anterior_anio += f1;
                total_f2.anterior_anio += f2;
            }

            total_irp_actual_anio = ((total_a.actual_anio-total_d.actual_anio)/((total_f1.actual_anio+total_f2.actual_anio)/2)*100).toFixed(2);

            total_irp_anterior_anio = ((total_a.anterior_anio-total_d.anterior_anio)/((total_f1.anterior_anio+total_f2.anterior_anio)/2)*100).toFixed(2);

            var BARCHART11 = $('#porcentaje_contrataciones_anio_mes');
            myBarChart11 = new Chart(BARCHART11, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_total_porcentaje_contrataciones_actual,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_total_porcentaje_contrataciones_anterior,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });

            var BARCHART12 = $('#porcentaje_salidas_anio_mes');
            myBarChart12 = new Chart(BARCHART12, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_total_porcentaje_salida_actual,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_total_porcentaje_salida_anterior,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
            var BARCHART13 = $('#irp');
            myBarChart13 = new Chart(BARCHART13, {
                type: 'bar',
                stack: '',
                data: {
                    labels: meses,
                    datasets: [
                        {label: anio_actual_selector,
                        data: array_irp_actual,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: array_irp_anterior,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
            total_porcentaje_contrataciones = (total_porcentaje_contrataciones * 100 / 1200).toFixed(2);
            total_porcentaje_salida = (total_porcentaje_salida * 100 / 1200).toFixed(2);
            total_irp = (total_irp / 12).toFixed(2);

            $("#porcentaje_total_contrataciones").html(total_porcentaje_contrataciones + " %");
            $("#porcentaje_total_salidas").html(total_porcentaje_salida + " %");
            $("#irp_total").html(total_irp);

            var BARCHART14 = $('#irp_anio');
            myBarChart14 = new Chart(BARCHART14, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [anio_actual_selector, anio_actual_selector-1],
                    datasets: [
                        {label: anio_actual_selector,
                        data: [total_irp_actual_anio],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: '#55e6a0',
                        hoverBackgroundColor: '#55e6a0'
                        }, {label: anio_actual_selector-1,
                        data: [total_irp_anterior_anio],
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: "#f4e150",
                        hoverBackgroundColor:"#f4e150"
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: true }
                }
            });
            $("#irp_total_anio").html(total_irp_actual_anio);
        }



        function obtener_contrataciones_salidas_anio_mes(e){
            var anio_actual = $('.selector_anio[name="anio_actual"]').val();
            var anio_anterior = $('.selector_anio[name="anio_anterior"]').val();
            var departamento = $('.selector_departamento[name="departamento"]').val();
            $.ajax({
                url:"<?= base_url()?>Inicio/obtenerContratacionesSalidasAnioMes",
                type:"POST",
                data:{
                    anio_actual: anio_actual,
                    anio_anterior: anio_anterior,
                    departamento: departamento
                },
                success: function(result){
                    result = JSON.parse(result);
                    //myBarChart3
                    //myBarChart4
                    total_empleados_activos_actual = parseInt(result.totalEmpleadosPorAnioActual);
                    total_empleados_activos_anterior = parseInt(result.totalEmpleadosPorAnioAnterior);
                    var personal_activo_por_anio_mes = result.personalActivoPorAnioMes; 
                    var contrataciones_anios_mes = result.contratacionesPorAnioMes;
                    var salidad_anios_mes = result.salidasPorAnioMes;
                    var array_total_contrataciones_actual_anios_mes = [];
                    var array_total_contrataciones_anterior_anios_mes = [];
                    var array_total_salidass_actual_anios_mes = [];
                    var array_total_salidas_anterior_anios_mes = [];
                    var total_contrataciones = 0;
                    var total_salidas = 0;
                    var indexMesActual = 0;
                    var indexMesAnterior = 0;

                    array_total_empleados_activos_actual = [];
                    array_total_empleados_activos_anterior = [];
                    array_total_porcentaje_contrataciones_actual = [];
                    array_total_porcentaje_contrataciones_anterior = [];
                    array_total_porcentaje_salida_actual = [];
                    array_total_porcentaje_salida_anterior = [];
                    for(var r=1; r<=12; r++){
                        var index = r-1;
                        if(contrataciones_anios_mes.actual_anio[indexMesActual] != undefined &&contrataciones_anios_mes.actual_anio[indexMesActual].mes == r){
                            array_total_contrataciones_actual_anios_mes[index] = parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                            total_contrataciones += parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                            array_total_empleados_activos_actual[index] = personal_activo_por_anio_mes.actual_anio[index] - parseInt(contrataciones_anios_mes.actual_anio[indexMesActual].total);
                            indexMesActual++;
                        }else{
                            array_total_contrataciones_actual_anios_mes[index] = 0;
                            if(personal_activo_por_anio_mes.actual_anio[indexMesActual] != undefined){
                                array_total_empleados_activos_actual[index] = personal_activo_por_anio_mes.actual_anio[index];
                                //indexMesActual++;
                            }else{
                                array_total_empleados_activos_actual[index] = 0;
                            }
                        }
                        
                        if(contrataciones_anios_mes.anterior_anio[indexMesAnterior] != undefined &&contrataciones_anios_mes.anterior_anio[indexMesAnterior].mes == r){
                            array_total_contrataciones_anterior_anios_mes[index] = parseInt(contrataciones_anios_mes.anterior_anio[indexMesAnterior].total);
                            array_total_empleados_activos_anterior[index] = personal_activo_por_anio_mes.anterior_anio[index] - parseInt(contrataciones_anios_mes.anterior_anio[indexMesAnterior].total);
                            indexMesAnterior++;
                        }else{
                            array_total_contrataciones_anterior_anios_mes[index] = 0;
                            if(personal_activo_por_anio_mes.anterior_anio[indexMesAnterior] != undefined){
                                array_total_empleados_activos_anterior[index] = personal_activo_por_anio_mes.anterior_anio[index];
                                //indexMesAnterior++;
                            }else{
                                array_total_empleados_activos_anterior[index] = 0;
                            }
                        }
                    }

                    indexMesActual = 0;
                    indexMesAnterior = 0;
                    for(var r=1; r<=12; r++){
                        var index = r-1;
                        if(salidad_anios_mes.actual_anio[indexMesActual] != undefined && salidad_anios_mes.actual_anio[indexMesActual].mes == r){
                            array_total_salidass_actual_anios_mes[index] = parseInt(salidad_anios_mes.actual_anio[indexMesActual].total);
                            total_salidas += parseInt(salidad_anios_mes.actual_anio[indexMesActual].total);
                            indexMesActual++;
                        }else{
                            array_total_salidass_actual_anios_mes[index] = 0;
                        }
                        if(salidad_anios_mes.anterior_anio[indexMesAnterior] != undefined && salidad_anios_mes.anterior_anio[indexMesAnterior].mes == r){
                            array_total_salidas_anterior_anios_mes[index] = parseInt(salidad_anios_mes.anterior_anio[indexMesAnterior].total);
                            indexMesAnterior++;
                        }else{
                            array_total_salidas_anterior_anios_mes[index] = 0;
                        }
                    }
                    var total_porcentaje_contrataciones = 0;
                    var total_porcentaje_salida = 0;
                    var total_irp = 0;

                    var total_a = {anterior_anio:0, actual_anio:0};
                    var total_d = {anterior_anio:0, actual_anio:0};
                    var total_f1 = {anterior_anio:0, actual_anio:0};
                    var total_f2 = {anterior_anio:0, actual_anio:0};

                    for(var r=1; r<=12; r++){
                        var index = r - 1;
                        array_total_porcentaje_contrataciones_actual[index] = (array_total_empleados_activos_actual[index] + array_total_contrataciones_actual_anios_mes[index]) * 100 / (array_total_empleados_activos_actual[index] + array_total_contrataciones_actual_anios_mes[index] + array_total_salidass_actual_anios_mes[index]);
                        array_total_porcentaje_contrataciones_anterior[index] = (array_total_empleados_activos_anterior[index] + array_total_contrataciones_anterior_anios_mes[index]) * 100 / (array_total_empleados_activos_anterior[index] +array_total_contrataciones_anterior_anios_mes[index] +array_total_salidas_anterior_anios_mes[index]);
                        array_total_porcentaje_salida_actual[index] = array_total_salidass_actual_anios_mes[index] * 100 / (array_total_empleados_activos_actual[index] +array_total_contrataciones_actual_anios_mes[index] +array_total_salidass_actual_anios_mes[index]);
                        array_total_porcentaje_salida_anterior[index] = array_total_salidas_anterior_anios_mes[index] * 100 / (array_total_empleados_activos_anterior[index] + 
                            array_total_contrataciones_anterior_anios_mes[index] +array_total_salidas_anterior_anios_mes[index]);

                        array_total_porcentaje_contrataciones_actual[index] = isNaN(array_total_porcentaje_contrataciones_actual[index]) ? "0.00" : array_total_porcentaje_contrataciones_actual[index].toFixed(2);
                        array_total_porcentaje_contrataciones_anterior[index] = isNaN(array_total_porcentaje_contrataciones_anterior[index]) ? "0.00" : array_total_porcentaje_contrataciones_anterior[index].toFixed(2);
                        array_total_porcentaje_salida_actual[index] = isNaN(array_total_porcentaje_salida_actual[index]) ? "0.00" : array_total_porcentaje_salida_actual[index].toFixed(2);
                        array_total_porcentaje_salida_anterior[index] = isNaN(array_total_porcentaje_salida_anterior[index]) ? "0.00" : array_total_porcentaje_salida_anterior[index].toFixed(2);

                        total_porcentaje_contrataciones += (array_total_porcentaje_contrataciones_actual[index] == "0.00" ? 100 : parseFloat(array_total_porcentaje_contrataciones_actual[index]));
                        total_porcentaje_salida += parseFloat(array_total_porcentaje_salida_actual[index]);

                        var a = array_total_contrataciones_actual_anios_mes[index];
                        var d = array_total_salidass_actual_anios_mes[index];
                        var f1 = array_total_empleados_activos_actual[index];
                        var f2 = f1 + a;

                        array_irp_actual[index] = ((a-d)/((f1+f2)/2)*100).toFixed(2);
                        array_irp_actual[index] = isNaN(array_irp_actual[index]) ? "0.00" : array_irp_actual[index];
                        total_irp += parseFloat(array_irp_actual[index]);

                        total_a.actual_anio += isNaN(a) ? 0.00 : a;
                        total_d.actual_anio += isNaN(d) ? 0.00 : d;
                        total_f1.actual_anio += isNaN(f1) ? 0.00 : f1;
                        total_f2.actual_anio += isNaN(f2) ? 0.00 : f2;

                        a = array_total_contrataciones_anterior_anios_mes[index];
                        d = array_total_salidas_anterior_anios_mes[index];
                        f1 = array_total_empleados_activos_anterior[index];
                        f2 = f1 + a;
                        array_irp_anterior[index] = ((a-d)/((f1+f2)/2)*100).toFixed(2);

                        total_a.anterior_anio += isNaN(a) ? 0.00 : a;
                        total_d.anterior_anio += isNaN(d) ? 0.00 : d;
                        total_f1.anterior_anio += isNaN(f1) ? 0.00 : f1;
                        total_f2.anterior_anio += isNaN(f2) ? 0.00 : f2;
                    }

                    total_irp_actual_anio = ((total_a.actual_anio-total_d.actual_anio)/((total_f1.actual_anio+total_f2.actual_anio)/2)*100).toFixed(2);

                    total_irp_anterior_anio = ((total_a.anterior_anio-total_d.anterior_anio)/((total_f1.anterior_anio+total_f2.anterior_anio)/2)*100).toFixed(2);

                    total_irp = (total_irp / 12).toFixed(2);
                    myBarChart3.data.datasets[0].label = anio_actual;
                    myBarChart3.data.datasets[0].data = array_total_contrataciones_actual_anios_mes;
                    myBarChart3.data.datasets[1].label = anio_anterior;
                    myBarChart3.data.datasets[1].data = array_total_contrataciones_anterior_anios_mes;
                    myBarChart4.data.datasets[0].label = anio_actual;
                    myBarChart4.data.datasets[0].data = array_total_salidass_actual_anios_mes;
                    myBarChart4.data.datasets[1].label = anio_anterior;
                    myBarChart4.data.datasets[1].data = array_total_salidas_anterior_anios_mes;
                    myBarChart10.data.datasets[0].label = anio_actual;
                    myBarChart10.data.datasets[0].data = array_total_empleados_activos_actual;
                    myBarChart10.data.datasets[1].label = anio_anterior;
                    myBarChart10.data.datasets[1].data = array_total_empleados_activos_anterior;
                    myBarChart11.data.datasets[0].label = anio_actual;
                    myBarChart11.data.datasets[0].data = array_total_porcentaje_contrataciones_actual;
                    myBarChart11.data.datasets[1].label = anio_anterior;
                    myBarChart11.data.datasets[1].data = array_total_porcentaje_contrataciones_anterior;
                    myBarChart12.data.datasets[0].label = anio_actual;
                    myBarChart12.data.datasets[0].data = array_total_porcentaje_salida_actual;
                    myBarChart12.data.datasets[1].label = anio_anterior;
                    myBarChart12.data.datasets[1].data = array_total_porcentaje_salida_anterior;
                    myBarChart13.data.datasets[0].label = anio_actual;
                    myBarChart13.data.datasets[0].data = array_irp_actual;
                    myBarChart13.data.datasets[1].label = anio_anterior;
                    myBarChart13.data.datasets[1].data = array_irp_anterior;
                    myBarChart14.data.datasets[0].label = anio_actual;
                    myBarChart14.data.datasets[0].data = [total_irp_actual_anio];
                    myBarChart14.data.datasets[1].label = anio_anterior;
                    myBarChart14.data.datasets[1].data = [total_irp_anterior_anio];
                    myBarChart3.update();
                    myBarChart4.update();
                    myBarChart10.update();
                    myBarChart11.update();
                    myBarChart12.update();
                    myBarChart13.update();
                    myBarChart14.update();
                    
                    $("#total_contrataciones").html(total_contrataciones);
                    $("#total_salidas").html(total_salidas);
                    $("#total_empleados_activos").html(total_empleados_activos_actual);
                    total_porcentaje_contrataciones = (total_porcentaje_contrataciones * 100 / 1200).toFixed(2);
                    total_porcentaje_salida = (total_porcentaje_salida * 100 / 1200).toFixed(2);
                    $("#porcentaje_total_contrataciones").html(total_porcentaje_contrataciones + " %");
                    $("#porcentaje_total_salidas").html(total_porcentaje_salida + " %");
                    $("#irp_total").html(total_irp);
                    $("#irp_total_anio").html(total_irp_actual_anio);
                },
                error: function(result){
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            })
        }

        <?php
            echo "var empleados_ubucacion_departamento = ".json_encode($empleadosPorUbicacionDepartamento) . ";\n";
        ?>

        graficar_empleados_ubucacion_departamento();

        var myBarChart2;   
        function graficar_empleados_ubucacion_departamento(){
                var array_labels_empleados_ubucacion_departamento = [];
                var array_total_empleados_ubucacion_departamento = [];
                for(var r=0; r<empleados_ubucacion_departamento.length; r++){
                    array_labels_empleados_ubucacion_departamento.push(empleados_ubucacion_departamento[r].departamento);
                    array_total_empleados_ubucacion_departamento .push(empleados_ubucacion_departamento[r].total);
                }
                var BARCHART1 = $('#empleados_ubicacion_departamento');
                myBarChart2 = new Chart(BARCHART1, {
                    type: 'horizontalBar',
                    stack: '',
                    data: {
                        labels: array_labels_empleados_ubucacion_departamento,
                        datasets: [{
                                data: array_total_empleados_ubucacion_departamento,
                                borderWidth: [0, 0, 0, 0],
                                backgroundColor: [
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000"
                                ],
                                hoverBackgroundColor: [
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000",
                                    '#55e6a0',
                                    "#f4e150",
                                    "#71d1f2",
                                    "#ff0000"
                                ]
                            }]
                    },
                    options: {
                        maintainAspectRatio: false,
                        responsive: true,
                        legend: { display: false }
                    }
                });
            }


function obtener_empleados_ubicacion_departamento(e) {
    $.ajax({
        url: "<?= base_url()?>Inicio/empleadosPorUbicacionDepartamento",
        type: "POST",
        data: {
            idtbl_empresas: $(e).val()
        },
        success: function(result) {
            result = JSON.parse(result);
            var array_labels_empleados_ubucacion_departamento = [];
            var array_total_empleados_ubucacion_departamento = [];
            for (var r = 0; r < result.length; r++) {
                array_labels_empleados_ubucacion_departamento.push(result[r].departamento);
                array_total_empleados_ubucacion_departamento.push(result[r].total);
            }
            myBarChart2.data.labels = array_labels_empleados_ubucacion_departamento;
            myBarChart2.data.datasets[0].data = array_total_empleados_ubucacion_departamento;
            myBarChart2.update();
        },
        error: function(result) {
            console.log("Ocurrio un error, intente mas tarde.")
        }
    })
}

<?php
    echo "var empleados_establecimiento = ".json_encode($totalEmpleadosPorEstablecimiento) . ";\n";
?>
var array_labels_empleados_establecimiento = [];
var array_total_empleados_establecimiento = [];
for(var r=0; r<empleados_establecimiento.length; r++){
    array_labels_empleados_establecimiento.push(empleados_establecimiento[r].establecimiento);
    array_total_empleados_establecimiento.push(empleados_establecimiento[r].total);
}

var BARCHART15 = $('#empleados_establecimiento');
var myBarChart15 = new Chart(BARCHART15, {
    type: 'horizontalBar',
    stack: '',
    data: {
        labels: array_labels_empleados_establecimiento,
            datasets: [{
                data: array_total_empleados_establecimiento,
                borderWidth: [0, 0, 0, 0],
                backgroundColor: [
                    '#55e6a0',
                    "#f4e150",
                    "#71d1f2",
                    "#ff0000",
                    '#55e6a0',
                    "#f4e150",
                    "#71d1f2",
                    "#ff0000"
                ],
                hoverBackgroundColor: [
                    '#55e6a0',
                    "#f4e150",
                    "#71d1f2",
                    "#ff0000",
                    '#55e6a0',
                    "#f4e150",
                    "#71d1f2",
                    "#ff0000"
                ]
            }]
    },
    options: {
        maintainAspectRatio: false,
        responsive: true,
        legend: { display: false }
    }
});
</script>

<?php
    break;
    case 10:
  ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">
                    <div class="card-body">
                        <h3>EP-CAS-AMA-001 Casco amarillo</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_casco_amarillo ?></strong><br><span>Totales</span></div>
                            <canvas id="casco_amarillo"></canvas>
                        </div>
                    </div>
                </div>
            </div>     
            
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-CAS-NAR-001 Casco naranja</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_casco_naranja ?></strong><br><span>Totales</span></div>
                            <canvas id="casco_naranja"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-CAS-BLA-001 Casco blanco</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_casco_blanco ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="casco_blanco"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-GUA-PIE-001 Guante de piel</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_guante_de_piel ?></strong><br><span>Totales</span></div>
                            <canvas id="guante_de_piel"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-PON-IMP-001 Poncho impermeable</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_poncho_impermeable ?></strong><br><span>Totales</span></div>
                            <canvas id="poncho_impermeable"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-CHA-EST-002 Chaleco de seguridad</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_chaleco_seguridad ?></strong><br><span>Totales</span></div>
                            <canvas id="chaleco_seguridad"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-BAR-SME-001 Barbiquejo</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_barbiquejo ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="barbiquejo"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>HR-GAR-AGU-001 Garrafón de agua Ciel</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_garrafon_ciel ?></strong><br><span>Totales</span></div>
                            <canvas id="garrafon_ciel"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>EP-LEN-SEG-003 Lentes de seguridad ligeros gris</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_lentes_gris ?></strong><br><span>Totales</span></div>
                            <canvas id="lentes_gris"></canvas>
                        </div>
                    </div>
                </div>
            </div>           
                        
            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Bandolas</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text"><strong><?= $total_global_bandolas ?></strong><br><span>Totales</span>
                            </div>
                            <canvas id="bandolas"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>Cinturones</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_cinturones ?></strong><br><span>Totales</span></div>
                            <canvas id="cinturones"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>AD-OFI-LON-015 Lona 4 en 1</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_lona ?></strong><br><span>Totales</span></div>
                            <canvas id="lona"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            

            <!-- Work Amount  -->
            <div class="col-xl-3 col-lg-6">
                <div class="work-amount card">

                    <div class="card-body">
                        <h3>HR-EXT-EME-003 Extintores de 4.5 kg</h3><small>Estatus actual</small>
                        <div class="chart text-center">
                            <div class="text">
                                <strong><?= $total_global_extintor ?></strong><br><span>Totales</span></div>
                            <canvas id="extintor"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart            -->
            <div class="chart col-lg-12 col-12">
                <div class="bg-white" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                    <h3 style="padding: 15px 5px;">Mínimos y máximos EPP</h3>
                    <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" id="busqueda3" name="busqueda">
                    </div>
                </div>
                <div class="bg-white">
                    <canvas width="1100" height="480" id="lineChart4"></canvas>
                </div>
                <div id="pagination_lineChart4" class="bg-white" style="padding-bottom: 10px;">
                    <ul class="pagination justify-content-center"></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
/*global $, document, Chart, LINECHART, data, options, window*/
var myLineChartServices;
$(document).ready(function() {

    'use strict';

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        <?php

        echo "var array_labels = ". json_encode($labels ). ";\n";
        echo "var array_minimos = ".json_encode( $minimos) . ";\n";
        echo "var array_stock = ". json_encode($stock ). ";\n";
        ?>
        var LINECHART4 = $('#lineChart4');
        myLineChartServices = new Chart(LINECHART4, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });

        function graficar_equipo_proteccion(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_equipo_proteccion",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda3").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices.data.labels = productos;
                    myLineChartServices.data.datasets[0].data = minimos;
                    myLineChartServices.data.datasets[1].data = maximos;
                    myLineChartServices.update();
                    
                    var pagination = $("#pagination_lineChart4 ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_equipo_proteccion(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }


        graficar_equipo_proteccion(0);
        $("#busqueda3").on("keyup",function(){
            graficar_equipo_proteccion(0);
        });


        // ------------------------------------------------------- //
        // Pie Chart
        // ------------------------------------------------------ //
        <?php
    if (isset($estatus_casco_amarillo)) {
    echo "var array_labels_casco_amarillo = ". json_encode($estatus_casco_amarillo ). ";\n";
    echo "var array_total_casco_amarillo = ".json_encode($total_casco_amarillo) . ";\n";
    
    ?>

        var PIECHART = $('#casco_amarillo');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_amarillo,
                datasets: [{
                    data: array_total_casco_amarillo,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000"

                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_casco_blanco)) {
    echo "var array_labels_casco_blanco = ". json_encode($estatus_casco_blanco ). ";\n";
    echo "var array_total_casco_blanco = ".json_encode($total_casco_blanco) . ";\n";
    
    ?>
    
        var PIECHART = $('#casco_blanco');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_blanco,
                datasets: [{
                    data: array_total_casco_blanco,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_casco_naranja)) {
    echo "var array_labels_casco_naranja = ". json_encode($estatus_casco_naranja ). ";\n";
    echo "var array_total_casco_naranja = ".json_encode($total_casco_naranja) . ";\n";
    
    ?>

        var PIECHART = $('#casco_naranja');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_casco_naranja,
                datasets: [{
                    data: array_total_casco_naranja,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_guante_de_piel)) {
    echo "var array_labels_guante_de_piel = ". json_encode($estatus_guante_de_piel). ";\n";
    echo "var array_total_guante_de_piel = ".json_encode($total_guante_de_piel) . ";\n";
    
    ?>

        var PIECHART = $('#guante_de_piel');
        var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_guante_de_piel,
                datasets: [{
                    data: array_total_guante_de_piel,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",

                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });
        <?php } ?>


        <?php
    if (isset($estatus_garrafon_ciel)) {
    echo "var array_labels_garrafon_ciel = ". json_encode($estatus_garrafon_ciel ). ";\n";
    echo "var array_total_garrafon_ciel = ".json_encode($total_garrafon_ciel) . ";\n";
    
    ?>    

        var PIECHART = $('#garrafon_ciel');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_garrafon_ciel,
                datasets: [{
                    data: array_total_garrafon_ciel,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_lentes_gris)) {
    echo "var array_labels_lentes_gris = ". json_encode($estatus_lentes_gris ). ";\n";
    echo "var array_total_lentes_gris = ".json_encode($total_lentes_gris) . ";\n";
    
    ?>

        var PIECHART = $('#lentes_gris');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_lentes_gris,
                datasets: [{
                    data: array_total_lentes_gris,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
   
    if (isset($estatus_poncho_impermeable)) {
    echo "var array_labels_poncho_impermeable = ". json_encode($estatus_poncho_impermeable ). ";\n";
    echo "var array_total_poncho_impermeable = ".json_encode($total_poncho_impermeable) . ";\n";
    
    ?>

        var PIECHART = $('#poncho_impermeable');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_poncho_impermeable,
                datasets: [{
                    data: array_total_poncho_impermeable,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    
    if (isset($estatus_bandolas)) {
    echo "var array_labels_bandolas = ". json_encode($estatus_bandolas ). ";\n";
    echo "var array_total_bandolas = ".json_encode($total_bandolas) . ";\n";
    
    ?>

        var PIECHART = $('#bandolas');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_bandolas,
                datasets: [{
                    data: array_total_bandolas,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_cinturones)) {
    echo "var array_labels_cinturones = ". json_encode($estatus_cinturones ). ";\n";
    echo "var array_total_cinturones = ".json_encode($total_cinturones) . ";\n";
    
    ?>

        var PIECHART = $('#cinturones');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_cinturones,
                datasets: [{
                    data: array_total_cinturones,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_chaleco_seguridad)) {
    echo "var array_labels_chaleco_seguridad = ". json_encode($estatus_chaleco_seguridad ). ";\n";
    echo "var array_total_chaleco_seguridad = ".json_encode($total_chaleco_seguridad) . ";\n";
    
    ?>

        var PIECHART = $('#chaleco_seguridad');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_chaleco_seguridad,
                datasets: [{
                    data: array_total_chaleco_seguridad,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_lona)) {
    echo "var array_labels_lona = ". json_encode($estatus_lona ). ";\n";
    echo "var array_total_lona = ".json_encode($total_lona) . ";\n";
    
    ?>

        var PIECHART = $('#lona');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_lona,
                datasets: [{
                    data: array_total_lona,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_barbiquejo)) {
    echo "var array_labels_barbiquejo = ". json_encode($estatus_barbiquejo ). ";\n";
    echo "var array_total_barbiquejo = ".json_encode($total_barbiquejo) . ";\n";
    
    ?>

        var PIECHART = $('#barbiquejo');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_barbiquejo,
                datasets: [{
                    data: array_total_barbiquejo,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_extintor)) {
    echo "var array_labels_extintor = ". json_encode($estatus_extintor ). ";\n";
    echo "var array_total_extintor = ".json_encode($total_extintor) . ";\n";
    
    ?>

        var PIECHART = $('#extintor');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_extintor,
                datasets: [{
                    data: array_total_extintor,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#ff0000",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    ?>

    }) /*End Pace*/

});
</script>

<?php
    break;
    case 8:
  ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Alto Costo</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/1">
                        <img src="<?= base_url() ?>img/022.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Control Vehicular</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/3">
                        <img src="<?= base_url() ?>img/023.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Almacen General</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/4">
                        <img src="<?= base_url() ?>img/024.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Capital Humano</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/5">
                        <img src="<?= base_url() ?>img/025.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Proyectos</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/6">
                        <img src="<?= base_url() ?>img/026.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Compras</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/7">
                        <img src="<?= base_url() ?>img/027.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Seguridad e Higiene</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/10">
                        <img src="<?= base_url() ?>img/028.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Contratista</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/12">
                        <img src="<?= base_url() ?>img/029.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Área Médica</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/14">
                        <img src="<?= base_url() ?>img/030.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Sistemas</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/2">
                        <img src="<?= base_url() ?>img/035.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Desarrollador Web</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/20">
                        <img src="<?= base_url() ?>img/032.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Project Manager</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/19">
                        <img src="<?= base_url() ?>img/033.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Control de Obra</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/11">
                        <img src="<?= base_url() ?>img/034.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    break;
    case 9:
  ?>
  
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col text-center">
                    <img src="<?= base_url()?>uploads/estevez-background.jpg" class="d-inline-block">
                </div>
            </div>
        </div>
    </section>
    

<?php
    break;
    case 11:
  ?>
<!-- Client Section-->
<section class="client">
<?php if($this->session->userdata('jefe') == 1){ ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Alto Costo</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/1">
                        <img src="<?= base_url() ?>img/022.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Control Vehicular</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/3">
                        <img src="<?= base_url() ?>img/023.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Almacen General</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/4">
                        <img src="<?= base_url() ?>img/024.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Compras</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/7">
                        <img src="<?= base_url() ?>img/027.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
<?php }else{ ?>
    <div class="container-fluid">
<div class="row">
    <div class="col-xl-3">
        <div class="form-group">
            <label>Estatus</label>
            <select id="estatus_herramienta" class="form-control">
                <option value="">Todo</option>
                <option value="RENTA">Renta</option>
                <option value="VENTA">Venta</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Empalmadora</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_empalmadora"><?= $total_global_empalmadora ?></strong><br><span>Totales</span>
                </div>
                <canvas id="empalmadorados"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>OTDR</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_otdr"><?= $total_global_otdr ?></strong><br><span>Totales</span>
                </div>
                <canvas id="otdrdos"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Medidor de Tráfico</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_medidor_trafico"><?= $total_global_medidor_trafico ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="medidor_trafico"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Medidor de Potencia</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_power_meter"><?= $total_global_power_meter ?></strong><br><span>Totales</span>
                </div>
                <canvas id="power_meter"></canvas>
                </div>
            </div>
        </div>
    </div>    

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Luz Visible</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_luz_visible"><?= $total_global_luz_visible ?></strong><br><span>Totales</span>
                </div>
                <canvas id="luz_visible"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Fiber Cleaver</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_fiber_cleaver"><?= $total_global_fiber_cleaver ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="fiber_cleaver"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
<div class="work-amount card">
<div class="card-body">
    <h3>Corte de tubo holgado</h3><small>Estatus actual</small>
    <div class="chart text-center">
        <div class="text">
            <strong id="total_global_corte_tubo_holgado"><?= $total_global_corte_tubo_holgado ?></strong><br><span>Totales</span>
        </div>
        <canvas id="corte_tubo_holgado"></canvas>
    </div>
</div>
</div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Corte Longitudinal</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_corte_longitudinal"><?= $total_global_corte_longitudinal ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="corte_longitudinal"></canvas>
                </div>
            </div>
        </div>
    </div>       
</div>
    </div>      
    <?php } ?>
    </section>
    <script>
        <?php
    echo "var total_costos = ". json_encode($totalCostos). ";\n";   
?>
$(document).ready(function() {

    'use strict';

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        var LINECHART = $('#lineChart');
        var myLineChart = new Chart(LINECHART, {
            type: 'horizontalBar',
            options: {
                responsive: true,

                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,

                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        categoryPercentage: 1.0,
                        barPercentage: 0.5
                    }]
                },
                legend: {
                    display: legendState
                }
            },
            data: {
                labels: [],
                datasets: [{
                        label: "Stock mínimo",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#f15765",
                        borderColor: '#f15765',
                        pointBorderColor: '#da4c59',
                        pointHoverBackgroundColor: '#da4c59',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 0,
                        data: [],
                        spanGaps: false
                    },
                    {
                        label: "Existencias",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#54e69d",
                        borderColor: "#54e69d",
                        pointHoverBackgroundColor: "#44c384",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "#44c384",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                ]
            }
        });

        function graficar_consumibles_alto_costo(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/graficaConsumiblesAltoCosto",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChart.data.labels = productos;
                    myLineChart.data.datasets[0].data = minimos;
                    myLineChart.data.datasets[1].data = maximos;
                    myLineChart.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_consumibles_alto_costo(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficar_consumibles_alto_costo(0);
        $("#busqueda").on("keyup",function(){
            graficar_consumibles_alto_costo(0);
        });

        // ------------------------------------------------------- //
        // Pie Chart
        // ------------------------------------------------------ //
        <?php
    if (isset($estatus_empalmadora)) {
    echo "var array_labels_empalmadora = ". json_encode($estatus_empalmadora ). ";\n";
    echo "var array_total_empalmadora = ".json_encode($total_empalmadora) . ";\n";
    
    ?>

        var PIECHART = $('#empalmadorados');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_empalmadora,
                datasets: [{
                    data: array_total_empalmadora,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_otdr)) {
    echo "var array_labels_otdr = ". json_encode($estatus_otdr ). ";\n";
    echo "var array_total_otdr = ".json_encode($total_otdr) . ";\n";
    
    ?>

        var PIECHART = $('#otdrdos');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_otdr,
                datasets: [{
                    data: array_total_otdr,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado        
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_medidor_trafico)) {
    echo "var array_labels_medidor_trafico = ". json_encode($estatus_medidor_trafico ). ";\n";
    echo "var array_total_medidor_trafico = ".json_encode($total_medidor_trafico) . ";\n";
    
    ?>

        var PIECHART = $('#medidor_trafico');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_medidor_trafico,
                datasets: [{
                    data: array_total_medidor_trafico,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        '#F79AA8',
                        "#f2993e"

                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_power_meter)) {
    echo "var array_labels_power_meter = ". json_encode($estatus_power_meter). ";\n";
    echo "var array_total_power_meter = ".json_encode($total_power_meter) . ";\n";
    
    ?>

        var PIECHART = $('#power_meter');
        var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_power_meter,
                datasets: [{
                    data: array_total_power_meter,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#3f65ec", //color justificacion
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#3f65ec",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });
        <?php } ?>


        <?php
    if (isset($estatus_luz_visible)) {
    echo "var array_labels_luz_visible = ". json_encode($estatus_luz_visible ). ";\n";
    echo "var array_total_luz_visible = ".json_encode($total_luz_visible) . ";\n";
    
    ?>

        var PIECHART = $('#luz_visible');
        var myPieChart5 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_luz_visible,
                datasets: [{
                    data: array_total_luz_visible,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#71d1f2", //color descompuesto
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_fiber_cleaver)) {
    echo "var array_labels_fiber_cleaver = ". json_encode($estatus_fiber_cleaver ). ";\n";
    echo "var array_total_fiber_cleaver = ".json_encode($total_fiber_cleaver) . ";\n";
    
    ?>

        var PIECHART = $('#fiber_cleaver');
        var myPieChart6 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_fiber_cleaver,
                datasets: [{
                    data: array_total_fiber_cleaver,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        "#3f65ec", //color justificacion   
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#3f65ec',
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_tubo_holgado)) {
    echo "var array_labels_corte_tubo_holgado = ". json_encode($estatus_corte_tubo_holgado ). ";\n";
    echo "var array_total_corte_tubo_holgado = ".json_encode($total_corte_tubo_holgado) . ";\n";
    
    ?>

        var PIECHART = $('#corte_tubo_holgado');
        var myPieChart7 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_tubo_holgado,
                datasets: [{
                    data: array_total_corte_tubo_holgado,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_longitudinal)) {
    echo "var array_labels_corte_longitudinal = ". json_encode($estatus_corte_longitudinal ). ";\n";
    echo "var array_total_corte_longitudinal = ".json_encode($total_corte_longitudinal) . ";\n";
    
    ?>

        var PIECHART = $('#corte_longitudinal');
        var myPieChart8 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_longitudinal,
                datasets: [{
                    data: array_total_corte_longitudinal,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    ?>

    $("#estatus_herramienta").on("change", function(){
        var select_estatus_value = $(this).val();
        var array_herramientas = [{tipo:"EMPALMADORA", categoria:"alto"}, {tipo:"OTDR", categoria:"alto"}, {tipo:"MEDIDOR DE TRAFICO", categoria:"mediano"}, {tipo:"POWER METER S", categoria:"mediano"}, {tipo:"LUZ VISIBLE", categoria:"mediano"}, {tipo:"FIBER CLEAVER", categoria:"mediano"}, {tipo:"TUBO HOLGADO", categoria:"mediano"}, {tipo:"CORTE LONGITUDINAL", categoria:"mediano"}];
        var estatus = $('#estatus').val();
        $.ajax({
            url: "<?= base_url()?>Inicio/obtenerHerramientasAltoCostodos",
            type: "POST",
            dataType: "json",
            data: {
                estatus: array_herramientas,
                tipo_estatus: select_estatus_value
            },
            success: function(result) {
                myPieChart1.data.labels = result["EMPALMADORA"].estatus;
                myPieChart1.data.datasets[0].data = result["EMPALMADORA"].total;
                myPieChart1.update();
                $("#total_global_empalmadora").html(result["EMPALMADORA"].total_global);

                myPieChart2.data.labels = result["OTDR"].estatus;
                myPieChart2.data.datasets[0].data = result["OTDR"].total;
                myPieChart2.update();
                $("#total_global_otdr").html(result["OTDR"].total_global);

                myPieChart3.data.labels = result["MEDIDOR DE TRAFICO"].estatus;
                myPieChart3.data.datasets[0].data = result["MEDIDOR DE TRAFICO"].total;
                myPieChart3.update();
                $("#total_global_medidor_trafico").html(result["MEDIDOR DE TRAFICO"].total_global);

                myPieChart4.data.labels = result["POWER METER S"].estatus;
                myPieChart4.data.datasets[0].data = result["POWER METER S"].total;
                myPieChart4.update();
                $("#total_global_power_meter").html(result["POWER METER S"].total_global);

                myPieChart5.data.labels = result["LUZ VISIBLE"].estatus;
                myPieChart5.data.datasets[0].data = result["LUZ VISIBLE"].total;
                myPieChart5.update();
                $("#total_global_luz_visible").html(result["LUZ VISIBLE"].total_global);

                myPieChart6.data.labels = result["FIBER CLEAVER"].estatus;
                myPieChart6.data.datasets[0].data = result["FIBER CLEAVER"].total;
                myPieChart6.update();
                $("#total_global_fiber_cleaver").html(result["FIBER CLEAVER"].total_global);

                myPieChart7.data.labels = result["TUBO HOLGADO"].estatus;
                myPieChart7.data.datasets[0].data = result["TUBO HOLGADO"].total;
                myPieChart7.update();
                $("#total_global_corte_tubo_holgado").html(result["TUBO HOLGADO"].total_global);

                myPieChart8.data.labels = result["CORTE LONGITUDINAL"].estatus;
                myPieChart8.data.datasets[0].data = result["CORTE LONGITUDINAL"].total;
                myPieChart8.update();
                $("#total_global_corte_longitudinal").html(result["CORTE LONGITUDINAL"].total_global);

            },
            error: function(result) {
                console.log("Ocurrio un error, intente mas tarde.")
            }
        });
    });

    }) /*End Pace*/
});
graficar_costos_AC();
        console.log(total_costos);
        var myBarChart5;

        function graficar_costos_AC() {
            var herramientas = [];
            var array_total_costos = [];
            for (var r = 1; r <= total_costos.length; r++) {
                var index = r - 1;
                if (total_costos != undefined) {
                    array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                    herramientas[index] = total_costos[index].categoria;
                } else {
                    array_total_costos[index] = 0;
                }
            }
            //$("#total_ganancias").html(total_ganancias);
            var BARCHART5 = $("#costosAltoCosto");
            myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: herramientas,
                    datasets: [{
                        data: array_total_costos,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: ['#55e6a0', '#71d1f2', '#f2993e'],
                        hoverBackgroundColor: ['#55e6a0', '#71d1f2', '#f2993e']
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

function obtener_costos_estatus(e) {
            //alert('si');
            var estatus = $('#estatus').val();
            $.ajax({
                url: "<?= base_url()?>Inicio/obtenerCostosEstatus",
                type: "POST",
                data: {
                    estatus: estatus
                },
                success: function(result) {
                    result = JSON.parse(result);
                    console.log(result);   
                    var total_costos = result;   
                    var herramientas = [];         
                    var array_total_costos = [];
                    for (var r = 1; r <= total_costos.length; r++) {
                        var index = r - 1;
                        if (total_costos != undefined) {
                            array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                            herramientas[index] = total_costos[index].categoria;
                        } else {
                            array_total_costos[index] = 0;
                        }
                    }                    
                    console.log(myBarChart5.data.labels[0]);                    
                    myBarChart5.data.labels = herramientas;
                    myBarChart5.data.datasets[0].data = array_total_costos;                   
                    console.log(myBarChart5.data.datasets);
                    myBarChart5.update();
                    //$("#total_salidas").html(total_salidas);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            })
        }
        
    </script>
    <?php
    break;
    case 20:
  ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">
                    <div class="card-body">
                        <h3>Productividad por usuario</h3><small>Tickets</small>
                        <div class="text-right">
                            <select id="year" style="width:100%; max-width: 300px;">
                            </select>    
                        </div>
                        <div class="chart text-center">                            
                            <canvas id="bar-chart-productividad" width="800" height="350"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

    var BARCHART10 = $("#bar-chart-productividad");
    myBarChart10 = new Chart(BARCHART10, {
        type: 'bar',
        stack: '',
        data: {
            labels: [],
            datasets: [{
                label: 2021,
                data: [],
                borderWidth: [0, 0, 0, 0],
                backgroundColor: '#3d8cdb',
                hoverBackgroundColor: '#3d8cdb'
            }, {
                label: 2020,
                data: [],
                borderWidth: [0, 0, 0, 0],
                backgroundColor: "#c42d50",
                hoverBackgroundColor: "#c42d50"
            }]
        },
        options: {
            legend: {
                display: true
            }
        }
    });

    function yearSelect(){
        var yearSelect = $("#year");
        var anioActual = new Date().getFullYear();
        yearSelect.html("");
        for(var anio=2021; anio<=anioActual; anio++){
            yearSelect.append($("<option value='" + anio + "'>" + anio + "</option>"));
        }
    }

    yearSelect();

        function productividad_por_usuario(){
            $.ajax({
                url: "<?= base_url()?>soporte/obtenerProductividadAnioMes",
                type: "POST",
                data:{
                    year: $("#year").val(),
                    tipo: $("#tipo_mantenimiento").val()
                },
                dataType: "json",
                success: function(result) {
                    var backgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var hoverBackgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    
                    var array_datasets = [];

                    var obj_tickets = {};
                    for(var r=0; r<result.usuarios.length; r++){
                        var id_usuario = result.usuarios[r].idtbl_users;
                        obj_tickets[id_usuario] = {nombre: result.usuarios[r].nombre, data:new Array(12)};
                        for(var r1=0; r1<result.tickets.length; r1++){
                            var id_usuario_mantenimiento = result.tickets[r1].idtbl_users;
                            if(id_usuario == id_usuario_mantenimiento){
                                obj_tickets[id_usuario].data[parseInt(result.tickets[r1].mes)-1] = result.tickets[r1];
                            }
                        }
                    }
                    
                    var index = 0;
                    var total = 0;
                    for(var key in obj_tickets){
                        var item = obj_tickets[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                            }else{
                                item.data[r1] = parseInt(item.data[r1].total_productividad);
                                total += item.data[r1];
                            }
                        }
                        if(total > 0){
                            array_datasets.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                                                            
                    myBarChart10.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChart10.data.datasets = array_datasets;
                    myBarChart10.update();
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        productividad_por_usuario();

        $("#year").on("change",function(){
            productividad_por_usuario();
        });
</script>

<?php
    break;
    case 211:
  ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="work-amount card">
                    <div class="card-body">
                        <h3>Productividad por usuario</h3><small>Tickets</small>
                        <div class="text-right">
                            <select id="year" style="width:100%; max-width: 300px;">
                            </select>    
                        </div>
                        <div class="chart text-center">                            
                        <figure class="highcharts-figure">
  <div id="organigrama"></div>
  
</figure>                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<script>

Highcharts.chart('organigrama', {
  chart: {
    height: 600,
    inverted: true
  },

  title: {
    text: 'Organigrama'
  },

  accessibility: {
    point: {
      descriptionFormatter: function (point) {
        var nodeName = point.toNode.name,
          nodeId = point.toNode.id,
          nodeDesc = nodeName === nodeId ? nodeName : nodeName + ', ' + nodeId,
          parentDesc = point.fromNode.id;
        return point.index + '. ' + nodeDesc + ', reports to ' + parentDesc + '.';
      }
    }
  },

  series: [{
    type: 'organization',
    name: 'Highsoft',
    keys: ['from', 'to'],
    data: [
      ['Shareholdersss', 'Board'],
      ['Board', 'CEO'],
      ['CEO', 'CTO'],
      ['CEO', 'CPO'],
      ['CEO', 'CSO'],
      ['CEO', 'HR'],
      ['CTO', 'Product'],
      ['CTO', 'Web'],
      ['CSO', 'Sales'],
      ['HR', 'Market'],
      ['CSO', 'Market'],
      ['HR', 'Market'],
      ['CTO', 'Market']
    ],
    levels: [{
      level: 0,
      color: 'silver',
      dataLabels: {
        color: 'black'
      },
      height: 25
    }, {
      level: 1,
      color: 'silver',
      dataLabels: {
        color: 'black'
      },
      height: 25
    }, {
      level: 2,
      color: '#980104'
    }, {
      level: 4,
      color: '#359154'
    }],
    nodes: [  {
      id: 'CEO',
      title: 'CEO',
      name: 'Atle Sivertsen',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2022/06/30081411/portrett-sorthvitt.jpg'
    }, {
      id: 'HR',
      title: 'CFO',
      name: 'Anne Jorunn Fjærestad',
      color: '#007ad0',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131210/Highsoft_04045_.jpg'
    }, {
      id: 'CTO',
      title: 'CTO',
      name: 'Christer Vasseng',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131120/Highsoft_04074_.jpg'
    }, {
      id: 'CPO',
      title: 'CPO',
      name: 'Torstein Hønsi',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131213/Highsoft_03998_.jpg'
    }, {
      id: 'CSO',
      title: 'CSO',
      name: 'Anita Nesse',
      image: 'https://wp-assets.highcharts.com/www-highcharts-com/blog/wp-content/uploads/2020/03/17131156/Highsoft_03834_.jpg'
    }, {
      id: 'Product',
      name: 'Product developers'
    }, {
      id: 'Web',
      name: 'Web devs, sys admin'
    }, {
      id: 'Sales',
      name: 'Sales team'
    }, {
      id: 'Market',
      name: 'Marketing team',
      column: 5
    }],
    colorByPoint: false,
    color: '#007ad0',
    dataLabels: {
      color: 'white'
    },
    borderColor: 'white',
    nodeWidth: 65
  }],
  tooltip: {
    outside: true
  },
  exporting: {
    allowHTML: true,
    sourceWidth: 800,
    sourceHeight: 600
  }

});

</script>

<?php
    break;
    case 15:
?>
    <section class="dashboard-counts no-padding-bottom personal_dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                    <div class="row">
                        <!-- Item -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Total Autos</span>
                                </div>
                                <div class="number"><strong id="total_autos"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-warning" style="color:white;"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios proximos </span>
                                </div>
                                <div class="number"><strong id="total_servicios_proximos"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios caducados </span>
                                </div>
                                <div class="number"><strong id="total_servicios_caducados"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Servicios al corriente</span>
                                </div>
                                <div class="number"><strong id="total_servicios_corriente"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-3 col-sm-3">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-blue"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Autos sin KM definido</span>
                                </div>
                                <div class="number"><strong id="total_sin_km_definido"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <!--container-fluid-->
        <!-- Work Amount  -->
        <div class="col-xl-12 col-lg-12">
            <div class="work-amount card">
                <div class="card-body">
                    <div class="text-right">
                        <select id="select_anio"></select>
                        <select id="mecanicos" class="mecanicos"></select>
                    </div>
                    <h3>Total servicios por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="servicios_anios_mes" width="800" height="350"></canvas>
                    </div>
                    <h3>Productividad por mes y año</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="productividad_anios_mes" width="800" height="350"></canvas>
                    </div>
                    <h3>Total servicios por mes y año (Comparativa)/h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-servicios-general" width="800" height="350"></canvas>
                    </div>
                    <h3>Productividad por mes y año (Comparativa)</h3><small>Estatus actual</small>
                    <div class="chart text-center">
                        <canvas id="bar-chart-productividad-general" width="800" height="350"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Line Chart            -->
        <div class="chart col-lg-12 col-12">
            <div class="bg-white has-shadow" style="overflow: hidden; padding: 10px 10px 0px 10px;">
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" id="busqueda" name="busqueda">
                </div>
            </div>
            <div class="bg-white d-flex align-items-center justify-content-center has-shadow">
                <canvas width="1100" height="480" id="lineCahrt"></canvas>
            </div>
            <div id="pagination_lineChart" class="bg-white has-shadow" style="padding-bottom: 10px;">
                <ul class="pagination justify-content-center"></ul>
            </div>
        </div>
    </section>
    <script>
        var myBarChartServices1;
        var myBarChartServices2;
        var myLineChartServices;
        var myBarChartServices3;
        var myBarChartServices4;
        function graficas(){
            var select_anio = $('#select_anio');
            var currentYear = new Date().getFullYear();
            for(var r=2021; r<=currentYear; r++){
                select_anio.append($("<option value='" + r + "'>" + r + "</option>"));
            }
            select_anio.val(currentYear);
            select_anio.on("change", function(){
                productiviad_control_vehicular();
            });
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/todoLosMecanicos",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    var mecanicos = $('#mecanicos');
                    mecanicos.append($("<option value=''>Todos</option>"));
                    for(var r=0; r<result.length; r++){
                        mecanicos.append($("<option value='" + result[r].idtbl_users + "'>" + result[r].nombre + "</option>"));
                    }
                    mecanicos.on("change", function(){
                        productiviad_control_vehicular();
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
            var BARCHART = $('#servicios_anios_mes');
            myBarChartServices1 = new Chart(BARCHART, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false }
                }
            });
            var BARCHART2 = $('#productividad_anios_mes');
            myBarChartServices2 = new Chart(BARCHART2, {
                type: 'bar',
                stack: '',
                data: {
                    labels: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                    datasets: [{
                            data: [],
                            borderWidth: [0, 0, 0, 0],
                            backgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ],
                            hoverBackgroundColor: [
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000",
                                '#55e6a0',
                                "#f4e150",
                                "#71d1f2",
                                "#ff0000"
                            ]
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: { display: false },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
            var legendState = true;
            if ($(window).outerWidth() < 576) {
                legendState = false;
            }
            var LINECHART = $('#lineCahrt');
            myLineChartServices = new Chart(LINECHART, {
                type: 'horizontalBar',
                options: {
                    responsive: true,
                    scales: {
                        xAxes: [{
                            stacked: true,
                            display: true,

                        }],
                        yAxes: [{
                            stacked: true,
                            display: true,
                            categoryPercentage: 1.0,
                            barPercentage: 0.5
                        }]
                    },
                    legend: {
                        display: legendState
                    }
                },
                data: {
                    labels: [],
                    datasets: [
                        {
                            label: "Stock mínimo",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#f15765",
                            borderColor: '#f15765',
                            pointBorderColor: '#da4c59',
                            pointHoverBackgroundColor: '#da4c59',
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 0,
                            data: [],
                            spanGaps: false
                        },
                        {
                            label: "Existencias",
                            fill: true,
                            lineTension: 0,
                            backgroundColor: "#54e69d",
                            borderColor: "#54e69d",
                            pointHoverBackgroundColor: "#44c384",
                            borderCapStyle: 'butt',
                            borderDash: [],
                            borderDashOffset: 0.0,
                            borderJoinStyle: 'miter',
                            borderWidth: 1,
                            pointBorderColor: "#44c384",
                            pointBackgroundColor: "#fff",
                            pointBorderWidth: 1,
                            pointHoverRadius: 5,
                            pointHoverBorderColor: "#fff",
                            pointHoverBorderWidth: 2,
                            pointRadius: 1,
                            pointHitRadius: 10,
                            data: [],
                            spanGaps: false
                        }
                    ]
                }
            });
            var BARCHART3 = $("#bar-chart-servicios-general");
            myBarChartServices3 = new Chart(BARCHART3, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    }
                }
            });
            var BARCHART4 = $("#bar-chart-productividad-general");
            myBarChartServices4 = new Chart(BARCHART4, {
                type: 'bar',
                stack: '',
                data: {
                    labels: [],
                    datasets: []
                },
                options: {
                    responsive: true,
                    legend: {
                        display: true
                    },
                    tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] || '';
                                if (label) {
                                    label += ' hora(s)';
                                }
                                return label;
                            }
                        }
                    }
                }
            });
        }

        function indicadores_servicios(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/indicadoresServicios",
                type: "GET",
                dataType: "json",
                success: function(result) {
                    $("#total_autos").html(result.total_autos);
                    $("#total_servicios_corriente").html(result.total_servicios_corriente);
                    $("#total_servicios_caducados").html(result.total_servicios_caducados);
                    $("#total_servicios_proximos").html(result.total_servicios_proximos);
                    $("#total_sin_km_definido").html(result.total_sin_km_definido);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function productiviad_control_vehicular(){
            $.ajax({
                url: "<?= base_url()?>ControlVehicular/productividadControlVehicular",
                type: "POST",
                dataType: "json",
                data: {
                    anio:$('#select_anio').val(),
                    id_mecanicos: $('#mecanicos').val()
                },
                success: function(result) {
                    var servicios_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_servicios_anio_mes[index] != undefined && result.total_servicios_anio_mes[index].mes == (r+1)){
                            servicios_anios_mes[r] = result.total_servicios_anio_mes[index].total;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(servicios_anios_mes[r] == undefined){
                            servicios_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices1.data.datasets[0].data = servicios_anios_mes;
                    myBarChartServices1.update();

                    var productividad_anios_mes = new Array(12);
                    var index = 0;
                    for(var r=0; r<12; r++){
                        if(result.total_productividad_anio_mes[index] != undefined && result.total_productividad_anio_mes[index].mes == (r+1)){
                            productividad_anios_mes[r] = result.total_productividad_anio_mes[index].productividad;
                            index++;
                        }
                    }
                    for(var r=0; r<12; r++){
                        if(productividad_anios_mes[r] == undefined){
                            productividad_anios_mes[r] = "0";
                        }
                    }
                    myBarChartServices2.data.datasets[0].data = productividad_anios_mes;
                    myBarChartServices2.update();

                    // Inicio ...
                    var array_datasets_servicios = [];
                    var array_datasets_productividad = [];

                    var obj = {};
                    for(var r=0; r<result.mecanicos.length; r++){
                        var id_usuario = result.mecanicos[r].idtbl_users;
                        obj[id_usuario] = {nombre: result.mecanicos[r].nombre, data:new Array(12), productividad: new Array(12)};
                        for(var r1=0; r1<result.total_productividad_general_mecanicos_anio.length; r1++){
                            var id_usuario_mantenimiento = result.total_productividad_general_mecanicos_anio[r1].idtbl_users;
                            if(id_usuario == id_usuario_mantenimiento){
                                obj[id_usuario].data[parseInt(result.total_productividad_general_mecanicos_anio[r1].mes)-1] = result.total_productividad_general_mecanicos_anio[r1];
                            }
                        }
                    }
                    var backgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var hoverBackgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var index = 0;
                    var total = 0;
                    
                    for(var key in obj){
                        var item = obj[key];
                        for(var r1=0; r1<item.data.length; r1++){
                            if(item.data[r1] == undefined){
                                item.data[r1] = 0;
                                item.productividad[r1] = 0;
                            }else{
                                item.productividad[r1] = parseInt(item.data[r1].productividad);
                                item.data[r1] = parseInt(item.data[r1].total_servicios);
                                total += item.data[r1];
                            }
                        }
                        if(total > 0){
                            array_datasets_servicios.push({label:item.nombre, data:item.data, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            array_datasets_productividad.push({label:item.nombre, data:item.productividad, backgroundColor:backgroundColor[index], hoverBackgroundColor:hoverBackgroundColor[index]});
                            index++;
                        }
                        total = 0
                    }
                                                            
                    myBarChartServices3.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices3.data.datasets = array_datasets_servicios;
                    myBarChartServices3.update();

                    myBarChartServices4.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                    myBarChartServices4.data.datasets = array_datasets_productividad;
                    myBarChartServices4.update();
                    // Fin ....

                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        function graficar_refacciones_control_vehicular(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/grafica_control_vehicular_refacciones",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChartServices.data.labels = productos;
                    myLineChartServices.data.datasets[0].data = minimos;
                    myLineChartServices.data.datasets[1].data = maximos;
                    myLineChartServices.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_refacciones_control_vehicular(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficas();
        indicadores_servicios();
        productiviad_control_vehicular();
        graficar_refacciones_control_vehicular(0);
        $("#busqueda").on("keyup",function(){
            graficar_refacciones_control_vehicular(0);
        });
    </script>
<?php
    break;
    case 7:

?>
<section class="dashboard-counts no-padding-bottom personal_dashboard">
<?php if(isset($_SESSION['id_user_direccion']) && $this->session->userdata('id_user_direccion') == ""){ ?>
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Compras</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/7">
                        <img src="<?= base_url() ?>img/027.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Almacen General</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/4">
                        <img src="<?= base_url() ?>img/024.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } else{ ?>
    
        <div class="container-fluid">
            <div class="row">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                    <div class="row">
                        <!-- Item -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Total Compras</span>
                                </div>
                                <div class="number"><strong id="total_compras"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-warning" style="color:white;"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Compras Pendientes</span>
                                </div>
                                <div class="number"><strong id="total_compras_pendientes"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Compras Canceladas</span>
                                </div>
                                <div class="number"><strong id="total_compras_canceladas"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Compras Finalizadas</span>
                                </div>
                                <div class="number"><strong id="total_compras_aprobadas"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dashboard-counts no-padding-bottom personal_dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                    <div class="row">
                        <!-- Item -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Total Estimaciones</span>
                                </div>
                                <div class="number"><strong id="total_estimaciones"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-warning" style="color:white;"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Estimaciones Pendientes</span>
                                </div>
                                <div class="number"><strong id="total_estimaciones_pendientes"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Estimaciones Canceladas</span>
                                </div>
                                <div class="number"><strong id="total_estimaciones_canceladas"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Estimaciones Finalizadas</span>
                                </div>
                                <div class="number"><strong id="total_estimaciones_finalizadas"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dashboard-counts no-padding-bottom personal_dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="bg-white has-shadow col-xl-12 col-sm-12">
                    <div class="row">
                        <!-- Item -->
                        <div class="col-xl-12 col-sm-12">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-violet"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Total Pedidos Estimación</span>
                                </div>
                                <div class="number"><strong id="total_pedidos_estimacion"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-warning" style="color:white;"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Pedidos Estimación Pendientes</span>
                                </div>
                                <div class="number"><strong id="total_pedidos_estimacion_pendientes"></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-red"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Pedidos Estimación Canceladas</span>
                                </div>
                                <div class="number"><strong id="total_pedidos_estimacion_canceladas"><?= "" ?></strong></div>
                            </div>
                        </div>
                        <!-- Item -->
                        <div class="col-xl-4 col-sm-4">
                            <div class="item d-flex align-items-center">
                                <div class="icon bg-green"><i class="fa fa-car"></i></div>
                                <div class="title"><span>Pedidos Estimación Finalizadas</span>
                                </div>
                                <div class="number"><strong id="total_pedidos_estimacion_finalizadas"></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section-->
    <section class="client">
        <div class="container-fluid">
            <div class="row">
                <!-- Line Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="work-amount card">
                        <div class="card-body">
                            <h3>Compras por año y mes</h3><small>Estatus actual</small>
                            <div class="text-right">
                                <select id="year" style="width:100%; max-width: 300px;">
                                </select>    
                            </div>
                            <div class="chart text-center">                            
                                <canvas id="bar-chart-compras" width="800" height="350"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
    <script type="text/javascript">

        var BARCHART10 = $("#bar-chart-compras");
        myBarChart10 = new Chart(BARCHART10, {
        type: 'bar',
        stack: '',
        data: {
            labels: [],
            datasets: [{
                label: 2021,
                data: [],
                borderWidth: [0, 0, 0, 0],
                backgroundColor: ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE', '#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'],
                hoverBackgroundColor: ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE', '#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE']
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });

    function yearSelect(){
        var yearSelect = $("#year");
        var anioActual = new Date().getFullYear();
        yearSelect.html("");
        for(var anio=2021; anio<=anioActual; anio++){
            yearSelect.append($("<option value='" + anio + "'>" + anio + "</option>"));
        }
    }

        yearSelect();

        $("#year").on("change",function(){
            productividad_por_usuario();
        });

        $.ajax({
            url: "<?= base_url()?>Compras/indicadoresAreaCompras",
            type: "GET",
            dataType: "json",
            data:{
                year: $("#year").val()
            },
            success: function(result) {
                $("#total_compras").text(result.total_compras);
                $("#total_compras_pendientes").text(result.total_compras_pendientes);
                $("#total_compras_canceladas").text(result.total_compras_canceladas);
                $("#total_compras_aprobadas").text(result.total_compras_aprobadas);

                $("#total_estimaciones").text(result.total_estimaciones);
                $("#total_estimaciones_pendientes").text(result.total_estimaciones_pendientes);
                $("#total_estimaciones_canceladas").text(result.total_estimaciones_canceladas);
                $("#total_estimaciones_finalizadas").text(result.total_estimaciones_finalizadas);

                $("#total_pedidos_estimacion").text(result.total_pedidos_estimacion);
                $("#total_pedidos_estimacion_pendientes").text(result.total_pedidos_estimacion_pendientes);
                $("#total_pedidos_estimacion_canceladas").text(result.total_pedidos_estimacion_canceladas);
                $("#total_pedidos_estimacion_finalizadas").text(result.total_pedidos_estimacion_finalizadas);

                var backgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                    var hoverBackgroundColor = ['#20C48E', '#23BBCA', '#EDE71B', '#DC5B36', '#E04BE7', '#3E4FDE'];
                
                var total_compras = new Array(12);
                var month_index = 0;    
                for(var r=1; r <= 12; r++){
                    if(result.grafica_total_costo_pedidos_mes_anio[month_index] != undefined && r == parseInt(result.grafica_total_costo_pedidos_mes_anio[month_index].month) && result.grafica_total_costo_pedidos_mes_anio[month_index].total != null){
                        total_compras[r-1] = result.grafica_total_costo_pedidos_mes_anio[month_index].total;
                        month_index++;
                    }else{
                        total_compras[r-1] = 0;
                    }  
                }
                myBarChart10.data.labels = ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic"];
                myBarChart10.data.datasets[0].data = total_compras;
                myBarChart10.update();
            },
            error: function(result) {
                console.log("Ocurrio un error, intente mas tarde.")
            }
        });

    </script>

<?php
    break;
  
  case 19:
    ?>
<!-- Client Section-->
<section class="client">
<?php if($this->session->userdata('id') == 71){ ?>
    <section>
    <div class="container-fluid">
<div class="row">
    <div class="col-xl-3">
        <div class="form-group">
            <label>Estatus</label>
            <select id="estatus_herramienta" class="form-control">
                <option value="">Todo</option>
                <option value="RENTA">Renta</option>
                <option value="VENTA">Venta</option>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Empalmadora</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_empalmadora"><?= $total_global_empalmadora ?></strong><br><span>Totales</span>
                </div>
                <canvas id="empalmadorados"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>OTDR</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_otdr"><?= $total_global_otdr ?></strong><br><span>Totales</span>
                </div>
                <canvas id="otdrdos"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Medidor de Tráfico</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_medidor_trafico"><?= $total_global_medidor_trafico ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="medidor_trafico"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Medidor de Potencia</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_power_meter"><?= $total_global_power_meter ?></strong><br><span>Totales</span>
                </div>
                <canvas id="power_meter"></canvas>
                </div>
            </div>
        </div>
    </div>    

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Luz Visible</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text"><strong id="total_global_luz_visible"><?= $total_global_luz_visible ?></strong><br><span>Totales</span>
                </div>
                <canvas id="luz_visible"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Fiber Cleaver</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_fiber_cleaver"><?= $total_global_fiber_cleaver ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="fiber_cleaver"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
<div class="work-amount card">
<div class="card-body">
    <h3>Corte de tubo holgado</h3><small>Estatus actual</small>
    <div class="chart text-center">
        <div class="text">
            <strong id="total_global_corte_tubo_holgado"><?= $total_global_corte_tubo_holgado ?></strong><br><span>Totales</span>
        </div>
        <canvas id="corte_tubo_holgado"></canvas>
    </div>
</div>
</div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="work-amount card">
            <div class="card-body">
                <h3>Corte Longitudinal</h3><small>Estatus actual</small>
                <div class="chart text-center">
                    <div class="text">
                        <strong id="total_global_corte_longitudinal"><?= $total_global_corte_longitudinal ?></strong><br><span>Totales</span>
                    </div>
                    <canvas id="corte_longitudinal"></canvas>
                </div>
            </div>
        </div>
    </div>       
</div>
    </div>   
    <div class="container-fluid">
    <div class="work-amount card">
        <br>
        <div class="row">
        <div class="col-1">&nbsp;</div>
        <div class="col-3">
        <div class= "row">
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Proyecto</label>
                    <select class="form-control" id="proyecto">
                        <option value="">Seleccione...</option>
                        <?php foreach($almacenes_generadores AS $key => $value){ ?>
                            <?php if($value->idtbl_proyectos == 264){ ?>
                            <option value="<?= $value->idtbl_proyectos ?>" selected><?= $value->numero_proyecto ?></option>
                            <?php }else{ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" id="tipo">                        
                        <option value="general" selected>General</option>
                        <option value="red">Tipo red</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">&nbsp;</div>
        </div>
        <div id="padre">
        
        </div>       
            
        </div>

        <div class="work-amount card">
        <br>
        <div class="row">
        <div class="col-1">&nbsp;</div>
        <div class="col-3">
        <div class= "row">
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Proyecto</label>
                    <select class="form-control" id="proyecto">
                        <option value="">Seleccione...</option>
                        <?php foreach($almacenes_generadores AS $key => $value){ ?>
                            <?php if($value->idtbl_proyectos == 264){ ?>
                            <option value="<?= $value->idtbl_proyectos ?>" selected><?= $value->numero_proyecto ?></option>
                            <?php }else{ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">&nbsp;</div>
        </div>        
        <div id="productividad">
        
        </div>
            
        </div>
    </div>    
    </section>
<?php }else{ ?>
    <div class="container-fluid">
    <div class="work-amount card">
        <br>
        <div class="row">
        <div class="col-1">&nbsp;</div>
        <div class="col-3">
        <div class= "row">
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Proyecto</label>
                    <select class="form-control" id="proyecto">
                        <option value="">Seleccione...</option>
                        <?php foreach($almacenes_generadores AS $key => $value){ ?>
                            <?php if($value->idtbl_proyectos == 264){ ?>
                            <option value="<?= $value->idtbl_proyectos ?>" selected><?= $value->numero_proyecto ?></option>
                            <?php }else{ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" id="tipo">                        
                        <option value="general" selected>General</option>
                        <option value="red">Tipo red</option>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">&nbsp;</div>
        </div>
        <div id="padre">
        
        </div>       
            
        </div>

        <div class="work-amount card">
        <br>
        <div class="row">
        <div class="col-1">&nbsp;</div>
        <div class="col-3">
        <div class= "row">
            <div class="col-xl-5">
                <div class="form-group">
                    <label>Proyecto</label>
                    <select class="form-control" id="proyecto">
                        <option value="">Seleccione...</option>
                        <?php foreach($almacenes_generadores AS $key => $value){ ?>
                            <?php if($value->idtbl_proyectos == 264){ ?>
                            <option value="<?= $value->idtbl_proyectos ?>" selected><?= $value->numero_proyecto ?></option>
                            <?php }else{ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"><?= $value->numero_proyecto ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        </div>
        <div class="col-6">&nbsp;</div>
        </div>        
        <div id="productividad">
        
        </div>
            
        </div>
    </div>    
    <?php } ?>
</section>

<script>
        <?php
    echo "var total_costos = ". json_encode($totalCostos). ";\n";   
?>
$(document).ready(function() {

    'use strict';

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        var LINECHART = $('#lineChart');
        var myLineChart = new Chart(LINECHART, {
            type: 'horizontalBar',
            options: {
                responsive: true,

                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,

                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        categoryPercentage: 1.0,
                        barPercentage: 0.5
                    }]
                },
                legend: {
                    display: legendState
                }
            },
            data: {
                labels: [],
                datasets: [{
                        label: "Stock mínimo",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#f15765",
                        borderColor: '#f15765',
                        pointBorderColor: '#da4c59',
                        pointHoverBackgroundColor: '#da4c59',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 0,
                        data: [],
                        spanGaps: false
                    },
                    {
                        label: "Existencias",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#54e69d",
                        borderColor: "#54e69d",
                        pointHoverBackgroundColor: "#44c384",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "#44c384",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                ]
            }
        });

        function graficar_consumibles_alto_costo(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/graficaConsumiblesAltoCosto",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChart.data.labels = productos;
                    myLineChart.data.datasets[0].data = minimos;
                    myLineChart.data.datasets[1].data = maximos;
                    myLineChart.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_consumibles_alto_costo(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

        graficar_consumibles_alto_costo(0);
        $("#busqueda").on("keyup",function(){
            graficar_consumibles_alto_costo(0);
        });

        // ------------------------------------------------------- //
        // Pie Chart
        // ------------------------------------------------------ //
        <?php
    if (isset($estatus_empalmadora)) {
    echo "var array_labels_empalmadora = ". json_encode($estatus_empalmadora ). ";\n";
    echo "var array_total_empalmadora = ".json_encode($total_empalmadora) . ";\n";
    
    ?>

        var PIECHART = $('#empalmadorados');
        var myPieChart1 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_empalmadora,
                datasets: [{
                    data: array_total_empalmadora,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto       
                        '#F79AA8', //color robado
                        '#008902' //color vendido
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8',
                        '#008902'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_otdr)) {
    echo "var array_labels_otdr = ". json_encode($estatus_otdr ). ";\n";
    echo "var array_total_otdr = ".json_encode($total_otdr) . ";\n";
    
    ?>

        var PIECHART = $('#otdrdos');
        var myPieChart2 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_otdr,
                datasets: [{
                    data: array_total_otdr,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado        
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_medidor_trafico)) {
    echo "var array_labels_medidor_trafico = ". json_encode($estatus_medidor_trafico ). ";\n";
    echo "var array_total_medidor_trafico = ".json_encode($total_medidor_trafico) . ";\n";
    
    ?>

        var PIECHART = $('#medidor_trafico');
        var myPieChart3 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_medidor_trafico,
                datasets: [{
                    data: array_total_medidor_trafico,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        '#F79AA8',
                        "#f2993e"

                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_power_meter)) {
    echo "var array_labels_power_meter = ". json_encode($estatus_power_meter). ";\n";
    echo "var array_total_power_meter = ".json_encode($total_power_meter) . ";\n";
    
    ?>

        var PIECHART = $('#power_meter');
        var myPieChart4 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_power_meter,
                datasets: [{
                    data: array_total_power_meter,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#3f65ec", //color justificacion
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#3f65ec",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });
        <?php } ?>


        <?php
    if (isset($estatus_luz_visible)) {
    echo "var array_labels_luz_visible = ". json_encode($estatus_luz_visible ). ";\n";
    echo "var array_total_luz_visible = ".json_encode($total_luz_visible) . ";\n";
    
    ?>

        var PIECHART = $('#luz_visible');
        var myPieChart5 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_luz_visible,
                datasets: [{
                    data: array_total_luz_visible,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#71d1f2", //color descompuesto
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#71d1f2",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });


        <?php
    }
    if (isset($estatus_fiber_cleaver)) {
    echo "var array_labels_fiber_cleaver = ". json_encode($estatus_fiber_cleaver ). ";\n";
    echo "var array_total_fiber_cleaver = ".json_encode($total_fiber_cleaver) . ";\n";
    
    ?>

        var PIECHART = $('#fiber_cleaver');
        var myPieChart6 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_fiber_cleaver,
                datasets: [{
                    data: array_total_fiber_cleaver,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        "#3f65ec", //color justificacion   
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#3f65ec',
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_tubo_holgado)) {
    echo "var array_labels_corte_tubo_holgado = ". json_encode($estatus_corte_tubo_holgado ). ";\n";
    echo "var array_total_corte_tubo_holgado = ".json_encode($total_corte_tubo_holgado) . ";\n";
    
    ?>

        var PIECHART = $('#corte_tubo_holgado');
        var myPieChart7 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_tubo_holgado,
                datasets: [{
                    data: array_total_corte_tubo_holgado,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado                        
                        "#F79AA8", //color robado
                        '#f2993e' //color abuso de confianza
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#F79AA8",
                        '#f2993e'
                    ]
                }]
            }
        });

        <?php
    }
    if (isset($estatus_corte_longitudinal)) {
    echo "var array_labels_corte_longitudinal = ". json_encode($estatus_corte_longitudinal ). ";\n";
    echo "var array_total_corte_longitudinal = ".json_encode($total_corte_longitudinal) . ";\n";
    
    ?>

        var PIECHART = $('#corte_longitudinal');
        var myPieChart8 = new Chart(PIECHART, {
            type: 'doughnut',
            options: {
                cutoutPercentage: 80,
                legend: {
                    display: false
                }
            },
            data: {
                labels: array_labels_corte_longitudinal,
                datasets: [{
                    data: array_total_corte_longitudinal,
                    borderWidth: [0, 0, 0, 0],
                    backgroundColor: [
                        '#55e6a0', //color almacen
                        "#f4e150", //color asignado
                        "#ff0000", //color dañado
                        "#71d1f2", //color descompuesto
                        '#F79AA8' //color robado
                    ],
                    hoverBackgroundColor: [
                        '#55e6a0',
                        "#f4e150",
                        "#ff0000",
                        "#71d1f2",
                        '#F79AA8'
                    ]
                }]
            }
        });

        <?php
    }
    ?>

    $("#estatus_herramienta").on("change", function(){
        var select_estatus_value = $(this).val();
        var array_herramientas = [{tipo:"EMPALMADORA", categoria:"alto"}, {tipo:"OTDR", categoria:"alto"}, {tipo:"MEDIDOR DE TRAFICO", categoria:"mediano"}, {tipo:"POWER METER S", categoria:"mediano"}, {tipo:"LUZ VISIBLE", categoria:"mediano"}, {tipo:"FIBER CLEAVER", categoria:"mediano"}, {tipo:"TUBO HOLGADO", categoria:"mediano"}, {tipo:"CORTE LONGITUDINAL", categoria:"mediano"}];
        var estatus = $('#estatus').val();
        $.ajax({
            url: "<?= base_url()?>Inicio/obtenerHerramientasAltoCostodos",
            type: "POST",
            dataType: "json",
            data: {
                estatus: array_herramientas,
                tipo_estatus: select_estatus_value
            },
            success: function(result) {
                myPieChart1.data.labels = result["EMPALMADORA"].estatus;
                myPieChart1.data.datasets[0].data = result["EMPALMADORA"].total;
                myPieChart1.update();
                $("#total_global_empalmadora").html(result["EMPALMADORA"].total_global);

                myPieChart2.data.labels = result["OTDR"].estatus;
                myPieChart2.data.datasets[0].data = result["OTDR"].total;
                myPieChart2.update();
                $("#total_global_otdr").html(result["OTDR"].total_global);

                myPieChart3.data.labels = result["MEDIDOR DE TRAFICO"].estatus;
                myPieChart3.data.datasets[0].data = result["MEDIDOR DE TRAFICO"].total;
                myPieChart3.update();
                $("#total_global_medidor_trafico").html(result["MEDIDOR DE TRAFICO"].total_global);

                myPieChart4.data.labels = result["POWER METER S"].estatus;
                myPieChart4.data.datasets[0].data = result["POWER METER S"].total;
                myPieChart4.update();
                $("#total_global_power_meter").html(result["POWER METER S"].total_global);

                myPieChart5.data.labels = result["LUZ VISIBLE"].estatus;
                myPieChart5.data.datasets[0].data = result["LUZ VISIBLE"].total;
                myPieChart5.update();
                $("#total_global_luz_visible").html(result["LUZ VISIBLE"].total_global);

                myPieChart6.data.labels = result["FIBER CLEAVER"].estatus;
                myPieChart6.data.datasets[0].data = result["FIBER CLEAVER"].total;
                myPieChart6.update();
                $("#total_global_fiber_cleaver").html(result["FIBER CLEAVER"].total_global);

                myPieChart7.data.labels = result["TUBO HOLGADO"].estatus;
                myPieChart7.data.datasets[0].data = result["TUBO HOLGADO"].total;
                myPieChart7.update();
                $("#total_global_corte_tubo_holgado").html(result["TUBO HOLGADO"].total_global);

                myPieChart8.data.labels = result["CORTE LONGITUDINAL"].estatus;
                myPieChart8.data.datasets[0].data = result["CORTE LONGITUDINAL"].total;
                myPieChart8.update();
                $("#total_global_corte_longitudinal").html(result["CORTE LONGITUDINAL"].total_global);

            },
            error: function(result) {
                console.log("Ocurrio un error, intente mas tarde.")
            }
        });
    });

    }) /*End Pace*/
});
graficar_costos_AC();
        console.log(total_costos);
        var myBarChart5;

        function graficar_costos_AC() {
            var herramientas = [];
            var array_total_costos = [];
            for (var r = 1; r <= total_costos.length; r++) {
                var index = r - 1;
                if (total_costos != undefined) {
                    array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                    herramientas[index] = total_costos[index].categoria;
                } else {
                    array_total_costos[index] = 0;
                }
            }
            //$("#total_ganancias").html(total_ganancias);
            var BARCHART5 = $("#costosAltoCosto");
            myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: herramientas,
                    datasets: [{
                        data: array_total_costos,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: ['#55e6a0', '#71d1f2', '#f2993e'],
                        hoverBackgroundColor: ['#55e6a0', '#71d1f2', '#f2993e']
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

function obtener_costos_estatus(e) {
            //alert('si');
            var estatus = $('#estatus').val();
            $.ajax({
                url: "<?= base_url()?>Inicio/obtenerCostosEstatus",
                type: "POST",
                data: {
                    estatus: estatus
                },
                success: function(result) {
                    result = JSON.parse(result);
                    console.log(result);   
                    var total_costos = result;   
                    var herramientas = [];         
                    var array_total_costos = [];
                    for (var r = 1; r <= total_costos.length; r++) {
                        var index = r - 1;
                        if (total_costos != undefined) {
                            array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                            herramientas[index] = total_costos[index].categoria;
                        } else {
                            array_total_costos[index] = 0;
                        }
                    }                    
                    console.log(myBarChart5.data.labels[0]);                    
                    myBarChart5.data.labels = herramientas;
                    myBarChart5.data.datasets[0].data = array_total_costos;                   
                    console.log(myBarChart5.data.datasets);
                    myBarChart5.update();
                    //$("#total_salidas").html(total_salidas);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            })
        }
        
    </script>

<script>

$(document).ready(function() {

    function graficaAvance(){
        var tipo = $("#tipo").val();
                        
        $('#graficas').remove();
        $('#padre').append('<div class="row" id="graficas">');
            $.ajax({
                url: "<?= base_url()?>inicio/graficaAvanceGeneradores",
                type: "POST",
                data:{
                    proyecto: $("#proyecto").val()
                },
                dataType: "json",
                success: function(result) {
                    console.log(result);
                    for(var r=0; r<result.length; r++){
                        var total_proyecto = 0;
                        var total_primaria = 0;
                        var total_secundaria = 0;
                        var total_distribucion = 0;
                        var total_1n = 0;
                        var total_2n = 0;
                        if(result[r].total_primaria != null){
                            total_primaria = parseFloat(result[r].total_primaria);
                        }
                        if(result[r].total_secundaria != null){                            
                            total_secundaria = parseFloat(result[r].total_secundaria);
                        }
                        if(result[r].total_distribucion != null){
                            total_distribucion = parseFloat(result[r].total_distribucion);
                        }
                        if(result[r].total_1n != null){
                            total_1n = parseFloat(result[r].total_1n);
                        }
                        if(result[r].total_2n != null){
                            total_2n = parseFloat(result[r].total_2n);
                        }
                        total_proyecto = total_primaria + total_secundaria + total_distribucion + total_1n + total_2n;
                        
                        if(result[r].total_justificado != null){
                            var porcentaje_avance = (parseFloat(result[r].total_justificado)/total_proyecto)*100;
                            if(porcentaje_avance > 100){
                                var faltante = 0;
                            }else{
                                var faltante = 100 - porcentaje_avance;
                            }
                        }else{
                            var porcentaje_avance = 0;
                            var faltante = 100;
                        }
                        $('#graficas').append('<div class="col-4"><div class="card-body"><h3>'+result[r].segmento+'</h3><small>Avance</small><div class="chart text-center"><canvas id="generador'+result[r].idtbl_segmentos_proyecto+'"></canvas></div></div></div>');
                        var PIECHART = $('#generador'+result[r].idtbl_segmentos_proyecto);
                        if(tipo == 'general'){                            
                        new Chart(PIECHART, {
                            type: 'pie',
                            options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Chart.js Pie Chart'
                            }
                            }
                        },
                            data: {
                                labels: ['# Avance', '# Faltante'],
                                datasets: [{
                                    data: [porcentaje_avance, faltante],
                                    borderWidth: [0, 0],
                                    backgroundColor: [
                                        '#55e6a0', //color almacen
                                        "#F05A5A" //color asignado                                        
                                    ],
                                    hoverBackgroundColor: [
                                        '#55e6a0',
                                        "#F05A5A"                                        
                                    ]
                                }]
                            }
                        });
                        }else{
                            var justificado_primaria = 0;
                            var justificado_secundaria = 0;
                            var justificado_distribucion = 0;
                            var justificado_1n = 0;
                            var justificado_2n = 0;

                            var porcentaje_primaria = 0;
                            var porcentaje_secundaria = 0;
                            var porcentaje_distribucion = 0;
                            var porcentaje_1n = 0;
                            var porcentaje_2n = 0;

                            if(parseFloat(result[r].justificado_primaria) != null){
                                justificado_primaria = parseFloat(result[r].justificado_primaria);
                            }
                            if(parseFloat(result[r].justificado_secundaria) != null){
                                justificado_secundaria = parseFloat(result[r].justificado_secundaria);
                            }
                            if(parseFloat(result[r].justificado_distribucion) != null){
                                justificado_distribucion = parseFloat(result[r].justificado_distribucion);
                            }
                            if(parseFloat(result[r].justificado_1n) != null){
                                justificado_1n = parseFloat(result[r].justificado_1n);
                            }
                            if(parseFloat(result[r].justificado_2n) != null){
                                justificado_2n = parseFloat(result[r].justificado_2n);
                            }

                            
                            var porcentaje_primaria = (justificado_primaria/total_primaria)*100;  
                            var porcentaje_secundaria = (justificado_secundaria/total_secundaria)*100;
                            var porcentaje_distribucion = (justificado_distribucion/total_distribucion)*100;
                            var porcentaje_1n = (justificado_1n/total_1n)*100;
                            var porcentaje_2n = (justificado_2n/total_2n)*100;
                            
                            new Chart(PIECHART, {
                            type: 'pie',
                            options: {
                            responsive: true,
                            plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Chart.js Pie Chart'
                            }
                            }
                        },
                            data: {
                                labels: ['# Primaria', '# Secundaria', '# Distribucion', '# 1N', '# 2N'],
                                datasets: [{
                                    data: [porcentaje_primaria, porcentaje_secundaria, porcentaje_distribucion, porcentaje_1n, porcentaje_2n],
                                    borderWidth: [0, 0, 0, 0, 0],
                                    backgroundColor: [
                                        '#55e6a0',
                                        "#F05A5A",
                                        "#E1C539",
                                        "#2CC6B1",
                                        "#BE4CF4"
                                    ],
                                    hoverBackgroundColor: [
                                        '#55e6a0',
                                        "#F05A5A",
                                        "#E1C539",
                                        "#2CC6B1",
                                        "#BE4CF4"
                                    ]
                                }]
                            }
                        });
                        }
                    }
                    
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
    }

    graficaAvance();

    $("#proyecto").on("change", function(){
        graficaAvance();
    });

    $("#tipo").on("change", function(){
        graficaAvance();
    });
    

    Pace.on('done', function() {
        // ------------------------------------------------------- //
        // Line Chart
        // ------------------------------------------------------ //
        var legendState = true;
        if ($(window).outerWidth() < 576) {
            legendState = false;
        }

        var LINECHART = $('#lineChart');
        var myLineChart = new Chart(LINECHART, {
            type: 'horizontalBar',
            options: {
                responsive: true,

                scales: {
                    xAxes: [{
                        stacked: true,
                        display: true,

                    }],
                    yAxes: [{
                        stacked: true,
                        display: true,
                        categoryPercentage: 1.0,
                        barPercentage: 0.5
                    }]
                },
                legend: {
                    display: legendState
                }
            },
            data: {
                labels: [],
                datasets: [{
                        label: "Stock mínimo",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#f15765",
                        borderColor: '#f15765',
                        pointBorderColor: '#da4c59',
                        pointHoverBackgroundColor: '#da4c59',
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 0,
                        data: [],
                        spanGaps: false
                    },
                    {
                        label: "Existencias",
                        fill: true,
                        lineTension: 0,
                        backgroundColor: "#54e69d",
                        borderColor: "#54e69d",
                        pointHoverBackgroundColor: "#44c384",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        borderWidth: 1,
                        pointBorderColor: "#44c384",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBorderColor: "#fff",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: [],
                        spanGaps: false
                    }
                ]
            }
        });

        function graficar_consumibles_alto_costo(offset){
            $.ajax({
                url: "<?= base_url()?>inicio/graficaConsumiblesAltoCosto",
                type: "POST",
                data:{
                    offset:offset,
                    busqueda: $("#busqueda").val()
                },
                dataType: "json",
                success: function(result) {
                    var productos = [];
                    var minimos = [];
                    var maximos = [];
                    for(var r=0; r<result.registros.length; r++){
                        productos.push(result.registros[r].descripcion);
                        minimos.push(parseFloat(result.registros[r].minimo));
                        maximos.push(parseFloat(result.registros[r].existencias));
                    }
                    myLineChart.data.labels = productos;
                    myLineChart.data.datasets[0].data = minimos;
                    myLineChart.data.datasets[1].data = maximos;
                    myLineChart.update();
                    
                    var pagination = $("#pagination_lineChart ul");
                    pagination.html("");
                    var totalPagination = Math.ceil(result.total/result.limit);
                    if(totalPagination == 0){
                        totalPagination = 1;
                    }
                    var currentPagination = result.offset/result.limit+1;
                    var startPagination;
                    var endPagination;
                    if(currentPagination == 1){
                        startPagination = 1;
                        endPagination = 3;
                    }else if(currentPagination == totalPagination){
                        startPagination = totalPagination - 2;
                        endPagination = totalPagination;
                    }else{
                        startPagination = currentPagination - 1;
                        endPagination = currentPagination + 1;
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='1'><<</a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((startPagination - 1) >= 1 ? (startPagination - 1) : 1) + "'><</a>");
                    for(var r=startPagination; r<=endPagination; r++){
                        if(r<=totalPagination){
                            pagination.append("<li class='page-item "  + (r == currentPagination ? "active" : "") + " '><a href='#' class='page-link' data-index='" + r + "'>" + r + "</a></li>");
                        }else{
                            break;
                        }
                    }
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + ((endPagination + 1) <= totalPagination ? (endPagination + 1) : totalPagination) + "'>></a></li>");
                    pagination.append("<li class='page-item'><a href='#' class='page-link' data-index='" + totalPagination + "'>>></a></li>");
                    pagination.find("a").on('click',function(event){
                        event.preventDefault();
                        var index = $(this).data("index");
                        var offset = (index - 1) * result.limit;
                        graficar_consumibles_alto_costo(offset);
                    });
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });
        }

    /*graficar_consumibles_alto_costo(0);
        $("#busqueda").on("keyup",function(){
            graficar_consumibles_alto_costo(0);
        });*/

    }) /*End Pace*/
});
/*graficar_costos_AC();
        console.log(total_costos);
        var myBarChart5;

        function graficar_costos_AC() {
            var herramientas = [];
            var array_total_costos = [];
            for (var r = 1; r <= total_costos.length; r++) {
                var index = r - 1;
                if (total_costos != undefined) {
                    array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                    herramientas[index] = total_costos[index].categoria;
                } else {
                    array_total_costos[index] = 0;
                }
            }
            //$("#total_ganancias").html(total_ganancias);
            var BARCHART5 = $("#costosAltoCosto");
            myBarChart5 = new Chart(BARCHART5, {
                type: 'bar',
                stack: '',
                data: {
                    labels: herramientas,
                    datasets: [{
                        data: array_total_costos,
                        borderWidth: [0, 0, 0, 0],
                        backgroundColor: ['#55e6a0', '#71d1f2', '#f2993e'],
                        hoverBackgroundColor: ['#55e6a0', '#71d1f2', '#f2993e']
                    }]
                },
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

function obtener_costos_estatus(e) {
            //alert('si');
            var estatus = $('#estatus').val();
            $.ajax({
                url: "<?= base_url()?>Inicio/obtenerCostosEstatus",
                type: "POST",
                data: {
                    estatus: estatus
                },
                success: function(result) {
                    result = JSON.parse(result);
                    console.log(result);   
                    var total_costos = result;   
                    var herramientas = [];         
                    var array_total_costos = [];
                    for (var r = 1; r <= total_costos.length; r++) {
                        var index = r - 1;
                        if (total_costos != undefined) {
                            array_total_costos[index] = parseFloat(total_costos[index].precio).toFixed(2);
                            herramientas[index] = total_costos[index].categoria;
                        } else {
                            array_total_costos[index] = 0;
                        }
                    }                    
                    console.log(myBarChart5.data.labels[0]);                    
                    myBarChart5.data.labels = herramientas;
                    myBarChart5.data.datasets[0].data = array_total_costos;                   
                    console.log(myBarChart5.data.datasets);
                    myBarChart5.update();
                    //$("#total_salidas").html(total_salidas);
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            })
        }*/
        
</script>

<?php
    break;
    case 22:
?>
<section class="client">
<div class=container-fluid>
<div class="card">
          <div class="card-header">
            <h4 class="h4">Asignaciones
            </h4>
          </div>
          <div class="card-body grid-form">
            <div style="padding-top: 10px;">            
              <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <!-- Tabs que verán almacén, alto costo y RH -->
              
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                    Almacen general
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
                    Alto costo
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                    Kuali
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                    Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
                    Área Médica
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                    Sistemas
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-seguridad-e-higiene-tab" data-toggle="pill" href="#pills-seguridad-e-higiene" role="tab" aria-controls="pills-seguridad-e-higiene" aria-selected="false">
                    Seguridad e Higiene
                  </a>
                </li>
            </ul>
              <!-- /Tabs almacén y alto costo -->

              <div class="tab-content" id="pills-tabContent">
                <!-- Datos a mostrar en Alto Costo y RH -->
                
                <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAG) : ?>
                          <?php foreach ($asignacionesAG as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>
                            <?php endif ?>
                          <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                          <th>$<?= number_format($total, 2) ?></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="1">Justificar Material</button>
                    </div>
                    <?php } ?>
                </div>
                <div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
                  <!---->
        
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAC) : ?>
                          <?php foreach ($asignacionesAC as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="2">Justificar Material</button>
                    </div>
                    <?php } ?>
                  <?php if ($this->session->userdata('tipo') == '1') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_herramienta" class="btn btn-secondary">Nueva
                        asignación Herramienta</button>
                      <button type="button" id="nuevaAsignacion_alto-costo" class="btn btn-warning">Nueva asignación
                        Activo Fijo</button>
                      <!--<button type="button" id="nuevaAsignacion_hilti" class="btn btn-success">Nueva asignación
            HILTI</button>-->
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">Nueva asignación
                        Consumible</button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">Retirar
                        consumible y/o herramienta</a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                </div>
                <div class="tab-pane fade" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesKualiT) : ?>
                          <?php foreach ($asignacionesKualiT as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="16">Justificar Material</button>
                    </div>
                    <?php } ?>
                </div>
                <!--tab de control vehicular-->
                <div class="tab-pane fade" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAutosControlVehicular) : ?>
                          <?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 14 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="28">Justificar Material</button>
                    </div>
                    <?php } ?>
                  <hr>
                                    <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <?php if(sizeof($prueba_manejo) == 0) { ?>
                        <button type="button" id="pruebaManejo" class="btn btn-secondary">
                          Prueba de Manejo
                        </button>
                      <?php } ?>
                      <?php if(sizeof($prueba_manejo) != 0) { ?>
                        <button type="button" id="pruebaManejoA" class="btn btn-secondary">
                          Editar Prueba de Manejo
                        </button>
                      <?php } ?>
                      <button type="button" id="nuevaAsignacion_control-vehicular" class="btn btn-warning">
                        Nueva asignación de Control Vehicular
                      </button>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab control vehicular-->

                <!-- Tab Área Médica -->
                <div class="tab-pane fade" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAreaMedica) : ?>
                          <?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="23">Justificar Material</button>
                    </div>
                    <?php } ?>
                  
                </div>
                    <!-- /Tab de área Médica -->

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="29">Justificar Material</button>
                    </div>
                    <?php } ?>
                  <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab refacciones control vehicular-->

                    <!--tab tarjetas-->
                <div class="tab-pane fade" id="pills-tarjetas" role="tabpanel" aria-labelledby="pills-tarjetas-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 3) { ?>
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_refaccion" class="btn btn-dark">
                        Nueva asignación refacción
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>/refacciones" class="btn btn-danger">
                        Retirar refacción
                      </a>
                    </div>
                  <?php } ?>
                </div>
                <!--fin de tab tarjetas-->

                <!--Inicio de tab sistemas-->
                <div class="tab-pane fade" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <!---->
                  <!--<a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>-->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesSistemas) : ?>
                          <?php foreach ($asignacionesSistemas as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if($this->session->userdata('tipo') == 5){ ?>
                  <div class="card-footer">
                      <button type="button" id="justificar_materiales" class="btn btn-info" value="30">Justificar Material</button>
                    </div>
                    <?php } ?>
                  <?php if ($this->session->userdata('tipo') == '2') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_sistemas" class="btn btn-warning">
                        Nueva asignación Activo Fijo
                      </button>
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">
                        Nueva asignación Consumible
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">
                        Retirar material
                      </a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                </div>
                <!--Fin de tab sistemas-->
                <div class="tab-pane fade" id="pills-seguridad-e-higiene" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <!---->
                  <!--<a class="btn btn-info" href="<?php echo base_url() ?>personal/impAsignacionesAC/<?php echo $uid; ?>" onClick="openWin(this)"><i class="fa fa-print"><span></i>Imprimir Asignaciones</span></a>-->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Serie</th>
                          <th>N° Interno</th>
                          <th>Marca</th>
                          <th>Modelo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nota</th>
                          <th>Precio</th>
                          <th>Total</th>
                          <th># Proyecto</th>
                          <th>Proyecto</th>
                          <th>Nombre Personal</th>
                          <?php if($this->session->userdata("tipo") == 5){ ?>
                            <th>Acciones</th>
                          <?php } ?>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
                            <?php if ($value->total != 0 && $value->cantidad != 0 && ($value->total > 0 || $value->cantidad > 0)) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh != NULL ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo $value->numero_serie ?></td>
                                <td><?php echo $value->numero_interno ?></td>
                                <td><?php echo $value->marca ?></td>
                                <td><?php echo $value->modelo ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php echo $value->nota ?></td>
                                <?php if ($value->tipo_moneda == 'd') : ?>
                                  <?php $value->precio = $value->precio * $precio_dolar;
                                  $total += $value->precio * $value->cantidad ?>
                                <?php endif ?>
                                <td>$<?php echo number_format($value->precio, 2) ?></td>
                                <td>$<?php echo number_format(($value->precio * $value->cantidad), 2) ?></td>
                                <td><?php echo $value->numero_proyecto ?></td>
                                <td><?php echo $value->nombre_proyecto ?></td>
                                <td><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></td>
                                <?php if($this->session->userdata("tipo") == 5){ ?>
                                  <td><?php if($value->estatus_devolucion_rh == NULL){ ?><a class="btn" data-iddtl-asignacion="<?= $value->iddtl_asignacion ?>" data-toggle="modal" data-target="#justificar_asignacion"><i class="fa fa-upload" aria-hidden="true"></i></a> <?php } else { ?> <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a><?php } ?></td>
                                <?php } ?>
                              </tr>

                            <?php endif ?>


                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                      <tr>
                        <th colspan="<?= $this->session->userdata("tipo") == 5 ? 16 : 15 ?>" style="text-align:right">Total:</th>
                        <th>$<?= number_format($total, 2) ?></th>
                      </tr>

                    </table>
                  </div>
                  <?php if ($this->session->userdata('tipo') == '2') : ?>
                    <!-- Si el usuario es de alto costo -->
                    <div class="card-footer">
                      <button type="button" id="nuevaAsignacion_sistemas" class="btn btn-warning">
                        Nueva asignación Activo Fijo
                      </button>
                      <button type="button" id="nuevaAsignacion_material" class="btn btn-dark">
                        Nueva asignación Consumible
                      </button>
                      <a href="<?php echo base_url() ?>almacen/devolucion/<?= $detalle->uid_usuario ?>" class="btn btn-danger">
                        Retirar material
                      </a>
                      <a href="<?php echo base_url() . 'almacen/detalle-personal/' . $detalle->uid_usuario ?>" class="btn btn-info" onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-info-circle"></i></a>
                    </div>
                  <?php endif ?>
                </div>

                 
                  <!-- /Datos Alto Costo y RH -->
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <?php
    break;
    case 23:
  ?>
<!-- Client Section-->
<section class="client">
    <div class="container-fluid">
        <div class="row">
            <!-- Line Chart -->
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Alto Costo</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/1">
                        <img src="<?= base_url() ?>img/022.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-3 col-lg-3">
                <div class="work-amount card" style="text-align: center;">
                    <div class="card-body">
                        <h3>Perfil</h3>
                        <h1>Almacen General</h1>
                        <a href="<?= base_url() ?>inicio/cambio-perfil/4">
                        <img src="<?= base_url() ?>img/024.png" class="imagen_direccion">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    break;
    default:
  ?>
<section class="tables">
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center">
                <img src="<?= base_url()?>uploads/estevez-background.jpg" class="d-inline-block">
            </div>
        </div>
    </div>
</section> 
<?php
    break;
} ?>
<?php /* ?>
<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        <div class="row bg-white has-shadow">
            <!-- Item -->
            <div class="col-xl-3 col-sm-6">
                <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="icon-user"></i></div>
                    <div class="title"><span>New<br>Clients</span>
                        <div class="progress">
                            <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
              </div>
            </div>
            <div class="number"><strong>25</strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-red"><i class="icon-padnote"></i></div>
            <div class="title"><span>Work<br>Orders</span>
              <div class="progress">
                <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
              </div>
            </div>
            <div class="number"><strong>70</strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-green"><i class="icon-bill"></i></div>
            <div class="title"><span>New<br>Invoices</span>
              <div class="progress">
                <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
              </div>
            </div>
            <div class="number"><strong>40</strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-orange"><i class="icon-check"></i></div>
            <div class="title"><span>Open<br>Cases</span>
              <div class="progress">
                <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
              </div>
            </div>
            <div class="number"><strong>50</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Dashboard Header Section    -->
  <section class="dashboard-header">
    <div class="container-fluid">
      <div class="row">
        <!-- Statistics -->
        <div class="statistics col-lg-3 col-12">
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-red"><i class="fa fa-tasks"></i></div>
            <div class="text"><strong>234</strong><br><small>Applications</small></div>
          </div>
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-green"><i class="fa fa-calendar-o"></i></div>
            <div class="text"><strong>152</strong><br><small>Interviews</small></div>
          </div>
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-orange"><i class="fa fa-paper-plane-o"></i></div>
            <div class="text"><strong>147</strong><br><small>Forwards</small></div>
          </div>
        </div>
        <!-- Line Chart            -->
        <div class="chart col-lg-6 col-12">
          <div class="line-chart bg-white d-flex align-items-center justify-content-center has-shadow">
            <canvas id="lineCahrt"></canvas>
          </div>
        </div>
        <div class="chart col-lg-3 col-12">
          <!-- Bar Chart   -->
          <div class="bar-chart has-shadow bg-white">
            <div class="title"><strong class="text-violet">95%</strong><br><small>Current Server Uptime</small></div>
            <canvas id="barChartHome"></canvas>
          </div>
          <!-- Numbers-->
          <div class="statistic d-flex align-items-center bg-white has-shadow">
            <div class="icon bg-green"><i class="fa fa-line-chart"></i></div>
            <div class="text"><strong>99.9%</strong><br><small>Success Rate</small></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Projects Section-->
  <section class="projects no-padding-top">
    <div class="container-fluid">
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="img/project-1.jpg" alt="..." class="img-fluid"></div>
              <div class="text">
                <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
              </div>
            </div>
            <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
            <div class="comments"><i class="fa fa-comment-o"></i>20</div>
            <div class="project-progress">
              <div class="progress">
                <div role="progressbar" style="width: 45%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="img/project-2.jpg" alt="..." class="img-fluid"></div>
              <div class="text">
                <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
              </div>
            </div>
            <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
            <div class="comments"><i class="fa fa-comment-o"></i>20</div>
            <div class="project-progress">
              <div class="progress">
                <div role="progressbar" style="width: 60%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="img/project-3.jpg" alt="..." class="img-fluid"></div>
              <div class="text">
                <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
              </div>
            </div>
            <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
            <div class="comments"><i class="fa fa-comment-o"></i>20</div>
            <div class="project-progress">
              <div class="progress">
                <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project-->
      <div class="project">
        <div class="row bg-white has-shadow">
          <div class="left-col col-lg-6 d-flex align-items-center justify-content-between">
            <div class="project-title d-flex align-items-center">
              <div class="image has-shadow"><img src="img/project-4.jpg" alt="..." class="img-fluid"></div>
              <div class="text">
                <h3 class="h4">Project Title</h3><small>Lorem Ipsum Dolor</small>
              </div>
            </div>
            <div class="project-date"><span class="hidden-sm-down">Today at 4:24 AM</span></div>
          </div>
          <div class="right-col col-lg-6 d-flex align-items-center">
            <div class="time"><i class="fa fa-clock-o"></i>12:00 PM </div>
            <div class="comments"><i class="fa fa-comment-o"></i>20</div>
            <div class="project-progress">
              <div class="progress">
                <div role="progressbar" style="width: 50%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Client Section-->
  <section class="client no-padding-top">
    <div class="container-fluid">
      <div class="row">
        <!-- Work Amount  -->
        <div class="col-lg-4">
          <div class="work-amount card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard1" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body">
              <h3>Work Hours</h3><small>Lorem ipsum dolor sit amet.</small>
              <div class="chart text-center">
                <div class="text"><strong>90</strong><br><span>Hours</span></div>
                <canvas id="pieChart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <!-- Client Profile -->
        <div class="col-lg-4">
          <div class="client card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard2" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body text-center">
              <div class="client-avatar"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle">
                <div class="status bg-green"></div>
              </div>
              <div class="client-title">
                <h3>Jason Doe</h3><span>Web Developer</span><a href="#">Follow</a>
              </div>
              <div class="client-info">
                <div class="row">
                  <div class="col-4"><strong>20</strong><br><small>Photos</small></div>
                  <div class="col-4"><strong>54</strong><br><small>Videos</small></div>
                  <div class="col-4"><strong>235</strong><br><small>Tasks</small></div>
                </div>
              </div>
              <div class="client-social d-flex justify-content-between"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a><a href="#" target="_blank"><i class="fa fa-twitter"></i></a><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a><a href="#" target="_blank"><i class="fa fa-instagram"></i></a><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></div>
            </div>
          </div>
        </div>
        <!-- Total Overdue             -->
        <div class="col-lg-4">
          <div class="overdue card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard3" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-body">
              <h3>Total Overdue</h3><small>Lorem ipsum dolor sit amet.</small>
              <div class="number text-center">$20,000</div>
              <div class="chart">
                <canvas id="lineChart1">                               </canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Feeds Section-->
  <section class="feeds no-padding-top">
    <div class="container-fluid">
      <div class="row">
        <!-- Trending Articles-->
        <div class="col-lg-6">
          <div class="articles card">
            <div class="card-close">
              <div class="dropdown">
                <button type="button" id="closeCard4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                <div aria-labelledby="closeCard4" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
              </div>
            </div>
            <div class="card-header d-flex align-items-center">
              <h2 class="h3">Trending Articles   </h2>
              <div class="badge badge-rounded bg-green">4 New       </div>
            </div>
            <div class="card-body no-padding">
              <div class="item d-flex align-items-center">
                <div class="image"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="text"><a href="#">
                  <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Aria Smith.   </small></div>
                </div>
                <div class="item d-flex align-items-center">
                  <div class="image"><img src="img/avatar-2.jpg" alt="..." class="img-fluid rounded-circle"></div>
                  <div class="text"><a href="#">
                    <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Frank Williams.   </small></div>
                  </div>
                  <div class="item d-flex align-items-center">
                    <div class="image"><img src="img/avatar-3.jpg" alt="..." class="img-fluid rounded-circle"></div>
                    <div class="text"><a href="#">
                      <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Ashley Wood.   </small></div>
                    </div>
                    <div class="item d-flex align-items-center">
                      <div class="image"><img src="img/avatar-4.jpg" alt="..." class="img-fluid rounded-circle"></div>
                      <div class="text"><a href="#">
                        <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Jason Doe.   </small></div>
                      </div>
                      <div class="item d-flex align-items-center">
                        <div class="image"><img src="img/avatar-5.jpg" alt="..." class="img-fluid rounded-circle"></div>
                        <div class="text"><a href="#">
                          <h3 class="h5">Lorem Ipsum Dolor</h3></a><small>Posted on 5th June 2017 by Sam Martinez.   </small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Check List -->
                  <div class="col-lg-6">
                    <div class="checklist card">
                      <div class="card-close">
                        <div class="dropdown">
                          <button type="button" id="closeCard5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard5" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                      </div>
                      <div class="card-header d-flex align-items-center">           
                        <h2 class="h3">To Do List </h2>
                      </div>
                      <div class="card-body no-padding">
                        <div class="item d-flex">
                          <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                          <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-2" name="input-2" class="checkbox-template">
                          <label for="input-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-3" name="input-3" class="checkbox-template">
                          <label for="input-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                          <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                          <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                          <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- Updates Section                                                -->
            <section class="updates no-padding-top">
              <div class="container-fluid">
                <div class="row">
                  <!-- Recent Updates-->
                  <div class="col-lg-4">
                    <div class="recent-updates card">
                      <div class="card-close">
                        <div class="dropdown">
                          <button type="button" id="closeCard6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard6" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                      </div>
                      <div class="card-header">
                        <h3 class="h4">Recent Updates</h3>
                      </div>
                      <div class="card-body no-padding">
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>May</span></div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>May</span></div>
                        </div>
                        <!-- Item        -->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>May</span></div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>May</span></div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>May</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Daily Feeds -->
                  <div class="col-lg-4">
                    <div class="daily-feeds card"> 
                      <div class="card-close">
                        <div class="dropdown">
                          <button type="button" id="closeCard7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard7" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                      </div>
                      <div class="card-header">
                        <h3 class="h4">Daily Feeds</h3>
                      </div>
                      <div class="card-body no-padding">
                        <!-- Item-->
                        <div class="item">
                          <div class="feed d-flex justify-content-between">
                            <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-5.jpg" alt="person" class="img-fluid rounded-circle"></a>
                              <div class="content">
                                <h5>Aria Smith</h5><span>Posted a new blog </span>
                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                              </div>
                            </div>
                            <div class="date text-right"><small>5min ago</small></div>
                          </div>
                        </div>
                        <!-- Item-->
                        <div class="item"> 
                          <div class="feed d-flex justify-content-between">
                            <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle"></a>
                              <div class="content">
                                <h5>Frank Williams</h5><span>Posted a new blog </span>
                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                                <div class="CTAs"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-heart"> </i>Love    </a></div>
                              </div>
                            </div>
                            <div class="date text-right"><small>5min ago</small></div>
                          </div>
                        </div>
                        <!-- Item-->
                        <div class="item clearfix">
                          <div class="feed d-flex justify-content-between">
                            <div class="feed-body d-flex justify-content-between"><a href="#" class="feed-profile"><img src="img/avatar-3.jpg" alt="person" class="img-fluid rounded-circle"></a>
                              <div class="content">
                                <h5>Ashley Wood</h5><span>Posted a new blog </span>
                                <div class="full-date"><small>Today 5:60 pm - 12.06.2014</small></div>
                              </div>
                            </div>
                            <div class="date text-right"><small>5min ago</small></div>
                          </div>
                          <div class="quote has-shadow"> <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. Over the years.</small></div>
                          <div class="CTAs pull-right"><a href="#" class="btn btn-xs btn-secondary"><i class="fa fa-thumbs-up"> </i>Like</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Recent Activities -->
                  <div class="col-lg-4">
                    <div class="recent-activities card">
                      <div class="card-close">
                        <div class="dropdown">
                          <button type="button" id="closeCard8" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                          <div aria-labelledby="closeCard8" class="dropdown-menu dropdown-menu-right has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                        </div>
                      </div>
                      <div class="card-header">
                        <h3 class="h4">Recent Activities</h3>
                      </div>
                      <div class="card-body no-padding">
                        <div class="item">
                          <div class="row">
                            <div class="col-4 date-holder text-right">
                              <div class="icon"><i class="icon-clock"></i></div>
                              <div class="date"> <span>6:00 am</span><span class="text-info">6 hours ago</span></div>
                            </div>
                            <div class="col-8 content">
                              <h5>Meeting</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="row">
                            <div class="col-4 date-holder text-right">
                              <div class="icon"><i class="icon-clock"></i></div>
                              <div class="date"> <span>6:00 am</span><span class="text-info">6 hours ago</span></div>
                            </div>
                            <div class="col-8 content">
                              <h5>Meeting</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                        </div>
                        <div class="item">
                          <div class="row">
                            <div class="col-4 date-holder text-right">
                              <div class="icon"><i class="icon-clock"></i></div>
                              <div class="date"> <span>6:00 am</span><span class="text-info">6 hours ago</span></div>
                            </div>
                            <div class="col-8 content">
                              <h5>Meeting</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
<script src="<?php echo base_url() ?>js/charts-home.js"></script>

<?php */ ?>