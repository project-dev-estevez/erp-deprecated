<?php if($estado == 'TIJUANA'){ ?>
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
                Cluster - Tecate
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="natura-tab" data-toggle="tab" href="#natura" role="tab" aria-controls="natura" aria-selected="true">
                Cluster - Natura
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="b2-tab" data-toggle="tab" href="#b2" role="tab" aria-controls="b2" aria-selected="true">
                Core B2.2
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="magistral-tab" data-toggle="tab" href="#magistral" role="tab" aria-controls="magistral" aria-selected="true">
                Cluster - Magistral 1
              </a>
            </li>
          </ul>
                 

        <div class="tab-content" id="pills-tabContent">
         

        
          <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaTecate">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudestecate" class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
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
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionTecate">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="natura" role="tabpanel" aria-labelledby="natura-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaNatura">
          </div>          
          <div class="table-responsive">
            <table id="tbsolicitudesnatura" class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
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
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionNatura">
            </div>
          </div>
        </div>   

        <div class="tab-pane fade" id="b2" role="tabpanel" aria-labelledby="b2-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaB2">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudesb2" class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
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
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionB2">
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="magistral" role="tabpanel" aria-labelledby="magistral-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaMagistral">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudesmagistral" class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
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
                    <th>Aprobación CO</th>
                    <th>Fecha Aprobación CO</th>
                    <th>Aprobación AG</th>
                    <th>Fecha Aprobación AG</th>
                    <th>Entrega</th>
                    <th>Proyecto</th>
                    <th>Estatus</th>
                    <th>Progreso</th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
               
              </tbody>
            </table>
            <br>
            <div class="paginacionMagistral">
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
      mostrarSolicitudesTecate("",1,"");
      mostrarSolicitudesNatura("",1,"");
      mostrarSolicitudesB2("",1,"");
      mostrarSolicitudesMagistral("",1,"");

      $("select[name='selectTecate']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesTecate('', 1, selectBuscar);
      });
      $("select[name='selectNatura']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesNatura('', 1, selectBuscar);
      });
      $("select[name='selectB2']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesB2('', 1, selectBuscar);
      });
      $("select[name='selectMagistral']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesMagistral('', 1, selectBuscar);
      });
                                                           
      $("input[name='busquedaTecate']").keyup(function() {
        textoBuscar = $("input[name='busquedaTecate']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTecate(textoBuscar,1,selectBuscar);
      });
      $("input[name='busquedaNatura']").keyup(function() {
        textoBuscar = $("input[name='busquedaNatura']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesNatura(textoBuscar,1,selectBuscar);
      });
      $("input[name='busquedaB2']").keyup(function() {
        textoBuscar = $("input[name='busquedaB2']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesB2(textoBuscar,1,selectBuscar);
      });
      $("input[name='busquedaMagistral']").keyup(function() {
        textoBuscar = $("input[name='busquedaMagistral']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesMagistral(textoBuscar,1,selectBuscar);
      });
                                                           
      $("body").on("click", ".paginacionTecate li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaTecate']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesTecate(valorBuscar, valorHref, selectBuscar);
      });
      $("body").on("click", ".paginacionNatura li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaNatura']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesNatura(valorBuscar, valorHref, selectBuscar);
      }); 
      $("body").on("click", ".paginacionB2 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaB2']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesB2(valorBuscar, valorHref, selectBuscar);
      });
      $("body").on("click", ".paginacionMagistral li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaMagistral']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesMagistral(valorBuscar, valorHref, selectBuscar);
      }); 
    <?php } ?>

  });
  <?php if ($clase_pagina != 'solicitudes-almacen') { ?>                                
    function mostrarSolicitudesTecate(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTecate",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudestecate tbody').html("");
          $.each(response.solicitudesTecate, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudestecate tbody').html(filas);
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
          $(".paginacionTecate").html(paginador);
        }
      });
    }

    function mostrarSolicitudesNatura(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionNatura",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesnatura tbody').html("");
          $.each(response.solicitudesNatura, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesnatura tbody').html(filas);
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
          $(".paginacionNatura").html(paginador);
        }
      });
    }      

    function mostrarSolicitudesB2(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionB2",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesb2 tbody').html("");
          $.each(response.solicitudesB2, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesb2 tbody').html(filas);
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
          $(".paginacionB2").html(paginador);
        }
      });
    }

    function mostrarSolicitudesMagistral(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionMagistral",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesmagistral tbody').html("");
          $.each(response.solicitudesMagistral, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesmagistral tbody').html(filas);
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
          $(".paginacionMagistral").html(paginador);
        }
      });
    }     
  <?php } ?>
  
