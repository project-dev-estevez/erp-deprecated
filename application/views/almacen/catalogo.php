<?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 6){ ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!-- end col-->
            <!--<div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Catálogo</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 4): ?>
                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo producto en catálogo</a>
              <?php endif; ?>
              <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
            </div>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="data-table">
                <thead>
                  <tr>
                    <th>#UID</th>
                    <th>Neodata</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Utilización</th>
                    <th>Mínimo en stock</th>
                    <th>Máximo en stock</th>
                    <th>Origen</th>
                    <th>Categoría</th>
                    <th>Unidad de Medida</th>
                    <th>Precio</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#UID</th>
                    <th>Neodata</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Utilización</th>
                    <th>Mínimo en stock</th>
                    <th>Máximo en stock</th>
                    <th>Origen</th>
                    <th>Categoría</th>
                    <th>Unidad de Medida</th>
                    <th>Precio</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if ($catalogo): ?>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <tr>
                        <td><?= $value->uid ?></td>
                        <td><?= $value->neodata ?></td>
                        <td><?= $value->marca ?></td>
                        <td><?= $value->modelo ?></td>
                        <td><?= $value->descripcion ?></td>
                        <td><?= $value->utilizacion ?></td>
                        <td><?= $value->minimo ?></td>
                        <td><?= $value->maximo ?></td>
                        <td><?= $value->origen ?></td>
                        <td><?= $value->categoria ?></td>
                        <td><?= $value->unidad_medida ?></td>
                        <?php $value->precio_aux=$value->precio; ?>
                        <?php if ($value->tipo_moneda=='d'): ?>
                        <?php $value->precio=$value->precio*$precio_dolar ?>
                        <?php endif; ?>
                        <td><?= number_format($value->precio,2) ?></td>
                        <td>
                          <a href="#editar_producto" data-toggle="modal" title="<?= $value->uid ?>"
                            data-uid="<?= $value->uid ?>"
                            data-neodata="<?= $value->neodata ?>"
                            data-marca="<?= $value->marca ?>"
                            data-modelo="<?= $value->modelo ?>"
                            data-descripcion="<?= $value->descripcion ?>"
                            data-utilizacion="<?= $value->utilizacion ?>"
                            data-inventariado="<?= $value->inventariado ?>"
                            data-origen="<?= $value->origen ?>"
                            data-minimo="<?= $value->minimo ?>"
                            data-maximo="<?= $value->maximo ?>"
                            data-categoria="<?= $value->idctl_categorias ?>"
                            data-unidad_medida="<?= $value->idctl_unidades_medida ?>"
                            data-precio="<?= $value->precio_aux ?>"
                            data-tipo_moneda="<?= $value->tipo_moneda ?>"
                            data-uid="<?= $value->uid ?>"
                            >Editar</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>     
                  <?php else: ?>
                  <tr>
                    <td colspan="7" class="text-center">No existen productos en el catálogo.</td>
                  </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>-->
            <!-- end col-->
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <!--<a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>-->
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosAG-tab" data-toggle="pill"
                                        href="#pills-productosAG" role="tab" aria-controls="pills-productosAG"
                                        aria-selected="true">
                                        Almacén General
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosAC-tab" data-toggle="pill"
                                        href="#pills-productosAC" role="tab" aria-controls="pills-productosAC"
                                        aria-selected="true">
                                        Alto Costo
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosSH-tab" data-toggle="pill"
                                        href="#pills-productosSH" role="tab" aria-controls="pills-productosSH"
                                        aria-selected="true">
                                        Seguridad e Higiene
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosACV-tab" data-toggle="pill"
                                        href="#pills-productosACV" role="tab" aria-controls="pills-productosACV"
                                        aria-selected="true">
                                        Autos Control Vehicular
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosRCV-tab" data-toggle="pill"
                                        href="#pills-productosRCV" role="tab" aria-controls="pills-productosRCV"
                                        aria-selected="true">
                                        Refacciones Control Vehicular
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosSistemas-tab" data-toggle="pill"
                                        href="#pills-productosSistemas" role="tab" aria-controls="pills-productosSistemas"
                                        aria-selected="true">
                                        Sistemas
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosMedica-tab" data-toggle="pill"
                                        href="#pills-productosMedica" role="tab" aria-controls="pills-productosMedica"
                                        aria-selected="true">
                                        Área Médica
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosKuali-tab" data-toggle="pill"
                                        href="#pills-productosKuali" role="tab" aria-controls="pills-productosKuali"
                                        aria-selected="true">
                                        Kuali Digital
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosNinguno-tab" data-toggle="pill"
                                        href="#pills-productosNinguno" role="tab" aria-controls="pills-productosNinguno"
                                        aria-selected="true">
                                        Ninguno
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-productosAG" role="tabpanel"
                                    aria-labelledby="pills-productosAG-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/3"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogo">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                <div class="tab-pane fade" id="pills-productosAC" role="tabpanel"
                                        aria-labelledby="pills-productosAC-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/2"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogoac">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                                <div class="tab-pane fade" id="pills-productosSH" role="tabpanel"
                                        aria-labelledby="pills-productosSH-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/1"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogosh">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                                <div class="tab-pane fade" id="pills-productosACV" role="tabpanel"
                                        aria-labelledby="pills-productosACV-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/4"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogoacv">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                                <div class="tab-pane fade" id="pills-productosRCV" role="tabpanel"
                                        aria-labelledby="pills-productosRCV-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/5"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogorcv">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                                <div class="tab-pane fade" id="pills-productosSistemas" role="tabpanel"
                                        aria-labelledby="pills-productosSistemas-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/6"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogosistemas">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                <div class="tab-pane fade" id="pills-productosMedica" role="tabpanel"
                                        aria-labelledby="pills-productosMedica-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/7"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogomedica">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                <div class="tab-pane fade" id="pills-productosKuali" role="tabpanel"
                                        aria-labelledby="pills-productosKuali-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda8">
                                    </div>
                                    <!--<a href="<?php echo base_url() ?>almacen/excel-catalogo/<?php echo $tipo_catalogo ?>"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>-->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogokuali">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacion8">

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-productosNinguno" role="tabpanel"
                                        aria-labelledby="pills-productosNinguno-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda9">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/100"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogoninguno">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacion9">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>


