<div id="caja_chica_modal" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart("", "id='caja_chica_form'") ?>
            <div class="modal-header">
                <h4><span class="titulo" style="text-transform: capitalize;"></span> Caja Chica</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" name="iddtl_almacen" value="">
                    <input type="hidden" name="idtbl_tramites_vehiculares" value="">
                    <input type="hidden" name="idtbl_caja_chica">
                    <input type="hidden" name="uid">
                    <input type="hidden" name="tipo" value="general">
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <label>Fecha de compra</label>
                            <input type="date" placeholder="Fecha de compra" name="fecha_compra" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4" id="proxima_fecha">
                        <div class="form-group">
                            <label>Comprobante</label>
                            <select name="comprobante" class="form-control" required>
                                <option value="">Seleccionar . . .</option>
                                <option value="factura">Factura</option>
                                <option value="nota">Nota</option>
                                <option value="vale">Vale</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <label>Costo</label>
                            <input type="number" placeholder="Costo" name="costo" class="form-control" step="0.0001" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea placeholder="Descripción" name="descripcion" required
                                class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Proyecto*</label>
                            <select name="idtbl_proyectos" id="selectProyecto" class="selectpicker proyecto" required data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($proyectos as $key => $value): ?>
                                  <option value="<?php echo $value->idtbl_proyectos ?>"
                                    data-direccion="<?php echo $value->direccion ?>">
                                    <?php echo $value->numero_proyecto ?> -
                                    <?php echo substr($value->nombre_proyecto, 0, 70) ?>
                                  </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-12" id="archivo">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="file" name="archivo" class="form-control">
                        </div>
                    </div>
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
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Control Vehicular (Contabilidad)</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
            </div>
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link btn active" data-toggle="pill" href="#tabCajaChica" role="tab" aria-selected="true">Caja Chica CV</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">              
              <div class="tab-pane active" id="tabCajaChica">
                <?php if($this->session->userdata('tipo') == 3){ ?>
                <br/><br/>
                <a href="#caja_chica_modal" data-toggle='modal' data-action='new' class="btn btn-primary">General Caja Chica</a>
                <a href="<?= base_url() . "/control-vehicular/servicios" ?>" class="btn btn-primary">Servicio Caja Chica</a>
                <br/><br/>
                <?php } ?>
                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <a class="nav-link btn active" data-toggle="pill" href="#caja_chica_contable" role="tab" aria-selected="true">
                      Contable
                    </a>
                        </li>
                  <li class="nav-item">
                    <a class="nav-link btn" data-toggle="pill" href="#caja_chica_no_contable" role="tab" aria-selected="true">No Contable</a>
                  </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="caja_chica_contable">
                    <br/><br/>
                    <div>
                      <a class="btn btn-primary" id="excel_caja_chica_contable"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                    </div>
                    <div class="text-right">
                      <span class="form-group text-left">
                        <label>Fecha Incial</label>
                        <input type="date" class="form-control" id="fecha_inicial_caja_chica_contable">
                      </span>
                      <span class="form-group text-left">
                        <label>Fecha Final</label>
                        <input type="date" class="form-control" id="fecha_final_caja_chica_contable">
                      </span>
                      <span>
                        <button class="btn btn-primary mb-2" id="buscar_caja_chica_contable">Buscar</button>
                      </span>
                    </div>
                    <div class="float-right text-right">
                      <br><br>
                      <h4>Total:<span id="total_caja_chica_contable" style="font-weight: normal;"></span></h4>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tbcajachica_contable">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Uid</th>
                            <th>Proyecto</th>
                            <th>Tipo</th>
                            <th>ECO</th>
                            <th>Fecha Compra</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Uid</th>
                            <th>Proyecto</th>
                            <th>Tipo</th>
                            <th>ECO</th>
                            <th>Fecha Compra</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="paginacioncajachica_contable">

                    </div>
                  </div>
                  <div class="tab-pane fade" id="caja_chica_no_contable">
                    <br/><br/>
                    <div>
                      <a class="btn btn-primary" id="excel_caja_chica_no_contable"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                    </div>
                    <div class="text-right">
                      <span class="form-group text-left">
                        <label>Fecha Incial</label>
                        <input type="date" class="form-control" id="fecha_inicial_caja_chica_no_contable">
                      </span>
                      <span class="form-group text-left">
                        <label>Fecha Final</label>
                        <input type="date" class="form-control" id="fecha_final_caja_chica_no_contable">
                      </span>
                      <span>
                        <button class="btn btn-primary mb-2" id="buscar_caja_chica_no_contable">Buscar</button>
                      </span>
                    </div>
                    <div class="text-right">
                      <br><br>
                      <h4>Total:<span id="total_caja_chica_no_contable" style="font-weight: normal;"></span></h4>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tbcajachica_no_contable">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Uid</th>
                            <th>Proyecto</th>
                            <th>Tipo</th>
                            <th>ECO</th>
                            <th>Fecha Compra</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>ID</th>
                            <th>Uid</th>
                            <th>Proyecto</th>
                            <th>Tipo</th>
                            <th>ECO</th>
                            <th>Fecha Compra</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Comprobante</th>
                            <th>Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="paginacioncajachica_no_contable">

                    </div>
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
  mostrarDatosCajaChica("", "", 1, "contable");
  mostrarDatosCajaChica("", "", 1, "no_contable");

  $("body").on("click", ".paginacioncajachica_contable li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), valorHref, "contable");
  });

  $("body").on("click", ".paginacioncajachica_no_contable li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_no_contable").val(), $("#fecha_final_caja_chica_no_contable").val(), valorHref, "no_contable");
  });

  $("#excel_caja_chica_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/contable");
  $("#buscar_caja_chica_contable").on('click', function(){
    $("#excel_caja_chica_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/contable/"+$("#fecha_inicial_caja_chica_contable").val()+"/"+$("#fecha_final_caja_chica_contable").val());
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), 1, "contable");
  });

  $("#excel_caja_chica_no_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/no_contable");
  $("#buscar_caja_chica_no_contable").on('click', function(){
    $("#excel_caja_chica_no_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/no_contable/"+$("#fecha_inicial_caja_chica_no_contable").val()+"/"+$("#fecha_final_caja_chica_no_contable").val());
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_no_contable").val(), $("#fecha_final_caja_chica_no_contable").val(), 1, "no_contable");
  });

});

