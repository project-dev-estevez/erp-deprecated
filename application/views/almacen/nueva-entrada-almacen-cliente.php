<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Nueva Entrada </h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<p class="text-danger">*Adjunte sus archivos nuevamente.</p><p class="text-danger">', '</p>'); ?>
        <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada-almacen-cliente', 'class="grid-form needs-validation form" novalidate'); ?>
        <input type="hidden" name="uid_almacen" value="<?= $uid_almacen; ?>">
        <fieldset>
          <legend>Detalles de entrada</legend>
          <?php if($this->session->userdata('id') != 36){ ?>
          <div data-row-span="3">
            <div data-field-span="1">
              <label>Tipo de Documento*</label>
              <select name="tipo_documento" id="tipo_documento" class="selectpicker" data-live-search="true">
                <?php if (!set_value('tipo_documento')): ?>
                  <option value="" selected="selected" disabled="disabled">Seleccione...</option>
                <?php endif ?>
                <?php foreach ($tipo_documentos as $key => $value): ?>                    
                  <?php if ($value->idctl_tipo_documento=='4'): ?>
                    <?php if ($this->session->userdata('perfil')=='Root'): ?>
                      <option value="<?php echo $value->idctl_tipo_documento ?>" <?php echo set_select('tipo_documento', $value->idctl_tipo_documento); ?>><?php echo $value->tipo_documento ?></option>
                    <?php endif ?>
                  <?php else: ?>
                    <option value="<?php echo $value->idctl_tipo_documento ?>" <?php echo set_select('tipo_documento', $value->idctl_tipo_documento); ?>><?php echo $value->tipo_documento ?></option>
                  <?php endif ?>
                <?php endforeach ?>
              </select>
            </div>
            <div data-field-span="1">
                <label>Número de Documento*</label>
                <input type="text" name="numero_documento" class="mayusculas" value="<?= set_value('numero_documento')  ?>">
            </div>
            <div data-field-span="1">
                <label>Documento adjunto</label>
                <input type="file" name="documento" value="<?= set_value('documento') ?>">
            </div>
          </div>
        </fieldset>
        <?php if ($this->session->userdata('tipo') != 17) { ?>
        <fieldset id="proyectoFieldset1" class="proyectoFieldset">
          <div data-row-span="5">
            <div data-field-span="4">
            <?php if($this->session->userdata('tipo') != 19){ ?>
              <label>Proyecto*</label>
              <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($proyectos as $key => $value): ?>
                  <option value="<?php echo $value->idtbl_proyectos ?>"
                    data-direccion="<?php echo $value->direccion ?>">
                    <?php echo $value->numero_proyecto ?> -
                    <?php echo substr($value->nombre_proyecto, 0, 70) ?>
                  </option>
                <?php endforeach ?>
              </select>
              <?php }else{ ?>
              <label>Sitio</label>
              <input type="text" name="sitio" placeholder="Sitio" <?= $this->session->userdata('id') == 150 ? '' : 'required' ?> class="form-control">   
              <?php } ?>
            </div>            
            <div data-field-span="1">
              <label>Segmento*</label>
              <select name="segmento" id="ssegmento" class="selectpicker segmento" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php foreach ($listadoSegmentos as $key => $value): ?>
                  <?php if(isset($value->idtbl_segmentos_proyecto)) { ?>
                  <option value="<?= $value->idtbl_segmentos_proyecto ?>">
                    <?php echo $value->segmento ?>
                  </option>
                  <?php } else { ?>
                  <option value="">
                    <?php echo $value->direccion ?> 
                  </option>
                  <?php } ?>
                <?php endforeach ?>
              </select>
            </div>
          </div>
        </fieldset>
                <?php } else { ?>
        <input name="proyecto" id="proyecto" type="hidden" value="<?= $proyecto_almacen[0]->idtbl_proyectos ?>">
                <?php } ?>
        <br>
        <br>
        <hr>
        <?php } ?>
        <fieldset>
          <legend>Productos</legend>
        </fieldset>
        <?php if (set_value('producto')): ?>
          <?php $alto_costo=false ?>
          <?php $contador_alto_costo=0 ?>
          <?php foreach (set_value('producto') as $key => $value): ?>
            <fieldset id="productoFieldset<?= $key+1 ?>" class="productoFieldset">
              <div data-row-span="5">
                <div data-field-span="4">
                  <label>Producto*</label>
                  <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                    <?php foreach ($catalogo as $subkey => $subvalue): ?>
                      <option 
                      value="<?php echo $subvalue->idtbl_catalogo ?>" 
                      <?php if($value==$subvalue->idtbl_catalogo) {
                        echo 'selected';
                        $alto_costo = ($subvalue->idctl_categorias==ID_HERRAMIENTA_ALTO_COSTO || $subvalue->idctl_categorias==ID_HERRAMIENTA_HILTI || $subvalue->idctl_categorias==ID_HERRAMIENTA_MEDIANO_COSTO) ? true : false ;
                      } ?>
                      data-precio="<?php echo $subvalue->precio ?>"
                      data-moneda="<?php echo $subvalue->tipo_moneda ?>" 
                      data-preciolabel="<?php echo number_format($subvalue->precio,2) . (($subvalue->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>"
                      data-categoria="<?php echo $subvalue->idctl_categorias ?>"><?php echo $subvalue->uid.' '.$subvalue->marca.' '.$subvalue->modelo.' (' . substr($subvalue->descripcion, 0, 70) . ')'?>
                      </option>
                    <?php endforeach ?>
                  </select>
                  <input type="hidden" name="categoria[]" class="categoria" value="<?php echo set_value('categoria')[$key] ?>">
                  <input type="hidden" name="precio[]" class="precio" value="<?= set_value('precio')[$key] ?>">
                  <input type="hidden" name="moneda[]" class="moneda" value="<?= set_value('moneda')[$key] ?>">                  
                </div>
                <div data-field-span="1">
                    <label>Cantidad*</label>
                    <input type="number" step="0.0001" name="cantidad[]" class="cantidad" required value="<?= set_value('cantidad')[$key] ?>">
                </div>
              </div>
              <?php if ($alto_costo): ?>
                <div data-row-span="4" class="campos_ac">
                  <div data-field-span="1">
                      <label>Número de Serie</label>
                      <input type="text" name="numero_serie[]" required value="<?= set_value('numero_serie')[$contador_alto_costo] ?>">
                  </div>
                  <div data-field-span="1">
                      <label>Número Interno</label>
                      <input type="text" name="numero_interno[]" required value="<?= set_value('numero_interno')[$contador_alto_costo] ?>">
                  </div>
                  <div data-field-span="2">
                      <label>Nota</label>
                      <textarea name="nota[]"><?= set_value('nota')[$contador_alto_costo] ?></textarea>
                  </div> 
                </div>
                <?php $contador_alto_costo++ ?>
                <?php $alto_costo=false ?>
              <?php endif ?>
              <i class="fa fa-close delete"></i>           
            </fieldset>
          <?php endforeach ?>
        <?php else: ?>            
          <fieldset id="productoFieldset1" class="productoFieldset">
            <div data-row-span="6">
              <div data-field-span="2">
                <!---<label>Productooo*</label>
                <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($catalogo as $key => $value): ?>
                    <option value="<?php echo $value->idtbl_catalogo ?>" 
                    data-precio="<?php echo $value->precio ?>" 
                    data-moneda="<?php echo $value->tipo_moneda ?>"
                    data-idtblcatalogo="<?= $value->idtbl_catalogo ?>"
                    data-preciolabel="<?php echo number_format($value->precio,2) . (($value->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>" 
                    data-categoria="<?php echo $value->idctl_categorias ?>"><?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr($value->descripcion,0,60).')' ?></option>
                  <?php endforeach ?>
                </select>-->
                <label>Producto*</label>
                <input class="form-control neodata" autocomplete="off" type="text" required>
                <input class="form-control producto" autocomplete="off" type="hidden" name="producto[]" required>
                <div class="list-group sugerencias"></div>
                <input type="hidden" name="categoria[]" class="categoria" value="">
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 4){ ?>
                <input type="hidden" name="catalogo[]" class="catalogo" value="">
                <?php } ?>
                <!--<input type="hidden" name="precio[]" class="precio" value="">
                <input type="hidden" name="moneda[]" class="moneda" value="">-->
              </div>
              <div data-field-span="1">
                  <label>Cantidad</label>
                  <input type="number" step="0.0001" name="cantidad[]" class="cantidad" required>
              </div>
              <div data-field-span="1">
                  <label>Unidad</label>
                  <input type="text" name="unidad[]" class="unidad" required readonly>
              </div>
              <div data-field-span="1">
                  <label>Precio</label>
                  <input type="number" step="0.0001" name="precio[]" class="precio">
              </div>
              <div data-field-span="1">
                <label>Tipo de Moneda*</label><select name="moneda[]" data-producto="'+elemento.iddtl_solicitud_catalogo+'" class="form-control moneda-select" required><option value="" disabled selected>Seleccione...</option><option value="p">Pesos</option><option value="d">Dolares</option></select>
              </div>
              <!--<div data-field-span="5">
                <label>Sitio*</label>
                <input type="text" name="sitio[]" class="sitio" required>
              </div>-->
            </div>
            <div data-row-span="6">
            <div data-field-span="2">
                  <label>Nota</label>
                  <textarea name="nota[]"></textarea>
              </div>
            </div>
            <div data-row-span="4" class="campos_ac" style="display: none">
              <div data-field-span="2">
                  <label>Número de Serie</label>
                  <input type="text" name="numero_serie[]" disabled>
              </div>
              <div data-field-span="2">
                  <label>Número Interno</label>
                  <input type="text" name="numero_interno[]" disabled>
              </div>
              <!--<div data-field-span="2">
                  <label>Nota</label>
                  <textarea name="nota[]"></textarea>
              </div>-->
            </div>
            <i class="fa fa-close delete-product" style="display:none"></i>
          </fieldset>
        <?php endif ?>
        <br><br>  
        <?php if(isset($_GET['aux'])) { ?>
          <input type="hidden" name="aux" value="true">
        <?php } ?>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <a href="<?php echo base_url().'almacen/detalle_almc/'.$this->uri->segment(3) ?>" class="btn-warning btn">Cancelar</a>
            <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>
            <?= form_hidden('token',$token) ?>
            <button type="submit" class="btn-primary btn">Guardar Datos</button>
          </div>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>


