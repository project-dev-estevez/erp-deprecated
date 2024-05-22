<?php if ($this->session->userdata('permisos')['orden_servicio'] == 2) { ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
          <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6 mb-2">
            <div class="bg-white has-shadow">
              <a href="<?= base_url() ?>servicios" class="dropdown-item" title="">
                <div class="item d-flex align-items-center pr-4 pl-4">
                  <div class="icon bg-violet">
                    <i class="fa fa-plus"></i>
                  </div>
                  <div class="title">
                    <span>Nueva<br>Orden de Servicio</span>
                  </div>
                </div>
              </a>
            </div>
          </div>
        <!-- Item -->
      </div>
    </div>
  </section>
<?php } ?>

<!--<section class="tables">   
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Ordenes de servicios</h3>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <div class="table-responsive">   
          <table id="tbordenesservicio" class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Uid</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Fecha</th>
                <th>Generó Orden</th>
                <th>Aprobación PM</th>
                <th>Fecha Aprobación PM</th>
                <th>Aprobación AK</th>
                <th>Fecha Aprobación AK</th>
                <th>Estatus</th>
                <th>Progreso</th>
                <th></th>
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
      url: "<?= base_url() ?>Servicios/mostrarOrdenesServicio",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.ordenesServicio,function(key,item) {
          clase = "";
          porcentaje = "";

          if(item.estatus === null || item.estatus == '') {  
            clase = 'table-secondary';
            porcentaje = '25 %';
          }

          if(item.estatus === 'aprobada pm') {  
            clase = 'table-warning';
            porcentaje = '50 %';
          }

          if(item.estatus === 'aprobada almacen kuali') {  
            clase = 'table-warning';
            porcentaje = '75 %';
          }

          if(item.estatus === 'cancelada pm' || item.estatus === 'cancelada almacen kuali') {  
            clase = 'table-danger';
            porcentaje = '0 %';
          }
              
          
          filas += "<tr class='"+ clase +"'>";
          filas += "<td>" + item.uid + "</td>";
          filas += "<td>" + item.nombre + "</td>";
          filas += "<td>" + item.direccion + "</td>";
          filas += "<td>" + item.fecha + "</td>";
          filas += "<td>" + item.genero_orden + "</td>";
          filas += "<td>" + (item.nombre_pm == null || item.nombre_pm == '' ? '-' : item.nombre_pm) + "</td>";
          filas += "<td>" + (item.fecha_pm == null || item.fecha_pm == '' ? '-' : item.fecha_pm) + "</td>";
          filas += "<td>" + (item.nombre_ak == null || item.nombre_ak == '' ? '-' : item.nombre_ak) + "</td>";
          filas += "<td>" + (item.fecha_ak == null || item.fecha_ak == '' ? '-' : item.fecha_ak) + "</td>";
          filas += "<td>" + (item.estatus === null || item.estatus === '' ? 'creada' : item.estatus) + "</td>";
          filas += "<td>" + porcentaje + "</td>";
          filas += "<td>";
          filas += "<a title='Detalle Orden del Servicio' href='" + "<?= base_url() ?>" + "servicios/detalle_orden_servicio/" + item.tipo_servicio + "/" + item.uid + "'><i class='fa fa-info-circle'></i></a>";
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbordenesservicio tbody').html(filas);
        linkSeleccionado = Number(pagina);
        //total registros
        totalRegistros = response.totalRegistros;
        
        //cantidad de registros por página
        cantidadRegistros = response.cantidad;

        numeroLinks = Math.ceil(totalRegistros/cantidadRegistros);
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
</script>-->

<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de almacén (Material de Instalación Kuali)</h3>
      </div>
      <div class="card-body">
        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
          <?php if (isset($this->session->userdata('permisos')['orden_servicio']) && $this->session->userdata('permisos')['orden_servicio'] == 2) { ?>
            <li class="nav-item">
              <a class="nav-link btn active" id="pills-kuali-tab" data-toggle="pill" href="#pills-kuali" role="tab" aria-controls="pills-kuali" aria-selected="false">
                Kuali Digital
              </a>
            </li>  
          <?php } ?>            
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-kuali" role="tabpanel" aria-labelledby="pills-kuali-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda3">
            </div>
            <div class="table-responsive">
              <table id="tbsolicitudeskuali" class="table table-striped table-sm">
                <thead>
                  <tr>
                    <th>UID</th>
                    <th>Creación</th>
                    <th>Creado por</th>
                    <th>Aprobación PM</th>
                    <th>Fecha Aprobación PM</th>
                    <th>Aprobación K</th>
                    <th>Fecha Aprobación K</th>
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
                    <th>Aprobación K</th>
                    <th>Fecha Aprobación K</th>
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
              <div class="paginacion3">

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
      mostrarDatos3("",1);
      $("input[name='busqueda3']").keyup(function() {
        textoBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(textoBuscar, 1);
      });
      $("body").on("click", ".paginacion3 li a", function(e) {
        e.preventDefault();
        valorHref = $(this).attr("href");
        valorBuscar = $("input[name='busqueda3']").val();
        mostrarDatos3(valorBuscar, valorHref);
      });
  });
    

  function mostrarDatos3(valorBuscar, pagina) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesKualiMI",
      type: "POST",
      data: {
      buscar: valorBuscar,
      nropagina: pagina
      },
      dataType: "json",
      success: function(response) {
        filas = "";
        $.each(response.solicitudesKualiMI, function(key, item) {
          if (item.tipo_producto === 'Material Instalacion Kuali') {
            if (item.estatus_solicitud == 'SK') {
                var color = 'success';
                var status = 'Surtida';
                var percent = '100%';
              } else if (item.estatus_solicitud == 'SU K') {
                var color = 'warning';
                var status = 'Aprobado por Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'K') {
                var color = 'warning';
                var status = 'Pendiente Aprobación Kuali';
                var percent = '75%';
              } else if (item.estatus_solicitud == 'cancelada K') {
                var color = 'danger';
                var status = 'Cancelada Kuali';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'cancelada PM K') {
                var color = 'danger';
                var status = 'Cancelada PM';
                var percent = '0%';
              } else if (item.estatus_solicitud == 'PM K') {
                var color = 'secondary';
                var status = 'Pendiente Aprobación PM';
                var percent = '25%';
              }
              filas += "<tr class='table-" + color + "'>";
              filas += "<td>" + item.uid + "</td>";
              filas += "<td>" + item.fecha_creacion + "</td>";
              filas += "<td>" + item.user_autor + "</td>";
              filas += "<td>" + item.user_aprobacion + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_pm == null ? '----' : item.fecha_aprobacion_pm) + "</td>";
              filas += "<td>" + (item.user_almacen_general == null ? '----' : item.user_almacen_general) + "</td>";
              filas += "<td>" + (item.fecha_aprobacion_ag == null ? '----' : item.fecha_aprobacion_ag) + "</td>";
              filas += "<td>" + item.recibe + "</td>";
              filas += "<td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td>";
              filas += "<td style='font-weight: bold'>" + status + "</td>";
              filas += "<td style='text-align: center;font-weight: bold'>" + percent + "</td>";
              <?php if($this->session->userdata('tipo') != 4) { ?>
                filas += "<td align='center'><a title='Detalle Orden del Servicio' href='" + "<?= base_url() ?>" + "servicios/detalle_orden_servicio/" + item.uid_orden_servicio + "'><i class='fa fa-info-circle'></i></a></td>";  
              <?php } ?>
              filas += "<td align='center'><a href='"+"<?= base_url() ?>" + "almacen/detalle-solicitud/" + item.uid + "' title='Detalles'><i class='fa fa-info-circle'></i></a></td>";
              filas += "</tr>";
              $('#tbsolicitudeskuali tbody').html(filas);
            } 
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
        $(".paginacion3").html(paginador);
      }
    });
  }
</script>