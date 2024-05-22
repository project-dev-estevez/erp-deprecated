
<?php if ($this->session->flashdata('pass')): ?>
  <section class="no-padding">
    <div class="container-fluid pt-5">
      <div class="row">
        <div class="col">
          <div class="alert alert-success" role="alert">
            Usuario: <?= $this->session->flashdata('username') ?> Password: <?= $this->session->flashdata('pass') ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>
<section class="projects">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Usuarios</h4>
      </div>
      <div class="card-body">
        <div class="float-right">
          <input type="text" class="form-control" placeholder="Buscar" name="busqueda">
        </div>
        <a href="<?php echo base_url() ?>root/excel-usuarios" class="btn btn-secondary buttons-excel buttons-html5 btn-info" tabindex="0" aria-controls="data-table"><span><i class="fa fa-file-excel-o"></i> Exportar a Excel</span></a>
        <table class="table table-striped table-sm table-hover" id="tbusuarios">
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Username</th>
              <th>Tipo</th>
              <th>Acciones</th>              
            </tr>
          </thead>
          <tfoot>
            <th>#</th>
            <th>Nombre</th>
            <th>Username</th>
            <th class="estatus">Tipo</th>
            <th>Acciones</th>            
          </tfoot>
          <tbody>
            <!--<?php foreach ($usuarios as $key): ?>
            <tr>
              <td><?= $key['uid'] ?></td>
              <td><?= $key['nombre'] ?></td>
              <td><?= $key['username'] ?></td>
              <td><?= $key['tipo'] ?></td>
              <td><a href="<?= base_url()?>root/editarusuario/<?= $key['uid']?>">Editar</a></td>
              <td><a onclick="resetPassword(<?= $key['uid'] ?>)" href="javscript:void();">Restablecer Contraseña</a></td>
            </tr>
            <?php endforeach ?>-->
          </tbody>
        </table>
        <br>
        <div class="paginacion">

        </div>
      </div>
    </div>
  </div>
  <div id="changePassword" tabindex="-1" role="dialog" aria-labelledby="labelchangePassword" aria-hidden="true"
    class="modal fade text-left">
    <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
        <?php echo form_open_multipart('class="needs-validation" id="formpasswd" novalidate'); ?>
            <div class="modal-header">
                <h4 id="labelEditarProducto" class="modal-title">Cambiar Contraseña</h4>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <label>Nueva Contraseña*</label>
                            <input type="password" class="form-control" name="passwd" id ="passwd" placeholder="Contraseña" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="uid" id="uid_user">
                <?= form_hidden('uid','') ?>
                <?= form_hidden('token',$token) ?>
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnPass">Guardar</button>
            </div>
            <?=form_close()?>
        </div>
    </div>
