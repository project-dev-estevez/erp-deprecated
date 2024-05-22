<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url()?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url()?>js/jquery.color.js"></script>
<section class="dashboard-counts no-padding botones">
  <div class="container-fluid">
    <div class="row">
      <div class="col pt-3 pb-1">
        <div class="alert
        <?php if (count($actas)==1): ?>
          alert-info
          <?php elseif(count($actas)==2): ?>
            alert-warning
            <?php elseif(count($actas)>2): ?>
              alert-danger
              <?php else: ?>
              <?php endif ?>
              " role="alert">
              <strong>El personal cuenta con <?php echo count($actas) ?> actas administrativas.</strong>          
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="tables no-padding-top">   
      <div class="container-fluid">
        <div class="row">
         <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xl-3">
          <div class="card">
            <div class="card-body text-center">

             <?php $carpeta = './uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.jpg'; if (!file_exists($carpeta)): ?>
             <img class="img-fluid" src="<?= base_url()?>uploads/default-user-image.png">
             <?php else: ?>
               <img class="img-fluid" src="<?= base_url().'uploads/'.$detalle->uid_usuario.'/'.$detalle->uid_usuario.'-img-credencial.jpg' ?>">
             <?php endif ?>
             <h4 class="h4 mt-3">#<?php echo $detalle->numero_empleado ?></h4>
             <h4 class="h4 mt-2"><?php echo $detalle->nombres.' '.$detalle->apellido_paterno.' '.$detalle->apellido_materno ?> <br>	<small class="text-gris"> Fecha de nacimiento: <?php echo strftime("%d de %b de %Y",strtotime($detalle->fecha_nacimiento)) ?></small></h4>

           </div>
         </div>
       </div>
       <div class="col-12 col-sm-6 col-md-7 col-lg-8 col-xl-9">
        <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4 class="h4">Detalle</h4>
          </div>

          <div class="card-body">
            <table class="table" style="width: 100%">
              <tbody>
                <tr>
                  <td><strong>DC3</strong></td>
                  <td><small class="text-gris">Fecha de expedición</small><br><?= 'date' ?></td>
                  <td><small class="text-gris">Fecha de vencimiento</small><br><?= 'date' ?></td>
                </tr>
                <tr>
                  <td><strong>Certificado Médico</strong></td>
                  <td><small class="text-gris">Fecha de expedición</small><br><?= 'date' ?></td>
                  <td><small class="text-gris">Fecha de vencimiento</small><br><?= 'date' ?></td>
                </tr>
                <tr>
                  <td><strong>Alta IMSS</strong></td>
                  <td><small class="text-gris">Fecha de expedición</small><br><?= 'date' ?></td>
                  <td><small class="text-gris">Fecha de vencimiento</small><br><?= 'date' ?></td>
                </tr>
              </tbody>
            </table>
          </div>
    </div>
  </div>



</div>
</div>
</section>

