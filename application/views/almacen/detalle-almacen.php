<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <!-- Item -->
            <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo']>1): ?>
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() ?>almacen/catalogo">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green"><i class="fa fa-list"></i></div>
                            <div class="title"><span>Ver<br>Catálogo</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php endif ?>
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() ?>almacen/traspasos/<?= $almacen->idtbl_almacenes ?>">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-blue"><i class="fa fa-list"></i></div>
                            <div class="title"><span>Ver<br>Traspasos</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php if($almacen->tbl_almacenes_idtbl_almacenes == NULL && ($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19) && ($this->session->userdata('id') != 107 && $this->session->userdata('id') != 229 && $this->session->userdata('id') != 207 && $this->session->userdata('id') != 247)){ ?>
            <div class="col-xl-3 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="#subAlmacen" data-toggle="modal">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green"><i class="fa fa-plus"></i></div>
                            <div class="title"><span>Nuevo<br>Sub Almacén</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4><?php if(isset($almacen)) { ?><?php echo $almacen->almacen ?><?php } ?><?php if(!isset($almacen)) { ?><?php echo $proyecto->nombre_proyecto ?><?php } ?>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
                            <?php if($aux === 'no') { ?>
                            <div>
                                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 11 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '')){ ?>
                                <div class="text-right"><button onclick="window.location.href='<?php echo base_url() ?>almacen/cuadre-materiales/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Cuadre Materiales</span></button></div>
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <?php if(isset($listadoAlmacenesSubProyectos[0])){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn <?= isset($listadoAlmacenesSubProyectos[0]) ? 'active' : '' ?>" id="pills-explosion-tab" data-toggle="pill"
                                            href="#pills-explosion" role="tab" aria-controls="pills-explosion"
                                            aria-selected="true">
                                            Explosión de Insumos
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <?php if(!isset($listadoAlmacenesSubProyectos[0])){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn <?= !isset($listadoAlmacenesSubProyectos[0]) ? 'active' : '' ?>" id="pills-productos-tab" data-toggle="pill"
                                            href="#pills-productos" role="tab" aria-controls="pills-productos"
                                            aria-selected="true">
                                            Inventario
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-entrada-tab" data-toggle="pill"
                                            href="#pills-entrada" role="tab" aria-controls="pills-entrada"
                                            aria-selected="false">
                                            Entradas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-salida-tab" data-toggle="pill"
                                            href="#pills-salida" role="tab" aria-controls="pills-salida"
                                            aria-selected="false">
                                            Salidas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill"
                                            href="#pills-devolucion" role="tab" aria-controls="pills-devolucion"
                                            aria-selected="false">
                                            Devoluciones
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-traspaso-tab" data-toggle="pill"
                                            href="#pills-traspaso" role="tab" aria-controls="pills-traspaso"
                                            aria-selected="false">
                                            Salidas Traspasos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-entradatraspaso-tab" data-toggle="pill"
                                            href="#pills-entradatraspaso" role="tab" aria-controls="pills-entradatraspaso"
                                            aria-selected="false">
                                            Entradas Traspasos
                                        </a>
                                    </li>
                                </ul>
                                <?php }else if($this->session->userdata('tipo') == 11 && $this->session->userdata('jefe') == 1){ ?>
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-explosion-tab" data-toggle="pill"
                                            href="#pills-explosion" role="tab" aria-controls="pills-explosion"
                                            aria-selected="true">
                                            Explosión de Insumos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-entrada-tab" data-toggle="pill"
                                            href="#pills-entrada" role="tab" aria-controls="pills-entrada"
                                            aria-selected="false">
                                            Entradas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-salida-tab" data-toggle="pill"
                                            href="#pills-salida" role="tab" aria-controls="pills-salida"
                                            aria-selected="false">
                                            Salidas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill"
                                            href="#pills-devolucion" role="tab" aria-controls="pills-devolucion"
                                            aria-selected="false">
                                            Devoluciones
                                        </a>
                                    </li>
                                </ul>
                                <?php }else{ ?>
                                <div class="text-right"><button onclick="window.location.href='<?php echo base_url() ?>almacen/cuadre-materiales/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Cuadre Materiales</span></button></div>
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-productos-tab" data-toggle="pill"
                                            href="#pills-productos" role="tab" aria-controls="pills-productos"
                                            aria-selected="true">
                                            Inventario
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-entrada-tab" data-toggle="pill"
                                            href="#pills-entrada" role="tab" aria-controls="pills-entrada"
                                            aria-selected="false">
                                            Entradas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-salida-tab" data-toggle="pill"
                                            href="#pills-salida" role="tab" aria-controls="pills-salida"
                                            aria-selected="false">
                                            Salidas
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill"
                                            href="#pills-devolucion" role="tab" aria-controls="pills-devolucion"
                                            aria-selected="false">
                                            Devoluciones
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-traspaso-tab" data-toggle="pill"
                                            href="#pills-traspaso" role="tab" aria-controls="pills-traspaso"
                                            aria-selected="false">
                                            Salidas Traspasos
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-entradatraspaso-tab" data-toggle="pill"
                                            href="#pills-entradatraspaso" role="tab" aria-controls="pills-entradatraspaso"
                                            aria-selected="false">
                                            Entradas Traspasos
                                        </a>
                                    </li>
                                </ul>
                                <?php } ?>
                                <?php if($this->session->userdata('tipo') == 11 && $this->session->userdata('jefe') == 1){ ?>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pills-entrada" role="tabpanel"
                                        aria-labelledby="pills-entrada-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda2">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-entradas/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbentradasalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Proyecto</th>
                                                        <th>Tipo Documento</th>
                                                        <th>Tipo Entrada</th>
                                                        <th>Número Documento</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Proyecto</th>
                                                        <th>Tipo Documento</th>
                                                        <th>Tipo Entrada</th>
                                                        <th>Número Documento</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion2">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-salida" role="tabpanel"
                                        aria-labelledby="pills-salida-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda3">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-salidas/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbsalidasalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion3">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>

                                    <div class="tab-pane fade" id="pills-devolucion" role="tabpanel"
                                        aria-labelledby="pills-devolucion-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda4">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-devoluciones/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbdevolucionesalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion4">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>


                                    <div class="tab-pane fade show active" id="pills-explosion" role="tabpanel"
                                        aria-labelledby="pills-explosion-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda10">
                                        </div>
                                        <center>
                                            <?php if ($this->session->userdata('tipo') == 11 && $this->session->userdata('jefe') == 1) { ?>
                                                <a href="<?php echo base_url().'almacen/nueva-explosion-insumos/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Explosión de Insumos</a>
                                            <?php } ?>


                                            <!--<a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>-->
                                            <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                            <a href="#nuevo_traspaso" data-toggle='modal'
                                                data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i
                                                    class="fa fa-random"></i> Traspaso</a>
                                            <?php endif ?>
                                            <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                                        </center>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-explosion/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>                                                
                                        </button>
                                        <div class="table-responsive" id="printableArea">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbexplosioninsumos">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Código</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th data-priority="2">Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th data-priority="3">Cantidad</th>
                                                        <th>Serie</th>
                                                        <th>N° Interno</th>
                                                        <th>Precio Unitario</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th>Cantidad</th>
                                                        <th>Serie</th>
                                                        <th>N° Interno</th>
                                                        <th>Precio Unitario</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion10">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>
                                <?php }else{ ?>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade" id="pills-entrada" role="tabpanel"
                                        aria-labelledby="pills-entrada-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda2">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-entradas/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-explosion/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel Explosión</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbentradasalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que solicitó</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Sitio</th>
                                                        <th>segmento</th>
                                                        <th>Tipo Entrada</th>
                                                        <!--<th>Número Documento</th>-->
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que solicitó</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Sitio</th>
                                                        <th>Segmento</th>
                                                        <th>Tipo Entrada</th>
                                                        <!--<th>Número Documento</th>-->
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion2">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade <?= isset($listadoAlmacenesSubProyectos[0]) ? 'show active' : '' ?>" id="pills-explosion" role="tabpanel"
                                        aria-labelledby="pills-explosion-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda10">
                                        </div>
                                        <center>
                                            <?php if (($this->session->userdata('tipo') == 11) || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 17 || ($this->session->userdata('encargado_almacen') != '' && $this->session->userdata('encargado_almacen') != null)) { ?>
                                            <a href="<?php echo base_url().'almacen/nueva-explosion-insumos/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Explosión de Insumos</a>
                                            <?php } ?>


                                            <!--<a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>-->
                                            <!--<?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                            <a href="#nuevo_traspaso" data-toggle='modal'
                                                data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i
                                                    class="fa fa-random"></i> Traspaso</a>
                                            <?php endif ?>-->
                                            <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                                        </center>
                                        <?php if($almacen->idtbl_almacenes == 275 || $almacen->idtbl_almacenes == 281 || $almacen->idtbl_almacenes == 287){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel_almacenes_explosion_regiones/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <?php }else{ ?>
                                            <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-explosion/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                            <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbexplosioninsumos">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Código</th>
                                          
                                                        <th data-priority="2">Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th data-priority="3">Explosión</th>
                                                        <?php if($almacen->idtbl_almacenes == 275){ ?>
                                                            <th data-priority="3">NUEVO LEON</th>
                                                            <th data-priority="3">Almacen Coahuila</th>
                                                            <th data-priority="3">Almacén Tamaulipas</th>
                                                            <th data-priority="3">ALMACÉN CIUDAD VICTORIA</th>
                                                            <th data-priority="3">Almacén Tranocos Región 3</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php }elseif($almacen->idtbl_almacenes == 281){ ?>
                                                            <th data-priority="3">Almacen Juchitan</th>
                                                            <th data-priority="3">Almacen Chiapas</th>
                                                            <th data-priority="3">Almacén Oaxaca Centro</th>
                                                            <th data-priority="3">ARRIAGA-CHIAPAS</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php }elseif($almacen->idtbl_almacenes == 287){ ?>
                                                            <th data-priority="3">Almacén Fresnillo</th>
                                                            <th data-priority="3">Almacén Trancoso</th>
                                                            <th data-priority="3">Almacén Victoria de Durango</th>
                                                            <th>Almacén virtual Chihuahua</th>
                                                            <th>Almacén físico Chihuahua</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php } ?>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                
                                                        <th>Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th>Explosión</th>
                                                        <?php if($almacen->idtbl_almacenes == 275){ ?>
                                                            <th data-priority="3">NUEVO LEON</th>
                                                            <th data-priority="3">Almacen Coahuila</th>
                                                            <th data-priority="3">Almacén Tamaulipas</th>
                                                            <th data-priority="3">ALMACÉN CIUDAD VICTORIA</th>
                                                            <th data-priority="3">Almacén Tranocos Región 3</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php }elseif($almacen->idtbl_almacenes == 281){ ?>
                                                            <th data-priority="3">Almacen Juchitan</th>
                                                            <th data-priority="3">Almacen Chiapas</th>
                                                            <th data-priority="3">Almacén Oaxaca Centro</th>
                                                            <th data-priority="3">ARRIAGA-CHIAPAS</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php }elseif($almacen->idtbl_almacenes == 287){ ?>
                                                            <th data-priority="3">Almacén Fresnillo</th>
                                                            <th data-priority="3">Almacén Trancoso</th>
                                                            <th data-priority="3">Almacén Victoria de Durango</th>
                                                            <th>Almacén virtual Chihuahua</th>
                                                            <th>Almacén físico Chihuahua</th>
                                                            <th>Restante</th>
                                                            <th>Porcentaje</th>
                                                        <?php } ?>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion10">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-salida" role="tabpanel"
                                        aria-labelledby="pills-salida-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda3">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-salidas/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbsalidasalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <th>Proyecto</th>
                                                        <th>Sitio</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <th>Proyecto</th>
                                                        <th>Sitio</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion3">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-devolucion" role="tabpanel"
                                        aria-labelledby="pills-devolucion-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda4">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-devoluciones/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbdevolucionesalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion4">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-traspaso" role="tabpanel"
                                        aria-labelledby="pills-traspaso-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda5">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-traspasos/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbtraspasosalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Proyecto</th>
                                                        <th>Almacen Destino</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Proyecto</th>
                                                        <th>Almacen Destino</th>
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion5">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade" id="pills-entradatraspaso" role="tabpanel"
                                        aria-labelledby="pills-entradatraspaso-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaEntradaTraspaso">
                                        </div>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-traspasos/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbentradatraspasoalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que solicitó</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Tipo Entrada</th>
                                                        <th>Almacén Origen</th>
                                                        <!--<th>Número Documento</th>-->
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <!--<th>Almacen</th>-->
                                                        <th>Fecha</th>
                                                        <th>Personal que solicitó</th>
                                                        <th>Personal que aprobó</th>
                                                        <th>Tipo Entrada</th>
                                                        <th>Almacén Origen</th>
                                                        <!--<th>Número Documento</th>-->
                                                        <!--<th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacionEntradaTraspaso">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                    <div class="tab-pane fade <?= !isset($listadoAlmacenesSubProyectos[0]) ? 'show active' : '' ?>" id="pills-productos" role="tabpanel"
                                        aria-labelledby="pills-productos-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda">
                                        </div>
                                        <center>                                        
                                            <?php if (($this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 17 || $this->session->userdata('id') == 172) && $this->session->userdata('id') != 229 && ($almacen->proyecto_principal != NULL && $almacen->tbl_almacenes_idtbl_almacenes != NULL)) { ?>
                                            <?php if($almacen->tbl_proyectos_idtbl_proyectos != NULL){ ?>
                                                <a href="<?php echo base_url().'almacen/nueva_entrada_almacen_cliente_explosion/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Entrada</a>
                                                <?php }else{ ?>
                                                <!--<a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Entrada</a>-->
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <?php if($this->session->userdata('tipo') != 9){ ?>
                                                <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Entrada</a>
                                                <?php } ?>
                                                <a href="<?php echo base_url().'almacen/nueva-explosion-insumos/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Explosión de Insumos</a>
                                                <?php } ?>
                                            <?php if ($almacen->tipo == 'externo' && $this->session->userdata('tipo') == 178) { ?>
                                            <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Entrada</a>
                                            <?php } ?>
                                            <?php if ($almacen->uid == "25839864557600770" || $almacen->uid == "632b58229df25") { ?>
                                            <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>"
                                                class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i>
                                                Entrada</a>
                                            <?php } ?>

                                            <!--<a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>-->
                                            <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                            <a href="#nuevo_traspaso" data-toggle='modal'
                                                data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i
                                                    class="fa fa-random"></i> Traspaso</a>
                                            <?php endif ?>
                                            <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                                        </center>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-productos/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>                                        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbproductosalmacencli">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">Código</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th data-priority="2">Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th data-priority="3">Existencias</th>
                                                        <th>Serie</th>
                                                        <th>N° Interno</th>
                                                        <th>Estatus</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Descripción</th>
                                                        <th>Unidad</th>
                                                        <th title="Categoría">Categoría</th>
                                                        <th>Existencias</th>
                                                        <th>Serie</th>
                                                        <th>N° Interno</th>
                                                        <th class="estatus">Estatus</th>
                                                        <th>Precio Unitario</th>
                                                        <th>Total</th>
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
                                        <!---->
                                    </div>
                                </div>
                                <?php } ?>

                            </div>
                            <?php } ?>

                            <?php if($aux === 'si') { ?>
                            <div style="padding-top: 10px;">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill"
                                            href="#pills-salida" role="tab" aria-controls="pills-salida"
                                            aria-selected="true">
                                            Salidas
                                        </a>
                                    </li>
                                    <input type="hidden" id="uid_proyecto" value="<?= $uid ?>">
                                    <li class="nav-item">
                                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill"
                                            href="#pills-devolucion" role="tab" aria-controls="pills-devolucion"
                                            aria-selected="false">
                                            Devoluciones
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-salida" role="tabpanel"
                                        aria-labelledby="pills-salida-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda6">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbsalidasproyecto">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <th>Almacen</th>
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <!--<th>Proyecto</th>
                        <th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Folio</th>
                                                        <th>Almacen</th>
                                                        <th>Fecha</th>
                                                        <th>Personal que entrega</th>
                                                        <th>Personal que recibe</th>
                                                        <!--<th>Proyecto</th>
                        <th>Estatus</th>-->
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion6">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-devolucion" role="tabpanel"
                                        aria-labelledby="pills-devolucion-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda7">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbdevolucionesproyecto">
                                                <thead>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Almacen</th>
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <th>Estatus</th>
                                                        <th>Folio</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Uid</th>
                                                        <th>Almacen</th>
                                                        <th>Fecha</th>
                                                        <th>Personal entrega</th>
                                                        <th>Personal recibe</th>
                                                        <th>Proyecto</th>
                                                        <th>Estatus</th>
                                                        <th>Folio</th>
                                                        <th></th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion7">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                        </div>
                    </div>
                    <!--<div class="card-footer text-muted">Última modificación </div>-->
                </div>
            </div>
            <!-- end col-->
        </div>

    </div>
</section>


<?php if(isset($listadoAlmacenesSubProyectos[0])){ ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Almacenes SubProyectos</h4><br>
                            <?php if($aux === 'no') { ?>
                            <center>
                                <!--<a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
                                <a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>
                                <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                    <a href="#nuevo_traspaso" data-toggle='modal' data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
                                <?php endif ?>-->
                                <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                            </center>
                            <div>
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-subproyectos-tab" data-toggle="pill"
                                            href="#pills-subproyectos" role="tab" aria-controls="pills-subproyectos"
                                            aria-selected="true">
                                            Almacenes SubProyectos
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-subproyectos" role="tabpanel"
                                        aria-labelledby="pills-subproyectos-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busquedaSubProyectos">
                                        </div>
                                        <!--<button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-productos/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>-->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbsubproyectos">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">UID</th>
                                                        <th>Sub Proyecto</th>
                                                        <th>Almacén</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>UID</th>
                                                        <th>Sub Proyecto</th>
                                                        <th>Almacén</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacionSubProyectos">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>

                            </div>
                            <?php } ?>



                        </div>
                    </div>
                    <!--<div class="card-footer text-muted">Última modificación </div>-->
                </div>
            </div>
            <!-- end col-->
        </div>

    </div>
</section>
<?php } ?>



<?php if($almacen->tbl_almacenes_idtbl_almacenes == NULL){ ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>SubAlmacenes</h4><br>
                            <?php if($aux === 'no') { ?>
                            <center>
                                <!--<a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
                                <a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>
                                <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                                    <a href="#nuevo_traspaso" data-toggle='modal' data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
                                <?php endif ?>-->
                                <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                            </center>
                            <div>
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link btn active" id="pills-subalmacen-tab" data-toggle="pill"
                                            href="#pills-subalmacen" role="tab" aria-controls="pills-subalmacen"
                                            aria-selected="true">
                                            Cluster
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade show active" id="pills-subalmacen" role="tabpanel"
                                        aria-labelledby="pills-subalmacen-tab">
                                        <!---->
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda11">
                                        </div>
                                        <!--<button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-productos/<?=$almacen->idtbl_almacenes?>'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                                                a Excel</span></button>-->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover"
                                                id="tbsubalmacenes">
                                                <thead>
                                                    <tr>
                                                        <th data-priority="1">UID</th>
                                                        <th>Almacén</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>UID</th>
                                                        <th>Almacén</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <br>
                                            <div class="paginacion11">

                                            </div>
                                        </div>
                                        <!---->
                                    </div>
                                </div>

                            </div>
                            <?php } ?>



                        </div>
                    </div>
                    <!--<div class="card-footer text-muted">Última modificación </div>-->
                </div>
            </div>
            <!-- end col-->
        </div>

    </div>
</section>
<?php } ?>


<div id="nuevo_traspaso" tabindex="-1" role="dialog" aria-labelledby="labelNuevoTraspaso" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/nuevo-traspaso') ?>
            <div class="modal-header">
                <h4 id="labelNuevoTraspaso" class="modal-title">Nuevo Traspaso</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Almacen Destino</label>
                            <select name="almacen_destino" id="" class="form-control" data-live-search="true" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <?php foreach ($almacenes as $key => $value) { ?>
                                <?php if ($value->almacen == $almacen->almacen) { ?>
                                <option value="<?= $value->idtbl_almacenes ?>" disabled><?= $value->almacen ?></option>
                                <?php } else { ?>
                                <option value="<?= $value->idtbl_almacenes ?>"><?= $value->almacen ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input name="almacen_origen" type="text" value="<?= $almacen->uid ?>" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm">Nuevo Traspaso</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/actualizar-producto-catalogo') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Producto en Catálogo</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Inventariado</label>
                            <select name="inventariado" class="form-control">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Mínimo en stock</label>
                            <input type="number" placeholder="0" name="minimo" min="0" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Máximo en stock</label>
                            <input type="number" placeholder="0" name="maximo" min="0" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid','') ?>
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<div id="subAlmacen" tabindex="-1" role="dialog" aria-labelledby="labelsubAlmacen" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
        <?php echo form_open_multipart('class="needs-validation" id="formsubalmacen" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Nuevo SubAlmacen</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Segmento*</label>
                            <select name="segmento" class="form-control" id="segmento_sub">
                                <option value="" selected disabled>Seleccione...</option>
                                <?php foreach($listadoSegmentos AS $key => $value){ ?>                                    
                                    <option value="<?= $value->idtbl_segmentos_proyecto ?>"><?= $value->segmento ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="nombre_almacen" id="nombre_almacen">
                <input type="hidden" class="form-control" name="almacen" value="<?= $almacen->idtbl_almacenes ?>">
                <input type="hidden" class="form-control" name="proyecto" value="<?= $almacen->tbl_proyectos_idtbl_proyectos ?>">
                <?= form_hidden('uid','') ?>
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>


<div id="editar_explosion" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/actualizar-explosion') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Explosión</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">                                        
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" name="cantidad" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="iddtlentrada" class="form-control">                
                <input type="hidden" name="cantidad_anterior" class="form-control">
                <input type="hidden" name="uid_almacen" class="form-control" value="<?= $almacen->uid ?>">
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>

<!--<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url().'almacen/actualizar-producto-almacen') ?>
        <div class="modal-header">
          <h4 id="labelEditarProducto" class="modal-title">Editar Producto</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número de Serie</label>
                <input type="text" placeholder="Marca" name="numero_serie" class="form-control alto-costo" minlength="1" required>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número Interno</label>
                <input type="text" placeholder="Modelo" name="numero_interno" class="form-control alto-costo" minlength="1" required>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">       
                <label>Nota</label>
                <textarea placeholder="Descripción" name="nota" class="form-control" minlength="4"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Estatus</label>
                <select name="estatus" id="estatus" class="form-control alto-costo" required>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <option value="almacen">Almacen</option>
                  <option value="robado">Robado</option>
                  <option value="descompuesto">Descompuesto</option>
                  <option value="asignado">Asignado</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">       
                <label>Existencias</label>
                <input type="number" placeholder="0" name="existencias" min="0" class="form-control">
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">
                <label>Rack</label>
                <select name="rack" class="form-control">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php for($x=1;$x<=20;$x++){ ?>
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
                  <?php for($x=1;$x<=10;$x++){ ?>
                  <option value="<?= $x ?>">Nivel <?= $x ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="idalmacen" value="">
          <?= form_hidden('token',$token) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Actualizar</button>
        </div>
      <?=form_close()?>
    </div>
  </div>
</div>-->
<div id="productos" tabindex="-1" role="dialog" aria-labelledby="labelProductos" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="labelProductos" class="modal-title">Productos</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.aprobar').click(function(event) {
    console.log("Envio 1");
    <?php if($this->session->userdata('tipo') != 4 || $this->session->userdata('id') == 50){ ?>
    var id_estado = "#estado"+this.id;
    var estado = $(id_estado.toString()).val();    
    if(estado == null || estado == ''){
        $(id_estado).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el estado!'
                });
        return 0;
    }
    <?php } ?>
    <?php if($this->session->userdata('tipo') == 4){ ?>
    if($("#selectAlmacen").val() == null || $("#selectAlmacen").val() == ''){
        $("#selectAlmacen").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el almacén!'
                });
        return 0;
    }
    if($("#personal_entrega").val() == null || $("#personal_entrega").val() == ''){
        $("#personal_entrega").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No haz seleccionado el personal de entrega!'
                });
        return 0;
    }
    <?php } ?>
    var segmento = '<?= $this->uri->segment(3); ?>';
    var contratistaPersonal = "<?= $contratistaPersonal ?>";
    var usuarioalmacen = "<?= $usuarioalmacen; ?>";
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea realizar la devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {        
        if ($("#idtbl-users").val() == '' || $("#idtbl-users").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione al personal que recibe.'
            })
        } else if ($("#iddtl-almacen").val() == '' || $("#iddtl-almacen").val() == null) {
            Toast.fire({
                type: 'error',
                title: 'Seleccione el eco que se va a devolver.'
            })
        } else {
            if (result.value) {
                //alert(this.id);
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion-alto-costo/" + this.id,
                    type: "post",
                    dataType: "json",
                    data: formData,
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
                            if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            }
        }
        
    })
});
$('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("input[name='maximo']").val(recipient.maximo);
})
</script>