function mostrarDatosCajaChica(fecha_inicial, fecha_final, pagina, tipo) {
  $.ajax({
    url: "<?= base_url() ?>ControlVehicular/obtener_caja_chica",
      type: "POST",
      data: {
          fecha_inicial: fecha_inicial,
          fecha_final: fecha_final,
          nropagina:pagina,
          tipo: tipo
      },
      dataType: "json",
      success: function(response) {
        var id = tipo == "contable" ? "tbcajachica_contable" : "tbcajachica_no_contable";
        $('#' + id + ' tbody').html("");
        var filas = "";
        $.each(response.caja_chica, function(key, item) {
            var className = "";
            if(item.confirmacion == 2) {
              className = 'table-success';
            } else if(item.confirmacion == 1) {
              className = 'table-primary';
            } else if(item.confirmacion == 3){
              className = 'table-danger'
            } else {
              className = 'table-warning';
            }
            filas += "<tr class='" + className + "'>";
            filas += "<td>" + item.idtbl_caja_chica  + "</td>";
            filas += "<td>" + item.uid + "</td>";
            filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
            filas += "<td>" + item.tipo + "</td>";
            if(item.numero_interno != null){
              filas += "<td>" + item.numero_interno + "</td>";
            }else{
              filas += "<td>---</td>";
            }
            filas += "<td>" + item.fecha_compra + "</td>";
            filas += "<td>" + item.monto + "</td>";
            filas += "<td>" + item.descripcion + "</td>";
            filas += "<td>" + item.comprobante + "</td>";
            if(item.confirmacion == 3){
              filas += "<td><a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a></td>";
            }else{
              filas += "<td>";
              <?php if($this->session->userdata('tipo') == 3){ ?>
                filas += "<a href='#caja_chica_modal' data-toggle='modal' data-action='edit' data-fecha-compra='" + item.fecha_compra + "' data-monto='" + item.monto + "' data-descripcion='" + item.descripcion + "' data-comprobante='" + item.comprobante + "' data-tipo='" + item.tipo + "' data-idtbl-caja-chica='" + item.idtbl_caja_chica + "' data-uid='" + item.uid + "' data-iddtl-almacen='" + item.dtl_almacen_iddtl_almacen + "' data-idtbl-tramites-vehiculares='" + item.tbl_tramites_vehiculares_idtbl_tramites_vehiculares + "' data-idtbl-proyecto='" + item.tbl_proyectos_idtbl_proyectos +  "' type='button'><li class='fa fa-edit'></li></a>";
              <?php } ?>
              <?php if(($this->session->userdata('tipo') == 1 || $this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19) || ($this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') == 3)){ ?>
                filas += "<a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a>";
                if(item.confirmacion == 0){
                  filas += "<a href='#' id='confirmacion_movimiento_caja_chica_" + tipo + "' data-idtbl-caja-chica='"+ item.idtbl_caja_chica  +"'><i class='fa fa-check' aria-hidden='true'></i></a>";
                  filas += "<a href='#' id='cancelar_movimiento_caja_chica_" + tipo + "' data-idtbl-caja-chica='"+ item.idtbl_caja_chica  +"'><i class='fa fa-times' aria-hidden='true'></i></a>";
                }
              <?php } elseif($this->session->userdata('tipo') == 16){ ?>
                filas += "<a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a>";
                if(item.confirmacion == 1){
                  filas += "<a href='#' id='confirmacion_movimiento_caja_chica_" + tipo + "' data-idtbl-caja-chica='"+ item.idtbl_caja_chica  +"'><i class='fa fa-check' aria-hidden='true'></i></a>";
                  filas += "<a href='#' id='cancelar_movimiento_caja_chica_" + tipo + "' data-idtbl-caja-chica='"+ item.idtbl_caja_chica  +"'><i class='fa fa-times' aria-hidden='true'></i></a>";
                }
              <?php } else{ ?>
                filas += "<a href='<?= base_url() ?>uploads/caja_chica/" + item.uid + ".pdf' target='_black'><i class='fa fa-file-pdf-o'></i></a>";
              <?php } ?>
              filas += "</td>";
            }
            filas += "</tr>";
        });
        if(tipo == "contable"){
          $("#total_caja_chica_contable").text(" $ " + response.monto);
        }else{
          $("#total_caja_chica_no_contable").text(" $ " + response.monto);
        }
        $('#' + id + ' tbody').html(filas);
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
        var id_pagination = tipo == "contable" ? "paginacioncajachica_contable" : "paginacioncajachica_no_contable";
        $("." + id_pagination).html(paginador);
      }
  });
}

$("body").on("click", "#confirmacion_movimiento_caja_chica_contable", function(e){
  e.preventDefault();
  var button = $(this);
  var recipient = button.data();
  var pagina = parseInt($(".paginacioncajachica_contable").find(".active a").text());
  confirmacion_movimiento(recipient, pagina, "contable");
});

$("body").on("click", "#confirmacion_movimiento_caja_chica_no_contable", function(e){
  e.preventDefault();
  var button = $(this);
  var recipient = button.data();
  var pagina = parseInt($(".paginacioncajachica_no_contable").find(".active a").text());
  confirmacion_movimiento(recipient, pagina, "no_contable");
});

function confirmacion_movimiento(recipient, pagina, tipo){
  Swal.fire({
    title: '¿Deseas confirmar el movimiento?',
    text: "Cofirmación movimiento",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "<?= base_url() ?>ControlVehicular/confirmar_movimiento_caja_chica",
        type: "POST",
        data: {
          idtbl_caja_chica: recipient.idtblCajaChica,
          token: '<?= $token ?>'
        },
        dataType: "json",
        success: function(resp){
          mostrarDatosCajaChica("", "", pagina, tipo);
          if(!resp.error){
            Swal.fire(
              '¡Confirmado!',
              resp.mensaje,
              'success'
            );
          }else{
            Swal.fire(
              '¡Error!',
              resp.mensaje,
              'error'
            );
          }
        }
      });
    }
  });
}

