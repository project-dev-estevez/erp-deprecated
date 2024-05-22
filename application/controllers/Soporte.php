<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Soporte extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('soporte_model');
        $this->load->model('almacen_model');
        $this->load->model('root_model');
        if (!$this->session->userdata('is_logued_in')) {
            redirect(base_url().'login');
        }
    }

    //Función que carga la vista de los tickets
    public function index()
    {
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Soporte';
        $datos['clase_pagina'] = 'admin-page';
        $datos['permisos']  = $this->root_model->permisos();
        $datos['totalTickets'] = $this->soporte_model->totalTickets($estatus = '');
        $datos['usuarios'] = $this->personal_model->todos_los_users(); 
        $datos['desarrolladores'] = $this->soporte_model->obternerUsuariosDesarrolladores();
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/ver-tickets', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    public function asignar_ticket() {
        $this->load->model('departamentos_model');	
        $this->load->model('soporte_model');
        $this->load->model('almacen_model');        
          if($this->session->userdata('id')==121){                
                $check = $this->soporte_model->asignar_ticket();
                if ($check == true) {
                  echo json_encode(array(
                    'error' => false,
                    'mensaje' => 'Ticket asignado correctamente.'
                  ));
                  $this->almacen_model->log($this->session->userdata('nombre') . ' Asigno un ticket ', 'soporte/asignar_ticket/');
                } else {
                  echo json_encode(array(
                    'error' => true,
                    'mensaje' => $check
                  ));
                }
            }else{                
                echo json_encode(array(
                    'error' => true,
                    'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
                  )); 
            }                     
        }

        public function asignar_ticket_dos() {
            $this->load->model('departamentos_model');	
            $this->load->model('soporte_model');
            $this->load->model('almacen_model');        
              if($this->session->userdata('id')==121){                
                    $check = $this->soporte_model->asignar_ticket_dos();
                    if ($check == true) {
                      echo json_encode(array(
                        'error' => false,
                        'mensaje' => 'Ticket asignado correctamente.'
                      ));
                      $this->almacen_model->log($this->session->userdata('nombre') . ' Asigno un ticket ', 'soporte/asignar_ticket/');
                    } else {
                      echo json_encode(array(
                        'error' => true,
                        'mensaje' => $check
                      ));
                    }
                }else{                
                    echo json_encode(array(
                        'error' => true,
                        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
                      )); 
                }                     
            }

    //Función que carga la vista de los tickets de ingienería
    public function ticket_ingenieria()
    {
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Ticket Ingenieria';
        $datos['clase_pagina'] = 'admin-page';
        $datos['permisos']  = $this->root_model->permisos();
        $datos['totalTickets'] = $this->soporte_model->totalTickets($estatus = '');
        $datos['usuarios'] = $this->personal_model->todos_los_users(); 
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/ver-tickets-ingenieria', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para cargar la vista de generar ticket
    public function generar_ticket()
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Generar Ticket';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();   
        $datos['desarrolladores'] = $this->personal_model->desarrolladores();     
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para cargar la vista de generar ticket ingenieria
    public function generar_ticket_ingenieria()
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $this->load->model('estados_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Generar Ticket Ingeniería';
        $datos['estados'] = $this->estados_model->estados();
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();   
        $datos['desarrolladores'] = $this->personal_model->desarrolladores();     
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket-ingenieria', $datos);
        $this->load->view('plantillas/footer', $datos);
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
        //$datos['desarrolladores'] = $this->personal_model->desarrolladores();     
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket-sistemas', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para cargar la vista de generar ticket de cv
    public function generar_ticket_cv()
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Generar Ticket CV';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();  
        $datos['ecos'] = $this->soporte_model->ecos();   
        //$datos['desarrolladores'] = $this->personal_model->desarrolladores();
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket-cv', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Función para cargar la vista de generar ticket de mantenimientos
    public function generar_ticket_mantenimiento()
    {
        $this->load->model('proyectos_model');
        $this->load->model('personal_model');
        $datos['token'] = $this->token();
        $datos['titulo'] = 'Generar Ticket Mantenimientos';
        $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
        $datos['personal'] = $this->personal_model->todos_los_usuarios_almacen();   
        //$datos['desarrolladores'] = $this->personal_model->desarrolladores();
        $datos['ruth'] = $this->soporte_model->mostrarPersonal();
        $datos['clase_pagina'] = 'ticket-page';
        $this->load->view('plantillas/header', $datos);
        $this->load->view('plantillas/menu', $datos);
        $this->load->view('soporte/generar-ticket-mantenimiento', $datos);
        $this->load->view('plantillas/footer', $datos);
    }

    //Aprueba las solicitudes
  public function changeStatus() {
        $check = $this->soporte_model->changeStatus();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Se cambio el estatus correctamente.'
          ));
          $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio el estatus seguimiento del ticket a: '.$this->input->post('estatus'), $this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      
    
  }

   //Aprueba las solicitudes
   public function changeStatusSeguimiento() {
    $check = $this->soporte_model->changeStatusSeguimiento();
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se cambio el estatus correctamente.'
      ));
      $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio el estatus seguimiento del ticket a: '.$this->input->post('estatus'), $this->input->post('uid'));
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  

}

