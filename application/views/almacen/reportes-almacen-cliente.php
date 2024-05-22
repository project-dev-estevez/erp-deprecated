<section class="forms reportes-almacen">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Reportes de almacén clientes</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <!--<div class="font-weight-bold text-danger" id="errorReportesAG">
          <?= $this->session->flashdata('errorReportesAG'); ?>
        </div>-->
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-home-tab" data-toggle="pill" href="#pills-proyecto" role="tab" aria-controls="pills-proyecto" aria-selected="true">
              Proyecto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-profile-tab" data-toggle="pill" href="#pills-personal" role="tab" aria-controls="pills-personal" aria-selected="false">
              Personal
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#pills-productos" role="tab" aria-controls="pills-productos" aria-selected="true">
              Productos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-profile-tab" data-toggle="pill" href="#pills-fecha" role="tab" aria-controls="pills-fecha" aria-selected="false">
              Fecha
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-profile-tab" data-toggle="pill" href="#pills-almacen" role="tab" aria-controls="pills-almacen" aria-selected="false">
              Almacen
            </a>
          </li>
        </ul>
        <div class="tab-content" id="tabsContent">
          <div class="tab-pane fade active show" id="pills-proyecto" role="tabpanel" aria-labelledby="pills-proyecto-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate  id="formproyecto"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-5 col-lg-4">
                  <label class="form-check-label">Proyecto*</label>
                  <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,70) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Segmento</label>
                  <select name="segmento" id="ssegmento" class="selectpicker segmento" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-4">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <!--<option value="entrada-almacen">Entradas</option>-->
                    <option value="salida-almacen">Salidas</option>
                    <!--<option value="devolucion-almacen">Devoluciones</option>-->
                    <!--<option value="traspaso-almacen">Traspasos</option>-->
                  </select>
                </div>
                <div class="col">
                  <label>Producto*</label>
                  <select name="productoo" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Inicial*</label>
                  <input type="date" class="form-control" name="fecha_inicioo" id="fecha_inicio_fecha" max="<?= date('Y-m-d'); ?>">
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Final*</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_finall" id="fecha_final_fecha" min="" max="<?= date('Y-m-d'); ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Proyecto') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-personal" role="tabpanel" aria-labelledby="pills-personal-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate id="formpersonal"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Tipo Personal</label>
                  <select name="tipo_personal" id="tipo_personal" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="interno">Internos</option>
                    <option value="contratista">Contratistas</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 divContratistas" style="display: none;">
                  <div class="form-group">
                    <label>Contratista*</label>
                    <select name="contratista" id="contratista" class="selectpicker form-control"  data-live-search="true">
                      <option value="" disabled selected>Seleccione...</option>
                    </select>
                    <div class="invalid-feedback">
                      Seleccione al contratista
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 divInternos">
                  <div class="form-group">
                    <label>Personal*</label>
                    <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true" required>
                      <option value="" disabled selected>Seleccione...</option>
                    </select>
                    <div class="invalid-feedback">
                      Seleccione al personal
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <!--<option value="entrada-almacen">Entradas</option>-->
                    <option value="salida-almacen">Salidas</option>
                    <!--<option value="devolucion-almacen">Devoluciones</option>-->
                    <!--<option value="traspaso-almacen">Traspasos</option>-->
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Producto*</label>
                  <select name="productoo" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-sm-12 col-md-4">
                  <label>Fecha Inicial*</label>
                  <input type="date" class="form-control" name="fecha_inicioo" id="fecha_inicio_fecha" max="<?= date('Y-m-d'); ?>">
                </div>
                <div class="col-sm-12 col-md-4">
                  <label>Fecha Final*</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_finall" id="fecha_final_fecha" min="" max="<?= date('Y-m-d'); ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Personal') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-productos" role="tabpanel" aria-labelledby="pills-productos-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate id="formproducto"'); ?>
              <div class="form-row">
                <div class="col">
                  <label>Producto*</label>
                  <select name="producto" id="product" class="selectpicker producto" required data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-3">
                  <div class="form-group">
                    <label>Estatus*</label>
                    <select name="estatus" id="estatuss" class="form-control" data-live-search="true">
                      <option value="" disabled selected>Seleccione...</option>
                      <option value="almacen">Almacen</option>
                      <option value="asignado">Asignado</option>
                      <option value="dañado">Dañado</option>
                      <option value="descompuesto">Descompuesto</option>
                      <option value="robado">Robado</option>
                      <option value="abuso de confianza">abuso de confianza</option>
                      <option value="vendida">Vendida</option>
                    </select>
                  </div>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-4">
                  <label class="form-check-label">Tipo</label>
                  <select name="tipo_reporte" id="tipo_reportee" class="form-control">
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="entrada-almacen">Entradas</option>
                    <option value="salida-almacen">Salidas</option>
                    <!--<option value="devolucion-almacen">Devoluciones</option>-->
                    <option value="traspaso-almacen">Traspasos</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Producto') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-fecha" role="tabpanel" aria-labelledby="pills-fecha-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate id="formfecha"'); ?>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Inicial*</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fecha" max="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Final*</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_final" id="fecha_final_fecha" min="" max="<?= date('Y-m-d'); ?>" required>
                </div>
                <div class="col-xs-12 col-md-4">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="entrada-almacen">Entradas</option>
                    <option value="salida-almacen">Salidas</option>
                    <!--<option value="devolucion-almacen">Devoluciones</option>-->
                    <option value="traspaso-almacen">Traspasos</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Fecha') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-almacen" role="tabpanel" aria-labelledby="pills-almacen-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate id="formalmacenes"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-6">
                  <label class="form-check-label">Almacenes*</label>
                  <select name="almacen" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <?php foreach ($almacenes as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_almacenes ?>">
                        <?php echo $value->almacen; ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-6">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="entrada-almacen">Entradas</option>
                    <option value="salida-almacen">Salidas</option>
                    <!--<option value="devolucion-almacen">Devoluciones</option>-->
                    <option value="traspaso-almacen">Traspasos</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Almacen') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).on('change', '#fecha_inicio_fecha', function (event) {
    var _this = $(this);
    $('#fecha_final_fecha').attr('min', _this.val());
  });
  $(document).on('change', '#estatuss', function (event) {  
    if(this.value == 'asignado'){      
      $('#tipo_reportee').attr('disabled', 'disabled');
    }else{
      $('#tipo_reportee').removeAttr('disabled');
    }
  });
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    var _this=$(this);
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    if ('todos' !== $('#selectProyecto').val()) {
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSegmento',
        data:'id=' + $('#selectProyecto').val(),
        beforeSend: function() {
          _this.closest('.card-body').addClass('load');
        },
        success:function(r) {  
          var registros = eval(r);
          if(registros.length == 0) {
            let direccion = $("#selectProyecto").find(':selected').data('direccion');
            direccion = direccion.substring(0, 65);
            $('#ssegmento').append($('<option>', { 
              value : '',
              text : direccion
            }));
            $('#ssegmento').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let segmento = registros[i]['segmento'];
            segmento = segmento.substring(0, 605);
            $('#ssegmento').append($('<option>', { 
              value: registros[i]['idtbl_segmentos_proyecto'],
              text : segmento
            }));
          
          }
          $('#ssegmento').selectpicker('refresh');
        }
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        _this.closest('.card-body').removeClass('load');
      });
    }
  });
  $(document).on('change', '#tipo_personal', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/tipo-personal',
      type: 'POST',
      dataType: 'json',
      data: {tipo: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        if (_this.val() == 'interno') {
          $.each(data[0].personal_recibe, function (i, item) {
            $('#recibe').append($('<option>', { 
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
            $('#recibe').selectpicker('refresh');
          });
          $('.divContratistas').hide('slow');
        } else {
          $.each(data[0].contratistas, function (i, item) {
            $('#contratista').append($('<option>', { 
              value: item.idtbl_contratistas,
              text : item.nombre_comercial
            }));
          });
          $.each(data[0].supervisores, function (i, item) {
            $('#supervisor').append($('<option>', { 
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          $('#recibe').selectpicker('refresh');
          $('#contratista').selectpicker('refresh');
          $('#supervisor').selectpicker('refresh');
          $('.divContratistas').show('slow');
        }        
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
      _this.closest('.card-body').removeClass('load');
    });
  });
  $(document).on('change', '#contratista', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/personal-contratista',
      type: 'POST',
      dataType: 'json',
      data: {contratista: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        $.each(data[0], function (i, item) {
          $('#recibe').append($('<option>', {
            value: item.idtbl_usuarios,
            text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno
          }));
        });
        $('#recibe').selectpicker('refresh');
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
      _this.closest('.card-body').removeClass('load');
    });
  });
</script>
<script>
  <?php if($this->session->flashdata('errorReportesAG')) { ?>
    Swal.fire(
  'Oops!',
  '<?= $this->session->flashdata('errorReportesAG') ?>',
  'error'
)
  <?php } ?>
</script>