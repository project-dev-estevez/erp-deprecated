<?php if (isset($this->session->userdata('permisos')['contratistas']) && $this->session->userdata('permisos')['contratistas']>1 ): ?>
  <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>contratistas/nuevo-personal" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
                <div class="title"><span>Nuevo<br>Personal</span></div>
              </div>
            </a>
          </div>
        </div>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
            <a href="<?= base_url() ?>contratistas/nuevo" class="dropdown-item" title="">
              <div class="item d-flex align-items-center pr-4 pl-4">
                <div class="icon bg-green"><i class="fa fa-plus"></i></div>
                <div class="title"><span>Nuevo<br>Contratista</span></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
<?php endif; ?>
<section class="tables">
  <div class="container-fluid">
    <!--<div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Contratistas</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="data-table" class="table table-striped table-sm contratistas-table">
            <thead>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
              </tr>
            </tfoot>
            <tbody>
              <?php if ($contratistas): ?>
                <?php foreach ($contratistas as $key => $value): ?>
                  <?php
                    switch ($value->estatus) {
                      case 'activo':
                        $calssTr ='success';
                        break;
                      case 'pausa':
                      $calssTr ='warning';
                      break;
                      case 'proceso':
                        $calssTr ='primary';
                        break;
                      case 'baja':
                        $calssTr ='danger';
                        break;
                    }
                  ?>
                  <tr  class="table-<?= $calssTr;?>">
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->uid ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->razon_social ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->nombre_comercial ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->rfc ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->email ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->telefono ?><br><?= $value->telefono_adicional ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->responsable ?></a></td>
                    <td><a href="<?= base_url() ?>contratistas/detalle/<?= $value->uid ?>"><?= $value->direccion ?></a></td>
                    <td class="text-capitalize font-weight-bold">
                      <?= ($value->estatus == 'proceso')? 'en '.$value->estatus : $value->estatus ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>-->
    <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Contratistas</h3>
      </div>
      <div class="card-header d-flex align-items-center">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn active" id="contratistasactivos-tab" data-toggle="tab" href="#contratistasactivos" role="tab" aria-controls="contratistasactivos" aria-selected="false">
              Contratistas Activos
            </a>
          </li>
          <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
          <li class="nav-item">
            <a class="nav-link btn" id="contratistasinactivos-tab" data-toggle="tab" href="#contratistasinactivos" role="tab" aria-controls="contratistasinactivos" aria-selected="true">
              Contratistas Inactivos
            </a>
          </li>
          <?php } ?>
        </ul>
      </div>
      <div class="card-body">
      <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="contratistasactivos" role="tabpanel" aria-labelledby="contratistasactivos-tab">
        <div class="float-right">
          
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <a href="<?php echo base_url() ?>contratistas/excel-contratistas" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <div class="table-responsive">
          <table id="tbcontratistas" class="table table-striped table-sm contratistas-table">
            <thead>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
                <th>Acciones</th>
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
          <div class="tab-pane fade" id="contratistasinactivos" role="tabpanel" aria-labelledby="contratistasinactivos-tab">
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busquedaContratistasInactivos">
            </div>
            <a href="<?php echo base_url() ?>contratistas/excel_contratistasInactivos" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
            <div class="table-responsive">
              <table id="tbcontratistasinactivos" class="table table-striped table-sm">
              <thead>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>UID</th>
                <th>Razón Social</th>
                <th>Nombre Comercial</th>
                <th>RFC</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Responsable</th>
                <th>Dirección</th>
                <th class="estatus">Estatus</th>
                <th>Acciones</th>
              </tr>
            </tfoot>
            <tbody>
              
            </tbody>
              </table>
              <br>
              <div class="paginacionContratistasInactivos">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
   
  </div>
