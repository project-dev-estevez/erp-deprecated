<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">
      <!-- Item -->
      <div class="col-xl-3 col-sm-6">
        <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>compras/nueva-solicitud-compra" class="dropdown-item" title="">
            <div class="item d-flex align-items-center pr-4 pl-4">
              <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
              <div class="title"><span>Nueva<br>Solicitud</span>              
              </div>
            </div>
          </a>
        </div>
      </div>
      <!-- Item -->
    </div>
  </div>
</section>
<section class="tables">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes</h3>
      </div>
     
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <a href="<?php echo base_url() ?>compras/excel-solicitud-compras" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbsolicitudescompras">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Limite</th>
                <th>Proyecto</th>
                <th>Estatus</th>
                <?php if($this->session->userdata('tipo') == 3){ ?>
                <th>Aprobación CV1</th>
                <th>Fecha Aprobación CV1</th>
                <th>Aprobación CV2</th>
                <th>Fecha Aprobación CV2</th>
                <?php } else if($this->session->userdata('tipo') == 10){?>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <?php } else if($this->session->userdata('tipo') == 1){ ?>
                <th>Aprobación AC</th>
                <th>Fecha Aprobación AC</th>
                <?php } ?>
                <th></th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Limite</th>
                <th>Proyecto</th>
                <th class="estatus">Estatus</th>
                <?php if($this->session->userdata('tipo') == 3){ ?>
                <th>Aprobación CV1</th>
                <th>Fecha Aprobación CV1</th>
                <th>Aprobación CV2</th>
                <th>Fecha Aprobación CV2</th>
                <?php } else if($this->session->userdata('tipo') == 10){?>
                <th>Aprobación AG</th>
                <th>Fecha Aprobación AG</th>
                <?php } else if($this->session->userdata('tipo') == 1){ ?>
                <th>Aprobación AC</th>
                <th>Fecha Aprobación AC</th>
                <?php } ?>
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
                  ?>-->
                  <!-- class="table-<?= $classEstatus?>" -->
                  <!--<tr class="table-<?= $classEstatus ?>">
                    <td><?= $value->uid ?></td>
                    <td> <?php echo strftime("%d de %b de %Y a las %r",strtotime($value->fecha_creacion)) ?></td>
                    <td> <?php echo strftime("%d de %b de %Y",strtotime($value->fecha_limite)) ?></td>
                    <td title="<?= $value->nombre_proyecto ?>"><?= $value->numero_proyecto ?></td>
                    <td style="font-weight: bold;"><?= ucfirst($value->estatus_solicitud) ?></td>
                    <td align="center">
                      <a href="<?= base_url() ?>compras/detalle-solicitud/<?= $value->uid ?>" title="Detalles">
                        <i class="fa fa-info-circle text-<?= $classEstatus?>"></i>
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
      url: "<?= base_url() ?>Compras/mostrarSolicitudesCompras",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        clase = "";
        filas = "";
        $.each(response.solicitudesCompras,function(key,item) {
          switch(item.estatus_solicitud) {
            case 'aprobada':
              clase = 'success';
              break;
            case 'cancelada':
              clase = 'danger';
              break;
            default :
              clase = 'warning';
              break;
          }
          <?php if($this->session->userdata('tipo') == 3){ ?>
            filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.numero_proyecto + "</td><td>" + item.estatus_solicitud + "</td><td>" + (item.tbl_users_cv1 == null ? "---" : item.tbl_users_cv1) + "</td><td>" + (item.tbl_users_fecha_aprobacion_cv1 == null ? "---" : item.tbl_users_fecha_aprobacion_cv1) + "</td><td>" + (item.tbl_users_cv2 == null ? "---" : item.tbl_users_cv2) + "</td><td>" + (item.tbl_users_fecha_aprobacion_cv2 == null ? "---" : item.tbl_users_fecha_aprobacion_cv2) + "</td><td><center><a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle text-" + clase + "'></i></a></center></td></tr>";
          <?php } else if($this->session->userdata('tipo') == 10){ ?>
            filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.numero_proyecto + "</td><td>" + item.estatus_solicitud + "</td><td>" + (item.tbl_users_ag == null ? "---" : item.tbl_users_ag) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ag == null ? "---" : item.tbl_users_fecha_users_aprobacion_ag) + "</td><td><center><a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle text-" + clase + "'></i></a></center></td></tr>";
          <?php } else if($this->session->userdata('tipo') == 1){ ?>
            filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.numero_proyecto + "</td><td>" + item.estatus_solicitud + "</td><td>" + (item.tbl_users_ac == null ? "---" : item.tbl_users_ac) + "</td><td>" + (item.tbl_users_fecha_users_aprobacion_ac == null ? "---" : item.tbl_users_fecha_users_aprobacion_ac) + "</td><td><center><a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle text-" + clase + "'></i></a></center></td></tr>";
          <?php }else{ ?>
            filas += "<tr class='table-" + clase + "'><td>" + item.uid + "</td><td>" + item.fecha_creacion + "</td><td>" + item.fecha_limite + "</td><td>" + item.numero_proyecto + "</td><td>" + item.estatus_solicitud + "</td><td><center><a href='" + "<?= base_url() ?>compras/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle text-" + clase + "'></i></a></center></td></tr>";
          <?php } ?>
        });
        $('#tbsolicitudescompras tbody').html(filas);
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