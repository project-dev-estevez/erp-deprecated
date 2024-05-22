<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Servicios</h4>

                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbservicios">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Folio</th>
                                        <th>ECO</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Programada</th>
                                        <th>Inicio de Servicio</th>
                                        <th>Fin de Servicio</th>
                                        <th>Autor</th>                                        
                                        <th>Detalle</th>
                                        <th>Estatus</th>
                                        <th>Tipo Servicio</th>
                                        <th>Atiende</th>
                                        <th>Porcentaje</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">Folio</th>
                                        <th>ECO</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Programada</th>
                                        <th>Inicio de Servicio</th>
                                        <th>Fin de Servicio</th>
                                        <th>Autor</th>                                        
                                        <th>Detalle</th>
                                        <th>Estatus</th>
                                        <th>Tipo Servicio</th>
                                        <th>Atiende</th>
                                        <th>Porcentaje</th>
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

    $("body").on("click", ".reactivar_pausar_servicio", function(event) {
            event.preventDefault();
            Swal.fire({
                title: '¡Atención!',
                text: "¿Desea pausar el servicio?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2b8e68',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Continuar'
            }).then((result) => {
                if (result.value) {
                    var iddtlServicio = $(this).data("iddtlservicio");
                    var estatus_proceso = $(this).data("value");
                    $.ajax({
                        url: "<?= base_url()?>control-vehicular/reactivar-pausar-servicio",
                        type: "post",
                        dataType: "json",
                        data: {
                            'iddtl_servicio': iddtlServicio,
                            'estatus_proceso': estatus_proceso
                        },
                        complete: function(res) {
                            console.log(res);
                            var resp = JSON.parse(res.responseText);
                            if (resp.error == false) {
                                $('.ocultar').hide();
                                Swal.fire(
                                    '¡Exitoso!',
                                    resp.mensaje,
                                    'success'
                                )
                                location.href = "<?= base_url() ?>control-vehicular/servicios";
                            } else {
                                Toast.fire({
                                    type: 'error',
                                    title: resp.mensaje
                                })
                            }
                        }
                    });
                }
            })
        }
    );

});


