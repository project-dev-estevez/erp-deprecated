<?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('id') != 36){ ?>
<?php if ($this->session->userdata('tipo') != 11 && $this->session->userdata('tipo')!=9) { ?>
<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <!-- Item -->
            <div class="col-xl-2 col-sm-6">
                &nbsp;
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="bg-white has-shadow" style="text-align: center;">
                    <a href="<?php echo base_url() . 'almacen/catalogo' ?>">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-orange"><i class="fa fa-address-card"></i></div>
                            <div class="title"><span>Catálogo</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6">
                <div class="bg-white has-shadow" style="text-align: center;">
                    <a href="<?php echo base_url() . 'almacen/movimientos' ?>">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-green"><i class="fa fa-book"></i></div>
                            <div class="title"><span>Movimientos</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xl-2 col-sm-6">
                &nbsp;
            </div>
            <!--<div class="col-xl-4 col-sm-6">
                <div class="bg-white has-shadow">
                    <a href="<?php echo base_url() . 'almacen/nueva-entrada/' . UID_ALMACEN_GENERAL ?>">
                        <div class="item d-flex align-items-center pr-4 pl-4">
                            <div class="icon bg-blue"><i class="fa fa-plus"></i></div>
                            <div class="title"><span>Entrada</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>-->
        </div>
    </div>
</section>
<?php } ?>

<section class="projects">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.'25839864557600770?aux=true' ?>"
                        class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
                </div>
            </div>
            <div class="card-header d-flex align-items-center">
                <?php if ($this->session->userdata('tipo')!=11 && $this->session->userdata('tipo')!=9) { ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn active" id="products-tab" data-toggle="tab" href="#products" role="tab"
                            aria-controls="products" aria-selected="false">
                            Productos Almacen General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">
                            Entradas Almacen General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">
                            Salidas Almacen General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion"
                            role="tab" aria-controls="pills-devolucion" aria-selected="false">
                            Devoluciones
                        </a>
                    </li>
                </ul>
                <?php } else { ?>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link btn active" id="products-tab" data-toggle="tab" href="#products" role="tab"
                            aria-controls="products" aria-selected="false">
                            Productos Almacen General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">
                            Salidas Almacen General
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion"
                            role="tab" aria-controls="pills-devolucion" aria-selected="false">
                            Devoluciones
                        </a>
                    </li>
                    <?php if (isset($this->session->userdata('permisos')['salidas_contratistas'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-salidascon-tab" data-toggle="pill" href="#pills-salidascon"
                            role="tab" aria-controls="pills-salidascon" aria-selected="false">
                            Salidas Contratistas
                        </a>
                    </li>
                    <?php } ?>
                    <?php if (isset($this->session->userdata('permisos')['devoluciones_contratistas'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-devolucionescon-tab" data-toggle="pill" href="#pills-devolucionescon"
                            role="tab" aria-controls="pills-devolucionescon" aria-selected="false">
                            Devoluciones Contratistas
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>

            <div class="card-body">
                <div class="tab-content" id="myTabContent">

                    <!---->
                    <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                        </div>
                        <a href="<?php echo base_url() ?>almacen/excel-entradasAG"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbentradasalmacengeneral">
                                <thead>
                                    <tr>
                                        <th>Uid</th>
                                        <th>Folio</th>
                                        <th>Fecha</th>
                                        <th>Neodata Pedido</th>
                                        <th>Proveedor</th>
                                        <th>Personal que aprobó</th>
                                        <th>Nombre Proyecto</th>
                                        <th>Tipo Documento</th>
                                        <!--<th>Número Documento</th>-->
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacion2">

                            </div>
                        </div>
                    </div>
                    <!---->

                    <!---->
                    <?php if ($this->session->userdata('tipo')==9) { ?>
                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <?php } else { ?>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <?php } ?>
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                            </div>
                            <a href="<?php echo base_url() ?>almacen/excel-salidasAG"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                    Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover" id="tbsalidasalmacengeneral">
                                    <thead>
                                        <tr>
                                            <th>Uid</th>
                                            <th>Folio</th>
                                            <th>Fecha</th>
                                            <th>Personal que entrega</th>
                                            <th>Personal que recibe</th>
                                            <th>Nombre Proyecto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacion3">

                                </div>
                            </div>
                        </div>
                        <!---->

                        <!---->
                        <div class="tab-pane fade" id="pills-devolucion" role="tabpanel"
                            aria-labelledby="pills-devolucion-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                            </div>
                            <a href="<?php echo base_url() ?>almacen/excel-devolucionesAG"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                    Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover"
                                    id="tbdevolucionesalmacengeneral">
                                    <thead>
                                        <tr>
                                            <th>Uid</th>
                                            <th>Folio</th>
                                            <th>Fecha</th>
                                            <th>Personal entrega</th>
                                            <th>Personal recibe</th>
                                            <th>Personal que aprobó</th>
                                            <th>Nombre Proyecto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacion4">

                                </div>
                            </div>
                        </div>
                        <!---->


                        <?php if(isset($this->session->userdata('permisos')['salidas_contratistas'])){ ?>
                        <!---->
                        <div class="tab-pane fade" id="pills-salidascon" role="tabpanel"
                            aria-labelledby="pills-salidascon-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaSalidasCon">
                            </div>
                            <a href="<?php echo base_url() ?>almacen/excel-salidasContratistas"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                    Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover"
                                    id="tbsalidascon">
                                    <thead>
                                        <tr>
                                            <th>Uid</th>
                                            <th>Folio</th>
                                            <th>Fecha</th>
                                            <th>Personal que entrega</th>
                                            <th>Personal que recibe</th>
                                            <th>Contratista</th>
                                            <th>Nombre Proyecto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacionSalidasCon">

                                </div>
                            </div>
                        </div>
                        <!---->
                        <?php } ?>

                        <?php if(isset($this->session->userdata('permisos')['devoluciones_contratistas'])){ ?>
                        <!---->
                        <div class="tab-pane fade" id="pills-devolucionescon" role="tabpanel"
                            aria-labelledby="pills-devolucionescon-tab">
                            <div class="float-right">
                                <input type="text" class="form-control" placeholder="Buscar" name="busquedaDevolucionesCon">
                            </div>
                            <a href="<?php echo base_url() ?>almacen/excel-devolucionesContratistas"
                                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                    Excel</span></a>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm table-hover"
                                    id="tbdevolucionescon">
                                    <thead>
                                        <tr>
                                            <th>Uid</th>
                                            <th>Folio</th>
                                            <th>Fecha</th>
                                            <th>Personal que entrega</th>
                                            <th>Personal que recibe</th>
                                            <th>Contratista</th>
                                            <th>Nombre Proyecto</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                                <br>
                                <div class="paginacionDevolucionesCon">

                                </div>
                            </div>
                        </div>
                        <!---->
                        <?php } ?>

                        <!---->
                        <?php if($this->session->userdata('tipo')!=9){ ?>
                        <div class="tab-pane fade show active" id="products" role="tabpanel"
                            aria-labelledby="products-tab">
                            <?php }else{ ?>
                            <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">
                                <?php } ?>
                                <!--<div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>
            <a href="<?php echo base_url() ?>almacen/excel-productoAG" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbproductosalmacengeneral">
                <thead>
                  <tr>
                    <th data-priority="1">Código</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th data-priority="2">Descripción</th>
                    <th>Unidad</th>
                    <th title="Categoría">Categoría</th>
                    <th data-priority="3">Existencias</th>
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
                    <th width="120"><select name="selectKuali" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="almacen">Almacen</option>
                        <option value="dañado">Dañado</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                      </select></th>
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
            </div>-->
                                <h4>ALMACEN GENÉRAL / Activos</h4>
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-productoAG/activos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover"
                                        id="tbproductosalmacengeneralactivos">
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
                                                <th width="120"><select name="selectKuali" style="font-size: 10px;"
                                                        class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="almacen">Almacen</option>
                                                        <option value="asignado">Asignado</option>
                                                        <option value="dañado">Dañado</option>
                                                        <option value="robado">Robado</option>
                                                        <option value="abuso de confianza">abuso de confianza</option>
                                                    </select></th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
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
                                <br>
                                <hr>
                                <h4>ALMACEN GENÉRAL / Herramientas</h4>
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda9">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-productoAG/herramientas" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover"
                                        id="tbproductosalmacengeneralherramientas">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Código</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th data-priority="2">Descripción</th>
                                                <th>Unidad</th>
                                                <th title="Categoría">Categoría</th>
                                                <th data-priority="3">Existencias</th>
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
                                                <th width="120"><select name="selectHerramientas" style="font-size: 10px;"
                                                        class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="almacen">Almacen</option>
                                                        <option value="dañado">Dañado</option>
                                                        <option value="robado">Robado</option>
                                                        <option value="abuso de confianza">Abuso de Confianza</option>
                                                    </select></th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
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
                                <br>
                                <hr>
                                <h4>ALMACEN GENÉRAL / Consumibles</h4>
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda8">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-productoAG/consumibles" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover"
                                        id="tbproductosalmacengeneralconsumibles">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Código</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th data-priority="2">Descripción</th>
                                                <th>Unidad</th>
                                                <th title="Categoría">Categoría</th>
                                                <th data-priority="3">Existencias</th>
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
                                                <th width="120"><select name="selectConsumibles" style="font-size: 10px;"
                                                        class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="almacen">Almacen</option>
                                                        <option value="dañado">Dañado</option>
                                                        <option value="robado">Robado</option>
                                                        <option value="abuso de confianza">abuso de confianza</option>
                                                    </select></th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
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

                                <br>
                                <hr>
                                <h4>ALMACEN SEGURIDAD E HIGIENE</h4>
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda10">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-productoAG/seguridad" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover"
                                        id="tbproductoshigiene">
                                        <thead>
                                            <tr>
                                                <th data-priority="1">Código</th>
                                                <th>Marca</th>
                                                <th>Modelo</th>
                                                <th data-priority="2">Descripción</th>
                                                <th>Unidad</th>
                                                <th title="Categoría">Categoría</th>
                                                <th data-priority="3">Existencias</th>
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
                                                <th width="120"><select name="selectHigiene" style="font-size: 10px;"
                                                        class="form-control">
                                                        <option value="">Seleccionar</option>
                                                        <option value="almacen">Almacen</option>
                                                        <option value="dañado">Dañado</option>
                                                        <option value="robado">Robado</option>
                                                        <option value="abuso de confianza">abuso de confianza</option>
                                                    </select></th>
                                                <th>Precio Unitario</th>
                                                <th>Total</th>
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
                            </div>
                            <!---->

                        </div>
                    </div>
                </div>
            </div>
</section>
<?php } ?>
<?php if (($this->session->userdata('tipo') != 11 && $this->session->userdata('tipo') != 6) || ($this->session->userdata('tipo') == 11 && ($this->session->userdata('jefe') == 1 || $this->session->userdata('id') == 146)) && $this->session->userdata('tipo')!=9) { ?>
<section class="projects">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('tipo') != 11){ ?>
                    <li class="nav-item">
                        <a class="nav-link btn active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                            role="tab" aria-controls="pills-home" aria-selected="true">
                            Proyectos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-profile-tab" data-toggle="pill" href="#sub-almacenes"
                            role="tab" aria-controls="pills-profile" aria-selected="false">
                            Sub-Almacenes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">
                            Almacenes por Proyecto
                        </a>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link btn active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                            role="tab" aria-controls="pills-profile" aria-selected="false">
                            Almacenes por Proyecto
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('tipo') != 11){ ?>
                    <!---->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
                        </div>
                        <a href="<?php echo base_url() ?>almacen/excel-proyectos"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbproyectos">
                                <thead>
                                    <tr>
                                        <th>UID</th>                                        
                                        <th>Proyecto</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacion5">

                            </div>
                        </div>
                    </div>
                    <!---->

                    <!---->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div style="text-align: right">
                            <?php if($this->session->userdata('tipo') != 4){?><button class="btn btn-primary btn-sm"
                                data-toggle="modal" data-target="#nuevo_almacen"><i class="fa fa-plus-circle"></i> Nuevo
                                Almacen</button><?php } ?>
                        </div>
                        <br>
                        <ul class="nav nav-tabs">
                            <!--<li class="nav-item">
                                <a class="nav-link btn active" data-toggle="pill" href="#alamacenes_externos" role="tab"
                                    aria-selected="true">
                                    Almacenes Planta Externa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn" data-toggle="pill" href="#alamacenes_internos" role="tab"
                                    aria-selected="true">Almacenes Planta Interna</a>
                            </li>-->
                            <li class="nav-item">
                                <a class="nav-link btn active" data-toggle="pill" href="#alamacenes_2020" role="tab"
                                    aria-selected="true">Almacenes 2020</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade" id="alamacenes_externos">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar"
                                        name="busquedaalmacenesexternoss">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                        Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbalmacenesexterno">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Almacén</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionalmacenesexternos">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="alamacenes_internos">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar"
                                        name="busquedaalamacenesinternos">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                        Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbalmacenesinterno">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Almacén</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionalmacenesinterno">

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active" id="alamacenes_2020">
                                <div class="float-right">
                                    <input type="text" class="form-control" placeholder="Buscar"
                                        name="busquedaalamacenes2020">
                                </div>
                                <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                                    class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                                    aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                        Excel</span></a>
                                <div class="table-responsive">
                                    <table class="table table-striped table-sm table-hover" id="tbalmacenes2020">
                                        <thead>
                                            <tr>
                                                <th>UID</th>
                                                <th>Almacén</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <br>
                                    <div class="paginacionalmacenes2020">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!---->
                    <!-- Tab panes -->
                    <div class="tab-pane" id="sub-almacenes">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
                        </div>
                        <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbsubalmacenes">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Almacén</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacion6">

                            </div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <!---->
                    <div class="tab-pane fade show active" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div style="text-align: right">
                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#nuevo_almacen"><i
                                    class="fa fa-plus-circle"></i> Nuevo Almacen</button>
                        </div>
                        <br>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
                        </div>
                        <a href="<?php echo base_url() ?>almacen/excel-almacenes"
                            class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                            aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a
                                Excel</span></a>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbalmacenes">
                                <thead>
                                    <tr>
                                        <th>UID</th>
                                        <th>Almacén</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <br>
                            <div class="paginacion6">

                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<!--<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Producto en Catálogo</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
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
                <label>Modulo</label>
                <select name="modulo" class="form-control">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>                  
                  <option value="A">A</option>
                  <option value="B">B</option>
                  <option value="C">C</option>
                  <option value="D">D</option>
                  <option value="E">E</option>
                  <option value="F">F</option>
                  <option value="G">G</option>
                  <option value="H">H</option>
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
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="idalmacen" class="form-control">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>-->

<div id="editar_estatus" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/actualizar-estatus-existencias') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Editar Estatus en Existencias</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Existencias</label>
                            <input type="number" placeholder="0" name="existencias" min="0" class="form-control"
                                required readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Existencias a cambiar</label>
                            <input type="number" placeholder="0" name="existenciascambiar" step="0.01"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Estatus</label>
                            <select name="estatus" class="form-control">
                                
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="estatusanterior">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
        <div class="modal-header">
          <h4 id="labelEditarProducto" class="modal-title">Editar Producto</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número de Serie</label>
                <input type="text" placeholder="numero serie" name="numero_serie" class="form-control alto-costo" minlength="1" required>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número Interno</label>
                <input type="text" placeholder="numero interno" name="numero_interno" class="form-control alto-costo" minlength="1" required>
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
                  <option value="mantenimiento">Mantenimiento</option>
                  <option value="asignado">Asignado</option>
                </select>
              </div>
            </div>
            <div class="col-12">
                <div class="form-group">       
                    <label>Existencias</label>
                    <input type="number" placeholder="0" name="existencias" min="0" class="form-control" readonly>
                </div>
            </div>
            
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label>Rack</label>
                    <select name="rack" class="form-control" id="racks"><?php if ($detalle->tbl_rack_idtbl_rack==NULL): ?> selected="selected" <?php endif ?>>Seleccione...</option>
                    <?php foreach ($racks as $key => $value): ?>
                        <option value="<?= $value->idrack ?>" <?= ($detalle->tbl_rack_idtbl_rack==$value->idrack) ? 'selected="selected"' : NULL ?> ><?= $value->idrack ?></option>
                    <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="form-group">
                <label>Nivel</label>
                    <select name="nivel" class="form-control" id="niveles"><option value="" disabled="disabled" <?php if ($detalle->tbl_rack_idtbl_rack==NULL): ?>selected="selected"<?php endif ?>>Seleccione...</option>
                    </select>
                </div>
            </div>

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

<div id="editar_producto_sh" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
        <div class="modal-header">
          <h4 id="labelEditarProducto" class="modal-title">Editar Producto</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número de Serie</label>
                <input type="text" placeholder="numero serie" name="numero_serie" class="form-control alto-costo" minlength="1" required>
              </div>
            </div>
            <div class="col-12 col-lg-6">
              <div class="form-group">       
                <label>Número Interno</label>
                <input type="text" placeholder="numero interno" name="numero_interno" class="form-control alto-costo" minlength="1" required>
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
                  <?php for($x = 1; $x <= 20; $x++) { ?>
                  <option value="<?= ($x) ?>">Rack <?= ($x) ?></option>
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

<div id="nuevo_almacen" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <?php echo form_open_multipart('class="needs-validation" id="formuploadajax" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Agregar Nuevo Almacen</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <?php if($this->session->userdata('tipo') != 19) { ?>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Proyecto</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker" data-live-search="true"
                                required>
                                <option value="">Seleccione...</option>
                                <?php foreach($proyectos AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>"><?= $value->numero_proyecto?> -
                                    <?=$value->nombre_proyecto ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Segmento*</label>
                        <select name="segmento" id="ssegmento" class="selectpicker segmento"
                            data-live-search="true">
                            <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        </select>
                    </div>
                </div>
                <?php } ?>
                <?php if($this->session->userdata('tipo') == 19){ ?>
                <!--<div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Sitio</label>
                            <select name="sitio" id="sitio" class="selectpicker" data-live-search="true" required>
                                <option value="">Seleccione...</option>
                                <?php foreach($sitios AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_sitios ?>"><?= $value->nombre?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Proyecto</label>
                            <select name="proyecto" id="selectProyecto" class="selectpicker" data-live-search="true"
                                required>
                                <option value="">Seleccione...</option>
                                <?php foreach($proyectos AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>"><?= $value->numero_proyecto?> -
                                    <?=$value->nombre_proyecto ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!--<div class="col-6">
                        <label>Nombre*</label>
                        <input type="text" name="nombre" placeholder="Nombre" required class="form-control">
                    </div>-->
                </div>
                <?php } ?>
                <!--<div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Almacén</label>
              <input type="text" name="almacen" class="form-control" required minlength="3">
            </div>
          </div>
        </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger btn-sm">Cancelar</button>
                <button type="submit" class="btn btn-primary btn-sm">Guardar Almacen</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).on('change', '#selectProyecto', function(event) {
    //alert('si');
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append(
        '<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $.ajax({
        type: "POST",
        url: base_url + 'almacen/getSegmento',
        data: 'id=' + $('#selectProyecto').val(),
        success: function(r) {
            let registros = eval(r);
            console.log(registros);
            if (registros.length == 0) {
                let direccion = $("#selectProyecto").find(':selected').data('direccion');
                direccion = direccion.substring(0, 65);
                $('#ssegmento').append($('<option>', {
                    value: '',
                    text: direccion
                }));
                $('#ssegmento').selectpicker('refresh');
                return;
            }
            html = "";
            for (i = 0; i < registros.length; i++) {
                let segmento = registros[i]['segmento'];
                segmento = segmento.substring(0, 605);
                $('#ssegmento').append($('<option>', {
                    value: registros[i]['idtbl_segmentos_proyecto'],
                    text: segmento
                }));
            }
            $('#ssegmento').selectpicker('refresh');
        }
    });
});
$(document).ready(function() {
    $("#formuploadajax").on("submit", function(event) {
        if (event.isDefaultPrevented()) {
            console.log('Error')
        } else {
            event.preventDefault();
            var f = $(this);
            var formData = new FormData(document.getElementById("formuploadajax"));
            $.ajax({
                url: "<?= base_url() ?>almacen/guardarAlmacen",
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
</script>

<!--<script>
$('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='modulo']").val(recipient.modulo);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='maximo']").val(recipient.maximo);
})
</script>-->

<script>
$('#editar_estatus').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes    
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='minimo']").val(recipient.minimo);
    modal.find("select[name='inventariado']").val(recipient.inventariado);    
    if(recipient.estatusanterior == 'dañados'){       
        modal.find("select[name='estatus']").empty().append($("<option>", {
            value: 'baja',
            text: 'baja'
        }));
    }else{
        modal.find("select[name='estatus']").empty();
        $.each([ "almacen", "dañado", "robado", "abuso de confianza", "justificacion", "baja" ], function( index, value ) {
            if(recipient.estatusanterior != value){
                modal.find("select[name='estatus']").append($("<option>", {
                    value: value,
                    text: value
                }));
            }
        });
    }
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("input[name='estatusanterior']").val(recipient.estatusanterior);
    modal.find("input[name='existenciascambiar']").attr('max', recipient.existencias);
});
</script>

<script>
  $('#editar_producto').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    var option = '';
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    $.ajax({
        url: base_url+'racks/obtener_niveles',
        type: 'POST',
        dataType: 'json',
        data: {racks: recipient.rack},
        beforeSend: function() {
        },
        success : function(data) {
            console.log(data);
            if(data.error)
                Toast.fire({
                    type: 'error',
                    title: data.error
                });
                $.each(data[0], function (i, item) {
                if(item.nivel==recipient.nivel){
                    option += '<option value="'+ item.nivel +'" selected="selected">'+ item.nivel +'</option>'
                }else{
                    option += '<option value="'+ item.nivel +'">'+ item.nivel +'</option>'
                }
                });
                $('#niveles').html(option);
            },
        error : function(data) {
            console.log(data);
        }
    })
    .done(function() {
        console.log("success");
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
    });
    var modal = $(this)
    modal.find("input[name='numero_serie']").val(recipient.serie);
    modal.find("input[name='numero_interno']").val(recipient.interno);
    modal.find("textarea[name='nota']").val(recipient.nota);
    modal.find("select[name='estatus']").val(recipient.estatus);
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='nivel']").html('<option value="'+ recipient.nivel +'">'+ recipient.nivel +'</option>');
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);


    if (recipient.estatus == 'asignado')
        modal.find("select[name='estatus']").attr('disabled', 'disabled')
    else
      //modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')


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
</script>

<script>
$(document).ready(function() {

    <?php if($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19){ ?>
    mostrarDatos("", 1, "");

    mostrarDatos2("", 1);

    mostrarDatos3("", 1);

    mostrarDatos4("", 1);

    mostrarDatos5("", 1);

    mostrarDatos7("", 1, "");

    mostrarDatos8("", 1, "");

    mostrarDatos9("", 1, "");

    mostrarDatos10("", 1, "");

    <?php } ?>

    //mostrarDatos6("", 1);

    <?php if($this->session->userdata('tipo') == 4){ ?>
    mostrarDatos6("", 1, "sub");
    mostrarDatos6("", 1, "externo");
    mostrarDatos6("", 1, "interno");
    mostrarDatos6("", 1, "2020")
    <?php } else{ ?>
    mostrarDatos6("", 1);
    <?php } ?>

    <?php if(isset($this->session->userdata('permisos')['salidas_contratistas'])){ ?>
        mostrarDatosSalidasCon("", 1, "");

        $("input[name='busquedaSalidasCon']").keyup(function() {
        textoBuscar = $("input[name='busquedaSalidasCon']").val();
        textoBuscar2 = $("select[name='selectSalidasCon']").val();
        mostrarDatosSalidasCon(textoBuscar, 1, textoBuscar2);
        });

        $("select[name='selectSalidasCon']").on('change', function() {
        selectBuscar = $("select[name='selectSalidasCon']").val();
        mostrarDatosSalidasCon('', 1, selectBuscar);
        });
        
        $("body").on("click", ".paginacionSalidasCon li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaSalidasCon']").val();
        valorBuscar2 = $("select[name='selectSalidasCon']").val();
        mostrarDatosSalidasCon(valorBuscar, valorHref, valorBuscar2);
        });

        function mostrarDatosSalidasCon(valorBuscar, pagina, valorBuscar2) {
            $.ajax({
                url: "<?= base_url() ?>Almacen/mostrarSalidasContratistas",
                type: "POST",
                data: {
                    buscar: valorBuscar,
                    nropagina: pagina,
                    buscar2: valorBuscar2
                },
                dataType: "json",
                success: function(response) {
                    clase = '';
                    filas = "";
                    $.each(response.salidasContratistas, function(key, item) {
                        <?php if($this->session->userdata('tipo') == 11){ ?>
                            var estatusClase = parseInt(item.verificacion_archivo) != 0 ? 'table-success' : '';
                        <?php }else{ ?>
                            var estatusClase = "";
                        <?php } ?>
                        filas += "<tr class='"+ estatusClase +"'><td>" + item.uid + "</td><td>SA-" + item.folio + "</td><td>" + item
                            .fecha + "</td><td>" + item.entrega + "</td><td>" + item.nombres + ' ' + item
                            .apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td>" + item
                            .numero_proyecto + '-' + item.nombre_proyecto + "</td><td><center><a href='" +
                            "<?= base_url() ?>almacen/salida/detalle/" + item.idtbl_almacen_movimientos +
                            "/" + item.movimiento_virtual + "' title='Detalles' onClick=\"" +
                            "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" +
                            '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
                    });
                    $('#tbsalidascon tbody').html(filas);
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
                    $(".paginacionSalidasCon").html(paginador);
                }
            });
        }
    <?php } ?>

    <?php if(isset($this->session->userdata('permisos')['devoluciones_contratistas'])){ ?>
        mostrarDatosDevolucionesCon("", 1, "");

        $("input[name='busquedaDevolucionesCon']").keyup(function() {
        textoBuscar = $("input[name='busquedaDevolucionesCon']").val();
        textoBuscar2 = $("select[name='selectDevolucionesCon']").val();
        mostrarDatosDevolucionesCon(textoBuscar, 1, textoBuscar2);
        });

        $("select[name='selectDevolucionesCon']").on('change', function() {
        selectBuscar = $("select[name='selectDevolucionesCon']").val();
        mostrarDatosDevolucionesCon('', 1, selectBuscar);
        });
        
        $("body").on("click", ".paginacionDevolucionesCon li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaDevolucionesCon']").val();
        valorBuscar2 = $("select[name='selectDevolucionesCon']").val();
        mostrarDatosDevolucionesCon(valorBuscar, valorHref, valorBuscar2);
        });

        function mostrarDatosDevolucionesCon(valorBuscar, pagina, valorBuscar2) {
            $.ajax({
                url: "<?= base_url() ?>Almacen/mostrarDevolucionesContratistas",
                type: "POST",
                data: {
                    buscar: valorBuscar,
                    nropagina: pagina,
                    buscar2: valorBuscar2
                },
                dataType: "json",
                success: function(response) {
                    clase = '';
                    filas = "";
                    $.each(response.devolucionesContratistas, function(key, item) {
                        <?php if($this->session->userdata('tipo') == 11){ ?>
                            var estatusClase = parseInt(item.verificacion_archivo) != 0 ? 'table-success' : '';
                        <?php }else{ ?>
                            var estatusClase = "";
                        <?php } ?>
                        filas += "<tr class='"+ estatusClase +"'><td>" + item.uid + "</td><td>SA-" + item.folio + "</td><td>" + item
                            .fecha + "</td><td>" + item.entrega + "</td><td>" + item.nombres + ' ' + item
                            .apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td>" + item
                            .numero_proyecto + '-' + item.nombre_proyecto + "</td><td><center><a href='" +
                            "<?= base_url() ?>almacen/salida/detalle/" + item.idtbl_almacen_movimientos +
                            "/" + item.movimiento_virtual + "' title='Detalles' onClick=\"" +
                            "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" +
                            '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
                    });
                    $('#tbdevolucionescon tbody').html(filas);
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
                    $(".paginacionDevolucionesCon").html(paginador);
                }
            });
        }
    <?php } ?>

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos(textoBuscar, 1, textoBuscar2);
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
        <?php if($this->session->userdata('tipo') == 4){ ?>
        mostrarDatos6(textoBuscar, 1, "externo");
        <?php } else{ ?>
        mostrarDatos6(textoBuscar, 1);
        <?php } ?>
    });

    $("input[name='busqueda6']").keyup(function() {
        textoBuscar = $("input[name='busqueda6']").val();
        <?php if($this->session->userdata('tipo') == 4){ ?>
        mostrarDatos6(textoBuscar, 1, "sub");
        <?php } else{ ?>
        mostrarDatos6(textoBuscar, 1);
        <?php } ?>
    });

    $("input[name='busqueda7']").keyup(function() {
        textoBuscar = $("input[name='busqueda7']").val();
        textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos7(textoBuscar, 1, textoBuscar2);
    });

    $("input[name='busqueda8']").keyup(function() {
        textoBuscar = $("input[name='busqueda8']").val();
        textoBuscar2 = $("select[name='selectConsumibles']").val();
        mostrarDatos8(textoBuscar, 1, textoBuscar2);
    });

    $("input[name='busqueda9']").keyup(function() {
        textoBuscar = $("input[name='busqueda9']").val();
        textoBuscar2 = $("select[name='selectHerramientas']").val();
        mostrarDatos9(textoBuscar, 1, textoBuscar2);
    });

    $("input[name='busqueda10']").keyup(function() {
        textoBuscar = $("input[name='busqueda10']").val();
        textoBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(textoBuscar, 1, textoBuscar2);
    });

    <?php if($this->session->userdata('tipo') == 4){ ?>
    $("input[name='busquedaalmacenesexternos']").keyup(function() {
        textoBuscar = $("input[name='busquedaalmacenesexternos']").val();
        mostrarDatos6(textoBuscar, 1, "externo");
    });
    $("input[name='busquedaalamacenesinternos']").keyup(function() {
        textoBuscar = $("input[name='busquedaalamacenesinternos']").val();
        mostrarDatos6(textoBuscar, 1, "interno");
    });
    $("input[name='busquedaalamacenes2020']").keyup(function() {
        textoBuscar = $("input[name='busquedaalamacenes2020']").val();
        mostrarDatos6(textoBuscar, 1, "2020");
    });
    $("body").on("click", ".paginacionalmacenesexternos li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaalmacenesexternos']").val();
        mostrarDatos6(valorBuscar, valorHref, "externo");
    });
    $("body").on("click", ".paginacionalmacenesinterno li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaalamacenesinternos']").val();
        mostrarDatos6(valorBuscar, valorHref, "interno");
    });
    $("body").on("click", ".paginacionalmacenes2020 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaalamacenes2020']").val();
        mostrarDatos6(valorBuscar, valorHref, "2020");
    });
    <?php } ?>

    $("select[name='selectKuali']").on('change', function() {
        selectBuscar = $("select[name='selectKuali']").val();
        mostrarDatos('', 1, selectBuscar);
    });

    $("select[name='selectKuali']").on('change', function() {
        selectBuscar = $("select[name='selectKuali']").val();
        mostrarDatos7('', 1, selectBuscar);
    });

    $("select[name='selectConsumibles']").on('change', function() {
        selectBuscar = $("select[name='selectConsumibles']").val();
        mostrarDatos8('', 1, selectBuscar);
    });

    $("select[name='selectHerramientas']").on('change', function() {
        selectBuscar = $("select[name='selectHerramientas']").val();
        mostrarDatos9('', 1, selectBuscar);
    });

    $("select[name='selectHigiene']").on('change', function() {
        selectBuscar = $("select[name='selectHigiene']").val();
        mostrarDatos10('', 1, selectBuscar);
    });


    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos(valorBuscar, valorHref, valorBuscar2);
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
        mostrarDatos6(valorBuscar, valorHref, "externo");
    });

    $("body").on("click", ".paginacion6 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda6']").val();
        <?php if($this->session->userdata('tipo') == 4){ ?>
        mostrarDatos6(valorBuscar, valorHref, "sub");
        <?php } else{ ?>
        mostrarDatos6(valorBuscar, valorHref);
        <?php } ?>
    });

    $("body").on("click", ".paginacion7 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda7']").val();
        valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos7(valorBuscar, valorHref, valorBuscar2);
    });

    $("body").on("click", ".paginacion8 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda8']").val();
        valorBuscar2 = $("select[name='selectConsumibles']").val();
        mostrarDatos8(valorBuscar, valorHref, valorBuscar2);
    });

    $("body").on("click", ".paginacion9 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda9']").val();
        valorBuscar2 = $("select[name='selectHerramientas']").val();
        mostrarDatos9(valorBuscar, valorHref, valorBuscar2);
    });

    $("body").on("click", ".paginacion10 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda10']").val();
        valorBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(valorBuscar, valorHref, valorBuscar2);
    });

});

