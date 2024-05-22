<section class="forms nueva-asignacion">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Asignación / <?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> (Número Empleado <?php echo $detalle->numero_empleado ?>) / <?php echo $detalle->nombre_proyecto ?> / <span class="text-danger">Folio <?php echo $folio ?></span></h3>
      </div>
      <div class="card-body">
        <?= validation_errors('<span class="error">', '</span>'); ?>
        <?= form_open_multipart('', 'class="needs-validation" novalidate id="form-asignacion"'); ?>
        <div class="row productoFieldset" id="productoFieldset1">
          <div class="col-12 col-md-6">
            <div class="form-group selectpickerProducto">
              <label for="existencias">Producto*</label>
              <select name="producto[]" id="" class="selectpicker producto" data-live-search="true" data-old-value="" required>
                <option value="" disabled selected>Seleccione...</option>
                <?php if (isset($inventario_almacen)): ?>
                  <?php foreach ($inventario_almacen as $value): ?>
                    <option data-marca="<?php echo $value->marca ?>"
                      data-modelo="<?php echo $value->modelo ?>"
                      data-descripcion="<?php echo $value->descripcion ?>"
                      data-existencias="<?php echo $value->existencias ?>"
                      data-uid="<?php echo $value->uid ?>"
                      data-precio="<?php echo ($value->tipo_moneda=='d') ? $value->precio*$precio_dolar : $value->precio ?>"
                      value="<?php echo $value->iddtl_almacen ?>"
                      data-iddtl-almacen = "<?php echo $value->iddtl_almacen ?>"
                      data-unidad-medida="<?php echo $value->unidad_medida ?>"
                      data-idtbl-catalogo="<?php echo $value->idtbl_catalogo ?>">
                      <?php echo $value->neodata . '(' .substr($value->descripcion,0,70) . '(' . $value->estado . '))' ?> 
                    </option>
                  <?php endforeach ?>
                <?php endif ?>
              </select>
              <div class="invalid-feedback">
                Seleccione un producto
              </div>
              <div sytle="display:'none'" class="input"></div>
            </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="form-group">
              <label>Existencias</label>
              <input type="number" class="form-control existencias" disabled readonly value="0" min="1" name="existencias">
            </div>
          </div>
          <div class="col-12 col-md-3">
            <div class="form-group">
              <label for="cantidad">Cantidad*</label>
              <input type="number" class="form-control cantidad" placeholder="" min="0" name="cantidad[]" required>
              <div class="invalid-feedback">
                La cantidad no puede ser mayor a las existencias, ni vacia.
              </div>
            </div>
          </div>
          <i class="fa fa-close delete-product" style="display:none"></i>
        </div>
        <div class="row">
          <div class="col text-center">
            <span class="fa fa-plus" id="nuevoProducto" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
          </div>
        </div>
        <br><br>
        <div class="row">
          <!--<div class="col-12 col-md-6">
            <div class="form-group">
              <label for="documentoInput">Documento Solicitud de Almacén*</label>
              <input type="file" class="filestyle pull-left" name='solicitud' required accept=".pdf">
            </div>
          </div>-->
          <?php if($this->session->userdata('tipo') != 14 && $this->session->userdata('tipo') != 10){ ?>
            <div class="col-12 col-md-6">
              <div class="form-group">
                <label for="documentoInput">Responsiva*</label>
                <input type="file" class="filestyle pull-left" name='responsiva' accept=".pdf">
              </div>
            </div>
          <?php } ?>
          <div class="col-12">
            <div class="form-group">
              <label for="documentoInput">Observaciones</label>
              <textarea class="form-control" rows="5" name="observaciones" id="observacion"></textarea>
            </div>
          </div>
          <br><br>
          <?php if($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10){ ?>
          <table class="table table-sm" width="100%">
            <tr>
              <td style="width:100px;"></td>
              <td>
                <center>
                  <canvas id="draw-canvas7" width="240" style="border-style: solid;">
                    No tienes un buen navegador.
                  </canvas>
                  <br>
                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn7"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn7"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                  <div style="display: none">
                    <label>Color</label>
                    <input type="color" id="color7">
                    <label>Tamaño Puntero</label>
                    <input type="range" id="puntero7" min="1" default="1" max="5" width="10%">
                  </div>
                  <textarea style="display: none;" id="draw-dataUrl7" name="imagen7" class="form-control" rows="5"></textarea>
                  <img style="display: none" id="draw-image7" src="" alt="Tu Imagen aparecera Aqui!" />
                </center>
              </td>
              <td style="width:100px;"></td>
              <td>
                <center>
                  <canvas id="draw-canvas6" width="240" style="border-style: solid;">
                    No tienes un buen navegador.
                  </canvas>
                  <br>
                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-warning btn-sm" id="draw-submitBtn6"><i style="font-size: 8px;" class="fa fa-ban"></i> Crear Firma</button>
                  <button style="width: 100px;height: 19px;font-size: 8px;" type="button" class="btn btn-danger btn-sm" id="draw-clearBtn6"><i style="font-size: 8px;" class="fa fa-trash"></i> Borrar Firma</button>
                  <div style="display: none">
                    <label>Color</label>
                    <input type="color" id="color6">
                    <label>Tamaño Puntero</label>
                    <input type="range" id="puntero6" min="1" default="1" max="5" width="10%">
                  </div>
                  <textarea style="display: none;" id="draw-dataUrl6" name="imagen6" class="form-control" rows="5"></textarea>
                  <img style="display: none" id="draw-image6" src="" alt="Tu Imagen aparecera Aqui!" />
                </center>
              </td>
              <td style="width:100px;"></td>
            </tr>
            <tr>
              <td style="width:100px;"></td>
              <th scope="row" style="text-align: center;">FIRMA<br><?= $this->session->userdata('nombre') ?></th>
              <td style="width:100px;"></td>
              <th scope="row" style="text-align: center;">FIRMA<br><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></th>
              <td style="width:100px;"></td>
            </tr>
          </table>
          <?php } ?>
        </div>
        <div class="text-right">
          <input type="hidden" name="bandera" id="bandera" value="false">
          <input type="hidden" name="uid_usuario" value="<?php echo $uid_usuario ?>">
          <input type="hidden" name="token" value="<?php echo $token ?>">
          <input type="hidden" name="uid_asignacion" value="<?php echo $uid_asignacion ?>">
          <input type="hidden" name="proyecto" value="<?= $detalle->tbl_proyectos_idtbl_proyectos ?>">
          <input type="hidden" name="tipo" value="<?= $tipo ?>">
          <a href="<?php echo base_url().'almacen/asignaciones/' ?>" class="btn-warning btn">Regresar</a>
          <button type="button" class="btn-primary btn" id="generar-documentos">Generar documentos</button>
          <button type="button" id="cancelar" class="btn-danger btn ocultar">Cancelar Asignación</button>
          <input type="submit" class="btn-info btn" value="Asignar">
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cancelarModal" tabindex="-1" role="dialog" aria-labelledby="vacacionesLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="vacacionesLabel">Cancelar asignación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo form_open_multipart('almacen/cancelar-asignacion', 'class="needs-validation" novalidate id="formuploadajax-cancel-asignacion"'); ?>
          <div class="form-group">
            <label>Comentarios</label>
            <textarea name="comentarios" class="form-control" rows="5"></textarea>
          </div>
          <br>          
          <input type="hidden" id="token" name="token" value="<?= $token ?>">
          <input type="hidden" id="folio" name="folio" value="<?= $folio ?>">          
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" id="btnCancel" class="btn btn-primary ladda-button" data-style="expand-right">Aceptar</button>
        <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>
