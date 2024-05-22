<?php if (isset($this->session->userdata('permisos')['almacen_refacciones_control_vehicular']) && $this->session->userdata('permisos')['almacen_refacciones_control_vehicular'] > 1) : ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="<?php echo base_url() ?>almacen/catalogo/refacciones">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-green"><i class="fa fa-list"></i></div>
                <div class="title"><span>Ver<br>Catálogo</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="<?php echo base_url() ?>almacen/asignaciones/refacciones">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-violet"><i class="fa fa-list"></i></div>
                <div class="title"><span>Ver<br>Asignaciones</span>
                </div>

              </div>
            </a>
          </div>
        </div>

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
        
      </div>
    </div>
  </section>
<?php endif ?>
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4>
                <?php if(isset($almacen)) { ?>
                  <?php echo $almacen->almacen ?>
                <?php } ?>
                <?php if(!isset($almacen)) { ?>
                  <?php echo $proyecto->nombre_proyecto ?>
                <?php } ?> 
                <small class="float-right">
                  Precio Dolar $<?php echo $precio_dolar ?>
                </small>
              </h4>
              <br>
              <?php if($aux === 'no') { ?>
                <center>
                    <?php if($this->session->userdata('id') != 369){ ?>
                  <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>" class="btn btn-outline-primary">
                    <i class="fa fa-cart-plus"></i> Entrada
                  </a>
                  <?php } ?>
            
                  <!--<a href="<?php echo base_url().'almacen/nueva-salida/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Salida</a>-->
                  <?php if (isset($this->session->userdata('permisos')['traspasos']) && $this->session->userdata('permisos')['traspasos']>2): ?>
                    <!--<a href="<?php echo base_url().'almacen/nuevo-traspaso/'.$almacen->uid ?>" class="btn btn-outline-primary"> <i class="fa fa-random"></i> Traspaso
                    </a>-->
                    <a href="#nuevo_traspaso" data-toggle='modal' data-tipo="herramienta" data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
                  <?php endif ?>
                  <!--<a href="<?php echo base_url().'almacen/nueva-devolucion/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Devolución</a>-->
                </center>
                <div>
                  <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link btn active" id="pills-productos-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-productos" aria-selected="true">
                        Productos
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" id="pills-entrada-tab" data-toggle="pill" href="#pills-entrada" role="tab" aria-controls="pills-entrada" aria-selected="false">
                        Entradas
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="false">
                        Salidas
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
                        Devoluciones
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" id="pills-traspaso-tab" data-toggle="pill" href="#pills-traspaso" role="tab" aria-controls="pills-traspaso" aria-selected="false">
                        Traspasos
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
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-entrada" role="tabpanel" aria-labelledby="pills-entrada-tab">
                      <!---->
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                      </div>                  
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-entradas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbentradasalmacencli">
                          <thead>
                            <tr>
                              <th>Uid</th>   
                              <th>Folio</th>             
                              <!--<th>Almacen</th>-->
                              <th>Fecha</th>
                              <th>Personal que aprobó</th>
                              <th>Proyecto</th>
                              <th>Tipo Entrada</th>                                                         
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
                              <th>Tipo Entrada</th>                                                     
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
                    <div class="tab-pane fade" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                      <!---->
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-salidas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbsalidasalmacencli">
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
                    <div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
                      <!---->
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-devoluciones/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbdevolucionesalmacencli">
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
                    <div class="tab-pane fade" id="pills-traspaso" role="tabpanel" aria-labelledby="pills-traspaso-tab">
                      <!---->
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-traspasos/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbtraspasosalmacencli">
                          <thead>
                            <tr>
                              <th>Uid</th>       
                              <th>Folio</th>         
                              <!--<th>Almacen</th>-->
                              <th>Fecha</th>
                              <th>Personal que aprobó</th>
                              <th>Proyecto Origen</th>
                              <th>Proyecto Destino</th>                            
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
                              <th>Proyecto Origen</th>
                              <th>Proyecto Destino</th>                            
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
                    <div class="tab-pane fade show active" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
                      <!---->
                      <h4>Activo Fijo</h4>
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaActivo">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-productos/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbproductosalmacencliActivo">
                          <thead>
                            <tr>
                              <th data-priority="1">Código</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th data-priority="2">Descripción</th>
                              <th>Unidad</th>
                              <th title="Categoría">Categoría</th>
                              <th>Minimo</th>
                              <th data-priority="3">Existencias</th>
                              <th>Numero Serie</th>
                              <th>Numero Interno</th>
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
                              <th>Minimo</th>
                              <th>Existencias</th>
                              <th>Numero Serie</th>
                              <th>Numero Interno</th>                              
                              <th width="120">
                                <select name="selectKuali" style="font-size: 10px;" class="form-control">
                                    <option value="">Seleccionar</option>
                                    <option value="almacen">Almacen</option>
                                    <option value="asignado">Asignado</option>
                                    <option value="dañado">Dañado</option>
                                    <option value="robado">Robado</option>
                                    <option value="justificacion">Justificacion</option>
                                    <option value="abuso de confianza">Abuso de confianza</option>
                                  </select>
                              </th>
                              <th>Precio Unitario</th>
                              <th>Total</th>
                              <th></th>
                            </tr>
                          </tfoot>
                          <tbody>
                            
                          </tbody>
                        </table>
                        <br>
                        <div class="paginacionActivo">

                        </div>
                      </div> 

                      <h4>Herramienta</h4>
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaHerramienta">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel_kuali_herramientas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbproductosalmacencliHerramienta">
                          <thead>
                            <tr>
                              <th data-priority="1">Código</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th data-priority="2">Descripción</th>
                              <th>Unidad</th>
                              <th title="Categoría">Categoría</th>
                              <th>Minimo</th>
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
                              <th>Minimo</th>
                              <th>Existencias</th>
                              <th>
                                <select name="selectHerramienta" style="font-size: 10px;" class="form-control">
                                <option value="">Seleccionar..</option>
                                <option value="almacen">Almacen</option>                                
                                <option value="dañado">Dañado</option>
                                <option value="robado">Robado</option>
                                <option value="abuso de confianza">Abuso de confianza</option>
                                <option value="justificacion">Justificacion</option>
                              </select>
                              </th>
                              <th>Precio Unitario</th>
                              <th>Total</th>
                              <th></th>
                            </tr>
                          </tfoot>
                          <tbody>
                            
                          </tbody>
                        </table>
                        <br>
                        <div class="paginacionHerramienta">

                        </div>
                      </div> 


                      <h4>Consumible</h4>
                      <div class="float-right">
                        <input type="text" class="form-control" placeholder="Buscar" name="busquedaConsumible">
                      </div>
                      <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-productos/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table">
                        <span>
                          <i class="fa fa-file-excel-o"></i> Exportar a Excel
                        </span>
                      </button>       
                      <div class="table-responsive">
                        <table class="table table-striped table-sm table-hover" id="tbproductosalmacencliConsumible">
                          <thead>
                            <tr>
                              <th data-priority="1">Código</th>
                              <th>Marca</th>
                              <th>Modelo</th>
                              <th data-priority="2">Descripción</th>
                              <th>Unidad</th>
                              <th title="Categoría">Categoría</th>
                              <th>Minimo</th>
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
                              <th>Minimo</th>
                              <th>Existencias</th>
                              <th>
                                <select name="selectConsumible" style="font-size: 10px;" class="form-control">
                                <option value="">Seleccione..</option>
                                <option value="almacen">Almacen</option>                                                                
                                <option value="dañado">Dañado</option>
                                <option value="robado">Robado</option>
                                <option value="justificacion">Justificacion</option>
                                <option value="abuso de confianza">Abuso de confianza</option>
                              </select>
                              </th>
                              <th>Precio Unitario</th>
                              <th>Total</th>
                              <th></th>
                            </tr>
                          </tfoot>
                          <tbody>
                            
                          </tbody>
                        </table>
                        <br>
                        <div class="paginacionConsumible">

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

<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url().'almacen/actualizar-producto-catalogo') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar Producto en Catálogo</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
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
<div id="productos" tabindex="-1" role="dialog" aria-labelledby="labelProductos" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="labelProductos" class="modal-title">Productos</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div id="nuevo_traspaso" tabindex="-1" role="dialog" aria-labelledby="labelNuevoTraspaso" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
    <?= form_open(base_url().'almacen/nuevo-traspaso') ?>
      <div class="modal-header">
        <h4 id="labelNuevoTraspaso" class="modal-title">Nuevo Traspaso</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
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
          <input name="tipo" type="text" hidden>
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

