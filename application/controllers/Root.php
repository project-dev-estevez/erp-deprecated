<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Root extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('root_model');
    if (!$this->session->userdata('is_logued_in')) {
      redirect(base_url().'login');
    }
    //if ($this->session->userdata('tipo') != 0) {
    //  redirect(base_url());
    //}
  }
  public function index() {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Administrador';
    $datos['clase_pagina'] = 'admin-page';
    $datos['permisos']  = $this->root_model->permisos();
    //$datos['usuarios'] = $this->root_model->usuarios();
    $datos['tipos'] = $this->root_model->tipos();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('root/admin', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function mostrarUsuarios() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "usuarios" => $this->root_model->usuarios($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->root_model->usuarios($buscar)),
      "cantidad" => $cantidad
    );
    echo json_encode($data);
  }
  public function nuevousuario() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $pass = $this->passwords();
      $check_user = $this->root_model->nuevousuario($pass);
      if ($check_user) {
        $this->session->set_flashdata('pass', $pass);
        $this->session->set_flashdata('username', $this->input->post('username'));
        $this->session->set_flashdata('exito', 'Registro exitoso.');
        redirect(base_url().'/root');
      } else {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().'root');
      }
    } else {
      redirect(base_url().'root');
    }
  }
  public function actualizarusuario() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $check_user = $this->root_model->actualizarusuario();
      if ($check_user) {
        $this->session->set_flashdata('exito', 'Actualización exitosa.');
        redirect(base_url().'root');
      } else {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().'root');
      }
    } else {
      redirect(base_url().'root');
    }
  }
  public function actualizarModulosUsuario() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $check_user = $this->root_model->actualizarModulosUsuario();
      if ($check_user) {
        $this->session->set_flashdata('exito', 'Actualización exitosa.');
        redirect(base_url().'root');
      } else {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().'root');
      }
    } else {
      redirect(base_url().'root');
    }
  }
  public function actualizarEncargados() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $check_user = $this->root_model->actualizarEncargados();
      if ($check_user) {
        $this->session->set_flashdata('exito', 'Actualización exitosa.');
        redirect(base_url().'root');
      } else {
        $this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
        redirect(base_url().'root');
      }
    } else {
      redirect(base_url().'root');
    }
  }
  public function editarusuario($id) {
    $this->load->model('almacen_model');
    $this->load->model('personal_model');
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Administrador';
    $datos['clase_pagina'] = 'admin-page';
    $datos['permisos'] = $this->root_model->permisos();
    $datos['almacenes'] = $this->almacen_model->almacenes();
    $datos['usuario'] = $this->root_model->usuario($id);
    $datos['personal'] = $this->personal_model->todos_los_usuarios($tipo='interno');
    $datos['encargado_almacen'] = $this->root_model->usuario_encargado($id);
    $datos['id'] = $id;
    $datos['tipos'] = $this->root_model->tipos();

    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('root/editar-usuario', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  public function editarModulos($id) {
    $this->load->model('almacen_model');
    $this->load->model('personal_model');
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Administrador';
    $datos['clase_pagina'] = 'admin-page';
    $datos['permisos'] = $this->root_model->permisos();
    $datos['almacenes'] = $this->almacen_model->almacenes();
    $datos['usuario'] = $this->root_model->usuario($id);
    $datos['modulos'] = $this->root_model->getModulos($datos['usuario']->tipo);
    if($datos['modulos'] == NULL){
      $this->session->set_flashdata('error', 'No hay modulos disponibles para el usuario.');
      redirect(base_url().'root/');
    }
    $datos['personal'] = $this->personal_model->todos_los_usuarios($tipo='interno');
    $datos['encargado_almacen'] = $this->root_model->usuario_encargado($id);
    $datos['id'] = $id;
    $datos['tipos'] = $this->root_model->tipos();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('root/editar-modulos', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  private function passwords() {
    $opc_letras = TRUE; //  FALSE para quitar las letras
    $opc_numeros = TRUE; // FALSE para quitar los números
    $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas
    $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales
    $longitud = 8;
    $password = array();
    $letras = "abcdefghijklmnopqrstuvwxyz";
    $numeros = "1234567890";
    $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $especiales = "|@#~$%()=^*+[]{}-_";
    $listado = "";
    $return = "";
    if ($opc_letras == TRUE) {
      $listado .= $letras;
    }
    if ($opc_numeros == TRUE) {
      $listado .= $numeros;
    }
    if ($opc_letrasMayus == TRUE) {
      $listado .= $letrasMayus;
    }
    if ($opc_especiales == TRUE) {
      $listado .= $especiales;
    }
    $listado = str_shuffle($listado);
    for ($i = 0; $i < $longitud; $i++) {
      $password[$i] = $listado[rand(0, strlen($listado))];
      $listado = str_shuffle($listado);
    }
    foreach ($password as $dato_password) {
      $return .= $dato_password;
    }
    return $return;
  }
  public function generador_contrasena() {
    $opciones = [
      'cost' => 11
    ];
    $pass = $this->passwords();
    $encriptada = password_hash($pass, PASSWORD_BCRYPT, $opciones);
    echo $pass." => ".$encriptada;
  }
  public function resetPassword() {
    if($this->input->is_ajax_request()) {
      if(isset($_POST['password']) && $_POST['password'] == '') {
        $array = array(
            'error_validation' => true,
            'password_error' => "La contraseña es obligatoria"
        );
        echo json_encode($array);
        return; 
      }
      if(isset($_POST['password']) && $_POST['password'] != '' && strlen($_POST['password']) < 7) {
        $array = array(
            'error_validation' => true,
            'password_error' => "La contraseña debe contener mínimo 7 caracteres"
        );
        echo json_encode($array);
        return; 
      }
      if(!isset($_POST['password'])) {
        $password = password_hash('12345678', PASSWORD_DEFAULT);
      }
      else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if($this->session->userdata('tipo') != 5){
          $this->session->sess_destroy();
        }
      }
      $parametro = array(
        'password' => $password
      );
      $resultado = $this->root_model->updatePassword(isset($_POST['id']) ? $_POST['id'] : $this->session->userdata('id') ,$parametro);
      if($resultado) {
        $array = array(
          'update_password' => true,
          'message' => "La constraseña ha sido restablecida correctamente." 
        );
        echo json_encode($array);
        return;
      }
      else {
        $array = array(
          'error' => true,
          'message' => "Error al restablecer la contraseña." 
        );
        echo json_encode($array);
        return;
      }
    }
    else {
      show_404();
    }
  }

  public function activar_usuario() {
         
        $check = $this->root_model->activar_usuario();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Usuario activado correctamente.'
          ));
          
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }     
   
  }

  public function desactivar_usuario() {    
     
        $check = $this->root_model->desactivar_usuario();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Usuario desactivado correctamente.'
          ));
         
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }     
   
  }

  public function excel_usuarios() {
        
    $reporte = $this->root_model->usuarios();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Usuarios ');
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
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", '#');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Nombre');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Username');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Tipo');

      foreach($reporte as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombre);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->username);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->tipo);
      }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Usuarios_'.date('d-m-Y  H:i:s').'.xls';
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
