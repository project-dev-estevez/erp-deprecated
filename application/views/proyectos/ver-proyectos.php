<?php if ($tipo_perimiso > 1): ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="#nuevoProyectoModal" data-toggle="modal">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title"><span>Nuevo<br>Proyecto</span>              
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Todos los Proyectos</h3>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">          
        </div>
        <?php if($this->session->userdata('tipo')==6) {?>
          <a href="<?php echo base_url() ?>proyectos/excel-proyectos-completo" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <?php }else{ ?>
        <a href="<?php echo base_url() ?>proyectos/excel-proyectos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <?php } ?>
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbproyectos">
            <thead>
              <tr>
                <th>Número Proyecto</th>
                <th>Nombre</th>
                <?php if ($this->session->userdata('tipo') == 6): ?>
                  <th>Fecha Creación</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Termino</th>
                <?php endif; ?>
                <th>Ubicación</th>
                <?php if ($this->session->userdata('tipo') == 6): ?>
                  <th>Cliente</th>
                  <th>Acciones</th>
                <?php endif; ?>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Número Proyecto</th>
                <th>Nombre</th>
                <?php if ($this->session->userdata('tipo') == 6): ?>
                  <th>Fecha Creación</th>
                  <th>Fecha Inicio</th>
                  <th>Fecha Termino</th>
                <?php endif; ?>
                <th>Ubicación</th>
                <?php if ($this->session->userdata('tipo') == 6): ?>
                  <th>Cliente</th>
                  <th>Acciones</th>
                <?php endif; ?>
              </tr>
            </tfoot>
            <tbody>
              <!--<?php if ($proyectos): ?>
                <?php foreach ($proyectos as $key => $value): ?>
                  <?php $url = ($tipo_perimiso > 1 && $this->session->userdata('tipo') == 6)? base_url().'proyectos/detalle/'.$value->uid : base_url().'proyectos/movimientos/'.$value->uid; ?>
                  <tr>
                    <td>
                      <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                        <?= $value->numero_proyecto ?>
                      </a>
                    </td>
                    <td>
                      <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                        <?= $value->nombre_proyecto ?>
                      </a>
                    </td>
                    <?php if ($this->session->userdata('tipo') == 6): ?>
                      <td>
                        <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                          <?= strftime("%d de %b de %Y",strtotime($value->fecha_creacion)) ?>
                        </a>
                      </td>
                      <td>
                        <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                          <?= ($value->fecha_inicio!=NULL) ? strftime("%d de %b de %Y",strtotime($value->fecha_inicio)) : '' ?>
                        </a>
                      </td>
                      <td>
                        <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                          <?= ($value->fecha_termino!=NULL) ? strftime("%d de %b de %Y",strtotime($value->fecha_termino)) : ''  ?>
                        </a>
                      </td>
                    <?php endif; ?>
                    <td>
                      <a href="<?= $url ?>" title="<?=$value->nombre_proyecto ?>">
                        <?= $value->direccion ?></a></td>
                    <?php if ($this->session->userdata('tipo') == 6): ?>
                      <td>
                        <a href="<?php echo base_url().'clientes/detalle/'.$value->uid_cliente ?>">
                          <?=$value->razon_social ?>
                        </a>
                      </td>
                    <?php endif; ?>
                  </tr>
                <?php endforeach; ?>     
              <?php endif; ?>-->   
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
<?php if ($tipo_perimiso > 1): ?>
  <div id="nuevoProyectoModal" tabindex="-1" role="dialog" aria-labelledby="modalLabelProyecto" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        <?= form_open(base_url().'proyectos/nuevo_proyecto') ?>
        <div class="modal-header">
          <h4 id="modalLabelProyecto" class="modal-title">Nuevo Proyecto</h4>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Seleccione Cliente*</label>
            <select name="cliente" class="form-control" required>
              <option value="" disabled="disabled" selected="selected">Seleccione...</option>
              <?php foreach ($clientes as $key => $value): ?>
              <option value="<?= $value->idtbl_clientes ?>"><?= $value->razon_social ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">       
            <label>Nombre de nuevo proyecto*</label>
            <input type="text" placeholder="Proyecto" name="proyecto" required class="form-control capitalize">
          </div>
          <div class="form-group">       
            <label>Número de nuevo proyecto*</label>
            <input type="text" placeholder="Número" name="numero" required class="form-control">
          </div>
          <div class="form-group">       
            <label>Ubicación*</label>
            <textarea name="ubicacion" class="form-control"></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <?= form_hidden('token',$token) ?>
          <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <?=form_close()?>
      </div>
    </div>
  </div>
<?php endif; ?>
<script>
  $(document).ready(function(){
    mostrarDatos("",1);
    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
    });
  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Proyectos/mostrarProyectos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.proyectos,function(key,item) {
          if (item.estatus == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
          <?php if($tipo_perimiso > 1 && $this->session->userdata('tipo') == 6) { ?>
            var url = "<?= base_url() ?>" + 'proyectos/detalle/' + item.uid;
          <?php }else { ?>
            var url = "<?= base_url() ?>" + 'proyectos/movimientos/' + item.uid;
          <?php } ?>
          filas += "<tr><td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</a></td><td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.nombre_proyecto + "</a></td>";
          <?php if ($this->session->userdata('tipo') == 6) { ?>
            filas += "<td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.fecha_creacion + "</a></td><td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.fecha_inicio + "</a></td><td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.fecha_termino + "</a></td>";
          <?php } ?>
          filas += "<td><a href='" + url + "' title='" + item.nombre_proyecto + "'>" + item.direccion + "</a></td>"; 
          <?php if ($this->session->userdata('tipo') == 6) { ?>
            filas += "<td><a href='" + "<?= base_url() ?>" + "clientes/detalle/" + item.uid_cliente + "'>" + item.razon_social + "</a></td>";
            filas += "<td>" + "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" + item.uid + "' onchange='changeStatusProject(this.value,\"" + item.uid + "\")' " + check + "><label class='custom-control-label' for='" + item.uid + "'></label></div>" + "</td></tr>";
          <?php } ?>
          filas += "</tr>";
        });
        $('#tbproyectos tbody').html(filas);
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
        $(".paginacion").html(paginador);
      }
    });
  }
</script>

<script>
function changeStatusProject(valor, uid) {
    if (document.getElementById(uid).checked == true) {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea activar el proyecto?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>proyectos/activar-proyecto",
                    type: "post",
                    data: "uid=" + uid,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>proyectos";
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = false;
            }
        });
    } else {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea desactivar el proyecto?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>proyectos/desactivar-proyecto",
                    type: "post",
                    data: {
                        uid: uid
                    },
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>proyectos";
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = true;
            }
        });
    }

}
</script>
