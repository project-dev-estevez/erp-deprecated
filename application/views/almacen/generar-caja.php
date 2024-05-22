<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Solicitud de Caja Chica</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" onsubmit="return checkSubmit();" novalidate'); ?>
          <div class="form-row">
            <div class="col-xs-12 col-md-7">
              <label>Proyecto*</label>
              <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>"
                    data-direccion="<?php echo $value->direccion ?>">
                    <?php echo $value->numero_proyecto ?> -
                    <?php echo substr(trim($value->nombre_proyecto),0,70) ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-xs-12 col-md-5">
              <label>Segmento*</label>
              <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              </select>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Persona autorización</label>
                <select name="persona_autorizacion" id="persona_autorizacion" class="form-control recibe" required>
                  <option value="" disabled selected>Seleccione...</option>
                  <!--<option value="3">Ingrid Guadalupe Martínez Baeza</option>
                  <option value="16">Elizabeth Gonzalez Herrera</option>-->
                  <option value="68">Maria Fernanda Estevez Gonzalez</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione persona autorización
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
                <div class="form-group">
                    <label>Recibe*</label>
                    <select name="recibe" id="recibe" class="selectpicker recibe" required data-live-search="true">
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        <?php foreach ($usuarios as $key => $value): ?>
                        <option value="<?php echo $value->idtbl_usuarios ?>">
                            <?php echo $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
          </div>
          
          
          <hr>
          <div id="item-producto1" class="itemproducto">
            <div class="form-row">
              
              <div class="col">
                <label for="cantidad">Cantidad*</label>
                <input type="number" name="cantidad" id="cantidad" required class="form-control">
              </div>

            </div>
        
            <br>
            <div class="form-row">
              <div class="col">
                <label for="especificaciones">Motivo</label>
                <textarea name="motivo" id="motivo" class="form-control"
                  rows="5"></textarea>
              </div>
            </div>
            <i class="fa fa-close delete-product" style="display:none"></i>
            <hr>
          </div>
          <br><br>
          <div class="clearfix pt-md">
            <div class="pull-right">
              <a href="<?php echo base_url().'almacen/solicitudes_almacen' ?>"
                class="btn-warning btn" id="btn-cancelar">Cancelar</a>
              <?= form_hidden('token',$token) ?>
              <?= form_hidden('tipo','caja_chica') ?>
              <button type="submit" class="btn-primary btn" id="btn-enviar-solicitud">Enviar Solicitud</button>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getSegmento',
      data:'id=' + $('#selectProyecto').val(),
      success:function(r) {  
        let registros = eval(r);
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
    });
  });
  $(document).on('change', '.producto', function (event) {
    event.preventDefault();
    var _this = $(this).closest('.itemproducto');
    $(_this).find('.descripcion').val($("option:selected", this).data("descripcion"));
    $(_this).find('.unidad').val($("option:selected", this).data("unidad-medida"));
  });
  $(document).on('change', '.proyecto', function (event) {
    event.preventDefault();
    console.log($("option:selected", this).val())
    $('.recibe').find('.options').hide();
    $('.recibe').find('.proyecto' + $("option:selected", this).val()).show()

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
  $(document).ready(function () {
    $("#formuploadajax").on("submit", function (event) {
      if (event.isDefaultPrevented()) {
        console.log('Error')
      } else {
        event.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        $.ajax({
          url: "<?= base_url()?>almacen/nueva_solicitud_caja",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function (res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $("#btn-enviar-solicitud").css('display','none');
              $("#btn-cancelar").css('display','none');
              $("#nuevoProducto").css('display','none');
              window.location.replace("<?= base_url()?>almacen/caja_chica");
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
<script>
  var statSend = false;
function checkSubmit() {
    if (!statSend) {
        statSend = true;
        return true;
    } else {
        //alert("El formulario ya se esta enviando...");
        return false;
    }
}
</script>