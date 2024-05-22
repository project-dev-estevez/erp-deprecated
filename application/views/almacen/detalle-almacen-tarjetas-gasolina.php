<?php if (isset($this->session->userdata('permisos')['almacen_autos_control_vehicular']) && $this->session->userdata('permisos')['almacen_autos_control_vehicular'] > 1) : ?>
<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <!-- Item -->
            <!--<div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() ?>almacen/catalogo/autos">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green"><i class="fa fa-list"></i></div>
                            <div class="title"><span>Ver<br>Catálogo</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>-->
            <!-- Item -->
            <!--<div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() ?>almacen/asignaciones/alto-costo">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-violet"><i class="fa fa-list"></i></div>
                            <div class="title"><span>Ver<br>Asignaciones</span>
                            </div>

                        </div>
                    </a>
                </div>
            </div>-->
        </div>
    </div>
</section>
<?php endif ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4><?php echo $almacen->almacen ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar
                                    $<?php echo $precio_dolar ?></small></h4><br>
                            <a href="<?php echo base_url() . 'almacen/nueva-entrada-autos-control-vehicular/' . $almacen->uid ?>"
                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <button onclick="window.location.href='<?php echo base_url() ?>ControlVehicular/excel_tarjetas/'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbalmacenautoscontrolvehicular">
                                <thead>
                                    <tr>
                                        <th>Neodata</th>
                                        <th data-priority="1">Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th data-priority="2">Descripción</th>
                                        <th>Serie</th>
                                        <th>NIP</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>Estatus</th>
                                        <th>Precio Unitario</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Neodata</th>
                                        <th>Código</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Descripción</th>
                                        <th>Serie</th>
                                        <th>NIP</th>
                                        <th title="Categoría">Categoría</th>
                                        <th>
                                            <select name="selectCV" style="font-size: 10px;" class="form-control">
                                                <option value="">Seleccionar</option>
                                                <option value="almacen">Almacen</option>
                                                <option value="abuso de confianza">Abuso de Confianza</option>
                                                <option value="baja">Baja</option>
                                                <option value="asignado">Asignado</option>
                                            </select>
                                        </th>
                                        <th>Precio Unitario</th>
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
                        <br><br>
                    </div>
                </div>
                <!---->

                <!---->

                <!---->
            </div>
            <!-- end col-->
        </div>

    </div>
</section>