<script>
    $(document).on('change', '#segmento_sub', function(event) {    
    event.preventDefault();
    //alert($('select[name="segmento"] option:selected').text());
    $('#nombre_almacen').val($('select[name="segmento"] option:selected').text());
}); 
$(document).ready(function() {
    $("#formsubalmacen").on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formsubalmacen"));
            $.ajax({
                url: "<?= base_url() ?>almacen/guardar-subalmacen",
                type: "post",
                dataType: "json",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.error == false) {
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
                        })
                    }
                }
            });
        }
    });
});
$('#editar_explosion').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='iddtlentrada']").val(recipient.iddtlentrada);
    modal.find("input[name='cantidad']").val(recipient.cantidad);
    modal.find("input[name='cantidad_anterior']").val(recipient.cantidadanterior);
    modal.find("input[name='maximo']").val(recipient.maximo);
});
</script>

<script>
$('#nuevo_traspaso').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("input[name='maximo']").val(recipient.maximo);
})
</script>

<!--<script>
  $('#editar_producto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='numero_serie']").val(recipient.serie);
    modal.find("input[name='numero_interno']").val(recipient.interno);
    modal.find("textarea[name='nota']").val(recipient.nota);
    modal.find("select[name='estatus']").val(recipient.estatus);
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);

    if (recipient.estatus == 'asignado')
      modal.find("select[name='estatus']").attr('disabled', 'disabled')
    else
      modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')

    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
      modal.find("input[name='existencias']").attr('disabled', 'disabled')


    if (recipient.abreviatura == 'CAC') {
      modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
      modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
      modal.find("textarea[name='nota']").attr('disabled', 'disabled')
      modal.find("select[name='estatus']").attr('disabled', 'disabled')

    }

  })

  $('#editar_producto').on('hide.bs.modal', function (event) {
    var modal = $(this);
    modal.find("input[name='numero_serie']").removeAttr('disabled');
    modal.find("input[name='numero_interno']").removeAttr('disabled');
    modal.find("textarea[name='nota']").removeAttr('disabled');
    modal.find("select[name='estatus']").removeAttr('disabled');
    modal.find("input[name='existencias']").removeAttr('disabled');
    modal.find("select[name='rack']").removeAttr('disabled');
    modal.find("select[name='nivel']").removeAttr('disabled');
  })
