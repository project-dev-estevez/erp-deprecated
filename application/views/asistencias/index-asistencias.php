
  <section class="dashboard-counts no-padding-bottom botones">
    <div class="container-fluid">
      <div class="row">
        <?php if((isset($ultima_asistencia[0]->fecha_hora) && date('Y-m-d',strtotime($ultima_asistencia[0]->fecha_hora)) != date('Y-m-d')) || !isset($ultima_asistencia[0]->fecha_hora)){ ?>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevaAsistencia" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-blue"><i class="fa fa-clock-o fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Asistencia</span>
            </div>
            
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <?php }elseif((isset($ultima_salida[0]->fecha_hora) && date('Y-m-d',strtotime($ultima_salida[0]->fecha_hora)) != date('Y-m-d')) || !isset($ultima_salida[0]->fecha_hora)){ ?>
        <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#nuevaAsistencia" data-toggle="modal" data-tipo="salida">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-blue"><i class="fa fa-clock-o fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Salida</span>
            </div>
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <?php } ?>
        <?php if($lider == true){ ?>
          <!-- Item -->
        <div class="col-xl-3 col-sm-6">
          <div class="bg-white has-shadow">
          <a href="#certificado" data-toggle="modal" data-tipo="entrada">
          <div class="item d-flex align-items-center pr-4 pl-4">
            <div class="icon bg-blue"><i class="fa fa-clock-o fa-2x" style="margin-top: 8px;"></i></div>
            <div class="title"><span>Registrar<br>Entrada Cuadrilla</span>
            </div>
          </div>
          </a>
          </div>
        </div>
        <!-- Item -->
        <?php } ?>
      </div>
    </div>
  </section>
  
  <!-- Dashboard Header Section    -->
  <section class="dashboard-header">
    <div class="container-fluid">
    <div class="card">
                    <div class="card-header">

                        <h4>Asistencias</h4>

                    </div>
                    <div class="card-body">
                    <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                        <div class="float-right">
                            <input type="text" class="form-control" placeholder="Buscar" name="busquedaAsistencias">
                        </div>
                        <!--<button onclick="window.location.href='<?php echo base_url() ?>almacen/excel-asignaciones-alto-costo'" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></button>-->
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover" id="tbasistencias">
                                <thead>
                                    <tr>
                                        <th data-priority="1">Usuario</th>
                                        <th>Fecha y hora</th>                                        
                                        <th>Tipo</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th data-priority="1">Usuario</th>
                                        <th>Fecha y hora</th>                                        
                                        <th>Tipo</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>

                            </table>
                            <br>
                            <div class="paginacionAsistencias">

                            </div>
                        </div>
                    </div>
                </div>
      </div>
  </section>

  <div class="modal fade text-left" id="nuevaAsistencia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="over"></div>
            <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                <div class="modal-header bg-primary white">                    
                    <h4 class="modal-title" id="myModalLabel8">Asistencia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open_multipart(base_url().'Asistencias/nuevaAsistencia', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                    <div class="modal-body">
                       
                    <div style="width: 100%; height: 300px;" id="mapa"></div>
                    <br>
                    <div class="row">
                        <div class="form-group">
                            <div class="col">
                                <input type="hidden" placeholder="8:00:00" name="latitud" id="latitud" class="form-control" readonly required>
                            </div>
                        </div>                    
                        <div class="form-group">
                            <div class="col">
                                <input type="hidden" placeholder="8:00:00" name="longitud" id="longitud" class="form-control" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="file" name="foto" id="foto" capture required>
                        </div>
                    </div>
                    <input type="hidden" name="tipo" value="">
                    </div>
                    <div class="modal-footer">
                        <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal"
                            value="Cerrar">
                        <button type="button" class="btn btn-outline-primary btn-lg" id="confirmar">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="certificado" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabeldocumento" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <?php echo form_open_multipart(base_url().'Asistencias/nuevaAsistencia', 'class="needs-validation" id="formuploadajaxLider" novalidate'); ?>
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Personal Cuadrilla</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- modal-header -->
            <div class="modal-body">
            <div style="width: 100%; height: 300px;" id="mapaLider"></div>
                    <br>
                
            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Puesto</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbpersonalcuadrilla"></tbody>
                                
                                </table>
                            </div>
                
                
                </div>
                <div class="col-4">
                    <div id="seccion_personal"></div>
                </div>
                <div>
            </div>
            <div class="row">
                        <div class="form-group">
                            <div class="col">
                                <input type="hidden" placeholder="8:00:00" name="latitud" id="latitud" class="form-control" readonly required>
                            </div>
                        </div>                    
                        <div class="form-group">
                            <div class="col">
                                <input type="hidden" placeholder="8:00:00" name="longitud" id="longitud" class="form-control" readonly required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="file" name="foto" id="foto" capture required>
                        </div>
                    </div>
            <!-- modal-body -->
            <div class="modal-footer">
                <div id="personal_asignado"></div>
                <input type="hidden" name="id_cuadrilla" value="">
                <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-outline-primary btn-lg" id="confirmarLider">Confirmar</button>
            </div>
            </div>
            </form>
        </div>
    </div>

    <script>

      $('#certificado').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='id_cuadrilla']").val(recipient.idcuadrilla);
    modal.find("input[name='nombre_curso']").val(recipient.nombrecurso);

    


    $.ajax({
      url: base_url+'almacen/getPersonalCuadrillaLider',
      type: 'POST',
      dataType: 'json',
      data: {id: <?= $lider ?>},
      beforeSend: function() {
        $('.card-body').addClass('load');
      },
      success : function(data) {
        if(data.error){
          Toast.fire({
            type: 'error',
            title: data.error
          });
        }
       
          $.each(data[0].personal_recibe, function (i, item) {
            //console.log(item);
            $('#tbpersonalcuadrilla').append('<tr><td>'+item.nombres+' '+item.apellido_paterno+' '+item.apellido_materno+'</td><td>'+item.puesto+'</td><td><a class="delete-user" title="Quitar" id="'+item.idtbl_usuarios_cuadrillas+'" style="cursor: pointer;"><i class="fa fa-trash"></i></a></tr>');
          });
      
      },
      error : function(data) {
        console.log(data);
      }
    })
    .done(function() {
      console.log("success");
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      $('.card-body').removeClass('load');
    });
    });


    $('#nuevaAsistencia').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='tipo']").val(recipient.tipo);
    });

    $(document).ready(function(){

        mostrarDatosAsistencias("",1);
            $("input[name='busquedaAsistencias']").keyup(function() {
            textoBuscar = $("input[name='busquedaAsistencias']").val();
            mostrarDatosAsistencias(textoBuscar,1);
        });

        $("body").on("click",".paginacionAsistencias li a",function(e) {
            e.preventDefault();
            valorHref = $(this).attr("href");
            valorBuscar = $("input[name='busquedaAsistencias']").val();
            mostrarDatosAsistencias(valorBuscar,valorHref); 
        });

    });

    function mostrarDatosAsistencias(valorBuscar, pagina) {
      $.ajax({
        url: "<?= base_url() ?>Asistencias/mostrarAsistencias",
        type: "POST",
        data: {
          buscar: valorBuscar,
          nropagina: pagina
        },
        dataType: "json",
        success: function(response) {
          filas = "";
          $('#tbasistencias tbody').html("");
          $.each(response.asistencias, function(key, item) {
              
            var fecha = new Date(item.fecha_hora);

            var mes_numero = parseInt(fecha.getMonth()) + 1;

            var date = parseInt(fecha.getDate());

            if(mes_numero >= 10){
                var mes_final = mes_numero.toString();
            }else{
                var mes_final = '0'+mes_numero.toString();
            }

            if(date >= 10){
              var date_final = date.toString();
            }else{
              var date_final = '0'+date.toString();
            }
            
              filas += "<tr>";
              filas += "<td>" + item.nombre + "</td>";
              filas += "<td>" + item.fecha_hora + "</td>";
              filas += "<td>" + item.tipo + "</td>";
              <?php if($this->session->userdata('tipo') == 5){ ?>
                filas += "<td><center><a href='" + "<?= base_url() ?>uploads/asistencias/"+fecha.getFullYear()+'-'+mes_final+'-'+date_final+"/" + item.tbl_users_idtbl_users + '-' +
                    item.tipo + '.jpg' + "' title='Foto'" +
                    "onClick=\"window.open(this.href, this.target, \'width=1000,height=800,left=0,top=0\'); return false;\"><i class='fa fa-picture-o'></i></a></center></td>";
              <?php } ?>
              filas += "</tr>";
              $('#tbasistencias tbody').html(filas);
            
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
          $(".paginacionAsistencias").html(paginador);
        }
      });
    }

  function mapaPosicionActual(){        
    var mapa = document.getElementById("mapa");
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition( success, error, options );
    function success(position) {
        console.log(position);
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
      
      mapa.innerHTML = '<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };
    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
    
    
  }
  mapaPosicionActual();
  
    $("#find_btn").click(function() {
      mapaPosicionActual();
    });

    function mapaPosicionActualLider(){        
    var mapa = document.getElementById("mapaLider");
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition( success, error, options );
    function success(position) {
        console.log(position);
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
      
      mapa.innerHTML = '<iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };
    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
    
    
  }
  mapaPosicionActualLider();
  
    $("#find_btn").click(function() {
      mapaPosicionActualLider();
    });
  
    $(document).on('click', '#confirmar', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajax"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea confirmar su asistencia?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                var latitud = $('#latitud').val();                
                if(latitud == null || latitud == ''){
                    Swal.fire(
                        'Error!',
                        'Debes permitir la ubicación',
                        'error'
                    );
                    return;
                }
                $.ajax({
                    url: "<?= base_url() ?>Asistencias/nuevaAsistencia",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });


    $(document).on('click', '#confirmarLider', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("formuploadajaxLider"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea confirmar su asistencias?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                var latitud = $('#latitud').val();                
                if(latitud == null || latitud == ''){
                    Swal.fire(
                        'Error!',
                        'Debes permitir la ubicación',
                        'error'
                    );
                    return;
                }
                $.ajax({
                    url: "<?= base_url() ?>Asistencias/nuevaAsistencia",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.modal-content').addClass('load');

                        //alert('hola');
                    },
                    success: function(res) {
                        console.log(res.error);
                        if (res.error == false) {
                            $('.ocultar').hide();
                            Swal.fire(
                                '¡Exitoso!',
                                res.mensaje,
                                'success'
                            );
                            
                            location.reload();
                            
                        } else {
                            Swal.fire(
                                'Error!',
                                res.message,
                                'error'
                            );
                        }
                    }
                })
                .done(function() {
    console.log("success");
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    $('.modal-content').removeClass('load');
  });
            }
    });
    });
</script>