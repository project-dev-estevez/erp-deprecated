<div id="editar_estatus_incidencia" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/editar-estatus-incidencia') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar estatus de incidencia</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Estatus</label>
              <select class="form-control" id="estatus" name="estatus_incidencia" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Recibido">Recibido</option>
                <option value="Pagado">Pagado</option>
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Comentarios de cambio de estatus</label>
              <textarea id="comentario_estatus" name="comentario_estatus" class="form-control" required></textarea>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Unidad: </strong><span id="unidad"></span>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Fecha: </strong><span id="fecha"></span>
            </div>
          </div>
          <div class="col-4 col-lg-4">
            <div class="form-group">
              <strong>Costo: </strong><span id="costo"></span>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label><strong>Explicación de incidencia</strong></label>
              <p id="incidencia"></p>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label><strong>Explicación de cambio de estatus</strong></label>
              <p id="comentario_estatus"></p>
            </div>
          </div>
            <input type="hidden" name="tipo" value="contabilidad">
            <input type="hidden" name="idtbl_incidencias">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="pagos_tenencias" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/pagos_tenencias') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Pago Tenencia</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="form-group">
              <label>Archivo</label>
              <input type="file" name="file" class="form-control-file">
            </div>
          </div>
          <input type="hidden" name="idtbl_tramites_vehiculares">
          <input type="hidden" name="uid">
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div id="editar_siniestros" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/editarSiniestros', 'id="form-editar-siniestros" class="needs-validation') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar siniestro</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tabGeneralSiniestros">General</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tabFoliosSiniestros">Folios</a></li>
        </ul>

        <div class="tab-content">
          <div id="tabGeneralSiniestros" class="tab-pane fade show active">
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>#</label>
                  <input type="text" name="idtbl_siniestros_info" class="form-control" disabled>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Seguro</label>
                  <input type="text" name="seguro" class="form-control" disabled>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Tipo</label>
                  <select class="form-control" name="tipo" disabled>
                    <option value="">Seleccionar ...</option>
                    <option value="Perdida Total">Perdida Total</option>
                    <option value="Robo">Robo</option>
                    <option value="Choque">Choque</option>
                  </select>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Estatus</label>
                  <select class="form-control" name="estatus" disabled>
                    <option value="Pendiente">Pendiente</option>
                    <option value="Concluido">Concluido</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-lg-12">
                <div class="form-group personal">
                  <label>Reportado Por</label>
                  <input class="form-control reportado_por_empleado" autocomplete="off" type="text" name="reportado_por_empleado" readonly>
                  <input class="form-control reportado_por" autocomplete="off" type="hidden" name="reportado_por" readonly>
                  <div class="list-group sugerencias"></div>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="form-group">
                  <label>Atiende</label>
                  <select class="selectpicker form-control usuariosSelectPicker" data-live-search="true" name="atiende" disabled>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Nombre contacto</label>
                  <input type="text" name="nombre_contacto" class="form-control" readonly>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" name="telefono" class="form-control" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha siniestro</label>
                  <input type="date" name="fecha_siniestro" class="form-control" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha Conclusión</label>
                  <input type="date" name="fecha_conclusion" class="form-control" readonly>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Siniestro</label>
                  <textarea name="descripcion_siniestro" class="form-control" readonly></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Seguimiento</label>
                  <textarea name="descripcion_seguimiento" class="form-control" readonly></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Observaciones</label>
                  <textarea name="observaciones_contabilidad" class="form-control" required></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label>Archivo</label>
                  <input type="file" name="archivo" class="form-control">
                </div>
              </div>
            </div>
            <input type="hidden" name="iddtl_almacen">
            <input type="hidden" name="idtbl_siniestros">
          </div>
          <div id="tabFoliosSiniestros" class="tab-pane fade">
            <div class="row">
              <table class="table" id="folios_siniestros">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <?= form_hidden('token', $token) ?>
        <!--<button type="button" class="btn btn-primary" onclick="imprimirSiniestro()">Imprimir Documento</button>-->
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Guardar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Sistemas (Contabilidad)</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
            </div>
            <ul class="nav nav-tabs">
              <?php if($this->session->userdata("tipo") == 5 || $this->session->userdata("tipo") == 16 || $this->session->userdata("tipo") == 2){ ?>
              <li class="nav-item">
                <a class="nav-link btn active" data-toggle="pill" href="#tabIncidencias" role="tab" aria-selected="true">
                  Incidencias
                </a>
              </li>
              <?php } if($this->session->userdata("tipo") == 16){ ?>
              <li class="nav-item">
                <a class="nav-link btn" data-toggle="pill" href="#tabTenencias" role="tab" aria-selected="true">Tenencias</a>
              </li>
              <?php }?>
              <?php if($this->session->userdata("tipo") == 16){ ?>
              <li class="nav-item">
                <a class="nav-link btn" data-toggle="pill" href="#tabSiniestros" role="tab" aria-selected="true">Siniestros</a>
              </li>
              <?php } ?>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="tabIncidencias">
                <br/><br/>
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busquedaincidencias">
                </div>
                <br/><br/>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbincidencias">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Unidad</th>
                              
                              <th>Proyecto</th>
                              <th>Incidencia</th>
                              <?php if($this->session->userdata("tipo") != 16){ ?>
                                <th>Personal</th>
                              <?php } ?>
                              <th>Fecha</th>
                              <th>Costo</th>
                              <th>Estatus Sistemas</th>
                              <th>Comentarios Estatus Sistemas</th>
                              <th>Estatus Contabilidad</th>
                              <th>Comentarios Estatus Contabilidad</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>#</th>
                              <th>Unidad</th>
                              
                              <th>Proyecto</th>
                              <th>Incidencia</th>
                              <?php if($this->session->userdata("tipo") != 16){ ?>
                                <th>Personal</th>
                              <?php } ?>
                              <th>Fecha</th>
                              <th>Costo</th>
                              <th>Estatus Sistemas</th>
                              <th>Comentarios Estatus Sistemas</th>
                              <th>Estatus Contabilidad</th>
                              <th>Comentarios Estatus Contabilidad</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                  </table>
                  <br>
                  <div class="paginacionincidencias">

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabTenencias">
                <br/><br/>
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busquedatenencias">
                </div>
                <br/><br/>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbtenencias">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Numero Interno</th>
                              <th>Fecha Tenencia</th>
                              <th>Proyecto</th>
                              <th>Detalle</th>
                              <th>Pago Interno</th>
                              <th>Acciones</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>#</th>
                              <th>Numero Interno</th>
                              <th>Fecha Tenencia</th>
                              <th>Proyecto/th>
                              <th>Detalle</th>
                              <th>Pago Interno</th>
                              <th>Acciones</th>
                          </tr>
                      </tfoot>
                      <tbody>
                      </tbody>
                  </table>
                  <br/>
                  <div class="paginaciontenencias">
                    
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabSiniestros">
                <br/><br/>
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busquedasiniestros">
                </div>
                <br/><br/>
                <div class="table-responsive">
                  <table class="table table-striped table-sm table-hover" id="tbsiniestros">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Seguro</th>
                        <th>Reportado</th>
                        <th>Eco</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha de Siniestro</th>
                        <th>Fecha conclución</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Seguro</th>
                        <th>Reportado</th>
                        <th>Eco</th>
                        <th>Tipo</th>
                        <th>Estado</th>
                        <th>Fecha de Siniestro</th>
                        <th>Fecha conclución</th>
                        <th>Acciones</th>
                      </tr>
                    </tfoot>
                    <tbody>
                    </tbody>
                  </table>
                  <br>
                  <div class="paginacionsiniestros">

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end col-->
    </div>
  </div>
