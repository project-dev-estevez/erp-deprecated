<?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] > 1) : ?>
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
            <h4><?php echo $almacen->almacen ?> / Equipo de Cómputo</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
              
              <a href="<?php echo base_url() . 'almacen/nueva-entrada-sistemas/' . $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
              
              <a href="<?php echo base_url().'almacen/nuevo-traspaso/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>
            </div>
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel_inventario_sistemasEC'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>      
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
                    <th>Usuario</th>
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
                        <option value="asignado">Asignado</option>
                        <option value="dañado">Dañado</option>
                        <option value="descompuesto">Descompuesto</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="vendida">Vendida</option>
                      </select>
                    </th>
                    <th>Usuario</th>
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
            <h4><?php echo $almacen->almacen ?> / Herramienta</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel_herramientas_sistemas'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>     
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbAlmacenSistemasHerramienta">
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
                      <select name="selectACH" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="almacen">Almacen</option>
                        <option value="asignado">Asignado</option>
                        <option value="descompuesto">Descompuesto</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="obsolescencia">Obsolescencia</option>
                        <option value="baja">Baja</option>
                        <option value="vendida">Vendida</option>
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
              <div class="paginacion3">

              </div>
            </div>
            <br><br>
          </div>
          </div>
        </div>
        <!---->
        <!---->
        <div class="card">
          <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Consumibles</h4>
          </div>
          <div class="card-body">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>Sistemas/excel_consumibles_sistemas'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>      
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

        <div class="card">
          <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Líneas Telefónicas</h4>
          </div>
          <div class="card-body">
            <div class="float-right">            
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel_lineas'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbalmacenaltocostotelefonos">
                <thead>
                  <tr>
                  <th>Neodata</th> 
                  <th>Código</th>
                  <!--th>SIM</th-->
                  <!--th>Compañía</th--> 
                  <th>Teléfono</th>
                    <!--th>Existencias</th--> 
                    <th>Estatus</th>                    
                    <th>Descripción</th>   
                    <th>Precio Unitario</th>                 
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Neodata</th>
                    <th>Código</th>
                    <!--th>SIM</th>
                    <th>Compañía</th-->
                    <th>Teléfono</th>
                    <!--th>Existencias</th--> 
                    <th>Estatus</th>                    
                    <th>Descripción</th> 
                    <th>Precio Unitario</th>                   
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
        </div>
      </div>      
      <!-- end col-->
    </div>

  </div>
