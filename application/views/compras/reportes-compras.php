<section class="forms reportes-almacen">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Reportes Compras</h3>
      </div>
      <div class="card-body">
        <!--<button id="tipocambio">Tipo de Cambio</button>-->
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
            <a class="nav-link btn active" id="pills-home-tab" data-toggle="pill" href="#pills-pedidos1" role="tab" aria-controls="pills-pedidos" aria-selected="false">
              Pedidos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-pedidos-tab" data-toggle="pill" href="#pills-pedidos" role="tab" aria-controls="pills-pedidos" aria-selected="false">
              Entradas Pedidos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-solicitudes-tab" data-toggle="pill" href="#pills-solicitudes" role="tab" aria-controls="pills-pedidos" aria-selected="false">
              Solicitudes
            </a>
          </li>
        </ul>
        <div class="tab-content" id="tabsContent">
          <div class="tab-pane fade active show" id="pills-pedidos1" role="tabpanel" aria-labelledby="pills-pedidos-tab">
            <?= form_open('compras/reportes_pedidos', 'class="needs-validation" novalidate id="formpersonal"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Tipo</label>
                  <select name="tipoSolicitud" id="selectTipoSolicitud" class="selectpicker" data-parent="pills-pedidos">
                    <option value="estandar" selected="selected">Estandar</option>
                    <option value="estimacion">Estimación</option>
                    <option value="virtuales">Virtuales</option>
                    <option value="pagos">Pagos</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Proyecto</label>
                  <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" data-parent="pills-pedidos" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,50) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4 divContratista">
                  <label>Proveedores</label>
                  <select name="proveedor" id="proveedor2" class="selectpicker" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php if ($proveedores): ?>
                    <?php foreach ($proveedores as $key => $value): ?>
                      <option value="<?=$value->idtbl_proveedores?>"><?= substr($value->nombre_fiscal, 0, 35) ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-row"> 
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Producto</label>
                  <select name="productoo" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,50).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Fecha Inicio</label>
                  <input type="date" name="fecha_inicio" class="form-control" value="">
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Fecha Final</label>
                  <input type="date" name="fecha_final" class="form-control" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Proyecto') ?>
                  <button id="btnLimpiar" class="btn btn-danger" data-id="pills-pedidos1">Borrar</button>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-pedidos" role="tabpanel" aria-labelledby="pills-pedidos-tab">
            <?= form_open('almacen/reporte_excel', 'class="needs-validation" novalidate id="formalmacenes"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-4">
                  <label class="form-check-label">Tipo*</label>
                  <select name="estatus" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="pendientes">Pendientes</option>
                    <option value="progreso">Progresos</option>
                    <option value="finalizado">Finalizados</option>
                    <option value="cancelado">Cancelados</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4">
                  <label class="form-check-label">Almacén*</label>
                  <select name="almacen_reporte" class="form-control">
                    <option value="" selected>Seleccione...</option>
                    <?php foreach ($almacenes_pedidos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_almacenes ?>">
                        <?php echo $value->almacen ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Proyecto</label>
                  <select name="proyecto" id="selectProyecto" class="selectpicker" data-parent="pills-pedidos" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,50) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-6">
                  <label class="form-check-label">Fecha Inicial</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fecha" max="<?= date('Y-m-d'); ?>">
                </div>
                <div class="colxs-12 col-md-6">
                  <label class="form-check-label">Fecha Final</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_final" id="fecha_final_fecha" min="" max="<?= date('Y-m-d'); ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>                  
                  <?= form_hidden('tipo_de_reporte','pedidos') ?>
                  <?= form_hidden('tipo_reporte','pedidos_reporte') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-solicitudes" role="tabpanel" aria-labelledby="pills-solicitudes-tab">
            <?= form_open('compras/reportes_pedidos', 'class="needs-validation" novalidate id="formalmacenes"'); ?>
              <div class="form-row">
              <div class="col-xs-12 col-md-4">
                  <label class="form-check-label">Tipo*</label>
                  <select name="gestion" id="gestion" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="solicitudes">Solicitudes</option>
                    <option value="pedidos">Pedidos</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4">
                  <label class="form-check-label">Tipo de reporte*</label>
                  <select name="tipo_solicitudes" id="tipo_solicitudes" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="general">General</option>
                    <option value="almacen">Almacén</option>
                    <option value="producto" id="optionproducto">Productos</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4" style="display: none;" id="almacen_solicitudes">
                  <label class="form-check-label">Almacén*</label>
                  <select name="almacen_reporte" id="select_almacen_solicitudes" class="form-control">
                    <option value="" disabled selected>Seleccione...</option>
                    <?php foreach ($almacenes_pedidos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_almacenes ?>">
                        <?php echo $value->almacen ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Año</label>
                  <select name="anio" class="form-control" data-parent="pills-pedidos">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php for ($i=2018; $i<=date('Y'); $i++): ?>
                      <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4" style="display: none;" id="estatus_solicitudes">
                  <label class="form-check-label">Estatus</label>
                  <select name="estatus_solicitud" class="form-control">
                    <option value="" selected="selected">Seleccione...</option>
                    <option value="aprobada">Aprobadas</option>
                    <option value="cancelada">Canceladas</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4" style="display: none;" id="proyecto_solicitudes">
                  <label class="form-check-label">Proyecto</label>
                  <select name="proyecto" id="selectProyecto_solicitudes" class="selectpicker" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,50) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>                  
                  <?= form_hidden('tipo_de_reporte','solicitudes') ?>
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
  $(document).on("click", "#btnLimpiar", function(event){
    event.preventDefault();
    var parentElement = $("#" + $(this).data("id"));
    parentElement.find(".selectpicker").val("").selectpicker("refresh");
    var date = parentElement.find(".date");
    date.attr('min', "");
    date.val("");
  });
  $(document).on('change', '.fecha_inicio', function (event) {
    var _this = $(this);
    $('#'+_this.data("id")).attr('min', _this.val());
  });
  $(document).on('change', '#gestion', function (event) {
    var _this = $(this);
    if(_this.val() == 'pedidos'){
      $('#proyecto_solicitudes').show(1000);
      $('#estatus_solicitudes').hide(1000);
      $('#optionproducto').prop('disabled', true);
    }else{
      $('#proyecto_solicitudes').hide(1000);
      $('#estatus_solicitudes').show(1000);
      $('#optionproducto').prop('disabled', false);

    }
  });
  $(document).on('change', '#tipo_solicitudes', function (event) {
    var _this = $(this);
    if(_this.val() == 'almacen'){
      $('#almacen_solicitudes').show(1000);
      $('#select_almacen_solicitudes').prop('required', true);
    }else{
      $('#almacen_solicitudes').hide(1000);
      $('#select_almacen_solicitudes').prop('required', false);

    }
  });
  $(document).on('change', 'select.proyecto', function (event) {
    event.preventDefault();
    var _this=$(this);
    var parent = _this.data("parent");
    $("#"+parent+" select.segmento").find('option').remove().end().append('<option value="" selected="selected">Seleccione...</option>');
    $("#"+parent+" select.segmento").selectpicker('refresh');
    if ('todos' !== $("#"+parent+" select.proyecto").val()) {
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSegmento',
        data:'id=' + $("#"+parent+" select.proyecto").val(),
        beforeSend: function() {
          _this.closest('.card-body').addClass('load');
        },
        success:function(r) {  
          var registros = eval(r);
          if(registros.length == 0) {
            let direccion = $("#"+parent+" select.proyecto").find(':selected').data('direccion');
            direccion = direccion.substring(0, 65);
            $("#"+parent+" select.segmento").append($('<option>', { 
              value : '',
              text : direccion
            }));
            $("#"+parent+" select.segmento").selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let segmento = registros[i]['segmento'];
            segmento = segmento.substring(0, 605);
            $("#"+parent+" select.segmento").append($('<option>', { 
              value: registros[i]['idtbl_segmentos_proyecto'],
              text : segmento
            }));
          
          }
          $("#"+parent+" select.segmento").selectpicker('refresh');
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
  $(document).on('change','select.tipoSolicitud', function(){
    var value = $(this).val();
    var parent = $(this).data("parent");
    var divContratista = $("#"+parent+" .divContratista")
    if(value=="estandar"){
      divContratista.hide('slow');
    }else{
      divContratista.show('slow');    }
  });
  $(document).on("click", "#tipocambio", function(){
    console.log("Click");
    $.ajax({
      url: 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/2020-04-01/2020-12-14?mediaType=json&token=d8ca6837fc6654742ab58ce244abe03af703031d56eb1a1fe18201bc7602c760',
      type: 'GET',
      success : function(dataa) {
        console.log("Exito banxico");
        tipoCambio(dataa.bmx.series[0].datos);
      },
      error : function(data) {
        console.log("Error");
      }
    });
  });
  function tipoCambio(data){
    $.ajax({
      url: base_url+'compras/tipoCambio',
      type: 'POST',
      data: {key : JSON.stringify(data)},
      success : function(data1) {
        console.log(data1);
      },
      error : function(data) {
        console.log("Error1");
      }
    });
  }
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