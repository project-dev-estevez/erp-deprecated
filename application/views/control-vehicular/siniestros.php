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
                <a class="nav-link btn active" data-toggle="pill" href="#tabSiniestros" role="tab" aria-selected="true">Siniestros</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tabSiniestros">
                <br/><br/>
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busquedasiniestros">
                </div>
                <br/><br/>
                <a href="<?php echo base_url() ?>ControlVehicular/excel_siniestros" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
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
                        <th>Fecha conclusión</th>
                        <th>Autor</th>
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
                        <th>Fecha conclusión</th>
                        <th>Autor</th>
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
<div id="editar_siniestros" role="dialog" class="modal fade text-left" style="z-index: 1039;">
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
                  <select class="form-control" name="tipo" required>
                    <option value="">Seleccionar ...</option>
                    <option value="Perdida Total">Perdida Total</option>
                    <option value="Robo">Robo</option>
                    <option value="Choque">Choque</option>
                    <option value="Otro">Otro</option>
                  </select>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Estatus</label>
                  <select class="form-control" name="estatus" required>
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
                  <input class="form-control reportado_por_empleado" autocomplete="off" type="text" name="reportado_por_empleado" required>
                  <input class="form-control reportado_por" autocomplete="off" type="hidden" name="reportado_por" required>
                  <div class="list-group sugerencias"></div>
                </div>
              </div>
              <div class="col-12 col-lg-12">
                <div class="form-group">
                  <label>Atiende</label>
                  <select class="selectpicker form-control usuariosSelectPicker" data-live-search="true" name="atiende" required>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Nombre contacto</label>
                  <input type="text" name="nombre_contacto" class="form-control" required>
                </div>
              </div>
              <div class="col-6 col-lg-6">
                <div class="form-group">
                  <label>Telefono</label>
                  <input type="text" name="telefono" class="form-control" required>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha siniestro</label>
                  <input type="date" name="fecha_siniestro" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Fecha Conclusión</label>
                  <input type="date" name="fecha_conclusion" class="form-control">
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Siniestro</label>
                  <textarea name="descripcion_siniestro" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label>Descripción Seguimiento</label>
                  <textarea name="descripcion_seguimiento" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Observaciones</label>
                  <textarea name="observaciones_contabilidad" class="form-control" readonly></textarea>
                </div>
              </div>
            </div>
            <input type="hidden" name="iddtl_almacen">
            <input type="hidden" name="idtbl_siniestros">
          </div>
          <div id="tabFoliosSiniestros" class="tab-pane fade">
            <div class="row">
              <a id="btn-nuevo-folio" href="#folio_siniestros" style="margin-left:15px;" data-toggle="modal" class="btn btn-outline-primary btn-sm" title="Nuevo Folio" data-tipo="nuevo" data-idtbl-siniestros="null">Nuevo Folio</a>
              <table class="table" id="folios_siniestros">
                <thead>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody></tbody>
                <tfoot>
                  <tr>
                    <th>Folio</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
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
<div id="folio_siniestros" role="dialog" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open_multipart(base_url() . 'ControlVehicular/nuevoFolio', 'id="form-folio-siniestros"') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Folio siniestro</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <div class="form-group">
              <label>Folio</label>
              <input type="text" name="folio" class="form-control" required>
            </div>
            </div>
          </div>
          <div class="col-6 col-lg-6">
            <div class="form-group">
              <label>Estatus</label>
              <select name="estatus_responsabilidad" class="form-control" required>
                <option>Pendiente</option>
                <option>Afectado</option>
                <option>Responsable</option>
              </select>
            </div>
          </div>
          <input type="hidden" name="idtbl_siniestros">
          <input type="hidden" name="iddtl_siniestros">
          <input type="hidden" name="tipo">
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
<script>
$(document).ready(function() {

  mostrarSiniestros("", 1);
  obtenerPersonal();

  $("input[name='busquedasiniestros']").keyup(function() {
    textoBuscar = $("input[name='busquedasiniestros']").val();
    mostrarTenencias(textoBuscar, 1);
  });

  $("body").on("click", ".paginacionsiniestros li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    valorBuscar = $("input[name='busquedasiniestros']").val();
    mostrarSiniestros(valorBuscar, valorHref);
  });

});

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
          filas += "<td>" + item.nombre + "</td>";
          filas += "<td><a href='#editar_siniestros' data-idtbl-siniestros='" + item.idtbl_siniestros + "' data-seguro='" + item.seguro + "' data-idtbl-usuarios-reportado-por='" + item.idtbl_usuarios_reportado_por + "' data-usuarios-reportado-por='" + item.nombre_reportado_por + " " + item.apellido_paterno_reportado_por + " " + item.apellido_materno_reportado_por + "' data-idtbl-usuarios-atiende='" + item.idtbl_usuarios_atiende + "' data-estatus='" + item.estatus + "' data-fecha-siniestro='" + item.fecha_siniestro + "' data-fecha-conclusion='" + item.fecha_conclusion + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-nombre-contacto='" + item.nombre_contacto + "' data-telefono-contacto='" + item.telefono_contacto + "' data-descripcion-siniestro='" + item.descripcion_siniestro + "' data-descripcion-seguimiento='" + item.descripcion_seguimiento + "' data-iddtl-almacen='" + item.iddtl_almacen + "' data-observaciones='" + item.observaciones_contabilidad + "' data-tipo='" + item.tipo + "' data-tipo='" + item.tipo + "' data-toggle='modal'><i class='fa fa-edit'></i></a>";
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
          filas += "<tr><td>" + resp[r].folio + "</td><td>" + resp[r].estatus_responsabilidad + "</td><td><a href='#folio_siniestros' data-toggle='modal' title='Editar Folio' data-tipo='edicion' data-iddtl-siniestros='" + resp[r].iddtl_siniestros + "' data-idtbl-siniestros='" + resp[r].tbl_siniestros_vehiculos_idtbl_siniestros + "' data-folio='" + resp[r].folio + "' data-estatus-responsabilidad='" + resp[r].estatus_responsabilidad + "'><i class='fa fa-edit'></i></a></td></tr>";
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
      var iddtl_almacen = frm.get('iddtl_almacen');
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/editarSiniestros' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: "Actualición exitosa."
              });
              mostrarSiniestros("",1,iddtl_almacen);
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

  $('#form-folio-siniestros').submit(function(event){
      event.preventDefault();
      var frm = new FormData($(this)[0]);
      var idtbl_siniestros = frm.get('idtbl_siniestros');
      var tipo = frm.get('tipo');
      $.ajax({
          type: "POST",
          url: '<?= base_url() . 'ControlVehicular/nuevoFolio' ?>',
          data: frm,
          processData: false,
          contentType: false,
          success: function (data) {
            if(data == "true"){
              Toast.fire({
                type: 'success',
                title: tipo == "nuevo" ? "Registro exitoso." : "Actualición exitosa."
              });
              mostrarFolios(idtbl_siniestros,$("#editar_siniestros"));
              $("#folio_siniestros").modal("hide");
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

  $('#folio_siniestros').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var recipient = button.data();
    var modal = $(this);

    if(recipient.tipo == "nuevo"){
      modal.find("input[name='idtbl_siniestros']").val(recipient.idtblSiniestros);
      modal.find("input[name='folio']").val("");
      modal.find("input[name='tipo']").val("nuevo");
      modal.find("select[name='estatus_responsabilidad']").val("Pendiente");
      modal.find("select[name='tipo']").val("nuevo");
    }else{
      modal.find("input[name='iddtl_siniestros']").val(recipient.iddtlSiniestros);
      modal.find("input[name='idtbl_siniestros']").val(recipient.idtblSiniestros);
      modal.find("input[name='folio']").val(recipient.folio);
      modal.find("input[name='tipo']").val("edicion");
      modal.find("select[name='estatus_responsabilidad']").val(recipient.estatusResponsabilidad);
      modal.find("select[name='tipo']").val("edicion");
    }
  });


  $('#folio_siniestros').on('hidden.bs.modal', function (e) {
      $('body').addClass('modal-open');
  });

  //buscar usuario --fernando

    $(".reportado_por_empleado").on('keyup', function() {

        var reportado_por = $(this).val();
        var dataString = 'reportado_por=' + reportado_por;
        $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>/Personal/getUsuariosSelect",
            data: dataString,
            dataType: "json",
            success:function(data) {
                filas = "";
                $.each(data, function(key, item) {
                    filas += "<div><a class='elemento-sugerido list-group-item' data='" + item.nombre_completo + "(" + item.numero_empleado + ")" + "' id='" + item.idtbl_usuarios + "'>" + item.nombre_completo + "(" + item.numero_empleado + ")" + "</a></div>";
                });
                $('.sugerencias').fadeIn(1000).html(filas);
                $('.elemento-sugerido').on('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var idtbl_usuarios = $(this).attr('id');
                    var nombre_completo = $(this).attr('data');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('.reportado_por_empleado').val(nombre_completo);
                    $('.reportado_por').val(idtbl_usuarios);
                    //Hacemos desaparecer el resto de sugerencias
                    $('.sugerencias').fadeOut(1000);
                    //alert('Has seleccionado el '+idtbl_usuarios+' '+$('#'+idtbl_usuarios).attr('data'));
                    return false;
                });
            }
        })

    });

    $("body").on('keydown', ".reportado_por_empleado", function(event){
        var element = $(this);
        var _this=$(this).closest('.personal');
        console.log(_this, $(_this).find('.reportado_por'));
        if($(_this).find('.reportado_por').val() != ""){
            element.val("");
            $('.reportado_por_empleado').val("");
            $('.reportado_por').val("");
        }
      });

    $("body").on('blur', ".reportado_por_empleado", function(event){
        var element = $(this);
        var _this=$(this).closest('.personal');
        if($(_this).find('.reportado_por').val() == ""){
          element.val("");
        }
    });
    $("body").on('click', ".reportado_por_empleado", function() {
        var element = $(this);
        element[0].setSelectionRange(0, element.val().length);
    });
    $("body").on('click', function() {
      $('.sugerencias').html("");
      $('.sugerencias').fadeOut(500);
    });

    //fin buscar usuario --fernando

</script>
<script>
  <?php if ($this->session->flashdata('error')): ?>
    Toast.fire({
      type: 'error',
      title: '<?php echo $this->session->flashdata('error') ?>'
    })
  <?php endif ?>
</script>