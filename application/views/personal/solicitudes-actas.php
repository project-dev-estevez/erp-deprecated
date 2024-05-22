<?php if ($this->session->userdata('tipo') != 11 || ($this->session->userdata('tipo') == 4 && $permisos > 1)) { ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <?php if ($clase_pagina == 'solicitudes-almacen' && $this->session->userdata('id')!=59 && $this->session->userdata('tipo')!=14 && $this->session->userdata('tipo') != 15) { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-almacen" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud<br>Almacen General</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if ($this->session->userdata('tipo') != 12 && $clase_pagina == 'solicitudes-almacen' && $this->session->userdata('id')!=59 && $this->session->userdata('tipo')!=14 && $this->session->userdata('tipo') != 15) { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-almacen-seguridad" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud<br>Seguridad e Higiene</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <?php if (@$this->session->userdata('permisos')['solicitud_kuali_digital'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-kuali-digital" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud<br>Kuali Digital</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if ($this->session->userdata('tipo') != 12 && ($this->session->userdata('tipo') != 5 || $this->session->userdata('id')==2) && $clase_pagina == 'solicitudes-almacen' && $this->session->userdata('id')!=59 && $this->session->userdata('tipo')!=14 && $this->session->userdata('tipo') != 15) { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-alto-costo" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud<br>Alto Costo</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if (isset($this->session->userdata('permisos')['solicitud_auto_control_vehicular']) && $this->session->userdata('permisos')['solicitud_auto_control_vehicular'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-auto-control-vehicular" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br> Solicitud <br>Auto Control Vehicular</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if (isset($this->session->userdata('permisos')['solicitud_refacciones_control_vehicular']) && $this->session->userdata('permisos')['solicitud_refacciones_control_vehicular'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-refacciones-control-vehicular" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br> Solicitud <br>Refacciones Control Vehicular</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if (@$this->session->userdata('permisos')['solicitud_area_medica'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-area-medica" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br> Solicitud<br>Área Médica</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if (isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-sistemas" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br> Solicitud<br>Sistemas</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
        <!-- Item -->
        <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/solicitud-tarjetas" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br> Solicitud<br>Tarjetas</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <?php } ?>
        <!-- Item -->
      </div>
    </div>
  </section>
<?php } ?>

<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de almacén</h3><!--Amaranta-->
      </div>
      <div class="card-body">
        <?php if ($clase_pagina != 'solicitudes-almacen' && $this->session->userdata('tipo') == 2) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <?php if (isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn active" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                  Sistemas
                </a>
              </li>
            <?php } ?>
          </ul>
        <?php } ?>
        <?php if ($clase_pagina == 'solicitudes-almacen' && $this->session->userdata('tipo') == 15) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <?php if (isset($this->session->userdata('permisos')['solicitud_refacciones_control_vehicular']) && $this->session->userdata('permisos')['solicitud_refacciones_control_vehicular'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link btn active" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                  Refacciones Control Vehicular
                </a>
              </li>
            <?php } ?>          
          </ul>
        <?php } ?>
        <?php if ($clase_pagina != 'solicitudes-almacen' && $this->session->userdata('tipo') == 3) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="true">
                Control Vehicular
              </a>
            </li>
            <?php if (isset($this->session->userdata('permisos')['solicitud_refacciones_control_vehicular']) && $this->session->userdata('permisos')['solicitud_refacciones_control_vehicular'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                  Refacciones Control Vehicular
                </a>
              </li>
            <?php } ?>  
            <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
                  Tarjetas
                </a>
              </li>
            <?php } ?>
          </ul>
        <?php } ?>
        <?php if ($this->session->userdata('tipo') == 11) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                Almacen general
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
                Alto costo
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                Control Vehicular
              </a>
            </li>
            <?php if ($this->session->userdata('id') == 48) { ?>
              <li class="nav-item">
              <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                Kuali Digital
              </a>
            </li>
            <?php } ?>
            <?php if (isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                  Sistemas
                </a>
              </li>
            <?php } ?>
            <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
                  Tarjetas
                </a>
              </li>
            <?php } ?>
            <?php if($this->session->userdata('id') == 37 || $this->session->userdata('id') == 36) { ?>
              <li class="nav-item">
              <a class="nav-link btn" id="pills-marco-tab" data-toggle="pill" href="#pills-marco" role="tab" aria-controls="pills-marco" aria-selected="true">
                Solicitudes Marco
              </a>
            </li>
            <?php } ?>          
          </ul>
        <?php } ?>
        <?php if (($this->session->userdata('tipo') == 10 || $this->session->userdata('tipo') == 12 || $this->session->userdata('tipo') == 9 || ($this->session->userdata('encargado_almacen') != null && $this->session->userdata('encargado_almacen') != '') || $this->session->userdata('tipo') == 17 || ($this->session->userdata('tipo') == 3 && $clase_pagina == 'solicitudes-almacen') || ($this->session->userdata('tipo') == 2 && $clase_pagina == 'solicitudes-almacen') || $this->session->userdata('tipo') == 5 || $this->session->userdata('tipo') == 8) && $this->session->userdata('id')!=59) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                Almacen general
              </a>
            </li>
            <?php if ($this->session->userdata('encargado_almacen') == null || $this->session->userdata('encargado_almacen') == '') { ?>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="false">
                Alto costo
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                Kuali Digital
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                Control Vehicular
              </a>
            </li> 
            <?php } ?>
            
            <?php if (isset($this->session->userdata('permisos')['solicitud_refacciones_control_vehicular']) && $this->session->userdata('permisos')['solicitud_refacciones_control_vehicular'] == 2) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                  Refacciones Control Vehicular
                </a>
              </li>
            <?php } ?>
            <?php if (isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                  Sistemas
                </a>
              </li>
            <?php } ?>   
            <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
                  Tarjetas
                </a>
              </li>
            <?php } ?>         
          </ul>
        <?php } ?>

        <?php if ((($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6) && $this->session->userdata('id')!=50)) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                Almacen general
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-higiene-tab" data-toggle="pill" href="#pills-higiene" role="tab" aria-controls="pills-higiene" aria-selected="false">
                Seguridad e Higiene
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                Refacciones Control Vehicular
              </a>
            </li>
            <?php if($this->session->userdata('tipo') == 4){ ?>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-reynosas-tab" data-toggle="pill" href="#pills-reynosas" role="tab" aria-controls="pills-reynosas" aria-selected="false">
                98.00
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-villa-tab" data-toggle="pill" href="#pills-villa" role="tab" aria-controls="pills-villa" aria-selected="false">
                87.07
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-86-tab" data-toggle="pill" href="#pills-86" role="tab" aria-controls="pills-86" aria-selected="false">
                86.02-05
              </a>
            </li>
            <?php if ($clase_pagina == 'solicitudes-almacen' && $this->session->userdata('tipo') == 4) { ?>
            <?php if ((isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] > 0) || $this->session->userdata('id') == 3) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                  Sistemas
                </a>
              </li>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php if (isset($this->session->userdata('permisos')['solicitud_auto_control_vehicular']) && $this->session->userdata('permisos')['solicitud_auto_control_vehicular'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                  Control Vehicular
                </a>
              </li>
            <?php } ?>            
          </ul>
        <?php } ?>

        <?php if (($this->session->userdata('tipo') == 4 && $this->session->userdata('id')==50) || ($this->session->userdata('id')==59)) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="true">
                Kuali Digital
              </a>
            </li>
          </ul>
        <?php } ?>

        <?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 6 && $this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 3 && $this->session->userdata('tipo') != 2 && $this->session->userdata('tipo') != 10 && $this->session->userdata('tipo') != 11 && $this->session->userdata('tipo') != 12 && $this->session->userdata('tipo') != 9 && $this->session->userdata('tipo') != 5 && $this->session->userdata('tipo') != 8 && $this->session->userdata('tipo') != 14 && $this->session->userdata('tipo') != 15 && ($this->session->userdata('encargado_almacen') == null && $this->session->userdata('encargado_almacen') == '')) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-devolucion-tab" data-toggle="pill" href="#pills-devolucion" role="tab" aria-controls="pills-devolucion" aria-selected="true">
                Alto costo
              </a>
            </li>
            <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                  Almacen general
                </a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                Kuali Digital
              </a>
            </li>
            <?php if (isset($this->session->userdata('permisos')['solicitud_auto_control_vehicular']) && $this->session->userdata('permisos')['solicitud_auto_control_vehicular'] == 2 && $clase_pagina == 'solicitudes-almacen') { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                  Control Vehicular
                </a>
              </li>
            <?php } ?>
            <?php if ((isset($this->session->userdata('permisos')['solicitud_sistemas']) && $this->session->userdata('permisos')['solicitud_sistemas'] > 0) || $this->session->userdata('id') == 3) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                  Sistemas
                </a>
              </li>
            <?php } ?>
            <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
              <li class="nav-item">
                <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
                  Tarjetas
                </a>
              </li>
            <?php } ?> 
          </ul>
        <?php } ?>

        <?php if ($this->session->userdata('tipo') == 14 ) { ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-medica-tab" data-toggle="pill" href="#pills-medica" role="tab" aria-controls="pills-medica" aria-selected="true">
                Área Médica
              </a>
            </li>           
          </ul>
        <?php } ?>

        <div class="tab-content" id="pills-tabContent">
          <!--tab de sistemas-->
            <?php if($this->session->userdata('tipo') == 2 && $clase_pagina != 'solicitudes-almacen') { ?>
            <div class="tab-pane fade show active" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
            <?php } else { ?>
            <div class="tab-pane fade" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
            <?php } ?>
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
              </div>
              <div class="table-responsive">
                <table id="tbsolicitudessistemas" class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Creación</th>
                      <th>Creado por</th>
                      <th>Aprobación PM</th>
                      <th>Fecha Aprobación PM</th>
                      <th>Aprobación CO</th>
                      <th>Fecha Aprobación CO</th>
                      <th>Aprobación S</th>
                      <th>Fecha Aprobación S</th>
                      <th>Recibe</th>
                      <th>Proyecto</th>
                      <th>Estatus</th>
                      <th>Progreso</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>UID</th>
                      <th>Creación</th>
                      <th>Creado por</th>
                      <th>Aprobación PM</th>
                      <th>Fecha Aprobación PM</th>
                      <th>Aprobación CO</th>
                      <th>Fecha Aprobación CO</th>
                      <th>Aprobación S</th>
                      <th>Fecha Aprobación S</th>
                      <th>Recibe</th>
                      <th>Proyecto</th>
                      <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                        <th width="120">
                          <select name="selectSis" style="font-size: 10px;" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="SSis">Surtida</option>
                            <option value="SU Sis">Aprobada por S</option>
                            <option value="cancelada Sis">Cancelada S</option>
                            <option value="Sis">Pendiente Aprobación S</option>
                            <option value="SU A">Pendiente Entrega</option>
                          </select>
                        </th>
                      <?php } ?>
                      <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                        <th>Estatus</th>
                      <?php } ?>
                      <th>Progreso</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                   
                  </tbody>
                </table>
                <br>
                <div class="paginacion7">
                </div>
              </div>
            </div>
          <!--fin de tab de sistemas-->

          <!--tab de marco-->
          <?php if($this->session->userdata('id') == 37 || $this->session->userdata('id') == 36) { ?>
            
            <div class="tab-pane fade" id="pills-marco" role="tabpanel" aria-labelledby="pills-marco-tab">
       
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda20">
              </div>
              <div class="table-responsive">
                <table id="tbsolicitudesmarco" class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th>UID</th>
                      <th>Creación</th>
                      <th>Creado por</th>
                      <th>Aprobación PM</th>
                      <th>Fecha Aprobación PM</th>
                      <th>Aprobación CO</th>
                      <th>Fecha Aprobación CO</th>
                      <th>Aprobación S</th>
                      <th>Fecha Aprobación S</th>
                      <th>Recibe</th>
                      <th>Proyecto</th>
                      <th>Estatus</th>
                      <th>Progreso</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>UID</th>
                      <th>Creación</th>
                      <th>Creado por</th>
                      <th>Aprobación PM</th>
                      <th>Fecha Aprobación PM</th>
                      <th>Aprobación CO</th>
                      <th>Fecha Aprobación CO</th>
                      <th>Aprobación S</th>
                      <th>Fecha Aprobación S</th>
                      <th>Recibe</th>
                      <th>Proyecto</th>
                      <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                        <th width="120">
                          <select name="selectMarco" style="font-size: 10px;" class="form-control">
                            <option value="">Seleccionar</option>
                            <option value="SSis">Surtida</option>
                            <option value="SU Sis">Aprobada por S</option>
                            <option value="cancelada Sis">Cancelada S</option>
                            <option value="Sis">Pendiente Aprobación S</option>
                            <option value="SU A">Pendiente Entrega</option>
                          </select>
                        </th>
                      <?php } ?>
                      <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                        <th>Estatus</th>
                      <?php } ?>
                      <th>Progreso</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
              
                  </tbody>
                </table>
                <br>
                <div class="paginacion20">
                </div>
              </div>
            </div>
                      <?php  } ?>
          <!--fin de tab de marco-->

          <!--tab refacciones control vehicular-->
          <div class="tab-pane fade <?= $this->session->userdata('tipo') == 15 ? 'show active' : '' ?>" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-rcv'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table style="width: 100%" id="tbsolicitudesrcv" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectRCV" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <?php if($this->session->userdata('tipo') != 6){ ?>
                          <option value="SRCV">Surtida</option>
                          <option value="SU RCV">Aprobada por Control Vehicular</option>
                          <option value="cancelada RCV">Cancelada Control Vehicular</option>
                          <option value="RCV">Pendiente Aprobación Control Vehicular</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <option value="neodata_salida">Pendientes Neodata</option>
                          <?php } ?>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacion6">

              </div>
              <input type="text" class="form-control" id="busquedaPaginacionRefacciones">
            </div>
          </div>
          <!--fin de tab refacciones control vehicular-->

          <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
        <div class="tab-pane fade" id="pills-tarjetas">          
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaTarjetas">
          </div>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-tarjetas'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
          <div class="table-responsive">
            <table id="tbsolicitudestarjetas" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UIDs</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <th>Estatus</th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>UID</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                    <th width="120">
                      <select name="selectTarjetas" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="S">Surtida</option>
                        <option value="SU">Aprobada por AG</option>
                        <option value="cancelada AG">Cancelada AG</option>
                        <option value="AG">Pendiente Aprobación AG</option>
                        <option value="SU A">Pendiente Entrega</option>
                        <?php if($this->session->userdata('tipo') == 6){ ?>
                        <option value="neodata">Pendientes Neodata</option>
                        <?php } ?>
                      </select>
                    </th>
                  <?php } ?>
                  <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                    <th>Estatus</th>
                  <?php } ?>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionTarjetas">
            </div>
        </div>
      </div>
        <?php } ?>

          <!--tab provisional-->
          <div class="tab-pane fade <?= $this->session->userdata('tipo') == 15 ? 'show active' : '' ?>" id="pills-reynosas" role="tabpanel" aria-labelledby="pills-reynosas-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaReynosas">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-rcv'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table style="width: 100%" id="tbsolicitudesreynosas" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectRCV" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="SRCV">Surtida</option>
                          <option value="SU RCV">Aprobada por Control Vehicular</option>
                          <option value="cancelada RCV">Cancelada Control Vehicular</option>
                          <option value="RCV">Pendiente Aprobación Control Vehicular</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacionReynosas">

              </div>
            </div>
          </div>
          <!--fin de tab provisional-->

          <!--tab provisional-->
          <div class="tab-pane fade <?= $this->session->userdata('tipo') == 15 ? 'show active' : '' ?>" id="pills-villa" role="tabpanel" aria-labelledby="pills-villa-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaVilla">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-rcv'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table style="width: 100%" id="tbsolicitudesvilla" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectVilla" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="SRCV">Surtida</option>
                          <option value="SU RCV">Aprobada por Control Vehicular</option>
                          <option value="cancelada RCV">Cancelada Control Vehicular</option>
                          <option value="RCV">Pendiente Aprobación Control Vehicular</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacionVilla">

              </div>
            </div>
          </div>
          <!--fin de tab provisional-->


          
          <!--tab provisional-->
          <div class="tab-pane fade <?= $this->session->userdata('tipo') == 15 ? 'show active' : '' ?>" id="pills-86" role="tabpanel" aria-labelledby="pills-86-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda86">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-rcv'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table style="width: 100%" id="tbsolicitudes86" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación RCV</th>                                
                    <th>Fecha Aprobación RCV</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="select86" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="SRCV">Surtida</option>
                          <option value="SU RCV">Aprobada por Control Vehicular</option>
                          <option value="cancelada RCV">Cancelada Control Vehicular</option>
                          <option value="RCV">Pendiente Aprobación Control Vehicular</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  
                </tbody>
              </table>
              <br>
              <div class="paginacion86">

              </div>
            </div>
          </div>
          <!--fin de tab provisional-->

          <!-- tab de control vehicular -->
          <?php if($this->session->userdata('tipo') == 3 && $clase_pagina != 'solicitudes-almacen') { ?>
          <div class="tab-pane fade show active" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
          <?php } else { ?>
          <div class="tab-pane fade" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
          <?php } ?>
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
            </div>
            <div class="table-responsive">
              <table id="tbsolicitudescv" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación CV</th>
                    <th>Fecha Aprobación CV</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación CV</th>
                    <th>Fecha Aprobación CV</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectCV" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="SCV">Surtida</option>
                          <option value="SU CV">Aprobada por CV</option>
                          <option value="cancelada CV">Cancelada CV</option>
                          <option value="CV">Pendiente Aprobación CV</option>
                          <option value="SU A">Pendiente Entrega</option>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                 
                </tbody>
              </table>
              <br>
              <div class="paginacion4">
              </div>
            </div>
          </div>
          <!---->
          <?php if (($this->session->userdata('tipo') == 3 && $clase_pagina != 'solicitudes-almacen') || ($this->session->userdata('tipo') == 2 && $clase_pagina != 'solicitudes-almacen')) { ?>
            <div class="tab-pane fade" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <?php } ?>
          <?php if ((($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 6) || $this->session->userdata('id')==50) && $this->session->userdata('tipo') != 10 && $this->session->userdata('tipo') != 3 && $this->session->userdata('tipo') != 2 && $this->session->userdata('tipo') != 11 && $this->session->userdata('tipo') != 12 && ($this->session->userdata('tipo') != 9 || $this->session->userdata('id')==59) && $this->session->userdata('tipo') != 5 && $this->session->userdata('tipo') != 8 && $this->session->userdata('tipo') != 17 && ($this->session->userdata('encargado_almacen') == null && $this->session->userdata('encargado_almacen') == '')) { ?>
            <div class="tab-pane fade" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <?php } else { ?>
            <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <?php } ?>
          <!---->
          <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){ ?>
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-pendiente-tab" data-toggle="pill" href="#pills-pendiente" role="tab" aria-controls="pills-pendiente" aria-selected="true">
                Pendiente Aprobación
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="pills-entrega-tab" data-toggle="pill" href="#pills-entrega" role="tab" aria-controls="pills-entrega" aria-selected="false">
                Pendiente Entrega
              </a>
            </li>  
            <li class="nav-item">
              <a class="nav-link btn" id="pills-surtido-tab" data-toggle="pill" href="#pills-surtido" role="tab" aria-controls="pills-surtido" aria-selected="false">
                Surtido
              </a>
            </li>    
            <li class="nav-item">
              <a class="nav-link btn" id="pills-cancelada-tab" data-toggle="pill" href="#pills-cancelada" role="tab" aria-controls="pills-cancelada" aria-selected="false">
                Cancelada
              </a>
            </li>        
          </ul>
          <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-pendiente" role="tabpanel" aria-labelledby="pills-pendiente-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaPendiente">
            </div>
            <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php }else{ ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php } ?>
            <div class="table-responsive">
              <table id="tbsolicitudesagpendiente" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectAG" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="S">Surtida</option>
                          <option value="SU">Aprobada por AG</option>
                          <option value="cancelada AG">Cancelada AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                
                </tbody>
              </table>
              <br>
              <div class="paginacionPendiente">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-entrega" role="tabpanel" aria-labelledby="pills-entrega-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaEntrega">
            </div>
            <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php }else{ ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php } ?>
            <div class="table-responsive">
              <table id="tbsolicitudesagentrega" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectAG" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="S">Surtida</option>
                          <option value="SU">Aprobada por AG</option>
                          <option value="cancelada AG">Cancelada AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                
                </tbody>
              </table>
              <br>
              <div class="paginacionEntrega">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-surtido" role="tabpanel" aria-labelledby="pills-surtido-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaSurtido">
            </div>
            <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php }else{ ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php } ?>
            <div class="table-responsive">
              <table id="tbsolicitudesagsurtido" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectAGSurtido" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="S">Surtida</option>
                          <option value="SU">Aprobada por AG</option>
                          <option value="cancelada AG">Cancelada AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <option value="neodata_salida">Pendiente Neodata</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                
                </tbody>
              </table>
              <br>
              <div class="paginacionSurtido">
              </div>
              <div class="row">
                <input type="text" class="form-control" id="ruth">
              </div>
            </div>
          </div>

          <div class="tab-pane fade" id="pills-cancelada" role="tabpanel" aria-labelledby="pills-cancelada-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaCancelada">
            </div>
            <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php }else{ ?>
              <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <?php } ?>
            <div class="table-responsive">
              <table id="tbsolicitudesagcancelada" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UIDss</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Neodata</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Recibe</th>
                    <th>Proyecto</th>
                    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                      <th width="120">
                        <select name="selectAG" style="font-size: 10px;" class="form-control">
                          <option value="">Seleccionar</option>
                          <option value="S">Surtida</option>
                          <option value="SU">Aprobada por AG</option>
                          <option value="cancelada AG">Cancelada AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="AG">Pendiente Aprobación AG</option>
                          <option value="SU A">Pendiente Entrega</option>
                          <?php if($this->session->userdata('tipo') == 6){ ?>
                          <option value="neodata">Pendientes Neodata</option>
                          <?php } ?>
                        </select>
                      </th>
                    <?php } ?>
                    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                      <th>Estatus</th>
                    <?php } ?>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                
                </tbody>
              </table>
              <br>
              <div class="paginacionCancelada">
              </div>
            </div>
          </div>
        </div>
        </div>
        <?php }else{ ?>
          <div class="table-responsive">
          <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
              </div>
            <table id="tbsolicitudesag" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <th>Estatus</th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>UID</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                    <th width="120">
                      <select name="selectAG" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <?php if($this->session->userdata('tipo') != 6){ ?>
                        <option value="S">Surtida</option>
                        <option value="SU">Aprobada por AG</option>
                        <option value="cancelada AG">Cancelada AG</option>
                        <option value="AG">Pendiente Aprobación AG</option>
                        <option value="AG">Pendiente Aprobación AG</option>
                        <option value="SU A">Pendiente Entrega</option>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo') == 6){ ?>
                        <option value="neodata">Pendientes Neodatas</option>
                        <?php } ?>
                      </select>
                    </th>
                  <?php } ?>
                  <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                    <th>Estatus</th>
                  <?php } ?>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacion">
            </div>
          </div>
        </div>
          <?php } ?>

        

      <div class="tab-pane fade" id="pills-higiene">          
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaHigiene">
          </div>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes-sh'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
          <div class="table-responsive">
            <table id="tbsolicitudeshigiene" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <th>Estatus</th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>UID</th>
                  <th>Neodata</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                    <th width="120">
                      <select name="selectHigiene" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <?php if($this->session->userdata('tipo') != 6){ ?>
                        <option value="S">Surtida</option>
                        <option value="SU">Aprobada por AG</option>
                        <option value="cancelada AG">Cancelada AG</option>
                        <option value="AG">Pendiente Aprobación AG</option>
                        <option value="SU A">Pendiente Entrega</option>
                        <option value="neodata_salida">Pendientes Neodata</option>
                        <?php } ?>
                        <?php if($this->session->userdata('tipo') == 6){ ?>
                        <option value="neodata">Pendientes Neodata</option>
                        <?php } ?>
                      </select>
                    </th>
                  <?php } ?>
                  <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                    <th>Estatus</th>
                  <?php } ?>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionHigiene">
            </div>
            <input type="text" class="form-control" id="busquedaPaginacionEhs">
        </div>
      </div>
      
        
      
        <?php if ($this->session->userdata('tipo') != 4 && $this->session->userdata('tipo') != 6 && $this->session->userdata('tipo') != 10 && $this->session->userdata('tipo') != 11 && $this->session->userdata('tipo') != 3 && $this->session->userdata('tipo') != 2 && $this->session->userdata('tipo') != 12 && $this->session->userdata('tipo') != 9 && $this->session->userdata('tipo') != 5 && $this->session->userdata('tipo') != 8 && $this->session->userdata('tipo') != 14 && $this->session->userdata('tipo') != 15 && $this->session->userdata('tipo') != 17 && ($this->session->userdata('encargado_almacen') == null || $this->session->userdata('encargado_almacen') == '')) { ?>
          <div class="tab-pane fade show active" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
        <?php } else { ?>
          <div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
        <?php } ?>
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
        </div>
        <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAC'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
        <?php }else{ ?>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
        <?php } ?>
        <div class="table-responsive">
          <table style="width: 100%" id="tbsolicitudesac" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación PM</th>
                <th>Fecha Aprobación PM</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AC</th>
                <th>Fecha Aprobación AC</th>
                <th>Recibe</th>
                <th>Proyecto</th>
                <th>Estatus</th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación PM</th>
                <th>Fecha Aprobación PM</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AC</th>
                <th>Fecha Aprobación AC</th>
                <th>Recibe</th>
                <th>Proyecto</th>
                <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                  <th width="120">
                    <select name="selectAC" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="SAC">Surtida</option>
                      <option value="SU AC">Aprobada por Alto Costo</option>
                      <option value="cancelada AC">Cancelada Alto Costo</option>
                      <option value="AC">Pendiente Aprobación Alto Costo</option>
                      <option value="SU A">Pendiente Entrega</option>
                    </select>
                  </th>
                <?php } ?>
                <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                  <th>Estatus</th>
                <?php } ?>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
             
            </tbody>
          </table>
          <br>
          <div class="paginacion2">

          </div>
        </div>
      </div>
      <?php if ($this->session->userdata('id') != 50 && $this->session->userdata('id')!=59) { ?>
        <div class="tab-pane fade" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
      <?php } else { ?>
        <div class="tab-pane fade show active" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
      <?php } ?>
      <!---->
      <div class="float-right">
        <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
      </div>
      <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
        <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesKuali'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
      <?php }else{ ?>
        <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
      <?php } ?>
      <div class="table-responsive">
        <table id="tbsolicitudeskuali" class="table table-striped table-sm">
          <thead>
            <tr>
              <th>UID</th>
              <th>Creación</th>
              <th>Creado por</th>
              <th>Aprobación PM</th>
              <th>Fecha Aprobación PM</th>              
              <th>Aprobación AG</th>
              <th>Fecha Aprobación AG</th>
              <th>Recibe</th>
              <th>Proyecto</th>
              <th>Estatus</th>
              <th>Progreso</th>
              <th></th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>UID</th>
              <th>Creación</th>
              <th>Creado por</th>
              <th>Aprobación PM</th>
              <th>Fecha Aprobación PM</th>              
              <th>Aprobación AG</th>
              <th>Fecha Aprobación AG</th>
              <th>Recibe</th>
              <th>Proyecto</th>
              <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                <th width="120">
                  <select name="selectKuali" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="SK">Surtida</option>
                    <option value="SU K">Aprobada por Kuali</option>
                    <option value="cancelada K">Cancelada Kuali</option>
                    <option value="K">Pendiente Aprobación Kuali</option>
                    <option value="SU A">Pendiente Entrega</option>
                  </select>
                </th>
              <?php } ?>
              <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                <th>Estatus</th>
              <?php } ?>
              <th>Progreso</th>
              <th></th>
            </tr>
          </tfoot>
          <tbody>
           
          </tbody>
        </table>
        <br>
        <div class="paginacion3">

        </div>
      </div>
    </div>

    <?php if ($this->session->userdata('tipo') == 14 ) { ?>
          <div class="tab-pane fade show active" id="pills-medica" role="tabpanel" aria-labelledby="pills-medica-tab">
        <?php } else { ?>
          <div class="tab-pane fade" id="pills-medica" role="tabpanel" aria-labelledby="pills-medica-tab">
        <?php } ?>
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
        </div>
        <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAM'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
        <?php }else{ ?>
          <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudesAreaMedica'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
        <?php } ?>
        <div class="table-responsive">
          <table style="width: 100%" id="tbsolicitudesam" class="table table-striped table-sm">
            <thead>
              <tr>
              <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación AM</th>                                
                <th>Fecha Aprobación AM</th>
                <th>Recibe</th>
                <th>Proyecto</th>
                <th>Estatus</th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación AM</th>
                <th>Fecha Aprobación AM</th>
                <th>Recibe</th>
                <th>Proyecto</th>
                <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                  <th width="120">
                    <select name="selectAM" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="SAC">Surtida</option>
                      <option value="SU AM">Aprobada por Área Médica</option>
                      <option value="cancelada AC">Cancelada Área Médica</option>
                      <option value="AM">Pendiente Aprobación Área Médica</option>
                    </select>
                  </th>
                <?php } ?>
                <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                  <th>Estatus</th>
                <?php } ?>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
            <tbody>
             
            </tbody>
          </table>
          <br>
          <div class="paginacion5">

          </div>
        </div>
      </div>
    </div>
  </div>

