<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estimaciones extends CI_Controller {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *        http://example.com/index.php/welcome
   *    - or -
   *        http://example.com/index.php/welcome/index
   *    - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct() {
    parent::__construct();
    $this->load->model('compras_model');
    $this->load->model('almacen_model');
    $this->load->model('proyectos_model');
    $this->load->model('departamentos_model');
    $this->load->model('estimaciones_model');
    //if (!$this->session->userdata('is_logued_in'))
      //redirect(base_url().'login');
  }
  
  public function index() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Compras';
    $datos['permiso'] = $this->departamentos_model->permisos('almacen');
    $datos['clase_pagina'] = 'compras-page';
    $datos['proyectos'] = $this->proyectos_model->proyectos();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('estimaciones/index', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function mostrarEstimacionesComprasIndex() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['solicitudes'] = $this->estimaciones_model->estimaciones($buscar,$inicio,$cantidad);
    $totalRegistros = count($this->estimaciones_model->estimaciones($buscar));
    
    foreach ($datos['solicitudes'] as $key => $value) {
      $datos['solicitudes'][$key]->comprado = 0;
      $datos['solicitudes'][$key]->cantidad = 0;
      foreach ($this->estimaciones_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_estimacion) as $subkey => $subvalue) {
        $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
        $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "solicitudes" => $datos['solicitudes'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function detalle_solicitud($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Detalle Estimación';
    $datos['clase_pagina'] = 'compras-page';
    $datos['solicitud'] = $this->estimaciones_model->detalle_solicitud($uid);
    $datos['detalle'] = $this->estimaciones_model->detalle_solicitud_catalogo($datos['solicitud']->idtbl_solicitudes_estimacion);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['pedidos'] = $this->compras_model->get_pedidos($datos['solicitud']->idtbl_solicitudes_estimacion);
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['get_detalle_prod_pedidos'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->compras_model->get_detalle_prod_pedidos($datos['pedidos'][$key]->idtbl_pedidos);
      // $datos['get_detalle_prod_pedidos2'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->pedidos_model->detalle_pedido($datos['pedidos'][$key]->uid); 
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('estimaciones/detalle-solicitud', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function cambiarProyecto() {
    $parametros = array(
      'tbl_proyectos_idtbl_proyectos' => $_POST['proyecto'],
      'nota_cambio_proyecto' => $_POST['nota_cambio_proyecto']
    );
    if($this->estimaciones_model->actualizarProyectoSolicitudEstimacion($parametros,$_POST['uid'])) {
      echo "OK";
      return;
    }
    else {
      echo "ERROR";
      return;
    }
  }

  public function nuevo_pedido_estimacion() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0))
          redirect(base_url());
    $this->load->model('proveedores_model');
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Compras';
    $datos['clase_pagina'] = 'compras-page';
    $datos['proveedores'] = $this->proveedores_model->proveedores();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('estimaciones/nuevo_pedido_estimacion', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function guardar_pedido() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 2) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $uid = uniqid();
        $check = $this->estimaciones_model->guardar_pedido($uid);
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Pedido creado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' generó un nuevo pedido', 'compras/detalle-pedido/'.$uid);
        } else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Algo salio mal.'
          ));
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

  public function actualizaritem() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 2) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->actualizaritem();
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Actualización exitosa.'
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Algo salio mal.'
          ));
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
  public function datossolicitud() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->estimaciones_model->datossolicitud($this->input->post('uid'));
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'datos' => $check
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'No existen datos.'
          ));
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

  public function nueva_solicitud_compra_estimacion(){
    $this->permisos = $this->departamentos_model->permisos('solicitud-compra');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitud de compra';
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['clase_pagina'] = 'compras-page';
    $this->load->model('personal_model');
    $datos['contratistas'] = $this->personal_model->contratistas_solicitudes();
    $datos['supervisores'] = $this->personal_model->todos_los_usuarios('interno');
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitud-de-compra-estimacion', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function nueva_solicitud_estimacion() {
    $permisos = $this->departamentos_model->permisos('solicitud-compra');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $uid = uniqid();
        /* Si tiene permisos de edicion en compras las solicitudes se crean con estatus aprobado */
        if ($this->departamentos_model->permisos('compras') > 2)
          $estatus = 'aprobada';
        else
          $estatus = 'pendiente';
        $check = $this->compras_model->nueva_solicitud_estimacion($uid, $estatus);
        if ($check == true) {
          echo json_encode(array(
            'error' => false
          ));
          $this->session->set_flashdata('exito', 'Solicitud enviada correctamente.');
          $this->almacen_model->log($this->session->userdata('nombre').' generó una nueva solicitud de compra', 'compras/detalle-solicitud/'.$uid);
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  
  public function cancelar_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->estimaciones_model->cancelar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud cancelada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' cancelo una solicitud de compra', 'estimaciones/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  public function modificar_solicitud() {
    $permisos = $this->departamentos_model->permisos('direccion');
    if ($permisos <= 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->estimaciones_model->modificar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud modificada y aprobada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' modifico una solicitud de compra', 'estimaciones/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  public function aprobar_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->estimaciones_model->aprobar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud aprobada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' aprobo una solicitud de compra', 'estimaciones/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  /* alfredo */
  public function creada_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->creada_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud editada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' cancelo una solicitud de compra', 'estimaciones/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  public function get_pedidos() {
    $check = $this->compras_model->get_pedidos();
    echo json_encode($check);
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Pedido creado correctamente.'
      ));
      $this->almacen_model->log($this->session->userdata('nombre').' generó un nuevo pedido', 'compras/detalle-pedido/'.$uid);
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'Algo salio mal.'
      ));
  }

  public function add_upfile_solicitud_compras() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->add_upfile_solicitud_compras($this->input->post('idtbl_solicitudes_almacen'), $this->input->post('file'));
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Archivo actualizado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' upfile a solicitud compras', 'compras/add_upfile_solicitud_compras/'.$this->input->post('idtbl_solicitudes_almacen'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
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
  public function detalle_pedido_hist_cantidad() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->detalle_pedido_hist_cantidad($this->input->post('idtbl_pedidos'), $this->input->post('idtbl_catalogo'), $this->input->post('tipo'));
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'datos' => $check
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'No existen datos.'
          ));
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

  public function modificarCantidad(){
    $registros = count($this->input->post("cantidad"));
    $respuesta = $this->estimaciones_model->modificarCantidad($registros);
    if($respuesta){
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se actulizo correctamente.'
      ));
    }else{
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'Occurrio un error al actualizar.'
      ));
    }
  }

  public function excel_solicitud_compras() {
   
    $reporte = $this->compras_model->mis_solicitudes();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
  
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha de Creación');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Fecha Límite');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proyecto');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Estatus');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha_creacion);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_limite);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_proyecto.' - '.$dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->estatus_solicitud);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Solicitudes_Compras_'.date('d-m-Y  H:i:s').'.xls';
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

  public function excel_solicitudes_compras() {
    $reporte = $this->compras_model->solicitudes();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Solicitudes Estimaciones ');
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
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha de Creación');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Fecha Límite');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Creador');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Proyecto');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estatus');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha_creacion);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_limite);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->nombre);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->numero_proyecto.' - '.$dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->estatus_solicitud);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Solicitudes_Compras_'.date('d-m-Y  H:i:s').'.xls';
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