<?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] > 1) : ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
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
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="<?php echo base_url() ?>almacen/asignaciones/alto-costo">
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
        <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Herramientas</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
              <a href="<?php echo base_url() . 'almacen/nueva-entrada-alto-costo/' . $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
              <a href="#nuevo_traspaso" data-toggle='modal' data-tipo="herramienta" data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
            </div>
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-inventario-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbalmacenaltocosto">
                <thead>
                  <tr>
                    <th>Neodata</th>
                    <th data-priority="1">Código</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th data-priority="2">Descripción</th>
                    <th>Serie</th>
                    <th>N° Interno</th>
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
                    <th>N° Interno</th>
                    <th title="Categoría">Categoría</th>
                    <th>
                      <select name="selectAC" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="almacen">Almacen</option>
                        <option value="justificacion">Justificado</option>
                        <option value="asignado">Asignado</option>
                        <option value="dañado">Dañado</option>                        
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="baja">Baja</option>
                        <option value="vendida">Vendida</option>
                        <option value="traspaso">Traspaso</option>
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
        <div class="card">
          <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Consumibles</h4>
          </div>          
          <div class="card-body">
          <div class="card-title">
          <a href="#nuevo_traspaso" data-toggle='modal' data-tipo="consumible" data-uid="<?= $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
          </div>
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-consumibles-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbalmacenaltocostoconsumibles">
                <thead>
                  <tr>
                    <th>Neodata</th>
                    <th data-priority="1">Código</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th data-priority="2">Descripción</th>
                    <th>Unidad</th>
                    <th title="Categoría">Categoría</th>
                    <th data-priority="3">Existencias</th>
                    <th>Estatus</th>
                    <th>Estado</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
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
                    <th>Unidad</th>
                    <th title="Categoría">Categoría</th>
                    <th>Existencias</th>
                    <th>Estatus</th>
                    <th>Estado</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
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
        <!---->
        <div class="card">
          <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Traspasos</h4>
          </div>
          <div class="card-body">

            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link btn active" data-toggle="pill" href="#entradasTab" role="tab" aria-selected="true">
                  Entradas
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn" data-toggle="pill" href="#traspasosTab" role="tab" aria-selected="true">Traspasos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn" data-toggle="pill" href="#entradasTraspasosTab" role="tab" aria-selected="true">Entradas Traspasos</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="entradasTab">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
                </div>       
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
                        <th>Almacen</th>
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
                        <th>Almacen</th>
                        <th>Tipo Entrada</th>                         
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
              </div>
              <div class="tab-pane fade" id="traspasosTab">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
                </div>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbtraspasosalmacencli">
                    <thead>
                      <tr>
                        <th>Uid</th>       
                        <th>Folio</th>         
                        <!--<th>Almacen</th>-->
                        <th>Fecha</th>
                        <th>Personal que aprobó</th>
                        <th>Proyecto</th>
                        <th>Almacen</th>                            
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
                        <th>Almacen</th>                            
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
              </div>
              <div class="tab-pane fade" id="entradasTraspasosTab">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
                </div>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbentradatraspasoalmacencli">
                    <thead>
                      <tr>
                        <th>Uid</th>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Personal que solicitó</th>
                        <th>Personal que aprobó</th>
                        <th>Tipo Entrada</th>
                        <th>Almacén Origen</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Uid</th>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Personal que solicitó</th>
                        <th>Personal que aprobó</th>
                        <th>Tipo Entrada</th>
                        <th>Almacén Origen</th>
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
        <!---->
      </div>
      <!-- end col-->
    </div>

  </div>
</section>

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

<div id="subir_archivo" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'almacen/archivo-alto-costo', 'id="form-subir-archivo"') ?>
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
          <input type="hidden" name="idalmacen">                    
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
              <label name="lblestatus">Estatus</label>
              <select name="estatus" id="estatus" class="form-control alto-costo" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="almacen">Almacen</option>
                <option value="robado">Robado</option>                
                <option value="asignado">Asignado</option>
                <option value="dañado">Dañado</option>
                <option value="abuso de confianza">abuso de confianza</option>
                <option value="baja">Baja</option>
                <option value="justificacion">Justificación</option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <label>Existencias</label>
              <input type="number" placeholder="0" name="existencias" min="0" class="form-control">
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label name="estado">Estado</label>
              <select name="estado_consumible" id="estado_consumible" class="form-control" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="nuevo">Nuevo</option>
                <option value="usado">Usado</option>                
              </select>
            </div>
          </div>
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
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Gabeta</label>
              <input type="text" placeholder="Gabeta" name="gabeta" class="form-control">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Parte</label>
              <select name="parte" class="form-control">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>                
                  <option value="delantera">Delantera</option>
                  <option value="trasera">Trasera</option>
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

<script>
  $('#subir_archivo').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);    
  })
</script>

