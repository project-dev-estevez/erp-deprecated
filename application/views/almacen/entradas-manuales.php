<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h4><?php if(isset($almacen)) { ?><?php echo $almacen->almacen ?><?php } ?><?php if(!isset($almacen)) { ?><?php echo $proyecto->nombre_proyecto ?><?php } ?> <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>
              <div>
                <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link btn active" id="pills-entrada-tab" data-toggle="pill" href="#pills-entrada" role="tab" aria-controls="pills-entrada" aria-selected="false">
                      Entradas
                    </a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-entrada" role="tabpanel" aria-labelledby="pills-entrada-tab">
                    <!---->
                    <div class="float-right">
                      <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
                    </div>                  
                    <button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-almacenes-entradas/<?=$almacen->idtbl_almacenes?>'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>       
                    <div class="table-responsive">
                      <table class="table table-striped table-sm table-hover" id="tbentradasalmacencli">
                        <thead>
                          <tr>
                            <th>Uid</th>   
                            <th>Folio</th>             
                            <th>Fecha</th>
                            <th>Personal que aprobó</th>
                            <th>Proyecto</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>                            
                            <th></th>             
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>Uid</th>   
                            <th>Folio</th>             
                            <th>Fecha</th>
                            <th>Personal que aprobó</th>
                            <th>Proyecto</th>
                            <th>Tipo Documento</th>
                            <th>Número Documento</th>                            
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
        </div>
      </div>
    </div>
  </div>
</section>













<script>
  $(document).ready(function(){
    mostrarDatos2("",1);
    

    

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });

    

    

    

    $("body").on("click",".paginacion2 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(valorBuscar,valorHref); 
    });

    

  });
  function mostrarDatos2(valorBuscar,pagina) {
    var uid_almacen = '<?= $almacen->uid ?>';
    var tipo = "'entrada','entrada-almacen'";
    $.ajax({
      url: "<?= base_url() ?>Almacen/mostrarReportesAlmacenCli",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,uid_almacen:uid_almacen,tipo:tipo},
      dataType: "json",
      success:function(response) {
        filas = "";
        clase = "";
        $.each(response.reportes,function(key,item) {
          <?php if($almacen->uid == "25839864557600770") { ?>
            if(item['estatus_contabilidad'] == 'Pendiente'){
              clase = 'table-warning';
            }else if(item['estatus_contabilidad'] == 'Cancelada'){
              clase = 'table-danger';
            } else {
              clase = 'table-success';
            }
          <?php } ?>
          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item['uid'] + "</td>";
          filas += "<td>EA-" + item['folio'] + "</td>";
          filas += "<td>" + item['fecha'] + "</td>";
          filas += "<td>" + item['nombre'] + "</td>";
          filas += "<td>" + item['numero_proyecto'] + ' - ' + item['nombre_proyecto'] + "</td>";
          filas += "<td>" + item['tipo_documento'] + "</td>";
          filas += "<td>" + item['numero_documento'] + "</td>";          
          filas += "<td><center><a href='" + "<?= base_url() ?>almacen/entrada/detalle/" + item['idtbl_almacen_movimientos'] + "' title='Detalles'" + "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-eye'></i></a></center></td>";          
          filas += "</tr>";
        });
        $('#tbentradasalmacencli tbody').html(filas);
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
        $(".paginacion2").html(paginador);
      }
    });
  }
</script>