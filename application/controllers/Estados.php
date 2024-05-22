<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Estados extends CI_Controller {
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
    $this->load->model('estados_model');
  }
  public function index() {
    redirect(base_url());
  }
  public function obtener_municipios() {
    if ($this->input->post('estado')) {
      $check_user = $this->estados_model->municipios($this->input->post('estado'));
      if ($check_user)
        echo json_encode(array(
          $check_user
        ));
      else
        echo json_encode(array(
          'error' => "Error en consulta."
        ));
    } else {
      echo json_encode(array(
        'error' => "Error en POST."
      ));
    }
  }
}
