<?php
defined('BASEPATH') or exit('No direct script access allowed');

use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version1X;

class Personal extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('personal_model');
		$this->load->model('departamentos_model');
		$this->load->model('estados_model');
		if (!$this->session->userdata('is_logued_in'))
			redirect(base_url() . 'login');
		$this->permisos = $this->departamentos_model->permisos('personal');
		$this->permisos_asignacion = $this->departamentos_model->permisos('personal_asignacion');
		//if ($this->permisos == 0)
		//	redirect(base_url());
	}

	public function reporte_general() {
		$this->load->model('personal_model');
		$this->load->library('excel');
		if($this->input->post('tipo_empleado') != 'dc3'){
		$personal = $this->personal_model->todos_los_usuarios_reporte();
		//var_dump($personal);
		if (!empty($personal)) {
			$filename = 'Reporte de Personal ' . Date('d-m-Y') . '.xls';
			header("Content-Type: application/vnd.ms-excel");
			header("Content-Disposition: attachment; filename=" . $filename);
			$mostrar_columnas = false;
			$outputs = array();
			$x = 0;
			foreach ($personal as $persona) {
				foreach ($this->input->post() as $key => $value) {
					if (array_search($key, array_keys($persona))) {
						//$keys[] = str_replace('_',' ',$key);
						$outputs[$x][$key] = $persona[$key];
					}
				}
				$x++;
			}

			//var_dump($outputs);
			foreach ($outputs as $output) {
				if (!$mostrar_columnas) {
					echo strtoupper(str_replace('_', ' ', implode("\t", array_keys($output)) . "\n"));
					$mostrar_columnas = true;
				}
				echo utf8_decode(implode("\t", array_values($output)) . "\n");
			}
		} else {
			$this->session->set_flashdata('error', 'No hay datos a exportar');
			redirect(base_url().'personal/reportes');
		}
		}else{
			$reporte = $this->personal_model->reporte_dc3();
			
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Reporte');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
			
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
			$this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
			
			//Definimos los títulos de la cabecera.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'CURP');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOMBRE');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'PRIMER APELLIDO');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'SEGUNDO APELLIDO');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'CLAVE ESTADO');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'CLAVE MUNICIPIO');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'CLAVE OCUPACION');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'CLAVE NIV ESTUDIO');
			$this->excel->getActiveSheet()->setCellValue("I{$contador}", 'CLAVE DOC PROBATORIO');
			$this->excel->getActiveSheet()->setCellValue("J{$contador}", 'CLAVE INSTITUCION');
			$this->excel->getActiveSheet()->setCellValue("K{$contador}", 'CLAVE CURSO');
			$this->excel->getActiveSheet()->setCellValue("L{$contador}", 'NOMBRE CURSO');
			$this->excel->getActiveSheet()->setCellValue("M{$contador}", 'CLAVE AREA TEMATICA');
			$this->excel->getActiveSheet()->setCellValue("N{$contador}", 'DURACION');
			$this->excel->getActiveSheet()->setCellValue("O{$contador}", 'FEC INICIO');
			$this->excel->getActiveSheet()->setCellValue("P{$contador}", 'FEC TERMINO');
			$this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'CLAVE TIP AGENTE');
			$this->excel->getActiveSheet()->setCellValue("R{$contador}", 'RFC AGENTE STPS');
			$this->excel->getActiveSheet()->setCellValue("S{$contador}", 'CLAVE MODALIDAD');
			$this->excel->getActiveSheet()->setCellValue("T{$contador}", 'CLAVE CAPACITACION');
			$this->excel->getActiveSheet()->setCellValue("U{$contador}", 'CLAVE ESTABLECIMIENTO');

			
			foreach ($reporte as $dato) {
				
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->curp);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->apellido_paterno);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->apellido_materno);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tbl_entidad_idtbl_entidad);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->clave_municipio);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->tbl_ocupacion_idtbl_ocupacion);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->tbl_estudios_idtbl_estudios);
				$this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->tbl_doc_probatorio_idtbl_doc_probatorio); 
				$this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->tbl_instituciones_idtbl_instituciones); 
				$this->excel->getActiveSheet()->setCellValue("K{$contador}", '');
				$this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->nombre_curso);
				$this->excel->getActiveSheet()->setCellValue("M{$contador}", '169');
				$this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->duracion);
				$this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->fecha_inicio); 
				$this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->fecha_termino);
				$this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->tbl_tipo_agente_idtbl_tipo_agente);
				$this->excel->getActiveSheet()->setCellValue("R{$contador}", '');   
				$this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->tbl_modalidad_idtbl_modalidad); 
				$this->excel->getActiveSheet()->setCellValue("T{$contador}", '4');
				$this->excel->getActiveSheet()->setCellValue("U{$contador}", '');  
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Reporte DC3_' . date('d-m-Y  H:i:s') . '.xls';
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="' . $archivo . '"');
			header('Cache-Control: max-age=0');
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
			//Hacemos una salida al navegador con el archivo Excel.
			$objWriter->save('php://output');
		}
		exit;
	}

	public function index() {
		if (!($this->permisos > 0))
			redirect(base_url());
		$header['titulo'] = 'Personal';
		$header['clase_pagina'] = 'personal-page';
		//$datos['personal'] = $this->personal_model->todos_los_usuarios('interno');
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/ver-personal');
		$this->load->view('plantillas/footer');
	}

	public function asignacion() {		
		$header['titulo'] = 'Personal';
		$header['clase_pagina'] = 'personal-page';
		//$datos['personal'] = $this->personal_model->todos_los_usuarios('interno');
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/ver-personal-asignacion');
		$this->load->view('plantillas/footer');
	}

	//Función para cargar la vista de actas administrativas
    public function actas_administrativas()
    {        
        $this->permisos = $this->departamentos_model->permisos('actas_administrativas');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Actas administrativas';		        		
		$datos['clase_pagina'] = 'admin-page';		
        $datos['total']=$this->personal_model->totalActas();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);               
        $this->load->view('personal/actas_administrativas', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

	 //Muestra json de las solicitudes de compra por user
	 public function mostrarSolicitudesActas() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina -1) * $cantidad; 
		$data = array(
		  "solicitudesActas" => $this->personal_model->mis_solicitudes_actas($buscar,$inicio,$cantidad),
		  "totalRegistros" => count($this->personal_model->mis_solicitudes_actas($buscar)),
		  "cantidad" => $cantidad
		);
	
		echo json_encode($data);
	  }

	  //Carga la vista de detalles de las solicitudes
 

	 //Función para cargar la vista de nueva solicitud de acta administrativa
	 public function nueva_solicitud_acta()
	 {
		 $this->load->model('proyectos_model');
		 $this->load->model('personal_model');
		 $datos['token'] = $this->token();
		 $datos['titulo'] = 'Solicitar acta administrativa';
		 $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
		 $datos['personal'] = $this->personal_model->personal();		      
		 $datos['clase_pagina'] = 'ticket-page';
		 $this->load->view('plantillas/header', $datos);
		 $this->load->view('plantillas/menu', $datos);
		 $this->load->view('personal/nueva-acta', $datos);
		 $this->load->view('plantillas/footer', $datos);
	 }

	 

	 //Guarda una nueva solicitud de acta administrativa
	 public function nueva_solicitud() {
		$this->load->model('personal_model');
		$uid = uniqid();
		$this->form_validation->set_rules('imagen6', 'imagen6', 'required');		
			
			if ($this->form_validation->run() == false) {
				echo json_encode(array(
					'status' => false,
					'message' => 'Crear la imagen de la firma'
				));
			} 
			else {
				$baseFromJavascript6 = $_POST['imagen6'];
				$data6 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript6));
				$filepath6 = "./uploads/firmas/personal/".$uid.".png";
				file_put_contents($filepath6, $data6);
	
				$imagenes = array(
				'imagen6' => $filepath6
				);
			$carpeta = './uploads/personal/' . $uid;
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->load->library('upload');
			$urlimg = $carpeta . '/';
			$config['upload_path'] = $urlimg;
			$config['allowed_types'] = 'pdf|jpg|png|jpeg';
			$config['overwrite'] = true;
			try {			  
			  $config['file_name'] = 'evidencias';
			  $this->upload->initialize($config);
			  $this->upload->do_upload('evidencias');
			  $parametros = array(
				'estatus' => 'pendiente',
              'fecha' => date('Y-m-d'),
			  'imagenes_firmas' => json_encode($imagenes),
              'motivo' => $this->input->post('motivo'),
              'detalle' => $this->input->post('descripcion'),
              'tbl_users_idtbl_users' => $this->session->userdata('id'),
              'uid' => $uid,
              'tbl_usuarios_idtbl_usuarios_acreedor' => $this->input->post('personal')             
			  );
			  $check = $this->personal_model->nueva_solicitud($parametros);				
				if ($check == true) {				  
				  			  				  
				  echo json_encode(array(									
					'error' => false,
					'message' => '¡Exito, solicitud enviada!',	
					'time' => '30000'

				  ));

				} else {
				  echo json_encode(array(
					'error' => true,
					'message' => 'Error'
				  ));
				}
			} catch (Exception $e) {
				//$this->rmDir_rf($carpeta);
				echo json_encode(array(
					'status' => false,
					'message' => $e->getMessage()
				));
			}}
					  
  }

  private function rmDir_rf($carpeta)
    {
        foreach (glob($carpeta . "/*") as $archivos_carpeta) {
            if (is_dir($archivos_carpeta)) {
                $this->rmDir_rf($archivos_carpeta);
            } else {
                unlink($archivos_carpeta);
            }
        }
        rmdir($carpeta);
    }

	//Función para aprobar tickets
    public function aprobar_acta(){
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$uid = $this->input->post('uid');
			$baseFromJavascript7 = $_POST['imagen7'];
            $data7 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript7));
            $filepath7 = "./uploads/firmas/personal/".$uid."7.png";
            file_put_contents($filepath7, $data7);
            $imagenes = array(
            'imagen7' => $filepath7
            );
            $data = array(
				'estatus' => 'aprobada'	,
				'imagenes_firmas_rh' => json_encode($imagenes),
				'tbl_users_idtbl_users_rh' => $this->session->userdata('id')
			);
          $this->db->set($data, $imagenes);
        $this->db->where('uid', $this->input->post('uid'));
        $result = $this->db->update('tbl_actas');
        //return  $result;
		if ($result == true){

			echo json_encode(array(									
				'error' => false,
				'message' => '¡Exito, solicitud aprobada!',	
				'timeout' => '30000',

			  ));

			} else {
			  echo json_encode(array(
				'error' => true,
				'message' => 'Error'
			  ));

        }
	}
    
    }

	 //Cancelar Acta administrativa
	 public function cancelar_acta()
	 {                        
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$uid = $this->input->post('uid');
			$baseFromJavascript7 = $_POST['imagen7'];
            $data7 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript7));
            $filepath7 = "./uploads/firmas/personal/".$uid."7.png";
            file_put_contents($filepath7, $data7);
            $imagenes = array(
            'imagen7' => $filepath7
            );
            $data = array(
				'estatus' => 'cancelada'	,
				'imagenes_firmas_rh' => json_encode($imagenes),
				'tbl_users_idtbl_users_rh' => $this->session->userdata('id')
			);
          $this->db->set($data, $imagenes);
        $this->db->where('uid', $this->input->post('uid'));
        $result = $this->db->update('tbl_actas');

        if ($result == true){

			echo json_encode(array(									
				'error' => false,
				'message' => '¡Exito, solicitud cancelada!',	
				'timeout' => '30000',

			  ));

			} else {
			  echo json_encode(array(
				'error' => true,
				'message' => 'Error'
			  ));

        }
		}
	 }

  //Carga la vista de detalles de las solicitudes de actas
  public function detalle_solicitud($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Detalle Solicitud Acta';
    $datos['clase_pagina'] = 'compras-page';
	$datos['uid'] = $uid;
    $datos['solicitud'] = $this->personal_model->detalle_solicitud($uid);
	
    //$datos['solicitud']->almacen = $datos['solicitud']->tipo_seguridad_e_higiene == 1 ? "Almacen Seguridad e Higiene" : $datos['solicitud']->almacen;
    //$datos['detalle'] = $this->compras_model->detalle_solicitud_catalogo($datos['solicitud']->idtbl_solicitudes_almacen);
    //$datos['catalogo'] = $this->almacen_model->catalogo();
    //$datos['pedidos'] = $this->compras_model->get_pedidos($datos['solicitud']->idtbl_solicitudes_almacen);    
    //foreach ($datos['pedidos'] as $key => $value) {
      //$datos['get_detalle_prod_pedidos'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->compras_model->get_detalle_prod_pedidos($datos['pedidos'][$key]->idtbl_pedidos);
      // $datos['get_detalle_prod_pedidos2'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->pedidos_model->detalle_pedido($datos['pedidos'][$key]->uid); 
    //}
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('personal/detalle_actas', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

	public function mostrarPersonalQuincenal() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$data = array(
			"personalQuincenal" => $this->personal_model->todos_los_usuarios('interno', '', $buscar, $inicio, $cantidad),
			"totalRegistros" => count($this->personal_model->todos_los_usuarios('interno', '', $buscar)),
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	public function mostrarPersonalSemanal() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$data = array(
			"personalSemanal" => $this->personal_model->todos_los_usuarios('interno', 'semanal', $buscar, $inicio, $cantidad),
			"totalRegistros" => count($this->personal_model->todos_los_usuarios('interno', 'semanal', $buscar)),
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	
	//Manda el personal que el perfil en sesión haya hecho solicitudes
	public function mostrarPersonalAsignacion() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$data = array(
			"personalAsignacion" => $this->personal_model->personal_asignacion($buscar, $inicio, $cantidad),
			"totalRegistros" => count($this->personal_model->personal_asignacion($buscar)),
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	public function reportes() {
		if (!($this->permisos > 0))
			redirect(base_url());
		$header['titulo'] = 'Personal';
		$header['clase_pagina'] = 'personal-page';
		$datos['personal'] = $this->personal_model->todos_los_usuarios('interno');
		$datos['establecimientos'] = $this->personal_model->establecimientos();
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/reportes-personal.php', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function ver_bajas() {
		if (!($this->permisos > 0))
			redirect(base_url());
		$header['titulo'] = 'Personal';
		$header['clase_pagina'] = 'personal-page';
		//$datos['personal'] = $this->personal_model->todos_los_usuarios_baja('interno');
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/ver-personal-bajas');
		$this->load->view('plantillas/footer');
	}

	public function mostrarPersonalBaja() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$data = array(
			"personalBaja" => $this->personal_model->todos_los_usuarios_baja('interno', $buscar, $inicio, $cantidad),
			"totalRegistros" => count($this->personal_model->todos_los_usuarios_baja('interno', $buscar)),
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	public function cancelar_contrato() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->cancelar_contrato()) {
				echo json_encode(array('status' => true, 'message' => 'Contrato cancelado correctamente'));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}

	public function contratos_vencidos() {
		if (!($this->permisos > 0))
			redirect(base_url());
		$header['titulo'] = 'Personal';
		$header['clase_pagina'] = 'personal-page';
		/*$datos['personal'] = $this->personal_model->todos_los_usuarios_contrato_vencido('interno');
		foreach($datos['personal'] as $personal) {
			$dias_vencimiento = date_diff( date_create( strftime("%d-%m-%Y",strtotime($personal->fecha_inicio."+ ".$personal->duracion." days") ) ), date_create('now'))->format('%R%a') . " día(s) desde su fecha de vencimiento";
			$array[] = array(
				'uid' => $personal->uid,
				'numero_empleado' => $personal->numero_empleado,
				'numero_empleado_noi' => $personal->numero_empleado_noi,
				'nombres' => $personal->nombres,
				'apellido_paterno' => $personal->apellido_paterno,
				'apellido_materno' => $personal->apellido_materno,
				'departamento' => $personal->departamento,
				'perfil' => $personal->perfil,
				'end_date' => utf8_encode(strftime("%d-%B-%Y",strtotime($personal->end_date))),
				'dias_vencimiento' => $dias_vencimiento
			);
		}*/
		//$array = (object) $array;
		//$datos['personal'] = $array;

		/*$datos['personal_a_vencer'] = $this->personal_model->todos_los_usuarios_proximo_a_vencer('interno');
		foreach($datos['personal_a_vencer'] as $personal) {
			$dias_vencimiento = date_diff( date_create( strftime("%d-%m-%Y",strtotime($personal->fecha_inicio."+ ".$personal->duracion." days") ) ), date_create('now'))->format('%R%a') . " día(s) para su fecha de vencimiento";
			$array2[] = array(
				'uid' => $personal->uid,
				'numero_empleado' => $personal->numero_empleado,
				'numero_empleado_noi' => $personal->numero_empleado_noi,
				'nombres' => $personal->nombres,
				'apellido_paterno' => $personal->apellido_paterno,
				'apellido_materno' => $personal->apellido_materno,
				'departamento' => $personal->departamento,
				'perfil' => $personal->perfil,
				'end_date' => utf8_encode(strftime("%d-%B-%Y",strtotime($personal->end_date))),
				'dias_vencimiento' => $dias_vencimiento
			);
		}
		$datos['personal_a_vencer'] = $array2;*/
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/ver-contratos-vencidos');
		$this->load->view('plantillas/footer');
	}

	public function mostrarContratosProximosVencer() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$datos['personal_a_vencer'] = $this->personal_model->todos_los_usuarios_proximo_a_vencer('interno', $buscar, $inicio, $cantidad);
		$totalRegistros = count($this->personal_model->todos_los_usuarios_proximo_a_vencer('interno', $buscar));
		foreach ($datos['personal_a_vencer'] as $personal) {
			$dias_vencimiento = date_diff(date_create(strftime("%d-%m-%Y", strtotime($personal->fecha_inicio . "+ " . $personal->duracion . " days"))), date_create('now'))->format('%R%a') . " día(s) para su fecha de vencimiento";
			$array2[] = array(
				'uid' => $personal->uid,
				'numero_empleado' => $personal->numero_empleado,
				'numero_empleado_noi' => $personal->numero_empleado_noi,
				'nombres' => $personal->nombres,
				'empresa' => $personal->empresa,
				'apellido_paterno' => $personal->apellido_paterno,
				'apellido_materno' => $personal->apellido_materno,
				'departamento' => $personal->departamento,
				'perfil' => $personal->perfil,
				'end_date' => utf8_encode(strftime("%d-%B-%Y", strtotime($personal->end_date))),
				'dias_vencimiento' => $dias_vencimiento
			);
		}
		$datos['personal_a_vencer'] = $array2;
		$data = array(
			"contratosProximosVencer" => $array2,
			"totalRegistros" => $totalRegistros,
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	public function mostrarContratosVencidos() {
		//valor a buscar
		$buscar = $this->input->post('buscar');
		$numeroPagina = $this->input->post('nropagina');
		$cantidad = 10;
		$inicio = ($numeroPagina - 1) * $cantidad;
		$datos['personal'] = $this->personal_model->todos_los_usuarios_contrato_vencido('interno', $buscar, $inicio, $cantidad);
		$totalRegistros = count($this->personal_model->todos_los_usuarios_contrato_vencido('interno', $buscar));
		foreach ($datos['personal'] as $personal) {
			$dias_vencimiento = date_diff(date_create(strftime("%d-%m-%Y", strtotime($personal->fecha_inicio . "+ " . $personal->duracion . " days"))), date_create('now'))->format('%R%a') . " día(s) desde su fecha de vencimiento";
			$array[] = array(
				'uid' => $personal->uid,
				'numero_empleado' => $personal->numero_empleado,
				'numero_empleado_noi' => $personal->numero_empleado_noi,
				'nombres' => $personal->nombres,
				'empresa' => $personal->empresa,
				'apellido_paterno' => $personal->apellido_paterno,
				'apellido_materno' => $personal->apellido_materno,
				'departamento' => $personal->departamento,
				'perfil' => $personal->perfil,
				'end_date' => utf8_encode(strftime("%d-%B-%Y", strtotime($personal->end_date))),
				'dias_vencimiento' => $dias_vencimiento
			);
		}
		$datos['personal'] = $array;
		$data = array(
			"contratosVencidos" => $array,
			"totalRegistros" => $totalRegistros,
			"cantidad" => $cantidad
		);
		echo json_encode($data);
	}

	public function detalle_baja($uid) {
		if (!($this->permisos > 0))
			redirect(base_url());
		$this->load->model('almacen_model');
		$header['clase_pagina'] = 'personal-page';
		$header['titulo'] = 'Detalle Bajas Personal';
		$datos['detalle'] = $this->personal_model->detalle_bajas($uid);				
		$this->load->view('plantillas/header', $header);
		$this->load->view('personal/detalle-personal-baja', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function detalle_usuario($uid) {
		if (!($this->permisos > 0) && !($this->permisos_asignacion > 0))
			redirect(base_url());
		$this->load->model('almacen_model');
		$this->load->model('controlvehicular_model');
		$this->load->model('sistemas_model');
		$this->load->model('curso_model');
		$header['titulo'] = 'Detalle Personal';
		$header['clase_pagina'] = 'personal-page';
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
		$datos['editar'] = $this->personal_model->editarBaja($uid);		
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/detalle-personal', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function editarBaja() {
		if($this->session->userdata('logueado')) {
			$data['titulo'] = "Login";
			header('Location:' . base_url());
		}
		else {        
			$id_nota = isset($_POST['id_nota']) ? $_POST['id_nota'] : $_GET['id'];
			$data['datos_usuario'] = $this->LoginModel->getUserById($this->session->userdata('id_usuario'));        			                   			
			$data['editar'] = $this->BlogModel->getEditar($id_nota);
			$data['last_mensajes'] = $this->MensajeModel->getLastMensajes();
			$data['newUsers'] = $this->NotificacionModel->getNewUsers();
			$data['titulo'] = "Edición de Nota";
			$this->load->view('layout/header',$data);
			$this->load->view('layout/left-sidebar');
			$this->load->view('layout/navbar');
			$this->load->view('editar_nota');
			$this->load->view('layout/footer');
		}
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

	public function justificacion_asignaciones_rh(){
		$this->load->model('almacen_model');
		$header['titulo'] = 'Justificación Asignaciones RH';
		$header['clase_pagina'] = 'personal-page';
		
		//$datos['asignaciones'] = $this->almacen_model->asignaciones_personal($uid);
		$datos['asignacionesAG'] = $this->almacen_model->asignaciones_personalAG(null, null, null, true);
		
		$datos['asignacionesActivas'] = $this->almacen_model->asignaciones_personalAG(null, null, null, true);
		$datos['activofijo'] = $this->almacen_model->asignaciones_personalAG(null, [7,16], "equal", true);
		$datos['asignacionesUniformes'] = $this->almacen_model->asignaciones_personalAG(null, [13], "equal", true);
		$datos['asignacionesEPP'] = $this->almacen_model->asignaciones_personalAG(null, [4], "equal", true);
		$datos['asignacionesConsumibles'] = $this->almacen_model->asignaciones_personalAG(null, [4,10,13], "diff", true);
		$datos['asignacionesAC'] = $this->almacen_model->asignaciones_personalAC(null, true);
		$datos['asignacionesKualiT'] = $this->almacen_model->asignaciones_personalKuali(null, true);
		$datos['asignacionesAreaMedica'] = $this->almacen_model->asignaciones_personalAreaMedica(null, true);
		$datos['asignacionesEHS'] = $this->almacen_model->asignaciones_personalEHS(null, true);
		$datos['asignacionesAutosControlVehicular'] = $this->almacen_model->asignaciones_autosControlVehicular(null, true);
		$datos['asignacionesRefaccionesControlVehicular'] = $this->almacen_model->asignaciones_refaccionesControlVehicular(null, true);
		$datos['asignacionesSistemas'] = $this->almacen_model->asignaciones_sistemas(null, true);

		$datos['precio_dolar'] = $this->precio_actual_dolar();
		
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('almacen/justificacion-asignaciones-rh', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function impAsignacionesAC($uid) {
		if (!($this->permisos > 0))
			redirect(base_url());
		$this->load->model('almacen_model');
		$header['titulo'] = 'Listado Asignaciones';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
		$datos['detalle']->uid_usuario = $uid;
		$datos['asignacionesAC'] = $this->almacen_model->asignaciones_personalAC($uid);
		$datos['precio_dolar'] = $this->precio_actual_dolar();
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
		$this->load->view('plantillas/header', $header);
		$this->load->view('personal/asignaciones-alto-costo', $datos);
	}

	public function impAsignacionesAreaMedica($uid) {
		if (!($this->permisos > 0))
			redirect(base_url());
		$this->load->model('almacen_model');
		$header['titulo'] = 'Listado Asignaciones';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
		$datos['detalle']->uid_usuario = $uid;
		$datos['asignacionesAreaMedica'] = $this->almacen_model->asignaciones_personalAreaMedica($uid);
		$datos['precio_dolar'] = $this->precio_actual_dolar();
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
		$this->load->view('plantillas/header', $header);
		$this->load->view('personal/asignaciones-area-medica', $datos);
	}

	public function nuevo() {
		if (!($this->permisos > 1))
			redirect(base_url());
		$this->load->model('proyectos_model');
		$header['titulo'] = 'Nuevo Personal';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['departamentos'] = $this->departamentos_model->departamentos();
		$datos['estados'] = $this->estados_model->estados();
		$datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
		$datos['escolaridad'] = $this->departamentos_model->escolaridad();
		$datos['patrones'] = $this->personal_model->patrones();
		$datos['fuente_empleos'] = $this->personal_model->fuente_empleos();
		$datos['establecimientos'] = $this->personal_model->establecimientos();
		$datos['documentos'] = $this->personal_model->documentos_catalogo();
		$datos['cursos'] = $this->personal_model->cursos();
		$datos['ocupaciones'] = $this->personal_model->ocupaciones();
		$datos['estudios'] = $this->personal_model->estudios();
		$datos['documentos_probatorios'] = $this->personal_model->documentos_probatorios();
		$datos['instituciones'] = $this->personal_model->instituciones();
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/nuevo-personal', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function eliminar($tipo, $uid_usuario, $uid_archivo, $token) {
		if ($token && $token == $this->session->userdata('token')) {
			if ($this->personal_model->eliminar($tipo, $uid_archivo)) {
				$this->session->set_flashdata('exito', 'Actualización exitosa.');
				redirect(base_url() . 'personal/detalle/' . $uid_usuario);
			} else {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
				redirect(base_url() . 'personal/detalle/' . $uid_usuario);
			}
		} else {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
			redirect(base_url() . 'personal/detalle/' . $uid_usuario);
		}
	}

	public function nuevo_documento() {
		if (!($this->permisos > 2) && $this->session->userdata('tipo') != 1) {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
			redirect(base_url() . $this->input->post('from'));
		}
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$carpeta = './uploads/' . $this->input->post('uid_usuario');
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$carpeta = './uploads/' . $this->input->post('uid_usuario') . '/documentos';
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->form_validation->set_rules('id', 'tipo de documento', 'required|trim|min_length[1]|max_length[3]');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
			$uid = uniqid();
			if ($this->personal_model->guardar_documento($uid)) {
				$this->load->library('upload');
				$urlimg = $carpeta . '/';
				$config['file_name'] = $uid;
				$config['upload_path'] = $urlimg;
				$config['allowed_types'] = 'pdf';
				$config['overwrite'] = TRUE;
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('archivo')) {
					$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('error', $error);
					redirect(base_url() . $this->input->post('from'));
				} else {
					$this->session->set_flashdata('exito', 'Registro exitoso');
					redirect(base_url() . $this->input->post('from'));
				}
			} else {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
		} else {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
			redirect(base_url() . $this->input->post('from'));
		}
	}

	public function editar_documento(){
		$carpeta = './uploads/' . $this->input->post('uid_usuario') . '/documentos';
		$this->load->library('upload');
		$urlimg = $carpeta . '/';
		$config['file_name'] = $this->input->post('uid_documento');
		$config['upload_path'] = $urlimg;
		$config['allowed_types'] = 'pdf';
		$config['overwrite'] = TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('archivo')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('error', $error);
			redirect(base_url() . $this->input->post('from'));
		} else {
			$this->session->set_flashdata('exito', 'Registro exitoso');
			redirect(base_url() . $this->input->post('from'));
		}

	}

	public function nuevo_certificado() {
		if (!($this->permisos >= 1) && $this->session->userdata('tipo') != 1) {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
			redirect(base_url() . $this->input->post('from'));
		}
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			/*$carpeta = './uploads/'.$this->input->post('uid_usuario');
 			if (!file_exists($carpeta)) {
 				mkdir($carpeta, 0755, true);
 			}
 			$carpeta = './uploads/'.$this->input->post('uid_usuario').'/certificados';
 			if (!file_exists($carpeta)) {
 				mkdir($carpeta, 0755, true);
 			}*/
			$this->form_validation->set_rules('id', 'tipo de documento', 'trim|min_length[1]|max_length[3]');
			$this->form_validation->set_rules('fecha_inicio', 'fecha de inicio', 'required|trim');
			$this->form_validation->set_rules('fecha_termino', 'fecha de termino', 'required|trim');
			$this->form_validation->set_rules('duracion', 'duración', 'required|trim');
			$this->form_validation->set_rules('tutor', 'instructor', 'required|trim');
			$this->form_validation->set_rules('patron_representante', 'Patron/Representante', 'required|trim');
			$this->form_validation->set_rules('representante_trabajadores', 'Representante de Trabajadores', 'required|trim');
			//$this->form_validation->set_rules('folio', 'folio', 'trim');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Datos incorrectos, intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
			$uid = uniqid();
			if ($this->personal_model->guardar_certificado($uid)) {
				$this->session->set_flashdata('exito', 'Registro exitoso');
				redirect(base_url() . $this->input->post('from'));
				/*$this->load->library('upload');
 				$urlimg = $carpeta.'/';
 				$config['file_name']=$uid;
 				$config['upload_path'] = $urlimg;
 				$config['allowed_types'] = 'pdf';
 				$config['overwrite']=TRUE;
 				$this->upload->initialize($config);
 				if ( ! $this->upload->do_upload('archivo')) {
        	        $error = array('error' => $this->upload->display_errors());
        	        $this->session->set_flashdata('error',$error);
					redirect(base_url().$this->input->post('from'));
            	}
            	else {
        	        $this->session->set_flashdata('exito','Registro exitoso');
					redirect(base_url().$this->input->post('from'));
				}*/
			} else {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
		} else {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
			redirect(base_url() . $this->input->post('from'));
		}
	}

	public function editar_certificado(){
		if (!($this->permisos > 0) && $this->session->userdata('tipo') != 1) {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
			redirect(base_url() . $this->input->post('from'));
		}
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->form_validation->set_rules('id', 'tipo de documento', 'trim|min_length[1]|max_length[3]');
			$this->form_validation->set_rules('fecha_inicio', 'fecha de inicio', 'required|trim');
			$this->form_validation->set_rules('fecha_termino', 'fecha de termino', 'required|trim');
			$this->form_validation->set_rules('duracion', 'duración', 'required|trim');
			$this->form_validation->set_rules('tutor', 'instructor', 'required|trim');
			//$this->form_validation->set_rules('folio', 'folio', 'trim');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Datos incorrectos, intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
			$uid = uniqid();
			if ($this->personal_model->editar_certificado()) {
				$this->session->set_flashdata('exito', 'Registro exitoso');
				redirect(base_url() . $this->input->post('from'));
			} else {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
		} else {
			$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
			redirect(base_url() . $this->input->post('from'));
		}
	}

	public function guardar_personal() {
		if (!($this->permisos > 1))
			redirect(base_url());
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->form_validation->set_rules('numero_empleado', 'número empleado', 'required|trim|min_length[1]|max_length[9]|is_unique[tbl_usuarios.numero_empleado]');
			$this->form_validation->set_rules('nombres', 'nombres', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('apellido_paterno', 'apellido paterno', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('apellido_materno', 'apellido materno', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('sexo', 'sexo', 'required|trim|min_length[8]|max_length[9]');
			$this->form_validation->set_rules('pago', 'tipo de pago', 'required|trim|min_length[1]|max_length[9]');
			$this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[13]|max_length[13]');
			$this->form_validation->set_rules('curp', 'CURP', 'required|trim|min_length[18]|max_length[18]');
			$this->form_validation->set_rules('nss', 'NSS', 'required|trim|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'required|trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('fecha_ingreso', 'fecha de ingreso', 'required|trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('ctl_escolaridad_idctl_escolaridad', 'grado de estudios', 'required|trim');
			$this->form_validation->set_rules('estudios', 'estudios', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('clave_elector', 'clave de elector', 'required|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('calle', 'calle', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('numero', 'numero', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('colonia', 'colonia', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('cp', 'código postal', 'required|trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('estado_civil', 'estado civil', 'required|trim|min_length[5]|max_length[11]');
			$this->form_validation->set_rules('infonavit', 'infonavit', 'required|trim|min_length[2]|max_length[2]');
			$this->form_validation->set_rules('tipo_nomina', 'tipo de nomina', 'required|trim|min_length[1]|max_length[1]');
			$this->form_validation->set_rules('telefono_emergencia', 'teléfono de emergencia', 'required|trim|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('persona_contacto', 'persona de contacto', 'required|trim|min_length[1]|max_length[150]');
			//lanzamos mensajes de error si es que los hay
			if ($this->form_validation->run() == FALSE) {
				echo '<div class="hidden">';
				//var_dump(validation_errors());
				echo '</div>';
				$this->nuevo();
			} else {
				if($this->personal_model->checkCurp() == true){
					$this->session->set_flashdata('error', 'El usuario ya esta dado de alta');
					$this->nuevo();
					return;
				}
				$this->load->model('root_model');
				$this->load->library('upload');
				$uid = uniqid();
				$result = $this->personal_model->guardar_personal($uid, 'interno');
				//$pass = $this->passwords();
      			//$check_user = $this->root_model->nuevo_usuario_general($pass);
				if ($result["success"]) {
					/*$this->load->config('email');
                	$this->load->library('email');
                
                	$email = $_POST['email_personal'];
				
                    $from = $this->config->item('smtp_user');
                    $to = $email;
                    $subject = 'Accesos sistema EstevezJor';
                    $message = "Bienvenido a EstevezJor, el proposito de este correo es que tengas los accesos al sistema, en caso de alguna duda conctactar a tu jefe inmediato \r\n Usuario: ".$_POST['email_personal']. "\r\n Contraseña: ". $pass;                    
                    $this->email->set_newline("\r\n");
                    $this->email->from($from);
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $enviado = $this->email->send();  */
                
					$idtbl_usuarios = $result["id"];
					$carpeta = './uploads/' . $uid . '/documentos';
					if (!file_exists($carpeta)) {
						mkdir($carpeta, 0755, true);
					}
					foreach ($_FILES as $key => $value) {
						$file_uid = uniqid();
						if($value['name'] != ""){
							$urlimg = $carpeta . '/';
							$config['file_name'] = $file_uid;
							$config['upload_path'] = $urlimg;
							$config['allowed_types'] = 'pdf';
							$config['overwrite'] = TRUE;
							$this->upload->initialize($config);
							if($this->upload->do_upload($key)){
								$this->personal_model->guardar_documento($file_uid, $key, $uid);
							}
						}
					}
                    if (isset($_POST['cursos'])) {
                        foreach ($this->input->post("cursos") as $value) {
                            $uid_curso = uniqid();
                            $parameters = array(
                          'tbl_cursos_idtbl_cursos' => $value,
                          'tbl_usuarios_idtbl_usuarios' => $idtbl_usuarios
                        );
                            $this->personal_model->guardar_certificado($uid_curso, $parameters);
                        }
                    }
					$this->personal_model->log($this->session->userdata('nombre') . ' creó al usuario "' . $this->input->post('nombres') . '"', 'personal/detalle/' . $uid);
					$this->session->set_flashdata('exito', 'Registro exitoso');
					redirect(base_url() . 'personal/detalle/' . $uid);
				} else {
					$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente ' . $resultad["message"]);
					$this->nuevo();
				}
			}
		} else {
			redirect(base_url());
		}
	}

	public function nueva_requisicion() {
		if (!($this->permisos > 1))
			redirect(base_url());
		$this->load->model('proyectos_model');
		$header['titulo'] = 'Nueva Requisición';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['departamentos'] = $this->departamentos_model->departamentos();
		$datos['motivo_vacante'] = $this->departamentos_model->motivos_vacantes();
		$datos['escolaridad'] = $this->departamentos_model->escolaridad();
		$datos['estados'] = $this->estados_model->estados();
		$datos['numero_personal'] = $this->personal_model->numero_personal();
		$datos['nuevos_personal'] = $this->personal_model->nuevos_personal();
		$datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
		$datos['contratos'] = $this->personal_model->contratos();
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/nueva-requisicion', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function guardar_requisicion() {
		if (!($this->permisos > 1))
			redirect(base_url());
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->form_validation->set_rules('tipo_requisicion', 'tipo de requisicion', 'required|trim');
			$this->form_validation->set_rules('departamento', 'departamento', 'required|trim');
			$this->form_validation->set_rules('numero_vacantes', 'número de vacantes', 'required|trim|numeric');
			$this->form_validation->set_rules('sueldo', 'sueldo mensual', 'required|trim');
			$this->form_validation->set_rules('tipo_pago', 'tipo de pago', 'required|trim|min_length[1]|max_length[1]');
			$this->form_validation->set_rules('tipo_contrato', 'tipo de contrato', 'required|trim');
			$this->form_validation->set_rules('horario', 'horario de jornada laboral', 'required|trim');
			$this->form_validation->set_rules('imss', 'IMSS', 'required|trim|min_length[1]|max_length[1]');
			$this->form_validation->set_rules('proyecto', 'proyecto', 'required|trim|numeric');
			//lanzamos mensajes de error si es que los hay
			if ($this->form_validation->run() == FALSE) {
				$this->nueva_requisicion();
			} else {
				$uid = uniqid();
				if ($this->personal_model->guardar_requisicion($uid)) {
					$id = $this->personal_model->log($this->session->userdata('nombre') . ' creó requisición con UID: "' . $uid . '"', null, ID_DEPARTAMENTO_DIRECCION, 'personal/revisar-requisicion/' . $uid);
					$this->session->set_flashdata('exito', 'Requisición enviada correctamente.');
					$this->session->set_flashdata(
						'socket',
						array(
							'tipo' => 'departamento',
							'destinatario' => 10,
							'mensaje' => $this->session->userdata('nombre') . ' creó requisición con UID: "' . $uid . '"',
							'link' => 'personal/revisar-requisicion/' . $uid . '?ref=' . $id
						)
					);
					redirect(base_url() . 'personal/requisiciones');
				} else {
					$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
					$this->nuevo();
				}
			}
		} else {
			redirect(base_url());
		}
	}

	public function ver_requisiciones() {
		if (!($this->permisos > 0))
			redirect(base_url());
		$this->load->model('proyectos_model');
		$header['titulo'] = 'Listado Requisición';
		$header['clase_pagina'] = 'personal-page';
		$datos['numero'] = $this->personal_model->num_requisiciones();
		$datos['todo'] = $this->personal_model->get_requisiciones();
		$datos['nuevas'] = $this->personal_model->nuevas_requisiciones();
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/listado-requisicion', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	public function revisar_requisicion($uid) {
		if (!($this->permisos > 0))
			redirect(base_url());
		$this->load->model('proyectos_model');
		$header['titulo'] = 'Revisar Requisición';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['requisicion'] = $this->personal_model->get_requisicion($uid);
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/revisar-requisicion', $datos);
		$this->load->view('plantillas/footer', $datos);
	}


	public function actualizar_requisicion() {
		if (!($this->permisos > 2))
			redirect(base_url());
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->form_validation->set_rules('numero_vacantes', 'número de vacantes', 'required|trim|numeric');
			$this->form_validation->set_rules('sueldo', 'sueldo mensual', 'required|trim');
			//lanzamos mensajes de error si es que los hay
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
				redirect(base_url() . 'personal/revisar-requisicion/' . $this->input->post('uid-requisicion'));
			} else {
				$uid = uniqid();
				$this->load->model('vacantes_model');
				if ($this->input->post('aprobar')) {
					$estatus = 1;
					$vacante = $this->vacantes_model->nueva_vacante($uid);
				} else {
					$estatus = 3;
					$vacante = true;
				}
				if ($this->personal_model->actualizar_requisicion($estatus)) {
					if ($vacante) {
						if ($estatus == 1) {
							$id = $this->personal_model->log($this->session->userdata('nombre') . ' creó vacante con UID: "' . $uid . '"', null, ID_DEPARTAMENTO_RH, 'vacantes/detalle-vacante/' . $uid);
							$this->session->set_flashdata('exito', 'Requisición actualizada correctamente.');
							$this->session->set_flashdata(
								'socket',
								array(
									'tipo' => 'departamento',
									'destinatario' => ID_DEPARTAMENTO_RH,
									'mensaje' => $this->session->userdata('nombre') . ' creó vacante con UID: "' . $uid . '"',
									'link' => 'vacantes/detalle-vacante/' . $uid . '?ref=' . $id
								)
							);
							redirect(base_url() . 'personal/requisiciones');
						} else {
							$this->session->set_flashdata('exito', 'Requisición actualizada correctamente.');
							$this->session->set_flashdata(
								'socket',
								array(
									'tipo' => 'usuario',
									'destinatario' => $this->input->post('autor'),
									'mensaje' => $this->session->userdata('nombre') . ' actualizo requisición con UID: "' . $this->input->post('uid-requisicion') . '"',
									'link' => 'personal/revisar-requisicion/' . $this->input->post('uid-requisicion') . '?ref=' . $this->input->post('idtbl_requisiciones')
								)
							);
							redirect(base_url() . 'personal/requisiciones');
						}
					} else {
						$this->session->set_flashdata('error', 'Ocurrio un error al crear vacante.');
						redirect(base_url() . 'personal/revisar-requisicion/' . $this->input->post('uid-requisicion'));
					}
				} else {
					$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente');
					redirect(base_url() . 'personal/revisar-requisicion/' . $this->input->post('uid-requisicion'));
				}
			}
		} else {
			redirect(base_url() . 'personal/revisar-requisicion/' . $this->input->post('uid-requisicion'));
		}
	}

	public function token() {
		$token = md5(uniqid(rand(), true));
		$this->session->set_userdata('token', $token);
		return $token;
	}

	public function perfil() {
		$header['titulo'] = 'Perfil';
		$header['clase_pagina'] = 'perfil-page';
		$datos['usuario'] = $this->personal_model->datos_perfil();
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/perfil', $datos);
		$this->load->view('plantillas/footer');
	}
	public function cargar_archivo() {
		if (!($this->permisos > 2))
			echo json_encode(array('status' => false));
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$carpeta = './uploads/' . $this->input->post('uid_usuario');
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$carpeta = './uploads/' . $this->input->post('uid_usuario') . '/' . $this->input->post('tipo');
			if (!file_exists($carpeta)) {
				mkdir($carpeta, 0755, true);
			}
			$this->load->library('upload');
			$urlimg = $carpeta . '/';
			$config['file_name'] = $this->input->post('uid');
			$config['upload_path'] = $urlimg;
			$config['allowed_types'] = 'pdf';
			$config['overwrite'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('archivo')) {
				$error = array('error' => $this->upload->display_errors());
				echo json_encode(array('status' => false, 'message' => $error));
			} else {
				$this->session->set_flashdata('exito', 'Documento guardado correctamente.');
				echo json_encode(array('status' => true));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error con el token'));
	}

	public function actualizar_foto() {
		$this->form_validation->set_rules('x', 'Display Image', 'required|trim');
		$this->form_validation->set_rules('y', 'Display Image', 'required|trim');
		$this->form_validation->set_rules('x2', 'Display Image', 'required|trim');
		$this->form_validation->set_rules('y2', 'Display Image', 'required|trim');
		$this->form_validation->set_rules('w', 'Display Image', 'required|trim');
		$this->form_validation->set_rules('h', 'Display Image', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			echo json_encode(array('status' => false, 'message' => 'No has seleccionado un área.'));
		} else {
			$x = $this->input->post('x');
			$y = $this->input->post('y');
			$x2 = $this->input->post('x2');
			$y2 = $this->input->post('y2');
			$w = $this->input->post('w');
			$h = $this->input->post('h');
			$this->load->library('upload');
			if ($this->input->post('from') == 'usuario') {
				$carpeta = './uploads/' . $this->input->post('uid');
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0755, true);
				}
				$urlimg = './uploads/' . $this->input->post('uid') . '/';
				$config['file_name'] = $this->input->post('uid') . '-img-credencial.jpg';
			} else {
				$carpeta = './uploads/' . $this->session->userdata('id');
				if (!file_exists($carpeta)) {
					mkdir($carpeta, 0755, true);
				}
				$urlimg = './uploads/' . $this->session->userdata('id') . '/';
				$config['file_name'] = $this->session->userdata('id') . '-img';
			}			
			$config['upload_path'] = $urlimg;
			$config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG';
			//$config['max_size'] = '2048';
			$config['overwrite'] = TRUE;
			# Initialize you Configuration.
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {								
				echo json_encode(array('status' => false, 'message' => $this->upload->display_errors()));
			} else {
				if ($x == "" || ($w == 0 && $h == 0)) {
					# If user didn't crop image.
					echo json_encode(array('status' => false, 'message' => 'No has seleccionado un area'));
				} else {
					# If user cropped image.
					$uploaded_image = $this->upload->data();
					$file_path = $uploaded_image['file_path'];
					$file_name = $uploaded_image['file_name'];
					$full_path = $uploaded_image['full_path'];
					$quality = 90;
					$targ_w = $w;
					$targ_h = $h;
					# Returns an image identifier representing a black image of width $targ_w and height $targ_h.
					$dst_r = imagecreatetruecolor($targ_w, $targ_h);
					# Check extesnion of image and call appropriate method.
					$what = getimagesize($urlimg . $file_name);
					$img_r = imagecreatefromjpeg($urlimg . $file_name);
					imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					# Generates a jpeg.
                    if (imagejpeg($dst_r, $full_path, $quality)) {						
                        echo json_encode(array('status' => true));
                    }
					else{						
                        echo json_encode(array('status' => false, 'message' => 'Error al cargar imagen'));
                    }
				}
			} // imagen tipos
		} //primeros campos
	}

	public function nueva_acta() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->guardar_acta()) {
				$this->session->set_flashdata('exito', 'Acta administrativa creada correctamente.');
				$this->personal_model->log($this->session->userdata('nombre') . ' creó nueva acta administrativa', 'personal/detalle/' . $this->input->post('uid'));
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}

	public function vacaciones() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->guardar_vacaciones()) {
				$this->session->set_flashdata('exito', 'Información guardada exitosamente.');
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}

	public function cancelar_vacaciones() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->cancelar_vacaciones()) {
				echo json_encode(array('status' => true, 'message' => 'Vacaciones canceladas correctamente'));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else {
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
		}
	}

	public function justificar_descontar() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->justificar_descontar()) {
				$this->session->set_flashdata('exito', 'Información guardada exitosamente.');
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}

	public function permiso() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->guardar_permiso()) {
				$this->session->set_flashdata('exito', 'Información guardada exitosamente.');
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}

	public function incapacidades() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->guardar_incapacidad()) {
				$this->session->set_flashdata('exito', 'Información guardada exitosamente.');
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
	}


	public function certificados($uid) {
		$header['titulo'] = 'Certificados';
		$header['clase_pagina'] = 'certificados-page';
		$datos['token'] = $this->token();
		$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
		$datos['detalle']->uid_usuario = $uid;
		$datos['actas'] = $this->personal_model->actas($uid);
		//$datos['certificados'] = $this->personal_model->certificados($uid);
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/certificados', $datos);
		$this->load->view('plantillas/footer');
	}

	public function editar($uid) {
		if (!($this->permisos > 2) && ($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('tipo') != 21 && $this->session->userdata('tipo') != 3))
			redirect(base_url());
		$this->load->model('proyectos_model');
		$header['titulo'] = 'Editar Personal';
		$header['clase_pagina'] = 'personal-page';
		$datos['token'] = $this->token();
		$datos['detalle'] = $this->personal_model->detalle_usuario($uid);
		$datos['detalle']->uid_usuario = $uid;
		$datos['departamentos'] = $this->departamentos_model->departamentos($datos['detalle']->establecimiento);
		$datos['direcciones'] = $this->departamentos_model->direcciones($datos['detalle']->establecimiento);
		$datos['estados'] = $this->estados_model->estados();
		$datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
		$datos['escolaridad'] = $this->departamentos_model->escolaridad();
		$datos['fuente_empleos'] = $this->personal_model->fuente_empleos();
		$datos['ocupaciones'] = $this->personal_model->ocupaciones();
		$datos['estudios'] = $this->personal_model->estudios();
		$datos['documentos'] = $this->personal_model->documentos_probatorios();
		$datos['instituciones'] = $this->personal_model->instituciones();
		if ($datos['detalle']->idtbl_entidad != NULL)
			$datos['municipios'] = $this->estados_model->municipios($datos['detalle']->idtbl_entidad);
		if ($datos['detalle']->idtbl_direcciones != NULL)
			$datos['areaDireccion'] = $this->departamentos_model->catalogo_areas_por_direccion($datos['detalle']->idtbl_direcciones);
		if ($datos['detalle']->idtbl_areas != NULL)
			$datos['departamentoArea'] = $this->departamentos_model->catalogo_departamentos_por_area($datos['detalle']->idtbl_areas);
		if ($datos['detalle']->idtbl_departamentos != NULL)
			$datos['perfilDepa'] = $this->departamentos_model->catalogo_perfiles_por_departamento($datos['detalle']->idtbl_departamentos);
		$datos['patrones'] = $this->personal_model->patrones();
		if ($datos['detalle']->idtbl_empresas != NULL)
			$datos['contratos'] = $this->personal_model->tipcontratos($datos['detalle']->idtbl_empresas);
		$datos['establecimientos'] = $this->personal_model->establecimientos();
		//if($datos['detalle']->idtbl_departamentos!=NULL)
		//	$datos['perfilDepa']=$this->departamentos_model->perfiles_por_departamento($datos['detalle']->idtbl_departamentos);
		$this->load->view('plantillas/header', $header);
		$this->load->view('plantillas/menu');
		$this->load->view('personal/editar-personal', $datos);
		$this->load->view('plantillas/footer'); # code...
	}


	public function obtener_contratos() {
		if ($this->input->post('patron')) {
			$check_user = $this->personal_model->tipcontratos($this->input->post('patron'));
			if ($check_user)
				echo json_encode(array($check_user));
			else
				echo json_encode(array('error' => "Error en consulta."));
		} else {
			echo json_encode(array('error' => "Error en POST."));
		}
	}

	public function actualizar_personal() {
		if (!($this->permisos > 2) && ($this->session->userdata('tipo') != 17 && $this->session->userdata('tipo') != 19 && $this->session->userdata('tipo') != 21))
			redirect(base_url());
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$this->load->helper('unique');
			$this->form_validation->set_rules('numero_empleado', 'número empleado', 'required|trim|min_length[1]|max_length[9]|unique[tbl_usuarios.numero_empleado_noi,tbl_usuarios.uid]');
			//$this->form_validation->set_rules('numero_empleado_noi', 'número empleado en NOI', 'unique[tbl_usuarios.numero_empleado_noi,tbl_usuarios.uid]');
			$this->form_validation->set_rules('nombres', 'nombres', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('apellido_paterno', 'apellido paterno', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('apellido_materno', 'apellido materno', 'required|trim|min_length[1]|max_length[100]');
			$this->form_validation->set_rules('sexo', 'sexo', 'required|trim|min_length[8]|max_length[9]');
			$this->form_validation->set_rules('rfc', 'RFC', 'required|trim|min_length[13]|max_length[13]');
			$this->form_validation->set_rules('curp', 'CURP', 'required|trim|min_length[18]|max_length[18]');
			$this->form_validation->set_rules('nss', 'NSS', 'required|trim|min_length[11]|max_length[11]');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha de nacimiento', 'required|trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('fecha_ingreso', 'fecha de ingreso', 'required|trim|min_length[8]|max_length[10]');
			$this->form_validation->set_rules('nacionalidad', 'nacionalidad', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('ctl_escolaridad_idctl_escolaridad', 'grado de estudios', 'required|trim');
			$this->form_validation->set_rules('estudios', 'estudios', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('clave_elector', 'clave de elector', 'required|trim|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('calle', 'calle', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('numero', 'numero', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('colonia', 'colonia', 'required|trim|min_length[1]|max_length[150]');
			$this->form_validation->set_rules('cp', 'código postal', 'required|trim|min_length[1]|max_length[10]');
			$this->form_validation->set_rules('estado_civil', 'estado civil', 'required|trim|min_length[6]|max_length[11]');
			$this->form_validation->set_rules('infonavit', 'infonavit', 'required|trim|min_length[2]|max_length[2]');
			$this->form_validation->set_rules('tipo_nomina', 'tipo de nomina', 'required|trim|min_length[1]|max_length[1]');
			$this->form_validation->set_rules('telefono_emergencia', 'teléfono de emergencia', 'required|trim|min_length[8]|max_length[20]');
			$this->form_validation->set_rules('persona_contacto', 'persona de contacto', 'required|trim|min_length[1]|max_length[150]');
			//lanzamos mensajes de error si es que los hay
			if ($this->form_validation->run() == FALSE) {
				$this->editar($this->input->post('uid'));
			} else {
				$uid = $this->input->post('uid');
				if ($this->personal_model->actualizar_usuario($uid)) {
					$this->personal_model->log($this->session->userdata('nombre') . ' actualizó al usuario "' . $this->input->post('nombres') . '"', 'personal/detalle/' . $uid);
					$this->session->set_flashdata('exito', 'Actualización exitosa.');
					redirect(base_url() . 'personal/detalle/' . $this->input->post('uid'));
				} else {
					$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente.');
					redirect(base_url() . 'personal/editar/' . $this->input->post('uid'));
				}
			}
		} else {
			redirect(base_url());
		}
	}

	public function baja() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->baja_personal()) {
				$uid = $this->input->post('uid');
				$this->personal_model->log($this->session->userdata('nombre') . ' dio de baja al usuario "' . $this->input->post('nombre') . '"', 'personal/detalle/' . $uid);
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else {
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
		}
	}
/*EDITAR BAJA*/
	public function bajaEdit() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->updateBaja()) {
				$uid = $this->input->post('uid');
				$this->personal_model->log($this->session->userdata('nombre') . ' dio de baja al usuario "' . $this->input->post('nombre') . '"', 'personal/detalle/' . $uid);
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else {
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
		}
	}

	public function alta() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$uid = $this->input->post('uid');
			if ($this->personal_model->alta_personal($uid)) {
				$this->personal_model->log($this->session->userdata('nombre') . ' dio de alta al usuario "' . $this->input->post('nombre') . '"', 'personal/detalle/' . $uid);
				echo json_encode(array('status' => true));
			} else {
				echo json_encode(array('status' => false, 'message' => 'Ocurrio un error intente nuevamente'));
			}
		} else {
			echo json_encode(array('status' => false, 'message' => 'Error: Token incorrecto.'));
		}
	}

	public function eliminar_usuario() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			$uid = $this->input->post('uid');
			if ($this->personal_model->eliminar_usuario($uid)) {
				$this->personal_model->log($this->session->userdata('nombre') . ' elimino el usuario "' . $this->input->post('nombre') . '" ' . $this->input->post('motivo'), 'personal/detalle/' . $uid);
				$this->session->set_flashdata('exito', 'Eliminación exitosa.');
				redirect(base_url() . 'personal');
			} else {
				$this->session->set_flashdata('error', 'Ocurrio un error.');
				redirect(base_url() . 'personal');
			}
		} else {
			$this->session->set_flashdata('error', 'Token incorrecto.');
			redirect(base_url() . 'personal');
		}
	}

	public function nuevo_contrato() {
		if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
			if ($this->personal_model->nuevo_contrato()) {
				$this->session->set_flashdata('exito', 'Contrato creado con éxito.');
				echo json_encode(array('status' => true));
			} else
				echo json_encode(array('error' => "Token incorrecto."));
		} else
			echo json_encode(array('error' => "Token incorrecto."));
	}

	public function contrato($uid) {
		$datos = $this->personal_model->datos_contrato($uid);
		try {
			$dia = date('j');
			$mes = date('n');
			$ano = date('Y');

			$nacimiento = explode("-", $datos->fecha_nacimiento);
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
		} catch (Exception $e) {
			$edad = 'N/A';
		}
		$puesto = '';
		$proyecto = '';
		$sueldo = '';
		$descripcion_puesto = '';
		$placeHolders = [
			'%nombre%',
			'%edad%',
			'%sexo%',
			'%estado_civil%',
			'%nacionalidad%',
			'%curp%',
			'%nss%',
			'%direccion%',
			'%puesto%',
			'%proyecto%',
			'%sueldo%',
			'%fecha_ingreso%',
			'%fecha_actual%',
			'%fecha_inicio%',
			'%descripcion_puesto%',
		];
		$values = [
			$datos->nombres . ' ' . $datos->apellido_paterno . ' ' . $datos->apellido_materno,
			$edad,
			$datos->sexo,
			$datos->estado_civil,
			$datos->nacionalidad,
			$datos->curp,
			$datos->nss,
			strtoupper($datos->calle . ' ' . $datos->numero . ', ' . $datos->colonia . ',C.P.' . $datos->cp . ', ' . $datos->nombre_municipio . ' ' . $datos->nombre_entidad . '.'),
			$puesto,
			$datos->numero_proyecto . ' ' . $datos->nombre_proyecto,
			$sueldo,
			strftime("%d de %b de %Y", strtotime($datos->fecha_ingreso)),
			strftime("%d de %b de %Y", time()),
			strftime("%d de %b de %Y", strtotime($datos->fecha_inicio)),
			$descripcion_puesto
		];
		$rendered = str_replace($placeHolders, $values, $datos->plantilla);

		echo $rendered;
	}

	public function certificado($uid) {
		$datos = $this->personal_model->datos_certificado($uid );		
		$curp = str_split($datos->curp);
		$fecha_inicio = str_split($datos->fecha_inicio);
		$fecha_termino = str_split($datos->fecha_termino);
		$instructor = ($datos->idtbl_instructores);	
		
		

		if (count($curp) != 18) {
			echo '<p>La longitud del curp debe ser de 18 caracteres.</p>';
			return 0;
		}
		if (count($fecha_inicio) != 10) {
			echo '<p>La fecha de inicio es incorrecta.</p>';
			return 0;
		}
		if (count($fecha_termino) != 10) {
			echo '<p>La fecha de termino es incorrecta.</p>';
			return 0;
		}

		$img_tutor = "";
		//if($datos->tutor == "GUSTAVO ALEJANDRO ZAPATA YAÑEZ"){
			
			$path= getcwd() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR ."instructores". DIRECTORY_SEPARATOR . $instructor .".jpg";
			if(file_exists($path)){
				$img_tutor = "<img style='position: absolute; top: 50%; width: 95px; left: 50%; transform: translate(-50%, -50%); z-index:-1;' src='" . base_url() . DIRECTORY_SEPARATOR . "uploads"  . DIRECTORY_SEPARATOR . "instructores"  . DIRECTORY_SEPARATOR .$instructor. ".jpg'>";
			}
		//}

		$img_patronrepresentante = "";
		if($datos->patron_representante == "GUSTAVO JUAREZ MENDOZA" || $datos->patron_representante == "JESSICA CALLEJAS VAZQUEZ"  ){
			
			if($datos->patron_representante == "GUSTAVO JUAREZ MENDOZA"){
				$uid_usuario = "60e5eedb84f08";
			}else{
				$uid_usuario = "5C4792E7D72E3";
			}
			$path = getcwd() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . "$uid_usuario" . DIRECTORY_SEPARATOR . "firma" . DIRECTORY_SEPARATOR . "$uid_usuario" . ".png";
			if(file_exists($path)){
				$img_patronrepresentante = "<img style='position: absolute; top: 50%; width: 95px; left: 50%; transform: translate(-50%, -50%); z-index:-1;' src='" .  base_url() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . "$uid_usuario" . DIRECTORY_SEPARATOR . "firma" . DIRECTORY_SEPARATOR . "$uid_usuario" . ".png'>";
								
			}
		}
		
		$img_representantetrabajadores = "";
		if($datos->representante_trabajadores == "JESSICA CARINA CALLEJAS VAZQUEZ" || $datos->representante_trabajadores == "GUSTAVO JUAREZ MENDOZA"){
			
			if($datos->representante_trabajadores == "JESSICA CARINA CALLEJAS VAZQUEZ"){
				$uid_usuario = "5C4792E7D72E3";
			}else{
				$uid_usuario = "60e5eedb84f08";
			}
			$path = getcwd() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . "$uid_usuario" . DIRECTORY_SEPARATOR . "firma" . DIRECTORY_SEPARATOR . "$uid_usuario" . ".png";
			if(file_exists($path)){
				$img_representantetrabajadores = "<img style='position: absolute; top: 50%; width: 95px; left: 50%; transform: translate(-50%, -50%); z-index:-1;' src='" .  base_url() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . "$uid_usuario" . DIRECTORY_SEPARATOR . "firma" . DIRECTORY_SEPARATOR . "$uid_usuario" . ".png'>";
			}
		}

		$placeHolders = [
			'%nombre%',
			'%curp_1%',
			'%curp_2%',
			'%curp_3%',
			'%curp_4%',
			'%curp_5%',
			'%curp_6%',
			'%curp_7%',
			'%curp_8%',
			'%curp_9%',
			'%curp_10%',
			'%curp_11%',
			'%curp_12%',
			'%curp_13%',
			'%curp_14%',
			'%curp_15%',
			'%curp_16%',
			'%curp_17%',
			'%curp_18%',
			'%fecha_inicio_1%',
			'%fecha_inicio_2%',
			'%fecha_inicio_3%',
			'%fecha_inicio_4%',
			'%fecha_inicio_5%',
			'%fecha_inicio_6%',
			'%fecha_inicio_7%',
			'%fecha_inicio_8%',
			'%fecha_termino_1%',
			'%fecha_termino_2%',
			'%fecha_termino_3%',
			'%fecha_termino_4%',
			'%fecha_termino_5%',
			'%fecha_termino_6%',
			'%fecha_termino_7%',
			'%fecha_termino_8%',
			'%puesto%',
			'%ocupacion%',
			'%curso%',
			'%area%',
			'%tutor%',
			'%duracion%',
			'%folio%',
			'%patronrepresentante%',
			'%representantetrabajadores%',
			'%img-tutor%',
			'%img-patronrepresentante%',
			'%img-representantetrabajadores%',
		];
		$values = [
			$datos->nombres . ' ' . $datos->apellido_paterno . ' ' . $datos->apellido_materno,
			$curp[0],
			$curp[1],
			$curp[2],
			$curp[3],
			$curp[4],
			$curp[5],
			$curp[6],
			$curp[7],
			$curp[8],
			$curp[9],
			$curp[10],
			$curp[11],
			$curp[12],
			$curp[13],
			$curp[14],
			$curp[15],
			$curp[16],
			$curp[17],
			$fecha_inicio[0],
			$fecha_inicio[1],
			$fecha_inicio[2],
			$fecha_inicio[3],
			$fecha_inicio[5],
			$fecha_inicio[6],
			$fecha_inicio[8],
			$fecha_inicio[9],
			$fecha_termino[0],
			$fecha_termino[1],
			$fecha_termino[2],
			$fecha_termino[3],
			$fecha_termino[5],
			$fecha_termino[6],
			$fecha_termino[8],
			$fecha_termino[9],
			$datos->perfil,
			$datos->ocupacion_especifica,
			$datos->nombre_curso,
			$datos->area_tematica,
			$datos->tutor,
			$datos->duracion,
			$datos->folio,
			$datos->patron_representante,
			$datos->representante_trabajadores,
			$img_tutor,
			$img_patronrepresentante,
			$img_representantetrabajadores
		];
		$rendered = str_replace($placeHolders, $values, $datos->plantilla);
		echo $rendered;
	}

	public function formato_vacaciones($uid) {
		$datos['detalle'] = $this->personal_model->datos_vacaciones($uid);
		$header['titulo'] = 'Formato vaciones';
		$header['clase_pagina'] = 'formato-page';
		$this->load->view('plantillas/header', $header);
		$this->load->view('personal/formato-vacaciones', $datos);
		$this->load->view('plantillas/footer', $datos);
	}

	private function pruebas() {
		var_dump($this->unique('485', 'tbl_usuarios.numero_empleado_noi,tbl_usuarios.idtbl_usuarios'));
	}

	private function precio_actual_dolar() {
    	error_reporting(0);
    	$url = 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SF43718/datos/oportuno?mediaType=json&token=d8ca6837fc6654742ab58ce244abe03af703031d56eb1a1fe18201bc7602c760';
    	$json = file_get_contents($url);
    	if($json!='') {
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

	public function excel_personal_quincenal() {
		$reporte = $this->personal_model->todos_los_usuarios('interno', '');
		if (count($reporte) > 0) {
			//Cargamos la librería de excel.
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Personal Quincenal ');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.      
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);

			//Definimos los títulos de la cabecera.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'N° de empleado');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOI');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Empresa');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Departamento');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Perfil');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Proyecto');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha Nacimiento');

			foreach ($reporte as $dato) {
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_empleado);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_empleado_noi);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->apellido_paterno . ' ' . $dato->apellido_materno . ' ' . $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->empresa);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->departamento);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->perfil);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->numero_proyecto);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_nacimiento);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Personal_Quincenal_' . date('d-m-Y  H:i:s') . '.xls';
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

	public function excel_personal_semanal() {


		$reporte = $this->personal_model->todos_los_usuarios('interno', 'semanal');
		if (count($reporte) > 0) {
			//Cargamos la librería de excel.
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Personal Semanal ');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.      
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);

			//Definimos los títulos de la cabecera.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'N° de empleado');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOI');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Empresa');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Departamento');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Perfil');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Proyecto');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha Nacimiento');

			foreach ($reporte as $dato) {				
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_empleado);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_empleado_noi);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->apellido_paterno . ' ' . $dato->apellido_materno . ' ' . $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->empresa);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->departamento);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->perfil);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->numero_proyecto);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_nacimiento);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Personal_Semanal_' . date('d-m-Y  H:i:s') . '.xls';
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

	public function excel_personal_bajas() {

		$reporte = $this->personal_model->todos_los_usuarios_baja('interno');
		if (count($reporte) > 0) {
			//Cargamos la librería de excel.
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Personal Baja ');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.      
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);

			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);

			//Definimos los títulos de la cabecera.
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'N° de empleado');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'NOI');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Nombre');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Departamento');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Perfil');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Proyecto');
			$this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha Nacimiento');

			foreach ($reporte as $dato) {
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_empleado_noi);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->numero_empleado);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->apellido_paterno . ' ' . $dato->apellido_materno . ' ' . $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->departamento);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->perfil);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->numero_proyecto);
				$this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_nacimiento);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Personal_Baja_' . date('d-m-Y  H:i:s') . '.xls';
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

	public function excel_contrato_vencido() {

		$reporte = $this->personal_model->todos_los_usuarios_contrato_vencido('interno');
		if (count($reporte) > 0) {
			//Cargamos la librería de excel.
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Personal Contratos Vencidos ');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.      
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);

			//Definimos los títulos de la cabecera.			
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'N° de empleado');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOI');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Departamento');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Perfil');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Fecha vencimiento');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Días transcurridos');

			foreach ($reporte as $dato) {
				$dias_vencimiento = date_diff(date_create(strftime("%d-%m-%Y", strtotime($dato->fecha_inicio . "+ " . $dato->duracion . " days"))), date_create('now'))->format('%R%a') . " día(s) desde su fecha de vencimiento";
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_empleado);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_empleado_noi);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->apellido_paterno . ' ' . $dato->apellido_materno . ' ' . $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->departamento);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->perfil);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->end_date);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dias_vencimiento);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Personal_contratos_Vencidos' . date('d-m-Y  H:i:s') . '.xls';
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

	public function excel_contrato_vencer() {

		$reporte = $this->personal_model->todos_los_usuarios_proximo_a_vencer('interno');
		if (count($reporte) > 0) {
			//Cargamos la librería de excel.
			$this->load->library('excel');
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle('Personal Contratos Vencer ');
			//Contador de filas
			$contador = 1;
			//Le aplicamos ancho las columnas.      
			$this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
			$this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
			$this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
			$this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);

			//Le aplicamos negrita a los títulos de la cabecera.
			$this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
			$this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);

			//Definimos los títulos de la cabecera.			
			$this->excel->getActiveSheet()->setCellValue("A{$contador}", 'N° de empleado');
			$this->excel->getActiveSheet()->setCellValue("B{$contador}", 'NOI');
			$this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Nombre');
			$this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Departamento');
			$this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Perfil');
			$this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Fecha vencimiento');
			$this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Días para vencimiento');

			foreach ($reporte as $dato) {
				$dias_vencimiento = date_diff(date_create(strftime("%d-%m-%Y", strtotime($dato->fecha_inicio . "+ " . $dato->duracion . " days"))), date_create('now'))->format('%R%a') . " día(s) para su fecha de vencimiento";
				//Incrementamos una fila más, para ir a la siguiente.
				$contador++;
				//Informacion de las filas de la consulta.
				$this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_empleado);
				$this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->numero_empleado_noi);
				$this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->apellido_paterno . ' ' . $dato->apellido_materno . ' ' . $dato->nombres);
				$this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->departamento);
				$this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->perfil);
				$this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->end_date);
				$this->excel->getActiveSheet()->setCellValue("G{$contador}", $dias_vencimiento);
			}

			//Le ponemos un nombre al archivo que se va a generar.
			$archivo = 'Personal_contratos_proximos_vencer' . date('d-m-Y  H:i:s') . '.xls';
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

	//obtener usuarios por nombre y tipo al seleccionar el personal --fernando
	public function getUsuariosSelect() {
		if($_POST['reportado_por'] == '' || $_POST['reportado_por'] == NULL) {
			$resultado = $this->personal_model->getUsuariosSelect('interno','null');
			echo json_encode($resultado);
		} else {
			$resultado = $this->personal_model->getUsuariosSelect('interno',$_POST['reportado_por']);
			echo json_encode($resultado);
		}
		
	}

	public function verificar_fotos(){
		//$this->load->helper('url');
		$query = $this->db->query("SELECT * FROM tbl_usuarios WHERE tbl_usuarios.estatus = 1 AND tipo = 'interno'");
		$result = $query->result();
		$count = 0;
		foreach ($result as $value) {
			$exist = "no";
			if(file_exists("uploads/$value->uid/$value->uid-img-credencial.jpg")){
				$exist = "si";
			}
			if(file_exists("uploads/$value->uid/$value->uid-img-credencial.JPG")){
				$exist = "si";
			}
			echo "$value->numero_empleado, $value->nombres $value->apellido_paterno $value->apellido_materno, $exist </br>";
			$count++;
		}
		echo "----------------------------------------</br>";
		echo "Total usuarios: $count";
	}
	
	public function generarContrato(){
		$empresa = $this->input->get('empresa');
		$departamento = $this->input->get('departamento');
		$puesto_contrato = $this->input->get('puesto_contrato');
		$nacionalidad = $this->input->get('nacionalidad');
		$edad = $this->input->get('edad');
		$nombre = $this->input->get('nombre');
		$estado_civil = $this->input->get('estado_civil');
		$rfc = $this->input->get('rfc');
		$curp = $this->input->get('curp');
		$domicilio = $this->input->get('domicilio');
		$fecha = $this->input->get('fecha');
		$sexo = $this->input->get('sexo');
		$tipo_duracion = $this->input->get('tipo_duracion');
		$duracion = $this->input->get('duracion');

		// Adding an empty Section to the document...
		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		$PHPWord = new \PhpOffice\PhpWord\PhpWord();
		$PHPWord ->getSettings()->setThemeFontLang(new PhpOffice\PhpWord\Style\Language("ES-MX"));
		$PHPWord->setDefaultFontName('Arial');
		$PHPWord->setDefaultFontSize(9);
		$PHPWord->addNumberingStyle(
		    'multilevel',
		    array(
		        'type' => 'multilevel',
		        'levels' => array(
		            array('format' => 'upperLetter', 'text' => '%1.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
		            array('format' => 'decimal', 'text' => '%2.', 'left' => 720, 'hanging' => 360, 'tabPos' => 720),
		        )
		    )
		);

		$section = $PHPWord->addSection();

		$BOLD = array('bold' => TRUE);
		$BOLD_UNDERLINE = array('bold' => TRUE, 'underline' => "single");
		$UNDERLINE = array('underline' => "single");
		$CENTER = array('align' => 'center');
		$JUSTIFY = array('align' => 'both');
		$RIGHT = array('align' => 'right');
		$LEFT = array('align' => 'left');				
		$BOLD_CENTER = array('bold' => TRUE, 'align' => 'center');
		$ANEXO = array('bold' => TRUE, 'size' => 12);

		$section->addText("CONTRATO INDIVIDUAL DE TRABAJO",  $BOLD, $CENTER);
		// Adding Text element to the Section having font styled by default...
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('CONTRATO INDIVIDUAL DE TRABAJO QUE CONFORME A LO ESTABLECIDO POR LOS ARTÍCULOS 24 Y 25 DE LA LEY FEDERAL DEL TRABAJO, CELEBRAN POR UNA PARTE LA EMPRESA ');
		$textrun->addText($empresa . ',', $BOLD_UNDERLINE);
		$textrun->addText(' REPRESENTADA LEGALMENTE POR ');
		if($empresa == 'GRUPO BACK BONE DE MEXICO S.A DE C.V'){
			$textrun->addText('EL C. JORGE ESTEVEZ ABREU,', $BOLD_UNDERLINE);
			$textrun->addText(' EN SU CARÁCTER DE APODERADO LEGAL', $UNDERLINE);
		}
		elseif($empresa == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
			$textrun->addText('EL LIC. JORGE ESTEVEZ GONZALEZ,', $BOLD_UNDERLINE);
			$textrun->addText(' EN SU CARÁCTER DE ADMINISTRADOR UNICO', $UNDERLINE);	
		}else{
			$textrun->addText('EL LIC. GUSTAVO JUAREZ MENDOZA,', $BOLD_UNDERLINE);
			$textrun->addText(' EN SU CARÁCTER DE APODERADO LEGAL', $UNDERLINE);
		}		
		
		$textrun->addText(' A QUIÉN EN LO SUCESIVO Y PARA EFECTOS DE ESTE CONTRATO SE LE DENOMINARÁ');
		$textrun->addText(' “EL PATRON”,', $BOLD);
		$textrun->addText(' Y POR LA OTRA POR SU PROPIO DERECHO, ');
		$textrun->addText("EL/LA C. " . $nombre, $BOLD_UNDERLINE);
		$textrun->addText(", A QUIÉN EN LO SUCESIVO Y PARA EFECTOS DE ESTE CONTRATO SE LE DENOMINARÁ ");
		$textrun->addText('“EL TRABAJADOR”,', $BOLD);
		$textrun->addText(' AL TENOR DE LAS SIGUIENTES DECLARACIONES Y CLÁUSULAS:');

		$textrun = $section->addTextRun($JUSTIFY);
		$section->addText("DECLARACIONES:",  $BOLD, $CENTER);

if($empresa == 'GRUPO BACK BONE DE MEXICO S.A DE C.V'){
	$listItemRun = $section->addListItemRun(0, 'multilevel', $JUSTIFY);
    $listItemRun->addText('DE “EL PATRON”:', $BOLD);
    $section->addListItem('QUE ES UNA SOCIEDAD ANÓNIMA DE CAPITAL VARIABLE DEBIDAMENTE CONSTITUIDA Y LEGALMENTE EXISTENTE DE ACUERDO CON LAS LEYES MEXICANAS, TAL Y COMO SE ACREDITA EN TÉRMINOS DE INSTRUMENTO NOTARIAL NO. 42,077 PASADO ANTE LA FE DEL LIC. JESUS CORDOVA GALVEZ, NOTARIO PÚBLICO NO. 115, DEL ESTADO DE MÉXICO Y EL ADMINISTRADOR JORGE ESTEVEZ ABREU CON FECHA 30 DE SEPTIEMBRE DE 2015 EXPEDIDO POR EL NOTARIO NO. 115 LIC. JESUS CORDOVA GALVEZ', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE TIENE SU DOMICILIO EN: CALLE FILIBERTO GOMEZ NO.46 COL. CENTRO INDUSTRIAL TLALNEPANTLA, TLALNEPANTLA DE BAZ, ESTADO DE MÉXICO, C.P. 54030', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE SU OBJETO SOCIAL CONSISTE EN OTROS SERVICIOS DE TELECOMUNICACIONES.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE QUIEN SUSCRIBE POR “EL PATRON”, CUENTA CON BASTANTES, AMPLIAS Y SUFICIENTES FACULTADES PARA LA CELEBRACION DE ESTE CONTRATO, LAS CUALES AL DIA DE HOY NO LE HAN SIDO REVOCADAS, RESTRINGIDAS, SUSPENDIDAS O DE ALGUNA OTRA MANERA LIMITADAS.', 1, null, 'multilevel', $JUSTIFY);
    $listItemRun = $section->addListItemRun(1, 'multilevel', $JUSTIFY);
    $listItemRun->addText('QUE CUENTA CON EL PERSONAL NECESARIO PARA EL DESARROLLO DE SUS OPERACIONES NORMALES, Y REQUIERE CONTRATAR PERSONAL QUE CUENTE CON LA DISPOSICIÓN, ');
    $listItemRun->addText('NO IMPORTANDO SU EXPERIENCIA, HABILIDAD O CONOCIMIENTOS PARA DESEMPEÑAR LOS TRABAJOS RELACIONADOS CON EL OBJETO SOCIAL DE LA EMPRESA, POR LO CUAL ES VOLUNTAD DE “EL PATRON”, CELEBRAR ESTE CONTRATO', $BOLD_UNDERLINE);
}
elseif ($empresa == 'RASTREO SATELITAL DE MEXICO J&J S.A DE C.V') {
    $listItemRun = $section->addListItemRun(0, 'multilevel', $JUSTIFY);
    $listItemRun->addText('DE “EL PATRON”:', $BOLD);
    $section->addListItem('QUE ES UNA SOCIEDAD ANÓNIMA DE CAPITAL VARIABLE DEBIDAMENTE CONSTITUIDA Y LEGALMENTE EXISTENTE DE ACUERDO CON LAS LEYES MEXICANAS, TAL Y COMO SE ACREDITA EN TÉRMINOS DE INSTRUMENTO NOTARIAL NO. 82,900 DE FECHA 3 DE AGOSTO DEL 2018 PASADA ANTE LA FE DEL LICENCIADO NICOLAS MALUF MALOF, NOTARIO PÚBLICO NO.13 DEL ESTADO DE MÉXICO.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE TIENE SU DOMICILIO EN: CALLE TENAYUCA NUMERO 82 COLONIA CENTRO INDUSTRIAL TLALNEPANTLA, C.P. 54030, MUNICIPIO DE TLALNEPANTLA DE BAZ, ESTADO DE MÉXICO.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE SU OBJETO SOCIAL CONSISTE EN SERVICIOS DE PROTECCIÓN Y CUSTODIA POR MEDIO DE MONITOREO DE SISTEMAS DE SEGURIDAD.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE QUIEN SUSCRIBE POR “EL PATRON”, CUENTA CON BASTANTES, AMPLIAS Y SUFICIENTES FACULTADES PARA LA CELEBRACION DE ESTE CONTRATO, LAS CUALES AL DIA DE HOY NO LE HAN SIDO REVOCADAS, RESTRINGIDAS, SUSPENDIDAS O DE ALGUNA OTRA MANERA LIMITADAS.', 1, null, 'multilevel', $JUSTIFY);
    $listItemRun = $section->addListItemRun(1, 'multilevel', $JUSTIFY);
    $listItemRun->addText('QUE CUENTA CON EL PERSONAL NECESARIO PARA EL DESARROLLO DE SUS OPERACIONES NORMALES, Y REQUIERE CONTRATAR PERSONAL QUE CUENTE CON LA DISPOSICIÓN, ');
    $listItemRun->addText('NO IMPORTANDO SU EXPERIENCIA, HABILIDAD O CONOCIMIENTOS PARA DESEMPEÑAR LOS TRABAJOS RELACIONADOS CON EL OBJETO SOCIAL DE LA EMPRESA, POR LO CUAL ES VOLUNTAD DE “EL PATRON”, CELEBRAR ESTE CONTRATO', $BOLD_UNDERLINE);
}elseif($empresa == 'ESTEVEZ.JOR SERVICIOS, S.A. DE C.V.'){
	$listItemRun = $section->addListItemRun(0, 'multilevel', $JUSTIFY);
    $listItemRun->addText('DE “EL PATRON”:', $BOLD);
    $section->addListItem('QUE ES UNA SOCIEDAD ANÓNIMA DE CAPITAL VARIABLE DEBIDAMENTE CONSTITUIDA Y LEGALMENTE EXISTENTE DE ACUERDO CON LAS LEYES MEXICANAS, TAL Y COMO SE ACREDITA EN TÉRMINOS DE INSTRUMENTO NOTARIAL NÚMERO 46,404, DE FECHA 4 DE OCTUBRE DE 2011 PASADO ANTE LA FE DEL LIC. JOSE ORLANDO PADILLA BENITEZ, NOTARIO PÚBLICO NO. 30 DEL ESTADO DE MÉXICO Y EL APODERADO LEGAL ACREDITA SU PERSONALIDAD CON EL INSTRUMENTO NO.20,576 DE FECHA 25 DE OCTUBRE DEL 2022 EXPEDIDO POR EL NOTARIO NO.209 LIC. J. CARLOS F. DIAZ PONCE DE LEON', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE TIENE SU DOMICILIO EN: CALLE FILIBERTO GOMEZ NUMERO 46 COLONIA CENTRO INDUSTRIAL TLALNEPANTLA, C.P. 54030, MUNICIPIO DE TLALNEPANTLA, ESTADO DE MEXICO.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE SU OBJETO SOCIAL CONSISTE EN LA INSTALACION Y MANTEMIENTO DE FIBRA ÓPTICA ENTRE OTROS.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE QUIEN SUSCRIBE POR “EL PATRON”, CUENTA CON BASTANTES, AMPLIAS Y SUFICIENTES FACULTADES PARA LA CELEBRACION DE ESTE CONTRATO, LAS CUALES AL DIA DE HOY NO LE HAN SIDO REVOCADAS, RESTRINGIDAS, SUSPENDIDAS O DE ALGUNA OTRA MANERA LIMITADAS.', 1, null, 'multilevel', $JUSTIFY);
    $listItemRun = $section->addListItemRun(1, 'multilevel', $JUSTIFY);
    $listItemRun->addText('QUE CUENTA CON EL PERSONAL NECESARIO PARA EL DESARROLLO DE SUS OPERACIONES NORMALES, Y REQUIERE CONTRATAR PERSONAL QUE CUENTE CON LA DISPOSICIÓN, ');
    $listItemRun->addText('NO IMPORTANDO SU EXPERIENCIA, HABILIDAD O CONOCIMIENTOS PARA DESEMPEÑAR LOS TRABAJOS RELACIONADOS CON EL OBJETO SOCIAL DE LA EMPRESA, POR LO CUAL ES VOLUNTAD DE “EL PATRON”, CELEBRAR ESTE CONTRATO.', $BOLD_UNDERLINE);
}else{
	$listItemRun = $section->addListItemRun(0, 'multilevel', $JUSTIFY);
    $listItemRun->addText('DE “EL PATRON”:', $BOLD);
    $section->addListItem('QUE ES UNA SOCIEDAD ANÓNIMA DE CAPITAL VARIABLE DEBIDAMENTE CONSTITUIDA Y LEGALMENTE EXISTENTE DE ACUERDO CON LAS LEYES MEXICANAS, TAL Y COMO SE ACREDITA EN TÉRMINOS DE INSTRUMENTO NOTARIAL NÚMERO 46,404, DE FECHA 4 DE OCTUBRE DE 2011 PASADO ANTE LA FE DEL LIC. JOSE ORLANDO PADILLA BENITEZ, NOTARIO PÚBLICO NO. 30 DEL ESTADO DE MÉXICO Y EL APODERADO LEGAL ACREDITA SU PERSONALIDAD CON EL INSTRUMENTO NO.20,576 DE FECHA 25 DE OCTUBRE DEL 2022 EXPEDIDO POR EL NOTARIO NO.209 LIC. J. CARLOS F. DIAZ PONCE DE LEON', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE TIENE SU DOMICILIO EN: CARRETERA FEDERAL, MÉXICO PACHUCA #413, COL. EMILIANO ZAPATA, TIZAYUCA HIDALGO.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE SU OBJETO SOCIAL CONSISTE EN LA INSTALACION Y MANTEMIENTO DE FIBRA ÓPTICA ENTRE OTROS.', 1, null, 'multilevel', $JUSTIFY);
    $section->addListItem('QUE QUIEN SUSCRIBE POR “EL PATRON”, CUENTA CON BASTANTES, AMPLIAS Y SUFICIENTES FACULTADES PARA LA CELEBRACION DE ESTE CONTRATO, LAS CUALES AL DIA DE HOY NO LE HAN SIDO REVOCADAS, RESTRINGIDAS, SUSPENDIDAS O DE ALGUNA OTRA MANERA LIMITADAS.', 1, null, 'multilevel', $JUSTIFY);
    $listItemRun = $section->addListItemRun(1, 'multilevel', $JUSTIFY);
    $listItemRun->addText('QUE CUENTA CON EL PERSONAL NECESARIO PARA EL DESARROLLO DE SUS OPERACIONES NORMALES, Y REQUIERE CONTRATAR PERSONAL QUE CUENTE CON LA DISPOSICIÓN, ');
    $listItemRun->addText('NO IMPORTANDO SU EXPERIENCIA, HABILIDAD O CONOCIMIENTOS PARA DESEMPEÑAR LOS TRABAJOS RELACIONADOS CON EL OBJETO SOCIAL DE LA EMPRESA, POR LO CUAL ES VOLUNTAD DE “EL PATRON”, CELEBRAR ESTE CONTRATO.', $BOLD_UNDERLINE);
}

		$listItemRun = $section->addListItemRun(0, 'multilevel', $JUSTIFY);
		$listItemRun->addText('DE “EL TRABAJADOR”:', $BOLD);
		$listItemRun = $section->addListItemRun(1, 'multilevel', $JUSTIFY);
		$listItemRun->addText('QUE CUENTA CON LA DISPOSICIÓN NECESARIA PARA DESEMPEÑAR LOS SERVICIOS EN EL PUESTO REQUERIDO, DE: ');
		$listItemRun->addText($puesto_contrato, $BOLD_UNDERLINE);
		$section->addListItem('QUE SUS GENERALES SON LOS SIGUIENTES:', 1, null, 'multilevel', $JUSTIFY);

		$table = $section->addTable(array('cellMargin'=>80, 'leftFromText'=>720));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5, 'valign'=>'center'))->addText("NACIONALIDAD", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5, 'valign'=>'center'))->addText($nacionalidad, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("EDAD", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($edad, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("SEXO", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($sexo, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("ESTADO CIVIL", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($estado_civil, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("CURP", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($curp, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("RFC", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($rfc, null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderTopColor' => '000000', 'borderRightColor' => '000000', 'borderTopSize' => 5, 'borderRightSize' => 5))->addText("DOMICILIO", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderTopColor' => '000000', 'borderLeftColor' => '000000', 'borderTopSize' => 5, 'borderLeftSize' => 5))->addText($domicilio, null, array('spaceAfter' => 10,'spaceBefore' => 10));

		$section->addPageBreak();
		$section->addListItem('QUE BAJO PROTESTA DE DECIR VERDAD, DECLARA QUE TODA LA INFORMACIÓN QUE HA PROPORCIONADO DE MANERA ORAL O ESCRITA A “EL PATRÓN” ES CORRECTA Y FIDEDIGNA.', 1, null, 'multilevel', $JUSTIFY);
		$section->addListItem('QUE LE HAN ENTERADO Y EXPLICADO LAS CONDICIONES DE TRABAJO Y COMO CONSECUENCIA ES SU EXPRESA VOLUNTAD CELEBRAR EL PRESENTE CONTRATO EN LOS TÉRMINOS Y CONDICIONES DESCRITOS EN EL CUERPO DEL PRESENTE INSTRUMENTO.', 1, null, 'multilevel', $JUSTIFY);
		$section->addText("EXPUESTAS LAS ANTERIORES DECLARACIONES, AMBAS PARTES SE SOMETEN A LAS SIGUIENTES:");

		$section->addText("DECLARAN “LAS PARTES”:",  $BOLD);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('ÚNICO. - ', $BOLD);
		$textrun->addText('QUE AMBAS PARTES SE RECONOCEN EL CARÁCTER CON EL QUE COMPARECEN Y MANIFIESTAN QUE ES SU DESEO CELEBRAR EL PRESENTE CONTRATO EN LOS TÉRMINOS QUE A CONTINUACIÓN SE ESTIPULAN REMITIÉNDOSE PARA TAL EFECTO A LAS SIGUIENTES:');

		$section->addText("CLÁUSULAS:",  $BOLD, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('PRIMERA. ', $BOLD);
		$textrun->addText('PARA EFECTOS DE COMPRENSIÓN DEL PRESENTE CONTRATO, SE DENOMINARÁ EN LO SUCESIVO A LA LEY FEDERAL DEL TRABAJO COMO "LA LEY", AL REFERIRSE AL PRESENTE DOCUMENTO COMO "EL CONTRATO", AL REGLAMENTO INTERIOR DE TRABAJO “REGLAMENTO” Y DE MANERA CONJUNTA A LOS QUE SUSCRIBEN COMO "LAS PARTES".');
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('SEGUNDA. ', $BOLD);
		$textrun->addText('EL PRESENTE CONTRATO REGIRÁ EN TODO TIEMPO Y LUGAR LO NO ESTIPULADO EN EL MISMO POR EL “REGLAMENTO” Y POR LO ESTABLECIDO EN “LA LEY”.');
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TERCERA. ', $BOLD);
		$textrun->addText('“EL PATRÓN”, EN ESTE ACTO CONTRATA A “EL TRABAJADOR” ');
		$textrun->addText('BAJO LA MODALIDAD DE CAPACITACIÓN INICIAL', $BOLD);
		$textrun->addText('PARA QUE DESEMPEÑE EL PUESTO DE ');
		$textrun->addText($puesto_contrato . ' ', $BOLD_UNDERLINE);
		$textrun->addText('ASÍ COMO EN CUALQUIER OTRA ACTIVIDAD ANEXA, CONEXA O RELACIONADA QUE LE ENCOMIENDE EL PATRÓN, COMPATIBLE CON EL FIN DE SU CATEGORÍA, CAPACITACIÓN Y DE SUS APTITUDES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('CUARTA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR” RECONOCE Y ESTA CONFORME, DADA LA MODALIDAD DE CONTRATACIÓN DE CAPACITACIÓN INICIAL, QUE A PARTIR DE LA SUSCRIPCIÓN DEL PRESENTE CONTRATO, LA RELACIÓN LABORAL TENDRÁ UNA VIGENCIA ');
		$textrun->addText('POR TIEMPO ' . ($tipo_duracion == 'INDETERMINADO' ? 'INDETERMINADO' : 'DETERMINADO DE ' . $duracion . " NATURALES"), $BOLD);
		$textrun->addText(', CONTADOS A PARTIR DE LA FECHA DE SU FIRMA');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('QUINTA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR” SE OBLIGA A PRESTAR A “EL PATRÓN”, BAJO SU DIRECCIÓN Y DEPENDENCIA, SUS SERVICIOS PERSONALES COMO: ');
		$textrun->addText($puesto_contrato . '.', $BOLD_UNDERLINE);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('SEXTA. ', $BOLD);
		if($empresa == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
			$textrun->addText('“EL TRABAJADOR” DEBE DESEMPEÑAR DICHA ACTIVIDAD EN EL DOMICILIO UBICADO EN CARRETERA FEDERAL, MÉXICO PACHUCA #413, COL. EMILIANO ZAPATA, TIZAYUCA HIDALGO., Y/O INDISTINTAMENTE EN CUALQUIER DOMICILIO O LUGAR QUE SE LE INDIQUE POR “EL PATRÓN”, EN TÉRMINOS DE LA CLAUSULA SÉPTIMA DE ESTE CONTRATO, ASIMISMO “EL TRABAJADOR” SE OBLIGA A CAPACITARSE Y DESEMPEÑAR EFICIENTEMENTE TODAS LAS OBLIGACIONES RELATIVAS A SU PUESTO, COMO LO PUEDE SER DE MANERA ENUNCIATIVA MAS NO LIMITATIVA EL: ');					
		}else {					
			$textrun->addText('“EL TRABAJADOR” DEBE DESEMPEÑAR DICHA ACTIVIDAD EN EL DOMICILIO UBICADO EN CALLE FILIBERTO GÓMEZ NUMERO 46 COLONIA CENTRO INDUSTRIAL TLALNEPANTLA, C.P. 54030, MUNICIPIO DE TLALNEPANTLA, ESTADO DE MEXICO., Y/O INDISTINTAMENTE EN CUALQUIER DOMICILIO O LUGAR QUE SE LE INDIQUE POR “EL PATRÓN”, EN TÉRMINOS DE LA CLAUSULA SÉPTIMA DE ESTE CONTRATO, ASIMISMO “EL TRABAJADOR” SE OBLIGA A CAPACITARSE Y DESEMPEÑAR EFICIENTEMENTE TODAS LAS OBLIGACIONES RELATIVAS A SU PUESTO, COMO LO PUEDE SER DE MANERA ENUNCIATIVA MAS NO LIMITATIVA EL: ');		
		}
		$textrun->addText($departamento . ',', $BOLD_UNDERLINE);
		$textrun->addText(' ASÍ COMO RENDIR INFORMES MENSUALES O CADA QUE SE LO SOLICITE EL PATRON Y/O CUALQUIER OTRA ACTIVIDAD CONEXA O RELACIONADA QUE LE ENCOMIENDE EL PATRON, COMPATIBLE CON EL FIN DE SU CAPACITACION Y DE SUS APTITUDES, MISMAS QUE SE SEÑALAN DE MANERA ENUNCIATIVA MAS NO LIMITATIVA.');
		$section->addText("EXPRESAMENTE CONVIENE “EL TRABAJADOR” EN PONER TODA SU DILIGENCIA Y EMPEÑO EN BENEFICIO DE “EL PATRON”,", null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('SEPTIMA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR” DESARROLLARA SUS FUNCIONES EN CUALQUIER LUGAR QUE LE SEA ASIGNADO POR “EL PATRÓN”, DE ACUERDO A LAS NECESIDADES DE LA EMPRESA.');
		
		$section->addText('“EL TRABAJADOR” SE OBLIGA A DESEMPEÑAR SUS FUNCIONES EN LAS INSTALACIONES DE “EL PATRON” EN CUALQUIERA DE LOS DEPARTAMENTOS, SUCURSALES U OFICINAS A QUE SEA ASIGNADO O DONDE SE REQUIERA SUS SERVICIOS Ó EN EL Ó LOS LUGARES EN DONDE “EL PATRON” REALICE ACTIVIDADES Ó TENGA OPERACIONES, EN SUS DOMICILIOS Ó EN LOS DOMICILIOS DE LAS EMPRESAS A LAS QUE SE LE PRESTEN SERVICIOS POR ORDEN Y CUENTA DE “EL PATRON” EN LA REALIZACIÓN DE LAS LABORES CONTRATADAS.', null, $JUSTIFY);

		$section->addText('“EL TRABAJADOR” EN EL ACTO DE FIRMAR EL PRESENTE CONTRATO, RECONOCE QUE SABE Y ESTÁ ENTERADO QUE “EL PATRON” TIENE OPERACIONES EN DISTINTOS LUGARES Y ESTABLECIMIENTOS, POR LO TANTO, “EL TRABAJADOR” ACEPTA Y EXPRESA SU ENTERA CONFORMIDAD COMO CONDICIÓN DE SU CONTRATACIÓN LA MOVILIDAD DE SU LUGAR, ZONA Ó ÁREA DE TRABAJO A LAS NECESIDADES DE LA OPERACIÓN, DANDO SU CONSENTIMIENTO PARA QUE “EL PATRON” EN CUALQUIER TIEMPO MODIFIQUE LUGAR DONDE PRESTARÁ SUS SERVICIOS DENTRO DE LA REPÚBLICA MEXICANA.', null, $JUSTIFY);

		$section->addText('EL TRABAJADOR" ACEPTA A SER REMOVIDO POR RAZONES ADMINISTRATIVAS O DE DESARROLLO DE LA ACTIVIDAD O PRESTACIÓN DEL SERVICIO CONTRATADO, DEBIENDOSE TRASLADAR AL LUGAR QUE "EL PATRÓN" LE ASIGNE, SIEMPRE Y CUANDO NO SE VEA MENOSCABADO SU SALARIO Y SU CATEGORIA, EN ESTE CASO "EL PATRÓN" LE COMUNICARÁ CON ANTICIPACIÓN LA REMOCIÓN DEL LUGAR DE PRESTACIÓN DE SERVICIOS INDICÁNDOLE EL NUEVO LUGAR ASIGNADO.', null, $JUSTIFY);

		$section->addText('PARA EL CASO QUE EN EL NUEVO LUGAR DE PRESTACIÓN DE SERVICIOS QUE LE FUERA ASIGNADO SE MODIFICARA EL HORARIO DE LABORES, "EL TRABAJADOR" ACEPTA ALLANARSE A DICHA MODALIDAD, SIEMPRE Y CUANDO SEA CONFORME LO QUE ESTABLECE “LA LEY”.', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('OCTAVA. ', $BOLD);
		$textrun->addText('LA DURACIÓN DE LA JORNADA DE TRABAJO SERÁ DE 8 HORAS DIARIAS EN UN HORARIO QUE SE COMPRENDERÁ DE LAS 08:00 AM HORAS A LAS A LAS 17:00 PM O BIEN DE LAS 9:00 AM A 18:00 HORAS O DE 7:00 AM A 16:00 HORAS, DE LUNES A VIERNES Y SÁBADOS DE 8:00 AM A 14:00 HORAS, LA DURACIÓN MÁXIMA DE LA JORNADA DE TRABAJO PODRÁ SER DE 48 HORAS SEMANALES, MISMA QUE DE CONFORMIDAD CON LO ESTABLECIDO POR EL ARTÍCULO 59 DE LA LEY FEDERAL DEL TRABAJO, “EL TRABAJADOR” Y “EL PATRÓN”, PODRÁN FIJAR DE ACUERDO A LAS NECESIDADES DE LA EMPRESA SIN QUE EXCEDA DE LAS 48 HORAS DE TRABAJO A LA SEMANA, OBSERVANDO EN TODO MOMENTO LO RELATIVO LOS TIPOS DE JORNADA Y DURACIÓN DE ESTAS QUE SE REFIEREN LOS ARTÍCULOS 60 Y 61 DE “LA LEY”.');

		$section->addText('DURANTE LA JORNADA CONTINUA DE TRABAJO SE CONCEDERÁ AL TRABAJADOR UN DESCANSO DE UNA HORA INTERMEDIA EN SU JORNADA DIARIA QUE SERA DE 14:00 PM HORAS A 15:00 PM HORAS, PARA DESCANSAR Y TOMAR ALIMENTOS FUERA DEL CENTRO DE TRABAJO, TIEMPO EN EL CUAL NO ESTARA BAJO NINGUNA CIRCUNSTANCIA A DISPOSICION DEL PATRON O EJECUTANDO ACTIVIDADES O LABORES PROPIAS Y/O INHERENTES A SUS LABORES, Y TENDRA EL DÍA DOMINGO COMO SU DIA DE DESCANSO O SEPTIMO DIA.', null, $JUSTIFY);

		$section->addText('"EL TRABAJADOR" ÚNICAMENTE PODRÁ LABORAR TIEMPO EXTRAORDINARIO CUANDO "EL PATRÓN" SE LO INDIQUE Y MEDIE ORDEN POR ESCRITO, LA QUE SEÑALARÁ EL DÍA O LOS DÍAS Y EL HORARIO EN EL CUAL SE DESEMPEÑARÁ EL MISMO. PARA EL CASO DE COMPUTAR EL TIEMPO EXTRAORDINARIO LABORADO DEBERÁ "EL TRABAJADOR" RECABAR Y CONSERVAR LA ORDEN REFERIDA A FIN DE QUE EN SU MOMENTO QUEDE DEBIDAMENTE PAGADO EL TIEMPO EXTRA LABORADO; LA FALTA DE PRESENTACIÓN DE ESA ORDEN SÓLO ES IMPUTABLE A "EL TRABAJADOR". LAS PARTES MANIFIESTAN QUE SALVO ESTA FORMA QUEDA PROHIBIDO EN EL CENTRO DE TRABAJO LABORAR HORAS EXTRAS.', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('“EL TRABAJADOR” ', $BOLD);
		$textrun->addText('ACEPTA QUE ');
		$textrun->addText('“LA EMPRESA” ', $BOLD);
		$textrun->addText('SE RESERVA EL DERECHO DE MODIFICAR SU JORNADA DE TRABAJO DE ACUERDO CON LAS NECESIDADES DEL CENTRO DE TRABAJO.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('NOVENA. ', $BOLD);
		$textrun->addText('EL SALARIO MENSUAL QUE RECIBIRÁ ');
		$textrun->addText('“EL TRABAJADOR” ', $BOLD);
		$textrun->addText('POR SUS SERVICIOS SERÁ DE ');
		$textrun->addText('$0,000.000 (CERO CERO CERO CERO PESOS 00/100 M.N.), ', $BOLD);
		$textrun->addText('MENOS LOS DESCUENTOS DE LEY, CUOTA SINDICAL, CUALQUIER TIPO DE PRESTAMO Y/O CREDITOS, EN LA INTELIGENCIA DE QUE EN EL PAGO DE DICHA CANTIDAD SE ENCUENTRA COMPRENDIDO EL PAGO DE LOS DÍAS DE DESCANSO SEMANALES Y OBLIGATORIOS, ASÍ COMO CUALQUIER OTRA PAGO A QUE TUVIERA DERECHO EL TRABAJADOR, EL PAGO DE SALARIO SE HARÁ EN EFECTIVO Y/O MEDIANTE DEPÓSITO BANCARIO EL CUAL DESDE ESTE MOMENTO AUTORIZA EL TRABAJADOR COMO METODO DE PAGO, EN FORMA QUINCENAL LOS DÍAS QUINCE Y ÚLTIMO DÍA DE CADA MES, EN CASO DE SER DÍA INHÁBIL SE REALIZARÁ EL PAGO EL DÍA HÁBIL INMEDIATO ANTERIOR; LA RECEPCIÓN DEL DEPÓSITO BANCARIO EN LA CUENTA DE ');
		$textrun->addText('“EL TRABAJADOR” ', $BOLD);
		$textrun->addText('ASI COMO SU RECIBO DE PAGO GENERADO A TRAVES DE UN CFDI HARÁ LAS VECES DE RECIBO DE PAGO SALARIAL, LO QUE ACEPTA');
		$textrun->addText('“EL TRABAJADOR” ', $BOLD);
		$textrun->addText('PARA LOS EFECTOS LEGALES CORRESPONDIENTES. “EL PATRÓN”, PODRÁ CAMBIAR EL SISTEMA, FECHA, LUGAR O FORMA DE PAGO SIN QUE SEA NECESARIA LA AUTORIZACIÓN DE ');
		$textrun->addText('“EL TRABAJADOR”', $BOLD);
		$textrun->addText('.', $BOLD);


		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DECIMA. ', $BOLD);
		$textrun->addText('"EL TRABAJADOR" TENDRÁ DERECHO POR CADA SEIS DÍAS DE LABORES A DESCANSAR UNO CON EL PAGO DE SALARIO DIARIO CORRESPONDIENTE, ESTE SERA CONOCIDO COMO SÉPTIMO DIA, ESTE SEPTIMO DIA O DIA DE DESCANSO SEMANAL SERA EL DIA DOMINGO O BIEN, PODRA SER DETERMINADO CONFORME A LAS NECESIDADES DE “EL PATRON”.');

		$section->addText('DE ACUERDO A LO DISPUESTO POR EL ARTÍCULO 74 DE LA LEY FEDERAL DEL TRABAJO, SERÁN DÍAS DE DESCANSO OBLIGATORIO: EL 1 DE ENERO, EL PRIMER LUNES DE FEBRERO EN CONMEMORACIÓN DEL DIA DE PROMULGACIÓN DE LA CONSTITUCIÓN MEXICANA, EL TERCER LUNES DEL MES DE MARZO EN CONMEMORACIÓN DEL NATALICIO DE BENITO JUAREZ, 1 DE MAYO, 16 DE SEPTIEMBRE, EL TERCER LUNES DEL MES DE NOVIEMBRE EN CONMEMORACIÓN DEL ANIVERSARIO DE LA REVOLUCION MEXICANA Y EL 1 DE DICIEMBRE DE CADA 6 AÑOS CUANDO CORRESPONDA A LA TRANSMISIÓN DEL PODER EJECUTIVO FEDERAL, EL 25 DE DICIEMBRE, EN LOS QUE SE OTORGARÁ DESCANSO A “EL TRABAJADOR” CON GOCE DE SUELDO.', null, $JUSTIFY);

		$section->addText('LOS TRABAJADORES NO ESTÁN OBLIGADOS A PRESTAR SERVICIOS EN SUS DÍAS DE DESCANSO. SI SE QUEBRANTA ESTA DISPOSICIÓN, EL PATRÓN PAGARÁ AL TRABAJADOR, INDEPENDIENTEMENTE DEL SALARIO QUE LE CORRESPONDA POR EL DESCANSO, UN SALARIO DOBLE POR EL SERVICIO PRESTADO, COMO LO ESTABLECE EL ARTICULO 73 DE "LA LEY".', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DECIMA PRIMERA. ', $BOLD);
		$textrun->addText('CUANDO "EL TRABAJADOR" POR RAZONES ADMINISTRATIVAS TENGA QUE LABORAR EL DÍA DOMINGO, "EL PATRÓN" LE PAGARÁ, ADEMÁS DE SU SALARIO, 25% (VEINTICINCO POR CIENTO) COMO PRIMA DOMINICAL SOBRE EL SALARIO ORDINARIO DEVENGADO. INDEPENDIENTEMENTE DEL DÍA DE DESCANSO SEMANAL, AL QUE TENDRÁ DERECHO');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA SEGUNDA. ', $BOLD);
		$textrun->addText('"EL TRABAJADOR" TENDRÁ DERECHO A DISFRUTAR DE UN PERIODO ANUAL DE VACACIONES SEGÚN LO ESTABLECIDO EN EL ARTÍCULO 76 DE "LA LEY", TOMANDO EN CONSIDERACIÓN LA ANTIGÜEDAD DE “EL TRABAJADOR”, ASÍ COMO A DISFRUTAR DEL SALARIO EN DICHO PERIODO. DE IGUAL MODO RECIBIRÁ LA PRIMA VACACIONAL RESPECTIVA, EQUIVALENTE AL 25% DEL IMPORTE PAGADO POR CONCEPTO DE VACACIONES, LA CUAL LE SERA ENTREGADA QUINCE DIAS ANTES DE QUE COMIENZE SU PERIODO VACACIONAL.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA TERCERA. ', $BOLD);
		$textrun->addText('"EL TRABAJADOR" TENDRÁ DERECHO A RECIBIR POR PARTE DE "EL PATRÓN", ANTES DEL DÍA 20 DE DICIEMBRE DE CADA AÑO, EL IMPORTE CORRESPONDIENTE A QUINCE DÍAS DE SALARIO COMO PAGO DEL AGUINALDO A QUE SE REFIERE EL ARTÍCULO 87 DE "LA LEY", O SU PARTE PROPORCIONAL DEPENDIENDO DEL TIEMPO TRABAJADO.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA CUARTA. ', $BOLD);
		$textrun->addText('"EL TRABAJADOR" DEBERÁ PRESENTARSE PUNTUALMENTE A SUS LABORES EN EL HORARIO DE TRABAJO ESTABLECIDO Y FIRMAR LAS LISTAS DE ASISTENCIA ACOSTUMBRADAS O CHECAR SU TARJETA DE ASISTENCIA EN EL RELOJ CHECADOR DIARIAMENTE.');

		$section->addText('EN CASO DE RETRASO Y/O FALTA DE ASISTENCIA INJUSTIFICADA, PODRÁ "EL PATRÓN" IMPONERLE CUALQUIER CORRECCIÓN DISCIPLINARIA QUE CONSIDERE APLICABLE, CONFORME AL REGLAMENTO VIGENTE.', null, $JUSTIFY);

		$section->addText('CUANDO “EL TRABAJADOR” POR CUALQUIER CIRCUNSTANCIA SE VEA OBLIGADO A FALTAR A SUS LABORES, DEBERÁ AVISAR A “EL PATRON”, A MÁS TARDAR DENTRO DE LA PRIMERA HORA DE SU JORNADA DE LABORES. EL AVISO NO JUSTIFICA LA FALTA, PUES EN TODO CASO, “EL TRABAJADOR” AL REGRESAR A SUS LABORES, DEBERÁ JUSTIFICAR SU AUSENCIA CON EL COMPROBANTE RESPECTIVO QUE EN CASO DE ENFERMEDAD SERÁ EL CERTIFICADO DE INCAPACIDAD EXPEDIDO POR EL IMSS, SI “EL TRABAJADOR” FALTARE A SUS LABORES POR CUALQUIER OTRA CAUSA, DEBERÁ JUSTIFICARLO PLENAMENTE A “EL PATRON” CON LOS COMPROBANTES QUE A JUICIO DE ÉSTA SEAN NECESARIOS. CUANDO “EL TRABAJADOR” SOLICITE PERMISOS CON O SIN GOCE DE SUELDO, DEBERÁ RECABAR, EN TODO CASO, CONSTANCIA ESCRITA DE “EL PATRON”, SIN CUYO REQUISITO SE CONSIDERARÁ FALTA INJUSTIFICADA. ', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DECIMA QUINTA. ', $BOLD);
		$textrun->addText('SIN PERJUICIO DE LOS ESTIPULADO EN EL PRESENTE CONTRATO Y EN LA LEY, SE RECONOCE QUE CUANDO “EL TRABAJADOR” TENGA MAS DE TRES FALTAS INJUSTIFICADAS EN UN PERIODO DE TREINTA DIAS SE PROCEDERA A APLICAR DE MANERA INMEDIATA EL SUPUESTO CONTEMPLADO EN EL ARTICULO 47, FRACCION X DE LA LEY, AL EFECTO DE RESCINDIR DE MANERA UNILATERAL LA RELACION DE TRABAJO SIN RESPONSABILIDAD PARA “EL PATRON”.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA SEXTA. ', $BOLD);
		$textrun->addText('"EL PATRON" SE OBLIGA A CAPACITAR O A ADIESTRAR A “EL TRABAJADOR” DE ACUERDO A LOS PLANES Y PROGRAMAS QUE EXISTEN O SE ESTABLEZCAN REFERENTE A TRABAJOS EVENTUALES O TEMPORALES Y " EL EMPLEADO" POR SU PARTE SE OBLIGA A CUMPLIR CON LOS PROGRAMAS, CURSOS, SESIONES DE GRUPO Y ACTIVIDADES QUE FORMEN PARTE DE LOS MISMOS Y A PRESENTAR LOS EXÁMENES DE EVALUACIÓN DE CONOCIMIENTOS Y APTITUDES QUE LE SEAN REQUERIDOS ASÍ COMO A ATENDER LAS INDICACIONES DE LAS PERSONAS QUE IMPARTAN LA CAPACITACIÓN O ADIESTRAMIENTO.');

		$section->addText('“EL TRABAJADOR” SE OBLIGA A PRESENTARSE Y ASISTIR A LOS CURSOS DE CAPACITACIÓN Y ADIESTRAMIENTO, QUE SE IMPARTAN EN LA FUENTE DE TRABAJO O EN LA SECRETARIA DE TRABAJO Y PREVISION SOCIAL O EN LOS LOCALES DESIGNADOS PARA TAL EFECTO, EN LAS FECHAS Y HORARIOS QUE SE DETERMINEN, PROCURANDO QUE ESTOS SE IMPARTAN DENTRO DE LA JORNADA DE TRABAJO, AL EFECTO DE QUE ESTO LE PERMITA ELEVAR SU NIVEL DE VIDA, COMPETENCIA LABORAL Y PRODUCTIVIDAD, CONFORME A LOS PLANES Y PROGRAMAS QUE ESTABLEZCAN LAS AUTORIDADES, “EL PATRON”, O CUALQUIER OTRA DEPENDENCIA O INSTITUCION ACREDITADA, LO ANTERIOR EN BASE AL CAPÍTULO 3 BIS DEL TÍTULO IV DE “LA LEY”.', null, $JUSTIFY);

		$section->addText('“EL TRABAJADOR” SE OBLIGA A OBSERVAR LAS DISPOSICIONES CONTENIDAS EN EL REGLAMENTO Y LAS NORMAS OFICIALES MEXICANAS EN MATERIA DE SEGURIDAD, SALUD Y MEDIO AMBIENTE DE TRABAJO, ASI COMO LAS QUE INDIQUEN “EL PATRON” PARA SU SEGURIDAD Y PROTECCION PERSONAL.', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA SEPTIMA. ', $BOLD);
		$textrun->addText('"EL TRABAJADOR" ACEPTA SOMETERSE A LOS EXÁMENES MÉDICOS QUE PERIÓDICAMENTE ESTABLEZCA "EL PATRÓN" EN LOS TÉRMINOS DEL ARTICULO 134 FRACCIÓN X DE "LA LEY", A FIN DE MANTENER EN FORMA ÓPTIMA SUS FACULTADES FÍSICAS E INTELECTUALES, PARA EL MEJOR DESEMPEÑO DE SUS FUNCIONES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA OCTAVA. ', $BOLD);
		$textrun->addText('“EL PATRON” Y “EL TRABAJADOR” SE OBLIGAN EN TODO TIEMPO Y LUGAR A CUMPLIR CON LAS OBLIGACIONES QUE “LA LEY” LES IMPONEN EN TÉRMINOS DE LO ESTABLECIDO POR LOS ARTÍCULOS 132 AL 135, LOS CUALES LE HAN SIDO EXPLICADOS DE MANERA INTEGRA. CLARA, PRECISA, Y LOS CUALES HA COMPRENDIDO EN SU TOTALIDAD “EL TRABAJADOR.”');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('DÉCIMA NOVENA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR” SABE Y ENTIENDE QUE TODA LA INFORMACIÓN QUE EXISTE Y LLEGUE A EXISTIR DE “EL PATRON” MOTIVO DE LA CONSECUCIÓN DE SUS FINES TIENE EL CARÁCTER DE “CONFIDENCIAL”, YA SEA INFORMACIÓN PROPIA Y/O DE TERCEROS. “EL TRABAJADOR” SABE Y ENTIENDE QUE TODA LA INFORMACIÓN QUE EXISTE Y LLEGUE A EXISTIR EN EL FOJAL MOTIVO DE LA CONSECUCIÓN DE SUS FINES TIENE EL CARÁCTER DE “CONFIDENCIAL”, YA SEA INFORMACIÓN PROPIA Y/O DE TERCEROS.');

		$section->addText('“EL TRABAJADOR” SE OBLIGA A NO EXTRAER, HACER USO, APROVECHAR, MOSTRAR, COMUNICAR, DIVULGAR, REVELAR, NEGOCIAR, VENDER, PERMUTAR, O TRANSFERIR POR CUALQUIER MEDIO, CUALQUIER TIPO DE INFORMACIÓN QUE HASTA EL MOMENTO CONOZCA O TENGA EN SU PODER O EN UN FUTURO LLEGUE A CONOCER O LLEGUE A TENER EN SU PODER, MATERIA O CON MOTIVO DEL DESEMPEÑO DE SUS FUNCIONES O DE LOS COLABORADORES DE “EL PATRON”, POR NINGÚN MEDIO EXISTENTE O QUE LLEGARA A EXISTIR, SI NO ESTÁ EXPRESAMENTE ESTABLECIDO EN SU CONTRATO DE TRABAJO, O EN SU PERFIL DE PUESTO, U OBRA ESCRITO YA SEA EN DOCUMENTO FÍSICO O EN ELECTRÓNICO POR LA VÍA OFICIAL, EN EL QUE PERSONA FACULTADA DE EL PATRON, LE AUTORICE PARA TRANSMITIR ESPECÍFICAMENTE DETERMINADA INFORMACIÓN A DETERMINADO SUJETO O ENTIDAD. “EL TRABAJADOR” SABE Y ENTIENDE LOS ALCANCES DE ESTA CLÁUSULA, ASÍ COMO DE LA GRAVEDAD DE NO GARANTIZAR O DE VIOLAR LA “CONFIDENCIALIDAD” DE LA INFORMACIÓN MATERIA DEL PRESENTE CONTRATO, INDEPENDIENTEMENTE DE LOS DAÑOS Y PERJUICIOS QUE SE PUDIERAN OCASIONAR AL PROPIO PATRON Y/O A TERCEROS.', null, $JUSTIFY);

		$section->addText('“EL TRABAJADOR” RECONOCE QUE SON PROPIEDAD EXCLUSIVA DE “EL PATRON”, EN TODO TIEMPO Y LUGAR, ARTÍCULOS, ESTUDIOS, MAQUINARIA, FOLLETOS PUBLICITARIOS, MANUALES DE PROCEDIMIENTOS, TÉCNICA, EQUIPOS, UNIDADES, HERRAMIENTAS, MATERIALES ETC., ASÍ COMO TODOS LOS DOCUMENTOS E INFORMACIÓN VERBAL QUE SE LE PROPORCIONE CON MOTIVO DE LA RELACIÓN DE TRABAJO, Y LOS QUE “EL TRABAJADOR” PREPARE O FORMULE EN RELACIÓN CON SUS SERVICIOS.', null, $JUSTIFY);

		$section->addText('EN TAL VIRTUD “EL TRABAJADOR” SE OBLIGA A CUIDAR DE DICHOS INSTRUMENTOS, Y DEVOLVERLOS A “EL PATRON” AL TERMINO DE SU RELACIÓN DE TRABAJO, HACIÉNDOSE RESPONSABLE POR EL USO Y DESTINO QUE DE A LOS MISMOS Y OBLIGÁNDOSE A CUBRIR SU COSTO EN CASO DE PERDIDA, ROBO O EXTRAVIÓ, SIN NINGUNA RESPONSABILIDAD PARA “EL PATRON”, LOS CUALES LE SERÁN DESCONTADOS DIRECTAMENTE DE SUS SALARIOS EN LOS TÉRMINOS ESTABLECIDOS POR LA LEY O DE SU FINIQUITO AL TERMINO DE SU RELACIÓN LABORAL SI TUVIESE DERECHO AL MISMO.', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR” SE OBLIGA DURANTE LA VIGENCIA DE ESTE CONTRATO,  ASÍ COMO DESPUÉS DE SU TERMINACIÓN O RESCISIÓN, A NO DIVULGAR NI UTILIZAR CUALQUIER ASPECTO O INFORMACIÓN RELACIONADA CON LOS NEGOCIOS, ACTIVIDADES Y OPERACIONES DE “EL PATRON” O DE LOS CLIENTES DE ÉSTE, QUE FUERAN DE SU CONOCIMIENTO CON MOTIVO DE LA RELACIÓN DE TRABAJO, NI PROPORCIONARÁ A TERCEROS, DIRECTA O INDIRECTAMENTE, INFORMACIÓN VERBAL O POR ESCRITO SOBRE LOS MÉTODOS, SISTEMAS Y ACTIVIDADES DE CUALQUIER CLASE QUE SE RELACIONEN CON “EL PATRON” Y LOS CLIENTES DURANTE EL DESARROLLO DE SUS ACTIVIDADES.');

		$section->addText('TAMPOCO DIVULGARÁ EL CONTENIDO DE LOS DOCUMENTOS, ESTUDIOS, PROGRAMAS, PROPUESTAS, ETC., EN GENERAL CUALQUIER DOCUMENTO QUE SE LE HUBIERE PROPORCIONADO O FACILITADO DURANTE EL DESEMPEÑO; IGUALMENTE QUEDA OBLIGADO A NO SERVIRSE POR SU PROVECHO PERSONAL O DE TERCEROS DE LAS PATENTES, MARCAS Y DERECHOS DE AUTOR DE “EL PATRÓN”. PARA EL CASO DE QUE “EL TRABAJADOR” INCUMPLA EL CONTENIDO DE ESTA CLAUSULA, “EL PATRÓN” PODRÁ INMEDIATAMENTE Y DE MANERA DIRECTA SOLICITARLE LE REPARE EL DAÑO MORAL Y/O PATRIMONIAL OCASIONADO CON INDEPENDENCIA DE LAS RESPONSABILIDADES CIVILES Y/O PENALES QUE PUDIERA GENERAR SU ACTUAR.', null, $JUSTIFY);

		$section->addText('“EL TRABAJADOR”, PARA EVITAR UNA COMPETENCIA DESLEAL, PLAGIO, O CUALQUIER OTRO ACTO QUE SE PUEDA TIPIFACAR, Y CON EL CUAL LE PUDIERAN FINCAR UNA RESPONSABILIDAD CIVIL, PENAL, MERCANTIL, SE OBLIGA EXPRESAMENTE, A NO TRABAJAR, DEDICARSE, COLABORAR, VENDER, PRESTAR SUS SERVICIOS COMO PROFESIONISTA O DE CUALQUIER OTRA FORMA O CONCEPTO, ASESORAR DE CUALQUIER FORMA O CONCEPTO, SER PROMOTOR DE VENTAS, COMISIONISTA, INTERVENIR, PARTICIPAR, O DE ALGUNA FORMA INVOLUCRARSE, RELACIONARSE O DEDICAR SUS ACTIVIDADES, TRABAJO O LABORES POR SU PROPIA CUENTA, POR SI O PARA OTROS, EN ACTIVIDADES SIMILARES QUE SE RELACIONEN CON EL GIRO QUE TIENE ESTA EMPRESA Y QUE EN EL OBJETO SOCIAL DE LA MISMA SE MENCIONAN DE MANERA ENUNCIATIVA Y NO LIMITATIVA, EL CUAL CONOCE PERFECTAMENTE DESDE ESTE MOMENTO PUES SON LAS MISMAS QUE SE MENCIONAN EN EL PROEMIO DEL PRESENTE CONTRATO, DE IGUAL FORMA” EL TRABAJADOR”, CON LOS ALCANCES MENCIONADOS, SE OBLIGA A NO ACERCARSE, DIRECTA O INDIRECTAMENTE POR SI O POR CONDUCTO DE OTRA PERSONA, CON LOS CLIENTES QUE TIENE ESTA EMPRESA A NIVEL NACIONAL Y LOS PROSPECTOS DE CLIENTES QUE PUDIERA TENER A NIVEL NACIONAL, LOS EFECTOS DE ESTA CLAUSULA SERAN DE DOS AÑOS CONTADOS A PARTIR DE QUE “EL TRABAJADOR” DEJE DE PRESTAR SUS SERVICIOS A LA EMPRESA, CUALQUIERA QUE SEA LA CAUSA O MOTIVO CON LA QUE SE DE POR TERMINADA LA RELACION DE TRABAJO, INCLUSO SI ESTE LLEGARA A DEMANDAR SE TOMARA EN CUENTA EL ULTIMO DIA QUE DIGA QUE LABORA.', null, $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA PRIMERA. ', $BOLD);
		$textrun->addText('EN CASO DE QUE "EL TRABAJADOR" INCUMPLA CON LAS OBLIGACIONES A SU CARGO, PREVISTAS EN LAS CLAUSULAS QUE ANTECEDEN; PAGARÁ A "EL PATRON", INDEPENDIENTEMENTE DE LA RESPONSABILIDAD CIVIL, PENAL O MERCANTIL O CUALQUIER OTRA QUE PUDIERA TENER, ADEMAS, UNA INDEMNIZACIÓN EQUIVALENTE AL MONTO DE LOS DAÑOS Y PERJUICIOS QUE POR ESTE CONCEPTO SE GENERASEN, LA CUAL DETERMINARA “EL PATRON” SIN NECESIDAD DE QUE TENGA QUE ACREDITAR EL MONTO REQUERIDO, SOLO BASTARA CON QUE LO REQUIERA, ADEMÁS DE LAS CANTIDADES QUE SE GENEREN POR CONCEPTO DE GASTOS DE ABOGADOS Y DEL PROCEDIMIENTO JUDICIAL QUE "EL PATRON" TENGA QUE PROMOVER EN CONTRA DE "EL TRABAJADOR".');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA SEGUNDA. ', $BOLD);
		$textrun->addText('“EL TRABAJADOR”, DURANTE EL DESEMPEÑO DE SUS FUNCIONES SE RESPONSABILIZA POR CUALQUIER ACTO U OMISIÓN, INTENCIONAL O NEGLIGENTE QUE LLEGASE A CAUSAR DAÑO A LOS BIENES O AL PERSONAL DE “EL PATRON”, FACULTANDO A “EL PATRON” A DESCONTAR DE SUS SALARIOS EN TÉRMINOS DE LEY LAS CANTIDADES QUE RESULTEN POR LOS DAÑOS OCASIONADOS O EN SU CASO DEL FINIQUITO QUE LE PUDIERA CORRESPONDER, SIN PERJUICIO DE LAS RESPONSABILIDADES CIVILES Y/O PENALES QUE PUDIERA GENERAR SU ACTUAR.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA TERCERA. ', $BOLD);
		if ($empresa == 'RASTREO SATELITAL DE MEXICO J&J S.A DE C.V') {
			$textrun->addText('“EL TRABAJADOR” MANIFIESTA CONOCER PERFECTAMENTE EL ALCANCE Y PROCEDIMIENTOS DEL AVISO DE PRIVACIDAD QUE OPERA EN LA EMPRESA RASTREO SATELITAL DE MÉXICO J&J, S.A. DE C.V. PARA EFECTOS DE QUE SE VEA SALVAGUARDADA LA INFORMACION DE SUS DATOS PERSONALES ASI COMO LA CANCELACION EN EL USO DE ESTOS.');
		}else{
			$textrun->addText('“EL TRABAJADOR” MANIFIESTA CONOCER PERFECTAMENTE EL ALCANCE Y PROCEDIMIENTOS DEL AVISO DE PRIVACIDAD QUE OPERA EN LA EMPRESA ESTEVEZ.JOR SERVICIOS S.A DE C.V PARA EFECTOS DE QUE SE VEA SALVAGUARDADA LA INFORMACION DE SUS DATOS PERSONALES ASI COMO LA CANCELACION EN EL USO DE ESTOS.');

		}

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA CUARTA. ', $BOLD);
		$textrun->addText('“LAS PARTES ESTABLECEN EN TÉRMINOS DE LO DISPUESTO POR LOS ARTÍCULOS 2, 3,  DE LA LEY, ');
		$textrun->addText('NORMA OFICIAL MEXICANA NMX-R-025-SCFI-2015, REFERENTE A LA IGUALDAD LABORAL Y NO DISCRIMINACIÓN ', $BOLD);
		$textrun->addText('QUE ');
		$textrun->addText('“EL PATRON” ', $BOLD);
		$textrun->addText('RESPETA PLENAMENTE LA DIGNIDAD HUMANA, PROPICIA EL TRABAJO DIGNO Y DECENTE EN TODAS LAS RELACIONES LABORALES, PROMUEVE LA IGUALDAD SUSTANTIVA ENTRE TRABAJADORES Y TRABAJADORAS, SE OTORGA LAS MISMAS OPORTUNIDADES A ESTOS, CONSIDERANDO LAS DIFERENCIAS BIOLÓGICAS, SOCIALES, Y CULTURALES DE MUJERES Y HOMBRES; POR ELLO NO EXISTE DISCRIMINACIÓN POR ORIGEN ÉTNICO O NACIONAL, IDENTIDAD DE GÉNERO, EDAD, DISCAPACIDAD, CONDICIÓN SOCIAL, CONDICIONES DE SALUD, RELIGIÓN, CONDICIÓN MIGRATORIA, OPINIONES, PREFERENCIAS SEXUALES O ESTADO CIVIL, SE PROMUEVE LA INCLUSION LABORAL Y SIN EXCEPCIÓN ALGUNA TODOS LOS TRABAJADORES TENDRÁN LOS MISMOS DERECHOS Y OBLIGACIONES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA QUINTA. ', $BOLD);
		$textrun->addText('“EL PATRON” MANIFIESTA QUE TRATANDOSE DE MUJERES Y MENORES SE ESTARA A LO ESTABLECIDO EN EL TITULO QUINTO, TITULO QUINTO BIS, DE “LA LEY” Y DEMAS ARTICULOS Y DISPOSICIONES RELATIVAS Y APLICABLES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA SEXTA. ', $BOLD);
		$textrun->addText('“EN CUMPLIMIENTO A LO SEÑALADO POR LOS ARTÍCULOS 501 Y 25, AMBOS DE LA LEY, EN ESTE ACTO MANIFIESTO QUE SEÑALO COMO MI LEGITIMO BENEFICIARIO DE TODOS LOS BIENES, PRESTACIONES LEGALES, EXTRALEGALES, SALARIOS DEVENGADOS, INDEMNIZACIONES Y/O CUALQUIER OTRO CONCEPTO A QUE TENGA DERECHO O QUE HAYA GENERADO Y QUE POR LEY ME CORRESPONDA A : ___________________________________________ ');		
		$textrun->addText(', PERSONA QUE EN MI AUSENCIA POR ALGUNA DE LAS CAUSAS PREVISTAS EN LOS PRECEPTOS SEÑALADOS, TIENE EL DERECHO DE RECLAMAR Y QUE SE LE PAGUEN LOS CONCEPTOS MENCIONADOS QUE POR LEY ME CORRESPONDAN, PERSONA QUE DEPENDE ECONÓMICAMENTE DE MÍ YA QUE YO ME ENCARGO DE SUFRAGAR TODOS LOS GASTOS QUE SE TIENEN EN LA CASA QUE HABITAMOS DE MANERA COMÚN, LO ANTERIOR PARA TODOS LOS EFECTOS LEGALES A QUE HAYA LUGAR.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA SEPTIMA. ', $BOLD);
		$textrun->addText('EN TEMAS DE SEGURIDAD E HIGIENE, EL TRABAJADOR, MANIFIESTA QUE SE OBLIGA A OBSERVAR TODAS LAS MEDIDAS Y NORMAS QUE APLICAN EN LA EMPRESA PARA PREVENIR ACCIDENTES, ENFERMEDADES Y LAS MEDIDAS DE SEGURIDAD E HIGIENE QUE SEÑALE LA COMISION MIXTA DE SEGURIDAD E HIGIENE O SALUD EN EL TRABAJO, QUE SE ENCUENTRA INTEGRAGA Y EN FUNCIONES EN LA EMPRESA ASI COMO LAS DISPOSICIONES QUE AL RESPECTO SEÑALEN LAS AUTORIDADES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA OCTAVA. ', $BOLD);
		$textrun->addText('EL PATRON LE HACE SABER AL TRABAJADOR QUE TIENE TOTAL LIBERTAD EN INTEGRAR LAS COMISIONES QUE SE INTEGREN EN LA EMPRESA CON MOTIVO DE LA CORRECTA APLICACIÓN, SUPERVISION, DE LAS CONDICIONES GENERALES DE TRABAJO Y RESPETO A SUS DERECHOS LABORALES Y A SUS DERECHOS HUMANOS.');


		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('VIGESIMA NOVENA. ', $BOLD);
		$textrun->addText('EL PATRON, RESPETA, SE OBLIGA Y GARANTIZA LA LIBERTAD SINDICAL QUE EN TERMINOS DE LEY TIENE EL TRABAJADOR. Y LE OTORGARA, LOS MEDIOS NECESARIOS PARA CUMPLIMENTAR SUS DERECHOS CONSAGRADOS EN LA LEY Y EN LA CONSTITUCIÓN POLÍTICA DE LOS ESTADOS UNIDOS MEXICANOS.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA QUE TRATANDOSE DE “REPARTO DE UTILIDADES”, SI AL TRABAJADOR LE CORRESPONDE ALGUNA SUMA POR ESTE CONCEPTO LA MISMA LE SERA ENTREGADA EN LOS TIEMPOS QUE SEÑALA LA LEY, SALVO QUE EXISTAN OBJECIONES AL DICTAMEN, SI POR ALGUNA CIRCUNSTANCIA EL TRABAJADOR YA NO LABORARA PARA EL PATRON, LA CANTIDAD QUE LE CORRESPONDA PODRA RECIBIRLA EN LAS INSTALACIONES DE EL PATRON.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA PRIMERA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA QUE EL TRABAJADOR GOZARA LOS BENEFICIOS DE LA SEGURIDAD SOCIAL A TRAVES DEL INSTITUTO MEXICANO DEL SEGURO SOCIAL ENTIDAD DONDE SERA COTIZADO, ASI COMO EN EL INSTITUTO DEL FONDO NACIONAL DE LA VIVIENDA PARA LOS TRABAJADORES Y EL SISTEMA DE AHORRO PARA EL RETIRO. Y TENDRA ACCESO AL INSTITUTO DEL FONDO NACIONAL PARA EL CONSUMO DE LOS TRABAJADORES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA SEGUNDA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA QUE EN EL CENTRO DE TRABAJO SE HA IMPLEMENTADO DE MANERA CONJUNTA Y DE COMUN ACUERDO CON LOS TRABAJADORES, UN PROTOCOLO PARA PREVENIR LA DISCRIMINACIÓN POR RAZONES DE GÉNERO Y ATENCIÓN DE CASOS DE VIOLENCIA Y ACOSO U HOSTIGAMIENTO SEXUAL, ASÍ COMO ERRADICAR EL TRABAJO FORZOSO E INFANTIL.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA TERCERA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA QUE CONFORME A LA LEY OTORGARA A EL TRABAJADOR PERMISO DE PATERNIDAD DE CINCO DÍAS LABORABLES CON GOCE DE SUELDO, A LOS HOMBRES TRABAJADORES, POR EL NACIMIENTO DE SUS HIJOS Y DE IGUAL MANERA EN EL CASO DE LA ADOPCIÓN DE UN INFANTE. DE IGUAL FORMA CUMPLIR CON LA DISPOSICION ESTABLECIDA POR EL ARTICULO 140 BIS DEL LA LEY DEL SEGURO SOCIAL, RESPECTO A LAS LICENCIAS POR CUIDADOS MEDICOS POR HIJOS MENORES 16 AÑOS DIAGNOSTICADOS CON CUALQUIER TIPO DE CANCER.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA CUARTA. ', $BOLD);
		$textrun->addText('LAS PARTES ESTABLECEN QUE TRATANDOSE DE TELETRABAJO EN CASO DE QUE ESTE SE DE, SE ESTARA A LO DISPUESTO POR EL TITULO CUARTO, CAPITULO XII BIS, TELETRABAJO,');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA QUINTA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA TENER IMPLEMENTADAS LAS DISPOSICIONES PREVISTAS POR LA NOM-035-STPS-2018, FACTORES DE RIESGO PSICOSOCIAL EN EL TRABAJO-IDENTIFICACIÓN, ANÁLISIS Y PREVENCIÓN Y LA NOM-036-1-STPS-2018, FACTORES DE RIESGO ERGONÓMICO EN EL TRABAJO-IDENTIFICACIÓN, ANÁLISIS, PREVENCIÓN Y CONTROL, LOS CUALES DEBE OBSERVAR EL TRABAJADOR EN LA EJECUCION DE SUS LABORES.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA SEXTA. ', $BOLD);
		$textrun->addText('EL PATRON MANIFIESTA A EL TRABAJADOR QUE CON EL OBJETO DE PREVENIR Y ERRADICAR EL VIRUS COVID 19 Y LAS VARIANTES EN QUE SE MANIFIESTA, TIENE IMPLEMENTADO EN EL CENTRO DE TRABAJO, MEDIDAS Y PROTOCOLOS SANITARIOS, QUE DEBERA OBSERVAR Y CUMPLIR DE MANERA OBLIGATORIA DURANTE TODA SU ESTANCIA EN EL CENTRO DE TRABAJO, ESTE O NO EN EJECUCION DE SUS FUNCIONES ASIGNADAS.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA SEPTIMA. ', $BOLD);
		$textrun->addText('LAS PARTES DESDE ESTE MOMENTO MANIFIESTAN QUE TODO LO NO ESTIPULADO EXPRESAMENTE EN ESTE CONTRATO Y QUE POR OMISIÓN NO SE INCLUYÓ PERO QUE SE ENCUENTRE CONTEMPLADO EN LA LEY, REGLAMENTO, SUS LEYES SUPLETORIAS, JURISPRUDENCIA, LA COSTUMBRE COMO FUENTE DEL DERECHO QUE NO REPRESENTE RENUNCIA DE DERECHOS Y QUE BENEFICIE Y FAVOREZCA A LOS TRABAJADORES; CONVIENEN DESDE ESTE MOMENTO EN TENERLO COMO PACTADO COMO SI A LA LETRA FUERE Y SE OBLIGAN A ESTAR Y PASAR POR DICHA REGULACIÓN CON FUNDAMENTO EN LO ESTABLECIDO POR LOS ARTÍCULOS 5, 6 Y 18 DE LA LEY FEDERAL DEL TRABAJO.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('TRIGESIMA OCTAVA. ', $BOLD);
		$textrun->addText('“LAS PARTES” CONVIENEN QUE EN CASO DE CONTROVERSIA SE ESTARÁ A LO ESTABLECIDO EN EL PRESENTE Y EN LO QUE FUERE OMISO SE ENTENDERÁ A LO DISPUESTO POR LA LEY FEDERAL DEL TRABAJO BAJO LA JURISDICCIÓN DEL TRIBUNAL LABORAL DEL ESTADO DE MEXICO, COMO PRIMERA OPCIÓN.');

		$section->addText('LEÍDO QUE FUE POR LAS PARTES EL DOCUMENTO E IMPUESTOS DEL CONTENIDO Y CONSCIENTES DE LAS OBLIGACIONES QUE SE GENERAN, ASÍ COMO LAS QUE LA LEY IMPONE, LAS PARTES LO RATIFICAN EN TODAS Y CADA UNA DE SUS PARTES Y LO SUSCRIBEN POR DUPLICADO EL ' . $fecha . ', QUEDANDO UN EJEMPLAR EN PODER DE CADA PARTE.', null, $JUSTIFY);

		$table = $section->addTable(array('cellMargin'=>80, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('"EL PATRON"', $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(4000, null)->addText('“EL TRABAJADOR”', $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addRow();
		$cell = $table->addCell(4000);
		if($empresa == 'GRUPO BACK BONE DE MEXICO S.A DE C.V'){
		$cell->addText('JORGE ESTEVEZ ABREU', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		}
		elseif($empresa == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$cell->addText('LIC. JORGE ESTEVEZ GONZALEZ', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		}else{
		$cell->addText('GUSTAVO JUAREZ MENDOZA', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		}		
		$cell->addText('APODERADO LEGAL', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$cell->addText($empresa, $BOLD_CENTER, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(4000, null)->addText($nombre, $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));

		$section->addPageBreak();

		/*$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(null, null);
		$cell->addText('C E D U L A         D E      I D E N T I F I C A C I O N', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		
		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(1000, null);
		$cell->addText('NOMBRE: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottnullor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(2200, null);
		$cell->addText('ENFERMEDAD O ALERGIA: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(1600, null);
		$cell->addText('TIPO DE SANGRE: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(800, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(600, null);
		$cell->addText('EDAD: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(600, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(2900, null);
		$cell->addText('EN CASO DE ACCIDENTE AVISARA: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(1500, null);
		$cell->addText('PARENTESCO: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(1200, null);
		$cell->addText('TELÉFONO: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(null, null);
		$cell->addText('O B S E R V A C I O N E S', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));

		$section->addTextBreak(25);
		$table = $section->addTable(array('cellMargin'=>80, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. '.$nombre, $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		
		$section->addPageBreak();

		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(null, null);
		$cell->addText('C E D U L A         D E      I D E N T I F I C A C I O N', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		
		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(1000, null);
		$cell->addText('NOMBRE: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottnullor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(2200, null);
		$cell->addText('ENFERMEDAD O ALERGIA: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(1600, null);
		$cell->addText('TIPO DE SANGRE: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(800, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(600, null);
		$cell->addText('EDAD: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(600, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(2900, null);
		$cell->addText('EN CASO DE ACCIDENTE AVISARA: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(1500, null);
		$cell->addText('PARENTESCO: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(1200, null);
		$cell->addText('TELÉFONO: ', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));
		$cell = $table->addCell(null, array('borderBottomColor' => '000000', 'borderBottomSize' => 5));
		$cell->addText('', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'left'));

		$section->addTextBreak(null, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'center', 'width' => 100*50, 'unit' => \PhpOffice\PhpWord\Style\Table::WIDTH_PERCENT));
		$table->addRow();
		$cell = $table->addCell(null, null);
		$cell->addText('O B S E R V A C I O N E S', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));

		$section->addTextBreak(25);
		$table = $section->addTable(array('cellMargin'=>80, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. '.$nombre, $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		
		$section->addPageBreak();*/

		$section->addText('MANIFESTACIÓN DE NO ADEUDO', $BOLD_UNDERLINE, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('QUIEN SUSCRIBE, C ' . $nombre . ' POR MEDIO DEL PRESENTE, MANIFIESTO  BAJO PROTESTA DE DECIR VERDAD QUE A LA PRESENTE FECHA ');
		$textrun->addText('NO TENGO ADEUDOS PENDIENTES', $BOLD_UNDERLINE);
		$textrun->addText(' CON EL INSTITUTO DEL FONDO NACIONAL DE LA VIVIENDA PARA LOS TRABAJADORES (INFONAVIT), INSTITUTO DEL FONDO NACIONAL PARA EL CONSUMO DE LOS TRABAJADORES (INFONACOT), O DESCUENTOS POR PAGO DE PENSIÓN ALIMENTICIA DECRETADO POR LA AUTORIDAD COMPETENTE, MOTIVO POR EL QUE RELEVO A LA EMPRESA ');
		$textrun->addText($empresa, $BOLD_UNDERLINE);
		$textrun->addText(' DE LA OBLIGACIÓN DE REALIZAR DESCUENTO ALGUNO DE MI SALARIO POR TALES CONCEPTOS.');

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('PARA EL CASO DE QUE CUENTE CON ADEUDOS PENDIENTES CON EL INSTITUTO DEL FONDO NACIONAL DE LA VIVIENDA PARA LOS TRABAJADORES (INFONAVIT), INSTITUTO DEL FONDO NACIONAL PARA EL CONSUMO DE LOS TRABAJADORES (INFONACOT), O DESCUENTOS POR PAGO DE PENSIÓN ALIMENTICIA DECRETADO POR LA AUTORIDAD COMPETENTE, AUTORIZO A LA EMPRESA ');
		$textrun->addText($empresa, $BOLD_UNDERLINE);
		$textrun->addText(' PARA EFECTUAR LOS DESCUENTOS CORRESPONDIENTES EN TÉRMINOS DE LO DISPUESTO POR LA FRACCIÓN III, V Y VII DEL ARTÍCULO 110 DE LA LEY FEDERAL DEL TRABAJO.');

		$section->addText('LO ANTERIOR LO MANIFIESTO BAJO PROTESTA DE DECIR VERDAD, SABEDOR DE LAS SANCIONES QUE, EN CASO DE INFORMACIÓN FALSA Y ENGAÑOSA, ESTABLECEN PARA EL DELITO DE FRAUDE LOS ARTÍCULOS 386, 387, 388 Y 388 BIS DEL CÓDIGO PENAL FEDERAL.', $JUSTIFY);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('QUEDA AUTORIZADO EL EMPLEADOR Y/O PATRÓN ');
		$textrun->addText($empresa, $BOLD_UNDERLINE);
		$textrun->addText(' PARA UTILIZAR LA PRESENTE DECLARACIÓN PARA TODOS LOS FINES LEGALES Y ADMINISTRATIVOS A QUE HAYA LUGAR.');

		if($empresa == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$section->addText('ESTADO DE HIDALGO A ' . $fecha, $BOLD_UNDERLINE, $CENTER);
		}else{
		$section->addText('ESTADO DE MEXICO A ' . $fecha, $BOLD_UNDERLINE, $CENTER);
		}
		$section->addTextBreak(6);
		$table = $section->addTable(array('cellMargin'=>80, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 500,'spaceBefore' => 500));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. ' . $nombre, $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$section->addPageBreak();

		$PHPWord->setDefaultFontSize(8);

		/*$section->addText('ANEXO 1', $ANEXO, $CENTER);
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('LA PRESENTE HOJA COMO ');
		$textrun->addText('ANEXO 1', $BOLD_UNDERLINE);
		$textrun->addText(' FORMA PARTE INTEGRANTE DEL CONTRATO INDIVIDUAL DE TRABAJO QUE SE SUSCRIBE EL ' . $fecha . ', QUE SERVIRÁ PARA INTEGRAR ');
		$textrun->addText('LAS COMISIONES DE CAPACITACIÓN Y ADIESTRAMIENTO.', $BOLD_UNDERLINE);*/

		/*$table = $section->addTable(array('cellMargin'=>0, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('“EL TRABAJADOR”', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. '.$nombre, $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', array('size'=>0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$section->addPageBreak();

		$section->addText('ANEXO 2', $ANEXO, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('LA PRESENTE HOJA COMO ');
		$textrun->addText('ANEXO 2', $BOLD_UNDERLINE);
		$textrun->addText(' FORMA PARTE INTEGRANTE DEL CONTRATO INDIVIDUAL DE TRABAJO QUE SE SUSCRIBE EL '. $fecha . ', QUE SERVIRÁ PARA INTEGRAR ');
		$textrun->addText('LAS COMISIONES DE SEGURIDAD E HIGIENE.', $BOLD_UNDERLINE);
		$section->addTextBreak(20);
		$table = $section->addTable(array('cellMargin'=>0, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('“EL TRABAJADOR”', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. ' . $nombre, $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', array('size'=>0), array('spaceAfter' => 0,'spaceBefore' => 0));

		$section->addTextBreak(2);

		$table = $section->addTable(array('cellMargin'=>80, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('ÍNDICE IZQUIERDO.', $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(4000, null)->addText('ÍNDICE DERECHO.', $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 150,'spaceBefore' => 150));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 150,'spaceBefore' => 150));
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 150,'spaceBefore' => 150));
		$table->addRow();
		$table->addCell(4000)->addText('PULGAR IZQUIERDO.', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(4000, null)->addText('PULGAR DERECHO.', $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 150,'spaceBefore' => 150));
		$table->addCell(400, null)->addText('              ', null, array('spaceAfter' => 150,'spaceBefore' => 150));
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', $BOLD, array('spaceAfter' => 150,'spaceBefore' => 150));

		$section->addPageBreak();

		$section->addText('ANEXO 3', $ANEXO, $CENTER);

		/*$textrun->addText($INDENT,'El suscriptor de la presente es trabajador de la empresa', $empresa, ', toda vez que tiene celebrado contrato individual de trabajo por tiempo', $duracion, 'con esa empresa, mismo contrato que a la fecha se encuentra vigente.');
		$section->addTextBreak();*/
		
		/*$textrun->addText('LA PRESENTE HOJA COMO ');
		$textrun->addText('ANEXO 3', $BOLD_UNDERLINE);
		$textrun->addText(' FORMA PARTE INTEGRANTE DEL CONTRATO INDIVIDUAL DE TRABAJO QUE SE SUSCRIBE EL ' . $fecha . ', QUE SERVIRÁ ');
		$textrun->addText('PARA INTEGRAR LA COMISIÓN EN LA INSPECCIÓN DE TRABAJO DE CONDICIONES GENERALES.', $BOLD_UNDERLINE);*/
				
		/*$section->addTextBreak();
		$table = $section->addTable(array('cellMargin'=>0, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('“EL TRABAJADOR”', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. ' . $nombre, $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', array('size'=>0), array('spaceAfter' => 0,'spaceBefore' => 0));

		$section->addPageBreak();

		$section->addText('ANEXO 4', $ANEXO, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText('LA PRESENTE HOJA COMO ');
		$textrun->addText('ANEXO 4', $BOLD_UNDERLINE);
		$textrun->addText(' FORMA PARTE INTEGRANTE DEL CONTRATO INDIVIDUAL DE TRABAJO QUE SE SUSCRIBE EL ' . $fecha . ', QUE SERVIRÁ ');
		$textrun->addText('PARA INTEGRAR LA COMISIÓN EN LA INSPECCIÓN DE TRABAJO DE CONDICIONES GENERALES.', $BOLD_UNDERLINE);
		$section->addTextBreak(30);
		$table = $section->addTable(array('cellMargin'=>0, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('“EL TRABAJADOR”', $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('C. ' . $nombre, $BOLD, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(4000, array('borderBottomColor' => '000000', 'borderBottomSize' => 5))->addText('', array('size'=>0), array('spaceAfter' => 0,'spaceBefore' => 0));*/
		$section->addText($fecha, $BOLD, $RIGHT);	
		$section->addTextBreak(2);
		$section->addText('C. REPRESENTANTE LEGAL DE LA EMPRESA', $BOLD, $LEFT);		
		$section->addText($empresa, $BOLD);	
		$section->addTextBreak(2);
		$section->addText('El suscripto de la presente es trabajador de la empresa '.$empresa.',',$RIGHT, $RIGHT);
		$section->addText('toda vez que tiene celebrado individual del trabajo por tiempo '.$duracion.' con esa empresa, mismo contrato que a la fecha se encuentra vigente.', $JUSTIFY, $JUSTIFY);

		$section->addText('Manifiesto que se me ha dado a conocer el Plan de Previsión Social de la empresa ', $RIGHT, $RIGHT);
		$section->addText($empresa.', y estoy enterado de las condiciones del mismo; y, toda vez que cumplo con los requisitos de elegibilidad del referido Plan; de manera voluntaria solicito participar de los beneficios previstos en el Plan a partir de esta fecha.', $JUSTIFY, $JUSTIFY);
						
		$section->addTextBreak();	
		$section->addText('Sin más por el momento quedo de usted', $CENTER, $CENTER);
		$section->addText('ATENTAMENTE', $BOLD, $CENTER);
		$section->addTextBreak(1);	
		$section->addText($nombre, $BOLD, $CENTER);		
		$section->addPageBreak();
		
		$section->addText($fecha, $BOLD, $RIGHT);
		$section->addTextBreak(2);		
		$section->addText('C. '.$nombre, $BOLD);
		$section->addTextBreak(2);			
		$section->addText('Por medio del presente escrito y de conformidad a la solicitud presentada por usted para participar de los', $RIGHT, $RIGHT);		
		$section->addText('beneficios previstos en el Plan de Previsión Social de la empresa '.$empresa.' y, toda vez que el expediente que la empresa tiene a su nombre se advierte que usted cumple con los requisitos de elegibilidad establecidos en el referido Plan, comunico a usted que ha sido aceptado para gozar de los beneficios de dicho Plan con el carácter de participante.', $JUSTIFY, $JUSTIFY);
		
		$section->addTextBreak(3);

		$section->addText('ATENTAMENTE', $BOLD, $CENTER);
		
		$section->addText('PATRON, REPRESENTANTE LEGAL', $BOLD, $CENTER);

		$archivo = 'archivo ' . date('d-m-Y  H:i:s') . '.docx';
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $archivo . '"');
        header('Cache-Control: max-age=0');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save("php://output");
	}

	public function generarCartaPatronal(){
		$BOLD = array('bold' => TRUE);
		$BOLD_UNDERLINE = array('bold' => TRUE, 'underline' => "single");
		$UNDERLINE = array('underline' => "single");
		$CENTER = array('align' => 'center');
		$JUSTIFY = array('align' => 'both');
		$BOLD_CENTER = array('bold' => TRUE, 'align' => 'center');
		$ANEXO = array('bold' => TRUE, 'size' => 12);
		$RIGHT = array('align' => 'right');

		// Adding an empty Section to the document...
		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		\PhpOffice\PhpWord\Settings::setDefaultPaper('Letter');
		$PHPWord = new \PhpOffice\PhpWord\PhpWord();
		$PHPWord ->getSettings()->setThemeFontLang(new PhpOffice\PhpWord\Style\Language("ES-MX"));
		$PHPWord->setDefaultFontName('Times New Roman');
		$PHPWord->setDefaultFontSize(10);

		$section = $PHPWord->addSection(array('marginTop' => 1000, 'marginBottom' => 1000));
		$header = $section->addHeader();
		$header->addImage(base_url() . "img/" . $this->input->post("image_empresa"), array(
			"width" => 470
		));

		$section->addTextBreak(1, null, array('spaceAfter' => 0,'spaceBefore' => 0));
		$section->addText("TLALNEPANTLA DE BAZ A " . $this->input->post("fecha"), null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'right'));
		$section->addTextBreak(1);
		$img_path = "uploads/" . $this->input->post("uid_usuario") . "/" . $this->input->post("uid_usuario") . "-img-credencial.jpg";
		if(!file_exists($img_path)){
			$img_path = base_url() . "img/persona.png";
		}
		$section->addImage($img_path, array(
			"width" => 80,
			"wrapDistanceLeft" => 60,
			"marginTop" => -100,
			"alignment" => "right",
			"wrappingStyle" => "square"
		));
		$section->addText("A QUIEN CORRESPONDA", null, array('spaceAfter' => 0,'spaceBefore' => 0));
		$section->addTextBreak(1, null, array('spaceAfter' => 0,'spaceBefore' => 0));
		$section->addText("PRESENTE:");
		$section->addTextBreak(1, null, array('spaceAfter' => 0,'spaceBefore' => 0));

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("	ME PERMITO INFORMAR A USTED, LOS DATOS QUE TENEMOS REGISTRADOS EN EL EXPEDIENTE DE EL C. ", null);
		$textrun->addText($this->input->post("nombre"), $BOLD);
		$textrun->addText(" EL CUAL LABORA PARA LA EMPRESA Y CONTAMOS CON LOS SIGUIENTES DATOS EN NUESTROS REGISTROS:", null);

		$section->addTextBreak(1, null, array('spaceAfter' => 0,'spaceBefore' => 0));

		$table = $section->addTable();
		$table->addRow();
		$table->addCell(3000)->addText("FECHA DE INGRESO:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("fecha_ingreso"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("RFC:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("rfc"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("IMSS:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("nss"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("PUESTO:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("puesto_contrato"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("DOMICILIO PARTICULAR:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("domicilio"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("NOMBRE DE LA EMPRESA:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post("empresa"), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("DOMICILIO DE LA EMPRESA:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post('domicilio_empresa'), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("RFC:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post('rfc_empresa'), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(3000)->addText("REGISTRO PATRONAL:", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(720)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null)->addText($this->input->post('registro_patronal'), null, array('spaceAfter' => 10,'spaceBefore' => 10));

		$section->addTextBreak(1, array('spaceAfter' => 0,'spaceBefore' => 0));

		$table = $section->addTable(array('cellMargin'=>0, 'alignment'=>'center'));
		$table->addRow();
		$table->addCell(4000, null)->addText('ATENTAMENTE', null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$table->addRow();
		$table->addCell(null, null)->addText('', null, array('spaceAfter' => 350,'spaceBefore' => 350, 'align' => 'center'));
		$table->addRow();
		$cell = $table->addCell(4000, null);
		$textrun = $cell->addTextRun($CENTER);
		$textrun->addText('LIC. GUSTAVO JUÁREZ MENDOZA', null, array('spaceAfter' => 0,'spaceBefore' => 0));
		$textrun->addTextk("", array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));
		$textrun->addText('DPO RECURSOS HUMANOS', array('spaceAfter' => 0,'spaceBefore' => 0));

		$footer = $section->addFooter();
		$footer->addImage(base_url() . "img/footer.png", array(
			"width" => 470
		));

		$archivo = 'Carta Patronal ' . date('d-m-Y  H:i:s') . '.docx';
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $archivo . '"');
        header('Cache-Control: max-age=0');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save("php://output");
	}

	public function generarConvenioSalida(){
		$BOLD = array('bold' => TRUE);
		$BOLD_UNDERLINE = array('bold' => TRUE, 'underline' => "single");
		$UNDERLINE = array('underline' => "single");
		$CENTER = array('align' => 'center');
		$JUSTIFY = array('align' => 'both');
		$BOLD_CENTER = array('bold' => TRUE, 'align' => 'center');
		$ANEXO = array('bold' => TRUE, 'size' => 12);
		$RIGHT = array('align' => 'right');

		// Adding an empty Section to the document...
		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		\PhpOffice\PhpWord\Settings::setDefaultPaper('Letter');
		$PHPWord = new \PhpOffice\PhpWord\PhpWord();
		$PHPWord ->getSettings()->setThemeFontLang(new PhpOffice\PhpWord\Style\Language("ES-MX"));
		$PHPWord->setDefaultFontName('Calibri');
		$PHPWord->setDefaultFontSize(10);

		$section = $PHPWord->addSection();

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("CONVENIO QUE CELEBRAN POR UNA PARTE LA EMPRESA ", $BOLD);
		$textrun->addText($this->input->post('empresa'), $BOLD);
		if($this->input->post('empresa')=='CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$textrun->addText(", REPRESENTADA POR EL LIC. JORGE ESTEVEZ GONZALEZ, ADMINISTRADOR UNICO, EN SU CARÁCTER DE APODERADO LEGAL Y UNICO RESPONSABLE DE LA RELACION LABORAL, EN LO SUCESIVO “LA EMPRESA” Y POR OTRA EL C. ", $BOLD);
		}else{
		$textrun->addText(", REPRESENTADA POR EL LIC. GUSTAVO JUAREZ MENDOZA EN SU CARÁCTER DE APODERADO LEGAL Y UNICO RESPONSABLE DE LA RELACION LABORAL, EN LO SUCESIVO “LA EMPRESA” Y POR OTRA EL C. ", $BOLD);
		}		
		$textrun->addText($this->input->post('nombre'), $BOLD);
		$textrun->addText(", POR SU PROPIO DERECHO, EN SU CARÁCTER DE TRABAJADOR, EN LO SUCESIVO “EL TRABAJADOR”, CONFORME A LOS SIGUIENTES, ANTECEDENTES, DECLARACIONES Y CLAUSULAS.", $BOLD);

		$section->addText("A N T E C E D E N T E S", $BOLD_UNDERLINE, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("UNICO. - ", $BOLD);
		$textrun->addText("CON FECHA ");
		$textrun->addText($this->input->post('fecha_ingreso'));
		$textrun->addText(", LA EMPRESA " . $this->input->post('empresa') .", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", CELEBRARON UN CONTRATO INDIVIDUAL DE TRABAJO CON EL OBJETO DE ESTABLECER Y REGULAR LA RELACION LABORAL Y LAS CONDICIONES EN QUE SE IBA A PRESTAR ESTA.");

		$section->addText("D E C L A R A C I O N E S", $BOLD_UNDERLINE, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("I.- ", $BOLD);
		$textrun->addText("LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", MANIFIESTAN, QUE EN LA CELEBRACIÓN DEL PRESENTE CONVENIO, RECONOCEN MUTUAMENTE QUE NO HA EXISTIDO DOLO, MALA FE, ERROR, NI CUALQUIER OTRO VICIO DEL CONSENTIMIENTO QUE PUDIERA AFECTAR LA VALIDEZ DE ESTE INSTRUMENTO DE INEXISTENCIA O NULIDAD.");
		
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("II.- ", $BOLD);
		$textrun->addText("EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", EN SU CARACTER DE TRABAJADOR RECONOCE QUE EN EL CONTENIDO DEL PRESENTE CONVENIO, NO EXISTE NINGUNA RENUNCIA A SUS DE DERECHOS LABORALES NI MENOSCABO A ESTOS Y EL CONVENIO LO CELEBRA POR ASI CONVENIR A SUS INTERESES, POR SU PROPIO DERECHO, DE MANERA VOLUNTARIA, LIBRE Y ESPONTANEA SIN NINGUN TIPO DE PRESION, POR LO QUE NO EXISTE NINGUN VICIO DEL CONSENTIMIENTO QUE PUDIERA AFECTAR LA VALIDEZ DE ESTE CONVENIO DE INEXISTENCIA O NULIDAD.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("III.- ", $BOLD);
		$textrun->addText("LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		if($this->input->post('empresa')=='CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$textrun->addText(", MANIFIESTAN QUE EN SU CALIDAD DE TESTIGOS ESTAN PRESENTES EN EL DESARROLLO Y FIRMA DEL PRESENTE CONVENIO LA C. ANAHI PAOLA MONROY VELAZQUEZ Y EL C. GUSTAVO JUAREZ MENDOZA.");	
		}else{
		$textrun->addText(", MANIFIESTAN QUE EN SU CALIDAD DE TESTIGOS ESTAN PRESENTES EN EL DESARROLLO Y FIRMA DEL PRESENTE CONVENIO LA C. JESSICA CARINA CALLEJAS VAZQUEZ, LA C. BETSABE BOLAÑOS TAPIA.");
		}		

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("IV.- ", $BOLD);
		$textrun->addText("LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", MANIFIESTAN QUE EL PRESENTE CONVENIO LO PACTAN DE ESTA FORMA POR RESULTAR MAS PRACTICO, YA QUE EN LA EJECUCION DEL MISMO SE REALIZA EN ESTE ACTO Y DE MANERA INMEDIATA, AHORRANDO EL TIEMPO QUE SE HUBIERA REQUERIDO PARA GENERAR ESTE TRAMITE ANTE EL CENTRO DE CONCILIACION LABORAL.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("V.- ", $BOLD);
		$textrun->addText("LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", SE RECONOCEN RECÍPROCAMENTE SU PERSONALIDAD Y CAPACIDAD LEGAL PARA CELEBRAR EL PRESENTE CONVENIO POR LO TANTO SE OBLIGAN EN LOS TÉRMINOS DE LAS SIGUIENTES: ");

		$section->addText("C L Á U S U L A S", $BOLD_UNDERLINE, $CENTER);

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("PRIMERA.- ", $BOLD);
		$textrun->addText("DECLARAN, LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE EN TERMINOS DE LA FRACCION I DEL ARTICULO 53 DE LA LEY FEDERAL DEL TRABAJO, POR ASI CONVENIR A LOS INTERESES DEL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", POR MUTUO CONSENTIMIENTO, MANIFIESTAN Y RATIFICAN SU VOLUNTAD DE DAR POR TERMINADA LA RELACION LABORAL QUE LOS UNIA MEDIANTE EL CONTRATO INDIVIDUAL DE TRABAJO MENCIONADO EN EL CAPITULO DE ANTECEDENTES DEL PRESENTE CONVENIO.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("SEGUNDA.- ", $BOLD);
		$textrun->addText("DECLARA: EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE POR ASI CONVENIR A SUS INTERESES Y POR MUTUO CONSENTIMIENTO, ES SU LIBRE VOLUNTAD DAR POR TERMINADA LA RELACIÓN LABORAL QUE LO HA UNIDO CON LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", HASTA EL DÍA  ");
		$textrun->addText($this->input->post('fecha'), $BOLD);
		$textrun->addText(", TERMINACIÓN LABORAL QUE HACE CON FUNDAMENTO EN LO DISPUESTO POR LA FRACCIÓN I DEL ARTÍCULO 53 DE LA LEY FEDERAL DEL TRABAJO.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("TERCERA.- ", $BOLD);
		$textrun->addText("DECLARA: EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE DURANTE EL TIEMPO QUE LABORÓ PARA LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", SIEMPRE RECIBIÓ DE ÉSTA DE MANERA PUNTUAL, EL PAGO DE LOS SALARIOS ORDINARIOS Y EXTRAORDINARIOS; SIEMPRE SE LE PAGARON LOS SÉPTIMOS DÍAS, DÍAS FESTIVOS, Y HORAS EXTRAS EN LAS ESCASAS OCASIONES QUE LOS LABORO, LOS SALARIOS DEVENGADOS, ASÍ COMO LAS VACACIONES, PRIMA VACACIONAL Y AGUINALDO GENERADOS EN EL TIEMPO LABORADO, COMO CONSECUENCIA NO SE LE ADEUDA NINGUNA SUMA POR DICHOS CONCEPTOS NI POR NINGÚN OTRO, Y SE LE HAN PAGADO TODAS Y CADA UNA DE LAS PRESTACIONES LEGALES Y EXTRALEGALES QUE PUDIERAN CORRESPONDERLE CONFORME A LA LEY Y A SU CONTRATO DE TRABAJO; QUE IGUALMENTE NO PADECE ENFERMEDAD PROFESIONAL CON MOTIVO Y/O DERIVADO Y/O A CONSECUENCIA DE SUS LABORES, NI HA SUFRIDO ACCIDENTE ALGUNO DE TRABAJO DENTRO DEL DESEMPEÑO DE LAS MISMAS, POR LO QUE POR ESTOS CONCEPTOS NO TIENE NINGUNA ACCIÓN O DERECHO QUE RESERVARSE PARA EJERCITARLO CON POSTERIORIDAD.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("CUARTA.- ", $BOLD);
		$textrun->addText("DECLARA: EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(" QUE INICIO A PRESTAR SUS SERVICIOS PERSONALES Y SUBORDINADOS, ÚNICAMENTE Y EXCLUSIVAMENTE PARA LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", A QUIEN RECONOCE COMO SU ÚNICO PATRON,  EN LOS TÉRMINOS Y CONDICIONES QUE A CONTINUACIÓN SE MENCIONAN:");

		$section->addTextBreak();

		$table = $section->addTable(array('cellMargin'=>80, 'leftFromText'=>720));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5, 'valign'=>'center'))->addText("FECHA DE INGRESO", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5, 'valign'=>'center'))->addText($this->input->post('fecha_ingreso'), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("CATEGORÍA", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($this->input->post('puesto_contrato'), null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addRow();
		$table->addCell(720, null)->addText("", null, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(null, array('borderBottomColor' => '000000', 'borderRightColor' => '000000', 'borderBottomSize' => 5, 'borderRightSize' => 5))->addText("HORARIO DE LABORES", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10));
		$table->addCell(5000, array('borderBottomColor' => '000000', 'borderLeftColor' => '000000', 'borderBottomSize' => 5, 'borderLeftSize' => 5))->addText($this->input->post("horario"), null, array('spaceAfter' => 10,'spaceBefore' => 10));

		$section->addTextBreak();

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("QUINTA.- ", $BOLD);
		$textrun->addText("DECLARA LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", POR CONDUCTO DEL LIC. GUSTAVO JUAREZ MENDOZA, QUIEN COMPARECE EN SU CARÁCTER DE APODERADO LEGAL, QUE ESTÁ DE ACUERDO CON LO MANIFESTADO POR EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", EN LAS CLÁUSULAS, SEGUNDA, TERCERA Y CUARTA Y CONSECUENTE CON ELLO EXPRESA SU VOLUNTAD PARA DAR POR TERMINADA POR MUTUO CONSENTIMIENTO LA RELACIÓN LABORAL CON EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", EN TÉRMINOS DE LA FRACCIÓN I DEL ARTÍCULO 53 DE LA LEY FEDERAL DEL TRABAJO.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("SEXTA.- ", $BOLD);
		$textrun->addText("DECLARAN, LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(" Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		if($this->input->post('empresa')=='CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$textrun->addText(", COMO CONSECUENCIA DE LA TERMINACIÓN DEL CONTRATO INDIVIDUAL DE TRABAJO MENCIONADO EN EL CAPITULO DE ANTECEDENTES DEL PRESENTE CONVENIO, LA EMPRESA " . $this->input->post('empresa') . ", POR CONDUCTO DEL LIC. JORGE ESTEVEZ GONZALEZ, QUIEN COMPARECE EN SU CARÁCTER DE ADMINISTRADOR UNICO, ENTREGA AL ");	
		}else{
		$textrun->addText(", COMO CONSECUENCIA DE LA TERMINACIÓN DEL CONTRATO INDIVIDUAL DE TRABAJO MENCIONADO EN EL CAPITULO DE ANTECEDENTES DEL PRESENTE CONVENIO, LA EMPRESA " . $this->input->post('empresa') . ", POR CONDUCTO DEL LIC. GUSTAVO JUAREZ MENDOZA, QUIEN COMPARECE EN SU CARÁCTER DE APODERADO LEGAL, ENTREGA AL ");
		}		
		$textrun->addText("C. " . $this->input->post('nombre'), $BOLD);
		$textrun->addText(", MEDIANTE TRANSFERENCIA QUE EN COPIA SE ANEXA AL PRESENTE Y QUE FORMA PARTE INTEGRANTE DE ESTE CONVENIO, LA CANTIDAD DE ");
		$textrun->addText("$0,000.000 (CERO CERO CERO CERO PESOS 00/100 M.N.) ", $BOLD);
		$textrun->addText("COMO FINIQUITO DE TODAS Y CADA UNA DE LAS PRESTACIONES A QUE TUVO DERECHO EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", DURANTE LA RELACIÓN LABORAL QUE SE DA POR TERMINADA EL DÍA ");
		$textrun->addText($this->input->post('fecha'), $BOLD);
		$textrun->addText(".");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("EN EL ENTENDIDO DE QUE CON ESA CANTIDAD SE LE CUBREN TOTALMENTE LAS PRESTACIONES QUE LE CORRESPONDIERON HASTA LA JORNADA NORMAL DE LABORES QUE LE CORRESPONDIÓ HASTA EL ");
		$textrun->addText($this->input->post('fecha'));
		$textrun->addText(", DE ACUERDO CON SU CONTRATO INDIVIDUAL DE TRABAJO Y LA LEY FEDERAL DEL TRABAJO.");
		
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("SÉPTIMA.- ", $BOLD);
		$textrun->addText("DECLARA: EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE ESTA CONFORME CON LA CANTIDAD Y CONCEPTOS CITADOS POR LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", EN LA CLÁUSULA ANTERIOR YA QUE EN SU OPORTUNIDAD SIEMPRE RECIBIÓ DE MANERA ININTERRUMPIDA EL PAGO DE LOS SÉPTIMOS DÍAS, DÍAS FESTIVOS, Y HORAS EXTRAS EN LAS ESCASAS OCASIONES QUE LAS LABORO, LOS SALARIOS DEVENGADOS, ASÍ COMO LAS VACACIONES, PRIMA VACACIONAL Y AGUINALDO GENERADOS EN EL TIEMPO LABORADO, COMO CONSECUENCIA NO SE LE ADEUDA NINGUNA SUMA POR DICHOS CONCEPTOS NI POR NINGÚN OTRO, Y SE LE HAN PAGADO TODAS Y CADA UNA DE LAS PRESTACIONES LEGALES QUE PUDIERAN CORRESPONDERLE CONFORME A LA LEY FEDERAL DEL TRABAJO Y A LAS PACTADAS EN SU CONTRATO INDIVIDUAL DE TRABAJO.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("OCTAVA.- ", $BOLD);
		$textrun->addText("DECLARA: EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE EL PRESENTE DOCUMENTO NO REPRESENTA NINGUNA RENUNCIA A SUS DERECHOS O MENOSCABO A ESTOS, POR QUE LOS DERECHOS QUE GENERO HASTA EL DIA ");
		$textrun->addText($this->input->post('fecha'), $BOLD);
		$textrun->addText(" LE ESTAN SIENDO PAGADOS CONFORME A LA LEY FEDERAL DEL TRABAJO Y A LAS CONDICIONES PACTADAS EN SU CONTRATO INDIVIDUAL DE TRABAJO, MOTIVO POR EL CUAL NO SE RESERVA NINGUNA ACCIÓN O DERECHO QUE EJERCITAR EN CONTRA DE LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", A QUIEN RECONOCE COMO SU UNICO PATRON, O DE QUIEN LEGALMENTE REPRESENTE SUS INTERESES, O DE LOS SOCIOS Y ACCIONISTAS DE LA MISMA, O QUIEN MAS LLEGARA A RESULTAR SER PATRÓN, PROPIETARIO O RESPONSABLE DE LA FUENTE DE TRABAJO QUE SE UBICA EN ");
		$textrun->addText($this->input->post('domicilio_empresa'), $BOLD);
		$textrun->addText(", POR NINGÚN CONCEPTO DE TIPO LABORAL, CIVIL, PENAL, ADMINISTRATIVO O CUALQUIER OTRO, MANIFESTANDO QUE DURANTE EL TIEMPO QUE LABORÓ PARA LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", A QUIEN RECONOCE COMO SU ÚNICO PATRÓN LABORAL, NO SUFRIÓ ENFERMEDAD, ACCIDENTE O RIESGO DE TRABAJO DERIVADO DEL MISMO Y RECIBIÓ EL BUEN TRATO QUE LE CORRESPONDIÓ COMO TRABAJADOR DE ESTA ÚLTIMA.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("NOVENA.- ", $BOLD);
		$textrun->addText("DECLARAN, LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(" Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", PARA EFECTOS DE CUMPLIR CON LOS REQUISITOS DE VALIDEZ QUE REFIERE EL SEGUNDO PARRAFO DEL ARTICULO 33 DE LA LEY FEDERAL DEL TRABAJO, QUE LA RELACION CIRCUNSTANCIADA DE LOS HECHOS QUE MOTIVAN EL PRESENTE CONVENIO ASI COMO LOS DERECHOS COMPRENDIDOS EN ÉL, SE ENCUENTRAN EXPRESADOS EN EL CAPITULO DE ANTECEDENTES, DECLARACIONES Y EN TODAS Y CADA UNA DE LAS CLAUSULAS QUE SE MENCIONAN EN EL CUERPO DEL PRESENTE CONVENIO; Y POR NO CONTENER RENUNCIA DE DERECHOS O MENOSCABO A ESTOS, POR ESTAR PACTADO DE MANERA VOLUNTARIA, LIBRE Y ESPONTANEA SIN NINGUN TIPO DE PRESION, POR QUE NO EXISTE NINGUN VICIO DEL CONSENTIMIENTO QUE PUDIERA AFECTAR LA VALIDEZ DE ESTE CONVENIO DE INEXISTENCIA O NULIDAD, POR QUE EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(" LO CELEBRA POR SU PROPIO DERECHO Y POR ASI CONVENIR A SUS INTERESES; EN ESTE ACTO LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText("Y EL C. ");;
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(" LO RATIFICAN EN TODAS Y CADA UNA DE SUS PARTES.");

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("DÉCIMA.- ", $BOLD);
		$textrun->addText("SEÑALAN LAS PARTES COMO DOMICILIOS PARA EFECTO DE OIR Y RECIBIR NOTIFICACIONES Y DOCUMENTOS DERIVADOS DE LA INTERPRETACIÓN Y CUMPLIMIENTO DE ESTE CONVENIO LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", EL UBICADO EN  ");
		$textrun->addText($this->input->post('domicilio_empresa'), $BOLD);
		$textrun->addText("Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText("EL UBICADO EN ");
		$textrun->addText($this->input->post('domicilio'));

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("DÉCIMA PRIMERA.- ", $BOLD);
		$textrun->addText("DECLARAN, LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(" Y EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", QUE EL PRESENTE CONVENIO POR NO CONTENER CLÁUSULAS CONTRARIAS A LA MORAL O AL DERECHO Y POR ESTAR DENUNCIADO CONFORME A LO PREVISTO POR LOS ARTÍCULOS 33, Y 53, FRACCIÓN I, DE LA LEY FEDERAL DEL TRABAJO VIGENTE, SE OBLIGAN A ESTAR Y PASAR POR EL EN TODO TIEMPO Y LUGAR COMO SI SE TRATARA DE COSA JUZGADA ASI TAMBIEN A RATIFICARLO EN EL MOMENTO QUE UNA PARTE REQUIERA A LA OTRA, ANTE EL CENTRO DE CONCILIACION LABORAL Y/O TRIBUNAL LABORAL Y/O CUALQUIER AUTORIDAD DONDE SE DEBA RATIFICAR YA SEA POR QUE ASI LO REQUIERA O POR QUE SEA NECESARIO, INCURRIENDO EN UNA RESPONSABILIDAD CIVIL Y/O PENAL EN CASO DE QUE ALGUNA DE LAS PARTES NO CUMPLA CON ESTA ULTIMA DISPOSICION, SITUACION QUE TAMBIEN RATIFICAN CON LOS ALCANCES JURIDICOS QUE DE ELLA SE DERIVEN");
		
		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("LEÍDO QUE FUE EN SU TOTALIDAD EL CONTENIDO DEL PRESENTE DOCUMENTO POR LA EMPRESA ");
		$textrun->addText($this->input->post('empresa'));
		$textrun->addText(", EN SU CALIDAD DE PATRON Y RESPONSABLE DE LA RELACION DE TRABAJO, EL C. ");
		$textrun->addText($this->input->post('nombre'));
		$textrun->addText(", EN SU CALIDAD DE TRABAJADOR, Y LAS C. JESSICA CARINA CALLEJAS VAZQUEZ Y BETSABE BOLAÑOS TAPIA EN SU CALIDAD DE TESTIGOS, LO FIRMAN Y RATIFICAN POR CONTENER EXACTAMENTE LOS TÉRMINOS EN QUE DESEAN OBLIGARSE, EN EL MUNICIPIO DE TLALNEPANTLA DE BAZ, ESTADO DE MEXICO A ");
		$textrun->addText($this->input->post('fecha') . ".");

		$section->addTextBreak();

		$table = $section->addTable();
		$table->addRow();
		$cell = $table->addCell(5000, null);
		$cell->addText($this->input->post('empresa'), $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$cell = $table->addCell(5000, null);
		$cell->addText("EL TRABAJADOR", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		$cell = $table->addCell(5000, null);
		if($this->input->post('empresa')=='CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$cell->addText("PATRON Y RESPONSABLE DE LA RELACION DE TRABAJO", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));	
		$cell->addTextBreak();
		$cell->addText("LIC. JORGE ESTEVEZ GONZALEZ", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$cell->addText("ADMINISTRADOR UNICO.", $BOLD, array('spaceAfter' => 300,'spaceBefore' => 10, 'align' => 'center'));
		}else{
		$cell->addText("RESPONSABLE DE LA RELACION DE TRABAJO", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$cell->addTextBreak();
		$cell->addText("LIC. GUSTAVO JUAREZ MENDOZA", $BOLD, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$cell->addText("APODERADO LEGAL.", $BOLD, array('spaceAfter' => 300,'spaceBefore' => 10, 'align' => 'center'));
		}		
		$cell = $table->addCell(5000, array("valign" => "center"));
		$cell->addText("C. " . $this->input->post('nombre'), null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		$table->addCell(5000, null)->addText("TESTIGO", null, array('spaceAfter' => 600,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(5000, null)->addText("TESTIGO", null, array('spaceAfter' => 600,'spaceBefore' => 10, 'align' => 'center'));
		$table->addRow();
		if($this->input->post('empresa')=='CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$table->addCell(5000, null)->addText("ANAHI PAOLA MONROY VELAZQUEZ", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(5000, null)->addText("GUSTAVO JUAREZ MENDOZA", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		}else{
		$table->addCell(5000, null)->addText("JESSICA CARINA CALLEJAS VAZQUEZ", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		$table->addCell(5000, null)->addText("BETSABE BOLAÑOS TAPIA", null, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		}		

		$archivo = 'Convenio laboral ' . date('d-m-Y  H:i:s') . '.docx';
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $archivo . '"');
        header('Cache-Control: max-age=0');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save("php://output");
	}

	public function generarOfiRemis(){
		$BOLD9 = array('bold' => TRUE, 'size' => 9);
		$BOLD = array('bold' => TRUE);
		$BOLD_UNDERLINE = array('bold' => TRUE, 'underline' => "single");
		$UNDERLINE = array('underline' => "single");
		$CENTER = array('align' => 'center');
		$JUSTIFY = array('align' => 'both');
		$BOLD_CENTER = array('bold' => TRUE, 'align' => 'center');
		$ANEXO = array('bold' => TRUE, 'size' => 12);
		$RIGHT = array('align' => 'right');

		// Adding an empty Section to the document...

		\PhpOffice\PhpWord\Settings::setOutputEscapingEnabled(true);
		\PhpOffice\PhpWord\Settings::setDefaultPaper('Letter');
		$PHPWord = new \PhpOffice\PhpWord\PhpWord();
		$PHPWord ->getSettings()->setThemeFontLang(new PhpOffice\PhpWord\Style\Language("ES-MX"));
		$PHPWord->setDefaultFontName('Arial');
		$PHPWord->setDefaultFontSize(10);

		$section = $PHPWord->addSection();

		$table = $section->addTable(array('cellMargin'=>40, 'alignment'=>'right'));
		$table->addRow();
		$table->addCell(4700, null)->addText("Empresa: " . $this->input->post('empresa'), $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'both'));
		$table->addRow();
		$table->addCell(4700, null)->addText("Trabajador: C. " . $this->input->post('nombre'), $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'both'));
		$table->addRow();
		$table->addCell(4700, null)->addText("Actividad De La Empresa. – " . $this->input->post('actividad_empresa'), $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'both'));
		$table->addRow();
		$table->addCell(4700, null)->addText("Domicilio. - " . $this->input->post('domicilio_empresa'), $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'both'));

		$section->addTextBreak(1, array('size' => 0), array('spaceAfter' => 0,'spaceBefore' => 0));

		$table = $section->addTable(array('cellMargin'=>80, "cellMarginLeft"=>0));
		$table->addRow();
		$table->addCell(3000, null)->addText("H. PRIMER TRIBUNAL LABORAL DE LA REGION JUDICIAL " . $this->input->post('domicilio_tribunal_laboral') . ".", $BOLD9, array('spaceAfter' => 0,'spaceBefore' => 0));

		$table = $section->addTable(array('cellMargin'=>80, "cellMarginLeft"=>0));
		$table->addRow();
		$table->addCell(3800, null)->addText("H. CENTRO DE CONCILIACION LABORAL CON SEDE EN " . $this->input->post('domicilio_centro_conciliacion_laboral') . ".", $BOLD9, array('spaceAfter' => 0,'spaceBefore' => 0));

		$section->addText("P R E S E N T E.", $BOLD9);
		$section->addTextBreak(null,null,array('spaceAfter' => 0,'spaceBefore' => 0));
		
		$textrun = $section->addTextRun($JUSTIFY);
		if($this->input->post('empresa') == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){		
		$textrun->addText("LIC. JORGE ESTEVEZ GONZALEZ,", $BOLD);
		$textrun->addText(" en mi carácter de Administrador único ");
		}else{		
		$textrun->addText("LIC. GUSTAVO JUAREZ MENDOZA,", $BOLD);
		$textrun->addText(" en mi carácter de Apoderado Legal ");
		}		
		
		$textrun->addText($this->input->post('empresa'), $BOLD);
		$textrun->addText(", y el C. ", $BOLD);
		$textrun->addText($this->input->post('nombre') . ",", $BOLD);
		$textrun->addText(" en mi carácter de trabajador, AMBOS señalando como domicilio para oír y recibir notificaciones el ubicado en ");
		$textrun->addText($this->input->post('domicilio_juridico'));
		$textrun->addText(", ante usted respetuosamente comparecemos a exponer:");

		$section->addTextBreak();

		$textrun = $section->addTextRun($JUSTIFY);
		$textrun->addText("Que, por medio del presente ocurso, venimos a presentar el convenio que hemos celebrado por medio del cual y de común acuerdo damos por terminada la relación y/o vínculo laboral que unía en términos de la fracción I del artículo 53 de la ley federal del trabajo, a la ");
		$textrun->addText("empresa ", $BOLD);
		$textrun->addText($this->input->post('empresa'), $BOLD);
		$textrun->addText(", con el C. ");
		$textrun->addText($this->input->post('nombre') . ",", $BOLD);
		$textrun->addText(" en su carácter de trabajador.", $BOLD);

		$section->addTextBreak();

		$section->addText("	Ambas partes nos comprometemos a ratificar el convenio que se anexa el día y hora que esta autoridad nos señale fecha para tal efecto.", null);

		$section->addTextBreak(1, null, array('spaceAfter' => 0,'spaceBefore' => 0));

		$section->addText("Por lo anteriormente expuesto, a este H. Tribunal, atentamente solicito.", null, $CENTER);

		$textrun = $section->addTextRun($CENTER);
		$textrun->addText("Único. – ", $BOLD);
		$textrun->addText("Tenernos por presentado en términos del presente escrito.");
		if($this->input->post('empresa') == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){	
		$section->addText("Estado de Hidalgo, a " . $this->input->post('fecha'), $BOLD, $CENTER);
		}else{
		$section->addText("Tlalnepantla de Baz Estado De México, a " . $this->input->post('fecha'), $BOLD, $CENTER);
		}		

		$section->addTextBreak(2);

		$table = $section->addTable();
		$table->addRow();
		$cell = $table->addCell(5000, null);
		if($this->input->post('empresa') == 'CORPORATIVO EN COMUNICACION DIGITAL DEL FUTURO, S.A DE C.V'){
		$cell->addText("LIC. JORGE ESTEVEZ GONZALEZ", $BOLD9, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$cell->addText("ADMINISTRADOR ÚNICO", $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		}else{
		$cell->addText("LIC. GUSTAVO JUAREZ MENDOZA", $BOLD9, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$cell->addText("APODERADO LEGAL", $BOLD9, array('spaceAfter' => 10,'spaceBefore' => 10, 'align' => 'center'));
		}		
		$cell = $table->addCell(5000, array('valign' => "center"));
		$textrun = $cell->addTextRun(array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$textrun->addText("EL C ");
		$textrun->addText($this->input->post('nombre') . ".", $BOLD9,);
		$table->addRow();
		$cell = $table->addCell(5000, null);
		$cell->addText($this->input->post('empresa'), $BOLD9, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));
		$cell = $table->addCell(5000, array('valign' => "bottom"));
		$cell->addText("Trabajador", null, array('spaceAfter' => 0,'spaceBefore' => 0, 'align' => 'center'));

		$archivo = 'ofi de remis ' . date('d-m-Y  H:i:s') . '.docx';
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $archivo . '"');
        header('Cache-Control: max-age=0');
		$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
		$objWriter->save("php://output");
	}

}