<script>
  $('#editar_producto').on('show.bs.modal', function (event) {
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
      data: "id="+id,
      success:function(respuesta) {
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
        html += '<table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">';
        html += '<thead>';
        html += '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Precio</th><th>Tipo Moneda</th>';
        html += '</thead>';
        html += '<tbody>';

        for(var i=0; i<registros.length; i++) {
          html += '<tr><td>'+registros[i]['descripcion']+'</td><td>'+registros[i]['modelo']+'</td><td>'+registros[i]['cantidad']+'</td><td>'+registros[i]['precio']+"</td><td>"+registros[i]['tipo_moneda']+'</td></tr>';
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
  function verProductosSalida(id) {
    $.ajax({
      url: "<?= base_url()?>almacen/getProductosSalida",
      type: "POST",
      data: "id="+id,
      success:function(respuesta) {
        $("#productos").modal("show");
        var registros = eval(respuesta);
        html = '';
        html += '<div class="table-responsive">'
        html += '<table class="table table-bordered"><thead>';
        html += '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Entregado</th><th>Usuario</th><th>Usuario Creación</th><th>Usuario Aprobación</th><th>Usuario CO</th><th>Usuario AG</th>';
        html += '</thead><tbody>';
        for(var i=0; i<registros.length; i++) {
          html += '<tr><td>'+registros[i]['descripcion']+'</td><td>'+registros[i]['modelo']+'</td><td>'+registros[i]['cantidad']+'</td><td>'+registros[i]['entregado']+'</td><td>'+registros[i]['nombres']+" "+registros[i]['apellido_paterno']+" "+registros[i]['apellido_materno']+'</td><td>'+registros[i]['nombre_autor']+'</td><td>'+registros[i]['nombre_autorizacion']+'</td><td>'+registros[i]['nombre_co']+'</td><td>'+registros[i]['nombre_ag']+'</td>'+'</tr>';
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
      data: "id="+id,
      success:function(respuesta) {
        $("#productos").modal("show");
        var registros = eval(respuesta);
        html = '';
        html += '<div class="table-responsive">'
        html += '<table class="table table-bordered"><thead>';
        html += '<tr><th>Descripción</th><th>Modelo</th><th>Cantidad</th><th>Entregado</th><th>Usuario</th>';
        html += '</thead><tbody>';
        for(var i=0; i<registros.length; i++) {
          html += '<tr><td>'+registros[i]['descripcion']+'</td><td>'+registros[i]['modelo']+'</td><td>'+registros[i]['cantidad']+'</td><td>'+registros[i]['entregado']+'</td><td>'+registros[i]['nombres']+" "+registros[i]['apellido_paterno']+" "+registros[i]['apellido_materno']+'</td></tr>';
        };
        html += '</tbody></table></div>';
        $(".modal-body").html(html);
      }
    });
  }
</script>
<?php if($aux == 'no') { ?>
<script>
  $(document).ready(function(){
    selectBuscar = "";
    mostrarDatosActivo("", 1, "");
    mostrarDatosHerramienta("",1, "");
    mostrarDatosConsumible("",1, "");
    mostrarDatos2("",1);
    mostrarDatos3("",1);
    mostrarDatos4("",1);
    mostrarDatos5("",1);
    mostrarDatosEntradaTraspaso("", 1);

    $("input[name='busquedaActivo']").keyup(function() {
      textoBuscar = $("input[name='busquedaActivo']").val();
      textoBuscar2 = $("select[name='selectKuali']").val();
      mostrarDatosActivo(textoBuscar, 1, textoBuscar2);
    });

    $("select[name='selectKuali']").on('change', function() {      
      //textoBuscar2 = $("select[name='selectKuali']").val();
      selectBuscar = $("select[name='selectKuali']").val();
      mostrarDatosActivo('', 1, selectBuscar);
    });
  

    $("input[name='busquedaHerramienta']").keyup(function() {
      textoBuscar = $("input[name='busquedaHerramienta']").val();
      textoBuscar2 = $("select[name='selectHerramienta']").val();
      mostrarDatosHerramienta(textoBuscar, 1, textoBuscar2);
    });

    $("select[name='selectHerramienta']").on('change', function() {            
      selectBuscar = $("select[name='selectHerramienta']").val();
      mostrarDatosHerramienta('', 1, selectBuscar);
    });

    $("input[name='busquedaConsumible']").keyup(function() {
      textoBuscar = $("input[name='busquedaConsumible']").val();
      textoBuscar2 = $("select[name='selectConsumible']").val();
      mostrarDatosConsumible(textoBuscar,1,textoBuscar2);
    });

    $("select[name='selectConsumible']").on('change', function() {            
      selectBuscar = $("select[name='selectConsumible']").val();
      mostrarDatosConsumible('', 1, selectBuscar);
    });

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });

    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1);
    });    

    $("input[name='busqueda4']").keyup(function() {
      textoBuscar = $("input[name='busqueda4']").val();
      mostrarDatos4(textoBuscar,1);
    });

    $("input[name='busqueda5']").keyup(function() {
      textoBuscar = $("input[name='busqueda5']").val();
      mostrarDatos5(textoBuscar,1);
    });

    $("input[name='busquedaEntradaTraspaso']").keyup(function() {
        textoBuscar = $("input[name='busquedaEntradaTraspaso']").val();
        mostrarDatosEntradaTraspaso(textoBuscar, 1);
    }); 
    

    $("body").on("click",".paginacionActivo li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaActivo']").val();
      valorBuscar2 = $("select[name='selectKuali']").val();
      mostrarDatosActivo(valorBuscar,valorHref, valorBuscar2); 
    });

    $("body").on("click",".paginacionHerramienta li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaHerramienta']").val();
      valorBuscar2 = $("select[name='selectHerramienta']").val();
      mostrarDatosHerramienta(valorBuscar,valorHref,valorBuscar2); 
    });

    $("body").on("click",".paginacionConsumible li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaConsumible']").val();
      //valosBuscar2 = $("select[name='selectConsumible']").val();
      mostrarDatosConsumible(valorBuscar,valorHref); 
    });

    $("body").on("click",".paginacion2 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(valorBuscar,valorHref); 
    });

    $("body").on("click",".paginacion3 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(valorBuscar,valorHref); 
    });

    $("body").on("click",".paginacion4 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda4']").val();
      mostrarDatos4(valorBuscar,valorHref); 
    });

    $("body").on("click",".paginacion5 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda5']").val();
      mostrarDatos5(valorBuscar,valorHref); 
    });
    $("body").on("click", ".paginacionEntradaTraspaso li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaEntradaTraspaso']").val();
        mostrarDatosEntradaTraspaso(valorBuscar, valorHref);
    }); 

  });
  function mostrarDatosActivo(valorBuscar, pagina, valorBuscar2) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenCliActivo",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2,
        uid_almacen: uid_almacen
      },        
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.productos,function(key,item) {
          var itemClass = "table-success";
          var existencias = parseFloat(item.existencias);
          var minimo = parseFloat(item.minimo);
          if(existencias == minimo){
            itemClass = "table-warning";
          } else if(existencias < minimo){
            itemClass = "table-danger";
          }
          filas += "<tr class='" + itemClass + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.categoria + "</td>";
          filas += "<td>" + minimo.toFixed(2) + "</td>";
          filas += "<td>" + item.existencias + "</td>";
          filas += "<td>" + item.numero_serie + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if (item.tipo_moneda=='d') {
            item.precio=item.precio * <?= $precio_dolar ?>;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>$" + (item.precio*item.existencias) + "</td>";
          filas += "<td>";
          filas += "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'";
          filas += "data-inventariado='" + item.inventariado + "'";
          filas += "data-minimo='" + item.minimo + "'";
          filas += "data-maximo='" + item.maximo  + "'";
          filas += "data-uid='" + item.uid + "'";
          filas += "><i class='fa fa-edit'></i></a>";
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbproductosalmacencliActivo tbody').html(filas);
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
        $(".paginacionActivo").html(paginador);
      }
    });
  }

  function mostrarDatosHerramienta(valorBuscar,pagina, valorBuscar2) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenCliHerramienta",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,buscar2:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.productos,function(key,item) {
          var itemClass = "table-success";
          var existencias = parseFloat(item.existencias);
          var minimo = parseFloat(item.minimo);
          if(existencias == minimo){
            itemClass = "table-warning";
          } else if(existencias < minimo){
            itemClass = "table-danger";
          }
          filas += "<tr class='" + itemClass + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.categoria + "</td>";
          filas += "<td>" + minimo.toFixed(2) + "</td>";
          filas += "<td>" + item.existencias + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if (item.tipo_moneda=='d') {
            item.precio=item.precio * <?= $precio_dolar ?>;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>$" + (item.precio*item.existencias) + "</td>";
          filas += "<td>";
          filas += "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'";
          filas += "data-inventariado='" + item.inventariado + "'";
          filas += "data-minimo='" + item.minimo + "'";
          filas += "data-maximo='" + item.maximo  + "'";
          filas += "data-uid='" + item.uid + "'";
          filas += "><i class='fa fa-edit'></i></a>";
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbproductosalmacencliHerramienta tbody').html(filas);
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
        $(".paginacionHerramienta").html(paginador);
      }
    });
  }


  function mostrarDatosConsumible(valorBuscar,pagina,valorBuscar2) {
    var uid_almacen = '<?= $almacen->uid ?>';
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarProductosAlmacenCliConsumible",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,buscar2:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.productos,function(key,item) {
          var itemClass = "table-success";
          var existencias = parseFloat(item.existencias);
          var minimo = parseFloat(item.minimo);
          if(existencias == minimo){
            itemClass = "table-warning";
          } else if(existencias < minimo){
            itemClass = "table-danger";
          }
          filas += "<tr class='" + itemClass + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.categoria + "</td>";
          filas += "<td>" + minimo.toFixed(2) + "</td>";
          filas += "<td>" + item.existencias + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if (item.tipo_moneda=='d') {
            item.precio=item.precio * <?= $precio_dolar ?>;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>$" + (item.precio*item.existencias) + "</td>";
          filas += "<td>";
          filas += "<a href='#editar_producto' data-toggle='modal' title='" + item.uid + "'";
          filas += "data-inventariado='" + item.inventariado + "'";
          filas += "data-minimo='" + item.minimo + "'";
          filas += "data-maximo='" + item.maximo  + "'";
          filas += "data-uid='" + item.uid + "'";
          filas += "><i class='fa fa-edit'></i></a>";
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbproductosalmacencliConsumible tbody').html(filas);
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
        $(".paginacionConsumible").html(paginador);
      }
    });
  }

  function mostrarDatos2(valorBuscar,pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'entrada','entrada-almacen'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.reportes,function(key,item) {  
          if(item['tipo_movimiento'] == 'traspaso'){
            movimiento = 'Traspaso';
            color = 'red';
          }else{
            movimiento = 'Entrada';
            color = 'blue';
          }
          if(item['estatus'] == 0){
              clase = 'table-warning';
            }else if(item['estatus'] == 1){
              if(item['modificado'] == 1){
                clase = 'table-info';
              }else{
              clase = 'table-success';
              }
            }else if(item['estatus'] == 2){
              clase = 'table-danger';
            }
          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>EA-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['nombre'] + "</td>";
          filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
          filas += "<td style='color: " + color + "'>" + movimiento + "</td>";                          
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'" + "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          filas += "</tr>";
        });
        $('#tbentradasalmacencli tbody').html(filas);
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
        $(".paginacion2").html(paginador);
      }
    });
  }
  function mostrarDatos3(valorBuscar,pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'salida-almacen'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.reportes,function(key,item) {  
          filas += "<tr>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>SA-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['entrega'] + "</td>";
          filas += "<td>" + item['recibe'] + ' ' + item['paternorecibe'] + ' ' + item['maternorecibe'] + "</td>";
          filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";                          
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/salida/detalle/" + item['idtbl_almacen_movimientos'] + "/" + item['movimiento_virtual'] + "' title='Detalles' onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          filas += "</tr>";
        });
        $('#tbsalidasalmacencli tbody').html(filas);
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
        $(".paginacion3").html(paginador);
      }
    });
  }
  function mostrarDatos4(valorBuscar,pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'devolucion-almacen-refacciones-cv'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.reportes,function(key,item) {  
          filas += "<tr>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>DA-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['recibe'] + ' ' + item['paternorecibe'] + ' ' + item['maternorecibe'] + "</td>";
          filas += "<td>" + item['nombre'] + "</td>";                         
          filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";                          
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/devolucion/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          filas += "</tr>";
        });
        $('#tbdevolucionesalmacencli tbody').html(filas);
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
        $(".paginacion4").html(paginador);
      }
    });
  }
  function mostrarDatos5(valorBuscar,pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'traspaso-almacen'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.reportes,function(key,item) {  
          filas += "<tr>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>TP-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['nombre'] + "</td>";
          filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
          filas += "<td>" + item['nombre_proyecto_destino'] + "</td>";                          
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/traspaso/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          filas += "</tr>";
        });
        $('#tbtraspasosalmacencli tbody').html(filas);
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
        $(".paginacion5").html(paginador);
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
<script>
  $('#nuevo_traspaso').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='tipo']").val(recipient.tipo);    
  })
</script>