function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>control-vehicular/mostrarServicios",
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
            $.each(response.servicios, function(key, item) {
                if (item.estatus == 'SC') {
                    estatus = 'Pendiente Asignación';
                    clase = 'table-warning';
                    porcentaje = '15%';
                }else if (item.estatus == 'SA') {
                    estatus = 'Pendiente de iniciar';
                    clase = 'table-warning';
                    porcentaje = '30%'
                }else if (item.estatus == 'SI') {
                    estatus = 'Pendiente chekclist inicial';
                    clase = 'table-warning';
                    porcentaje = '45%';
                }else if (item.estatus == 'CL') {
                    estatus = 'Pendiente Refacciones';
                    clase = 'table-secondary';
                    porcentaje = '60%';
                }else if(item.estatus == 'SRCV'){
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '75%';
                }else if (item.estatus == 'FINALIZADO') {
                    estatus = 'Finalizada';
                    clase = 'table-success';
                    porcentaje = '100%';
                }else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }
                if(item.estatus_proceso != 'activa'){
                    estatus = 'Pausada';
                    clase = 'table-purpel';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.idtbl_tramites_vehiculares + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td>" + item.fecha_creado + "</td>";
                filas += "<td>" + item.fecha_tramite + "</td>";
                filas += "<td>" + item.fecha_inicio + "</td>"
                filas += "<td>" + item.fecha_finalizacion + "</td>"
                filas += "<td>" + item.autor + "</td>"                
                filas += "<td>" + item.detalle_tramite + "</td>";
                filas += "<td>" + estatus + "</td>";
                filas += "<td>" + item.tipo_servicio + "</td>";
                <?php if((isset($this->session->userdata('permisos')['servicios_mecanicos']) && $this->session->userdata('permisos')['servicios_mecanicos'] == 2) || ($this->session->userdata('tipo') == 3 && ($this->session->userdata('jefe') == 1 || $this->session->userdata('id') == 300))){ ?>
                if (estatus != 'Finalizada') {
                    filas += "<td><select onchange=actualizar(this," + item
                        .iddtl_servicio +
                        ") class='form-control btn-atiende' data-selected='" + item.tbl_users_idtbl_users + "' data-estatus='" + item.estatus + "'><option value''>Seleccione...</option>";
                        filas += "<?php foreach($mecanicos as $item){ ?><option value='<?= $item->idtbl_users  ?>'" + (item.tbl_users_idtbl_users == <?= $item->idtbl_users  ?> ? "selected" : "" ) + "><?= $item->nombre ?></option><?php } ?>";
                    /*filas += "<select onchange=actualizar(this," + item
                        .iddtl_servicio +
                        ") class='form-control btn-atiende' data-selected='" + item.tbl_users_idtbl_users + "' data-estatus='" + item.estatus + "'><option value''>Seleccione...</option><option value='94' " + (item.tbl_users_idtbl_users == 94 ? "selected" : "" ) + ">Eladio Roa Esquivel</option><option value='95'" + (item.tbl_users_idtbl_users == 95 ? "selected" : "" ) + ">Carlos Vazquez Romero</option><option value='96'" + (item.tbl_users_idtbl_users == 96 ? "selected" : "" ) + ">Ignacio Montes Cruz</option><option value='97'" + (item.tbl_users_idtbl_users == 97 ? "selected" : "" ) + ">Jose Luis Gomez Avelar</option><option value='98'" + (item.tbl_users_idtbl_users == 98 ? "selected" : "" ) + ">Victor Manuel Hernandez Jimenez</option><option value='120'" + (item.tbl_users_idtbl_users == 120 ? "selected" : "" ) + ">Alejandro Pulido Martinez</option><option value='127' " + (item.tbl_users_idtbl_users == 127 ? "selected" : "" ) + ">Severo Ceron Lopez</option><option value='176'" + (item.tbl_users_idtbl_users == 176 ? "selected" : "" ) + ">Ricardo Adán Hernández Sánchez</option><option value='177'" + (item.tbl_users_idtbl_users == 177 ? "selected" : "" ) + ">Edgar Alejandro Miranda Requena</option></select>";*/
                    filas += "</select></td>";
                } else {
                    filas += "<td>" + item.atiende + "</td>";
                }
                <?php }else{ ?>
                if (item.tbl_users_idtbl_users == null) {
                    filas += "<td>No asignado</td>";
                } else {
                    filas += "<td>" + item.atiende + "</td>";
                }
                <?php } ?>                
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "control-vehicular/detalle-servicio/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a>" + ( item.estatus_proceso == 'activa' && (item.estatus == 'SI' || item.estatus == 'CL' || item.estatus == 'SRCV') ? "<a class='reactivar_pausar_servicio' href='#' data-iddtlServicio='" + item.iddtl_servicio + "' data-value='pausada' title='Detalles'><i class='fa fa-pause-circle'></i></a>" : "") + ( item.estatus_proceso == 'pausada' && (item.estatus == 'SI' || item.estatus == 'CL' || item.estatus == 'SRCV') ? "<a class='reactivar_pausar_servicio' href='#' data-iddtlServicio='" + item.iddtl_servicio + "' data-value='activa' title='Detalles'><i class='fa fa-play-circle'></i></a>" : "") + "</td>";               
                filas += "</tr>";
            });
            $('#tbservicios tbody').html(filas);
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


function actualizar(mecanico, servicio) {
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea asignar el servicio?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            var estatus = mecanico.getAttribute("data-estatus");
            estatus = estatus == "SC" ? "SA" : estatus;
            $.ajax({
                url: "<?= base_url()?>control-vehicular/asignar-servicio",
                type: "post",
                dataType: "json",
                data: {
                    'mecanico': mecanico.value,
                    'servicio': servicio,
                    'estatus': estatus
                },
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        )
                        location.href = "<?= base_url() ?>control-vehicular/servicios";
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        })
                    }
                }
            });
        }else{
            mecanico.value = mecanico.getAttribute("data-selected");
        }
    })
}

</script>