<div id="editar_producto" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">
                    <?= $this->session->userdata('tipo') == 3 ? 'Editar Información del Auto' : 'Editar Producto' ?>
                </h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Número de Serie</label>
                            <input type="text" placeholder="Número de Serie" name="numero_serie"
                                class="form-control alto-costo" minlength="1" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>NIP</label>
                            <input type="text" placeholder="Número Interno" name="nip"
                                class="form-control alto-costo" minlength="1" required>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nota</label>
                            <textarea placeholder="Descripción" name="nota" class="form-control"
                                minlength="4"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label name="lblestatus">Estatus</label>
                            <select name="estatus" id="estatus" class="form-control alto-costo" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <option value="almacen">Almacen</option>
                                <option value="abuso de confianza">Abuso de Confianza</option>
                                <option id="asignado" value="asignado">Asignado</option>
                                <option value="baja">Baja</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Existencias</label>
                            <input type="number" placeholder="0" name="existencias" min="0" class="form-control">
                        </div>
                    </div>
                
                    <?php if($this->session->userdata('tipo') != 3) { ?>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Rack</label>
                            <select name="rack" class="form-control">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php for ($x = 1; $x <= 20; $x++) { ?>
                                <option value="<?= $x ?>">Rack <?= $x ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Nivel</label>
                            <select name="nivel" class="form-control">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php for ($x = 1; $x <= 10; $x++) { ?>
                                <option value="<?= $x ?>">Nivel <?= $x ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idalmacen" value="">
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Actualizar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="opciones" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="eco" class="modal-title"></h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-asignaciones-tab" data-toggle="pill"
                            href="#pills-asignaciones" role="tab" aria-controls="pills-asignaciones"
                            aria-selected="true">Historial de asignaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-servicios-tab" data-toggle="pill" href="#pills-servicios"
                            role="tab" aria-controls="pills-servicios" aria-selected="false">Historial de servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-siniestros-tab" data-toggle="pill" href="#pills-siniestros"
                            role="tab" aria-controls="pills-siniestros" aria-selected="false">Historial de siniestros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-caja-chica-tab" data-toggle="pill" href="#pills-caja-chica"
                            role="tab" aria-controls="pills-caja-chica" aria-selected="false">Historial caja chica</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="pills-multas-tab" data-toggle="pill" href="#pills-multas"
                            role="tab" aria-controls="pills-multas" aria-selected="false">Historial multas</a>
                    </li>-->
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-asignaciones" role="tabpanel"
                        aria-labelledby="pills-asignaciones-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaasignaciones">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbasignaciones">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Asignación</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Estatus Asignación</th>
                                        <th>Cantidad Asignada</th>
                                        <th>Fecha Finalización</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Asignación</th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Estatus Asignación</th>
                                        <th>Cantidad Asignada</th>
                                        <th>Fecha Finalización</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionasignaciones">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-servicios" role="tabpanel"
                        aria-labelledby="pills-servicios-tab">
                        <!--<button class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevo_servicio">Nuevo Servicio</button>-->
                        <div id="btn-nuevo-servicio">

                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaservicios">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbservicios">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Servicio</th>
                                        <th>Kilometraje</th>
                                        <th>Detalle</th>
                                        <th>Estatus</th>
                                        <th>Tipo Servicio</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Fecha Servicio</th>
                                        <th>Kilometraje</th>
                                        <th>Detalle</th>
                                        <th>Estatus</th>
                                        <th>Tipo Servicio</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionservicios">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-siniestros" role="tabpanel"
                        aria-labelledby="pills-siniestros-tab">
                        <!--<button class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevo_servicio">Nuevo Servicio</button>-->
                        <div id="btn-nuevo-siniestros">

                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedasiniestros">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbsiniestros">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Seguro</th>
                                        <th>Reportado</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Fecha de Siniestro</th>
                                        <th>Fecha conclución</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Seguro</th>
                                        <th>Reportado</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Fecha de Siniestro</th>
                                        <th>Fecha conclución</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionsiniestros">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-multas" role="tabpanel"
                        aria-labelledby="pills-multas-tab">
                        <div id="btn-nuevo-multa">

                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedamultas">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbmultas">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Motivo</th>
                                        <th>Resposable</th>
                                        <th>Total Quincenas</th>
                                        <th>Estatus</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha Creado</th>
                                        <th>Motivo</th>
                                        <th>Resposable</th>
                                        <th>Total Quincenas</th>
                                        <th>Estatus</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionmultas">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-caja-chica" role="tabpanel"
                        aria-labelledby="pills-caja-chica-tab">
                        <div>
                            <a class="btn btn-primary" id="excel_caja_chica">Excel</a>
                        </div>
                        <div class="float-right">
                            <span class="form-group">
                                <label>Fecha Incial</label>
                                <input type="date" class="form-control" id="fecha_inicial_caja_chica">
                            </span>
                            <span class="form-group">
                                <label>Fecha Final</label>
                                <input type="date" class="form-control" id="fecha_final_caja_chica">
                            </span>
                            <span>
                                <button class="btn btn-primary mb-2" id="buscar_caja_chica">Buscar</button>
                            </span>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped" id="tbcajachica">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Uid</th>
                                        <th>Fecha Compra</th>
                                        <th>Monto</th>
                                        <th>Descripción</th>
                                        <th>Comprobante</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Uid</th>
                                        <th>Fecha Compra</th>
                                        <th>Monto</th>
                                        <th>Descripción</th>
                                        <th>Comprobante</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                            </table>
                            <br>
                            <div class="paginacioncajachica">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="historialOperador" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="operador" class="modal-title"></h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-unidadesasignadas-tab" data-toggle="pill"
                            href="#pills-unidadesasignadas" role="tab" aria-controls="pills-unidadesasignadas"
                            aria-selected="true">Unidades Asignadas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-incidencias-tab" data-toggle="pill" href="#pills-incidencias"
                            role="tab" aria-controls="pills-incidencias" aria-selected="false">Incidencias</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-unidadesasignadas" role="tabpanel"
                        aria-labelledby="pills-unidadesasignadas-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar"
                                name="busquedaunidadesasignadas">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbunidadesasignadas">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unidad</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Serie</th>
                                        <th>Placas</th>
                                        <th>Fecha de asignación</th>
                                        <th>Fecha de terminación</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Unidad</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Serie</th>
                                        <th>Placas</th>
                                        <th>Fecha de asignación</th>
                                        <th>Fecha de terminación</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionunidadesasignadas">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-incidencias" role="tabpanel"
                        aria-labelledby="pills-incidencias-tab">
                        <!--<button class="btn btn-outline-primary" data-toggle="modal" data-target="#nuevo_servicio">Nuevo Servicio</button>-->
                        <div id="btn-nueva-incidencia">

                        </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaincidencias">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbincidencias">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Unidad</th>
                                        <th>Placas</th>
                                        <th>Tipo</th>
                                        <th>Incidencia</th>
                                        <th>Fecha</th>
                                        <th>Costo</th>
                                        <th>Estatus C.V.</th>
                                        <th>Comentarios Estatus C.V.</th>
                                        <th>Estatus Contabilidad</th>
                                        <th>Comentarios Estatus Contabilidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Unidad</th>
                                        <th>Placas</th>
                                        <th>Tipo</th>
                                        <th>Incidencia</th>
                                        <th>Fecha</th>
                                        <th>Costo</th>
                                        <th>Estatus C.V.</th>
                                        <th>Comentarios Estatus C.V.</th>
                                        <th>Estatus Contabilidad</th>
                                        <th>Comentarios Estatus Contabilidad</th>
                                        <th>Acciones</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionincidencias">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="nuevo_tramite" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/nuevo-tramite-vehicular', ["onsubmit"=>"disabled(this)"]) ?>
            <div class="modal-header">
                <h4 id="labelTitulo" class="modal-title"></h4>
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
                    <input type="hidden" name="iddtl_almacen">
                    <input type="hidden" name="tipo_tramite">
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label id="labelFechaTramite"></label>
                            <input type="date" placeholder="Fecha de Servicio" name="fecha_tramite" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3" id="proxima_fecha">
                        <div class="form-group">
                            <label id="labelProximaFechaTramite"></label>
                            <input type="date" placeholder="Próxima Fecha de Servicio" name="proxima_fecha_tramite"
                                class="form-control">
                        </div>
                    </div>
                    <div class="col-3 col-lg-3" id="kilometraje">
                        <div class="form-group">
                            <label id="labelKilometraje">Kilometraje</label>
                            <input type="number" placeholder="Kilometraje" name="kilometraje" class="form-control" step="0.01">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12" id="tipo_servicio">
                        <div class="form-group">
                            <fieldset>
                                <p>Tipo de servicio:</p>
                                <div class="row">
                                    <div class="col-4">
                                        <input type="radio" id="usuario" name="tipo_servicio" value="Reporte Usuario">
                                        <label for="usuario">Reporte de usuario</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" id="km" name="tipo_servicio" value="Servicio Kilometraje">
                                        <label for="km">Servicio kilometraje</label>
                                    </div>
                                    <div class="col-4">
                                        <input type="radio" id="foraneo" name="tipo_servicio" value="Foraneo">
                                        <label for="foraneo">Foraneo</label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 datosSeguro">
                        <div class="form-group">
                            <label>Seguro</label>
                            <input type="text" placeholder="Seguro" name="seguro" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 datosSeguro">
                        <div class="form-group">
                            <label>Póliza</label>
                            <input type="text" placeholder="Póliza" name="poliza" class="form-control">
                        </div>
                    </div>
                    <div class="col-6 col-lg-6 datosSeguro datosVerificacion datosTenencia">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" placeholder="Costo" name="costo" class="form-control">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label id="labelDetalle"></label>
                            <textarea placeholder="Detalle" name="detalle_tramite" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12" id="archivo">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control">
                        </div>
                    </div>
                    <div class="col-12 col-lg-12 pagoInterno">
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="pago_interno" class="form-check-input" id="inlineCheckbox1">
                            <label class="form-check-label" for="inlineCheckbox1">Pago Interno</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="nuevo_siniestro" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/nuevoSiniestro', 'id="form_nuevo_siniestro" class="needs-validation"') ?>
      <div class="modal-header">
        <h4 id="labelTitulo" class="modal-title">Nuevo Siniestro</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
                <label>Seguro</label>
                <input type="text" name="seguro" class="form-control" readonly>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
                <label>Tipo</label>
                <select class="form-control" name="tipo" required>
                    <option value="">Seleccionar ...</option>
                    <option value="Perdida Total">Perdida Total</option>
                    <option value="Robo">Robo</option>
                    <option value="Choque">Choque</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" name="estatus" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Concluido">Concluido</option>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group personal">
              <label>Reportado Por</label>
              <input class="form-control reportado_por_empleado" autocomplete="off" type="text" name="reportado_por_empleado" required>
              <input class="form-control reportado_por" autocomplete="off" type="hidden" name="reportado_por" required>
              <div class="list-group sugerencias"></div>
            </div>
          </div>
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Atiende</label>
              <select class="selectpicker form-control usuariosSelectPicker" data-live-search="true" name="atiende" required>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Nombre contacto</label>
              <input type="text" name="nombre_contacto" class="form-control" required>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Telefono</label>
              <input type="text" name="telefono" class="form-control" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Fecha siniestro</label>
              <input type="date" name="fecha_siniestro" class="form-control" required>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Fecha Conclusión</label>
              <input type="date" name="fecha_conclusion" class="form-control">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Descripción Siniestro</label>
              <textarea name="descripcion_siniestro" class="form-control"></textarea>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label>Descripción Seguimiento</label>
              <textarea name="descripcion_seguimiento" class="form-control"></textarea>
            </div>
          </div>
          <input type="hidden" name="iddtl_almacen">
          <input type="hidden" name="idtbl_tramites_vehiculares">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <!--<button type="button" class="btn btn-primary" onclick="imprimirSiniestro()">Imprimir Documento</button>-->
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="nueva_incidencia" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/nueva-incidencia') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Nueva Incidencia</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12 selecteco">
                        <div class="form-group">
                            <label>Unidad</label>
                            <div id="selecteco"></div>
                        </div>
                    </div>
                    <input type="hidden" name="idtbl_usuarios">
                    <input type="hidden" name="iddtl_almacen">
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Fecha de Incidencia</label>
                            <input type="date" placeholder="Fecha de Incidencia" name="fecha_incidencia"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Total quincenas</label>
                            <input type="number" step="1" placeholder="Quincenas" name="quincenas" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-3 col-lg-3">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" step="0.01" placeholder="Costo" name="costo" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-check-label">Proyecto*</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value): ?>
                                    <option value="<?php echo $value->idtbl_proyectos ?>" data-direccion="<?php echo $value->direccion ?>">
                                    <?php echo $value->numero_proyecto ?> -
                                    <?php echo substr($value->nombre_proyecto,0,70) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Incidencia</label>
                            <textarea placeholder="Incidencia" name="incidencia" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Tipo de incidencia</label>
                            <select class="form-control" name="tipo">
                                <option value="multa">Multa</option>
                                <option value="legal">Legal</option>
                                <option value="juridico">Juridico</option>
                                <option value="transito">Transito</option>
                                <option value="daño">Daño</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <label>Archivo</label>
                        <input type="file" class="form-control" name="file" required>
                    </div>
                    <input type="hidden" name="tipo_incidencia" value="control_vehicular">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" class="btn btn-primary" onclick="imprimirIncidencia();">Imprimir Documento</button>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="editar_estatus_incidencia" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url() . 'ControlVehicular/editar-estatus-incidencia') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar estatus de incidencia</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="form-group">
                            <label>Estatus</label>
                            <select class="form-control" name="estatus_incidencia" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Reparada">Reparada</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-12">
                        <div class="form-group">
                            <label>Comentarios de cambio de estatus</label>
                            <textarea name="comentario_estatus" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <strong>Unidad: </strong><span id="unidad"></span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <strong>Fecha: </strong><span id="fecha"></span>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <strong>Costo: </strong><span id="costo"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label><strong>Explicación de incidencia</strong></label>
                            <p id="incidencia"></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label><strong>Explicación de cambio de estatus</strong></label>
                            <p id="comentario_estatus"></p>
                        </div>
                    </div>
                    <input type="hidden" name="tipo" value="controlvehicular">
                    <input type="hidden" name="idtbl_incidencias">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div id="editar_siniestros" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/editarSiniestros', 'id="form-editar-siniestros" class="needs-validation') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar siniestro</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tabGeneralSiniestros">General</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabFoliosSiniestros">Folios</a></li>
        </ul>

        <div class="tab-content">
          <div id="tabGeneralSiniestros" class="tab-pane fade show active">
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>#</label>
                  <input type="text" name="idtbl_siniestros_info" class="form-control" disabled>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Seguro</label>
                  <input type="text" name="seguro" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                    <label>Tipo</label>
                    <select class="form-control" name="tipo" required>
                        <option value="">Seleccionar ...</option>
                        <option value="Perdida Total">Perdida Total</option>
                        <option value="Robo">Robo</option>
                        <option value="Choque">Choque</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Estatus</label>
                  <select class="form-control" name="estatus" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Concluido">Concluido</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="form-group personal">
                  <label>Reportado Por</label>
                  <input class="form-control reportado_por_empleado" autocomplete="off" type="text" name="reportado_por_empleado" required>
                  <input class="form-control reportado_por" autocomplete="off" type="hidden" name="reportado_por" required>
                  <div class="list-group sugerencias"></div>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="form-group">
                  <label>Atiende</label>
                  <select class="selectpicker form-control usuariosSelectPicker" data-live-search="true" name="atiende" required>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Nombre contacto</label>
                  <input type="text" name="nombre_contacto" class="form-control" required>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" name="telefono" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha siniestro</label>
                  <input type="date" name="fecha_siniestro" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha Conclusión</label>
                  <input type="date" name="fecha_conclusion" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Siniestro</label>
                  <textarea name="descripcion_siniestro" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Seguimiento</label>
                  <textarea name="descripcion_seguimiento" class="form-control"></textarea>
                </div>
              </div>
              <input type="hidden" name="iddtl_almacen">
              <input type="hidden" name="idtbl_siniestros">
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Observaciones Contabilidad</label>
                  <textarea name="observaciones_contabilidad" class="form-control" readonly></textarea>
                </div>
              </div>
            </div>
          </div>
          <div id="tabFoliosSiniestros" class="tab-pane fade">
            <div class="row">
              <a id="btn-nuevo-folio" href="#folio_siniestros" style="margin-left:15px;" data-toggle="modal" class="btn btn-outline-primary btn-sm" title="Nuevo Folio" data-tipo="nuevo" data-idtbl-siniestros="null">Nuevo Folio</a>
              <table class="table" id="folios_siniestros">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <!--<button type="button" class="btn btn-primary" onclick="imprimirSiniestro()">Imprimir Documento</button>-->
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="folio_siniestros" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/nuevoFolio', 'id="form-folio-siniestros"') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Folio siniestro</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Folio</label>
              <input type="text" name="folio" class="form-control" required>
            </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Estatus</label>
              <select name="estatus_responsabilidad" class="form-control" required>
                <option>Pendiente</option>
                <option>Afectado</option>
                <option>Responsable</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="idtbl_siniestros">
          <input type="hidden" name="iddtl_siniestros">
          <input type="hidden" name="tipo">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="nueva_multa" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/nuevoFolio', 'id="form-nueva-multa" class="needs-validation') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Nueva Multa</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <!--<div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Fecha Multa:</label>
              <input type="date" name="fecha_multa" class="form-control" required>
            </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Fecha Vigencia:</label>
              <input type="date" name="fecha_vigencia" class="form-control" required>
            </div>
            </div>
          </div>
        </div>-->
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Concepto Multa:</label>
              <input type="text" name="detalle_tramite" class="form-control" required>
            </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Total a pagar:</label>
              <input type="number" name="total_pago" class="form-control" step="0.01" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Quicenas (Pago):</label>
              <input type="number" name="quincenas_pago" class="form-control" required>
            </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
                <div class="form-group">
                    <label>Estatus</label>
                    <select name="estatus" class="form-control">
                        <option value="0">Pendiente</option>
                        <option value="1">Finalizado</option>
                    </select>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
            <div class="col-6 col-lg-6">
                <div class="form-group personal">
                  <label>Personal</label>
                  <input class="form-control reportado_por_empleado" autocomplete="off" type="text" name="reportado_por_empleado" required>
                  <input class="form-control reportado_por" autocomplete="off" type="hidden" name="tbl_usuarios_idtbl_usuarios" required>
                  <div class="list-group sugerencias"></div>
                </div>
            </div>
        </div>
        <div clas="row text-right">
            <button type="button" class="btn btn-primary" id="agregar_multa">Agregar</button>
        </div>
        <div class="row">
            <div class="table-responsive" id="tabla_multas">
                <table class="table">
                    <thead>
                        <th>Numero Infracción</th>
                        <th>Fecha Infracción</th>
                        <th>Fecha Vigencia</th>
                        <th></th>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <th>Numero Infracción</th>
                        <th>Fecha Infracción</th>
                        <th>Fecha Vigencia</th>
                        <th></th>
                    </tfoot>
                </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="idtbl_tramites_vehiculares">
        <input type="hidden" name="iddtl_almacen">
        <?= form_hidden('token', $token) ?>
        <button type="button" class="btn btn-info" onclick="imprimirMulta()">Generar Documento</button>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="subir_archivo_multa" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'almacen/archivo-alto-costo', 'id="form-subir-archivo-multa"') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Subir Archivo</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          
        <div class="col-12">
              <label>Archivo</label>
              <input type="file" class="form-control" name="archivo" required>
            </div>
          <input type="hidden" name="uid">
          <input type="hidden" name="iddtl_almacen">                
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<script>
$('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $("#asignado").remove();
    console.log(recipient.estatus + 'test');
    if (recipient.estatus != 'almacen' && recipient.estatus != 'disponible') {
        //$("#asignado").remove();
        //} else {
        let $option = $('<option />', {
            text: 'Asignado',
            value: 'asignado',
            id: 'asignado'
        });
        $('#estatus').append($option);
    }
    $("#taller").remove();
    if (recipient.estatus == "taller") {
        var taller = $('<option />', {
            text: 'Taller',
            value: 'taller',
            id: 'taller'
        });
        $('#estatus').append(taller);
        $('#estatus').prop("disabled", true);
    }else{
            $('#estatus').prop("disabled", false);
    }

    modal.find("input[name='numero_serie']").val(recipient.serie);
    modal.find("input[name='nip']").val(recipient.interno);
    modal.find("textarea[name='nota']").val(recipient.nota);
    modal.find("select[name='estatus']").val(recipient.estatus);
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);
    modal.find("input[name='placas']").val(recipient.placas);
    modal.find("select[name='entidad_federativa']").val(recipient.entidadFederativa);
    modal.find("input[name='no_motor']").val(recipient.no_motor);
    modal.find("select[name='tipo_combustible']").val(recipient.tipoCombustible);
    modal.find("input[name='poliza']").val(recipient.poliza);
    modal.find("input[name='seguro']").val(recipient.seguro);
    modal.find("input[name='vigencia']").val(recipient.vigencia);
    modal.find("input[name='tipo_vehiculo']").val(recipient.tipo_vehiculo);
    modal.find("input[name='kmactual']").val(recipient.kmactual);
    modal.find("input[name='kmservicio']").val(recipient.kmservicio);
    modal.find("input[name='ubicacion']").val(recipient.ubicacion);
    modal.find("input[name='anio']").val(recipient.anio);
    if (recipient.estado_vehiculo == 'nuevo')
        $("#nuevo").attr('checked', 'true');
    else if (recipient.estado_vehiculo == 'usado')
        $("#usado").attr('checked', 'true');

    //if (recipient.estatus == 'asignado')
    //modal.find("select[name='estatus']").attr('disabled', 'disabled')
    //else
    //modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')

    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
        modal.find("input[name='existencias']").attr('readonly', 'readonly')


    if (recipient.abreviatura == 'CAC') {
        modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
        modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
        modal.find("textarea[name='nota']").attr('disabled', 'disabled')
        modal.find("select[name='estatus']").hide()
        modal.find("label[name='lblestatus']").hide()
    }

})