</section>
<div>
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
              <input type="text" placeholder="Número de Serie" name="numero_serie" class="form-control alto-costo" minlength="1" required>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Número Interno</label>
              <input type="text" placeholder="Número Interno" name="numero_interno" class="form-control alto-costo" minlength="1" required>
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
                <option value="baja">Baja</option>
                <option value="robado">Robado</option>
                <option value="descompuesto">Descompuesto</option>
                <option value="vendido">Vendido</option>
                <option value="abuso de confianza">Abuso de Confianza</option>
                <option value="asignado">Asignado</option>
                <option value="obsolescencia">Obsolescencia</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Precio</label>
              <input type="number" placeholder="0" name="precio" min="0" class="form-control">
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Marca</label>
              <input type="text" placeholder="Marca" name="marca" class="form-control">
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Modelo</label>
              <input type="text" placeholder="Modelo" name="modelo" class="form-control">
            </div>
          </div>

          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Existencias</label>
              <input type="number" placeholder="0" name="existencias" min="0" class="form-control" readonly>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Estado</label>
              <select name="estado_consumible" id="estado_consumible" class="form-control alto-costo" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="nuevo">Nuevo</option>
                <option value="usado">Usado</option>
                <option value="rayado">Rayado</option>
                <option value="fracturado">Fracturado</option>
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
</div>
<div id="editar_linea" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
    <?= form_open(base_url() . 'almacen/actualizar_linea_almacen') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar Línea</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row"> 
        <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>SIM</label>
              <input type="text" placeholder="Número Interno" name="numero_serie" class="form-control alto-costo" minlength="1" required>
            </div>
          </div>         
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Teléfono</label>
              <input type="text" placeholder="Número Interno" name="numero_interno" class="form-control alto-costo" minlength="1" required>
            </div>
          </div>             
          <div class="col-12">
            <div class="form-group">
              <label>Nota</label>
              <textarea placeholder="Descripción" name="nota" class="form-control" minlength="4"></textarea>
            </div>
          </div>      
          <div class="col-12 col-lg-6">
          <div class="form-group">
            <label>Celular</label>
            <select name="celulares" id="celulares" class="form-control alto-costo">
              <option value="">Seleccione...</option>
              <!--option value="">Sin asignacion</option-->
                <?php foreach($celulares AS $key => $value){ ?>                
                <option value="<?= $value->iddtl_almacen ?>"
                data-direccion="<?php echo $value->iddtl_almacen ?>"><?= $value->numero_interno?>-<?= $value->descripcion?></option>                
                <?php } ?>
            </select>
          </div>
          </div>                     
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Marca</label>
              <input type="text" placeholder="Marca" name="marca" class="form-control" readonly>
            </div>
          </div>                                                            
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Existencias</label>
              <input type="number" placeholder="0" name="existencias" min="0" class="form-control" readonly>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label name="llestatus">Estatus</label>              
                <select name="estatus" id="estatus" class="form-control alto-costo" onchange='actualizarEstatus()'>
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <option value="almacen">Almacen</option>
                  <option value="robado">Robado</option>
                  <option value="descompuesto">Descompuesto</option>
                  <option value="vendido">Vendido</option>
                  <option value="abuso de confianza">Abuso de Confianza</option>
                  <option id="asignado" value="asignado">Asignado</option>
                </select>            
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
    modal.find("select[name='estado_consumible']").val(recipient.estado);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);
    modal.find("input[name='precio']").val(recipient.precioalmacen);
    modal.find("input[name='modelo']").val(recipient.modelo);
    modal.find("input[name='marca']").val(recipient.marca);



    if (recipient.estatus == 'asignado'){
    modal.find("#estatus option[value='almacen']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='robado']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='descompuesto']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='vendido']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='abuso de confianza']").attr('disabled', 'disabled')
    }else{
    modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')
    }
    
    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
      modal.find("input[name='existencias']").attr('readonly', 'readonly')


    //if (recipient.abreviatura == 'HR') {
      //modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
      //modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
      //modal.find("textarea[name='nota']").attr('disabled', 'disabled')
      //modal.find("select[name='estatus']").hide()
      //modal.find("label[name='lblestatus']").hide()
    //}

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
  $('#editar_linea').on('show.bs.modal', function(event) {
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
    modal.find("input[name='marca']").val(recipient.marca);  
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='celulares']").val(recipient.celulares);    
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);     
        
                            
/*
    if (recipient.estatus == 'asignado'){
      modal.find("#estatus option[value='almacen']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='robado']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='descompuesto']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='vendido']").attr('disabled', 'disabled')
    modal.find("#estatus option[value='abuso de confianza']").attr('disabled', 'disabled')
    }else{
    modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')
    }
    
    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
      modal.find("input[name='existencias']").attr('readonly', 'readonly')


    if (recipient.abreviatura == 'HR') {
      //modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
      //modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
      //modal.find("textarea[name='nota']").attr('disabled', 'disabled')
      modal.find("select[name='estatus']").hide()
      modal.find("label[name='lblestatus']").hide()
    }
    */

  })

  $('#editar_linea').on('hide.bs.modal', function(event) {
    var modal = $(this);
    modal.find("input[name='numero_serie']").removeAttr('disabled');
    modal.find("input[name='numero_interno']").removeAttr('disabled');
    modal.find("textarea[name='nota']").removeAttr('disabled');
    modal.find("select[name='estatus']").removeAttr('disabled');
    modal.find("select[name='marca']").removeAttr('disabled');
    modal.find("select[name='celulares']").removeAttr('disabled');  
    modal.find("input[name='existencias']").removeAttr('disabled');        
  })
