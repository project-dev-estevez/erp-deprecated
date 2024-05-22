<?php if (isset($this->session->userdata('permisos')['empresas']) && $this->session->userdata('permisos')['empresas'] > 1) : ?>
    <section class="dashboard-counts no-padding-bottom botones">
        <div class="container-fluid">
            <div class="row">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                    <div class="bg-white has-shadow">
                        <a href="#nuevaEmpresaModal" data-toggle="modal">
                            <div class="item d-flex align-items-center pr-4 pl-4">
                                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                                <div class="title"><span>Nueva<br>Empresa</span>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </section>

<?php endif ?>

<section class="tables">
    <!--<div class="container-fluid">
      
        
          <div class="card">

            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Departamentos</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">   
                <table class="table table-striped table-sm" id="data-table">
                  <thead>
                    <tr>
                      <th>Cve Departamento</th>
                      <th>Departamento</th>
                      <th>Perfiles</th>
                      <th>Personal</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>CVE Dep</th>
                      <th>Departamento</th>
                      <th>Perfiles</th>
                      <th>Personal</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($departamentos as $key => $value) : ?>
                      <tr>
                        <td><?= $value->uid ?></td>
                        <td><a href="<?= base_url() ?>departamentos/departamento/<?= $value->uid ?>"><?= $value->departamento ?></a></td>
                        <td><?= ($value->perfiles != NULL) ? $value->perfiles . '.' : '<span class="text-warning">No existen perfiles dentro del departamento.</span>'; ?></td>
                        <td><?= $value->personal ?></td>
                      </tr>
                    <?php endforeach ?>                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        
      
    </div>-->
    <!-- nueva tabla-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h3 class="h4">Empresas</h3>
            </div>
            <div class="card-body">
                <div class="float-right">
                    <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
                </div>
                <a href="<?php echo base_url() ?>departamentos/excel-departamentos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
                <div class="table-responsive">
                    <table id="tbempresas" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Empresa</th>
                                <!--<th>Departamentos</th>
                                <th>Personal</th>-->
                            </tr>
                        </thead>
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
</section>

<div id="nuevaEmpresaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelDep" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?= form_open(base_url() . 'empresas/nuevo_establecimiento') ?>
            <div class="modal-header">
                <h4 id="exampleModalLabelDep" class="modal-title">Nueva Empresa</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Ingrese nombre de la nueva empresa</label>
                    <input type="text" placeholder="Empresa" required="required" minlength="4" maxlength="50" name="establecimiento" class="form-control capitalize">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div id="nuevoPerfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelPerfil" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <?= form_open(base_url() . 'departamentos/nuevo-perfil') ?>
            <div class="modal-header">
                <h4 id="exampleModalLabelPerfil" class="modal-title">Nuevo Perfil</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label>Seleccione Departamento</label>
                    <select name="departamento" class="form-control">
                        <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                        <?php foreach ($departamentos as $key => $value) : ?>
                            <option value="<?= $value->idtbl_departamentos ?>"><?= $value->departamento ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nombre de nuevo perfil</label>
                    <input type="text" placeholder="Perfil" name="perfil" class="form-control capitalize">
                </div>

            </div>
            <div class="modal-footer">
                <?= form_hidden('token', $token) ?>
                <?= form_hidden('from', 'departamentos') ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        mostrarDatos("", 1);
        $("input[name='busqueda']").keyup(function() {
            textoBuscar = $("input[name='busqueda']").val();
            mostrarDatos(textoBuscar, 1);
        });
        $("body").on("click", ".paginacion li a", function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busqueda']").val();
            mostrarDatos(valorBuscar, valorHref);
        });
    });

    function mostrarDatos(valorBuscar, pagina) {
        $.ajax({
            url: "<?= base_url() ?>Empresas/mostrarEstablecimientos",
            type: "POST",
            data: {
                buscar: valorBuscar,
                nropagina: pagina
            },
            dataType: "json",
            success: function(response) {
                filas = "";
                $.each(response.establecimientos, function(key, item) {
                    filas += "<tr><td>" + item.uid + "</td><td>" + "<a href='<?= base_url() ?>empresas/direcciones/"+ item.idctl_establecimiento + "'>" + item.establecimiento + "</a>" + "</td>" + "</tr>";
                });
                $('#tbempresas tbody').html(filas);
                linkSeleccionado = Number(pagina);
                //total registros
                totalRegistros = response.totalRegistros;

                //cantidad de registros por página
                cantidadRegistros = response.cantidad;

                numeroLinks = Math.ceil(totalRegistros / cantidadRegistros);
                /*paginador = "<ul class='pagination'>";
                for(var i = 1; i <= numeroLinks; i++) {
                  if(i == linkSeleccionado) 
                    paginador += "<li class='active page-item'><a class='page-link' href='javascript:void(0)'>"+i+"</a></li>";
                  else
                    paginador += "<li class='page-item'><a class='page-link' href='"+i+"'>"+i+"</a></li>";
                }
                paginador += "</ul>";*/
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
                $(".paginacion").html(paginador);
            }
        });
    }
</script>