<?php }elseif($this->session->userdata('tipo') == 2){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                                <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosSistemas-tab" data-toggle="pill"
                                        href="#pills-productosSistemas" role="tab" aria-controls="pills-productosSistemas"
                                        aria-selected="true">
                                        Sistemas
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                                <div class="tab-pane fade show active" id="pills-productosSistemas" role="tabpanel"
                                        aria-labelledby="pills-productosSistemas-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/6"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogosistemas">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>
<?php }elseif($this->session->userdata('tipo') == 10){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <!--a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a-->
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosSH-tab" data-toggle="pill"
                                        href="#pills-productosSH" role="tab" aria-controls="pills-productosSH"
                                        aria-selected="true">
                                        Seguridad e Higiene
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosSH" role="tabpanel"
                                        aria-labelledby="pills-productosSH-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/1"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span><!--amaranta--></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogosh">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>



    <?php }elseif($this->session->userdata('tipo') == 1){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosAC-tab" data-toggle="pill"
                                        href="#pills-productosAC" role="tab" aria-controls="pills-productosAC"
                                        aria-selected="true">
                                        Alto Costo
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosAC" role="tabpanel"
                                        aria-labelledby="pills-productosAC-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/2"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogoac">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>

    <?php }elseif($this->session->userdata('tipo') == 3){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosACV-tab" data-toggle="pill"
                                        href="#pills-productosACV" role="tab" aria-controls="pills-productosACV"
                                        aria-selected="true">
                                        Autos Control Vehicular
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosRCV-tab" data-toggle="pill"
                                        href="#pills-productosRCV" role="tab" aria-controls="pills-productosRCV"
                                        aria-selected="true">
                                        Refacciones Control Vehicular
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosACV" role="tabpanel"
                                        aria-labelledby="pills-productosACV-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/4"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogoacv">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                                <div class="tab-pane fade" id="pills-productosRCV" role="tabpanel"
                                        aria-labelledby="pills-productosRCV-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/5"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogorcv">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>

    <?php }elseif($this->session->userdata('tipo') == 14){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosMedica-tab" data-toggle="pill"
                                        href="#pills-productosMedica" role="tab" aria-controls="pills-productosMedica"
                                        aria-selected="true">
                                        Área Médica
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosMedica" role="tabpanel"
                                        aria-labelledby="pills-productosMedica-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/7"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogomedica">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>



    <?php }elseif($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosAG-tab" data-toggle="pill"
                                        href="#pills-productosAG" role="tab" aria-controls="pills-productosAG"
                                        aria-selected="true">
                                        Almacén General
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link btn" id="pills-productosSH-tab" data-toggle="pill"
                                        href="#pills-productosSH" role="tab" aria-controls="pills-productosSH"
                                        aria-selected="true">
                                        Seguridad e Higiene
                                    </a>
                                </li>
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosAG" role="tabpanel"
                                    aria-labelledby="pills-productosAG-tab">
                                    <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/3"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogo">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                <div class="tab-pane fade" id="pills-productosSH" role="tabpanel"
                                        aria-labelledby="pills-productosSH-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                                    </div>
                                    <a href="<?php echo base_url() ?>almacen/excel-catalogo/1"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogosh">
                                            <thead>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata</th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>
    

    <?php }elseif($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
    <section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Categorías</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($categorias as $key => $value): ?>
                        <p class="card-text m-0"><small><?php echo $value->abreviatura.'-'.$value->categoria ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <!--<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaCategoriaModal" data-toggle="modal" class="btn btn-primary">Nueva Categoría</a>
                    </div>
                    <?php endif; ?>-->
                </div>
            </div>
            <!-- end col-->
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Unidades de medida</h4>
                    </div>
                    <div class="card-body">
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <p class="card-text m-0">
                            <small><?php echo $value->unidad_medida_abr.'-'.$value->unidad_medida ?></small>
                        </p>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
                    <div class="card-footer text-right">
                        <a href="#nuevaUnidadMedidaModal" data-toggle="modal" class="btn btn-primary">Nueva Unidad de
                            Medida</a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <!--nueva tabla-->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Catálogo</h4>
                    </div>
                        <div class="card-body">
                            <div class="card-title">
                                <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 3): ?>
                                <a href="#nuevaProductoCatalogo" data-toggle="modal" class="btn btn-outline-primary">Nuevo
                                    producto en catálogo</a>
                                <?php endif; ?>
                                <a href="<?php echo base_url() ?>almacen/excel-catalogo/null"class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small>
                            </div>
                        <div>
                            <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                              
                               
                            <li class="nav-item">
                                    <a class="nav-link btn active" id="pills-productosKuali-tab" data-toggle="pill"
                                        href="#pills-productosKuali" role="tab" aria-controls="pills-productosKuali"
                                        aria-selected="true">
                                        Kuali Digital
                                    </a>
                                </li>
                                
                                
                               
                                
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                
                            <div class="tab-pane fade show active" id="pills-productosKuali" role="tabpanel"
                                        aria-labelledby="pills-productosKuali-tab">
                                        <div class="float-right">
                                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda8">
                                    </div>
                                    <!--<a href="<?php echo base_url() ?>almacen/excel-catalogo/<?php echo $tipo_catalogo ?>"
                                        class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                        aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                            Excel</span></a>-->
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm table-hover" id="tbcatalogokuali">
                                            <thead>
                                                <tr>
                                                    <th>Neodata <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" data-original-title="Verifique la informacion"></th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Neodata <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="top" data-original-title="Verifique la informacion"></th>
                                                    <th>#UID</th>
                                                    <th>Marca</th>
                                                    <th>Modelo</th>
                                                    <th>Descripción</th>
                                                    <th>Utilización</th>
                                                    <th>Mínimo en stock</th>
                                                    <th>Máximo en stock</th>
                                                    <th>Origen</th>
                                                    <th>Categoría</th>
                                                    <th>Unidad de Medida</th>
                                                    <th>Precio</th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <br>
                                        <div class="paginacion8">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin de nueva tabla-->
        </div>
    </div>
