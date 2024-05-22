<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ControlVehicular extends CI_Controller {
	public function __construct() {
		parent::__construct();
    $this->load->model('root_model');
    $this->load->model('Controlvehicular_model');

		if (!$this->session->userdata('is_logued_in'))
      redirect(base_url() . 'login');
      
        if($this->root_model->getStatus() == 0){
            $this->session->sess_destroy();
            redirect(base_url() . 'login');        
        }
	}

	public function nueva_prueba_manejo($uid) {
		$this->load->model('departamentos_model');
  	$permisos_control_vehicular = $this->departamentos_model->permisos('solicitud_auto_control_vehicular');
  	if($permisos_control_vehicular > 0) {
      	$this->load->model('personal_model');
      	$datos['token'] = $this->token();
      	$datos['titulo'] = 'Prueba de Manejo';
      	$datos['clase_pagina'] = 'almacen-page';
      	$datos['uid'] = $uid;
      	$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
      	$this->load->view('plantillas/header', $datos);
      	$this->load->view('plantillas/menu', $datos);
      	$this->load->view('control-vehicular/prueba-manejo');
      	$this->load->view('plantillas/footer', $datos);
  	}
  	else {
    		redirect(base_url());
  	}
  }

	public function editar_prueba_manejo($uid) {
  	$this->load->model('departamentos_model');
  	$permisos_control_vehicular = $this->departamentos_model->permisos('solicitud_auto_control_vehicular');
  	if($permisos_control_vehicular > 0) {
  		$this->load->model('controlvehicular_model');
      	$this->load->model('personal_model');
      	$datos['token'] = $this->token();
      	$datos['titulo'] = 'Prueba de Manejo';
      	$datos['clase_pagina'] = 'almacen-page';
      	$datos['uid'] = $uid;
      	$datos['detalle_prueba_manejo'] = $this->controlvehicular_model->getPruebaManejo($uid);
      	$this->load->view('plantillas/header', $datos);
      	$this->load->view('plantillas/menu', $datos);
      	$this->load->view('control-vehicular/detalle-prueba-manejo');
      	$this->load->view('plantillas/footer', $datos);
  	}
  	else {
    		redirect(base_url());
  	}
	}

	public function guardarPruebaManejo() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->load->model('controlvehicular_model');
			$evaluacion = array(
				'ch1' => isset($_POST['ch1']) ? '1' : '0',
				'ch2' => isset($_POST['ch2']) ? '1' : '0',
				'ch3' => isset($_POST['ch3']) ? '1' : '0',
				'ch4' => isset($_POST['ch4']) ? '1' : '0',
				'ch5' => isset($_POST['ch5']) ? '1' : '0',
				'ch6' => isset($_POST['ch6']) ? '1' : '0',
				'ch7' => isset($_POST['ch7']) ? '1' : '0',
				'ch8' => isset($_POST['ch8']) ? '1' : '0',
				'ch9' => isset($_POST['ch9']) ? '1' : '0',
				'observacion1' => $_POST['observacion1'],
				'ch10' => isset($_POST['ch10']) ? '1' : '0',
				'ch11' => isset($_POST['ch11']) ? '1' : '0',
				'ch12' => isset($_POST['ch12']) ? '1' : '0',
				'ch13' => isset($_POST['ch13']) ? '1' : '0',
				'ch14' => isset($_POST['ch14']) ? '1' : '0',
				'ch15' => isset($_POST['ch15']) ? '1' : '0',
				'ch16' => isset($_POST['ch16']) ? '1' : '0',
				'ch17' => isset($_POST['ch17']) ? '1' : '0',
				'ch18' => isset($_POST['ch18']) ? '1' : '0',
				'ch19' => isset($_POST['ch19']) ? '1' : '0',
				'ch20' => isset($_POST['ch20']) ? '1' : '0',
				'ch21' => isset($_POST['ch21']) ? '1' : '0',
				'ch22' => isset($_POST['ch22']) ? '1' : '0',
				'ch23' => isset($_POST['ch23']) ? '1' : '0',
				'observacion2' => $_POST['observacion2'],
				'ch24' => isset($_POST['ch24']) ? '1' : '0',
				'ch25' => isset($_POST['ch25']) ? '1' : '0',
				'ch26' => isset($_POST['ch26']) ? '1' : '0',
				'ch27' => isset($_POST['ch27']) ? '1' : '0',
				'ch28' => isset($_POST['ch28']) ? '1' : '0',
				'ch29' => isset($_POST['ch29']) ? '1' : '0',
				'ch30' => isset($_POST['ch30']) ? '1' : '0',
				'ch31' => isset($_POST['ch31']) ? '1' : '0',
				'ch32' => isset($_POST['ch32']) ? '1' : '0',
				'ch33' => isset($_POST['ch33']) ? '1' : '0',
				'observacion3' => $_POST['observacion3'],
			);
			if(count($this->controlvehicular_model->getPruebaManejo($_POST['uid'])) == 0) {
				$parametros = array(
					'idtbl_prueba_manejo' => '',
					'fecha' => $_POST['fecha'],
					'nombre_evaluado' => $_POST['nombre_evaluado'],
					'nombre_aplicante' => $_POST['nombre_aplicante'],
					'tipo_licencia' => $_POST['tipo_licencia'],
					'rango_evaluacion' => $_POST['evaluacion'],
					'autorizacion' => $_POST['autorizacion'],
					'unidad' => $_POST['unidad'],
					'evaluacion' => json_encode($evaluacion),
					'uid_usuario' => $_POST['uid'],
					'vigencia_licencia' => $_POST['vigencia_licencia'],
					'localidad_licencia' => $_POST['localidad_licencia']
				);

				$this->controlvehicular_model->guardarPruebaManejo($parametros);
				$this->controlvehicular_model->log($this->session->userdata('nombre') . ' creó una prueba de manejo ', 'controlvehicular/prueba_manejo/' . $_POST['uid']);
				$this->session->set_flashdata('exito', 'Registro exitoso');
				redirect(base_url() . 'personal/detalle/' . $_POST['uid']);
			}
			else {
				$parametros = array(
					'fecha' => $_POST['fecha'],
					'nombre_evaluado' => $_POST['nombre_evaluado'],
					'nombre_aplicante' => $_POST['nombre_aplicante'],
					'tipo_licencia' => $_POST['tipo_licencia'],
					'rango_evaluacion' => $_POST['evaluacion'],
					'autorizacion' => $_POST['autorizacion'],
					'unidad' => $_POST['unidad'],
					'evaluacion' => json_encode($evaluacion),
					'uid_usuario' => $_POST['uid'],
					'vigencia_licencia' => $_POST['vigencia_licencia'],
					'localidad_licencia' => $_POST['localidad_licencia']
				);

				$this->controlvehicular_model->actualizarPruebaManejo($parametros,$_POST['uid']);
				$this->controlvehicular_model->log($this->session->userdata('nombre') . ' actualizó una prueba de manejo ', 'controlvehicular/prueba_manejo/' . $_POST['uid']);
				$this->session->set_flashdata('exito', 'Registro exitoso');
				redirect(base_url() . 'personal/detalle/' . $_POST['uid']);	
			}

		}
		else {
			redirect(base_url());
			return;
		}
	}

	private function token() {
  	$token = md5(uniqid(rand(), true));
  	$this->session->set_userdata('token', $token);
  	return $token;
  }

  public function guardarChecklist() {
    $this->load->model('controlvehicular_model');

    $existe_checklist = $this->controlvehicular_model->getChecklist($_POST['uid_asignacion']);

    if(sizeof($existe_checklist) > 0) {
      $imagenes_json = json_decode($existe_checklist[0]['imagenes_checklist']);
      /*unlink(FCPATH.$imagenes_json->imagen1);
      unlink(FCPATH.$imagenes_json->imagen2);
      unlink(FCPATH.$imagenes_json->imagen3);
      unlink(FCPATH.$imagenes_json->imagen4);
      unlink(FCPATH.$imagenes_json->imagen5);*/
      foreach ($imagenes_json as $key => $value) {
        if(file_exists(FCPATH.$value)){
          unlink(FCPATH.$value);
        }
      }
      $fotos_json = json_decode($existe_checklist[0]['fotos_checklist']);
      foreach ($fotos_json as $key => $value) {
        if(file_exists(FCPATH.$value)){
          unlink(FCPATH.$value);
        }
      }
    }  

		$this->form_validation->set_rules('imagen', 'imagen', 'required');
		$this->form_validation->set_rules('imagen2', 'imagen2', 'required');
		$this->form_validation->set_rules('imagen3', 'imagen3', 'required');
		$this->form_validation->set_rules('imagen4', 'imagen4', 'required');
    $this->form_validation->set_rules('imagen5', 'imagen5', 'required');    
		if ($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'status' => false,
				'message' => 'Favor de crear todas las imagenes'
			));
		} 
    else {
			$baseFromJavascript1 = $_POST['imagen'];
			$data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript1));
			$filepath1 = "./uploads/autos/checklist/".uniqid()."1.png";
      file_put_contents($filepath1,$data1);

      $baseFromJavascript2 = $_POST['imagen2'];
			$data2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript2));
			$filepath2 = "./uploads/autos/checklist/".uniqid()."2.png";
      file_put_contents($filepath2,$data2);

      $baseFromJavascript3 = $_POST['imagen3'];
			$data3 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript3));
			$filepath3 = "./uploads/autos/checklist/".uniqid()."3.png";
      file_put_contents($filepath3,$data3);

      $baseFromJavascript4 = $_POST['imagen4'];
			$data4 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript4));
			$filepath4 = "./uploads/firmas/checklist/".uniqid()."4.png";
      file_put_contents($filepath4,$data4);
			
			$baseFromJavascript5 = $_POST['imagen5'];
			$data5 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript5));
			$filepath5 = "./uploads/firmas/checklist/".uniqid()."5.png";
      file_put_contents($filepath5,$data5);

    	$imagenes = array(
    		'imagen1' => $filepath1,
    		'imagen2' => $filepath2,
    		'imagen3' => $filepath3,
    		'imagen4' => $filepath4,
    		'imagen5' => $filepath5
    	);

      $fotos = Array();
      $this->load->library('upload');
      foreach ($_FILES as $key => $value) {
        if($value["name"] != ""){
          $uid = uniqid();
          $carpeta = './uploads/autos/checklist';
          $urlimg = $carpeta . '/';
          $config['upload_path'] = $urlimg;
          $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
          $config['overwrite'] = TRUE;
          try {
            $config['file_name'] = $uid;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload($key)) {
                throw new Exception('Problema al cargar el archivo de la incidencia.');
            }else{
              $ext = $this->upload->data('file_ext');
              $fotos[$key] = $urlimg . $uid . $ext;
            }
          } catch (Exception $e) {
            echo json_encode(array(
              'status' => false,
              'message' => "Error al subir fotos."
            ));
            return;
          }
        }
      }

    	$checklist = array(
    		't1' => $_POST['t1'],
    		'r1' => $_POST['r1'],
    		'e1' => $_POST['e1'],

    		't2' => $_POST['t2'],
    		'r2' => $_POST['r2'],
    		'e2' => $_POST['e2'],

    		't3' => $_POST['t3'],
    		'r3' => $_POST['r3'],
    		'e3' => $_POST['e3'],

    		't4' => $_POST['t4'],
    		'r4' => $_POST['r4'],
    		'e4' => $_POST['e4'],

    		't5' => $_POST['t5'],
    		'r5' => $_POST['r5'],
    		'e5' => $_POST['e5'],

    		't6' => $_POST['t6'],
    		'r6' => $_POST['r6'],
    		'e6' => $_POST['e6'],

    		't7' => $_POST['t7'],
    		'r7' => $_POST['r7'],
    		'e7' => $_POST['e7'],

    		't8' => $_POST['t8'],
    		'r8' => $_POST['r8'],
    		'e8' => $_POST['e8'],

    		't9' => $_POST['t9'],
    		'r9' => $_POST['r9'],
    		'e9' => $_POST['e9'],

    		't10' => $_POST['t10'],
    		'r10' => $_POST['r10'],
    		'e10' => $_POST['e10'],

    		't11' => $_POST['t11'],
    		'r11' => $_POST['r11'],
    		'e11' => $_POST['e11'],

    		't12' => $_POST['t12'],
    		'r12' => $_POST['r12'],
    		'e12' => $_POST['e12'],

    		't13' => $_POST['t13'],
    		'r13' => $_POST['r13'],
    		'e13' => $_POST['e13'],

    		't14' => $_POST['t14'],
    		'r14' => $_POST['r14'],
    		'e14' => $_POST['e14'],

    		't15' => $_POST['t15'],
    		'r15' => $_POST['r15'],
    		'e15' => $_POST['e15'],

    		't16' => $_POST['t16'],
    		'r16' => $_POST['r16'],
    		'e16' => $_POST['e16'],

    		't17' => $_POST['t17'],
    		'r17' => $_POST['r17'],
    		'e17' => $_POST['e17'],

    		't18' => $_POST['t18'],
    		'r18' => $_POST['r18'],
    		'e18' => $_POST['e18'],

    		't19' => $_POST['t19'],
    		'r19' => $_POST['r19'],
    		'e19' => $_POST['e19'],

    		't20' => $_POST['t20'],
    		'r20' => $_POST['r20'],
    		'e20' => $_POST['e20'],

    		't21' => $_POST['t21'],
    		'r21' => $_POST['r21'],
    		'e21' => $_POST['e21'],

    		't22' => $_POST['t22'],
    		'r22' => $_POST['r22'],
    		'e22' => $_POST['e22'],

    		't23' => $_POST['t23'],
    		'r23' => $_POST['r23'],
    		'e23' => $_POST['e23'],

    		't24' => $_POST['t24'],
    		'r24' => $_POST['r24'],
    		'e24' => $_POST['e24'],

    		't25' => $_POST['t25'],
    		'r25' => $_POST['r25'],
    		'e25' => $_POST['e25'],

    		't26' => $_POST['t26'],
    		'r26' => $_POST['r26'],
    		'e26' => $_POST['e26'],

    		't27' => $_POST['t27'],
    		'r27' => $_POST['r27'],
    		'e27' => $_POST['e27'],

    		't28' => $_POST['t28'],
    		'r28' => $_POST['r28'],
    		'e28' => $_POST['e28'],

    		't29' => $_POST['t29'],
    		'r29' => $_POST['r29'],
    		'e29' => $_POST['e29'],

    		't30' => $_POST['t30'],
    		'r30' => $_POST['r30'],
    		'e30' => $_POST['e30'] 
    	);

    	$parametros = array(
    		'idtbl_checklist' => '',
    		'kilometraje' => $_POST['kilometraje'],
    		'checklist' => json_encode($checklist),
    		'imagenes_checklist' => json_encode($imagenes),
        'fotos_checklist' => json_encode($fotos),
    		'observaciones' => $_POST['observaciones'],
    		'condicion_unidad' => $_POST['condicion_unidad'],
    		'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
    		'tbl_users_idtbl_users' => $this->session->userdata('id'),
    		'tbl_usuarios_uidtbl_usuarios' => $_POST['uid_usuario'],
    		'uid_asignacion' => $_POST['uid_asignacion'],
    		'fecha' => date('Y-m-d'),
        'tbl_catalogo_idtbl_catalogo' => $_POST['idtbl_catalogo']
    	);

      if(sizeof($existe_checklist) == 0) {
        $this->controlvehicular_model->guardarChecklist($parametros);
        echo json_encode(array(
          'status' => true,
          'message' => 'El checklist ha sido creado correctamente'
        ));
      }
      else {
        $parametros = array(
          'kilometraje' => $_POST['kilometraje'],
          'checklist' => json_encode($checklist),
          'imagenes_checklist' => json_encode($imagenes),
          'fotos_checklist' => json_encode($fotos),
          'observaciones' => $_POST['observaciones'],
          'condicion_unidad' => $_POST['condicion_unidad'],
          'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
          'tbl_users_idtbl_users' => $this->session->userdata('id'),
          'tbl_usuarios_uidtbl_usuarios' => $_POST['uid_usuario'],
          'uid_asignacion' => $_POST['uid_asignacion'],
          'fecha' => date('Y-m-d'),
          'tbl_catalogo_idtbl_catalogo' => $_POST['idtbl_catalogo']
        );
        $this->controlvehicular_model->actualizarChecklist($parametros,$_POST['uid_asignacion']);
        echo json_encode(array(
          'status' => true,
          'message' => 'El checklist de la asignación ha sido actualizado correctamente'
        )); 
      }
  	}
  }

  public function guardarChecklistDevolucion() { 
    $this->load->model('controlvehicular_model');

    $existe_checklist = $this->controlvehicular_model->getChecklistDevolucion($_POST['uid_devolucion']);

    if(sizeof($existe_checklist) > 0) {
      $imagenes_json = json_decode($existe_checklist[0]['imagenes_checklist']);
      unlink(FCPATH.$imagenes_json->imagen1);
      unlink(FCPATH.$imagenes_json->imagen2);
      unlink(FCPATH.$imagenes_json->imagen3);
      unlink(FCPATH.$imagenes_json->imagen4);
      unlink(FCPATH.$imagenes_json->imagen5);
    }  

    $this->form_validation->set_rules('imagen', 'imagen', 'required');
    $this->form_validation->set_rules('imagen2', 'imagen2', 'required');
    $this->form_validation->set_rules('imagen3', 'imagen3', 'required');
    $this->form_validation->set_rules('imagen4', 'imagen4', 'required');
    $this->form_validation->set_rules('imagen5', 'imagen5', 'required');
    if ($this->form_validation->run() == FALSE) {
      echo json_encode(array(
        'status' => false,
        'message' => 'Favor de crear todas las imagenes'
      ));
    } 
    else {
      $baseFromJavascript1 = $_POST['imagen'];
      $data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript1));
      $filepath1 = "./uploads/autos/checklist/".uniqid()."1.png";
      file_put_contents($filepath1,$data1);

      $baseFromJavascript2 = $_POST['imagen2'];
      $data2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript2));
      $filepath2 = "./uploads/autos/checklist/".uniqid()."2.png";
      file_put_contents($filepath2,$data2);

      $baseFromJavascript3 = $_POST['imagen3'];
      $data3 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript3));
      $filepath3 = "./uploads/autos/checklist/".uniqid()."3.png";
      file_put_contents($filepath3,$data3);

      $baseFromJavascript4 = $_POST['imagen4'];
      $data4 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript4));
      $filepath4 = "./uploads/firmas/checklist/".uniqid()."4.png";
      file_put_contents($filepath4,$data4);
      
      $baseFromJavascript5 = $_POST['imagen5'];
      $data5 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript5));
      $filepath5 = "./uploads/firmas/checklist/".uniqid()."5.png";
      file_put_contents($filepath5,$data5);

      $imagenes = array(
        'imagen1' => $filepath1,
        'imagen2' => $filepath2,
        'imagen3' => $filepath3,
        'imagen4' => $filepath4,
        'imagen5' => $filepath5
      );

      $checklist = array(
        't1' => $_POST['t1'],
        'r1' => $_POST['r1'],
        'e1' => $_POST['e1'],

        't2' => $_POST['t2'],
        'r2' => $_POST['r2'],
        'e2' => $_POST['e2'],

        't3' => $_POST['t3'],
        'r3' => $_POST['r3'],
        'e3' => $_POST['e3'],

        't4' => $_POST['t4'],
        'r4' => $_POST['r4'],
        'e4' => $_POST['e4'],

        't5' => $_POST['t5'],
        'r5' => $_POST['r5'],
        'e5' => $_POST['e5'],

        't6' => $_POST['t6'],
        'r6' => $_POST['r6'],
        'e6' => $_POST['e6'],

        't7' => $_POST['t7'],
        'r7' => $_POST['r7'],
        'e7' => $_POST['e7'],

        't8' => $_POST['t8'],
        'r8' => $_POST['r8'],
        'e8' => $_POST['e8'],

        't9' => $_POST['t9'],
        'r9' => $_POST['r9'],
        'e9' => $_POST['e9'],

        't10' => $_POST['t10'],
        'r10' => $_POST['r10'],
        'e10' => $_POST['e10'],

        't11' => $_POST['t11'],
        'r11' => $_POST['r11'],
        'e11' => $_POST['e11'],

        't12' => $_POST['t12'],
        'r12' => $_POST['r12'],
        'e12' => $_POST['e12'],

        't13' => $_POST['t13'],
        'r13' => $_POST['r13'],
        'e13' => $_POST['e13'],

        't14' => $_POST['t14'],
        'r14' => $_POST['r14'],
        'e14' => $_POST['e14'],

        't15' => $_POST['t15'],
        'r15' => $_POST['r15'],
        'e15' => $_POST['e15'],

        't16' => $_POST['t16'],
        'r16' => $_POST['r16'],
        'e16' => $_POST['e16'],

        't17' => $_POST['t17'],
        'r17' => $_POST['r17'],
        'e17' => $_POST['e17'],

        't18' => $_POST['t18'],
        'r18' => $_POST['r18'],
        'e18' => $_POST['e18'],

        't19' => $_POST['t19'],
        'r19' => $_POST['r19'],
        'e19' => $_POST['e19'],

        't20' => $_POST['t20'],
        'r20' => $_POST['r20'],
        'e20' => $_POST['e20'],

        't21' => $_POST['t21'],
        'r21' => $_POST['r21'],
        'e21' => $_POST['e21'],

        't22' => $_POST['t22'],
        'r22' => $_POST['r22'],
        'e22' => $_POST['e22'],

        't23' => $_POST['t23'],
        'r23' => $_POST['r23'],
        'e23' => $_POST['e23'],

        't24' => $_POST['t24'],
        'r24' => $_POST['r24'],
        'e24' => $_POST['e24'],

        't25' => $_POST['t25'],
        'r25' => $_POST['r25'],
        'e25' => $_POST['e25'],

        't26' => $_POST['t26'],
        'r26' => $_POST['r26'],
        'e26' => $_POST['e26'],

        't27' => $_POST['t27'],
        'r27' => $_POST['r27'],
        'e27' => $_POST['e27'],

        't28' => $_POST['t28'],
        'r28' => $_POST['r28'],
        'e28' => $_POST['e28'],

        't29' => $_POST['t29'],
        'r29' => $_POST['r29'],
        'e29' => $_POST['e29'],

        't30' => $_POST['t30'],
        'r30' => $_POST['r30'],
        'e30' => $_POST['e30'] 
      );

      $parametros = array(
        'idtbl_checklist' => '',
        'kilometraje' => $_POST['kilometraje'],
        'uid_desasignacion' => $_POST['uid_asignacion'],
        'checklist' => json_encode($checklist),
        'imagenes_checklist' => json_encode($imagenes),
        'observaciones' => $_POST['observaciones'],
        'condicion_unidad' => $_POST['condicion_unidad'],
        'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
        'tbl_users_idtbl_users' => $_POST['idtbl_users'],
        'tbl_usuarios_uidtbl_usuarios' => $_POST['uid_usuario'],
        'fecha' => date('Y-m-d'),
        'tbl_catalogo_idtbl_catalogo' => $_POST['idtbl_catalogo'],
        'uid_devolucion' => $_POST['uid_devolucion']
        
      );

      if(sizeof($existe_checklist) == 0) {
        $this->controlvehicular_model->guardarChecklist($parametros);
        echo json_encode(array(
          'status' => true,
          'message' => 'El checklist ha sido creado correctamente'
        ));
      }
      else {
        $parametros = array(
          'kilometraje' => $_POST['kilometraje'],
          'uid_desasignacion' => $_POST['uid_asignacion'],
          'checklist' => json_encode($checklist),
          'imagenes_checklist' => json_encode($imagenes),
          'observaciones' => $_POST['observaciones'],
          'condicion_unidad' => $_POST['condicion_unidad'],
          'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
          'tbl_users_idtbl_users' => $_POST['idtbl_users'],
          'tbl_usuarios_uidtbl_usuarios' => $_POST['uid_usuario'],
          'fecha' => date('Y-m-d'),
          'tbl_catalogo_idtbl_catalogo' => $_POST['idtbl_catalogo'],
          'uid_devolucion' => $_POST['uid_devolucion']
          
        );
        $this->controlvehicular_model->actualizarChecklistDevolucion($parametros,$_POST['uid_devolucion']);
        echo json_encode(array(
          'status' => true,
          'message' => 'El checklist de la devolución ha sido actualizado correctamente'
        )); 
      }
    }
  }

  public function mostrarUltimoChecklist($iddtl_almacen) {
    $this->load->model('controlvehicular_model');
    $datos = $this->controlvehicular_model->obtenerUltimoChecklist($iddtl_almacen);
    echo json_encode($datos);
  }

  public function notificacionesTramites() {
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->getNotificacionesTramites();
    echo json_encode($resultado);
  }

  public function servicios() {	
    $this->load->model('departamentos_model');
    $this->load->model('controlvehicular_model');
  	$permisos = $this->departamentos_model->permisos('servicios_mecanicos');
  	if($permisos > 0) {      	
      	$datos['token'] = $this->token();
      	$datos['titulo'] = 'Servicios';
      	$datos['clase_pagina'] = 'almacen-page';
        $datos['mecanicos'] = $this->controlvehicular_model->todos_los_mecanicos_activos();    	      	
      	$this->load->view('plantillas/header', $datos);
      	$this->load->view('plantillas/menu');
      	$this->load->view('control-vehicular/servicios');
      	$this->load->view('plantillas/footer');
  	}
  	else {
    		redirect(base_url());
  	}
  }

  public function mostrarServicios() {
    $this->load->model('departamentos_model');	
    $this->load->model('controlvehicular_model');
    $permisos = $this->departamentos_model->permisos('servicios_mecanicos');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "servicios" => $this->controlvehicular_model->serviciosVehiculares($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->serviciosVehiculares($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function asignar_servicio() {
    $this->load->model('departamentos_model');	
    $this->load->model('controlvehicular_model');
    $this->load->model('almacen_model');
    $permisos = $this->departamentos_model->permisos('servicios_mecanicos');
    if ($permisos > 0) {
      
        $check = $this->controlvehicular_model->asignar_servicio();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Servicio asignado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre') . '  Asigno un servicio', 'control-vehicular/asignar-servicio/');
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }

  public function mostrarTramitesVehiculares() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "tramitesVehiculares" => $this->controlvehicular_model->tramitesVehiculares($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->tramitesVehiculares($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function cambioPropietario() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $cambioPropietario = $this->controlvehicular_model->cambioPropietario($buscar, $inicio, $cantidad);
    $path = getcwd() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . "tramites_vehiculares" . DIRECTORY_SEPARATOR;
    foreach ($cambioPropietario as $value) {
      $value->file1 = file_exists($path . $value->uid . "_1.pdf");
      $value->file2 = file_exists($path . $value->uid . "_2.pdf");
      $value->file3 = file_exists($path . $value->uid . "_3.pdf");
    }
    $data = array(
      "cambioPropietario" => $cambioPropietario,
      "totalRegistros" => count($this->controlvehicular_model->cambioPropietario($buscar)),
      "cantidad" => $cantidad
    );
    echo json_encode($data);
  }



  public function detalle_servicio($uid = '') {	
    $this->load->model('departamentos_model');	
    $this->load->model('controlvehicular_model');
    $this->load->model('proyectos_model');
  	$permisos = $this->departamentos_model->permisos('servicios_mecanicos');
  	if($permisos > 0) {      	
      	$datos['token'] = $this->token();
      	$datos['titulo'] = 'Detalle_Servicio';
        $datos['clase_pagina'] = 'almacen-page';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['mecanicos'] = $this->controlvehicular_model->todos_los_mecanicos();
        $datos['detalle'] = $this->controlvehicular_model->detalle_servicio($uid);
        $datos['uid'] = $uid;
        if($datos['detalle'][0]->estatus == "CL" || $datos['detalle'][0]->estatus == "SRCV" || $datos['detalle'][0]->estatus == "FINALIZADO"){
          $datos['detalle_solicitud_refacciones_cancelado'] = $this->controlvehicular_model->getDetalleSolicitudRefaccionesCanceladas($datos['detalle'][0]->idtbl_tramites_vehiculares);
        }
        if($datos['detalle'][0]->estatus == "SRCV" || $datos['detalle'][0]->estatus == "FINALIZADO"){
          $datos['detalle_solicitud_refacciones'] = $this->controlvehicular_model->getDetalleSolicitudRefacciones($datos['detalle'][0]->idtbl_tramites_vehiculares);
        }
        if($datos['detalle'][0]->estatus != "SC" && $datos['detalle'][0]->estatus != "SA" && $datos['detalle'][0]->estatus != "SI"){
          $datos['detalleChecklist'] = $this->controlvehicular_model->getDatosChecklistServicio($uid);
          $datos['checklist'] = json_decode($this->controlvehicular_model->getChecklistServicio($uid));
          $datos['imagenesChecklist'] = json_decode($this->controlvehicular_model->getImagenesChecklistServicio($uid));
        }
        if($datos['detalle'][0]->estatus == "FINALIZADO" ) {
          $datos['checklistTecnico'] = json_decode($this->controlvehicular_model->getChecklistServicioTecnico($uid));
          $datos['imagenesChecklistTecnico'] = json_decode($this->controlvehicular_model->getImagenesChecklistServicioTecnico($uid));
        }
      	$this->load->view('plantillas/header', $datos);
      	$this->load->view('plantillas/menu');
      	$this->load->view('control-vehicular/detalle-servicio');
      	$this->load->view('plantillas/footer');
  	}
  	else {
    		redirect(base_url());
  	}
  }

  //función para cargar vista de los checklist de servicio
  public function checklist_servicio($uid = '') {	
    $this->load->model('departamentos_model');	
    $this->load->model('controlvehicular_model');
    $this->load->model('proyectos_model');
  	$permisos = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
  	if($permisos > 0) {      	
      	$datos['token'] = $this->token();
      	$datos['titulo'] = 'Detalle_Servicio';
        $datos['clase_pagina'] = 'almacen-page';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['mecanicos'] = $this->controlvehicular_model->todos_los_mecanicos();
        $datos['detalle'] = $this->controlvehicular_model->detalle_servicio($uid);
        if ($datos['detalle'][0]->fecha_finalizacion != NULL) {
            $datos['detalleChecklist'] = $this->controlvehicular_model->getDatosChecklistServicio($uid);
            $datos['checklist'] = json_decode($this->controlvehicular_model->getChecklistServicio($uid));
            $datos['imagenesChecklist'] = json_decode($this->controlvehicular_model->getImagenesChecklistServicio($uid));
        }
      	$this->load->view('plantillas/header', $datos);
      	$this->load->view('plantillas/menu');
      	$this->load->view('control-vehicular/checklist-servicio');
      	$this->load->view('plantillas/footer');
  	}
  	else {
    		redirect(base_url());
  	}
  }

  public function checklist_servicio_tecnico($uid = '') { 
    $this->load->model('departamentos_model');  
    $this->load->model('controlvehicular_model');
    $this->load->model('proyectos_model');
    $permisos = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if($permisos > 0) {       
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Detalle_Servicio';
        $datos['clase_pagina'] = 'almacen-page';
        //$datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        //$datos['mecanicos'] = $this->controlvehicular_model->todos_los_mecanicos();
        $datos['detalle'] = $this->controlvehicular_model->detalle_servicio($uid);
        if ($datos['detalle'][0]->fecha_finalizacion != NULL) {
            $datos['detalleChecklist'] = $this->controlvehicular_model->getDatosChecklistServicio($uid);
            $datos['checklistTecnico'] = json_decode($this->controlvehicular_model->getChecklistServicioTecnico($uid));
            $datos['imagenesChecklistTecnico'] = json_decode($this->controlvehicular_model->getImagenesChecklistServicioTecnico($uid));
        }
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu');
        $this->load->view('control-vehicular/checklist-servicio-tecnico');
        $this->load->view('plantillas/footer');
    }
    else {
        redirect(base_url());
    }
  }

  public function iniciar_servicio() {
    $this->load->model('departamentos_model');	
    $this->load->model('controlvehicular_model');
    $this->load->model('almacen_model');
    $permisos = $this->departamentos_model->permisos('servicios_mecanicos');
    if ($permisos > 0) {
      
        $check = $this->controlvehicular_model->iniciar_servicio();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Servicio iniciado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre') . '  Inicio un servicio', 'control-vehicular/iniciar-servicio/');
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }

  /*public function finalizar_servicio() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos = $this->departamentos_model->permisos('servicios_mecanicos');
    
    
        $this->load->model('controlvehicular_model');
        $id = $this->input->post('servicio');
        $uid = $this->input->post('uid');
        $carpeta = './uploads/tramites_vehiculares';
        $this->load->library('upload');
        $urlimg = $carpeta . '/';
        $config['upload_path'] = $urlimg;
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = true;
        try {            
            $config['file_name'] = $uid;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('archivo')) {
              throw new Exception('Problema al cargar el archivo del trámite vehicular.');
            }
            
            if ($this->controlvehicular_model->finalizar_servicio($id) != true) {
                throw new Exception('Problema al finalizar el servicio.');
            }
            $this->almacen_model->log($this->session->userdata('nombre') . ' finalizó un servicio', 'control-vehicular/finalizar-servicio');
            $this->session->set_flashdata('exito', 'Registro exitoso.');
            redirect(base_url() . 'control-vehicular/servicios');
        } catch (Exception $e) {
            $this->session->set_flashdata('error', $e);
            redirect(base_url() . 'control-vehicular/servicios');
        }
    
    
  }*/

  //Función para guardar el checklist del servicio de los mecánicos
  public function guardarChecklistServicio() {
    $this->load->model('controlvehicular_model');

    $id = $this->input->post('servicio');
    $dtl_almacen = $this->input->post('iddtl_almacen');
    $existe_checklist = $this->controlvehicular_model->getChecklist($this->input->post('uid_servicio'));

    if(sizeof($existe_checklist) > 0) {
      $imagenes_json = json_decode($existe_checklist[0]['imagenes_checklist']);
      unlink(FCPATH.$imagenes_json->imagen1);
      unlink(FCPATH.$imagenes_json->imagen2);
      unlink(FCPATH.$imagenes_json->imagen3);
      unlink(FCPATH.$imagenes_json->imagen4);
      unlink(FCPATH.$imagenes_json->imagen5);
      unlink(FCPATH.$imagenes_json->imagen6);
    }  

		$this->form_validation->set_rules('imagen', 'imagen', 'required');
		$this->form_validation->set_rules('imagen2', 'imagen2', 'required');
		$this->form_validation->set_rules('imagen3', 'imagen3', 'required');
		$this->form_validation->set_rules('imagen4', 'imagen4', 'required');
    $this->form_validation->set_rules('imagen5', 'imagen5', 'required');
    $this->form_validation->set_rules('imagen6', 'imagen6', 'required'); 
		if ($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'status' => false,
				'message' => 'Favor de crear todas las imagenes'
			));
		} 
    else {
			$baseFromJavascript1 = $_POST['imagen'];
			$data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript1));
			$filepath1 = "./uploads/autos/checklist/".uniqid()."1.png";
      file_put_contents($filepath1,$data1);

      $baseFromJavascript2 = $_POST['imagen2'];
			$data2 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript2));
			$filepath2 = "./uploads/autos/checklist/".uniqid()."2.png";
      file_put_contents($filepath2,$data2);

      $baseFromJavascript3 = $_POST['imagen3'];
			$data3 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript3));
			$filepath3 = "./uploads/autos/checklist/".uniqid()."3.png";
      file_put_contents($filepath3,$data3);

      $baseFromJavascript4 = $_POST['imagen4'];
			$data4 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript4));
			$filepath4 = "./uploads/firmas/checklist/".uniqid()."4.png";
      file_put_contents($filepath4,$data4);
			
			$baseFromJavascript5 = $_POST['imagen5'];
			$data5 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript5));
			$filepath5 = "./uploads/firmas/checklist/".uniqid()."5.png";
      file_put_contents($filepath5,$data5);

      $baseFromJavascript6 = $_POST['imagen6'];
			$data6 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript6));
			$filepath6 = "./uploads/firmas/checklist/".uniqid()."6.png";
      file_put_contents($filepath6,$data6);

    	$imagenes = array(
    		'imagen1' => $filepath1,
    		'imagen2' => $filepath2,
    		'imagen3' => $filepath3,
    		'imagen4' => $filepath4,
        'imagen5' => $filepath5,
        'imagen6' => $filepath6
    	);

    	$checklist = array(
    		't1' => $_POST['t1'],
    		'r1' => $_POST['r1'],    		

    		't2' => $_POST['t2'],
    		'r2' => $_POST['r2'],    		

    		't3' => $_POST['t3'],
    		'r3' => $_POST['r3'],    		

    		't4' => $_POST['t4'],
    		'r4' => $_POST['r4'],    		

    		't5' => $_POST['t5'],
    		'r5' => $_POST['r5'],    		

    		't6' => $_POST['t6'],
    		'r6' => $_POST['r6'],    		

    		't7' => $_POST['t7'],
    		'r7' => $_POST['r7'],    		

    		't8' => $_POST['t8'],
    		'r8' => $_POST['r8'],    		

    		't9' => $_POST['t9'],
    		'r9' => $_POST['r9'],    		

    		't10' => $_POST['t10'],
    		'r10' => $_POST['r10'],    		

    		't11' => $_POST['t11'],
    		'r11' => $_POST['r11'],    		

    		't12' => $_POST['t12'],
    		'r12' => $_POST['r12'],    		

    		't13' => $_POST['t13'],
    		'r13' => $_POST['r13'],    		

    		't14' => $_POST['t14'],
    		'r14' => $_POST['r14'],    		

    		't15' => $_POST['t15'],
    		'r15' => $_POST['r15'],    		

    		't16' => $_POST['t16'],
    		'r16' => $_POST['r16'],    		

    		't17' => $_POST['t17'],
    		'r17' => $_POST['r17'],    		

    		't18' => $_POST['t18'],
    		'r18' => $_POST['r18'],    		

    		't19' => $_POST['t19'],
    		'r19' => $_POST['r19'],    		

    		't20' => $_POST['t20'],
    		'r20' => $_POST['r20'],    		

    		't21' => $_POST['t21'],
    		'r21' => $_POST['r21'],    		

    		't22' => $_POST['t22'],
    		'r22' => $_POST['r22'],    		

    		't23' => $_POST['t23'],
    		'r23' => $_POST['r23'],    		

    		't24' => $_POST['t24'],
    		'r24' => $_POST['r24'],    		

    		't25' => $_POST['t25'],
    		'r25' => $_POST['r25'],    		

    		't26' => $_POST['t26'],
    		'r26' => $_POST['r26'],    		

    		't27' => $_POST['t27'],
    		'r27' => $_POST['r27'],    		

    		't28' => $_POST['t28'],
    		'r28' => $_POST['r28'],    		

    		't29' => $_POST['t29'],
    		'r29' => $_POST['r29'],    		

    		't30' => $_POST['t30'],
        'r30' => $_POST['r30'],
        
        't31' => $_POST['t31'],
        'r31' => $_POST['r31'],

        't32' => $_POST['t32'],
        'r32' => $_POST['r32'],

        't33' => $_POST['t33'],
        'r33' => $_POST['r33'],

        't34' => $_POST['t34'],
        'r34' => $_POST['r34'],

        't35' => $_POST['t35'],
        'r35' => $_POST['r35'],

        't36' => $_POST['t35'],
        'r36' => $_POST['r36']
      );
      
      if($this->input->post('tecnico_traslado') == ''){
        $traslado = NULL;
      }else{
        $traslado = $this->input->post('tecnico_traslado');
      }

    	$parametros = array(    		
    		'kilometraje' => $this->input->post('kilometraje'),
    		'checklist' => json_encode($checklist),
        'imagenes_checklist' => json_encode($imagenes),       
        'tbl_proyectos_idtbl_proyectos' => $this->input->post('nproyecto'),       
        //'km_salida' => $this->input->post('kmsalida'),
        'km_entrada' => $this->input->post('kmentrada'),
        'nivel_gasolina' => $this->input->post('gasolina'),
        'falla' => $this->input->post('falla'),
        'detalle_conductor' => $this->input->post('detalle_conductor'),
        //'revisa_realiza_tecnico' => $this->input->post('revisa_tecnico'),
        //'servicio_solicitado' => $this->input->post('servicio_solicitado'),
        'taller' => $this->input->post('taller'),
        'tbl_users_idtbl_users_traslado' => $traslado,
        'salida_taller' => $this->input->post('salida_taller'),
        'regreso_taller' => $this->input->post('regreso_taller'),
        'observaciones_inventario' => $this->input->post('observaciones'),
        'diagnostico_falla' => $this->input->post('diagnostico'),
    		'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
    		'tbl_users_idtbl_users' => $this->session->userdata('id'),
    		'tbl_usuarios_uidtbl_usuarios' => $this->input->post('uid_usuario'),
    		'uid_servicio' => $this->input->post('uid_servicio'),
    		'fecha' => date('Y-m-d'),
        'tbl_catalogo_idtbl_catalogo' => $this->input->post('idtbl_catalogo'),
        'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen')
    	);

      if(sizeof($existe_checklist) == 0) {
        $query1 = $this->controlvehicular_model->checklist_servicio($id);
        $query2 = $this->controlvehicular_model->guardarChecklistServicio($parametros);
        if($query1 && $query2){
          echo json_encode(array(
            'status' => true,
            'message' => 'El checklist ha sido creado correctamente'
          ));
        }else{
          echo json_encode(array(
            'status' => false,
            'message' => 'Error al crear checklist, intenta nuevamente'
          ));
        }
      }
      else {
        $parametros = array(
          'kilometraje' => $this->input->post('kilometraje'),
    		  'checklist' => json_encode($checklist),
          'imagenes_checklist' => json_encode($imagenes),
          'observaciones' => $this->input->post('observaciones'),
          'tbl_proyectos_idtbl_proyectos' => $this->input->post('nproyecto'),           
          //'km_salida' => $this->input->post('kmsalida'),
          'km_entrada' => $this->input->post('kmentrada'),
          'nivel_gasolina' => $this->input->post('gasolina'),
          'falla' => $this->input->post('falla'),
          'detalle_conductor' => $this->input->post('detalle_conductor'),
          //'revisa_realiza_tecnico' => $this->input->post('revisa_tecnico'),
          //'servicio_solicitado' => $this->input->post('servicio_solicitado'),
          'taller' => $this->input->post('taller'),
          'tbl_users_idtbl_users_traslado' => $this->input->post('tecnico_traslado'),
          'salida_taller' => $this->input->post('salida_taller'),
          'regreso_taller' => $this->input->post('regreso_taller'),
          'observaciones_inventario' => $this->input->post('observaciones'),
          'diagnostico_falla' => $this->input->post('diagnostico'),
    		  'tbl_almacenes_idtbl_almacenes' => ID_ALMACEN_AUTOS_CONTROL_VEHICULAR,
    		  'tbl_users_idtbl_users' => $this->session->userdata('id'),
    		  'tbl_usuarios_uidtbl_usuarios' => $this->input->post('uid_usuario'),
    		  'uid_servicio' => $this->input->post('uid_servicio'),
    		  'fecha' => date('Y-m-d'),
          'tbl_catalogo_idtbl_catalogo' => $this->input->post('idtbl_catalogo'),
          'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen')
        );        
        $query = $this->controlvehicular_model->actualizarChecklistServicio($parametros,$_POST['uid_servicio']);
        if($query){
          echo json_encode(array(
            'status' => true,
            'message' => 'El checklist del servicio ha sido actualizado correctamente'
          ));
        }else{
          echo json_encode(array(
            'status' => false,
            'message' => 'Error al actualizar el checklist correctamente'
          ));
        } 
      }
  	}
  }

  public function guardarChecklistTecnicoServicio(){
    $data = json_decode($this->input->raw_input_stream);
    if($data->images->imagen7 == "" || $data->images->imagen8 == ""){
      echo json_encode(array(
        'status' => false,
        'message' => 'Favor de crear todas las imagenes'
      ));
    }else{
      $baseFromJavascript7 = $data->images->imagen7;
      $data7 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript7));
      $filepath7 = "./uploads/autos/checklist/".uniqid()."7.png";
      file_put_contents($filepath7,$data7);

      $baseFromJavascript8 = $data->images->imagen8;
      $data8 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript8));
      $filepath8 = "./uploads/autos/checklist/".uniqid()."8.png";
      file_put_contents($filepath8,$data8);

      $imagenes = array(
        'imagen7' => $filepath7,
        'imagen8' => $filepath8,
      );
      $parametros = [
        'km_salida' => $data->data->kmsalida,
        'revisa_realiza_tecnico' => $data->data->revisa_tecnico,
        'servicio_solicitado' => $data->data->servicio_solicitado,
        'checklist_tecnico' => json_encode($data->checklist),
        'imagenes_checklist_tecnico' => json_encode($imagenes),
      ];
      $this->load->model('controlvehicular_model');
      $result1 = $this->controlvehicular_model->actualizarChecklistServicio($parametros, $data->data->uid_servicio);
      $result2 = $this->controlvehicular_model->finalizar_servicio($data->data->servicio, $data->data->iddtl_almacen, $data->data->kmsalida, $data->data->kmservicio);
      if($result1 && $result2){
        echo json_encode(array(
          'status' => true,
          'message' => 'Se guardo correctamente el checklist'
        ));
      }else{
        echo json_encode(array(
          'status' => false,
          'message' => 'Error al guardar el checklist'
        ));
      }
    }
  }

  public function mostrarHistorialAsignacionesAutos() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "historialAsignacionesAutos" => $this->controlvehicular_model->historialAsignacionesAutos($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->historialAsignacionesAutos($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function mostrarUnidadesAsignadas() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "unidadesAsignadas" => $this->controlvehicular_model->unidadesAsignadas($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->unidadesAsignadas($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function obtenerUnidadesAsignadas(){
    $this->load->model('controlvehicular_model');
    $data = $this->controlvehicular_model->unidadesAsignadas();
    echo json_encode($data);
  }

  public function mostrarIncidencias() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "incidencias" => $this->controlvehicular_model->incidencias($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->incidencias($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function mostrarTodasIncidencias() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "incidencias" => $this->controlvehicular_model->todasIncidencias($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->todasIncidencias($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function obtenerUltimoSeguro(){
    $this->load->model('controlvehicular_model');
    $data = $this->controlvehicular_model->obtenerUltimoSeguro();
    echo json_encode($data);
  }

  public function nuevoSiniestro(){
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->nuevoSiniestro();
    echo json_encode($respuesta);
  }

  public function editarSiniestros(){
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->editarSiniestros();
    echo json_encode($respuesta);
  }

  public function editarSiniestrosContabilidad(){
    if($_FILES['archivo']['name'] != ""){
      $this->load->library('upload');
      $config['upload_path'] = './uploads/siniestros/';
      $config['allowed_types'] = 'pdf';
      $config['overwrite'] = TRUE;
      try {
        $config['file_name'] = $this->input->post('idtbl_siniestros');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
          throw new Exception('Problema al cargar documento.');
        }
      } catch (Exception $e) {
        echo json_encode($e->getMessage());
        return;
      }
    }
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->editarSiniestrosContabilidad();
    echo json_encode($respuesta);
  }

  public function mostrarSiniestros() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "siniestros" => $this->controlvehicular_model->siniestros($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->siniestros($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function nuevoFolio(){
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->nuevoFolio();
    echo json_encode($respuesta);
  }

  public function obtenerFoliosSiniestros(){
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->obtenerFoliosSiniestros();
    echo json_encode($respuesta);
  }

  public function nuevo_tramite_vehicular() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if(!$this->permisos_almacen_autos_control_vehicular > 1){
      $this->session->set_flashdata('error', 'No tiene permisos para dar de alta.');
      if($this->input->post('tipo_tramite') == "verificacion" || $this->input->post('tipo_tramite') == "tenencia" || $this->input->post('tipo_tramite') == "placas" || $this->input->post('tipo_tramite') == "seguro"){
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      }else{
        redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
      }
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {

      $this->load->model('controlvehicular_model');
      $uid = uniqid();
      $carpeta = './uploads/tramites_vehiculares';
      $this->load->library('upload');
      $urlimg = $carpeta . '/';
      $config['upload_path'] = $urlimg;
      $config['allowed_types'] = 'pdf';
      $config['overwrite'] = TRUE;
      try {
        if ($this->input->post('tipo_tramite') != 'servicio') {
            $config['file_name'] = $uid;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('archivo')) {
                throw new Exception('Problema al cargar el archivo del trámite vehicular.');
            }
        }
        if ($this->controlvehicular_model->guardar_nuevo_tramite_vehicular($uid) != true) {
          throw new Exception('Problema al guardar trámite vehicular.');
        }
        $this->almacen_model->log($this->session->userdata('nombre') . ' registró un nuevo servicio de auto', 'controlvehicular/nuevo-tramite-vehicular');
        $this->session->set_flashdata('exito', 'Registro exitoso.');
        if($this->input->post('tipo_tramite') == "verificacion" || $this->input->post('tipo_tramite') == "tenencia" || $this->input->post('tipo_tramite') == "placas" || $this->input->post('tipo_tramite') == "seguro"){
          redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
        }else{
          redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
        }
      } catch (Exception $e) {
        $this->session->set_flashdata('error', $e);
        redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
      }
    } else {
      $this->session->set_flashdata('error', 'Token invalido.');
      if($this->input->post('tipo_tramite') == "verificacion" || $this->input->post('tipo_tramite') == "tenencia" || $this->input->post('tipo_tramite') == "placas" || $this->input->post('tipo_tramite') == "seguro"){
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      }else{
        redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
      }
    }
  }

  public function editarTenencia() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if(!$this->permisos_almacen_autos_control_vehicular > 1){
      $this->session->set_flashdata('error', 'No tiene permisos para dar de alta.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->load->model('controlvehicular_model');
      try {
        if ($this->controlvehicular_model->editar_tenencia() != true) {
          throw new Exception('Problema al guardar trámite vehicular.');
        }
        $this->almacen_model->log($this->session->userdata('nombre') . ' registró un nuevo servicio de auto', 'controlvehicular/nuevo-tramite-vehicular');
        $this->session->set_flashdata('exito', 'Actualización exitosa.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      } catch (Exception $e) {
        $this->session->set_flashdata('error', $e);
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      }
    } else {
      $this->session->set_flashdata('error', 'Token invalido.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
    }
  }

  public function editarSeguro() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if(!$this->permisos_almacen_autos_control_vehicular > 1){
      $this->session->set_flashdata('error', 'No tiene permisos para dar de alta.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->load->model('controlvehicular_model');
      try {
        if ($this->controlvehicular_model->editar_seguro() != true) {
          throw new Exception('Problema al guardar trámite vehicular.');
        }
        $this->almacen_model->log($this->session->userdata('nombre') . ' registró un nuevo servicio de auto', 'controlvehicular/nuevo-tramite-vehicular');
        $this->session->set_flashdata('exito', 'Actualización exitosa.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      } catch (Exception $e) {
        $this->session->set_flashdata('error', $e);
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
      }
    } else {
      $this->session->set_flashdata('error', 'Token invalido.');
        redirect(base_url() . 'almacen/tramite-autos-control-vehicular');
    }
  }

  public function nueva_incidencia() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');  
    
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {

      $this->load->model('controlvehicular_model');
      $uid = uniqid();
      $carpeta = './uploads/incidencias';
      $this->load->library('upload');
      $urlimg = $carpeta . '/';
      $config['upload_path'] = $urlimg;
      $config['allowed_types'] = 'pdf|jpg|png|PNG';
      $config['overwrite'] = TRUE;
      try {
        $config['file_name'] = $uid;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {          
            throw new Exception('Problema al cargar el archivo de la incidencia.');
        }      
        if ($this->controlvehicular_model->guardar_nueva_incidencia($uid) != true) {
          throw new Exception('Problema al guardar la incidencia.');
        }
        $this->almacen_model->log($this->session->userdata('nombre') . ' registró una nueva incidencia de auto', 'controlvehicular/nueva-incidencia');
        $this->session->set_flashdata('exito', 'Registro exitoso.');
        if(!isset($_POST['uid_usuario'])){
          redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
        }else{
          redirect(base_url() . "personal/detalle/" . $_POST['uid_usuario']);
        }
      } catch (Exception $e) {
        $this->session->set_flashdata('error', $e);
        if(!isset($_POST['uid_usuario'])){
          redirect(base_url() . 'almacen/almacen-autos-control-vehicular');
        }else{
          redirect(base_url() . "personal/detalle/" . $_POST['uid_usuario']);
        }
      }
    } else {
      redirect(base_url());
    }
  }

  public function getAutosAsignados() {
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->getAutosAsignados($_POST['idtbl_usuarios']);
    echo json_encode($resultado);
  }

  public function getUbication() {
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->getUbication($_POST['iddtl_almacen']);
    echo json_encode($resultado);
  }

  public function getTodosAutosAsignados() {
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->getTodosAutosAsignados($_POST['idtbl_usuarios']);
    echo json_encode($resultado);
  }

  public function editar_estatus_incidencia() {
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if(!$this->permisos_almacen_autos_control_vehicular > 1)
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {

      $this->load->model('controlvehicular_model');
      
      if($_POST['tipo'] == 'controlvehicular') {
        $parametros = array(
          'estatus' => $this->input->post('estatus_incidencia'),
          'comentario_estatus' => $this->input->post('comentario_estatus')
        );        
      } else {
        $parametros = array(
          'estatus_contabilidad' => $this->input->post('estatus_incidencia'),
          'comentario_estatus_contabilidad' => $this->input->post('comentario_estatus')
        );
      }

      if ($this->controlvehicular_model->actualizarIncidencia($parametros, $this->input->post('idtbl_incidencias')) != true) {
        throw new Exception('Problema al actualizar la incidencia.');
      }
      $this->almacen_model->log($this->session->userdata('nombre') . ' edito el estatus de una incidencia de auto', 'controlvehicular/editar-estatus-incidencia');
      $this->session->set_flashdata('exito', 'Registro exitoso.');
      redirect($_SERVER['HTTP_REFERER']);
    } else {
      redirect(base_url());
    } 
  }

  public function mostrarTenencias() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $select = $this->input->post('selectAC');
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "tenencias" => $this->controlvehicular_model->tenencias($buscar, $select, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->tenencias($buscar, $select)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function pagos_tenencias(){
    $this->load->model('almacen_model');
    $this->load->model('departamentos_model');
    $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
    if(!$this->permisos_almacen_autos_control_vehicular > 1)
      redirect(base_url());
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->load->model('controlvehicular_model');
      $carpeta = './uploads/pagos_tenencias';
       if (!file_exists($carpeta)) {
          mkdir($carpeta, 0755, true);
        }      
      $this->load->library('upload');
      $urlimg = $carpeta . '/';
      $config['upload_path'] = $urlimg;
      $config['allowed_types'] = 'pdf';
      $config['overwrite'] = TRUE;
      try {
        $config['file_name'] = $this->input->post('uid');
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('file')) {
            throw new Exception('Problema al cargar el archivo de pagos tenencias.');
        }
        if ($this->controlvehicular_model->pagos_tenencias_estatus("Finalizado") != true) {
          throw new Exception('Problema al guardar cambiar estatus tenencia.');
        }
        $this->almacen_model->log($this->session->userdata('nombre') . ' subio pago tenencia', 'controlvehicular/pagos_tenencias');
        $this->session->set_flashdata('exito', 'Registro exitoso.');
        redirect(base_url() . 'almacen/incidencias');
      } catch (Exception $e) {
        $this->session->set_flashdata('error', $e->getMessage());
        redirect(base_url() . 'almacen/incidencias');
      }
    } else {
      redirect(base_url());
    } 
  }

  public function reactivar_pausar_servicio(){
    $this->load->model('controlvehicular_model');
    $check = $this->controlvehicular_model->reactivar_pausar_servicio();
    if($check == true){
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Servicio asignado correctamente.'
      ));
    }else{
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  }

  public function verificarSeguros(){
    //$this->load->helper('url');
    $this->load->model('controlvehicular_model');
    $this->controlvehicular_model->verificarSeguros();
  }

  public function verificarVerificacion(){
    //$this->load->helper('url');
    $this->load->model('controlvehicular_model');
    $this->controlvehicular_model->verificarVerificacion();
  }

  public function mostrarMultas() {
    $this->load->model('controlvehicular_model');
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina - 1) * $cantidad;
    $data = array(
      "multas" => $this->controlvehicular_model->multas($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->multas($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  public function detalleMultas() {
    $this->load->model('controlvehicular_model');
    $respuesta = $this->controlvehicular_model->detalleMultas();
    echo json_encode($respuesta);
  }

  public function nuevaMulta(){
    $this->load->model('controlvehicular_model');
    $result = $this->controlvehicular_model->nuevaMulta();
    echo json_encode($result);
  }

  public function archivo_multa(){
    $this->load->model('controlvehicular_model');
    $result = $this->controlvehicular_model->archivo_multa();
    echo json_encode($result);
  }

  public function indicadoresServicios(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->indicadoresServicios();
    echo json_encode($resultado);
  }

  //Función para traer todos los neodata de un producto
  public function getAutosModelo(){
    $this->load->model('controlvehicular_model');
    $result = $this->controlvehicular_model->getAutosModelo();
    echo json_encode($result);
  }

  //Función para traer el total de carga por día
  public function totalCargaDia(){
    $this->load->model('controlvehicular_model');
    $result = $this->controlvehicular_model->totalCargaDia();
    echo json_encode($result);
  }

  public function getKmEco(){
    $this->load->model('controlvehicular_model');
    $result = $this->controlvehicular_model->getKmEco();
    echo json_encode($result);
  }

  public function productividadControlVehicular(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->productividadControlVehicular();
    echo json_encode($resultado);
  }

  public function productividadControlVehicularPorRangoFecha(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->productividadControlVehicularPorRangoFecha();
    echo json_encode($resultado);
  }

  public function costoSeguroVerificacionMesAnio(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->costoSeguroVerificacionMesAnio();
    echo json_encode($resultado);
  }

  public function todoLosMecanicos(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->todos_los_mecanicos_activos();
    echo json_encode($resultado);
  }

  public function personalControlVehicular(){
    $this->load->model('controlvehicular_model');
    $resultado = $this->controlvehicular_model->personalControlVehicular();
    echo json_encode($resultado);
  }

  public function guardar_editar_cambio_propietario(){
    $this->load->model('controlvehicular_model');
    $check = $this->controlvehicular_model->guardar_editar_cambio_propietario();
    if($check === true){
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se ' . ($this->input->post('idtbl_tramites_vehiculares') == "" ? 'creo' : 'actualizo' ) . ' correctamente.'
      ));
    }else{
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check . '.'
      ));
    }
  }

  public function cambio_propietario_documentos(){
    $this->load->model('controlvehicular_model');
    $check = $this->controlvehicular_model->cambio_propietario_documentos();
    if($check === true){
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se actualizo correctamente.'
      ));
    }else{
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check . '.'
      ));
    }
  }

  //Función para exportar a excel inventario de autos

  public function excel_status()
    {
      $modelos = $this->Controlvehicular_model->getModelosAutos();
      $this->load->library('excel');
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getProperties()->setTitle('Dashboard Vehicular ');

            //Contador de filas
            $contador = 1;
            //Le aplicamos ancho las columnas.
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
            //Le aplicamos negrita a los títulos de la cabecera.
            $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
            //Definimos los títulos de la cabecera.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", '"Activos"');
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", '"Asignados"');
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", '"Colision"');
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", '"Disponible"');
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", '"Perdida Total"');
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", '"Robado"');
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", '"Taller"');            
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", '"Tramite Vehicular"');
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", '"Vendida"');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", '"Total"');
            $estatusArray = array(); // Array para almacenar los valores de la fila A

            foreach ($modelos as $modelo) {
                $resultado = $this->Controlvehicular_model->getAutos($modelo->modelo);
            
                foreach ($resultado as $resultados) {
                    $fila = $resultados->modelo; // Obtener el valor de la columna A
                    
                    // Establecer el valor de "estatus" según corresponda
                    if ($resultados->estatus == 'Activos') {
                      $estatusArray[$fila]['A'] = isset($estatusArray[$fila]['A']) ? $estatusArray[$fila]['A'] + $resultados->total : $resultados->total;
                    }elseif ($resultados->estatus == 'asignado') {
                        $estatusArray[$fila]['B'] = isset($estatusArray[$fila]['B']) ? $estatusArray[$fila]['B'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'colision') {
                        $estatusArray[$fila]['C'] = isset($estatusArray[$fila]['C']) ? $estatusArray[$fila]['C'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'disponible') {
                        $estatusArray[$fila]['D'] = isset($estatusArray[$fila]['D']) ? $estatusArray[$fila]['D'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'perdida total') {
                        $estatusArray[$fila]['E'] = isset($estatusArray[$fila]['E']) ? $estatusArray[$fila]['E'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'robado') {
                        $estatusArray[$fila]['F'] = isset($estatusArray[$fila]['F']) ? $estatusArray[$fila]['F'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'taller') {
                        $estatusArray[$fila]['G'] = isset($estatusArray[$fila]['G']) ? $estatusArray[$fila]['G'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'tramite vehicular') {
                        $estatusArray[$fila]['H'] = isset($estatusArray[$fila]['H']) ? $estatusArray[$fila]['H'] + $resultados->total : $resultados->total;
                    } elseif ($resultados->estatus == 'vendida') {
                        $estatusArray[$fila]['I'] = isset($estatusArray[$fila]['I']) ? $estatusArray[$fila]['I'] + $resultados->total : $resultados->total;
                    } 
            
                    $estatusArray[$fila]['J'] = isset($estatusArray[$fila]['J']) ? $estatusArray[$fila]['J'] + $resultados->total : $resultados->total;
                }
            }
            foreach ($estatusArray as &$valores) {
              foreach (range('B', 'J') as $columna) {
                  if (!isset($valores[$columna])) {
                      $valores[$columna] = 0;
                  }
              }
              unset($valores); // Liberar la referencia del elemento del array
          }
            
            // Asignar los valores del array a las celdas correspondientes
            $contador = 2; // Iniciar en 2 para dejar la celda A1 vacía
            foreach ($estatusArray as $fila => $valores) {
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $fila);

                foreach ($valores as $columna => $valor) {
                    $this->excel->getActiveSheet()->setCellValue("{$columna}{$contador}", $valor);
                }
                

                $contador++;
            }
          $contador++;
                  $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Total');
                  $this->excel->getActiveSheet()->setCellValue("B{$contador}", '=SUM(B2:B' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("C{$contador}", '=SUM(C2:C' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("D{$contador}", '=SUM(D2:D' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("E{$contador}", '=SUM(E2:E' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("F{$contador}", '=SUM(F2:F' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("G{$contador}", '=SUM(G2:G' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("H{$contador}", '=SUM(H2:H' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("I{$contador}", '=SUM(I2:I' . ($contador - 1) . ')');
                  $this->excel->getActiveSheet()->setCellValue("J{$contador}", '=SUM(J2:J' . ($contador - 1) . ')');
              //Le ponemos un nombre al archivo que se va a generar.
          $archivo = 'dashboard_vehicular' . date('d-m-Y  H:i:s') . '.xls';
          //Hacemos una salida al navegador con el archivo Excel.
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="' . $archivo . '"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
          $objWriter->save('php://output');
     }
     public function mostrarasignados() 
     {
      $data['resultados'] = $this->Controlvehicular_model->sumaestatus();
      $this->load->view('plantillas/home', $data);
     }
     //emiliano tabla de mecanicos//
     public function disponiblidadmecanico()
     {
      $this->load->model('Controlvehicular_model');
      $data['resultados'] = $this->Controlvehicular_model->mecanicadisponible();
      $data['resultados2'] = $this->Controlvehicular_model->mecanicadisponiblecorrectivos();
      $data['resultados3'] = $this->Controlvehicular_model->mecanicadisponiblepredictivos();
      $data['mecanicosserviciospredictivos'] = $this->Controlvehicular_model->mecanicadisponiblepredictivos();
      $this->load->view('plantillas/home', $data);
 
    }
    public function estatusservicios()
    {
      $this->load->model('Controlvehicular_model');
      $data['resultados'] = $this->Controlvehicular_model->mecanicosservicios();
      $data['resultados'] = $this->Controlvehicular_model->mecanicosservicioscorrectivos();
      $data['resultados2'] = $this->Controlvehicular_model->mecanicosserviciospreventivos();
      $data['resultados3'] = $this->Controlvehicular_model->mecanicosserviciospredictivos();
      $this->load->view('plantillas/home', $data);
    }
     
    //emiliano  
  public function excel_incidencias()
    {
      $this->load->model('controlvehicular_model');
      $reporte = $this->controlvehicular_model->todasIncidencias();
        if (count($reporte) > 0) {
            //Cargamos la librería de excel.
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Incidencias ');
            //Contador de filas
            $contador = 1;
            //Le aplicamos ancho las columnas.
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
          

            //Le aplicamos negrita a los títulos de la cabecera.
            $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
        

            //Definimos los títulos de la cabecera.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", '#');            
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Unidad');
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Placas');
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proyecto');
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Autor');
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Incidencia');
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Personal');            
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha');
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Costo');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Estatus C.V');
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Comentarios Estatus C.V');
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Estatus Contabilidad');            
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Comentarios estatus contabilidad');
      
            

            foreach ($reporte as $dato) {

              //Incrementamos una fila más, para ir a la siguiente.
              $contador++;

                //Informacion de las filas de la consulta.
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_incidencias);                
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_interno);
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->placas);
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->nombre_proyecto);
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->nombre);
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->incidencia);
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->personal);                
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_incidencia);
                $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->costo);
                $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->estatus);
                $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->comentario_estatus);
                $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->estatus_contabilidad);                
                $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->comentario_estatus_contabilidad);
         
            }

            //Le ponemos un nombre al archivo que se va a generar.
            $archivo = 'Incidencias' . date('d-m-Y  H:i:s') . '.xls';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $archivo . '"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
            //Hacemos una salida al navegador con el archivo Excel.
            $objWriter->save('php://output');
        } else {
            $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
            redirect(base_url() . 'almacen/', 'refresh');
        }
    }

  //Función para exportar a excel inventario de autos
  public function excel_autos_cv()
    {
      $this->load->model('almacen_model');
        $reporte = $this->almacen_model->inventarioAlmacenAutosControlVehicular();
        if (count($reporte) > 0) {
            //Cargamos la librería de excel.
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Autos Control Vehicular ');
            //Contador de filas
            $contador = 1;
            //Le aplicamos ancho las columnas.
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
            /*$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(30);*/

            //Le aplicamos negrita a los títulos de la cabecera.
            $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
            /*$this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);*/

            //Definimos los títulos de la cabecera.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'N° Interno');            
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Marca');
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Modelo');
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Año');
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Descripción');
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Serie');            
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'N° Motor');
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Tipo de combustible');
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Placas');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Entidad Federativa Placas');
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'kilometraje');            
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Estatus');
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Ubicación');
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Operador');
            $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Proyecto');
            $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Precio Unitario');
            /*$this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Fecha Tramite Seguro');
            $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'Fecha Vencimiento Seguro');
            $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Seguro');
            $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'Costo seguro');
            $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'Días restantes seguro');*/
            

            foreach ($reporte as $dato) {
                //Incrementamos una fila más, para ir a la siguiente.
                $contador++;
                if ($dato->estatusAlmacen == 'asignado') {                  
                      $operador = $dato->nombres . ' ' . $dato->apellido_paterno . ' ' . $dato->apellido_materno;
              } else {
                  $operador = "Sin asignación";
              }
              if ($dato->tipo_moneda == 'd') {
                $dato->precio = $dato->precio * $this->precio_actual_dolar();
              }                            

              //$firstDate = $dato->proxima_fecha_tramite;              
              $secondDate = date('y-m-d');              
              //$dateDifference = abs(strtotime($firstDate) - strtotime($secondDate));  
              //$years  = floor($dateDifference / (365 * 60 * 60 * 24)* ((365 * 60 * 60 * 24) / (30 * 60 * 60 * 24)) * ((30 * 60 * 60 *24) / (60 * 60 * 24)));
              //$months = floor(($dateDifference - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
              //$days   = floor(($dateDifference - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 *24) / (60 * 60 * 24));  
              //$fecha = ($years." días"); 
              //if($firstDate==''){
              //  $fecha = (""); 
              //}             
              

                //Informacion de las filas de la consulta.
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_interno);                
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->marca);
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->modelo);
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->anio);
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->descripcion);
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_serie);                
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->no_motor);
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->tipo_combustible);
                $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->placas_auto);
                $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->nombre_entidad);
                $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->km_actual);                
                $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->estatusAlmacen);
                $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->ubicacion);
                $this->excel->getActiveSheet()->setCellValue("N{$contador}", $operador);
                $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
                $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->precio);
                /*$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->fecha_tramite);
                $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->proxima_fecha_tramite);
                $this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->seguro);
                $this->excel->getActiveSheet()->setCellValue("T{$contador}", $dato->costo_seguro);
                $this->excel->getActiveSheet()->setCellValue("U{$contador}", $fecha);*/
                
            }

            //Le ponemos un nombre al archivo que se va a generar.
            $archivo = 'Autos_Control_Vehicular' . date('d-m-Y  H:i:s') . '.xls';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $archivo . '"');
            header('Cache-Control: max-age=0');
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
            //Hacemos una salida al navegador con el archivo Excel.
            $objWriter->save('php://output');
        } else {
            $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
            redirect(base_url() . 'almacen/', 'refresh');
        }
    }

    //Función para exportar a excel inventario de tarjetas
  public function excel_tarjetas()
  {
    $this->load->model('almacen_model');
      $reporte = $this->almacen_model->inventarioAlmacenTarjetas();
      if (count($reporte) > 0) {
          //Cargamos la librería de excel.
          $this->load->library('excel');
          $this->excel->setActiveSheetIndex(0);
          $this->excel->getActiveSheet()->setTitle('Almacen Tarjetas ');
          //Contador de filas
          $contador = 1;
          //Le aplicamos ancho las columnas.
          $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
          $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
          $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);

          //Le aplicamos negrita a los títulos de la cabecera.
          $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);

          //Definimos los títulos de la cabecera.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Neodata');            
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Marca');
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Modelo');
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Descripción');
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Serie');
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'NIP');            
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Categoria');
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Estatus');
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Precio Unitario');
          

          foreach ($reporte as $dato) {
              //Incrementamos una fila más, para ir a la siguiente.
              $contador++;

              //Informacion de las filas de la consulta.
              $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->neodata);                
              $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->marca);
              $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->modelo);
              $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->descripcion);
              $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->numero_serie);
              $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_interno);                
              $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->abreviatura);
              $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->estatus);
              $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->precio);
              
          }

          //Le ponemos un nombre al archivo que se va a generar.
          $archivo = 'Tarjetas' . date('d-m-Y  H:i:s') . '.xls';
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="' . $archivo . '"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
          //Hacemos una salida al navegador con el archivo Excel.
          $objWriter->save('php://output');
      } else {
          $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
          redirect(base_url() . 'almacen/', 'refresh');
      }
  }

  //Función para exportar a excel tabla de siniestros
  public function excel_siniestros()
  {
      $reporte = $this->Controlvehicular_model->siniestros();
      if (count($reporte) > 0) {
          //Cargamos la librería de excel.
          $this->load->library('excel');
          $this->excel->setActiveSheetIndex(0);
          $this->excel->getActiveSheet()->setTitle('Siniestros ');
          //Contador de filas
          $contador = 1;
          //Le aplicamos ancho las columnas.
          $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
          $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
          $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
          $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(25);

          //Le aplicamos negrita a los títulos de la cabecera.
          $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);

          //Definimos los títulos de la cabecera.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", '#');            
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Seguro');
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Reportado');
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Eco');
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Tipo');
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estado');            
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Fecha de Siniestro');
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha conclusión');
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Autor');
          

          foreach ($reporte as $dato) {
              //Incrementamos una fila más, para ir a la siguiente.
              $contador++;

              //Informacion de las filas de la consulta.
              $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_siniestros);                
              $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->seguro);
              $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre_reportado_por . ' ' . $dato->apellido_paterno_atiende . ' ' . $dato->apellido_materno_atiende);
              $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_interno);
              $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tipo);
              $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->estatus);                
              $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->fecha_siniestro);
              $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_conclusion);
              $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->nombre);
              
          }

          //Le ponemos un nombre al archivo que se va a generar.
          $archivo = 'Siniestros' . date('d-m-Y  H:i:s') . '.xls';
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="' . $archivo . '"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
          //Hacemos una salida al navegador con el archivo Excel.
          $objWriter->save('php://output');
      } else {
          $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
          redirect(base_url() . 'almacen/', 'refresh');
      }
  }

    //Función para obtener el precio del dolar actual, mediante la API de Banxico
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


    public function cargarCombustible(){
      $this->load->model('controlvehicular_model');
			$carpeta = './uploads/combustible/' ;
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->load->library('upload');
			$urlimg = $carpeta . '/';
			$config['file_name'] = $this->input->post('iddtl_almacen') . '-' . $this->input->post('km_actual');
			$config['upload_path'] = $urlimg;
			$config['allowed_types'] = 'jpg|png|PNG|jpeg';
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('archivo')) {
				echo json_encode(array(
          'error' => true,
          'mensaje' => 'Error al guardar.'
        ));
			} else {
				$result = $this->controlvehicular_model->cargarCombustible();
      if($result){
        echo json_encode(array(
          'error' => false,
          'mensaje' => 'Carga combustible correctamente.'
        ));
      }else{
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Error al guardar.'
        ));
      }
			}
      
    }

    
    public function cargaCombustibleManual(){
      $this->load->model('controlvehicular_model');
			$carpeta = './uploads/combustible/' ;
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->load->library('upload');
			$urlimg = $carpeta . '/';
			$config['file_name'] = $this->input->post('iddtl_almacen') . '-' . $this->input->post('km_actual');
			$config['upload_path'] = $urlimg;
			$config['allowed_types'] = 'jpg|png|PNG|jpeg';
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('archivo')) {
				echo json_encode(array(
          'error' => true,
          'mensaje' => 'Error al guardar.'
        ));
			} else {
				$result = $this->controlvehicular_model->cargaCombustibleManual();
      if($result){
        echo json_encode(array(
          'error' => false,
          'mensaje' => 'Carga combustible correctamente.'
        ));
      }else{
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Error al guardar.'
        ));
      }
			}
      
    }

    public function cargarCombustibleManualMultiple(){
      $this->load->model('controlvehicular_model');
			$carpeta = './uploads/combustible/' ;
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->load->library('upload');
			$urlimg = $carpeta . '/';
      
      $files = $_FILES;
      $cpt=count($_FILES['archivo']['name']);
      for ($i=0; $i<$cpt; $i++) {
          $_FILES['archivo']['name']= $files['archivo']['name'][$i];
          $_FILES['archivo']['type']= $files['archivo']['type'][$i];
          //$config['upload_path'] = $carpeta . '/';
          $_FILES['archivo']['tmp_name']= $files['archivo']['tmp_name'][$i];
          $_FILES['archivo']['error']= $files['archivo']['error'][$i];
          $_FILES['archivo']['size']= $files['archivo']['size'][$i];
          $this->upload->initialize($this->set_upload_options($this->input->post('eco')[$i], $this->input->post('km_actual')[$i]));
          $this->upload->do_upload('archivo');
      }
      
			$result = $this->controlvehicular_model->cargarCombustibleManualMultiple();
      if($result){
        echo json_encode(array(
          'error' => false,
          'mensaje' => 'Carga combustible correctamente.'
        ));
      }else{
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Error al guardar.'
        ));
      }
			
      
    }

    public function mostrarCargaDia()
    {
      $this->load->model('controlvehicular_model');

        //valor a buscar
        $select = $this->input->post('selectCV');
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "cargaDia" => $this->controlvehicular_model->cargaDia($buscar, $select, $inicio, $cantidad),
      "totalRegistros" => count($this->controlvehicular_model->cargaDia($buscar, $select)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
    }

    private function set_upload_options($eco, $km)
    {
			  $carpeta = './uploads/combustible' ;
        //upload an image options
        $config = array();
        $config['upload_path'] = $carpeta . '/';
        $config['file_name'] = $eco . '_' . $km . '.jpg';
        $config['allowed_types'] = 'jpg|jpeg|png|PNG';
        //$config['max_size']      = '5120';

        return $config;
    }

    public function bitacora()
    {
        $this->load->model('departamentos_model');
        $this->permisos = $this->departamentos_model->permisos('bitacora_cv');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $this->load->model('controlvehicular_model');

        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Caja Chica CV';
        $datos['clase_pagina'] = 'almacen-page';
        $datos['usuarios'] = $this->personal_model->todos_los_usuarios('interno');
        $datos['ubicaciones'] = $this->controlvehicular_model->getUbicaciones();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $this->load->view('control-vehicular/bitacora', $datos);
        $this->load->view('plantillas/footer', $datos);
    }


    public function registro_caja_chica() {
      $this->load->model('almacen_model');
      $this->load->model('departamentos_model');
      $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
      if(!$this->permisos_almacen_autos_control_vehicular > 1)
        redirect(base_url());
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        $uid = $this->input->post("uid") == "" ? uniqid() : $this->input->post("uid");
        $carpeta = './uploads/caja_chica';
        $this->load->library('upload');
        $urlimg = $carpeta . '/';
        $config['upload_path'] = $urlimg;
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = TRUE;
        try {
          if($_FILES['archivo']['name'] != ""){
            $config['file_name'] = $uid;
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('archivo')){
              throw new Exception('Error al subir archivo');
            }
          }

          if ($this->controlvehicular_model->registro_caja_chica($uid) != true) {
            echo json_encode(array(
              'error' => true,
              'mensaje' => 'Error al registar en caja chica.'
            ));
            return;
          }else{
            echo json_encode(array(
              'error' => false,
              'mensaje' => 'Registro correcto en caja chica.'
            ));
          }
        } catch (Exception $e) {
          echo json_encode(array(
              'error' => true,
              'mensaje' => $e->getMessage()
          ));
        }
      } else {
        redirect(base_url());
      }
    }

    public function registro_bitacora() {
      $this->load->model('almacen_model');
      $this->load->model('departamentos_model');
      $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
      if(!$this->permisos_almacen_autos_control_vehicular > 1)
        redirect(base_url());
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        $uid = $this->input->post("uid") == "" ? uniqid() : $this->input->post("uid");
          
          if ($this->controlvehicular_model->registro_bitacora($uid) != true) {
            echo json_encode(array(
              'error' => true,
              'mensaje' => 'Error al registar la bitacora.'
            ));
            return;
          }else{
            echo json_encode(array(
              'error' => false,
              'mensaje' => 'Se registro la bitacora correctamente.'
            ));
          }
       
      } else {
        redirect(base_url());
      }
    }

    public function eliminar_registro_caja_chica() {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        if ($this->controlvehicular_model->eliminar_registro_caja_chica() != true) {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Error al eliminar registro en caja chica.'
          ));
          return;
        }else{
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Se elimino registro correctamente en caja chica.'
          ));
        }
      } else {
        redirect(base_url());
      }
    }

    public function obtener_caja_chica(){
      $this->load->model('controlvehicular_model');
      if($this->input->post('idtbl_tramites_vehiculares') != NULL){
        $result = $this->controlvehicular_model->obtener_caja_chica();
      }else{
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $result = array(
          "caja_chica" => $this->controlvehicular_model->obtener_caja_chica($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), $inicio, $cantidad),
          "totalRegistros" => count($this->controlvehicular_model->obtener_caja_chica($this->input->post('fecha_inicial'), $this->input->post('fecha_final'))),
          "monto" => $this->controlvehicular_model->obtener_caja_chica($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), false, false, true)[0]->monto,
          "cantidad" => $cantidad
        );
      }
      echo json_encode($result);
    }

    public function obtener_bitacora_incidencias(){
      $this->load->model('controlvehicular_model');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $result = array(
          "bitacora" => $this->controlvehicular_model->obtener_bitacora_incidencias($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), $inicio, $cantidad),
          "totalRegistros" => count($this->controlvehicular_model->obtener_bitacora_incidencias($this->input->post('fecha_inicial'), $this->input->post('fecha_final'))),
          //"monto" => $this->controlvehicular_model->obtener_bitacora($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), false, false, true)[0]->monto,
          "cantidad" => $cantidad
        );
      echo json_encode($result);
    }

    public function obtener_bitacora(){
      $this->load->model('controlvehicular_model');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $result = array(
          "bitacora" => $this->controlvehicular_model->obtener_bitacora($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), $inicio, $cantidad),
          "totalRegistros" => count($this->controlvehicular_model->obtener_bitacora($this->input->post('fecha_inicial'), $this->input->post('fecha_final'))),
          //"monto" => $this->controlvehicular_model->obtener_bitacora($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), false, false, true)[0]->monto,
          "cantidad" => $cantidad
        );
      echo json_encode($result);
    }

    public function obtener_bitacora_finalizados(){
      $this->load->model('controlvehicular_model');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $result = array(
          "bitacora" => $this->controlvehicular_model->obtener_bitacora_finalizados($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), $inicio, $cantidad),
          "totalRegistros" => count($this->controlvehicular_model->obtener_bitacora_finalizados($this->input->post('fecha_inicial'), $this->input->post('fecha_final'))),
          //"monto" => $this->controlvehicular_model->obtener_bitacora($this->input->post('fecha_inicial'), $this->input->post('fecha_final'), false, false, true)[0]->monto,
          "cantidad" => $cantidad
        );
      echo json_encode($result);
    }

    public function excel_obtener_caja_chica($iddtl_almacen="", $tipo="", $fecha_inicial="", $fecha_final=""){
      $this->load->model('controlvehicular_model');
      if(isset($_POST['fecha_inicial'])){
        $reporte = $this->controlvehicular_model->excel_general_caja_chica();
      }else{
        $reporte = $this->controlvehicular_model->excel_caja_chica($iddtl_almacen, $tipo, $fecha_inicial, $fecha_final);
      }
      if (count($reporte) > 0) {
        //Cargamos la librería de excel.
        $this->load->library('excel');
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Caja chica ');
        //Contador de filas
        $contador = 1;
        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);

        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'ID');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'UID');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Proyecto');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Fecha Compra');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Monto');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Descripción');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Comprobante');
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Tipo');
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'ECO');
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'ID servicio');

        foreach ($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_caja_chica);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_compra);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->monto);
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->descripcion);
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->comprobante);
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->tipo);
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->numero_interno != NULL ? $dato->numero_interno : "---");
          $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->tbl_tramites_vehiculares_idtbl_tramites_vehiculares != NULL ? $dato->tbl_tramites_vehiculares_idtbl_tramites_vehiculares : "---");
        }

        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = 'Devoluciones almacen' . date('d-m-Y  H:i:s') . '.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $archivo . '"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
      } else {
        $this->session->set_flashdata('errorReportesControlVehicular', 'No hay información para generar reporte.');
        redirect(base_url() . 'almacen/reportes-control-vehicular', 'refresh');
      }
    }

    public function confirmar_movimiento_caja_chica() {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        if ($this->controlvehicular_model->confirmar_movimiento_caja_chica() != true) {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Error al confirmar movimiento de caja chica.'
          ));
          return;
        }else{
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Movimiento caja chica confirmado correctamente.'
          ));
        }
      } else {
        redirect(base_url());
      }
    }

    public function reembolsar_movimiento_caja_chica() {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        if ($this->controlvehicular_model->reembolsar_movimiento_caja_chica() != true) {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Error al reembolsar movimiento de caja chica.'
          ));
          return;
        }else{
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Movimiento caja chica reembolsado correctamente.'
          ));
        }
      } else {
        redirect(base_url());
      }
    }

    public function cancelar_movimiento_caja_chica() {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $this->load->model('controlvehicular_model');
        if ($this->controlvehicular_model->cancelar_movimiento_caja_chica() != true) {
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Error al cancelar movimiento de caja chica.'
          ));
          return;
        }else{
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Movimiento caja chica cancelado correctamente.'
          ));
        }
      } else {
        redirect(base_url());
      }
    }

    public function siniestros(){
      $this->load->model('departamentos_model');  
      $this->load->model('controlvehicular_model');
      $this->load->model('proyectos_model');
      $permisos = $this->departamentos_model->permisos('siniestros');
      //if($permisos > 0) {       
          $datos['token'] = $this->token();
          $datos['titulo'] = 'Siniestros';
          $datos['clase_pagina'] = 'almacen-page';
          $datos['precio_dolar'] = $this->precio_actual_dolar();
          $this->load->view('plantillas/header', $datos);
          $this->load->view('plantillas/menu');
          $this->load->view('control-vehicular/siniestros');
          $this->load->view('plantillas/footer');
      /*}
      else {
          redirect(base_url());
      }*/
    }

    public function cambio_propietario(){
      $this->load->model('departamentos_model');  
      $this->load->model('controlvehicular_model');
      $this->load->model('proyectos_model');
      $permisos = $this->departamentos_model->permisos('cambio_propietario');
      if($permisos > 0) {  
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();     
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Cambio de propietario';
        $datos['clase_pagina'] = 'almacen-page';
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu');
        $this->load->view('control-vehicular/cambio-propietario');
        $this->load->view('plantillas/footer');
      }
      else {
          redirect(base_url());
      }
    }
    public function usuario_asignaciones()
    {
     
      $year = $this->input->post('year');
      $usuario = $this->input->post('usuario');
      $resultado = $this->Controlvehicular_model->asignacionesautos($year, $usuario);
      echo json_encode($resultado);

    }
    public function modelosautos()
    
    {
    $modeloauto = $this->input->post('automodelo');
    $datos['modelos'] = $this->Controlvehicular_model->modeloanio($modeloauto);
    $this->output->set_content_type('application/json')->set_output(json_encode($datos));
    }
    

}