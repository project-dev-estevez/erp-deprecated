<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

class Contratistas extends CI_Controller {
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
  public function __construct( ) {
    parent::__construct();
    $this->load->model('personal_model');
    $this->load->model('departamentos_model');
    $this->load->model('estados_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->permisos = $this->departamentos_model->permisos('contratistas');
    if ($this->permisos == 0)
      redirect(base_url());
  }
  //Carga vista del detalle de la baja
  public function detalle_baja($uid) {
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    $this->load->model('almacen_model');
    $header['clase_pagina'] = 'personal-page';
    $header['titulo'] = 'Detalle Bajas Personal';
    $datos['detalle'] = $this->personal_model->detalle_bajas($uid);
    $this->load->view('plantillas/header', $header);
    $this->load->view('personal/detalle-personal-baja', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Da de baja al contratista
  public function baja() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      if ($this->personal_model->baja_personal()) {
        $uid = $this->input->post('uid');
        $this->personal_model->log($this->session->userdata('nombre').' dio de baja al usuario "'.$this->input->post('nombre').'"', 'personal/detalle/'.$uid);
        echo json_encode(array(
          'status' => true
        ));
      } else {
        echo json_encode(array(
          'status' => false,
          'message' => 'Ocurrio un error intente nuevamente'
        ));
      }
    } else {
      echo json_encode(array(
        'status' => false,
        'message' => 'Error: Token incorrecto.'
      ));
    }
  }
  //Da de alta al contratista
  public function alta() {
    if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $uid = $this->input->post('uid') ;
      if($this->personal_model->alta_personal($uid)){
        $this->personal_model->log($this->session->userdata('nombre').' dio de alta al usuario "'.$this->input->post('nombre').'"','personal/detalle/'.$uid);
        echo json_encode(array('status' => true));
      }else{
        echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente' ) );
      }
    }else{
      echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.' ) );
    }
  }
  //Carga la vista para ver los contratistas
  public function index() {
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    $header['titulo'] = 'Contratistas';
    $header['clase_pagina'] = 'personal-page';
    //$datos['personal']['inactivos'] = $this->personal_model->todos_los_usuarios_baja('contratista');
    //$datos['personal']['activos'] = $this->personal_model->todos_los_usuarios('contratista');
    //$datos['contratistas'] = $this->personal_model->contratistas($buscar='');
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/ver-contratistas.php');
    $this->load->view('plantillas/footer');
  }


  //Carga la vista para ver el personal del contratista
  public function personal_por_contratista($uid) {
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    $header['titulo'] = 'Contratistas';
    $header['clase_pagina'] = 'personal-page';
    //$datos['personal']['inactivos'] = $this->personal_model->todos_los_usuarios_baja('contratista');
    //$datos['personal']['activos'] = $this->personal_model->todos_los_usuarios('contratista');
    //$datos['contratistas'] = $this->personal_model->contratistas($buscar='');
    $header['uid'] = $uid;
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/personal-contratista');
    $this->load->view('plantillas/footer');
  }


