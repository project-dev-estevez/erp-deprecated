<?php
if (!function_exists('notificaciones')) {
    setlocale(LC_ALL,'es_ES');
	date_default_timezone_set("America/Mexico_City");
    function notificaciones() {
        $CI = get_instance(); 
        $CI->load->model('notificaciones_model');
        if(isset($_GET['ref'])){
			$CI->notificaciones_model->update_log($_GET['ref']);
		}
        $notificaciones= $CI->notificaciones_model->notificaciones();
        return $notificaciones;
    }
}