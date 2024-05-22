<div id="opciones" role="dialog" class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="eco" class="modal-title"></h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-asignaciones-tab" data-toggle="pill"
                            href="#pills-asignaciones" role="tab" aria-controls="pills-asignaciones"
                            aria-selected="true">Personal</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-asignaciones" role="tabpanel"
                        aria-labelledby="pills-asignaciones-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaasignaciones">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbasignaciones">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>

                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>

                                    </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                            </table>
                            <br>
                            <div class="paginacionasignaciones">

                            </div>
                        </div>
                    </div>

                   

                </div>
            </div>
        </div>
    </div>
</div>
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
                    <div class="col-12">
                        <div class="form-group">
                            <label>Persona Autorización*</label>
                            <select name="persona_autorizacion" id="persona_autorizacion" class="form-control" required>
                                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                                <?php foreach ($persona_autorizacion as $key => $value): ?>
                                  <option value="<?php echo $value->idtbl_users ?>">
                                    <?php echo $value->nombre ?> 
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
<section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
        <div class="row">
            <?php if($this->session->userdata('jefe') == 1){ ?>
            <!-- Item -->
            <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/generar_caja_chica" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud de Caja chica</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <!-- Item -->
          <?php } ?>
          <!--<div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>almacen/generar_viaticos" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-yellow">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Solicitud de Viaticos</span>
                  </div>
                </div>
              </a>
            </div>
          </div> -->    
          <?php if($this->session->userdata('tipo') == 16 || $this->session->userdata('id') == 68){ ?> 
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href='#opciones' data-toggle='modal' class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-blue">
                    <i class="fa fa-eye"></i>
                  </div>
                  <div class="title">
                    <span>Ver<br>Caja Chica por personal</span>
                  </div>
                </div>
              </a>
            </div>
          </div>  
          <?php } ?>      
        </div>
    </div>
</section>
<section class="projects">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                        <h4>Caja Chica</h4>

                    </div>
                    <div class="card-body">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbcajaschica">
                                <thead>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Proyecto</th>
                                        <th>Aprobación</th>
                                        <th>Fecha Aprobación</th>
                                        <th>Recibe</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad Comprobada</th>
                                        <th>Porcentaje</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">uid</th>
                                        <th>Fecha Creación</th>                                        
                                        <th>Autor</th>                                        
                                        <th>Proyecto</th>
                                        <th>Aprobación</th>
                                        <th>Fecha Aprobación</th>
                                        <th>Recibe</th>
                                        <th>Cantidad</th>
                                        <th>Cantidad Comprobada</th>
                                        <th>Porcentaje</th>
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
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$('#caja_chica_modal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes    
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("select[name='idtbl_proyectos']").val(recipient.tbl_proyectos_idtbl_proyectos);    
   

});
</script>
<script>
$(document).ready(function() {          
    selectBuscar = "";
    mostrarDatos("", 1, "");

    $("select[name='select']").on('change', function() {
        selectBuscar = $(this).val();
        mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
        textoBuscar = $("input[name='busqueda']").val();
        mostrarDatos(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click", ".paginacion li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda']").val();
        mostrarDatos(valorBuscar, valorHref, selectBuscar);
    });

    selectBuscar2 = "";
    mostrarDatos2("", 1, "");

    $("input[name='busquedaasignaciones']").keyup(function() {
        textoBuscar = $("input[name='busquedaasignaciones']").val();
        mostrarDatos2(textoBuscar, 1, selectBuscar2);
    });

    $("body").on("click", ".paginacionasignaciones li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaasignaciones']").val();
        mostrarDatos2(valorBuscar, valorHref, selectBuscar2);
    });

});

