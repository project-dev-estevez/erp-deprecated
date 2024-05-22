
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevoCurso" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-green"><i class="fa fa-plus fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Curso</span>
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevoInstructor" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-blue"><i class="fa fa-user-plus fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Instructor</span>
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevoCertificado" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-red"><i class="fa fa-id-card-o fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Certificado</span>
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

                        <h4>Cursos</h4>

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
                            Cursos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" id="pills-instructores-tab" data-toggle="pill" href="#pills-instructores" role="tab" aria-controls="pills-instructores" aria-selected="false">
                            Instructores
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn" id="pills-reportes-tab" data-toggle="pill" href="#pills-reportes" role="tab" aria-controls="pills-reportes" aria-selected="false">
                            Reportes
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tabsContent">
                    <div class="tab-pane fade active show" id="pills-cursos" role="tabpanel" aria-labelledby="pills-cursos-tab">
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaCursos">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbcursos">
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
                            <div class="paginacionCursos">

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
                    <h4 class="modal-title" id="myModalLabel8">Curso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Curso/nuevoCurso', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                    <div class="modal-body">
                    
                    <div class="row">
                        <div class="col">
                            <label>Nombre del curso:</label>
                            <input type="text" class="form-control" name="nombre_curso" id="nombre_curso" placeholder="Nombre Curso" required>
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
                    <h4 class="modal-title" id="myModalLabel8">Curso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Curso/editarCurso', 'class="needs-validation" id="formuploadajaxEdit" novalidate'); ?>
                    <div class="modal-body">
                    
                    <div class="row">
                        <div class="col">
                            <label>Nombre del curso:</label>
                            <input type="text" class="form-control" name="nombre_cursoEdit" id="nombre_cursoEdit" placeholder="Nombre Curso" required>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                    <input type="hidden" name="id_cursoEdit" value="">
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
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Cursos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal-header -->
            <div class="modal-body">
                <div class="row">
                <div class="col-8">
                <div class="row">
                <div class="form-group col">
                    <label>Curso*</label>
                    <input type="text" name="nombre_curso" class="form-control" readonly>
                </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label>Tipo de certificado</label>
                    <select name="id" class="form-control">
                    <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                    <?php foreach ($certificados  as $key => $value) : ?>
                        <option value="<?php echo  $value->idtbl_certificados ?>"><?php echo  $value->nombre ?>
                        </option>
                    <?php endforeach ?>
                    </select>
                </div>
                <!--<div class="form-group col">
                    <label>Folio</label>
                    <input type="text" name="folio" value="" class="form-control" placeholder="" disabled="true">
                </div>-->
                <div class="form-group col">
                    <label>Horas de curso*</label>
                    <input type="number" name="duracion" value="" class="form-control" step="1" min="1" required="required">
                </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label>Fecha de Inicio*</label>
                    <input type="date" name="fecha_inicio" value="" class="form-control" placeholder="" required="required">
                </div>
                <div class="form-group col">
                    <label>Fecha de Termino*</label>
                    <input type="date" name="fecha_termino" value="" class="form-control" placeholder="" required="required">
                </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label class="control-label">Instructor*</label>
                    <select name="tutor" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <?php foreach($instructores AS $key => $value){ ?>
                        <?php if($value->nombres != NULL && $value->nombres != ''){ ?>
                            <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombres ?></option>
                            <?php }else{ ?>
                        <option value="<?= $value->idtbl_instructores ?>"><?= $value->nombre_usuario . ' ' . $value->apellido_paterno . ' ' . $value->apellido_materno ?></option>
                        <?php } ?>
                        <?php } ?>
                    </select>
                </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label class="control-label">Patron/Representante*</label>
                    <select name="patron_representante" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <option value="JORGE ESTEVEZ ABREU">JORGE ESTEVEZ ABREU</option>
                    <option value="GUSTAVO JUAREZ MENDOZA">GUSTAVO JUAREZ MENDOZA</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label class="control-label">Representante de Trabajadores*</label>
                    <select name="representante_trabajadores" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <option value="JESSICA CARINA CALLEJAS VAZQUEZ">JESSICA CARINA CALLEJAS VAZQUEZ</option>
                    </select>
                </div>
                </div>
                <div class="row">
                <div class="form-group col">
                    <label class="control-label">Tipo Agente*</label>
                    <select name="tipo_agente" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <option value="1">Interno</option>
                    <option value="2">Externo</option>
                    <option value="3">Otro</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label class="control-label">Modalidad*</label>
                    <select name="modalidad" class="form-control" required="required">
                    <option value="" disabled="" selected="">Seleccione...</option>
                    <option value="1">Presencial</option>
                    <option value="2">En línea</option>
                    <option value="3">Mixta</option>
                    </select>
                </div>
                
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
                <input type="hidden" name="id_curso" value="">
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
                <button type="button" id="confirmar_personalc" class="btn btn-primary">Guardar Certificado</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <script>
    $('#certificado').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    //console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='id_curso']").val(recipient.idcurso);
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
    });

    $('#editar_curso').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    //console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='id_cursoEdit']").val(recipient.idcurso);
    modal.find("input[name='nombre_cursoEdit']").val(recipient.nombrecurso);
    

    });

    $(document).ready(function(){

        mostrarDatosCursos("",1);
            $("input[name='busquedaCursos']").keyup(function() {
            textoBuscar = $("input[name='busquedaCursos']").val();
            mostrarDatosCursos(textoBuscar,1);
        });
        mostrarDatosInstructores("",1);
            $("input[name='busquedaInstructores']").keyup(function() {
            textoBuscar = $("input[name='busquedaInstructores']").val();
            mostrarDatosInstructores(textoBuscar,1);
        });

        $("body").on("click",".paginacionCursos li a",function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busquedaCursos']").val();
            mostrarDatosCursos(valorBuscar,valorHref); 
        });
        $("body").on("click",".paginacionInstructores li a",function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busquedaInstructores']").val();
            mostrarDatosInstructores(valorBuscar,valorHref); 
        });

    });

    function mostrarDatosCursos(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Curso/mostrarCursos",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbcursos tbody').html("");
          $.each(response.cursos, function(key, item) {
            
              filas += "<tr>";
              filas += "<td>" + item.nombre_curso + "</td>";
              filas += "<td>" +
                    "<a href='#certificado' data-toggle='modal' title='" + item.nombre_curso + "'" +
                    " data-idcurso='" + item.idtbl_cursos + "' data-nombrecurso='" + item.nombre_curso + "'><i class='fa fa-calendar-plus-o'></i></a>";
              filas +=
                    "<a href='#editar_curso' data-toggle='modal' title='" + item.nombre_curso + "'" +
                    " data-idcurso='" + item.idtbl_cursos + "' data-nombrecurso='" + item.nombre_curso + "'><i class='fa fa-edit'></i></a></td>";
              filas += "</tr>";
              $('#tbcursos tbody').html(filas);
            
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
          $(".paginacionCursos").html(paginador);
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
        text: "¿Desea registrar el curso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Curso/nuevoCurso",
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
        text: "¿Desea registrar el curso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Curso/nuevo_certificado",
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
        text: "¿Desea agregar al personal al curso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
            var texto = $(this).find('option:selected').text();
            $("#seccion_personal").append("<label id='label_"+ $(this).val() +"'>" + texto + " <a type='button' class='delete_user' data-idusuario='"+ $(this).val() +"'><i class='fa fa-close fa-lg' style='color: red;'></i></a></label>")
            $("#personal_asignado").append("<input type='hidden' name='personal_curso[]' id='personal_"+ $(this).val() +"' value='" + $(this).val() + "'>");

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
        text: "¿Desea editar el curso?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                
                $.ajax({
                    url: "<?= base_url() ?>Curso/editarCurso",
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
        text: "¿Desea quitar del curso al usuario?",
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
</script>