</script>

<?php }elseif($estado == 'TUXPAN'){ ?>
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
                Cluster - Centro
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn" id="ilustres-tab" data-toggle="tab" href="#ilustres" role="tab" aria-controls="ilustres" aria-selected="true">
                Cluster - Hombres Ilustres
              </a>
            </li>            
          </ul>
                 

        <div class="tab-content" id="pills-tabContent">
         

        
          <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaCentro">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudescentro" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>                  
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
            <div class="paginacionCentro">
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="ilustres" role="tabpanel" aria-labelledby="ilustres-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaIlustres">
          </div>          
          <div class="table-responsive">
            <table id="tbsolicitudesilustres" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>                
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
            <div class="paginacionIlustres">
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
      mostrarSolicitudesCentro("",1,"");
      mostrarSolicitudesIlustres("",1,"");          

      $("select[name='selectCentro']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesCentro('', 1, selectBuscar);
      });
      $("select[name='selectIlustres']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesIlustres('', 1, selectBuscar);
      });    
                                                           
      $("input[name='busquedaCentro']").keyup(function() {
        textoBuscar = $("input[name='busquedaCentro']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesCentro(textoBuscar,1,selectBuscar);
      });
      $("input[name='busquedaIlustres']").keyup(function() {
        textoBuscar = $("input[name='busquedaIlustres']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesIlustres(textoBuscar,1,selectBuscar);
      });      
                                                           
      $("body").on("click", ".paginacionCentro li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaCentro']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesCentro(valorBuscar, valorHref, selectBuscar);
      });
      $("body").on("click", ".paginacionIlustres li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaIlustres']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesIlustres(valorBuscar, valorHref, selectBuscar);
      });       
    <?php } ?>

  });

    function mostrarSolicitudesCentro(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionCentro",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudescentro tbody').html("");
          $.each(response.solicitudesCentro, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudescentro tbody').html(filas);
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
          $(".paginacionCentro").html(paginador);
        }
      });
    }

    function mostrarSolicitudesIlustres(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionIlustres",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesilustres tbody').html("");
          $.each(response.solicitudesIlustres, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesilustres tbody').html(filas);
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
          $(".paginacionIlustres").html(paginador);
        }
      });
    }      
     
  
</script>

<?php }elseif($estado == 'MONCLOVA'){ ?>
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
                CLUSTER ACEREROS ACR-1
              </a>
            </li>                     
          </ul>
                 

        <div class="tab-content" id="pills-tabContent">
         

        
          <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaAcereros">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudesacereros" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>                
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
            <div class="paginacionAcereros">
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
      mostrarSolicitudesAcereros("",1,"");      

      $("select[name='selectAcereros']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesAcereros('', 1, selectBuscar);
      });        
                                                           
      $("input[name='busquedaAcereros']").keyup(function() {
        textoBuscar = $("input[name='busquedaAcereros']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesAcereros(textoBuscar,1,selectBuscar);
      });         
                                                           
      $("body").on("click", ".paginacionAcereros li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaAcereros']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesAcereros(valorBuscar, valorHref, selectBuscar);
      });      
    <?php } ?>

  });

    function mostrarSolicitudesAcereros(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionAcereros",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesacereros tbody').html("");
          $.each(response.solicitudesAcereros, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesacereros tbody').html(filas);
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
          $(".paginacionAcereros").html(paginador);
        }
      });
    }    
     
  
</script>


