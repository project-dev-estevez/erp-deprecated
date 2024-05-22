<section class="forms reportes-almacen">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Reportes de Incidencias</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-incidencias-tab" data-toggle="pill" href="#pills-incidencias" role="tab" aria-controls="pills-incidencias" aria-selected="true">
              Incidencias
            </a>
          </li>
        </ul>
        <div class="tab-content" id="tabsContent">
          <div class="tab-pane fade active show" id="pills-incidencias" role="tabpanel" aria-labelledby="pills-incidencias-tab">
            <?= form_open('almacen/reporte_excel_incidencias', 'class="needs-validation" novalidate  id="formproyecto"'); ?>
            <div class="row">
              <?php if($this->session->userdata('tipo') == 3) { ?>
                <div class="col-4">
                  <label class="form-check-label">Estatus*</label>
                  <select name="estatus" class="form-control" id="estatus" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Reparada">Reparada</option>                    
                  </select>
                </div>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 3) { ?>
                <input type="hidden" name="tipo_incidencia" value="control_vehicular">
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 16) { ?>
                <div class="col-4">
                  <label class="form-check-label">Tipo Incidencia*</label>
                  <select name="tipo_incidencia" class="form-control" id="estatus" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="control_vehicular">Control Vehicular</option>                    
                  </select>
                </div>
              <?php } ?>
              <?php if($this->session->userdata('tipo') == 16) { ?>
                <div class="col-4">
                  <label class="form-check-label">Estatus*</label>
                  <select name="estatus" class="form-control" id="estatus" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Recibido">Recibido</option>
                    <option value="Pagado">Pagado</option>                    
                  </select>
                </div>
              <?php } ?>
              <div class="col-4">
                <label>Unidad</label>
                <select name="producto" id="product" class="selectpicker producto" data-live-search="true">
                  <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($catalogo as $key => $value): ?>
                    <option value="<?php echo $value->iddtl_almacen ?>"
                      data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                      data-unidad-medida="<?php echo $value->unidad_medida ?>"
                      data-categoria="<?php echo $value->idctl_categorias ?>">
                      <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo. ' ' .$value->numero_interno .' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
              <div class="col-4">
                <label class="form-check-label">Fecha</label>
                <input type="date" class="form-control" name="fecha" id="fecha" max="<?= date('Y-m-d'); ?>">
              </div>
            </div>
            <div class="form-row">
              <div class="col text-right pt-5">
                <?= form_hidden('token',$token) ?>
                <button type="submit" class="btn btn-primary">Generar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
<?php if($this->session->flashdata('errorReportesIncidencias')) { ?>
  Swal.fire(
    'Oops!',
    '<?= $this->session->flashdata('errorReportesIncidencias') ?>',
    'error'
  )
<?php } ?>
</script>