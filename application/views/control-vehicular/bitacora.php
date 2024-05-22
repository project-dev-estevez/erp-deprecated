<div id="actividad_bitacora" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open_multipart("", "id='caja_chica_form'") ?>
            <div class="modal-header">
                <h4><span class="titulo" style="text-transform: capitalize;"></span> Nueva Actividad</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-8">
                        <div class="form-group">
                            <label>Usuario*</label>
                            <select name="idtbl_usuarios" id="selectUsuario" class="selectpicker usuario" required data-live-search="true">
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($usuarios as $key => $value): ?>
                                  <option value="<?php echo $value->idtbl_usuarios ?>">
                                    <?php echo $value->nombres . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?>
                                  </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4" id="proxima_fecha">
                        <div class="form-group">
                            <label>Unidad</label>
                            <select name="unidad" id="unidad" class="form-control" required>
                                <option value="">Seleccionar...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <label>Resguardo</label>
                            <input type="text" placeholder="Resguardo" name="resguardo" id="resguardo" class="form-control" readonly required>
                        </div>
                    </div>
                    <div class="col-4 col-lg-4">
                        <div class="form-group">
                            <label>Destino</label>
                            <select name="destino" id="destino" class="form-control" required>
                                <option value="">Seleccionar...</option>
                                <?php foreach($ubicaciones AS $key => $value){ ?>
                                    <option value="<?= $value->ubicacion ?>"><?= $value->ubicacion ?></option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <!--<div class="col-4 col-lg-4">
                        <div class="form-group">
                            <label>Hora de arribo</label>
                            <input type="text" placeholder="Hora de arribo" name="hora_arribo" class="form-control" required>
                        </div>
                    </div>-->
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
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Estatus</label>
                            <select name="estatus" id="estatus" class="form-control" required>
                                <option value="">Seleccione...</option>
                                <option value="en ruta">En ruta</option>
                                <option value="en actividades">En actividades</option>
                                <option value="detenido">Detenido</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6">
                        <div class="form-group">
                            <label>Incidencias</label>
                            <select name="incidencias" id="incidencias" class="form-control">
                                <option value="">Seleccione...</option>
                                <option value="falla mecanica">Falla mecánica</option>
                                <option value="falla en gps">Falla en gps</option>
                                <option value="percance">Percance</option>
                                <option value="robo">Robo</option>
                                <option value="exceso velocidad">Exceso velocidad</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6 col-lg-6" style="display: none;" id="div_descuento">
                        <div class="form-group">
                            <label>Descuento</label>
                            <select name="descuento" id="descuento" class="form-control">
                                <option value="">Seleccion...</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea placeholder="Obervaciones" name="observaciones"
                                class="form-control"></textarea>
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
            <h4>Bitacora</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
            </div>
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link btn active" data-toggle="pill" href="#tabCajaChica" role="tab" aria-selected="true">Bitacora</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">              
              <div class="tab-pane active" id="tabCajaChica">
                <?php if($this->session->userdata('tipo') == 3){ ?>
                <br/><br/>
                <a href="#actividad_bitacora" data-toggle='modal' data-action='new' class="btn btn-primary"><span><i class="fa fa-check-square-o"></i> Nueva Actividad</span></a>
                <br/><br/>
                <?php } ?>
                

                <!-- Tab panes -->
                <div class="tab-content">
                  <div class="tab-pane active" id="caja_chica_contable">
                    <br/><br/>
                    <!--<div>
                      <a class="btn btn-primary" id="excel_caja_chica_contable"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                    </div>-->
                    <div>
                        <h2>Incidencias</h2>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tbincidencias">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="paginacionIncidencias">

                    </div>

                    <br>


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
                    <div>
                        <h2>Ruta</h2>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tbcajachica_contable">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                            <th>Acciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="paginacioncajachica_contable">

                    </div>

                    <br>
                    <div>
                        <h2>Fin de actividades</h2>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-striped" id="tbfinalizados">
                        <thead>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>Fecha</th>
                            <th>Monitorista</th>
                            <th>Unidad</th>
                            <th>Usuario</th>
                            <th>Hora</th>
                            <th>Resguardo</th>
                            <th>Destino</th>
                            <th>Proyecto</th>
                            <th>Hora de arribo</th>
                            <th>Estatus</th>
                            <th>Incidencia</th>
                            <th>Observaciones</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    <br>
                    <div class="paginacionFinalizados">

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
  mostrarDatosCajaChica("", "", 1);
  mostrarIncidencias("", "", 1);
  mostrarFinalizados("", "", 1);

  $("body").on("click", ".paginacionIncidencias li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    mostrarIncidencias($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), valorHref);
  });

  $("body").on("click", ".paginacioncajachica_contable li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), valorHref);
  });

  $("body").on("click", ".paginacionFinalizados li a", function(e) {
    e.preventDefault();
    valorHref = $(this).attr("href");
    mostrarFinalizados($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), valorHref);
  });

  $("#excel_caja_chica_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/contable");
  $("#buscar_caja_chica_contable").on('click', function(){
    $("#excel_caja_chica_contable").attr("href", "<?= base_url() ?>ControlVehicular/excel_obtener_caja_chica/null/contable/"+$("#fecha_inicial_caja_chica_contable").val()+"/"+$("#fecha_final_caja_chica_contable").val());
    mostrarDatosCajaChica($("#fecha_inicial_caja_chica_contable").val(), $("#fecha_final_caja_chica_contable").val(), 1);
  });

});

