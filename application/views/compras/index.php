<!-- Modal -->
<div class="modal fade" id="editarSolicitudCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cambiarProyecto">
          <div class="col">
            <label for="">Proyectos</label>
              <select name="proyecto" id="proyecto" class="selectpicker" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($proyectos as $key => $value): ?>
                    <option value="<?=$value->idtbl_proyectos?>"><?= substr($value->numero_proyecto."-".$value->nombre_proyecto,0,50) ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <br>
          <div class="col">
            <textarea class="form-control" placeholder="Motivo de Cambio de Proyecto" name="nota_cambio_proyecto"></textarea>
          </div>
          <input type="hidden" name="uid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="cambiarProyecto()" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<?php if($this->session->userdata('tipo') == 7){ ?>
<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">

      <!-- Item -->
      <div class="col-xl-4 col-md-5 col-sm-6">
        <div class="bg-white has-shadow">
        <a href="<?= base_url() ?>compras/nuevo-pedido" class="dropdown-item" title="">
        <div class="item d-flex align-items-center pr-4 pl-4">
          <div class="icon bg-green"><i class="fa fa-plus"></i></div>
          <div class="title"><span>Orden de Compra</span>              
          </div>
          
        </div>
        </a>
        </div>
      </div><!-- Item -->

      <!-- Item -->
      <div class="col-xl-4 col-md-5 col-sm-6">
        <div class="bg-white has-shadow">
        <a href="<?= base_url() ?>compras/nueva-solicitud-compra" class="dropdown-item" title="">
        <div class="item d-flex align-items-center pr-4 pl-4">
          <div class="icon bg-blue"><i class="fa fa-plus"></i></div>
          <div class="title"><span>Nueva Solicitud</span>              
          </div>
        </div>
        </a>
        </div>
      </div><!-- Item -->

      <div class="col-xl-4 col-md-5 col-sm-6">
        <div class="bg-white has-shadow">
        <a href="<?= base_url() ?>compras/nueva_solicitud_compra_estimacion" class="dropdown-item"title="">
        <div class="item d-flex align-items-center pr-4 pl-4">
          <div class="icon bg-blue"><i class="fa fa-plus"></i></div>
          <div class="title"><span>Solicitud de Perforación y Postes</span>              
          </div>
        </div>
        </a>
        </div>
      </div><!-- Item -->

    </div>
  </div>
