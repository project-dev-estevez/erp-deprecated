<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Solicitud de Peforación</h3>
      </div>
      <div class="card-body">
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
        <div class="form-row">
          <!--<div class="col-3">
            <label for="tipo_solicitud">Tipo*</label>
            <select name="tipo_solicitud" class="selectpicker tipo_solicitud" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <option value="material">Material</option>
              <option value="herramienta">Herramienta</option>
              <option value="equipo">Equipo</option>
              <option value="administrativo">Administrativo</option>
              <option value="consumible">Consumible</option>
              <option value="servicio">Servicio</option>
              <option value="mejora">Mejora</option>
              <option value="refacción">Refacción</option>
            </select>
          </div>-->
          <div class="col">
            <label>Proyecto*</label>
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
          <div class="col">
            <label>Segmento*</label>
            <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
            </select>
          </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col">
            <label>Proveedor*</label>
            <select name="proveedor" id="proveedor" class="selectpicker" required data-live-search="true">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php if ($proveedores): ?>
              <?php foreach ($proveedores as $key => $value): ?>
                <option value="<?=$value->idtbl_proveedores?>"><?= $value->nombre_fiscal ?></option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col-4">
            <label for="fecha-limite">Fecha Limite*</label>
            <input type="date" name="fecha_limite" id="fecha-limite" required class="form-control">
          </div>
          <div class="col-4">
            <label for="contrato">Contrato*</label>
            <input type="text" class="form-control" name="contrato" required>
          </div>
          <div class="col-4">
            <label for="estimacion">Estimación*</label>
            <input type="text" class="form-control" name="estimacion" required>
          </div>
        </div>
        <br>
        <div class="form-row">
          <div class="col">
            <label for="observaciones">Observaciones</label>
            <textarea name="observaciones" id="observaciones" class="form-control" rows="5"></textarea>
          </div>
        </div>
        <hr>
        <div id="item-producto1" class="itemproducto productoFieldset" id="productoFieldset1">
          <div class="form-row">
            <div class="col">
              <!--<label>Producto*</label>
              <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($catalogo as $key => $value): ?>
                <option value="<?php echo $value->idtbl_catalogo ?>"
                  data-precio="<?php echo $value->precio ?>"
                  data-moneda="<?php echo $value->tipo_moneda ?>"
                  data-preciolabel="<?php echo number_format($value->precio,2) . (($value->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>"
                  data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                  data-unidad-medida="<?php echo $value->unidad_medida ?>"
                  data-categoria="<?php echo $value->idctl_categorias ?>">
                  <?php echo $value->neodata.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                </option>
                <?php endforeach ?>
              </select>-->
              <label>Producto*</label>
              <input class="form-control neodata" autocomplete="off" type="text" required>
              <input class="form-control producto" autocomplete="off" type="hidden" name="producto[]" required>
              <div class="list-group sugerencias"></div>
            </div>
            <div class="col">
              <label for="unidad">Unidad</label>
              <input type="text" disabled="true" class="form-control unidad">
            </div>
            <div class="col">
              <label for="cantidad">Cantidad Contrato*</label>
              <input type="number" name="cantidad[]" id="cantidad" min="0" step="0.0001" required class="form-control">
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col">
              <label for="especificaciones">Descripción</label>
              <input type="text" name="" id="" class="form-control descripcion" disabled>
            </div>
          </div>
          <br>
          <div class="form-row">
            <div class="col">
              <label for="especificaciones">Especificaciones</label>
              <textarea name="especificaciones[]" id="especificaciones" class="form-control"
                rows="5"></textarea>
            </div>
          </div>
          <i class="fa fa-close delete-product" style="display:none"></i>
          <hr>
        </div>
        <br><br>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <input type="hidden" name="tipo_solicitud" value="servicio">
            <a href="<?php echo base_url().'compras/'?>"
              class="btn-warning btn">Cancelar</a>
            <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>
            <?= form_hidden('token',$token) ?>
            <button type="submit" class="btn-primary btn">Enviar Solicitud</button>
          </div>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).on('change', '.producto', function (event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
  });
  $('#nuevoProducto').click(function (event) {

    /* Act on the event */
    var $div = $('div[id^="item-producto"]:last');

    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'item-producto' + num);

    $klon.css('display', 'none');

    $div.after($klon);

    $klon.show(500);

    $klon.find('.bootstrap-select').replaceWith(function () {
      return $('select', this);
    });


    $('#item-producto' + num + ' .selectpicker').selectpicker();

    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.select').selectpicker('mobile');
    }*/
    $klon.find('input,textarea').val('');
    $klon.find('.delete-product').css('display', 'block');
  });
  $(document).on('click', '.delete-product', function () {
    $(this).parents('div[id^="item-producto"]').remove();
  });
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        $.ajax({
          url: "<?= base_url()?>compras/nueva-solicitud-estimacion",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              <?php if($this->session->userdata('tipo') == 7) { ?>
                window.location.replace("<?= base_url()?>estimaciones");
              <?php } ?>
              <?php if($this->session->userdata('tipo') != 7) { ?>
                window.location.replace("<?= base_url()?>estimaciones");
              <?php } ?>
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
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $.ajax({
      type: "POST",
      url: base_url + 'almacen/getSegmento',
      data: 'id=' + $('#selectProyecto').val(),
      success: function (r) {
        var registros = eval(r);
        if (registros.length == 0) {
          //alert('null');
          $('#ssegmento').append($('<option>', {
            value: '-',
            text: $("#selectProyecto").find(':selected').data('direccion')
          }));
          $('#ssegmento').selectpicker('refresh');
          return;
        }
        html = "";
        for (i = 0; i < registros.length; i++) {
          //html += "<option>"+registros[i]['segmento']+"</option>";
          $('#ssegmento').append($('<option>', {
            value: registros[i]['idtbl_segmentos_proyecto'],
            text: registros[i]['segmento']
          }));

        }
        $('#ssegmento').selectpicker('refresh');
      }
    })
  });

  /* ********** Eventos Busqueda Productos ********** */
  $("body").on('keyup', ".neodata", function(event) {
    console.log("keyup");
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    var data = {
        'neodata': neodata,
    }
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoPorNeodata",
        data: data,
        dataType: "json",
        success:function(data) {
            console.log(data);
            parent = element.closest("div");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' " + " data-descripcion='" + item.descripcion.substr(0,60).trim() + "' data-value='" + item.idtbl_catalogo + "' data-unidad-medida='" + item.unidad_medida + "' data-categoria='" + item.idctl_categorias + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60).trim() + ")" + "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
              console.log($(this).data());
              _this.find('.unidad').val($(this).data('unidadMedida'));
              _this.find('.descripcion').val($(this).data('descripcion'));

              //Obtenemos la id unica de la sugerencia pulsada
              var iddtl_almacen = $(this).data("value");
              var descripcion = $(this).data('descripcion');
              //Editamos el valor del input con data de la sugerencia pulsada
              parent.find('.neodata').val(descripcion);
              parent.find('.producto').val(iddtl_almacen);
              //Hacemos desaparecer el resto de sugerencias
              $('.sugerencias').fadeOut(500);
              parent.find('.sugerencias').html("");
              return false;
            });
        }
    })
  });

  $("body").on('keydown', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.producto').val() != ""){
      element.val("");
      $(_this).find('.producto').val("");
      $(_this).find('.unidad').val("");
      $(_this).find('.descripcion').val("");
    }
  });

  $("body").on('blur', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.producto').val() == ""){
      element.val("");
      $(_this).find('.producto').val("")
      $(_this).find('.unidad').val("");
      $(_this).find('.descripcion').val("");
    }
  });

  $("body").on('click', function() {
      $('.sugerencias').html("");
      $('.sugerencias').fadeOut(500);
  });
  $("body").on('click', ".neodata", function() {
    var element = $(this);
    element[0].setSelectionRange(0, element.val().length);
  });
  /* ********** Eventos Busqueda Productos ********** */
</script>