<section class="forms nueva-solicitud">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Solicitud de Compra</h3>
      </div>
      <div class="card-body">
      <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
        <?php echo validation_errors('<p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'compras/enviar-solicitud', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
        <div class="form-row">
          <div class="col-2">
            <label for="fecha-limite">Fecha limite de entrega*</label>
            <input type="date" name="fecha_limite" id="fecha-limite" required class="form-control">
          </div>
          <div class="col-2">
            <label>Tipo*</label>
            <select name="tipo_pedido" id="tipo_pedido" class="form-control proyecto" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <option value="Producto">Producto</option>
              <option value="Servicio">Servicio</option>
            </select>
          </div>
          <div class="col">
            <label>Proyecto*</label>
            <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($proyectos as $key => $value): ?>
              <option value="<?php echo $value->idtbl_proyectos ?>"
                data-direccion="<?php echo $value->direccion ?>"
                data-almacen="<?= $value->tbl_almacenes_idtbl_almacenes ?>"
                data-kuali="<?= $value->proyecto_kuali ?>">
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
         
          <div class="col">
            <label>Tipo de compra</label>
            <select name="tipo_compra" id="tipo_compra" class="form-control" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <option value="stock">Stock</option>
              <option value="urgencia">Urgencia</option>
              <option value="explosion">Explosión de insumos</option>
              <option value="servicios generales">Servicios generales</option>
            </select>
          </div>
          
        </div>
        <?php if((!isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') != 23) && $this->session->userdata('tipo') != 3 && $this->session->userdata('tipo') != 2){ ?>
        <br>
        <div class="form-row" style="<?= $this->session->userdata('tipo') == 7 ? '' : 'display: none;' ?>">
          <div class="col">
            <label for="almacen_compra">Almacen compra</label>
            <select name="almacen_compra" id="almacen_compra" class="form-control" required>
              <option value="" selected disabled>Seleccione una opción...</option>
              <option value="1">Almacen General</option>
              <option value="2">Alto Costo</option>
              <option value="16">Kuali Digital</option>
              <option value="23">Área Médica</option>
              <option value="29">Control Vehicular</option>
              <option value="0">Seguridad e Higiene</option>
              <option value="30">Sistemas</option>
              <option value="357">Administrativo</option>
              <option value="358">Mantenimiento</option>
              <option value="398">Personal</option>
              <option value="421">Makili</option>
            </select>
          </div>
        </div>
        <?php }elseif(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') == 23){ ?>
        <br>
        <div class="form-row">
          <div class="col">
            <label for="almacen_compra">Almacen compra</label>
            <select name="almacen_compra" id="almacen_compra" class="form-control" required>
              <option value="" selected disabled>Seleccione una opción...</option>
              <option value="2">Alto Costo</option>
              <option value="29">Refacciones</option>
              <option value="0">Seguridad e Higiene</option>
            </select>
          </div>
        </div>
        <?php }elseif($this->session->userdata('tipo') == 3){ ?>
          <input name="almacen_compra" class="form-control" type="hidden" value="29">
          <?php }elseif($this->session->userdata('tipo') == 2){ ?>
          <input name="almacen_compra" class="form-control" type="hidden" value="30">
          <?php } ?>
        <br>
        <?php if($this->session->userdata('tipo') != 7){ ?>
        <div class="form-row">
          <div class="col">
            <label for="sugerencia">Sugerencia de Proveedor</label>
            <textarea name="sugerencia_proveedor1" id="sugerencia" class="form-control" rows="1" <?= $this->session->userdata('tipo') == 24 ? '' : 'required' ?>></textarea>
          </div>
          <div class="col">
            <label for="costo1">Costo</label>
            <input type="number" name="costo1" id="costo1" class="form-control" step="0.01" <?= $this->session->userdata('tipo') == 24 ? '' : 'required' ?>>
          </div>
          <div class="col">
            <label for="sugerencia">Comentario</label>
            <textarea name="comentario_proveedor1" id="comentario" class="form-control" rows="1" <?= $this->session->userdata('tipo') == 24 ? '' : 'required' ?>></textarea>
          </div>
          <div class="col">
            <label for="file1">Cotización</label>
            <input type="file" name="file1" id="file1" class="form-control" <?= $this->session->userdata('tipo') == 24 ? '' : 'required' ?>>
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label for="sugerencia">Sugerencia de Proveedor</label>
            <textarea name="sugerencia_proveedor2" id="sugerencia" class="form-control" rows="1" ></textarea>
          </div>
          <div class="col">
            <label for="costo1">Costo</label>
            <input type="number" name="costo2" id="costo2" class="form-control" step="0.01" >
          </div>
          <div class="col">
            <label for="sugerencia">Comentario</label>
            <textarea name="comentario_proveedor2" id="comentario" class="form-control" rows="1" ></textarea>
          </div>
          <div class="col">
            <label for="file1">Cotización</label>
            <input type="file" name="file2" id="file2" class="form-control">
          </div>
        </div>
        <div class="form-row">
          <div class="col">
            <label for="sugerencia">Sugerencia de Proveedor</label>
            <textarea name="sugerencia_proveedor3" id="sugerencia" class="form-control" rows="1" ></textarea>
          </div>
          <div class="col">
            <label for="costo1">Costo</label>
            <input type="number" name="costo3" id="costo3" class="form-control" step="0.01" >
          </div>
          <div class="col">
            <label for="sugerencia">Comentario</label>
            <textarea name="comentario_proveedor3" id="comentario" class="form-control" rows="1" ></textarea>
          </div>
          <div class="col">
            <label for="file1">Cotización</label>
            <input type="file" name="file3" id="file3" class="form-control" >
          </div>
        </div>
        <?php }else{ ?>
          <label for="sugerencia">Sugerencia de Proveedor</label>
          <textarea name="sugerencia_proveedor" id="sugerencia" class="form-control" rows="5"></textarea>
          <?php } ?>
        <br>
        <div class="form-row">
          <div class="col">
            <label for="comentarios">Comentarios</label>
            <textarea name="comentarios" id="comentarios" class="form-control" rows="5"></textarea>
          </div>
        </div>
        <hr>
        <?php if($this->session->userdata('tipo') == 3){ ?>
        <!--<div class="form-row">
            <div class="col-xs-12 col-md-6">
              <label>Eco*</label>
              <select name="eco" id="selectEco" class="selectpicker eco" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($ecos as $key => $value): ?>
                  <option value="<?php echo $value->iddtl_almacen ?>">
                    <?php echo $value->numero_interno ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <br>-->
          <?php } ?>
        <div id="div-productos">
        <div id="item-producto1" class="itemproducto productoFieldset" id="productoFieldset1">
          <div class="form-row">
            <div class="col">
              
              <label>Producto*</label>
              <input class="form-control neodata" name="neodata_producto[]" autocomplete="off" type="text" required>
              <input class="form-control producto" id="productos" autocomplete="off" type="hidden" name="producto[]" required>
              <div class="list-group sugerencias"></div>
            </div>
            <div class="col">
              <label for="cantidad">Cantidad*</label>
              <input type="number" name="cantidad[]" id="cantidad" min="0" step="0.0001" required class="form-control">
            </div>
            <div class="col">
              <label for="unidad">Unidad</label>
              <input type="text" disabled="true" class="form-control unidad">
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
          <div class="form-row urgencia" style="display: none;">
            <div class="col">
              <label for="especificaciones">Color</label>
              <input type="text" name="color[]" id="" class="form-control">
            </div>
          </div>
          <div class="form-row urgencia" style="display: none;">
            <div class="col">
              <label for="especificaciones">Medida</label>
              <input type="text" name="medida[]" id="" class="form-control">
            </div>
          </div>
          <div class="form-row urgencia" style="display: none;">
            <div class="col">
              <label for="especificaciones">Material</label>
              <input type="text" name="material[]" id="" class="form-control">
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="especificaciones">Especificaciones</label>
              <textarea name="especificaciones[]" id="especificaciones" class="form-control"
                rows="5"></textarea>
            </div>
          </div>

          <br>
          <div class="form-row" id="div_archivo" style="display: none;">
            <div class="col">
              <label for="archivo">Archivo</label>
              <input type="file" name="archivo" id="archivo" class="form-control">
            </div>
          </div>
          <i class="fa fa-close delete-product" style="display:none"></i>
          <hr>
        </div>
        </div>
        <br><br>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <a href="<?php echo base_url().'compras/'?>"
              class="btn-warning btn">Cancelar</a>
            <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>
            <?= form_hidden('token',$token) ?>
            <button type="submit" class="btn-primary btn">Enviar Solicitud</button>
          </div>
        </div>
        <?=form_close()?>
        <section>
	<div class="container-fluid">
		
			<div class="card">
        		<div class="card-header d-flex align-items-center">
        		  <h3 class="h4">Carga de generador desde archivo .CSV</h3>
        		</div>
        		<div class="card-body">
					<div id="inputs" class="ocultarOnSuccess clearfix">
					  <input type="file" id="files" name="files"/>
					</div>
					<hr class="ocultarOnSuccess">
					<output id="list" class="ocultarOnSuccess">
					</output>
					<hr class="ocultarOnSuccess">
					<button type="button" onclick="printTable()" id="procesar" class="btn btn-success ladda ocultarOnSuccess" style="display: none">Procesar Archivo</button>
					<div class="clearfix"></div>
				<br>
					<table id="contents" style="width:100%;" class="table table-hover table-responsive">
					</table>
					<br>
					<a id="refrescar" href="<?= base_url() ?>asistencias/cagar-csv" class="btn btn-success" style="display: none">Cargar Nuevo Archivo</a>
				</div>
			</div>
		
	</div>
	
</section>
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
        var proyecto_kuali = $('option:selected', '#selectProyecto').data('kuali');
        var formData = new FormData(document.getElementById("formuploadajax"));
        formData.append('proyecto_kuali', proyecto_kuali);
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea enviar la solicitud de compra?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) { //Confirmar el envío de solicitud de compra
        $.ajax({
          url: "<?= base_url()?>compras/nueva-solicitud",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function() {
            $('.card-body').addClass('load');          
          },
          success: function (res) {
            console.log(res);
            //var resp = JSON.parse(res); //Conversión de json a respuesta
            if (res.error == false) {
              <?php if($this->session->userdata('tipo') == 7) { ?>
                window.location.replace("<?= base_url()?>compras");
              <?php } ?>
              <?php if($this->session->userdata('tipo') != 7) { ?>
                window.location.replace("<?= base_url()?>compras/solicitud-compra");
              <?php } ?>
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        }).done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
      }
    });
      }
    });
  });
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $('#ssegmento').selectpicker('refresh');
    $('#almacen_compra').val(($("#selectProyecto").find(':selected').data('almacen')));
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
        $('#ssegmento').selectpicker('refresh'); //Refresh al selectpicker
      }
    })
  });

  $(document).on('change', '#productos', function (event) {
    event.preventDefault();    
    //alert($("option:selected", this).data("categoria"));
    var $div = $('div[id^="item-producto"]:last');
    var num = parseInt($div.prop("id").match(/\d+/g), 10);
    var _this = $(this).closest('#item-producto' + num);
    var almacen = $('#almacen_compra').val();
    
    if($("option:selected", this).data("categoria") == 16 || (almacen == 2 && $("option:selected", this).data("categoria") == 10) || (almacen == 30 && $("option:selected", this).data("categoria") == 10)) {
      $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');
    }else{
      $(_this).find('#cantidad').attr('readonly', false);
    }
  });

  $(document).on('change', '#tipo_pedido', function (event) {
    event.preventDefault();    
    //alert($("option:selected", this).data("categoria"));
    if($(this).val() == 'Servicio'){
      $('#div_archivo').show(300);
      $('#archivo').prop('disabled', false);
    }else{
      $('#div_archivo').hide(300);
      $('#archivo').prop('disabled', true);
    }
  });

  $(document).on('change', '#almacen_compra', function(event) {
  event.preventDefault();
  var _this=$(this);
  $('#productos').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
  $.ajax({
    url: base_url+'almacen/catalogo_compra',
    type: 'POST',
    dataType: 'json',
    data: {almacen: _this.val()},
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
        $('#productos').append($('<option value="'+item.idtbl_catalogo+'" data-precio="'+item.precio+'" data-moneda="'+item.tipo_moneda+'" data-preciolabel="'+item.precio+'"data-descripcion="'+item.descripcion+'" data-unidad-medida="'+item.unidad_medida+'" data-categoria="'+item.idctl_categorias+'">'+item.descripcion+'</option>'));
      });
      $('#productos').selectpicker('refresh');
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

$(document).on('change', '#tipo_compra', function(event) {
  var _this=$(this);
  
  if(_this.val() == 'urgencia'){
    $('.urgencia').show(500);
  }else{
    $('.urgencia').hide(500);
  }
  
});

  /* ********** Eventos Busqueda Productos ********** */
  var jsonData = {};
  <?php if($this->session->userdata('tipo') == 14){ ?>
    jsonData['tipo'] = "area_medica";
  <?php } else if($this->session->userdata('tipo') == 3){ ?>
    jsonData['tipo'] = "refacciones_control_vehicular";
  <?php } else if($this->session->userdata('tipo') == 10){ ?>
    jsonData['tipo'] = "seguridad_e_higiene";
  <?php } else if($this->session->userdata('tipo') == 2){ ?>
    jsonData['tipo'] = "sistemas";
  <?php } ?>


  $("body").on('keyup', ".neodata", function(event) {
    var tipo_compra = $('#tipo_pedido').val();
    if(tipo_compra == null || tipo_compra == ''){
      $(this).val("");
      Toast.fire({
            type: 'error',
            title: "Seleccione el tipo de compra."
      });
      return;
    }
    console.log("keyup");
    var element = $(this);
    var almacen = $('#almacen_compra').val();
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    jsonData['neodata'] = neodata;
    jsonData['tipo_compra'] = tipo_compra; 
    var data = jsonData;
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
              if($(this).data("categoria") == 16 || (almacen == 2 && $(this).data("categoria") == 10) || (almacen == 30 && $(this).data("categoria") == 10)) {         
              $(_this).find('#cantidad').attr('readonly', 'readonly').val('1');
              }else{
                $(_this).find('#cantidad').attr('readonly', false);
              }
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

<script src="<?= base_url(); ?>js/jquery.csv.js"></script>
  <script>
    $(document).ready(function() {
      if(isAPIAvailable()) {
        $('#files').bind('change', handleFileSelect);
      }
    });

    function isAPIAvailable() {
      // Check for the various File API support.
      if (window.File && window.FileReader && window.FileList && window.Blob) {
        // Great success! All the File APIs are supported.
        return true;
      } else {
        // source: File API availability - http://caniuse.com/#feat=fileapi
        // source: <output> availability - http://html5doctor.com/the-output-element/
        document.writeln('The HTML5 APIs used in this form are only available in the following browsers:<br />');
        // 6.0 File API & 13.0 <output>
        document.writeln(' - Google Chrome: 13.0 or later<br />');
        // 3.6 File API & 6.0 <output>
        document.writeln(' - Mozilla Firefox: 6.0 or later<br />');
        // 10.0 File API & 10.0 <output>
        document.writeln(' - Internet Explorer: Not supported (partial support expected in 10.0)<br />');
        // ? File API & 5.1 <output>
        document.writeln(' - Safari: Not supported<br />');
        // ? File API & 9.2 <output>
        document.writeln(' - Opera: Not supported');
        return false;
      }
    }

    var files;
      var file;

    function handleFileSelect(evt) {
      files = evt.target.files; // FileList object
      file = files[0];

      // read the file metadata
      var output = ''
          output += '<span style="font-weight:bold;">' + (file.name) + '</span><br />\n';
          output += ' - Tipo de archivo: ' + (file.type || 'n/a') + '<br />\n';
          output += ' - Tamaño de archivo: ' + file.size + ' bytes<br />\n';
          output += ' - Última modificación: ' + (file.lastModifiedDate ? file.lastModifiedDate.toLocaleDateString() : 'n/a') + '<br />\n';

      	$('#list').append(output);
      	$('#procesar').show();
     	
     
    }

    function printTable() {
    	var reader = new FileReader();
    	reader.readAsText(file);
    	reader.onload = function(event){
    		var csv = event.target.result;
      var data = $.csv.toArrays(csv);
      var promises = [];
    	var total_filas=0;
    	var total_inserts=0;
    	var total_errores_no_existe=0;
    	var total_errores=0;
    	var total_filas_sin_info=0;
      var index_inserts=0;
      $('#div-productos').html('');
    	for(var row in data) {
        var html_productos = '';
    		total_filas++;
    		console.log(row);
    		var request = $.ajax({
    			url: '<?= base_url() ?>almacen/procesar_csv_compras',
    			type: 'POST',
    			async:true,
    			dataType: 'json',
    			data: {neodata: data[row][0], cantidad: data[row][5], row:row},
    		})
    		.done(function(datas) {
    			console.log(datas);
          if(datas.error===false){
            index_inserts++;
          html_productos='<div id="item-producto'+index_inserts+'" class="itemproducto productoFieldset" id="productoFieldset'+index_inserts+'">'+
          '<div class="form-row">'+
            '<div class="col">'+          
              '<label>Productos*</label>'+
              '<input class="form-control neodata" autocomplete="off" type="text" value="'+data[datas.row][0]+'" required>'+
              '<input class="form-control producto" id="productos" autocomplete="off" type="hidden" name="producto[]" value="'+datas.idtbl_catalogo+'" required>'+
              '<div class="list-group sugerencias"></div>'+
            '</div>'+
            '<div class="col">'+
              '<label for="cantidad">Cantidad*</label>'+
              '<input type="number" name="cantidad[]" id="cantidad" min="0" step="0.0001" value="'+data[datas.row][5]+'" required class="form-control">'+
            '</div>'+
            '<div class="col">'+
              '<label for="unidad">Unidad</label>'+
              '<input type="text" disabled="true" class="form-control unidad">'+
            '</div>'+
          '</div>'+
          '<br>'+
          '<div class="form-row">'+
            '<div class="col">'+
              '<label for="especificaciones">Descripción</label>'+
              '<input type="text" name="" id="" class="form-control descripcion" value="'+data[datas.row][1]+'" disabled>'+
            '</div>'+
          '</div>'+
          '<br>'+
          '<div class="form-row">'+
            '<div class="col">'+
              '<label for="especificaciones">Especificaciones</label>'+
              '<textarea name="especificaciones[]" id="especificaciones" class="form-control" rows="5"></textarea>'+
            '</div>'+
          '</div>'+
          '<br>'+
          '<div class="form-row" id="div_archivo" style="display: none;">'+
            '<div class="col">'+
              '<label for="archivo">Archivo</label>'+
              '<input type="file" name="archivo" id="archivo" class="form-control">'+
            '</div>'+
          '</div>'+
          '<i class="fa fa-close delete-product" style="display:none"></i>'+
          '<hr>'+
        '</div>';

        $('#div-productos').append(html_productos);
        
          }

    			if(datas.error===true){
    				if(datas.texto=='ya_existe'){
    					total_errores_no_existe++;
    					$('#row-'+datas.row).addClass('table-warning').find('.estatus').html('<strong>Tramo ya existente</stong>');
    				}
    				else if(datas.texto=='no_numerico'){
    					total_filas_sin_info++;
    					$('#row-'+datas.row).addClass('table-danger').find('.estatus').html('<strong>Error de carga</strong>');
    				}
    				else{
    					total_errores++;
    					$('#row-'+datas.row).addClass('table-danger').find('.estatus').html('<strong>Error</stong>');
    				}
    			}else if(datas.error===false){
    				total_inserts++;
    				$('#row-'+datas.row).addClass('table-success').find('.estatus').html('<strong>Carga exitosa</stong>');
    			}
    			else{
    				total_errores++;
    				$('#row-'+datas.row).addClass('table-danger').find('.estatus').html('<strong>Error</stong>');
    			}
    			
    			
    			
    	
    		})
    		.fail(function(jqXHR, textStatus) {
    			Messenger().post({
    				message: "Request failed: " + textStatus + ", intente nuevamente.",
    				type: 'error',
    				showCloseButton: true
    			});
    		})
    		.always(function() {
    	
    		});
    		promises.push( request);
    	}


    	$.when.apply(null, promises).done(function(){

		   	$('.ocultarOnSuccess').hide();
    		Ladda.stopAll();

    		$('#list').show().html('');

    		var output = ''
	        output += '<span style="font-weight:bold;" class="text-success">Carga finalizada</span><br />\n';
	        output += ' - Total de filas insertadas: ' + total_inserts + '<br />\n';
	        output += ' - Total de tramos existentes: ' + total_errores_no_existe + '<br />\n';
	        output += ' - Total de errores: ' + total_errores + '<br />\n';
	        output += ' - Total de filas sin información: ' + total_filas_sin_info + '<br />\n';
	        output += ' - Total de filas leidas: ' + total_filas + '<br />\n';

	        $('#refrescar').show();

	    	$('#list').append(output);
		})


    	};
      


    	reader.onerror = function(){ 
    		Messenger().post({
    			message: 'Unable to read ' + file.fileName,
    			type: 'error',
    			showCloseButton: true
    		}); 
    	};
    }

    function procesar_csv(data) {
    	

    	
    	
    }
  </script>