</div>
</section>
<?php if($this->session->userdata('tipo') == 0){ ?>
<section class="projects">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header d-flex align-items-center">
        <h4 class="h4">Nuevo Usuario</h4>
      </div>
      <div class="card-body">
        <form class="needs-validation" novalidate action="<?= base_url()?>root/nuevousuario" method="post">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <label for="validationCustom01">Nombre</label>
              <input type="text" class="form-control" name="nombre" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupPrepend">@</span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username"
                  aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationCustomUsername">Tipo</label>
              <select name="tipo" class="form-control" required>
                <option value="" selected disabled>Seleccione...</option>
                <?php foreach ($tipos as $key => $value) : ?>
                  <option value="<?= $value->idctl_tipo_users ?>"><?= $value->tipo ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <?php foreach ($permisos as $key => $value): ?>
            <div class="form-row">
              <div class="col">
                <label for="validationCustom01">Modulo</label>
                <input type="text" class="form-control" name="" value="<?= $value->leyenda ?>" disabled>
                <input type="hidden" class="form-control" name="ctl_permisos_idctl_permisos[]"
                  value="<?= $value->idctl_permisos ?>" readonly>
              </div>
              <div class="col">
                <label for="validationCustom01">Permiso</label>
                <select name="ctl_tipo_permiso_idctl_tipo_permiso[]" class="form-control">
                  <option value="0" selected>Seleccione...</option>
                  <option value="1">Lectura</option>
                  <option value="2">Escritura</option>
                  <option value="3">Edición</option>
                </select>
              </div>
            </div>
          <?php endforeach ?>
          <?= form_hidden('token',$token) ?>
          <button class="btn btn-primary" type="submit">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<script>
$('#changePassword').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data() // Extract info from data-* attributes    
    console.log(recipient)
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find("input[name='uid']").val(recipient.uid);

});
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  $("#btnPass").on("click", function(e) {
      if ( ($("#passwd").val() == '' || $("#passwd").val() == null)) {
          Toast.fire({
            type: 'error',
            title: '¡El campo contraseña es obligatorio!'
          });
          return 0;
        }
        if ($("#passwd").val().length <= 7) {
          Toast.fire({
            type: 'error',
            title: '¡La longitud debe ser de al menos 6 carácteres!'
          });
          return 0;
        }
        var password = $('#passwd').val();
        var id = $('#uid_user').val();
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
                  type: "post",
                  data: "password="+password+"&id="+id,
                  dataType: "json",
                  success: function(data) {
                    
                    if(data.update_password) {
                      Toast.fire({
                        type: 'success',
                        title: data.message
                      });
                      location.reload();
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
  });
</script>
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
      url: "<?= base_url() ?>Root/mostrarUsuarios",
      type: "POST",
      data: {buscar:valorBuscar,nropagina:pagina},
      dataType: "json",
      success:function(response) {
        filas = "";
        $.each(response.usuarios,function(key,item) {
          if (item.estatus == 1) {
                    var check = 'checked';
                } else {
                    var check = '';
                }
          filas += "<tr><td>" + item.uid + "</td><td>" + item.nombre + "</td><td>" + item.username + "</td><td>" + item.tipo + "</td>";
          filas += "<td>";
          <?php if($this->session->userdata('tipo') == 0){ ?>
          filas += "<a title='Editar' href='" + "<?= base_url()?>root/editarusuario/" + item.uid + "'><i class='fa fa-edit'></i></a>" + "</a>";
          <?php } ?>
          filas += "<a href='#changePassword' data-toggle='modal' title='Restablecer Contraseña'";
                filas += "data-uid='" + item.uid + "'";
                filas += "><i class='fa fa-refresh'></i></a>";
          <?php if($this->session->userdata('tipo') == 0){ ?>
          filas += "<a title='Editar Modulos' href='" + "<?= base_url()?>root/editarModulos/" + item.uid + "'><i class='fa fa-window-restore'></i></a>" + "</a></td>";
          <?php } ?>
          filas += "</td>";
          <?php if($this->session->userdata('tipo') == 0){ ?>
          filas += "<td>" + "<div class='custom-control custom-switch'><input type='checkbox' class='custom-control-input' value='true' id='" + item.uid + "' onchange='changeStatusUser(this.value,\"" + item.uid + "\")' " + check + "><label class='custom-control-label' for='" + item.uid + "'></label></div>" + "</td></tr>";
          <?php } ?>
        });
        $('#tbusuarios tbody').html(filas);
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

<script>
function changeStatusUser(valor, uid) {
    if (document.getElementById(uid).checked == true) {
        console.log(uid);
        console.log(valor);
        
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea activar el usuario?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>root/activar-usuario",
                    type: "post",
                    data: "uid=" + uid,
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>root";
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = false;
            }
        });
    } else {
        console.log(uid);
        console.log(valor);
        Swal.fire({
            title: '¡Atención!',
            text: "¿Desea desactivar el usuario?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#2b8e68',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: "<?= base_url()?>root/desactivar-usuario",
                    type: "post",
                    data: {
                        uid: uid
                    },
                    complete: function(res) {
                        var resp = JSON.parse(res.responseText);
                        if (resp.error == false) {
                            Swal.fire(
                                '¡Exitoso!',
                                resp.mensaje,
                                'success'
                            ).then((ok) => {
                                location.href = "<?= base_url() ?>root";
                            });
                        } else {
                            Toast.fire({
                                type: 'error',
                                title: resp.mensaje
                            })
                        }
                    }
                });
            } else {
                document.getElementById(uid).checked = true;
            }
        });
    }

}
</script>