$('#opciones').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    $("#eco").empty();
    html = "";
    html += "<span>Historiales de " + recipient.interno + "</span>"
    $("#eco").append(html);

    $("#btn-nuevo-servicio").empty();
    html = "";
    
    if(recipient.servicio != 'si'){

    html +=
        "<a href='#nuevo_tramite' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nuevo Servicio' data-tipo_tramite='servicio' data-interno='" +
        recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "' data-kmactual='" + recipient.kmactual + "'>Nuevo Servicio</a>";
    $("#btn-nuevo-servicio").append(html);
    
    }

    /*$("#btn-nueva-verificacion").empty();
    html = "";
    html +=
        "<a href='#nuevo_tramite' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nueva Verificación' data-tipo_tramite='verificacion' data-interno='" +
        recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "'>Nueva Verificación</a>";
    $("#btn-nueva-verificacion").append(html);

    $("#btn-nueva-tenencia").empty();
    html = "";
    html +=
        "<a href='#nuevo_tramite' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nueva Tenencia' data-tipo_tramite='tenencia' data-interno='" +
        recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "'>Nueva Tenencia</a>";
    $("#btn-nueva-tenencia").append(html);

    $("#btn-nuevo-seguro").empty();
    html = "";
    html +=
        "<a href='#nuevo_tramite' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nuevo Seguro' data-tipo_tramite='seguro' data-interno='" +
        recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "'>Nuevo Seguro</a>";
    $("#btn-nuevo-seguro").append(html);*/

    $("#btn-nuevo-siniestros").empty();
    html = "";
    html += "<a href='#nuevo_siniestro' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nuevo Siniestro' data-tipo_tramite='siniestros' data-interno='" + recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "'>Nuevo Siniestro</a>";
    $("#btn-nuevo-siniestros").append(html);

    mostrarServiciosAutos("", 1, recipient.iddtl_almacen);

    $("#btn-nuevo-multa").empty();
    html = "";
    html += "<a href='#nueva_multa' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nueva Multa' data-tipo_tramite='multa' data-interno='" + recipient.interno + "' data-iddtl_almacen='" + recipient.iddtl_almacen + "' data-tipo='nuevo'>Nueva Multa</a>";
    $("#btn-nuevo-multa").append(html);

    $("input[name='busquedaservicios']").keyup(function() {
        textoBuscar = $("input[name='busquedaservicios']").val();
        mostrarServiciosAutos(textoBuscar, 1, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacionservicios li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaservicios']").val();
        mostrarServiciosAutos(valorBuscar, valorHref, recipient.iddtl_almacen);
    });

    mostrarHistorialAsignacionesAutos("", 1, recipient.iddtl_almacen);

    $("input[name='busquedaasignaciones']").keyup(function() {
        textoBuscar = $("input[name='busquedaasignaciones']").val();
        mostrarHistorialAsignacionesAutos(textoBuscar, 1, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacionasignaciones li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaasignaciones']").val();
        mostrarHistorialAsignacionesAutos(valorBuscar, valorHref, recipient.iddtl_almacen);
    });
    //modal.find("input[name='unidad']").val(recipient.interno);
    //modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);

    mostrarSiniestros("", 1, recipient.iddtl_almacen);

    $("input[name='busquedasiniestros']").keyup(function() {
        textoBuscar = $("input[name='busquedasiniestros']").val();
        mostrarSiniestros(textoBuscar, 1, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacionsiniestros li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedasiniestros']").val();
        mostrarSiniestros(valorBuscar, valorHref, recipient.iddtl_almacen);
    });

    mostrarMultas("", 1, recipient.iddtl_almacen);
    $("input[name='busquedamultas']").keyup(function() {
        textoBuscar = $("input[name='busquedamultas']").val();
        mostrarMultas(textoBuscar, 1, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacionmultas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedamultas']").val();
        mostrarMultas(valorBuscar, valorHref, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacioncajachica li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        mostrarDatosCajaChica($("#fecha_inicial_caja_chica").val(), $("#fecha_final_caja_chica").val(), valorHref, recipient.iddtl_almacen);
    });

    $("#fecha_inicial_caja_chica").val("");
    $("#fecha_final_caja_chica").val("");
    $("#excel_caja_chica").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/"+recipient.iddtl_almacen);
    mostrarDatosCajaChica("", "", 1, recipient.iddtl_almacen);
    $("#buscar_caja_chica").on('click', function(){
        $("#excel_caja_chica").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/"+recipient.iddtl_almacen+"/null/"+$("#fecha_inicial_caja_chica").val()+"/"+$("#fecha_final_caja_chica").val());
        mostrarDatosCajaChica($("#fecha_inicial_caja_chica").val(), $("#fecha_final_caja_chica").val(), 1, recipient.iddtl_almacen);
    });

})

$('#historialOperador').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    $("#operador").empty();
    html = "";
    html += "<span>Historial de " + recipient.operador + "</span>"
    $("#operador").append(html);

    $("#btn-nueva-incidencia").empty();
    html = "";
    html +=
        "<a href='#nueva_incidencia' data-toggle='modal' class='btn btn-outline-primary btn-sm' title='Nueva Incidencia' data-operador='" +
        recipient.operador + "' data-idtbl_usuarios='" + recipient.idtbl_usuarios + "' data-iddtl_almacen='"+ recipient.iddtl_almacen +"'>Nueva Incidencia</a>";
    $("#btn-nueva-incidencia").append(html);
    
    if(recipient.idtbl_usuarios != ""){
        $("#pills-unidadesasignadas-tab").css("display", "block")
        $("#pills-unidadesasignadas-tab").tab("show");
        mostrarUnidadesAsignadas("", 1, recipient.idtbl_usuarios);
    }else{
        $("#pills-unidadesasignadas-tab").css("display", "none")
        $("#pills-incidencias-tab").tab("show");
    }
    

    $("input[name='busquedaunidadesasignadas']").keyup(function() {
        textoBuscar = $("input[name='busquedaunidadesasignadas']").val();
        mostrarUnidadesAsignadas(textoBuscar, 1, recipient.idtbl_usuarios);
    });

    $("body").on("click", ".paginacionunidadesasignadas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaunidadesasignadas']").val();
        mostrarUnidadesAsignadas(valorBuscar, valorHref, recipient.idtbl_usuarios);
    });

    mostrarIncidencias("", 1, recipient.idtbl_usuarios, recipient.iddtl_almacen);

    $("input[name='busquedaincidencias']").keyup(function() {
        textoBuscar = $("input[name='busquedaincidencias']").val();
        mostrarIncidencias(textoBuscar, 1, recipient.idtbl_usuarios, recipient.iddtl_almacen);
    });

    $("body").on("click", ".paginacionincidencias li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaincidencias']").val();
        mostrarIncidencias(valorBuscar, valorHref, recipient.idtbl_usuarios, recipient.iddtl_almacen);
    });
    //modal.find("input[name='unidad']").val(recipient.interno);
    //modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);

})

