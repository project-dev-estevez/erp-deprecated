<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clientes extends CI_Controller {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   * 		http://example.com/index.php/welcome
   *	- or -
   * 		http://example.com/index.php/welcome/index
   *	- or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct() {
    parent::__construct();
    $this->load->model('clientes_model');
    $this->load->model('estados_model');
    $this->load->model('departamentos_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->permisos = $this->departamentos_model->permisos('clientes');
    if ($this->permisos == 0)
      redirect(base_url());
  }
  //Carga index de clientes
  public function index() {
    if (!($this->permisos > 0))
      redirect(base_url());
    if ($this->session->userdata('is_logued_in')) {
      $datos['titulo'] = 'Clientes';
      $datos['clase_pagina'] = 'clientes-page';
      //$datos['numero_usuarios'] = $this->usuarios_model->numero_usuarios();
      //$datos['nuevos_usuarios'] = $this->usuarios_model->nuevos_usuarios();
      //$datos['clientes'] = $this->clientes_model->todos_los_clientes();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('clientes/ver-clientes.php', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url().'login');
  }
  //Muestra json de los clientes
  public function mostrarClientes() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "clientes" => $this->clientes_model->todos_los_clientes($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->clientes_model->todos_los_clientes($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Carga vista de un nuevo cliente
  public function nuevo() {
    if (!($this->permisos > 1))
      redirect(base_url());
    $datos['titulo'] = 'Nuevo Cliente';
    $datos['clase_pagina'] = 'clientes-page';
    $datos['token'] = $this->token();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('clientes/nuevo-cliente', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Guarda un nuevo cliente
  public function guardar_cliente() {
    if (!($this->permisos > 1))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('razon_social', 'razón social', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[12]|max_length[13]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->nuevo();
      } else {
        $uid = uniqid();
        if ($this->clientes_model->guardar_cliente($uid)) {
          $this->clientes_model->log($this->session->userdata('nombre').' creó cliente "'.$this->input->post('razon_social').'"', 'clientes/detalle/'.$uid);
          $this->session->set_flashdata('exito', 'Registro Exitoso.');
          redirect(base_url().'clientes');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          $this->nuevo();
        }
      }
    } else {
      $this->nuevo();
    }
  }
  //Carga vista del detalle del cliente
  public function detalle_cliente($uid) {
    if (!($this->permisos > 1))
      redirect(base_url());
    $this->load->model('proyectos_model');
    $datos['titulo'] = 'Detalle Cliente';
    $datos['clase_pagina'] = 'clientes-page';
    $datos['token'] = $this->token();
    $datos['detalle'] = $this->clientes_model->detalle_cliente($uid);
    if ($datos['detalle'] == NULL)
      redirect(base_url());
    $datos['proyectos'] = $this->proyectos_model->proyectos_cliente($datos['detalle']->idtbl_clientes);
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('clientes/detalle-cliente', $datos);
    $this->load->view('plantillas/footer', $datos); # code...
  }
  //Edita los datos de un cliente
  public function editar() {
    if (!($this->permisos > 2))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('razon_social', 'razón social', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[12]|max_length[13]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().$this->input->post('from'));
      } else {
        if ($this->clientes_model->editar_cliente()) {
          $this->clientes_model->log($this->session->userdata('nombre').' editó cliente "'.$this->input->post('razon_social').'"', 'clientes/detalle/'.$this->input->post('uid'));
          $this->session->set_flashdata('exito', 'Actualización Exitosa.');
          redirect(base_url().$this->input->post('from'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          redirect(base_url().$this->input->post('from'));
        }
      }
    } else {
      redirect(base_url().'login');
    }
  }
  //Crea un nuevo token
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  //Crea un excel de los clientes
  public function excel_clientes() {
       
    $reporte = $this->clientes_model->todos_los_clientes();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Clientes ');
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
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'RFC');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre Comercial');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Razón Social');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Email');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Teléfonos');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Dirección');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->rfc);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombre_comercial);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->razon_social);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->email);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->telefono);
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->direccion);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Clientes_'.date('d-m-Y  H:i:s').'.xls';
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
