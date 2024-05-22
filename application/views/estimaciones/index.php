<!-- Modal -->
<div class="modal fade" id="editarSolicitudCompra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="cambiarProyecto">
          <div class="col">
            <label for="">Proyectos</label>
              <select name="proyecto" id="proyecto" class="selectpicker" required data-live-search="true">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                  <?php foreach ($proyectos as $key => $value): ?>
                    <option value="<?=$value->idtbl_proyectos?>"><?= substr($value->numero_proyecto."-".$value->nombre_proyecto,0,50) ?></option>
                  <?php endforeach; ?>
              </select>
          </div>
          <br>
          <div class="col">
            <textarea class="form-control" placeholder="Motivo de Cambio de Proyecto" name="nota_cambio_proyecto"></textarea>
          </div>
          <input type="hidden" name="uid">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="cambiarProyecto()" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>

<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">
      <!-- Item -->
      <div class="col-xl-4 col-md-5 col-sm-6">
        <div class="bg-white has-shadow">
        <a href="<?= base_url() ?>estimaciones/nuevo-pedido-estimacion" class="dropdown-item"title="">
        <div class="item d-flex align-items-center pr-4 pl-4">
          <div class="icon bg-blue"><i class="fa fa-plus"></i></div>
          <div class="title"><span>Orden de Compra</span>              
          </div>
        </div>
        </a>
        </div>
      </div><!-- Item -->
    </div>
  </div>
</section>


  <section class="tables dashboard-counts">
    <div class="container-fluid">
      <div class="card">
          <div class="card-header d-flex align-items-center">
              <h3 class="h4">Solicitudes de Estimación</h3>              
          </div>
          <div class="card-body">  
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>     
            <button onclick="window.location.href='<?php echo base_url() ?>compras/excel-solicitudes-compras'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbsolicitudes">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Limite</th>
                    <th>Creador</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Cambio</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Limite</th>
                    <th>Creador</th>
                    <th>Proyecto</th>
                    <th class="estatus">Estatus</th>
                    <th>Cambio</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                    <!--<?php if ($solicitudes): ?>
                    <?php foreach ($solicitudes as $key => $value): ?>
                      <?php $classEstatus = '';
                        if ($value->estatus_solicitud == 'aprobada') {
                          $classEstatus='success';
                        } elseif ($value->estatus_solicitud == 'cancelada') {
                          $classEstatus='danger';
                        } else {
                          $classEstatus='warning';
                        }
                      ?>
                        <tr class="table-<?= $classEstatus?>">
                            <td><?= $value->uid ?></td>
                            <td> <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_creacion)) ?></td>
                            <td> <?php echo strftime("%d de %b de %Y",strtotime($value->fecha_limite)) ?></td>
                            <td><?= $value->nombre ?></td>
                            <td title="<?= $value->nombre_proyecto ?>"><?= $value->numero_proyecto ?></td>
                            <?php if($value->estatus_solicitud == 'pendiente') { ?>
                            <td>pendiente</td>
                            <td>
                              <?php //echo ucfirst($value->estatus_solicitud); ?> 
                              <select class="btn_status" uid="<?= $value->uid ?>">
                                <option value="">-Selecione-</option>
                                <option value="creada" <?php echo ( $value->estatus_solicitud == 'pendiente' ) ? 'selected' : '' ?> >Pendiente</option>
                                <option value="aprobada" <?php echo ( $value->estatus_solicitud == 'aprobada' ) ? 'selected' : '' ?>>Aprobada</option>
                                <option value="cancelada" <?php echo ( $value->estatus_solicitud == 'cancelada' ) ? 'selected' : '' ?>>Cancelada</option>
                              </select>  
                            </td>
                            <?php } ?> 
                            <?php if($value->estatus_solicitud == 'aprobada') { ?>
                              
                              <td>Aprobada</td>
                              <td></td>
                            <?php } ?>
                            <?php if($value->estatus_solicitud == 'cancelada') { ?>
                              
                              <td>Cancelada</td>
                              <td></td>
                            <?php } ?>-->
                            <!-- Ocultar el campo -->
                            <!--<td align="center">
                            <?= ($value->comprado*100)/$value->cantidad ?>%
                            <div class="progress">
                              <div role="progressbar" style="width: <?= ($value->comprado*100)/$value->cantidad ?>%; height: 4px;" aria-valuemin="0" aria-valuemax="100" class="progress-bar
                              <?php
                              if(($value->comprado*100)/$value->cantidad<30)
                              echo 'bg-red';
                              if(($value->comprado*100)/$value->cantidad>30 && ($value->comprado*100)/$value->cantidad<70 )                        
                              echo 'bg-orange';
                              else
                              echo 'bg-green';
                              ?>
                              
                              "></div>
                            </div>
                            </td>
                            <td align="center">
                              <a href="<?= base_url() ?>compras/detalle-solicitud/<?= $value->uid ?>" title="Detalle">
                                <i class="fa fa-info-circle <?= $value->color ?>"></i>
                              </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php endif ?>-->
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
<script>
/*$(document).ready(function() {
  $(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", this.value)
        if ( this.value == '' ) {
            console.log('Error null');
            return;
        } 
        if ( this.value == 'cancelada' )
          $url = "<?= base_url()?>compras/cancelar_solicitud";
        if ( this.value == 'creada' )
          $url = "<?= base_url()?>compras/creada_solicitud";
        if ( this.value == 'aprobada' )
          $url = "<?= base_url()?>compras/aprobar_solicitud";


          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", $(this).attr('uid') );
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: $url,
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>compras");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
     
  });
});*/  

