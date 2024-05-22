<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
        <div class="row">
            <!-- Item -->
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
                <div class="bg-white has-shadow">
                    <a href="<?= base_url() ?>almacen/cargar-csv" { class="dropdown-item" title="">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="title">
                                <span>Cargar<br>Cluster</span>
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

                        <h4>Generadores</h4>

                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            
                            <?php foreach($clientes_generadores AS $key => $value){ ?>
                                
                            <li class="nav-item">
                                <a class="nav-link btn <?= $key == 0 ? 'active' : '' ?>" id="<?= $value->nombre_comercial ?>-tab" data-toggle="tab" href="#<?= $value->nombre_comercial ?>"
                                    role="tab" aria-controls="<?= $value->nombre_comercial ?>" aria-selected="true">
                                    <?= $value->nombre_comercial ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                            <div class="tab-content" id="pills-tabContent">
                            <?php $cliente = ''; ?>
                                <?php foreach($clientes_generadores AS $key => $value){ ?>
                                    <?php $index_cliente = 0; ?>
                                    <?php $cliente = $value->nombre_comercial; ?>
                                    <div class="tab-pane fade show <?= $key == 0 ? 'active' : '' ?>" id="<?= $value->nombre_comercial ?>" role="tabpanel"
                                    aria-labelledby="<?= $value->nombre_comercial ?>-tab">
                                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                        <?php foreach($almacenes_generadores AS $key2 => $value2){ ?>
                                            <?php if($value2->nombre_comercial == $cliente){ ?>
                                            <li class="nav-item">
                                                <a class="nav-link btn " id="<?= $value2->numero_proyecto ?>-tab" data-toggle="tab" href="#<?= $value2->numero_proyecto ?>"
                                                    role="tab" aria-controls="<?= $value2->numero_proyecto ?>" aria-selected="true">
                                                    <?= $value2->numero_proyecto ?>
                                                </a>
                                            </li>
                                            <?php $index_cliente++; ?>
                                            <?php } ?>                                            
                                        <?php } ?>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                            <?php $proyecto = ''; ?>
                            
                        <?php foreach($almacenes_generadores AS $key => $value){ ?>
                                
                                    <?php $index_segmento = 0; ?>
                                    <?php $index_cluster = 0; ?>
                                    <?php $proyecto = $value->tbl_proyectos_idtbl_proyectos; ?>
                                    <?php if($value->nombre_comercial == $cliente){ ?>
                            <div class="tab-pane fade show " id="<?= $value->numero_proyecto ?>" role="tabpanel"
                                aria-labelledby="<?= $value->numero_proyecto ?>-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <?php foreach($segmentos_generadores AS $key2 => $value2){ ?>
                                <?php if($value2->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn <?= $index_segmento == 0 ? 'active' : '' ?>" id="<?= $value2->idtbl_segmentos_proyecto ?>-tab" data-toggle="pill"
                                            href="#<?= $value2->idtbl_segmentos_proyecto ?>" role="tab" aria-controls="<?= $value2->idtbl_segmentos_proyecto ?>"
                                            aria-selected="true">
                                            <?= $value2->segmento ?>
                                        </a>
                                    </li>
                                    <?php $index_segmento++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <?php foreach($segmentos_generadores AS $key3 => $value3){ ?>
                                <?php if($value3->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <div class="tab-pane fade <?= $index_cluster == 0 ? 'show active' : '' ?>" id="<?= $value3->idtbl_segmentos_proyecto ?>" role="tabpanel"
                                        aria-labelledby="pills-<?= $value3->idtbl_segmentos_proyecto ?>-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda<?= $value3->idtbl_segmentos_proyecto ?>">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('id') == 216){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tecate'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                                    <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('id') == 216){ ?>
                                            <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel_generador/<?= $value3->idtbl_segmentos_proyecto ?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-success"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-excel-o"></i> Reporte Material</span></button>
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbgeneradores<?= $value3->idtbl_segmentos_proyecto ?>">
                                                <thead>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th>Fecha Finalización</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Tipo de Red</th>
                                                        <th>Tramo</th>
                                                        <th>Supervisor</th>
                                                        <th>Lider</th>
                                                        <th>Georeferencia Inicio</th>
                                                        <th>Georeferencia Final</th>
                                                        <th>Concepto</th>
                                                        <th>Unidad</th>
                                                        <th>Cantidad Proyectada</th>
                                                        <th>Fecha Finalización</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacion<?= $value3->idtbl_segmentos_proyecto ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <?php $index_cluster++; ?>
                                    <?php } ?>
                                    <?php } ?>                                                                                                                            
                                </div>
                            </div>   
                            <?php } ?>
                            <?php } ?>
                        </div>
                                    </div>
                                    
                                <?php } ?>                                
                            </div>
                            
                            
                        
                    </div>
                </div>
</section>
<script>
$(document).ready(function() {
            $.ajax({
                url: "<?= base_url()?>almacen/generadores_almacenes",
                type: "POST",                
                dataType: "json",
                success: function(result) {
                    //console.log(result);
                    
                    for(var r=0; r<result.length; r++){
                        var id_segmento = result[r].idtbl_segmentos_proyecto;
                        eventos("", 1, id_segmento);
                        mostrarDatos("", 1, id_segmento);                        
                    }
                                       
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });                          
});



function mostrarDatos(valorBuscar, pagina, idsegmento) {
                            var id_segmento = idsegmento;
                            $.ajax({
                                url: "<?= base_url() ?>almacen/mostrarGeneradores",                                
                                type: "POST",
                                data: {
                                    buscar: valorBuscar,
                                    nropagina: pagina,
                                    segmento: idsegmento
                                },
                                dataType: "json",
                                success: function(response) {
                                    filas = "";
                                    var kilometraje = 0;
                                    var kilometraje_acumulado = 0;
                                    var clase = '';
                                    var fecha_finalizacion = '';                                    
                                    $.each(response.generadores, function(key, item) {
                                        var texto = '';
                                        var hoy = new Date().toISOString().slice(0, 10);
                                        var fecha = new Date(item.ultima_fecha).toISOString().slice(0, 10);
                                        if(item.estatus == 'SPM' || item.estatus == 'SF'){
                                            clase = 'table-success';
                                        }else if(item.estatus == 'SPP' || item.estatus == 'APM'){
                                            clase = 'table-secondary';
                                            if(item.estatus == 'SPP'){
                                                texto = 'Pendiente aprobación superintendente';
                                            }else if(item.estatus == 'APM'){
                                                texto = 'Pendiente aprobación PM';
                                            }
                                        }else if(item.nombre != null && hoy == item.ultima_fecha){
                                            clase = 'table-info';
                                        }else if(item.nombre != null && (hoy > item.ultima_fecha || item.ultima_fecha == null)){
                                            clase = 'table-danger';
                                        }else if(item.estatus == 'cancelado'){
                                            clase = 'table-warning';
                                        }else{
                                            clase = '';
                                        }
                                        fecha_finalizacion = '---';
                                        if(item.fecha_finalizacion != null){
                                            fecha_finalizacion = item.fecha_finalizacion;
                                        }
                                        filas += "<tr class='" + clase + "'>";
                                        filas += "<td>" + item.tipo_red + "</td>";
                                        filas += "<td>" + item.nombre_oracle + "</td>";
                                        filas += "<td>" + item.nombre + "</td>";
                                        filas += "<td>" + item.nombres + " " + item.apellido_paterno  + " " + item.apellido_materno + "</td>";
                                        filas += "<td>" + item.lat_a + "," + item.lon_a + "</td>";
                                        filas += "<td>" + item.lat_b + "," + item.lon_b + "</td>";
                                        filas += "<td>" + item.descripcion_servicio + "</td>";
                                        filas += "<td>" + item.unidad_medida_abr + "</td>";
                                        filas += "<td>" + item.cantidad + "</td>";
                                        if(texto != ''){
                                            filas += "<td>" + texto + "</td>";
                                        }else{
                                            filas += "<td>" + fecha_finalizacion + "</td>";
                                        }
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21){ ?>
                                            if (item.tbl_users_idtbl_users_supervisor != null && (item.estatus == 'SV' || item.estatus == 'SP')) {
                                                <?php if($this->session->userdata('tipo') == 21){ ?>
                                                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                "almacen/devolucion-generador/" + item.uid +
                                                "' title='Desasignar'><i class='fa fa-reply'></i></a></td>";
                                                    <?php }else{ ?>
                                            filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                "almacen/devolucion-generador/" + item.uid +
                                                "' title='Desasignar'><i class='fa fa-user-plus'></i></a></td>";
                                                <?php } ?>
                                            } else {
                                                if(item.estatus == 'SPM'){
                                                filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                    "almacen/solicitud/" + item.idtbl_mantenimientos +
                                                    "' title='CleanUp'><i class='fa fa-bath' style='color: green'></i></a></td>";
                                                }else if(item.estatus == 'SP' || item.estatus == 'SV'){
                                                    filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                    "almacen/solicitud/" + item.idtbl_mantenimientos +
                                                    "' title='Asignar'><i class='fa fa-user-plus' style='color: green'></i></a></td>";
                                                }
                                            }
                                        <?php }else{ ?>
                                            filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                "almacen/devolucion-generador/" + item.uid +
                                                "' title='Devolución'><i class='fa fa-reply'></i></a></td>";
                                        <?php } ?>
                                        filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                            "almacen/detalle_servicio/" + item.uid +
                                            "' title='Reporte'><i class='fa fa-file'></i></a></td>";
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21){ ?>
                                            if(item.kilometraje == null && item.tbl_users_idtbl_users_supervisor == null && item.estatus != 'cancelado'){
                                                filas += "<td align='center'><a title='Eliminar' class='delete-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-trash' style='color: red;'></i></a></td>";
                                                filas += "<td align='center'><a title='Cancelar' class='cancel-arm' id='"+item.idtbl_mantenimientos+"' style='cursor: pointer;'><i class='fa fa-exclamation-triangle' style='color: yellow;'></i></a></td>";
                                            }
                                        <?php } ?>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('id') == 216){ ?>
                                        filas += "<td align='center'><a href='" + "<?= base_url() ?>" +
                                                "almacen/reporte_diferencia/" + item.idtbl_mantenimientos +
                                                "' title='Reporte Material'><i class='fa fa-flag' style='color: green;'></i></a></td>";
                                        <?php } ?>
                                        filas += "</tr>";
                                    });
                                    //alert(id_almacen);
                                    $('#tbgeneradores'+id_segmento+' tbody').html(filas);
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
                                    $(".paginacion"+id_segmento).html(paginador);
                                }
                            });
                        }

            function eventos(valorBuscar, pagina, idsegmento){
                $("body").on("keyup", "input[name='busqueda"+idsegmento+"']" ,function() {
                            textoBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatos(textoBuscar, 1, idsegmento);
                        });

                        $("body").on("click", ".paginacion"+idsegmento+" li a", function(e) {
                            e.preventDefault();
                            valorHref = $(this).attr("href");
                            valorBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatos(valorBuscar, valorHref, idsegmento);
                        });
            }


            $(document).on('click', '.delete-arm', function() {
    console.log("Envio 1");              
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea eliminar el brazo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/delete_arm/" + this.id,
                type: "post",
                dataType: "json",
                data: "id="+this.id,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        );                        
                            location.reload();                        
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    })
});


$(document).on('click', '.cancel-arm', function() {    
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea cancelar el brazo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/cancel_arm/" + this.id,
                type: "post",
                dataType: "json",
                data: "id="+this.id,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        );                        
                            location.reload();                        
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
        }
    })
});

</script>