<section class="dashboard-counts no-padding-bottom botones">
  <div class="container-fluid">
    <div class="row">
      <!-- Item -->
      <?php if ($clase_pagina == 'justificaciones-material' && $this->session->userdata('tipo') == 18) { ?>
        <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/justificacion-material" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-violet">
                  <i class="fa fa-plus"></i>
                </div>
                <div class="title">
                  <span>Nueva<br>Justificación<br> de material</span>
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
      <!-- Item -->
    </div>
  </div>
</section>

<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Justificaciones de Material</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist"> 
          <li class="nav-item">
            <a class="nav-link btn active" id="pills-justificaciones-tab" data-toggle="pill" href="#pills-justificaciones" role="tab" aria-controls="pills-justificaciones" aria-selected="false">
              Justificaciones
            </a>
          </li>        
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-justificaciones" role="tabpanel" aria-labelledby="pills-justificaciones-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda7">
            </div>
            <div class="table-responsive">
              <table style="width: 100%" id="tbjustificaciones" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Fecha Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación Supervisor</th>
                    <th>Fecha Aprobación Supervisor</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>UID</th>
                    <th>Fecha Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación Supervisor</th>
                    <th>Fecha Aprobación Supervisor</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <!--<th width="120">
                      <select name="selectAC" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="SAC">Surtida</option>
                        <option value="SU AC">Aprobada por Alto Costo</option>
                        <option value="cancelada AC">Cancelada Alto Costo</option>
                        <option value="AC">Pendiente Aprobación Alto Costo</option>
                      </select>
                    </th>-->
                    <th>Progreso</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                </tbody>
              </table>
              <br>
              <div class="paginacion2">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
      
      
      mostrarDatos2("",1);
      

      

      

      

      

      $("input[name='busqueda2']").keyup(function() {
        textoBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(textoBuscar, 1);
      });

      

      

      $("body").on("click", ".paginacion2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda2']").val();
        mostrarDatos2(valorBuscar, valorHref);
      });
  });
  
    

    function mostrarDatos2(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarJustificaciones",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $.each(response.justificaciones, function(key, item) {
            
              if (item.estatus_justificacion == 'Supervisor') {
                var color = 'warning';
                var status = 'Pendiente';
                var percent = '50%';
              } else if(item.estatus_justificacion == 'Cancelada Supervisor') {
                var color = 'danger';
                var status = 'Cancelada';
                var percent = '0%';
              } else {
                var color = 'success';
                var status = 'Finalizado';
                var percent = '100%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid_justificacion + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.nombre_autor + "</td>";
              filas += "<td>" + item.nombre_supervisor + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_supervisor == null ? '----' : item.fecha_aprobacion_supervisor) + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-justificacion/" + item.uid_justificacion + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbjustificaciones tbody').html(filas);
            
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
          $(".paginacion2").html(paginador);
        }
      });
    }
  
</script>