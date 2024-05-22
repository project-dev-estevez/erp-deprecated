<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <!-- Item -->
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>personal/nueva_solicitud_acta" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Solicitar Acta<br>Administrativa</span>
                  </div>
                </div>
              </a>
            </div>
          </div>                    
        </div>
    </div>
</section>
<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Actas Adminisrativas</h4>

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
                                        <th data-priority="1">Id acta</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Motivo</th>
                                        <th>Detalle</th>
                                        <th>Recibe</th>
                                        <th>Estatus</th>                                        
                                        <th>Porcentaje</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($acta as $notas){ ?>
                                <td><?php ($notas ['id_actas']) ?></td>
                                <?php } ?>
                                <tbody>                                    
                                                                    
                                </tbody>                                                                                                                                    
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">Id acta</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Motivo</th>
                                        <th>Detalle</th>
                                        <th>Recibe</th>
                                        <th>Estatus</th>
                                        <th>Porcentaje</th>                                        
                                        <th></th>
                                    </tr>
                                </tfoot>                                                               
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
        url: "<?= base_url() ?>personal/verActas",
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
            $.each(response.tickets, function(key, item) {
                if (item.estatus == 'creado') {
                    estatus = 'Pendiente Aprobación RH';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'TI') {
                    estatus = 'Aprobado por RH';
                    clase = 'table-warning';
                    porcentaje = '66%'
                } else if (item.estatus == 'R') {
                    estatus = 'Finalizado';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'SI') {
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.id_acta + "</td>";
                filas += "<td>" + item.detalle + "</td>";                
                filas += "<td>" + item.acreedor + "</td>"                
                filas += "<td>" + item.fecha + "</td>";
                filas += "<td>" + estatus + "</td>";
                filas += "<td>" + item.recibe + "</td>";
                if (item.fecha_aprobacion_dw == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.fecha_aprobacion_dw + "</td>";
                }
                if (item.tiempo_estimado == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.tiempo_estimado + "</td>";
                }
                if (item.fecha_finalizacion == null){
                    filas += "<td>--</td>"
                }else{
                    filas += "<td>" + item.fecha_finalizacion + "</td>";
                }
                if (item.nombre_desarrollador == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.nombre_desarrollador + "</td>";
                }
                              
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "soporte/detalle-ticket/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";               
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