//Aprueba las solicitudes
public function changeStatusSupervisor() {
    $check = $this->soporte_model->changeStatusSupervisor();
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se cambio el estatus correctamente.'
      ));
      $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio el estatus supervisor del ticket a: '.$this->input->post('estatus'), $this->input->post('uid'));
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  

}

public function movimientos_ticket($uid) {

    $datos['token'] = $this->token();
    $datos['titulo'] = 'Movimientos Ticket';
    $datos['clase_pagina'] = 'almacen-page';
    $this->load->view('plantillas/header', $datos);

    $datos['detalle'] = $this->soporte_model->movimientos_ticket($uid);    
    $this->load->view('soporte/movimientos-ticket', $datos);    
    $this->load->view('plantillas/footer', $datos);
  } 

   //Aprueba las solicitudes
   public function changeProyectista() {
    $check = $this->soporte_model->changeProyectista();
    $nombre = $this->soporte_model->nombre_user($this->input->post('proyectista'));
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se cambio el proyectista correctamente.'
      ));
      $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio el proyectista del ticket a: '.$nombre, $this->input->post('uid'));
      $this->soporte_model->insertProyectista($this->input->post('uid'));
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  

}

//Aprueba las solicitudes
public function changeSupervisor() {
    $check = $this->soporte_model->changeSupervisor();
    $nombre = $this->soporte_model->nombre_user($this->input->post('supervisor'));
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se cambio el supervisor correctamente.'
      ));
      $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio el supervisor del ticket a: '.$nombre, $this->input->post('uid'));
      $this->soporte_model->insertSupervisor($this->input->post('uid'));
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  

}

