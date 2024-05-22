<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pedidosestimacion extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('departamentos_model');
    $this->load->model('pedidos_estimacion_model');
    $this->load->model('almacen_model');
    $this->load->model('compras_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
  }
  public function ver_pedidos_estimacion() {
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
      $datos['bancos'] = $this->pedidos_estimacion_model->bancos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('pedidos-estimacion/ver-pedidos-estimacion', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url().'login');
  }

  public function cerrarPedido() {
    $resultado = $this->pedidos_estimacion_model->cerrarPedido();
    if($resultado) {
      echo "OK";
    }
    else {
      echo "ERROR";
    }
  }

  public function imprimirDetallePedidoEstimacion($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Pedido';
    $datos['clase_pagina'] = 'pedidos-page';
    $datos['pedido'] = $this->pedidos_estimacion_model->detalle_pedido($uid);
    $datos['detalle'] = $this->pedidos_estimacion_model->detalle_pedido_catalogo($datos['pedido']->idtbl_pedidos);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    $this->load->view('pedidos-estimacion/detalle-pedido-imprimir-estimacion', $datos);
  }

  public function mostrarPedidos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['pedidos'] = $this->pedidos_estimacion_model->pedidos($buscar,$inicio,$cantidad);
    $totalRegistros = count($this->pedidos_estimacion_model->pedidos($buscar));
    
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['pedidos'][$key]->entregado = 0;
      $datos['pedidos'][$key]->cantidad = 0;
      foreach ($this->pedidos_estimacion_model->detalle_pedido_catalogo($value->idtbl_pedidos) as $subkey => $subvalue) {
        $datos['pedidos'][$key]->entregado += $subvalue->entregado;
        $datos['pedidos'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "pedidos" => $datos['pedidos'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function cancelarPedido() {
    //echo $_POST['uid_pedido'] . " " . $_POST['idtbl_solicitudes_almacen'] . " " . $_POST['motivo_cancelacion'];
    $parametros = array(
      'motivo_cancelacion' => $_POST['motivo_cancelacion'],
      'estatus' => 'cancelada'
    );

    $pedido = $this->pedidos_estimacion_model->cambiarEstatusPedido($parametros, $_POST['uid_pedido']);

    $parametros = array(
      'estatus_solicitud' => 'pendiente'
    );

    $solicitud_almacen = $this->compras_model->actualizarEstatusSolicitudAlmacen($parametros, $_POST['idtbl_solicitudes_almacen'], $_POST['estimacion']);

    $parametros = array(
      'comprado' => 0
    );

    $solicitud_catalogo = $this->compras_model->actualizarCantidadesSolicitudCatalogo($parametros, $_POST['idtbl_solicitudes_almacen'], $_POST['estimacion']);

    if($pedido && $solicitud_almacen && $solicitud_catalogo) {
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
    $datos['pedido'] = $this->pedidos_estimacion_model->detalle_pedido($uid);
    $datos['detalle'] = $this->pedidos_estimacion_model->detalle_pedido_catalogo($datos['pedido']->idtbl_pedidos);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('pedidos-estimacion/detalle-pedido-estimacion', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function datospedido() {
    $permisos = $this->departamentos_model->permisos('almacen');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->pedidos_estimacion_model->datospedido($this->input->post('uid'));
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

  public function excel_pedidos_estimacion() {
    $reporte = $this->pedidos_estimacion_model->pedidos();
    if (count($reporte) > 0) {
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
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);        

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Requisición');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Creador');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Proyecto');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->uid_requisicion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->nombre);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_proyecto.' '.$dato->nombre_proyecto);
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
}