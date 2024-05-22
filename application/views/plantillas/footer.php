            <!-- Page Footer-->
         
          </div>
    </div>

</div><!-- Page-->
    <!-- Javascript files-->
    <script src="<?= base_url(); ?>node_modules/socket.io-client/dist/socket.io.js"></script>
    <!--<script type="text/javascript" src="https://cdn.socket.io/4.2.0/socket.io.js"></script>-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/b-1.5.1/b-html5-1.5.1/b-print-1.5.1/r-2.2.1/sc-1.4.4/datatables.min.js"></script>    
  <script>
    $(document).ready(function () {
      Pace.on('done', function () {
        console.log('pace done!')
        $('#capa').hide();
      });
      try {
        table = $('#data-table,.dataTable').DataTable({
          ordering: false,
          initComplete: function () {
          this.api().columns().every( function () {
              var column = this;
              if($(column.footer()).empty().attr('class') === "estatus") {
                var select = $('<select class="form-control"><option value="">Seleccionar</option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+ val +'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d.charAt(0).toUpperCase() + d.slice(1) +'</option>' )
                });
              }
          });
        },
          scrollCollapse: true,
          paging: true,
          responsive: true,
          pageLength: 10,
          language: {
            "zeroRecords": "No existen resultados.",
            "infoEmpty": "No existe información.",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "emptyTable": "No existen registros para mostrar.",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros.",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros.",
            "paginate": {
              "next": "Siguiente",
              "previous": "Anterior"
            }
          },
          dom: 'Bfrtip',
          buttons: [
            {
              extend: 'copy',
              text: '<i class="fa fa-copy"></i> Copiar',
              className: 'btn-info'
            },
            {
              extend: 'excel',
              text: '<i class="fa fa-file-excel-o"></i> Exportar a Excel',
              className: 'btn-info'
            },
            {
              extend: 'print',
              text: '<i class="fa fa-print"></i> Imprimir',
              className: 'btn-info'
            }
          ]
        });
        table_without = $('#data-table-without').DataTable({
          scrollCollapse: true,
          paging: true,
          ordering: false,
          responsive: true,
          pageLength: 10,
          language: {
            "zeroRecords": "No existen resultados.",
            "infoEmpty": "No existe información.",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "emptyTable": "No existen registros para mostrar.",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros.",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros.",
            "paginate": {
              "next": "Siguiente",
              "previous": "Anterior"
            }
          }
        });
        table_devolucion = $('#data-table-devolución').DataTable({
          scrollCollapse: true,
          paging: false,
          ordering: false,
          info: false,
          filter: false,
          responsive: true,
          language: {
            "zeroRecords": "No existen resultados.",
            "infoEmpty": "No existe información.",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "emptyTable": "No existen registros para mostrar.",
          }
        });
      } catch (e) {
        // statements
        console.log(e);
      }
    });
  </script>
  <script>
    /*var socket = io.connect( 'http://38.101.223.30:27458',{ query: "cliente=yes&id_usuario=<?php echo $this->session->userdata('idtbl_usuarios') ?>" } );

    socket.on( 'notificacion', function( data ) {
      notificar();
      
      
      console.log('<a href="'+data.data.link+'" title="">'+data.data.mensaje+'</a>');

      if(isNaN(parseInt($('#notifications span').text())))
        $('#notifications span').html(1);
      else
        $('#notifications span').html(parseInt($('#notifications span').text())+1 );

      $('#ul-notificaciones li:eq(0)').before(
        '<li data-time="'+moment([])+'"><a rel="nofollow" href="<?= base_url() ?>'+data.data.link+'" class="dropdown-item new"> '+
            '<div class="notification">'+
              '<div class="notification-content"><i class="fa fa-bell bg-green"></i><span>'+data.data.mensaje+'</span></div>'+
              '<div class="notification-time"><small>Ahora</small></div>'+
            '</div></a>'+
        '</li>'
      );
    });*/

    $(document).ready(function () {

      $('#ul-notificaciones').mCustomScrollbar({
        theme: "3d-dark"
      });
      $('#notifications').click(function (event) {
        $('#notifications span').html('');
      });
      setInterval(function () {
        var fecha_actual = moment([]);

        $("#ul-notificaciones li:not(:last)").each(function (index) {

          var fecha_li = $(this).data('time');
          var cantidad;
          var time;

          if ((cantidad = (fecha_actual.diff(fecha_li, 'years'))) > 0) {
            if (cantidad == 1)
              time = "Hace " + cantidad + " año.";
            else
              time = "Hace " + cantidad + " años.";
          } else if ((cantidad = (fecha_actual.diff(fecha_li, 'months'))) > 0) {
            if (cantidad == 1)
              time = "Hace " + cantidad + " mes";
            else
              time = "Hace " + cantidad + " meses";
          } else if ((cantidad = (fecha_actual.diff(fecha_li, 'days'))) > 0) {
            if (cantidad == 1)
              time = "Hace " + cantidad + " día";
            else
              time = "Hace " + cantidad + " días";
          } else if ((cantidad = (fecha_actual.diff(fecha_li, 'hours'))) > 0) {
            if (cantidad == 1)
              time = "Hace " + cantidad + " hora";
            else
              time = "Hace " + cantidad + " horas";
          } else if ((cantidad = (fecha_actual.diff(fecha_li, 'minutes'))) > 0) {
            if (cantidad == 1)
              time = "Hace " + cantidad + " minuto";
            else
              time = "Hace " + cantidad + " minutos";
          } else if ((cantidad = (fecha_actual.diff(fecha_li, 'seconds'))) >= 0) {
            time = "Hace 1 minuto";
          } else {
            time = '-';
          }

          $(this).find('.notification-time').find('small').html(time);
        });


      }, 1000);
    });

    const Toast = Swal.mixin({
      toast: true,
      position: 'bottom-start',
      showConfirmButton: false,
      timer: 3000
    });
    /*<?php if ($this->session->flashdata('socket')): ?>
      var socket_emit = io.connect( 'http://38.101.223.30:27458');
      socket_emit.emit( 'datos', <?php echo json_encode($this->session->flashdata('socket')) ?> );
    <?php endif ?>*/
    <?php if ($this->session->flashdata('exito')): ?>
      Toast.fire({
        type: 'success',
        title: '<?php echo $this->session->flashdata('exito') ?>'
      })
    <?php endif ?>

    <?php if ($this->session->flashdata('error')): ?>
      Toast.fire({
        type: 'error',
        title: '<?php echo $this->session->flashdata('error') ?>'
      })
    <?php endif ?>

    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
      if(Notification.permission !== "granted"){
        Notification.requestPermission();
      }
    });
    function notificar() {
      if(Notification.permission !== "granted"){
        Notification.requestPermission();
      } else {
        var notificacion = new Notification("Titulo",
          {
            icon: "https://jonathanmelgoza.com/wp-content/themes/jonathanmelgoza/images/header_menu_rs_btn.png",
            body: "Texto de la notificación"
          }
        );
        notificacion.onclick = function(){
          window.open("https://jonathanmelgoza.com/blog/");
        }
      }
    }
  </script>
  <script>      

      /*<?php if($this->session->userdata('id_user_direccion') !== null){ ?>
        var socketDirecction= io.connect('https://system.estevezjor.online:8080/direccion');
        //var socketDirecction= io.connect('https://localhost:8080/direccion');
        socketDirecction.on("notificationes", function(data){
          alertify.warning("Asignaciones abiertas en control vehicular: " + data.asignacionesAbiertasTotal, 0, function(){console.log('dismissed');});
        });
        window.addEventListener('beforeunload', function(event){
          event.preventDefault();
          if(socketDirecction.connected){
            socketDirecction.close();
          }
        });
      <?php } ?>

      var tipo_usuario = '<?= $this->session->userdata('tipo') ?>';
      if(tipo_usuario == 3){
        var socketControlVehicular = io.connect('https://system.estevezjor.online:8080/controlVehicular');
        //var socketControlVehicular = io.connect('https://localhost:8080/controlVehicular');
        socketControlVehicular.on("notificationes", function(data){
          var mensaje = "Tramites vehiculares de " + data.dateStart + " a " + data.dateEnd + " \n";
          for(var r=0; r < data.tramitesVehiculares.length; r++){
            mensaje = mensaje + data.tramitesVehiculares[r].tipo_tramite + ":" + data.tramitesVehiculares[r].total + "\n";
          }
          alertify.warning(mensaje, 0, function(){console.log('dismissed');});
          alertify.warning("Verificar " + data.minimoStockTotal + ' producto(s) que no cumplen con la codición de stock minimo.', 0, function(){console.log('dismissed');});
          alertify.warning("Asignaciones abiertas en control vehicular: " + data.asignacionesAbiertasTotal, 0, function(){console.log('dismissed');});
        });
        window.addEventListener('beforeunload', function(event){
          event.preventDefault();
          if(socketControlVehicular.connected){
            socketControlVehicular.close();
          }
        });
      }*/
    
  </script>
  
</body>
</html>
