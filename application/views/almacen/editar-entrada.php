<section class="tables">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="h4">Entrada</h4>
            
          </div>
          <div class="card-body">
            <div class="grid-form">
              <fieldset>
                <div data-row-span="8">
                  <div data-field-span="1">
                    <label>Folio</label>
                    EA-<?= $detalle[0]->folio ?>
                  </div>
                  <div data-field-span="3">
                    <label>Fecha de creación</label>
                    <?= $detalle[0]->fecha ?>
                  </div>
                  <div data-field-span="4">
                    <label>Proyecto</label>
                    <?php if($detalle[0]->numero_proyecto != null && $detalle[0]->nombre_proyecto != null){ ?>
                    <?= $detalle[0]->numero_proyecto ?> - <?= $detalle[0]->nombre_proyecto ?>
                    <?php }else{ ?>
                      <?= $detalle[0]->almacen ?>
                    <?php } ?>
                  </div>
                </div>
                <div data-row-span="8">
                  <div data-field-span="2">
                    <label>Autor</label>
                    <?= $detalle[0]->nombre ?>
                  </div>
                  <div data-field-span="3">
                    <label>Segmento</label>
                    <?= $detalle[0]->nombre_segmento ?>
                  </div>
                </div>
                <?php echo form_open_multipart('', 'class="needs-validation" id="formuploadajax" novalidate'); ?>
                <div data-row-span="8">
                  <div data-field-span="8">
                    <label>Sitio</label>
                    <input type="text" name="sitio" class="form-control" value="<?= $detalle[0]->sitio ?>">
                  </div>                  
                </div>
                <?php if($detalle[0]->estatus == 2){ ?>
                <div data-row-span="8">
                  <div data-field-span="6">
                    <label>Motivo Cancelación</label>
                    <?= $detalle[0]->motivo_cancelacion ?>
                  </div>
                </div>
                <?php } ?>
              </fieldset>
            </div>
            <br><br>
           
              
            
            <table class="table table-striped table-bordered display responsive no-wrap" style="width:100%">
              <thead>
                <tr>
                  <th>Neodata</th>
                  <th>Descripción</th>
                  <th>Numero de serie</th>
                  <th>Numero Interno</th>                  
                  <th>Cantidad</th>                  
                  <th>Unidad</th>
                  <th>Precio</th>
                  <th>Tipo Moneda</th>
                </tr>
              </thead>
              <tbody>
              <?php $incompletos = 0; ?>
              <?php $productos_enviar = array(); ?>
              <?php $index = 0; ?>
                <?php foreach ($detalle as $key => $value) { ?>
                  <?php if ($value->tipo_moneda == 'p') {
                    $moneda = 'Pesos';
                  } else {
                    $moneda = 'Dolares';
                  } ?>                  
                  <tr>
                    <td><?= $value->neodata ?></td>
                    <td><?= $value->descripcion ?></td>
                    <td><?= $value->numero_serie ?></td>
                    <td><?= $value->numero_interno ?></td>
                    <?php if($value->modificado == 0){ ?>
                    <td><input type="number" class="form-control" name="nueva_cantidad[]" value="<?= $value->cantidad ?>">
                    <input type="hidden" class="form-control" name="anterior_cantidad[]" value="<?= $value->cantidad ?>">
                    <input type="hidden" class="form-control" name="id_detalle_movimiento[]" value="<?= $value->iddtl_almacen_entradas ?>">
                    <input type="hidden" class="form-control" name="producto[]" value="<?= $value->idtbl_catalogo ?>">
                    <input type="hidden" class="form-control" name="categoria[]" value="<?= $value->idctl_categorias ?>">
                    <input type="hidden" class="form-control" name="numero_serie[]" value="<?= $value->numero_serie ?>">
                    <input type="hidden" class="form-control" name="numero_interno[]" value="<?= $value->numero_interno ?>">
                    <input type="hidden" class="form-control" name="nota[]" value="<?= $value->nota ?>">
                    </td>
                    <?php }else{ ?>
                        <td><?= $value->cantidad ?></td>
                    <?php } ?>
                    <td><?= $value->unidad_medida_abr ?></td>
                    <td><?= $value->precio ?></td>
                    <td><?= $moneda ?></td>
                  </tr>
                  <?php $index++; ?>
                <?php } ?>
              </tbody>
            </table>
            <input type="hidden" class="form-control" name="tipo_entrada" value="<?= $detalle[0]->tipo_movimiento ?>">
            <input type="hidden" class="form-control" name="id_movimiento" value="<?= $detalle[0]->idtbl_almacen_movimientos ?>">
            <br><br>
            <?php if($value->modificado == 0){ ?>
            <button type="button" id="modificar" class="btn-info btn ocultar">Modificar</button>
            <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  <?php if($detalle[0]->movimiento_virtual == 3){ ?>
  $(document).ready(function() {    
    //event.preventDefault();
    //console.log("entro");   
    var tipo_almacen = 'sub';
    var id_almacen = $("#almacen_origen").val();           
    $("#formuploadajax input[name='idtbl_almacenes']")[0].value = id_almacen;
    $("#formuploadajax input[name='tipo_almacenes']")[0].value = tipo_almacen;    
    <?php for ($x = 0; $x < sizeof($productos_enviar); $x++) { ?>
      console.log("entro");
    $.ajax({      
        url: "<?= base_url() ?>almacen/getExistencias",
        type: "POST",
        data: "idtbl_catalogo=<?= $productos_enviar[$x]['idtbl_catalogo'] ?>&idtbl_almacenes=" + id_almacen + "&idctl_categorias=<?= $productos_enviar[$x]['idctl_categorias'] ?>",
        success: function(respuesta) {
            var jsonRespuesta = JSON.parse(respuesta);
            if((tipo_almacen != 'interno' || (tipo_almacen == 'interno' && jsonRespuesta.select == false)) && (tipo_almacen != 'sub' || (tipo_almacen == 'sub' && jsonRespuesta.select == false)) && (tipo_almacen != 'externo' || (tipo_almacen == 'externo' && jsonRespuesta.select == false))){
                //alert(id_almacen);
                //$("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                //var input;
                //if (jsonRespuesta.datos.length == 0) {
                //    input = "<input type='text' name='existencias[]' readonly class='form-control' value='0'>";
                    //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '0');
                //} else {
                //    input = "<input type='text' name='existencias[]' readonly class='form-control' value='" + jsonRespuesta.datos[0]['existencias'] + "'>";
                    //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max',jsonRespuesta.datos[0]['existencias']);
                //}
                //$("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }else{
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").html("");
                //$("#cantidad_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").attr('max', '1');
                var select = $("<select name='existencias[]' id='<?= $x ?>' onchange='getActivoFijo(this.id, this.value)' class='selectpicker' data-show-subtext='true' data-live-search='true'><option value=''>Seleccionar ...</option></select>");
                for(var r=0; r < jsonRespuesta.datos.length; r++){
                    select.append('<option value="' + jsonRespuesta.datos[r].iddtl_almacen + '" data-serie="'+jsonRespuesta.datos[r].numero_serie + '" data-interno="' + jsonRespuesta.datos[r].numero_interno +'">' + jsonRespuesta.datos[r].numero_serie + "</option>");                    
                    
                }
                var input = "<input type='hidden' class='form-control' min='0' name='entregado[]' id='entregado_<?= $x ?>' placeholder='cantidad' value='0' required>";
                //select.selectpicker();
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(select);
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?> .selectpicker").selectpicker("refresh");
                $("#d_<?= $productos_enviar[$x]["idtbl_catalogo"] ?>_<?= $x ?>").append(input);
            }
        }
    });
    
    
    <?php } ?>

});
<?php } ?>
</script>
<script>  
$('#aprobar').click(function(event) {
  event.preventDefault();
  $("#estatus").val('');
  $("#estatus").val('Aprobada');
  var formData = new FormData(document.getElementById("formuploadajax"));  
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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

$('#aprobar_traspaso').click(function(event) {
  event.preventDefault();
  var formData = new FormData(document.getElementById("formuploadajax"));
  var entregado = $("#formuploadajax input[name='entregado[]']");
  var cantidad = $("#formuploadajax input[name='cantidad[]']");  
  for(var r=0; r<entregado.length; r++){       
            if(parseFloat(entregado[r].value) > parseFloat(entregado[r].max)){
                $(entregado[r]).css("border-color", "#d9534f");
                Toast.fire({
                    type: 'error',
                    title: '¡La cantidad no puede ser mayor a la cantidad de traspaso!'
                });
                return 0;
            }   
            if(isNaN(parseFloat(entregado[r].value))){
              $(entregado[r]).css("border-color", "#d9534f");
              Toast.fire({
                type: 'error',
                title: '¡La cantidad inválida!'
              });
              return 0;
            }         
        }
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea aprobar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-almacen-cliente",
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
                          resp.mensaje,
                          'success'
                      )
                      location.reload();
                  } else {
                      Toast.fire({
                          type: 'error',
                          title: resp.mensaje
                      });
                  }
              }
          });
      }
  });
});

