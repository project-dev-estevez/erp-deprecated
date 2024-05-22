
<?php if (isset($this->session->userdata('permisos')['personal']) && $this->session->userdata('permisos')['personal']>1 ): ?>
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>personal/nuevo" class="dropdown-item" title="">
          <div class="item d-flex align-items-center pr-6 pl-6">
            <div class="icon bg-violet"><i class="fa fa-plus"></i></div>
            <div class="title"><span>Nuevo<br>Personal</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div><!-- Item -->

        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>personal/ver-bajas" class="dropdown-item" title="">
          <div class="item d-flex align-items-center pr-6 pl-6">
            <div class="icon bg-green"><i class="fa fa-user"></i></div>
            <div class="title"><span>Personal<br>Inactivo</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div><!-- Item -->
        
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>/personal/contratos-vencidos" class="dropdown-item" title="">
          <div class="item d-flex align-items-center pr-6 pl-6">
            <div class="icon bg-blue"><i class="fa fa-list"></i></div>
            <div class="title"><span>Personal<br>Contrato Vencido</span>              
            </div>
            
          </div>
          </a>
          </div>
        </div><!-- Item -->

        
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="<?= base_url() ?>personal/reportes" class="dropdown-item" title="">
          <div class="item d-flex align-items-center pr-6 pl-6">
            <div class="icon bg-orange"><i class="fa fa-book"></i></div>
            <div class="title"><span>Reportes<br></span>              
            </div>
            
          </div>
          </a>
          </div>
        </div><!-- Item -->
 
      </div>
    </div>
  </section>

  <?php endif ?>
  
  <section class="tables">   
    <div class="container-fluid">
      
        
          <div class="card">
           
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Lista de Personal</h3>
            </div>
            <div class="card-body">
              <div class="float-right">
                <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
              </div>
              <!--<a href="<?php echo base_url() ?>personal/excel-personal-quincenal" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>-->
              <div class="table-responsive">   
                <table class="table table-striped table-sm table-hover" id="tbpersonalquincenal">
                  <thead>
                    <tr>
                      <th>N° de empleado</th>
                      <th>NOI</th>
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Proyecto</th>
                      <th>Fecha Nacimiento</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N° de empleado</th>
                      <th>NOI</th>
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Departamento</th>
                      <th>Perfil</th>
                      <th>Proyecto</th>
                      <th>Fecha Nacimiento</th>
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
      url: "<?= base_url() ?>Personal/mostrarPersonalAsignacion",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.personalAsignacion,function(key,item) {
            console.log('si');
          filas += "<tr><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.numero_empleado + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.numero_empleado_noi + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.apellido_paterno + ' ' + item.apellido_materno + ' ' + item.nombres + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.empresa + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.departamento + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.perfil + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombre_proyecto + "'>" + item.numero_proyecto + "</a></td><td><a href='" + "<?= base_url() ?>personal/detalle/" + item.uid + "' title='" + item.nombres + ' ' + item.apellido_paterno + ' ' + item.apellido_materno + "'>" + item.fecha_nacimiento + "</a></td></tr>";
        });
        $('#tbpersonalquincenal tbody').html(filas);
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
