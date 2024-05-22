
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevoCurso" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-green"><i class="fa fa-plus fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Cuadrilla</span>
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        
      </div>
    </div>
  </section>
  
  <!-- Dashboard Header Section    -->
  <section class="dashboard-header">
    <div class="container-fluid">
    <div class="card">
                    <div class="card-header">

                        <h4>Cuadrillas</h4>

                    </div>
                    <div class="card-body">
                    <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link btn active" id="pills-cursos-tab" data-toggle="pill" href="#pills-cursos" role="tab" aria-controls="pills-cursos" aria-selected="true">
                            Cuadrillas
                            </a>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link btn" id="pills-instructores-tab" data-toggle="pill" href="#pills-instructores" role="tab" aria-controls="pills-instructores" aria-selected="false">
                            Instructores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" id="pills-reportes-tab" data-toggle="pill" href="#pills-reportes" role="tab" aria-controls="pills-reportes" aria-selected="false">
                            Reportes
                            </a>
                        </li>-->
                    </ul>
                    <div class="tab-content" id="tabsContent">
                    <div class="tab-pane fade active show" id="pills-cursos" role="tabpanel" aria-labelledby="pills-cursos-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaCursos">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbcuadrillas">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nombre</th>
                                        <th>Acciones</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">Nombre</th>
                                        <th>Acciones</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>

                            </table>
                            <br>
                            <div class="paginacionCuadrillas">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-instructores" role="tabpanel" aria-labelledby="pills-instructores-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaInstructores">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbinstructores">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Nombres</th>
                                        <th>Tipo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">Nombres</th>
                                        <th>Tipo</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>

                            </table>
                            <br>
                            <div class="paginacionInstructores">

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-reportes" role="tabpanel" aria-labelledby="pills-reportes-tab">
                        
                            <?= form_open('Curso/reporte_excel', 'class="needs-validation" novalidate id="formfecha"'); ?>
                    <div class="form-row">
                        <div class="colxs-12 col-md-4">
                        <label class="form-check-label">Fecha Inicial</label>
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio_fecha" max="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="colxs-12 col-md-4">
                        <label class="form-check-label">Fecha Final</label>
                        <input type="date" class="form-control fechaFinal" name="fecha_final" id="fecha_final_fecha" min="" max="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="col-xs-12 col-md-4">
                        <label class="form-check-label">Departamento*</label>
                        <select name="departamento" class="form-control">
                            <option value="" disabled selected>Seleccione...</option>
                            <?php foreach($departamentos AS $key => $value){ ?>
                                <option value="<?= $value->idtbl_departamentos ?>"><?= $value->departamento ?></option>
                            <?php } ?>
                        </select>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="col text-right pt-5">
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

  <div class="modal fade text-left" id="nuevoCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                <div class="modal-header bg-primary white">                    
                    <h4 class="modal-title" id="myModalLabel8">Cuadrilla</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Almacen/nuevaCuadrilla', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                    <div class="modal-body">
                    
                    <div class="row">
                        <div class="col">
                            <label>Nombre de la cuadrilla:</label>
                            <input type="text" class="form-control" name="nombre_cuadrilla" id="nombre_cuadrilla" placeholder="Nombre Cuadrilla" required>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="Cerrar">
                        <button type="button" class="btn btn-outline-primary btn-lg" id="confirmar">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editar_curso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                <div class="modal-header bg-primary white">                    
                    <h4 class="modal-title" id="myModalLabel8">Cuadrilla</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Almacen/editarCuadrilla', 'class="needs-validation" id="formuploadajaxEdit" novalidate'); ?>
                    <div class="modal-body">
                    
                    <div class="row">
                        <div class="col">
                            <label>Nombre Cuadrilla:</label>
                            <input type="text" class="form-control" name="nombre_cuadrillaEdit" id="nombre_cuadrillaEdit" placeholder="Nombre Cuadrilla" required>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="id_cuadrillaEdit" value="">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="Cerrar">
                        <button type="button" class="btn btn-outline-primary btn-lg" id="confirmar_edit">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="nuevoCertificado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="over"></div>
                <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                <div class="modal-header bg-primary white">                    
                    <h4 class="modal-title" id="myModalLabel8">Certificado</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Curso/nuevoCertificado', 'class="needs-validation" id="formuploadajaxCertificado" novalidate'); ?>
                    <div class="modal-body">
                    
                    <div class="row">
                        <div class="col">
                            <label>Nombre del certificado:</label>
                            <input type="text" class="form-control" name="nombre_certificado" id="nombre_certificado" placeholder="Nombre Certificado" required>
                        </div>
                        <div class="col">
                            <label>Ocupación especifica:</label>
                            <input type="text" class="form-control" name="ocupacion_especifica" id="ocupacion_especifica" placeholder="Ocupación Especifica" required>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <label>Área tematica:</label>
                            <input type="text" class="form-control" name="area_tematica" id="area_tematica" placeholder="Area tematica" required>
                        </div>
                        <div class="col">
                            <label>Nomenclatura:</label>
                            <input type="text" class="form-control" name="nomenclatura" id="nomenclatura" placeholder="Nomenclatura" required>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="Cerrar">
                        <button type="button" class="btn btn-outline-primary btn-lg" id="confirmar_certificado">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="nuevoInstructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="over"></div>
            <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                <div class="modal-header bg-primary white">                    
                    <h4 class="modal-title" id="myModalLabel8">Nuevo Instructor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Curso/nuevoInstructor', 'class="needs-validation" id="formuploadajaxInstructor" novalidate'); ?>
                    <div class="modal-body">
                    <div class="row">
            <div class="col">
              <div class="form-group">
                <label>Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                  <option value="" disabled selected>Seleccione...</option>
                  <option value="interno">Interno</option>
                  <option value="externo">Externo</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione el tipo personal
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col divContratistas" style="display: none;">
                <div class="row">
                    <div class="col">
                        <label>Nombre del instructor:</label>
                        <input type="text" class="form-control" name="nombre_instructor" id="nombre_instructor" placeholder="Nombre Instructor" required>
                    </div>
                </div>
            </div>
            
            <div class="col divInternos" style="display: none;">
              <div class="form-group">
                <label>Recibe*</label>
                <select name="usuario" id="recibe" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al personal
                </div>
              </div>
            </div>
            
          </div>
                    
                    <div class="row">
                        <div class="col">
                            <label>Firma</label>
                            <input type="file" class="form-control" name="firma" id="firma" required>
                        </div>
                    </div>
                    <br>
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="Cerrar">
                        <button type="button" class="btn btn-outline-primary btn-lg" id="confirmar_instructor">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="certificado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <?= form_open_multipart(base_url() . 'personal/nuevo-certificado', 'class="needs-validation" id="formpersonalcurso" novalidate'); ?>
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal Cuadrilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal-header -->
            <div class="modal-body">
                
                
            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Puesto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbpersonalcuadrilla"></tbody>
                                
                                </table>
                            </div>
                
                <div class="row">
                <div class="form-group col">
             
                <label>Personal*</label>
                <select name="usuario" id="personal_curso" class="selectpicker form-control" data-live-search="true">
                  <option value="" disabled selected>Seleccione...</option>
                </select>
                <div class="invalid-feedback">
                  Seleccione al personal
                </div>
                </div>
           
                </div>
                </div>
                <div class="col-4">
                    <div id="seccion_personal"></div>
                </div>
                <div>
            </div>
            <!-- modal-body -->
            <div class="modal-footer">
                <div id="personal_asignado"></div>
                <input type="hidden" name="id_cuadrilla" value="">
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
                <button type="button" id="confirmar_personalc" class="btn btn-primary">Guardar</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <script>
    $('#certificado').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='id_cuadrilla']").val(recipient.idcuadrilla);
    modal.find("input[name='nombre_curso']").val(recipient.nombrecurso);

    $('#personal_curso').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/tipo-personal',
      type: 'POST',
      dataType: 'json',
      data: {tipo: 'interno'},
      beforeSend: function() {
        $('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
       
          $.each(data[0].personal_recibe, function (i, item) {
            //console.log(item);
            $('#personal_curso').append($('<option>', {
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno
            }));
          });
          $('#personal_curso').selectpicker('refresh');
      
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
      $('.card-body').removeClass('load');
    });


    $.ajax({
      url: base_url+'almacen/getPersonalCuadrilla',
      type: 'POST',
      dataType: 'json',
      data: {id: recipient.idcuadrilla},
      beforeSend: function() {
        $('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
       
          $.each(data[0].personal_recibe, function (i, item) {
            //console.log(item);
            $('#tbpersonalcuadrilla').append('<tr><td>'+item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+'</td><td>'+item.puesto+'</td><td><a class="delete-user" title="Quitar" id="'+item.idtbl_usuarios_cuadrillas+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></tr>');
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
      $('.card-body').removeClass('load');
    });
    });

    $('#editar_curso').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    //console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='id_cuadrillaEdit']").val(recipient.idcuadrilla);
    modal.find("input[name='nombre_cuadrillaEdit']").val(recipient.nombrecuadrilla);
    

    });

    $(document).ready(function(){

        mostrarDatosCuadrillas("",1);
            $("input[name='busquedaCuadrillas']").keyup(function() {
            textoBuscar = $("input[name='busquedaCuadrillas']").val();
            mostrarDatosCuadrillas(textoBuscar,1);
        });
        mostrarDatosInstructores("",1);
            $("input[name='busquedaInstructores']").keyup(function() {
            textoBuscar = $("input[name='busquedaInstructores']").val();
            mostrarDatosInstructores(textoBuscar,1);
        });

        $("body").on("click",".paginacionCuadrillas li a",function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busquedaCuadrillas']").val();
            mostrarDatosCuadrillas(valorBuscar,valorHref); 
        });
        $("body").on("click",".paginacionInstructores li a",function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busquedaInstructores']").val();
            mostrarDatosInstructores(valorBuscar,valorHref); 
        });

    });

    function mostrarDatosCuadrillas(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarCuadrillas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbcuadrillas tbody').html("");
          $.each(response.cuadrillas, function(key, item) {
            
              filas += "<tr>";
              filas += "<td>" + item.nombre_cuadrilla + "</td>";
              filas += "<td>" +
                    "<a href='#certificado' data-toggle='modal' title='" + item.nombre_curso + "'" +
                    " data-idcuadrilla='" + item.idtbl_cuadrillas + "' data-nombrecuadrilla='" + item.nombre_cuadrilla + "'><i class='fa fa-user-plus'></i></a>";
              filas +=
                    "<a href='#editar_curso' data-toggle='modal' title='" + item.nombre_curso + "'" +
                    " data-idcuadrilla='" + item.idtbl_cuadrillas + "' data-nombrecuadrilla='" + item.nombre_cuadrilla + "'><i class='fa fa-edit'></i></a></td>";
              filas += "</tr>";
              $('#tbcuadrillas tbody').html(filas);
            
          });

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
          $(".paginacionCuadrillas").html(paginador);
        }
      });
    }

    function mostrarDatosInstructores(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Curso/mostrarInstructores",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbinstructores tbody').html("");
          $.each(response.instructores, function(key, item) {
            
              filas += "<tr>";
              if(item.nombres == null){
                filas += "<td>" + item.nombre_usuario + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</td>";
              }else{
                filas += "<td>" + item.nombres + "</td>";
              }
              filas += "<td>" + item.tipo + "</td>";
              filas += "</tr>";
              $('#tbinstructores tbody').html(filas);
            
          });

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
          $(".paginacionInstructores").html(paginador);
        }
      });
    }

  function mapaPosicionActual(){        
    var mapa = document.getElementById("mapa");
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition( success, error, options );
    function success(position) {
        console.log(position);
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
      
      mapa.innerHTML = '<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };
    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
    
    
  }
  //mapaPosicionActual();
  
    $("#find_btn").click(function() {
      mapaPosicionActual();
    });
  
    $(document).on('click', '#confirmar', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea registrar la cuadrilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Almacen/nuevaCuadrilla",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.mensaje,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });

    $(document).on('click', '#confirmar_personalc', function(event) {
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formpersonalcurso"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea registrar el personal?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Almacen/guardar_personal_cuadrilla",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.mensaje,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });

    $(document).on('change', '#tipo', function(event) {
    event.preventDefault();
    var _this=$(this);
    $('#recibe').find('option').remove().end().append('<option value="" disabled="disabled" selected="selected">Seleccione...</option>');
    $.ajax({
      url: base_url+'almacen/tipo-personal',
      type: 'POST',
      dataType: 'json',
      data: {tipo: _this.val()},
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
        if (_this.val() == 'interno') {
          $.each(data[0].personal_recibe, function (i, item) {
            $('#recibe').append($('<option>', {
              value: item.idtbl_usuarios,
              text : item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+' (Número Empleado '+item.numero_empleado+')'
            }));
          });
          
          $('.divContratistas').hide('slow');
          $('.divInternos').show('slow');
          $('#recibe').selectpicker('refresh');
        } else {
          $('#recibe').selectpicker('refresh');
          $('.divContratistas').show('slow');
          $('.divInternos').hide('slow');
        }        
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

  $(document).on('change', '#personal_curso', function(event) {
    event.preventDefault();
    var _this=$(this);
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea agregar al personal a la cuadrilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            var texto = $(this).find('option:selected').text();
            $("#seccion_personal").append("<label id='label_"+ $(this).val() +"'>" + texto + " <a type='button' class='delete_user' data-idusuario='"+ $(this).val() +"'><i class='fa fa-close fa-lg' style='color: red;'></i></a></label>")
            $("#personal_asignado").append("<input type='hidden' name='personal_cuadrilla[]' id='personal_"+ $(this).val() +"' value='" + $(this).val() + "'>");

        }
    });
  });

    $(document).on('click', '#confirmar_instructor', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajaxInstructor"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea registrar el instructor?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Curso/nuevoInstructor",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });

    $(document).on('click', '#confirmar_certificado', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajaxCertificado"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea registrar el certificado?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Curso/nuevoCertificado",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });

    $(document).on('click', '#confirmar_edit', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajaxEdit"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea editar la cuadrilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Almacen/editarCuadrilla",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });

    $(document).on('click', '.delete_user', function(event) {        
        event.preventDefault();
        var _this=$(this);
        //alert($(this).data('idusuario'));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea quitar de la cuadrilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                $("#label_"+$(this).data('idusuario')).remove();
                $("#personal_"+$(this).data('idusuario')).remove();
            }
    });
    });

    $(document).on('click', '.delete-user', function() {
    console.log("Envio 1");              
    Swal.fire({
        title: '¡Atención!',
        text: "¿Desea eliminar el usuario de la cuadrilla?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            //alert(this.id);
            $.ajax({
                url: "<?= base_url() ?>almacen/quitar_usuario_cuadrilla/",
                type: "post",
                dataType: "json",
                data: "id="+this.id,
                
                complete: function(res) {
                    var resp = JSON.parse(res.responseText);
                    if (resp.status) {
                        $('.ocultar').hide();
                        Swal.fire(
                            '¡Exitoso!',
                            resp.mensaje,
                            'success'
                        );                        
                            location.reload();                        
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
</script>