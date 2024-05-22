<section class="projects">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            
              <h4>Traspasos</h4>
            
          </div>
          <div class="card-body">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>
            <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbasignaciones">
                <thead>
                  <tr>
                    <th data-priority="1">Folio</th>                
                    <th>Fecha creación</th>                                    
                    <th data-priority="3">Estatus</th>
                    <th>Almacen Destino</th>
                    <?php if($this->session->userdata('tipo') == 3) { ?>
                      <th>Numero Interno</th>
                    <?php } ?>
                    <th>Autor</th>
                    <th>Proyecto</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th data-priority="1">Folio</th>                
                    <th>Fecha creación</th>                                    
                    <th data-priority="3" width="120">
                      <select name="select" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="0">Pendiente</option>
                        <option value="1">Finalizada</option>
                      </select>
                    </th>
                    <th>Almacen Destino</th>
                    <?php if($this->session->userdata('tipo') == 3) { ?>
                      <th>Numero Interno</th>
                    <?php } ?>
                    <th>Autor</th>
                    <th>Proyecto</th>
                    <th></th>
                  </tr>
                </tfoot>
                <tbody>
                  <!--<?php if (isset($asignaciones)): ?>


                    <?php foreach ($asignaciones as $key => $value): ?>
                      <tr>
                        <td><?= $value->folio ?></td>
                        <td><?= $value->fecha ?></td>
                        <td><?= $value->fecha_asignacion ?></td>
                        <td><?= ($value->estatus_movimiento=='1') ? 'Finalizada' : 'Pendiente' ?></td>
                        <td><?= $value->nombres ?> <?= $value->apellido_paterno ?> <?= $value->apellido_materno ?></td>
                        <td><?= $value->nombre ?></td>
                        <td><?= $value->nombre_proyecto ?></td>
                        <td>
                          <?php if ($value->estatus_movimiento!='1'): ?>
                            <a href="<?= base_url() ?>almacen/asignacion/continuar/<?= $value->uid_movimiento ?>/<?= $value->uid_user ?>" title="Continuar"><i class="fa fa-edit"></i></a>
                          <?php else: ?>
                            <a href="<?= base_url() ?>almacen/asignacion/detalle/<?= $value->uid_movimiento ?>" title="Detalles"  onClick="window.open(this.href, this.target, 'width=1000,height=800,left=0,top=0'); return false;"><i class="fa fa-eye"></i></a>
                          <?php endif ?>
                        </td>
                      </tr>
                  <?php endforeach ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" align="center">No existen registros para mostrar</td>
                    </tr>
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
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    selectBuscar = "";
    mostrarDatos("",1,"");

    $("select[name='select']").on('change', function() {
      selectBuscar = $(this).val();
      mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar, 1, selectBuscar);
    });

    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref,selectBuscar); 
    });

  });
  function mostrarDatos(valorBuscar,pagina,valorBuscar2) {
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarTraspasos",
      type: "POST",
      data: {
        buscar:valorBuscar,
        nropagina:pagina,
        buscar2: valorBuscar2,
        almacen: "<?= $almacen ?>"
      },
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.traspasos,function(key,item) {
          
          filas += "<tr>";
          filas += "<td>" + item.folio + "</td>";
          filas += "<td>" + item.fecha + "</td>";          
          filas += "<td>" + (item.estatus_movimiento == '1' ? 'Finalizada' : 'Pendiente') + "</td>";
          filas += "<td>" + item.almacen +  "</td>";
          <?php if($this->session->userdata('tipo') == 3) { ?>
          filas += "<td>" + item.numero_interno + "</td>";
          <?php } ?>
          filas += "<td>" + item.nombre + "</td>";
          filas += "<td>" + item.nombre_proyecto + "</td>";
          filas += "<td>";
          if (item.estatus_movimiento!='1') {
            filas += "<a href='" + "<?= base_url() ?>almacen/traspaso/continuar/" + item.uid_movimiento + "/" + item.uid_almacen + "' title=Continuar><i class='fa fa-edit'></i></a>";
          }
          else {
            filas += "<td><center><a href='" + "<?= base_url() ?>almacen/traspaso/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'  onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";
          }
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbasignaciones tbody').html(filas);
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