$("body").on("click", "#cancelar_movimiento_caja_chica_contable", function(e){
  e.preventDefault();
  var button = $(this);
  var recipient = button.data();var pagina = parseInt($(".paginacioncajachica_contable").find(".active a").text());
  var pagina = parseInt($(".paginacioncajachica_contable").find(".active a").text());
  cancelar_movimiento(recipient, pagina, "contable");
});

$("body").on("click", "#cancelar_movimiento_caja_chica_no_contable", function(e){
  e.preventDefault();
  var button = $(this);
  var recipient = button.data();var pagina = parseInt($(".paginacioncajachica_no_contable").find(".active a").text());
  var pagina = parseInt($(".paginacioncajachica_no_contable").find(".active a").text());
  cancelar_movimiento(recipient, pagina, "no_contable");
});

function cancelar_movimiento(recipient, pagina, tipo){
  Swal.fire({
    title: '¿Deseas cancelar el movimiento?',
    text: "Cofirmación movimiento",
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Aceptar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.value) {
      $.ajax({
        url: "<?= base_url() ?>ControlVehicular/cancelar_movimiento_caja_chica",
        type: "POST",
        data: {
          idtbl_caja_chica: recipient.idtblCajaChica,
          token: '<?= $token ?>'
        },
        dataType: "json",
        success: function(resp){
          mostrarDatosCajaChica("", "", pagina, tipo);
          if(!resp.error){
            Swal.fire(
              '¡Confirmado!',
              resp.mensaje,
              'success'
            );
          }else{
            Swal.fire(
              '¡Error!',
              resp.mensaje,
              'error'
            );
          }
        }
      });
    }
  });
}

