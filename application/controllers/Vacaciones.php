<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vacaciones extends CI_Controller {
  
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_logued_in')){
      redirect(base_url().'login');
    }
    $this->load->model('vacaciones_model');
    $this->load->model('personal_model');
    $this->load->model('root_model');
    $this->load->model('almacen_model');
    $this->load->model('curso_model');
    $this->load->model('controlvehicular_model');
    $this->load->model('sistemas_model');

    
        if($this->root_model->getStatus() == 0){
            $this->session->sess_destroy();
            redirect(base_url() . 'login');        
        }

  }
  //Carga el index de asistencias
  public function index() {
    $datos['titulo'] = 'Vacaciones';
    $datos['clase_pagina'] = 'vacaciones-page';
    $uid = $this->session->userdata('uid');
    $datos['token'] = $this->token();
		$datos['dias_vacaciones'] = $this->personal_model->dias_vacaciones($uid);		
		$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
		$datos['detalle']->uid_usuario = $uid;
		//$datos['asistencias'] = $this->personal_model->asistencias($uid);
		$datos['certificados'] = $this->personal_model->certificados();
		$datos['cursos'] = $this->personal_model->cursos();
		$datos['documentos'] = $this->personal_model->documentos();
		$datos['certificados_asignados'] = $this->personal_model->certificados_asignados($uid);
		$datos['documentos_asignados'] = $this->personal_model->documentos_asignados($uid);
		$datos['contratos'] = $this->personal_model->contratos_por_personal($uid);
		$datos['dias_disfrutados_vacaciones'] = $this->personal_model->dias_disfrutados_vacaciones($uid);
		$datos['vacaciones_permisos'] = $this->personal_model->vacaciones_permisos($uid);
		$datos['actas'] = $this->personal_model->actas($uid);
		$datos['incapacidades'] = $this->personal_model->incapacidades($uid);
		$datos['asignaciones'] = $this->almacen_model->asignaciones_personal($uid);
		$datos['asignacionesAG'] = $this->almacen_model->asignaciones_personalAG($uid);
		
		$datos['asignacionesActivas'] = $this->almacen_model->asignaciones_personalAG($uid, [10]);
		$datos['activofijo'] = $this->almacen_model->asignaciones_personalAG($uid, [7,16], "equal");
		$datos['asignacionesUniformes'] = $this->almacen_model->asignaciones_personalAG($uid, [13]);
		$datos['asignacionesEPP'] = $this->almacen_model->asignaciones_personalAG($uid, [4]);
		$datos['asignacionesConsumibles'] = $this->almacen_model->asignaciones_personalAG($uid, [4,10,13], "diff");
		$datos['instructores'] = $this->curso_model->getInstructores();
		$datos['asignacionesAC'] = $this->almacen_model->asignaciones_personalAC($uid);
		$datos['asignacionesKualiT'] = $this->almacen_model->asignaciones_personalKuali($uid);
		$datos['asignacionesAreaMedica'] = $this->almacen_model->asignaciones_personalAreaMedica($uid);
		$datos['asignacionesEHS'] = $this->almacen_model->asignaciones_personalEHS($uid);
		$datos['asignacionesAutosControlVehicular'] = $this->almacen_model->asignaciones_autosControlVehicular($uid);
		$datos['asignacionesRefaccionesControlVehicular'] = $this->almacen_model->asignaciones_refaccionesControlVehicular($uid);
		$datos['asignacionesTarjetas'] = $this->almacen_model->asignaciones_tarjetas($uid);
		$datos['asignacionesSistemas'] = $this->almacen_model->asignaciones_sistemas($uid);
		$datos['incidencias'] = $this->controlvehicular_model->incidenciasByUid($uid);
		$datos['incidencias_sistemas'] = $this->sistemas_model->incidenciasByUid($uid);
		$datos['uid'] = $uid;
		$datos['precio_dolar'] = $this->precio_actual_dolar();
		$datos['prueba_manejo'] = $this->controlvehicular_model->getPruebaManejo($uid);
		if($datos['detalle']->estatus == 0){
			$datos['encuesta'] = $this->personal_model->getEncuestaBaja($datos['detalle']->idtbl_usuarios);
		}
		$datos['verficacion_baja'] = $this->almacen_model->verficacion_baja($datos['detalle']->idtbl_usuarios);
		// Obtener fecha de la bd y calcular edad 
    try {
			$dia = date('j');
			$mes = date('n');
			$ano = date('Y');
			$nacimiento = explode("-", $datos['detalle']->fecha_nacimiento);
			$dianac = $nacimiento[2];
			$mesnac = $nacimiento[1];
			$anonac = $nacimiento[0];
			//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual 
			if (($mesnac == $mes) && ($dianac > $dia)) {
				$ano = ($ano - 1);
			}
			//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual 
			if ($mesnac > $mes) {
				$ano = ($ano - 1);
			}
			//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad 
			$edad = ($ano - $anonac);
			$datos['detalle']->edad = $edad;
		} catch (Exception $e) {
		}

    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('vacaciones/index-vacaciones', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Vista para cargar archivo csv
  public function cagar_csv() {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Asistencias';
    $datos['clase_pagina'] = 'asistencias-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('asistencias/cargar-csv.php', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Procesa un archivo csv para asistencias
  public function procesar_csv() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $this->load->model('asistencias_model');
      if (is_numeric($this->input->post('numero_empleado'))) {
        if ($id_usuario = $this->asistencias_model->existe_numero_empleado($this->input->post('numero_empleado'))) {
          if ($this->asistencias_model->guardar_asistencia($id_usuario))
            echo json_encode(array(
              'error' => false,
              'texto' => 'Success',
              'row' => $this->input->post('row')
            ));
          else
            echo json_encode(array(
              'error' => true,
              'texto' => 'Error al insertar',
              'row' => $this->input->post('row')
            ));
        } else
          echo json_encode(array(
            'error' => true,
            'texto' => 'no_existe',
            'row' => $this->input->post('row')
          ));
      } else {
        if (stripos($this->input->post('numero_empleado'), 'fecha') || stripos($this->input->post('numero_empleado'), 'hora')) {
          $fecha = substr($this->input->post('numero_empleado'), strpos($this->input->post('numero_empleado'), ':') + 1);
        }
        echo json_encode(array(
          'error' => true,
          'texto' => 'no_numerico',
          'row' => $this->input->post('row')
        ));
      }
    } else {
      echo json_encode(array(
        'error' => true,
        'texto' => 'Token invalido',
        'row' => $this->input->post('row')
      ));
    }
  }

  public function nuevaAsistencia()
    {
        $this->form_validation->set_rules('latitud', 'latitud', 'required');
            if ($this->form_validation->run() == false) {
                echo json_encode(array(
                'status' => false,
                'message' => 'Favor de permitir tu ubicación'
                ));
            } else {
                /*$baseFromJavascript1 = $_POST['imagen'];
                $data1 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript1));
                $filepath1 = "./uploads/justificaciones/firmas/".$uid.".png";
                file_put_contents($filepath1, $data1);*/
                $dia = date('Y-m-d');
                $carpeta = './uploads/asistencias/'.$dia;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0755, true);
                }
                $this->load->library('upload');
                $urlimg = $carpeta . '/';
                $config['upload_path'] = $urlimg;
                $config['allowed_types'] = 'jpg|png|PNG|jpeg';
                $config['overwrite'] = true;
                try {
                    $config['file_name'] = $this->session->userdata('id').'-'.$this->input->post('tipo').'.jpg';
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload('foto')) {
                        throw new Exception('Problema al cargar la Foto.');
                    }
                    $check = $this->asistencias_model->nuevaAsistencia();
                    if ($check == true) {
                        echo json_encode(array(
                        'error' => false,
                        'mensaje' => 'Se registro la asistencia correctamente'
                        ));
                    } else {
                        echo json_encode(array(
                        'error' => true,
                        'mensaje' => $check
                        ));
                    }
                } catch (Exception $e) {
                    echo json_encode(array(
                    'status' => false,
                    'message' => $e->getMessage()
                    ));
                }
            }
       
    }
  //Da token al usuario
  private function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function mostrarAsistencias()
    {
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "asistencias" => $this->asistencias_model->getAsistencias($buscar, $inicio, $cantidad),
          "totalRegistros" => count($this->asistencias_model->getAsistencias($buscar)),
          "cantidad" => $cantidad
        );

        echo json_encode($data);
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
}
