<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asistencias extends CI_Controller {
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
    if (!$this->session->userdata('is_logued_in')){
      redirect(base_url().'login');
    }
    $this->load->model('asistencias_model');
    $this->load->model('root_model');

    
        if($this->root_model->getStatus() == 0){
            $this->session->sess_destroy();
            redirect(base_url() . 'login');        
        }

  }
  //Carga el index de asistencias
  public function index() {
    $this->load->model('personal_model');
    $datos['titulo'] = 'Asistencias';
    $datos['clase_pagina'] = 'asistencias-page';
    $datos['asistencia_dia'] = $this->asistencias_model->asistencia_dia();
    $datos['ultima_asistencia'] = $this->asistencias_model->ultima_asistencia();
    $datos['ultima_salida'] = $this->asistencias_model->ultima_salida();
    $datos['lider'] = $this->personal_model->liderCuadrilla();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('asistencias/index-asistencias', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Vista para cargar archivo csv
  public function cagar_csv() {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Asistencias';
    $datos['clase_pagina'] = 'asistencias-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('asistencias/cargar-csv.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Procesa un archivo csv para asistencias
  public function procesar_csv() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->load->model('asistencias_model');
      if (is_numeric($this->input->post('numero_empleado'))) {
        if ($id_usuario = $this->asistencias_model->existe_numero_empleado($this->input->post('numero_empleado'))) {
          if ($this->asistencias_model->guardar_asistencia($id_usuario))
            echo json_encode(array(
              'error' => false,
              'texto' => 'Success',
              'row' => $this->input->post('row')
            ));
          else
            echo json_encode(array(
              'error' => true,
              'texto' => 'Error al insertar',
              'row' => $this->input->post('row')
            ));
        } else
          echo json_encode(array(
            'error' => true,
            'texto' => 'no_existe',
            'row' => $this->input->post('row')
          ));
      } else {
        if (stripos($this->input->post('numero_empleado'), 'fecha') || stripos($this->input->post('numero_empleado'), 'hora')) {
          $fecha = substr($this->input->post('numero_empleado'), strpos($this->input->post('numero_empleado'), ':') + 1);
        }
        echo json_encode(array(
          'error' => true,
          'texto' => 'no_numerico',
          'row' => $this->input->post('row')
        ));
      }
    } else {
      echo json_encode(array(
        'error' => true,
        'texto' => 'Token invalido',
        'row' => $this->input->post('row')
      ));
    }
  }

  public function nuevaAsistencia()
    {
        $this->form_validation->set_rules('latitud', 'latitud', 'required');
            if ($this->form_validation->run() == false) {
                echo json_encode(array(
                'status' => false,
                'message' => 'Favor de permitir tu ubicación'
                ));
            } else {
                /*$baseFromJavascript1 = $_POST['imagen'];
                $data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript1));
                $filepath1 = "./uploads/justificaciones/firmas/".$uid.".png";
                file_put_contents($filepath1, $data1);*/
                $dia = date('Y-m-d');
                $carpeta = './uploads/asistencias/'.$dia;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0755, true);
                }
                $this->load->library('upload');
                $urlimg = $carpeta . '/';
                $config['upload_path'] = $urlimg;
                $config['allowed_types'] = 'jpg|png|PNG|jpeg';
                $config['overwrite'] = true;
                try {
                    $config['file_name'] = $this->session->userdata('id').'-'.$this->input->post('tipo').'.jpg';
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto')) {
                        throw new Exception('Problema al cargar la Foto.');
                    }
                    $check = $this->asistencias_model->nuevaAsistencia();
                    if ($check == true) {
                        echo json_encode(array(
                        'error' => false,
                        'mensaje' => 'Se registro la asistencia correctamente'
                        ));
                    } else {
                        echo json_encode(array(
                        'error' => true,
                        'mensaje' => $check
                        ));
                    }
                } catch (Exception $e) {
                    echo json_encode(array(
                    'status' => false,
                    'message' => $e->getMessage()
                    ));
                }
            }
       
    }
  //Da token al usuario
  private function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function mostrarAsistencias()
    {
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "asistencias" => $this->asistencias_model->getAsistencias($buscar, $inicio, $cantidad),
          "totalRegistros" => count($this->asistencias_model->getAsistencias($buscar)),
          "cantidad" => $cantidad
        );

        echo json_encode($data);
    }
}
