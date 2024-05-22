<?php
// print_r($_POST);
$carpeta = $_POST['carpeta'];
//localhost:
//$output_dir = $_SERVER["DOCUMENT_ROOT"]."/erp2/uploads/compras_solicitud_material/".$carpeta;

// server test:
//$output_dir = $_SERVER["DOCUMENT_ROOT"]."/test-erp/uploads/compras_solicitud_material/".$carpeta;

// server:
$output_dir = $_SERVER["DOCUMENT_ROOT"]."/uploads/compras_solicitud_material/".$carpeta;
if(isset($_POST["op"]) && $_POST["op"] == "delete" && isset($_POST['file']))
{
	$ret = array();
	$fileName = $_POST['file'];
	
	$fileName = str_replace("..",".",$fileName); //required. if somebody is trying parent folder files	
	$filePath = $output_dir.'/'.$fileName;
	if (file_exists($filePath)) 
	{
				if( unlink($filePath) )
					$ret[]='OK';
				else{
					echo 0;
					exit;
				}
	} else{
		echo 0;
		exit;
	}
	echo json_encode($ret);
}

?>