</section>
    <?php } ?>
   

<?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6 || $this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 2): ?>
<div id="nuevaCategoriaModal" tabindex="-1" role="dialog" aria-labelledby="labelCategoria" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/guardar-categoria') ?>
            <input type="hidden" name="tipo_catalogo" value="<?= $tipo_catalogo?>">
            <div class="modal-header">
                <h4 id="labelCategoria" class="modal-title">Nueva Categoría</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Categoría</label>
                    <input type="text" placeholder="Categoría" name="categoria" class="form-control" required
                        maxlength="45" minlength="4">
                </div>
                <div class="form-group">
                    <label>Abreviatura</label>
                    <input type="text" placeholder="Abreviatura" name="abreviatura" class="form-control" required
                        minlength="1" maxlength="3">
                    <small class="help-block-none">Máximo 3 caracteres.</small>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<div id="nuevaUnidadMedidaModal" tabindex="-1" role="dialog" aria-labelledby="labelunidad" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?= form_open(base_url().'almacen/guardar-unidad-medida') ?>
            <input type="hidden" name="tipo_catalogo" value="<?= $tipo_catalogo ?>">
            <div class="modal-header">
                <h4 id="labelunidad" class="modal-title">Nueva Unidad de Medida</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Unidad de Medida</label>
                    <input type="text" placeholder="Unidad de Medida" name="unidad_medida" class="form-control" required
                        maxlength="45" minlength="4">
                </div>
                <div class="form-group">
                    <label>Abreviatura</label>
                    <input type="text" placeholder="Abreviatura" name="abreviatura" class="form-control" required
                        minlength="1" maxlength="3">
                    <small class="help-block-none">Máximo 3 caracteres.</small>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="nuevaProductoCatalogo" tabindex="-1" role="dialog" aria-labelledby="labelNuevoProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?php echo form_open_multipart(base_url().'almacen/guardar-producto-catalogo', 'class="needs-validation" onsubmit="return checkSubmit(this);" novalidate'); ?>
            <input type="hidden" name="tipo_catalogo" value="<?= $tipo_catalogo ?>">
            <div class="modal-header">
                <h4 id="labelNuevoProducto" class="modal-title">Nuevo Producto en Catálogos</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Neodata</label>
                    <input type="text" placeholder="Neodata" name="neodata" class="form-control"
                        <?= ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6)? 'minlength="2" required' : '' ?>>
                </div>
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" placeholder="Marca" name="marca" class="form-control" minlength="1">
                </div>
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" placeholder="Modelo" name="modelo" class="form-control" minlength="1">
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea placeholder="Descripción" name="descripcion" class="form-control" required
                        minlength="4"></textarea>
                </div>
                <div class="form-group">
                    <label>Seleccione Categoría</label>
                    <select name="categoria" class="form-control" required>
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        <?php foreach ($categorias as $key => $value): ?>
                        <option value="<?= $value->idctl_categorias ?>"><?= $value->categoria ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Seleccione Unidad de Medida</label>
                    <select name="unidad_medida" class="form-control" required>
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        <?php foreach ($unidades_medida as $key => $value): ?>
                        <option value="<?= $value->idctl_unidades_medida ?>" data-modal="nuevaProductoCatalogo">
                            <?= $value->unidad_medida ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12 listado_kit">
                    <div class="row">
                        <h4>Listado productos (KIT)</h4>
                        <span class="fa fa-plus nuevoProducto" data-modal="nuevaProductoCatalogo"
                            style="background: green;height: 20px;width: 20px;text-align: center;color: #fff;border-radius: 25px;font-size: 13.4px;line-height: 1.7;cursor: pointer;"></span>
                    </div>
                    <div class="row itemproducto" id="item-producto1">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Neodata</label>
                                <input class="form-control neodata" autocomplete="off" type="text" required>
                                <input class="form-control idtbl_catalogo_subproducto" autocomplete="off" type="hidden"
                                    name="idtbl_catalogo_subproducto[]" required>
                                <div class="list-group sugerencias"></div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Descripción</label>
                                <input class="form-control description" type="text" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Cantidad</label>
                                <input class="form-control" type="number" name="cantidad_kit[]">
                            </div>
                        </div>
                        <input type="hidden" name="iddtl_kit_catalogo[]">
                        <i class="fa fa-close delete-product" style="display: none;"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label>Precio $</label>
                    <input type="number" placeholder="$" name="precio" class="form-control" step="0.0001" required>
                </div>
                <div class="form-group">
                    <label>Seleccione Tipo de Moneda</label>
                    <select name="tipo_moneda" class="form-control" required>
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        <option value="d">Dolares</option>
                        <option value="p">Pesos</option>
                    </select>
                </div>
                <label>Tipo</label>
                <select name="tipo" class="form-control" required>
                    <option value="" disabled="disabled">Seleccione...</option>
                    <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 6) {?>
                    <option value="1">Seguridad e Higiene</option>
                    <option value="2">Alto Costo</option>
                    <option value="3">Almacen General</option>
                    <option value="4">Control Vehicular Autos</option>
                    <option value="5">Control Vehicular Refacciones</option>
                    <option value="6">Sistemas</option>
                    <option value="7">Área Médica</option>
                    <option value="8">Administrativo</option>
                    <option value="9">Mantenimiento</option>
                    <option value="10">Personal</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 1) {?>
                    <option value="2">Alto Costo</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 2) {?>
                    <option value="6">Sistemas</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 3) {?>
                    <option value="4">Control Vehicular</option>
                    <option value="5">Control Vehicular Refacciones</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 4) {?>
                    <option value="3">Almacen General</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 10) {?>
                    <option value="1">Seguridad e Higiene</option>
                    <?php } ?>
                    <?php if ($this->session->userdata('tipo') == 14) {?>
                    <option value="7">Área Médica</option>
                    <?php } ?>
                </select>
                <?php if($this->session->userdata('tipo')==3 && $tipo_catalogo == 'autos'){ ?>
                <label>Categoria Vehiculo</label>
                <select name="categoria_vehiculo" class="form-control" required>
                    <option value="" selected>Seleccionar ...</option>
                    <option value="Utilitario">Utilitario</option>
                    <option value="Maquinaria">Maquinaria</option>
                    <option value="Camioneta">Camioneta</option>
                </select>
                <?php } ?>
                <label>Producto Kuali</label>
                <!--<div class="form-check">
                <input class="form-check-input" type="radio" id="radio1" name="r1" value="">
                    <label class="form-check-label">Siiiii</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="radio2" name="r1" value="0">
                    <label class="form-check-label">No</label>
                </div>-->
            
                <select name="r1" class="form-control" required>
                    <option value="" selected disabled>Seleccionar ...</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <?php if ($this->session->userdata('tipo') != 7 && $this->session->userdata('tipo') != 6) {?>
                <div class="form-group">
                    <label>Mínimo en stock</label>
                    <input type="number" placeholder="0" name="minimo" min="0" class="form-control" required>
                </div>
                <?php } ?>
                <?php if($this->session->userdata('tipo') == 3 && $tipo_catalogo == 'autos') { ?>
                <div class="form-group">
                    <label>Fotografía 1</label>
                    <input type="file" name="foto1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Fotografía 2</label>
                    <input type="file" name="foto2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Fotografía 3</label>
                    <input type="file" name="foto3" class="form-control" required>
                </div>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart(base_url().'almacen/actualizar-producto-catalogo') ?>
            <input type="hidden" name="tipo_catalogo" value="<?= $tipo_catalogo ?>">
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Producto en Catálogo</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Neodata</label>
                            <input type="text" placeholder="Neodata" name="neodata" class="form-control" minlength="1"
                                <?= ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6)? 'minlength="2" required' : ''; ?>>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Marca</label>
                            <input type="text" placeholder="Marca" name="marca" class="form-control" minlength="1">
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Modelo</label>
                            <input type="text" placeholder="Modelo" name="modelo" class="form-control" minlength="1">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea placeholder="Descripción" name="descripcion" class="form-control" required
                                minlength="4" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Utilización</label>
                            <textarea placeholder="Utilización" name="utilizacion" class="form-control"
                                minlength="4"></textarea>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Origen</label>
                            <select name="origen" class="form-control">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <option value="Nacional">Nacional</option>
                                <option value="Importado">Importado</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Seleccione Categoría</label>
                            <select name="categoria" class="form-control" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($categorias as $key => $value): ?>
                                <option value="<?= $value->idctl_categorias ?>"><?= $value->categoria ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Seleccione Unidad de Medida</label>
                            <select name="unidad_medida" class="form-control" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($unidades_medida as $key => $value): ?>
                                <option value="<?= $value->idctl_unidades_medida ?>" data-modal="editar_producto">
                                    <?= $value->unidad_medida ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Precio $</label>
                            <!-- <input type="number" placeholder="$" name="precio" class="form-control" required <?= ($this->session->userdata('tipo') == 7 || $this->session->userdata('tipo') == 6)? 'minlength="2" required' : (($this->session->userdata('tipo') == 1)? '' : 'readonly'); ?>> -->
                            <input type="number" placeholder="$" name="precio" class="form-control" step="0.0001"
                                required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Seleccione Tipo de Moneda</label>
                            <select name="tipo_moneda" class="form-control" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <option value="d">Dolares</option>
                                <option value="p">Pesos</option>
                            </select>
                        </div>
                        <!--<label>Producto Seguridad e Higiene</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="shsi" value="1">
                            <label class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="shno" value="0">
                            <label class="form-check-label">No</label>
                        </div>
                                -->
                        <?php if ($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 6 || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 3) {?>
                        <label>Tipo</label>                        
                        <select name="tipo" class="form-control">                            
                            <option value="1">Seguridad e Higiene</option>
                            <option value="2">Alto Costo</option>
                            <option value="3">Almacen General</option>
                            <option value="4">Control Vehicular</option>
                            <option value="5">Control Vehicular Refacciones</option>
                            <option value="6">Sistemas</option>
                            <option value="7">Área Médica</option>
                            <option value="8">Administrativo</option>
                            <option value="9">Mantenimiento</option>
                            <option value="10">Personal</option>
                            <?php if ($this->session->userdata('tipo') == 1) {?>
                            <option value="2">Alto Costo</option>
                            <?php } ?>
                            <?php if ($this->session->userdata('tipo') == 2) {?>
                            <option value="6">Sistemas</option>
                            <?php } ?>
                            <?php if ($this->session->userdata('tipo') == 3) {?>
                            <option value="4">Control Vehicular</option>
                            <option value="5">Control Vehicular Refacciones</option>
                            <?php } ?>
                            <?php if ($this->session->userdata('tipo') == 4) {?>
                            <option value="3">Almacen General</option>
                            <?php } ?>
                            <?php if ($this->session->userdata('tipo') == 10) {?>
                            <option value="1">Seguridad e Higiene</option>
                            <?php } ?>
                            <?php if ($this->session->userdata('tipo') == 14) {?>
                            <option value="7">Área Médica</option>
                            <?php } ?>
                        </select>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo')==3 && $tipo_catalogo == 'autos'){ ?>
                        <label>Categoria Vehiculo</label>
                        <select name="categoria_vehiculo" class="form-control" required>
                            <option value="Utilitario">Utilitario</option>
                            <option value="Maquinaria">Maquinaria</option>
                            <option value="Camioneta">Camioneta</option>
                        </select>
                        <?php } ?>
                        <label>Producto Kuali</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="r1" value="1">
                            <label class="form-check-label">Si</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="r1" id="r2" value="0" checked>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                    <?php if ($this->session->userdata('tipo') != 7 && $this->session->userdata('tipo') != 6): ?>
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
                    <?php endif;?>
                    <?php if($this->session->userdata('tipo') == 3 && $tipo_catalogo == 'autos') { ?>
                <div class="form-group">
                    <label>Fotografía 1</label>
                    <input type="file" name="foto1" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Fotografía 2</label>
                    <input type="file" name="foto2" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Fotografía 3</label>
                    <input type="file" name="foto3" class="form-control" required>
                </div>
                <?php } ?>
                    <div class="col-12 listado_kit">
                        <div class="row">
                            <h4>Listado productos (KIT)</h4>
                            <span class="fa fa-plus nuevoProducto" data-modal="editar_producto"
                                style="background: green;height: 20px;width: 20px;text-align: center;color: #fff;border-radius: 25px;font-size: 13.4px;line-height: 1.7;cursor: pointer;"></span>
                        </div>
                        <div class="row itemproducto" id="item-producto1">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Neodata</label>
                                    <input class="form-control" type="text" name="neodata_kit[]">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Descripción</label>
                                    <input class="form-control" type="text" name="descripcion_kit[]">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    <input class="form-control" type="number" name="cantidad_kit[]">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input class="form-control" type="number" name="precio_kit[]">
                                </div>
                            </div>
                            <input type="hidden" name="iddtl_kit_catalogo[]">
                            <i class="fa fa-close delete-product" style="display: none;"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid','') ?>
                <?= form_hidden('idtbl_catalogo','') ?>
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
<script>
$('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    console.log(recipient);
    /*$("#shsi").attr('checked', false);
    $("#shno").attr('checked', false);
    if (recipient.tipo_producto === 1) {
        $("#shsi").attr('checked', true);
    }
    if (recipient.tipo_producto === null || recipient.tipo_producto === '') {
        $("#shno").attr('checked', true);
    }*/
    modal.find("select[name='tipo']").val(recipient.tipo_producto);
    modal.find("select[name='categoria']").val(recipient.categoria);
    modal.find("textarea[name='descripcion']").val(recipient.descripcion);
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='marca']").val(recipient.marca);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("input[name='modelo']").val(recipient.modelo);
    modal.find("input[name='precio']").val(recipient.precio);
    modal.find("select[name='tipo_moneda']").val(recipient.tipo_moneda);
    modal.find("input[name='toggle']").val(recipient.toggle);
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("select[name='unidad_medida']").val(recipient.unidad_medida);

    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("select[name='origen']").val(recipient.origen);
    modal.find("input[name='neodata']").val(recipient.neodata);
    modal.find("textarea[name='utilizacion']").val(recipient.utilizacion);
    modal.find("input[name='maximo']").val(recipient.maximo);
    modal.find("input[name='idtbl_catalogo']").val(recipient.idtblCatalogo);
    <?php if($this->session->userdata('tipo')==3 && $tipo_catalogo == 'autos'){ ?>
    modal.find("select[name='categoria_vehiculo']").val(recipient.categoriaVehiculo);
    <?php } ?>
    if (recipient.kuali == 1) {
        modal.find("input[id='r1']").prop('checked', true);
    } else {
        modal.find("input[id='r2']").prop('checked', true);
    }

    <?php if($this->session->userdata('tipo')==14 || $this->session->userdata('tipo') == 10){ ?>

    if (recipient.unidad_medida == 10) {
        $('#editar_producto .listado_kit .itemproducto').remove();
        $.ajax({
            url: "<?= base_url()?>almacen/getCatalogoKit",
            type: "post",
            dataType: "json",
            data: "idtbl_catalogo=" + recipient.idtblCatalogo,
            complete: function(res) {
                var data = res.responseJSON;
                var $div = $('#nuevaProductoCatalogo div[id="item-producto1"]');
                var $target = $('#editar_producto .listado_kit');
                for (var r = 0; r < data.length; r++) {
                    var $klon = $div.clone().prop('id', 'item-producto' + (r + 1));;
                    //$klon.append($("<input type='hidden' name='iddtl_kit_catalogo[]'>"));
                    $klon.css('display', 'none');
                    $target.append($klon);
                    $klon.show(500);
                    $klon.find("input.neodata").val(data[r].neodata + "(" + data[r].descripcion +
                        ")");
                    $klon.find("input.description").val(data[r].descripcion);
                    $klon.find("input[name='cantidad_kit[]']").val(data[r].cantidad);
                    $klon.find("input[name='idtbl_catalogo_subproducto[]']").val(data[r]
                        .tbl_catalogo_idtbl_catalogo_subproducto);
                    $klon.find("input[name='iddtl_kit_catalogo[]']").val(data[r]
                        .iddtl_kit_catalogo);
                    $klon.find('.delete-product').css('display', 'none');
                }
            }
        });
        $(".listado_kit input").prop("required", true);
        $('#editar_producto .listado_kit').css("display", "block");
    } else {
        $(".listado_kit input").prop("required", false);
        $('#editar_producto .listado_kit').css("display", "none");
    }

    <?php } ?>

})
</script>
<script>
$(document).ready(function() {
    mostrarDatos("", 1);
    mostrarDatos2("", 1);
    mostrarDatos3("", 1);
    mostrarDatos4("", 1);
    mostrarDatos5("", 1);
    mostrarDatos6("", 1);
    mostrarDatos7("", 1);
    mostrarDatos8("", 1);
    mostrarDatos9("", 1);
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
    $("input[name='busqueda6']").keyup(function() {
        textoBuscar = $("input[name='busqueda6']").val();
        mostrarDatos6(textoBuscar, 1);
    });
    $("input[name='busqueda7']").keyup(function() {
        textoBuscar = $("input[name='busqueda7']").val();
        mostrarDatos7(textoBuscar, 1);
    });
    $("input[name='busqueda8']").keyup(function() {
        textoBuscar = $("input[name='busqueda8']").val();
        mostrarDatos8(textoBuscar, 1);
    });
    $("input[name='busqueda9']").keyup(function() {
        textoBuscar = $("input[name='busqueda9']").val();
        mostrarDatos9(textoBuscar, 1);
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
    $("body").on("click", ".paginacion8 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda8']").val();
        mostrarDatos8(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacion9 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda9']").val();
        mostrarDatos9(valorBuscar, valorHref);
    });
    $(".listado_kit input").prop("required", false);
    $(".listado_kit").css("display", "none");
});

function mostrarDatos(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 3,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
               + "</tr>";
            });
            $('#tbcatalogo tbody').html(filas);
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

