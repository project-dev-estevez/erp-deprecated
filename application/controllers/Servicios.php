<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Servicios extends CI_Controller {
	public function __construct() {
    	parent::__construct();
      $this->load->model('almacen_model');
      $this->load->model('departamentos_model');
    	$this->load->model('servicios_model');
    	if (!$this->session->userdata('is_logued_in'))
      		redirect(base_url().'login');
  	}

  	public function token( ) {
    	$token = md5(uniqid(rand(), true));
    	$this->session->set_userdata('token', $token);
    	return $token;
  	}

  	public function index() {
    	$datos['token'] = $this->token();
    	$datos['titulo'] = 'Nueva Orden de Servicio';
    	$datos['clase_pagina'] = 'home-page';
	    $this->load->view('plantillas/header', $datos);
	    $this->load->view('plantillas/menu', $datos);
	    $this->load->view('servicios/nueva-orden-servicio', $datos);
	    $this->load->view('plantillas/footer', $datos);
  	}

    public function imprimirDetalleOrdenServicio($uid) {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Detalle de la Orden de Servicio';
      $datos['clase_pagina'] = 'home-page';
      $datos['orden'] = $this->servicios_model->detalle_orden_servicio($uid);
      $datos['uid'] = $uid;
      $this->load->view('servicios/detalle-orden-servicio-imprimir', $datos);
    }

    public function ImprimirDetalleMaterial($tipo_servicio, $uid) {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Detalle del material';
      $datos['clase_pagina'] = 'home-page';
      $datos['uid'] = $uid;
      $datos['tipo_servicio'] = $tipo_servicio;
      $datos['materiales'] = $this->servicios_model->materiales($uid);
      $this->load->view('servicios/detalle-materiales-imprimir', $datos);
    }

  	public function detalle_orden_servicio($uid, $tipo_servicio) {
      if($uid === 'null') {
        $this->session->set_flashdata('error', 'No se encontró la orden de servicio');
        redirect(base_url() . 'servicios/ordenes');
      }
      else {
    		$datos['token'] = $this->token();
      	$datos['titulo'] = 'Detalle Orden de Servicio';
      	$datos['clase_pagina'] = 'home-page';
      	$datos['orden'] = $this->servicios_model->detalle_orden_servicio($uid);
        $datos['bandera'] = $this->servicios_model->validar_uid_solicitud_material($uid);
      	$datos['uid'] = $uid;
        $datos['tipo_servicio'] = $tipo_servicio;
        $datos['materiales'] = $this->servicios_model->materiales($uid);
  	    $this->load->view('plantillas/header', $datos);
  	    $this->load->view('plantillas/menu', $datos);
  	    $this->load->view('servicios/detalle-orden-servicio', $datos);
  	    $this->load->view('plantillas/footer', $datos);
      }
  	}

  	public function ordenes() {
    	$datos['token'] = $this->token();
    	$datos['titulo'] = 'Ordenes de Servicio';
    	$datos['clase_pagina'] = 'home-page';
	    $this->load->view('plantillas/header', $datos);
	    $this->load->view('plantillas/menu', $datos);
	    $this->load->view('servicios/ver-ordenes-servicio', $datos);
	    $this->load->view('plantillas/footer', $datos);
  	}

  	public function mostrarOrdenesServicio() {
  		//valor a buscar
	    $buscar = $this->input->post('buscar');
	    $numeroPagina = $this->input->post('nropagina');
	    $cantidad = 10;
	    $inicio = ($numeroPagina -1) * $cantidad; 
	    $data = array(
	      "ordenesServicio" => $this->servicios_model->listado_ordenes_servicio($buscar,$inicio,$cantidad),
	      "totalRegistros" => count($this->servicios_model->listado_ordenes_servicio($buscar)),
	      "cantidad" => $cantidad
	    );

	    echo json_encode($data);
  	}

  	/*public function materiales($tipo_servicio, $uid) {
  		$datos['token'] = $this->token();
    	$datos['titulo'] = 'Materiales Utilizados';
    	$datos['clase_pagina'] = 'home-page';
    	$datos['tipo_servicio'] = $tipo_servicio;
    	$datos['uid'] = $uid;
    	$datos['bandera'] = $this->servicios_model->validar_uid_solicitud_material($uid);
	    $this->load->view('plantillas/header', $datos);
	    $this->load->view('plantillas/menu', $datos);
	    $this->load->view('servicios/materiales', $datos);
	    $this->load->view('plantillas/footer', $datos);	
  	}*/

    //muestra la vista de Kuali digital y permite crear nueva solicitud/requisición de productos de Kuali digital
  public function materiales($tipo_servicio, $uid) {
    $this->permisos = $this->departamentos_model->permisos('orden_servicio');
    if (!($this->permisos > 1)) {
      redirect(base_url());
    }
    $this->load->model('proyectos_model');
    $this->load->model('personal_model');
    $datos['token'] = $this->token();
    $datos['tipo_servicio'] = $tipo_servicio;
    $datos['uid'] = $uid;
    $datos['titulo'] = 'Solicitud de almacen';
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['catalogo'] = $this->almacen_model->catalogoMaterialInstalacionKuali($tipo_servicio);
    $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();
    $datos['persona_autorizacion'] = $this->personal_model->persona_autorizacion_kuali();
    $datos['clase_pagina'] = 'compras-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('servicios/materiales', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  	public function guardar_orden_servicio() {
  		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->form_validation->set_rules('contrato', 'contrato', 'required|trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('nombre', 'nombre', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('direccion', 'dirección', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('fecha', 'fecha', 'required|trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('colonia', 'colonia', 'required|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('poblacion', 'población', 'required|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('entre_calles', 'entre calles', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('telefono', 'telefono', 'required|trim|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('latitud', 'latitud', 'required|trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('longitud', 'longitud', 'required|trim|min_length[1]|max_length[30]');
			$this->form_validation->set_rules('servicios_realizar', 'servicios a realizar', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('genero_orden', 'generó orden', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('tipo_servicio', 'tipo de servicio', 'required');
			$this->form_validation->set_rules('potencia', 'potencia', 'required');
			$this->form_validation->set_rules('cap_servicio', 'cap servicio', 'required');
			$this->form_validation->set_rules('fecha_llegada_servicio', 'fecha de llegada al servicio', 'required');
			$this->form_validation->set_rules('hora_inicio', 'hora de inicio', 'required');
			if ($this->form_validation->run() == FALSE) {
				//echo '<div class="hidden">';
				//var_dump(validation_errors());
				//echo '</div>';
        $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', $this->form_validation->error_string())));
				$this->index();
			} else {
				if(!isset($_POST['uid'])) {
					$uid = uniqid();

          $baseFromJavascript = $_POST['imagen'];
          $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript));
          $filepath = "./uploads/firmas/".$uid."fc.png";
          file_put_contents($filepath,$data);

          $baseFromJavascript = $_POST['imagen2'];
          $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript));
          $filepath = "./uploads/firmas/".$uid."ft.png";
          file_put_contents($filepath,$data);

					$this->servicios_model->guardar_orden($uid);
					$this->servicios_model->log($this->session->userdata('nombre') . ' creó una órden de servicio ', 'servicios/detalle_orden_servicio/' . $uid);
					$this->session->set_flashdata('exito', 'Registro exitoso');
					redirect(base_url() . 'servicios/materiales/' . $_POST['tipo_servicio'] . '/' . $uid);
					//else {
					//	$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
					//	$this->index();
					//	return;
					//}
				}
				if(isset($_POST['uid'])) {
					$this->servicios_model->actualizar_orden($_POST['uid']);
					$this->servicios_model->log($this->session->userdata('nombre') . ' actualizó una órden de servicio ', 'servicios/detalle_orden_servicio/' . $_POST['uid']);
					$this->session->set_flashdata('exito', 'Registro exitoso');
					redirect(base_url() . 'servicios/detalle_orden_servicio/' . $_POST['uid']);
					//else {
					//	$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
					//	$this->index();
					//	return;
					//}
				}
			}
		} else {
			redirect(base_url());
			return;
		}
  	}

  	public function guardar_material() {
  		for($x=0; $x<sizeof($_POST['unidad']); $x++) {
  			$parametros = array(
  				'iddtl_solicitud_material_orden_servicio' => '',
  				'descripcion' => $_POST['descripcion'][$x],
  				'unidad' => $_POST['unidad'][$x],
  				'cantidad' => $_POST['cantidad'][$x],
  				'uid_orden_servicio' => $_POST['uid']
  			);
  			$this->servicios_model->guardar_material($parametros);
  		}
  		$this->servicios_model->log($this->session->userdata('nombre') . ' guardó material de una orden de servicio ', 'servicios/detalle_material/' . $_POST['uid']);
		  $this->session->set_flashdata('exito', 'Registro exitoso');
		  redirect(base_url() . 'servicios/ordenes');
  	}

  	public function actualizar_material() {
  		for($x=0; $x<sizeof($_POST['unidad']); $x++) {
  			$parametros = array(
  				'cantidad' => $_POST['cantidad'][$x]
  			);
  			$this->servicios_model->actualizar_material($parametros, $_POST['iddtl_solicitud_material_orden_servicio'][$x]);
  		}
  		$this->servicios_model->log($this->session->userdata('nombre') . ' actualizó material de una orden de servicio ', 'servicios/detalle_material/' . $_POST['uid']);
		  $this->session->set_flashdata('exito', 'Registro exitoso');
		  redirect(base_url() . 'servicios/ordenes');	
  	}

  	public function aprobar_orden_servicio() {
  		//if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        	$check = $this->servicios_model->aprobar_orden_servicio();
        	if ($check == true) {
          		echo json_encode(array(
            		'error' => false,
            		'mensaje' => 'Orden de servicio aprobada correctamente.'
          		));
          		$this->servicios_model->log($this->session->userdata('nombre') . ' aprobó una orden de servicio', 'servicios/detalle_orden_servicio/' . $this->input->post('uid'));
        	} else {
          		echo json_encode(array(
            		'error' => true,
            		'mensaje' => $check
          		));
        	}
      	//} else {
        //	echo json_encode(array(
        //  		'error' => true,
        //  		'mensaje' => 'Token Incorrecto.'
        //	));
      	//}
  	}

  	public function cancelar_orden_servicio() {
  		//if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        	$check = $this->servicios_model->cancelar_orden_servicio();
        	if ($check == true) {
          		echo json_encode(array(
            		'error' => false,
            		'mensaje' => 'Orden de servicio cancelada correctamente.'
          		));
          		$this->servicios_model->log($this->session->userdata('nombre') . ' canceló una orden de servicio', 'servicios/detalle_orden_servicio/' . $this->input->post('uid'));
        	} else {
          		echo json_encode(array(
            		'error' => true,
            		'mensaje' => $check
          		));
        	}
      	//} else {
        //	echo json_encode(array(
        //  		'error' => true,
        //  		'mensaje' => 'Token Incorrecto.'
        //	));
      	//}
  	}

  	public function modificar_aprobar_orden_servicio() {
  		//if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        	$check = $this->servicios_model->modificar_aprobar_orden_servicio();
        	if ($check == true) {
          		echo json_encode(array(
            		'error' => false,
            		'mensaje' => 'Orden de servicio modificada y aprobada correctamente.'
          		));
          		$this->servicios_model->log($this->session->userdata('nombre') . ' modificó y aprobó una orden de servicio', 'servicios/detalle_orden_servicio/' . $this->input->post('uid'));
        	} else {
          		echo json_encode(array(
            		'error' => true,
            		'mensaje' => $check
          		));
        	}
      	//} else {
        //	echo json_encode(array(
        //  		'error' => true,
        //  		'mensaje' => 'Token Incorrecto.'
        //	));
      	//}
  	}
}