</script>-->
<script>
function verProductos(id) {
    $.ajax({
        url: "<?= base_url()?>almacen/getProductos",
        type: "POST",
        data: "id=" + id,
        success: function(respuesta) {
            $("#productos").modal("show");
            var registros = eval(respuesta);
            html = '';
            html += '<section class="tables">';
            html += '<div class="container-fluid">';
            html += '<div class="row">';
            html += '<div class="col-12">';
            html += '<div class="card">';
            html += '<div class="card-header d-flex align-items-center">';
            html += '<h4 class="h4">Entrada</h4>';
            html += '</div>';
            html += '<div class="card-body">';
            html += '<div class="grid-form">';
            html += '<fieldset>';
            html += '<div data-row-span="8">';
            html += '<div data-field-span="1">';
            html += '<label>Segmento</label>';
            html += registros[0]['segmento'];
            html += '</div>';
            html += '<div data-field-span="2">';
            html += '<label>Fecha de creación</label>';
            html += registros[0]['fecha'];
            html += '</div>';
            //html += '<div data-field-span="2">';
            //html += '<label>Personal</label>';
            //html += 'Aqui va ek nombre';
            //html += '</div>';
            html += '<div data-field-span="3">';
            html += '<label>Proyecto</label>';
            html += registros[0]['nombre_proyecto'];
            html += '</div>';
            html += '</div>';

            html += '<div data-row-span="8">';
            //html += '<div data-field-span="3">';
            //html += '<label>Almacen</label>';
            //html += registros[0]['almacen'];
            //html += '</div>';
            //html += '<div data-field-span="2">';
            //html += '<label>Fecha de asignación</label>';
            //html += 'Aqui va Fecha de asigancion';
            //html += '</div>';
            html += '<div data-field-span="2">';
            html += '<label>Autor</label>';
            html += registros[0]['nombre'];
            html += '</div>';
            //html += '<div data-field-span="1">';
            //html += '<label>Estatus</label>';
            //html += 'Aqui va el estatus';
            //html += '</div>';
            html += '</div>';
            html += '<div data-row-span="1">';
            //html += '<div data-field-span="1">';
            //html += '<label>Observaciones</label>';
            //html += 'Aqui van las observaciobes';
            //html += '</div>';
            html += '</div>';



            html += '</fieldset>';
            html += '</div>';
            html += '<br><br>';
            html += '<div class="table-responsive">'
            html +=
                '<table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">';
            html += '<thead>';
            html +=
                '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Precio</th><th>Tipo Moneda</th>';
            html += '</thead>';
            html += '<tbody>';

            for (var i = 0; i < registros.length; i++) {
                html += '<tr><td>' + registros[i]['descripcion'] + '</td><td>' + registros[i]['modelo'] +
                    '</td><td>' + registros[i]['cantidad'] + '</td><td>' + registros[i]['precio'] +
                    "</td><td>" + registros[i]['tipo_moneda'] + '</td></tr>';
            };


            html += '</tbody>';

            html += '</table>';
            html += '</div>';
            html += '<br><br>';

            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '</div>';


            html += '</section>';

            $(".modal-body").html(html);
        }
    });
}

