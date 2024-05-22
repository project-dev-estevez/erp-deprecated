<section class="forms">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header d-flex align-items-center">
          <h3 class="h4">Nueva Entrada.</h3>
        </div>
        <div class="card-body">
        <div class="over"></div>
                    <div class="spinner" style="display: none">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
          <?= form_open('', 'class="needs-validation" novalidate id="guardar_entrada_explosion"'); ?>
            <div class="clearfix pt-md">
            
              
            
              <br>

              <div class="row">
                <div class="col">
                
                <h3 class="text-center">Material</h3>
                <table class="table table-bordered" id="material">
                  <thead class="text-center">
                    <tr>
                      <th>Neodata</th>
                      <th width="300">Descripcion</th>
                      <th>Unidad</th>
                      <th>Explosión solicitada</th>
                      <!--<th>Explosión otorgada</th>-->
                      <th>Cantidad Entrada</th>
                      <th>Restantes</th>
                      <th>Cantidad a ingresar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($detalle_explosiones as $material) { ?>
                    <tr>
                      <td><?= $material->neodata ?>                      
                      <input type="hidden" name="iddtl_almacen_entradas[]" class="form-control" value="<?= $material->iddtl_almacen_entradas ?>">   
                      <input type="hidden" name="idtbl_catalogo[]" class="form-control" value="<?= $material->idtbl_catalogo ?>">
                      <input type="hidden" name="categoria[]" class="form-control" value="<?= $material->ctl_categorias_idctl_categorias ?>">     
                      <input type="hidden" name="idtbl_almacen_movimientos[]" class="form-control" value="<?= $material->idtbl_almacen_movimientos ?>">     

                      </td>
                      <td><?= $material->descripcion ?></td>
                      <td><?= $material->unidad_medida_abr ?></td>
                      <!--<td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="hidden" value="<?= $material->cantidad_anterior ?>" name="cantidad_anterior[]"><?= $material->cantidad_anterior ?></td>-->
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="hidden" value="<?= $material->cantidad ?>" name="cantidad[]"><?= $material->cantidad ?></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="hidden" value="<?= $material->entregado ?>"><?= $material->entregado ?></td>
                      <td><input readonly style="font-size: 10px;text-align: center;" class="form-control" type="hidden" value="<?= $material->cantidad - $material->entregado ?>" name="restante[]"><?= $material->cantidad - $material->entregado ?></td>
                      <td><input type="number" style="font-size: 10px;text-align: center;" class="form-control" name="entrada[]" step="0.0001" required min="0.0000" max="" placeholder="Cantidad a ingresar" value="0"></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                </div>
              </div>
            
                <br>
              <div class="text-center">
              <?= form_hidden('id_almacen',$detalle_explosiones[0]->idtbl_almacenes) ?>
              <?= form_hidden('uid_almacen',$uid_almacen) ?>
              <input type="hidden" name="id_almacen_entrada" value="<?= $id_almacen[0]['idtbl_almacenes'] ?>">
                  <?= form_hidden('token',$token) ?>

                    <button type="button" id="finalizar_entrada" class="btn-info btn">Finalizar Entrada</button>
                
             
              </div>
            </div>
          <?=form_close()?>
        </div>
      </div>
    </div>
  </section>

  <div id="devolucion_material" tabindex="-1" role="dialog" aria-labelledby="labelEditarProducto" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
            <?= form_open(base_url() . 'almacen/devolver-material-generador') ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Verificar devolución</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">                
                <div class="row">                    
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>UID Devolución</label>
                            <input type="text" placeholder="UID" name="uid_devolucion" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" placeholder="0" name="idasignacion" class="form-control" required>
                    <input type="hidden" placeholder="0" name="uid_servicio" value="<?= $uid ?>" class="form-control" required>
                    <input type="hidden" placeholder="0" name="diferencia" class="form-control" required>
                    <input type="hidden" name="estatusanterior">
                </div>
            </div>
            <div class="modal-footer">
                <?= form_hidden('uid', '') ?>
                <?= form_hidden('token', $token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="submit" class="btn btn-primary ladda-submit" data-style="expand-right">Guardar</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    if($('input:radio[name=tipo_servicio]:checked').val() == 'F.O') {
          $(".wireless").css('display','none');
          $(".fo").css('display','block');
    }
    if($('input:radio[name=tipo_servicio]:checked').val() == 'Wireless') {
      $(".fo").css('display','none');
      $(".wireless").css('display','block');
    }
    $("input:radio[name=tipo_servicio]").click(function () {
        if($('input:radio[name=tipo_servicio]:checked').val() == 'F.O') {
          $(".wireless").css('display','none');
          $(".fo").css('display','block');
        }
        if($('input:radio[name=tipo_servicio]:checked').val() == 'Wireless') {
          $(".fo").css('display','none');
          $(".wireless").css('display','block');
        }
    });
  });
</script>

