

<section class="forms">
  <div class="container-fluid">


    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Editar Proyecto <?php echo $proyecto->numero_proyecto ?></h4>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <?php echo validation_errors('<span class="text-danger">*', '</span>'); ?><br><br>
        <?php echo form_open(base_url().'proyectos/actualizar-proyecto', 'class="needs-validation" novalidate'); ?>
        <div class="row">
          <div class="form-group col-sm-8">
            <label class="form-control-label">Nombre de Proyecto*</label>
            <input type="text" placeholder="Nombre de Proyecto" name="nombre_proyecto" class="form-control" required value="<?=$proyecto->nombre_proyecto?>">
          </div>
          <div class="form-group col-sm-4">
            <label class="form-control-label">Número de Proyecto*</label>
            <input type="text" placeholder="Número de Proyecto" name="numero_proyecto" class="form-control" required value="<?=$proyecto->numero_proyecto?>">
          </div>
          <div class="form-group col-sm-6">
            <label class="form-control-label">Fecha Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" value="<?= ($proyecto->fecha_inicio!=NULL) ? date("Y-m-d",strtotime($proyecto->fecha_inicio)) : NULL ?>">
          </div>
          <div class="form-group col-sm-6">
            <label class="form-control-label">Fecha Fin o Límite</label>
            <input type="date" class="form-control" name="fecha_termino" value="<?= ($proyecto->fecha_termino!=NULL) ? date("Y-m-d",strtotime($proyecto->fecha_termino)) : NULL ?>">
          </div>

          <div class="form-group col-sm-12">
            <label class="form-control-label">Ubicación</label>
            <textarea class="form-control" name="direccion" rows="3"><?php echo $proyecto->direccion ?></textarea>
          </div>
        </div>



          <h3 class="h3">Segmentos</h3>

          <?php if (count($proyecto->segmentos)>0): ?>            
            <?php foreach ($proyecto->segmentos as $key => $value): ?>
            <div class="row segmentos" id="segmento<?= $key ?>">

               <div class="form-group col-sm-4">
                <label class="form-control-label">Segmento</label>
                <input type="text" class="form-control" name="segmentoanterior[]" value="<?= $value->segmento ?>">
              </div>
              <input type="hidden" class="form-control" name="idsegmento[]" value="<?= $value->idtbl_segmentos_proyecto ?>">
              <div class="form-group col-sm-8">
                <label class="form-control-label">Ubicación</label>
                <input type="text" class="form-control" name="ubicacionanterior[]" value="<?= $value->direccion ?>">
              </div>
             <i class="fa fa-close delete-product" style="display:none"></i>
            </div>
          <?php endforeach ?>
          <div class="row segmentos" id="segmento1">

               <div class="form-group col-sm-4">
                <label class="form-control-label">Segmento</label>
                <input type="text" class="form-control" name="segmento[]" value="">
              </div>
              <div class="form-group col-sm-8">
                <label class="form-control-label">Ubicación</label>
                <input type="text" class="form-control" name="ubicacion[]" value="">
              </div>
             <i class="fa fa-close delete-product" style="display:none"></i>
            </div>
          <?php else: ?>
            <div class="row segmentos" id="segmento1">

               <div class="form-group col-sm-4">
                <label class="form-control-label">Segmento</label>
                <input type="text" class="form-control" name="segmento[]" value="">
              </div>
              <div class="form-group col-sm-8">
                <label class="form-control-label">Ubicación</label>
                <input type="text" class="form-control" name="ubicacion[]" value="">
              </div>
             <i class="fa fa-close delete-product" style="display:none"></i>
            </div>
          <?php endif ?>



        <div class="row">
          <div class="col text-center">
              <span class="fa fa-plus" id="nuevoSegmento" style="background: green;height: 40px;width: 40px;text-align: center;color: #fff;border-radius: 25px;font-size: 25px;line-height: 1.7;cursor: pointer;"></span>
          </div>
        </div>



        <div class="form-group col-12 text-right">
          <?= form_hidden('token',$token) ?>
          <?= form_hidden('uid',$uid) ?>
          <a href="<?php echo base_url() ?>proyectos/detalle/<?php echo $uid ?>" class="btn btn-danger">Cancelar</a>
          <input type="submit" value="Actualizar" class="btn btn-primary">
        </div>
      </div>
      <?=form_close()?>
    </div>
  </div>


</div>
</section>

<script type="text/javascript">
  $('#nuevoSegmento').click(function(event) {
    /* Act on the event */
    var $div = $('[id^="segmento"]:last');


    // Read the Number from that DIV's ID (i.e: 3 from "klon3")
    // And increment that number by 1
    var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

    // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
    var $klon = $div.clone().prop('id', 'segmento' + num);


    $klon.css('display', 'none');

    $div.after($klon);

    $klon.show(500);



    $klon.find('.delete-product').css('display', 'block');

    /*if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        $('.select').selectpicker('mobile');
    }*/
    $klon.find('input').val('');

});

  $(document).on('click', '.delete-product', function() {
    $(this).parents('[id^="segmento"]').remove();
});
</script>
