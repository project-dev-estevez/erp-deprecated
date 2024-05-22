<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sistemas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sistemas_model');
        $this->load->model('almacen_model');
        $this->load->model('departamentos_model');
        $this->load->model('root_model');
        if (!$this->session->userdata('is_logued_in')) {
            redirect(base_url().'login');
        }
    }

    //Función que carga la vista de los tickets
    public function index()
    {
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Sistemas';
        $datos['clase_pagina'] = 'admin-page';
        $datos['permisos']  = $this->root_model->permisos();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('sistemas/horometros', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para cargar la vista de horómetros
    public function horometros()
    {
        $this->permisos = $this->departamentos_model->permisos('almacen_sistemas');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Almacén Sistemas';
        $datos['clase_pagina'] = 'almacen-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $datos['almacen'] = $this->almacen_model->detalle_almacen(UID_ALMACEN_SISTEMAS);
        //if ($datos['almacen']) {
        //  $datos['inventario_almacen'] = $this->almacen_model->inventario_almacen($datos['almacen']->idtbl_almacenes);
        //}
        $this->load->view('sistemas/horometros', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    public function mostrarAlmacenSistemasAF()
    {
        //valor a buscar
        $select = $this->input->post('selectAC');
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
            "almacenSistemas" => $this->sistemas_model->inventarioAlmacenSistemasAF($buscar, $select, $inicio, $cantidad),
            "totalRegistros" => count($this->sistemas_model->inventarioAlmacenSistemasAF($buscar, $select)),
            "cantidad" => $cantidad
        );

        echo json_encode($data);
    }

    public function mostrarActas()
    {
        //valor a buscar
        $select = $this->input->post('selectacta');
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "actas" => $this->sistemas_model->mostrarActas($buscar, $select, $inicio, $cantidad),
      "totalRegistros" => count($this->sistemas_model->mostrarActas($buscar, $select)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
    }   

    //Función para cargar la vista de generar ticket de sistemas
    public function generar_ticket_sistemas()
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Generar Ticket Sistemas';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();   
        $datos['desarrolladores'] = $this->personal_model->desarrolladores();     
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket-sistemas', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    public function reporte_sistemas()
    {
        $this->permisos = $this->departamentos_model->permisos('reporte_sistemas');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        $this->load->model('personal_model');
        $this->load->model('proyectos_model');
        $this->load->model('controlvehicular_model');
        $header['titulo'] = 'Reportes Sistemas';
        $header['clase_pagina'] = 'almacen-page';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    
        $datos['catalogo'] = $this->almacen_model->catalogo('sistemas');
        //$datos['mecanicos'] = $this->controlvehicular_model->todos_los_mecanicos();
        //$datos['almacenes'] = $this->almacen_model->almacenes();
        $datos['token'] = $this->token();
        $this->load->view('plantillas/header', $header);
        $this->load->view('plantillas/menu');
        $this->load->view('sistemas/reportes-sistemas', $datos);
        $this->load->view('plantillas/footer');
    }

    public function reporte_excel_sistemas()
    {
        $this->permisos = $this->departamentos_model->permisos('reporte_sistemas');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            if ($this->input->post('tipo_de_reporte') == 'Unidad') {
                $this->form_validation->set_rules('tipo_reporte', 'Tipo de Reporte para ' . $this->input->post('tipo_de_reporte'), 'required|in_list[general,asignado,disponible,servicio,verificacion,tenencia,seguro,servicio_km,placas,cambio_propietario,siniestro]');
            } else {
                redirect(base_url() . 'almacen/reportes-control-vehicular', 'refresh');
            }
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('errorReportesCV', trim(preg_replace('/\s+/', ' ', $this->form_validation->error_string())));
                redirect(base_url() . 'almacen/reportes-control-vehicular', 'refresh');
            } else {
                $reporte = $this->sistemas_model->reporte_sistemas($this->input->post('tipo_de_reporte'));
                if (count($reporte) > 0) {
                    //Cargamos la librería de excel.
                    $this->load->library('excel');
                    $this->excel->setActiveSheetIndex(0);
                    $this->excel->getActiveSheet()->setTitle('Reporte Por ' . $this->input->post('tipo_de_reporte'));
                    //Contador de filas
                    $contador = 1;
                    //Le aplicamos ancho las columnas.
                    $tipoReporte = '';
                    if ('general'  == $this->input->post('tipo_reporte') || $this->input->post('tipo_reporte') == 'asignado') {
                        $tipoReporte = 'General';
                        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
                        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
  
                        //$this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
                        //$this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(60);
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
 
                        //$this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
                        //$this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
                        //Definimos los títulos de la cabecera.
                        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Folio');
                        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Unidad');
                        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Descripción');

                        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Modelo');
                        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Marca');
                        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Personal');
                        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Fecha asignación');
                        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha finalización');
                        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Autor');
                        //$this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Seguro');
                        //$this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Proyecto');
                        
                        foreach ($reporte as $dato) {
                            //Incrementamos una fila más, para ir a la siguiente.
                            $contador++;
                            //Informacion de las filas de la consulta.
                            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato['folio']);
                            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato['numero_interno']);
                            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato['descripcion']);
                           
                            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato['modelo']);
                            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato['marca']);
                            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato['nombres'].' '.$dato['apellido_paterno'].' '.$dato['apellido_materno']);
                            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato['fecha_asignacion']);
                            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato['fecha_finalizacion']);
                            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato['autor']);
                            //$this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato['seguro']);
                            //$this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato['numero_proyecto'] . " " . $dato['nombre_proyecto']);
                        }
                    } elseif ($this->input->post('tipo_reporte') == 'disponible') {
                        $tipoReporte = 'Disponible';
                        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
 
                        //Le aplicamos negrita a los títulos de la cabecera.
                        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
                        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
                        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
                        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
                     
                        //Definimos los títulos de la cabecera.
                        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Unidad');
                        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Descripción');
        
                        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Modelo');
                        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Marca');
                        foreach ($reporte as $dato) {
                            //Incrementamos una fila más, para ir a la siguiente.
                            $contador++;
                            //Informacion de las filas de la consulta.
                            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato['numero_interno']);
                            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato['descripcion']);
                  
                            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato['modelo']);
                            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato['marca']);
                        }
                    } elseif ('servicio'  == $this->input->post('tipo_reporte')) {
                        $tipoReporte = 'servicio';
                        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
                        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(40);
                        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
                        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
            
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
            
                        //Definimos los títulos de la cabecera.
                        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'ID Servicio');
                        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Unidad');
                        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Descripción');
                        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Placas');
                        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Entidad federativa placas');
                        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'N° Motor');
                        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Tipo combustible');
                        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Modelo');
                        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Marca');
                        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Detalle');
                        $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Kilometraje');
                        $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Fecha Programada');
                        $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Fecha de Inicio');
                        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Fecha Fin');
                        $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Mecanico');
                        $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Creado por');
                        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Productividad');
                        $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'Tipo Mantenimiento');

                        foreach ($reporte as $dato) {
                            //Incrementamos una fila más, para ir a la siguiente.
                            $contador++;
                            //Informacion de las filas de la consulta.
                            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato['idtbl_tramites_vehiculares']);
                            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato['numero_interno']);
                            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato['descripcion']);
                            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato['placas']);
                            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato['entidad_federativa']);
                            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato['no_motor']);
                            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato['tipo_combustible']);
                            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato['modelo']);
                            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato['marca']);
                            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato['detalle_tramite']);
                            $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato['km']);
                            $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato['fecha_tramite']);
                            $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato['fecha_inicio'] ? $dato['fecha_inicio'] : "--");
                            $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato['fecha_finalizacion']);
                            $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato['mecanico']);
                            $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato['autor']);
                            $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato['productividad']);
                            $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato['rt0']);
                        }
                    }
                    //Le ponemos un nombre al archivo que se va a generar.
                    $archivo = 'Reporte_por_' . $this->input->post('tipo_de_reporte') . '_' . $this->input->post('tipo_reporte') . '_' . date('d-m-Y  H:i:s') . '.xls';
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
        } else {
            $this->session->set_flashdata('errorReportesControlVehicular', 'Token Incorrecto.');
            redirect(base_url() . 'almacen/reportes-control-vehicular', 'refresh');
        }
    }

    //Función para cargar la vista de generar un nuevo servicio
    public function nuevo_servicio($idalmacen)
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Nuevo Servicio';
        $datos['equipo'] = $this->sistemas_model->equipoById($idalmacen);
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('sistemas/nuevo-servicio', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para guardar el ticket
    public function guardarTicket()
    {
        $this->load->model('soporte_model');
        $uid = uniqid();
            
        $this->form_validation->set_rules('imagen6', 'imagen6', 'required');

        if ($this->form_validation->run() == false) {
            echo json_encode(array(
                'status' => false,
                'message' => 'Crear la imagen de la firma'
            ));
        } else {
            $baseFromJavascript6 = $_POST['imagen6'];
            $data6 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript6));
            $filepath6 = "./uploads/firmas/soporte/".$uid.".png";
            file_put_contents($filepath6, $data6);

            $imagenes = array(
            'imagen6' => $filepath6
            );
            $carpeta = './uploads/soporte/' . $uid;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0755, true);
                }
                $this->load->library('upload');
                $urlimg = $carpeta . '/';
                $config['upload_path'] = $urlimg;
                $config['allowed_types'] = 'pdf|png|jpg|jpeg';
                $config['overwrite'] = true;
                try {
                    $config['file_name'] = 'evidencias';
                    $this->upload->initialize($config);
                    $this->upload->do_upload('evidencias');
                    //if (!$this->upload->do_upload('evidencias')) {
                        //throw new Exception('Problema al cargar evidencias.');
                    //}
                    if($this->session->userdata('tipo') == 20 && $this->input->post('tipo_ticket') == 'dw'){
                        $parametros = array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'estatus' => 'DW',
                            'imagenes_firmas' => json_encode($imagenes),
                            'tbl_users_idtbl_users' => $this->session->userdata('id'),
                            'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                            'uid' => $uid,
                            'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                            'tipo' => $this->input->post('tipo'),
                            'prioridad' => $this->input->post('prioridad'),
                            'descripcion' => $this->input->post('descripcion'),
                            'tipo_ticket' => $this->input->post('tipo_ticket')
                            );
                    }elseif($this->session->userdata('id') == 3 && $this->input->post('tipo_ticket') == 'dw'){
                        $parametros = array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'estatus' => 'DW',
                            'imagenes_firmas' => json_encode($imagenes),
                            'tbl_users_idtbl_users' => $this->session->userdata('id'),
                            'tbl_users_idtbl_users_dw' => $this->input->post('desarrollador'),
                            'uid' => $uid,
                            'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                            'tipo' => $this->input->post('tipo'),
                            'prioridad' => $this->input->post('prioridad'),
                            'descripcion' => $this->input->post('descripcion'),
                            'tipo_ticket' => $this->input->post('tipo_ticket')
                            );
                    }elseif($this->session->userdata('tipo') == 2 && $this->input->post('tipo_ticket') == 'ti'){
                        $parametros = array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'estatus' => 'TI',
                            'imagenes_firmas' => json_encode($imagenes),
                            'tbl_users_idtbl_users' => $this->session->userdata('id'),
                            'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                            'uid' => $uid,
                            'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                            'tipo' => $this->input->post('tipo'),
                            'prioridad' => $this->input->post('prioridad'),
                            'descripcion' => $this->input->post('descripcion'),
                            'tipo_ticket' => $this->input->post('tipo_ticket')
                            );
                    }else{
                        $parametros = array(
                        'fecha' => date('Y-m-d H:i:s'),
                        'estatus' => 'creado',
                        'imagenes_firmas' => json_encode($imagenes),
                        'tbl_users_idtbl_users' => $this->session->userdata('id'),
                        'uid' => $uid,
                        'tipo' => $this->input->post('tipo'),
                        'prioridad' => $this->input->post('prioridad'),
                        'descripcion' => $this->input->post('descripcion'),
                        'tipo_ticket' => $this->input->post('tipo_ticket')
                        );
                    }
                                  
                    $this->soporte_model->guardarTicket($parametros);
                    echo json_encode(array(
                    'status' => true,
                    'message' => 'El ticket se ha creado correctamente'
                    ));
                } catch (Exception $e) {
                    echo json_encode(array(
                    'status' => false,
                    'message' => $e->getMessage()
                    ));
                }
            
        }
    }

    //Función para mostrar los tickets
    public function mostrarTickets()
    {
        $this->load->model('departamentos_model');
        $this->load->model('soporte_model');
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "tickets" => $this->soporte_model->mostrarTickets($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->soporte_model->mostrarTickets($buscar)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
    }

    //Función para guardar el checklist del servicio
  public function guardarChecklistServicio() {
    $this->load->model('controlvehicular_model');
    
    $dtl_almacen = $this->input->post('iddtl_almacen');    

    $this->form_validation->set_rules('tipo_mantenimiento', 'tipo_mantenimiento', 'required');
    
		if ($this->form_validation->run() == FALSE) {
			echo json_encode(array(
				'status' => false,
				'message' => 'El tipo de manteminiemto es requerido'
			));
		} 
    else {

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
    		'r10' => $_POST['r10']
    		  		    	
      );         
      
        $parametros = array(          
    	  'checklist' => json_encode($checklist),          
          'tipo_servicio' => $this->input->post('tipo_mantenimiento'),
          'dtl_almacen_iddtl_almacen' => $this->input->post('iddtl_almacen'),
          'fecha' => date('Y-m-d'),
          'hora' => date('H:i:s'),
          'observaciones' => $this->input->post('observaciones'),
    	  'tbl_users_idtbl_users' => $this->session->userdata('id')
        );

        $query = $this->sistemas_model->guardarChecklistServicio($parametros);

        if($query){
          echo json_encode(array(
            'status' => true,
            'message' => 'El checklist del servicio ha sido guardado correctamente'
          ));
        }else{
          echo json_encode(array(
            'status' => false,
            'message' => 'Error al guardar el checklist correctamente'
          ));
        } 
      
  	}
  }

    //Función para mostrar los tickets sistemas
    public function mostrarTicketsSistemas()
    {
        $this->load->model('departamentos_model');
        $this->load->model('soporte_model');
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "tickets" => $this->soporte_model->mostrarTicketsSistemas($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->soporte_model->mostrarTicketsSistemas($buscar)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
    }

    public function getTodosActivosAsignados() {
        $this->load->model('sistemas_model');
        $resultado = $this->sistemas_model->getTodosActivosAsignados($_POST['idtbl_usuarios']);
        echo json_encode($resultado);
      }

      public function mostrarTodasIncidencias() {
        
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "incidencias" => $this->sistemas_model->todasIncidencias($buscar, $inicio, $cantidad),
          "totalRegistros" => count($this->sistemas_model->todasIncidencias($buscar)),
          "cantidad" => $cantidad
        );
    
        echo json_encode($data);
      }

    public function detalle_producto($iddtl_almacen) {
        $this->permisos = $this->departamentos_model->permisos('almacen_alto_costo');
        $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
        $this->permisos_almacen_sistemas = $this->departamentos_model->permisos('almacen_sistemas');
        $this->permisos_almacen_general = $this->departamentos_model->permisos('almacen');
        if (!($this->permisos > 0 || $this->permisos_almacen_autos_control_vehicular > 0 || $this->permisos_almacen_sistemas > 0 || $this->permisos_almacen_general))
          redirect(base_url());
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Detalle Producto';
        $datos['clase_pagina'] = 'almacen-page';
        $this->load->view('plantillas/header', $datos);
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $datos['detalle'] = $this->sistemas_model->detalle_producto($iddtl_almacen);
        $this->load->view('sistemas/detalle-producto', $datos);
        $this->load->view('plantillas/footer', $datos);
      }

    public function detalle_checklist($idtbl_checklist) {
        $this->permisos = $this->departamentos_model->permisos('almacen_alto_costo');
        $this->permisos_almacen_autos_control_vehicular = $this->departamentos_model->permisos('almacen_autos_control_vehicular');
        $this->permisos_almacen_sistemas = $this->departamentos_model->permisos('almacen_sistemas');
        $this->permisos_almacen_general = $this->departamentos_model->permisos('almacen');
        if (!($this->permisos > 0 || $this->permisos_almacen_autos_control_vehicular > 0 || $this->permisos_almacen_sistemas > 0 || $this->permisos_almacen_general))
          redirect(base_url());
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Detalle Producto';
        $datos['clase_pagina'] = 'almacen-page';
        $this->load->view('plantillas/header', $datos);
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $datos['checklist'] = $this->sistemas_model->detalle_checklist($idtbl_checklist);
        $datos['detalle'] = json_decode($this->sistemas_model->detalle_checklist_detalle($idtbl_checklist));
        $this->load->view('sistemas/detalle-servicio', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    public function incidencias_sistemas()
    {
        $this->permisos = $this->departamentos_model->permisos('incidencias_sistemas');
        if (!($this->permisos > 0)) {
            redirect(base_url());
        }
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Incidencias';
        $datos['clase_pagina'] = 'almacen-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $datos['precio_dolar'] = $this->precio_actual_dolar();
        $this->load->view('sistemas/incidencias', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para ver detalle del ticket
    public function detalle_ticket($uid)
    {
        $data['token'] = $this->token();
        $data['titulo'] = 'Detalle Ticket';
        $data['clase_pagina'] = 'ticket-page';
        $datos['detalle'] = $this->soporte_model->detalle_ticket($uid);
        $datos['uid'] = $uid;
        $this->load->view('plantillas/header', $data);
        $this->load->view('plantillas/menu', $data);
        $this->load->view('soporte/detalle-ticket', $datos);
        $this->load->view('plantillas/footer');
    }

    //Función para aprobar tickets
    public function aprobar_ticket($proceso)
    {
        if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
            if($proceso == 'finalizar'){
                $uid = $this->input->post('uid');
                $this->form_validation->set_rules('imagen7', 'imagen7', 'required');

                if ($this->form_validation->run() == false) {
                    echo json_encode(array(
                    'status' => false,
                    'message' => 'Crear la imagen de la firma'
                    ));
                } else {
                    $baseFromJavascript7 = $_POST['imagen7'];
                    $data7 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript7));
                    $filepath7 = "./uploads/firmas/soporte/".$uid."7.png";
                    file_put_contents($filepath7, $data7);

                    $imagenes = array(
                    'imagen7' => $filepath7
                    );
                }
                $check = $this->soporte_model->aprobar_ticket($proceso, $imagenes);
                if ($check == true) {
                    echo json_encode(array(
                    'error' => false,
                    'message' => 'Ticket finalizado correctamente.'
                    ));
                    $this->almacen_model->log($this->session->userdata('nombre') . ' finalizó un ticket', 'soprte/detalle-ticket/' . $this->input->post('uid'));
                } else {
                    echo json_encode(array(
                    'error' => true,
                    'message' => $check
                    ));
                }
            }else{
                $check = $this->soporte_model->aprobar_ticket($proceso, $imagenes='');
                if ($check == true) {
                    echo json_encode(array(
                    'error' => false,
                    'mensaje' => 'Ticket aprobado correctamente.'
                    ));
                    $this->almacen_model->log($this->session->userdata('nombre') . ' aprobo un ticket', 'soprte/detalle_ticket/' . $this->input->post('uid'));
                } else {
                    echo json_encode(array(
                    'error' => true,
                    'mensaje' => $check
                    ));
                }
            }
        } else {
            echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
          ));
        }
    
    }

    //Cancelar Ticket
    public function cancelar_ticket()
    {                        
        $check = $this->soporte_model->cancelar_ticket();
        if ($check == true) {
            echo json_encode(array(
                'error' => false,
                'mensaje' => 'Ticket cancelado correctamente.'
            ));
            $this->almacen_model->log($this->session->userdata('nombre') . ' cancelo un ticket', 'soporte/detalle/' . $this->input->post('uid'));
        } else {
            echo json_encode(array(
               'error' => true,
               'mensaje' => $check
            ));
        }
    
    }

  //Función para el token
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }

  public function obtenerProductividadAnioMes(){
    $datos = [];
    $datos['usuarios'] =  $this->soporte_model->obternerUsuariosDesarrolladores();
    $datos['tickets'] =  $this->soporte_model->obtenerProductividadAnioMes();
    echo json_encode($datos);
  }

  //Función que carga la vista de los tickets de sistemas
  public function sistemas()
  {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Soporte_sistemas';
      $datos['clase_pagina'] = 'soporte-sistemas-page';
      $datos['permisos']  = $this->root_model->permisos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('soporte/ver-tickets-sistemas', $datos);
      $this->load->view('plantillas/footer', $datos);
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

  public function excel_consumibles_sistemas()
    {
        $reporte = $this->sistemas_model->inventarioAlmacenSistemasConsumibles();
        if (count($reporte) > 0) {
            //Cargamos la librería de excel.
            $this->load->library('excel');
            $this->excel->setActiveSheetIndex(0);
            $this->excel->getActiveSheet()->setTitle('Consumibles Sistemas ');
            //Contador de filas
            $contador = 1;
            //Le aplicamos ancho las columnas.
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
            $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

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

            //Definimos los títulos de la cabecera.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Neodata');
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Código');
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Marca');
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Modelo');
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Descripción');
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Unidad');
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Categoría');
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Existencias');
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Estatus');
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Precio Unitario');
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Total');
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Rack');
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Gabeta');
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Parte');

            foreach ($reporte as $dato) {
                //Incrementamos una fila más, para ir a la siguiente.
                $contador++;
                //Informacion de las filas de la consulta.
                $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->neodata);
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid);
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->marca);
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->modelo);
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->descripcion);
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->unidad_medida);
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->categoria);
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->existencias);
                $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->estatus);
                $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->precio);
                $this->excel->getActiveSheet()->setCellValue("K{$contador}", ($dato->precio * $dato->existencias));
                $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->rack);
                $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->gabeta);
                $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->parte);
            }

            //Le ponemos un nombre al archivo que se va a generar.
            $archivo = 'Consumibles_Sistemas' . date('d-m-Y  H:i:s') . '.xls';
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

  public function usuario_asignacionessistemas()
    {
     $this->load->model('Sistemas_model');
      $year = $this->input->post('year');
      $usuario = $this->input->post('usuario');
      $resultado = $this->Sistemas_model->asignacionesdispositivos($year, $usuario);
      echo json_encode($resultado);

    }

}