</section>
<?php } ?>

  <section class="tables dashboard-counts">
    <div class="container-fluid">
      <div class="card">
          <div class="card-header d-flex align-items-center">
              <h3 class="h4">Solicitudes de Compras</h3>              
          </div>
          <div class="card-body">

            <ul class="nav nav-tabs">
              <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 8){ ?>
              <li class="nav-item">
                <a class="nav-link btn active" data-toggle="pill" href="#general" role="tab" aria-selected="true">
                  General
                </a>
              </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#cv" role="tab" aria-selected="true">Control Vehicular</a>
                </li>
              <?php } ?>
              <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#ehs" role="tab" aria-selected="true">Seguridad e Higiene</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 7){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#ac" role="tab" aria-selected="true">Alto Costo</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 2 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#sistemas" role="tab" aria-selected="true">Sistemas</a>
                </li>
              <?php } ?>
              <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50) || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#kuali" role="tab" aria-selected="true">Kuali</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 7){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#medica" role="tab" aria-selected="true">Área Médica</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('id') == 264 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#fundidora" role="tab" aria-selected="true">E-Clamps</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#administrativo" role="tab" aria-selected="true">Administrativo</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#mantenimiento" role="tab" aria-selected="true">Mantenimiento</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#personal" role="tab" aria-selected="true">Personal</a>
                </li>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 7){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#makili" role="tab" aria-selected="true">Makili</a>
                </li>
                <?php } ?>
                <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn" data-toggle="pill" href="#kualidekuali" role="tab" aria-selected="true">Kuali de Kuali</a>
                </li>
                <?php } ?>
            </ul>

            <!-- Tab panes general -->
            <div class="tab-content">
              <div class="tab-pane active" id="general">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AG</th>
                        <th>Fecha Aprobación AG</th>
                        <th>Estatus</th>
                        <th>Cambio</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AG</th>
                        <th>Fecha Aprobación AG</th>
                        <th class="estatus">Estatus</th>
                        <th>Cambio</th>
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
              <div class="tab-pane fade" id="cv">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_cv">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_cv">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación CV1</th>
                        <th>Fecha Aprobación CV1</th>
                        <th>Aprobación CV2</th>
                        <th>Fecha Aprobación CV2</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación CV1</th>
                        <th>Fecha Aprobación CV1</th>
                        <th>Aprobación CV2</th>
                        <th>Fecha Aprobación CV2</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_cv">

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="ehs">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_ehs">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_ehs">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AG</th>
                        <th>Fecha Aprobación AG</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AG</th>
                        <th>Fecha Aprobación AG</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_ehs">

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="ac">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_ac">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_ac">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_ac">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="sistemas">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_sistemas">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_sistemas">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación Sis</th>
                        <th>Fecha Aprobación Sis</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación Sis</th>
                        <th>Fecha Aprobación Sis</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_sistemas">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="kuali">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_kuali">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_kuali">
                    <thead>
                      <tr>
                        <th>UIDs</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_kuali">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="medica">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_medica">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_medica">
                    <thead>
                      <tr>
                        <th>UIDs</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación AC</th>
                        <th>Fecha Aprobación AC</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_medica">

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="fundidora">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_fundidora">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_fundidora">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación E-Clamps1</th>
                        <th>Fecha Aprobación E-Clamps1</th>
                        <th>Aprobación E-Clamps2</th>
                        <th>Fecha Aprobación E-Clamps2</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Aprobación E-Clamps1</th>
                        <th>Fecha Aprobación E-Clamps1</th>
                        <th>Aprobación E-Clamps2</th>
                        <th>Fecha Aprobación E-Clamps2</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_fundidora">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="administrativo">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_administrativo">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_administrativo">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
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
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>                                                                                                
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_administrativo">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="mantenimiento">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_mantenimiento">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_mantenimiento">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
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
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>                        
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_mantenimiento">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="personal">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_personal">
                </div>     
                <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_personal">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Limite</th>
                        <th>Creador</th>
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
                        <th>Limite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>                                                                                                
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_personal">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="makili">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_makili">                  
                </div>
                <button onclick="window.location.href='<?php echo base_url() ?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i>Exportar a Excel</span></button>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_makili">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Límite</th>
                        <th>Creador</th>
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
                        <th>Límite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>                      
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_makili">

                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="kualidekuali">
                <br>
                <div class="float-right">
                  <input type="text" class="form-control" placeholder="Buscar" name="busqueda_kualidekuali">                
                </div>
                <button onclick="window.location.href='<?php echo base_url() ?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i>Exportar a Excel</span></button>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsolicitudes_kualidekuali">
                    <thead>
                      <tr>
                        <th>UID</th>
                        <th>Creación</th>
                        <th>Límite</th>
                        <th>Creador</th>
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
                        <th>Límite</th>
                        <th>Creador</th>
                        <th>Proyecto</th>
                        <th>Estatus</th>
                        <th>Progreso</th>
                        <th></th>
                      </tr>
                    </tfoot>
                    <tbody>                      
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacion_kualidekuali">

                  </div>
                </div>
              </div>

            </div>

          </div>
      </div>

    </div>
</section>
<script>
$(document).ready(function() {
  $(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", this.value)
        if ( this.value == '' ) {
            console.log('Error null');
            return;
        } 
        if ( this.value == 'cancelada' )
          $url = "<?= base_url()?>compras/cancelar_solicitud";
        if ( this.value == 'creada' )
          $url = "<?= base_url()?>compras/creada_solicitud";
        if ( this.value == 'aprobada' )
          $url = "<?= base_url()?>compras/aprobar_solicitud";


          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", $(this).attr('uid') );
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: $url,
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>compras");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
     
  });
});