</div>
</section>

<?php if($this->session->userdata('tipo') == 4 && $clase_pagina != 'solicitudes-almacen'){ ?>
<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de almacén</h3>
      </div>
      <div class="card-body">
        
      <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            
                            <?php foreach($clientes_generadores AS $key => $value){ ?>
                                
                            <li class="nav-item">
                                <a class="nav-link btn <?= $key == 0 ? 'active' : '' ?>" id="<?= $value->nombre_comercial ?>-tab" data-toggle="tab" href="#<?= $value->nombre_comercial ?>"
                                    role="tab" aria-controls="<?= $value->nombre_comercial ?>" aria-selected="true">
                                    <?= $value->nombre_comercial ?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                            <div class="tab-content" id="pills-tabContent">
                            <?php $cliente = ''; ?>
                                <?php foreach($clientes_generadores AS $key => $value){ ?>
                                    <?php $index_cliente = 0; ?>
                                    <?php $cliente = $value->nombre_comercial; ?>
                                    <div class="tab-pane fade show <?= $key == 0 ? 'active' : '' ?>" id="<?= $value->nombre_comercial ?>" role="tabpanel"
                                    aria-labelledby="<?= $value->nombre_comercial ?>-tab">
                                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                        <?php foreach($almacenes_clientes AS $key2 => $value2){ ?>
                                            <?php if($value2->nombre_comercial == $cliente){ ?>
                                            <li class="nav-item">
                                                <a class="nav-link btn " id="<?= $value2->numero_proyecto ?>-tab" data-toggle="tab" href="#<?= $value2->numero_proyecto ?>"
                                                    role="tab" aria-controls="<?= $value2->numero_proyecto ?>" aria-selected="true">
                                                    <?= $value2->numero_proyecto ?>
                                                </a>
                                            </li>
                                            <?php $index_cliente++; ?>
                                            <?php } ?>                                            
                                        <?php } ?>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                            <?php $proyecto = ''; ?>
                            
                        <?php foreach($almacenes_clientes AS $key => $value){ ?>
                                
                                    <?php $index_segmento = 0; ?>
                                    <?php $index_cluster = 0; ?>
                                    <?php $proyecto = $value->tbl_proyectos_idtbl_proyectos; ?>
                                    <?php if($value->nombre_comercial == $cliente){ ?>
                            <div class="tab-pane fade show " id="<?= $value->numero_proyecto ?>" role="tabpanel"
                                aria-labelledby="<?= $value->numero_proyecto ?>-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <?php foreach($segmentos_clientes AS $key2 => $value2){ ?>
                                <?php if($value2->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn <?= $index_segmento == 0 ? 'active' : '' ?>" id="<?= $value2->idtbl_segmentos_proyecto ?>-tab" data-toggle="pill"
                                            href="#<?= $value2->idtbl_segmentos_proyecto ?>" role="tab" aria-controls="<?= $value2->idtbl_segmentos_proyecto ?>"
                                            aria-selected="true">
                                            <?= $value2->segmento ?>
                                        </a>
                                    </li>
                                    <?php $index_segmento++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <?php foreach($segmentos_clientes AS $key3 => $value3){ ?>
                                <?php if($value3->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <div class="tab-pane fade <?= $index_cluster == 0 ? 'show active' : '' ?>" id="<?= $value3->idtbl_segmentos_proyecto ?>" role="tabpanel"
                                        aria-labelledby="pills-<?= $value3->idtbl_segmentos_proyecto ?>-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda<?= $value3->idtbl_segmentos_proyecto ?>">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tecate'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbsolicitudesalmacenes<?= $value3->idtbl_segmentos_proyecto ?>">
                                            <thead>
                                              <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Creado por</th>
                                                <th>Aprobación PM</th>
                                                <th>Fecha Aprobación PM</th>
                                                <th>Aprobación CO</th>
                                                <th>Fecha Aprobación CO</th>
                                                <th>Aprobación AG</th>
                                                <th>Fecha Aprobación AG</th>
                                                <th>Recibe</th>
                                                <th>Proyecto</th>
                                                <th>Estatus</th>
                                                <th>Progreso</th>
                                                <th></th>
                                              </tr>
                                            </thead>
                                            <tfoot>
                                              <tr>
                                                <th>UID</th>
                                                <th>Neodata</th>
                                                <th>Creación</th>
                                                <th>Creado por</th>
                                                <th>Aprobación PM</th>
                                                <th>Fecha Aprobación PM</th>
                                                <th>Aprobación CO</th>
                                                <th>Fecha Aprobación CO</th>
                                                <th>Aprobación AG</th>
                                                <th>Fecha Aprobación AG</th>
                                                <th>Recibe</th>
                                                <th>Proyecto</th>
                                                <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                                                  <th width="120">
                                                  <select name="select<?= $value3->idtbl_segmentos_proyecto ?>" style="font-size: 10px;" class="form-control">
                                                    <option value="">Seleccionar</option>
                                                    <option value="S">Surtida</option>
                                                    <option value="SU">Aprobada por AG</option>
                                                    <option value="cancelada AG">Cancelada AG</option>
                                                    <option value="AG">Pendiente Aprobación AG</option>
                                                    <option value="SU A">Pendiente Entrega</option>
                                                    <?php if($this->session->userdata('tipo') == 6){ ?>
                                                    <option value="neodata">Pendientes Neodata</option>
                                                    <?php } ?>
                                                  </select>
                                                  </th>
                                                <?php } ?>
                                                <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                                                  <th>Estatus</th>
                                                <?php } ?>
                                                <th>Progreso</th>
                                                <th></th>
                                              </tr>
                                            </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionalmacenes<?= $value3->idtbl_segmentos_proyecto ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <?php $index_cluster++; ?>
                                    <?php } ?>
                                    <?php } ?>                                                                                                                            
                                </div>
                            </div>   
                            <?php } ?>
                            <?php } ?>
                        </div>
                                    </div>
                                    
                                <?php } ?>                                
                            </div>

      </div>
    </div>
  </div>
</section>
<?php } ?>