function eliminar_explosion(iddtl_almacen, cantidad, cantidad_anterior){
    if(cantidad_anterior != null && cantidad != 0){
        $("#selectAlmacen").css("border-color", "#d9534f");
        Toast.fire({
                    type: 'error',
                    title: '¡No se puede eliminar una explosión con entrada!'
                });
        return 0;
    }        
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea eliminar la explosión de insumo?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {        
            if (result.value) {            
                $.ajax({
                    url: "<?= base_url() ?>almacen/eliminar-explosion/",
                    type: "post",
                    dataType: "json",
                    data: 'iddtl_almacen='+iddtl_almacen,                   
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {                            
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
                            })
                        }
                    }
                });
            }
               
    })
}

function verProductosSalida(id) {
    $.ajax({
        url: "<?= base_url()?>almacen/getProductosSalida",
        type: "POST",
        data: "id=" + id,
        success: function(respuesta) {
            $("#productos").modal("show");
            var registros = eval(respuesta);
            html = '';
            html += '<div class="table-responsive">'
            html += '<table class="table table-bordered"><thead>';
            html +=
                '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Entregado</th><th>Usuario</th><th>Usuario Creación</th><th>Usuario Aprobación</th><th>Usuario CO</th><th>Usuario AG</th>';
            html += '</thead><tbody>';
            for (var i = 0; i < registros.length; i++) {
                html += '<tr><td>' + registros[i]['descripcion'] + '</td><td>' + registros[i]['modelo'] +
                    '</td><td>' + registros[i]['cantidad'] + '</td><td>' + registros[i]['entregado'] +
                    '</td><td>' + registros[i]['nombres'] + " " + registros[i]['apellido_paterno'] + " " +
                    registros[i]['apellido_materno'] + '</td><td>' + registros[i]['nombre_autor'] +
                    '</td><td>' + registros[i]['nombre_autorizacion'] + '</td><td>' + registros[i][
                        'nombre_co'
                    ] + '</td><td>' + registros[i]['nombre_ag'] + '</td>' + '</tr>';
            };
            html += '</tbody></table></div>';
            $(".modal-body").html(html);
        }
    });
}