$("#caja_chica_form").on("submit", function(e){
    e.preventDefault();
    var form = $(this);
    var button = form.find("button[type='submit']");
    var formData = new FormData(this);
    button.prop("disabled",true);
    $.ajax({
        url: "<?= base_url() ?>almacen/registro_caja_chica",
        type: "post",
        data: formData,
        processData: false,
        contentType: false,
        complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (!resp.error) {
                //mostrarDatosCajaChica("", "", 1, "contable");
                //mostrarDatosCajaChica("", "", 1, "no_contable");
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





function mostrarDatos(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarCajasChicas",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            fecha = '---';
            usuario = <?= $this->session->userdata('id') ?>;
            tipo = <?= $this->session->userdata('tipo') ?>;
            $.each(response.cajaschicas, function(key, item) {
                if (item.estatus == 'creada') {
                    estatus = 'Pendiente Aprobación';
                    clase = 'table-secondary';
                    porcentaje = '33%';
                } else if (item.estatus == 'aprobada') {
                    estatus = 'Aprobada';
                    clase = 'table-warning';
                    porcentaje = '66%'
                } else if (item.estatus == 'finalizada') {
                    estatus = 'Finalizada';
                    clase = 'table-success';
                    porcentaje = '100%';
                } else if (item.estatus == 'SI') {
                    estatus = 'En curso';
                    clase = 'table-info';
                    porcentaje = '80%';
                } else {
                    estatus = 'Cancelada';
                    clase = 'table-danger';
                    porcentaje = '0%';
                }

                if(item.fecha_aprobacion != null){
                    fecha = item.fecha_aprobacion;
                }
                if(item.idtbl_solicitud_recursos != null){
                filas += "<tr class='" + clase + "'>";
                filas += "<td>" + item.uid + "</td>";
                filas += "<td>" + item.fecha_creacion + "</td>";                
                filas += "<td>" + item.autor + "</td>"                
                filas += "<td>" + item.numero_proyecto + " - " + item.nombre_proyecto + "</td>";
                filas += "<td>" + item.nombre_aprobacion + "</td>";
                filas += "<td>" + fecha + "</td>";
                filas += "<td>" + item.nombre_recibe + " " + item.apellido_paterno + " " + item.apellido_materno + "</td>";
                filas += "<td>" + item.cantidad + "</td>";
                filas += "<td>" + item.cantidad_comprobada + "</td>";

                
                filas += "<td>" + porcentaje + "</td>";
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle_recurso/" + item.uid + "/caja_chica" + "' title='Detalles'><i class='fa fa-info-circle'></i></a>";  
                if(usuario == item.usuario_recibio){
                    //filas += "<a href='"+"#caja_chica_modal" + "' data-toggle='modal' data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' title='Comprobar'><i class='fa fa-check-square-o'></i></a>";  
                    filas += "<a href='"+"<?= base_url() ?>" + "almacen/comprobaciones_solicitud/" + item.uid + "/" + item.ciclo + "' data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' title='Comprobaciones'><i class='fa fa-eye'></i></a>";  

                }else if((item.estatus == 'finalizada' && (tipo == 16 || tipo == 17 || tipo == 19 || usuario == 68))){
                    filas += "<a href='"+"<?= base_url() ?>" + "almacen/comprobaciones_solicitud/" + item.uid + "/" + item.ciclo + "' data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' title='Comprobaciones'><i class='fa fa-eye'></i></a>";  
                }
                /*if(parseFloat(item.cantidad_comprobada) > 0 && usuario == 68){
                    filas += "<a data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' onclick='aprobar(this.id)' class='aprobar' id='"+item.idtbl_solicitud_recursos+"' title='Comprobar'><i class='fa fa-refresh'></i></a>";  
                }*/
                filas += "</td>"             
                filas += "</tr>";
            }
            });
            $('#tbcajaschica tbody').html(filas);
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
            $(".paginacion").html(paginador);
        }
    });
}

function aprobar(id){
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea realizar la devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {

            if (result.value) {
                //alert(this.id);
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion_recursos/" + id,
                    type: "post",
                    dataType: "json",
                    data: id,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );
                        mostrarDatos('',1,'');
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            
        }
       
    })
}


$('.aprobar').click(function(event) {
    console.log("Envio 1");
   
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea realizar la devolución?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {

            if (result.value) {
                //alert(this.id);
                $.ajax({
                    url: "<?= base_url() ?>almacen/devolucion_recurso/" + this.id,
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.status) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            );
                            if (contratistaPersonal == 1 && usuarioalmacen == 1) {
                                location.reload();
                            } else {
                                location.reload();
                            }
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            
        }
       
    })
});

function mostrarDatos2(valorBuscar, pagina, valorBuscar2) {
    $.ajax({
        url: "<?= base_url() ?>almacen/mostrarCajasPersonal",
        type: "POST",
        data: {
            buscar: valorBuscar,
            nropagina: pagina,
            buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
            filas = "";
            clase = "";
            estatus = "";
            porcentaje = "";
            fecha = '---';
            usuario = <?= $this->session->userdata('id') ?>;
            tipo = <?= $this->session->userdata('tipo') ?>;
            $.each(response.cajaschicas, function(key, item) {
               

                filas += "<tr class='" + clase + "'>";
                filas += "<td><a href='"+"<?= base_url() ?>" + "almacen/comprobaciones_personal/" + item.uid + "' data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' title='Comprobaciones'>" + item.uid + "</a></td>";
                filas += "<td><a href='"+"<?= base_url() ?>" + "almacen/comprobaciones_personal/" + item.uid + "' data-proyecto='"+item.tbl_proyectos_idtbl_proyectos+"' data-uid='"+item.uid+"' data-action='new' title='Comprobaciones'>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</a></td>";                

                filas += "</td>"             
                filas += "</tr>";
            
            });
            $('#tbasignaciones tbody').html(filas);
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
            $(".paginacionasignaciones").html(paginador);
        }
    });
}
</script>