</script>
<script>
  $(document).ready(function(){

    <?php if($this->session->userdata('tipo') == 3){ ?>
      $('a[href="#cv"]').tab('show');
    <?php }else if($this->session->userdata('tipo') == 4){ ?>
      $('a[href="#ehs"]').tab('show');
      <?php }else if($this->session->userdata('id') == 3){ ?>
      $('a[href="#general"]').tab('show');
    <?php }elseif($this->session->userdata('id') == 264){ ?>
      $('a[href="#fundidora"]').tab('show');
      <?php } ?>
    <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 8){ ?>
      mostrarDatos("",1);
      $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar,1);
      });
      $("body").on("click",".paginacion li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 3 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosCV("",1);
      $("input[name='busqueda_cv']").keyup(function() {
        textoBuscar = $("input[name='busqueda_cv']").val();
        mostrarDatosCV(textoBuscar,1);
      });
      $("body").on("click",".paginacion_cv li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_cv']").val();
        mostrarDatosCV(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('id') == 264 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosFundidora("",1);
      $("input[name='busqueda_fundidora']").keyup(function() {
        textoBuscar = $("input[name='busqueda_fundidora']").val();
        mostrarDatosFundidora(textoBuscar,1);
      });
      $("body").on("click",".paginacion_fundidora li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_fundidora']").val();
        mostrarDatosFundidora(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosAdministrativo("",1);
      $("input[name='busqueda_administrativo']").keyup(function() {
        textoBuscar = $("input[name='busqueda_administrativo']").val();
        mostrarDatosAdministrativo(textoBuscar,1);
      });
      $("body").on("click",".paginacion_administrativo li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_administrativo']").val();
        mostrarDatosAdministrativo(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosMantenimiento("",1);
      $("input[name='busqueda_mantenimiento']").keyup(function() {
        textoBuscar = $("input[name='busqueda_mantenimiento']").val();
        mostrarDatosAdministrativo(textoBuscar,1);
      });
      $("body").on("click",".paginacion_mantenimiento li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_mantenimiento']").val();
        mostrarDatosMantenimiento(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosPersonal("",1);
      $("input[name='busqueda_personal']").keyup(function() {
        textoBuscar = $("input[name='busqueda_personal']").val();
        mostrarDatosPersonal(textoBuscar,1);
      });
      $("body").on("click",".paginacion_personal li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_personal']").val();
        mostrarDatosPersonal(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo')== 7){ ?>
      mostrarDatosMakili("", 1);
      $("input[name='busqueda_makili']").keyup(function(){
        textoBuscar = $("input[name='busqueda_makili']").val();
        mostrarDatosMakili(textoBuscar,1);
      });
      $("body").on("click",".paginacion_makili li a", function(e){
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda_makili']".val());
        mostrarDatosMakili(valorBuscar, valorHref);
      });
      <?php } ?>
    
      <?php if($this->session->userdata('tipo')== 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosKualidekuali("", 1);
      $("input[name='busqueda_kualidekuali']").keyup(function(){
        textoBuscar = $("input[name='busqueda_kualidekuali']").val();
        mostrarDatosKualidekuali(textoBuscar,1);
      });
      $("body").on("click",".paginacion_kualidekuali li a", function(e){
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_kualidekuali']").val();
        mostrarDatosKualidekuali(valorBuscar, valorHref);
      });
      <?php } ?>

    <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50) || $this->session->userdata('id') == 3 || $this->session->userdata('tipo') == 7){ ?>
      mostrarDatosEHS("",1);
      $("input[name='busqueda_ehs']").keyup(function() {
        textoBuscar = $("input[name='busqueda_ehs']").val();
        mostrarDatosEHS(textoBuscar,1);
      });
      $("body").on("click",".paginacion_ehs li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_ehs']").val();
        mostrarDatosEHS(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 7){ ?>
      mostrarDatosAC("",1);
      $("input[name='busqueda_ac']").keyup(function() {
        textoBuscar = $("input[name='busqueda_ac']").val();
        mostrarDatosAC(textoBuscar,1);
      });
      $("body").on("click",".paginacion_ac li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_ac']").val();
        mostrarDatosAC(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 2 || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosSistemas("",1);
      $("input[name='busqueda_sistemas']").keyup(function() {
        textoBuscar = $("input[name='busqueda_sistemas']").val();
        mostrarDatosSistemas(textoBuscar,1);
      });
      $("body").on("click",".paginacion_sistemas li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_sistemas']").val();
        mostrarDatosSistemas(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if(($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50) || $this->session->userdata('tipo') == 7 || $this->session->userdata('id') == 3){ ?>
      mostrarDatosKuali("",1);
      $("input[name='busqueda_kuali']").keyup(function() {
        textoBuscar = $("input[name='busqueda_kuali']").val();
        mostrarDatosKuali(textoBuscar,1);
      });
      $("body").on("click",".paginacion_kuali li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_kuali']").val();
        mostrarDatosKuali(valorBuscar,valorHref); 
      });
    <?php } ?>

    <?php if($this->session->userdata('tipo') == 14 || $this->session->userdata('tipo') == 7){ ?>
      mostrarDatosMedica("",1);
      $("input[name='busqueda_medica']").keyup(function() {
        textoBuscar = $("input[name='busqueda_medica']").val();
        mostrarDatosMedica(textoBuscar,1);
      });
      $("body").on("click",".paginacion_medica li a",function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda_medica']").val();
        mostrarDatosMedica(valorBuscar,valorHref);
      });
    <?php } ?>

  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:1},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          filas += "<td>" + (item.tbl_users_ag == null ? "---" : item.tbl_users_ag) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ag == null ? "---" : item.tbl_users_fecha_users_aprobacion_ag) + "</td>";
            if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td>pendiente</td>" + "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ag'){
            filas += "<td>Pendiente AG</td>";
          }else if(item.estatus_solicitud == 'pendiente direccion'){
            filas += "<td>Pendiente Dirección</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'><a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a><a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a></td>";

          filas += "</tr>";
        });
        $('#tbsolicitudes tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion").html(paginador);
      }
    });
  }

  function mostrarDatosCV(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:29},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          
          filas += "<td>" + (item.tbl_users_cv1 == null ? "---" : item.tbl_users_cv1) + "</td><td>" + (item.tbl_users_fecha_aprobacion_cv1 == null ? "---" : item.tbl_users_fecha_aprobacion_cv1) + "</td><td>" + (item.tbl_users_cv2 == null ? "---" : item.tbl_users_cv2) + "</td><td>" + (item.tbl_users_fecha_aprobacion_cv2 == null ? "---" : item.tbl_users_fecha_aprobacion_cv2) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
              filas += "<td>Aprobada</td>";
            }
            else if(item.estatus_solicitud == 'cancelada') {
              filas += "<td>Cancelada</td>";
            }else if(item.estatus_solicitud == 'pendiente cv1'){
              filas += "<td>Pendiente CV1</td>";
            }else if(item.estatus_solicitud == 'pendiente cv2'){
              filas += "<td>Pendiente CV2</td>";
            }else if(item.estatus_solicitud == 'pendiente'){
              filas += "<td>Pendiente</td>";
            }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'>";
            filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_cv tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_cv").html(paginador);
      }
    });
  }

  function mostrarDatosFundidora(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:228},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          
          filas += "<td>" + (item.tbl_users_fundidora1 == null ? "---" : item.tbl_users_fundidora1) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_fundidora1 == null ? "---" : item.tbl_users_fecha_users_aprobacion_fundidora1) + "</td><td>" + (item.tbl_users_fundidora2 == null ? "---" : item.tbl_users_fundidora2) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_fundidora2 == null ? "---" : item.tbl_users_fecha_users_aprobacion_fundidora2) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
              filas += "<td>Aprobada</td>";
            }
            else if(item.estatus_solicitud == 'cancelada') {
              filas += "<td>Cancelada</td>";
            }else if(item.estatus_solicitud == 'pendiente fundidora1'){
              filas += "<td>Pendiente Fundidora1</td>";
            }else if(item.estatus_solicitud == 'pendiente fundidora2'){
              filas += "<td>Pendiente Fundidora2</td>";
            }else if(item.estatus_solicitud == 'pendiente'){
              filas += "<td>Pendiente</td>";
            }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'>";
            filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_fundidora tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_fundidora").html(paginador);
      }
    });
  }

  function mostrarDatosAdministrativo(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:357},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
              filas += "<td>Aprobada</td>";
            }else if(item.estatus_solicitud == 'cancelada') {
              filas += "<td>Cancelada</td>";           
            }else if(item.estatus_solicitud == 'pendiente'){
              filas += "<td>Pendiente</td>";
            }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'>";
            filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_administrativo tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_administrativo").html(paginador);
      }
    });
  }

  function mostrarDatosMantenimiento(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:358},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
                    

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
              filas += "<td>Aprobada</td>";
            }
            else if(item.estatus_solicitud == 'cancelada') {
              filas += "<td>Cancelada</td>";            
            }else if(item.estatus_solicitud == 'pendiente'){
              filas += "<td>Pendiente</td>";
            }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'>";
            filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_mantenimiento tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_mantenimiento").html(paginador);
      }
    });
  }

  function mostrarDatosPersonal(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:398},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
                    

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
              filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
            }
            else if(item.estatus_solicitud == 'aprobada') {                                      
              filas += "<td>Aprobada</td>";
            }
            else if(item.estatus_solicitud == 'cancelada') {
              filas += "<td>Cancelada</td>";            
            }else if(item.estatus_solicitud == 'pendiente'){
              filas += "<td>Pendiente</td>";
            }

            filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
            filas += "<td align='center'>";
            filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_personal tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_personal").html(paginador);
      }
    });
  }

  function mostrarDatosMakili(valorBuscar, pagina) {
    $.ajax({
      url:"<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:421},
      dataType: "json",
      success:function(response){
        filas="";
        clase="";
        clase2 = "";
        $.each(response.solicitudes,function(key,item){
          if(item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          }
          else if(item.estatus_solicitud == 'cancelada'){
            clase = 'danger';
          }
          else{
            clase = 'warning';
          }
          if(((item.comprado*100)/item.cantidad<30)){
            clase2 = 'bg-red';            
          }
          else if(((item.comprado*100)/item.cantidad>30)&& ((item.comprado*100)/item.cantidad<70)){
            clase2 = 'bg-orange';
          }
          else{
            clase2 = 'bg-green';            
          }
          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td tittle='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";          

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7){
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Seleccione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '')+ ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada'){
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada'){
            filas += "<td>Cancelada</td>";
          }
          else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }
          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad)+ "%; height: 4px;' aria-valuemin='0' aria-valuemin='0' aria-valuemax='100' class='progress-bar'" + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_makili tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //totalRegistros
        totalRegistros = response.totalRegistros;
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_makili").html(paginador);
      }
    });
  }

  function mostrarDatosKualidekuali(valorBuscar, pagina) {
    $.ajax({
      url:"<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:16,tipo_kuali:1},
      dataType: "json",
      success:function(response){
        filas="";
        clase="";
        clase2 = "";
        $.each(response.solicitudes,function(key,item){
          if(item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          }
          else if(item.estatus_solicitud == 'cancelada'){
            clase = 'danger';
          }
          else{
            clase = 'warning';
          }
          if(((item.comprado*100)/item.cantidad<30)){
            clase2 = 'bg-red';            
          }
          else if(((item.comprado*100)/item.cantidad>30)&& ((item.comprado*100)/item.cantidad<70)){
            clase2 = 'bg-orange';
          }
          else{
            clase2 = 'bg-green';            
          }
          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td tittle='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";          

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7){
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Seleccione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '')+ ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada'){
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada'){
            filas += "<td>Cancelada</td>";
          }
          else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }else if(item.estatus_solicitud == 'pendiente ag'){
            filas += "<td>Pendiente Aprobación</td>"
          }
          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad)+ "%; height: 4px;' aria-valuemin='0' aria-valuemin='0' aria-valuemax='100' class='progress-bar'" + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
            <?php if($this->session->userdata("tipo") == 7){ ?>
              filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
            <?php } ?>
            filas += "</td></tr>";
        });
        $('#tbsolicitudes_kualidekuali tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //totalRegistros
        totalRegistros = response.totalRegistros;
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_kualidekuali").html(paginador);
      }
    });
  }
  

  function mostrarDatosEHS(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:1,almacen_ehs:1},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          
          filas += "<td>" + (item.tbl_users_ag == null ? "---" : item.tbl_users_ag) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ag == null ? "---" : item.tbl_users_fecha_users_aprobacion_ag) + "</td>";
          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ag'){
            filas += "<td>Pendiente AG</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
          <?php if($this->session->userdata("tipo") == 7){ ?>
            filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
          <?php } ?>
          filas += "</td></tr>";
        });
        $('#tbsolicitudes_ehs tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_ehs").html(paginador);
      }
    });
  }

  function mostrarDatosAC(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:2},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          filas += "<td>" + (item.tbl_users_ac == null ? "---" : item.tbl_users_ac) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ac == null ? "---" : item.tbl_users_fecha_users_aprobacion_ac) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ac'){
            filas += "<td>Pendiente AC</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
          <?php if($this->session->userdata("tipo") == 7){ ?>
            filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
          <?php } ?>
          filas += "</td></tr>";

          filas += "</tr>";
        });
        $('#tbsolicitudes_ac tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_ac").html(paginador);
      }
    });
  }

  function mostrarDatosSistemas(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:30},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          filas += "<td>" + (item.tbl_users_ag == null ? "---" : item.tbl_users_ag) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ag == null ? "---" : item.tbl_users_fecha_users_aprobacion_ag) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }else if(item.estatus_solicitud == 'pendiente sis') {                                      
            filas += "<td>Pendiente Sistemas</td>";
          }else if(item.estatus_solicitud == 'pendiente kuali') {                                      
            filas += "<td>Pendiente Kuali</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ac'){
            filas += "<td>Pendiente AC</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
          <?php if($this->session->userdata("tipo") == 7){ ?>
            filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
          <?php } ?>
          filas += "</td></tr>";

          filas += "</tr>";
        });
        $('#tbsolicitudes_sistemas tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_sistemas").html(paginador);
      }
    });
  }

  function mostrarDatosKuali(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:16},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          filas += "<td>" + (item.tbl_users_ac == null ? "---" : item.tbl_users_ac) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ac == null ? "---" : item.tbl_users_fecha_users_aprobacion_ac) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }else if(item.estatus_solicitud == 'pendiente kuali') {                                      
            filas += "<td>Pendiente Kuali</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ac'){
            filas += "<td>Pendiente AC</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
          <?php if($this->session->userdata("tipo") == 7){ ?>
            filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
          <?php } ?>
          filas += "</td></tr>";

          filas += "</tr>";
        });
        $('#tbsolicitudes_kuali tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_kuali").html(paginador);
      }
    });
  }

  function mostrarDatosMedica(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Compras/mostrarSolicitudesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,idtbl_almacenes:23},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada'){
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
          filas += "<td>" + (item.tbl_users_ac == null ? "---" : item.tbl_users_ac) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ac == null ? "---" : item.tbl_users_fecha_users_aprobacion_ac) + "</td>";

          if(item.estatus_solicitud == 'pendiente' && <?= $this->session->userdata("tipo") ?> == 7) {
            filas += "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td>";
          }else if(item.estatus_solicitud == 'pendiente ac'){
            filas += "<td>Pendiente AC</td>";
          }else if(item.estatus_solicitud == 'pendiente'){
            filas += "<td>Pendiente</td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>";
          filas += "<td align='center'>";
          filas += "<a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a>";
          <?php if($this->session->userdata("tipo") == 7){ ?>
            filas += "<a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a>";
          <?php } ?>
          filas += "</td></tr>";

          filas += "</tr>";
        });
        $('#tbsolicitudes_medica tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
        /*for(var i = 1; i <= numeroLinks; i++) {
          if(i == linkSeleccionado) 
            paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
        }
        paginador += "</ul>";*/
        if(linkSeleccionado > 1) {
          paginador += "<li class='page-item'><a href='1' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado-1) + "' class='page-link'>&lsaquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
        }
        cant = 2;
        pagInicio = (linkSeleccionado > cant) ? (linkSeleccionado - cant) : 1;
        if(numeroLinks > cant) {
          pagRestantes = numeroLinks - linkSeleccionado;
          pagFin = (pagRestantes > cant) ? (linkSeleccionado + cant) : numeroLinks;
        }
        else {
          pagFin = numeroLinks;
        }
        for(var i = pagInicio; i <= pagFin; i++) {
          if(i == linkSeleccionado) {
            paginador += "<li class='page-item active'><a href='javascript:void(0);' class='page-link'>" + i + "</a></li>";
          }
          else {
            paginador += "<li class='page-item'><a href='" + i + "' class='page-link'>" + i + "</a></li>";
          }
        }
        if(linkSeleccionado < numeroLinks) {
          paginador += "<li class='page-item'><a href='" + (linkSeleccionado+1) + "' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item'><a href='" + numeroLinks + "' class='page-link'>&raquo;</a></li>";
        }
        else {
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
          paginador += "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        }
        paginador += "</ul>";
        $(".paginacion_medica").html(paginador);
      }
    });
  }

  function actualizar(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
        if ( valor == 'cancelada' ){
          Swal.fire({
            title: 'Motivo cancelación',
            input: 'text',
            inputAttributes: {
              autocapitalize: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
            showLoaderOnConfirm: true,
            preConfirm: (motivo) => {
              $url = "<?= base_url()?>compras/cancelar_solicitud";
              
            },
            allowOutsideClick: () => !Swal.isLoading()
          }).then((result) => {
            console.log(result);
            if (result.value) {
              var formData = new FormData();
              formData.append("token", "<?=$this->session->userdata('token');?>");
              formData.append("uid", uid );
              formData.append("motivo", result.value);
              console.log("hola",formData);
              $data = formData;
              // console.log(formData); return;
                $.ajax({
                    url: $url,
                    type: "post",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        console.log("res1 ",res)
                        var resp = JSON.parse(res.responseText);
                        // console.log("res2 ",res)
                        if (resp.error==false) {
                            window.location.replace("<?= base_url()?>compras");
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            });
                        }
                    }
                });
            }
          })
        }
        if ( valor == 'creada' )
          $url = "<?= base_url()?>compras/creada_solicitud";
        if ( valor == 'aprobada' )
          $url = "<?= base_url()?>compras/aprobar_solicitud";


          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: $url,
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>compras");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
     
  //});
  }
  $('#editarSolicitudCompra').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data() // Extract info from data-* attributes
  console.log(recipient)
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find("input[name='uid']").val(recipient.uid);
  modal.find("textarea[name='nota_cambio_proyecto']").val(recipient.nota_cambio_proyecto);
  });
  function cambiarProyecto() {
    if($("textarea[name='nota_cambio_proyecto']").val() == "") {
      Toast.fire({
          type: 'error',
          title: 'Es necesario agregar un motivo de cancelación'
      });
      return;
    }
    formData = new FormData($("#cambiarProyecto")[0]);
    Swal.fire({
    title: 'Cambiar proyecto?',
    text: "Deseas cambiar el proyecto !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>Compras/cambiarProyecto",
          type: "post",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(res) {
            if (res=="OK") { 
              Toast.fire({
                type: 'success',
                title: 'El proyecto ha sido actualizado correctamente'
              });
              mostrarDatos("",1);
              return;    
            } 
            if(res=="ERROR") {
              Toast.fire({
                  type: 'error',
                  title: 'Error al cambiar el proyecto'
              });
            }
          }
        });
      }
    })
  }
</script>