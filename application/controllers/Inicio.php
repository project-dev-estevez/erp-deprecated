<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inicio extends CI_Controller {
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
    $this->load->model('Controlvehicular_model');
    $this->load->model('Sistemas_model');
    //$this->session->sess_destroy();
  }
  public function index() {
    if ($this->session->userdata('is_logued_in') && $this->session->userdata('password') == '12345678') {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Login';
      $datos['clase_pagina'] = 'login-page';
      $this->load->view('plantillas/header', $datos);
      $this->load->view('login/login', $datos);
      $this->load->view('login/nuevo-password', $datos);
      $this->load->view('plantillas/footer', $datos);
      return;
    }
    if ($this->session->userdata('is_logued_in') && $this->session->userdata('password') != '12345678') {
      //$datos['token'] = $this->token();
      $datos['titulo'] = 'Home';
      $datos['clase_pagina'] = 'home-page';
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      //$this->load->view('plantillas/home-'.$this->clean($this->session->userdata('perfil')),$datos);
      if (($this->session->userdata('tipo') == 1 && $this->session->userdata('id_user_direccion') !== NULL && $this->session->userdata('id_user_direccion') != "") || $this->session->userdata('tipo') == 11 || ($this->session->userdata('tipo') == 1 && $this->session->userdata('id_user_direccion') === NULL)) {
        $this->load->model('almacen_model');    
        $dolar = $this->precio_actual_dolar();    
        //$datos['totalCostos'] = $this->almacen_model->costosAltoCosto($estatus = '', $dolar);
        $datos['total_global_empalmadora'] = 0;                
        $datos['total_global_otdr'] = 0;
        $datos['total_global_medidor_trafico'] = 0;
        $datos['total_global_power_meter'] = 0;
        $datos['total_global_luz_visible'] = 0;
        $datos['total_global_fiber_cleaver'] = 0;
        $datos['total_global_corte_tubo_holgado'] = 0;
        $datos['total_global_corte_longitudinal'] = 0;
        foreach ($this->almacen_model->estatus_herramientas_alto_costo_like('EMPALMADORA') as $key => $value) {
          $datos['estatus_empalmadora'][ ] = ucfirst($value->estatus);
          $datos['total_empalmadora'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_empalmadora'] += $value->total;                            
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_alto_costo_like('OTDR') as $key => $value) {
          $datos['estatus_otdr'][ ] = ucfirst($value->estatus);
          $datos['total_otdr'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_otdr'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('MEDIDOR DE TRAFICO') as $key => $value) {
          $datos['estatus_medidor_trafico'][ ] = ucfirst($value->estatus);
          $datos['total_medidor_trafico'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_medidor_trafico'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('POWER METER S') as $key => $value) {
          $datos['estatus_power_meter'][ ] = ucfirst($value->estatus);
          $datos['total_power_meter'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_power_meter'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('LUZ VISIBLE') as $key => $value) {
          $datos['estatus_luz_visible'][ ] = ucfirst($value->estatus);
          $datos['total_luz_visible'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_luz_visible'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('FIBER CLEAVER') as $key => $value) {
          $datos['estatus_fiber_cleaver'][ ] = ucfirst($value->estatus);
          $datos['total_fiber_cleaver'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_fiber_cleaver'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('TUBO HOLGADO') as $key => $value) {
          $datos['estatus_corte_tubo_holgado'][ ] = ucfirst($value->estatus);
          $datos['total_corte_tubo_holgado'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_corte_tubo_holgado'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('CORTE LONGITUDINAL') as $key => $value) {
          $datos['estatus_corte_longitudinal'][ ] = ucfirst($value->estatus);
          $datos['total_corte_longitudinal'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_corte_longitudinal'] += $value->total;
          }
        }
      }
      elseif($this->session->userdata('tipo') == 19 && $this->session->userdata('id') == 71){

        $this->load->model('almacen_model');
        $datos['almacenes_generadores'] = $this->almacen_model->almacenes_generadores();

        $this->load->model('almacen_model');    
        $dolar = $this->precio_actual_dolar();    
        //$datos['totalCostos'] = $this->almacen_model->costosAltoCosto($estatus = '', $dolar);
        $datos['total_global_empalmadora'] = 0;                
        $datos['total_global_otdr'] = 0;
        $datos['total_global_medidor_trafico'] = 0;
        $datos['total_global_power_meter'] = 0;
        $datos['total_global_luz_visible'] = 0;
        $datos['total_global_fiber_cleaver'] = 0;
        $datos['total_global_corte_tubo_holgado'] = 0;
        $datos['total_global_corte_longitudinal'] = 0;
        foreach ($this->almacen_model->estatus_herramientas_alto_costo_like('EMPALMADORA') as $key => $value) {
          $datos['estatus_empalmadora'][ ] = ucfirst($value->estatus);
          $datos['total_empalmadora'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_empalmadora'] += $value->total;                            
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_alto_costo_like('OTDR') as $key => $value) {
          $datos['estatus_otdr'][ ] = ucfirst($value->estatus);
          $datos['total_otdr'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_otdr'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('MEDIDOR DE TRAFICO') as $key => $value) {
          $datos['estatus_medidor_trafico'][ ] = ucfirst($value->estatus);
          $datos['total_medidor_trafico'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_medidor_trafico'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('POWER METER S') as $key => $value) {
          $datos['estatus_power_meter'][ ] = ucfirst($value->estatus);
          $datos['total_power_meter'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_power_meter'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('LUZ VISIBLE') as $key => $value) {
          $datos['estatus_luz_visible'][ ] = ucfirst($value->estatus);
          $datos['total_luz_visible'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_luz_visible'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('FIBER CLEAVER') as $key => $value) {
          $datos['estatus_fiber_cleaver'][ ] = ucfirst($value->estatus);
          $datos['total_fiber_cleaver'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_fiber_cleaver'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('TUBO HOLGADO') as $key => $value) {
          $datos['estatus_corte_tubo_holgado'][ ] = ucfirst($value->estatus);
          $datos['total_corte_tubo_holgado'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_corte_tubo_holgado'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_herramientas_mediano_costo_like('CORTE LONGITUDINAL') as $key => $value) {
          $datos['estatus_corte_longitudinal'][ ] = ucfirst($value->estatus);
          $datos['total_corte_longitudinal'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_corte_longitudinal'] += $value->total;
          }
        }
      }
      elseif($this->session->userdata('tipo') == 2){
        $this->load->model('almacen_model');
        $this->load->model('Sistemas_model');
        $year = $this->input->post('anioasignados');
        $usuario = $this->input->post('usuariosistemas');
        $datos['ususis']= $this->Sistemas_model->usuarioscomparacionsistemas();
        $datos['year']['usuario'] = $this->Sistemas_model->asignacionesdispositivos($year, $usuario);
        $datos['total_global_sistemas_laptops'] = 0;
        $datos['total_global_sistemas_laptops_especiales'] = 0;
        $datos['total_global_sistemas_desktops'] = 0;
        $datos['total_global_sistemas_celulares'] = 0;
        $datos['total_global_sistemas_impresoras'] = 0;
        $datos['total_global_sistemas_monitores'] = 0;
        $datos['total_global_sistemas_proyectores'] = 0;
        $datos['total_global_sistemas_plotters'] = 0;
        foreach ($this->almacen_model->estatus_sistemas_laptops('LAPTOPS') as $key => $value) {          
          $datos['estatus_sistemas_laptops'][ ] = ucfirst($value->estatus);
          $datos['total_sistemas_laptops'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_sistemas_laptops'] += $value->total;                            
          }
        }
        foreach ($this->almacen_model->estatus_sistemas_laptops_especiales('LAPTOPS ESPECIALES') as $key => $value) {
          $datos['estatus_sistemas_laptops_especiales'][] = ucfirst($value->estatus);
          $datos['total_sistemas_laptops_especiales'][] = $value->total;
          if($value->estatus == 'almacen' || $value->estatus == 'asignado'){
            $datos['total_global_sistemas_laptops_especiales'] += $value->total;
          }
        }
        foreach ($this->almacen_model->estatus_sistemas_desktops('DESKTOPS') as $key => $value) {          
          $datos['estatus_sistemas_desktops'][ ] = ucfirst($value->estatus);
          $datos['total_sistemas_desktops'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_sistemas_desktops'] += $value->total;                            
          }
        }
        foreach ($this->almacen_model->estatus_sistemas_celulares('CELULARES') as $key => $value) {          
          $datos['estatus_sistemas_celulares'][ ] = ucfirst($value->estatus);
          $datos['total_sistemas_celulares'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_sistemas_celulares'] += $value->total;                            
          }
        }
        foreach ($this->almacen_model->estatus_sistemas_impresoras('IMPRESORAS') as $key => $value) {          
          $datos['estatus_sistemas_impresoras'][ ] = ucfirst($value->estatus);
          $datos['total_sistemas_impresoras'][ ] = $value->total;
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
              $datos['total_global_sistemas_impresoras'] += $value->total;                            
          }
        }
        foreach($this->almacen_model->estatus_sistemas_monitores('MONITORES') as $key => $value) {
          $datos['estatus_sistemas_monitores'][] = ucfirst($value->estatus);
          $datos['total_sistemas_monitores'][] = $value->total;
          if($value->estatus == 'almacen' || $value->estatus == 'asignado'){
            $datos['total_global_sistemas_monitores'] += $value->total;
          }
        }
        foreach($this->almacen_model->estatus_sistemas_proyectores('PROYECTORES') as $key => $value) {
          $datos['estatus_sistemas_proyectores'][] = ucfirst($value->estatus);
          $datos['total_sistemas_proyectores'][] = $value->total;
          if($value->estatus == 'almacen' || $value->estatus == 'asignado'){
            $datos['total_global_sistemas_proyectores'] += $value->total;
          } 
        }
        foreach($this->almacen_model->estatus_sistemas_plotters('PLOTTERS') as $key => $value){
          $datos['estatus_sistemas_plotters'][] = ucfirst($value->estatus);
          $datos['total_sistemas_plotters'][] = $value->total;
          if($value->estatus == 'almacen' || $value->estatus == 'asignado'){
            $datos['total_global_sistemas_plotters'] += $value->total;
          }
        }
      }
      elseif($this->session->userdata('tipo') == 10) {
        $this->load->model('almacen_model');
        foreach ($this->almacen_model->grafica_seguridad_higiene() as $key => $value) {
          $datos['labels'][ ] = $value->marca.' '.$value->descripcion.' '.$value->modelo;
          $datos['minimos'][ ] = $value->minimo;
          $datos['stock'][ ] = $value->existencias;
        }
        $datos['total_global_casco_amarillo'] = 0;
        $datos['total_global_casco_blanco'] = 0;
        $datos['total_global_casco_naranja'] = 0;
        $datos['total_global_guante_de_piel'] = 0;
        $datos['total_global_garrafon_ciel'] = 0;
        $datos['total_global_lentes_gris'] = 0;
        $datos['total_global_impermeable_extra_grande'] = 0;
        $datos['total_global_poncho_impermeable'] = 0;
        $datos['total_global_protector_auditivo'] = 0;
        $datos['total_global_bandolas'] = 0;
        $datos['total_global_cinturones'] = 0;
        $datos['total_global_chaleco_seguridad'] = 0;
        $datos['total_global_lona'] = 0;
        $datos['total_global_barbiquejo'] = 0;
        $datos['total_global_extintor'] = 0;
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-AMA-001') as $key => $value) {
          $datos['estatus_casco_amarillo'][ ] = ucfirst($value->estatus);
          $datos['total_casco_amarillo'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_casco_amarillo'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-BLA-001') as $key => $value) {
          $datos['estatus_casco_blanco'][ ] = ucfirst($value->estatus);
          $datos['total_casco_blanco'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_casco_blanco'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-NAR-001') as $key => $value) {
          $datos['estatus_casco_naranja'][ ] = ucfirst($value->estatus);
          $datos['total_casco_naranja'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_casco_naranja'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-GUA-PIE-001') as $key => $value) {
          $datos['estatus_guante_de_piel'][ ] = ucfirst($value->estatus);
          $datos['total_guante_de_piel'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_guante_de_piel'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('HR-GAR-AGU-001') as $key => $value) {
          $datos['estatus_garrafon_ciel'][ ] = ucfirst($value->estatus);
          $datos['total_garrafon_ciel'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_garrafon_ciel'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-LEN-SEG-003') as $key => $value) {
          $datos['estatus_lentes_gris'][ ] = ucfirst($value->estatus);
          $datos['total_lentes_gris'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_lentes_gris'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-IMP-AMA-004') as $key => $value) {
          $datos['estatus_impermeable_extra_grande'][ ] = ucfirst($value->estatus);
          $datos['total_impermeable_extra_grande'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_impermeable_extra_grande'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-PON-IMP-001') as $key => $value) {
          $datos['estatus_poncho_impermeable'][ ] = ucfirst($value->estatus);
          $datos['total_poncho_impermeable'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_poncho_impermeable'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-PRO-AUD-002') as $key => $value) {
          $datos['estatus_protector_auditivo'][ ] = ucfirst($value->estatus);
          $datos['total_protector_auditivo'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_protector_auditivo'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene_bandolas() as $key => $value) {
          $datos['estatus_bandolas'][ ] = ucfirst($value->estatus);
          $datos['total_bandolas'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_bandolas'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene_cinturones() as $key => $value) {
          $datos['estatus_cinturones'][ ] = ucfirst($value->estatus);
          $datos['total_cinturones'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_cinturones'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CHA-EST-002') as $key => $value) {
          $datos['estatus_chaleco_seguridad'][ ] = ucfirst($value->estatus);
          $datos['total_chaleco_seguridad'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_chaleco_seguridad'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('AD-OFI-LON-015') as $key => $value) {
          $datos['estatus_lona'][ ] = ucfirst($value->estatus);
          $datos['total_lona'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_lona'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-BAR-SME-001') as $key => $value) {
          $datos['estatus_barbiquejo'][ ] = ucfirst($value->estatus);
          $datos['total_barbiquejo'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_barbiquejo'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('HR-EXT-EME-003') as $key => $value) {
          $datos['estatus_extintor'][ ] = ucfirst($value->estatus);
          $datos['total_extintor'][ ] = $value->existencias;          
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_extintor'] += $value->existencias;
          }
        }
      }
      elseif($this->session->userdata('tipo') == 4 && $this->session->userdata('id') != 50){
        $this->load->model('almacen_model');
        foreach ($this->almacen_model->grafica_seguridad_higiene() as $key => $value) {
          $datos['labels'][ ] = $value->marca.' '.$value->descripcion.' '.$value->modelo;
          $datos['minimos'][ ] = $value->minimo;
          $datos['stock'][ ] = $value->existencias;
        }
        $datos['total_global_casco_amarillo'] = 0;
        $datos['total_global_casco_blanco'] = 0;
        $datos['total_global_casco_naranja'] = 0;
        $datos['total_global_lente_seguridad'] = 0;
        $datos['total_global_chaleco_seguridad'] = 0;
        $datos['total_global_guante_de_piel'] = 0;
        $datos['total_global_barbiquejo'] = 0;
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-AMA-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_casco_amarillo'][ ] = ucfirst($value->estatus);
            $datos['estatus_casco_amarillo'][1] = 'Máximo';
            $datos['total_casco_amarillo'][ ] = $value->existencias;
            $datos['total_casco_amarillo'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_casco_amarillo'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-BLA-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_casco_blanco'][ ] = ucfirst($value->estatus);
            $datos['estatus_casco_blanco'][1] = 'Máximo';
            $datos['total_casco_blanco'][ ] = $value->existencias;
            $datos['total_casco_blanco'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_casco_blanco'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CAS-NAR-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_casco_naranja'][ ] = ucfirst($value->estatus);
            $datos['estatus_casco_blanco'][1] = 'Máximo';
            $datos['total_casco_naranja'][ ] = $value->existencias;
            $datos['total_casco_naranja'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_casco_naranja'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-CHA-EST-002') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_chaleco_seguridad'][ ] = ucfirst($value->estatus);
            $datos['estatus_chaleco_seguridad'][1] = 'Máximo';
            $datos['total_chaleco_seguridad'][ ] = $value->existencias;
            $datos['total_chaleco_seguridad'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_chaleco_seguridad'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-LEN-SEG-003') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_lente_seguridad'][ ] = ucfirst($value->estatus);
            $datos['estatus_lente_seguridad'][1] = 'Máximo';
            $datos['total_lente_seguridad'][ ] = $value->existencias;
            $datos['total_lente_seguridad'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_lente_seguridad'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-GUA-PIE-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_guante_de_piel'][ ] = ucfirst($value->estatus);
            $datos['estatus_guante_de_piel'][1] = 'Máximo';
            $datos['total_guante_de_piel'][ ] = $value->existencias;
            $datos['total_guante_de_piel'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
            $datos['total_global_guante_de_piel'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_productos_seguridad_higiene('EP-BAR-SME-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_barbiquejo'][ ] = ucfirst($value->estatus);
            $datos['estatus_barbiquejo'][1] = 'Máximo';
            $datos['total_barbiquejo'][ ] = $value->existencias;
            $datos['total_barbiquejo'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen' || $value->estatus == 'asignado') {
            $datos['total_global_barbiquejo'] += $value->existencias;
          }
        }        
        $datos['total_global_fibra_optica'] = 0;
        $datos['total_global_etiqueta'] = 0;
        $datos['total_global_cincho'] = 0;

        $datos['total_global_flejadora'] = 0;
        $datos['total_global_escalera_85'] = 0;
        $datos['total_global_escalera_73'] = 0;
        $datos['total_global_desarmador_pza'] = 0;
        $datos['total_global_desarmador_caja'] = 0;
        $datos['total_global_inversor'] = 0;
        $datos['total_global_pinza_electricista'] = 0;
        $datos['total_global_pinza_corte'] = 0;
        $datos['total_global_pinza_punta'] = 0;
        foreach ($this->almacen_model->estatus_consumible_almacen_general('CN-CAB-OPT-003') as $key => $value) {          
          if ($value->estatus == 'almacen') {
              $datos['estatus_fibra_optica'][ ] = ucfirst($value->estatus);
              $datos['estatus_fibra_optica'][1] = 'Máximo';
              $datos['total_fibra_optica'][ ] = $value->existencias;
              $datos['total_fibra_optica'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_fibra_optica'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('CN-ETI-AUT-002') as $key => $value) {          
          if ($value->estatus == 'almacen') {                   
            $datos['estatus_etiqueta'][ ] = ucfirst($value->estatus);
            $datos['estatus_etiqueta'][1] = 'Máximo';
            $datos['total_etiqueta'][ ] = $value->existencias;
            $datos['total_etiqueta'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_etiqueta'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('CN-CIN-PAN-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_cincho'][ ] = ucfirst($value->estatus);
            $datos['estatus_cincho'][1] = 'Máximo';
            $datos['total_cincho'][ ] = $value->existencias;
            $datos['total_cincho'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_cincho'] += $value->existencias;
          }
        }

        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-FLE-ANC-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {                     
            $datos['estatus_flejadora'][ ] = ucfirst($value->estatus);
            $datos['estatus_flejadora'][1] = 'Máximo';
            $datos['total_flejadora'][ ] = $value->existencias;
            $datos['total_flejadora'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_flejadora'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-ESC-FIB-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_escalera_85'][ ] = ucfirst($value->estatus);
            $datos['estatus_escalera_85'][1] = 'Máximo';
            $datos['total_escalera_85'][ ] = $value->existencias;
            $datos['total_escalera_85'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_escalera_85'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-ESC-FIB-002') as $key => $value) {          
          if ($value->estatus == 'almacen') {            
            $datos['estatus_escalera_73'][ ] = ucfirst($value->estatus);
            $datos['estatus_escalera_73'][1] = 'Máximo';
            $datos['total_escalera_73'][ ] = $value->existencias;
            $datos['total_escalera_73'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_escalera_73'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-JUE-DES-010') as $key => $value) {          
          if ($value->estatus == 'almacen') {                        
            $datos['estatus_desarmador_pza'][ ] = ucfirst($value->estatus);
            $datos['estatus_desarmador_pza'][1] = 'Máximo';
            $datos['total_desarmador_pza'][ ] = $value->existencias;
            $datos['total_desarmador_pza'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_desarmador_pza'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-JUE-DES-011') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_desarmador_caja'][ ] = ucfirst($value->estatus);
            $datos['estatus_desarmador_caja'][1] = 'Máximo';
            $datos['total_desarmador_caja'][ ] = $value->existencias;
            $datos['total_desarmador_caja'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_desarmador_caja'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-INV-COR-002') as $key => $value) {          
          if ($value->estatus == 'almacen') {            
            $datos['estatus_inversor'][ ] = ucfirst($value->estatus);
            $datos['estatus_inversor'][1] = 'Máximo';
            $datos['total_inversor'][ ] = $value->existencias;
            $datos['total_inversor'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_inversor'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-PIN-ELE-001') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_pinza_electricista'][ ] = ucfirst($value->estatus);
            $datos['estatus_pinza_electricista'][1] = 'Máximo';
            $datos['total_pinza_electricista'][ ] = $value->existencias;
            $datos['total_pinza_electricista'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_pinza_electricista'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-PIN-COR-003') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_pinza_corte'][ ] = ucfirst($value->estatus);
            $datos['estatus_pinza_corte'][1] = 'Máximo';
            $datos['total_pinza_corte'][ ] = $value->existencias;
            $datos['total_pinza_corte'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_pinza_corte'] += $value->existencias;
          }
        }
        foreach ($this->almacen_model->estatus_consumible_almacen_general('HR-PIN-PUN-002') as $key => $value) {          
          if ($value->estatus == 'almacen') {
            $datos['estatus_pinza_punta'][ ] = ucfirst($value->estatus);
            $datos['estatus_pinza_punta'][1] = 'Máximo';
            $datos['total_pinza_punta'][ ] = $value->existencias;
            $datos['total_pinza_punta'][1] = $value->maximo;
          }
          if ($value->estatus == 'almacen') {
              $datos['total_global_pinza_punta'] += $value->existencias;
          }
        }
      }
      elseif($this->session->userdata('tipo') == 4 && $this->session->userdata('id') == 50){
        $this->load->model('almacen_model');
        $datos['total_global_vector_max'] = 0;
        $datos['total_global_roku'] = 0;
        $datos['total_global_sistema_mesh'] = 0;
        $datos['total_global_ont_iscom'] = 0;
      

        foreach ($this->almacen_model->estatus_productos_kuali('CN-VEC-MAX-001') as $key => $value) {          
          //if ($value->estatus == 'almacen') {
            $datos['estatus_vector_max'][ ] = ucfirst($value->estatus);
            $datos['estatus_vector_max'][1] = 'Máximo';
            $datos['total_vector_max'][ ] = $value->total;
            $datos['total_vector_max'][1] = $value->maximo;
          //}
          //if ($value->estatus == 'almacen') {
            $datos['total_global_vector_max'] += $value->total;
          //}
        }
        foreach ($this->almacen_model->estatus_productos_kuali('AD-OFI-SIS-007') as $key => $value) {          
          //if ($value->estatus == 'almacen') {
            $datos['estatus_sistema_mesh'][ ] = ucfirst($value->estatus);
            $datos['estatus_sistema_mesh'][1] = 'Máximo';
            $datos['total_sistema_mesh'][ ] = $value->total;
            $datos['total_sistema_mesh'][1] = $value->maximo;
          //}
          //if ($value->estatus == 'almacen') {
            $datos['total_global_sistema_mesh'] += $value->total;
          //}
        }
        foreach ($this->almacen_model->estatus_productos_kuali('CN-ONT-ISC-001') as $key => $value) {          
          //if ($value->estatus == 'almacen') {
            $datos['estatus_ont_iscom'][ ] = ucfirst($value->estatus);
            $datos['estatus_ont_iscom'][1] = 'Máximo';
            $datos['total_ont_iscom'][ ] = $value->total;
            $datos['total_ont_iscom'][1] = $value->maximo;
          //}
          //if ($value->estatus == 'almacen') {
            $datos['total_global_ont_iscom'] += $value->total;
          //}
        }
        foreach ($this->almacen_model->estatus_productos_kuali('CN-REP-STR-001') as $key => $value) {          
          //if ($value->estatus == 'almacen') {
            $datos['estatus_roku'][ ] = ucfirst($value->estatus);
            $datos['estatus_roku'][1] = 'Máximo';
            $datos['total_roku'][ ] = $value->total;
            $datos['total_roku'][1] = $value->maximo;
          //}
          //if ($value->estatus == 'almacen') {
            $datos['total_global_roku'] += $value->total;
          //}
        }
      }
      elseif($this->session->userdata('tipo') == 3) {
        $this->load->model('almacen_model');
        $this->load->model('Controlvehicular_model');
        
        $year = $this->input->post('year');
        $usuario = $this->input->post('usuarioa');
        $datos['usus'] = $this->Controlvehicular_model->usuarioscomparacion();
        $datos['year']['usuario'] = $this->Controlvehicular_model->asignacionesautos($year, $usuario);
        
        
        foreach ($this->almacen_model->grafica_control_vehicular_refacciones() as $key => $value) {
          $datos['labels'][ ] = $value->marca.' '.$value->descripcion.' '.$value->modelo;
          $datos['minimos'][ ] = $value->minimo;
          $datos['stock'][ ] = $value->existencias;
        }
        $datos['total_global_unidades_control_vehicular'] = 0;
        foreach ($this->almacen_model->unidades_control_vehicular() as $key => $value) {
          $datos['estatus_unidades'][ ] = ucfirst($value->estatus);
          $datos['total_unidades'][ ] = $value->total;
          $datos['total_global_unidades_control_vehicular'] += $value->total;
        }
        $datos['unidades_marca'] = $this->almacen_model->unidades_control_vehicular_marca();
        $datos['modelos'] = $this->Controlvehicular_model->getModelosAutos();
        $data['modelos'] = $this->Controlvehicular_model->getAutosModelo();
       $resultados[] = $this->Controlvehicular_model->sumaestatus();
       
      }
      elseif ($this->session->userdata('tipo') == 5) {
        $this->load->model('personal_model');
        $datos['personal_semanal'] = $this->personal_model->personal_semanal();
        $datos['personal_quncena'] = $this->personal_model->personal_quncenal();
        $datos['personal_total'] = $this->personal_model->personal_total();
        $datos['personal_baja'] = $this->personal_model->personal_baja();
        $datos['contratos_vencidos'] = $this->personal_model->contratos_vencidos();
        $datos['contratos_proximos_a_vencer'] = $this->personal_model->contratos_proximos_a_vencer();
        $datos['totalContrataciones'] = $this->personal_model->totalContrataciones();
        $datos['totalContratacionesActivas'] = $this->personal_model->totalContratacionesActivas();
        $datos['totalSalidas'] = $this->personal_model->totalSalidas();
        $datos['edadPromedio'] = $this->personal_model->edadPromedio();
        $datos['duracionPromedio'] = $this->personal_model->duracionPromedio();
        $datos['empleadosPorGenero'] = $this->personal_model->empleadosPorGenero();
        $datos['empleadosPorUbicacion'] = $this->personal_model->empleadosPorUbicacion();
        $datos['empresas'] = $this->personal_model->empresas();
        $datos['departamentos'] = $this->personal_model->departamentos();
        $datos['empleadosPorUbicacionDepartamento'] = $this->personal_model->empleadosPorUbicacionDepartamento();
        $datos['personalActivoPorAnioMes'] = [];
        $datos['personalActivoPorAnioMes']['anterior_anio'] = $this->personal_model->personalActivoPorAnioMes(date('Y', strtotime('-1 year')));
        $datos['personalActivoPorAnioMes']['actual_anio'] = $this->personal_model->personalActivoPorAnioMes(date('Y'));
        $datos['contratacionesPorAnio'] = $this->personal_model->contratacionesPorAnio();
        $datos['contratacionesPorAnioMes'] = [];
        $datos['contratacionesPorAnioMes']['anterior_anio'] = $this->personal_model->contratacionesPorAnioMes(date('Y', strtotime('-1 year')));
        $datos['contratacionesPorAnioMes']['actual_anio'] = $this->personal_model->contratacionesPorAnioMes(date('Y'));
        $datos['salidasPorAnioMes'] = [];
        $datos['salidasPorAnioMes']['anterior_anio'] = $this->personal_model->salidasPorAnioMes(date('Y', strtotime('-1 year')));
        $datos['salidasPorAnioMes']['actual_anio'] = $this->personal_model->salidasPorAnioMes(date('Y'));
        $datos['edadPorRangos'] = $this->personal_model->edadPorRangos();
        $datos['sueldoBrutoPorMes'] = $this->personal_model->sueldoBrutoPorMes();
        $datos['sueldosNetoPorMes'] = $this->personal_model->sueldosNetoPorMes();
        $datos['sueldoBrutoMesDepartamento'] =  $this->personal_model->sueldoBrutoMesDepartamento();
        $datos['sueldoNetoMesDepartamento'] = $this->personal_model->sueldoNetoMesDepartamento();
        $datos['fuenteEmpleos'] = $this->personal_model->fuenteEmpleos();
        $datos['totalFuenteEmpleos'] = $this->personal_model->totalFuenteEmpleos();
        $datos['totalEmpleadosPorAnioActual'] = $this->personal_model->totalEmpleadosPorAnio(date('Y'));
        $datos['totalEmpleadosPorAnioAnterior'] = $this->personal_model->totalEmpleadosPorAnio(date('Y', strtotime('-1 year')));
        $datos['totalEmpleadosPorEstablecimiento'] = $this->personal_model->totalEmpleadosPorEstablecimiento();
      }
      elseif($this->session->userdata('tipo') == 17 || $this->session->userdata('tipo') == 19){
        $this->load->model('almacen_model');
        $datos['almacenes_generadores'] = $this->almacen_model->almacenes_generadores();
      }
      elseif($this->session->userdata('tipo') == 22){
        $this->load->model('almacen_model');
      $datos['asignacionesAG'] = $this->almacen_model->asignaciones_generalag();
      $datos['asignacionesAC'] = $this->almacen_model->asignaciones_generalac();
      $datos['asignacionesKualiT'] = $this->almacen_model->asignacioneskualit();
      $datos['asignacionesAutosControlVehicular'] = $this->almacen_model->asignaciones_autoscv();
      $datos['asignacionesAreaMedica'] = $this->almacen_model->asignaciones_areamedica();
      $datos['asignacionesSistemas'] = $this->almacen_model->asignaciones_generalsistemas();
      $datos['asignacionesRefaccionesControlVehicular'] = $this->almacen_model->asignaciones_generalrefaccionesCV();
      $datos['asignacionesEHS'] = $this->almacen_model->asignaciones_EHS();
      //$datos['usus'] = $this->controlvehicular_model->usuarioscomparacion();
      //$datos['usuarioa'] = $this->controlveichular_model->asignacionesautos();
      
      }
      $this->load->view('plantillas/home', $datos);
      $this->load->view('plantillas/footer', $datos);
    } else
      redirect(base_url().'login');
  }

  //Función para sacar el total de costos en AC
  public function costosAltoCosto(){
    $this->load->model('almacen_model');
    $dolar = $this->precio_actual_dolar();
    //echo json_encode($this->personal_model->costosAltoCosto($estatus='', $dolar));
  }

  //Función para sacar el avance de los generadores por proyecto
  public function graficaAvanceGeneradores(){
    $this->load->model('almacen_model');
    if(isset($_POST['proyecto'])){
      $proyecto = $this->input->post('proyecto');
    }else{
      $proyecto = 264;
    }
    echo json_encode($this->almacen_model->graficaAvanceGeneradores($proyecto));
  }

  public function empleadosPorUbicacionDepartamento(){
    $this->load->model('personal_model');
    echo json_encode($this->personal_model->empleadosPorUbicacionDepartamento($this->input->post('idtbl_empresas')));
  }
  public function obtenerCostosEstatus(){
    $this->load->model('almacen_model');
    $dolar = $this->precio_actual_dolar();
    //echo json_encode($this->almacen_model->costosAltoCosto($this->input->post('estatus'), $dolar));
  }
  public function obtenerContratacionesSalidasAnioMes(){
    $this->load->model('personal_model');
    $datos['personalActivoPorAnioMes'] = [];
    $datos['personalActivoPorAnioMes']['anterior_anio'] = $this->personal_model->personalActivoPorAnioMes($this->input->post("anio_anterior"));
    $datos['personalActivoPorAnioMes']['actual_anio'] = $this->personal_model->personalActivoPorAnioMes($this->input->post("anio_actual"));
    $datos['contratacionesPorAnioMes'] = [];
    $datos['contratacionesPorAnioMes']['anterior_anio'] = $this->personal_model->contratacionesPorAnioMes($this->input->post("anio_anterior"));
    $datos['contratacionesPorAnioMes']['actual_anio'] = $this->personal_model->contratacionesPorAnioMes($this->input->post("anio_actual"));
    $datos['salidasPorAnioMes'] = [];
    $datos['salidasPorAnioMes']['anterior_anio'] = $this->personal_model->salidasPorAnioMes($this->input->post("anio_anterior"));
    $datos['salidasPorAnioMes']['actual_anio'] = $this->personal_model->salidasPorAnioMes($this->input->post("anio_actual"));
    $datos['totalEmpleadosPorAnioActual'] = $this->personal_model->totalEmpleadosPorAnio($this->input->post("anio_actual"));
        $datos['totalEmpleadosPorAnioAnterior'] = $this->personal_model->totalEmpleadosPorAnio($this->input->post("anio_anterior"));
    echo json_encode($datos);
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  private function clean($string) {
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $string = utf8_decode($string);
    $string = strtr($string, utf8_decode($originales), $modificadas);
    $string = strtolower($string);
    $string = utf8_encode($string);
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
  }

  private function precio_actual_dolar()
    {
        error_reporting(0);
        $url = 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?mediaType=json&token=d8ca6837fc6654742ab58ce244abe03af703031d56eb1a1fe18201bc7602c760';

        $json = file_get_contents($url);
        if ($json!='') {
            $array = json_decode($json, true);
            foreach ($array as $key => $value) {
                foreach ($value['series'] as $key => $value2) {
                    foreach ($value2['datos'] as $key => $value3) {
                        $precio_dolar=bcdiv($value3['dato'], '1', 2);
                    }
                }
            }
        } else {
            $precio_dolar=22.17;
        }
        return ($precio_dolar);
    }

    public function graficaConsumiblesSistemas(){
      $this->load->model('almacen_model');
      $array_resultado = [
        "registros" => $this->almacen_model->grafica_consumibles_sistemas(true),
        "total" => count($this->almacen_model->grafica_consumibles_sistemas()),
        "offset" => $this->input->post("offset"),
        "limit" => 25
      ];
      echo json_encode($array_resultado);
    }

    public function graficaConsumiblesAltoCosto(){
      $this->load->model('almacen_model');
      $array_resultado = [
        "registros" => $this->almacen_model->grafica_consumibles_alto_costo(true),
        "total" => count($this->almacen_model->grafica_consumibles_alto_costo()),
        "offset" => $this->input->post("offset"),
        "limit" => 25
      ];
      echo json_encode($array_resultado);
    }

    public function unidades_control_vehicular_modelo(){
      $this->load->model('almacen_model');
      $result = $this->almacen_model->unidades_control_vehicular_modelo();
      echo json_encode($result);
    }

    public function unidades_control_vehicular_marca_modelo(){
      $this->load->model('almacen_model');
      $result = $this->almacen_model->unidades_control_vehicular_marca_modelo();
      echo json_encode($result);
    }


    public function grafica_control_vehicular_refacciones(){
      $this->load->model('almacen_model');
      $result = ["registros" => $this->almacen_model->grafica_control_vehicular_refacciones(true), "total" => count($this->almacen_model->grafica_control_vehicular_refacciones()), "limit" => 25, "offset" => $this->input->post("offset")];
      echo json_encode($result);
    }

    public function grafica_equipo_proteccion(){
      $this->load->model('almacen_model');
      $result = ["registros" => $this->almacen_model->grafica_equipo_proteccion(true), "total" => count($this->almacen_model->grafica_equipo_proteccion()), "limit" => 25, "offset" => $this->input->post("offset")];
      echo json_encode($result);
    }

    public function grafica_sistemas_laptops(){
      $this->load->model('almacen_model');
      $result = ["registros" => $this->almacen_model->grafica_sistemas_laptops(true), "total" => count($this->almacen_model->grafica_sistemas_laptops()), "limit" => 25, "offset" => $this->input->post("offset")];
      echo json_encode($result);
    }

    public function obtenerDispositivosSistemas(){
      //var_dump($this->input->post("estatus"));
      $this->load->model('almacen_model');
      $array_sistemas = array();
      foreach ($this->input->post("estatus") as $value) {
        $array_sistemas[$value['tipo']] = array();
        $array_sistemas[$value['tipo']]['total_global'] = 0;
        $array_sistemas[$value['tipo']]['estatus'] = [];
        $array_sistemas[$value['tipo']]['total'] = [];
        $result = [];
        if($value["categoria"] == "alto"){
          $result = $this->almacen_model->estatus_herramientas_alto_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }else{
          $result = $this->almacen_model->estatus_herramientas_mediano_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }
        foreach ($result as $key1 => $value1) {
          $array_herramienta[$value['tipo']]['estatus'][] = ucfirst($value1->estatus);
          $array_herramienta[$value['tipo']]['total'][] = floatval($value1->total);
          if ($value1->estatus == 'almacen' || $value1->estatus == 'asignado') {
              $array_herramienta[$value['tipo']]['total_global'] += $value1->total;
          }
        }
      }
      echo json_encode($array_herramienta);
    }

    public function obtenerHerramientasAltoCosto(){
      //var_dump($this->input->post("estatus"));
      $this->load->model('almacen_model');
      $array_herramienta = array();
      foreach ($this->input->post("estatus") as $value) {
        $array_herramienta[$value['tipo']] = array();
        $array_herramienta[$value['tipo']]['total_global'] = 0;
        $array_herramienta[$value['tipo']]['estatus'] = [];
        $array_herramienta[$value['tipo']]['total'] = [];
        $result = [];
        if($value["categoria"] == "alto"){
          $result = $this->almacen_model->estatus_herramientas_alto_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }else{
          $result = $this->almacen_model->estatus_herramientas_mediano_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }
        foreach ($result as $key1 => $value1) {
          $array_herramienta[$value['tipo']]['estatus'][] = ucfirst($value1->estatus);
          $array_herramienta[$value['tipo']]['total'][] = floatval($value1->total);
          if ($value1->estatus == 'almacen' || $value1->estatus == 'asignado') {
              $array_herramienta[$value['tipo']]['total_global'] += $value1->total;
          }
        }
      }
      echo json_encode($array_herramienta);
    }

    public function obtenerHerramientasAltoCostodos(){
      //var_dump($this->input->post("estatus"));
      $this->load->model('almacen_model');
      $array_herramienta = array();
      foreach ($this->input->post("estatus") as $value) {
        $array_herramienta[$value['tipo']] = array();
        $array_herramienta[$value['tipo']]['total_global'] = 0;
        $array_herramienta[$value['tipo']]['estatus'] = [];
        $array_herramienta[$value['tipo']]['total'] = [];
        $result = [];
        if($value["categoria"] == "alto"){
          $result = $this->almacen_model->estatus_herramientas_alto_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }else{
          $result = $this->almacen_model->estatus_herramientas_mediano_costo_like($value['tipo'], $this->input->post("tipo_estatus"));
        }
        foreach ($result as $key1 => $value1) {
          $array_herramienta[$value['tipo']]['estatus'][] = ucfirst($value1->estatus);
          $array_herramienta[$value['tipo']]['total'][] = floatval($value1->total);
          if ($value1->estatus == 'almacen' || $value1->estatus == 'asignado') {
              $array_herramienta[$value['tipo']]['total_global'] += $value1->total;
          }
        }
      }
      echo json_encode($array_herramienta);
    }

    //Cambia el perfil al tipo que se reciba
    public function cambio_perfil($tipo){
      $this->load->model('root_model');

      if ($this->session->userdata('tipo') == 8) {
          $this->session->set_userdata('id_user_direccion', $this->session->userdata('id'));
          $this->root_model->actualizarPermisos($tipo);
      }elseif($this->session->userdata('tipo') == 11){
          $this->session->set_userdata('id_user_co', $this->session->userdata('id'));
          $this->session->set_userdata('permisos', '');
      }elseif($this->session->userdata('id') == 114){
          $this->session->set_userdata('id_calidad', $this->session->userdata('id'));
          $this->root_model->actualizarPermisos($tipo);
      }elseif($this->session->userdata('id') == 3 || $this->session->userdata('id') == 236){
          $this->session->set_userdata('id_user_direccion', $this->session->userdata('id'));
          $this->root_model->actualizarPermisos($tipo);
      }elseif($this->session->userdata('tipo') == 23){
        $this->session->set_userdata('tipo_anterior', $this->session->userdata('tipo'));
        $this->root_model->actualizarPermisos($tipo);
    }
      
    if($this->session->userdata('tipo') != 23){
      $this->session->set_userdata('tipo', $tipo);      
    }
      redirect(base_url());
    }

    //Cambia al modulo que reciba
    public function cambio_modulo($modulo){
      $this->load->model('root_model');

      //$this->session->set_userdata('id_user_direccion', $this->session->userdata('id'));
      $this->root_model->actualizarPermisosModulo($modulo);      
      
      $this->session->set_userdata('modulo_activo', $modulo);      
            
      redirect(base_url());
    }

    //Regresa el perfil a dirección
    public function regreso_direccion(){
      $this->load->model('root_model');

      if(!isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') != 23){
      $this->session->set_userdata('id', $this->session->userdata('id_user_direccion'));
      $this->session->set_userdata('id_user_direccion', '');
      }
      if (isset($_SESSION['id_user_co']) && $this->session->userdata('id_user_co') != '') {
          $this->session->set_userdata('id_user_co', '');
      }
      if($this->session->userdata('id') == 236){
        $this->session->set_userdata('tipo', 7);
      }elseif($this->session->userdata('id') == 3){
        $this->session->set_userdata('tipo', 1);
      }elseif(isset($_SESSION['tipo_anterior']) && $this->session->userdata('tipo_anterior') != '' && $this->session->userdata('tipo_anterior') == 23){
        $this->session->set_userdata('tipo', $this->session->userdata('tipo_anterior'));
        $this->session->set_userdata('tipo_anterior', '');
      }else{
        $this->session->set_userdata('tipo', 8);
      }
      $this->session->set_userdata('permisos', '');
      
      redirect(base_url());
    }

    //Regresa el perfil a sin modulo activo
    public function regreso_modulos(){
      $this->load->model('root_model');
      
      $this->session->set_userdata('modulo_activo', '');
                 
      $this->session->set_userdata('permisos', '');
      
      redirect(base_url());
    }

    //Regresa el perfil a control de obra
    public function regreso_control_obra(){
      $this->load->model('root_model');

      $this->session->set_userdata('id', $this->session->userdata('id_user_co'));
      $this->session->set_userdata('id_user_co', '');
      $this->session->set_userdata('tipo', 11);
      $this->root_model->actualizarPermisos($tipo=11);
      
      redirect(base_url());
    }

    public function indicadorEstatusAutosControlVehicular(){
      $this->load->model('root_model');
      $data = [];
      if($this->input->post("tipo") == "" || $this->input->post("tipo") == "utilitario"){
        $data['utilitario'] = [];
        $data['utilitario']['arrayEstatus'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Utilitario');
        $data['utilitario']['total'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Utilitario', true);
      }
      if($this->input->post("tipo") == "" || $this->input->post("tipo") == "maquinaria"){
        $data['maquinaria'] = [];
        $data['maquinaria']['arrayEstatus'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Maquinaria');
        $data['maquinaria']['total'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Maquinaria', true);
      }
      if($this->input->post("tipo") == "" || $this->input->post("tipo") == "camioneta"){
        $data['camioneta'] = [];
        $data['camioneta']['arrayEstatus'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Camioneta');
        $data['camioneta']['total'] =  $result = $this->root_model->indicadorEstatusAutosControlVehicular('Camioneta', true);
      }
      echo json_encode($data);
    }

}
