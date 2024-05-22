<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empresas extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('empresas_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->permisos = $this->empresas_model->permisos('empresas');
  }
  //Carga la vista de las empresas
  public function index() {
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['departamentos'] = $this->departamentos_model->listado_departamentos($buscar = null);
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Empresas';
    $datos['clase_pagina'] = 'home-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('empresas/ver-empresas.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Muestra un json de las empresas
  public function mostrarDirecciones() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "direcciones" => $this->empresas_model->listado_direcciones($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_direcciones($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Muestra un json de las empresas
  public function mostrarAreas() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "areas" => $this->empresas_model->listado_areas($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_areas($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Muestra un json de las empresas
  public function mostrarEmpresas() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "empresas" => $this->empresas_model->listado_empresas($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_empresas($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Muestra un json 
  public function mostrarEstablecimientos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "establecimientos" => $this->empresas_model->listado_establecimientos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_establecimientos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Carga la vista de departamentos
  public function departamentos($id_establecimiento='') {
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['departamentos'] = $this->departamentos_model->listado_departamentos($buscar = null);
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Empresas';
    $datos['clase_pagina'] = 'home-page';
    $datos['id_establecimiento'] = $id_establecimiento;
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('departamentos/ver-departamentos.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Carga la vista de departamentos
  public function direcciones($id_establecimiento='') {
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['departamentos'] = $this->departamentos_model->listado_departamentos($buscar = null);
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Direcciones';
    $datos['clase_pagina'] = 'home-page';
    $datos['id_establecimiento'] = $id_establecimiento;
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('departamentos/ver-direcciones', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function areas($id_direccion='') {
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['departamentos'] = $this->departamentos_model->listado_departamentos($buscar = null);
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Áreas';
    $datos['clase_pagina'] = 'home-page';
    $datos['id_direccion'] = $id_direccion;
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('departamentos/ver-areas', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  //Muestra un json de los departamentos
  public function obtener_direcciones() {
    if ($this->input->post('establecimiento')) {
      $check_user = $this->empresas_model->catalogo_direcciones_por_empresa($this->input->post('establecimiento'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "No existe información para su consulta."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error en POST."
      ));
    }
  }

  //Muestra un json de los departamentos
  public function obtener_areas() {
    if ($this->input->post('establecimiento')) {
      $check_user = $this->empresas_model->catalogo_areas_por_empresa($this->input->post('establecimiento'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "No existe información para su consulta."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error en POST."
      ));
    }
  }

  //Muestra un json de los departamentos
  public function obtener_departamentos() {
    if ($this->input->post('establecimiento')) {
      $check_user = $this->empresas_model->catalogo_departamentos_por_empresa($this->input->post('establecimiento'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "No existe información para su consulta."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error en POST."
      ));
    }
  }
  //Muestra un json de departamentos por empresa
  public function mostrarDepartamentosEmpresas() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "departamentos" => $this->empresas_model->listado_departamentos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_departamentos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function mostrarDepartamentosEstablecimientos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "departamentos" => $this->empresas_model->listado_departamentos_establecimientos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->empresas_model->listado_departamentos_establecimientos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  
  public function nueva_empresa() {
    if (!($this->permisos > 1))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('empresa', 'empresa', 'required|trim|min_length[4]|max_length[50]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese un nombre de empresa válido.');
        redirect(base_url().'empresas');
      } else {
        $empresa = ucwords($this->input->post('empresa'));
        $uid = uniqid();
        $check_user = $this->empresas_model->nueva_empresa($empresa, $uid);
        if ($check_user) {
          $this->empresas_model->log($this->session->userdata('nombre').' creó empresa "'.$empresa.'"', 'empresas/empresa/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().'empresas');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().'empresas');
        }
      }
    } else {
      redirect(base_url().'empresas');
    }
  }

  public function nuevo_establecimiento() {
    if (!($this->permisos > 1))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('establecimiento', 'establecimiento', 'required|trim|min_length[4]|max_length[50]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese un nombre de empresa válido.');
        redirect(base_url().'empresas');
      } else {
        $establecimiento = ucwords($this->input->post('establecimiento'));
        $uid = uniqid();
        $check_user = $this->empresas_model->nuevo_establecimiento($establecimiento, $uid);
        if ($check_user) {
          $this->empresas_model->log($this->session->userdata('nombre').' creó empresa "'.$establecimiento.'"', 'empresas/empresa/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().'empresas');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().'empresas');
        }
      }
    } else {
      redirect(base_url().'empresas');
    }
  }
 
  public function token( ) {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function excel_departamentos() {
    $reporte = $this->departamentos_model->listado_departamentos($buscar = null);
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Departamentos ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
  
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Cve Departamento');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Departamento');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Perfiles');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Personal');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->departamento);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->perfiles);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->personal);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Departamentos_'.date('d-m-Y  H:i:s').'.xls';
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
