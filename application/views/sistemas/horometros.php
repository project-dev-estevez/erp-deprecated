
<section>
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card">
        <div class="card-header">
            <h4><?php echo $almacen->almacen ?> / Equipo de Cómputo</h4>
          </div>
          <div class="card-body">
            <div class="card-title">
              <h4><?php $almacen->almacen ?> <small class="float-right">Precio Dolar $<?php echo $precio_dolar ?></small></h4><br>              
            </div>
            <div class="float-right">
              <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
            </div>
            <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-inventario-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->       
            <div class="table-responsive">
              <table class="table table-striped table-sm table-hover" id="tbalmacenaltocosto">
                <thead>
                  <tr>
                    <th>Neodata</th>                    
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th data-priority="2">Descripción</th>
                    <th>Serie</th>
                    <th>N° Interno</th>                    
                    <th>Estatus</th>
                    <th>Último Servicio</th>
                    <th>Próximo Servicio</th>
                    <th>Tiempo Transcurrido</th>
                    <th></th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Neodata</th>                    
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Descripción</th>
                    <th>Serie</th>
                    <th>N° Interno</th>                    
                    <th>Estatus
                      <!--<select name="selectAC" style="font-size: 10px;" class="form-control">
                        <option value="">Seleccionar</option>
                        <option value="almacen">Almacen</option>
                        <option value="asignado">Asignado</option>
                        <option value="dañado">Dañado</option>
                        <option value="descompuesto">Descompuesto</option>
                        <option value="robado">Robado</option>
                        <option value="abuso de confianza">abuso de confianza</option>
                        <option value="vendida">Vendida</option>
                      </select>-->
                    </th>
                    <th>Último Servicio</th>
                    <th>Próximo Servicio</th>
                    <th>Tiempo Transcurrido</th>
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
            <br><br>
          </div>
        </div>
              

      </div>
      <!-- end col-->
    </div>

  </div>
</section>

<div id="editar_producto" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true" class="modal fade text-left">
  <div role="document" class="modal-dialog modal-lg">
    <div class="modal-content">
      <?= form_open(base_url() . 'almacen/actualizar-producto-almacen') ?>
      <div class="modal-header">
        <h4 id="labelEditarProducto" class="modal-title">Editar Producto</h4>
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Número de Serie</label>
              <input type="text" placeholder="Número de Serie" name="numero_serie" class="form-control alto-costo" minlength="1" required>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Número Interno</label>
              <input type="text" placeholder="Número Interno" name="numero_interno" class="form-control alto-costo" minlength="1" required>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label>Nota</label>
              <textarea placeholder="Descripción" name="nota" class="form-control" minlength="4"></textarea>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <label name="lblestatus">Estatus</label>
              <select name="estatus" id="estatus" class="form-control alto-costo" required>
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <option value="almacen">Almacen</option>
                <option value="robado">Robado</option>
                <option value="descompuesto">Descompuesto</option>
                <option value="asignado">Asignado</option>
              </select>
            </div>
          </div>

          <div class="col-12">
            <div class="form-group">
              <label>Existencias</label>
              <input type="number" placeholder="0" name="existencias" min="0" class="form-control">
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Rack</label>
              <select name="rack" class="form-control">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php for ($x = 1; $x <= 20; $x++) { ?>
                  <option value="<?= $x ?>">Rack <?= $x ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-12 col-lg-6">
            <div class="form-group">
              <label>Nivel</label>
              <select name="nivel" class="form-control">
                <option value="" disabled="disabled" selected="selected">Seleccione...</option>
                <?php for ($x = 1; $x <= 10; $x++) { ?>
                  <option value="<?= $x ?>">Nivel <?= $x ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="idalmacen" value="">
        <?= form_hidden('token', $token) ?>
        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
        <button type="submit" class="btn btn-danger ladda-submit" data-style="expand-right">Actualizar</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>


<script>
  $('#editar_producto').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='numero_serie']").val(recipient.serie);
    modal.find("input[name='numero_interno']").val(recipient.interno);
    modal.find("textarea[name='nota']").val(recipient.nota);
    modal.find("select[name='estatus']").val(recipient.estatus);
    modal.find("input[name='existencias']").val(recipient.existencias);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='idalmacen']").val(recipient.idalmacen);

    //if (recipient.estatus == 'asignado')
    //modal.find("select[name='estatus']").attr('disabled', 'disabled')
    //else
    //modal.find("#estatus option[value='asignado']").attr('disabled', 'disabled')

    if (recipient.abreviatura == 'HAC' || recipient.abreviatura == 'HMC' || recipient.abreviatura == 'HIL')
      modal.find("input[name='existencias']").attr('readonly', 'readonly')


    if (recipient.abreviatura == 'CAC') {
      modal.find("input[name='numero_serie']").attr('disabled', 'disabled')
      modal.find("input[name='numero_interno']").attr('disabled', 'disabled')
      modal.find("textarea[name='nota']").attr('disabled', 'disabled')
      modal.find("select[name='estatus']").hide()
      modal.find("label[name='lblestatus']").hide()
    }

  })

  $('#editar_producto').on('hide.bs.modal', function(event) {
    var modal = $(this);
    modal.find("input[name='numero_serie']").removeAttr('disabled');
    modal.find("input[name='numero_interno']").removeAttr('disabled');
    modal.find("textarea[name='nota']").removeAttr('disabled');
    modal.find("select[name='estatus']").removeAttr('disabled');
    modal.find("input[name='existencias']").removeAttr('disabled');
    modal.find("select[name='rack']").removeAttr('disabled');
    modal.find("select[name='nivel']").removeAttr('disabled');
  })