<script>
$('#devolucion_material').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);
    modal.find("input[name='idasignacion']").val(recipient.asignacion);
    modal.find("input[name='diferencia']").val(recipient.diferencia);
    modal.find("select[name='inventariado']").val(recipient.inventariado);
    modal.find("select[name='rack']").val(recipient.rack);
    modal.find("select[name='modulo']").val(recipient.modulo);
    modal.find("select[name='nivel']").val(recipient.nivel);
    modal.find("input[name='maximo']").val(recipient.maximo);
});
</script>

<script>
  function mapaPosicionActual(){
    <?php if($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){ ?>
    <?php if($detalle[0]->tbl_clientes_idtbl_clientes == 3){ ?>
      var mantenimiento = <?= $detalle[0]->idtbl_mantenimientos ?>;
      var map = L.map('mapa').setView([19.543574, -99.196460], 13);

      //L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        detectRetina: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);
             
    $.ajax({
      type:"POST",
      url:base_url+'almacen/getGeoreferencias',
      data:'id=' + mantenimiento,
      success:function(r) {
        let registros = eval(r);
        lat_a = registros[0]['lat_a'];
        lon_a = registros[0]['lon_a'];
        lat_b = registros[0]['lat_b'];
        lon_b = registros[0]['lon_b'];
        //alert(punto_a);
        L.marker([lat_a, lon_a]).addTo(map).bindPopup(
            'Inicio.'
        ).openPopup();
        
        if (lat_b != null && lon_b != null) {
            L.marker([lat_b, lon_b]).addTo(map).bindPopup(
                'Final.'
            ).openPopup();
        }
      }
    });

    <?php if ($detalle[0]->estatus == "SP") { ?>
      $.ajax({
      type:"POST",
      url:base_url+'almacen/getGeoreferenciasJustificadas',
      data:'id=' + mantenimiento,
      success:function(r) {
        let registros = eval(r);                       
        var dia = 1;
        var myIcon = L.icon({
            iconUrl: base_url + 'img/marker-green.png',
            iconSize: [25, 41],
            shadowUrl: base_url + 'img/marker-shadow.png',
            shadowSize: [55, 41],            
        });
        for(i = 0; i < registros.length; i++) {
          lat = registros[i]['latitud'];
          lon = registros[i]['longitud'];
          
          L.marker([lat, lon], {icon: myIcon}).addTo(map).bindPopup(
            'Día ' + dia
          ).openPopup();
          dia++;
        }
      }
    });
    <?php } ?>
                
    <?php }else{ ?>
      var map = L.map('mapa').setView([19.543574, -99.196460], 13);

      //L.tileLayer('https://maps.wikimedia.org/osm-intl/{z}/{x}/{y}.png', {
      L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        detectRetina: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      }).addTo(map);

      L.marker([19.543574, -99.196460]).addTo(map).bindPopup(
        'Primer punto.'
      ).openPopup();

      L.marker([19.549397, -99.037481]).addTo(map).bindPopup(
        'Segundo punto.'
      ).openPopup();
      <?php } ?>

    <?php }else{ ?>
    
    var mapa = document.getElementById("mapa");
    var options = {
      enableHighAccuracy: true,
      timeout: 6000,
      maximumAge: 0
    };
    navigator.geolocation.getCurrentPosition( success, error, options );
    function success(position) {
      <?php if ($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP") { ?>
        var coordenadas = position.coords;
        console.log('Tu posición actual es:');
        console.log('Latitud : ' + coordenadas.latitude);
        console.log('Longitud: ' + coordenadas.longitude);
        console.log('Más o menos ' + coordenadas.accuracy + ' metros.');
        document.getElementById("latitud").value = coordenadas.latitude;
        document.getElementById("longitud").value = coordenadas.longitude;
      <?php } ?>
      mapa.innerHTML = '<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=es&amp;q='+document.getElementById("latitud").value+','+document.getElementById("longitud").value+'&amp;t=&amp;z=19&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>'
    };
    function error(error) {
      console.warn('ERROR(' + error.code + '): ' + error.message);
    };
    <?php } ?>
    
  }
  mapaPosicionActual();
  <?php if($detalle[0]->estatus == "SV" || $detalle[0]->estatus == "SP"){ ?>
    $("#find_btn").click(function() {
      mapaPosicionActual();
    });
  <?php } ?>
</script>