function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneral",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneral, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias +
                    "</td><td><?php if($this->session->userdata('tipo') == 4){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .precio * item.existencias) + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    " data-inventariado='" + item.inventariado + " data-idalmacen='" + item.iddtl_almacen + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneral tbody').html(filas);
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
        url: "<?= base_url() ?>Almacen/mostrarEntradasAlmacenGeneral",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.entradasAlmacenGeneral, function(key, item) {

                filas += "<tr><td>" + item.uid + "</td><td>EA-" + item.folio + "</td><td>" + item
                    .fecha + "</td><td>" + item.neodata_pedido + "</td><td>" + item.nombre_fiscal +
                    "</td><td>" + item.nombre + "</td><td>" + item.numero_proyecto + '-' + item
                    .nombre_proyecto + "</td><td>" + item.tipo_documento + "</td>" +
                    "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" + item
                    .idtbl_almacen_movimientos + "' title='Detalles' onClick=\"" +
                    "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" +
                    '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
            });
            $('#tbentradasalmacengeneral tbody').html(filas);
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
        url: "<?= base_url() ?>Almacen/mostrarSalidasAlmacenGeneral",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.salidasAlmacenGeneral, function(key, item) {
                <?php if($this->session->userdata('tipo') == 11){ ?>
                    var estatusClase = parseInt(item.verificacion_archivo) != 0 ? 'table-success' : '';
                <?php }else{ ?>
                    var estatusClase = "";
                <?php } ?>
                filas += "<tr class='"+ estatusClase +"'><td>" + item.uid + "</td><td>SA-" + item.folio + "</td><td>" + item
                    .fecha + "</td><td>" + item.entrega + "</td><td>" + item.nombres + ' ' + item
                    .apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item
                    .numero_proyecto + '-' + item.nombre_proyecto + "</td><td><center><a href='" +
                    "<?= base_url() ?>almacen/salida/detalle/" + item.idtbl_almacen_movimientos +
                    "/" + item.movimiento_virtual + "' title='Detalles' onClick=\"" +
                    "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" +
                    '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
            });
            $('#tbsalidasalmacengeneral tbody').html(filas);
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
        url: "<?= base_url() ?>Almacen/mostrarDevolucionesAlmacenGeneral",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.devolucionesAlmacenGeneral, function(key, item) {
                filas += "<tr><td>" + item.uid + "</td><td>DA-" + item.folio + "</td><td>" + item
                    .fecha + "</td><td>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item
                    .apellido_materno + "</td><td>" + item.entrega + "</td><td>" + item.nombre +
                    "</td><td>" + item.numero_proyecto + '-' + item.nombre_proyecto +
                    "</td><td><center><a href='" + "<?= base_url() ?>almacen/devolucion/detalle/" +
                    item.idtbl_almacen_movimientos + "' title='Detalles' onClick=\"" +
                    "window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;" +
                    '"' + "><i class='fa fa-eye'></i></a></center>" + "</td></tr>";
            });
            $('#tbdevolucionesalmacengeneral tbody').html(filas);
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
        url: "<?= base_url() ?>Almacen/mostrarProyectos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            $.each(response.proyectos, function(key, item) {
                filas += "<tr><td><a href='" + "<?= base_url() ?>almacen/detalle/" + item.uid +
                    "'>" + item.uid + "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle/" + item.uid + "'>" + item.numero_proyecto +
                    "</a></td><td><a href='" + "<?= base_url() ?>almacen/detalle/" + item.uid +
                    "'>" + item.nombre_proyecto + "</a></td></tr>";
            });
            $('#tbproyectoss tbody').html(filas);
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
            $(".paginacion55").html(paginador);
        }
    });
}

