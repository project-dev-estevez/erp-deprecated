<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de almacén</h3>
      </div>
      <div class="card-body">
        
          <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-salida-tab" data-toggle="pill" href="#pills-salida" role="tab" aria-controls="pills-salida" aria-selected="true">
                Almacen general
              </a>
            </li>                   
          </ul>
                 

        <div class="tab-content" id="pills-tabContent">
         

        
          <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaAsignadas">
          </div>
          <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-mis-solicitudesAG'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
          <?php }else{ ?>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-solicitudes'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
          <?php } ?>
          <div class="table-responsive">
            <table id="tbsolicitudesasignadas" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <th>Estatus</th>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>
                  <th>Aprobación PM</th>
                  <th>Fecha Aprobación PM</th>
                  <th>Aprobación CO</th>
                  <th>Fecha Aprobación CO</th>
                  <th>Aprobación AG</th>
                  <th>Fecha Aprobación AG</th>
                  <th>Recibe</th>
                  <th>Proyecto</th>
                  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
                    <th width="120">
                      <select name="selectAG" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="S">Surtida</option>
                        <option value="SU">Aprobada por AG</option>
                        <option value="cancelada AG">Cancelada AG</option>
                        <option value="AG">Pendiente Aprobación AG</option>
                      </select>
                    </th>
                  <?php } ?>
                  <?php if ($clase_pagina == 'solicitudes-almacen') { ?>
                    <th>Estatus</th>
                  <?php } ?>
                  <th>Progreso</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionAsignadas">
            </div>
          </div>
        </div>                                            
    </div>
  </div>

</div>
</section>

<script>
  $(document).ready(function() {
    <?php if ($clase_pagina != 'solicitudes-almacen') { ?>
      selectBuscar = "";
      //alert("diferente de solicitudes almacen");      
      mostrarSolicitudesAsignadas("",1,"");

      $("select[name='selectAsignadas']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesAsignadas('', 1, selectBuscar);
      });
                                                           
      $("input[name='busquedaAsignadas']").keyup(function() {
        textoBuscar = $("input[name='busquedaAsignadas']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesAsignadas(textoBuscar,1,selectBuscar);
      });
                                                           
      $("body").on("click", ".paginacionAsignadas li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaAsignadas']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesAsignadas(valorBuscar, valorHref, selectBuscar);
      });            
    <?php } ?>

  });
  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>                                
    function mostrarSolicitudesAsignadas(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesAsignadas",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesasignadas tbody').html("");
          $.each(response.solicitudesAsignadas, function(key, item) {
            //if (item.tipo_producto == 'Almacen General') {
              if (item.estatus_solicitud == 'S') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU') {
                var color = 'primary';
                var status = 'Aprobado por AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'SU A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'SU RCV A') {
                var color = 'primary';
                var status = 'Pendiente de entrega';
                var percent = '85%';
              } else if (item.estatus_solicitud == 'SRCV') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'AG') {
                var color = 'warning';
                var status = 'Pendiente Aprobación AG';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'CO PM' || item.estatus_solicitud == 'CO SH') {
                var color = 'warning';
                var status = 'Pendiente Aprobación CO';
                var percent = '50%';
              } else if (item.estatus_solicitud == 'cancelada CO') {
                var color = 'danger';
                var status = 'Cancelada CO';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada SH') {
                var color = 'danger';
                var status = 'Cancelada SH';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada AG') {
                var color = 'danger';
                var status = 'Cancelada AG';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'SH') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación SH';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_control_obra == null ? '----' : item.user_control_obra) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_co == null ? '----' : item.fecha_aprobacion_co) + "</td>";
              filas += "<td>" + (item.user_aprobacion_ag == null ? '----' : item.user_aprobacion_ag) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              if(item.estatus_solicitud == 'SU A'){
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/nueva-salida/" + item.uid_almacen_seleccionado + "/" + item.uid + "/" + item.uid_proyecto + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              }else{
                filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              }
              filas += "</tr>";
              $('#tbsolicitudesasignadas tbody').html(filas);
            //}
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
          $(".paginacionAsignadas").html(paginador);
        }
      });
    }      
  <?php } ?>
  
</script>