<?php if ($tipo_permiso && $tipo_permiso == 2) : ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Almacén General</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-seguridad" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Seguridad e Higiene</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->

        <?php if (isset($this->session->userdata('permisos')['devoluciones_alto_costo']) && $this->session->userdata('permisos')['devoluciones_alto_costo']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-alto-costo" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Alto Costo</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>

      </div>

      <div class="row">
        <?php if (isset($this->session->userdata('permisos')['devoluciones_kuali']) && $this->session->userdata('permisos')['devoluciones_kuali']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-kuali" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Kuali</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>

        <?php if (isset($this->session->userdata('permisos')['devoluciones_autos_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_autos_control_vehicular']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-autos-control-vehicular" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Autos CV</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>

        <?php if (isset($this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-refacciones-control-vehicular" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Refacciones CV</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>
      </div>

      <div class="row">
        <?php if (isset($this->session->userdata('permisos')['devoluciones_area_medica']) && $this->session->userdata('permisos')['devoluciones_area_medica']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-area-medica" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Área Médica</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>

        <?php if (isset($this->session->userdata('permisos')['devoluciones_sistemas']) && $this->session->userdata('permisos')['devoluciones_sistemas']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-sistemas" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Sistemas</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>

        <?php if (isset($this->session->userdata('permisos')['devoluciones_tarjetas']) && $this->session->userdata('permisos')['devoluciones_tarjetas']>0): ?>
        <!-- Item -->
        <div class="col-xl-4 col-sm-8 col-md-6 col-xs-5 mt-3">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-tarjetas" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución Tarjetas</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <?php endif; ?>
      </div>

    </div>
  </section>
<?php endif; ?>

<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de devolución</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
              Almacen General
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link btn" id="pills-higiene-tab" data-toggle="pill" href="#pills-higiene" role="tab" aria-controls="pills-higiene" aria-selected="false">
              Seguridad e Higiene
            </a>
          </li>

          <?php if (isset($this->session->userdata('permisos')['devoluciones_alto_costo']) && $this->session->userdata('permisos')['devoluciones_alto_costo']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-altocosto-tab" data-toggle="pill" href="#pills-altocosto" role="tab" aria-controls="pills-altocosto" aria-selected="false">
              Alto Costo
            </a>
          </li>
          <?php endif; ?>

          <?php if (isset($this->session->userdata('permisos')['devoluciones_kuali']) && $this->session->userdata('permisos')['devoluciones_kuali']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-kualid-tab" data-toggle="pill" href="#pills-kualid" role="tab" aria-controls="pills-kualid" aria-selected="false">
              Kuali
            </a>
          </li>
          <?php endif; ?>

          <?php if(isset($this->session->userdata('permisos')['devoluciones_autos_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_autos_control_vehicular']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-autoscv-tab" data-toggle="pill" href="#pills-autoscv" role="tab" aria-controls="pills-autoscv" aria-selected="false">
              Autos CV
            </a>
          </li>
          <?php endif; ?>

          <?php if (isset($this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-refcv-tab" data-toggle="pill" href="#pills-refcv" role="tab" aria-controls="pills-refcv" aria-selected="false">
              Refacciones CV
            </a>
          </li>
          <?php endif; ?>

          <?php if (isset($this->session->userdata('permisos')['devoluciones_area_medica']) && $this->session->userdata('permisos')['devoluciones_area_medica']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
              Área Médica
            </a>
          </li>
          <?php endif; ?>

          <?php if (isset($this->session->userdata('permisos')['devoluciones_sistemas']) && $this->session->userdata('permisos')['devoluciones_sistemas']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
              Sistemas
            </a>
          </li>
          <?php endif; ?>
          
          <?php if (isset($this->session->userdata('permisos')['devoluciones_tarjetas']) && $this->session->userdata('permisos')['devoluciones_tarjetas']>0): ?>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-tarjetas-tab" data-toggle="pill" href="#pills-tarjetas" role="tab" aria-controls="pills-tarjetas" aria-selected="false">
              Tarjetas
            </a>
          </li>
          <?php endif; ?>

          <?php if($this->session->userdata('tipo') == 4){ ?>
            <li class="nav-item">
            <a class="nav-link btn" id="pills-villa-tab" data-toggle="pill" href="#pills-villa" role="tab" aria-controls="pills-villa" aria-selected="false">
              87.07
            </a>
          </li>
          <?php } ?>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!--  -->
        <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">    
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-devoluciones-AG'" class="btn btn-primary" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionag">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectAG" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
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
        </div> <!-- /tab almacen -->


        <div class="tab-pane fade" id="pills-higiene">    
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
        </div>
        <a href="<?php echo base_url() ?>almacen/excel_devoluciones_SH" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>        
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionsh">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación SH</th>
                <th>Fecha Aprobación SH</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación SH</th>
                <th>Fecha Aprobación SH</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectSH" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
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


        <div class="tab-pane fade" id="pills-altocosto">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_AC" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionac">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AC</th>
                  <th>Fecha Aprobación AC</th>
                  <th>Entrega</th>
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
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AC</th>
                  <th>Fecha Aprobación AC</th>
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectAC" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="C.O">Pendiente aprobación C.O</option>
                      <option value="A.C">Pendiente entrega A.C</option>
                      <option value="aprobada">Aprobada por A.C</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada A.C">Cancelada A.C</option>
                    </select>
                  </th>
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


        <div class="tab-pane fade" id="pills-autoscv">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda4">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_ACV" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionacv">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>
                  <th>Entrega</th>
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
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectACV" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="C.O">Pendiente aprobación C.O</option>
                      <option value="A.C.V">Pendiente entrega A.C.V</option>
                      <option value="aprobada">Aprobada por C.V</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada C.V">Cancelada C.V</option>
                    </select>
                  </th>
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


        <div class="tab-pane fade" id="pills-sistemas">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda5">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_sistemas" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionsist">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación Sistemas</th>
                  <th>Fecha Aprobación Sistemas</th>
                  <th>Entrega</th>
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
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación Sistemas</th>
                  <th>Fecha Aprobación Sistemas</th>
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectSis" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="C.O">Pendiente aprobación C.O</option>
                      <option value="Sis">Pendiente entrega A.C</option>
                      <option value="aprobada">Aprobada por A.C</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada Sis">Cancelada A.C</option>
                    </select>
                  </th>
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


        <div class="tab-pane fade" id="pills-kualid">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda6">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_kuali" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionkuali">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación Kuali</th>
                  <th>Fecha Aprobación Kuali</th>             
                  <th>Entrega</th>
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
                  <th>Aprobación Kuali</th>
                  <th>Fecha Aprobación Kuali</th>    
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectK" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>                    
                      <option value="K">Pendiente entrega Kuali</option>
                      <option value="aprobada">Aprobada por Kuali</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada K">Cancelada Kuali</option>
                    </select>
                  </th>
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
          </div>
        </div>

        
        <div class="tab-pane fade" id="pills-refcv">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_refaccionescv" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionrefcv">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>             
                  <th>Entrega</th>
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
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>    
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectRCV" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>                    
                      <option value="RCV">Pendiente entrega Control Vehicular</option>
                      <option value="aprobada">Aprobada por Control Vehicular</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada RCV">Cancelada Control Vehicular</option>
                    </select>
                  </th>
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


        <div class="tab-pane fade" id="pills-areamedica">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda8">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_areamedica" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionamed">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación AM</th>
                  <th>Fecha Aprobación AM</th>
                  <th>Entrega</th>
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
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectAMD" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>
                      <option value="C.O">Pendiente aprobación C.O</option>
                      <option value="A.C">Pendiente entrega A.C</option>
                      <option value="aprobada">Aprobada por A.C</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada A.C">Cancelada A.C</option>
                    </select>
                  </th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                
              </tbody>
            </table>
            <br>
            <div class="paginacion8">

            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="pills-tarjetas">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busqueda9">
          </div>
          <a href="<?php echo base_url() ?>almacen/excel_devoluciones_tarjetas" class="btn btn-primary float-left"><i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
          <div class="table-responsive">
            <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevoluciontarjetas">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>             
                  <th>Entrega</th>
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
                  <th>Aprobación CV</th>
                  <th>Fecha Aprobación CV</th>    
                  <th>Entrega</th>
                  <th>Proyecto</th>
                  <th width="120">
                    <select name="selectRCVT" style="font-size: 10px;" class="form-control">
                      <option value="">Seleccionar</option>                    
                      <option value="RCVT">Pendiente entrega Control Vehicular</option>
                      <option value="aprobada">Aprobada por Control Vehicular</option>
                      <option value="entregado">Entregado</option>
                      <option value="cancelada RCV">Cancelada Control Vehicular</option>
                    </select>
                  </th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                
              </tbody>
            </table>
            <br>
            <div class="paginacion9">

            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="pills-villa">    
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busquedaVilla">
        </div>
        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-devoluciones-AG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevolucionvilla">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación SH</th>
                <th>Fecha Aprobación SH</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación SH</th>
                <th>Fecha Aprobación SH</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectVilla" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
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
        </div>
      </div>
    </div>
  </div>
</section>


<?php if($this->session->userdata('tipo') == 4){ ?>
<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de devolución</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-reynosa-tab" data-toggle="pill" href="#pills-reynosa" role="tab" aria-controls="pills-reynosa" aria-selected="false">
              Reynosa
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-tabasco-tab" data-toggle="pill" href="#pills-tabasco" role="tab" aria-controls="pills-tabasco" aria-selected="false">
              Tabasco
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-tijuana-tab" data-toggle="pill" href="#pills-tijuana" role="tab" aria-controls="pills-tijuana" aria-selected="false">
              Tijuana
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-tuxpan-tab" data-toggle="pill" href="#pills-tuxpan" role="tab" aria-controls="pills-tuxpan" aria-selected="false">
              Tuxpan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-monclova-tab" data-toggle="pill" href="#pills-monclova" role="tab" aria-controls="pills-monclova" aria-selected="false">
              Monclova
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-jalisco-tab" data-toggle="pill" href="#pills-jalisco" role="tab" aria-controls="pills-jalisco" aria-selected="false">
              Jalisco
            </a>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-reynosa">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaReynosa">
            </div>
            <div class="table-responsive">
              <table id="tbsolicitudesdevolucionreynosa" class="table table-striped table-sm">
              <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectReynosa" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
                <tbody>
                
                </tbody>
              </table>
              <br>
              <div class="paginacionReynosa">
              </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-tabasco">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaTabasco">
          </div>
          <div class="table-responsive">
            <table id="tbsolicitudesdevoluciontabasco" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectTabasco" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionTabasco">
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-tijuana">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaTijuana">
          </div>
          <div class="table-responsive">
            <table id="tbsolicitudesdevoluciontijuana" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectTijuana" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionTijuana">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-tuxpan">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaTuxpan">
          </div>
          <div class="table-responsive">
            <table id="tbsolicitudesdevoluciontuxpan" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectTuxpan" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionTuxpan">
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="pills-monclova">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaMonclova">
          </div>
          <div class="table-responsive">
            <table id="tbsolicitudesdevolucionmonclova" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectMonclova" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionMonclova">
            </div>
          </div>
        </div>


        <div class="tab-pane fade" id="pills-jalisco">
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaJalisco">
          </div>
          <div class="table-responsive">
            <table id="tbsolicitudesdevolucionjalisco" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
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
                <th>Aprobación CO</th>
                <th>Fecha Aprobación CO</th>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectJalisco" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>
                    <option value="C.O">Pendiente aprobación C.O</option>
                    <option value="A.G">Pendiente entrega A.G</option>
                    <option value="aprobada">Aprobada por A.G</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada A.G">Cancelada A.G</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionJalisco">
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<script>
  $(document).ready(function() {
    mostrarDatos("", 1, "");
    mostrarDatos2("", 1, "");
    <?php if (isset($this->session->userdata('permisos')['devoluciones_alto_costo']) && $this->session->userdata('permisos')['devoluciones_alto_costo']>0): ?>
      mostrarDatosAC("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_autos_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_autos_control_vehicular']>0): ?>
      mostrarDatosACV("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_sistemas']) && $this->session->userdata('permisos')['devoluciones_sistemas']>0): ?>
      mostrarDatosSist("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_kuali']) && $this->session->userdata('permisos')['devoluciones_kuali']>0): ?>
      mostrarDatosKuali("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']>0): ?>
      mostrarDatosRefcv("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_area_medica']) && $this->session->userdata('permisos')['devoluciones_area_medica']>0): ?>
      mostrarDatosAmed("", 1, "");
    <?php endif; ?>
    <?php if (isset($this->session->userdata('permisos')['devoluciones_tarjetas']) && $this->session->userdata('permisos')['devoluciones_tarjetas']>0): ?>
      mostrarDatosTarjetas("", 1, "");
    <?php endif; ?>
    <?php if($this->session->userdata('tipo') == 4){ ?>
      mostrarDatosReynosa("", 1, "");
      mostrarDatosTabasco("", 1, "");
      mostrarDatosTijuana("", 1, "");
      mostrarDatosTuxpan("", 1, "");
      mostrarDatosMonclova("", 1, "");
      mostrarDatosJalisco("", 1, "");
    <?php } ?>
    <?php if($this->session->userdata('tipo') == 4){ ?>
      mostrarDatosVilla("", 1, "");
    <?php } ?>
    
    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      textoBuscar2 = $("select[name='selectAG']").val();
      mostrarDatos(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      textoBuscar2 = $("select[name='selectSH']").val();
      mostrarDatos2(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      textoBuscar2 = $("select[name='selectAC']").val();
      mostrarDatosAC(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda4']").keyup(function() {
      textoBuscar = $("input[name='busqueda4']").val();
      textoBuscar2 = $("select[name='selectAC']").val();
      mostrarDatosACV(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda5']").keyup(function() {
      textoBuscar = $("input[name='busqueda5']").val();
      textoBuscar2 = $("select[name='selectSis']").val();
      mostrarDatosSist(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda6']").keyup(function() {
      textoBuscar = $("input[name='busqueda6']").val();
      textoBuscar2 = $("select[name='selectK']").val();
      mostrarDatosKuali(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda7']").keyup(function() {
      textoBuscar = $("input[name='busqueda7']").val();
      textoBuscar2 = $("select[name='selectRCV']").val();
      mostrarDatosRefcv(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda8']").keyup(function() {
      textoBuscar = $("input[name='busqueda8']").val();
      textoBuscar2 = $("select[name='selectAMD']").val();
      mostrarDatosAmed(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busqueda9']").keyup(function() {
      textoBuscar = $("input[name='busqueda9']").val();
      textoBusca2 = $("select[name='selectRCVT']").val();
      mostrarDatosTarjetas(textoBuscar,1,textoBuscar2);
    });
    $("input[name='busquedaReynosa']").keyup(function() {
      textoBuscar = $("input[name='busquedaReynosa']").val();
      textoBuscar2 = $("select[name='selectReynosa']").val();
      mostrarDatosReynosa(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaTabasco']").keyup(function() {
      textoBuscar = $("input[name='busquedaTabasco']").val();
      textoBuscar2 = $("select[name='selectTabasco']").val();
      mostrarDatosTabasco(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaTijuana']").keyup(function() {
      textoBuscar = $("input[name='busquedaTijuana']").val();
      textoBuscar2 = $("select[name='selectTijuana']").val();
      mostrarDatosTijuana(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaTuxpan']").keyup(function() {
      textoBuscar = $("input[name='busquedaTuxpan']").val();
      textoBuscar2 = $("select[name='selectTuxpan']").val();
      mostrarDatosTuxpan(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaMonclova']").keyup(function() {
      textoBuscar = $("input[name='busquedaMonclova']").val();
      textoBuscar2 = $("select[name='selectMonclova']").val();
      mostrarDatosMonclova(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaJalisco']").keyup(function() {
      textoBuscar = $("input[name='busquedaJalisco']").val();
      textoBuscar2 = $("select[name='selectJalisco']").val();
      mostrarDatosJalisco(textoBuscar, 1, textoBuscar2);
    });
    $("input[name='busquedaVilla']").keyup(function() {
      textoBuscar = $("input[name='busquedaVilla']").val();
      textoBuscar2 = $("select[name='selectVilla']").val();
      mostrarDatosVilla(textoBuscar, 1, textoBuscar2);
    });

    $("select[name='selectAG']").on('change', function() {
      selectBuscar = $("select[name='selectAG']").val();
      mostrarDatos('', 1, selectBuscar);
    });
    $("select[name='selectSH']").on('change', function() {
      selectBuscar = $("select[name='selectSH']").val();
      mostrarDatos2('', 1, selectBuscar);
    });
    $("select[name='selectAC']").on('change', function() {
      selectBuscar = $("select[name='selectAC']").val();
      mostrarDatosAC('', 1, selectBuscar);
    });
    $("select[name='selectACV']").on('change', function() {
      selectBuscar = $("select[name='selectACV']").val();
      mostrarDatosACV('', 1, selectBuscar);
    });
    $("select[name='selectSis']").on('change', function() {
      selectBuscar = $("select[name='selectSis']").val();
      mostrarDatosSist('', 1, selectBuscar);
    });
    $("select[name='selectK']").on('change', function() {
      selectBuscar = $("select[name='selectK']").val();
      mostrarDatosKuali('', 1, selectBuscar);
    });
    $("select[name='selectRCV']").on('change', function() {
      selectBuscar = $("select[name='selectRCV']").val();
      mostrarDatosRefcv('', 1, selectBuscar);
    });
    $("select[name='selectAMD']").on('change', function() {
      selectBuscar = $("select[name='selectAMD']").val();
      mostrarDatosAmed('', 1, selectBuscar);
    });
    $("select[name='selectRCVT']").on('change', function() {
      selectBuscar = $("select[name='selectRCVT']").val();
      mostrarDatosTarjetas('', 1, selectBuscar);
    });
    $("select[name='selectReynosa']").on('change', function() {
      selectBuscar = $("select[name='selectReynosa']").val();
      mostrarDatosReynosa('', 1, selectBuscar);
    });
    $("select[name='selectTabasco']").on('change', function() {
      selectBuscar = $("select[name='selectTabasco']").val();
      mostrarDatosTabasco('', 1, selectBuscar);
    });
    $("select[name='selectTijuana']").on('change', function() {
      selectBuscar = $("select[name='selectTijuana']").val();
      mostrarDatosTijuana('', 1, selectBuscar);
    });
    $("select[name='selectTuxpan']").on('change', function() {
      selectBuscar = $("select[name='selectTuxpan']").val();
      mostrarDatosTuxpan('', 1, selectBuscar);
    });
    $("select[name='selectMonclova']").on('change', function() {
      selectBuscar = $("select[name='selectMonclova']").val();
      mostrarDatosMonclova('', 1, selectBuscar);
    });
    $("select[name='selectJalisco']").on('change', function() {
      selectBuscar = $("select[name='selectJalisco']").val();
      mostrarDatosJalisco('', 1, selectBuscar);
    });
    $("select[name='selectVilla']").on('change', function() {
      selectBuscar = $("select[name='selectVilla']").val();
      mostrarDatosVilla('', 1, selectBuscar);
    });

    $("body").on("click", ".paginacion li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      valorBuscar2 = $("select[name='selectAG']").val();
      mostrarDatos(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacion2 li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      valorBuscar2 = $("select[name='selectSH']").val();
      mostrarDatos2(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click",".paginacion3 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda3']").val();
      valorBuscar2 = $("select[name='selectAC']").val();
      mostrarDatosAC(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion4 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda4']").val();
      valorBuscar2 = $("select[name='selectACV']").val();
      mostrarDatosACV(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion5 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda5']").val();
      valorBuscar2 = $("select[name='selectSis']").val();
      mostrarDatosSist(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion6 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda6']").val();
      valorBuscar2 = $("select[name='selectK']").val();
      mostrarDatosKuali(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion7 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda7']").val();
      valorBuscar2 = $("select[name='selectRCV']").val();
      mostrarDatosRefcv(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion8 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda8']").val();
      valorBuscar2 = $("select[name='selectAMD']").val();
      mostrarDatosAmed(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click",".paginacion9 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda9']").val();
      valorBuscar2 = $("select[name='selectRCVT']").val();
      mostrarDatosTarjetas(valorBuscar,valorHref,valorBuscar2); 
    });
    $("body").on("click", ".paginacionReynosa li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaReynosa']").val();
      valorBuscar2 = $("select[name='selectReynosa']").val();
      mostrarDatosReynosa(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionTabasco li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaTabasco']").val();
      valorBuscar2 = $("select[name='selectTabasco']").val();
      mostrarDatosTabasco(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionTijuana li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaTijuana']").val();
      valorBuscar2 = $("select[name='selectTijuana']").val();
      mostrarDatosTijuana(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionTuxpan li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaTuxpan']").val();
      valorBuscar2 = $("select[name='selectTuxpan']").val();
      mostrarDatosTuxpan(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionMonclova li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaMonclova']").val();
      valorBuscar2 = $("select[name='selectMonclova']").val();
      mostrarDatosMonclova(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionJalisco li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaJalisco']").val();
      valorBuscar2 = $("select[name='selectJalisco']").val();
      mostrarDatosJalisco(valorBuscar, valorHref, valorBuscar2);
    });
    $("body").on("click", ".paginacionVilla li a", function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaVilla']").val();
      valorBuscar2 = $("select[name='selectVilla']").val();
      mostrarDatosVilla(valorBuscar, valorHref, valorBuscar2);
    });
  });

  function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionAG",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionAG, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
          filas += '<i class="fa fa-info-circle"></i>';
          filas += '</a>';
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionag tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;

        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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

  function mostrarDatos2(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionSH",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionSH, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
          filas += '<i class="fa fa-info-circle"></i>';
          filas += '</a>';
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionsh tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;

        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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


  function mostrarDatosAC(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionAC",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionAC,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'Pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.C':
              clase = 'warning';
              estatus = 'Pendiente entrega Alto Costo';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'Aprobada por A.C';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'Entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.C':
              clase = 'danger';
              estatus = 'Cancelada A.C';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'Contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += "<tr class='table-" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>" + item['fecha_creacion'] + "</td>";
          filas += "<td>" + item['user_autor'] + "</td>";
          filas += "<td>" + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + "</td>";
          filas += "<td>" + (item['user_alto_costo'] == null ? '----' : item['user_alto_costo']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_ac'] == null ? '----' : item['fecha_aprobacion_ac']) + "</td>";
          filas += "<td>" + item['recibe'] + "</td>";
          filas += "<td title='" + item['nombre_proyecto'] + "'>" + item['numero_proyecto'] + "</td>";
          filas += "<td class='text-center font-weight-bold text-capitalize'>" + estatus + "</td>";
          filas += "<td class='text-center font-weight-bold'>" + porcentaje + " %</td>";
          filas += "<td class='text-center'>";
          if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion-interno/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          else {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          filas += "</td></tr>";
        });
        $('#tbsolicitudesdevolucionac tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion3").html(paginador);
      }
    });
  }


  function mostrarDatosACV(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionACV",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionACV,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.C':
              clase = 'warning';
              estatus = 'pendiente entrega Alto Costo';
              porcentaje = '66';
              break;
            case 'A.C.V':
              clase = 'warning';
              estatus = 'pendiente entrega Control Vehicular';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por C.V';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada C.V':
              clase = 'danger';
              estatus = 'cancelada C.V';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += "<tr class='table-" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>" + item['fecha_creacion'] + "</td>";
          filas += "<td>" + item['user_autor'] + "</td>";
          filas += "<td>" + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + "</td>";
          filas += "<td>" + (item['user_autos_control_vehicular'] == null ? '----' : item['user_autos_control_vehicular']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_acv'] == null ? '----' : item['fecha_aprobacion_acv']) + "</td>";
          filas += "<td>" + item['recibe'] + "</td>";
          filas += "<td title='" + item['nombre_proyecto'] + "'>" + item['numero_proyecto'] + "</td>";
          filas += "<td class='text-center font-weight-bold text-capitalize'>" + estatus + "</td>";
          filas += "<td class='text-center font-weight-bold'>" + porcentaje + " %</td>";
          filas += "<td class='text-center'>";
          if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion-interno/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          else {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          filas += "</td></tr>";
        });
        $('#tbsolicitudesdevolucionacv tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion4").html(paginador);
      }
    });
  }


  function mostrarDatosSist(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionSistemas",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionSistemas,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'Sis':
              clase = 'warning';
              estatus = 'pendiente entrega Sistemas';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por Sistemas';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada Sis':
              clase = 'danger';
              estatus = 'cancelada Sistemas';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += "<tr class='table-" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>" + item['fecha_creacion'] + "</td>";
          filas += "<td>" + item['user_autor'] + "</td>";
          filas += "<td>" + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + "</td>";
          filas += "<td>" + (item['user_sistemas'] == null ? '----' : item['user_sistemas']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_sis'] == null ? '----' : item['fecha_aprobacion_sis']) + "</td>";
          filas += "<td>" + item['recibe'] + "</td>";
          filas += "<td title='" + item['nombre_proyecto'] + "'>" + item['numero_proyecto'] + "</td>";
          filas += "<td class='text-center font-weight-bold text-capitalize'>" + estatus + "</td>";
          filas += "<td class='text-center font-weight-bold'>" + porcentaje + " %</td>";
          filas += "<td class='text-center'>";
          if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion-interno/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          else {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          filas += "</td></tr>";
        });
        $('#tbsolicitudesdevolucionsist tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion5").html(paginador);
      }
    });
  }


  function mostrarDatosKuali(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionKuali",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionKuali,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'K':
              clase = 'warning';
              estatus = 'pendiente entrega Kuali';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por Kuali';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada K':
              clase = 'danger';
              estatus = 'cancelada Kuali';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_kuali'] == null ? '----' : item['user_kuali']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_k'] == null ? '----' : item['fecha_aprobacion_k']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && (<?= $this->session->userdata('tipo') ?> == 4 && <?= $this->session->userdata('id') ?> != 50) ) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          }
          else {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          }
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionkuali tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion6").html(paginador);
      }
    });
  }


  function mostrarDatosRefcv(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionRCV",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionRCV,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'RCV':
              clase = 'warning';
              estatus = 'pendiente entrega control vehicular';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por control vehicular';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada RCV':
              clase = 'danger';
              estatus = 'cancelada control vehicular';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_refacciones_cv'] == null ? '----' : item['user_refacciones_cv']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_rcv'] == null ? '----' : item['fecha_aprobacion_rcv']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
          filas += '<i class="fa fa-info-circle"></i>';
          filas += '</a>';
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionrefcv tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion7").html(paginador);
      }
    });
  }


  function mostrarDatosAmed(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionAreaMedica",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionAreaMedica,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'A.M':
              clase = 'warning';
              estatus = 'Pendiente aprobación A.M';
              porcentaje = '50';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.M';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.M':
              clase = 'danger';
              estatus = 'cancelada A.C';
              porcentaje = '0';
              break;
          }
          filas += "<tr class='table-" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>" + item['fecha_creacion'] + "</td>";
          filas += "<td>" + item['user_autor'] + "</td>";
          filas += "<td>" + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + "</td>";
          filas += "<td>" + (item['fecha_aprobacion_am'] == null ? '----' : item['fecha_aprobacion_am']) + "</td>";
          filas += "<td>" + item['recibe'] + "</td>";
          filas += "<td title='" + item['nombre_proyecto'] + "'>" + item['numero_proyecto'] + "</td>";
          filas += "<td class='text-center font-weight-bold text-capitalize'>" + estatus + "</td>";
          filas += "<td class='text-center font-weight-bold'>" + porcentaje + " %</td>";
          filas += "<td class='text-center'>";
          if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion-interno/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          else {
          filas += "<a href='" + "<?= base_url() ?>almacen/detalle-devolucion/" + item['uid'] + "' title='Detalles'>";
          filas += "<i class='fa fa-info-circle'></i>";
          filas += "</a>";
          }
          filas += "</td></tr>";
        });
        $('#tbsolicitudesdevolucionamed tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion8").html(paginador);
      }
    });
  }


  function mostrarDatosTarjetas(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTarjetas",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionTarjetas,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'TCV':
              clase = 'warning';
              estatus = 'pendiente entrega control vehicular';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por control vehicular';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada RCV':
              clase = 'danger';
              estatus = 'cancelada control vehicular';
              porcentaje = '0';
              break;                      
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_refacciones_cv'] == null ? '----' : item['user_refacciones_cv']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_rcv'] == null ? '----' : item['fecha_aprobacion_rcv']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
          filas += '<i class="fa fa-info-circle"></i>';
          filas += '</a>';
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevoluciontarjetas tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
        paginador = "<ul class='pagination justify-content-center'>";
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
        $(".paginacion9").html(paginador);
      }
    });
  }


  function mostrarDatosReynosa(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionReynosa",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionReynosa, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionreynosa tbody').html(filas);
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
        $(".paginacionReynosa").html(paginador);
      }
    });
  }
  function mostrarDatosTabasco(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTabasco",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionTabasco, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevoluciontabasco tbody').html(filas);
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
        $(".paginacionTabasco").html(paginador);
      }
    });
  }
  function mostrarDatosTijuana(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTijuana",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionTijuana, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevoluciontijuana tbody').html(filas);
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
        $(".paginacionTijuana").html(paginador);
      }
    });
  }
  function mostrarDatosTuxpan(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTuxpan",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionTuxpan, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevoluciontuxpan tbody').html(filas);
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
        $(".paginacionTuxpan").html(paginador);
      }
    });
  }
  function mostrarDatosMonclova(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionMonclova",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionMonclova, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionmonclova tbody').html(filas);
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
        $(".paginacionMonclova").html(paginador);
      }
    });
  }

  function mostrarDatosJalisco(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionJalisco",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesJalisco, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionjalisco tbody').html(filas);
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
        $(".paginacionJalisco").html(paginador);
      }
    });
  }

  function mostrarDatosVilla(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionVilla",
      type: "POST",
      data: {
        buscar: valorBuscar,
        nropagina: pagina,
        buscar2: valorBuscar2
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionVilla, function(key, item) {
          switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'warning';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '50';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '75';
              break;
            case 'SH':
              clase = 'secondary';
              estatus = 'Pendiente aprobación SH';
              porcentaje = '25';
              break;
            case 'cancelada S.H':
              clase = 'danger';
              estatus = 'Cancelada SH';
              porcentaje = '0';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '85';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';
          filas += '<td>' + (item['user_sh'] == null ? '----' : item['user_sh']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_sh'] == null ? '----' : item['fecha_aprobacion_sh']) + '</td>';
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevolucionvilla tbody').html(filas);
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
</script>