<script>
  /*$(document).on('change', '.productooo', function(event) {
      event.preventDefault();
      var _this=$(this).closest('.productoFieldset');
      $(_this).find('.categoria').val($("option:selected", this).data("categoria"));
      $(_this).find('.catalogo').val($("option:selected", this).data("idtblcatalogo"));
      $(_this).find('.precio').val($("option:selected", this).data("precio"));
      $(_this).find('.precioLabel').val($("option:selected", this).data("preciolabel"));
      $(_this).find('.moneda').val($("option:selected", this).data("moneda"));
      <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
        if($("option:selected", this).data("idtblcatalogo") == 19420 || $("option:selected", this).data("idtblcatalogo") == 25053 || $("option:selected", this).data("idtblcatalogo") == 25054 || $("option:selected", this).data("idtblcatalogo") == 19955 || $("option:selected", this).data("idtblcatalogo") == 19421 || $("option:selected", this).data("idtblcatalogo") == 24792 || $("option:selected", this).data("idtblcatalogo") == 24793 || $("option:selected", this).data("idtblcatalogo") == 19428 || $("option:selected", this).data("idtblcatalogo") == 19429){
          $(_this).find('.cantidad').attr('readonly', 'readonly').val('1');
          $(_this).find('.campos_ac').show(500);
          $(_this).find('.campos_ac').find('input').removeAttr('disabled');//.attr('required', 'required');
        }else {
        $(_this).find('.cantidad').removeAttr('readonly').val('');
        $(_this).find('.campos_ac').hide(500);
        $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
      }
      <?php } else { ?>
        //|| $("option:selected", this).data("categoria") == 10 -> se quito para dar entrada herramienta
        if($("option:selected", this).data("categoria") == 7 || $("option:selected", this).data("categoria") == 16 || $("option:selected", this).data("categoria") == 17 || $("option:selected", this).data("idtblcatalogo") == 19420 || $("option:selected", this).data("idtblcatalogo") == 19421 || $("option:selected", this).data("idtblcatalogo") == 19428 || $("option:selected", this).data("idtblcatalogo") == 19429 || $("option:selected", this).data("idtblcatalogo") == 22763 || $("option:selected", this).data("idtblcatalogo") == 24792 || $("option:selected", this).data("idtblcatalogo") == 24793 || $("option:selected", this).data("idtblcatalogo") == 25053 || $("option:selected", this).data("idtblcatalogo") == 22124 || $("option:selected", this).data("idtblcatalogo") == 22882 || $("option:selected", this).data("idtblcatalogo") == 22463 || $("option:selected", this).data("idtblcatalogo") == 22918){
          $(_this).find('.cantidad').attr('readonly', 'readonly').val('1');
          $(_this).find('.campos_ac').show(500);
          $(_this).find('.campos_ac').find('input').removeAttr('disabled').attr('required', 'required');
        } else {
        $(_this).find('.cantidad').removeAttr('readonly').val('');
        $(_this).find('.campos_ac').hide(500);
        $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
      }
      <?php } ?>
      // else if($("option:selected", this).data("categoria") == <?= ID_CONSUMIBLE_ALTO_COSTO ?> ){
      //   $(_this).find('.cantidad').removeAttr('readonly').val('');
      //   $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
      //     $(_this).find('.campos_ac').show(500);
      // }
      
  });*/
  $('#nuevoProducto').click(function(event) {
    /* Act on the event */
    var $div = $('fieldset[id^="productoFieldset"]:last');
    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'productoFieldset'+num );
    $klon.css('display', 'none');
    $div.after( $klon);
    $klon.show(500);
    $klon.find('.bootstrap-select').replaceWith(function() { return $('select', this); });
    $klon.find('.cantidad').removeAttr('disabled');
    $klon.find('.campos_ac').css('display', 'none');
    $klon.find('.delete-product').css('display', 'block');
    $('#productoFieldset'+num+' .selectpicker').selectpicker();
    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.select').selectpicker('mobile');
    }*/
    $klon.find('input').val('');
  });
  $(document).on('click','.delete-product', function () {
      $(this).parents('fieldset[id^="productoFieldset"]').remove();
  });
