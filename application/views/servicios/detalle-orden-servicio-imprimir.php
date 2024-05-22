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

<div class="container">
  <br><br><br>
  <div class="row">
    <div class="col-md-3">
      <img src="<?= base_url(); ?>img/logo_kuali.png">
    </div>
    <div class="col-md-6">
    </div>
    <div class="col-md-3">
      <p style="text-align: right;"><strong>Contrato:</strong> <?= $orden[0]['contrato'] ?></p>
      <p style="text-align: right;"><strong>No. Orden:</strong> <?= $orden[0]['contrato'] ?></p>
    </div>
  </div>
  <br>
  <table width="100%" class="table table-striped table-sm" style="text-align: center;">
    <tr>
      <td colspan="4" style="text-align: center;"><strong>DATOS DEL CONTRATO</strong></td>
    </tr>
    <tr>
      <td width="80"><strong>Nombre</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['nombre'] ?></td>
      <td width="60"><strong>Teléfono</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['telefono'] ?></td>
    </tr>
    <tr>
      <td><strong>Direccion</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['direccion'] ?></td>
      <td><strong>Celular</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['celular'] ?></td>
    </tr>
    <tr>
      <td><strong>Colonia</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['colonia'] ?></td>
      <td><strong>Latitud</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['latitud'] ?></td>
    </tr>
    <tr>
      <td><strong>Población</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['poblacion'] ?></td>
      <td><strong>Longitud</strong></td>
      <td style="border-bottom: solid 1px;"><?= $orden[0]['longitud'] ?></td>
    </tr>
    <tr>
      <td><strong>Entre Calles</strong></td>
      <td colspan="3" style="border-bottom: solid 1px;"><?= $orden[0]['entre_calles'] ?></td>
    </tr>
  </table>
  <br><br>
  <div class="row">
    <div class="col-md-9">
      <table width="100%" class="table table-striped table-sm">
        <tr>
          <td style="text-align: center;"><strong>SERVICIOS A REALIZAR</strong></td>
        </tr>
        <tr>
          <td style="text-align: center;"><?= $orden[0]['servicios_realizar'] ?></td>
        </tr>
      </table>
    </div>
    <div class="col-md-3">
      <table width="100%" class="table table-striped table-sm" style="text-align: center;">
        <tr>
          <td colspan="2" style="text-align: center;"><strong>SERVICIOS INSTALADOS</strong></td>
        </tr>
        <tr>
          <td><strong>Servicio</strong></td>
          <td>
            <?php if($orden[0]['tipo_servicio'] === 'F.O') { ?>
              <input type="radio" checked> &nbsp;<span class="label-check">F.O</span>
            <?php } ?>
            <?php if($orden[0]['tipo_servicio'] === 'Wireless') { ?>
              <input type="radio" checked> &nbsp;<span class="label-check">Wireless</span>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td><strong>Televisores adicionales</strong></td>
          <td>
            <?= $orden[0]['televisores_adicionales'] ?>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-md-9">
      <table width="100%" class="table table-striped table-sm" style="text-align: center;">
        <tr>
          <td width="100"><strong>Generó orden</strong></td>
          <td><?= $orden[0]['genero_orden'] ?></td>
        </tr>
        <tr>
          <td><strong>Observaciones</strong></td>
          <td><?= $orden[0]['observaciones'] ?></td>
        </tr>
      </table>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <br><br>
  <div class="row">
    <div class="col-md-9">
      <img width="100%" height="300" src="https://maps.geoapify.com/v1/staticmap?style=osm-carto&width=1200&height=400&center=lonlat:<?= $orden[0]['longitud'] ?>,<?= $orden[0]['latitud'] ?>&zoom=16.9358&marker=lonlat:<?= $orden[0]['longitud'] ?>,<?= $orden[0]['latitud'] ?>;color:%23ff0000;size:medium&apiKey=6a1906b697aa419196d138ba2e60b28b">
    </div>
    <?php if($orden[0]['tipo_servicio'] === 'F.O') { ?>
      <div class="col-md-3">
        <table width="100%" class="table table-striped table-sm" style="text-align: center;">
          <tr>
            <td colspan="4" style="text-align: center;"><strong>EQUIPOS INSTALADOS F.O</strong></td>
          </tr>
          <tr>
            <td><strong>Terminal óptica</strong></td>
            <td><?= $orden[0]['terminal_optica'] ?></td>
            <td><strong>Pto</strong></td>
            <td><?= $orden[0]['pto'] ?></td>
          </tr>
          <tr>
            <td><strong>Candado</strong></td>
            <td colspan="3"><?= $orden[0]['candado'] ?></td>
          </tr>
          <tr>
            <td><strong>No. Serie</strong></td>
            <td colspan="3"><?= $orden[0]['no_serie_fo'] ?></td>
          </tr>
          <tr>
            <td><strong>No. GPON</strong></td>
            <td colspan="3"><?= $orden[0]['no_gpon'] ?></td>
          </tr>
          <tr>
            <td><strong>MAC</strong></td>
            <td colspan="3"><?= $orden[0]['mac'] ?></td>
          </tr>
          <tr>
            <td><strong>Ip</strong></td>
            <td colspan="3"><?= $orden[0]['ip_fo'] ?></td>
          </tr>
          <tr>
            <td><strong>CLAVE</strong></td>
            <td colspan="3"><?= $orden[0]['clave'] ?></td>
          </tr>
        </table>
      </div>
    <?php } ?>
    <?php if($orden[0]['tipo_servicio'] === 'Wireless') { ?>
      <div class="col-md-3">
        <table width="100%" class="table table-striped table-sm" style="text-align: center;">
          <tr>
            <td colspan="2" style="text-align: center;"><strong>EQUIPOS INSTALADOS WIRELESS</strong></td>
          </tr>
          <tr>
            <td><strong>TORRE</strong></td>
            <td><?= $orden[0]['torre'] ?></td>
          </tr>
          <tr>
            <td><strong>SECTOR</strong></td>
            <td><?= $orden[0]['sector'] ?></td>
          </tr>
          <tr>
            <td colspan="2" style="text-align: center;"><strong>ANTENA CLIENTE SUSCRIPT MODULE</strong></td>
          </tr>
          <tr>
            <td><strong>No. Serie</strong></td>
            <td><?= $orden[0]['no_serie_wireless'] ?></td>
          </tr>
          <tr>
            <td><strong>MAC ESN</strong></td>
            <td><?= $orden[0]['mac_esn'] ?></td>
          </tr>
          <tr>
            <td><strong>Wireless MAC</strong></td>
            <td><?= $orden[0]['wireless_mac'] ?></td>
          </tr>
          <tr>
            <td><strong>IP</strong></td>
            <td><?= $orden[0]['ip_wireless'] ?></td>
          </tr>
          <tr>
            <td colspan="2"><strong>MODEM</strong></td>
          </tr>
          <tr>
            <td><strong>No. Serie</strong></td>
            <td><?= $orden[0]['no_serie_modem'] ?></td>
          </tr>
          <tr>
            <td><strong>MAC ESN</strong></td>
            <td><?= $orden[0]['mac_esn_modem'] ?></td>
          </tr>
          <tr>
            <td><strong>IP</strong></td>
            <td><?= $orden[0]['ip_modem'] ?></td>
          </tr>
          <tr>
            <td><strong>Password</strong></td>
            <td><?= $orden[0]['password'] ?></td>
          </tr>
        </table>
      </div>
    <?php } ?>
  </div>
  <br>
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
      <table width="100%" class="table table-striped table-sm" style="text-align: center;">
        <tr>
          <td><strong>Potencia</strong></td>
          <td><?= $orden[0]['potencia'] ?></td>
          <td><strong>Cap. de Servicio</strong></td>
          <td><?= $orden[0]['cap_servicio'] ?></td>
        </tr>
      </table>
    </div>
    <div class="col-md-2">
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table width="100%" class="table table-striped table-sm" style="text-align: center;">
        <tr>
          <td><strong>Fecha de llegada al servicio</strong></td>
          <td><?= $orden[0]['fecha_llegada_servicio'] ?></td>
          <td><strong>Hora inicio</strong></td>
          <td><?= $orden[0]['hora_inicio'] ?></td>
          <td><strong>Hora Fin</strong></td>
          <td><?= $orden[0]['hora_fin'] ?></td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-12">
      <table width="100%" class="table table-striped table-sm" style="text-align: center;">
        <tr>
          <td><strong>COMENTARIOS CLIENTE</strong></td>
          <td><strong>COMENTARIOS TÉCNICO</strong></td>
        </tr>
        <tr>
          <td><?= $orden[0]['comentarios_cliente'] == '' ? '--' : $orden[0]['comentarios_cliente'] ?></td>
          <td><?= $orden[0]['comentarios_tecnico'] == '' ? '--' : $orden[0]['comentarios_tecnico'] ?></td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-5">
      <table width="100%">
        <tr>
          <td style="text-align: center;"><img src="<?= base_url() ?>uploads/firmas/<?= $uid ?>fc.png"></td>
        </tr>
      </table>
    </div>
    <div class="col-md-2">
    </div>
    <div class="col-md-5">
      <table width="100%">
        <tr>
          <td style="text-align: center"><img src="<?= base_url() ?>uploads/firmas/<?= $uid ?>ft.png"></td>
        </tr>
      </table>
    </div>
  </div>
  <div class="row">
    <div class="col-md-5">
      <table width="100%">
        <tr>
          <td style="border-top: solid 1px;text-align: center;"><strong>firma del suscriptor</strong></td>
        </tr>
      </table>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-5">
      <table width="100%">
        <tr>
          <td style="border-top: solid 1px;text-align: center;"><strong>firma del tecnico</strong></td>
        </tr>
      </table>
    </div>
  </div>
</div>