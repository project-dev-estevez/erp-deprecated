<!-- Bootstrap CSS-->
<link href="https://getbootstrap.com/docs/4.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<!-- Font Awesome CSS-->
<?php echo link_tag('vendor/font-awesome/css/font-awesome.min.css') ?>
<!-- Fontastic Custom icon font-->
<?php echo link_tag('css/fontastic.css') ?>
<!-- Google fonts - Poppins -->
<!-- Google fonts - Poppins -->
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
    input[type=number] { -moz-appearance:textfield; }
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/datatables.min.css"/>


<!-- theme stylesheet-->
<?php echo link_tag('css/style.css') ?>
<!-- Custom stylesheet - for your changes-->
<?php if($titulo != 'Listado Asignaciones') { ?>
<?php echo link_tag('css/custom.css?v=1.0.1') ?>
<?php } ?>
<?php echo link_tag('css/messenger-theme-air.css') ?>
<?php echo link_tag('css/gridforms.css') ?>
<?php echo link_tag('css/bootstrap-tagsinput.css') ?>
<?php echo link_tag('css/ladda-themeless.min.css') ?>
<?php echo link_tag('vendor/fullcalendar/fullcalendar.min.css') ?>

<!-- Favicon-->
<?php echo link_tag('img/favicon.ico', 'shortcut icon', 'image/ico'); ?>
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
<script type="text/javascript">var base_url = '<?= base_url() ?>';</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<section class="forms">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-body">
        <?= form_open('servicios/actualizar_material', 'class="grid-form needs-validation" novalidate'); ?>
          <div class="clearfix pt-md">
            <div class="row">
              <div class="col-sm-3">
              </div>
              <div class="col-sm-6">
              <?php if($tipo_servicio == 'F.O') { ?>
              <input type="hidden" value="<?= $uid ?>" name="uid">
              <input type="hidden" value="<?= $tipo_servicio ?>" name="tipo_servicio">
              <h4 class="text-center">Fibra Óptica</h4>
              <table class="table table-bordered">
                <thead class="text-center">
                  <tr>
                    <th width="300">Descripción</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($materiales as $material) { ?>
                  <tr>
                    <input type="hidden" name="iddtl_solicitud_material_orden_servicio[]" value="<?= $material->iddtl_solicitud_material_orden_servicio ?>">
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->descripcion ?>' name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->unidad ?>' name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>" name="cantidad[]"></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } ?>
              <?php if($tipo_servicio == 'Wireless') { ?>
              <input type="hidden" value="<?= $uid ?>" name="uid">
              <input type="hidden" value="<?= $tipo_servicio ?>" name="tipo_servicio">
              <h4 class="text-center">Wireless</h4>
              <table class="table table-bordered">
                <thead class="text-center">
                  <tr>
                    <th width="300">Descripción</th>
                    <th>Unidad</th>
                    <th>Cantidad</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php foreach($materiales as $material) { ?>
                  <tr>
                    <input type="hidden" name="iddtl_solicitud_material_orden_servicio[]" value="<?= $material->iddtl_solicitud_material_orden_servicio ?>">
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->descripcion ?>' name="descripcion[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value='<?= $material->unidad ?>' name="unidad[]"></td>
                    <td><input style="font-size: 10px;text-align: center;" class="form-control" type="text" value="<?= $material->cantidad ?>" name="cantidad[]"></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <?php } ?>
              </div>
              <div class="col-sm-3">
              </div>
            </div>
          </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
</section>