function mostrarDatos6(valorBuscar, pagina, tipo) {
    console.log(tipo);
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarAlmacenes",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            tipo: tipo
        },
        dataType: "json",
        success: function(response) {

            filas = "";
            console.log(response);
            $.each(response.almacenes, function(key, item) {
                filas += "<tr><td><a href='" + "<?= base_url() ?>almacen/detalle_almc/" + item.uid +
                    "'>" + item.uid + "</a></td><td><a href='" +
                    "<?= base_url() ?>almacen/detalle_almc/" + item.uid + "'>" + item.almacen +
                    "</a></td></tr>";
            });

            var idTable = "tbalmacenes";
            var classPaginador = "paginacion6";
            <?php if($this->session->userdata('tipo') == 4){ ?>                
            if (tipo == "externo") {
                idTable = "tbproyectos";
                classPaginador = "paginacion5";
            } else if (tipo == "interno") {
                idTable = "tbalmacenesinterno";
                classPaginador = "paginacionalmacenesinterno";
            } else if (tipo == "2020") {
                idTable = "tbalmacenes2020";
                classPaginador = "paginacionalmacenes2020";
            } else {
                idTable = "tbsubalmacenes";
            }
            <?php } ?>

            $('#' + idTable + ' tbody').html(filas);
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
            $("." + classPaginador).html(paginador);
        }
    });
}

