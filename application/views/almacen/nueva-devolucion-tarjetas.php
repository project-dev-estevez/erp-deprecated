<section class="forms nueva-asignacion">
  <div class="container-fluid">
  <div class="card">
    <div class="card-header d-flex align-items-center">
      <h3 class="h4">Nueva Solicitud de Devolución Tarjetas</h3>
    </div>
    <div class="card-body">
      <div class="over"></div>
      <div class="spinner" style="display: none">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
      <?= validation_errors('<span class="error">', '</span>'); ?>
      <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label>Proyecto*</label>
              <select name="idtbl_proyectos" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>" data-direccion="<?php echo $value->direccion ?>">
                    <?php echo $value->numero_proyecto ?> - <?php echo substr($value->nombre_proyecto,0,70) ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label>Segmento*</label>
            <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
            </select>
          </div>
          <div class="col">
            <div class="form-group">
              <label>Tipo</label>
              <select name="tipo" id="tipo" class="form-control" required>
                <option value="" disabled selected>Seleccione...</option>
                <option value="interno">Interno</option>
                <option value="contratista">Contratista</option>
              </select>
              <div class="invalid-feedback">
                Seleccione el tipo personal
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col divContratistas" style="display: none;">
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
          <div class="col divContratistas" style="display: none;">
            <div class="form-group">
              <label>Supervisor*</label>
              <select name="supervisor" id="supervisor" class="selectpicker form-control" data-live-search="true">
                <option value="" disabled selected>Seleccione...</option>
              </select>
              <div class="invalid-feedback">
                Seleccione al supervisor
              </div>
            </div>
          </div>
          <div class="col divInternos">
            <div class="form-group">
              <label>Entrega*</label>
              <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true">
                <option value="" disabled selected>Seleccione...</option>
              </select>
              <div class="invalid-feedback">
                Seleccione al personal
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label for="documentoInput">Comentarios</label>
              <textarea class="form-control" rows="5" name="observaciones" id="observacion"></textarea>
            </div>
          </div>
          <br><br>
        </div>
        <div id="item-producto1" class="itemproducto">
            <div class="form-row">
              <div class="col">
                <label>Producto*</label>
                <input type="text" class="form-control" value="HR-TAR-EFI-001 (TARJETA DE COMBUSTIBLE)" disabled>
                <input type="hidden" class="form-control" name="producto[]" value="27235">
              </div>
              <div class="col">
                <label for="cantidad">Cantidad*</label>
                <input type="number" name="cantidad[]" id="cantidad" required class="form-control" step="0.001" min="0.001">
              </div>
              <div class="col">
                <label for="unidad">Unidad</label>
                <input type="text" disabled="true" class="form-control unidad" value="PZA">
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
        <!--<div class="row">
          <div class="col text-center">
            <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;
              "></span>
          </div>
        </div>-->
        <br><br>
        <div class="text-right">
          <?= form_hidden('token',$token) ?>
          <?= form_hidden('tipo_devolucion','Tarjetas') ?>
          <a href="<?php echo base_url().'almacen/devoluciones' ?>" id="btn-cancelar" class="btn-warning btn">Cancelar</a>
          <input type="submit" id="btn-enviar-devolucion" class="btn-info btn" value="Enviar solicitud de devolución">
        </div>
      </form>
    </div>
  </div>
</section>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
$('.filestyle').filestyle({
  text: '&nbsp;Documento',
  btnClass: 'btn-outline-info',
});
$(document).on('change', '.personal', function (event) {
  $('.nombre_empleado').html($("option:selected", this).data('nombre'));
  $('#uid-usuario').html($("option:selected", this).data('uid'));
});
/*$(document).on('change', '.producto', function (event) {
  event.preventDefault();
  var _this = $(this).closest('.itemproducto');
  $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
  $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
});*/
// Nuevo
$(document).on('change', '#tipo', function(event) {
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
$(document).on('change', '#selectProyecto', function (event) {
  event.preventDefault();
  var _this=$(this);
  $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
  $('#ssegmento').selectpicker('refresh');
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

// Nuevo
$(document).ready(function () {
  $('#observacion').change(function (event) {
    $('#observaciones').html(this.value);
  });
  $("#form-asignacion").on("submit", function (event) {
    if (event.isDefaultPrevented()) {
      console.log('Error')
    } else {
      event.preventDefault();
      var formData = new FormData(document.getElementById("form-asignacion"));
      $.ajax({
        url: "<?= base_url()?>almacen/guardar-solicitud-devolucion",
        type: "post",
        dataType: "json",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function (res) {
          $("#btn-enviar-devolucion").css('display','none');
          $("#btn-cancelar").css('display','none');
          var resp = JSON.parse(res.responseText);
          if (resp.status) {
            location.href = "<?= base_url()?>almacen/devoluciones";
          } else {
            Toast.fire({
              type: 'error',
              title: resp.message
            })
          }
        }
      });
    }
  });
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
  $klon.find('input,textarea').val('');
  $klon.find('.delete-product').css('display', 'block');
});
$(document).on('click', '.delete-product', function () {
    $(this).parents('div[id^="item-producto"]').remove();
  });
/* ********** Eventos Busqueda Productos ********** */
  $("body").on('keyup', ".neodata", function(event) {
    var tipo_user = <?= $this->session->userdata('tipo') ?>;
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    var data = {
        'neodata': neodata,
        'tipo': 'refacciones_control_vehicular'
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
                if(tipo_user == 5 && item.origen == 1){
                  filas += "<div><a class='elemento-sugerido list-group-item' " + " data-descripcion='" + item.marca + " " + item.modelo + " " + item.descripcion.substr(0,60).trim() + "' data-value='" + item.idtbl_catalogo + "' data-unidad-medida='" + item.unidad_medida + "' data-categoria='" + item.idctl_categorias + "'>" + item.neodata + " " + item.origen + " " + item.modelo + " (" + item.descripcion.substr(0,60).trim() + ")" + "</a></div>";
                }else if(tipo_user != 5){
                  filas += "<div><a class='elemento-sugerido list-group-item' " + " data-descripcion='" + item.marca + " " + item.modelo + " " + item.descripcion.substr(0,60).trim() + "' data-value='" + item.idtbl_catalogo + "' data-unidad-medida='" + item.unidad_medida + "' data-categoria='" + item.idctl_categorias + "' data-iddtl-almacen='" + item.iddtl_almacen + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60).trim() + ")" + "</a></div>";
                }
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
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
    console.log("keydown");
    if($(_this).find('.producto').val() != ""){
      console.log("entro");
      element.val("");
      $(_this).find('.producto').val("");
      //$(_this).find('.iddtlAlmacen').val("");
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
      //$(_this).find('.iddtlalmacen').val("");
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