$('#nuevo_tramite').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    modal.find("input[name='unidad']").val(recipient.interno);
    modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);
    modal.find("input[name='tipo_tramite']").val(recipient.tipo_tramite);
    modal.find("input[name='costo']").prop('required', false);
    //$("#kilometraje").find("input").prop('required', false);
    //$("#kilometraje").find("input").attr('min', "");
    $(".pagoInterno").hide();
    $(".pagoInterno").find("input").prop('checked', false);
    $(".datosVerificacion").hide();
    $(".datosTenencia").hide();
    //Nuevo tramite fecha tramite proxima fecha tramite detalle
    //if (recipient.tipo_tramite == 'servicio') {
        modal.find("#labelTitulo").text("Nuevo Servicio");
        modal.find("#labelFechaTramite").text("Fecha de Servicio");
        modal.find("#labelProximaFechaTramite").text("Próxima Fecha de Servicio");
        modal.find("#labelDetalle").text("Detalle del Servicio");
        $(".datosSeguro").hide();
        $("#archivo").hide();
        $("#proxima_fecha").hide();
        $("#kilometraje").show();
        $("#kilometraje").find("input").prop('required', true);
        console.log($("#kilometraje").find("input"));
        $("#kilometraje").find("input").attr('min', recipient.kmactual);
        $("#tipo_servicio").show();
    /*} else if (recipient.tipo_tramite == 'verificacion') {
        modal.find("#labelTitulo").text("Nueva Verificación");
        modal.find("#labelFechaTramite").text("Fecha de Verificación");
        modal.find("#labelProximaFechaTramite").text("Próxima Fecha de Verificación");
        modal.find("#labelDetalle").text("Detalle de la Verificación");
        $(".datosSeguro").hide();
        $("#archivo").show();
        $("#proxima_fecha").show();
        $(".datosVerificacion").show();
        $("#kilometraje").hide();
        $("#tipo_servicio").hide();
        modal.find("input[name='costo']").prop('required', true);
    } else if (recipient.tipo_tramite == 'tenencia') {
        modal.find("#labelTitulo").text("Nueva Tenencia");
        modal.find("#labelFechaTramite").text("Fecha de Tenencia");
        modal.find("#labelProximaFechaTramite").text("Próxima Fecha de Tenencia");
        modal.find("#labelDetalle").text("Detalle de la Tenencia");
        $(".pagoInterno").show();
        $(".pagoInterno").find("input").prop('checked', true);
        $(".datosSeguro").hide();
        $("#archivo").show();
        $("#proxima_fecha").show();
        $("#kilometraje").hide();
        $("#tipo_servicio").hide();
        $(".datosTenencia").show();
        modal.find("input[name='costo']").prop('required', true);
    } else if (recipient.tipo_tramite == 'seguro') {
        modal.find("#labelTitulo").text("Nuevo Seguro");
        modal.find("#labelFechaTramite").text("Fecha de Contratación");
        modal.find("#labelProximaFechaTramite").text("Fecha de Vencimiento");
        modal.find("#labelDetalle").text("Detalle del Seguro");
        $(".datosSeguro").show();
        $("#archivo").show();
        $("#proxima_fecha").show();
        $("#kilometraje").hide();
        $("#tipo_servicio").hide();
        modal.find("input[name='costo']").prop('required', true);
    } else {

    }*/
    $('#opciones').modal('hide');

})


  $('#nuevo_siniestro').on('show.bs.modal', function(event) {
    $('body').addClass("siniestros");
    var button = $(event.relatedTarget);
    var recipient = button.data();
    var modal = $(this);
    modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);
    modal.find("input[name='estatus']").val("Pendiente");
    //modal.find(".usuariosSelectPicker[name='reportado_por']").val("");
    modal.find(".usuariosSelectPicker[name='atiende']").val("");
    modal.find("input[name='nombre_contacto']").val("");
    modal.find("input[name='telefono']").val("");
    modal.find("input[name='fecha_siniestro']").val("");
    modal.find("input[name='fecha_conclusion']").val("");
    modal.find("textarea[name='descripcion_siniestro']").val("");
    modal.find("textarea[name='descripcion_seguimiento']").val("");
    $('.usuariosSelectPicker').selectpicker('refresh');
    $.ajax({
      url: "<?php echo base_url();?>ControlVehicular/obtenerUltimoSeguro",
      type: "POST",
      data: {iddtl_almacen:recipient.iddtl_almacen}, 
      dataType: "json",
      cache : false,
      success: function(resp) {
        if(resp.length > 0){
          modal.find("input[name='idtbl_tramites_vehiculares']").val(resp[0].idtbl_tramites_vehiculares);
          modal.find("input[name='seguro']").val(resp[0].seguro);
        }else{
          modal.find("input[name='idtbl_tramites_vehiculares']").val("");
          modal.find("input[name='seguro']").val("Sin seguro");
        }
      }
    });
  });

  $('#nuevo_siniestro').on('hidden.bs.modal', function (e) {
      $('body').removeClass("siniestros");
      $('body').addClass('modal-open');
  });

  $('#editar_estatus_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    $("#unidad").empty();
    $("#fecha").empty();
    $("#costo").empty();
    $("#incidencia").empty();
    $("#comentario_estatus").empty();
    modal.find("input[name='idtbl_incidencias']").val(recipient.idtbl_incidencias);
    $("#unidad").append(recipient.unidad);
    $("#fecha").append(recipient.fecha_incidencia);
    $("#costo").append(recipient.costo);
    $("#incidencia").append(recipient.incidencia);
    $("#comentario_estatus").append(recipient.comentario_estatus);
    $('#historialOperador').modal('hide');

})

  $('#editar_siniestros').on('show.bs.modal', function(event) {
    $('body').addClass("modalZindex");
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='iddtl_almacen']")[0].value = recipient.iddtlAlmacen;
    modal.find("input[name='idtbl_siniestros_info']")[0].value = recipient.idtblSiniestros;
    modal.find("input[name='idtbl_siniestros']")[0].value = recipient.idtblSiniestros;
    modal.find("#btn-nuevo-folio").data("idtbl-siniestros", recipient.idtblSiniestros);
    modal.find("input[name='seguro']")[0].value = recipient.seguro;
    modal.find("select[name='estatus']")[0].value = recipient.estatus === null ? "Pendiente" : recipient.estatus;
    modal.find("input[name='reportado_por']")[0].value = recipient.idtblUsuariosReportadoPor;
    modal.find("input[name='reportado_por_empleado']")[0].value = recipient.usuariosReportadoPor;
    //modal.find(".usuariosSelectPicker[name='reportado_por']").val(recipient.idtblUsuariosReportadoPor);
    modal.find("select[name='tipo']").val(recipient.tipo);
    modal.find(".usuariosSelectPicker[name='atiende']").val(recipient.idtblUsuariosAtiende);
    modal.find("input[name='nombre_contacto']")[0].value = recipient.nombreContacto;
    modal.find("input[name='telefono']")[0].value = recipient.telefonoContacto;
    modal.find("input[name='fecha_siniestro']")[0].value = recipient.fechaSiniestro;
    modal.find("input[name='fecha_conclusion']")[0].value = recipient.fechaConclusion;
    modal.find("textarea[name='descripcion_siniestro']")[0].value = recipient.descripcionSiniestro;
    modal.find("textarea[name='descripcion_seguimiento']")[0].value = recipient.descripcionSeguimiento;
    modal.find("textarea[name='observaciones_contabilidad']")[0].value = recipient.observaciones;
    $('.usuariosSelectPicker').selectpicker('refresh');
    //folios_siniestros
    mostrarFolios(recipient.idtblSiniestros, modal);
  });

  $('#editar_siniestros').on('hidden.bs.modal', function (e) {
      $('body').removeClass("modalZindex");
      $('body').addClass('modal-open');
  });

  $('#folio_siniestros').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data();
    var modal = $(this);

    if(recipient.tipo == "nuevo"){
      modal.find("input[name='idtbl_siniestros']").val(recipient.idtblSiniestros);
      modal.find("input[name='folio']").val("");
      modal.find("input[name='tipo']").val("nuevo");
      modal.find("select[name='estatus_responsabilidad']").val("Pendiente");
      modal.find("select[name='tipo']").val("nuevo");
    }else{
      modal.find("input[name='iddtl_siniestros']").val(recipient.iddtlSiniestros);
      modal.find("input[name='idtbl_siniestros']").val(recipient.idtblSiniestros);
      modal.find("input[name='folio']").val(recipient.folio);
      modal.find("input[name='tipo']").val("edicion");
      modal.find("select[name='estatus_responsabilidad']").val(recipient.estatusResponsabilidad);
      modal.find("select[name='tipo']").val("edicion");
    }
  });


  $('#folio_siniestros').on('hidden.bs.modal', function (e) {
      $('body').addClass('modal-open');
  });