function mostrarDatos7(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneralActivos",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneralActivos, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias + "</td><td>" + item.numero_serie + "</td><td>" + item
                    .numero_interno +
                    "</td><td><?php if($this->session->userdata('tipo') == 30){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + "data-idalmacen='" + item.iddtl_almacen + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio * item.existencias) + "</td><td>" + "<a href='" +
                    "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen +
                    "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
                    filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-estado='" + item.estado + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneralactivos tbody').html(filas);
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

function mostrarDatos8(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneralConsumibles",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneralConsumibles, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias +
                    "</td><td><?php if($this->session->userdata('tipo') == 4){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio * item.existencias) + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" +
                    " data-inventariado='" + item.inventariado + "'" + " data-rack='" + item.rack + "'" + " data-modulo='" + item.modulo + "'" + " data-nivel='" + item.nivel + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'" + "data-nota='" + item.nota + "'" + "data-existencias='" + item.existencias + "'" + "data-estatus='" + item.estatus + "'" + "data-serie='" + item.numero_serie + "'" + "data-interno='" + item.numero_interno + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneralconsumibles tbody').html(filas);
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


function mostrarDatos9(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenGeneralHerramientas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosAlmacenGeneralHerramientas, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias +
                    "</td><td><?php if($this->session->userdata('tipo') == 4){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio * item.existencias) + "</td><td>" +
                    "<a href='" +
                    "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen +
                    "' title='Información' onClick='" +
                    "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
                    filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "'data-idalmacen='" + item.iddtl_almacen + "' data-abreviatura='" + item.abreviatura + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductosalmacengeneralherramientas tbody').html(filas);
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

function mostrarDatos10(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarProductosSeguridadHigiene",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            clase = '';
            filas = "";
            $.each(response.productosSeguridadHigiene, function(key, item) {
                if (item.tipo_moneda == 'd') {
                    item.precio = item.precio * <?= $precio_dolar ?>;
                }
                if (new Intl.NumberFormat("en-IN").format(item.existencias) == new Intl
                    .NumberFormat("en-IN").format(item.minimo)) {
                    clase = 'table-warning';
                }
                filas += "<tr class='" + clase + "'><td>" + item.neodata + "</td><td>" + item
                    .marca + "</td><td>" + item.modelo + "</td><td>" + item.descripcion +
                    "</td><td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr +
                    "</td><td title='" + item.categoria + "'>" + item.categoria + "</td><td>" + item
                    .existencias +
                    "</td><td><?php if($this->session->userdata('tipo') == 4){ ?><a href='#editar_estatus' data-toggle='modal' title='" +
                    item.idtbl_catalogo + "'" + " data-inventariado='" + item.inventariado + "'" +
                    " data-minimo='" + item.minimo + "'" + " data-existencias='" + item
                    .existencias + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + "data-estatusanterior='" + item.estatus + "'" +
                    " data-uid='" + item.uid + "'>" + item.estatus + "</a><?php }else{ ?>" + item
                    .estatus + "<?php } ?></td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio) + "</td><td>$" + new Intl.NumberFormat("en-IN").format(item
                        .ultimo_precio * item.existencias) + "</td><td>" +
                    "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'" + "data-serie='" + item.numero_serie + "'" + "data-interno='" + item.numero_interno + "'" + "data-nota='" + item.nota + "'" + "data-estatus='" + item.estatus + "'" + "data-existencias='" + item.existencias + "'" + "data-inventariado='" + item.inventariado + "'" + " data-rack='" + item.rack + "'" + " data-modulo='" + item.modulo + "'" + " data-nivel='" + item.nivel + "'" + " data-idalmacen='" + item.iddtl_almacen + "'" + " data-minimo='" + item
                    .minimo + "'" + " data-maximo='" + item.maximo + "'" + " data-uid='" + item
                    .uid + "'><i class='fa fa-edit'></i></a></td></tr>";
            });
            $('#tbproductoshigiene tbody').html(filas);
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
</script>