function mostrarDatos2(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 2,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
               
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                + "</tr>";
            });
            $('#tbcatalogoac tbody').html(filas);
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
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 1,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
            + "</tr>";
            });
            $('#tbcatalogosh tbody').html(filas);
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
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 4,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
               
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                + "</tr>";
            });
            $('#tbcatalogoacv tbody').html(filas);
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
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 5,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                + "</tr>";
            });
            $('#tbcatalogorcv tbody').html(filas);
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

function mostrarDatos6(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 6,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                 + "</tr>";
            });
            $('#tbcatalogosistemas tbody').html(filas);
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
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 7,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                + "</tr>";
            });
            $('#tbcatalogomedica tbody').html(filas);
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

function mostrarDatos8(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 0,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
                
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                + "</tr>";
            });
            $('#tbcatalogokuali tbody').html(filas);
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
            $(".paginacion8").html(paginador);
        }
    });
}

function mostrarDatos9(valorBuscar, pagina) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCatalogoAlmacen",
        type: "POST",
        data: {
            tipo: 100,
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.catalogo, function(key, item) {
                item.precio_aux = item.precio;
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>
                }
                if (item.estatus_producto == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
                filas += "<tr><td>" + item.neodata + "</td><td>" + item.uid + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td>" + item.utilizacion + "</td><td>" + item.minimo + "</td><td>" + item
                    .maximo + "</td><td>" + item.origen + "</td><td>" + item.categoria +
                    "</td><td>" + item.unidad_medida + "</td><td>" + item.precio + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    "data-tipo_producto='" + item.tipo_producto + "'" + " data-uid='" + item.uid +
                    "'" + " data-neodata='" + item.neodata + "'" + " data-kuali='" + item
                    .producto_kuali + "'" + " data-marca='" + item.marca +
                    "'" + " data-modelo='" + item.modelo + "'" + " data-descripcion='" + item
                    .descripcion + "'" + " data-utilizacion='" + item.utilizacion + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-origen='" + item
                    .origen + "'" + " data-minimo='" + item.minimo + "'" + " data-maximo='" + item
                    .maximo + "'" + " data-categoria='" + item.idctl_categorias + "'" +
                    " data-unidad_medida='" + item.idctl_unidades_medida + "'" + " data-precio='" +
                    item.precio_aux + "'" + " data-tipo_moneda='" + item.tipo_moneda + "'" +
                    " data-uid='" + "'" + " data-idtbl-catalogo='" + item.idtbl_catalogo + "'" +
                    " data-categoria-vehiculo='" + item.categoria_vehiculo +
                    "'>Editar</a></td>"
              
                    + "<td>" +
                    "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" +
                    item.uid + "' onchange='changeStatus(this.value,\"" + item.uid +
                    "\")' " + check + "><label class='custom-control-label' for='" + item.uid +
                    "'></label></div>" + "</td>"
                 + "</tr>";
            });
            $('#tbcatalogoninguno tbody').html(filas);
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
            $(".paginacion9").html(paginador);
        }
    });
}