<script>
  $(document).ready(function() {
    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
      selectBuscar = "";
      //alert("diferente de solicitudes almacen"); 
      mostrarDatos("",1,"");
      mostrarDatos2("",1,"");
      mostrarDatos3("",1,"");
      mostrarDatos4("",1,"");
      mostrarDatos5("",1,"");
      mostrarDatos6("",1,"");
      mostrarDatos7("",1,"");      
      mostrarSolicitudesHigiene("",1,"");
      <?php if($this->session->userdata('tipo') == 4){ ?>
      mostrarSolicitudesReynosas("",1,"");
      mostrarSolicitudesVilla("",1,"");
      mostrarSolicitudes86("",1,"");
      mostrarDatosPendiente("",1);
      mostrarDatosEntrega("",1);
      mostrarDatosSurtido("",1);
      mostrarDatosCancelada("",1);
      <?php } ?>
      <?php if($this->session->userdata('id') == 37 || $this->session->userdata('id') == 36) { ?>
        mostrarDatos20("",1,"");
      <?php } ?>
      <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>        
        mostrarSolicitudesTarjetas("",1,"");        
      <?php } ?>
      
      $("select[name='selectAG']").on('change', function() {
        //selectBuscar = $("select[name='selectAG']").val();
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
      });

      $("select[name='selectAGSurtido']").on('change', function() {
        //selectBuscar = $("select[name='selectAG']").val();
        selectBuscar = $(this).val();
        mostrarDatosSurtido('', 1, selectBuscar);
      });

      $("select[name='selectAC']").on('change', function() {
        //selectBuscar = $("select[name='selectAC']").val();
        selectBuscar = $(this).val();
        mostrarDatos2('', 1, selectBuscar);
      });

      $("select[name='selectKuali']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos3('', 1, selectBuscar);
      });

      $("select[name='selectCV']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos4('', 1, selectBuscar);
      });

      $("select[name='selectAM']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos5('', 1, selectBuscar);
      });

      $("select[name='selectRCV']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos6('', 1, selectBuscar);
      });

      $("select[name='selectSis']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos7('', 1, selectBuscar);
      });

      $("select[name='selectMarco']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarDatos20('', 1, selectBuscar);
      });

      $("select[name='selectHigiene']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesHigiene('', 1, selectBuscar);
      });

      $("select[name='selectTarjetas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesTarjetas('', 1, selectBuscar);
      });

      $("select[name='selectReynosas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesReynosas('', 1, selectBuscar);
      });

      $("select[name='selectVilla']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesVilla('', 1, selectBuscar);
      });

      $("select[name='select86']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudes86('', 1, selectBuscar);
      });

      $("input[name='busquedaPendiente']").keyup(function() {
        textoBuscar = $("input[name='busquedaPendiente']").val();
        mostrarDatosPendiente(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedaEntrega']").keyup(function() {
        textoBuscar = $("input[name='busquedaEntrega']").val();
        mostrarDatosEntrega(textoBuscar, 1, selectBuscar);
    });

    $("input[name='busquedaSurtido']").keyup(function() {
        textoBuscar = $("input[name='busquedaSurtido']").val();
        mostrarDatosSurtido(textoBuscar, 1, selectBuscar);
    });
    $("input[name='busquedaCancelada']").keyup(function() {
        textoBuscar = $("input[name='busquedaCancelada']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatosCancelada(textoBuscar,1,selectBuscar);
      });
      

      $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        //textoBuscar2 = $("select[name='selectAC']").val();
        mostrarDatos2(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos3(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda4']").keyup(function() {
        textoBuscar = $("input[name='busqueda4']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos4(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda5']").keyup(function() {
        textoBuscar = $("input[name='busqueda5']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos5(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda6']").keyup(function() {
        textoBuscar = $("input[name='busqueda6']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos6(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda7']").keyup(function() {
        textoBuscar = $("input[name='busqueda7']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos7(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busqueda20']").keyup(function() {
        textoBuscar = $("input[name='busqueda20']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos20(textoBuscar, 1, selectBuscar);
      });

      $("input[name='busquedaHigiene']").keyup(function() {
        textoBuscar = $("input[name='busquedaHigiene']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesHigiene(textoBuscar,1,selectBuscar);
      });

      $("input[name='busquedaTarjetas']").keyup(function() {
        textoBuscar = $("input[name='busquedaTarjetas']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTarjetas(textoBuscar,1,selectBuscar);
      });

      $("input[name='busquedaReynosas']").keyup(function() {
        textoBuscar = $("input[name='busquedaReynosas']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesReynosas(textoBuscar,1,selectBuscar);
      });

      $("input[name='busquedaVilla']").keyup(function() {
        textoBuscar = $("input[name='busquedaVilla']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesVilla(textoBuscar,1,selectBuscar);
      });

      $("input[name='busqueda86']").keyup(function() {
        textoBuscar = $("input[name='busqueda86']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudes86(textoBuscar,1,selectBuscar);
      });

      

      $("input[name='busquedaCancelada']").keyup(function() {
        textoBuscar = $("input[name='busquedaCancelada']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesCancelada(textoBuscar,1,selectBuscar);
      });

      $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        //valorBuscar2 = $("select[name='selectAG']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        //valorBuscar2 = $("select[name='selectAC']").val();
        mostrarDatos2(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda3']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos3(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion4 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda4']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos4(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion5 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda5']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos5(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion6 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda6']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos6(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion7 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda7']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos7(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion20 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda20']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarDatos20(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacionHigiene li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaHigiene']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesHigiene(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacionTarjetas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTarjetas']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTarjetas(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacionReynosas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaReynosas']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesReynosas(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacionVilla li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaVilla']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesVilla(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion86 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda86']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudes86(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacionPendiente li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaPendiente']").val();
        mostrarDatosPendiente(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacionEntrega li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaEntrega']").val();
        mostrarDatosEntrega(valorBuscar, valorHref);
      });
      
      $("body").on("click", ".paginacionSurtido li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaSurtido']").val();
        mostrarDatosSurtido(valorBuscar, valorHref, selectBuscar);
      });

      $("#ruth").keyup(function(e) {
          if (event.which === 13) {
              //alert('Enter is pressed!');
              e.preventDefault();
              valorHref = $("#ruth").val();
              valorBuscar = $("input[name='busquedaSurtido']").val();
              mostrarDatosSurtido(valorBuscar, valorHref, selectBuscar);
          }
      });

      $("#busquedaPaginacionEhs").keyup(function(e) {
          if (event.which === 13) {
              //alert('Enter is pressed!');
              e.preventDefault();
              valorHref = $("#busquedaPaginacionEhs").val();
              valorBuscar = $("input[name='busquedaSurtido']").val();
              mostrarSolicitudesHigiene(valorBuscar, valorHref, selectBuscar);
          }
      });

      $("#busquedaPaginacionRefacciones").keyup(function(e) {
          if (event.which === 13) {
              //alert('Enter is pressed!');
              e.preventDefault();
              valorHref = $("#busquedaPaginacionRefacciones").val();
              valorBuscar = $("input[name='busquedaSurtido']").val();
              mostrarDatos6(valorBuscar, valorHref, selectBuscar);
          }
      });

      $("body").on("click", ".paginacionCancelada li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaCancelada']").val();
        mostrarDatosCancelada(valorBuscar, valorHref);
      });

      <?php if($this->session->userdata('tipo') == 4){ ?>
      $.ajax({
                url: "<?= base_url()?>almacen/clientes_almacenes",
                type: "POST",                
                dataType: "json",
                success: function(result) {
                    //console.log(result);
                    
                    for(var r=0; r<result.length; r++){
                        var id_segmento = result[r].idtbl_segmentos_proyecto;
                        eventos("", 1, id_segmento);
                        mostrarDatosAlmacenesClientes("", 1, id_segmento, "");                        
                    }
                                       
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });  
            <?php } ?>

    <?php } ?>

    <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
      //alert("igual a solicitudes almacen");
      mostrarDatos("",1);
      mostrarDatos2("",1);
      mostrarDatos3("",1);
      mostrarDatos4("",1);
      mostrarDatos5("",1);
      mostrarDatos6("",1);
      mostrarDatos7("",1);
      
      
      <?php if($this->session->userdata('id') == 37 || $this->session->userdata('id') == 36) { ?>
        mostrarDatos20("",1);
      <?php } ?>

      <?php if (isset($this->session->userdata('permisos')['solicitud_tarjetas']) && $this->session->userdata('permisos')['solicitud_tarjetas'] > 0) { ?>
        mostrarSolicitudesTarjetas("",1,"");        
      <?php } ?>

      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1);
      });

      $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(textoBuscar, 1);
      });

      $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(textoBuscar, 1);
      });

      $("input[name='busqueda4']").keyup(function() {
        textoBuscar = $("input[name='busqueda4']").val();
        mostrarDatos4(textoBuscar, 1);
      });

      $("input[name='busqueda5']").keyup(function() {
        textoBuscar = $("input[name='busqueda5']").val();
        mostrarDatos5(textoBuscar, 1);
      });

      $("input[name='busqueda6']").keyup(function() {
        textoBuscar = $("input[name='busqueda6']").val();
        mostrarDatos6(textoBuscar, 1);
      });

      $("input[name='busqueda7']").keyup(function() {
        textoBuscar = $("input[name='busqueda7']").val();
        mostrarDatos7(textoBuscar, 1);
      });

      $("input[name='busqueda20']").keyup(function() {
        textoBuscar = $("input[name='busqueda20']").val();
        mostrarDatos20(textoBuscar, 1);
      });

      $("select[name='selectTarjetas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesTarjetas('', 1, selectBuscar);
      });

      $("input[name='busquedaTarjetas']").keyup(function() {
        textoBuscar = $("input[name='busquedaTarjetas']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTarjetas(textoBuscar,1,selectBuscar);
      });

      $("body").on("click", ".paginacionTarjetas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTarjetas']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTarjetas(valorBuscar, valorHref, selectBuscar);
      });

      $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref);
      });

      

      $("body").on("click", ".paginacionEntrega li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaEntrega']").val();
        mostrarDatosEntrega(valorBuscar, valorHref);
      });
      
      $("body").on("click", ".paginacionSurtido li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaSurtido']").val();
        mostrarDatosSurtido(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion4 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda4']").val();
        mostrarDatos4(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion5 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda5']").val();
        mostrarDatos5(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion6 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda6']").val();
        mostrarDatos6(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion7 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda7']").val();
        mostrarDatos7(valorBuscar, valorHref);
      });

      $("body").on("click", ".paginacion20 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda20']").val();
        mostrarDatos20(valorBuscar, valorHref);
      });

    <?php } ?>
  });


                        function mostrarDatosAlmacenesClientes(valorBuscar, pagina, idsegmento, valorBuscar2) {
                            var id_segmento = idsegmento;
                            $.ajax({
                                url: "<?= base_url() ?>almacen/mostrarSolicitudesAlmacenes",                                
                                type: "POST",
                                data: {
                                    buscar: valorBuscar,
                                    nropagina: pagina,
                                    segmento: idsegmento,
                                    buscar2: valorBuscar2
                                },
                                dataType: "json",
                                success: function(response) {
                                    filas = "";
                                    var kilometraje = 0;
                                    var kilometraje_acumulado = 0;
                                    var clase = '';
                                    var fecha_finalizacion = '';
                                    $.each(response.solicitudesAlmacenes, function(key, item) {
                                      if (item.estatus_solicitud == 'S') {
                                        var color = 'success';
                                        var status = 'Surtida';
                                        var percent = '100%';
                                      } else if (item.estatus_solicitud == 'SU') {
                                        var color = 'primary';
                                        var status = 'Aprobado por AG';
                                        var percent = '75%';
                                      } else if (item.estatus_solicitud == 'SU A') {
                                        var color = 'primary';
                                        var status = 'Pendiente Entrega';
                                        var percent = '85%';
                                      } else if (item.estatus_solicitud == 'AG') {
                                        var color = 'warning';
                                        var status = 'Pendiente Aprobación AG';
                                        var percent = '75%';
                                      } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                                        var color = 'warning';
                                        var status = 'Pendiente Aprobación CO';
                                        var percent = '50%';
                                      } else if (item.estatus_solicitud == 'cancelada CO') {
                                        var color = 'danger';
                                        var status = 'Cancelada CO';
                                        var percent = '0%';
                                      } else if (item.estatus_solicitud == 'cancelada SH') {
                                        var color = 'danger';
                                        var status = 'Cancelada SH';
                                        var percent = '0%';
                                      } else if (item.estatus_solicitud == 'cancelada AG') {
                                        var color = 'danger';
                                        var status = 'Cancelada AG';
                                        var percent = '0%';
                                      } else if (item.estatus_solicitud == 'cancelada PM') {
                                        var color = 'danger';
                                        var status = 'Cancelada PM';
                                        var percent = '0%';
                                      } else if (item.estatus_solicitud == 'SH') {
                                        var color = 'secondary';
                                        var status = 'Pendiente Aprobación SH';
                                        var percent = '25%';
                                      }
                                      filas += "<tr class='table-" + color + "'>";
                                      filas += "<td>" + item.uid + "</td>";
                                      filas += "<td>" + item.neodata_salida + "</td>";
                                      filas += "<td>" + item.fecha_creacion + "</td>";
                                      filas += "<td>" + item.user_autor + "</td>";
                                      filas += "<td>" + item.user_aprobacion + "</td>";
                                      filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
                                      filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
                                      filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
                                      filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
                                      filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
                                      filas += "<td>" + item.recibe + "</td>";
                                      filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
                                      filas += "<td style='font-weight: bold'>" + status + "</td>";
                                      filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>"; /*Amaranta*/
                                      filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
                                      if(item.observaciones_neodata != null){
                                          filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
                                      }
                                      filas += "</tr>";
                                    });
                                    //alert(id_almacen);
                                    $('#tbsolicitudesalmacenes'+id_segmento+' tbody').html(filas);
                                    linkSeleccionado = Number(pagina);
                                    //total registros
                                    totalRegistros = response.totalRegistros;

                                    //cantidad de registros por página
                                    cantidadRegistros = response.cantidad;

                                    numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
                                    paginador = "<ul class='pagination justify-content-center'>";

                                    if (linkSeleccionado > 1) {
                                        paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
                                        paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) +
                                            "' class='page-link'>&lsaquo;</a></li>";
                                    } else {
                                        paginador +=
                                            "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
                                        paginador +=
                                            "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
                                    }
                                    cant = 2;
                                    pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
                                    if (numeroLinks > cant) {
                                        pagRestantes = numeroLinks - linkSeleccionado;
                                        pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
                                    } else {
                                        pagFin = numeroLinks;
                                    }
                                    for (var i = pagInicio; i <= pagFin; i++) {
                                        if (i == linkSeleccionado) {
                                            paginador +=
                                                "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" +
                                                i + "</a></li>";
                                        } else {
                                            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i +
                                                "</a></li>";
                                        }
                                    }
                                    if (linkSeleccionado < numeroLinks) {
                                        paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) +
                                            "' class='page-link'>&rsaquo;</a></li>";
                                        paginador += "<li class='page-item'><a href='" + numeroLinks +
                                            "' class='page-link'>&raquo;</a></li>";
                                    } else {
                                        paginador +=
                                            "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
                                        paginador +=
                                            "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
                                    }
                                    paginador += "</ul>";
                                    $(".paginacionalmacenes"+id_segmento).html(paginador);
                                }
                            });
                        }

            function eventos(valorBuscar, pagina, idsegmento){
                $("body").on("keyup", "input[name='busqueda"+idsegmento+"']" ,function() {
                            textoBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatosAlmacenesClientes(textoBuscar, 1, idsegmento, selectBuscar);
                        });
                        $("select[name='select"+idsegmento+"']").on('change', function() {
                          //selectBuscar = $("select[name='selectKuali']").val();
                          selectBuscar = $(this).val();
                          mostrarDatosAlmacenesClientes('', 1, idsegmento, selectBuscar);
                        });

                        $("body").on("click", ".paginacionalmacenes"+idsegmento+" li a", function(e) {
                            e.preventDefault();
                            valorHref = $(this).attr("href");
                            valorBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatosAlmacenesClientes(valorBuscar, valorHref, idsegmento);
                        });
            }


  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
    function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
      console.log("Entro");
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAG",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesag tbody').html("");
          $.each(response.solicitudesAG, function(key, item) {
            if (item.tipo_producto == 'Almacen General' || item.tipo_producto == 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              if(item.activo_fijo == 0){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-mail-forward'></i></a></td>";
              }
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesag tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion").html(paginador);
        }
      });
    }

    function mostrarDatosEntrega(valorBuscar, pagina, valorBuscar2) {
      console.log("Entro");
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAGEstatus",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2,
          estatus: 'SU A'
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesagentrega tbody').html("");
          $.each(response.solicitudesAGEstatus, function(key, item) {
            if (item.tipo_producto == 'Almacen General' || item.tipo_producto == 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.nombre_asignacion + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              if(item.activo_fijo == 0){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-mail-forward'></i></a></td>";
              }
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesagentrega tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionEntrega").html(paginador);
        }
      });
    }

    function mostrarDatosPendiente(valorBuscar, pagina, valorBuscar2) {
      console.log("Entro");
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAGEstatus",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2,
          estatus: 'AG'
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesagpendiente tbody').html("");
          $.each(response.solicitudesAGEstatus, function(key, item) {
            if (item.tipo_producto == 'Almacen General' || item.tipo_producto == 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              if(item.activo_fijo == 0){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-mail-forward'></i></a></td>";
              }
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesagpendiente tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionPendiente").html(paginador);
        }
      });
    }

    function mostrarDatosSurtido(valorBuscar, pagina, valorBuscar2) {
      console.log("Entro");
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAGEstatus",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2,
          estatus: 'S'
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesagsurtido tbody').html("");
          $.each(response.solicitudesAGEstatus, function(key, item) {
            if (item.tipo_producto == 'Almacen General' || item.tipo_producto == 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              if(item.activo_fijo == 0){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-mail-forward'></i></a></td>";
              }
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesagsurtido tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionSurtido").html(paginador);
        }
      });
    }

    function mostrarDatosCancelada(valorBuscar, pagina, valorBuscar2) {
      console.log("Entro");
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAGEstatus",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2,
          estatus: 'cancelada AG'
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesagcancelada tbody').html("");
          $.each(response.solicitudesAGEstatus, function(key, item) {
            if (item.tipo_producto == 'Almacen General' || item.tipo_producto == 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              if(item.activo_fijo == 0){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-mail-forward'></i></a></td>";
              }
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesagcancelada tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionCancelada").html(paginador);
        }
      });
    }

    function mostrarDatos2(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAC",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesac tbody').html("");
          $.each(response.solicitudesAC, function(key, item) {
            if (item.tipo_producto == 'Alto costo') {
              if (item.estatus_solicitud == 'SAC') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU AC') {
                var color = 'warning';
                var status = 'Aprobado por Alto Costo';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AC') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Alto Costo';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO AC') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AC') {
                var color = 'danger';
                var status = 'Cancelada Alto Costo';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_alto_costo == null ? '----' : item.user_alto_costo) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ac == null ? '----' : item.fecha_aprobacion_ac) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesac tbody').html(filas);
            }
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion2").html(paginador);
        }
      });
    }

    function mostrarDatos3(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesKuali",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudeskuali tbody').html("");
          $.each(response.solicitudesKuali, function(key, item) {
            if (item.tipo_producto == 'Kuali') {
              if (item.estatus_solicitud == 'SK') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU K') {
                var color = 'warning';
                var status = 'Aprobado por Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO K') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'K') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'cancelada K') {
                var color = 'danger';
                var status = 'Cancelada Kuali';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada K') {
                var color = 'danger';
                var status = 'Cancelada Kuali';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CO K') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";                        
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudeskuali tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion3").html(paginador);
        }
      });
    }
    function mostrarDatos4(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesCV",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudescv tbody').html("");
          $.each(response.solicitudesCV, function(key, item) {
            if (item.tipo_producto === 'Control Vehicular') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU CV') {
                var color = 'warning';
                var status = 'Aprobado por CV';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'warning';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CV') {
                var color = 'danger';
                var status = 'Cancelada CV';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'CV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CV';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'cancelada PM CV') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CO CV') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'CO CV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_control_vehicular == null ? '----' : item.user_control_vehicular) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_cv == null ? '----' : item.fecha_aprobacion_cv) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudescv tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion4").html(paginador);
        }
      });
    }

    function mostrarDatos5(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAreaMedica",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesam tbody').html("");
          $.each(response.solicitudesAreaMedica, function(key, item) {
            if (item.tipo_producto == 'Medica') {
              if (item.estatus_solicitud == 'SAM') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU AM') {
                var color = 'warning';
                var status = 'Aprobado por Área Médica';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AM') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Área Médica';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada AM') {
                var color = 'danger';
                var status = 'Cancelada Área Médica';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";                            
              filas += "<td>" + (item.fecha_aprobacion_am == null ? '----' : item.fecha_aprobacion_am) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesam tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion5").html(paginador);
        }
      });
    }

    function mostrarDatos6(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesRCV",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesrcv tbody').html("");
          $.each(response.solicitudesRefaccionesControlVehicular, function(key, item) {
            if (item.tipo_producto == 'Refacciones Control Vehicular') {
              if (item.estatus_solicitud == 'SRCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU RCV') {
                var color = 'warning';
                var status = 'Aprobado por Almacen General';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU RCV A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Almacen General';
                var percent = '75%';
              }else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'RCV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Control Vehicular';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada RCV') {
                var color = 'danger';
                var status = 'Cancelada Control Vehicular';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada Por AG';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";                            
              filas += "<td>" + (item.fecha_aprobacion_rcv == null ? '----' : item.fecha_aprobacion_rcv) + "</td>";              
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesrcv tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion6").html(paginador);
        }
      });
    }

    function mostrarDatos7(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesSistemas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudessistemas tbody').html("");
          $.each(response.solicitudesSistemas, function(key, item) {
            if (item.tipo_producto === 'Sistemas') {
              if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'CO PM') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              }
              else if (item.estatus_solicitud == 'Sis') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Sistemas';
                var percent = '75%';
              }
              else if (item.estatus_solicitud == 'SU Sis') {
                var color = 'warning';
                var status = 'Aprobado por Sistemas';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SSis') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if(item.estatus_solicitud == 'cancelada PM'){
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              }else if(item.estatus_solicitud == 'cancelada CO PM'){
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              }else if(item.estatus_solicitud == 'cancelada Sis'){
                var color = 'danger';
                var status = 'Cancelada Sistemas';
                var percent = '0%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_sistemas == null ? '----' : item.user_sistemas) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_sis == null ? '----' : item.fecha_aprobacion_sis) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudessistemas tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion7").html(paginador);
        }
      });
    }
    

    function mostrarSolicitudesHigiene(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesHigiene",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudeshigiene tbody').html("");
          $.each(response.solicitudesHigiene, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudeshigiene tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionHigiene").html(paginador);
        }
      });
    }

    function mostrarSolicitudesTarjetas(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesTarjetas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudestarjetas tbody').html("");
          $.each(response.solicitudesTarjetas, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'SRCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU RCV') {
                var color = 'warning';
                var status = 'Aprobado por Control Vehicular';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU RCV A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Almacen General';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'RCV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Control Vehicular';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada RCV') {
                var color = 'danger';
                var status = 'Cancelada Control Vehicular';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada Por AG';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudestarjetas tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionHigiene").html(paginador);
        }
      });
    }

    function mostrarSolicitudesReynosas(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesReynosas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesreynosas tbody').html("");
          $.each(response.solicitudesReynosas, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesreynosas tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionReynosas").html(paginador);
        }
      });
    }

    function mostrarSolicitudesVilla(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesVilla",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesvilla tbody').html("");
          $.each(response.solicitudesVilla, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudesvilla tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionVilla").html(paginador);
        }
      });
    }

    function mostrarSolicitudes86(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudes86",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudes86 tbody').html("");
          $.each(response.solicitudes86, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudes86 tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion86").html(paginador);
        }
      });
    }

  <?php } ?>

  <?php if ($clase_pagina == 'solicitudes-almacen') { ?>    
    function mostrarDatos(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenAG",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesag tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Almacen General' || item.tipo_producto === 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente Entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesag tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion").html(paginador);
        }
      });
    }

    function mostrarDatos2(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenAC",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesac tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Alto costo') {
              if (item.estatus_solicitud == 'SAC') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU AC') {
                var color = 'warning';
                var status = 'Aprobado por Alto Costo';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AC') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Alto Costo';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO AC') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AC') {
                var color = 'danger';
                var status = 'Cancelada Alto Costo';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM AC') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'PM AC') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_alto_costo == null ? '----' : item.user_alto_costo) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ac == null ? '----' : item.fecha_aprobacion_ac) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesac tbody').html(filas);
            }
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion2").html(paginador);
        }
      });
    }

    function mostrarDatos3(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenKuali",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudeskuali tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Kuali') {
              if (item.estatus_solicitud == 'SK') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU K') {
                var color = 'warning';
                var status = 'Aprobado por Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO K') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'K') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'cancelada K') {
                var color = 'danger';
                var status = 'Cancelada Kuali';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM K') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CO K') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'PM K') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudeskuali tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion3").html(paginador);
        }
      });
    }

    function mostrarDatos4(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenCV",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudescv tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Control Vehicular') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'warning';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU CV') {
                var color = 'warning';
                var status = 'Aprobado por CV';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CV') {
                var color = 'danger';
                var status = 'Cancelada CV';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'CV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CV';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'cancelada PM CV') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada CO CV') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'CO CV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_control_vehicular == null ? '----' : item.user_control_vehicular) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_cv == null ? '----' : item.fecha_aprobacion_cv) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudescv tbody').html(filas);
            } 
          });

          

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion4").html(paginador);
        }
      });
    }

    function mostrarSolicitudesTarjetas(valorBuscar, pagina, valorBuscar2) {            
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarMisSolicitudesTarjetas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudestarjetas tbody').html("");
          $.each(response.solicitudesTarjetas, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'SRCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU RCV') {
                var color = 'warning';
                var status = 'Aprobado por Control Vehicular';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU RCV A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Almacen General';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'RCV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Control Vehicular';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'PM') {
                var color = 'warning';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'cancelada RCV') {
                var color = 'danger';
                var status = 'Cancelada Control Vehicular';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada Por AG';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              <?php if($this->session->userdata('tipo') == 4 || $this->session->userdata('tipo') == 6){ ?>
              if(item.observaciones_neodata != null){
                filas += "<td align='center'><i class='fa fa-flag' style='color: green;'></i></a></td>";
              }
              <?php } ?>
              filas += "</tr>";
              $('#tbsolicitudestarjetas tbody').html(filas);
            //}
          });
          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacionHigiene").html(paginador);
        }
      });
    }

    function mostrarDatos5(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenAreaMedica",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesam tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Medica') {
              if (item.estatus_solicitud == 'SAM') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU AM') {
                var color = 'warning';
                var status = 'Aprobado por Área Médica';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AM') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Área Médica';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada AM') {
                var color = 'danger';
                var status = 'Cancelada Área Médica';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";              
              filas += "<td>" + (item.fecha_aprobacion_am == null ? '----' : item.fecha_aprobacion_am) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesam tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion5").html(paginador);
        }
      });
    }

    function mostrarDatos6(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenRCV",
        type: "POST",
        data: {
        buscar: valorBuscar,
        nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesrcv tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Refacciones Control Vehicular') {
              if (item.estatus_solicitud == 'SRCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU RCV') {
                var color = 'warning';
                var status = 'Aprobado por Almacen General';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU RCV A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Almacen General';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'RCV') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Control Vehicular';
                var percent = '50%';
              }else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              }else if (item.estatus_solicitud == 'cancelada RCV') {
                var color = 'danger';
                var status = 'Cancelada Control Vehicular';
                var percent = '0%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.neodata_salida + "</td>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";              
              filas += "<td>" + (item.fecha_aprobacion_rcv == null ? '----' : item.fecha_aprobacion_rcv) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";              
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesrcv tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion6").html(paginador);
        }
      });
    }

    function mostrarDatos7(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAlmacenSistemas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudessistemas tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Sistemas') {
              if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'CO PM') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'Sis') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Sistemas';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU Sis') {
                var color = 'warning';
                var status = 'Aprobado por Sistemas';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SSis') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if(item.estatus_solicitud == 'cancelada PM'){
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              }else if(item.estatus_solicitud == 'cancelada CO PM'){
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              }else if(item.estatus_solicitud == 'cancelada Sis'){
                var color = 'danger';
                var status = 'Cancelada Sistemas';
                var percent = '0%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_sistemas == null ? '----' : item.user_sistemas) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_sis == null ? '----' : item.fecha_aprobacion_sis) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudessistemas tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion7").html(paginador);
        }
      });
    }

    <?php if($this->session->userdata('id') == 37 || $this->session->userdata('id') == 36) { ?>
    function mostrarDatos20(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesMarco",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesmarco tbody').html("");
          $.each(response.solicitudes, function(key, item) {
            if (item.tipo_producto === 'Almacen General' || item.tipo_producto === 'Seguridad e Higiene') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'warning';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              } else if (item.estatus_solicitud == 'PM') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              } 
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='" +"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudesmarco tbody').html(filas);
            } 
          });

          linkSeleccionado = Number(pagina);
          //total registros
          totalRegistros = response.totalRegistros;

          //cantidad de registros por página
          cantidadRegistros = response.cantidad;

          numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
          paginador = "<ul class='pagination justify-content-center'>";
          /*for(var i = 1; i <= numeroLinks; i++) {
            if(i == linkSeleccionado) 
              paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
            else
              paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
          }
          paginador += "</ul>";*/
          if (linkSeleccionado > 1) {
            paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado - 1) + "' class='page-link'>&lsaquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
          }
          cant = 2;
          pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
          if (numeroLinks > cant) {
            pagRestantes = numeroLinks - linkSeleccionado;
            pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
          } else {
            pagFin = numeroLinks;
          }
          for (var i = pagInicio; i <= pagFin; i++) {
            if (i == linkSeleccionado) {
              paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
            } else {
              paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
            }
          }
          if (linkSeleccionado < numeroLinks) {
            paginador += "<li class='page-item'><a href='" + (linkSeleccionado + 1) + "' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
          } else {
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
          }
          paginador += "</ul>";
          $(".paginacion20").html(paginador);
        }
      });
    }
    <?php } ?>
  <?php } ?>
</script>