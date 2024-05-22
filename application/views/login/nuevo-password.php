<!-- Modal HTML -->
<div id="myModal" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva Contraseña</h4>
                <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
            </div>
            <div class="modal-body">
                <h6 class="text-danger">Se ha detectado que se ha restablecido su contraseña, por seguridad, digite una nueva.</h6>
                <form id="update-password">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i style="font-size: 35px;" class="fa fa-lock"></i></span>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Nueva Contraseña">
                        </div>
                    </div>
                    <div class="form-group">
                        <a style="text-decoration: none;" href="javascript:void();" onclick="updatePassword()" class="btn btn-primary btn-block btn-sm">Cambiar Contraseña</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $( document ).ready(function() {
        $('#myModal').modal('toggle')
    });
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  function updatePassword(){
      event.preventDefault();
      var formData = new FormData(document.getElementById("update-password"));
      Swal.fire({
          title: '¡Atención!',
          text: "¿Desea restablecer la contraseña de este usuario?",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#2b8e68',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancelar',
          confirmButtonText: 'Continuar'
      }).then((result) => {
          if (result.value) {
              $.ajax({
                  url: "<?= base_url()?>root/resetPassword",
                  type: "POST",
                  dataType: "json",
                  data: formData,
                  cache: false,
                  contentType: false,
                  processData: false,
                  success: function(data) {
                    if(data.error_validation) {
                      Toast.fire({
                        type: 'error',
                        title: data.password_error
                      });
                    }
                    if(data.update_password) {
                      Toast.fire({
                        type: 'success',
                        title: data.message
                      });
                      setTimeout('document.location.reload()',3000);
                    }
                    if(data.error) {
                      Toast.fire({
                        type: 'error',
                        title: data.message
                      });
                    } 
                  }
              });
          }
      })
  }
</script>