//Aprueba las solicitudes
public function changeFechaCompromiso() {
    $check = $this->soporte_model->changeFechaCompromiso();
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Se cambio la fecha compromiso correctamente.'
      ));
      $this->soporte_model->log_tickets($this->session->userdata('nombre').' cambio la fecha de compromiso del ticket a: '.$this->input->post('fecha_compromiso'), $this->input->post('uid'));
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => $check
      ));
    }
  

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
                $config['allowed_types'] = '*';
                $config['overwrite'] = true;
                try {
                    //$config['file_name'] = 'evidencias';

                    if($this->input->post('tipo_ticket') != 'alguno'){
                        $archivonombre = NULL; 
                        $fileName = NULL;
                        foreach($_FILES["evidencias"]['tmp_name'] as $key => $tmp_name)
                        {
                            //condicional si el fuchero existe
                            if($_FILES["evidencias"]["name"][$key]) {
                                // Nombres de archivos de temporales
                                $archivonombre = $_FILES["evidencias"]["name"][$key]; 
                                $fuente = $_FILES["evidencias"]["tmp_name"][$key]; 
                                $fileName = $_FILES['evidencias']['name'][$key];
                                $carpeta = './uploads/soporte/' . $uid; //Declaramos el nombre de la carpeta que guardara los archivos
                                
                                if(!file_exists($carpeta)){
                                    mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
                                }
                                
                                $dir=opendir($carpeta);
                                $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
                                
                        
                                if(move_uploaded_file($fuente, $target_path)) {	
                                    //echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
                                    } else {	
                                    //echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                                }
                                closedir($dir); //Cerramos la conexion con la carpeta destino
                            }
                        }
                    }else{

                        $fileName = $_FILES['evidencias']['name'];

                        $this->upload->initialize($config);
                        $this->upload->do_upload('evidencias');

                        
                        if (!$this->upload->do_upload('evidencias')) {
                            throw new Exception('Problema al cargar evidencias.');
                        }
                        
                    }
                
                    
                    
                    if($this->session->userdata('tipo') == 20 && $this->input->post('tipo_ticket') == 'dw' && $this->session->userdata('id')!=121){
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
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            //'archivo' => $fileName
                            'archivo' => $archivonombre
                            );
                    }elseif(($this->session->userdata('id') == 3 || $this->session->userdata('id')==121) && $this->input->post('tipo_ticket') == 'dw'){
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
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            //'archivo' => $fileName
                            'archivo' => $archivonombre
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
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            //'archivo' => $fileName
                            'archivo' => $archivonombre
                            );
                    }elseif($this->session->userdata('tipo') == 3 && $this->input->post('tipo_ticket') == 'cv'){
                            $tipo = array(
                                'tipo1' => isset($_POST['tipo1']) ? $this->input->post('tipo1') : NULL,
                                'tipo2' => isset($_POST['tipo2']) ? $this->input->post('tipo2') : NULL,
                                'tipo3' => isset($_POST['tipo3']) ? $this->input->post('tipo3') : NULL,
                                'tipo4' => isset($_POST['tipo4']) ? $this->input->post('tipo4') : NULL,
                                'tipo5' => isset($_POST['tipo5']) ? $this->input->post('tipo5') : NULL,
                                'tipo6' => isset($_POST['tipo6']) ? $this->input->post('tipo6') : NULL,
                                'tipo7' => isset($_POST['tipo7']) ? $this->input->post('tipo7') : NULL,
                                'tipo8' => isset($_POST['tipo8']) ? $this->input->post('tipo8') : NULL,
                                'tipo9' => isset($_POST['tipo9']) ? $this->input->post('tipo9') : NULL,
                                'tipo10' => isset($_POST['tipo10']) ? $this->input->post('tipo10') : NULL
                            );
                        $parametros = array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'estatus' => 'CV',
                            'imagenes_firmas' => json_encode($imagenes),
                            'tbl_users_idtbl_users' => $this->session->userdata('id'),
                            'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                            'uid' => $uid,
                            'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                            'tipo' => json_encode($tipo),
                            'prioridad' => $this->input->post('prioridad'),
                            'descripcion' => $this->input->post('descripcion'),
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            //'archivo' => $fileName,
                            'archivo' => $archivonombre,                        
                            'dtl_almacen_iddtl_almacen' => $this->input->post('eco')
                            );
                    }elseif($this->session->userdata('tipo') != 3 && $this->input->post('tipo_ticket') == 'cv'){
                        $tipo = array(
                            'tipo1' => isset($_POST['tipo1']) ? $this->input->post('tipo1') : NULL,
                            'tipo2' => isset($_POST['tipo2']) ? $this->input->post('tipo2') : NULL,
                            'tipo3' => isset($_POST['tipo3']) ? $this->input->post('tipo3') : NULL,
                            'tipo4' => isset($_POST['tipo4']) ? $this->input->post('tipo4') : NULL,
                            'tipo5' => isset($_POST['tipo5']) ? $this->input->post('tipo5') : NULL,
                            'tipo6' => isset($_POST['tipo6']) ? $this->input->post('tipo6') : NULL,
                            'tipo7' => isset($_POST['tipo7']) ? $this->input->post('tipo7') : NULL,
                            'tipo8' => isset($_POST['tipo8']) ? $this->input->post('tipo8') : NULL,
                            'tipo9' => isset($_POST['tipo9']) ? $this->input->post('tipo9') : NULL,
                            'tipo10' => isset($_POST['tipo10']) ? $this->input->post('tipo10') : NULL
                        );
                    $parametros = array(
                        'fecha' => date('Y-m-d H:i:s'),
                        'estatus' => 'CV',
                        'imagenes_firmas' => json_encode($imagenes),
                        'tbl_users_idtbl_users' => $this->session->userdata('id'),
                        'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                        'uid' => $uid,
                        'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                        'tipo' => json_encode($tipo),
                        'prioridad' => $this->input->post('prioridad'),
                        'descripcion' => $this->input->post('descripcion'),
                        'tipo_ticket' => $this->input->post('tipo_ticket'),
                        //'archivo' => $fileName,
                        'archivo' => $archivonombre,
                        'dtl_almacen_iddtl_almacen' => $this->input->post('eco')
                        );
                }elseif($this->session->userdata('tipo') == 7 && $this->input->post('tipo_ticket') == 'man'){
                        $parametros = array(
                            'fecha' => $this->input->post('fecha'),
                            'estatus' => 'M',
                            'imagenes_firmas' => json_encode($imagenes),
                            //'tbl_users_idtbl_users' => $this->input->post('solicitante'),
                            'tbl_users_idtbl_users_dw' => $this->session->userdata('id'),
                            'tbl_usuarios_idtbl_usuariosman' => $this->input->post('solicitante'),
                            'uid' => $uid,
                            'fecha_aprobacion_dw' => date('Y-m-d H:i:s'),
                            'tipo' => $this->input->post('tipo'),
                            'prioridad' => $this->input->post('prioridad'),
                            'descripcion' => $this->input->post('descripcion'),
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            'tipo_servicio' => isset($_POST['servicio']) ? $this->input->post('servicio') : NULL,
                            //'archivo' => $fileName
                            'archivo' => $archivonombre                            
                        );
                    }elseif($this->input->post('tipo_ticket') == 'ingenieria'){
                        $parametros = array(
                            'fecha' => date('Y-m-d H:i:s'),
                            'estatus' => '',
                            'imagenes_firmas' => json_encode($imagenes),
                            'tbl_users_idtbl_users' => $this->session->userdata('id'),
                            'tbl_users_idtbl_users_dw' => $this->input->post('coordinador'),
                            'uid' => $uid,
                            'dependencia' => $this->input->post('dependencia') != 'otro' ? $this->input->post('dependencia') : $this->input->post('otro_dependencia'),
                            'tipo' => $this->input->post('tipo'),
                            'fecha_entrega' => $this->input->post('fecha_entrega'),
                            'uso' => $this->input->post('uso'),
                            'observaciones' => $this->input->post('observaciones'),
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            'tbl_proyectos_idtbl_proyectos' => $this->input->post('proyecto'),
                            'tbl_segmentos_proyecto_idtbl_segmentos_proyecto' => isset($_POST['segmento']) && $this->input->post('segmento') != '' ? $this->input->post('segmento') : NULL,
                            'mercado' => $this->input->post('mercado'),
                            'especificaciones' => nl2br($this->input->post('especificaciones')),
                            'archivo' => $fileName
                            //'archivo' => $archivonombre
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
                            'tipo_ticket' => $this->input->post('tipo_ticket'),
                            'tipo_servicio' => isset($_POST['servicio']) ? $this->input->post('servicio') : NULL,
                            //'archivo' => $fileName,
                            'archivo' => $archivonombre,
                            'dtl_almacen_iddtl_almacen' => $this->input->post('eco')                            
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
    public function mostrarTickets(){
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

      //Función para exportar a excel registro de tickets
  public function excel_soporteCV()
  {
    $this->load->model('soporte_model');
      $reporte = $this->soporte_model->mostrarTicketsCV();
      if (count($reporte) > 0) {
          //Cargamos la librería de excel.
          $this->load->library('excel');
          $this->excel->setActiveSheetIndex(0);
          $this->excel->getActiveSheet()->setTitle('Tickets CV ');
          //Contador de filas
          $contador = 1;
          //Le aplicamos ancho las columnas.
          $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
          $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
          $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
          $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(13);
          $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(40);
          $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
          $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
          $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(25); 
          $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);          

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
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');            
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha Creación');
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Autor');
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Eco');
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Tipo');
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estatus');            
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Prioridad');
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha Aprobación'); 
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Técnico');                  
          

          foreach ($reporte as $dato) {
              //Incrementamos una fila más, para ir a la siguiente.
              $contador++;

              //Informacion de las filas de la consulta.
              $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);                
              $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha);
              $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->autor);
              $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_interno);
              $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tipo);
              $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->estatus);                
              $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->prioridad);
              $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_aprobacion_dw); 
              $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->nombre_desarrollador);              
              
          }

          //Le ponemos un nombre al archivo que se va a generar.
          $archivo = 'Tickets_CV'. '.xls';
          header('Content-Type: application/vnd.ms-excel');
          header('Content-Disposition: attachment;filename="' . $archivo . '"');
          header('Cache-Control: max-age=0');
          $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
          //Hacemos una salida al navegador con el archivo Excel.
          $objWriter->save('php://output');
      } else {
          $this->session->set_flashdata('errorReportesCV', 'No hay información para generar reporte.');
          redirect(base_url() . 'almacen/', 'refresh');
      }
  }

        //Función para exportar a excel registro de tickets
        public function excel_soporte()
        {
          $this->load->model('soporte_model');
            $reporte = $this->soporte_model->mostrarTickets();
            if (count($reporte) > 0) {
                //Cargamos la librería de excel.
                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Tickets_Dw');
                //Contador de filas
                $contador = 1;
                //Le aplicamos ancho las columnas.
                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(23);
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
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha Creación');
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Autor');
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Tipo');
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Estatus');
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Prioridad');            
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Fecha Aprobación');
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Desarrollador');                                   
                
      
                foreach ($reporte as $dato) {
                    //Incrementamos una fila más, para ir a la siguiente.
                    $contador++;
      
                    //Informacion de las filas de la consulta.
                    $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);                
                    $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha);
                    $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->autor);                    
                    $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->tipo);
                    $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->estatus);                
                    $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->prioridad);
                    $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->fecha_aprobacion_dw); 
                    $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->nombre_desarrollador);              
                    
                }
      
                //Le ponemos un nombre al archivo que se va a generar.
                $archivo = 'Tickets_Dw'. '.xls';
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="' . $archivo . '"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //Hacemos una salida al navegador con el archivo Excel.
                $objWriter->save('php://output');
            } else {
                $this->session->set_flashdata('errorReportesDw', 'No hay información para generar reporte.');
                redirect(base_url() . 'almacen/', 'refresh');
            }
        }

        //Función para exportar a excel registro de tickets
        public function excel_soporteSist()
        {
          $this->load->model('soporte_model');
            $reporte = $this->soporte_model->mostrarTicketsSistemas();
            if (count($reporte) > 0) {
                //Cargamos la librería de excel.
                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Tickets_Sis');
                //Contador de filas
                $contador = 1;
                //Le aplicamos ancho las columnas.
                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(23);
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
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha Creación');
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Autor');
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Tipo');
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Estatus');
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Prioridad');            
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Fecha Aprobación');
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Atiende');                                   
                
      
                foreach ($reporte as $dato) {
                    //Incrementamos una fila más, para ir a la siguiente.
                    $contador++;
      
                    //Informacion de las filas de la consulta.
                    $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);                
                    $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha);
                    $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->autor);                    
                    $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->tipo);
                    $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->estatus);                
                    $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->prioridad);
                    $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->fecha_aprobacion_dw); 
                    $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->nombre_desarrollador);              
                    
                }
      
                //Le ponemos un nombre al archivo que se va a generar.
                $archivo = 'Tickets_Sis'. '.xls';
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="' . $archivo . '"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //Hacemos una salida al navegador con el archivo Excel.
                $objWriter->save('php://output');
            } else {
                $this->session->set_flashdata('errorReportesSist', 'No hay información para generar reporte.');
                redirect(base_url() . 'almacen/', 'refresh');
            }
        }

        //Función para exportar a excel registro de tickets
        public function excel_mantenimiento()
        {
          $this->load->model('soporte_model');
            $reporte = $this->soporte_model->mostrarTicketsMantenimiento();
            if (count($reporte) > 0) {
                //Cargamos la librería de excel.
                $this->load->library('excel');
                $this->excel->setActiveSheetIndex(0);
                $this->excel->getActiveSheet()->setTitle('Tickets_Mant');
                //Contador de filas
                $contador = 1;
                //Le aplicamos ancho las columnas.
                $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
                $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(23);
                $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
                $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
                $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
                $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
                $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(23);
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
                $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha Creación');
                $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Autor');
                $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Tipo');
                $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Estatus');
                $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Prioridad');            
                $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Fecha Aprobación');
                $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Atiende');                                   
                
      
                foreach ($reporte as $dato) {
                    //Incrementamos una fila más, para ir a la siguiente.
                    $contador++;
      
                    //Informacion de las filas de la consulta.
                    $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);                
                    $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha);
                    $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->autor);                    
                    $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->tipo);
                    $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->estatus);                
                    $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->prioridad);
                    $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->fecha_aprobacion_dw); 
                    $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->nombre_desarrollador);              
                    
                }
      
                //Le ponemos un nombre al archivo que se va a generar.
                $archivo = 'Tickets_Mant'. '.xls';
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="' . $archivo . '"');
                header('Cache-Control: max-age=0');
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //Hacemos una salida al navegador con el archivo Excel.
                $objWriter->save('php://output');
            } else {
                $this->session->set_flashdata('errorReportesMt', 'No hay información para generar reporte.');
                redirect(base_url() . 'almacen/', 'refresh');
            }
        }

    //Función para mostrar los tickets de ingeniería
    public function mostrarTicketsIngenieria()
    {
        $this->load->model('departamentos_model');
        $this->load->model('soporte_model');
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "tickets" => $this->soporte_model->mostrarTicketsIngenieria($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->soporte_model->mostrarTicketsIngenieria($buscar)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
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

    //Función para mostrar los tickets CV
    public function mostrarTicketsCV()
    {
        $this->load->model('departamentos_model');
        $this->load->model('soporte_model');
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "tickets" => $this->soporte_model->mostrarTicketsCV($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->soporte_model->mostrarTicketsCV($buscar)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
    }

    //Función para mostrar los tickets Mantenimiento
    public function mostrarTicketsMantenimiento()
    {
        $this->load->model('departamentos_model');
        $this->load->model('soporte_model');
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
      "tickets" => $this->soporte_model->mostrarTicketsMantenimiento($buscar, $inicio, $cantidad),
      "totalRegistros" => count($this->soporte_model->mostrarTicketsMantenimiento($buscar)),
      "cantidad" => $cantidad
    );

        echo json_encode($data);
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
            if($proceso == 'finalizar' || $proceso == 'mantenimiento' || $proceso == 'terminado' ){     
                $uid = $this->input->post('uid');                         
                $imagenes = NULL;
                $this->form_validation->set_rules('imagen7', 'imagen7', 'required');                  
                
                    if($proceso == 'mantenimiento'){
                        //if($this->session->userdata('id')!=236 && $proceso == 'finalizar'){
                        foreach($_FILES["evidencias"]['tmp_name'] as $key => $tmp_name)
                        {
                            //condicional si el fuchero existe
                            if($_FILES["evidencias"]["name"][$key]) {
                                // Nombres de archivos de temporales
                                $archivonombre = $_FILES["evidencias"]["name"][$key]; 
                                $fuente = $_FILES["evidencias"]["tmp_name"][$key]; 
                                                                
                                $carpeta = './uploads/soporte/mantenimiento/' . $uid; //Declaramos el nombre de la carpeta que guardara los archivos
                                
                                if(!file_exists($carpeta)){
                                    mkdir($carpeta, 0777, true);	
                                }
                                
                                $dir=opendir($carpeta);
                                $target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
                                
                        
                                if(move_uploaded_file($fuente, $target_path)) {	
                                    //echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
                                    } else {	
                                    //echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
                                }
                                closedir($dir); //Cerramos la conexion con la carpeta destino
                            }
                        }
    
                    //} 
                }
                                              

                if(!isset($_POST['observaciones_usuario'])){
                    if ($this->form_validation->run() == false) {
                        echo json_encode(array(
                        'status' => false,
                        'message' => 'Crear la imagen de la firma'
                        ));
                        return;
                    } else {
                        $baseFromJavascript7 = $_POST['imagen7'];
                        $data7 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript7));
                        $filepath7 = "./uploads/firmas/soporte/".$uid."7.png";
                        file_put_contents($filepath7, $data7);

                        $imagenes = array(
                        'imagen7' => $filepath7
                        );
                    }
                }
                $check = $this->soporte_model->aprobar_ticket($proceso, $imagenes);
                if ($check == true) {
                    echo json_encode(array(
                        'error' => false,
                        'message' => 'Ticket finalizado correctamente.'
                    ));
                    $this->almacen_model->log($this->session->userdata('nombre') . ' finalizó un ticket', 'soporte/detalle-ticket/' . $this->input->post('uid'));
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

  public function obtenerProductividadAnioMesIngenieria(){
    $datos = [];
    $datos['usuarios'] =  $this->soporte_model->obtenerUsuariosIngenieria();
    $datos['tickets'] =  $this->soporte_model->obtenerProductividadAnioMesIngenieria();
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

  //Función que carga la vista de los tickets de sistemas
  public function control_vehicular()
  {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Soporte_cv';
      $datos['clase_pagina'] = 'soporte-cv-page';
      $datos['permisos']  = $this->root_model->permisos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('soporte/ver-tickets-vehicular', $datos);
      $this->load->view('plantillas/footer', $datos);
  }

  //Función que carga la vista de los tickets de mantenimientos
  public function mantenimiento()
  {
      $datos['token'] = $this->token();
      $datos['titulo'] = 'Soporte_Mantenimientos';
      $datos['clase_pagina'] = 'soporte-mant-page';
      $datos['permisos']  = $this->root_model->permisos();
      $this->load->view('plantillas/header', $datos);
      $this->load->view('plantillas/menu', $datos);
      $this->load->view('soporte/ver-tickets-mantenimientos', $datos);
      $this->load->view('plantillas/footer', $datos);
  }


  //Realiza el conteo de los tickets asignados de acuerdo al ID del usuario en la sesión actual.
  public function countNotif()
  {
    $user = $this->session->userdata('id');
    if ($this->session->userdata('id') == 492) {
        $query = $this->db->query("SELECT * FROM tbl_tickets WHERE tbl_users_idtbl_users_dw = $user AND notif_status = 0");
        echo $query->num_rows();
        if ($query->num_rows() > 0) {
            echo "<div class='popup rounded shadow-lg text-center' id='popup'><span class='text-popup'>¡Tienes un nuevo ticket!</span></div>";
        }else {
            return false;
        }
    }elseif ($this->session->userdata('id') == $user && $this->session->userdata('tipo') == 9) {
        $query = $this->db->query("SELECT * FROM tbl_notifications WHERE tbl_user_idtbl_users_proyectista = $user AND notif_status = 0");
        echo $query->num_rows();
        if ($query->num_rows() > 0) {
            echo "<div class='popup rounded shadow-lg text-center' id='popup'><span class='text-popup'>¡Tienes un nuevo ticket!</span></div>";
        }else {
            return false;
        }
    }elseif ($this->session->userdata('id') == 284) {
        $query = $this->db->query("SELECT * FROM tbl_notifications WHERE tbl_users_idtbl_users_supervisor = $user AND notif_status = 0");
        echo $query->num_rows();
        if ($query->num_rows() > 0) {
            echo "<div class='popup rounded shadow-lg text-center' id='popup'><span class='text-popup'>¡Tienes un nuevo ticket!</span></div>";
        }else {
            return false;
        }
    }
  }


    //Enlista los tickets en un dropdown mostrando el uid_ticket y la fecha de asignación.
    public function getNotif()
    {
        $query=$this->soporte_model->getNotif();
    }


    //Actualiza el status de la lista de los tickets. 0 = no leído, 1 = leído.
    public function updateStatus()
    {
        $user = $this->session->userdata('id');
        if ($this->session->userdata('id') == 492) {
            $query = $this->db->query("UPDATE tbl_tickets SET notif_status = 1 WHERE notif_status = 0 AND tbl_users_idtbl_users_dw = 492");
        } elseif ($this->session->userdata('id') == $user && $this->session->userdata('tipo') == 9) {
            $query = $this->db->query("UPDATE tbl_notifications SET notif_status = 1 WHERE notif_status = 0 AND tbl_user_idtbl_users_proyectista = $user");
        }elseif ($this->session->userdata('id') == 284) {
            $query = $this->db->query("UPDATE tbl_notifications SET notif_status = 1 WHERE notif_status = 0 AND tbl_users_idtbl_users_supervisor = 284");
        }
    }

}