function mostrarIncidencias(fecha_inicial, fecha_final, pagina) {
  $.ajax({
    url: "<?= base_url() ?>ControlVehicular/obtener_bitacora_incidencias",
      type: "POST",
      data: {
          fecha_inicial: fecha_inicial,
          fecha_final: fecha_final,
          nropagina:pagina
      },
      dataType: "json",
      success: function(response) {
        //$('#tbcajachica_contable').html("");
        var filas = "";
        $.each(response.bitacora, function(key, item) {
            var className = "table-danger";
            
            filas += "<tr class='" + className + "'>";
            filas += "<td>" + item.fecha  + "</td>";
            filas += "<td>" + item.nombres_user + "</td>";
            filas += "<td>" + item.numero_interno + "</td>";
            filas += "<td>" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + "</td>";
            filas += "<td>" + item.hora + "</td>";
            filas += "<td>" + item.resguardo + "</td>";
            filas += "<td> <input type='text' class='form-control' name='destino_change' id='destino_change' value='" + item.destino + "'></td>";
            filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
            filas += "<td>" + item.hora_arribo + "</td>";
            filas += "<td>" + item.estatus + "</td>";
            filas += "<td>" + item.incidencia + "</td>";
            filas += "<td>" + item.observaciones + "</td>";
            filas += "<td><a title='Finalizar' href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a></td>";

            filas += "</tr>";
        });
        
        $('#tbincidencias tbody').html(filas);
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
        var id_pagination = "paginacionIncidencias";
        $("." + id_pagination).html(paginador);
      }
  });
}