$('#cancelar').click(function(event) {
  event.preventDefault();
  $("#estatus").val('');
  $("#estatus").val('Cancelada');
  var formData = new FormData(document.getElementById("formuploadajax"));
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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

$('#cancelar_entrada').click(function(event) {
  event.preventDefault();  
  $("#estatus_entrada").val('');
  $("#estatus_entrada").val('Cancelada');  
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      input: 'text',
      inputPlaceholder: 'Motivo Cancelación',
      inputAttributes: {
      autocapitalize: 'off'
      },
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar',
      preConfirm: (motivo) => {
    
  },
  }).then((result) => {
    console.log(result.value);
      if (result.value) {
        $("#motivo").val(result.value);
        var formData = new FormData(document.getElementById("formuploadajax"));
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-manual",
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

$('#cancelar_traspaso').click(function(event) {
  event.preventDefault();
  $("#estatus").val('');
  $("#estatus").val('Cancelada');
  var formData = new FormData(document.getElementById("formuploadajax"));
  Swal.fire({
      title: '¡Atención!',
      text: "¿Desea cancelar la entrada de material?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#2b8e68',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Continuar'
  }).then((result) => {
      if (result.value) {
          $.ajax({
              url: "<?= base_url() ?>almacen/guardar-nueva-entrada-almacen-cliente",
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
        text: "¿Desea modificar la entrada de material?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2b8e68',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Continuar'
    }).then((result) => {
        if (result.value) {            
                $.ajax({
                    url: "<?= base_url() ?>almacen/editar-entrada-almacen-cliente",
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
            //}
        }
    })
});
</script>

<script>
  function getActivoFijo(id, value){
      //alert(id);
      if(value != '' && value != null){        
        var serie = $('#'+id).find(':selected').data('serie');
        var interno = $('#'+id).find(':selected').data('interno');
      
        $('#serie_'+id).val(serie);
        $('#interno_'+id).val(interno);
        $('#entregado_'+id).val(1);
      }else{
        $('#serie_'+id).val('');
        $('#interno_'+id).val('');
        $('#entregado_'+id).val(0);
      }
      
    }
</script>