<script>
  $("#traspasar").click(function(event){
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    event.preventDefault();    
    var inputs_justificado = $("#guardar_solicitud_servicio").find("input[name='cantidad_justificacion[]']");
    for(var r=0; r<inputs_justificado.length; r++){
      var input_justificado = inputs_justificado[r];
      //alert($(input_justificado).val());
    }
    
      Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de traspasar el material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/traspaso-brazo",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
    
  });


  $("#guardar_solicitud_servicio").submit(function(event){
    <?php if($this->session->userdata('tipo') == 9 || $this->session->userdata('tipo') == 21){ ?>
    var latitud = $('#latitud').val();
    //alert(latitud);
    if(latitud == null || latitud == ''){
      Toast.fire({
            type: 'error',
            title: '¡No has activado tu ubicación!'
        });
        return 0;
    }
    <?php } ?>
    var formData = new FormData(this);
    event.preventDefault();
    if(!this.checkValidity()){
      return;
    }
    var alert_flag = false;
    var inputs_justificado = $("#guardar_solicitud_servicio").find("input[name='cantidad_justificacion[]']");
    for(var r=0; r<inputs_justificado.length; r++){
      var input_justificado = inputs_justificado[r];
      if($(input_justificado).val() != $(input_justificado).data("value")){
        alert_flag = true;
      }
    }
    if(alert_flag){
      Swal.fire({
        title: '¡Atención!',
        text: "Hay cambios en la cantidad de justificación ¿Desea continuar?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
            guardarSolicitudServicio(formData);
        }
      });
    }else{
      Swal.fire({
        title: '¡Atención!',
        text: "¿Desea reportar el avance?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
      guardarSolicitudServicio(formData);
    });
    }
  });

  function guardarSolicitudServicio(formData){
    $.ajax({
      url: "<?= base_url() ?>almacen/guardarSolicitudServicio",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      complete: function(res) {
        var resp = JSON.parse(res.responseText);
        if (resp.error == false) {
          Swal.fire(
            '¡Exitoso!',
            resp.message,
            'success'
          );
          location.reload();
        } else {
          Toast.fire({
            type: 'error',
            title: resp.message
          });
        }
      }
    });
  }

  $('#finalizar').click(function(event) {
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de finalizar el generador?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/finalizarGenerador",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
  });

  $(document).on('click', '#finalizar_entrada', function(event) {        
        event.preventDefault();
        var _this=$(this);
        var formData = new FormData(document.getElementById("guardar_entrada_explosion"));
        Swal.fire({
        title: '¡Atención!',
        text: "¿Desea confirmar la entrada?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {
                //alert(this.id);
                var cantidad_inicial = $("#guardar_entrada_explosion input[name='restante[]'");
                var cantidad = $("#guardar_entrada_explosion input[name='entrada[]'");
                //var existencias = $("#guardar_entrada_explosion select[name='existencias[]']");
                for(var r=0; r<cantidad.length; r++){
                    console.log(">> ",cantidad[r].value,cantidad[r].max);
                    if(parseFloat(cantidad[r].value) > parseFloat(cantidad_inicial[r].value)){
                        $(cantidad[r]).css("border-color", "#d9534f");
                        Toast.fire({
                            type: 'error',
                            title: '¡La cantidad no puede ser mayor a la explosión!'
                        });
                        return 0;
                    }
                    
                }           
                
                $.ajax({
                    url: "<?= base_url() ?>Almacen/guardar_nueva_entrada_explosion",
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.card-body').addClass('load');

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
                            
                            window.location.replace("<?= base_url()?>almacen/detalle_almc/<?= $uid_almacen ?>");

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

  $('#verificar').click(function(event) {
    var formData = new FormData(document.getElementById("guardar_solicitud_servicio"));
    Swal.fire({
        title: '¡Atención!',
        text: "¿Esta seguro de verificar el generador?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
      }).
      then((result) => {
        if (result.value) {
          $.ajax({
            url: "<?= base_url() ?>almacen/verificarGenerador",
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            complete: function(res) {
              var resp = JSON.parse(res.responseText);
              if (resp.error == false) {
                Swal.fire(
                  '¡Exitoso!',
                  resp.message,
                  'success'
                );
                location.reload();
              } else {
                Toast.fire({
                  type: 'error',
                  title: resp.message
                });
              }
            }
          });
        }
      });
  });

  $('#aprobar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/aprobar_orden_servicio",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $('.ocultar').hide();
              Swal.fire(
                '¡Exitoso!',
                resp.mensaje,
                'success'
              )
              location.reload();
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        });
      }
    });
  });

  $('#cancelar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/cancelar_orden_servicio",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $('.ocultar').hide();
              Swal.fire(
                '¡Exitoso!',
                resp.mensaje,
                'success'
              )
              location.reload();
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        });
      }
    });
  });

  $('#modificar').click(function(event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById("formuploadajax"));
    Swal.fire({
      title: '¡Atención!',
      text: "¿Desea modificar y aprobar la orden de servicio?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
    }).
    then((result) => {
      if (result.value) {
        $.ajax({
          url: "<?= base_url() ?>servicios/modificar_aprobar_orden_servicio",
          type: "post",
          dataType: "json",
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          complete: function(res) {
            var resp = JSON.parse(res.responseText);
            if (resp.error == false) {
              $('.ocultar').hide();
              Swal.fire(
                '¡Exitoso!',
                resp.mensaje,
                'success'
              )
              location.reload();
            } else {
              Toast.fire({
                type: 'error',
                title: resp.mensaje
              })
            }
          }
        });
      }
    });
  });
</script>

<script>
  function openWin(obj) {
    event.preventDefault();
    myWindow = window.open(obj.getAttribute("href"), '_blank', 'width=1000,height=800,left=0,top=0');
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
  }
</script>