</script>
<script>
  $(document).ready(function(){
    selectBuscar = "";
    mostrarDatos("",1,"");

    mostrarDatos2("",1);

    mostrarDatosTelefonos("",1);

    mostrarDatos3("",1,"");

    $("select[name='selectAC']").on('change', function() {
      //selectBuscar = $("select[name='selectAC']").val();
      selectBuscar = $(this).val();
      mostrarDatos('', 1, selectBuscar);
    });

    $("select[name='selectACH']").on('change', function() {
      //selectBuscar = $("select[name='selectAC']").val();
      selectBuscar = $(this).val();
      mostrarDatos3('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1,selectBuscar);
    });

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });

    $("input[name='busqueda4']").keyup(function() {
      textoBuscar = $("input[name='busqueda4']").val();
      mostrarDatosTelefonos(textoBuscar,1);
    });

    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1);
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

    $("body").on("click",".paginacion4 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda4']").val();
      mostrarDatosTelefonos(valorBuscar,valorHref); 
    });
    

    $("body").on("click",".paginacion3 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(valorBuscar,valorHref); 
    });

  });
  function mostrarDatos(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenSistemasEC",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,selectAC:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenSistemas,function(key,item) {

          if(item.nombres != null && item.estatus_asignacion != 'finalizada'){
          var personal = item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno;
          }else{
            var personal = 'Sin asignación';
          }
          
          filas += "<tr class='" + (item.estatus == 'robado' ? 'table-danger' : '') + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.marca_almacen + "</td>";
          filas += "<td>" + item.modelolo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td>" + item.numero_serie + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
          filas += "<td>" + item.estatus + "</td>";        
          filas += "<td>" + personal + "</td>";
          if (item.tipo_moneda == 'd') {
            item.precio = item.precio * <?= $precio_dolar ?> ;
          }
          filas += "<td>$" + item.precio_almacen + "</td>";
          filas += "<td>";
          filas += "<a href='" + "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
          <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] == 3) : ?>          
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-modelo='" + item.modelolo + "' data-marca='" + item.marcaal + "' data-interno='" + item.numero_interno + "' data-precioalmacen='" + item.precio_almacen + "' data-nota='" + item.nota + "' data-estado='" + item.estado + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
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

  function mostrarDatos2(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenSistemasConsumibles",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenSistemasConsumibles,function(key,item) {
          filas += "<tr>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.marca_almacen + "</td>";
          filas += "<td>" + item.modelolo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td title='" + item.unidad_medida + "'>" + item.unidad_medida_abr + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
          filas += "<td>" + item.existencias + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if (item.tipo_moneda == 'd') {
            item.precio = item.precio * <?= $precio_dolar ?>;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>$" + (item.precio * item.existencias) + "</td>";
          filas += "<td>";
          <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
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

  function mostrarDatosTelefonos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenSistemasTelefonos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.telefonos,function(key,item) {
          filas += "<tr>";          
          filas += "<td>" + item.neodata + "</td>";          
          filas += "<td>" + item.uid + "</td>";          
          //filas += "<td>" + item.SIM + "</td>";
          //filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.Telefono + "</td>";
          //filas += "<td>" + item.existencias + "</td>";                    
          filas += "<td>" + item.estatus + "</td>";                    
          filas += "<td>" + item.descripcion + "</td>"; 
          filas += "<td>$" + item.precio + "</td>";                   
          filas += "<td>";
          <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] == 3) : ?>          
          filas += "<a href='#editar_linea' data-toggle='modal' title='Editar' data-interno='" + item.Telefono + "' data-serie='" + item.SIM + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-marca='" + item.marca + "' data-existencias='" + item.existenas + "' data-idalmacen='" + item.iddtl_almacen + "' data-celulares='" + item.dtl_almacen_iddtl_almacen +"'><i class='fa fa-edit'></i></a>"; //ruth
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenaltocostotelefonos tbody').html(filas);
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

  function mostrarDatos3(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/inventarioAlmacenSistemasHerramienta",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,selectAC:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenSistemasHerramienta,function(key,item) {
          
          filas += "<tr class='" + (item.estatus == 'robado' ? 'table-danger' : '') + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.marca_almacen + "</td>";
          filas += "<td>" + item.modelolo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td>" + item.numero_serie + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td title='" + item.categoria + "'>" + item.abreviatura + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          if (item.tipo_moneda == 'd') {
            item.precio = item.precio * <?= $precio_dolar ?> ;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>";
          filas += "<a href='" + "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
          <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estado='" + item.estado + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbAlmacenSistemasHerramienta tbody').html(filas);
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

</script>
<!--script>
  function actualizarEstatus() {
  var celulares = document.getElementById("celulares");
  var estatus = document.getElementById("estatus");
  if (celulares.value !== " " || celulares.value !== NULL) {    
    estatus.value = "asignado";
  }
}

</script-->