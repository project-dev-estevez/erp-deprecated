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
        <?php echo form_open_multipart(base_url().'almacen/guardar-nueva-entrada-autos-control-vehicular', 'class="grid-form needs-validation" novalidate'); ?>
        <fieldset>
          <legend>Detalles de entrada</legend>
          <div data-row-span="3">
            <div data-field-span="1">
              <label>Tipo de Documento*</label>
              <select name="tipo_documento" id="tipo_documento" class="selectpicker" required data-live-search="true">
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
                <input type="text" name="numero_documento" class="mayusculas" required value="<?= set_value('numero_documento')  ?>">
            </div>
            <div data-field-span="1">
                <label>Documento adjunto</label>
                <input type="file" name="documento" value="<?= set_value('documento') ?>">
            </div>
          </div>
        </fieldset>
        <br>
        <fieldset>
          <legend>Productos</legend>
        </fieldset>
        <br>
                    
          <fieldset id="productoFieldset1" class="productoFieldset">
            <div data-row-span="5">
              <div data-field-span="4">
                <label>Producto*</label>
                <select name="producto[]" class="selectpicker producto" required data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($catalogo as $key => $value): ?>
                    <option value="<?php echo $value->idtbl_catalogo ?>" 
                    data-precio="<?php echo $value->precio ?>" 
                    data-moneda="<?php echo $value->tipo_moneda ?>" 
                    data-preciolabel="<?php echo number_format($value->precio,2) . (($value->tipo_moneda=='p') ? ' Pesos' : ' Dolares') ?>" 
                    data-categoria="<?php echo $value->idctl_categorias ?>"><?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?></option>
                  <?php endforeach ?>
                </select>
                <input type="hidden" name="categoria[]" class="categoria" value="">
                <input type="hidden" name="precio[]" class="precio" value="">
                <input type="hidden" name="moneda[]" class="moneda" value="">
              </div>
              <div data-field-span="1">
                  <label>Cantidad</label>
                  <input type="number" name="cantidad[]" class="cantidad" required>
              </div>
            </div>
            <div data-row-span="4" class="campos_ac" style="display: none">
              <div data-field-span="1">
                  <label>Número de Serie</label>
                  <input type="text" name="numero_serie[]" disabled>
              </div>
              <div data-field-span="1">
                  <label>Número Interno</label>
                  <input type="text" name="numero_interno[]" disabled>
              </div>
              <div data-field-span="2">
                  <label>Nota</label>
                  <textarea name="nota[]"></textarea>
              </div> 
            </div>
            <i class="fa fa-close delete-product" style="display:none"></i>
          </fieldset>
        
        <br><br>  
        <div class="clearfix pt-md">
          <div class="pull-right">
            <input type="hidden" name="tipo_entrada" id="tipo_entrada" value="auto">
            <a href="<?php echo base_url().'almacen/detalle/'.$this->uri->segment(3) ?>" class="btn-warning btn">Cancelar</a>
            <button type="button" class="btn-info btn" id="nuevoProducto">Añadir Otro Producto</button>
            <?= form_hidden('segmento', ''); ?>
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
  $(document).on('change', '.producto', function(event) {
    event.preventDefault();
    var _this=$(this).closest('.productoFieldset');
    $(_this).find('.categoria').val($("option:selected", this).data("categoria"));
    $(_this).find('.precio').val($("option:selected", this).data("precio"));
    $(_this).find('.precioLabel').val($("option:selected", this).data("preciolabel"));
    $(_this).find('.moneda').val($("option:selected", this).data("moneda"));
    if($("option:selected", this).data("categoria") == 16 || $("option:selected", this).data("categoria") == 10  ){
      if($("option:selected", this).data('categoria') == 10){
        $('#tipo_entrada').val('tarjeta');
      }
        $(_this).find('.cantidad').attr('readonly', 'readonly').val('1');
        $(_this).find('.campos_ac').show(500);
        $(_this).find('.campos_ac').find('input').removeAttr('disabled').attr('required', 'required');
    }
    // else if($("option:selected", this).data("categoria") == <?= ID_CONSUMIBLE_ALTO_COSTO ?> ){
    //   $(_this).find('.cantidad').removeAttr('readonly').val('');
    //   $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
    //     $(_this).find('.campos_ac').show(500);
    // }
    else {
      $(_this).find('.cantidad').removeAttr('readonly').val('');
      $(_this).find('.campos_ac').hide(500);
      $(_this).find('.campos_ac').find('input').attr('disabled', 'disabled').removeAttr('required');
    }
  });
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