<?php if($this->session->userdata('tipo')==14){ ?>
$("select[name='unidad_medida']").on('change', function() {
    var id_modal = $("option:selected", this).data("modal");
    console.log(id_modal);
    var value = $(this).val();
    if (value == 10) {
        if (id_modal == 'editar_producto') {
            $('#editar_producto .listado_kit .itemproducto').remove();
        }
        $(".listado_kit input").prop("required", true);
        $("#" + id_modal + " .listado_kit").css("display", "block");
    } else {
        $(".listado_kit input").prop("required", false);
        $("#" + id_modal + " .listado_kit").css("display", "none");
    }
});

$('.nuevoProducto').click(function(event) {
    var id_modal = $(this).data("modal");
    var $div = $('#nuevaProductoCatalogo div[id="item-producto1"]');
    var $target = $('#' + id_modal + ' .listado_kit');
    var num = $('#' + id_modal + ' .listado_kit .itemproducto').length + 1;
    var $klon = $div.clone().prop('id', 'item-producto' + num);
    $klon.css('display', 'none');
    $target.append($klon);
    $klon.show(500);
    $klon.find('input').val('');
    console.log($klon.find('input[name="iddtl_kit_catalogo[]"]'));
    $klon.find('input[name="iddtl_kit_catalogo[]"]').val('-1');
    $klon.find('.delete-product').css('display', 'block');

});
$(document).on('click', '.delete-product', function() {
    $(this).parents('div[id^="item-producto"]').remove();
});
$("#editar_producto").on('keyup', "input[name='precio_kit[]']", function() {
    var precios = $("#editar_producto input[name='precio_kit[]']");
    var total = 0;
    for (var r = 0; r < precios.length; r++) {
        total += parseInt(precios.eq(r).val());
    }
    $("#editar_producto input[name='precio']").val(total);
});
$("#nuevaProductoCatalogo").on('keyup', "input[name='precio_kit[]']", function() {
    var precios = $("#nuevaProductoCatalogo input[name='precio_kit[]']");
    var total = 0;
    for (var r = 0; r < precios.length; r++) {
        total += parseInt(precios.eq(r).val());
    }
    $("#nuevaProductoCatalogo input[name='precio']").val(total);
});
<?php } ?>
$("#nuevaProductoCatalogo").on('show.bs.modal', function(event) {
    var modal = $(event.target);
    modal.find("form").removeClass("was-validated");
    modal.find(".modal-body input").val("");
    modal.find(".modal-body select").val("").change();
    modal.find(".modal-body textarea").val("");
});
</script>

