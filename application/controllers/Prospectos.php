<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Prospectos extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('prospectos_model');
    $this->load->model('vacantes_model');
  }
  public function index() {
    if ($this->session->userdata('is_logued_in')) {
      if ($this->uri->segment(3) == '' || $this->vacantes_model->num_select_vacante($this->uri->segment(3)) == 0) {
        redirect(base_url().'vacantes', 'refresh');
      } else {
        $this->load->model('usuarios_model');
        $datos['titulo'] = 'Prospectos';
        $datos['clase_pagina'] = 'prospectos-page';
        $datos['numero'] = $this->prospectos_model->numero_prospectos($this->uri->segment(3));
        $datos['todo'] = $this->prospectos_model->prospectos($this->uri->segment(3));
        $datos['token'] = $this->token();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu');
        $this->load->view('prospectos/ver-prospectos');
        $this->load->view('plantillas/footer');
      }
    } else {
      redirect(base_url().'login');
    }
  }
  public function nuevo_prospecto() {
    if ($this->session->userdata('is_logued_in')) {
      if ($this->uri->segment(4) == '' || $this->vacantes_model->num_select_vacante($this->uri->segment(4)) == 0) {
        redirect(base_url().'vacantes', 'refresh');
      } else {
        $this->form_validation->set_rules('nombres', 'Nombre(s)', 'required|trim|min_length[2]|max_length[150]');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|trim|min_length[2]|max_length[150]');
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|min_length[2]|max_length[150]|valid_email');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha de Nacimiento', 'required|trim|exact_length[10]');
        $this->form_validation->set_rules('telefono', 'Teléfono', 'required|trim|min_length[8]|max_length[15]|numeric');
        $this->form_validation->set_rules('direccion', 'Direccón', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('estado', 'Estado', 'required|numeric');
        $this->form_validation->set_rules('municipio', 'Municipio', 'required|trim|numeric');
        $this->form_validation->set_rules('escolaridad', 'Escolaridad', 'required|trim|min_length[4]');
        $this->form_validation->set_rules('especialidad', 'Especialidad', 'trim|min_length[3]');
        $this->form_validation->set_rules('fecha_entrevista', 'Fecha Entrevista', 'required|trim|exact_length[16]');
        if ($this->form_validation->run() == FALSE) {
          $this->load->model('estados_model');
          $datos['titulo'] = 'Prospectos';
          $datos['clase_pagina'] = 'prospectos-page';
          $datos['token'] = $this->token();
          $datos['estados'] = $this->estados_model->estados();
          $this->load->view('plantillas/header', $datos);
          $this->load->view('plantillas/menu');
          $this->load->view('prospectos/nuevo-prospecto');
          $this->load->view('plantillas/footer');
        } else {
          if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $datos = $this->prospectos_model->nuevo_prospecto($this->uri->segment(4));
            if ($datos['check']) {
              $this->prospectos_model->log($this->session->userdata('nombre').' agregó un prospecto "'.$this->input->post('nombres').' '.$this->input->post('apellidos').' para la vacante "'.$datos['perfil']['perfil'].'" del departamento "'.$datos['perfil']['departamento'].'"', null, ID_DEPARTAMENTO_RH, 'vacantes/prospectos/detalle/'.$this->uri->segment(4));
              $this->session->set_flashdata('exito', 'Registro exitoso');
              redirect('vacantes/prospectos/'.$this->uri->segment(4), 'refresh');
            } else {
              $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
              $this->load->model('estados_model');
              $datos['titulo'] = 'Prospectos';
              $datos['clase_pagina'] = 'prospectos-page';
              $datos['token'] = $this->token();
              $datos['estados'] = $this->estados_model->estados();
              $this->load->view('plantillas/header', $datos);
              $this->load->view('plantillas/menu');
              $this->load->view('prospectos/nuevo-prospecto');
              $this->load->view('plantillas/footer');
            } // se inserta
          } else {
            $this->load->model('estados_model');
            $datos['titulo'] = 'Prospectos';
            $datos['clase_pagina'] = 'prospectos-page';
            $datos['token'] = $this->token();
            $datos['estados'] = $this->estados_model->estados();
            $this->load->view('plantillas/header', $datos);
            $this->load->view('plantillas/menu');
            $this->load->view('prospectos/nuevo-prospecto');
            $this->load->view('plantillas/footer');
          } // token
        } // Formulario
      } // UID Vacante
    } else {
      redirect(base_url().'login');
    } // Login
  }
  public function editar_prospecto() {
    if ($this->session->userdata('is_logued_in')) {
      if ($this->uri->segment(4) == '' || $this->prospectos_model->num_select_prospectovacante($this->uri->segment(4)) != 2) {
        redirect(base_url().'vacantes', 'refresh');
      } else {
        $this->form_validation->set_rules('fecha_entrevista', 'Fecha Entrevista', 'required|trim|exact_length[19]');
        $this->form_validation->set_rules('matchover', 'Machover', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('teorico', 'Teórico', 'required|trim|decimal');
        $this->form_validation->set_rules('economico', 'Económico', 'required|trim|decimal');
        $this->form_validation->set_rules('artisitico', 'Artístico', 'required|trim|decimal');
        $this->form_validation->set_rules('social', 'Social', 'required|trim|decimal');
        $this->form_validation->set_rules('politico', 'Político', 'required|trim|decimal');
        $this->form_validation->set_rules('regulatorio', 'Regulatorio', 'required|trim|decimal');
        $this->form_validation->set_rules('analisis', 'Análisis', 'required|trim|decimal');
        $this->form_validation->set_rules('vision', 'Visión', 'required|trim|decimal');
        $this->form_validation->set_rules('intuicion', 'Intuición', 'required|trim|decimal');
        $this->form_validation->set_rules('logica', 'Lógica', 'required|trim|decimal');
        $this->form_validation->set_rules('puntaje', 'Puntaje', 'required|trim|decimal');
        $this->form_validation->set_rules('opcion', 'Sumar', 'required|in_list[1,2]|numeric');
        $this->form_validation->set_rules('puntaje', 'Puntaje', 'trim|decimal');
        $this->form_validation->set_rules('resultado', 'Resultado', 'trim|decimal');
        $this->form_validation->set_rules('d', 'D', 'required|trim|decimal');
        $this->form_validation->set_rules('i', 'I', 'required|trim|decimal');
        $this->form_validation->set_rules('s', 'S', 'required|trim|decimal');
        $this->form_validation->set_rules('c', 'C', 'required|trim|decimal');
        $this->form_validation->set_rules('observaciones', 'Observaciones', 'required|trim|min_length[5]');
        $this->form_validation->set_rules('percentil', 'Percentil', 'required|trim|decimal');
        $this->form_validation->set_rules('rango', 'Rango', 'required|trim|decimal');
        $this->form_validation->set_rules('supervision', 'Habilidades de Supervisión', 'required|trim|decimal');
        $this->form_validation->set_rules('humanas', 'Capacidad de Decisión en las Relaciones Humanas', 'required|trim|decimal');
        $this->form_validation->set_rules('pinterpersonales', 'Capacidad de Evaluación de Problemas Interpersonales', 'required|trim|decimal');
        $this->form_validation->set_rules('rinterpersonales', 'Habilidades para Establecer Relaciones Interpersonales', 'required|trim|decimal');
        $this->form_validation->set_rules('sentido', 'Sentido Común y Tacto en las Relaciones Interpersonales', 'required|trim|decimal');
        if ($this->form_validation->run() == FALSE) {
          $this->load->model('estados_model');
          $datos['titulo'] = 'Prospectos';
          $datos['clase_pagina'] = 'prospectos-page';
          $datos['token'] = $this->token();
          $datos['estados'] = $this->estados_model->estados();
          $datos['todo'] = $this->prospectos_model->select_prospectovacante($this->uri->segment(4));
          $datos['num_resultados'] = $this->prospectos_model->num_select_resultados($this->uri->segment(4));
          $datos['resultados'] = $this->prospectos_model->select_resultados($this->uri->segment(4));
          $uid = preg_split('/-/', $this->uri->segment(4), 2);
          $carpeta = './uploads/'.$uid[1];
          if (is_dir($carpeta) && file_exists($carpeta)) {
            $imagenes = array( );
            if ($dir = opendir($carpeta)) {
              while (($archivo = readdir($dir)) !== false) {
                if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                  $ext = preg_split('/\./', $archivo);
                  $num = count($ext) - 1;
                  $tamano = filesize($carpeta.'/'.$archivo) / 1024;
                  $array = array(
                    'nombre' => $archivo,
                    'tamano' => round($tamano, 2),
                    'ext' => $ext[$num]
                  );
                  array_push($imagenes, $array);
                }
              }
              closedir($dir);
            }
          }
          $datos['imgenes'] = (!empty($imagenes)) ? $imagenes : null;
          $datos['uidprosecto'] = $uid[1];
          $this->load->view('plantillas/header', $datos);
          $this->load->view('plantillas/menu');
          $this->load->view('prospectos/editar-prospecto');
          $this->load->view('plantillas/footer');
        } else {
          if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            $regresa = $this->prospectos_model->editar_prospecto($this->uri->segment(4));
            if ($regresa) {
              $this->session->set_flashdata('exito', 'Registro exitoso');
              redirect(base_url().'vacantes/prospectos/editar/'.$this->uri->segment(4), 'refresh');
            } else {
              $this->load->model('estados_model');
              $datos['titulo'] = 'Prospectos';
              $datos['clase_pagina'] = 'prospectos-page';
              $datos['token'] = $this->token();
              $datos['estados'] = $this->estados_model->estados();
              $datos['todo'] = $this->prospectos_model->select_prospectovacante($this->uri->segment(4));
              $datos['num_resultados'] = $this->prospectos_model->num_select_resultados($this->uri->segment(4));
              $datos['resultados'] = $this->prospectos_model->select_resultados($this->uri->segment(4));
              $uid = preg_split('/-/', $this->uri->segment(4), 2);
              $carpeta = './uploads/'.$uid[1];
              if (is_dir($carpeta) && file_exists($carpeta)) {
                $imagenes = array( );
                if ($dir = opendir($carpeta)) {
                  while (($archivo = readdir($dir)) !== false) {
                    if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                      $ext = preg_split('/\./', $archivo);
                      $num = count($ext) - 1;
                      $tamano = filesize($carpeta.'/'.$archivo) / 1024;
                      $array = array(
                        'nombre' => $archivo,
                        'tamano' => round($tamano, 2),
                        'ext' => $ext[$num]
                      );
                      array_push($imagenes, $array);
                    }
                  }
                  closedir($dir);
                }
              }
              $datos['imgenes'] = (!empty($imagenes)) ? $imagenes : null;
              $datos['uidprosecto'] = $uid[1];
              $this->load->view('plantillas/header', $datos);
              $this->load->view('plantillas/menu');
              $this->load->view('prospectos/editar-prospecto');
              $this->load->view('plantillas/footer');
            } // se actualiza
          } else {
            $this->load->model('estados_model');
            $datos['titulo'] = 'Prospectos';
            $datos['clase_pagina'] = 'prospectos-page';
            $datos['token'] = $this->token();
            $datos['estados'] = $this->estados_model->estados();
            $datos['todo'] = $this->prospectos_model->select_prospectovacante($this->uri->segment(4));
            $datos['num_resultados'] = $this->prospectos_model->num_select_resultados($this->uri->segment(4));
            $datos['resultados'] = $this->prospectos_model->select_resultados($this->uri->segment(4));
            $uid = preg_split('/-/', $this->uri->segment(4), 2);
            $carpeta = './uploads/'.$uid[1];
            if (is_dir($carpeta) && file_exists($carpeta)) {
              $imagenes = array( );
              if ($dir = opendir($carpeta)) {
                while (($archivo = readdir($dir)) !== false) {
                  if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                    $ext = preg_split('/\./', $archivo);
                    $num = count($ext) - 1;
                    $tamano = filesize($carpeta.'/'.$archivo) / 1024;
                    $array = array(
                      'nombre' => $archivo,
                      'tamano' => round($tamano, 2),
                      'ext' => $ext[$num]
                    );
                    array_push($imagenes, $array);
                  }
                }
                closedir($dir);
              }
            }
            $datos['imgenes'] = (!empty($imagenes)) ? $imagenes : null;
            $datos['uidprosecto'] = $uid[1];
            $this->load->view('plantillas/header', $datos);
            $this->load->view('plantillas/menu');
            $this->load->view('prospectos/editar-prospecto');
            $this->load->view('plantillas/footer');
          } // token
        }
      } // UID Vacante
    } else {
      redirect(base_url().'login');
    } // Login
  }
  public function documntos() {
    if ($this->session->userdata('is_logued_in')) {
      if ($this->uri->segment(4) == '' || $this->prospectos_model->num_select_prospectovacante($this->uri->segment(4)) != 2) {
        redirect(base_url().'vacantes', 'refresh');
      } else {
        $uid = preg_split('/-/', $this->uri->segment(4), 2);
        $carpeta = './uploads/'.$uid[1];
        if (!file_exists($carpeta)) {
          mkdir($carpeta, 0755, true);
        }
        $config['upload_path'] = './uploads/'.$uid[1].'/';
        $config['allowed_types'] = '*';
        $config['remove_spaces'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite'] = FALSE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
          echo json_encode(array(
            'status' => false,
            'txt' => $this->upload->display_errors()
          ));
        } else {
          $imagen = $this->upload->data();
          echo json_encode(array(
            'status' => true,
            'txt' => $imagen['file_name']
          ));
        }
      }
    } else {
      redirect(base_url().'login');
    }
  }
  public function archivos_eliminar() {
    if ($this->session->userdata('is_logued_in')) {
      if ($this->uri->segment(3) == '' || $this->prospectos_model->num_select_prospectovacante($this->uri->segment(3)) != 2) {
        redirect(base_url().'vacantes', 'refresh');
      } else {
        $uid = preg_split('/-/', $this->uri->segment(3), 2);
        $carpeta = './uploads/';
        echo json_encode(array(
          'status' => unlink('./uploads/'.$uid[1].'/'.$this->input->post('nombre')),
          'txt' => $this->input->post('nombre')
        ));
      }
    } else {
      redirect(base_url().'login');
    }
  }
  public function convertir_usuario() {
    # code...
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
}