$('#caja_chica_modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data();
    console.log(recipient);
    var modal = $('#caja_chica_modal');
    if(recipient.action == "new"){
        modal.find("input[name='fecha_compra']").val("");
        modal.find("select[name='comprobante']").val("");
        modal.find("textarea[name='descripcion']").val("");
        modal.find("input[name='costo']").val("");
        modal.find("input[name='archivo']").val("");
        modal.find("input[name='archivo']").prop("required", true);
        modal.find("input[name='idtbl_caja_chica']").val("");
        modal.find("input[name='uid']").val("");
        modal.find("input[name='tipo']").val("general");
        modal.find("input[name='idtbl_tramites_vehiculares']").val("");
        modal.find("input[name='iddtl_almacen']").val("");
        modal.find("select[name='idtbl_proyectos']").val(9);
        modal.find(".titulo").text("General");
        $('.selectpicker').selectpicker('refresh');
    }else{
        modal.find("input[name='fecha_compra']").val(recipient.fechaCompra);
        modal.find("select[name='comprobante']").val(recipient.comprobante);
        modal.find("textarea[name='descripcion']").val(recipient.descripcion);
        modal.find("input[name='costo']").val(recipient.monto);
        modal.find("input[name='archivo']").val("");
        modal.find("input[name='archivo']").prop("required", false);
        modal.find("input[name='idtbl_caja_chica']").val(recipient.idtblCajaChica);
        modal.find("input[name='uid']").val(recipient.uid);
        modal.find("input[name='tipo']").val(recipient.tipo);
        modal.find("input[name='idtbl_tramites_vehiculares']").val(recipient.idtblTramitesVehiculares);
        modal.find("input[name='iddtl_almacen']").val(recipient.iddtlAlmacen);
        modal.find("select[name='idtbl_proyectos']").val(recipient.idtblProyecto);
        modal.find(".titulo").text(recipient.tipo);
        $('.selectpicker').selectpicker('refresh');
    }
});

$("#caja_chica_form").on("submit", function(e){
    e.preventDefault();
    var form = $(this);
    var button = form.find("button[type='submit']");
    var formData = new FormData(this);
    button.prop("disabled",true);
    $.ajax({
        url: "<?= base_url() ?>ControlVehicular/registro_caja_chica",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (!resp.error) {
                mostrarDatosCajaChica("", "", 1, "contable");
                mostrarDatosCajaChica("", "", 1, "no_contable");
                Toast.fire({
                    type: 'success',
                    title: resp.mensaje
                });
                button.prop("disabled",false);
                $('#caja_chica_modal').modal('hide');
            } else {
                Toast.fire({
                    type: 'error',
                    title: resp.mensaje
                });
                button.prop("disabled",false);
            }
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