function verProductosDevolucion(id) {
    $.ajax({
        url: "<?= base_url()?>almacen/getProductosDevolucion",
        type: "POST",
        data: "id=" + id,
        success: function(respuesta) {
            $("#productos").modal("show");
            var registros = eval(respuesta);
            html = '';
            html += '<div class="table-responsive">'
            html += '<table class="table table-bordered"><thead>';
            html +=
                '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Entregado</th><th>Usuario</th>';
            html += '</thead><tbody>';
            for (var i = 0; i < registros.length; i++) {
                html += '<tr><td>' + registros[i]['descripcion'] + '</td><td>' + registros[i]['modelo'] +
                    '</td><td>' + registros[i]['cantidad'] + '</td><td>' + registros[i]['entregado'] +
                    '</td><td>' + registros[i]['nombres'] + " " + registros[i]['apellido_paterno'] + " " +
                    registros[i]['apellido_materno'] + '</td></tr>';
            };
            html += '</tbody></table></div>';
            $(".modal-body").html(html);
        }
    });
}
</script>
<?php if($aux == 'no') { ?>
<script>    
$(document).ready(function() {
    mostrarDatos("", 1);
    mostrarDatos2("", 1);
    mostrarDatos3("", 1);
    mostrarDatos4("", 1);
    mostrarDatos5("", 1);
    mostrarDatos10("", 1);
    mostrarDatos11("", 1);
    mostrarDatosEntradaTraspaso("", 1);
    <?php if(isset($listadoAlmacenesSubProyectos[0])){ ?>
        mostrarDatosSubProyectos("", 1);
        <?php } ?>

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1);
    });

    $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(textoBuscar, 1);
    });

    $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(textoBuscar, 1);
    });

    $("input[name='busqueda4']").keyup(function() {
        textoBuscar = $("input[name='busqueda4']").val();
        mostrarDatos4(textoBuscar, 1);
    });

    $("input[name='busqueda5']").keyup(function() {
        textoBuscar = $("input[name='busqueda5']").val();
        mostrarDatos5(textoBuscar, 1);
    });  
    $("input[name='busqueda10']").keyup(function() {
        textoBuscar = $("input[name='busqueda10']").val();
        mostrarDatos10(textoBuscar, 1);
    });
    $("input[name='busqueda11']").keyup(function() {
        textoBuscar = $("input[name='busqueda11']").val();
        mostrarDatos11(textoBuscar, 1);
    });
    $("input[name='busquedaSubProyectos']").keyup(function() {
        textoBuscar = $("input[name='busquedaSubProyectos']").val();
        mostrarDatosSubProyectos(textoBuscar, 1);
    });
    $("input[name='busquedaEntradaTraspaso']").keyup(function() {
        textoBuscar = $("input[name='busquedaEntradaTraspaso']").val();
        mostrarDatosEntradaTraspaso(textoBuscar, 1);
    });  

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion4 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda4']").val();
        mostrarDatos4(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion5 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda5']").val();
        mostrarDatos5(valorBuscar, valorHref);
    });   
    $("body").on("click", ".paginacion10 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda10']").val();
        mostrarDatos10(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacion11 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda11']").val();
        mostrarDatos11(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionSubProyectos li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaSubProyectos']").val();
        mostrarDatosSubProyectos(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacionEntradaTraspaso li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaEntradaTraspaso']").val();
        mostrarDatosEntradaTraspaso(valorBuscar, valorHref);
    }); 

});

