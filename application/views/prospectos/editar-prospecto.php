<style type="text/css">
  /* Mimic table appearance */
  div.table {
    display: table;
  }
  div.table .file-row {
    display: table-row;
  }
  div.table .file-row > div {
    display: table-cell;
    border-top: 1px solid #ddd;
    padding: 8px;
  }
  div.table .file-row:nth-child(odd) {
    background: #f9f9f9;
  }
  
  /* The total progress gets shown by event listeners */
  #total-progress {
    opacity: 0;
    transition: opacity 0.3s linear;
  }
  
  /* Hide the progress bar when finished */
  #previews .file-row.dz-success .progress {
    opacity: 0;
    transition: opacity 0.3s linear;
  }

  /* Hide the delete button initially */
  #previews .file-row .delete {
    display: none;
  }

  /* Hide the start and cancel buttons and show the delete button */
  #previews .file-row.dz-success .start,
  #previews .file-row.dz-success .cancel {
    display: none;
  }
  #previews .file-row.dz-success .delete {
    display: block;
  }
  .row legend {
    border: none;
    border-bottom: 1px solid #eeeeee;
    color: #404040;
    font-size: 16px;
    font-weight: 400;
    padding-bottom: 5px;
    position: static;
    width: 100%;
  }
</style>
<link href="<?= base_url()?>css/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">
<section class="forms">
  <div class="container-fluid">
    <?= validation_errors('<span class="text-danger">', '</span>'); ?>
    <?= form_open(base_url().'vacantes/prospectos/editar/'.$this->uri->segment(4), 'class="needs-validation" novalidate'); ?>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Editar Prospecto</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="form-group col-sm-12"><legend>Datos personales</legend></div>
          <div class="form-group col-sm-6">
            <label>Nombre(s)*</label>
            <input type="text" class="form-control" name="nombres" value="<?= $todo['prospecto']['nombre']?>" disabled>
          </div>
          <div class="form-group col-sm-6">
            <label>Apellidos*</label>
            <input type="text" class="form-control" name="apellidos" value="<?= $todo['prospecto']['apellidos']?>" disabled>
          </div>
          <div class="form-group col-sm-6">
            <label>E-mail</label>
            <input type="email" class="form-control" name="email" value="<?= $todo['prospecto']['email']?>" disabled>
          </div>
          <div class="form-group col-sm-3">
            <label>Fecha de Nacimiento*</label>
            <input type="text" class="form-control" name="fecha_nacimiento" value="<?= date("d-m-Y",strtotime($todo['prospecto']['fecha_nacimiento'])); ?>" disabled>
          </div>
          <div class="form-group col-sm-3">
            <label>Teléfono*</label>
            <input type="text" class="form-control" name="telefono" value="<?= $todo['prospecto']['telefono']?>" disabled>
          </div>
          <div class="form-group col-sm-12"><legend>Dirección</legend></div>
          <div class="form-group col-sm-12">
            <label>Dirección*</label>
            <textarea name="calle" class="form-control" disabled><?= $todo['prospecto']['direccion']?></textarea>
          </div>
          <div class="form-group col-sm-6">
            <label>Estado*</label>
            <input type="text" class="form-control" name="estado" value="<?= $todo['direccion']['estado']?>" disabled>
          </div>
          <div class="form-group col-sm-6">
            <label>Municipio*</label>
            <input type="text" class="form-control" name="municipio" value="<?= $todo['direccion']['municipio']?>" disabled>
          </div>
          <div class="form-group col-sm-12"><legend>Detalles</legend></div>
          <div class="form-group col-sm-4">
            <label>Escolaridad*</label>
            <input type="text" class="form-control" name="escolaridad" value="<?= $todo['prospecto']['escolaridad']?>" disabled>
          </div>
          <div class="form-group col-sm-4">
            <label>Especialidad</label>
            <input type="text" class="form-control" name="especialidad" value="<?= $todo['prospecto']['especialidad']?>" disabled>
          </div>
          <div class="form-group col-sm-4">
            <label>Fecha de Entrevista*</label>
            <input type="datetime-local" class="form-control" name="fecha_entrevista" id="fecha_entrevista" value="<?= strftime("%FT%T", strtotime($todo['prospecto']['fecha_entrevista'])) ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Resultados de Psicometría</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <div class="row">

          <div class="form-group col-sm-12"><legend>Machover</legend></div>
          <div class="form-group col-sm-12">
            <label>Machover *</label>
            <textarea name="matchover" class="form-control" rows="3" required minlength="5"><?= ($num_resultados != 0) ? $resultados['machover'] : set_value('matchover')?></textarea>
          </div>

          
          <div class="form-group col-sm-12"><legend>Human Site - Valores</legend></div>
          <div class="form-group col-sm-4">
            <label>Teórico *</label>
            <input type="text" class="form-control decimals" name="teorico" required min="0" value="<?= ($num_resultados != 0) ? $resultados['hs_v_teorico'] : set_value('teorico')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Económico *</label>
            <input type="text" class="form-control decimals" name="economico" required min="0" value="<?= ($num_resultados != 0) ? $resultados['hs_v_economico'] : set_value('economico')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Artístico </label>
            <input type="text" class="form-control decimals" name="artisitico" required min="0" value="<?= ($num_resultados != 0) ? $resultados['hs_v_artistico'] : set_value('artisitico')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Social *</label>
            <input type="text" class="form-control decimals" name="social" min="0" required value="<?= ($num_resultados != 0) ? $resultados['hs_v_social'] : set_value('social')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Político *</label>
            <input type="text" class="form-control decimals" name="politico" min="0" required value="<?= ($num_resultados != 0) ? $resultados['hs_v_politico'] : set_value('politico')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Regulatorio*</label>
            <input type="text" class="form-control decimals" name="regulatorio" min="0" required value="<?= ($num_resultados != 0) ? $resultados['hs_v_regulatorio'] : set_value('regulatorio')?>">
          </div>
          
          <div class="form-group col-sm-12"><legend>Human Site - Intereses</legend></div>
          <div class="form-group col-sm-4">
            <label>Análisis*</label>
          <input type="text" class="form-control decimals" name="analisis" required min="0" value="<?= ($num_resultados != 0) ? $resultados['hs_i_analisis'] : set_value('analisis')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Visión*</label>
          <input type="text" class="form-control decimals" name="vision" required min="0" value="<?= ($num_resultados != 0) ? $resultados['hs_i_vision'] : set_value('vision')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Intuición*</label>
          <input type="text" class="form-control decimals" name="intuicion" min="0" required value="<?= ($num_resultados != 0) ? $resultados['hs_i_intuicion'] : set_value('intuicion')?>">
          </div>
          <div class="form-group col-sm-4">
            <label>Lógica*</label>
          <input type="text" class="form-control decimals" name="logica" min="0" required value="<?= ($num_resultados != 0) ? $resultados['hs_i_logica'] : set_value('logica')?>">
          </div>

          <div class="form-group col-sm-12"><legend>Wonderlic</legend></div>
          <div class="form-group col-sm-3">
            <label>Puntaje*</label>
            <input type="text" class="form-control decimals" name="puntaje" <?= ($num_resultados == 0) ? 'required' : ''?> min="0" value="<?= ($num_resultados == 0) ? set_value('puntaje') : ''?>">
          </div>
          <div class="form-group col-sm-3">
            <label>Edad*</label>
            <?php $anio_nacimiento=date("Y",strtotime($todo['prospecto']['fecha_nacimiento'])); $anio_actual=date("Y"); ?>
            <input type="text" class="form-control" name="edad" disabled value="<?= $anio_actual - $anio_nacimiento?>">
          </div>
          <div class="form-group col-sm-3 align-self-end text-center">
            <input type="radio" class="radio-template" name="opcion" <?= ($num_resultados == 0) ? 'required' : ''?> <?= set_radio('opcion', '1')?> checked value="1">
            <label for="opcion">1</label>
            &nbsp;&nbsp;
            <input type="radio" class="radio-template" name="opcion" <?= ($num_resultados == 0) ? 'required' : ''?> <?= set_radio('opcion', '2')?> value="2">
              <label for="opcion">2</label>
          </div>
          <div class="form-group col-sm-3">
            <label>Resultado*</label>
            <input type="text" class="form-control" name="resultado" disabled value="<?= ($num_resultados != 0) ? $resultados['wonderlic'] : ''?>">
          </div>

          <div class="form-group col-sm-12"><legend>Claaver</legend></div>
          <div class="form-group col-sm-3">
            <label>D*</label>
            <input type="text" class="form-control decimals" name="d" min="0" required value="<?= ($num_resultados != 0) ? $resultados['claaver_d'] : set_value('d')?>">
          </div>
          <div class="form-group col-sm-3">
            <label>I*</label>
            <input type="text" class="form-control decimals" name="i" min="0" required value="<?= ($num_resultados != 0) ? $resultados['claaver_i'] : set_value('i')?>">
          </div>
          <div class="form-group col-sm-3">
            <label>S*</label>
            <input type="text" class="form-control decimals" name="s" min="0" required value="<?= ($num_resultados != 0) ? $resultados['claaver_s'] : set_value('s')?>">
          </div>
          <div class="form-group col-sm-3">
            <label>C*</label>
            <input type="text" class="form-control decimals" name="c" min="0" required value="<?= ($num_resultados != 0) ? $resultados['claaver_c'] : set_value('c')?>">
          </div>

          <div class="form-group col-sm-12"><legend>Observaciones</legend></div>
          <div class="form-group col-sm-12">
            <label>Observaciones*</label>
            <textarea name="observaciones" class="form-control" rows="3" required minlength="5"><?= ($num_resultados != 0) ? $resultados['observaciones'] : set_value('observaciones')?></textarea>
          </div>

          <div class="form-group col-sm-12"><legend>Moss</legend></div>
          <div class="form-group col-sm-3 col-md-4">
            <label>Percentil *</label>
            <input type="text" class="form-control decimals" name="percentil" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_percentil'] : set_value('percentil')?>">
          </div>
          <div class="form-group col-sm-3 col-md-4">
            <label>Rango *</label>
            <input type="text" class="form-control decimals" name="rango" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_rango'] : set_value('rango')?>">
          </div>
          <div class="form-group col-sm-6 col-md-4">
            <label>Habilidades de Supervisión*</label>
            <input type="text" class="form-control decimals" name="supervision" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_hs'] : set_value('supervision')?>">
          </div>
          <div class="form-group col-sm-6">
            <label>Capacidad de Decisión en las Relaciones Humanas *</label>
            <input type="text" class="form-control decimals" name="humanas" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_cdrh'] : set_value('humanas')?>">
          </div>
          <div class="form-group col-sm-6">
            <label>Capacidad de Evaluación de Problemas Interpersonales *</label>
            <input type="text" class="form-control decimals" name="pinterpersonales" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_cepi'] : set_value('pinterpersonales')?>">
          </div>
          <div class="form-group col-sm-6">
            <label>Habilidades para Establecer Relaciones Interpersonales *</label>
            <input type="text" class="form-control decimals" name="rinterpersonales" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_heri'] : set_value('rinterpersonales')?>">
          </div>
          <div class="form-group col-sm-6">
            <label>Sentido Común y Tacto en las Relaciones Interpersonales *</label>
            <input type="text" class="form-control decimals" name="sentido" min="0" required value="<?= ($num_resultados != 0) ? $resultados['moss_sctri'] : set_value('sentido')?>">
          </div>

        </div>

        <br><br>
        <div class="clearfix pt-md">
          <div class="pull-right">
            <?php $link=preg_split("/-/",$this->uri->segment(4),2); ?>
            <a href="<?= base_url()?>vacantes/prospectos/<?= $link[0]?>" class="btn-default btn">Cancelar</a>
            <?= form_hidden('token',$token) ?>
            <button type="submit" class="btn-primary btn">Enviar Datos</button>
          </div>
        </div>
        
      </div>
    </div>
    <?=form_close()?>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Documentos</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <div class="row" id="actions">
          <div class="col-sm-12 col-md-8">
            <span class="btn btn-outline-success fileinput-button dz-clickable">
              <i class="fa fa-plus"></i> Agregar archivos
            </span>
            <button type="submit" class="btn btn-outline-primary start">
              <i class="fa fa-upload"></i> Subir
            </button>
            <button type="reset" class="btn btn-outline-warning cancel">
              <i class="fa fa-trash"></i> Cancelar
            </button>
          </div>
          <div class="col-sm-12 col-md-4">
            <!-- The global file processing state -->
            <span class="fileupload-process">
              <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress=""></div>
              </div>
            </span>
          </div>
        </div><br>
        <div class="table table-striped" class="files" id="previews">
          <div id="template" class="file-row">
            <!-- This is used as the file preview template -->
            <div>
              <a class="links1" href="#" target="_blank">
                <span class="preview"><img data-dz-thumbnail /></span>
              </a>
            </div>
            <div>
              <a class="links2" href="#" target="_blank">
                <p class="name" data-dz-name></p>
              </a>
              <strong class="error text-danger" data-dz-errormessage></strong>
            </div>
            <div>
              <p class="size" data-dz-size></p>
              <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
              </div>
            </div>
            <div>
              <button class="btn btn-primary start primer">
                <i class="glyphicon glyphicon-upload"></i> Subir
              </button>
              <button data-dz-remove class="btn btn-warning cancel primer">
                <i class="glyphicon glyphicon-ban-circle"></i> Cancelar
              </button>
              <button data-dz-remove class="btn btn-danger delete" enviar="">
                <i class="glyphicon glyphicon-trash"></i> Eliminar
              </button>
            </div>
          </div>
          <?php if (!empty($imgenes)): ?>
            <?php foreach ($imgenes as $imagen): ?>
              <div id="" class="file-row dz-image-preview dz-processing dz-success">
                <!-- This is used as the file preview template -->
                <div>
                  <span class="preview">
                    <?php if ($imagen['ext'] == 'jpg' || $imagen['ext'] == 'jpeg' || $imagen['ext'] == 'gif' || $imagen['ext'] == 'png' || $imagen['ext'] == 'svg'): ?>
                      <a href="<?= base_url()?>uploads/<?= $uidprosecto.'/'.$imagen['nombre']?>" target="_blank">
                        <img data-dz-thumbnail alt="<?= $imagen['nombre']?>" src="<?= base_url()?>uploads/<?= $uidprosecto.'/'.$imagen['nombre']?>" width="80px" height="80px" />
                      </a>
                    <?php endif ?>
                  </span>
                </div>
                <div>
                  <a href="<?= base_url()?>uploads/<?= $uidprosecto.'/'.$imagen['nombre']?>" target="_blank">
                    <p class="name" data-dz-name><?= $imagen['nombre']?></p>
                  </a>
                  <strong class="error text-danger" data-dz-errormessage></strong>
                </div>
                <div>
                  <p class="size" data-dz-size><strong><?= $imagen['tamano']?></strong> KB</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                    <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                  </div>
                </div>
                <div>
                  <button class="btn btn-primary start primer" style="display: none;">
                    <i class="glyphicon glyphicon-upload"></i> Subir
                  </button>
                  <button data-dz-remove class="btn btn-warning cancel primer" style="display: none;">
                    <i class="glyphicon glyphicon-ban-circle"></i> Cancelar
                  </button>
                  <button data-dz-remove class="btn btn-danger delete" enviar="<?= $imagen['nombre']?>">
                    <i class="glyphicon glyphicon-trash"></i> Eliminar
                  </button>
                </div>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Convertir a Usuario</h3>
      </div>
      <div class="card-body">
        <?php 
          $arrayUri=array(
            'i' => urlencode($uidprosecto),
            'nombres' => rawurlencode($todo['prospecto']['nombre']),
            'apellidos' => rawurlencode($todo['prospecto']['apellidos']),
            'email' => urlencode($todo['prospecto']['email']),
            'fecha_nacimiento' => urlencode($todo['prospecto']['fecha_nacimiento']),
            'telefono' => urlencode($todo['prospecto']['telefono']),
            'municipio' => urlencode($todo['prospecto']['tbl_municipio_idtbl_municipio'].'-'.$todo['direccion']['entidad']),
            'perfil' => urlencode($todo['idPerfil'].'-'.$todo['idDepa']),
            'calle' =>  rawurlencode( $todo['prospecto']['direccion'] )
          );
        ?>
        <a class="btn btn-success btn-block" href="<?= base_url().'usuarios/nuevo/'.$this->uri->assoc_to_uri($arrayUri)?>" role="button">Convertir</a>
      </div>
    </div>
  </div>