</script>
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
      url: "<?= base_url() ?>estimaciones/mostrarEstimacionesComprasIndex",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        clase2 = "";
        $.each(response.solicitudes,function(key,item) {
          if (item.estatus_solicitud == 'aprobada') {
            clase = 'success';
          } 
          else if (item.estatus_solicitud == 'cancelada') {
            clase = 'danger';
          } 
          else {
            clase = 'warning';
          }

          if(((item.comprado*100)/item.cantidad<30)) {
            clase2 = 'bg-red';
          }
          else if(((item.comprado*100)/item.cantidad>30) && ((item.comprado*100)/item.cantidad<70)) {                        
            clase2 = 'bg-orange';
          }
          else {
            clase2 = 'bg-green';
          }

          filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.nombre + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";

          if(item.estatus_solicitud == 'pendiente') {
            filas += "<td>pendiente</td>" + "<td><select onchange='actualizar(this.value,\"" + item.uid + "\")' class='btn_status form-control' uid='" + item.uid + "'><option value=''>-Selecione-</option><option value='creada'" + (item.estatus_solicitud == 'pendiente' ? 'selected' : '') + ">Pendiente</option><option value='aprobada'" + (item.estatus_solicitud == 'aprobada' ? 'selected' : '') + ">Aprobada</option><option value='cancelada'" + (item.estatus_solicitud == 'cancelada' ? 'selected' : '') + ">Cancelada</option></select></td>";
          }
          else if(item.estatus_solicitud == 'aprobada') {                                      
            filas += "<td>Aprobada</td><td></td>";
          }
          else if(item.estatus_solicitud == 'cancelada') {
            filas += "<td>Cancelada</td><td></td>";
          }
          else if(item.estatus_solicitud == 'modificada') {                                      
            filas += "<td>Modificada</td><td></td>";
          }

          filas += "<td align='center'>" + ((item.comprado*100)/item.cantidad) + "%" + "<div class='progress'><div role='progressbar' style='width:" + ((item.comprado*100)/item.cantidad) + "%; height: 4px;' aria-valuemin='0' aria-valuemax='100' class='progress-bar " + clase2 + "'></div></div></td>" + "<td align='center'><a href='" + "<?= base_url() ?>estimaciones/detalle-solicitud/" + item.uid + "' title='Detalle'><i class='fa fa-info-circle " +  item.color + "'></i></a><a href='#editarSolicitudCompra' data-toggle='modal' data-nota_cambio_proyecto='" + item.nota_cambio_proyecto + "' data-uid='" + item.uid + "'><i class='fa fa-edit'></a></td>";
          filas += "</tr>";

          console.log(item.comprado, item.cantidad, (item.comprado*100)/item.cantidad);
        });
        $('#tbsolicitudes tbody').html(filas);
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

  function actualizar(valor,uid) {
    //$(".btn_status").on('change', function() {
        // console.log("select::", $(this).attr('uid'))
        console.log("this.value::", valor)
        console.log("uid:", uid);
        if ( valor == '' ) {
            console.log('Error null');
            return;
        } 
        if ( valor == 'cancelada' )
          $url = "<?= base_url()?>estimaciones/cancelar-solicitud";
        if ( valor == 'creada' )
          $url = "<?= base_url()?>estimaciones/creada-solicitud";
        if ( valor == 'aprobada' )
          $url = "<?= base_url()?>estimaciones/aprobar-solicitud";


          var formData = new FormData();
          formData.append("token", "<?=$this->session->userdata('token');?>");
          formData.append("uid", uid );
          $data = formData;
          // console.log(formData); return;
            $.ajax({
                url: $url,
                type: "post",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                complete: function(res) {
                    console.log("res1 ",res)
                    var resp = JSON.parse(res.responseText);
                    // console.log("res2 ",res)
                    if (resp.error==false) {
                        window.location.replace("<?= base_url()?>estimaciones");
                    } else {
                        Toast.fire({
                            type: 'error',
                            title: resp.mensaje
                        });
                    }
                }
            });
     
  //});
  }
  $('#editarSolicitudCompra').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data() // Extract info from data-* attributes
  console.log(recipient)
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find("input[name='uid']").val(recipient.uid);
  modal.find("textarea[name='nota_cambio_proyecto']").val(recipient.nota_cambio_proyecto);
  });
  function cambiarProyecto() {
    if($("textarea[name='nota_cambio_proyecto']").val() == "") {
      Toast.fire({
          type: 'error',
          title: 'Es necesario agregar un motivo de cancelación'
      });
      return;
    }
    formData = new FormData($("#cambiarProyecto")[0]);
    Swal.fire({
    title: 'Cambiar proyecto?',
    text: "Deseas cambiar el proyecto !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url()?>estimaciones/cambiarProyecto",
          type: "post",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(res) {
            if (res=="OK") { 
              Toast.fire({
                type: 'success',
                title: 'El proyecto ha sido actualizado correctamente'
              });
              mostrarDatos("",1);
              return;    
            } 
            if(res=="ERROR") {
              Toast.fire({
                  type: 'error',
                  title: 'Error al cambiar el proyecto'
              });
            }
          }
        });
      }
    })
  }
</script>