$('#nueva_incidencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    if(recipient.idtbl_usuarios != ""){
        $(".selecteco").css("display", "block");
        $.ajax({
            url: "<?php echo base_url();?>ControlVehicular/getAutosAsignados",
            type: "POST",
            data: {
                idtbl_usuarios: recipient.idtbl_usuarios
            },
            dataType: "json",
            cache: false,
            success: function(resp) {
                $("#selecteco").empty();
                html = '';
                html += '<select class="form-control" name="iddtl_almacen" required>';
                html +=
                    '<option value="" disabled="disabled" selected="selected">Seleccione...</option>';
                for (var i = 0; i < resp.length; i++) {
                    html += '<option value="' + resp[i]['iddtl_almacen'] + '">' + resp[i][
                        'numero_interno'
                    ] + '</option>';
                }
                html += '</select>';
                $("#selecteco").append(html);
            }
        });
    }else{
        $(".selecteco").css("display", "none");
    }
    modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);
    modal.find("input[name='idtbl_usuarios']").val(recipient.idtbl_usuarios);
    $(".operador").html('');
    $(".operador").html(recipient.operador);
    //modal.find("input[name='tipo_tramite']").val(recipient.tipo_tramite);

    $('#historialOperador').modal('hide');

})

$('#editar_producto').on('hide.bs.modal', function(event) {
    var modal = $(this);
    modal.find("input[name='numero_serie']").removeAttr('disabled');
    modal.find("input[name='numero_interno']").removeAttr('disabled');
    modal.find("textarea[name='nota']").removeAttr('disabled');
    modal.find("select[name='estatus']").removeAttr('disabled');
    modal.find("input[name='existencias']").removeAttr('disabled');
    modal.find("select[name='rack']").removeAttr('disabled');
    modal.find("select[name='nivel']").removeAttr('disabled');
})


$('#nueva_multa').on('show.bs.modal', function (e) {
    $('body').addClass("modalZindex");
    var button = $(event.target);
    var recipient = button.data();
    var modal = $(this);
    $("#tabla_multas tbody").html("");
    if(recipient.tipo != undefined && recipient.tipo == "nuevo"){
        modal.find("input[name='fecha_multa']").val("");
        modal.find("input[name='fecha_vigencia']").val("");
        modal.find("input[name='total_pago']").val("");
        modal.find("input[name='detalle_tramite']").val("");
        modal.find("input[name='quincenas_pago']").val("");
        modal.find("select[name='estatus']").val("0");
        modal.find("input[name='reportado_por_empleado']").val("");
        modal.find("input[name='tbl_usuarios_idtbl_usuarios']").val("");
        modal.find("input[name='idtbl_tramites_vehiculares']").val("");
        modal.find("input[name='iddtl_almacen']").val(recipient.iddtl_almacen);
    }else{
        button = button.closest("a");
        var recipient = button.data();
        console.log(recipient);
        modal.find("input[name='fecha_multa']").val(recipient.fechaTramite);
        modal.find("input[name='fecha_vigencia']").val(recipient.fechaVigencia);
        modal.find("input[name='total_pago']").val(recipient.totalPago);
        modal.find("input[name='detalle_tramite']").val(recipient.detalleTramite);
        modal.find("input[name='quincenas_pago']").val(recipient.quincenasPago);
        modal.find("select[name='estatus']").val(recipient.estatus);
        modal.find("input[name='reportado_por_empleado']").val(recipient.nombreCompleto);
        modal.find("input[name='tbl_usuarios_idtbl_usuarios']").val(recipient.tblUsuariosIdtbl_usuarios);
        modal.find("input[name='idtbl_tramites_vehiculares']").val(recipient.idtblTramitesVehiculares);
        modal.find("input[name='iddtl_almacen']").val(recipient.iddtlAlmacen);
    }

    var form = new FormData();
    form.append("idtblTramitesVehiculares", recipient.idtblTramitesVehiculares);
    $.ajax({
        type:"POST",
        url: "<?= base_url() ?>/ControlVehicular/detalleMultas",
        data: form,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function(data){
            for(var r=0; r<data.length; r++){
                var componente = "<tr><td>" + data[r].numero_multa + "</td><td>" + data[r].fecha_multa + "</td><td>" + data[r].fecha_vigencia + "</td><td></td></tr>"
                $("#tabla_multas tbody").append(componente);
            }
        },
        error: function(){
            Toast.fire({
                type: 'error',
                title: "Ocurrio un error al obterner multas."
            });
        }
    });
    
});

$('#nueva_multa').on('hidden.bs.modal', function (e) {
      $('body').removeClass("modalZindex");
      $('body').addClass('modal-open');
});

$('#subir_archivo_multa').on('show.bs.modal', function (e) {
    var modal = $(this);
    $('body').addClass("modalZindex");
    var button = $(event.target);
    button = button.closest("a");
    var recipient = button.data();
    modal.find("input[name='archivo']").val("");
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='iddtl_almacen']").val(recipient.iddtlAlmacen);
});

$('#subir_archivo_multa').on('hidden.bs.modal', function (e) {
      $('body').removeClass("modalZindex");
      $('body').addClass('modal-open');
});

</script>
<script>
$(document).ready(function() {


    //buscar usuario --fernando


    $(".reportado_por_empleado").on('keyup', function() {

        var reportado_por = $(this).val();
        var dataString = 'reportado_por=' + reportado_por;
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>/Personal/getUsuariosSelect",
            data: dataString,
            dataType: "json",
            success:function(data) {
                filas = "";
                $.each(data, function(key, item) {
                    filas += "<div><a class='elemento-sugerido list-group-item' data='" + item.nombre_completo + "(" + item.numero_empleado + ")" + "' id='" + item.idtbl_usuarios + "'>" + item.nombre_completo + "(" + item.numero_empleado + ")" + "</a></div>";
                });
                $('.sugerencias').fadeIn(1000).html(filas);
                $('.elemento-sugerido').on('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var idtbl_usuarios = $(this).attr('id');
                    var nombre_completo = $(this).attr('data');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('.reportado_por_empleado').val(nombre_completo);
                    $('.reportado_por').val(idtbl_usuarios);
                    //Hacemos desaparecer el resto de sugerencias
                    $('.sugerencias').fadeOut(1000);
                    //alert('Has seleccionado el '+idtbl_usuarios+' '+$('#'+idtbl_usuarios).attr('data'));
                    return false;
                });
            }
        })

    });

    $("body").on('keydown', ".reportado_por_empleado", function(event){
        var element = $(this);
        var _this=$(this).closest('.personal');
        console.log(_this, $(_this).find('.reportado_por'));
        if($(_this).find('.reportado_por').val() != ""){
            element.val("");
            $('.reportado_por_empleado').val("");
            $('.reportado_por').val("");
        }
      });

    $("body").on('blur', ".reportado_por_empleado", function(event){
        var element = $(this);
        var _this=$(this).closest('.personal');
        if($(_this).find('.reportado_por').val() == ""){
          element.val("");
        }
    });
    $("body").on('click', ".reportado_por_empleado", function() {
        var element = $(this);
        element[0].setSelectionRange(0, element.val().length);
    });
    $("body").on('click', function() {
      $('.sugerencias').html("");
      $('.sugerencias').fadeOut(500);
    });

    //fin buscar usuario --fernando

    $('.usuariosSelectPicker').selectpicker();
    selectBuscar = "";
    obtenerPersonal();
    mostrarDatos("",1,"");

    $("select[name='selectCV']").on('change', function() {
        //selectBuscar = $("select[name='selectAC']").val();
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

function obtenerPersonal() {
    $('.usuariosSelectPicker').append($('<option>', { 
            value: "",
            text : "Seleccione ..."
    }));
    $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/personalControlVehicular' ?>',
          dataType: "json",
          success: function (data) {
              $.each(data, function(i,item){
                var option = $('<option>', { 
                      value: item.idtbl_usuarios,
                      text : item.nombres + ' (Número Empleado '+item.idtbl_usuarios+')'
                });
                if(item.estatus == 0){
                  option.prop("disabled", "true");
                }
                $('.usuariosSelectPicker[name="atiende"]').append(option);
              });
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      });
}

function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarAlmacenTarjetas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            selectCV: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.almacenTarjetas, function(key, item) {
                var clase = '';
                var servicio = '';
                totalKM = item.km_servicio - item.km_actual;                
                if(item.iddtl_servicio != null){
                    servicio = 'si'; 
                    clase = 'table-warning';                                                 
                }else{
                    servicio = 'no';
                    if (totalKM > 500 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-success";
                    } else if (totalKM <= 500 && totalKM > 0 && item.km_servicio != 0 && item.km_servicio != null) {
                        clase = "table-warning";
                    } else if (totalKM < 0 && item.km_servicio != 0 && item.km_servicio != null){
                        clase = "table-danger";
                    } else if (totalKM == '') {
                        clase = '';
                    }
                }

                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.neodata + "</td>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.marca + "</td>";
                filas += "<td>" + item.modelo + "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td>" + item.numero_serie + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
                filas += "<td>" + item.estatusAlmacen + "</td>";
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                filas += "<td>$" + item.precio + "</td>";
                filas += "<td>";
                filas += "<a href='" + "<?= base_url()?>almacen/detalle-producto/" + item
                    .iddtl_almacen + "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
                filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-modelo='" + item.modelolo + "' data-marca='" + item.marcaal + "' data-interno='" + item.numero_interno + "' data-precioalmacen='" + item.precio_almacen + "' data-nota='" + item.nota + "' data-estado='" + item.estado + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";

                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbalmacenautoscontrolvehicular tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
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

function mostrarServiciosAutos(valorBuscar, pagina, iddtl_almacen) {
    var tipo_tramite = 'servicio';
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/mostrarTramitesVehiculares",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            iddtl_almacen: iddtl_almacen,
            tipo_tramite: tipo_tramite
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.tramitesVehiculares, function(key, item) {
                var estatus = "";
                var clase = "";
                var porcentaje = "";
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
                filas += "<tr class='"+clase+"'>";
                filas += "<td>" + item.idtbl_tramites_vehiculares + "</td>";
                filas += "<td>" + item.fecha_creado + "</td>";                
                filas += "<td>" + item.fecha_tramite + "</td>";
                filas += "<td>" + item.kilometraje + "</td>";
                filas += "<td>" + item.detalle_tramite + "</td>";
                filas += "<td>" + estatus + "</td>"
                filas += "<td>" + item.tipo_servicio + "</td>";
                if(item.estatus == 'FINALIZADO'){
                filas += "<td><a href='<?= base_url() ?>control-vehicular/checklist-servicio/" + item.uid + "' title='Ver Checklist' onclick=\"" + "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" + '"' + "><i class='fa fa-eye'></i></a><a href='<?= base_url() ?>control-vehicular/checklist-servicio-tecnico/" + item.uid + "' title='Ver Checklist' onClick=\"" + "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" + '"' + "><i class='fa fa-wrench'></i></a></td>";
                }
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
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
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
            $(".paginacionservicios").html(paginador);
        }
    });
}

