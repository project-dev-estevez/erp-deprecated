      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="What are you looking for..." class="form-control">
            </form>
          </div>
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="<?php echo base_url() ?>" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Estevez</span><strong>.Jor</strong></div>
                  <div class="brand-text brand-small"><strong>E.J</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Notifications
                <li class="nav-item dropdown">
                  <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge bg-red"></span>
                  </a>
                  <ul aria-labelledby="notifications" id="ul-notificaciones" class="dropdown-menu">
                    <?php   $notificaciones = notificaciones() ?>
                    <?php   $notificaciones_contador=0 ?>
                    <?php foreach ($notificaciones as $key => $value): ?>
                      <?php //if ($value->link!=''): ?>
                      <?php if (true): ?>
                        <li data-time="<?php echo ( strtotime($value->fecha_hora) )*1000; ?>">
                          <a rel="nofollow" href="<?=base_url().$value->link?>?ref=<?=$value->idtbl_log?>" class="dropdown-item <?= ($value->estatus==0) ? 'new' : null ; ?>"> 
                            <div class="notification">
                              <div class="notification-content"><i class="fa fa-bell bg-green"></i><span><?=$value->log?></span></div>
                              <div class="notification-time"><small></small></div>
                            </div>
                          </a>
                      </li>
                      <?php ($value->estatus==0) ? $notificaciones_contador++ : null ; ?>
                      <?php endif; ?>
                    <?php endforeach ?>
                    <li><a rel="nofollow" href="<?= base_url() ?>notificaciones" class="dropdown-item all-notifications text-center"> <strong>Ver todas</strong></a></li>
                  </ul>
                </li>-->
                <?php if(isset($_SESSION['id_user_direccion']) && $this->session->userdata('id_user_direccion') != ''){ ?>
                <li class="nav-item"><a href="<?php echo base_url().'inicio/regreso-direccion' ?>" class="nav-link logout">Regresar Dirección<i class="fa fa-sign-out"></i></a></li>
                <?php } ?>
                <?php if(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') != ''){ ?>
                <li class="nav-item"><a href="<?php echo base_url().'inicio/regreso-direccion' ?>" class="nav-link logout">Regresar Almacenes<i class="fa fa-sign-out"></i></a></li>
                <?php } ?>
                <?php if(isset($_SESSION['modulo_activo']) && $this->session->userdata('modulo_activo') != ''){ ?>
                <li class="nav-item"><a href="<?php echo base_url().'inicio/regreso-modulos' ?>" class="nav-link logout">Regresar Modulos<i class="fa fa-sign-out"></i></a></li>
                <?php } ?>
                <?php if(isset($_SESSION['id_user_co']) && $this->session->userdata('id_user_co') != ''){ ?>
                <li class="nav-item"><a href="<?php echo base_url().'inicio/regreso-control-obra' ?>" class="nav-link logout">Regresar control Obra<i class="fa fa-sign-out"></i></a></li>
                <?php } ?>
                <!-- Perfil-->
                <li class="nav-item"><a href="<?= base_url() ?>personal/perfil" class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Ver Perfil"><i class="icon-user"></i></a></li>
                <!-- Logout -->

                <!-- Notifications Tickets -->
                <?php if ($this->session->userdata('id') == 492 || $this->session->userdata('tipo') == 9 || $this->session->userdata('id') == 284) : ?>
                <li class="dropdown" id="updateStatus">
                    <a href="#" class="dropdown" data-toggle="dropdown">
                      <span class="badge badge-danger" id="counter" style="font-size: 12px;"><div id="countNotif"></div></span>
                      <span class="label label-pill label-danger" style="border-radius:10px;"></span><i class="fa fa-bell-o" style="font-size: 15px;"></i>
                    </a>
                    <ul class="dropdown-menu border border-secondary rounded" id="dropdown">
                      <div class="card-header p-2">
                        <div class="d-flex justify-content-between">
                          <h5 class="text-body-emphasis mb-0">Notificaciones</h5>
                        </div>
                      </div>
                      <div id="getNotif"></div>
                    </ul>
                </li>
                <?php endif; ?>
                <!-- End Notifications Tickets -->

                <li class="nav-item"><a href="<?php echo base_url().'login/logout' ?>" class="nav-link logout">Cerrar Sesión<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
              <?php if(isset($_SESSION['id_user_direccion']) && $this->session->userdata('id_user_direccion') != ''){ ?>
                <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/<?= $this->session->userdata('id_user_direccion').'/'.$this->session->userdata('id_user_direccion').'-img.jpg'?>" alt="Foto Perfil">
                <?php }else{ ?>
              <?php $carpeta = './uploads/'.$this->session->userdata('id'); if (!file_exists($carpeta)): ?>
                  <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/sin_imagen.png" alt="Foto Perfil">
                <?php else: ?>
                  <img class="img-fluid rounded-circle" src="<?= base_url()?>uploads/<?= $this->session->userdata('id').'/'.$this->session->userdata('id').'-img.jpg'?>" alt="Foto Perfil">
                <?php endif; ?>                
                <?php } ?>
                </div>
            <div class="title">
              <h1 class="h4"><?php echo $this->session->userdata('nombre') ?></h1>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->   
          
          <span class="heading">Menu</span>            

         <ul class="list-unstyled ps-0">                  
              <li <?= ($this->uri->segment(1)=='') ? 'class="active"' : null ; ?>><a href="<?php echo base_url() ?>"> <i class="icon-home"></i>Home </a></li>
                  <?php if($this->session->userdata('tipo') != 8){ ?>
              <?php if (isset($this->session->userdata('permisos')['orden_servicio']) && $this->session->userdata('permisos')['orden_servicio'] > 0): ?>
                <li <?= ($this->uri->segment(1)=='servicios') || $this->uri->segment(2)=='ordenes' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'servicios/ordenes' ?>"> <i class="fa fa-address-card"></i>Ordenes de Servicio </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_refacciones_control_vehicular']) && $this->session->userdata('permisos')['almacen_refacciones_control_vehicular'] > 0 || (isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') == '23' && $this->session->userdata('tipo') == 4)): ?>
                <li <?= $this->uri->segment(2)=='almacen-refacciones-control-vehicular' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-refacciones-control-vehicular' ?>"> <i class="icon-padnote"></i>Almacén Refacciones Control Vehicular </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_autos_control_vehicular']) && $this->session->userdata('permisos')['almacen_autos_control_vehicular'] > 0): ?>
                <li <?= $this->uri->segment(2)=='almacen-autos-control-vehicular' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-autos-control-vehicular' ?>"> <i class="icon-padnote"></i>Almacén Autos Control Vehicular </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['combustible_autos_control_vehicular']) && $this->session->userdata('permisos')['combustible_autos_control_vehicular'] > 0): ?>
                <li class="">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=""><i class="fa fa-tachometer"></i> Gasolina</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                      <?php if (isset($this->session->userdata('permisos')['almacen_tarjetas_gasolina']) && $this->session->userdata('permisos')['almacen_tarjetas_gasolina'] > 0): ?>
                        <li <?= $this->uri->segment(2)=='almacen-tarjetas-gasolina' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-tarjetas-gasolina' ?>"> <i class="icon-padnote"></i>Almacén Tarjetas Gasolina </a></li>
                      <?php endif; ?>
                        <?php if (isset($this->session->userdata('permisos')['combustible_autos_control_vehicular']) && $this->session->userdata('permisos')['combustible_autos_control_vehicular'] > 0): ?>
                          <li <?= $this->uri->segment(2)=='combustible-autos-control-vehicular' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/combustible-autos-control-vehicular' ?>"> <i class="icon-padnote"></i>Combustible Autos Control Vehicular </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
              <?php endif; ?>
              

              <?php if (isset($this->session->userdata('permisos')['tramites_autos_control_vehicular']) && $this->session->userdata('permisos')['tramites_autos_control_vehicular'] > 0): ?>
                <li <?= $this->uri->segment(2)=='tramite-autos-control-vehicular' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/tramite-autos-control-vehicular' ?>"> <i class="icon-padnote"></i>Tramites Autos Control Vehicular </a></li>
              <?php endif; ?>

              

              <?php if (isset($this->session->userdata('permisos')['empresas']) && $this->session->userdata('permisos')['empresas']>0): ?>
                <li <?= ($this->uri->segment(1)=='empresas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'empresas' ?>"> <i class="fa fa-address-card"></i>Empresas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['personal']) && $this->session->userdata('permisos')['personal']>0 && $this->session->userdata('tipo')!=12): ?>
                <li <?= ($this->uri->segment(1)=='personal') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'personal' ?>"> <i class="fa fa-user"></i>Personal </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_kuali']) && $this->session->userdata('permisos')['almacen_kuali'] > 0): ?>
                <li <?= $this->uri->segment(2)=='almacen-kuali' ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-kuali' ?>"> <i class="icon-padnote"></i>Almacén Kuali </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['personal_asignacion']) && $this->session->userdata('permisos')['personal_asignacion']>0 && $this->session->userdata('tipo')!=12): ?>
                <li <?= ($this->uri->segment(1)=='personal-asignacion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'personal/asignacion' ?>"> <i class="fa fa-user"></i>Personal Asignación</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['contratistas']) && $this->session->userdata('permisos')['contratistas']>0): ?>
                <li <?= ($this->uri->segment(1)=='contratistas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'contratistas' ?>"> <i class="fa fa-users"></i>Contratistas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['asistencias']) && $this->session->userdata('permisos')['asistencias']>0): ?>
                <li <?= ($this->uri->segment(1)=='asistencias') ? 'class="active"' : null ; ?>><a href="<?= base_url()?>asistencias"> <i class="fa fa-calendar"></i>Asistencias</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['requisiciones']) && $this->session->userdata('permisos')['requisiciones']>0): ?>
                <li <?= ($this->uri->segment(2)=='requisiciones') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'personal/requisiciones' ?>"> <i class="fa fa-address-book"></i>Requisiciones </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['vacantes']) && $this->session->userdata('permisos')['vacantes']>0): ?>
                <li <?= ($this->uri->segment(1)=='vacantes') ? 'class="active"' : null ; ?>><a href="<?= base_url()?>vacantes"> <i class="fa fa-briefcase"></i>Vacantes</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['clientes']) && $this->session->userdata('permisos')['clientes']>0): ?>
                <li <?= ($this->uri->segment(1)=='clientes') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'clientes' ?>"> <i class="fa fa-handshake-o"></i>Clientes </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen']) && $this->session->userdata('permisos')['almacen']>0): ?>
                <li <?= ($this->uri->segment(1)=='almacen' && $this->uri->segment(2)=='') ? 'class="active"' : null ; ?>><a href="<?php echo base_url(); ?><?php if($this->session->userdata('tipo') == 7){ ?>almacen/catalogo<?php }elseif(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') != '' && $this->session->userdata('tipo_anterior') == 23){ ?>almacen/almacen-seguridad-e-higiene<?php }else{ ?>almacen<?php } ?>"> <i class="icon-padnote"></i>Almacén </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_almacen_general']) && $this->session->userdata('permisos')['reportes_almacen_general']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes-almacen-general') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes-almacen-general"> <i class="icon-padnote"></i>Reportes Almacen </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_pm']) && $this->session->userdata('permisos')['reportes_pm']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes_pm') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes_pm"> <i class="icon-padnote"></i>Reportes PM </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_control_vehicular']) && $this->session->userdata('permisos')['reportes_control_vehicular']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes-control-vehicular') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes-control-vehicular"> <i class="icon-padnote"></i>Reportes Control Vehicular </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reporte_sistemas']) && $this->session->userdata('permisos')['reporte_sistemas']>0): ?>
                <li <?= ($this->uri->segment(2)=='reporte-sistemas') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>sistemas/reporte-sistemas"> <i class="icon-padnote"></i>Reportes Sistemas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_almacen_cliente']) && $this->session->userdata('permisos')['reportes_almacen_cliente']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes-almacen-cliente') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes-almacen-cliente"> <i class="icon-padnote"></i>Reportes Almacén Clientes </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['servicios_mecanicos']) && $this->session->userdata('permisos')['servicios_mecanicos']>0): ?>
                <li <?= ($this->uri->segment(2)=='servicios') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>control-vehicular/servicios"> <i class="icon-padnote"></i>Servicios </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo']>0 && $this->session->userdata('tipo')=='1'): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen' ?>"> <i class="icon-padnote"></i>Almacén Alto Costo </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_sistemas']) && $this->session->userdata('permisos')['almacen_sistemas']>0 && $this->session->userdata('tipo')=='2'): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen' ?>"> <i class="icon-padnote"></i>Almacén Sistemas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo']>0 && ($this->session->userdata('tipo')=='8' || $this->session->userdata('id') == 73)): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-alto-costo' ?>"> <i class="icon-padnote"></i>Almacén Alto Costo </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen']) && $this->session->userdata('permisos')['almacen']>0 && ($this->session->userdata('id') == 73)): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/detalle_almc/5e786c1641355' ?>"> <i class="icon-padnote"></i>Almacén Kuali </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_alto_costo']) && $this->session->userdata('permisos')['almacen_alto_costo']>0 && $this->session->userdata('tipo')=='0'): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-alto-costo' ?>"> <i class="icon-padnote"></i>Almacén Alto Costo </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_area_medica']) && $this->session->userdata('permisos')['almacen_area_medica']>0 && ($this->session->userdata('tipo')=='14' || $this->session->userdata('tipo')=='10')): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-area-medica' ?>"> <i class="fa fa-plus-circle"></i>Almacén Área Médica </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['almacen_seguridad_e_higiene']) && $this->session->userdata('permisos')['almacen_seguridad_e_higiene']>0 && ($this->session->userdata('tipo')=='10')): ?>
                <li <?= ($this->uri->segment(1)=='almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/almacen-seguridad-e-higiene' ?>"> <i class="fa fa-plus-circle"></i>Almacén Seguridad e Higiene </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['proyectos']) && $this->session->userdata('permisos')['proyectos']>0): ?>
                <li <?= ($this->uri->segment(1)=='proyectos') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'proyectos' ?>"> <i class="fa fa-briefcase"></i>Proyectos </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['proveedores']) && $this->session->userdata('permisos')['proveedores']>0): ?>
                <li <?= ($this->uri->segment(1)=='proveedores') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'proveedores' ?>"> <i class="fa fa-truck"></i>Proveedores </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0): ?>
                <li <?= ($this->uri->segment(1)=='compras' && $this->uri->segment(2)!='solicitud-compra') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'compras' ?>"> <i class="fa fa-shopping-bag"></i>Compras </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['cursos']) && $this->session->userdata('permisos')['cursos']>0): ?>
                <li <?= ($this->uri->segment(1)=='curso') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'curso' ?>"> <i class="fa fa-graduation-cap"></i>Cursos </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['bitacora_cv']) && $this->session->userdata('permisos')['bitacora_cv']>0): ?>
                <li <?= ($this->uri->segment(1)=='bitacora') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'controlVehicular/bitacora' ?>"> <i class="fa fa-calendar-times-o"></i>Bitacora </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['solicitud-compra']) && $this->session->userdata('permisos')['solicitud-compra']>0): ?>
                <li <?= ($this->uri->segment(2)=='solicitud-compra') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'compras/solicitud-compra' ?>"> <i class="fa fa-shopping-cart"></i>Solicitud Compra </a></li>
              <?php endif; ?>

              

              <?php if (isset($this->session->userdata('permisos')['solicitud-almacen']) && $this->session->userdata('permisos')['solicitud-almacen']>0): ?>
                <li <?= ($this->uri->segment(2)=='solicitud-almacen' || $this->uri->segment(2)=='solicitudes-almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/solicitudes-almacen' ?>"> <i class="fa fa-wrench"></i>Solicitud Almacen </a></li>
              <?php endif; ?>

              

              <?php if (isset($this->session->userdata('permisos')['pedidos']) && $this->session->userdata('permisos')['pedidos']>0): ?>
                <li <?= ($this->uri->segment(1)=='pedidos') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'pedidos' ?>"> <i class="fa fa-send-o"></i>Pedidos </a></li>
              <?php endif; ?>

              <?php if ($this->session->userdata('tipo') == 7): ?>
                <li <?= ($this->uri->segment(2)=='pedidos_almacen') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'Pedidos/pedidos_almacen' ?>"> <i class="fa fa-send-o"></i>Pedidos Almacen</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>2): ?>
                <li <?= ($this->uri->segment(1)=='estimaciones') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'estimaciones' ?>"> <i class="fa fa-area-chart"></i>Estimaciones </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>2): ?>
                <li <?= ($this->uri->segment(1)=='pedidosestimacion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'pedidosestimacion/ver-pedidos-estimacion' ?>"> <i class="fa fa-exchange"></i>Pedidos Estimación</a></li>
              <?php endif; ?>

              <?php if ((isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>2) || $this->session->userdata('tipo') == 6): ?>
                <li <?= ($this->uri->segment(2)=='reportes-compras') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'compras/reportes-compras' ?>"> <i class="fa fa-file-text"></i>Reportes Compras</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['solicitudes']) && $this->session->userdata('permisos')['solicitudes']>0): ?>
                <li <?= ($this->uri->segment(1)=='solicitudes') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'solicitudes' ?>"> <i class="fa fa-clipboard"></i>Solicitudes </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['solicitudes_asignadas']) && $this->session->userdata('permisos')['solicitudes_asignadas']>0): ?>
                <li <?= ($this->uri->segment(1)=='solicitudes-asignadas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'solicitudes-asignadas' ?>"> <i class="fa fa-clipboard"></i>Solicitudes Asignadas</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['vacantes']) && $this->session->userdata('permisos')['vacantes']>0): ?>
                <li <?= ($this->uri->segment(1)=='vacantes') ? 'class="active"' : null ; ?>><a href="<?= base_url()?>vacantes"> <i class="fa fa-users"></i>Vacantes</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['configuracion']) && $this->session->userdata('permisos')['configuracion']>0): ?>
                <li <?= ($this->uri->segment(1)=='configuracion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'configuracion' ?>"> <i class="fa fa-cogs"></i>Configuración </a></li>
              <?php endif; ?>

              <?php if ($this->session->userdata('tipo')==0 || $this->session->userdata('tipo') == 55): ?>
                <li <?= ($this->uri->segment(1)=='root') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'root' ?>"> <i class="fa fa-unlock"></i>Admin </a></li>
              <?php endif; ?>


              <?php if (isset($this->session->userdata('permisos')['direccion']) && $this->session->userdata('permisos')['direccion']>0): ?>
                <li <?= ($this->uri->segment(1)=='compras') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'compras/solicitudes' ?>"> <i class="fa fa-shopping-cart"></i>Solicitudes de compra </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones']) && $this->session->userdata('permisos')['devoluciones']>0): ?>
                <?php if($this->session->userdata('id') == 163 || $this->session->userdata('id') == 192){ ?>
                  <li <?= ($this->uri->segment(2)=='devoluciones' || $this->uri->segment(2)=='solicitud-devolucion'  || $this->uri->segment(2)=='detalle-devolucion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones' ?>"> <i class="fa fa-reply"></i>Devoluciones</a></li>
                  <?php }elseif($this->session->userdata('id') == 137){ ?>
                    <li <?= ($this->uri->segment(2)=='devoluciones' || $this->uri->segment(2)=='solicitud-devolucion'  || $this->uri->segment(2)=='detalle-devolucion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones' ?>"> <i class="fa fa-reply"></i>Devoluciones Reynosa</a></li>
                    <?php }elseif($this->session->userdata('id') == 166){ ?>
                      <li <?= ($this->uri->segment(2)=='devoluciones' || $this->uri->segment(2)=='solicitud-devolucion'  || $this->uri->segment(2)=='detalle-devolucion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones' ?>"> <i class="fa fa-reply"></i>Devoluciones Tuxpan</a></li>
                      <?php }else{ ?>
                      <li <?= ($this->uri->segment(2)=='devoluciones' || $this->uri->segment(2)=='solicitud-devolucion'  || $this->uri->segment(2)=='detalle-devolucion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones' ?>"> <i class="fa fa-reply"></i>Devoluciones</a></li>
                      <!--<li <?= ($this->uri->segment(2)=='devoluciones' || $this->uri->segment(2)=='solicitud-devolucion'  || $this->uri->segment(2)=='detalle-devolucion') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones' ?>"> <i class="fa fa-reply"></i>Devoluciones Almacén General</a></li>-->
                      <?php } ?>
              <?php endif; ?>

              <!--<?php if (isset($this->session->userdata('permisos')['devoluciones_alto_costo']) && $this->session->userdata('permisos')['devoluciones_alto_costo']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones-alto-costo' || $this->uri->segment(2)=='solicitud-devolucion-alto-costo'  || $this->uri->segment(2)=='detalle-devolucion-alto-costo') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-alto-costo' ?>"> <i class="fa fa-reply"></i>Devoluciones Alto Costo</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_kuali']) && $this->session->userdata('permisos')['devoluciones_kuali']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones_kuali' || $this->uri->segment(2)=='solicitud-devolucion-kuali'  || $this->uri->segment(2)=='detalle-devolucion-kuali') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-kuali' ?>"> <i class="fa fa-reply"></i>Devoluciones Kuali Digital</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_autos_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_autos_control_vehicular']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones_autos_control_vehicular' || $this->uri->segment(2)=='solicitud-devolucion-autos-control-vehicular'  || $this->uri->segment(2)=='detalle-devolucion-autos-control-vehicular') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-autos-control-vehicular' ?>"> <i class="fa fa-reply"></i>Devoluciones Autos Control Vehicular</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']) && $this->session->userdata('permisos')['devoluciones_refacciones_control_vehicular']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones_refacciones_control_vehicular' || $this->uri->segment(2)=='solicitud-devolucion-refacciones-control-vehicular'  || $this->uri->segment(2)=='detalle-devolucion-refacciones-control-vehicular') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-refacciones-control-vehicular' ?>"> <i class="fa fa-reply"></i>Devoluciones Refacciones Control Vehicular</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_area_medica']) && $this->session->userdata('permisos')['devoluciones_area_medica']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones-area-medica' || $this->uri->segment(2)=='solicitud-devolucion-area-medica') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-area-medica' ?>"> <i class="fa fa-reply"></i>Devoluciones Area Medica</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_sistemas']) && $this->session->userdata('permisos')['devoluciones_sistemas']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones-sistemas' || $this->uri->segment(2)=='solicitud-devolucion-sistemas'  || $this->uri->segment(2)=='detalle-devolucion-sistemas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-sistemas' ?>"> <i class="fa fa-reply"></i>Devoluciones Sistemas</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['devoluciones_tarjetas']) && $this->session->userdata('permisos')['devoluciones_tarjetas']>0): ?>
                <li <?= ($this->uri->segment(2)=='devoluciones-tarjetas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/devoluciones-tarjetas' ?>"> <i class="fa fa-reply"></i>Devoluciones Tarjetas</a></li>
              <?php endif; ?>-->

              <?php if (isset($this->session->userdata('permisos')['reporte_alto_costo']) && $this->session->userdata('permisos')['reporte_alto_costo']>0): ?>
                <li <?= ($this->uri->segment(1)=='reporte_alto_costo') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'almacen/reportesAC' ?>"> <i class="fa fa-file-excel-o"></i>Reportes Alto Costo </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_operaciones']) && $this->session->userdata('permisos')['reportes_operaciones']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes-operaciones') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes-operaciones"> <i class="icon-padnote"></i>Reportes Operaciones </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['incidencias']) && $this->session->userdata('permisos')['incidencias']>0): ?>
                <li <?= ($this->uri->segment(2)=='incidencias') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/incidencias"> <i class="icon-padnote"></i><?= $this->session->userdata('tipo') == 3 ? 'Incidencias' : 'Control Vehicular' ?> </a></li>
              <?php endif ?>

              <?php if (isset($this->session->userdata('permisos')['incidencias_sistemas']) && $this->session->userdata('permisos')['incidencias_sistemas']>0): ?>
                <li <?= ($this->uri->segment(2)=='incidencias_sistemas') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>sistemas/incidencias_sistemas"> <i class="icon-padnote"></i><?= $this->session->userdata('tipo') == 2 ? 'Incidencias' : 'Sistemas' ?> </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['caja_chica_cv']) && $this->session->userdata('permisos')['caja_chica_cv']>0): ?>
                <li <?= ($this->uri->segment(2)=='caja_chica_cv') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/caja_chica_cv"> <i class="icon-padnote"></i>Caja Chica  </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['caja_chica']) && $this->session->userdata('permisos')['caja_chica']>0): ?>
                <li <?= ($this->uri->segment(2)=='caja_chica') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/caja_chica"> <i class="icon-padnote"></i>Solicitud Caja Chica </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['cuadrillas']) && $this->session->userdata('permisos')['cuadrillas']>0): ?>
                <li <?= ($this->uri->segment(2)=='cuadrillas') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/cuadrillas"> <i class="icon-padnote"></i>Cuadrillas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['viaticos']) && $this->session->userdata('permisos')['viaticos']>0): ?>
                <li <?= ($this->uri->segment(2)=='viaticos') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/viaticos"> <i class="fa fa-plane"></i>Solicitud Viaticos </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['siniestros']) && $this->session->userdata('permisos')['siniestros']>0): ?>
                <li <?= ($this->uri->segment(2)=='siniestros') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>control-vehicular/siniestros"> <i class="icon-padnote"></i>Siniestros </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['cambio_propietario']) && $this->session->userdata('permisos')['cambio_propietario']>0): ?>
                <li <?= ($this->uri->segment(2)=='cambio-propietario') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>control-vehicular/cambio-propietario"> <i class="icon-padnote"></i>Cambio Propietario </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['reportes_incidencias']) && $this->session->userdata('permisos')['reportes_incidencias']>0): ?>
                <li <?= ($this->uri->segment(2)=='reportes-incidencias') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/reportes-incidencias"> <i class="icon-padnote"></i>Reportes Incidencias </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['supervisor']) && $this->session->userdata('permisos')['supervisor']>0): ?>
                <li <?= ($this->uri->segment(2)=='justificaciones-material') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/justificaciones-material"> <i class="icon-padnote"></i>Justificaciones de Material </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['entradas_manuales']) && $this->session->userdata('permisos')['entradas_manuales']>0): ?>
                <li <?= ($this->uri->segment(2)=='entradas-manuales') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/entradas-manuales"> <i class="icon-padnote"></i>Entradas Manuales </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['horometros']) && $this->session->userdata('permisos')['horometros']>0): ?>
                <li <?= ($this->uri->segment(2)=='horometros') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>sistemas/horometros"> <i class="fa fa-clock-o"></i>Horómetros </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['actas_administrativas']) && $this->session->userdata('permisos')['actas_administrativas']>0): ?>
                <li <?= ($this->uri->segment(2)=='actas_administrativas') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>personal/actas_administrativas"> <i class="fa fa-file-text-o"></i>Actas administrativas </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['mantenimientos']) && $this->session->userdata('permisos')['mantenimientos']>0): ?>
                <li <?= ($this->uri->segment(2)=='mantenimientos') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/mantenimientos"> <i class="fa fa-exclamation-circle"></i>Generador </a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['generador_zte']) && $this->session->userdata('permisos')['generador_zte']>0): ?>
                <li <?= ($this->uri->segment(2)=='generador_zte') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/generador-zte"> <i class="fa fa-exclamation-circle"></i>Generadores</a></li>
              <?php endif; ?>

              <?php if (isset($this->session->userdata('permisos')['explosion_insumos']) && $this->session->userdata('permisos')['explosion_insumos']>0): ?>
                <li <?= ($this->uri->segment(2)=='explosion-insumos') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/explosion-insumos"> <i class="fa fa-bomb"></i>Explosión Insumos </a></li>
              <?php endif; ?>
              <?php }else{ ?>

                <li <?= ($this->uri->segment(2)=='caja_chica') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>almacen/caja_chica"> <i class="icon-padnote"></i>Solicitud Caja Chica </a></li>

                <?php if (isset($this->session->userdata('permisos')['compras']) && $this->session->userdata('permisos')['compras']>0): ?>
                <li <?= ($this->uri->segment(1)=='compras' && $this->uri->segment(2)!='solicitud-compra') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'compras' ?>"> <i class="fa fa-shopping-bag"></i>Compras </a></li>
              <?php endif; ?>
                <?php } ?>

              <?php if (isset($this->session->userdata('permisos')['justificacion_asignaciones_rh']) && $this->session->userdata('permisos')['justificacion_asignaciones_rh']>0): ?>
                <li <?= ($this->uri->segment(2)=='justificacion_asignaciones_rh') ? 'class="active"' : null ; ?>><a href="<?= base_url(); ?>personal/justificacion_asignaciones_rh"><i class="fa fa-arrow-left" aria-hidden="true"></i> Justificación RH </a></li>
              <?php endif; ?>

              <!--<li <?= ($this->uri->segment(1)=='vacaciones') ? 'class="active"' : null ; ?>><a href="<?= base_url()?>vacaciones"> <i class="fa fa-calendar-plus-o"></i>Vacaciones</a></li>

              <li <?= ($this->uri->segment(2)=='solicitudes_vacaciones') ? 'class="active"' : null ; ?>><a href="<?= base_url()?>vacaciones/solicitudes_vacaciones"> <i class="fa fa-calendar-plus-o"></i>Solicitudes Vacaciones</a></li>-->
              
              <!--<li <?= ($this->uri->segment(2)=='control_vehicular') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'soporte/control_vehicular' ?>"> <i class="fa fa-wrench"></i>Soporte CV</a></li>
              
              <li <?= ($this->uri->segment(2)=='sistemas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'soporte/sistemas' ?>"> <i class="fa fa-cog"></i>Soporte Sistemas</a></li>

              <li <?= ($this->uri->segment(2)=='mantenimiento') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'soporte/mantenimiento' ?>"> <i class="fa fa-briefcase" aria-hidden="true"></i>Soporte Mantenimiento</a></li>-->
              
              <li <?= ($this->uri->segment(1)=='soporte' && $this->uri->segment(2) != 'sistemas') ? 'class="active"' : null ; ?>><a href="<?php echo base_url().'soporte' ?>"> <i class="fa fa-life-saver"></i>Soporte </a></li>              
              
            </ul>
        </nav>

<div class="content-inner">
  <?php if ($notificaciones_contador!=0): ?>
  <script>
    $(document).ready(function() {
      $('#notifications span').html(<?= $notificaciones_contador ?>);
    });
  </script>
  <?php endif; ?>
  <!-- Page Header-->
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom"><?php echo ($this->uri->segment(1)=='') ? 'Dashboard' : ucfirst ($this->uri->segment(1)) ; ?></h2>
    </div>
  </header>
<?php if ($this->uri->segment(1)!=NULL): ?>
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
      <?php if ($this->uri->segment(2)==NULL): ?>
          <li class="breadcrumb-item active"><?php echo ucfirst($this->uri->segment(1)) ?></li>
      <?php else: ?>
        <li class="breadcrumb-item"><a href="<?php echo base_url().$this->uri->segment(1) ?>"><?php echo ucfirst($this->uri->segment(1)) ?></a></li>
          <li class="breadcrumb-item active"><?php echo ucfirst(str_replace("-", " ", $this->uri->segment(2))) ?></li>
      <?php endif; ?>
    </ul>
  </div>
<?php endif; ?>

<?php if ($this->session->userdata('id') == 492 || $this->session->userdata('tipo') == 9 || $this->session->userdata('id') == 284) : ?>
<script>
  function countNotif() {
  xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET","<?php echo site_url('Soporte/countNotif'); ?>",false);
  xmlhttp.send(null);

  document.getElementById("countNotif").innerHTML = xmlhttp.responseText;
}

  function getNotif() {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET","<?php echo site_url('Soporte/getNotif'); ?>",false);
    xmlhttp.send(null);

    document.getElementById("getNotif").innerHTML = xmlhttp.responseText;
  }

  setInterval(function () {
      countNotif();
      getNotif();
  }, 3000);

  $("#updateStatus").click(function(){
    $.ajax({
      url: "<?php echo base_url("Soporte/updateStatus"); ?>",
      dataType: "html",
      success: function(data) {
        $("#counter").html(0);
      }
    })
  });

</script>
<?php endif; ?>