<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Proveedores extends CI_Controller {
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->load->model('proveedores_model');
    $this->load->model('departamentos_model');
    $this->permisos = $this->departamentos_model->permisos('proveedores');
  }
  public function index() {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Proveedores';
    $datos['clase_pagina'] = 'proveedores-page';
    //$datos['proveedores'] = $this->proveedores_model->proveedores();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proveedores/ver-proveedores', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function nuevo() {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Proveedores';
    $datos['clase_pagina'] = 'proveedores-page';
    $datos['proveedores'] = $this->proveedores_model->proveedores();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proveedores/nuevo-proveedor', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function mostrarProveedores() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "proveedores" => $this->proveedores_model->proveedores($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->proveedores_model->proveedores($buscar)),
      "cantidad" => $cantidad
    );
    echo json_encode($data);
  }
  public function guardar() {
    if (!($this->permisos > 1)) {
      $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('nombre_comercial', '"nombre comercial"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('rfc', '"RFC"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('nombre_fiscal', '"nombre fiscal"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('datos_bancarios', '"datos bancarios"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('cuenta_bancaria', '"cuenta bancaria"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('clabe_inter', '"clabe interbancaria"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('refencia_bancaria', '"referencia bancaria"', 'required|trim|min_length[1]');
      if ($this->form_validation->run() == false) {
        $this->nuevo();
      } else {
        if ($this->proveedores_model->guardar()) {
          $this->session->set_flashdata('exito', 'Registro exitoso.');
          redirect(base_url().'proveedores');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          $this->nuevo();
        }
      }
    } else {
      $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
      redirect(base_url());
    }
  }
  public function actualizar() {
    if (!($this->permisos > 2)) {
      $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('nombre_comercial', '"nombre comercial"', 'required|trim|min_length[1]');
      $this->form_validation->set_rules('rfc', '"RFC"', 'required|trim|min_length[1]');
      if ($this->form_validation->run() == false) {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().'proveedores/detalle/'.$this->input->post('id'));
      } else {
        if ($this->proveedores_model->actualizar()) {
          $this->session->set_flashdata('exito', 'Actualización exitosa.');
          redirect(base_url().'proveedores/detalle/'.$this->input->post('id'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          $this->nuevo();
        }
      }
    } else {
      $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
      redirect(base_url());
    }
  }
  public function detalle($id) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Proveedores';
    $datos['clase_pagina'] = 'proveedores-page';
    $datos['detalle'] = $this->proveedores_model->detalle($id);
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('proveedores/detalle-proveedor', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function excel_proveedores() {
   
    $reporte = $this->proveedores_model->proveedores();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Proveedores ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(7); //iD
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(40); //Nombre fiscal
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(40); //Nombre comercial
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30); //RFC
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(40); //Persona de contacto
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); //Telefonos
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(50); //Dirección
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(40); //Colonia
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20); //C.P.
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); //Ciudad
        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(40); //Condiciones de pago
        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); //Datos bancarios
        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); //Cuenta bancaria
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(40); //Clabe interbancaria
        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(40); //Referencia bancaria
        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20); //Tipo moneda        
        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(40); //Observaciones
  
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
        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
  
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'ID');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre Fiscal');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Proveedor');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'RFC');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Persona de contacto');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Telefonos');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Dirección');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Colonia');
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Código Postal');
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Ciudad');
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Condiciones de Pago');
        $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Datos bancarios');
        $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Cuenta bancaria');
        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Clabe interbancaria');
        $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Referencia bancaria');
        $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Tipo Moneda');
        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Observaciones');
  
        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_proveedores);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombre_fiscal);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_comercial);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->rfc);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->persona_contacto);
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->telefonos);
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->direccion);
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->colonia);
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->cp);
          $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->ciudad);
          $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->condiciones_pago);
          $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->datos_bancarios);
          $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->cuenta_bancaria);
          $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->clabe_inter);
          $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->refencia_bancaria);
          $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->moneda);
          $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->observaciones);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Proveedores_'.date('d-m-Y  H:i:s').'.xls';
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