function mostrarHistorialAsignacionesAutos(valorBuscar, pagina, iddtl_almacen) {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/mostrarHistorialAsignacionesAutos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            iddtl_almacen: iddtl_almacen
        },
        dataType: "json",
        success: function(response) {
            filas = "";

            $.each(response.historialAsignacionesAutos, function(key, item) {

                filas += "<tr>";
                filas += "<td>" + item.iddtl_asignacion + "</td>";
                filas += "<td>" + item.fecha_asignacion + "</td>";
                filas += "<td>" + item.nombres + "</td>";
                filas += "<td>" + item.apellido_paterno + "</td>";
                filas += "<td>" + item.apellido_materno + "</td>";
                filas += "<td>" + item.estatus_asignacion + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + item.fecha_finalizacion + "</td>";
                filas += "</tr>";
            });
            $('#tbasignaciones tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
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
            $(".paginacionasignaciones").html(paginador);
        }
    });
}

function mostrarUnidadesAsignadas(valorBuscar, pagina, idtbl_usuarios) {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/mostrarUnidadesAsignadas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            idtbl_usuarios: idtbl_usuarios
        },
        dataType: "json",
        success: function(response) {
            filas = "";

            $.each(response.unidadesAsignadas, function(key, item) {
                if (item.estatus_asignacion == 'activa') {
                    var clase = 'table-success';
                } else {
                    var clase = 'table-danger';
                }
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.iddtl_asignacion + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td>" + item.marca + "</td>";
                filas += "<td>" + item.modelo + "</td>";
                filas += "<td>" + item.numero_serie + "</td>";
                filas += "<td>" + item.placas + "</td>";
                filas += "<td>" + item.fecha_asignacion + "</td>";
                filas += "<td>" + item.fecha_finalizacion + "</td>";
                filas += "</tr>";
            });
            $('#tbunidadesasignadas tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
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
            $(".paginacionunidadesasignadas").html(paginador);
        }
    });
}

function mostrarIncidencias(valorBuscar, pagina, idtbl_usuarios, iddtl_almacen) {
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/mostrarIncidencias",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            idtbl_usuarios: idtbl_usuarios,
            iddtl_almacen: iddtl_almacen,
            tipo_incidencia: 'control_vehicular'
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            $.each(response.incidencias, function(key, item) {
                if (item.estatus == 'Reparada') {
                    clase = 'table-success';
                } else {
                    clase = 'table-warning';
                }

                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.idtbl_incidencias + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td>" + item.placas + "</td>";
                filas += "<td>" + item.tipo + "</td>";
                filas += "<td>" + item.incidencia + "</td>";
                filas += "<td>" + item.fecha_incidencia + "</td>";
                filas += "<td>$" + item.costo + "</td>";
                filas += "<td>" + item.estatus + "</td>";
                filas += "<td>" + item.comentario_estatus + "</td>";
                filas += "<td>" + item.estatus_contabilidad + "</td>";
                filas += "<td>" + item.comentario_estatus_contabilidad + "</td>";
                filas += "<td><a href='#editar_estatus_incidencia' data-comentario_estatus='" + item
                    .comentario_estatus + "' data-idtbl_incidencias='" + item
                    .idtbl_incidencias + "' data-incidencia='" + item.incidencia +
                    "' data-unidad='" + item.numero_interno + "' data-fecha_incidencia='" + item
                    .fecha_incidencia + "' data-costo='" + item.costo +
                    "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
                if(item.documento_incidencia != null) {
                  filas += "<a target='__blank' href='<?= base_url(); ?>uploads/incidencias/" + item.documento_incidencia + ".pdf'><i class='fa fa-eye'></i></a>";
                }
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbincidencias tbody').html(filas);
            linkSeleccionado = Number(pagina);
            //total registros
            totalRegistros = response.totalRegistros;

            //cantidad de registros por página
            cantidadRegistros = response.cantidad;

            numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
            paginador = "<ul class='pagination justify-content-center'>";
            /*for(var i = 1; i <= numeroLinks; i++) {
              if(i == linkSeleccionado) 
                paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
              else
                paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
            }
            paginador += "</ul>";*/
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
            $(".paginacionincidencias").html(paginador);
        }
    });
}
</script>
<style type="text/css" media="print">
@media print {
    #salida_material {
        padding-top: 0;
    }

    #salida_material table td {
        border: none;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }
    #documento_multa{
        font-size: 18px;
    }
    #documento_multa .row{
        margin:0px;
    }
    #documento_multa table tr td{
        padding: 5px;
        text-align: center;
        font-size: 18px;
    }
}
</style>
<div class="container-fluid" style="display: none">
  <div class="card" id="salida_material" >
    <div class="row">
      <div class="col-4">
        <img class="img-fluid" src="<?= base_url(); ?>/uploads/logo-estevez-jor.png">  
      </div>
    </div>
    <div class="row">
      <div class="col-4"></div>
      <div class="col-8" style="text-align: center;font-size: 20px;">
        <?php setlocale(LC_ALL, 'es_ES'); ?>
        Tlalnepantla Estado de México a <?= date('d') ?> de <?=strftime('%B')?> de <?= date('Y') ?>
      </div>
      <br><br><br><br><br><br>
      <div class="col-12">
        <h1 style="font-size: 60px;text-align: center;">CARTA COMPROMISO DE PAGO</h1>
      </div>
      <br><br><br><br><br><br>
      <div class="col-12">
        <h1 style="font-size: 25px;">Nombre: <span class="operador"></span></h1>
      </div>
      <br><br><br><br><br><br><br>
      <div class="col-12">
        <p style="font-size: 25px;text-align: justify;">Por medio de la presente se autoriza se me realice el descuento de <strong><span class="costo"></span> (<span class="letras"></span>)</strong> por concepto <strong>REPOSICIÓN DE REPOSICIÓN:</strong></p>
      </div>
      <br><br>
      <div class="col-12">
        <p style="font-size: 25px;"><span class="concepto"></span></p>
      </div>
      <br><br>
      <div class="col-12">
        <p style="font-size: 25px;">A un <b>plazo</b> de <b><span class="quincenas"></span> quincenas</b>.</p>
      </div>
      <br><br><br>
      <div style="position: fixed;bottom: 0;width: 100%" class="container-fluid bg-light text-center p-3">
        <p>____________________________________________</p>
        <p style="font-size: 25px;"><strong><span class="operador"></span></strong></p>
        <p style="font-size: 25px;">Autorizo se realice el descuento</p>
        <br><br><br>
        <p style="color:#00BFFF;">______________________________________________________________________________________________________</p>
        <p style="font-size: 20px;color:#00BFFF;">CALLE FILIBERTO GOMEZ No. 46, COL. CENTRO INDUSTRIAL C.P. 54030 TLALNEPANTLA DE BAZ, MÉXICO.</p>
        <p style="font-size: 20px;color:#00BFFF;">TEL. (55) 6552-9104, 6552-9101</p>
      </div>
    </div>
</div>
</div>

<div class="container-fluid" style="display: none;">
  <div class="card" id="documento_multa">
    <div class="row">
      <table class="table table-bordered">
          <tbody>
            <tr>
                <td rowspan="4"><img class="img-fluid" src="<?= base_url(); ?>/uploads/logo-estevez-jor.png" style="display: inline-block; width: 120px;"></td>
                <td rowspan="2">ESTEVEZ.JOR SERVICIOS</td>
                <td>Código: DA-FE-AS-030</td>
            </tr>
            <tr>
                <td>Rev. O</td>
            </tr>
            <tr>
                <td rowspan="2">Carta Compromiso de Pago</td>
                <td>Fecha de modificación:</td>
            </tr>
            <tr>
                <td>Página 1 de 1</td>
            </tr>
          </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-4"></div>
      <div class="col-8" style="text-align: center;font-size: 20px;">
        <?php setlocale(LC_ALL, 'es_ES'); ?>
        Tlalnepantla Estado de México a <?= date('d') ?> de <?=strftime('%B')?> de <?= date('Y') ?>
      </div>
      <br><br><br><br><br><br>
        <div class="col-12">
            Estevez.Jor Servicios S.A. de C.V.
        </div>
        <div class="col-12">
            PRESENTE
        </div>
      <br><br><br><br>
        <div class="col-12">
            Por medio de la presente yo: <span class="nombre font-weight-bold"></span>.
        </div>
        <div class="col-12">
            Me comprometo a pagar la suma pactada por la cantidad de $<span class="total font-italic"></span>(<span class="cantidad_letra font-italic">OCHO CIENTOS SESENTA Y OCHO</span>), por concepto de <span class="concepto font-weight-bold"></span> 
        </div>
        <div class="col-12">
            Por Io que autorizo se aplique el descuento correspondiente vía nómina durante las siguientes <span class="quincenas"></span> quincenas.
        </div>
      <br><br><br><br><br><br><br><br><br><br>
      <div class="col-12" style="text-align: center;">
        ME COMPROMETO
      </div>
      <br><br><br><br>
      <div class="col-12" style="text-align: center;">
        ____________________________________
      </div>
      <div class="col-12" style="text-align: center;">
        NOMBRE Y FIRMA
      </div>
    </div>
