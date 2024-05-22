<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vacantes extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('vacantes_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
  }
  public function index() {
    if ($this->session->userdata('is_logued_in')) {
      $datos['titulo'] = 'Vacantes';
      $datos['clase_pagina'] = 'vacantes-page';
      $datos['vacantes'] = $this->vacantes_model->vacantes();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu');
      $this->load->view('vacantes/ver-vacantes');
      $this->load->view('plantillas/footer');
    } else {
      redirect(base_url().'login');
    }
  }
  public function nueva_vacante() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('departamento', 'Departamento', 'required|trim|numeric');
      $this->form_validation->set_rules('perfil', 'Perfil', 'required|trim|numeric');
      $this->form_validation->set_rules('nvacantes', 'Numero Vacantes', 'required|trim|is_natural_no_zero');
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
        redirect(base_url().'usuarios/requisiciones');
      } else {
        if ($this->vacantes_model->check_existe($this->input->post('perfil')) > 0) {
          $this->session->set_flashdata('error', 'Hay una vacante activa con el mismo perfil');
          redirect(base_url().'vacantes');
        } else {
          $uid = uniqid();
          $datos = $this->vacantes_model->nueva_vacante($uid);
          if ($datos['check']) {
            $this->vacantes_model->log($this->session->userdata('nombre').' creó una vacante para perfil "'.$datos['perfil']['perfil'].'" del departamento "'.$datos['perfil']['departamento'].'"', null, ID_DEPARTAMENTO_RH, 'vacantes/detalle/'.$uid);
            $this->session->set_flashdata('exito', 'Registro exitoso');
            // $this->session->unset_userdata('token-vacantes');
            redirect(base_url().'vacantes');
          } else {
            $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
            redirect(base_url().'usuarios/requisiciones');
          }
        }
      }
    } else {
      redirect(base_url().'vacantes');
    }
  }
  public function editar_vacante() {
    if ($this->uri->segment(3) == '' || $this->vacantes_model->num_select_vacante($this->uri->segment(3)) == 0) {
      $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente con uri');
      redirect(base_url().'vacantes');
    } else {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->form_validation->set_rules('nvacantes', 'Numero Vacantes', 'required|trim|is_natural');
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('error', 'Todos los campos son obligatorios.');
          redirect(base_url().'vacantes/prospectos/'.$this->uri->segment(3));
        } else {
          $datos = $this->vacantes_model->editar_vacante($this->uri->segment(3));
          if ($datos) {
            $this->session->set_flashdata('exito', 'Actualización exitosa');
            // $this->session->unset_userdata('token-vacantes');
            redirect(base_url().'vacantes/prospectos/'.$this->uri->segment(3));
          } else {
            $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente. update');
            redirect(base_url().'vacantes/prospectos/'.$this->uri->segment(3));
          }
        }
      } else {
        redirect(base_url().'vacantes');
      }
    }
  }
  public function detalle_vacante($uid) {
    if ($uid == '')
      redirect(base_url().'vacantes', 'refresh');
    else {
      $this->load->model('usuarios_model');
      $this->load->model('prospectos_model');
      $header['titulo'] = 'Vacantes';
      $header['clase_pagina'] = 'vacantes-page';
      $datos['detalle_vacante'] = $this->vacantes_model->detalle_vacante($uid);
      $datos['requisicion'] = $this->usuarios_model->get_requisicion_byId($datos['detalle_vacante']['tbl_requisiciones_idtbl_requisiciones']);
      //$datos['prospectos']=$this->prospectos_model->prospectos($uid);
      $datos['token'] = $this->token();
      $this->load->view('plantillas/header', $header);
      $this->load->view('plantillas/menu', $header);
      $this->load->view('vacantes/detalle-vacante', $datos);
      $this->load->view('plantillas/footer');
    }
  }
  public function token( ) {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
}