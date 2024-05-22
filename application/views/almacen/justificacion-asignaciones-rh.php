<section>
<div class="container-fluid pt-5">
<div class="row">
    <div class="col-12">
		<!-- Asignaciones  -->
        <div class="card">
          <div class="card-header">
            <h4 class="h4">Asignaciones <small class="float-right">Precio Dolar
                $<?php echo $precio_dolar ?></small>
            </h4>
          </div>
          <div class="card-body grid-form">
            <div style="padding-top: 10px;">            
              <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                <!-- Tabs que verán almacén, alto costo y RH -->
              <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 5 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 12){ ?>
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
                  <a class="nav-link btn" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                    Kuali
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                    Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
                    Área Médica
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                    Sistemas
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-ehs-tab" data-toggle="pill" href="#pills-ehs" role="tab" aria-controls="pills-ehs" aria-selected="false">
                    EHS
                  </a>
                 </li>
              <?php } ?>
              <!-- /Tabs almacén y alto costo -->

              <!-- Tabs que verán Control vehicular -->
              <?php if($this->session->userdata('tipo') == 3){ ?>
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-control-vehicular-tab" data-toggle="pill" href="#pills-control-vehicular" role="tab" aria-controls="pills-control-vehicular" aria-selected="false">
                    Control Vehicular
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn" id="pills-refacciones-control-vehicular-tab" data-toggle="pill" href="#pills-refacciones-control-vehicular" role="tab" aria-controls="pills-refacciones-control-vehicular" aria-selected="false">
                    Refacciones Control Vehicular
                  </a>
                </li>
                <?php } ?>
                <!-- /Tabs Control vehicular -->

                <!-- Tabs que verá Área médica -->
                <?php if($this->session->userdata('tipo') == 14){ ?>
                  <li class="nav-item">
                  <a class="nav-link btn active" id="pills-areamedica-tab" data-toggle="pill" href="#pills-areamedica" role="tab" aria-controls="pills-areamedica" aria-selected="false">
                    Área Médica
                  </a>
                 </li>
                  <?php } ?>
                  <!-- /Tabs Área Médica -->

                  <!-- Tabs que verá Sistemas -->
                  <?php if($this->session->userdata('tipo') == 2){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-sistemas-tab" data-toggle="pill" href="#pills-sistemas" role="tab" aria-controls="pills-sistemas" aria-selected="false">
                    Sistemas
                  </a>
                 </li>
                  <?php } ?>
                  <!-- Tabs Sistemas -->

                  <!-- Tabs que verán Seguridad e higiene -->
                    <?php if($this->session->userdata('tipo') == 10){ ?>
                <li class="nav-item">
                  <a class="nav-link btn active" id="pills-ehs-tab" data-toggle="pill" href="#pills-ehs" role="tab" aria-controls="pills-ehs" aria-selected="false">
                    EHS
                  </a>
                 </li>
                    <?php } ?>
                  <!-- /Tabs Seguridad e Higiene -->

                  <!-- Tabs que verán Almacen General -->
                  <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                    Almacen general
                  </a>
                </li>               
                    <?php } ?>
                  <!-- /Tabs Almacen General -->

                  <!-- Tabs que verán Kuali -->
                  <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
                    <li class="nav-item">
                  <a class="nav-link btn active" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                    Kuali
                  </a>
                </li>               
                    <?php } ?>
                  <!-- /Tabs Kuali -->
              </ul>
              
              <div class="tab-content" id="pills-tabContent">

                <!-- Datos a mostrar en Alto Costo y RH -->
                <?php if($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 5 || $this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 19 || $this->session->userdata('tipo') == 21 || $this->session->userdata('tipo') == 12){ ?>
                <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAG) : ?>
                          <?php foreach ($asignacionesAG as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 4){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>
                        <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-devolucion" role="tabpanel" aria-labelledby="pills-devolucion-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAC) : ?>
                          <?php foreach ($asignacionesAC as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 1){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesKualiT) : ?>
                          <?php foreach ($asignacionesKualiT as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('tipo') == 50){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--tab de control vehicular-->
                <div class="tab-pane fade" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAutosControlVehicular) : ?>
                          <?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 3){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--fin de tab control vehicular-->

                <!-- Tab Área Médica -->
                <div class="tab-pane fade" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAreaMedica) : ?>
                          <?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 14){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>

                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                    <!-- /Tab de área Médica -->

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 3){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario . "/refacciones" ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>

                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--fin de tab refacciones control vehicular-->
                <!--Inicio de tab sistemas-->
                <div class="tab-pane fade" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesSistemas) : ?>
                          <?php foreach ($asignacionesSistemas as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 2){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                               	<td>
                               		<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                               		<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                               	</td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--Fin de tab sistemas-->
                  <?php } ?>
                  <!-- /Datos Alto Costo y RH -->

                  <!-- Datos a mostrar en Control Vehicular -->
                  <?php if($this->session->userdata('tipo') == 3){ ?>
                  <!--tab de control vehicular-->
                <div class="tab-pane fade show active" id="pills-control-vehicular" role="tabpanel" aria-labelledby="pills-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAutosControlVehicular) : ?>
                          <?php foreach ($asignacionesAutosControlVehicular as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 3){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--fin de tab control vehicular-->

                <!--tab refacciones control vehicular-->
                <div class="tab-pane fade" id="pills-refacciones-control-vehicular" role="tabpanel" aria-labelledby="pills-refacciones-control-vehicular-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesRefaccionesControlVehicular) : ?>
                          <?php foreach ($asignacionesRefaccionesControlVehicular as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 3){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario . "/refacciones" ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                  <?php } ?>
                <!--fin de tab refacciones control vehicular-->
                <!-- /Datos Control Vehicular -->

                <!-- Datos a mostrar en Área Médica -->
                <?php if($this->session->userdata('tipo') == 14){ ?>
                    <!-- Tab Área Médica -->
                <div class="tab-pane fade show active" id="pills-areamedica" role="tabpanel" aria-labelledby="pills-areamedica-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
 						  <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesAreaMedica) : ?>
                          <?php foreach ($asignacionesAreaMedica as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 14){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                  <?php } ?>
                    <!-- /Tab de área Médica -->
                <!-- /Datos Área Médica -->

                <!-- Datos a mostrar en Sistemas -->
                    <?php if($this->session->userdata('tipo') == 2){ ?>
                      <!--Inicio de tab sistemas-->
                <div class="tab-pane fade show active" id="pills-sistemas" role="tabpanel" aria-labelledby="pills-sistemas-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesSistemas) : ?>
                          <?php foreach ($asignacionesSistemas as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 2){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                <!--Fin de tab sistemas-->
                    <?php } ?>
                <!-- /Datos Sistemas -->

                <!-- Datos a mostrar para Seguridad e Higiene -->
                <?php if($this->session->userdata('tipo') == 10){ ?>

                    <!-- Tab Área Médica -->
                <div class="tab-pane active show fade" id="pills-ehs" role="tabpanel" aria-labelledby="pills-ehs-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php if($this->session->userdata('tipo') == 10){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>

                <div class="tab-pane active show fade" id="pills-ehs" role="tabpanel" aria-labelledby="pills-ehs-tab">
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesEHS) : ?>
                          <?php foreach ($asignacionesEHS as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td><?php if($this->session->userdata('tipo') == 10){ ?>
                                    <a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                  <?php }else{ ?>
                                    <?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                  <?php } ?>
                                </td>
                                <td>
                                  <a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                  <?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                    <button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                  <?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>

                    </table>
                  </div>
                </div>
                
                  <?php } ?>
                    <!-- /Tab de área Médica -->
                <!-- /Datos Seguridad e Higiene -->

                <!-- Datos a mostrar para Almacen General -->
                <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){ ?>
                  <!-- Tab de datos de Almacen General -->
                  <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
                  <!---->
                  <!--<?= json_encode($asignacionesActivas) ?>-->
                  <ul class="nav nav-tabs">
                    <li class="nav-item">
                      <a class="nav-link btn active" data-toggle="pill" href="#asignacionesActivas" role="tab" aria-selected="true">
                        Herramienta
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#activofijo" role="tab" aria-selected="true">
                        Activo Fijo
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesUniforme" role="tab" aria-selected="true">
                        Uniformes
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesEPP" role="tab" aria-selected="true">
                        EPP
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn" data-toggle="pill" href="#asignacionesConsumibles" role="tab" aria-selected="true">Consumibles</a>
                    </li>
                  </ul>

                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div class="tab-pane active" id="asignacionesActivas">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Equipo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nombre Personal</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesActivas) : ?>
                              <?php foreach ($asignacionesActivas as $key => $value) : ?>
                                  <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td>
                                    	<?php if($this->session->userdata('tipo') == 4){ ?>
	                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
	                                	<?php }else{ ?>
	                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
	                                	<?php } ?>
                                    </td>
                                    <td>
                                    	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                			<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                		<?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="activofijo">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Equipo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($activofijo) : ?>
                              <?php foreach ($activofijo as $key => $value) : ?>
                                  <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td>
                                    	<?php if($this->session->userdata('tipo') == 4){ ?>
	                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
	                                	<?php }else{ ?>
	                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
	                                	<?php } ?>
                                    </td>
                                    <td>
                                    	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                			<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                		<?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesEPP">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Equipo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                        	  <th>Nombre Personal</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesEPP) : ?>
                              <?php foreach ($asignacionesEPP as $key => $value) : ?>
                                  <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td>
                                    	<?php if($this->session->userdata('tipo') == 4){ ?>
	                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
	                                	<?php }else{ ?>
	                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
	                                	<?php } ?>
                                    </td>
                                    <td>
                                    	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                			<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                		<?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesUniforme">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Equipo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nombre Personal</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesUniformes) : ?>
                              <?php foreach ($asignacionesUniformes as $key => $value) : ?>
                                  <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td>
                                    	<?php if($this->session->userdata('tipo') == 4){ ?>
	                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
	                                	<?php }else{ ?>
	                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
	                                	<?php } ?>
                                    </td>
                                    <td>
                                    	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                			<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                		<?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="asignacionesConsumibles">
                      <div class="table-responsive">
                        <table style="width: 100%" class="dataTable table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>Folio</th>
                              <th>Fecha de asignación</th>
                              <th>Equipo</th>
                              <th>Unidades</th>
                              <th>Unidad de medida</th>
                              <th>Categoría</th>
                              <th>Nombre Personal</th>
                              <th>Acciones</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $total = 0; ?>
                            <?php if ($asignacionesConsumibles) : ?>
                              <?php foreach ($asignacionesConsumibles as $key => $value) : ?>
                                  <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                    <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                    </td>
                                    <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                    </td>
                                    <td><?php echo $value->descripcion ?></td>
                                    <td><?php echo ($value->total != '1.00') ? $value->total : $value->cantidad ?></td>
                                    <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                    </td>
                                    <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                    <td>
                                    	<?php if($this->session->userdata('tipo') == 4){ ?>
	                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
	                                	<?php }else{ ?>
	                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
	                                	<?php } ?>
                                    </td>
                                    <td>
                                    	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                    	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                			<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                		<?php } ?>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            <?php endif ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /Tab de datos de Almacen General -->
                <?php } ?>
                <!-- /Datos Almacen General -->


                <!-- Datos a mostrar para Kuali -->
                <?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
                  <!-- Tab de datos de Kuali -->
                  <div class="tab-pane fade show active" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
                  <!---->
                  <div class="table-responsive">
                    <table style="width: 100%" class="dataTable table table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Folio</th>
                          <th>Fecha de asignación</th>
                          <th>Equipo</th>
                          <th>Unidades</th>
                          <th>Unidad de medida</th>
                          <th>Categoría</th>
                          <th>Nombre Personal</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $total = 0; ?>
                        <?php if ($asignacionesKualiT) : ?>
                          <?php foreach ($asignacionesKualiT as $key => $value) : ?>
                              <tr class="<?= $value->estatus_devolucion_rh == "Finalizada" ? "table-success" : "" ?>">
                                <td><?php echo ($value->estatus_asignacion == 'activa') ? '<a href="' . base_url() . 'almacen/asignacion/detalle/' . $value->uid . '" onClick="window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;">' . $value->folio . '</a>' : $value->folio ?>
                                </td>
                                <td><?php echo strftime("%d de %b de %Y a las %r", strtotime($value->fecha_asignacion)) ?>
                                </td>
                                <td><?php echo $value->descripcion ?></td>
                                <td><?php echo ($value->total != '1.00') ? number_format($value->total, 0) : number_format($value->cantidad, 0) ?></td>
                                <td title="<?php echo $value->unidad_medida ?>"><?php echo $value->unidad_medida ?>
                                </td>
                                <td title="<?php echo $value->categoria ?>"><?php echo $value->categoria ?></td>
                                <td>
                                	<?php if($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){ ?>
                                		<a href="<?= base_url() . "almacen/devolucion/" . $value->uid_usuario ?>"><?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?></a>
                                	<?php }else{ ?>
                                		<?php echo $value->nombres . " " . $value->apellido_paterno . " " . $value->apellido_materno ?>
                                	<?php } ?>
                                </td>
                                <td>
                                	<a class="btn" href="<?= base_url() . "uploads/justificacion_asignaciones_rh/" . $value->uid_rh . ".pdf" ?>" target="__blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
                                	<?php if($value->estatus_devolucion_rh == "Perndiente Almacen" && $value->estatus_asignacion == "finalizada"){ ?>
                                		<button class="btn verificarAsignacion" data-iddtl_asignacion="<?= $value->iddtl_asignacion ?>"><i class="fa fa-check" aria-hidden="true"></i></button>
                                	<?php } ?>
                                </td>
                              </tr>
                          <?php endforeach ?>

                        <?php endif ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <!-- /Tab de datos de Kuali -->
                <?php } ?>
                <!-- /Datos Kuali -->
              </div>
            </div>

          </div>
        </div>
        <!-- Asignaciones -->
	</div>
</div>
</div>
</section>
<script type="text/javascript">
	$("body").on("click", ".verificarAsignacion", function(){
		event.preventDefault();
	    var button = $(this);
	    button.prop("disabled", true);
	    var form = new FormData();
	    form.append("iddtl_asignacion", button.data("iddtl_asignacion"));
	    $.ajax({
	      type: "POST",
	      url: '<?= base_url() . 'almacen/verificarJustificacionAsignacionRH' ?>',
	      data: form,
	      processData: false,
	      contentType: false,
	      dataType: "json",
	      success: function (data) {
	        if(!data.error){
	          Toast.fire({
	            type: 'success',
	            title: data.mensaje
	          });
	          window.location.reload();
	        }else{
	          Toast.fire({
	            type: 'error',
	            title: data.mensaje
	          });
	          button.prop("disabled", false);
	        }
	      }
	    }); 
	});
</script>