</div>
</div>

<script>
function imprimirIncidencia() {
    quincenas = $("#nueva_incidencia input[name='quincenas']").val();
    price = $("#nueva_incidencia input[name='costo']").val();
    incidencia = $("textarea[name='incidencia']").val();
    letras = numeroALetras(price, {
      plural: "PESOS",
      singular: "PESO",
      centPlural: "a",
      centSingular: "a"
    });
    $(".letras").html('');
    $(".concepto").html('');
    $(".costo").html('');
    $(".quincenas").html('');
    $(".concepto").html(incidencia);
    $(".costo").html(price);
    $(".letras").html(letras);
    $(".quincenas").html(quincenas);
    $("#salida_material").print({
        iframe: true,
        globalStyles: true,
        mediaPrint: true,
        noPrintSelector: '.no-print'
    });
}
function imprimirMulta() {
    var concepto = $("#nueva_multa input[name='detalle_tramite']").val();
    var total = $("#nueva_multa input[name='total_pago']").val();
    var quincenas = $("#nueva_multa input[name='quincenas_pago']").val();
    var nombre = $("#nueva_multa input[name='reportado_por_empleado']").val();
    letras = numeroALetras(total, {
      plural: "PESOS",
      singular: "PESO",
      centPlural: "CENTAVOS",
      centSingular: "CENTAVO"
    });
    $("#documento_multa .concepto").html(concepto);
    $("#documento_multa .total").html(total);
    $("#documento_multa .quincenas").html(quincenas);
    $("#documento_multa .nombre").html(nombre);
    $("#documento_multa .cantidad_letra").html(letras);
    $("#documento_multa").print({
        iframe: true,
        globalStyles: true,
        mediaPrint: true,
        noPrintSelector: '.no-print'
    });
}
</script>