function mostrarDatos(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.productos, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item.neodata + "</td>";
                filas += "<td>" + item.marca + "</td>";
                filas += "<td>" + item.modelo + "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td>";
                filas += "<td title='" + item.categoria + "'>" + item.categoria + "</td>";
                filas += "<td>" + item.existencias + "</td>";
                filas += "<td>" + item.numero_serie + "</td>";
                filas += "<td>" + item.numero_interno + "</td>";
                filas += "<td>" + item.estatus + "</td>";
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                filas += "<td>$" + item.precio + "</td>";
                filas += "<td>$" + (item.precio * item.existencias) + "</td>";
                filas += "<td>";
                <?php if($this->session->userdata('tipo') != 4 || ($this->session->userdata('tipo') == 4 && $almacen->idtbl_almacenes == ID_ALMACEN_GENERAL)){ ?>
                filas += "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'";
                filas += "data-inventariado='" + item.inventariado + "'";
                filas += "data-minimo='" + item.minimo + "'";
                filas += "data-maximo='" + item.maximo + "'";
                filas += "data-uid='" + item.uid + "'";
                filas += "><i class='fa fa-edit'></i></a>";
                <?php } ?>
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbproductosalmacencli tbody').html(filas);
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

function mostrarDatos10(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var id_almacen = <?= $almacen->idtbl_almacenes ?>;
    var url = '';
    if(id_almacen == '275'){
        url = "<?= base_url() ?>Almacen/mostrarExplosionInsumos111";
    }else if(id_almacen == '281'){
        url = "<?= base_url() ?>Almacen/mostrarExplosionInsumos112";
    }else if(id_almacen == '287'){
        url = "<?= base_url() ?>Almacen/mostrarExplosionInsumos109";
    }else{
        url = "<?= base_url() ?>Almacen/mostrarExplosionInsumos";
    }
    $.ajax({
        url: url,
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.insumos, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item.neodata+ "</td>";
                filas += "<td>" + item.descripcion + "</td>";
                filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td>";
                filas += "<td title='" + item.categoria + "'>" + item.categoria + "</td>";
                filas += "<td>" + item.total_explosion + "</td>";
                if(id_almacen == '275'){
                filas += "<td>" + item.nuevo_leon + "</td>";
                filas += "<td>" + item.coahuila + "</td>";
                filas += "<td>" + item.tamaulipas + "</td>";
                filas += "<td>" + item.ciudad_victoria + "</td>";
                filas += "<td>" + item.trancoso_region3 + "</td>";
                var nuevo_leon = item.nuevo_leon != null ? item.nuevo_leon : 0;
                var coahuila = item.coahuila != null ? item.coahuila : 0; 
                var tamaulipas = item.tamaulipas != null ? item.tamaulipas : 0;
                var ciudad_victoria = item.ciudad_victoria != null ? item.ciudad_victoria : 0;
                var trancoso_region3 = item.trancoso_region3 != null ? item.trancoso_region3 : 0;
                var total = (parseFloat(item.total_explosion) - parseFloat(nuevo_leon) - parseFloat(coahuila) - parseFloat(tamaulipas) - parseFloat(ciudad_victoria) - parseFloat(trancoso_region3));
                var suma = (parseFloat(nuevo_leon) + parseFloat(coahuila) + parseFloat(tamaulipas) + parseFloat(ciudad_victoria) + parseFloat(trancoso_region3));
                var promedio = (parseFloat(suma)/parseFloat(item.total_explosion))*100;
                filas += "<td>" + total + "</td>";
                filas += "<td>" + promedio.toFixed(2) + "%</td>";
                }else if(id_almacen == '281'){
                filas += "<td>" + item.juchitan + "</td>";
                filas += "<td>" + item.chiapas + "</td>";
                filas += "<td>" + item.oaxaca + "</td>";
                filas += "<td>" + item.arriaga + "</td>";
                var juchitan = item.juchitan != null ? item.juchitan : 0;
                var chiapas = item.chiapas != null ? item.chiapas : 0; 
                var oaxaca = item.oaxaca != null ? item.oaxaca : 0;
                var arriaga = item.arriaga != null ? item.arriaga : 0;
                var total = (parseFloat(item.total_explosion) - parseFloat(juchitan) - parseFloat(chiapas) - parseFloat(oaxaca) - parseFloat(arriaga));
                var suma = (parseFloat(juchitan) + parseFloat(chiapas) + parseFloat(oaxaca) + parseFloat(arriaga));
                var promedio = (parseFloat(suma)/parseFloat(item.total_explosion))*100;
                filas += "<td>" + total + "</td>";
                filas += "<td>" + promedio.toFixed(2) + "%</td>";
                }else if(id_almacen == '287'){
                filas += "<td>" + item.fresnillo + "</td>";
                filas += "<td>" + item.trancoso + "</td>";
                filas += "<td>" + item.victoria + "</td>";
                filas += "<td>" + item.virtual + "</td>";
                filas += "<td>" + item.fisico + "</td>";
                var fresnillo = item.fresnillo != null ? item.fresnillo : 0;
                var trancoso = item.trancoso != null ? item.trancoso : 0; 
                var victoria = item.victoria != null ? item.victoria : 0;
                var virtual = item.virtual != null ? item.virtual : 0;
                var fisico = item.fisico != null ? item.fisico : 0;
                var total = (parseFloat(item.total_explosion) - parseFloat(fresnillo) - parseFloat(trancoso) - parseFloat(victoria) - parseFloat(virtual) - parseFloat(fisico));
                var suma = (parseFloat(fresnillo) + parseFloat(trancoso) + parseFloat(victoria) + parseFloat(virtual) + parseFloat(fisico));
                var promedio = (parseFloat(suma)/parseFloat(item.total_explosion))*100;
                filas += "<td>" + total + "</td>";
                filas += "<td>" + promedio.toFixed(2) + "%</td>";
                }
  
               
                filas += "<td>";
                <?php if($this->session->userdata('tipo') == 11 && $this->session->userdata('jefe') == 1){ ?>
                filas += "<a href='#editar_explosion' data-toggle='modal' title='Editar'";
                filas += "data-iddtlentrada='" + item.iddtl_almacen_entradas + "'";
                filas += "data-cantidad='" + item.cantidad + "'";
                filas += "data-cantidadanterior='" + item.cantidad_anterior + "'";
                filas += "data-uid='" + item.uid + "'";
                filas += "><i class='fa fa-edit'></i></a>";
                filas += "<a href='#' onclick='eliminar_explosion(this.id, "+item.cantidad+", "+item.cantidad_anterior+");' id='"+item.iddtl_almacen_entradas+"' title='Eliminar'";                
                filas += "><i class='fa fa-trash'></i></a>";
                <?php } ?>
                filas += "</td>";
                filas += "</tr>";
            });
            $('#tbexplosioninsumos tbody').html(filas);
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
            $(".paginacion10").html(paginador);
        }
    });
}

