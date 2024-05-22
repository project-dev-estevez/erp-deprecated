<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Departamentos extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('departamentos_model');
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
    $this->permisos = $this->departamentos_model->permisos('departamentos');
    $this->permisos2 = $this->departamentos_model->permisos('empresas');
  }
  //Carga la vista de departamentos
  public function index() {
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['departamentos'] = $this->departamentos_model->listado_departamentos($buscar = null);
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Departamentos';
    $datos['clase_pagina'] = 'home-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('departamentos/ver-departamentos.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Muestra un json con los departamentos
  public function mostrarDepartamentos() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "departamentos" => $this->departamentos_model->listado_departamentos($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->departamentos_model->listado_departamentos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }
  //Carga la vista del detalle de un departamento
  public function detalle_departamento($uid) {
    if (!($this->permisos > 0 || $this->permisos2 > 0))
      redirect(base_url());
    $datos['detalle'] = $this->departamentos_model->detalle_departamento($uid);
    $datos['token'] = $this->token();
    $header['titulo'] = $datos['detalle']['nombre'];
    $header['clase_pagina'] = 'home-page';
    $datos['departamento'] = $uid;
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu', $header);
    $this->load->view('departamentos/detalle-departamento', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Muestra la vista del detalle de un perfil
  public function detalle_perfil($uid) {
    if (!($this->permisos > 0 || $this->permisos2 > 0))
      redirect(base_url());
    $datos['detalle'] = $this->departamentos_model->detalle_perfil($uid);
    $datos['detalleActivo'] = $this->departamentos_model->detalle_perfilActivo($uid);
    $datos['detalleInactivo'] = $this->departamentos_model->detalle_perfilInactivo($uid);
    $datos['token'] = $this->token();
    $header['titulo'] = $datos['detalle']['nombre'];
    $header['clase_pagina'] = 'home-page';
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu', $header);
    $this->load->view('departamentos/detalle-perfil', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Actualiza los datos de un perfil
  public function editar_perfil() {
    if (!($this->permisos > 2 || $this->permisos2 > 2))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('perfil', 'nombre de perfil', 'required|trim|min_length[4]|max_length[100]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Revise los datos ingresados.');
        redirect(base_url().$this->input->post('from'));
      } else {
        $check_user = $this->departamentos_model->editar_perfil();
        if ($check_user) {
          $this->departamentos_model->log($this->session->userdata('nombre').' edito perfil "'.$this->input->post('perfil').'"', $this->input->post('from'));
          $this->session->set_flashdata('exito', 'Actualización correcta');
          redirect(base_url().$this->input->post('from'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().$this->input->post('from'));
        }
      }
    } else {
      redirect(base_url().$this->input->post('from'));
    }
  }
  //Guarda un nuevo departamento
  public function nuevo_departamento() {
    if (!($this->permisos > 1 || $this->permisos2 > 2))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('departamento', 'departamento', 'required|trim|min_length[3]|max_length[50]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese un nombre de departamento válido.');
        redirect(base_url().'departamentos');
      } else {
        $establecimiento = $this->input->post('establecimiento');
        $departamento = ucwords($this->input->post('departamento'));
        $uid = uniqid();
        $check_user = $this->departamentos_model->nuevo_departamento($departamento, $uid);
        if ($check_user) {
          $this->departamentos_model->log($this->session->userdata('nombre').' creó departamento "'.$departamento.'"', 'departamentos/departamento/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().'empresas/departamentos/'.$establecimiento);
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().'empresas');
        }
      }
    } else {
      redirect(base_url().'empresas');
    }
  }
  //Guarda un nuevo perfil
  public function nuevo_perfil() {
    if (!($this->permisos > 1 || $this->permisos2 > 1))
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->form_validation->set_rules('departamento', 'departamento', 'required|trim|min_length[1]|max_length[3]');
      $this->form_validation->set_rules('perfil', 'perfil', 'required|trim|min_length[3]|max_length[100]');
      //lanzamos mensajes de error si es que los hay
      if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', 'Ingrese un nombre de perfil válido.');
        redirect(base_url().$this->input->post('from'));
      } else {
        $id_departamento = ucwords($this->input->post('departamento'));
        $perfil = ucwords($this->input->post('perfil'));
        $uid = uniqid();
        $check_user = $this->departamentos_model->nuevo_perfil($id_departamento, $perfil, $uid);
        if ($check_user) {
          $this->departamentos_model->log($this->session->userdata('nombre').' creó el perfil "'.$perfil.'"', 'departamentos/perfil/'.$uid);
          $this->session->set_flashdata('exito', 'Registro exitoso');
          redirect(base_url().$this->input->post('from'));
        } else {
          $this->session->set_flashdata('error', 'Ocurrio un erro intente nuevamente');
          redirect(base_url().$this->input->post('from'));
        }
      }
    } else {
      redirect(base_url().$this->input->post('from'));
    }
  }
  //Muestra un json de los perfiles
  public function obtener_perfiles() {
    if ($this->input->post('departamento')) {
      $check_user = $this->departamentos_model->catalogo_perfiles_por_departamento($this->input->post('departamento'));
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
  //Asigna un token
  public function token( ) {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  //Actualiza los datos de un departamento
  public function actualizar_departamento() {   
    if ($this->session->userdata('tipo') == 5) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {        
        $this->form_validation->set_rules('nombredepartamento', 'nombredepartamento', 'required|trim');
        $establecimiento = $this->input->post('establecimiento');        
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', $this->form_validation->error_string())));
          redirect(base_url() . 'empresas/departamentos/' . $establecimiento);
        } else {          
          $check = $this->departamentos_model->actualizar_departamento();
          if ($check) {
            $this->departamentos_model->log($this->session->userdata('nombre') . ' actualizó departamento "' .  '"', 'almacen/catalogo');
            $this->session->set_flashdata('exito', 'Actualización exitosa');
            redirect(base_url() . 'empresas/departamentos/' . $establecimiento);
          } else {
            $this->session->set_flashdata('error', 'Ocurrio un problema intente nuevamente');
            redirect(base_url() . 'empresas/departamentos/' . $establecimiento);
          }        
        }
      } else {
        redirect(base_url() . 'empresas');
      }
    }
  }

  //Actualiza los datos de un departamento
  public function actualizar_perfil() {   
    if ($this->session->userdata('tipo') == 5) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {        
        $this->form_validation->set_rules('nombreperfil', 'nombreperfil', 'required|trim');
        $perfil = $this->input->post('uid');
        $departamento = $this->input->post('departamento');
        if ($this->form_validation->run() == FALSE) {
          $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', $this->form_validation->error_string())));
          redirect(base_url() . 'departamentos/departamento/' . $departamento);
        } else {
          $check = $this->departamentos_model->actualizar_perfil();
          if ($check) {
            $this->departamentos_model->log($this->session->userdata('nombre') . ' actualizó departamento "' .  '"', 'almacen/catalogo');
            $this->session->set_flashdata('exito', 'Actualización exitosa');
            redirect(base_url() . 'departamentos/departamento/' . $departamento);
          } else {
            $this->session->set_flashdata('error', 'Ocurrio un problema intente nuevamente');
            redirect(base_url() . 'departamentos/departamento/' . $departamento);
          }
        }
      } else {
        redirect(base_url() . 'departamentos');
      }
    }
  }

  //Genera un excel de los departamentos
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