</section>
<script src="<?= base_url()?>js/dropzone.js"></script>
<script src="<?= base_url()?>js/jquery.bootstrap-touchspin.js"></script>
<script type="text/javascript">
  var uid = '<?= $this->uri->segment(4)?>';
  var uidprosecto ='<?= $uidprosecto?>';
  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);
  
  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: base_url+"vacantes/prospectos/archivos/"+uid, // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.

  });
  
  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });
  
  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });
  
  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });
  
  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });
  myDropzone.on("complete", function(file) {
    var resp = JSON.parse(file.xhr.responseText);
      if (file.status == 'success' && resp.status) {
        file.previewElement.querySelector(".preview img").setAttribute("alt", resp.txt);
        file.previewElement.querySelector(".name").innerHTML=resp.txt;
        file.previewElement.querySelector(".delete").setAttribute("enviar", resp.txt);
        var onclick = base_url+'uploads/'+uidprosecto+'/'+resp.txt;
        file.previewElement.querySelector(".links1").setAttribute("href", onclick);
        file.previewElement.querySelector(".links2").setAttribute("href", onclick);
        $(".delete").show();
        $(".primer").hide();
      } else {  
        $(file.previewElement).find('.dz-error-message').text(resp.txt);
        $(".primer").show();
        $(".delete").hide();
      }
  });
  myDropzone.on("removedfile",function (file) {
    $.ajax({
      url: base_url + "prospecto/archivo-eliminar/" + uid,
      method: "POST",
      dataType: "json",
      data: { nombre: file.previewElement.querySelector(".delete").getAttribute("enviar") },
      complete: function (res) {
        var resp = res.responseText;
        if (resp.status) {
          file.previewElement.querySelector(".file-row").hide(750);
        }
      }
    });
  });
  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  $(function () {
    $('.delete').click(function (e) {
      var _this = $(this);
      $.ajax({
       url: base_url + "prospecto/archivo-eliminar/" + uid,
       method: "POST",
       dataType: "json",
       data: { nombre: $(this).attr("enviar") },
       complete: function (res) {
         var resp = JSON.parse(res.responseText);
         if (resp.status) {
           $(_this).closest( ".file-row").hide(700);
         }
       }
      });
    });
  });
  $(".decimals").TouchSpin({
    verticalbuttons: true,
    verticalupclass: 'fa fa-plus',
    verticaldownclass: 'fa fa-minus',
    min: 0,
    step: 0.01,
    decimals: 2
  });
</script>