  //Muestra un json con los contratistas
  public function mostrarContratistas() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "departamentos" => $this->personal_model->contratistas($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->contratistas($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Muestra un json con los contratistas inactivos
  public function mostrarContratistasInactivos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "contratistas" => $this->personal_model->contratistasInactivos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->contratistasInactivos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Muestra un json con los contratistas activos
  public function mostrarPersonalContratistaActivo() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "activos" => $this->personal_model->todos_los_usuarios('contratista','',$buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->todos_los_usuarios('contratista','',$buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Muestra un json con los contratistas inactivos
  public function mostrarPersonalContratistaInactivo() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "inactivos" => $this->personal_model->todos_los_usuarios_baja('contratista',$buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->todos_los_usuarios_baja('contratista',$buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Muestra un json con los contratistas activos
  public function mostrarPersonalPorContratistaActivo() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "activos" => $this->personal_model->personalPorContratista('contratista',1,$buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->personalPorContratista('contratista',1,$buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Muestra un json con los contratistas inactivos
  public function mostrarPersonalPorContratistaInactivo() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "inactivos" => $this->personal_model->personalPorContratista('contratista',0,$buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->personal_model->personalPorContratista('contratista',0,$buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Carga la vista de detalle de un contratista
  public function detalle($id) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Contratistas';
    $datos['clase_pagina'] = 'contratistas-page';
    $datos['detalle'] = $this->personal_model->detalle_contratista($id);
    $datos['personal'] = $this->personal_model->personal_contratista($datos['detalle']->idtbl_contratistas);
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('contratistas/detalle-contratista', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Carga la vista para dar de alta un nuevo personal de contratista
  public function nuevo_personal( ) {
    if (!($this->permisos > 1)) {
      redirect(base_url());
    }
    $this->load->model('proyectos_model');
    $header['titulo'] = 'Nuevo Personal';
    $header['clase_pagina'] = 'personal-page';
    $datos['token'] = $this->token();
    $datos['contratistas'] = $this->personal_model->contratistas('');
    $datos['estados'] = $this->estados_model->estados();
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['escolaridad'] = $this->departamentos_model->escolaridad();
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/nuevo-personal-contratista', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  //Guarda un nuevo contratista
  public function guardar_contratista() {
    if (!($this->permisos > 1)){
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('razon_social', 'Razón social', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('rfc', 'RFC', 'trim|min_length[12]|max_length[13]');
      $this->form_validation->set_rules('nombre_comercial', 'nombre comercial', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim|min_length[4]');
      $this->form_validation->set_rules('estatus', 'Estatus', 'required|trim|in_list[activo,pausa,proceso,baja]');
      $this->form_validation->set_rules('nombre_comercial', 'Nombre comercial', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('email', 'Estatus', 'trim|valid_email');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|numeric|min_length[10]');
      $this->form_validation->set_rules('telefono_2', 'Teléfono Adicional', 'trim|numeric|min_length[10]');
      $this->form_validation->set_rules('direccion', 'Dirección', 'trim|min_length[5]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->nuevo();
      } else {
        $uid = uniqid();
        
        $config['upload_path']          = './uploads/contratos/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('contrato');
        $datos = $this->upload->data();
        $contrato=$datos['file_name'];

        $config['upload_path']          = './uploads/comprobantes_domicilio/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('comprobante_domicilio');
        $datos = $this->upload->data();
        $comprobante_domicilio=$datos['file_name'];

        $config['upload_path']          = './uploads/ines/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('ine');
        $datos = $this->upload->data();
        $ine=$datos['file_name'];

        $config['upload_path']          = './uploads/32d/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('d');
        $datos = $this->upload->data();
        $d=$datos['file_name'];

        $config['upload_path']          = './uploads/sat/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('sat');
        $datos = $this->upload->data();
        $sat=$datos['file_name'];

        $config['upload_path']          = './uploads/cv/';
        $config['allowed_types']        = 'jpg|jpeg|pdf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']     =TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $this->upload->do_upload('cv');
        $datos = $this->upload->data();
        $cv=$datos['file_name'];

        if ($this->personal_model->guardar_contratista($uid,$contrato,$comprobante_domicilio,$ine,$d, $sat, $cv)) {
          $this->personal_model->log($this->session->userdata('nombre').' creó contratista "'.$this->input->post('razon_social').'"', 'contratista/detalle/'.$uid);
          $this->session->set_flashdata('exito', 'Registro Exitoso.');
          redirect(base_url().'contratistas');
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          $this->nuevo();
        }
      }
    } else {
      $this->nuevo();
    }
  }
  //Actualiza los datos de un contratista
  public function actualizar_contratista( ) {
    if (!($this->permisos > 1)){
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('razon_social', 'Razón social', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('rfc', 'RFC', 'trim|min_length[12]|max_length[13]');
      $this->form_validation->set_rules('nombre_comercial', 'nombre comercial', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('responsable', 'Responsable', 'required|trim|min_length[4]');
      $this->form_validation->set_rules('estatus', 'Estatus', 'required|trim|in_list[activo,pausa,proceso,baja]');
      $this->form_validation->set_rules('nombre_comercial', 'Nombre comercial', 'required|trim|min_length[3]|max_length[150]');
      $this->form_validation->set_rules('email', 'Estatus', 'trim|valid_email');
      $this->form_validation->set_rules('telefono', 'Teléfono', 'trim|numeric|min_length[10]');
      $this->form_validation->set_rules('telefono_2', 'Teléfono Adicional', 'trim|numeric|min_length[10]');
      $this->form_validation->set_rules('direccion', 'Dirección', 'trim|min_length[5]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->detalle($this->input->post('uid'));
      } else {

        $archivos = $this->personal_model->getArchivos($this->input->post('uid'));

        if ($_FILES['contrato']['name'] != null && !empty($archivos[0]['contrato'])) {
          unlink('./uploads/contratos/'.$archivos[0]['contrato']);
          $config['upload_path']          = './uploads/contratos/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = '1500000';
          //$config['max_width']            = 0;
          //$config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('contrato');
          $datos = $this->upload->data();
          $contrato=$datos['file_name'];
        
        }

        if ($_FILES['contrato']['name'] != null && empty($archivos[0]['contrato'])) {
          $config['upload_path']          = './uploads/contratos/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = '1500000';
          //$config['max_width']            = 0;
          //$config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('contrato');
          $datos = $this->upload->data();
          $contrato=$datos['file_name'];
        }

        if ($_FILES['contrato']['name'] == null && empty($archivos[0]['contrato'])) {
          $contrato = null;
        }

        if ($_FILES['contrato']['name'] == null && !empty($archivos[0]['contrato'])) {
          $contrato = $archivos[0]['contrato'];
        }

        //*********************************************************************
        if ($_FILES['comprobante_domicilio']['name'] != null && !empty($archivos[0]['comprobante_domicilio'])) {
          unlink('./uploads/comprobantes_domicilio/'.$archivos[0]['comprobante_domicilio']);
          $config['upload_path']          = './uploads/comprobantes_domicilio/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('comprobante_domicilio');
          $datos = $this->upload->data();
          $comprobante_domicilio=$datos['file_name'];
        
        }

        if ($_FILES['comprobante_domicilio']['name'] != null && empty($archivos[0]['comprobante_domicilio'])) {
          $config['upload_path']          = './uploads/comprobantes_domicilio/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('comprobante_domicilio');
          $datos = $this->upload->data();
          $comprobante_domicilio=$datos['file_name'];
        }

        if ($_FILES['comprobante_domicilio']['name'] == null && empty($archivos[0]['comprobante_domicilio'])) {
          $comprobante_domicilio = null;
        }

        if ($_FILES['comprobante_domicilio']['name'] == null && !empty($archivos[0]['comprobante_domicilio'])) {
          $comprobante_domicilio = $archivos[0]['comprobante_domicilio'];
        }
        //*************************************************************************
        if ($_FILES['ine']['name'] != null && !empty($archivos[0]['ine'])) {
          unlink('./uploads/ines/'.$archivos[0]['ine']);
          $config['upload_path']          = './uploads/ines/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('ine');
          $datos = $this->upload->data();
          $ine=$datos['file_name'];
        
        }

        if ($_FILES['ine']['name'] != null && empty($archivos[0]['ine'])) {
          $config['upload_path']          = './uploads/ines/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('ine');
          $datos = $this->upload->data();
          $ine=$datos['file_name'];
        }

        if ($_FILES['ine']['name'] == null && empty($archivos[0]['ine'])) {
          $ine = null;
        }

        if ($_FILES['ine']['name'] == null && !empty($archivos[0]['ine'])) {
          $ine = $archivos[0]['ine'];
        }
        //*********************************************************************************
        if ($_FILES['d']['name'] != null && !empty($archivos[0]['d'])) {
          unlink('./uploads/32d/'.$archivos[0]['d']);
          $config['upload_path']          = './uploads/32d/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('d');
          $datos = $this->upload->data();
          $d=$datos['file_name'];
        
        }

        if ($_FILES['d']['name'] != null && empty($archivos[0]['d'])) {
          $config['upload_path']          = './uploads/32d/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('d');
          $datos = $this->upload->data();
          $d=$datos['file_name'];
        }

        if ($_FILES['d']['name'] == null && empty($archivos[0]['d'])) {
          $d = null;
        }

        if ($_FILES['d']['name'] == null && !empty($archivos[0]['d'])) {
          $d = $archivos[0]['ine'];
        }

        //*********************************************************************************
        if ($_FILES['sat']['name'] != null && !empty($archivos[0]['sat'])) {
          unlink('./uploads/32d/'.$archivos[0]['sat']);
          $config['upload_path']          = './uploads/sat/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('sat');
          $datos = $this->upload->data();
          $sat=$datos['file_name'];
        
        }

        if ($_FILES['sat']['name'] != null && empty($archivos[0]['sat'])) {
          $config['upload_path']          = './uploads/sat/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('sat');
          $datos = $this->upload->data();
          $sat=$datos['file_name'];
        }

        if ($_FILES['sat']['name'] == null && empty($archivos[0]['sat'])) {
          $sat = null;
        }

        if ($_FILES['sat']['name'] == null && !empty($archivos[0]['sat'])) {
          $sat = $archivos[0]['sat'];
        }

        //*********************************************************************************
        if ($_FILES['cv']['name'] != null && !empty($archivos[0]['cv'])) {
          unlink('./uploads/cv/'.$archivos[0]['cv']);
          $config['upload_path']          = './uploads/cv/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('cv');
          $datos = $this->upload->data();
          $cv=$datos['file_name'];
        
        }

        if ($_FILES['cv']['name'] != null && empty($archivos[0]['cv'])) {
          $config['upload_path']          = './uploads/cv/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('cv');
          $datos = $this->upload->data();
          $cv=$datos['file_name'];
        }

        if ($_FILES['cv']['name'] == null && empty($archivos[0]['cv'])) {
          $cv = null;
        }

        if ($_FILES['cv']['name'] == null && !empty($archivos[0]['cv'])) {
          $cv = $archivos[0]['cv'];
        }
        

        if ($this->personal_model->actualizar_contratista($this->input->post('uid'),$contrato,$comprobante_domicilio,$ine,$d,$sat,$cv)) {
          $this->personal_model->log($this->session->userdata('nombre').' actualizo contratista "'.$this->input->post('razon_social').'"', 'contratista/detalle/'.$this->input->post('uid'));
          $this->session->set_flashdata('exito', 'Actualización Exitosa.');
          redirect(base_url().'contratistas/detalle/'.$this->input->post('uid'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          redirect(base_url().'contratistas/detalle/'.$this->input->post('uid'));
        }
      }
    } else {
      $this->nuevo();
    }
  }
  //Actualiza los datos del personal de los contratistas
  public function actualizar_personal( ) {
    if (!($this->permisos > 2)){
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('nombres', 'nombres', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('apellido_paterno', 'apellido paterno', 'required|trim|min_length[1]|max_length[100]');
      $this->form_validation->set_rules('apellido_materno', 'apellido materno', 'required|trim|min_length[1]|max_length[100]');
      $this->form_validation->set_rules('sexo', 'sexo', 'required|trim|min_length[8]|max_length[9]');
      $this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[13]|max_length[13]');
      $this->form_validation->set_rules('curp', 'CURP', 'required|trim|min_length[18]|max_length[18]');
      $this->form_validation->set_rules('nss', 'NSS', 'required|trim|min_length[11]|max_length[11]');
      $this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'required|trim|min_length[8]|max_length[10]');
      $this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('ctl_escolaridad_idctl_escolaridad', 'grado de estudios', 'required|trim');
      $this->form_validation->set_rules('tbl_contratistas_idtbl_contratistas', 'contratista', 'required|trim');
      $this->form_validation->set_rules('estudios', 'estudios', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('clave_elector', 'clave de elector', 'required|trim|min_length[1]|max_length[50]');
      $this->form_validation->set_rules('calle', 'calle', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('numero', 'numero', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('colonia', 'colonia', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('cp', 'código postal', 'required|trim|min_length[1]|max_length[10]');
      $this->form_validation->set_rules('estado_civil', 'estado civil', 'required|trim|min_length[6]|max_length[11]');
      $this->form_validation->set_rules('telefono_emergencia', 'teléfono de emergencia', 'required|trim|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('persona_contacto', 'persona de contacto', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('puesto_contrato', 'puesto contrato', 'required|trim|min_length[1]|max_length[150]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->editar_personal($this->input->post('uid'));
      } else {
        $uid = $this->input->post('uid');

        //*********************************************************************************
        $archivo = $this->personal_model->getDc3($this->input->post('uid'));
        
        if ($_FILES['dc3']['name'] != null && !empty($archivo[0]['dc3'])) {
          unlink('./uploads/dc3/'.$archivo[0]['dc3']);
          $config['upload_path']          = './uploads/dc3/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('dc3');
          $datos = $this->upload->data();
          $dc3=$datos['file_name'];
        
        }

        if ($_FILES['dc3']['name'] != null && empty($archivo[0]['dc3'])) {
          $config['upload_path']          = './uploads/dc3/';
          $config['allowed_types']        = 'jpg|jpeg|pdf';
          $config['max_size']             = 0;
          $config['max_width']            = 0;
          $config['max_height']           = 0;
          $config['encrypt_name']     =TRUE;
          $this->load->library('upload', $config);
          $this->upload->initialize($config);

          $this->upload->do_upload('dc3');
          $datos = $this->upload->data();
          $dc3=$datos['file_name'];
        }

        if ($_FILES['dc3']['name'] == null && empty($archivo[0]['dc3'])) {
          $dc3 = null;
        }

        if ($_FILES['dc3']['name'] == null && !empty($archivo[0]['dc3'])) {
          $dc3 = $archivo[0]['dc3'];
        }

        if ($this->personal_model->actualizar_usuario($uid, 'contratista',$dc3)) {
          $this->personal_model->log($this->session->userdata('nombre').' actualizó al usuario "'.$this->input->post('nombres').'"', 'contratistas/detalle-usuario/'.$uid);
          $this->session->set_flashdata('exito', 'Actualización exitosa.');
          redirect(base_url().'contratistas/detalle-usuario/'.$this->input->post('uid'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
          $this->editar_personal($this->input->post('uid'));
        }
      }
    } else {
      redirect(base_url());
    }
  }
  //Guarda el personal de un contratista
  public function guardar_personal() {
    if (!($this->permisos > 1)){
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('nombres', 'nombres', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('apellido_paterno', 'apellido paterno', 'required|trim|min_length[1]|max_length[100]');
      $this->form_validation->set_rules('apellido_materno', 'apellido materno', 'required|trim|min_length[1]|max_length[100]');
      $this->form_validation->set_rules('sexo', 'sexo', 'required|trim|min_length[8]|max_length[9]');
      $this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[13]|max_length[13]');
      $this->form_validation->set_rules('curp', 'CURP', 'required|trim|min_length[18]|max_length[18]');
      $this->form_validation->set_rules('nss', 'NSS', 'required|trim|min_length[11]|max_length[11]');
      $this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'required|trim|min_length[8]|max_length[10]');
      $this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('ctl_escolaridad_idctl_escolaridad', 'grado de estudios', 'required|trim');
      $this->form_validation->set_rules('tbl_contratistas_idtbl_contratistas', 'contratista', 'required|trim');
      $this->form_validation->set_rules('estudios', 'estudios', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('clave_elector', 'clave de elector', 'required|trim|min_length[1]|max_length[50]');
      $this->form_validation->set_rules('calle', 'calle', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('numero', 'numero', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('colonia', 'colonia', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('cp', 'código postal', 'required|trim|min_length[1]|max_length[10]');
      $this->form_validation->set_rules('estado_civil', 'estado civil', 'required|trim|min_length[6]|max_length[11]');
      $this->form_validation->set_rules('telefono_emergencia', 'teléfono de emergencia', 'required|trim|min_length[8]|max_length[20]');
      $this->form_validation->set_rules('persona_contacto', 'persona de contacto', 'required|trim|min_length[1]|max_length[150]');
      $this->form_validation->set_rules('puesto_contrato', 'puesto contrato', 'required|trim|min_length[1]|max_length[150]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->nuevo_personal();
      } else {
        $uid = uniqid();
        if ($this->personal_model->guardar_personal($uid, 'contratista')) {
          $this->personal_model->log($this->session->userdata('nombre').' creó al usuario(contratista) "'.$this->input->post('nombres').'"', 'contratistas/detalle-usuario/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().'contratistas/detalle-usuario/'.$uid);
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
          $this->nuevo_personal();
        }
      }
    } else {
      redirect(base_url());
    }
  }
  //Carga la vista de detalle del personal
  public function detalle_usuario($uid) {
    if (!($this->permisos > 0))
      redirect(base_url());
    $this->load->model('almacen_model');
    $header['titulo'] = 'Detalle Personal';
    $header['clase_pagina'] = 'personal-page';
    $datos['token'] = $this->token();
    $datos['detalle'] = $this->personal_model->detalle_usuario($uid);
    $datos['detalle']->uid_usuario = $uid;
    //$datos['asistencias'] = $this->personal_model->asistencias($uid);
    $datos['certificados'] = $this->personal_model->certificados();
    $datos['documentos'] = $this->personal_model->documentos();
    $datos['certificados_asignados'] = $this->personal_model->certificados_asignados($uid);
    $datos['documentos_asignados'] = $this->personal_model->documentos_asignados($uid);
    $datos['contratos'] = $this->personal_model->contratos_por_personal($uid);
    $datos['dias_disfrutados_vacaciones'] = $this->personal_model->dias_disfrutados_vacaciones($uid);
    $datos['vacaciones_permisos'] = $this->personal_model->vacaciones_permisos($uid);
    $datos['actas'] = $this->personal_model->actas($uid);
    $datos['asignaciones'] = $this->almacen_model->asignaciones_personal($uid);
    $datos['hojas_asignacion'] = $this->almacen_model->hojas_asignacion_usuario($uid);
    $datos['precio_dolar'] = $this->precio_actual_dolar();
    // Obtener fecha de la bd y calcular edad 
    try {
      $dia = date('j');
      $mes = date('n');
      $ano = date('Y');
      $nacimiento = explode("-", $datos['detalle']->fecha_nacimiento);
      $dianac = $nacimiento[2];
      $mesnac = $nacimiento[1];
      $anonac = $nacimiento[0];
      //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual 
      if (($mesnac == $mes) && ($dianac > $dia)) {
        $ano = ($ano - 1);
      }
      //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual 
      if ($mesnac > $mes) {
        $ano = ($ano - 1);
      }
      //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad 
      $edad = ($ano - $anonac);
      $datos['detalle']->edad = $edad;
    }
    catch (Exception $e) {
    }
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/detalle-usuario', $datos);
    $this->load->view('plantillas/footer');
  }
  //Carga la vista para editar los datos del personal
  public function editar_personal($uid) {
    if (!($this->permisos > 2)){
      redirect(base_url());
    }
    $this->load->model('proyectos_model');
    $header['titulo'] = 'Editar Personal';
    $header['clase_pagina'] = 'personal-page';
    $datos['token'] = $this->token();
    $datos['detalle'] = $this->personal_model->detalle_usuario($uid);
    $datos['detalle']->uid_usuario = $uid;
    $datos['departamentos'] = $this->departamentos_model->departamentos();
    $datos['estados'] = $this->estados_model->estados();
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['escolaridad'] = $this->departamentos_model->escolaridad();
    $datos['contratistas'] = $this->personal_model->contratistas('');
    if ($datos['detalle']->idtbl_entidad != NULL)
      $datos['municipios'] = $this->estados_model->municipios($datos['detalle']->idtbl_entidad);
    if ($datos['detalle']->idtbl_departamentos != NULL)
      $datos['perfilDepa'] = $this->departamentos_model->perfiles_por_departamento($datos['detalle']->idtbl_departamentos);
    $datos['patrones'] = $this->personal_model->patrones();
    if ($datos['detalle']->idtbl_empresas != NULL)
      $datos['contratos'] = $this->personal_model->tipcontratos($datos['detalle']->idtbl_empresas);
    //if($datos['detalle']->idtbl_departamentos!=NULL)
    //	$datos['perfilDepa']=$this->departamentos_model->perfiles_por_departamento($datos['detalle']->idtbl_departamentos);
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/editar-personal-contratista', $datos);
    $this->load->view('plantillas/footer'); # code...
  }
  //Carga la vista para dar de alta un nuevo contratista
  public function nuevo() {
    if (!($this->permisos > 1)){
      redirect(base_url());
    }
    $datos['titulo'] = 'Nuevo Contratista';
    $datos['clase_pagina'] = 'contratistas-page';
    $datos['token'] = $this->token();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('contratistas/nuevo-contratista', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Se conecta a la API de banxico para traer el precio del dolar actual
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
  //Genera token
  public function token( ) {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  //Genera un excel de los datos de los contratista
  public function excel_contratistas() {
    $this->permisos = $this->departamentos_model->permisos('contratistas');
    if(!($this->permisos > 0)){
      redirect(base_url());
    } 
    $reporte = $this->personal_model->contratistas($buscar='');
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Contratistas ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
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
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Razón social');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre Comercial');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'RFC');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Email');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Teléfono');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Responsable');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Dirección');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Estatus');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->razon_social);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_comercial);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->rfc);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->email);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->telefono);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->responsable);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->direccion);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->estatus);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Contratistas_'.date('d-m-Y  H:i:s').'.xls';
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

  public function excel_contratistasInactivos() {
    $this->permisos = $this->departamentos_model->permisos('contratistas');
    if(!($this->permisos > 0)){
      redirect(base_url());
    } 
    $reporte = $this->personal_model->contratistasInactivos($buscar='');
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Contratistas ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
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
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Razón social');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre Comercial');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'RFC');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Email');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Teléfono');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Responsable');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Dirección');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Estatus');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->razon_social);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_comercial);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->rfc);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->email);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->telefono);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->responsable);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->direccion);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->estatus);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Contratistas_'.date('d-m-Y  H:i:s').'.xls';
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

  //Genera un excel del personal activo
  public function excel_personalActivo() {
    $this->permisos = $this->departamentos_model->permisos('contratistas');
    if(!($this->permisos > 0)){
      redirect(base_url());
    } 
    $reporte = $this->personal_model->todos_los_usuarios('contratista');
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Personal Contratistas Activo ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);

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

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Contratista');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Puesto');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'N° IMSS');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Curp');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Correo');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Teléfono');
      $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Estatus');
      $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Almacen');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombres.' '.$dato->apellido_paterno.' '.$dato->apellido_materno);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_comercial);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_proyecto.'-'.$dato->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->puesto_contrato);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->nss);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->curp);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->email_personal);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->telefono);
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", ($dato->estatus)?'Activo':'Baja');
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", ($dato->almacen)?'Autorizado':'No autorizado');
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Personal_Contratistas_Activo_'.date('d-m-Y  H:i:s').'.xls';
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

  //Genera un excel del personal inactivo
  public function excel_personalInactivo() {
    $this->permisos = $this->departamentos_model->permisos('contratistas');
    if(!($this->permisos > 0)){
      redirect(base_url());
    } 
    $reporte = $this->personal_model->todos_los_usuarios_baja('contratista');
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Personal Contratistas Inactivo ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);

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

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Contratista');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Puesto');
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'N° IMSS');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Curp');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Correo');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Teléfono');
      $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Estatus');
      $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Almacen');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombres.' '.$dato->apellido_paterno.' '.$dato->apellido_materno);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_comercial);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_proyecto.'-'.$dato->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->puesto_contrato);
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->nss);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->curp);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->email_personal);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->telefono);
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", ($dato->estatus)?'Activo':'Baja');
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", ($dato->almacen)?'Autorizado':'No autorizado');
      }
          
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Personal_Contratistas_Inactivo_'.date('d-m-Y  H:i:s').'.xls';
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

  //Carga la vista de las asignaciones por contratista
  public function asignaciones_por_contratista($uid){
    $this->load->model('almacen_model');
    $this->load->model('controlvehicular_model');
    $this->load->model('contratistas_model');
    $header['titulo'] = 'asignaciones Contratista';
    $header['clase_pagina'] = 'asignaciones_contratista';
    $datos['uid'] = $uid;
    $datos['token'] = $this->token();
    $datos['nombre_comercial'] = $this->contratistas_model->nombre_comercial_contratista($uid);
    $datos['asignacionesAG'] = $this->contratistas_model->asignaciones_personalAG($uid);
    $datos['asignacionesAC'] = $this->contratistas_model->asignaciones_personalAC($uid);
    $datos['asignacionesKualiT'] = $this->contratistas_model->asignaciones_personalKuali($uid);
    $datos['asignacionesAreaMedica'] = $this->contratistas_model->asignaciones_personalAreaMedica($uid);
    $datos['asignacionesAutosControlVehicular'] = $this->contratistas_model->asignaciones_autosControlVehicular($uid);
    $datos['asignacionesRefaccionesControlVehicular'] = $this->contratistas_model->asignaciones_refaccionesControlVehicular($uid);
    $datos['asignacionesSistemas'] = $this->contratistas_model->asignaciones_sistemas($uid);

    //$datos['incidencias'] = [];

    $datos['precio_dolar'] = $this->precio_actual_dolar();
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('contratistas/asignaciones-contratista', $datos);
    $this->load->view('plantillas/footer'); 
  }

}