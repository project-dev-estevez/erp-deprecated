<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Curso extends CI_Controller {
 
  public function __construct() {
    parent::__construct();
    if (!$this->session->userdata('is_logued_in')){
      redirect(base_url().'login');
    }
    $this->load->model('curso_model');
    
  }
  //Carga el index de cursos
  public function index() {
    $this->load->model('personal_model');
    $datos['titulo'] = 'Cursos';
    $datos['clase_pagina'] = 'asistencias-page';

    $datos['certificados'] = $this->personal_model->certificados();
    $datos['instructores'] = $this->curso_model->getInstructores();
    $datos['departamentos'] = $this->personal_model->departamentos();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('curso/ver-cursos', $datos);
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

  public function nuevoCurso()
    {
        $this->form_validation->set_rules('nombre_curso', 'Nombre Curso', 'required');
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
            'status' => false,
            'message' => 'El campo nombre es requerido'
            ));
        } else {
            $exist = $this->curso_model->verificarCurso();
            if($exist == true){
                echo json_encode(array(
                    'error' => true,
                    'mensaje' => '¡El Curso ya existe!'
                    ));
                    return;
            }

            $check = $this->curso_model->nuevoCurso();
            if ($check == true) {
                echo json_encode(array(
                'error' => false,
                'mensaje' => 'Se registro el curso correctamente'
                ));
            } else {
                echo json_encode(array(
                'error' => true,
                'mensaje' => $check
                ));
            }
                
        }
    }

    public function nuevoCertificado()
    {
        $this->form_validation->set_rules('nombre_certificado', 'Nombre Certificado', 'required');
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
            'status' => false,
            'message' => 'El campo nombre es requerido'
            ));
        } else {
            $exist = $this->curso_model->verificarCertificado();
            if($exist == true){
                echo json_encode(array(
                    'error' => true,
                    'mensaje' => '¡El Certificado ya existe!'
                    ));
                    return;
            }

            $check = $this->curso_model->nuevoCertificado();
            if ($check == true) {
                echo json_encode(array(
                'error' => false,
                'mensaje' => 'Se registro el certificado correctamente'
                ));
            } else {
                echo json_encode(array(
                'error' => true,
                'mensaje' => $check
                ));
            }
                
        }
    }

    public function editarCurso()
    {
        $this->form_validation->set_rules('nombre_cursoEdit', 'Nombre Curso', 'required');
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
            'status' => false,
            'message' => 'El campo nombre es requerido'
            ));
        } else {
            $exist = $this->curso_model->verificarCertificado();
            if($exist == true){
                echo json_encode(array(
                    'error' => true,
                    'mensaje' => '¡El Curso ya existe!'
                    ));
                    return;
            }

            $check = $this->curso_model->editarCurso();
            if ($check == true) {
                echo json_encode(array(
                'error' => false,
                'mensaje' => 'Se modificó el curso correctamente'
                ));
            } else {
                echo json_encode(array(
                'error' => true,
                'mensaje' => $check
                ));
            }
                
        }
    }

    public function nuevo_certificado() {
		//if (!($this->permisos >= 1) && $this->session->userdata('tipo') != 1) {
		//	$this->session->set_flashdata('error', 'Ocurrio un error intente nuevamente(Permisos)');
		//	redirect(base_url() . $this->input->post('from'));
	    //}
		
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
			//$this->form_validation->set_rules('tutor', 'instructor', 'required|trim');
			$this->form_validation->set_rules('patron_representante', 'Patron/Representante', 'required|trim');
			$this->form_validation->set_rules('representante_trabajadores', 'Representante de Trabajadores', 'required|trim');
			//$this->form_validation->set_rules('folio', 'folio', 'trim');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error', 'Datos incorrectos, intente nuevamente.');
				redirect(base_url() . $this->input->post('from'));
			}
			
            
			if ($this->curso_model->guardar_certificado()) {
				//$this->session->set_flashdata('exito', 'Registro exitoso');
				echo json_encode(array(
                    'error' => false,
                    'mensaje' => 'Se registro el curso correctamente'
                ));
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
		
	}

    public function nuevoInstructor()
    {
        if($this->input->post('nombre_instructor') != ''){
            $this->form_validation->set_rules('nombre_instructor', 'Nombre Instructor', 'required');
        }else{
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        }
        if ($this->form_validation->run() == false) {
            echo json_encode(array(
            'status' => false,
            'message' => 'El instructor es requerido'
            ));
        } else {

            $carpeta = './uploads/instructores';
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
            $this->load->library('upload');
        $urlimg = $carpeta . '/';
        $config['upload_path'] = $urlimg;
        $config['allowed_types'] = 'jpg|png|PNG|jpeg';
        $config['overwrite'] = true;
        try {
          
            $check = $this->curso_model->nuevoInstructor();

            $config['file_name'] = $check . '.jpg';
            $this->upload->initialize($config);
            $this->upload->do_upload('firma');
          
          if ($check > 0) {
              echo json_encode(array(
              'error' => false,
              'mensaje' => 'Se registro el instructor correctamente'
              ));
          } else {
              echo json_encode(array(
              'error' => true,
              'mensaje' => $check
              ));
          }
        } catch (Exception $e) {
            $this->rmDir_rf($carpeta);
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

  public function mostrarCursos()
    {
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "cursos" => $this->curso_model->getCursos($buscar, $inicio, $cantidad),
          "totalRegistros" => count($this->curso_model->getCursos($buscar)),
          "cantidad" => $cantidad
        );

        echo json_encode($data);
    }

    public function mostrarInstructores()
    {
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "instructores" => $this->curso_model->getInstructores($buscar, $inicio, $cantidad),
          "totalRegistros" => count($this->curso_model->getInstructores($buscar)),
          "cantidad" => $cantidad
        );

        echo json_encode($data);
    }

    public function reporte_excel()
    {
        $this->load->model('personal_model');
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
			$this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->fecha_inicio_format); 
			$this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->fecha_termino_format);
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
}