</section>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script>
  $('.filestyle').filestyle({
    text : '&nbsp;Documento',
    btnClass : 'btn-outline-info',
  });
</script>
<script>
  $(document).on('changed.bs.select', '.producto select', function(event) {
    var old_value = $(this).data("old-value");
    $('#'+$("option:selected", this).data('uid')).remove();
    var _this=$(this).closest('.productoFieldset');
    _this.find(".input").html("");
    _this.find('.existencias').val($("option:selected", this).data('existencias'))
    _this.find('.cantidad').attr('max',$("option:selected", this).data('existencias'))
    $('#tr'+_this.attr('id')).find('.producto').html($("option:selected", this).data('descripcion')+' '+$("option:selected", this).data('modelo')+' ('+$("option:selected", this).data('marca')+')');
    var iddtl_almacen = $("option:selected", this).val();
    var _this=$(this).closest('.productoFieldset');
    var cantidad_producto = _this.find("input[name='cantidad[]']").val();
    $(this).data("old-value", iddtl_almacen);
    <?php 
      if($this->session->userdata("tipo") == 14 || $this->session->userdata('tipo') == 10){
    ?>
      var number = parseInt( _this.prop("id").match(/\d+/g), 10 );
      $("div[data-div-iddtl-almacen='" + old_value + "_" + number +"']").remove();
      $("tr[data-div-iddtl-almacen='" + old_value + "_" + number +"']").remove();
      var unidad_medida = $("option:selected", this).data('unidad-medida');
      if(unidad_medida == "KIT"){
        var idtbl_catalogo = $("option:selected", this).data('idtbl-catalogo');
        $.ajax({
          type:"POST",
          url: "<?= base_url() ?>/almacen/getCatalogoKit",
          data: "idtbl_catalogo="+idtbl_catalogo,
          dataType: "json",
          success: function(data1){
            for(var r=0; r<data1.length; r++){
              var $div = $('[id^="productoFieldset"]:last');
              var $tr = $('[id^="trproductoFieldset"]:last');
              // Read the Number from that DIV's ID (i.e: 3 from "klon3")
              // And increment that number by 1
              var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
              // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
              var $klon = $div.clone().prop('id', 'productoFieldset'+num );
              $klon.attr("data-div-iddtl-almacen", iddtl_almacen+"_"+number);
              var $klonTr = $tr.clone().prop('id', 'trproductoFieldset'+num );
              //$klon.css('display', 'none');
              $div.after( $klon);
              $tr.after( $klonTr);
              //$klon.show(500);
              $klon.find('.bootstrap-select').replaceWith(function() { return $('select', this); });
              var select = $('#productoFieldset'+num+' .selectpicker');
              select.prop("disabled", true);
              select.val(data1[r].iddtl_almacen);
              select.selectpicker();
              $klon.find('.bootstrap-select').css("display", "none");
              $klon.find(".selectpickerProducto").find(".input").html("<input class='form-control' type='text' value='" + data1[r].neodata +"'><input type='hidden' name='producto[]' value='" + data1[r].iddtl_almacen +"'>");
              //console.log(select.val());
              $klon.find('.delete-product').css('display', 'none');
              $klon.find('input').attr("data-readonly","");
              $klon.find('input[name="existencias"]').val(data1[r].existencias);
              var cantidad = $klon.find('input[name="cantidad[]"]');
              cantidad.attr("data-requerido", data1[r].cantidad);
              cantidad.attr("max", data1[r].existencias);
              cantidad.prop("required",true);
              cantidad.val(cantidad_producto == "" ? "" : (parseFloat(data1[r].cantidad) * parseFloat(cantidad_producto)).toFixed(2));
              $klonTr.find('td').html('');
              $('#trproductoFieldset'+num).find('.producto').html(data1[r].descripcion);
              $('#trproductoFieldset'+num).attr("data-div-iddtl-almacen", iddtl_almacen+"_"+number);
            }
          }, 
          error: function(){
            Toast.fire({
              type: "error",
              title: "Error al obtener información, intente mas tarde."
            });
          }
        });
      }
    <?php
      }
    ?>
    
  });
  $(document).on('keyup', 'input[name="cantidad[]"]', function(event) {
    var _this=$(this).closest('.productoFieldset');
    var number = parseInt( _this.prop("id").match(/\d+/g), 10 );
    var iddtl_almacen = _this.find(".selectpicker").val();
    var cantidad_producto = _this.find("input[name='cantidad[]']").val();
    var subproductos = $("div[data-div-iddtl-almacen='" + iddtl_almacen + "_" + number +"']");
    for(var r=0; r<subproductos.length; r++){
      var item = $(subproductos.get(r));
      var cantidad_subproducto = $(item.find("input[name='cantidad[]']").get(0));
      cantidad_subproducto.val(cantidad_producto == "" ? "" : (parseFloat(cantidad_subproducto.data("requerido")) * parseFloat(cantidad_producto).toFixed(2)));
    }
  });
  $(document).on('change', '.cantidad', function(event) {
    var _this=$(this).closest('.productoFieldset');
    $('#tr'+_this.attr('id')).find('.cantidad').html($(this).val());
    
    var number = parseInt( _this.prop("id").match(/\d+/g), 10 );
    var iddtl_almacen = _this.find(".selectpicker").val();
    //var cantidad_producto = _this.find("input[name='cantidad[]']").val();
    var subproductos = $("div[data-div-iddtl-almacen='" + iddtl_almacen + "_" + number +"']");
    var subproductos_table = $("tr[data-div-iddtl-almacen='" + iddtl_almacen + "_" + number +"']");
    for(var r=0; r<subproductos.length; r++){
      var item = $(subproductos.get(r));
      var cantidad = $(item.find("input[name='cantidad[]']").get(0));
      $(subproductos_table.get(r)).find(".cantidad").html(cantidad.val());
    }  
  });
  $(document).ready(function() {
    $('#observacion').change(function(event) {
      $('#observaciones').html(this.value);
    });
    $('#generar-documentos').click(function(event) {
      var valueimage6 = $("#draw-image6-document").attr("src");
      var valueimage7 = $("#draw-image7-document").attr("src");
      if(valueimage6 == "" || valueimage7 == ""){
        Toast.fire({
          type: 'error',
          title: 'Crear Firmas Antes de Continuar'
        });
        return;
      }
      if($('#table_material tr').length>1){
        Swal.fire({
          title: '¿Desea generar documentos con la información actual?',
          html: $('#table_material'),
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Confirmar'
        }).
        then((result) => {
          if (result.value) {
            $('#bandera').val('true');
            $("#salida_material").print({
              iframe : true,
              globalStyles: true,
              mediaPrint: true,
              noPrintSelector :'.no-print'
            });
          }
        })
      } else {
        Toast.fire({
          type: 'error',
          title: 'Seleccione al menos un item de la lista.'
        })
      }
    });

    $('#cancelar').click(function(event) {
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la asignación?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).then((result) => {
      if (result.value) {
        $("#cancelarModal").modal("show");
      }
    })
  });

  $('#btnCancel').click(function(event) {
    event.preventDefault();
    //alert(document.getElementById("formuploadajax_cancel_asignacion"));
    //var formData = new FormData(document.getElementById("formuploadajax-cancel-asignacion"));
    var folio = $('#folio').val();
    var token = $('#token').val();
    var comentarios = $('#comentarios').val();
    $.ajax({
      url: "<?= base_url()?>almacen/cancelar-asignacion",
      type: "POST",
      dataType: "json",
      data: {folio: folio, comentarios:comentarios, token:token},
      //cache: false,
      //contentType: false,
      //processData: false,
      complete: function (res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          $('#cancelarModal').modal('hide');
          $('.ocultar').hide();
          Swal.fire(
            '¡Exitoso!',
            resp.mensaje,
            'success'
            )
          location.href="<?= base_url() ?>almacen/asignaciones/alto-costo";
        } else {
          Toast.fire({
            type: 'error',
            title: resp.mensaje
          })
        }
      }
    });
  });

    $("#form-asignacion").on("submit", function(event) {
      var $form = $(this);
      var submitButton = $form.find('input[type="submit"]');
      if($('#bandera').val()=='true') {
        var f = $(this);
        if (event.isDefaultPrevented()) {
          console.log('Error')
        } else {
          if($form[0].checkValidity())
              submitButton.prop("disabled", "true");
          event.preventDefault();
          var formData = new FormData(document.getElementById("form-asignacion"));
          $.ajax({
            url: "<?= base_url()?>almacen/guardar-asignacion-material",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              console.log(resp);
              if(resp.status) {
                location.href ="<?php echo base_url().'personal/detalle/'.$uid_usuario ?>";
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
                submitButton.prop("disabled", "false");
              }
            }
          });
        }
      } else {
        event.preventDefault();
        Toast.fire({
          type: 'error',
          title: 'Debe generar los documentos.'
        })
      }
    });
  });
  $('#nuevoProducto').click(function(event) {
    /* Act on the event */
    var $div = $('[id^="productoFieldset"]:last');
    var $tr = $('[id^="trproductoFieldset"]:last');
    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'productoFieldset'+num );
    $klon.attr("data-div-iddtl-almacen", "");
    var $klonTr = $tr.clone().prop('id', 'trproductoFieldset'+num );
    $klon.css('display', 'none');
    $div.after( $klon);
    $tr.after( $klonTr);
    $klon.show(500);
    $klon.find('.bootstrap-select').replaceWith(function() { return $('select', this); });
    select = $('#productoFieldset'+num+' .selectpicker');
    select.prop("disabled", false);
    select.selectpicker();
    $klon.find('.delete-product').css('display', 'block');
    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
    $('.select').selectpicker('mobile');
    }*/
    $klon.find('.input').html("");
    $klon.find('input').removeAttr("data-readonly");
    $klon.find('input').val('');
    $klonTr.find('td').html('');
  });
  $(document).on('click','.delete-product', function () {
    var parent = $(this).parents('[id^="productoFieldset"]');
    var number = parseInt( parent.prop("id").match(/\d+/g), 10 );
    var iddtl_almacen = parent.find(".selectpicker").val();
    parent.remove();
    $("div[data-div-iddtl-almacen='" + iddtl_almacen + "_" + number +"']").remove();
    $("tr[data-div-iddtl-almacen='" + iddtl_almacen + "_" + number +"']").remove();
    $('#tr'+$(this).parents('[id^="productoFieldset"]').attr('id')).remove();
  });

  (function() { // Comenzamos una funcion auto-ejecutable

        // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                    // Retrasa la ejecucion de la funcion para mejorar la experiencia
                };
        })();

        // Traemos el canvas mediante el id del elemento html
        var canvas6 = document.getElementById("draw-canvas6");
        var ctx6 = canvas6.getContext("2d");


        // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
        var drawText6 = document.getElementById("draw-dataUrl6");
        var drawImage6 = document.getElementById("draw-image6");
        var clearBtn6 = document.getElementById("draw-clearBtn6");
        var submitBtn6 = document.getElementById("draw-submitBtn6");
        clearBtn6.addEventListener("click", function(e) {
            // Definimos que pasa cuando el boton draw-clearBtn es pulsado
            clearCanvas();
            $('#draw-submitBtn6').attr("disabled", false);
            $('#draw-submitBtn6').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
            $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
            drawImage6.setAttribute("src", "");
            document.getElementById("draw-image6-document").setAttribute("src", "");
        }, false);
        // Definimos que pasa cuando el boton draw-submitBtn es pulsado
        submitBtn6.addEventListener("click", function(e) {
            var dataUrl = canvas6.toDataURL();
            drawText6.innerHTML = dataUrl;
            drawImage6.setAttribute("src", dataUrl);
            document.getElementById("draw-image6-document").setAttribute("src", dataUrl);
            $('#draw-submitBtn6').attr("disabled", true);
            $('#draw-submitBtn6').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
            $("#draw-submitBtn6").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
        }, false);

        // Activamos MouseEvent para nuestra pagina
        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas6.addEventListener("mousedown", function(e) {
            /*
            Mas alla de solo llamar a una funcion, usamos function (e){...}
            para mas versatilidad cuando ocurre un evento
            */
            var tint6 = document.getElementById("color6");
            var punta6 = document.getElementById("puntero6");
            console.log(e);
            drawing = true;
            lastPos = getMousePos(canvas6, e);
        }, false);
        canvas6.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas6.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas6, e);
        }, false);

        // Activamos touchEvent para nuestra pagina
        canvas6.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas6, e);
            console.log(mousePos);
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchend", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchleave", function(e) {
            // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas6.dispatchEvent(mouseEvent);
        }, false);
        canvas6.addEventListener("touchmove", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas6.dispatchEvent(mouseEvent);
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            console.log(touchEvent);
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Draw to the canvas
        function renderCanvas() {
            if (drawing) {
                var tint6 = document.getElementById("color6");
                var punta6 = document.getElementById("puntero6");
                ctx6.strokeStyle = tint6.value;
                ctx6.beginPath();
                ctx6.moveTo(lastPos.x, lastPos.y);
                ctx6.lineTo(mousePos.x, mousePos.y);
                console.log(punta6.value);
                ctx6.lineWidth = punta6.value;
                ctx6.stroke();
                ctx6.closePath();
                lastPos = mousePos;
            }
        }

        function clearCanvas() {
            canvas6.width = canvas6.width;
        }

        // Allow for animation
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

    })();

    (function() { // Comenzamos una funcion auto-ejecutable

        // Obtenenemos un intervalo regular(Tiempo) en la pamtalla
        window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimaitonFrame ||
                function(callback) {
                    window.setTimeout(callback, 1000 / 60);
                    // Retrasa la ejecucion de la funcion para mejorar la experiencia
                };
        })();

        // Traemos el canvas mediante el id del elemento html
        var canvas7 = document.getElementById("draw-canvas7");
        var ctx7 = canvas7.getContext("2d");


        // Mandamos llamar a los Elemetos interactivos de la Interfaz HTML
        var drawText7 = document.getElementById("draw-dataUrl7");
        var drawImage7 = document.getElementById("draw-image7");
        var clearBtn7 = document.getElementById("draw-clearBtn7");
        var submitBtn7 = document.getElementById("draw-submitBtn7");
        clearBtn7.addEventListener("click", function(e) {
            // Definimos que pasa cuando el boton draw-clearBtn es pulsado
            clearCanvas();
            $('#draw-submitBtn7').attr("disabled", false);
            $('#draw-submitBtn7').removeClass('btn btn-success btn-sm').addClass('btn btn-warning btn-sm');
            $("#draw-submitBtn7").html('<i style="font-size: 8px" class="fa fa-ban"></i> Crear Firma');
            drawImage7.setAttribute("src", "");
            document.getElementById("draw-image7-document").setAttribute("src", "");
        }, false);
        // Definimos que pasa cuando el boton draw-submitBtn es pulsado
        submitBtn7.addEventListener("click", function(e) {
            var dataUrl = canvas7.toDataURL();
            drawText7.innerHTML = dataUrl;
            document.getElementById("draw-image7-document").setAttribute("src", dataUrl);
            drawImage7.setAttribute("src", dataUrl);
            $('#draw-submitBtn7').attr("disabled", true);
            $('#draw-submitBtn7').removeClass('btn btn-warning btn-sm').addClass('btn btn-success btn-sm');
            $("#draw-submitBtn7").html('<i style="font-size: 8px" class="fa fa-check"></i> Firma Creada');
        }, false);

        // Activamos MouseEvent para nuestra pagina
        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;
        canvas7.addEventListener("mousedown", function(e) {
            /*
            Mas alla de solo llamar a una funcion, usamos function (e){...}
            para mas versatilidad cuando ocurre un evento
            */
            var tint7 = document.getElementById("color7");
            var punta7 = document.getElementById("puntero7");
            console.log(e);
            drawing = true;
            lastPos = getMousePos(canvas7, e);
        }, false);
        canvas7.addEventListener("mouseup", function(e) {
            drawing = false;
        }, false);
        canvas7.addEventListener("mousemove", function(e) {
            mousePos = getMousePos(canvas7, e);
        }, false);

        // Activamos touchEvent para nuestra pagina
        canvas7.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas7, e);
            console.log(mousePos);
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas7.dispatchEvent(mouseEvent);
        }, false);
        canvas7.addEventListener("touchend", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas7.dispatchEvent(mouseEvent);
        }, false);
        canvas7.addEventListener("touchleave", function(e) {
            // Realiza el mismo proceso que touchend en caso de que el dedo se deslice fuera del canvas
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas7.dispatchEvent(mouseEvent);
        }, false);
        canvas7.addEventListener("touchmove", function(e) {
            e.preventDefault(); // Prevent scrolling when touching the canvas
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas7.dispatchEvent(mouseEvent);
        }, false);

        // Get the position of the mouse relative to the canvas
        function getMousePos(canvasDom, mouseEvent) {
            var rect = canvasDom.getBoundingClientRect();
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: mouseEvent.clientX - rect.left,
                y: mouseEvent.clientY - rect.top
            };
        }

        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDom, touchEvent) {
            var rect = canvasDom.getBoundingClientRect();
            console.log(touchEvent);
            /*
            Devuelve el tamaño de un elemento y su posición relativa respecto
            a la ventana de visualización (viewport).
            */
            return {
                x: touchEvent.touches[0].clientX - rect.left, // Popiedad de todo evento Touch
                y: touchEvent.touches[0].clientY - rect.top
            };
        }

        // Draw to the canvas
        function renderCanvas() {
            if (drawing) {
                var tint7 = document.getElementById("color7");
                var punta7 = document.getElementById("puntero7");
                ctx7.strokeStyle = tint7.value;
                ctx7.beginPath();
                ctx7.moveTo(lastPos.x, lastPos.y);
                ctx7.lineTo(mousePos.x, mousePos.y);
                console.log(punta7.value);
                ctx7.lineWidth = punta7.value;
                ctx7.stroke();
                ctx7.closePath();
                lastPos = mousePos;
            }
        }

        function clearCanvas() {
            canvas7.width = canvas7.width;
        }

        // Allow for animation
        (function drawLoop() {
            requestAnimFrame(drawLoop);
            renderCanvas();
        })();

    })();