</script>
<script>
  $(document).ready(function(){
    selectBuscar = "";
    mostrarDatos("",1,"");

   

    $("select[name='selectAC']").on('change', function() {
      //selectBuscar = $("select[name='selectAC']").val();
      selectBuscar = $(this).val();
      mostrarDatos('', 1, selectBuscar);
    });

    $("input[name='busqueda']").keyup(function() {
      textoBuscar = $("input[name='busqueda']").val();
      mostrarDatos(textoBuscar,1,selectBuscar);
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
      url: "<?= base_url() ?>Sistemas/mostrarAlmacenSistemasAF",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina,selectAC:valorBuscar2},
      dataType: "json",
      success:function(response) {
        filas = "";
        var ultima_fecha = '';
        var mes = "";
        var proximo = "";
        var proximo_final = "";
        var tiempo_transcurrido = "";
        var fecha_actual = moment();
        var falta = "";
        var frase = '';
        var clase = '';
        $.each(response.almacenSistemas,function(key,item) {
          if(item.ultima_fecha != null){
            ultima_fecha = item.ultima_fecha;
            mes = new Date(ultima_fecha);
            proximo  = new Date(mes.setMonth(mes.getMonth()+6));
            proximo_final = proximo.getFullYear() + '-' + (proximo.getMonth() + 1) + '-' + proximo.getDate();            
            var fecha_ultima = moment(item.ultima_fecha);
            var proxima_fecha = moment(proximo_final);
            tiempo_transcurrido = fecha_actual.diff(fecha_ultima, 'days');
            falta = proxima_fecha.diff(fecha_actual, 'days');
            if(parseInt(falta) > 15){
              clase = 'table-success';
            }else if(parseInt(falta) < 16 && parseInt(falta) > 0){
              clase = 'table-warning';
            }else{
              clase = 'table-danger';
            }
            if(tiempo_transcurrido == 1){
              frase = ' día';
            }else{
              frase = ' días';
            }
          }else{
            ultima_fecha = '---';
            proximo_final = '---';
            tiempo_transcurrido = '---';
            frase = '';
            falta = 0;
            clase = 'table-danger';
          }
          
          filas += "<tr class='" + clase + "'>";
          filas += "<td>" + item.neodata + "</td>";
          filas += "<td>" + item.marca + "</td>";
          filas += "<td>" + item.modelo + "</td>";
          filas += "<td>" + item.descripcion + "</td>";
          filas += "<td>" + item.numero_serie + "</td>";
          filas += "<td>" + item.numero_interno + "</td>";
          filas += "<td>" + item.estatus + "</td>";
          filas += "<td>" + ultima_fecha + "</td>";
          filas += "<td>" + proximo_final + "</td>";
          filas += "<td>" + tiempo_transcurrido + frase + "</td>";
          filas += "<td>";
          filas += "<a href='" + "<?= base_url()?>sistemas/detalle-producto/" + item.iddtl_almacen + "' title='Información' onClick='" + "window.open(this.href, this.target, width=1000,height=800,left=0,top=0); return false;\''><i class='fa fa-file-o'></i></a>";
          <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas'] == 3) : ?>
            filas += " <a href='" + "<?= base_url()?>sistemas/nuevo-servicio/" + item.iddtl_almacen + "' title='Nuevo Servicio'><i class='fa fa-plus'></i></a>";
          <?php endif ?>
          filas += "</td>";
          filas += "</tr>";
        });
        $('#tbalmacenaltocosto tbody').html(filas);
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