function mostrarDatos2(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'entrada','entrada-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            $.each(response.reportes, function(key, item) {
                if (item['tipo_movimiento'] == 'traspaso') {
                    movimiento = 'Traspaso';
                    color = 'red';
                } else {
                    if (item['movimiento_virtual'] == 3){
                        movimiento = 'Explosión Insumo';
                        color = 'red';
                    }else{
                        movimiento = 'Entrada';
                        color = 'blue';
                    }
                }
                <?php if($almacen->uid == "25839864557600770") { ?>
                if (item['tipo_movimiento'] == 'traspaso') {
                    if (item['estatus'] == 0) {
                        clase = 'table-warning';
                    } else if (item['estatus'] == 1) {
                        if (item['modificado'] == 1) {
                            clase = 'table-info';
                        } else {
                            clase = 'table-success';
                        }
                    } else if (item['estatus'] == 2) {
                        clase = 'table-danger';
                    }
                } else {
                    if (item['estatus_contabilidad'] == 'Pendiente') {
                        clase = 'table-warning';
                    } else if (item['estatus_contabilidad'] == 'Cancelada') {
                        clase = 'table-danger';
                    } else {
                        clase = 'table-success';
                    }
                }
                <?php } else { ?>
                if (item['estatus'] == 0) {
                    clase = 'table-warning';
                } else if (item['estatus'] == 1) {
                    if (item['modificado'] == 1) {
                        if(item['cantidad'] == item['cantidad_anterior']){
                            clase = 'table-success';
                        }else{
                            clase = 'table-info'; /*CONDICIÓN DE COLOR AZUL*/
                        }                        
                    } else {
                        clase = 'table-success'; /*CONDICION DE COLOR VERDE*/
                    }
                } else if (item['estatus'] == 2) {
                    clase = 'table-danger';
                }
                <?php } ?>
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>EA-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['nombre'] + "</td>";
                filas += "<td>" + item['nombre_aprobacion'] + "</td>";
                //filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
                filas += "<td>" + item['sitio'] + "</td>";
                //filas += "<td>" + item['tipo_documento'] + "</td>";
                filas += "<td>" + item['segmento'] + "</td>";
                filas += "<td style='color: " + color + "'>" + movimiento + "</td>";
                //filas += "<td>" + item['numero_documento'] + "</td>";          
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";

                    /*ICONO DE INFORMACION*/ 

                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 ){ ?>
                if(item['cantidad'] != item['cantidad_anterior'] && item['estatus']==1){
                    filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/info/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-info-circle'></i></a></center></td>";
                }
                <?php } ?>
                
                
                    <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                /*if(item['cantidad_anterior'] == null && item['estatus'] == 0){
                    filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/editar/" +
                    item['idtbl_almacen_movimientos'] + "' title='Editar'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-edit'></i></a></center></td>";
                }*/
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbentradasalmacencli tbody').html(filas);
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
            $(".paginacion2").html(paginador);
        }
    });
}

function mostrarDatos3(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'salida-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.reportes, function(key, item) {
                var classEstatus= "";
                if(item['verificacion_archivo'] == 1){
                    classEstatus = 'table-success';
                }
                filas += "<tr class='" + classEstatus + "'>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>SA-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['entrega'] + "</td>";
                filas += "<td>" + item['recibe'] + ' ' + item['paternorecibe'] + ' ' + item[
                    'maternorecibe'] + "</td>";
                filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] +
                    "</td>";
                filas += "<td>" + item['sitio'] + "</td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/salida/detalle/" +
                    item['idtbl_almacen_movimientos'] + '/' + item['movimiento_virtual'] +
                    "' title='Detalles' onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbsalidasalmacencli tbody').html(filas);
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
            $(".paginacion3").html(paginador);
        }
    });
}

function mostrarDatos4(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'devolucion-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.reportes, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>DA-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['entrega'] + "</td>";
                filas += "<td>" + item['recibe'] + ' ' + item['paternorecibe'] + ' ' + item[
                    'maternorecibe'] + "</td>";
                filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] +
                    "</td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/devolucion/detalle/" +
                    item['idtbl_almacen_movimientos'] +
                    "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbdevolucionesalmacencli tbody').html(filas);
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
            $(".paginacion4").html(paginador);
        }
    });
}

function mostrarDatos5(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'traspaso-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.reportes, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>TP-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['nombre'] + "</td>";
                filas += "<td>" + item['numero_proyecto_destino'] + ' - ' + item[
                    'nombre_proyecto_destino'] + "</td>";
                filas += "<td>" + item['almacen_destino'] + "</td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/traspaso/detalle/" +
                    item['idtbl_almacen_movimientos'] +
                    "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbtraspasosalmacencli tbody').html(filas);
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
            $(".paginacion5").html(paginador);
        }
    });
}



