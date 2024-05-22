<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.12/css/jquery.Jcrop.min.css" />
<script src="<?= base_url()?>js/jquery.Jcrop.js"></script>
<script src="<?= base_url()?>js/jquery.color.js"></script>
<section class="forms">  
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h3 class="h4">Perfil</h3>
      </div>
      <div class="card-body">
        <div class="over"></div>
        <div class="spinner" style="display: none">
          <div class="double-bounce1"></div>
          <div class="double-bounce2"></div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <div class="div-imagen">
              <?php if(isset($_SESSION['id_user_direccion']) && $this->session->userdata('id_user_direccion') != ''){ ?>
                <?php $carpeta = './uploads/'.$this->session->userdata('id_user_direccion'); if (file_exists($carpeta)): ?>
                <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/sin_imagen.png" alt="Foto Perfil">
              <?php else: ?>
                <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/<?= $this->session->userdata('id_user_direccion').'/'.$this->session->userdata('id_user_direccion').'-img.jpg'?>" alt="Foto Perfil">
              <?php endif ?>

              <a class="a-overlay" href="javascript:void(0);" data-toggle="modal" data-target="#cambiar-foto">
                <span class="text-overlay"><i class="fa fa-camera"></i> Cambiar Imagen</span>
              </a>
                <?php }else{ ?>
              <?php $carpeta = './uploads/'.$this->session->userdata('id'); if (!file_exists($carpeta)): ?>
                <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/sin_imagen.png" alt="Foto Perfil">
              <?php else: ?>
                <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/<?= $this->session->userdata('id').'/'.$this->session->userdata('id').'-img.jpg'?>" alt="Foto Perfil">
              <?php endif ?>

              <a class="a-overlay" href="javascript:void(0);" data-toggle="modal" data-target="#cambiar-foto">
                <span class="text-overlay"><i class="fa fa-camera"></i> Cambiar Imagen</span>
              </a>
                <?php } ?>

            </div><br>
            <h1><?= $this->session->userdata('nombre') ?></h1>
           

          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade bd-example-modal-lg" id="cambiar-foto" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <?= form_open_multipart('/personal/cambiar-foto', 'id="formuploadajax"'); ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Actualizar Imagen</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12 align-self-center">
              <label class="control-label">Imagen de perfil</label>
              <div id='error' style="color:red;"></div>
              <input type="file" class="filestyle" name='image' id='image' accept=".jpg">
            </div>
          </div>
          <!--Image Preview-->
          <div class='row'>
            <div class='col-12 imagen-recorte'>
              <img src="" class="crop" id="dp_preview" />
              <input type="hidden" id="x" name="x" />
              <input type="hidden" id="y" name="y" />
              <input type="hidden" name="x2" id="x2" />
              <input type="hidden" name="y2" id="y2" />
              <input type="hidden" id="w" name="w" />
              <input type="hidden" id="h" name="h" />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn btn-danger" id="cerrar" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Actualizar Imagen</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="<?= base_url()?>js/main.js"></script>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.js"></script>
<script type="text/javascript" src="<?= base_url()?>js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript">
  $('#image').filestyle({
    text : '&nbsp;Imagen',
    btnClass : 'btn-outline-info',
    htmlIcon : '<span class="fa fa-picture-o" aria-hidden="true"></span>'
  });
  $(function(){
    $("#formuploadajax").on("submit", function(e){
      e.preventDefault();
      var f = $(this);
      var formData = new FormData(document.getElementById("formuploadajax"));
      formData.append("dato", "valor");
      $.ajax({
        url: base_url+"personal/cambiar-foto",
        type: "post",
        dataType: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        complete: function(res){
          var resp = JSON.parse(res.responseText);
          if(resp.status){
            location.reload(true);
          }else{
            $("#error").html(resp.message);
          }
        }
      });
    });
  });
  $('#cerrar').click(function() {
    document.getElementById("formuploadajax").reset();
    $('.imagen-recorte').empty();
  });
  $('.a-overlay').click(function() {
    $('.imagen-recorte').html('<img src="" class="crop" id="dp_preview"><input type="hidden" id="x" name="x"><input type="hidden" id="y" name="y"><input type="hidden" name="x2" id="x2"><input type="hidden" name="y2" id="y2"><input type="hidden" id="w" name="w"><input type="hidden" id="h" name="h">');
  });
</script>

