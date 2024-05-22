<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
        <div class="row">
            <!-- Item -->
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/generar-mantenimiento"{ class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Crear<br>Generador</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <?php } ?>
    </div>
</section>
<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Mantenimientos</h4>

                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbtickets">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Fecha Creación</th>
                                        <th>Autor</th>                                        
                                        <th>Ciudad / Mercado</th>
                                        <th>ID PANDA</th>
                                        <th>Progreso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Fecha Creación</th>
                                        <th>Autor</th>                                        
                                        <th>Ciudad / Mercado</th>
                                        <th>ID PANDA</th>
                                        <th>Progreso</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>

                            </table>
                            <br>
                            <div class="paginacion">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    selectBuscar = "";
    mostrarDatos("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
    });

});


function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarMantenimientos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            $.each(response.mantenimientos, function(key, item) {
                var class_mantenimiento = "";
                var progreso = 0;
                var clase_bar = "bg-red";
                if(item.estatus == 'creado'){
                    class_mantenimiento = 'table-warning';
                    progreso = 25;                    
                }else if(item.estatus == 'SV'){
                    class_mantenimiento = 'table-warning';
                    progreso = 50;                    
                }else if(item.estatus == 'SP'){
                    class_mantenimiento = 'table-info';
                    progreso = 75;
                    clase_bar = "bg-yellow";
                }else if(item.estatus == 'SPM'){
                    class_mantenimiento = 'table-success';
                    progreso = 100;
                    clase_bar = "bg-green";
                }else if(item.estatus == 'cancelado'){
                    class_mantenimiento = 'table-danger';
                    progreso = 0;
                    clase_bar = "bg-red";
                }
                filas += "<tr class='"+class_mantenimiento+"'>";
                filas += "<td>" + item.razon_social + "</td>";
                filas += "<td>" + item.fecha + "</td>";
                filas += "<td>" + item.autor + "</td>";
                if(item.market != null){
                    filas += "<td>" + item.market + "</td>";
                }else{
                    filas += "<td>" + item.ciudad_mercado + "</td>";
                }
                filas += "<td>" + item.id_panda + "</td>";
                filas += "<td align='center'>"+progreso+"%<div class='progress' style='height: 4px;'><div role='progressbar' style='width:" + progreso + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase_bar + "'></div></div>" + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle_servicio/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
                filas += "</tr>";
            });
            $('#tbtickets tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
           
            if (linkSeleccionado > 1) {
                paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                    "' class='page-link'>&lsaquo;</a></li>";
            } else {
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            }
            cant = 2;
            pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
            if (numeroLinks > cant) {
                pagRestantes = numeroLinks - linkSeleccionado;
                pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
            } else {
                pagFin = numeroLinks;
            }
            for (var i = pagInicio; i <= pagFin; i++) {
                if (i == linkSeleccionado) {
                    paginador +=
                        "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                        i + "</a></li>";
                } else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                        "</a></li>";
                }
            }
            if (linkSeleccionado < numeroLinks) {
                paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                    "' class='page-link'>&rsaquo;</a></li>";
                paginador += "<li class='page-item'><a href='" + numeroLinks +
                    "' class='page-link'>&raquo;</a></li>";
            } else {
                paginador +=
                    "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                paginador +=
                "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
            }
            paginador += "</ul>";
            $(".paginacion").html(paginador);
        }
    });
}
</script>