</section>
<script>
$(document).ready(function() {

  <?php if($this->session->userdata("tipo") == 1){ ?>
    $("a[href='#tabCajaChica']").tab('show');
  <?php } elseif($this->session->userdata("tipo") == 5){ ?>
    mostrarIncidencias("", 1);
  <?php } elseif($this->session->userdata("tipo") == 16){ ?>
    mostrarTenencias("", 1);
    mostrarSiniestros("", 1);
    obtenerPersonal();
  <?php } elseif($this->session->userdata("tipo") == 2) { ?>
    mostrarIncidencias("", 1);
  <?php } ?>

  $("input[name='busquedaincidencias']").keyup(function() {
    textoBuscar = $("input[name='busquedaincidencias']").val();
    mostrarIncidencias(textoBuscar, 1);
  });

  $("body").on("click", ".paginacionincidencias li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    valorBuscar = $("input[name='busquedaincidencias']").val();
    mostrarIncidencias(valorBuscar, valorHref);
  });

  $("input[name='busquedatenencias']").keyup(function() {
    textoBuscar = $("input[name='busquedatenencias']").val();
    mostrarTenencias(textoBuscar, 1);
  });

  $("body").on("click", ".paginaciontenencias li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    valorBuscar = $("input[name='busquedatenencias']").val();
    mostrarTenencias(valorBuscar, valorHref);
  });

  $("body").on("click", ".paginacionsiniestros li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    valorBuscar = $("input[name='busquedasiniestros']").val();
    mostrarSiniestros(valorBuscar, valorHref);
  });

});

