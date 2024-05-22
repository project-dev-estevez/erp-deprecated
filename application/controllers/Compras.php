<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Compras extends CI_Controller {
  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *        http://example.com/index.php/welcome
   *    - or -
   *        http://example.com/index.php/welcome/index
   *    - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
  public function __construct() {
    parent::__construct();
    $this->load->model('compras_model');
    $this->load->model('almacen_model');
    $this->load->model('proyectos_model');
    $this->load->model('departamentos_model');
    $this->load->model('proveedores_model');
    $this->load->model('root_model');

    if($this->root_model->getStatus() == 0){
        $this->session->sess_destroy();
        redirect(base_url() . 'login');        
    }
    if (!$this->session->userdata('is_logued_in'))
      redirect(base_url().'login');
  }
  //Carga el index de compras
  public function index() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0))
      redirect(base_url());
    //$datos['solicitudes'] = $this->compras_model->solicitudes();
    //foreach ($datos['solicitudes'] as $key => $value) {
    //  $datos['solicitudes'][$key]->comprado = 0;
    //  $datos['solicitudes'][$key]->cantidad = 0;
    //  foreach ($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue) {
    //    $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
    //    $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
    //  }
    //}
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Compras';
    $datos['permiso'] = $this->departamentos_model->permisos('almacen');
    $datos['clase_pagina'] = 'compras-page';
    $datos['proyectos'] = $this->proyectos_model->proyectos();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/index', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Cambia el proyecto de la solicitud de compra
  public function cambiarProyecto() {
    $parametros = array(
      'tbl_proyectos_idtbl_proyectos' => $_POST['proyecto'],
      'nota_cambio_proyecto' => $_POST['nota_cambio_proyecto']
    );
    if($this->compras_model->actualizarProyectoSolicitudCompra($parametros,$_POST['uid'])) {
      echo "OK";
      return;
    }
    else {
      echo "ERROR";
      return;
    }
  }
  //Muestra un json de las solicitudes de compra
  public function mostrarSolicitudesComprasIndex() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad;

    $datos['solicitudes'] = $this->compras_model->solicitudes($buscar,$inicio,$cantidad);
    $totalRegistros = count($this->compras_model->solicitudes($buscar));
    
    foreach ($datos['solicitudes'] as $key => $value) {
      $datos['solicitudes'][$key]->comprado = 0;
      $datos['solicitudes'][$key]->cantidad = 0;
      foreach ($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue) {
        $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
        $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
      }
    } 
    
    $data = array(
      "solicitudes" => $datos['solicitudes'],
      "totalRegistros" => $totalRegistros,
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Carga la vista de un nuevo pedido
  public function nuevo_pedido() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0))
      redirect(base_url());
    $this->load->model('proveedores_model');
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Compras';
    $datos['clase_pagina'] = 'compras-page';
    $datos['proveedores'] = $this->proveedores_model->proveedores();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/nuevo-pedido', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Guarda el pedido
  public function guardar_pedido() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 2) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $uid = uniqid();
        $check = $this->compras_model->guardar_pedido($uid);
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Pedido creado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' generó un nuevo pedido', 'compras/detalle-pedido/'.$uid);
        } else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Algo salio mal.'
          ));
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }      
      /*
      $carpeta = './uploads/compras_facturas/' . $uid;
      if(!file_exists($carpeta)){
        mkdir($carpeta, 0755, true);
      $this->load->library('upload');
      $urlimg = $carpeta . '/';
      $config['upload_path'] = $urlimg;
      $config['allowed_types'] = '*';
      $config['overwrite'] = true;
      try{
        if(isset($_FILES["factura"]["name"])){
        foreach($_FILES["factura"]['tmp_name'] as $key=> $tmp_name){
          if($_FILES["factura"]["name"][$key]){
            $factura = $_FILES["factura"]["name"][$key]; 
            $fuente = $_FILES["factura"]["tmp_name"][$key];          
            $carpeta = './uploads/compras_facturas/' . $uid; //Declaramos el nombre de la carpeta que guardara los archivos
                                
            if(!file_exists($carpeta)){
              mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
            }
                                
            $dir=opendir($carpeta);
            $target_path = $carpeta.'/'.$factura; //indicamos la ruta de destino de los archivos
                                                        
            if(move_uploaded_file($fuente, $target_path)) {	
              //echo "Los archivos $archivonombre se han cargado de forma correcta.<br>";
              } else {	
              //echo "Se ha producido un error, por favor revise los archivos e intentelo de nuevo.<br>";
            }
            closedir($dir); //Cerramos la conexion con la carpeta destino
          }          
        }  
      }else{
          $factura='';

        }
              
      }

      catch (Exception $e) {
                    echo json_encode(array(
                    'status' => false,
                    'message' => $e->getMessage()
                    ));
                }*/
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
    }/*}*/
  //Cambia el producto de una solicitud
  public function actualizaritem() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 2) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->actualizaritem();
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Actualización exitosa.'
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'Algo salio mal.'
          ));
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Muestra json de los datos de una solicitud mediante el uid
  public function datossolicitud() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->datossolicitud($this->input->post('uid'));
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'datos' => $check
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'No existen datos.'
          ));
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Carga vista de solicitudes de compra
  public function solicitud_compra() {
    $this->permisos = $this->departamentos_model->permisos('solicitud-compra');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitud de compra';
    //$datos['solicitudes'] = $this->compras_model->mis_solicitudes();

    // Nuevos cambios
    // foreach($datos['solicitudes'] as $key=>$value){
    //     $datos['solicitudes'][$key]->comprado=0;
    //     $datos['solicitudes'][$key]->cantidad=0;
    //     foreach($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue){
    //         $datos['solicitudes'][$key]->comprado+=$subvalue->comprado;
    //         $datos['solicitudes'][$key]->cantidad+=$subvalue->cantidad;
    //     }
    // }
    $datos['clase_pagina'] = 'compras-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/mis-solicitudes-de-compra', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Muestra json de las solicitudes de compra por user
  public function mostrarSolicitudesCompras() {
    //valor a buscar
    $buscar = $this->input->post('buscar');
    $numeroPagina = $this->input->post('nropagina');
    $cantidad = 10;
    $inicio = ($numeroPagina -1) * $cantidad; 
    $data = array(
      "solicitudesCompras" => $this->compras_model->mis_solicitudes($buscar,$inicio,$cantidad),
      "totalRegistros" => count($this->compras_model->mis_solicitudes($buscar)),
      "cantidad" => $cantidad
    );

    echo json_encode($data);
  }

  //Carga vista de las solicitudes de compra de estimación
  public function nueva_solicitud_compra_estimacion(){
    $this->permisos = $this->departamentos_model->permisos('solicitud-compra');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitud de compra';
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['clase_pagina'] = 'compras-page';
    $this->load->model('personal_model');
    //$datos['contratistas'] = $this->personal_model->contratistas_solicitudes();
    //$datos['supervisores'] = $this->personal_model->todos_los_usuarios('interno');
    $datos['proveedores'] = $this->proveedores_model->proveedores();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitud-de-compra-estimacion', $datos);
    $this->load->view('plantillas/footer', $datos);
  }

  //Carga vista para una nueva solicitud
  public function nueva_solicitud_compra() {
    $this->permisos = $this->departamentos_model->permisos('solicitud-compra');
    //if (!($this->permisos > 0))
    //  redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitud de compra';
    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();
    if($this->session->userdata('tipo') == 3){
      $datos['ecos'] = $this->almacen_model->ecos();
    }
    /*if($this->session->userdata('tipo') == 14){
      $datos['catalogo'] = $this->almacen_model->catalogo('area_medica');
    }else if($this->session->userdata('tipo') == 3){
      $datos['catalogo'] = $this->almacen_model->catalogo('refacciones_control_vehicular');
    }else if($this->session->userdata('tipo') == 10){
      $datos['catalogo'] = $this->almacen_model->catalogo('seguridad_e_higiene');
    }else if($this->session->userdata('tipo') == 2){
      $datos['catalogo'] = $this->almacen_model->catalogo('sistemas');
    }else{
      $datos['catalogo'] = $this->almacen_model->catalogo();
    }*/
    $datos['clase_pagina'] = 'compras-page';
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitud-de-compra', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  public function mostrarSolicitudesTijuana()
    {
        //valor a buscar
        $buscar = $this->input->post('buscar');
        $buscar2 = $this->input->post('buscar2');
        $numeroPagina = $this->input->post('nropagina');
        $cantidad = 10;
        $inicio = ($numeroPagina - 1) * $cantidad;
        $data = array(
          "solicitudesTijuana" => $this->compras_model->solicitudesTijuana($buscar, $buscar2, $inicio, $cantidad),
          "totalRegistros" => count($this->compras_model->solicitudesTijuana($buscar, $buscar2)),
          "cantidad" => $cantidad
        );
        echo json_encode($data);
    }
  //Guarda una nueva solicitud de compra
  public function nueva_solicitud() {
    $permisos = $this->departamentos_model->permisos('solicitud-compra');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $uid = uniqid();
        /* Si tiene permisos de edicion en compras las solicitudes se crean con estatus aprobado */
        if ($this->session->userdata('tipo') != 3 && $this->departamentos_model->permisos('compras') > 2 && $this->session->userdata('id') != 3 && $this->session->userdata('id') != 18)
          $estatus = 'aprobada';
        else if ($this->session->userdata('tipo') == 3 || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 29))
          $estatus = "pendiente cv2";
        //else if ($this->session->userdata('tipo') == 3 && ($this->session->userdata('id') != 66 && $this->session->userdata('id') != 336))
          //$estatus = "pendiente cv1";
        else if (($this->session->userdata('tipo') == 4) || (isset($_POST['almacen_compra']) && $_POST['almacen_compra'] == 1) || ($this->session->userdata('id') == 325))
          $estatus = "pendiente ag";
        else if($this->session->userdata('tipo') == 1)
          $estatus = "pendiente ac";
        else if($this->session->userdata('tipo') == 2)
          $estatus = "pendiente sis";
        else if($this->session->userdata('id') == 263)
          $estatus = "pendiente fundidora1";
        else if($this->session->userdata('id') == 264)
          $estatus = "pendiente fundidora2";        
        else{
            $estatus = 'pendiente';
        }
        $carpeta = './uploads/compras/' . $uid;
        if (!file_exists($carpeta)) {
            mkdir($carpeta, 0755, true);
        }
        $this->load->library('upload');
        $urlimg = $carpeta . '/';
        $config['upload_path'] = $urlimg;
        $config['allowed_types'] = 'pdf';
        $config['overwrite'] = true;
        try {
          if ($this->session->userdata('tipo') == 2) {
              $config['file_name'] = 'cotizacion-'.$this->input->post('sugerencia_proveedor1');
              $this->upload->initialize($config);
              $this->upload->do_upload('file1');
              $config['file_name'] = 'cotizacion-'.$this->input->post('sugerencia_proveedor2');
              $this->upload->initialize($config);
              $this->upload->do_upload('file2');
              $config['file_name'] = 'cotizacion-'.$this->input->post('sugerencia_proveedor3');
              $this->upload->initialize($config);
              $this->upload->do_upload('file3');
          }elseif($this->session->userdata('tipo') == 3){
              $this->upload->initialize($config);
              $this->upload->do_upload('archivo');
          }
            $check = $this->compras_model->nueva_solicitud($uid, $estatus);
            if ($check == true) {
              $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'mail.estevezjor.mx',
                'smtp_user' => 'prueba@estevezjor.mx', //El correo de la empresa
                 'smtp_pass' => 'YT&IYm;^[q{M', // Su Password de Gmail aqui
                'smtp_port' => '465',
                'smtp_crypto' => 'ssl',
                'mailtype' => 'html',
                'wordwrap' => TRUE,
                'charset' => 'UTF-8'
              );
              $this->load->library('email');
    
              $this->email->initialize($config);
            
              $from = 'prueba@estevezjor.mx';
              $to = 'diego.sanchez@estevezjor.mx';
              $subject = 'Solicitud de compra';
              $usuario = $this->session->userdata('nombre');
              
              //$message = "<meta charset='UTF-8'>";
             
              $message = "<table>";
              $message .= "<tr>";
              $message .= "<td>Fecha realizacion</td>";
              $message .= "<td>".date("Y-m-d h:i:s")."</td></tr><tr>";
              $message .= "<td>".'Nombre del solicitante'."</td>";
              $message .= "<td>Amaranto</td></tr><tr>";
              $message .= "<td>Comentario</td>";
              $message .= "<td>".$this->input->post('comentarios')."</td></tr>";
              foreach ($this->input->post('producto') as $key => $value) {
              $message .= "<tr>";
              $message .= "<td>".$this->input->post('neodata_producto')[$key]."</td>";
              $message .= "<td>".$this->input->post('cantidad')[$key]."</td></tr>";
              }
              $message .= "</table>";
             
              $this->email->set_newline("\r\n");
              $this->email->from($from);
              $this->email->to($to);
              $this->email->subject($subject);
              $this->email->message($message);
              $enviado = $this->email->send();
              //var_dump($enviado);
              $this->session->set_flashdata('exito', 'Solicitud enviada correctamente.');
              $this->almacen_model->log($this->session->userdata('nombre').' generó una nueva solicitud de compra', 'compras/detalle-solicitud/'.$uid);
              echo json_encode(array(
                'error' => false
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
        
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
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

  //Guarda una nueva solicitud de estimación
  public function nueva_solicitud_estimacion() {
    $permisos = $this->departamentos_model->permisos('solicitud-compra');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $uid = uniqid();
        /* Si tiene permisos de edicion en compras las solicitudes se crean con estatus aprobado */
        if ($this->departamentos_model->permisos('compras') > 2)
          $estatus = 'aprobada';
        else
          $estatus = 'pendiente';
        $check = $this->compras_model->nueva_solicitud_estimacion($uid, $estatus);
        if ($check == true) {
          echo json_encode(array(
            'error' => false
          ));
          $this->session->set_flashdata('exito', 'Solicitud enviada correctamente.');
          $this->almacen_model->log($this->session->userdata('nombre').' generó una nueva solicitud de compra', 'compras/detalle-solicitud/'.$uid);
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Carga la vista para las solicitudes
  public function solicitudes() {
    $this->permisos = $this->departamentos_model->permisos('direccion');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitudes de compra';
    $datos['clase_pagina'] = 'compras-page';
    $datos['solicitudes'] = $this->compras_model->solicitudes();
    foreach ($datos['solicitudes'] as $key => $value) {
      $datos['solicitudes'][$key]->comprado = 0;
      $datos['solicitudes'][$key]->cantidad = 0;
      foreach ($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue) {
        $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
        $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
      }
    }
    $datos['total'] = $this->compras_model->solicitudes_pendientes();
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitudes', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Carga la vista para las solicitudes aprobadas
  public function solicitudes_aprobadas() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitudes de compra';
    $datos['clase_pagina'] = 'compras-page';
    $datos['solicitudes'] = $this->compras_model->solicitudes_aprobadas();
    foreach ($datos['solicitudes'] as $key => $value) {
      $datos['solicitudes'][$key]->comprado = 0;
      $datos['solicitudes'][$key]->cantidad = 0;
      foreach ($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue) {
        $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
        $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
      }
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitudes', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Carga la vista de las solicitudes por user
  public function mis_solicitudes() {
    $this->permisos = $this->departamentos_model->permisos('solicitud-compra');
    if (!($this->permisos > 0))
      redirect(base_url());
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Solicitudes de compra';
    $datos['clase_pagina'] = 'compras-page';
    $datos['solicitudes'] = $this->compras_model->mis_solicitudes();
    foreach ($datos['solicitudes'] as $key => $value) {
      $datos['solicitudes'][$key]->comprado = 0;
      $datos['solicitudes'][$key]->cantidad = 0;
      foreach ($this->compras_model->detalle_solicitud_catalogo($value->idtbl_solicitudes_almacen) as $subkey => $subvalue) {
        $datos['solicitudes'][$key]->comprado += $subvalue->comprado;
        $datos['solicitudes'][$key]->cantidad += $subvalue->cantidad;
      }
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/solicitudes', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Carga la vista de detalles de las solicitudes
  public function detalle_solicitud($uid) {
    $datos['token'] = $this->token();
    $datos['titulo'] = 'Detalle Solicitud';
    $datos['clase_pagina'] = 'compras-page';
    $datos['solicitud'] = $this->compras_model->detalle_solicitud($uid);
    /*$datos['imagen'] = $this->compras_model->detalle_solicitudimagen($uid);*/
    $datos['solicitud']->almacen = $datos['solicitud']->tipo_seguridad_e_higiene == 1 ? "Almacen Seguridad e Higiene" : $datos['solicitud']->almacen;
    $datos['detalle'] = $this->compras_model->detalle_solicitud_catalogo($datos['solicitud']->idtbl_solicitudes_almacen);
    $datos['catalogo'] = $this->almacen_model->catalogo();
    $datos['pedidos'] = $this->compras_model->get_pedidos($datos['solicitud']->idtbl_solicitudes_almacen);
    $datos['uid'] = $uid;
    foreach ($datos['pedidos'] as $key => $value) {
      $datos['get_detalle_prod_pedidos'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->compras_model->get_detalle_prod_pedidos($datos['pedidos'][$key]->idtbl_pedidos);
      // $datos['get_detalle_prod_pedidos2'][$datos['pedidos'][$key]->idtbl_pedidos] = $this->pedidos_model->detalle_pedido($datos['pedidos'][$key]->uid); 
    }
    $this->load->view('plantillas/header', $datos);
    $this->load->view('plantillas/menu', $datos);
    $this->load->view('compras/detalle-solicitud', $datos);
    $this->load->view('plantillas/footer', $datos);
  }
  //Cancela las solicitudes
  public function cancelar_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->cancelar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud cancelada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' cancelo una solicitud de compra', 'compras/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Aprobar solicitudes
  public function aprobar_solicitud_cv() {
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
      $check = $this->compras_model->aprobar_solicitud_cv();
      if ($check == true) {
        if($this->input->post('estatus_solicitud') == 'pendiente ag'){
          $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.estevezjor.mx',
            'smtp_user' => 'prueba@estevezjor.mx', //El correo de la empresa
             'smtp_pass' => 'YT&IYm;^[q{M', // Su Password de Gmail aqui
            'smtp_port' => '465',
            'smtp_crypto' => 'ssl',
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            'charset' => 'utf-8'
          );
          $this->load->library('email');

          $this->email->initialize($config);
				
          $from = 'prueba@estevezjor.mx';
          $to = 'diegosd2297@gmail.com';
          $subject = 'Solicitud de compra';
          $message = "Bienvenido a EstevezJor, el proposito de este correo es que tengas los accesos al sistema, en caso de alguna duda conctactar a tu jefe inmediato <br> Usuario: ";                    
          $this->email->set_newline("\r\n");
          $this->email->from($from);
          $this->email->to($to);
          $this->email->subject($subject);
          $this->email->message($message);
          $enviado = $this->email->send();
          //var_dump($enviado);
        }
        echo json_encode(array(
          'error' => false,
          'mensaje' => 'Solicitud aprobada correctamente.'
        ));
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => "Error al aprobar la solicitud."
        ));
      }
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'Token Incorrecto.'
      ));
    }
  }
  //Modifica las solicitudes
  public function modificar_solicitud() {
    $permisos = $this->departamentos_model->permisos('direccion');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->modificar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud modificada y aprobada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' modifico una solicitud de compra', 'compras/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Aprueba las solicitudes
  public function aprobar_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->aprobar_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud aprobada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' aprobo una solicitud de compra', 'compras/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }
  /* Actualiza a pendiente, por: alfredo */
  public function creada_solicitud() {
    $permisos_direccion = $this->departamentos_model->permisos('direccion');
    $permisos_compras = $this->departamentos_model->permisos('compras');
    if ($permisos_direccion > 0 || $permisos_compras > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->creada_solicitud();
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Solicitud editada correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' cancelo una solicitud de compra', 'compras/detalle-solicitud/'.$this->input->post('uid'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //Trae los pedidos
  public function get_pedidos() {
    $check = $this->compras_model->get_pedidos();
    echo json_encode($check);
    if ($check == true) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Pedido creado correctamente.'
      ));
      $this->almacen_model->log($this->session->userdata('nombre').' generó un nuevo pedido', 'compras/detalle-pedido/'.$uid);
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'Algo salio mal.'
      ));
  }

  //Edita las cantidades de una solicitud
  public function edit_cantidad_solicitud() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        if($_POST['tipo'] == "cantidades") {
          $check = $this->compras_model->edit_cantidad_solicitud($this->input->post('iddtl_solicitud_catalogo'), $this->input->post('cantidad'), $this->input->post('cantSolicitadaOrg'), $this->input->post('idtbl_pedidos'), $this->input->post('idtbl_catalogo'), $this->input->post('idtbl_solicitudes_almacen'), $this->input->post('estimacion'));
        }
        if($_POST['tipo'] == "precios") {
          $check = $this->compras_model->edit_precio_solicitud($this->input->post('iddtl_solicitud_catalogo'), $this->input->post('precio'), $this->input->post('precioOrg'), $this->input->post('idtbl_pedidos'), $this->input->post('idtbl_catalogo'));
        }
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Cantidad actualizada correctamente.'
          ));
          if($_POST['tipo'] == "cantidades") {
            $this->almacen_model->log($this->session->userdata('nombre').' actualizo cantidad solicitada', 'pedidos/detalle-pedido/'.$this->input->post('iddtl_solicitud_catalogo'));
          }
          if($_POST['tipo'] == "precios") {
            $this->almacen_model->log($this->session->userdata('nombre').' actualizo precio', 'pedidos/detalle-pedido/'.$this->input->post('iddtl_solicitud_catalogo'));
          }
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  //
  public function add_upfile_solicitud_compras() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->add_upfile_solicitud_compras($this->input->post('idtbl_solicitudes_almacen'), $this->input->post('file'));
        if ($check == true) {
          echo json_encode(array(
            'error' => false,
            'mensaje' => 'Archivo actualizado correctamente.'
          ));
          $this->almacen_model->log($this->session->userdata('nombre').' upfile a solicitud compras', 'compras/add_upfile_solicitud_compras/'.$this->input->post('idtbl_solicitudes_almacen'));
        } else {
          echo json_encode(array(
            'error' => true,
            'mensaje' => $check
          ));
        }
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }
  public function detalle_pedido_hist_cantidad() {
    $permisos = $this->departamentos_model->permisos('compras');
    if ($permisos > 0) {
      if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $check = $this->compras_model->detalle_pedido_hist_cantidad($this->input->post('idtbl_pedidos'), $this->input->post('idtbl_catalogo'), $this->input->post('tipo'));
        if ($check == true)
          echo json_encode(array(
            'error' => false,
            'datos' => $check
          ));
        else
          echo json_encode(array(
            'error' => true,
            'mensaje' => 'No existen datos.'
          ));
      } else {
        echo json_encode(array(
          'error' => true,
          'mensaje' => 'Token Incorrecto.'
        ));
      }
    } else
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'No tiene permisos suficientes para realizar esta acción.'
      ));
  }

  //Carga la vista para reportes de compras
  public function reportes_compras() {
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0) && $this->session->userdata('tipo') != 6) {
      redirect(base_url());
    }
    $this->load->model('personal_model');
    $this->load->model('proyectos_model');
    $header['titulo'] = 'Almacen';
    $header['clase_pagina'] = 'almacen-page';

    $datos['proyectos'] = $this->proyectos_model->todos_los_proyectos();

    if ($this->session->userdata('tipo') == 1) {
      $datos['catalogo'] = $this->almacen_model->catalogo();
    } else {
      $datos['catalogo'] = $this->almacen_model->catalogo();
    }
    $datos['almacenes'] = $this->almacen_model->almacenes();
    
    $datos['proveedores'] = $this->proveedores_model->proveedores();
    $datos['users'] = $this->root_model->usuarios();
    $datos['almacenes_pedidos'] = $this->almacen_model->almacenes_pedidos();
    $datos['token'] = $this->token();
    $this->load->view('plantillas/header', $header);
    $this->load->view('plantillas/menu');
    $this->load->view('compras/reportes-compras', $datos);
    $this->load->view('plantillas/footer');
  }
  
  //Genera un reporte que exporta a Excel de las solicitudes estimaciones
  public function reporte_solicitudes_estimaciones(){
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $reporte = $this->compras_model->reporte_solicitudes_estimaciones();
        /*echo json_encode($reporte);
        return;*/
        $columnasTitulos = [];
        $letras = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z", "AA", "AB", "AC", "AD", "AE"];
        $contador = 1;
        $tipo = "Solicitud";
        if($this->input->post("tipoSolicitud") == "solicitud"){
          $columnasTitulos = ["ID Solicitud", "UID Solicitud","Fecha Creación Solicitud","Fecha Limite", "ID proyecto", "Nombre Proyecto", "ID Segmento", "Nombre Segmento", "Tipo Solicitud", "Estatus Solicitud", "ID Contratista", "Nombre Contratista", "Sugerencia proveedores", "Comentarios", "ID Pedido", "UID Pedido", "Fecha Creacion Pedido", "Neodata", "Estatus Pedido", "ID Producto", "Descripcion Producto", "Cantidad Solicitud", "Cantidad Pedido", "Unidad Medida", "Nombre Solicito", "Nombre Aprovo Solicitud", "Nombre Pidió", "Fecha de Pago", "Numero de Factura", "Banco"];
        }else{
          $tipo = "Estimacion";
          $columnasTitulos = ["ID Solicitud", "UID Solicitud", "Fecha Creación Solicitud", "Fecha Limite", "ID proyecto", "Nombre Proyecto", "ID Segmento", "Nombre Segmento", "Tipo Solicitud", "Estatus Solicitud", "ID Contratista", "Nombre Contratista", "Contrato", "Estimacion", "Observaciones", "ID Pedido", "UID Pedido", "Fecha Creacion Pedido", "Neodata", "Estatus Pedido", "ID Producto", "Descripcion Producto", "Cantidad Solicitud", "Cantidad Pedido", "Unidad Medida", "Nombre Solicito", "Nombre Aprovo Solicitud", "Nombre Pidió", "Fecha de Pago", "Numero de Factura", "Banco"];
        }
        $this->load->library('excel'); 
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('General Compras');
        for($r=0; $r<count($columnasTitulos); $r++) {
          $this->excel->getActiveSheet()->getColumnDimension("{$letras[$r]}")->setWidth(30);
          $this->excel->getActiveSheet()->getStyle("{$letras[$r]}{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->setCellValue("{$letras[$r]}{$contador}", $columnasTitulos[$r]);
        }
        if($this->input->post("tipoSolicitud") == "estandar"){
          foreach($reporte as $dato) {
            //Incrementamos una fila más, para ir a la siguiente.
            $contador++;
            //Informacion de las filas de la consulta.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_solicitudes_almacen);
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid_solicitud);
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion_solicitud);
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_limite);
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tbl_proyectos_idtbl_proyectos);
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->tbl_segmentos_proyecto_idtbl_segmentos_proyecto);
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->segmento != '' ? $dato->segmento : $dato->direccion );
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->tipo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->estatus_solicitud);
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->tbl_proveedores_idtbl_proveedores);
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->nombre_fiscal);
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->sugerencia_proveedor);
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->comentarios);
            $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->idtbl_pedidos);
            $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->uid);
            $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->fecha_creacion);
            $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->neodata_pedido);
            $this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->estatus);
            $this->excel->getActiveSheet()->setCellValue("T{$contador}", $dato->tbl_catalogo_idtbl_catalogo);
            $this->excel->getActiveSheet()->setCellValue("U{$contador}", $dato->descripcion);
            $this->excel->getActiveSheet()->setCellValue("V{$contador}", $dato->cantidad_solicitud);
            $this->excel->getActiveSheet()->setCellValue("W{$contador}", $dato->cantidad);
            $this->excel->getActiveSheet()->setCellValue("X{$contador}", $dato->unidad_medida);
            $this->excel->getActiveSheet()->setCellValue("Y{$contador}", $dato->nombre_solicito);
            $this->excel->getActiveSheet()->setCellValue("Z{$contador}", $dato->nombre_aprobo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("AA{$contador}", $dato->nombre_pidio);
            $this->excel->getActiveSheet()->setCellValue("AB{$contador}", $dato->nombre_fecha_pago);
            $this->excel->getActiveSheet()->setCellValue("AC{$contador}", $dato->numero_factura);
            $this->excel->getActiveSheet()->setCellValue("AD{$contador}", $dato->nombre_banco);
          }
        }else{
          foreach($reporte as $dato) {
            //Incrementamos una fila más, para ir a la siguiente.
            $contador++;
            //Informacion de las filas de la consulta.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_solicitudes_estimacion);
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid_solicitud);
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion_solicitud);
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_limite);
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tbl_proyectos_idtbl_proyectos);
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->tbl_segmentos_proyecto_idtbl_segmentos_proyecto);
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->segmento != '' ? $dato->segmento : $dato->direccion );
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->tipo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->estatus_solicitud);
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->tbl_proveedores_idtbl_proveedores);
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->nombre_fiscal);
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->contrato);
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->estimacion);
            $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->observaciones);
            $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->idtbl_pedidos);
            $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->uid);
            $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->fecha_creacion);
            $this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->neodata_pedido);
            $this->excel->getActiveSheet()->setCellValue("T{$contador}", $dato->estatus);
            $this->excel->getActiveSheet()->setCellValue("U{$contador}", $dato->tbl_catalogo_idtbl_catalogo);
            $this->excel->getActiveSheet()->setCellValue("V{$contador}", $dato->descripcion);
            $this->excel->getActiveSheet()->setCellValue("W{$contador}", $dato->cantidad_solicitud);
            $this->excel->getActiveSheet()->setCellValue("X{$contador}", $dato->cantidad);
            $this->excel->getActiveSheet()->setCellValue("Y{$contador}", $dato->unidad_medida);
            $this->excel->getActiveSheet()->setCellValue("Z{$contador}", $dato->nombre_solicito);
            $this->excel->getActiveSheet()->setCellValue("AA{$contador}", $dato->nombre_aprobo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("AB{$contador}", $dato->nombre_pidio);
            $this->excel->getActiveSheet()->setCellValue("AC{$contador}", $dato->fecha_pago);
            $this->excel->getActiveSheet()->setCellValue("AD{$contador}", $dato->numero_factura);
            $this->excel->getActiveSheet()->setCellValue("AE{$contador}", $dato->nombre_banco);
          }
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = 'Solicitudes_Compras_'.$tipo.'_'.date('d-m-Y  H:i:s').'.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'Token Incorrecto.');
      redirect(base_url() . 'almacen/reportes-almacen-general', 'refresh');
    }
  }

  //Genera un reporte que exporta a Excel de las solicitudes de compra
  public function reporte_solicitudes(){
    $this->permisos = $this->departamentos_model->permisos('compras');
    if (!($this->permisos > 0)) {
      redirect(base_url());
    }
    if ($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token')) {
        $reporte = $this->compras_model->reporte_solicitud();
        /*echo json_encode($reporte);
        return;*/
        $columnasTitulos = [];
        $letras = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z", "AA", "AB", "AC", "AD", "AE"];
        $contador = 1;
        $tipo = "Solicitud";
        if($this->input->post("tipoSolicitud") == "solicitud"){
          $columnasTitulos = ["ID Solicitud", "UID Solicitud","Fecha Creación Solicitud","Fecha Limite", "ID proyecto", "Nombre Proyecto", "ID Segmento", "Nombre Segmento", "Tipo Solicitud", "Estatus Solicitud", "Sugerencia proveedores", "Comentarios", "ID Producto", "Descripcion Producto", "Cantidad Solicitud", "Unidad Medida", "Nombre Solicito", "Nombre Aprovo Solicitud"];
        }else{
          $tipo = "Estimacion";
          $columnasTitulos = ["ID Solicitud", "UID Solicitud", "Fecha Creación Solicitud", "Fecha Limite", "ID proyecto", "Nombre Proyecto", "ID Segmento", "Nombre Segmento", "Tipo Solicitud", "Estatus Solicitud", "ID Contratista", "Nombre Contratista", "Contrato", "Estimacion", "Observaciones", "ID Producto", "Descripcion Producto", "Cantidad Solicitud", "Unidad Medida", "Nombre Solicito", "Nombre Aprovo Solicitud"];
        }
        $this->load->library('excel'); 
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('General Compras');
        for($r=0; $r<count($columnasTitulos); $r++) {
          $this->excel->getActiveSheet()->getColumnDimension("{$letras[$r]}")->setWidth(30);
          $this->excel->getActiveSheet()->getStyle("{$letras[$r]}{$contador}")->getFont()->setBold(true);
          $this->excel->getActiveSheet()->setCellValue("{$letras[$r]}{$contador}", $columnasTitulos[$r]);
        }
        if($this->input->post("tipoSolicitud") == "estandar"){
          foreach($reporte as $dato) {
            //Incrementamos una fila más, para ir a la siguiente.
            $contador++;
            //Informacion de las filas de la consulta.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_solicitudes_almacen);
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid_solicitud);
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion_solicitud);
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_limite);
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tbl_proyectos_idtbl_proyectos);
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->tbl_segmentos_proyecto_idtbl_segmentos_proyecto);
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->segmento != '' ? $dato->segmento : $dato->direccion );
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->tipo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->estatus_solicitud);
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->sugerencia_proveedor);
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->comentarios);
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->tbl_catalogo_idtbl_catalogo);
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->descripcion);
            $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->cantidad_solicitud);
            $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->unidad_medida);
            $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->nombre_solicito);
            $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->nombre_aprobo_solicitud);
          }
        }else{
          foreach($reporte as $dato) {
            //Incrementamos una fila más, para ir a la siguiente.
            $contador++;
            //Informacion de las filas de la consulta.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->idtbl_solicitudes_estimacion);
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid_solicitud);
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_creacion_solicitud);
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_limite);
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->tbl_proyectos_idtbl_proyectos);
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->tbl_segmentos_proyecto_idtbl_segmentos_proyecto);
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->segmento != '' ? $dato->segmento : $dato->direccion );
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->tipo_solicitud);
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->estatus_solicitud);
            $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->tbl_proveedores_idtbl_proveedores);
            $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->nombre_fiscal);
            $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->contrato);
            $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->estimacion);
            $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->observaciones);
            $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->tbl_catalogo_idtbl_catalogo);
            $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->descripcion);
            $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->cantidad);
            $this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->unidad_medida);
            $this->excel->getActiveSheet()->setCellValue("T{$contador}", $dato->nombre_solicito);
            $this->excel->getActiveSheet()->setCellValue("V{$contador}", $dato->nombre_aprobo_solicitud);
          }
        }
        
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = 'Pedidos_Compras_'.$tipo.'_'.date('d-m-Y  H:i:s').'.xls';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'Token Incorrecto.');
      redirect(base_url() . 'almacen/reportes-almacen-general', 'refresh');
    }
  }

  //Genera un excel de las solicitudes de compra por usuario
  public function excel_solicitud_compras() {
    $reporte = $this->compras_model->mis_solicitudes();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
  
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha de Creación');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Fecha Límite');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Proyecto');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Estatus');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha_creacion);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_limite);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->numero_proyecto.' - '.$dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->estatus_solicitud);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Solicitudes_Compras_'.date('d-m-Y  H:i:s').'.xls';
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

  //Genera un Excel de las solicitudes de compra
  public function excel_solicitudes_compras() {
    $reporte = $this->compras_model->solicitudes();
    if (count($reporte) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);
      $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);

        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);

        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'UID');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha de Creación');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Fecha Límite');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Creador');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Proyecto');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Estatus');

        foreach($reporte as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->uid);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->fecha_creacion);
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->fecha_limite);
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->nombre);
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->numero_proyecto.' - '.$dato->nombre_proyecto);
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->estatus_solicitud);
        }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Solicitudes_Compras_'.date('d-m-Y  H:i:s').'.xls';
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

  //Genera un reporte que exporta a Excel de los pedidos
  public function reportes_pedidos(){
    if($this->input->post('tipo_de_reporte') == 'solicitudes'){
      $datos = $this->compras_model->reportes_solicitudes();
    }else{
      $datos = $this->compras_model->reportes_pedidos();
    }
    
    if (count($datos) > 0) {
      //Cargamos la librería de excel.
      $this->load->library('excel'); 
      $this->excel->setActiveSheetIndex(0);

      if($this->input->post('tipo_de_reporte') == 'solicitudes'){
        if($this->input->post('tipo_solicitudes') == 'producto'){

          $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
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
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Proyecto');
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Uid');
          $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Autor');
          $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Fecha');
          $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Almacén');
          $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Codigo');
          $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Descripción');
          $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Unidad de Medida');
          $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Cantidad');
          $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Motivo');
          

          foreach($datos as $dato) {
            //Incrementamos una fila más, para ir a la siguiente.
            $contador++;
            //Informacion de las filas de la consulta.
            $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
            $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->uid);
            $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->nombre);
            $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_creacion);
            $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->almacen);
            $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->neodata);
            $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->descripcion);
            $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->unidad_medida_abr);
            $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->cantidad);
            $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->motivo_cancelacion);
            
          }

        }else{
        $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
        //Contador de filas
        $contador = 1;
        //Le aplicamos ancho las columnas.      
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        
  
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        
  
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Mes');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Total');
        
  
        foreach($datos as $dato) {
          //Incrementamos una fila más, para ir a la siguiente.
          $contador++;
          //Informacion de las filas de la consulta.
          $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->mes);
          $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->total);
          
        }
      }

    }else{
      $this->excel->getActiveSheet()->setTitle('Solicitudes Compras ');
      //Contador de filas
      $contador = 1;
      //Le aplicamos ancho las columnas.      
      $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
      $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
      $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
      $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
      if($this->input->post('tipoSolicitud') != 'pagos'){
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
      if(!isset($_POST['tipo_user'])){
      $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('S')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
      }else{
        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
      }
      }else{
      $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
      $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
      }

      //Le aplicamos negrita a los títulos de la cabecera.
      $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
      if($this->input->post('tipoSolicitud') != 'pagos'){
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
      if(!isset($_POST['tipo_user'])){
      $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("S{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("T{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("U{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("V{$contador}")->getFont()->setBold(true);
      }else{
        $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
      }
      }else{
      $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
      }

      //Definimos los títulos de la cabecera.
      $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Proyecto');
      $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Neodata Pedido');
      $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Pedido');
      $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'Fecha');
      $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'Proveedor');
      if($this->input->post('tipoSolicitud') != 'pagos'){
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Codigo');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Descripción');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Unidad de Medida');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Cantidad');
      $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Precio');
      $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Subtotal');
      $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'IVA');
      $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Importe');
      $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Moneda');
      if(!isset($_POST['tipo_user'])){
      $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'Factura');
      $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'Folio de Pago');
      $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'Fecha de Pago');
      $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'Importe Pago');
      $this->excel->getActiveSheet()->setCellValue("S{$contador}", 'Banco');
      $this->excel->getActiveSheet()->setCellValue("T{$contador}", 'Tipo de Cambio');
      $this->excel->getActiveSheet()->setCellValue("U{$contador}", 'Importe Total (Pesos)');
      $this->excel->getActiveSheet()->setCellValue("V{$contador}", 'Observaciones');
      }else{
        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'Observaciones');
      }
      }else{
      $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'Factura');
      $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'Folio de Pago');
      $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'Fecha de Pago');
      $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'Importe Pago');
      $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'Banco');
      $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'Tipo de Cambio');
      $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'Importe Total (Pesos)');
      $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'Observaciones');
      }

      foreach($datos as $dato) {
        //Incrementamos una fila más, para ir a la siguiente.
        $contador++;
        //Informacion de las filas de la consulta.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", $dato->numero_proyecto . " " . $dato->nombre_proyecto);
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", $dato->neodata_pedido);
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", $dato->uid);
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", $dato->fecha_creacion);
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", $dato->nombre_fiscal);
        if($this->input->post('tipoSolicitud') != 'pagos'){
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->neodata);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->descripcion);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->unidad_medida);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->cantidad);
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->precio);
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->subtotal);
        $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->iva);
        $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->importe_calculado);
        $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->tipo_moneda == 'p' ? "Pesos" : "Dolares");
        if(!isset($_POST['tipo_user'])){
        $this->excel->getActiveSheet()->setCellValue("O{$contador}", $dato->numero_factura);
        $this->excel->getActiveSheet()->setCellValue("P{$contador}", $dato->folio_pago);
        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $dato->fecha_pago);
        $this->excel->getActiveSheet()->setCellValue("R{$contador}", $dato->importe);
        $this->excel->getActiveSheet()->setCellValue("S{$contador}", $dato->nombre_banco . " " . ($dato->importe_pago != null && $dato->importe_pago > 0 ? "(" . $dato->importe_pago . ")" : ""));
        $this->excel->getActiveSheet()->setCellValue("T{$contador}", $dato->tipo_cambio);
        $this->excel->getActiveSheet()->setCellValue("U{$contador}", $dato->tipo_moneda != 'p' ? $dato->importe * $dato->tipo_cambio : "");
        $this->excel->getActiveSheet()->setCellValue("V{$contador}", $dato->observaciones);
        }else{
          $this->excel->getActiveSheet()->setCellValue("N{$contador}", $dato->observaciones);
        }
        }else{
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", $dato->numero_factura);
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", $dato->folio_pago);
        $this->excel->getActiveSheet()->setCellValue("H{$contador}", $dato->fecha_pago);
        $this->excel->getActiveSheet()->setCellValue("I{$contador}", $dato->importe);
        $this->excel->getActiveSheet()->setCellValue("J{$contador}", $dato->nombre_banco . " " . ($dato->importe_pago != null && $dato->importe_pago > 0 ? "(" . $dato->importe_pago . ")" : ""));
        $this->excel->getActiveSheet()->setCellValue("K{$contador}", $dato->tipo_cambio);
        $this->excel->getActiveSheet()->setCellValue("L{$contador}", $dato->tipo_moneda != 'p' ? $dato->importe * $dato->tipo_cambio : "");
        $this->excel->getActiveSheet()->setCellValue("M{$contador}", $dato->observaciones);
        }
      }
    }
      
      //Le ponemos un nombre al archivo que se va a generar.
      $archivo = 'Pedidos_' . $this->input->post("tipoSolicitud") . "" .date('d-m-Y  H:i:s').'.xls';
      header('Content-Type: application/vnd.ms-excel');
      header('Content-Disposition: attachment;filename="'.$archivo.'"');
      header('Cache-Control: max-age=0');
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //Hacemos una salida al navegador con el archivo Excel.
      $objWriter->save('php://output');
    } else {
      $this->session->set_flashdata('errorReportesAG', 'No hay información para generar reporte.');
      redirect(base_url().'compras/reportes-compras','refresh');
    }
  }

  //Tipo de cambio de moneda
  public function tipoCambio(){
    $data = json_decode($this->input->input_stream('key'));
    echo json_encode($data);
  }

  //Elimina productos de una solicitud
  public function deleteProduct() {
    $delete = $this->compras_model->deleteProduct($_POST['iddtl_solicitud_catalogo']);
    if($delete) {
      echo json_encode(array(
        'error' => false,
        'mensaje' => 'Producto eliminado correctamente.'
      ));
      $this->session->set_flashdata('exito', 'Producto eliminado correctamente.');
    } else {
      echo json_encode(array(
        'error' => true,
        'mensaje' => 'Ocurrió un error al eliminar el producto.'
      ));
      $this->session->set_flashdata('error', 'Ocurrió un error al eliminar el producto.');
    }
  }

  //Muestra un json de los indicadores de compras
  public function indicadoresAreaCompras(){
    $result = $this->compras_model->indicadoresAreaCompras();
    echo json_encode($result);
  }

  //Función para traer todos los neodata de un producto
  public function getNeodata(){
    $neodata = $this->input->post('neodata');
    $neodata_inter = substr($neodata, 2, 12);
    $neodata_final = substr($neodata_inter, 0, -7);
    $result = $this->compras_model->getNeodata($neodata_final);
    echo json_encode($result);
  }

}