<script>
    function mostrarDatosCajaChica(fecha_inicial, fecha_final, pagina, iddtl_almacen) {
        $.ajax({
            url: "<?= base_url() ?>ControlVehicular/obtener_caja_chica",
            type: "POST",
            data: {
                fecha_inicial: fecha_inicial,
                fecha_final: fecha_final,
                nropagina:pagina,
                iddtl_almacen:iddtl_almacen
            },
            dataType: "json",
            success: function(response) {
                $('#tbcajachica tbody').html("");
                var filas = "";
                $.each(response.caja_chica, function(key, item) {
                    var className = "";
                    if(item.confirmacion == 1) {
                        className = 'table-success';
                    } else {
                        className = 'table-warning';
                    }
                    filas += "<tr class='" + className + "'>";
                    filas += "<td>" + item.idtbl_caja_chica  + "</td>";
                    filas += "<td>" + item.uid + "</td>";
                    filas += "<td>" + item.fecha_compra + "</td>";
                    filas += "<td>" + item.monto + "</td>";
                    filas += "<td>" + item.descripcion + "</td>";
                    filas += "<td>" + item.comprobante + "</td>";
                    filas += "<td><a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a></td>";
                    filas += "</tr>";
                });
                $('#tbcajachica tbody').html(filas);
                linkSeleccionado = Number(pagina);
                //total registros
                totalRegistros = response.totalRegistros;
                
                //cantidad de registros por página
                cantidadRegistros = response.cantidad;

                numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
                paginador = "<ul class='pagination justify-content-center'>";
                
                if(linkSeleccionado > 1) {
                  paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                  paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
                }
                else {
                  paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                  paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
                }
                cant = 2;
                pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
                if(numeroLinks > cant) {
                  pagRestantes = numeroLinks - linkSeleccionado;
                  pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
                }
                else {
                  pagFin = numeroLinks;
                }
                for(var i = pagInicio; i <= pagFin; i++) {
                  if(i == linkSeleccionado) {
                    paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
                  }
                  else {
                    paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
                  }
                }
                if(linkSeleccionado < numeroLinks) {
                  paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
                  paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
                }
                else {
                  paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                  paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
                }
                paginador += "</ul>";
                $(".paginacioncajachica").html(paginador);
            }
        });
    }

    function excelCajaChica(fecha_inicial, fecha_final, pagina, iddtl_almacen) {
        $.ajax({
            url: "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica",
            type: "POST",
            data: {
                fecha_inicial: fecha_inicial,
                fecha_final: fecha_final,
                nropagina:pagina,
                iddtl_almacen:iddtl_almacen
            },
            dataType: "json"
        });
    }

  function mostrarSiniestros(valorBuscar, pagina, iddtl_almacen) {
    $.ajax({
      url: "<?= base_url() ?>ControlVehicular/mostrarSiniestros",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,iddtl_almacen:iddtl_almacen},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        $.each(response.siniestros,function(key,item) {
          if(item.estatus == 'Concluido') {
            clase = 'table-success';
          } else {
            clase = 'table-warning';
          }

          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item.idtbl_siniestros + "</td>";
          filas += "<td>" + item.seguro + "</td>";
          filas += "<td>" + item.nombre_reportado_por + " " + item.apellido_paterno_reportado_por + " " + item.apellido_materno_reportado_por + "</td>";
          filas += "<td>" + item.tipo + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          filas += "<td>" + item.fecha_siniestro + "</td>";
          filas += "<td>" + item.fecha_conclusion + "</td>";
          filas += "<td><a href='#editar_siniestros' data-idtbl-siniestros='" + item.idtbl_siniestros + "' data-seguro='" + item.seguro + "' data-idtbl-usuarios-reportado-por='" + item.idtbl_usuarios_reportado_por + "' data-usuarios-reportado-por='" + item.nombre_reportado_por + " " + item.apellido_paterno_reportado_por + " " + item.apellido_materno_reportado_por + "' data-idtbl-usuarios-atiende='" + item.idtbl_usuarios_atiende + "' data-estatus='" + item.estatus + "' data-fecha-siniestro='" + item.fecha_siniestro + "' data-fecha-conclusion='" + item.fecha_conclusion + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-nombre-contacto='" + item.nombre_contacto + "' data-telefono-contacto='" + item.telefono_contacto + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-observaciones='" + item.observaciones_contabilidad +  "' data-iddtl-almacen='" + item.iddtl_almacen + "' data-tipo='" + item.tipo + "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
          if(item.file) {
            filas += "<a target='__blank' href='<?= base_url(); ?>uploads/siniestros/" + item.idtbl_siniestros + ".pdf'><i class='fa fa-file-pdf-o'></i></a>";
          }
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbsiniestros tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacionsiniestros").html(paginador);
      }
    });
  }
  function mostrarMultas(valorBuscar, pagina, iddtl_almacen) {
    $.ajax({
      url: "<?= base_url() ?>ControlVehicular/mostrarMultas",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,iddtl_almacen:iddtl_almacen},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        $.each(response.multas,function(key,item) {
          if(item.estatus == 1) {
            clase = 'table-success';
          } else {
            clase = 'table-warning';
          }

          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item.idtbl_tramites_vehiculares + "</td>";
          filas += "<td>" + item.fecha_creado + "</td>";
          filas += "<td>" + item.detalle_tramite + "</td>";
          filas += "<td>" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + "</td>";
          filas += "<td>" + item.quincenas_pago + "</td>";
          filas += "<td>" + (item.estatus == 0 ? "Pendiente" : "Finalizado") + "</td>";
          /*filas += "<td><a href='#nueva_multa' data-idtbl-tramites-vehiculares='" + item.idtbl_tramites_vehiculares + "' data-fecha-tramite='" + item.fecha_tramite + "' data-fecha-creado='" + item.fecha_creado + "' data-detalle-tramite='" + item.detalle_tramite + "' data-tbl-usuarios-idtbl_usuarios='" + item.tbl_usuarios_idtbl_usuarios + "' data-quincenas-pago='" + item.quincenas_pago + "' data-estatus='" + item.estatus + "' data-total-pago='" + item.total_pago + "' data-iddtl-almacen='" + item.dtl_almacen_iddtl_almacen + "' data-toggle='modal' data-tipo='editar' data-nombre-completo='" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + " (" + item.numero_empleado + ")" + "' data-fecha-vigencia='" + item.fecha_vigencia + "'><i class='fa fa-edit'></i></a><a>" + (item.file_exists == false ? "<a href='#subir_archivo_multa' data-toggle='modal' title='Subir Archivo' data-uid='" + item.uid + "' data-iddtl-almacen='" + item.dtl_almacen_iddtl_almacen + "'><i class='fa fa-upload'></i></a>" : "<a href='<?= base_url() ?>uploads/tramites_vehiculares/" + item.uid + ".pdf' target='_blank'><i class='fa fa-file-pdf-o'></i></a>" ) +  "</td>";*/
          filas += "<td><a href='#nueva_multa' data-idtbl-tramites-vehiculares='" + item.idtbl_tramites_vehiculares + "' data-fecha-creado='" + item.fecha_creado + "' data-detalle-tramite='" + item.detalle_tramite + "' data-tbl-usuarios-idtbl_usuarios='" + item.tbl_usuarios_idtbl_usuarios + "' data-quincenas-pago='" + item.quincenas_pago + "' data-estatus='" + item.estatus + "' data-total-pago='" + item.total_pago + "' data-iddtl-almacen='" + item.dtl_almacen_iddtl_almacen + "' data-toggle='modal' data-tipo='editar' data-nombre-completo='" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + " (" + item.numero_empleado + ")" + "'><i class='fa fa-edit'></i></a><a>" + (item.file_exists == false ? "<a href='#subir_archivo_multa' data-toggle='modal' title='Subir Archivo' data-uid='" + item.uid + "' data-iddtl-almacen='" + item.dtl_almacen_iddtl_almacen + "'><i class='fa fa-upload'></i></a>" : "<a href='<?= base_url() ?>uploads/tramites_vehiculares/" + item.uid + ".pdf' target='_blank'><i class='fa fa-file-pdf-o'></i></a>" ) +  "</td>";
          filas += "</tr>";
        });
        $('#tbmultas tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacionmultas").html(paginador);
      }
    });
  }
  function mostrarFolios(idtblSiniestros, modal){
    $.ajax({
      url: "<?php echo base_url();?>ControlVehicular/obtenerFoliosSiniestros",
      type: "POST",
      data: {idtbl_siniestros:idtblSiniestros}, 
      dataType: "json",
      cache : false,
      success: function(resp) {
        filas = "";
        console.log(resp);
        for(r=0; r<resp.length; r++){
          filas += "<tr><td>" + resp[r].folio + "</td><td>" + resp[r].estatus_responsabilidad + "</td><td><a href='#folio_siniestros' data-toggle='modal' title='Editar Folio' data-tipo='edicion' data-iddtl-siniestros='" + resp[r].iddtl_siniestros + "' data-idtbl-siniestros='" + resp[r].tbl_siniestros_vehiculos_idtbl_siniestros + "' data-folio='" + resp[r].folio + "' data-estatus-responsabilidad='" + resp[r].estatus_responsabilidad + "'><i class='fa fa-edit'></i></a></td></tr>";
        }
        modal.find("#folios_siniestros tbody").html(filas);
      }
    });
  }

  $('#form_nuevo_siniestro').submit(function(event){
      event.preventDefault();
      var frm = new FormData($(this)[0]);
      var idtbl_tramites_vehiculares = frm.get("idtbl_tramites_vehiculares");
      if(idtbl_tramites_vehiculares == ""){
        Toast.fire({
          type: 'error',
          title: "El auto no cuenta con seguro."
        });
        return;
      }
      var iddtl_almacen = frm.get("iddtl_almacen");
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/nuevoSiniestro' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: "Registro exitoso."
              });
              mostrarSiniestros("",1,iddtl_almacen);
              $("#nuevo_siniestro").modal("hide");
            }else{
              Toast.fire({
                type: 'error',
                title: data
              });
            }
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      }); 
  });

  $('#form-editar-siniestros').submit(function(event){
      event.preventDefault();
      var frm = new FormData($(this)[0]);
      var iddtl_almacen = frm.get('iddtl_almacen');
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/editarSiniestros' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: "Actualición exitosa."
              });
              mostrarSiniestros("",1,iddtl_almacen);
              $("#editar_siniestros").modal("hide");
            }else{
              Toast.fire({
                type: 'error',
                title: data
              });
            }
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      }); 
  });

  $('#form-folio-siniestros').submit(function(event){
      event.preventDefault();
      var frm = new FormData($(this)[0]);
      var idtbl_siniestros = frm.get('idtbl_siniestros');
      var tipo = frm.get('tipo');
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/nuevoFolio' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: tipo == "nuevo" ? "Registro exitoso." : "Actualición exitosa."
              });
              mostrarFolios(idtbl_siniestros,$("#editar_siniestros"));
              $("#folio_siniestros").modal("hide");
            }else{
              Toast.fire({
                type: 'error',
                title: data
              });
            }
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      }); 
  });

  $("#form-nueva-multa").submit(function(event){
    event.preventDefault();
    var frm = new FormData($(this)[0]);
    var iddtl_almacen = frm.get('iddtl_almacen');
    $.ajax({
        type: "POST",
        url: '<?= base_url() . 'ControlVehicular/nuevaMulta' ?>',
        data: frm,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data);
            if(data.error == false){
                Toast.fire({
                    type: 'success',
                    title: "Registro exitoso."
                });
                mostrarMultas("", 1, iddtl_almacen);
                $("#nueva_multa").modal("hide");
            }else{
                Toast.fire({
                    type: 'error',
                    title: data.mensaje
                });
            }
        },
        error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
            });
        }
    });
  });

  $("#form-subir-archivo-multa").submit(function(event){
    event.preventDefault();
    form = new FormData($(this)[0]);
    iddtl_almacen = form.get("iddtl_almacen");
    $.ajax({
        type: "POST",
        url: "<?= base_url() . 'ControlVehicular/archivo_multa' ?>",
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
                mostrarMultas("", 1, iddtl_almacen);
                $("#subir_archivo_multa").modal("hide");
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

  $("#agregar_multa").click(function(){
    componente = $("<tr><td><input class='form-control' type='text' name='numero_multa[]' required></td><td><input class='form-control' type='date' name='fecha_multa[]' required></td><td><input class='form-control' type='date' name='fecha_vigencia[]' required></td><td><button type='button' class='btn eliminar_multa'><i class='fa fa-trash-o' aria-hidden='true' style='font-size:25px; color:red;'></i></button></td></tr>");
    $("#tabla_multas tbody").append(componente);
  });

  $("#tabla_multas").on("click", ".eliminar_multa" , function(){
    elemento = $(this);
    elemento.closest("tr").remove();
  });

  function disabled(e){
    $(e).find('button[type="submit"]').prop("disabled", "true");
  }

</script>
<script>
var numeroALetras = (function() {
    // Código basado en el comentario de @sapienman
    // Código basado en https://gist.github.com/alfchee/e563340276f89b22042a
    function Unidades(num) {

        switch (num) {
            case 1:
                return 'UN';
            case 2:
                return 'DOS';
            case 3:
                return 'TRES';
            case 4:
                return 'CUATRO';
            case 5:
                return 'CINCO';
            case 6:
                return 'SEIS';
            case 7:
                return 'SIETE';
            case 8:
                return 'OCHO';
            case 9:
                return 'NUEVE';
        }

        return '';
    } //Unidades()

    function Decenas(num) {

        let decena = Math.floor(num / 10);
        let unidad = num - (decena * 10);

        switch (decena) {
            case 1:
                switch (unidad) {
                    case 0:
                        return 'DIEZ';
                    case 1:
                        return 'ONCE';
                    case 2:
                        return 'DOCE';
                    case 3:
                        return 'TRECE';
                    case 4:
                        return 'CATORCE';
                    case 5:
                        return 'QUINCE';
                    default:
                        return 'DIECI' + Unidades(unidad);
                }
            case 2:
                switch (unidad) {
                    case 0:
                        return 'VEINTE';
                    default:
                        return 'VEINTI' + Unidades(unidad);
                }
            case 3:
                return DecenasY('TREINTA', unidad);
            case 4:
                return DecenasY('CUARENTA', unidad);
            case 5:
                return DecenasY('CINCUENTA', unidad);
            case 6:
                return DecenasY('SESENTA', unidad);
            case 7:
                return DecenasY('SETENTA', unidad);
            case 8:
                return DecenasY('OCHENTA', unidad);
            case 9:
                return DecenasY('NOVENTA', unidad);
            case 0:
                return Unidades(unidad);
        }
    } //Unidades()

    function DecenasY(strSin, numUnidades) {
        if (numUnidades > 0)
            return strSin + ' Y ' + Unidades(numUnidades)

        return strSin;
    } //DecenasY()

    function Centenas(num) {
        let centenas = Math.floor(num / 100);
        let decenas = num - (centenas * 100);

        switch (centenas) {
            case 1:
                if (decenas > 0)
                    return 'CIENTO ' + Decenas(decenas);
                return 'CIEN';
            case 2:
                return 'DOSCIENTOS ' + Decenas(decenas);
            case 3:
                return 'TRESCIENTOS ' + Decenas(decenas);
            case 4:
                return 'CUATROCIENTOS ' + Decenas(decenas);
            case 5:
                return 'QUINIENTOS ' + Decenas(decenas);
            case 6:
                return 'SEISCIENTOS ' + Decenas(decenas);
            case 7:
                return 'SETECIENTOS ' + Decenas(decenas);
            case 8:
                return 'OCHOCIENTOS ' + Decenas(decenas);
            case 9:
                return 'NOVECIENTOS ' + Decenas(decenas);
        }

        return Decenas(decenas);
    } //Centenas()

    function Seccion(num, divisor, strSingular, strPlural) {
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let letras = '';

        if (cientos > 0)
            if (cientos > 1)
                letras = Centenas(cientos) + ' ' + strPlural;
            else
                letras = strSingular;

        if (resto > 0)
            letras += '';

        return letras;
    } //Seccion()

    function Miles(num) {
        let divisor = 1000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
        let strCentenas = Centenas(resto);

        if (strMiles == '')
            return strCentenas;

        return strMiles + ' ' + strCentenas;
    } //Miles()

    function Millones(num) {
        let divisor = 1000000;
        let cientos = Math.floor(num / divisor)
        let resto = num - (cientos * divisor)

        let strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
        let strMiles = Miles(resto);

        if (strMillones == '')
            return strMiles;

        return strMillones + ' ' + strMiles;
    } //Millones()

    return function NumeroALetras(num, currency) {
        currency = currency || {};
        let data = {
            numero: num,
            enteros: Math.floor(num),
            centavos: (((Math.round(num * 100)) - (Math.floor(num) * 100))),
            letrasCentavos: '',
            letrasMonedaPlural: currency.plural || 'PESOS CHILENOS', //'PESOS', 'Dólares', 'Bolívares', 'etcs'
            letrasMonedaSingular: currency.singular || 'PESO CHILENO', //'PESO', 'Dólar', 'Bolivar', 'etc'
            letrasMonedaCentavoPlural: currency.centPlural || 'CHIQUI PESOS CHILENOS',
            letrasMonedaCentavoSingular: currency.centSingular || 'CHIQUI PESO CHILENO'
        };

        //if (data.centavos > 0) {
            data.letrasCentavos = data.centavos + "/100 Moneda Nacional";
            /*data.letrasCentavos = 'CON ' + (function() {
                if (data.centavos == 1)
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
                else
                    return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();*/
        //};

        if (data.enteros == 0)
            return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
        if (data.enteros == 1)
            return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
        else
            return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    };

})();
</script>