<?php }elseif($estado == 'JALISCO'){ ?>
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
                86.02-05
              </a>
            </li>                     
          </ul>
                 

        <div class="tab-content" id="pills-tabContent">
         

        
          <div class="tab-pane fade show active" id="pills-salida" role="tabpanel" aria-labelledby="pills-salida-tab">
          <!---->
          <div class="float-right">
            <input type="text" class="form-control" placeholder="Buscar" name="busquedaJalisco">
          </div>         
          <div class="table-responsive">
            <table id="tbsolicitudesjalisco" class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>                
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
            <div class="paginacionJalisco">
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
      mostrarSolicitudesJalisco("",1,"");      

      $("select[name='selectJalisco']").on('change', function() {
        //selectBuscar = $("select[name='selectKuali']").val();
        selectBuscar = $(this).val();
        mostrarSolicitudesJalisco('', 1, selectBuscar);
      });        
                                                           
      $("input[name='busquedaJalisco']").keyup(function() {
        textoBuscar = $("input[name='busquedaJalisco']").val();
        //textoBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesJalisco(textoBuscar,1,selectBuscar);
      });         
                                                           
      $("body").on("click", ".paginacionJalisco li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busquedaJalisco']").val();
        //valorBuscar2 = $("select[name='selectKuali']").val();
        mostrarSolicitudesJalisco(valorBuscar, valorHref, selectBuscar);
      });      
    <?php } ?>

  });

    function mostrarSolicitudesJalisco(valorBuscar, pagina, valorBuscar2) {
      $.ajax({
        url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionJalisco",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina,
          buscar2: valorBuscar2
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbsolicitudesjalisco tbody').html("");
          $.each(response.solicitudesJalisco, function(key, item) {
            switch (item['estatus_solicitud']) {
            case 'C.O':
              clase = 'secondary';
              estatus = 'pendiente aprobación C.O';
              porcentaje = '33';
              break;
            case 'A.G':
              clase = 'warning';
              estatus = 'pendiente entrega A.G';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por A.G';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada A.G':
              clase = 'danger';
              estatus = 'cancelada A.G';
              porcentaje = '0';
              break;
            case 'cancelada C.O':
              clase = 'danger';
              estatus = 'Cancelada C.O';
              porcentaje = '0';
              break;
            default:
              clase = 'secondary';
              estatus = 'contactar administrador';
              porcentaje = '33.33';
              break;
          }
          filas += '<tr class="table-' + clase + '">';
          filas += '<td>' + item['uid'] + '</td>';
          filas += '<td>' + item['fecha_creacion'] + '</td>';
          filas += '<td>' + item['user_autor'] + '</td>';          
          filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
          filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          } else {*/
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          /*}*/
          filas += '</td>';
          filas += '</tr>';
              $('#tbsolicitudesjalisco tbody').html(filas);
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
          $(".paginacionJalisco").html(paginador);
        }
      });
    }    
     
  
</script>
<?php } ?>