<script>
  $('#editar_producto').on('show.bs.modal', function(event) {
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
    modal.find("select[name='estado_consumible']").val(recipient.estado);
    modal.find("input[name='gabeta']").val(recipient.gabeta);
    modal.find("select[name='parte']").val(recipient.parte);
    

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
</script>
<script>
  $(document).ready(function(){
    selectBuscar = "";
    mostrarDatos("",1,"");

    mostrarDatos2("",1);

    mostrarDatos3("",1,"'traspaso-almacen'");
    mostrarDatos3("",1,"'entrada','entrada-almacen'");

    mostrarDatosEntradaTraspaso("", 1);

    $("select[name='selectAC']").on('change', function() {
      //selectBuscar = $("select[name='selectAC']").val();
      selectBuscar = $(this).val();
      mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1,selectBuscar);
    });

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });

    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1,"'traspaso-almacen'");
    });

    $("input[name='busqueda4']").keyup(function() {
      textoBuscar = $("input[name='busqueda4']").val();
      mostrarDatos3(textoBuscar,1,"'entrada','entrada-almacen'");
    });

    $("input[name='busqueda5']").keyup(function() {
        textoBuscar = $("input[name='busqueda5']").val();
        mostrarDatosEntradaTraspaso(textoBuscar, 1);
    });

    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref,selectBuscar); 
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
      mostrarDatos3(valorBuscar,valorHref,"'traspaso-almacen'"); 
    });

    $("body").on("click",".paginacion4 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda4']").val();
      mostrarDatos3(valorBuscar,valorHref,"'entrada','entrada-almacen'"); 
    });

    $("body").on("click", ".paginacion5 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda5']").val();
        mostrarDatosEntradaTraspaso(valorBuscar, valorHref);
    });

  });
  function mostrarDatos(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenAltoCosto",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,selectAC:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenAltoCosto,function(key,item) {
          
          filas += "<tr class='" + (item.estatus == 'robado' ? 'table-danger' : '') + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td>" + item.numero_serie + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if(item.precio_max != null){
            if (item.tipo_moneda == 'd') {
              var precio = parseFloat(item.precio_max) * <?= $precio_dolar ?>;
            }else{
              var precio = item.precio_max;
            }
          }else{
            if (item.tipo_moneda == 'd') {
              var precio = parseFloat(item.precio) * <?= $precio_dolar ?>;
            }else{
              var precio = item.precio;
            }
          }
          filas += "<td>$" + parseFloat(precio).toFixed(2) + "</td>";
          filas += "<td>";
          filas += "<a href='" + "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
          <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-estado='" + item.estado + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
          if(item.estatus == 'asignado'){
            if(urlExists("<?= base_url()?>uploads/" + item.uid_usuario + "/asignaciones/" + item.uid_movimiento + "/contrato.pdf")){
              filas += "<a href='" + "<?= base_url()?>uploads/" + item.uid_usuario + "/asignaciones/" + item.uid_movimiento + "/contrato.pdf" + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-file-pdf-o'></i></a>";            
            }else{
              filas += "<a href='" + "<?= base_url()?>uploads/" + item.uid_usuario + "/asignaciones/" + item.uid_movimiento + "/responsiva.pdf" + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-file-pdf-o'></i></a>";            
            }                                  
          }else if(item.estatus == 'justificacion' || item.estatus == 'dañado' || item.estatus == 'robado' || item.estatus == 'abuso de confianza' || item.estatus == 'vendida'){
            if(item.archivo == 1){
              filas += "<a href='" + "<?= base_url()?>uploads/" + "herramientas/" + item.iddtl_almacen + ".pdf" + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-clone'></i></a>";
            }else{
              filas += "<a href='#subir_archivo' data-toggle='modal' title='Subir Archivo' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-upload'></i></a>";
            }
          }
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenaltocosto tbody').html(filas);
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
        $(".paginacion").html(paginador);
      }
    });
  }

  function urlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
}

  function mostrarDatos2(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenAltoCostoConsumibles",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenAltoCostoConsumibles,function(key,item) {
          filas += "<tr>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
          filas += "<td>" + item.existencias + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          filas += "<td>" + item.estado + "</td>";
          if(item.precio_max != null){
            if (item.tipo_moneda == 'd') {
              var precio = item.precio_max * <?= $precio_dolar ?>;
            }else{
              var precio = item.precio_max;
            }
          }else{
            if (item.tipo_moneda == 'd') {
              var precio = item.precio * <?= $precio_dolar ?>;
            }else{
              var precio = item.precio;
            }
          }
          filas += "<td>$" + parseFloat(precio).toFixed(2) + "</td>";
          filas += "<td>$" + parseFloat((precio * item.existencias)).toFixed(2) + "</td>";
          filas += "<td>";
          <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-estado='" + item.estado + "' data-gabeta='" + item.gabeta + "' data-parte='" + item.parte + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenaltocostoconsumibles tbody').html(filas);
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

  function mostrarDatos3(valorBuscar,pagina,tipo) {
    var uid_almacen = '25839864557600771';
    //var tipo = "'traspaso-almacen'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.reportes,function(key,item) {          
          if (item['tipo_movimiento'] == 'traspaso') {
                    movimiento = 'Traspaso';
                    color = 'red';
                } else {
                    movimiento = 'Entrada';
                    color = 'blue';
                }       
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
          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>TP-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['nombre'] + "</td>";
          if(tipo=="'entrada','entrada-almacen'"){
            filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
            filas += "<td>" + item['almacen'] + "</td>";
          }else{
            filas += "<td>" + item['numero_proyecto_destino'] + ' - ' + item['nombre_proyecto_destino'] + "</td>";
            filas += "<td>" + item['almacen_destino'] + "</td>";
          }
          filas += "<td style='color: " + color + "'>" + movimiento + "</td>";                        
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          filas += "</tr>";
        });
        var table = "tbtraspasosalmacencli";
        var pagination = "paginacion3";
        if(tipo=="'entrada','entrada-almacen'"){
          table = "tbentradasalmacencli";
          pagination = "paginacion4";
        }
        $('#' + table + ' tbody').html(filas);
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
        $("."+pagination).html(paginador);
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
            $(".paginacion5").html(paginador);
        }
    });
}
</script>