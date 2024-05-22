<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidos extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('departamentos_model');
    $this->load->model('pedidos_model');
    $this->load->model('almacen_model');
    $this->load->model('compras_model');
    $this->load->model('racks_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
  }
  public function index() {
    if ($this->session->userdata('is_logued_in')) {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Pedidos';
      $datos['clase_pagina'] = 'pedidos-page';
      //$datos['pedidos'] = $this->pedidos_model->pedidos();
      //foreach ($datos['pedidos'] as $key => $value) {
      //  $datos['pedidos'][$key]->entregado = 0;
      //  $datos['pedidos'][$key]->cantidad = 0;
      //  foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
      //    $datos['pedidos'][$key]->entregado += $subvalue->entregado;
      //    $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      //  }
      //}
      $datos['bancos'] = $this->pedidos_model->bancos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('pedidos/ver-pedidos', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url().'login');
  }

  public function pedidos_almacen() {
    if ($this->session->userdata('is_logued_in')) {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Pedidos';
      $datos['clase_pagina'] = 'pedidos-page';
      //$datos['pedidos'] = $this->pedidos_model->pedidos();
      //foreach ($datos['pedidos'] as $key => $value) {
      //  $datos['pedidos'][$key]->entregado = 0;
      //  $datos['pedidos'][$key]->cantidad = 0;
      //  foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
      //    $datos['pedidos'][$key]->entregado += $subvalue->entregado;
      //    $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      //  }
      //}
      $datos['bancos'] = $this->pedidos_model->bancos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('pedidos/ver-pedidos-almacen', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url().'login');
  }

  public function agregarEditarPagoPedido(){
    $resultado = $this->pedidos_model->agregarEditarPagoPedido();
    if($resultado) {
      echo "OK";
    }
    else {
      echo "ERROR";
    }
  }

  public function cerrarPedido() {
    $resultado = $this->pedidos_model->cerrarPedido();
    if($resultado) {
      echo "OK";
    }
    else {
      echo "ERROR";
    }
  }

  public function pago_pedido(){
    echo json_encode($this->pedidos_model->pago_pedido());
  }

  public function imprimirDetallePedido($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Pedido';
    $datos['clase_pagina'] = 'pedidos-page';
    $datos['pedido'] = $this->pedidos_model->detalle_pedido($uid);
    $datos['detalle'] = $this->pedidos_model->detalle_pedido_catalogo($datos['pedido']->idtbl_pedidos);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    $this->load->view('pedidos/detalle-pedido-imprimir', $datos);
  }

  public function mostrarPedidos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar2 = $this->input->post('buscar2');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos($buscar,$inicio,$cantidad,$buscar2);
    $totalRegistros = count($this->pedidos_model->pedidos($buscar));
    
    
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  public function mostrarPedidosEstatus() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar2 = $this->input->post('buscar2');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos($buscar,$inicio,$cantidad,$buscar2);
    $totalRegistros = count($this->pedidos_model->pedidos($buscar));
    
    
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos virtuales
  public function mostrarPedidosVirtuales() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar2 = $this->input->post('buscar2');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_virtuales($buscar,$inicio,$cantidad,$buscar2);
    $totalRegistros = count($this->pedidos_model->pedidos_virtuales($buscar));
    
    
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos virtuales
  public function mostrarPedidosKuali() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_kuali($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_kuali($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos virtuales
  public function mostrarPedidosCv() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_cv($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_cv($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidoscv" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos AC
  public function mostrarPedidosAc() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_ac($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_ac($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidosac" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos AM
  public function mostrarPedidosAm() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_am($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_am($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidosam" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
    );

    echo json_encode($data);
  }

    //Mostrar los pedidos AM
    public function mostrarPedidosmakili() {
      //valor a buscar
      $buscar = $this->input->post('buscar');
      $buscar3 = $this->input->post('buscar3');
      $numeroPagina = $this->input->post('nropagina');
      $cantidad = 10;
      $inicio = ($numeroPagina -1) * $cantidad;
  
      $datos['pedidos'] = $this->pedidos_model->pedidos_makili($buscar,$inicio,$cantidad,$buscar3);
      $totalRegistros = count($this->pedidos_model->pedidos_makili($buscar));
      
      $datos['detalle'] = [];
      foreach ($datos['pedidos'] as $key => $value) {
        $datos['pedidos'][$key]->entregado = 0;
        $datos['pedidos'][$key]->cantidad = 0;
        $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
        foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
          $datos['pedidos'][$key]->entregado += $subvalue->entregado;
          $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
        }
      } 
      
      $data = array(
        "pedidosmakili" => $datos['pedidos'],
        "totalRegistros" => $totalRegistros,
        "cantidad" => $cantidad,
        "detalle" => isset($datos['detalle']) ? $datos['detalle'] : []
      );
  
      echo json_encode($data);
    }

  //Mostrar los pedidos ehs
  public function mostrarPedidosEhs() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_ehs($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_ehs($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidosehs" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }


   //Mostrar los pedidos ehs
   public function mostrarPedidoskualidekuali() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_kualidekuali($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_kualidekuali($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidoskualidekuali" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }
   //Mostrar los pedidos ad
   public function mostrarPedidosad() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_ad($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_ad($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidosad" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos ad
  public function mostrarPedidospersonal() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_personal($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_personal($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidospersonal" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos mt
  public function mostrarPedidosmt() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_mt($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_mt($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidosmt" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }

  //Mostrar los pedidos sistemas
  public function mostrarPedidosSistemas() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $buscar3 = $this->input->post('buscar3');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_model->pedidos_sistemas($buscar,$inicio,$cantidad,$buscar3);
    $totalRegistros = count($this->pedidos_model->pedidos_sistemas($buscar));
    
    $datos['detalle'] = [];
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
      foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos_sistemas" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad,
      "detalle" => $datos['detalle']
    );

    echo json_encode($data);
  }

  public function cancelarPedido() {
    //echo $_POST['uid_pedido'] . " " . $_POST['idtbl_solicitudes_almacen'] . " " . $_POST['motivo_cancelacion'];

    $parametros = array(
      'motivo_cancelacion' => $_POST['motivo_cancelacion'],
      'estatus' => 'cancelada'
    );

    $pedido = $this->pedidos_model->cambiarEstatusPedido($parametros, $_POST['uid_pedido']);

    $parametros = array(
      'estatus_solicitud' => 'pendiente'
    );

    $solicitud_almacen = $this->compras_model->actualizarEstatusSolicitudAlmacen($parametros, $_POST['idtbl_solicitudes_almacen'], $_POST['estimacion']);

    $parametros = array(
      'comprado' => 0
    );

    $solicitud_catalogo = $this->compras_model->actualizarCantidadesSolicitudCatalogo($parametros, $_POST['idtbl_solicitudes_almacen'], $_POST['estimacion']);

    $actualizacion_almacen = $this->pedidos_model->actualizarCantidadAlmacen();

    if($pedido && $solicitud_almacen && $solicitud_catalogo && $actualizacion_almacen) {
      echo "OK";
    }
    else {
      echo "ERROR";
    }

  }

  public function detalle_pedido($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Detalle Pedido';
    $datos['clase_pagina'] = 'pedidos-page';
    $datos['pedido'] = $this->pedidos_model->detalle_pedido($uid);
    $datos['detalle'] = $this->pedidos_model->detalle_pedido_catalogo($datos['pedido']->idtbl_pedidos);
    $datos['data'] = $this->pedidos_model->datospedido($uid);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['autorizados'] = $this->almacen_model->autorizados_almacen();
    $datos['racks'] = $this->racks_model->racks();
    $datos['racks_dp'] = $this->racks_model->racks_dp();
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    if ($this->session->userdata('tipo') == 14) {
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f3fcafad6a37');
    }elseif($this->session->userdata('tipo') == 1){
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('25839864557600771');
    }elseif($this->session->userdata('id') == 50){
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5e786c1641355');
    }elseif($this->session->userdata('tipo') == 3){
      $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f5661ca14d2f');
    }elseif($this->session->userdata('tipo') == 2){
      $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f85e418e5230');
    }else{
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('25839864557600770');
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('pedidos/detalle-pedido', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function detalle_pedido_almacen($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Detalle Pedido';
    $datos['clase_pagina'] = 'pedidos-page';
    $datos['pedido'] = $this->pedidos_model->detalle_pedido($uid);
    $datos['detalle'] = $this->pedidos_model->detalle_pedido_catalogo($datos['pedido']->idtbl_pedidos);
    $datos['data'] = $this->pedidos_model->datospedido($uid);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['autorizados'] = $this->almacen_model->autorizados_almacen();
    $datos['racks'] = $this->racks_model->racks();
    $datos['racks_dp'] = $this->racks_model->racks_dp();
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    if ($this->session->userdata('tipo') == 14) {
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f3fcafad6a37');
    }elseif($this->session->userdata('tipo') == 1){
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('25839864557600771');
    }elseif($this->session->userdata('id') == 50){
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5e786c1641355');
    }elseif($this->session->userdata('tipo') == 3){
      $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f5661ca14d2f');
    }elseif($this->session->userdata('tipo') == 2){
      $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('5f85e418e5230');
    }else{
        $datos['detalle_almacen'] = $this->almacen_model->detalle_almacen('25839864557600770');
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('pedidos/detalle-pedido-almacen', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function datospedido() {
    $permisos = $this->departamentos_model->permisos('almacen');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->pedidos_model->datospedido($this->input->post('uid'));
        if($check['pedido']->estatus === "cancelada") {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Este pedido está cancelado'
          ));
          return;
        }
        //verificar si el pedido ha sido cubierto al 100%
        $cantidad = 0;
        $entregado = 0;
        for($x=0;$x<sizeof($check['detalle']);$x++) {
          $cantidad = $cantidad + $check['detalle'][$x]->cantidad;
          $entregado = $entregado + $check['detalle'][$x]->entregado;
        }
        //echo $cantidad." ".$entregado;
        //return;
        if ($check == true && ($cantidad != $entregado)) {
          echo json_encode(array(
            'error' => false,
            'msg' => "no",
            'datos' => $check
          ));
          return;
        }
        if ($check == true && ($cantidad == $entregado)) {
          echo json_encode(array(
            'error' => false,
            'msg' => "yes",
            'datos' => $check
          ));
        }
        else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'No existen datos.'
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }

  public function token( ) {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  private function precio_actual_dolar()
  {
    error_reporting(0);
    $url = 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?mediaType=json&token=d8ca6837fc6654742ab58ce244abe03af703031d56eb1a1fe18201bc7602c760';

    $json = file_get_contents($url);
    if($json!=''){
    $array = json_decode($json, true);
    foreach ($array as $key => $value) {
      foreach ($value['series'] as $key => $value2) {
        foreach ($value2['datos'] as $key => $value3) {
          $precio_dolar=bcdiv($value3['dato'], '1', 2);
        }
      }
    }
  }else{
    $precio_dolar=22.17;
  }
  
    return ($precio_dolar);
  }

  public function excel_pedidos() {
    $datos['pedidos'] = $this->pedidos_model->pedidos();
    if (count($datos) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Pedidos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Requisición');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Creador');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Progreso');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estatus');

      
        foreach ($datos['pedidos'] as $key => $value) {
          $datos['pedidos'][$key]->entregado = 0;
          $datos['pedidos'][$key]->cantidad = 0;
          $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
          foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
            $datos['pedidos'][$key]->entregado += $subvalue->entregado;
            $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
          }
          if ($datos['pedidos'][$key]->cantidad != 0) {
              $progreso = (($datos['pedidos'][$key]->entregado * 100) / $datos['pedidos'][$key]->cantidad);
          }else{
            $progreso = 0;
          }
                
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $datos['pedidos'][$key]->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $datos['pedidos'][$key]->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $datos['pedidos'][$key]->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $datos['pedidos'][$key]->uid_requisicion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $datos['pedidos'][$key]->nombre);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $datos['pedidos'][$key]->numero_proyecto.' '.$datos['pedidos'][$key]->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $progreso.'%');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $datos['pedidos'][$key]->estatus);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Pedidos_'.date('d-m-Y  H:i:s').'.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$archivo.'"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //Hacemos una salida al navegador con el archivo Excel.
      $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
      redirect(base_url().'almacen/','refresh');
    }  
  }

  public function excel_pedidos_cv($estatus) {
    $datos['pedidos'] = $this->pedidos_model->pedidos_cv_excel($estatus);
    if (count($datos) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Pedidos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Requisición');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Creador');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Eco');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Progreso');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Estatus');

      
        foreach ($datos['pedidos'] as $key => $value) {
          $datos['pedidos'][$key]->entregado = 0;
          $datos['pedidos'][$key]->cantidad = 0;
          $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
          foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
            $datos['pedidos'][$key]->entregado += $subvalue->entregado;
            $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
          }
          if ($datos['pedidos'][$key]->cantidad != 0) {
              $progreso = (($datos['pedidos'][$key]->entregado * 100) / $datos['pedidos'][$key]->cantidad);
          }else{
            $progreso = 0;
          }
                
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $datos['pedidos'][$key]->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $datos['pedidos'][$key]->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $datos['pedidos'][$key]->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $datos['pedidos'][$key]->uid_requisicion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $datos['pedidos'][$key]->nombre);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $datos['pedidos'][$key]->numero_proyecto.' '.$datos['pedidos'][$key]->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $datos['pedidos'][$key]->observaciones);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $progreso.'%');
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $datos['pedidos'][$key]->estatus);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Pedidos_'.date('d-m-Y  H:i:s').'.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$archivo.'"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //Hacemos una salida al navegador con el archivo Excel.
      $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
      redirect(base_url().'almacen/','refresh');
    }  
  }

  public function excel_pedidos_virtuales() {
    $datos['pedidos'] = $this->pedidos_model->pedidos_virtuales();
    if (count($datos) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Pedidos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Requisición');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Creador');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Progreso');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estatus');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Proveedor');

      
        foreach ($datos['pedidos'] as $key => $value) {
          $datos['pedidos'][$key]->entregado = 0;
          $datos['pedidos'][$key]->cantidad = 0;
          $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
          foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
            $datos['pedidos'][$key]->entregado += $subvalue->entregado;
            $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
          }
        
                
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $datos['pedidos'][$key]->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $datos['pedidos'][$key]->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $datos['pedidos'][$key]->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $datos['pedidos'][$key]->uid_requisicion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $datos['pedidos'][$key]->nombre);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $datos['pedidos'][$key]->numero_proyecto.' '.$datos['pedidos'][$key]->nombre_proyecto);
        if($datos['pedidos'][$key]->cantidad > 0){
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", (($datos['pedidos'][$key]->entregado * 100) / $datos['pedidos'][$key]->cantidad).'%');
        }else{
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", ('0.00%'));
        }
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $datos['pedidos'][$key]->estatus);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $datos['pedidos'][$key]->nombre_comercial);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Pedidos_'.date('d-m-Y  H:i:s').'.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$archivo.'"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //Hacemos una salida al navegador con el archivo Excel.
      $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
      redirect(base_url().'almacen/','refresh');
    }  
  }

  public function excel_pedidos_kuali() {
    $datos['pedidos'] = $this->pedidos_model->pedidos_kuali();
    if (count($datos) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Pedidos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Requisición');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Creador');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Progreso');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estatus');

      
        foreach ($datos['pedidos'] as $key => $value) {
          $datos['pedidos'][$key]->entregado = 0;
          $datos['pedidos'][$key]->cantidad = 0;
          $datos['detalle'][$key] = $this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos);
          foreach ($this->pedidos_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
            $datos['pedidos'][$key]->entregado += $subvalue->entregado;
            $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
          }
        
                
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $datos['pedidos'][$key]->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $datos['pedidos'][$key]->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $datos['pedidos'][$key]->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $datos['pedidos'][$key]->uid_requisicion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $datos['pedidos'][$key]->nombre);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $datos['pedidos'][$key]->numero_proyecto.' '.$datos['pedidos'][$key]->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", (($datos['pedidos'][$key]->entregado * 100) / $datos['pedidos'][$key]->cantidad).'%');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $datos['pedidos'][$key]->estatus);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Pedidos_'.date('d-m-Y  H:i:s').'.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$archivo.'"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //Hacemos una salida al navegador con el archivo Excel.
      $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
      redirect(base_url().'almacen/','refresh');
    }  
  }

  //Función para obtener datos del producto
  public function ultimoPedido(){
    $idcatalogo = $this->input->post('idtbl_catalogo');    
    $result = $this->pedidos_model->ultimoPedido($idcatalogo);
    echo json_encode($result);
  }

}