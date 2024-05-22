<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Racks extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('racks_model');
  }
  public function index() {
    redirect(base_url());
  }
  public function obtener_niveles() {
    if ($this->input->post('racks')) {
      $check_user = $this->racks_model->niveles($this->input->post('racks'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "Error en la consulta..."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error al seleccionar..."
      ));
    }
  }

  public function obtener_niveles_dp() {
    if ($this->input->post('racks_dp')) {
      $check_user = $this->racks_model->niveles_dp($this->input->post('racks_dp'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "Error en la consulta..."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error al seleccionar..."
      ));
    }
  }

}