function mostrarDatos11(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSubAlmacenes",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.subalmacenes, function(key, item) {
                if (item.estatus == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td><a href='" + "<?= base_url() ?>almacen/detalle_almc/" + item.uid +
                    "'>" + item.uid + "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle_almc/" + item.uid + "'>" + item.almacen +
                    "</a></td>";
                filas += "<td>" + "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" + item.uid + "' onchange='changeStatus(this.value,\"" + item.uid + "\")' " + check + "><label class='custom-control-label' for='" + item.uid + "'></label></div>" + "</td></tr>";
            });
            $('#tbsubalmacenes tbody').html(filas);
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
            $(".paginacion11").html(paginador);
        }
    });
}

function mostrarDatosSubProyectos(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSubProyectos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.subproyectos, function(key, item) {
                if (item.estatus == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td><a href='" + "<?= base_url() ?>almacen/detalle_almc/" + item.uid +
                    "'>" + item.uid + "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle_almc/" + item.uid + "'>" + item.almacen_subp +
                    "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle_almc/" + item.uid + "'>" + item.almacen +
                    "</a></td>";
                filas += "<td>" + "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" + item.uid + "' onchange='changeStatus(this.value,\"" + item.uid + "\")' " + check + "><label class='custom-control-label' for='" + item.uid + "'></label></div>" + "</td></tr>";
            });
            $('#tbsubproyectos tbody').html(filas);
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
            $(".paginacionSubProyectos").html(paginador);
        }
    });
}

function mostrarDatosEntradaTraspaso(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'entrada','entrada-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesMovTraspasosAlmacenCli",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_almacen: uid_almacen,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            $.each(response.reportes, function(key, item) {
                if (item['tipo_movimiento'] == 'traspaso') {
                    movimiento = 'Traspaso';
                    color = 'red';
                } else {
                    if (item['movimiento_virtual'] == 3){
                        movimiento = 'Explosión Insumo';
                        color = 'red';
                    }else{
                        movimiento = 'Entrada';
                        color = 'blue';
                    }
                }
                <?php if($almacen->uid == "25839864557600770") { ?>
                if (item['tipo_movimiento'] == 'traspaso') {
                    if (item['estatus'] == 0) {
                        clase = 'table-warning';
                    } else if (item['estatus'] == 1) {
                        if (item['modificado'] == 1) {
                            clase = 'table-info';
                        } else {
                            clase = 'table-success';
                        }
                    } else if (item['estatus'] == 2) {
                        clase = 'table-danger';
                    }
                } else {
                    if (item['estatus_contabilidad'] == 'Pendiente') {
                        clase = 'table-warning';
                    } else if (item['estatus_contabilidad'] == 'Cancelada') {
                        clase = 'table-danger';
                    } else {
                        clase = 'table-success';
                    }
                }
                <?php } else { ?>
                if (item['estatus'] == 0) {
                    clase = 'table-warning';
                } else if (item['estatus'] == 1) {
                    if (item['modificado'] == 1) {
                        if(item['cantidad'] == item['cantidad_anterior']){
                            clase = 'table-success';
                        }else{
                            clase = 'table-info'; /*CONDICIÓN DE COLOR AZUL*/
                        }                        
                    } else {
                        clase = 'table-success'; /*CONDICION DE COLOR VERDE*/
                    }
                } else if (item['estatus'] == 2) {
                    clase = 'table-danger';
                }
                <?php } ?>
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>EA-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['nombre'] + "</td>";
                filas += "<td>" + item['nombre_aprobacion'] + "</td>";
                //filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
                filas += "<td style='color: " + color + "'>" + movimiento + "</td>";
                filas += "<td>" + item['almacen_origen'] + "</td>";
                //filas += "<td>" + item['numero_documento'] + "</td>";          
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";

                    /*ICONO DE INFORMACION*/ 

                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 ){ ?>
                if(item['cantidad'] != item['cantidad_anterior'] && item['estatus']==1){
                    filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/info/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-info-circle'></i></a></center></td>";
                }
                <?php } ?>
                
                
                    <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                if(item['cantidad_anterior'] == null && item['estatus'] == 0){
                    filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/editar/" +
                    item['idtbl_almacen_movimientos'] + "' title='Editar'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-edit'></i></a></center></td>";
                }
                <?php } ?>
                filas += "</tr>";
            });
            $('#tbentradatraspasoalmacencli tbody').html(filas);
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
            $(".paginacionEntradaTraspaso").html(paginador);
        }
    });
}
</script>
<?php } ?>
<!---->
<?php if($aux == 'si') { ?>
<script>
$(document).ready(function() {
    mostrarDatos6("", 1);
    mostrarDatos7("", 1);

    $("input[name='busqueda6']").keyup(function() {
        textoBuscar = $("input[name='busqueda6']").val();
        mostrarDatos6(textoBuscar, 1);
    });

    $("input[name='busqueda7']").keyup(function() {
        textoBuscar = $("input[name='busqueda7']").val();
        mostrarDatos7(textoBuscar, 1);
    });

    $("body").on("click", ".paginacion6 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda6']").val();
        mostrarDatos6(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion7 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda7']").val();
        mostrarDatos7(valorBuscar, valorHref);
    });

});

function mostrarDatos6(valorBuscar, pagina) {
    uid_proyecto = $("#uid_proyecto").val();
    var tipo = "'salida-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesProyecto",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_proyecto: uid_proyecto,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.reportes, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>SA-" + item['folio'] + "</td>";
                filas += "<td>" + item['almacen'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['entrega'] + "</td>";
                filas += "<td>" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item[
                    'apellido_materno'] + "</td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/salida/detalle/" +
                    item['idtbl_almacen_movimientos'] + "/" + item['movimiento_virtual'] +
                    "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbsalidasproyecto tbody').html(filas);
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
            $(".paginacion6").html(paginador);
        }
    });
}

function mostrarDatos7(valorBuscar, pagina) {
    uid_proyecto = $("#uid_proyecto").val();
    var tipo = "'devolucion-almacen'";
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarReportesProyecto",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            uid_proyecto: uid_proyecto,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.reportes, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>" + item['almacen'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item[
                    'apellido_materno'] + "</td>";
                filas += "<td>" + item['entrega'] + "</td>";
                filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] +
                    "</td>";
                filas += "<td>" + item['tipo'] + "</td>";
                filas += "<td>" + 'DA-' + item['folio'] + "</td>";
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/devolucion/detalle/" +
                    item['idtbl_almacen_movimientos'] +
                    "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
                filas += "</tr>";
            });
            $('#tbdevolucionesproyecto tbody').html(filas);
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
            $(".paginacion7").html(paginador);
        }
    });
}
</script>
<?php } ?>

<script>
function changeStatus(valor, uid) {
    if (document.getElementById(uid).checked == true) {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea activar el almacén?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>almacen/activar-almacen",
                    type: "post",
                    data: "uid=" + uid,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>almacen/detalle_almc/"+uid;
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = false;
            }
        });
    } else {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea desactivar el almacén?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>almacen/desactivar-almacen",
                    type: "post",
                    data: {
                        uid: uid
                    },
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>almacen/detalle_almc/"+uid;
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = true;
            }
        });
    }

}
</script>