<section class="forms reportes-almacen">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Reportes de Control Vehicular.</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <!--<div class="font-weight-bold text-danger" id="errorReportesAG">
          <?= $this->session->flashdata('errorReportesCV'); ?>
        </div>-->
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-home-tab" data-toggle="pill" href="#pills-unidades" role="tab" aria-controls="pills-unidades" aria-selected="true">
              Unidades
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#servicios" role="tab" aria-controls="pills-servicios" aria-selected="true">
              Servicios.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#refacciones" role="tab" aria-controls="pills-refacciones" aria-selected="true">
              Refacciones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#solicitud_refacciones" role="tab" aria-controls="pills-solicitudes-refacciones" aria-selected="true">
              Solicitudes CV.
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#combustible" role="tab" aria-controls="pills-solicitudes-refacciones" aria-selected="true">
              Combustible
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-caja-chica-tab" data-toggle="pill" href="#caja_chica" role="tab" aria-controls="pills-caja-chica-refacciones" aria-selected="true">
              Caja Chica
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" id="pills-pedidos-tab" data-toggle="pill" href="#pedidos" role="tab" aria-controls="pills-pedidos" aria-selected="true">
              Pedidos
            </a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link btn" id="pills-home-tab" data-toggle="pill" href="#pills-operadores" role="tab" aria-controls="pills-operadores" aria-selected="true">
              Operadores
            </a>
          </li>-->
        </ul>
        <div class="tab-content" id="tabsContent">
          <div class="tab-pane fade active show" id="pills-unidades" role="tabpanel" aria-labelledby="pills-unidades-tab">
            <?= form_open('almacen/reporte_excel_control_vehicular', 'class="needs-validation" novalidate  id="formproyecto"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-5 col-lg-4">
                  <label class="form-check-label">Proyecto</label>
                  <select name="proyecto" id="selectProyecto" class="form-control proyecto" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,70) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Segmento</label>
                  <select name="segmento" id="ssegmento" class="form-control segmento" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-4">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" id="tipo_reporte" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <option value="general">General</option>
                    <option value="disponible">Disponibles</option>
                    <option value="asignado">Asignados</option>
                    <option value="servicio">Servicio</option>
                    <option value="verificacion">Verificación</option>
                    <option value="tenencia">Tenencia</option>
                    <option value="placas">Placas</option>
                    <option value="seguro">Seguro</option>
                    <option value="servicio_km">Servicio por KM</option>
                    <option value="siniestro">Siniestro</option>
                    <option value="cambio_propietario">Cambio Propietario</option>
                  </select>
                </div>
              </div>
                <div class="row">
                <div class="col">
                  <label>Modelo</label>
                  <select name="modelo" id="modelo" class="form-control modelo" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo .' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col">
                  <label>Unidad</label>
                  <select name="eco" id="eco" class="form-control eco" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Inicial</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fecha" >
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Final</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_final" id="fecha_final_fecha" >
                </div>
                </div>
                <div class="row">
                <div class="col-3">
                  <label>Mecánico</label>
                  <select name="mecanico" id="mecanico" class="form-control mecanico" data-live-search="true" disabled>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach($mecanicos AS $key => $valueM){ ?>
                      <option value="<?= $valueM->idtbl_users ?>"><?= $valueM->nombre ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-3">
                  <label>Estatus de servicio</label>
                  <select name="estatus" id="estatus" class="form-control estatus" data-live-search="true" disabled>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <option value="todos">Todos</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="finalizado">Finalizado</option>
                  </select>
                </div>
                <div>
                  <label>Tipo Mantenimiento</label>
                  <select id="rt0" name="rt0" class="form-control estatus" data-live-search="true" disabled="">
                    <option value="">Todos</option>
                    <option value="mantemiento_correctivo">Mantenimiento Correctivo</option>
                    <option value="mantemiento_preventivo">Mantenimiento Preventivo</option>
                    <option value="mantemiento_preventivo_menor">Mantenimiento Preventivo Menor</option>
                    <option value="mantemiento_preventivo_mayor">Mantenimiento Preventivo Mayor</option>
                    <option value="desgaste">Desgaste</option>
                    <option value="predictivo">Predictivo</option>
                  </select>
                </div>
                </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Unidad') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <!-- Información a mostrar en tab de operadores -->
          <div class="tab-pane fade" id="pills-operadores" role="tabpanel" aria-labelledby="pills-operadores-tab">
            <?= form_open('almacen/reporte_excel_operaciones', 'class="needs-validation" novalidate  id="formproyecto"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-5 col-lg-4">
                  <label class="form-check-label">Proyecto*</label>
                  <select name="proyecto" id="selectProyecto2" class="selectpicker proyecto" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,70) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Segmento</label>
                  <select name="segmento" id="ssegmento2" class="selectpicker segmento" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
                <div class="col-xs-12 col-md-3 col-lg-4">
                  <label class="form-check-label">Tipo de Reporte*</label>
                  <select name="tipo_reporte" class="form-control" required>
                    <option value="" disabled selected>Seleccione...</option>
                    <!--<option value="entrada-almacen">Entradas</option>-->
                    <option value="salida-almacen">Salidas</option>
                    <option value="devolucion-almacen">Devoluciones</option>
                    <!--<option value="traspaso-almacen">Traspasos</option>-->
                  </select>
                </div>
                <div class="col">
                  <label>Producto*</label>
                  <select name="productoo" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Inicial*</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fechas" >
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-check-label">Fecha Final*</label>
                  <input type="date" class="form-control fechaFinal" name="fecha_finall" id="fecha_final_fechas" >
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Operador') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane" id="servicios">
            <?= form_open('almacen/reporte_excel_control_vehicular', 'class="needs-validation" novalidate  id="formservicios"'); ?>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                    <label class="form-check-label">Fecha Inicial</label>
                    <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fechas" max="<?= date('Y-m-d'); ?>">
                  </div>
                  <div class="colxs-12 col-md-4">
                    <label class="form-check-label">Fecha Final</label>
                    <input type="date" class="form-control fechaFinal" name="fecha_final" id="fecha_final_fechas" min="" max="<?= date('Y-m-d'); ?>">
                  </div>
                  <div class="col-4">
                  <label class="form-check-label">Mecánico</label>
                  <select name="mecanico" id="mecanico" class="form-control mecanico" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach($mecanicos AS $key => $valueM){ ?>
                      <option value="<?= $valueM->idtbl_users ?>"><?= $valueM->nombre ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4">
                  <label class="form-check-label">Estatus de servicio</label>
                  <select name="estatus" id="estatus" class="form-control estatus" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <option value="todos">Todos</option>
                    <option value="pendiente">Pendiente</option>
                    <option value="finalizado">Finalizado</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Unidad') ?>
                  <?= form_hidden('tipo_reporte','servicio') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane" id="refacciones">
            <?= form_open('almacen/excel_almacenes_stock', 'class="needs-validation" novalidate  id="formservicios"'); ?>
              <div class="form-row">
                <div class="col-4">
                  <label class="form-check-label">Estatus stock minimo</label>
                  <select name="estatus_stock_minimo" id="estatus_stock_minimo" class="form-control estatus" data-live-search="true">
                    <option value="todos">Todos</option>
                    <option value="menor">Menor que el minimo</option>
                    <option value="minimo">Minimo</option>
                    <option value="mayor">Mayor que el minimo</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('id_almacen','29') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane" id="solicitud_refacciones">
            <?= form_open('almacen/excel_solicitudes_refacciones', 'class="needs-validation" novalidate  id="formsolicitudesrefacciones"'); ?>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Tipo Solicitud.</label>
                  <select class="form-control" name="tipo_producto" id="tipo_producto">
                    <option value="Control Vehicular" selected>Autos Control Vehicular</option>
                    <option value="Refacciones Control Vehicular">Refacciones Control Vehicular</option>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Fecha Creación</label>
                  <input type="date" class="form-control" name="fecha_creacion" id="fecha_creacion">
                </div>
                <!--div id="item-estatus" class="item-estatus">
                  <div class="hola" id="hola"-->
                    <div class="colxs-12 col-md-4">
                      <label class="form-label">Estatus</label>
                      <select type="date" class="form-control" name="estatus" id="estatus">
                        <option value="">Todos</option>
                        <option value="SRCV">Surtida.</option>
                        <option value="SU CV">Aprobado por CV</option>
                        <option value="SU RCV">Aprobado por AG</option>
                        <option value="AG">Pendiente Aprobacion AG</option>
                        <option value="RCV">Pendiente Aprobación CV</option>
                        <option value="cancelada CV">Cancelada</option>
                      </select>                  
                    </div>
                  <!--/div>
                </div-->
              </div>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Modelo</label>
                  <select name="modelo" id="modelo_reporte" class="form-control modelo" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo .' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Unidad</label>
                  <select name="eco_reporte" id="eco_reporte" class="form-control eco" data-live-search="true" disabled>
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('id_almacen','29') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane" id="pedidos" role="tabpanel" aria-labelledby="pills-pedidos-tab">
            <?= form_open('compras/reportes_pedidos', 'class="needs-validation" novalidate id="formpersonal"'); ?>
              <div class="form-row">
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Tipo</label>
                  <select name="tipoSolicitud" id="selectTipoSolicitud" class="selectpicker" data-parent="pills-pedidos">
                    <option value="estandar" selected="selected">Estandar</option>
                    <!--<option value="estimacion">Estimación</option>
                    <option value="virtuales">Virtuales</option>
                    <option value="pagos">Pagos</option>-->
                  </select>
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label class="form-check-label">Proyecto</label>
                  <select name="proyecto" id="selectProyecto" class="selectpicker proyecto" data-parent="pills-pedidos" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($proyectos as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_proyectos ?>"
                        data-direccion="<?php echo $value->direccion ?>">
                        <?php echo $value->numero_proyecto ?> -
                        <?php echo substr($value->nombre_proyecto,0,50) ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <!--<div class="col-xs-12 col-md-4 col-lg-4 divContratista">
                  <label>Proveedores</label>
                  <select name="proveedor" id="proveedor2" class="selectpicker" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php if ($proveedores): ?>
                    <?php foreach ($proveedores as $key => $value): ?>
                      <option value="<?=$value->idtbl_proveedores?>"><?= substr($value->nombre_fiscal, 0, 35) ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
              <div class="form-row"> 
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Producto</label>
                  <select name="productoo" id="product" class="selectpicker producto" data-live-search="true">
                    <option value="" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,50).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>-->
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Fecha Inicio</label>
                  <input type="date" name="fecha_inicio" class="form-control" value="">
                </div>
                <div class="col-xs-12 col-md-4 col-lg-4">
                  <label>Fecha Final</label>
                  <input type="date" name="fecha_final" class="form-control" value="">
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('tipo_user', 'control_vehicular') ?>
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('tipo_de_reporte','Proyecto') ?>
                  <button id="btnLimpiar" class="btn btn-danger" data-id="pills-pedidos1">Borrar</button>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane" id="caja_chica">
            <?= form_open('ControlVehicular/excel_obtener_caja_chica', 'class="needs-validation" novalidate  id="formsolicitudesrefacciones"'); ?>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Fecha Inicial</label>
                  <input type="date" class="form-control" name="fecha_inicial">
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Fecha Final</label>
                  <input type="date" class="form-control" name="fecha_final">
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Tipo</label>
                  <select class="form-control" name="tipo">
                    <option value="">Todos</option>
                    <option value="refacciones">Refacciones</option>
                    <option value="servicio">Servicio</option>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Modelo</label>
                  <select name="modelo" id="modelo_reporte_caja_chica" class="form-control modelo" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo .' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Unidad</label>
                  <select name="eco_reporte" id="eco_reporte_caja_chica" class="form-control eco" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('id_almacen','29') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>

          <div class="tab-pane" id="combustible">
            <?= form_open('almacen/excel_combustible_km_cv', 'class="needs-validation" novalidate  id="formservicios"'); ?>
              <div class="form-row">
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Modelo</label>
                  <select name="modelo" id="modelo_reporte_combustible" class="form-control modelo" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($catalogo as $key => $value): ?>
                      <option value="<?php echo $value->idtbl_catalogo ?>"
                        data-descripcion="<?php echo htmlspecialchars(trim($value->descripcion), ENT_COMPAT) ?>"
                        data-unidad-medida="<?php echo $value->unidad_medida ?>"
                        data-categoria="<?php echo $value->idctl_categorias ?>">
                        <?php echo $value->neodata.' '.$value->marca.' '.$value->modelo .' ('.substr(htmlspecialchars(trim($value->descripcion), ENT_COMPAT),0,70).')' ?>
                      </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="colxs-12 col-md-4">
                  <label class="form-label">Unidad</label>
                  <select name="eco_reporte" id="eco_reporte_combustible" class="form-control eco" data-live-search="true">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="col text-right pt-5">
                  <?= form_hidden('token',$token) ?>
                  <?= form_hidden('id_almacen','29') ?>
                  <button type="submit" class="btn btn-primary">Generar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).on('change', '#tipo_reporte', function(event){
    if(this.value != 'general' && this.value != 'asignado'){
      $("#selectProyecto").attr('disabled', 'disabled');
      $("#ssegmento").attr('disabled', 'disabled');
      $("#mecanico").attr('disabled', 'disabled');
      $("#estatus").attr('disabled', 'disabled');
      $("#rt0").attr('disabled', 'disabled');
      if(this.value == 'disponible' || this.value == 'servicio_km'){        
        $("#fecha_inicio_fecha").attr('disabled', 'disabled');
        $("#fecha_final_fecha").attr('disabled', 'disabled');
        $("#mecanico").attr('disabled', 'disabled');
        $("#estatus").attr('disabled', 'disabled');
      }else if(this.value == 'servicio'){
        $("#mecanico").removeAttr('disabled');
        $("#estatus").removeAttr('disabled');
        $("#rt0").removeAttr('disabled');   
      }
    }else{
      $("#selectProyecto").removeAttr('disabled');
      $("#ssegmento").removeAttr('disabled');
      $("#fecha_inicio_fecha").removeAttr('disabled');
      $("#fecha_final_fecha").removeAttr('disabled');
      $("#mecanico").attr('disabled', 'disabled');
      $("#estatus").attr('disabled', 'disabled');
      $("#rt0").attr('disabled', 'disabled');
    }
  });
  $(document).on('change', '#fecha_inicio_fecha', function (event) {
    var _this = $(this);
    $('#fecha_final_fecha').attr('min', _this.val());
  });
  $("#tipo_producto").on("change", function(e){
    var tipo_producto = $(this).val();
    var eco_element = $("#solicitud_refacciones").find("select[name='eco_reporte']");
    eco_element.val("");
    if(tipo_producto == "Control Vehicular"){
      eco_element.prop('disabled', true);
    }else{
      eco_element.prop('disabled', false);
    }
  });
  $(document).on('change', '#selectProyecto', function (event) {
    event.preventDefault();
    var _this=$(this);
    $('#ssegmento').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    //$('#ssegmento').selectpicker('refresh');
    if ('todos' !== $('#selectProyecto').val()) {
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getSegmento',
        data:'id=' + $('#selectProyecto').val(),
        beforeSend: function() {
          _this.closest('.card-body').addClass('load');
        },
        success:function(r) {  
          var registros = eval(r);
          if(registros.length == 0) {
            let direccion = $("#selectProyecto").find(':selected').data('direccion');
            direccion = direccion.substring(0, 65);
            $('#ssegmento').append($('<option>', { 
              value : '',
              text : direccion
            }));
            //$('#ssegmento').selectpicker('refresh');
            return;
          }
          html = "";
          for(i = 0; i < registros.length; i++) {
            let segmento = registros[i]['segmento'];
            segmento = segmento.substring(0, 605);
            $('#ssegmento').append($('<option>', { 
              value: registros[i]['idtbl_segmentos_proyecto'],
              text : segmento
            }));
          
          }
          //$('#ssegmento').selectpicker('refresh');
        }
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        _this.closest('.card-body').removeClass('load');
      });
    }
  });

  $(document).on('change', '.modelo', function (event) {
    event.preventDefault();
    var _this=$(this);
    var select = '#eco';
    if(_this.attr("id") == "modelo_reporte"){
      select = "#eco_reporte";
    }else if(_this.attr("id") == "modelo_reporte_combustible"){
      select = "#eco_reporte_combustible";
    }else if(_this.attr("id") == "modelo_reporte_caja_chica"){
      select = "#eco_reporte_caja_chica";
    }
    $(select).find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    //$('#ssegmento').selectpicker('refresh');
    if ('todos' !== _this.val()) {
      $.ajax({
        type:"POST",
        url:base_url+'almacen/getEco',
        data:'id=' + _this.val(),
        beforeSend: function() {
          _this.closest('.card-body').addClass('load');
        },
        success:function(r) {  
          var registros = eval(r);
          
          html = "";
          for(i = 0; i < registros.length; i++) {
            let eco = registros[i]['numero_interno'];
            eco = eco.substring(0, 605);
            $(select).append($('<option>', { 
              value: registros[i]['iddtl_almacen'],
              text : eco
            }));
          
          }
          //$('#ssegmento').selectpicker('refresh');
        }
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        _this.closest('.card-body').removeClass('load');
      });
    }
  });
  
</script>
<script>
  <?php if($this->session->flashdata('errorReportesOperaciones')) { ?>
    Swal.fire(
  'Oops!',
  '<?= $this->session->flashdata('errorReportesOperaciones') ?>',
  'error'
)
  <?php } ?>
  <?php if($this->session->flashdata('errorReportesControlVehicular')) { ?>
    Swal.fire(
  'Oops!',
  '<?= $this->session->flashdata('errorReportesControlVehicular') ?>',
  'error'
)
  <?php } ?>
</script>