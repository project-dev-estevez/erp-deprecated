<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Cambio de propietario</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h4><small class="float-right">Precio Dolar
                                    $<?php echo $precio_dolar ?></small></h4><br>
                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedacambiopropietario">
                        </div>
                        <button onclick="window.location.href='<?php echo base_url() ?>control-vehicular/excel-autos-cv/'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button><br><br>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbcambiopropietario">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Limite Pago</th>
                                        <th>Proyecto</th>
                                        <th>Dueño</th>
                                        <th>Nuevo Dueño</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Limite Pago</th>
                                        <th>Proyecto</th>
                                        <th>Dueño</th>
                                        <th>Nuevo Dueño</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacioncambiopropietario">

                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>

            </div>
            <!-- end col-->
        </div>

    </div>
</section>
<div id="cambio_propietario" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart('', 'id="form-cambio-propietario"') ?>
            <div class="modal-header">
                <h4 id="labelTitulo" class="modal-title">Cambio de Propietario</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Unidad</label>
                            <input type="text" placeholder="Unidad" readonly name="unidad" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Fecha Limite de Pago</label>
                            <input type="date" placeholder="Fecha de Servicio" name="fecha_limite_pago" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-12 datosTenencia">
                        <div class="form-group">
                            <label>Proyecto*</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value): ?>
                                  <option value="<?php echo $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>">
                                    <?php echo $value->numero_proyecto ?> -
                                    <?php echo substr($value->nombre_proyecto, 0, 70) ?>
                                  </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Dueño</label>
                            <input type="text" placeholder="Dueño Anterior" name="dueno" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Nuevo Dueño</label>
                            <input type="text" placeholder="Dueño Actual" name="nuevo_dueno" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" step="0.0001" placeholder="Dueño Actual" name="costo" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12" id="archivo">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idtbl_tramites_vehiculares">
                <input type="hidden" name="iddtl_almacen">
                <input type="hidden" name="tipo_tramite" value="cambio propietario">
                <?= form_hidden('token', $token) ?>
                <input type="hidden" name="uid">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<div id="cambio_propietario_documentos" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart('', 'id="form-cambio-propietario-documentos"') ?>
            <div class="modal-header">
                <h4 id="labelTitulo" class="modal-title">Cambio de Propietario</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12" id="archivo">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="uid">
                <input type="hidden" name="idtbl_tramites_vehiculares">
                <input type="hidden" name="estatus">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>

    $(document).ready(function() {
        mostrarCambioPropietario("", 1);
        $("input[name='busquedacambiopropietario']").keyup(function() {
            textoBuscar = $("input[name='busquedacambiopropietario']").val();
            mostrarCambioPropietario(textoBuscar, 1,);
        });
    });

    $('#cambio_propietario_documentos').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recipient = button.data();
        var modal = $(this);
        modal.find("input[name='idtbl_tramites_vehiculares']").val(recipient.idtblTramitesVehiculares);
        modal.find("input[name='estatus']").val(recipient.estatus);
        modal.find("input[name='uid']").val(recipient.uid);
    });

    $('#form-cambio-propietario-documentos').on('submit', function(event) {
       event.preventDefault();
        form = new FormData($(this)[0]);
        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'ControlVehicular/cambio_propietario_documentos' ?>",
            data: form,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(data){
                if(data.error == false){
                    Toast.fire({
                        type: 'success',
                        title: data.mensaje
                    });
                    mostrarCambioPropietario("", 1);
                    $("#cambio_propietario_documentos").modal("hide");
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.mensaje
                    });
                }
            },
            error: function(data){
                Toast.fire({
                    type: 'error',
                    title: "Ocurrio un problema."
                });
            }
        });
    });

    $('#cambio_propietario').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var recipient = button.data();
        console.log(recipient);
        var modal = $(this);

        if(recipient.action == "new"){
            modal.find("input[name='unidad']").val(recipient.interno);
            modal.find("input[name='fecha_limite_pago']").val("");
            modal.find("input[name='dueno']").val("");
            modal.find("input[name='nuevo_dueno']").val("");
            modal.find("input[name='archivo']").val("");
            modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);
            modal.find("select[name='proyecto']").val("");
            $('.selectpicker').selectpicker('refresh');
            modal.find("input[name='archivo']").prop('required', true);
            modal.find("input[name='costo']").val("");
            modal.find("input[name='idtbl_tramites_vehiculares']").val("");
            modal.find("input[name='uid']").val("");
        }else{
            modal.find("input[name='unidad']").val(recipient.interno);
            modal.find("input[name='fecha_limite_pago']").val(recipient.fechaTramite);
            modal.find("input[name='dueno']").val(recipient.dueno);
            modal.find("input[name='nuevo_dueno']").val(recipient.nuevoDueno);
            modal.find("input[name='archivo']").val("");
            modal.find("input[name='iddtl_almacen']").val(recipient.iddtlAlmacen);
            modal.find("select[name='proyecto']").val(recipient.numeroProyecto);
            $('.selectpicker').selectpicker('refresh');
            modal.find("input[name='archivo']").prop('required', false);
            modal.find("input[name='costo']").val(recipient.costo);
            modal.find("input[name='idtbl_tramites_vehiculares']").val(recipient.idtblTramitesVehiculares);
            modal.find("input[name='uid']").val(recipient.uid);
        }
    });

    function mostrarCambioPropietario(valorBuscar, pagina, iddtl_almacen, interno) {
        var tipo_tramite = 'cambio propietario';
        $.ajax({
            url: "<?= base_url() ?>ControlVehicular/cambioPropietario",
            type: "POST",
            data: {
                buscar: valorBuscar,
                nropagina: pagina,
                tipo_tramite: tipo_tramite
            },
            dataType: "json",
            success: function(response) {
                filas = "";

                $.each(response.cambioPropietario, function(key, item) {
                    var className = "";
                    if(item.estatus == "finalizado"){
                        className = "table-success";
                    }else if(item.estatus == "pagado"){
                        className = "table-primary"
                    }else{
                        className = "table-warning";
                    }
                    filas += "<tr class='" + className + "'>";
                    filas += "<td>" + item.idtbl_tramites_vehiculares + "</td>";
                    filas += "<td>" + item.fecha_creado + "</td>";
                    filas += "<td>" + item.fecha_tramite + "</td>";
                    filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
                    filas += "<td>" + item.dueno + "</td>";
                    filas += "<td>" + item.nuevo_dueno + "</td>";
                    filas += "<td>";
                    if(item.file1){
                        filas += "<a href='<?= base_url() . "uploads/tramites_vehiculares/" ?>" + item.uid + "_1.pdf' target='_blank'><i class='fa fa-file-pdf-o'></i></a>";
                    }
                    if(item.file2){
                        filas += "<a href='<?= base_url() . "uploads/tramites_vehiculares/" ?>" + item.uid + "_2.pdf' target='_blank'><i class='fa fa-file-text' aria-hidden='true'></i></a>";
                    }
                    if(item.file3){
                        filas += "<a href='<?= base_url() . "uploads/tramites_vehiculares/" ?>" + item.uid + "_3.pdf' target='_blank'><i class='fa fa-book' aria-hidden='true'></i></a>";
                    }
                    <?php if($this->session->userdata('tipo') == 16){ ?>
                        if(item.estatus == "pendiente"){
                        filas += "<a href='#cambio_propietario_documentos' data-toggle='modal' data-idtbl-tramites-vehiculares='" + item.idtbl_tramites_vehiculares + "' data-estatus='pagado' data-uid='" + item.uid + "'><i class='fa fa-upload' aria-hidden='true'></i></a>";
                        }
                    <?php } ?>
                    <?php if($this->session->userdata('tipo') == 3){ ?>
                        if(item.estatus == "pendiente"){
                        filas += "<a href='#cambio_propietario' data-action='edit' data-idtbl-tramites-vehiculares='" + item.idtbl_tramites_vehiculares + "' data-fecha-tramite='" + item
                        .fecha_tramite + "' data-numero-proyecto='" + item.idtbl_proyectos +
                        "' data-dueno='" + item.dueno + "' data-iddtl-almacen='" + item
                        .dtl_almacen_iddtl_almacen + "' data-nuevo-dueno='" + item
                        .nuevo_dueno + "' data-interno='" + item.numero_interno + "' data-costo='" + item.costo + "' data-uid='" + item.uid + "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
                        }else if(item.estatus == "pagado"){
                        filas += "<a href='#cambio_propietario_documentos' data-toggle='modal' data-idtbl-tramites-vehiculares='" + item.idtbl_tramites_vehiculares + "' data-estatus='finalizado' data-uid='" + item.uid + "'><i class='fa fa-upload' aria-hidden='true'></i></a>";
                        }
                    <?php } ?>
                    filas += "</td></tr>";
                });
                $('#tbcambiopropietario tbody').html(filas);
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
                $(".paginacioncambiopropietario").html(paginador);
            }
        });
    }

    $("#form-cambio-propietario").submit(function(event){
        event.preventDefault();
        form = new FormData($(this)[0]);
        iddtl_almacen = form.get("iddtl_almacen");
        $.ajax({
            type: "POST",
            url: "<?= base_url() . 'ControlVehicular/guardar_editar_cambio_propietario' ?>",
            data: form,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(data){
                if(data.error == false){
                    Toast.fire({
                        type: 'success',
                        title: data.mensaje
                    });
                    mostrarCambioPropietario("", 1, iddtl_almacen);
                    $("#cambio_propietario").modal("hide");
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.mensaje
                    });
                }
            },
            error: function(data){
                Toast.fire({
                    type: 'error',
                    title: "Ocurrio un problema."
                });
            }
        });
    });
</script>