</script>
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
        var registros = eval(r);
        if(registros.length == 0) {
          //alert('null');
          $('#ssegmento').append($('<option>', { 
            value : '',
            text : $("#selectProyecto").find(':selected').data('direccion')
          }));
          $('#ssegmento').selectpicker('refresh');
          return;
        }
        html = "";
        for(i = 0; i < registros.length; i++) {
          //html += "<option>"+registros[i]['segmento']+"</option>";
          $('#ssegmento').append($('<option>', { 
            value: registros[i]['idtbl_segmentos_proyecto'],
            text : registros[i]['segmento']
          }));
        
        }
        $('#ssegmento').selectpicker('refresh');
      }
    })
  });

  $(document).on('submit', '.form', function (event) {
    $(this).find("button[type='submit']").prop("disabled", "true");
  })

  /* ********** Eventos Busqueda Productos ********** */
  $("body").on('keyup', ".neodata", function(event) {
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    var neodata = element.val();
    var dataString = 'neodata=' + neodata;
    var cliente = <?= $proyecto_almacen[0]->tbl_clientes_idtbl_clientes ?>;
    if(cliente == 3){
      tipo = 'ZTE';
    }else{
      tipo = null;
    }
    $.ajax({
        type: "POST",
        url: "<?= base_url(); ?>/almacen/getCatalogoPorNeodata",
        data: dataString + '&tipo=' + tipo,
        dataType: "json",
        success:function(data) {
            parent = element.closest("div");
            filas = "";
            $.each(data, function(key, item) {
                filas += "<div><a class='elemento-sugerido list-group-item' data-idtblcatalogo='" + item.idtbl_catalogo + "' data='" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60) + ")" + "' data-precio='" + item.precio + "' data-unidad='" + item.unidad_medida + "' data-moneda='" + item.tipo_moneda +"' data-preciolabel='" + parseFloat(item.precio).toFixed(2) + (item.tipo_moneda == "p" ? ' Pesos' : ' Dolares') + "' data-categoria='" + item.ctl_categorias_idctl_categorias + "'>" + item.neodata + " " + item.marca + " " + item.modelo + " (" + item.descripcion.substr(0,60) + ")" + "</a></div>";
            });
            parent.find('.sugerencias').fadeIn(1000).html(filas);
            parent.find('.elemento-sugerido').on('click', function(){
                $(_this).find('.categoria').val($(this).data("categoria"));
                $(_this).find('.catalogo').val($(this).data("idtblcatalogo"));
                $(_this).find('.precio').val($(this).data("precio"));
                $(_this).find('.unidad').val($(this).data("unidad"));
                $(_this).find('.precioLabel').val($(this).data("preciolabel"));
                $(_this).find('.moneda').val($(this).data("moneda"));
                <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                  if($(this).data("idtblcatalogo") == 19420 || $(this).data("idtblcatalogo") == 25053 || $(this).data("idtblcatalogo") == 25054 || $(this).data("idtblcatalogo") == 19955 || $(this).data("idtblcatalogo") == 19421 || $(this).data("idtblcatalogo") == 24792 || $(this).data("idtblcatalogo") == 24793 || $(this).data("idtblcatalogo") == 19428 || $(this).data("idtblcatalogo") == 19429){
                    $(_this).find('.cantidad').attr('readonly', 'readonly').val('1');
                    $(_this).find('.campos_ac').show(500);
                    $(_this).find('.campos_ac').find('input').removeAttr('disabled');//.attr('required', 'required');
                  }else {
                    $(_this).find('.cantidad').removeAttr('readonly').val('');
                    $(_this).find('.campos_ac').hide(500);
                    $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
                  }
                <?php } else { ?>
                  //|| $("option:selected", this).data("categoria") == 10 -> se quito para dar entrada herramienta
                  if($(this).data("categoria") == 7 || $(this).data("categoria") == 16 || $(this).data("categoria") == 17 || $(this).data("idtblcatalogo") == 19420 || $("option:selected", this).data("idtblcatalogo") == 19421 || $(this).data("idtblcatalogo") == 19428 || $(this).data("idtblcatalogo") == 19429 || $(this).data("idtblcatalogo") == 22763 || $(this).data("idtblcatalogo") == 24792 || $(this).data("idtblcatalogo") == 24793 || $(this).data("idtblcatalogo") == 25053 || $(this).data("idtblcatalogo") == 22124 || $(this).data("idtblcatalogo") == 22882 || $(this).data("idtblcatalogo") == 22463 || $(this).data("idtblcatalogo") == 22918){
                    $(_this).find('.cantidad').attr('readonly', 'readonly').val('1');
                    $(_this).find('.campos_ac').show(500);
                    $(_this).find('.campos_ac').find('input').removeAttr('disabled').attr('required', 'required');
                  } else {
                    $(_this).find('.cantidad').removeAttr('readonly').val('');
                    $(_this).find('.campos_ac').hide(500);
                    $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
                  }
                <?php } ?>
                //Obtenemos la id unica de la sugerencia pulsada
                var idtbl_catalogo = $(this).data("idtblcatalogo");
                var descripcion = $(this).attr('data');
                //Editamos el valor del input con data de la sugerencia pulsada
                parent.find('.neodata').val(descripcion);
                parent.find('.producto').val(idtbl_catalogo);
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
      $(_this).find('.categoria').val("");
      $(_this).find('.catalogo').val("");
      $(_this).find('.precio').val("");
      $(_this).find('.unidad').val("");
      $(_this).find('.precioLabel').val("");
      $(_this).find('.moneda').val("");
      $(_this).find('.cantidad').removeAttr('readonly').val('');
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
    }
  });

  $("body").on('blur', ".neodata", function(event){
    var element = $(this);
    var _this=$(this).closest('.productoFieldset');
    if($(_this).find('.catalogo').val() == ""){
      element.val("");
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