<script>
function changeStatus(valor, uid) {
    if (document.getElementById(uid).checked == true) {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea activar el código?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>almacen/activar-codigo",
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
                                location.href = "<?= base_url() ?>almacen/catalogo";
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
            text: "¿Desea desactivar el código?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>almacen/desactivar-codigo",
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
                                location.href = "<?= base_url() ?>almacen/catalogo";
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
$("body").on('keyup', ".neodata", function() {
    var element = $(this);
    var neodata = element.val();
    var dataString = 'neodata=' + neodata;
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoPorNeodata",
        data: {
            'neodata': neodata,
            'tipo': 'area_medica'
        },
        dataType: "json",
        success: function(data) {
            parent = element.closest("div");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' data='" + item
                    .neodata + "(" + item.descripcion + ")" + "' id='" + item
                    .idtbl_catalogo + "'>" + item.neodata + "(" + item.descripcion + ")" +
                    "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function() {
                //Obtenemos la id unica de la sugerencia pulsada
                var idtbl_usuarios = $(this).attr('id');
                var nombre_completo = $(this).attr('data');
                //Editamos el valor del input con data de la sugerencia pulsada
                parent.find('.neodata').val(nombre_completo);
                parent.find('.idtbl_catalogo_subproducto').val(idtbl_usuarios);
                //Hacemos desaparecer el resto de sugerencias
                $('.sugerencias').fadeOut(1000);
                parent.parent("div").parent("div").find(".description").val(nombre_completo
                    .substring(nombre_completo.indexOf("(") + 1, nombre_completo
                        .indexOf(")")))
                //alert('Has seleccionado el '+idtbl_usuarios+' '+$('#'+idtbl_usuarios).attr('data'));
                return false;
            });
        }
    })
});
</script>
<script>
//var statSend = false;
function checkSubmit(form) {
    var valid = form.checkValidity();
    if (valid) {
        $(form).find("button[type='submit']").prop("disabled", true);
    }
    return valid;
    /*if (statSend) {
        statSend = true;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }*/
}
</script>
<script>
  <?php if($this->session->flashdata('error')) { ?>
    Swal.fire(
        'Oops!',
        '<?= $this->session->flashdata('error') ?>',
        'error'
    );
  <?php } ?>
  <?php if ($this->session->flashdata('exito')): ?>
    Swal.fire(
        'Exito',
        '<?= $this->session->flashdata('exito') ?>',
        'success'
    )
  <?php endif ?>
</script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>