</script>

<style type="text/css" media="print">
  @media print {
    #salida_material {
      padding-top: 0;
    }

    body {
      font-family: "Times New Roman", Times, serif;
      font-size: 16px;
    }
  }
</style>

<div class="container-fluid">
  <div class="card" id="salida_material" >
    <table width="100%" class="table table-bordered">
      <thead>
        <tr>
          <th style="text-align: center" width="25%"><img src="<?php echo base_url(); ?>uploads/logo-estevez-jor.png" style="display: inline-block; width: 150px;"></th>
          <th colspan="2" width="50%" style="vertical-align: middle; text-align: center"><h3>ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.</h3></th>
          <th style="vertical-align: middle; text-align: center" width="25%"><h3>Folio: <?php echo $folio ?></h3></th>
        </tr> 
        <tr>
          <th colspan="4" style="text-align: center"><h4>RECIBO EQUIPO DE TRABAJO</h4></th>
        </tr>
        <tr>
          <td colspan="4" style="text-align: center">Con esta fecha recibí a mi entera satisfacción de la Empresa ESTEVEZ.JOR SERVICIOS, S.A. DE C.V. las HERRAMIENTAS DE TRABAJO que a continuación se detallan:</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4">
            <table width="100%" id="table_material" class="table table-bordered">
              <thead>
                <tr>
                  <td><strong>Herramienta</strong></td>
                  <td><strong>Cantidad</strong></td>
                </tr>
              </thead>
              <tbody>
                <tr id="trproductoFieldset1">
                  <td class="producto"></td>
                  <td class="cantidad"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td align="center" colspan="4">Observaciones</td>
        </tr>
        <tr>
          <td colspan="4" id="observaciones"></td>
        </tr>
        <tr>
          <td colspan="4">Proyecto: <?= $detalle->numero_proyecto ?> <?= $detalle->nombre_proyecto ?></td>
        </tr>
        <tr>
          <td colspan="4">
            Hago constar que dichos materiales los recibo nuevos y de la calidad y demás condiciones para el trabajo, por lo que me obligo en términos del artículo 134 fracción VI y 135 fracciones III y IX de la Ley Laboral a conservarlos en buen estado; a utilizarlos para el uso que están destinados dentro de mi puesto y área de trabajo; así como restituirlos única y exclusivamente mediante un canje del usado por otro en mejores condiciones y/o nuevo, el cual lo proporcionara el área de Almacén de materiales y  herramientas, responsabilizándome de los mismos bajo cualquier circunstancia, aceptando que en caso de pérdida o mal uso sean descontados de mi paga, entiendo que salvo por caso **fortuito o fuerza mayor**, se me condonaría del pago de la herramienta y/o materiales en mención. <br> ** Este será valorado por el Área de Recursos Humanos y Materiales.
          </td>
        </tr>
        <tr>
          <td colspan="4" align="center">Tlalnepantla de Baz, Estado de México a <?= strftime('%d de %B del %Y') ?></td>
        </tr>
        <tr>
          <td height="70" width="100%" colspan="4"></td>
        </tr>
        <tr>
          <td colspan="2" width="50%" align="center"><?= $this->session->userdata('nombre') ?></td>
          <td colspan="2" width="50%" align="center"><?= $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?></td>
        </tr>
        <?php if($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 10){ ?>
        <tr>
          <td colspan="2" width="50%" align="center"><img id="draw-image7-document" src="" alt="Tu Imagen aparecera Aqui!" /></td>
          <td colspan="2" width="50%" align="center"><img id="draw-image6-document" src="" alt="Tu Imagen aparecera Aqui!" /></td>
        </tr>
        <?php } ?>
        <tr>
          <td colspan="2" width="50%" align="center">Entrega <?= strftime('%d de %B del %Y') ?></td>
          <td colspan="2" width="50%" align="center">Recibe <?= strftime('%d de %B del %Y') ?></td>
        </tr>
      </tbody>
    </table>
  </div>

</div>