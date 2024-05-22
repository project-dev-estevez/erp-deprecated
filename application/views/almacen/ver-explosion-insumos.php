<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Explosión de insumos</h4>

                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbexplosion">
                                <thead>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Folio</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Proyecto</th>
                                        <th>Segmento</th>
                                        <th>Progreso</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Folio</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Proyecto</th>
                                        <th>Segmento</th>
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
        url: "<?= base_url() ?>almacen/mostrarExplosionInsumosReporte",
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
            $.each(response.insumos, function(key, item) {  
                if (item['estatus'] == 0) {
                    clase = 'table-warning';
                } else if (item['estatus'] == 1) {
                    if (item['modificado'] == 1) {
                        if(item['cantidad'] == item['cantidad_anterior']){
                            clase = 'table-success';
                        }else{
                            clase = 'table-info';
                        }                        
                    } else {
                        clase = 'table-success';
                    }
                } else if (item['estatus'] == 2) {
                    clase = 'table-danger';
                }
                if (((item.cantidad * 100) / item.cantidad_anterior > 0) && ((item.cantidad * 100) / item
                        .cantidad_anterior < 100)) {
                    clase2 = 'bg-orange';                    
                } else if (((item.cantidad * 100) / item.cantidad_anterior == 0)) {
                    clase2 = 'bg-red';                    
                } else if (item.cantidad == item.cantidad_anterior) {
                    clase2 = 'bg-green';                    
                } else {                    
                    clase2 = 'bg-red';
                }
                if(((item.cantidad * 100) / item.cantidad_anterior) != Infinity){
                    porcentaje = ((item.cantidad * 100) / item.cantidad_anterior).toFixed(2);
                }else{
                    porcentaje = 0;
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td> EA-" + item.folio + "</td>";
                filas += "<td>" + item.fecha + "</td>";
                filas += "<td>" + item.nombre + "</td>";
                filas += "<td>" + item.almacen + "</td>";
                filas += "<td>" + item.segmento + "</td>";
                filas += "<td align='center'>" + porcentaje + "%" +
                        "<div class='progress' style='height:4%;'><div role='progressbar' style='width:" +
                        ((item.cantidad * 100) / item.cantidad_anterior) +
                        "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " +
                        clase2 + "'></div></div></td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbexplosion tbody').html(filas);
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