$('#editar_estatus_incidencia').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data() // Extract info from data-* attributes
  console.log(recipient)
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $("#unidad").empty();
  $("#fecha").empty();
  $("#costo").empty();
  $("#incidencia").empty();
  $("#comentario_estatus").empty();
  $("#estatus").val(recipient.estatus);
  modal.find("input[name='idtbl_incidencias']").val(recipient.idtbl_incidencias);
  $("#unidad").append(recipient.unidad);
  $("#fecha").append(recipient.fecha_incidencia);
  $("#costo").append(recipient.costo);
  $("#incidencia").append(recipient.incidencia);
  $("#comentario_estatus").append(recipient.comentario_estatus);
  $('#historialOperador').modal('hide');
})

$('#pagos_tenencias').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data() // Extract info from data-* attributes
  console.log(recipient)
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find("input[name='idtbl_tramites_vehiculares']").val(recipient.idtbl_tramites_vehiculares);
  modal.find("input[name='uid']").val(recipient.uid);
})

function mostrarTenencias(valorBuscar, pagina) {
  $.ajax({
    url: "<?= base_url() ?>ControlVehicular/mostrarTenencias",
    type: "POST",
    data: {
      buscar: valorBuscar,
      nropagina: pagina
    },
    dataType: "json",
    success: function(response) {
      filas = "";
      clase = "";
      $.each(response.tenencias, function(key, item) {
        if (item.pago_estatus == 'Finalizado') {
          clase = 'table-success';
        }else {
          clase = 'table-warning';
        }
        filas += "<tr class='" + clase + "'>";
        filas += "<td>" + item.idtbl_tramites_vehiculares + "</td>";
        filas += "<td>" + item.numero_interno + "</td>";
        filas += "<td>" + item.fecha_tramite + "</td>";
        filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
        filas += "<td>" + item.detalle_tramite + "</td>";
        filas += "<td>" + (item.pago_interno == 0 ? "No" : "Si") + "</td>";
        filas += "<td>" + "<a href='<?= base_url() ?>uploads/tramites_vehiculares/" + item.uid + ".pdf' target='_blank'><i class='fa fa-file-pdf-o'></i></a>" + (item.pago_estatus != "Finalizado" ?  "<a href='#pagos_tenencias' data-toggle='modal' data-idtbl_tramites_vehiculares='" + item.idtbl_tramites_vehiculares + "' data-uid='" + item.uid + "'><i class='fa fa-upload'></i></a>" : "<a href='<?= base_url() ?>uploads/pagos_tenencias/" + item.uid + ".pdf' target='_blank'><i class='fa fa-file-o'></i></a>");
        /*if(item.documento_incidencia != null) {
          filas += "<a target='__blank' href='<?= base_url(); ?>uploads/incidencias/" + item.documento_incidencia + ".pdf'><i class='fa fa-eye'></i></a>";
        }*/
        filas += "</td>";
        filas += "</tr>";
      });
      $('#tbtenencias tbody').html(filas);
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
      $(".paginaciontenencias").html(paginador);
    }
  });
}
function mostrarIncidencias(valorBuscar, pagina) {
  $.ajax({
    url: "<?= base_url() ?>Sistemas/mostrarTodasIncidencias",
    type: "POST",
    data: {
      buscar: valorBuscar,
      nropagina: pagina
    },
    dataType: "json",
    success: function(response) {
      filas = "";
      clase = "";
      $.each(response.incidencias, function(key, item) {
        if (item.estatus_contabilidad == 'Pagado') {
          clase = 'table-success';
        } else if (item.estatus_contabilidad == 'Recibido') {
          clase = 'table-primary';
        } else {
          clase = 'table-warning';
        }
        filas += "<tr class='" + clase + "'>";
        filas += "<td>" + item.idtbl_incidencias + "</td>";
        filas += "<td>" + item.numero_interno + "</td>";
        
        filas += "<td>" + item.nombre_proyecto + "</td>";
        filas += "<td>" + item.incidencia + "</td>";
        <?php if($this->session->userdata("tipo") != 16){ ?>
          filas += "<td>" + item.personal + "</td>";
        <?php } ?>
        filas += "<td>" + item.fecha_incidencia + "</td>";
        filas += "<td>$" + item.costo + "</td>";
        filas += "<td>" + item.estatus + "</td>";
        filas += "<td>" + item.comentario_estatus + "</td>";
        filas += "<td>" + item.estatus_contabilidad + "</td>";
        filas += "<td>" + item.comentario_estatus_contabilidad + "</td>";
        filas += "<td>";
        <?php if($this->session->userdata("tipo") != 2){ ?>
          filas += "<a href='#editar_estatus_incidencia' data-comentario_estatus='" + item
            .comentario_estatus_contabilidad + "' data-idtbl_incidencias='" + item
            .idtbl_incidencias + "' data-incidencia='" + item.incidencia +
            "' data-unidad='" + item.numero_interno + "' data-fecha_incidencia='" + item
            .fecha_incidencia + "' data-estatus='" + item.estatus_contabilidad + "' data-costo='" + item.costo +
            "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
        <?php } ?>
        if(item.documento_incidencia != null) {
          filas += "<a target='__blank' href='<?= base_url(); ?>uploads/incidencias/" + item.documento_incidencia + ".pdf'><i class='fa fa-eye'></i></a>";
        }
        filas += "</td>";
        filas += "</tr>";
      });
      $('#tbincidencias tbody').html(filas);
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
      $(".paginacionincidencias").html(paginador);
    }
  });
}
  function mostrarSiniestros(valorBuscar, pagina) {
    $.ajax({
      url: "<?= base_url() ?>ControlVehicular/mostrarSiniestros",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        $.each(response.siniestros,function(key,item) {
          if(item.estatus == 'Concluido') {
            clase = 'table-success';
          } else {
            clase = 'table-warning';
          }

          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item.idtbl_siniestros + "</td>";
          filas += "<td>" + item.seguro + "</td>";
          filas += "<td>" + item.nombre_reportado_por + " " + item.apellido_paterno_reportado_por + " " + item.apellido_materno_reportado_por + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td>" + item.tipo + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          filas += "<td>" + item.fecha_siniestro + "</td>";
          filas += "<td>" + item.fecha_conclusion + "</td>";
          filas += "<td><a href='#editar_siniestros' data-idtbl-siniestros='" + item.idtbl_siniestros + "' data-seguro='" + item.seguro + "' data-idtbl-usuarios-reportado-por='" + item.idtbl_usuarios_reportado_por + "' data-usuarios-reportado-por='" + item.nombre_reportado_por + " " + item.apellido_paterno_reportado_por + " " + item.apellido_materno_reportado_por + "' data-idtbl-usuarios-atiende='" + item.idtbl_usuarios_atiende + "' data-estatus='" + item.estatus + "' data-fecha-siniestro='" + item.fecha_siniestro + "' data-fecha-conclusion='" + item.fecha_conclusion + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-nombre-contacto='" + item.nombre_contacto + "' data-telefono-contacto='" + item.telefono_contacto + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-iddtl-almacen='" + item.iddtl_almacen + "' data-observaciones='" + item.observaciones_contabilidad + "' data-tipo='" + item.tipo + "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
          if(item.file) {
            filas += "<a target='__blank' href='<?= base_url(); ?>uploads/siniestros/" + item.idtbl_siniestros + ".pdf'><i class='fa fa-file-pdf-o'></i></a>";
          }
          filas += "</td>"
          filas += "</tr>";
        });
        $('#tbsiniestros tbody').html(filas);
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
        $(".paginacionsiniestros").html(paginador);
      }
    });
  }

  $('#editar_siniestros').on('show.bs.modal', function(event) {
    $('body').addClass("modalZindex");
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find("input[name='iddtl_almacen']")[0].value = recipient.iddtlAlmacen;
    modal.find("input[name='idtbl_siniestros_info']")[0].value = recipient.idtblSiniestros;
    modal.find("input[name='idtbl_siniestros']")[0].value = recipient.idtblSiniestros;
    modal.find("#btn-nuevo-folio").data("idtbl-siniestros", recipient.idtblSiniestros);
    modal.find("input[name='seguro']")[0].value = recipient.seguro;
    modal.find("select[name='estatus']")[0].value = recipient.estatus === null ? "Pendiente" : recipient.estatus;
    modal.find("select[name='tipo']")[0].value = recipient.tipo;
    modal.find("input[name='reportado_por']")[0].value = recipient.idtblUsuariosReportadoPor;
    modal.find("input[name='reportado_por_empleado']")[0].value = recipient.usuariosReportadoPor;
    //modal.find(".usuariosSelectPicker[name='reportado_por']").val(recipient.idtblUsuariosReportadoPor);
    modal.find(".usuariosSelectPicker[name='atiende']").val(recipient.idtblUsuariosAtiende);
    modal.find("input[name='nombre_contacto']")[0].value = recipient.nombreContacto;
    modal.find("input[name='telefono']")[0].value = recipient.telefonoContacto;
    modal.find("input[name='fecha_siniestro']")[0].value = recipient.fechaSiniestro;
    modal.find("input[name='fecha_conclusion']")[0].value = recipient.fechaConclusion;
    modal.find("textarea[name='descripcion_siniestro']")[0].value = recipient.descripcionSiniestro;
    modal.find("textarea[name='descripcion_seguimiento']")[0].value = recipient.descripcionSeguimiento;
    modal.find("textarea[name='observaciones_contabilidad']")[0].value = recipient.observaciones;
    $('.usuariosSelectPicker').selectpicker('refresh');
    //folios_siniestros
    mostrarFolios(recipient.idtblSiniestros, modal);
  });

  function mostrarFolios(idtblSiniestros, modal){
    $.ajax({
      url: "<?php echo base_url();?>ControlVehicular/obtenerFoliosSiniestros",
      type: "POST",
      data: {idtbl_siniestros:idtblSiniestros}, 
      dataType: "json",
      cache : false,
      success: function(resp) {
        filas = "";
        console.log(resp);
        for(r=0; r<resp.length; r++){
          filas += "<tr><td>" + resp[r].folio + "</td><td>" + resp[r].estatus_responsabilidad + "</td></tr>";
        }
        modal.find("#folios_siniestros tbody").html(filas);
      }
    });
  }

  function obtenerPersonal() {
    $('.usuariosSelectPicker').append($('<option>', { 
            value: "",
            text : "Seleccione ..."
    }));
    $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/personalControlVehicular' ?>',
          dataType: "json",
          success: function (data) {
              $.each(data, function(i,item){
                var option = $('<option>', { 
                      value: item.idtbl_usuarios,
                      text : item.nombres + ' (Número Empleado '+item.idtbl_usuarios+')'
                });
                if(item.estatus == 0){
                  option.prop("disabled", "true");
                }
                $('.usuariosSelectPicker[name="atiende"]').append(option);
              });
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      });
  }

  $('#form-editar-siniestros').submit(function(event){
      event.preventDefault();
      var frm = new FormData($(this)[0]);
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/editarSiniestrosContabilidad' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: "Actualición exitosa."
              });
              mostrarSiniestros("",1);
              $("#editar_siniestros").modal("hide");
            }else{
              Toast.fire({
                type: 'error',
                title: data
              });
            }
          },
          error: function (data) {
            Toast.fire({
                type: 'error',
                title: "Ocurrio un problema."
              });
          }
      }); 
  });

</script>
<script>
  <?php if ($this->session->flashdata('error')): ?>
    Toast.fire({
      type: 'error',
      title: '<?php echo $this->session->flashdata('error') ?>'
    })
  <?php endif ?>
</script>