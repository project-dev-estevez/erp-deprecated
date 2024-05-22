<section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
           
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Personal con contrato vencido</h3>
            </div>
            <div class="card-body">
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
              </div>
              <a href="<?php echo base_url() ?>personal/excel-contrato-vencido" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
              <div class="table-responsive">   
                <table class="table table-striped table-sm table-hover" id="tbcontratosvencidos">
                  <thead>
                    <tr>
                      <th>N° de empleado</th>
                      <!--<th>NOI</th>-->
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Fecha Vencimiento</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N° de empleado</th>
                      <!--<th>NOI</th>-->
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Fecha Vencimiento</th>
                      <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!--<?php if ($personal): ?>
                    <?php foreach ($personal as $value): ?>
    
                      <tr class="table-danger">
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['numero_empleado']?></a></td>
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['numero_empleado_noi']?></a></td>                        
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['apellido_paterno'].' '.$value['apellido_materno'].' '.$value['nombres']?></a></td>
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['departamento']?></a></td>
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['perfil']?></a></td>
                        <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?= $value['end_date'] ?></a></td>
                        <td><?= $value['dias_vencimiento'] ?></td>
                      </tr>
                    <?php endforeach ?>     
                    <?php else: ?>
                      <tr>
                        <td colspan="12" class="text-center">No existen usuarios.</td>
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
          
          
          <div class="card">
           
           <div class="card-header d-flex align-items-center">
             <h3 class="h4">Personal con contrato próximo a vencer</h3>
           </div>
           <div class="card-body">
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda2">
              </div>
              <a href="<?php echo base_url() ?>personal/excel-contrato-vencer" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
              <div class="table-responsive">   
                <table class="table table-striped table-sm table-hover" id="tbcontratosproximosvencer">
                  <thead>
                    <tr>
                    <th>N° de empleado</th>
                    <!--<th>NOI</th>-->
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Perfil</th>
                    <th>Fecha Vencimiento</th>
                    <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>N° de empleado</th>
                    <!--<th>NOI</th>-->
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Departamento</th>
                    <th>Perfil</th>
                    <th>Fecha Vencimiento</th>
                    <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <!--<?php if ($personal_a_vencer): ?>
                    <?php foreach ($personal_a_vencer as $key => $value): ?>
   
                    <tr class="table-warning">
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['numero_empleado']?></a></td>
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['numero_empleado_noi']?></a></td>                        
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['apellido_paterno'].' '.$value['apellido_materno'].' '.$value['nombres']?></a></td>
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['departamento']?></a></td>
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?=$value['perfil']?></a></td>
                      <td><a href="<?= base_url() ?>personal/detalle/<?=$value['uid']?>" title="<?php echo $value['nombres'].' '.$value['apellido_paterno'].' '.$value['apellido_materno'] ?>"><?= $value['end_date'] ?></a></td>
                      <td><?= $value['dias_vencimiento'] ?></td>
                    </tr>
                  <?php endforeach ?>     
                  <?php else: ?>
                    <tr>
                      <td colspan="12" class="text-center">No existen usuarios.</td>
                    </tr>
                  <?php endif ?>-->               
                </tbody>
              </table>
              <br>
              <div class="paginacion2">

              </div>
            </div>
          </div>
        </div> 
      
    </div>
  </section>
<script>
  $(document).ready(function(){
    mostrarDatos("",1);

    mostrarDatos2("",1);
    
    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });

    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });
    
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
    });

    $("body").on("click",".paginacion2 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(valorBuscar,valorHref); 
    });

  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Personal/mostrarContratosVencidos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.contratosVencidos,function(key,item) {
          filas += "<tr class='table-danger'>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['numero_empleado'] + "</a></td>";
          //filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['numero_empleado_noi'] + "</a></td>";                        
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['apellido_paterno'] + ' ' + item['apellido_materno'] + ' ' + item['nombres'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['empresa'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['departamento'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['perfil'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['end_date'] + "</a></td>";
          filas += "<td>" + item['dias_vencimiento'] + "</td>";
          filas += "</tr>";
        });
        $('#tbcontratosvencidos tbody').html(filas);
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

  function mostrarDatos2(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Personal/mostrarContratosProximosVencer",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.contratosProximosVencer,function(key,item) {
          filas += "<tr class='table-warning'>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['numero_empleado'] + "</a></td>";
          //filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['numero_empleado_noi'] + "</a></td>";                        
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['apellido_paterno'] + ' ' + item['apellido_materno'] + ' ' + item['nombres'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['empresa'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['departamento'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['perfil'] + "</a></td>";
          filas += "<td><a href='" + "<?= base_url() ?>personal/detalle/" + item['uid'] + "' title='" + item['nombres'] + ' ' + item['apellido_paterno'] + ' ' + item['apellido_materno'] + "'>" + item['end_date'] + "</a></td>";
          filas += "<td>" + item['dias_vencimiento'] + "</td>";
          filas += "</tr>";
        });
        $('#tbcontratosproximosvencer tbody').html(filas);
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