<?php if($this->session->userdata('id') == 192){ ?>
<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de almacén</h3>
      </div>
      <div class="card-body">
        
      <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            
                            <?php foreach($clientes_generadores AS $key => $value){ ?>
                                <?php if($value->nombre_comercial == 'MEGACABLE CONST'){ ?>
                            <li class="nav-item">
                                <a class="nav-link btn <?= $key == 0 ? '' : '' ?>" id="<?= $value->nombre_comercial ?>-tab" data-toggle="tab" href="#<?= $value->nombre_comercial ?>"
                                    role="tab" aria-controls="<?= $value->nombre_comercial ?>" aria-selected="true">
                                    <?= $value->nombre_comercial ?>
                                </a>
                            </li>
                            <?php } ?>
                            <?php } ?>
                        </ul>
                            <div class="tab-content" id="pills-tabContent">
                            <?php $cliente = ''; ?>
                                <?php foreach($clientes_generadores AS $key => $value){ ?>
                                    <?php $index_cliente = 0; ?>
                                    <?php $cliente = $value->nombre_comercial; ?>
                                    <div class="tab-pane fade <?= $key == 0 ? 'active' : '' ?>" id="<?= $value->nombre_comercial ?>" role="tabpanel"
                                    aria-labelledby="<?= $value->nombre_comercial ?>-tab">
                                    <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                        <?php foreach($almacenes_clientes AS $key2 => $value2){ ?>
                                            <?php if($value2->nombre_comercial == $cliente){ ?>
                                            <li class="nav-item">
                                                <a class="nav-link btn " id="<?= $value2->numero_proyecto ?>-tab" data-toggle="tab" href="#<?= $value2->numero_proyecto ?>"
                                                    role="tab" aria-controls="<?= $value2->numero_proyecto ?>" aria-selected="true">
                                                    <?= $value2->numero_proyecto ?>
                                                </a>
                                            </li>
                                            <?php $index_cliente++; ?>
                                            <?php } ?>                                            
                                        <?php } ?>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                            <?php $proyecto = ''; ?>
                            
                        <?php foreach($almacenes_clientes AS $key => $value){ ?>
                                
                                    <?php $index_segmento = 0; ?>
                                    <?php $index_cluster = 0; ?>
                                    <?php $proyecto = $value->tbl_proyectos_idtbl_proyectos; ?>
                                    <?php if($value->nombre_comercial == $cliente){ ?>
                            <div class="tab-pane fade show " id="<?= $value->numero_proyecto ?>" role="tabpanel"
                                aria-labelledby="<?= $value->numero_proyecto ?>-tab">
                                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                                <?php foreach($segmentos_clientes AS $key2 => $value2){ ?>
                                <?php if($value2->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <li class="nav-item">
                                        <a class="nav-link btn <?= $index_segmento == 0 ? 'active' : '' ?>" id="<?= $value2->idtbl_segmentos_proyecto ?>-tab" data-toggle="pill"
                                            href="#<?= $value2->idtbl_segmentos_proyecto ?>" role="tab" aria-controls="<?= $value2->idtbl_segmentos_proyecto ?>"
                                            aria-selected="true">
                                            <?= $value2->segmento ?>
                                        </a>
                                    </li>
                                    <?php $index_segmento++; ?>
                                    <?php } ?>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                <?php foreach($segmentos_clientes AS $key3 => $value3){ ?>
                                <?php if($value3->tbl_proyectos_idtbl_proyectos == $proyecto){ ?>
                                    <div class="tab-pane fade <?= $index_cluster == 0 ? 'show active' : '' ?>" id="<?= $value3->idtbl_segmentos_proyecto ?>" role="tabpanel"
                                        aria-labelledby="pills-<?= $value3->idtbl_segmentos_proyecto ?>-tab">
                                        <div class="float-right">
                                            <input type="text" class="form-control" placeholder="Buscar"
                                                name="busqueda<?= $value3->idtbl_segmentos_proyecto ?>">
                                        </div>
                                        <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
                                        <button
                                            onclick="window.location.href='<?php echo base_url() ?>almacen/pdf_generador/tecate'"
                                            class="btn btn-secondary buttons-excel buttons-html5 btn-danger"
                                            tabindex="0" aria-controls="data-table"><span><i
                                                    class="fa fa-file-pdf-o"></i> Exportar a PDF</span></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-sm table-hover" id="tbsolicitudesalmacenes<?= $value3->idtbl_segmentos_proyecto ?>">
                                            <thead>
                                            <tr>
                  <th>UID</th>
                  <th>Creación</th>
                  <th>Creado por</th>                
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
                                            </tfoot>
                                                <tbody>

                                                </tbody>

                                            </table>
                                            <br>
                                            <div class="paginacionalmacenes<?= $value3->idtbl_segmentos_proyecto ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <?php $index_cluster++; ?>
                                    <?php } ?>
                                    <?php } ?>                                                                                                                            
                                </div>
                            </div>   
                            <?php } ?>
                            <?php } ?>
                        </div>
                                    </div>
                                    
                                <?php } ?>                                
                            </div>

      </div>
    </div>
  </div>
</section>

<script>
  $(document).ready(function() {
    

      $.ajax({
                url: "<?= base_url()?>almacen/clientes_almacenes",
                type: "POST",                
                dataType: "json",
                success: function(result) {
                    //console.log(result);
                    
                    for(var r=0; r<result.length; r++){
                        var id_segmento = result[r].idtbl_segmentos_proyecto;
                        eventos("", 1, id_segmento);
                        mostrarDatosAlmacenesClientes("", 1, id_segmento, "");                        
                    }
                                       
                },
                error: function(result) {
                    console.log("Ocurrio un error, intente mas tarde.")
                }
            });  

   


  });

  function mostrarDatosAlmacenesClientes(valorBuscar, pagina, idsegmento, valorBuscar2) {
                            var id_segmento = idsegmento;
                            $.ajax({
                                url: "<?= base_url() ?>almacen/mostrarSolicitudesDevolucionAlmacenes",                                
                                type: "POST",
                                data: {
                                    buscar: valorBuscar,
                                    nropagina: pagina,
                                    segmento: idsegmento,
                                    buscar2: valorBuscar2
                                },
                                dataType: "json",
                                success: function(response) {
                                    filas = "";
                                    var kilometraje = 0;
                                    var kilometraje_acumulado = 0;
                                    var clase = '';
                                    var fecha_finalizacion = '';
                                    $.each(response.solicitudesAlmacenes, function(key, item) {
                                      switch (item['estatus_solicitud']) {
                                      case 'C.O':
                                        clase = 'secondary';
                                        estatus = 'pendiente aprobación C.O';
                                        porcentaje = '33';
                                        break;
                                      case 'A.G':
                                        clase = 'warning';
                                        estatus = 'pendiente entrega A.G';
                                        porcentaje = '66';
                                        break;
                                      case 'aprobada':
                                        clase = 'info';
                                        estatus = 'aprobada por A.G';
                                        porcentaje = '96';
                                        break;
                                      case 'entregado':
                                        clase = 'success';
                                        estatus = 'entregado';
                                        porcentaje = '100';
                                        break;
                                      case 'cancelada A.G':
                                        clase = 'danger';
                                        estatus = 'cancelada A.G';
                                        porcentaje = '0';
                                        break;
                                      case 'cancelada C.O':
                                        clase = 'danger';
                                        estatus = 'Cancelada C.O';
                                        porcentaje = '0';
                                        break;
                                      default:
                                        clase = 'secondary';
                                        estatus = 'contactar administrador';
                                        porcentaje = '33.33';
                                        break;
                                    }
                                    filas += '<tr class="table-' + clase + '">';
                                    filas += '<td>' + item['uid'] + '</td>';
                                    filas += '<td>' + item['fecha_creacion'] + '</td>';
                                    filas += '<td>' + item['user_autor'] + '</td>';          
                                    filas += '<td>' + (item['user_aprobacion'] == null ? '----' : item['user_aprobacion']) + '</td>';
                                    filas += '<td>' + (item['fecha_aprobacion_co'] == null ? '----' : item['fecha_aprobacion_co']) + '</td>';
                                    filas += '<td>' + (item['user_almacen_general'] == null ? '----' : item['user_almacen_general']) + '</td>';
                                    filas += '<td>' + (item['fecha_aprobacion_ag'] == null ? '----' : item['fecha_aprobacion_ag']) + '</td>';
                                    filas += '<td>' + item['recibe'] + '</td>';
                                    filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
                                    filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
                                    filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
                                    filas += '<td class="text-center">';
                                    /*if (item['estatus_solicitud'] == 'aprobada' && item['tbl_users_idtbl_users_aprobar_ag'] != null && <?= $permiso ?> > 1 && <?= $this->session->userdata('tipo') ?> == 4) {
                                      filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
                                      filas += '<i class="fa fa-info-circle"></i>';
                                      filas += '</a>';
                                    } else {*/
                                      filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
                                      filas += '<i class="fa fa-info-circle"></i>';
                                      filas += '</a>';
                                    /*}*/
                                    filas += '</td>';
                                    filas += '</tr>';
                                    $('#tbsolicitudesalmacenes'+id_segmento+' tbody').html(filas);
                                      //}
                                    });
                                    //alert(id_almacen);
                                    //$('#tbsolicitudesalmacenes'+id_segmento+' tbody').html(filas);
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
                                    $(".paginacionalmacenes"+id_segmento).html(paginador);
                                }
                            });
                        }

                        function eventos(valorBuscar, pagina, idsegmento){
                $("body").on("keyup", "input[name='busqueda"+idsegmento+"']" ,function() {
                            textoBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatosAlmacenesClientes(textoBuscar, 1, idsegmento, selectBuscar);
                        });
                        $("select[name='select"+idsegmento+"']").on('change', function() {
                          //selectBuscar = $("select[name='selectKuali']").val();
                          selectBuscar = $(this).val();
                          mostrarDatosAlmacenesClientes('', 1, idsegmento, selectBuscar);
                        });

                        $("body").on("click", ".paginacionalmacenes"+idsegmento+" li a", function(e) {
                            e.preventDefault();
                            valorHref = $(this).attr("href");
                            valorBuscar = $("input[name='busqueda"+idsegmento+"']").val();
                            mostrarDatosAlmacenesClientes(valorBuscar, valorHref, idsegmento);
                        });
            }
  </script>

  <?php } ?>