function mostrarDatosCajaChica(fecha_inicial, fecha_final, pagina) {
  $.ajax({
    url: "<?= base_url() ?>ControlVehicular/obtener_bitacora",
      type: "POST",
      data: {
          fecha_inicial: fecha_inicial,
          fecha_final: fecha_final,
          nropagina:pagina
      },
      dataType: "json",
      success: function(response) {
        //$('#tbcajachica_contable').html("");
        var filas = "";
        $.each(response.bitacora, function(key, item) {
            var className = "";
            if(item.estatus == 'en ruta'){
                className = 'table-success';
            }else if(item.estatus == 'en actividades'){
                className = 'table-info';
            }else if(item.estatus == 'detenido'){
                className = 'table-warning';
            }
            filas += "<tr class='" + className + "'>";
            filas += "<td>" + item.fecha  + "</td>";
            filas += "<td>" + item.nombres_user + "</td>";
            filas += "<td>" + item.numero_interno + "</td>";
            filas += "<td>" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + "</td>";
            filas += "<td>" + item.hora + "</td>";
            filas += "<td>" + item.resguardo + "</td>";
            filas += "<td> <input type='text' class='form-control' name='destino_change' id='destino_change' value='" + item.destino + "'></td>";
            filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
            filas += "<td>" + item.hora_arribo + "</td>";
            filas += "<td>" + item.estatus + "</td>";
            filas += "<td>" + item.incidencia + "</td>";
            filas += "<td>" + item.observaciones + "</td>";
            filas += "<td><a title='Finalizar' href='#cancelarPedido' data-toggle='modal' data-uid_pedido='" +
                            item.uid + "' data-idtbl_solicitudes_almacen='" + item
                            .tbl_solicitudes_almacen_idtbl_solicitudes_almacen +
                            "' data-estimacion='" +
                            item.estimacion + "' data-motivo_cancelacion='" + item
                            .motivo_cancelacion +
                            "'><i style = 'color:green;' class='fa fa-check'></i></a></td>";
            filas += "</tr>";
        });
        
        $('#tbcajachica_contable tbody').html(filas);
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
        var id_pagination = "paginacioncajachica_contable";
        $("." + id_pagination).html(paginador);
      }
  });
}

function mostrarFinalizados(fecha_inicial, fecha_final, pagina) {
  $.ajax({
    url: "<?= base_url() ?>ControlVehicular/obtener_bitacora_finalizados",
      type: "POST",
      data: {
          fecha_inicial: fecha_inicial,
          fecha_final: fecha_final,
          nropagina:pagina
      },
      dataType: "json",
      success: function(response) {
        //$('#tbcajachica_contable').html("");
        var filas = "";
        $.each(response.bitacora, function(key, item) {
            var className = "";
            
            filas += "<tr class='" + className + "'>";
            filas += "<td>" + item.fecha  + "</td>";
            filas += "<td>" + item.nombres_user + "</td>";
            filas += "<td>" + item.numero_interno + "</td>";
            filas += "<td>" + item.nombres + " " + item.apellido_paterno + " " + item.apellido_materno + "</td>";
            filas += "<td>" + item.hora + "</td>";
            filas += "<td>" + item.resguardo + "</td>";
            filas += "<td>" + item.destino + "</td>";
            filas += "<td>" + item.numero_proyecto + " " + item.nombre_proyecto + "</td>";
            filas += "<td>" + item.hora_arribo + "</td>";
            filas += "<td>" + item.estatus + "</td>";
            filas += "<td>" + item.incidencia + "</td>";
            filas += "<td>" + item.observaciones + "</td>";

            filas += "</tr>";
        });
        
        $('#tbfinalizados tbody').html(filas);
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
        var id_pagination = "paginacionFinalizados";
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

$(document).on('change', '#incidencias', function(event){
    event.preventDefault();
    var _this = $(this);
    if(_this.val() != ''){
        $('#div_descuento').show(500);
    }else{
        $('#div_descuento').hide(500);
    }
});

$(document).on('change', '#selectUsuario', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#unidad').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'controlVehicular/getAutosAsignados',
      type: 'POST',
      dataType: 'json',
      data: {idtbl_usuarios: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        
          $.each(data, function (i, item) {
            $('#unidad').append($('<option>', {
              value: item.iddtl_almacen,
              text : item.numero_interno
            }));
          });
              
      },
      error : function(data) {
        console.log(data);
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
  });

  $(document).on('change', '#unidad', function(event) {
    event.preventDefault();
    var _this=$(this);
    $.ajax({
      url: base_url+'controlVehicular/getUbication',
      type: 'POST',
      dataType: 'json',
      data: {iddtl_almacen: _this.val()},
      beforeSend: function() {
        _this.closest('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
        
        $('#resguardo').val(data[0].ubicacion);
              
      },
      error : function(data) {
        console.log(data);
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
        url: "<?= base_url() ?>ControlVehicular/registro_bitacora",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (!resp.error) {
                mostrarDatosCajaChica("", "", 1);
                Toast.fire({
                    type: 'success',
                    title: resp.mensaje
                });
                button.prop("disabled",false);
                $('#actividad_bitacora').modal('hide');
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