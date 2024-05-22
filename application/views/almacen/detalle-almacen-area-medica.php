<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">
      <?php if (isset($this->session->userdata('permisos')['almacen_area_medica']) && $this->session->userdata('permisos')['almacen_area_medica'] > 2) : ?>
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
    <?php endif ?>
    <!-- Item -->
    <div class="col-xl-3 col-sm-6">
      <div class="bg-white has-shadow">
        <a href="<?php echo base_url() ?>almacen/asignaciones">
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
<section>
<div class="container-fluid">
<div class="row">
  <div class="col">
    
    <!---->
    <div class="card">
      <div class="card-header">
        <h4><?php echo $almacen->almacen ?> / Consumibles</h4>
      </div>
      <div class="card-body">
        <div class="card-title">
          <h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
          <!--<a href="<?php echo base_url().'almacen/nuevo-traspaso/'.$almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-random"></i> Traspaso</a>-->
        </div>
        <div class="table-responsive">
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
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade" id="pills-entrada" role="tabpanel" aria-labelledby="pills-entrada-tab">
                <!---->
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busquedacli2">
                </div>
                <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-entradas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbentradasalmacencli">
                    <thead>
                      <tr>
                        <th>Uid</th>
                        <th>Folio</th>
                        <!--<th>Almacen</th>-->
                        <th>Fecha</th>
                        <th>Personal que aprobó</th>
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
                  <div class="paginacioncli2">
                  </div>
                </div>
                <!---->
              </div>
              <div class="tab-pane fade" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                <!---->
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busquedacli3">
                </div>
                <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-salidas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
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
                  <div class="paginacioncli3">
                  </div>
                </div>
                <!---->
              </div>
              <div class="tab-pane fade show active" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
                <!---->
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                </div>
                <center>
                <?php if ($this->session->userdata('id') == 36) { ?>
                <a href="<?php echo base_url().'almacen/nueva-entrada-almacen-cliente/'.$almacen->uid ?>"
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
                onclick="window.location.href='<?php echo base_url() ?>almacen/excel-consumibles-area-medica'"
                class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0"
                aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar
                a Excel</span></button>
                <?php if (isset($this->session->userdata('permisos')['almacen_area_medica']) && $this->session->userdata('permisos')['almacen_area_medica'] > 2) : ?>
                <a href="<?php echo base_url() . 'almacen/nueva-entrada-area-medica/' . $almacen->uid ?>" class="btn btn-outline-primary"><i class="fa fa-cart-plus"></i> Entrada</a>
                <?php endif ?>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbalmacenareamedicaconsumibles">
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
                <!---->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!---->
      
      <!---->
    </div>
    <!-- end col-->
  </div>
</div>
</section>
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
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);

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
    mostrarDatos("",1);

    mostrarDatos2("",1);

    mostrarDatos3("",1);

    mostrarDatosCLI2("", 1);

    mostrarDatosCLI3("", 1);
    
    //mostrarDatos10("", 1, "");

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });

    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1);
    });

    $("input[name='busquedacli2']").keyup(function() {
        textoBuscar = $("input[name='busquedacli2']").val();
        mostrarDatosCLI2(textoBuscar, 1);
    });

    $("input[name='busquedacli3']").keyup(function() {
        textoBuscar = $("input[name='busquedacli3']").val();
        mostrarDatosCLI3(textoBuscar, 1);
    });

    $("input[name='busqueda10']").keyup(function() {
        textoBuscar = $("input[name='busqueda10']").val();
        textoBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(textoBuscar, 1, textoBuscar2);
    });

    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
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
    $("body").on("click", ".paginacioncli2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedacli2']").val();
        mostrarDatosCLI2(valorBuscar, valorHref);
    });
    $("body").on("click", ".paginacioncli3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedacli3']").val();
        mostrarDatosCLI3(valorBuscar, valorHref);
    });

    $("body").on("click", ".paginacion10 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda10']").val();
        valorBuscar2 = $("select[name='selectHigiene']").val();
        mostrarDatos10(valorBuscar, valorHref, valorBuscar2);
    });

  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarAlmacenAreaMedica",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenAreaMedica,function(key,item) {
          
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
          if (item.tipo_moneda == 'd') {
            item.precio = item.precio * <?= $precio_dolar ?> ;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>";
          filas += "<a href='" + "<?= base_url()?>almacen/detalle-producto/" + item.iddtl_almacen + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-info-circle'></i></a>";
          <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenareamedica tbody').html(filas);
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
      url: "<?= base_url() ?>Almacen/mostrarAlmacenAreaMedicaConsumibles",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        
        $.each(response.almacenAreaMedicaConsumibles,function(key,item) {
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
          if (item.tipo_moneda == 'd') {
            item.precio = item.precio * <?= $precio_dolar ?>;
          }
          filas += "<td>$" + item.precio + "</td>";
          filas += "<td>$" + (item.precio * item.existencias) + "</td>";
          filas += "<td>";
          <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo'] == 3) : ?>
          filas += "<a href='#editar_producto' data-toggle='modal' title='Editar' data-serie='" + item.numero_serie + "' data-interno='" + item.numero_interno + "' data-nota='" + item.nota + "' data-estatus='" + item.estatus + "' data-existencias='" + item.existencias + "' data-rack='" + item.rack + "' data-nivel='" + item.nivel + "' data-abreviatura='" + item.abreviatura + "' data-idalmacen='" + item.iddtl_almacen + "'><i class='fa fa-edit'></i></a>";
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenareamedicaconsumibles tbody').html(filas);
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
    var uid_almacen = '25839864557600771';
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
        $(".paginacion3").html(paginador);
      }
    });
  }

  function mostrarDatosCLI2(valorBuscar, pagina) {
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
            console.log(response);
            filas = "";
            clase = "";
            $.each(response.reportes, function(key, item) {
                if (item['tipo_movimiento'] == 'traspaso') {
                    movimiento = 'Traspaso';
                    color = 'red';
                } else {
                    movimiento = 'Entrada';
                    color = 'blue';
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
                        clase = 'table-info';
                    } else {
                        clase = 'table-success';
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
                //filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
                //filas += "<td>" + item['tipo_documento'] + "</td>";
                filas += "<td>" + item['tipo_documento'] + "</td>";
                filas += "<td style='color: " + color + "'>" + movimiento + "</td>";
                filas += "<td>" + item['numero_documento'] + "</td>";          
                filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" +
                    item['idtbl_almacen_movimientos'] + "' title='Detalles'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
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
            $(".paginacioncli2").html(paginador);
        }
    });
  }
  function mostrarDatosCLI3(valorBuscar, pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'salida-almacen', 'asignacion'";
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
            console.log(response);
            filas = "";
            $.each(response.reportes, function(key, item) {
                filas += "<tr>";
                filas += "<td>" + item['uid'] + "</td>";
                filas += "<td>SA-" + item['folio'] + "</td>";
                filas += "<td>" + item['fecha'] + "</td>";
                filas += "<td>" + item['nombre'] + "</td>";
                filas += "<td>" + item['recibe'] + ' ' + item['paternorecibe'] + ' ' + item[
                    'maternorecibe'] + "</td>";
                filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] +
                    "</td>";
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
            $(".paginacioncli3").html(paginador);
        }
    });
  }
</script>