</section>
<script>
  $(document).ready(function(){
    mostrarDatos("",1);
    //mostrarDatos2("",1);
    //mostrarDatos3("",1);
    mostrarDatosContratistasInactivos("",1)

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1);
    });
    $("input[name='busquedaContratistasInactivos']").keyup(function() {
      textoBuscar = $("input[name='busquedaContratistasInactivos']").val();
      mostrarDatosContratistasInactivos(textoBuscar,1);
    });
    $("input[name='busqueda2']").keyup(function() {
      textoBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(textoBuscar,1);
    });
    $("input[name='busqueda3']").keyup(function() {
      textoBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(textoBuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda']").val();
      mostrarDatos(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacionContratistasInactivos li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busquedaContratistasInactivos']").val();
      mostrarDatosContratistasInactivos(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacion2 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda2']").val();
      mostrarDatos2(valorBuscar,valorHref); 
    });
    $("body").on("click",".paginacion3 li a",function(e) {
      e.preventDefault();
      valorHref = $(this).attr("href");
      valorBuscar = $("input[name='busqueda3']").val();
      mostrarDatos3(valorBuscar,valorHref); 
    });
  });
  function mostrarDatos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarContratistas",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.departamentos,function(key,item) {
          switch (item.estatus) {
            case 'activo':
              calssTr ='success';
              break;
            case 'pausa':
            calssTr ='warning';
            break;
            case 'proceso':
              calssTr ='primary';
              break;
            case 'baja':
              calssTr ='danger';
              break;
          }
          filas += "<tr class='table-" + calssTr + "'><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.uid + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.razon_social + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.nombre_comercial + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.rfc + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.email + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.telefono + "<br>" + item.telefono_adicional + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.responsable + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.direccion + "</a></td><td class='text-capitalize font-weight-bold'>" + item.estatus + "</td><td><a title='Ver Asignaciones' href='<?= base_url() ?>contratistas/asignaciones_por_contratista/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a><a title='Ver Personal' href='<?= base_url() ?>contratistas/personal_por_contratista/" + item.idtbl_contratistas + "'><i class='fa fa-user' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbcontratistas tbody').html(filas);
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

  function mostrarDatosContratistasInactivos(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarContratistasInactivos",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.contratistas,function(key,item) {
          switch (item.estatus) {
            case 'activo':
              calssTr ='success';
              break;
            case 'pausa':
            calssTr ='warning';
            break;
            case 'proceso':
              calssTr ='primary';
              break;
            case 'baja':
              calssTr ='danger';
              break;
          }
          filas += "<tr class='table-" + calssTr + "'><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.uid + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.razon_social + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.nombre_comercial + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.rfc + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.email + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.telefono + "<br>" + item.telefono_adicional + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.responsable + "</a></td><td><a href='<?= base_url() ?>contratistas/detalle/" + item.uid + "'>" + item.direccion + "</a></td><td class='text-capitalize font-weight-bold'>" + item.estatus + "</td><td><a href='<?= base_url() ?>contratistas/asignaciones_por_contratista/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbcontratistasinactivos tbody').html(filas);
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
        $(".paginacionContratistasInactivos").html(paginador);
      }
    });
  }

  function mostrarDatos2(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarPersonalContratistaActivo",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.activos,function(key,item) {
          if(item.almacen == 1) {
            clase = "text-success";
            texto = "Autorizado";
          }
          else {
            clase = "text-danger";
            texto = "No autorizado";
          }
          filas += "<tr><td>" + item.uid + "</td><td title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td><td>" + item.puesto_contrato + "</td><td>" + item.nss + "</td><td>" + item.curp + "</td><td>" + item.email_personal + "</td><td>" + item.telefono + "</td><td class='text-center text-capitalize font-weight-bold'>" + 'Activo' + "</td><td class='text-center text-capitalize font-weight-bold " + clase + "'>" + texto + "</td><td>";
          <?php if($this->session->userdata("tipo") != 3 &&  $this->session->userdata("tipo") != 15){ ?>
            filas += "<a href='"+"<?= base_url() ?>contratistas/editar-personal/" + item.uid +"'>" + "<i class='fa fa-edit'></i>" + "</a>";
          <?php } ?>
          filas += "<a href='" + "<?= base_url() ?>contratistas/detalle-usuario/" + item.uid + "'>" + "<i class='fa fa-info-circle'></i>" + "</a></td></tr>";
        });
        $('#tbpersonalactivo tbody').html(filas);
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
        $(".paginacion2").html(paginador);
      }
    });
  }

  function mostrarDatos3(valorBuscar,pagina) {
    $.ajax({
      url: "<?= base_url() ?>Contratistas/mostrarPersonalContratistaInactivo",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.inactivos,function(key,item) {
          if(item.almacen == 1) {
            clase = "text-success";
            texto = "Autorizado";
          }
          else {
            clase = "text-danger";
            texto = "No autorizado";
          }
          filas += "<tr class='table-danger'><td>" + item.uid + "</td><td title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "</td><td>" + item.nombre_comercial + "</td><td title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</td><td>" + item.puesto_contrato + "</td><td>" + item.nss + "</td><td>" + item.curp + "</td><td>" + item.email_personal + "</td><td>" + item.telefono + "</td><td class='text-center text-capitalize font-weight-bold'>" + 'Baja' + "</td><td class='text-center text-capitalize font-weight-bold " + clase + "'>" + texto + "</td><td>"+ "<a href='" + "<?= base_url() ?>contratistas/detalle-usuario/" + item.uid + "'>" + "<i class='fa fa-info-circle'></i>" + "</a><a href='<?= base_url() ?>personal/detalle/" + item.uid + "'><i class='fa fa-question-circle' aria-hidden='true'></i></a></td></tr>";
        });
        $('#tbpersonalinactivo tbody').html(filas);
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
        $(".paginacion3").html(paginador);
      }
    });
  }
</script>