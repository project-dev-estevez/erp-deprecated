

  <section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
      <div class="row bg-white has-shadow">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-violet"><i class="icon-user"></i></div>
            <div class="title"><span>Consumibles<br><strong>$1,000.00</strong></span>
              <div class="progress">
                <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
              </div>
            </div>
            <div class="number"><strong></strong></div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-red"><i class="icon-padnote"></i></div>
            <div class="title"><span>Materiales<br><strong>1,000.00</strong></span>
              <div class="progress">
                <div role="progressbar" style="width: 70%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
              </div>
            </div>            
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-orange"><i class="icon-check"></i></div>
            <div class="title"><span>Inversión<br><strong>$1,000,000.00</strong></span>
              <div class="progress">
                <div role="progressbar" style="width: 50%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="item d-flex align-items-center">
            <div class="icon bg-green"><i class="icon-bill"></i></div>
            <div class="title"><span>Progreso<br>Proyecto</span>
              <div class="progress">
                <div role="progressbar" style="width: 40%; height: 4px;" aria-valuenow="{#val.value}" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
              </div>
            </div>
            <div class="number"><strong>5%</strong></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h4 class="h4"><?php echo $proyecto->numero_proyecto.' '.$proyecto->nombre_proyecto ?> <small>Creación: <?php echo strftime("%d/%m/%y a las %r",strtotime($proyecto->fecha_creacion)) ?></small></h4>
            </div>
            <div class="card-body">
              <div class="dt-buttons btn-group">
                  <?php if (isset($this->session->userdata('permisos')['proyectos']) && $this->session->userdata('permisos')['proyectos']>2): ?>
                    <a class="btn btn-secondary buttons-pdf buttons-html5 btn-primary" href="<?= base_url() ?>proyectos/editar/<?= $this->uri->segment(3) ?>"><span><i class="fa fa-edit"></i> Editar</span></a>
                  <?php endif ?>
                </div>
                <div class="clearfix"></div><br>
              <div class="row">
                <div class="col">
                  <p class="mb-0 text-gris">Cliente</p>
                  <p><a href="<?php echo base_url().'clientes/detalle/'.$proyecto->uid_cliente ?>"><?php echo $proyecto->razon_social ?></a></p>
                </div>
                <div class="col">
                  <p class="mb-0 text-gris">Fecha de Inicio</p>
                  <p><?php echo ($proyecto->fecha_inicio=='')?'N/A':strftime("%d/%m/%y",strtotime($proyecto->fecha_inicio)) ?></p>
                </div>
                <div class="col">
                  <p class="mb-0 text-gris">Fecha de Finalización</p>
                  <p><?php echo ($proyecto->fecha_termino=='')?'N/A':strftime("%d/%m/%y",strtotime($proyecto->fecha_termino)) ?></p>
                </div>
                
              </div>
              <div class="row">
                <div class="col">
                  <p class="mb-0 text-gris">Dirección</p>
                  <p>
                    <?php echo $proyecto->direccion ?>    
                  </p>        
                </div>
              </div>


              <hr>
              <h3 class="h3">Segmentos de proyecto</h3>
              <table class="table table-bordered">
                <caption>Segmentos</caption>
                <thead>
                  <tr>
                    <th>Segmento</th>
                    <th>Ubicación</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Segmento</th>
                    <th>Ubicación</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php if (count($proyecto->segmentos)>0): ?>
                    <?php foreach ($proyecto->segmentos as $key => $value): ?>
                    <tr>
                    <td><?= $value->segmento ?></td>
                    <td><?= $value->direccion ?></td>
                  </tr>
                  <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="2" align="center">Sin segmentos asignados</td>
                    </tr>
                  <?php endif ?>
                  
                </tbody>
              </table>
            </div>
          </div>
        
      
    </div>
  </section>
