<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Perfiles extends CI_Controller {
  public function __construct() {
    parent::__construct();
    //$this->load->model('user_model');
  }
  public function index() {
    if ($this->session->userdata('is_logued_in')) {
      //$datos['token'] = $this->token();
      $datos['titulo'] = 'Departamentos';
      $datos['clase_pagina'] = 'home-page';
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('perfiles/ver-departamentos.php', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url() . 'login');
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
}
