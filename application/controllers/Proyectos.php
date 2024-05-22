<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proyectos extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('proyectos_model');
    $this->load->model('estados_model');
    $this->load->model('departamentos_model');
    $this->load->model('personal_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->permisos = $this->departamentos_model->permisos('proyectos');
    if ($this->permisos == 0)
      redirect(base_url());
  }
  public function index() {
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    $this->load->model('clientes_model');
    $datos['titulo'] = 'Proyectos';
    $datos['clase_pagina'] = 'proyectos-page';
    $datos['token'] = $this->token();
    //$datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['clientes'] = $this->clientes_model->todos_los_clientes();
    $datos['tipo_perimiso'] = $this->permisos;
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proyectos/ver-proyectos.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function mostrarProyectos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "proyectos" => $this->proyectos_model->mostrar_proyectos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->proyectos_model->mostrar_proyectos($buscar)),
      "cantidad" => $cantidad
    );
    echo json_encode($data);
  }
  public function nuevo_proyecto() {
    if ($this->permisos <= 1){
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('cliente', 'cliente', 'required|trim|min_length[1]|max_length[4]');
      $this->form_validation->set_rules('proyecto', 'proyecto', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('ubicacion', 'ubicacion', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('numero', 'número de proyecto', 'required|trim|min_length[3]|max_length[150]|is_unique[tbl_proyectos.numero_proyecto]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Falta un campo obligatorio y/o número de proyecto repetido.');
        redirect(base_url().'proyectos');
      } else {
        $uid = uniqid();
        $check_user = $this->proyectos_model->nuevo_proyecto($uid);
        if ($check_user) {
          $this->proyectos_model->log($this->session->userdata('nombre').' creó proyecto "'.ucwords($this->input->post('proyecto')).'"', 'proyectos/detalle/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().'proyectos');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().'proyectos');
        }
      }
    } else {
      redirect(base_url().'proyectos');
    }
  }
  public function detalle($uid) {
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['titulo'] = 'Detalle Proyecto';
    $datos['clase_pagina'] = 'proyectos-page';
    $datos['proyecto'] = $this->proyectos_model->detalle_proyecto($uid);
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proyectos/detalle-proyecto', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function editar($uid) {
    if (!($this->permisos > 2))
      redirect(base_url());
    $datos['titulo'] = 'Editar Proyecto';
    $datos['clase_pagina'] = 'proyectos-page';
    $datos['token'] = $this->token();
    $datos['uid'] = $uid;
    $datos['proyecto'] = $this->proyectos_model->detalle_proyecto($uid);
    $datos['personal'] = $this->personal_model->todos_los_usuarios('interno');
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proyectos/editar-proyecto', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function actualizar_proyecto() {
    if (!($this->permisos > 2))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      //$this->form_validation->set_rules('nombre_proyecto', 'nombre de proyecto', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('numero_proyecto', 'número de proyecto', 'required|trim|min_length[1]|max_length[10]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->editar($this->input->post('uid'));
      } else {
        $proyecto = ucwords($this->input->post('nombre_proyecto'));
        $check = $this->proyectos_model->actualizar_proyecto();
        if ($check) {
          $this->proyectos_model->log($this->session->userdata('nombre').' actualizó proyecto "'.$proyecto.'"', 'proyectos/detalle/'.$this->input->post('uid'));
          $this->session->set_flashdata('exito', 'Actualización de proyecto exitosa');
          redirect(base_url().'proyectos/detalle/'.$this->input->post('uid'));
        } else {
          //Error 1
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente. (ERROR 1)');
          redirect(base_url().'proyectos/editar/'.$this->input->post('uid'));
        }
      }
    } else {
      redirect(base_url().'proyectos');
    }
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  // Para C.O
  public function movimientos_almacen($uid) {
    $this->permisos = $this->departamentos_model->permisos('proyectos');
    if (!($this->permisos > 0) && $this->session->userdata('tipo') != 11){
      redirect(base_url());
    }
    $this->load->model('almacen_model');
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Almacen';
    $datos['clase_pagina'] = 'almacen-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    $datos['proyecto'] = $this->proyectos_model->getProyectoByUid($uid);
    $datos['reporte_proyectos'] = $this->almacen_model->reporteProyectos($uid);
    $datos['aux'] = 'si';
    $datos['uid'] = $uid;
    $this->load->view('almacen/detalle-almacen', $datos);
    $this->load->view('plantillas/footer', $datos);
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

  public function excel_proyectos() {
      
    $reporte = $this->proyectos_model->todos_los_proyectos();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Proyectos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
  
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Número Proyecto');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Ubicación');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_proyecto);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->direccion);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Proyectos_'.date('d-m-Y  H:i:s').'.xls';
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

  public function excel_proyectos_completo() {
        
    $reporte = $this->proyectos_model->todos_los_proyectos();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Proyectos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Número Proyecto');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Fecha Creación');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Fecha Inicio');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Fecha Termino');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Ubicación');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Cliente');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_proyecto);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_inicio);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->fecha_termino);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->direccion);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->razon_social);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Proyectos_'.date('d-m-Y  H:i:s').'.xls';
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

  //Activa el pryecto
  public function activar_proyecto() {
         
    $check = $this->proyectos_model->activar_proyecto();
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Proyecto activado correctamente.'
      ));
      
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }     

}

//Desactiva el proyecto
public function desactivar_proyecto() {    
 
    $check = $this->proyectos_model->desactivar_proyecto();
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Proyecto desactivado correctamente.'
      ));
     
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }     

}
}
