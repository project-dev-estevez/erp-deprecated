<?php if($tipo_permiso && $tipo_permiso == 2 ): ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-4 col-sm-6 col-md-5 col-xs-6">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>almacen/solicitud-devolucion-tarjetas" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title">
                  <span>Nueva Solicitud<br> de Devolución de<br> Tarjeta</span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
      </div>
    </div>
  </section>
<?php endif; ?>
<section class="tables dashboard-counts">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Mis solicitudes de devolución tarjetas</h3>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-devoluciones-Kuali'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->       
        <div class="table-responsive">
          <table class="table table-striped table-sm table-hover" id="tbsolicitudesdevoluciontarjetas">
            <thead>
              <tr>
                <th>UID</th>
                <th>Creación</th>
                <th>Creado por</th>
                <th>Aprobación CV</th>
                <th>Fecha Aprobación CV</th>             
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
                <th>Aprobación CV</th>
                <th>Fecha Aprobación CV</th>    
                <th>Entrega</th>
                <th>Proyecto</th>
                <th width="120">
                  <select name="selectRCV" style="font-size: 10px;" class="form-control">
                    <option value="">Seleccionar</option>                    
                    <option value="RCV">Pendiente entrega control vehicular</option>
                    <option value="aprobada">Aprobada por control vehicular</option>
                    <option value="entregado">Entregado</option>
                    <option value="cancelada RCV">Cancelada control vehicular</option>
                  </select>
                </th>
                <th>Progreso</th>
                <th></th>
              </tr>
            </tfoot>
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
      textoBuscar2 = $("select[name='selectRCV']").val();
      mostrarDatos(textoBuscar,1,textoBuscar2);
    });
    $("select[name='selectRCV']").on('change', function() {
      selectBuscar = $("select[name='selectRCV']").val();
      mostrarDatos('', 1, selectBuscar);
    });
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      valorBuscar2 = $("select[name='selectRCV']").val();
      mostrarDatos(valorBuscar,valorHref,valorBuscar2); 
    });
  });
  function mostrarDatos(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarSolicitudesDevolucionTarjetas",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2:valorBuscar2
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.solicitudesDevolucionTarjetas,function(key,item) {
          switch (item['estatus_solicitud']) {
            case 'TCV':
              clase = 'warning';
              estatus = 'pendiente entrega control vehicular';
              porcentaje = '66';
              break;
            case 'aprobada':
              clase = 'info';
              estatus = 'aprobada por control vehicular';
              porcentaje = '96';
              break;
            case 'entregado':
              clase = 'success';
              estatus = 'entregado';
              porcentaje = '100';
              break;
            case 'cancelada RCV':
              clase = 'danger';
              estatus = 'cancelada control vehicular';
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
          filas += '<td>' + (item['user_refacciones_cv'] == null ? '----' : item['user_refacciones_cv']) + '</td>';
          filas += '<td>' + (item['fecha_aprobacion_rcv'] == null ? '----' : item['fecha_aprobacion_rcv']) + '</td>';
          filas += '<td>' + item['recibe'] + '</td>';
          filas += '<td title="' + item['nombre_proyecto'] + '">' + item['numero_proyecto'] + '</td>';
          filas += '<td class="text-center font-weight-bold text-capitalize">' + estatus + '</td>';
          filas += '<td class="text-center font-weight-bold">' + (porcentaje) + '%</td>';
          filas += '<td class="text-center">';
          //if (item['estatus_solicitud'] == 'aprobada' && item['tbl_contratistas_idtbl_contratistas'] == null && item['tbl_usuarios_idtbl_usuarios_supervisor'] == null && <?= $permiso ?> > 1 && (<?= $this->session->userdata('tipo') ?> == 4 && <?= $this->session->userdata('id') ?> != 50) ) {
          //  filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion-interno/' + item['uid'] + '" title="Detalles">';
          //  filas += '<i class="fa fa-info-circle"></i>';
          //  filas += '</a>';
          //}
          //else {
            filas += '<a href="<?= base_url() ?>almacen/detalle-devolucion/' + item['uid'] + '" title="Detalles">';
            filas += '<i class="fa fa-info-circle"></i>';
            filas += '</a>';
          //}
          filas += '</td>';
          filas += '</tr>';
        });
        $('#tbsolicitudesdevoluciontarjetas tbody').html(filas);
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