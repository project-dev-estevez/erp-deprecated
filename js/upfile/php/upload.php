<?php
$uid = $_POST['uid'];
//localhost:
//$output_dir = $_SERVER["DOCUMENT_ROOT"]."/erp2/uploads/compras_solicitud_material/".$uid;

// server test:
//$output_dir = $_SERVER["DOCUMENT_ROOT"]."/test-erp/uploads/compras_solicitud_material/".$uid;

// server:
$output_dir = $_SERVER["DOCUMENT_ROOT"]."/uploads/compras_solicitud_material/".$uid;
if (!file_exists($output_dir)) {    
	mkdir($output_dir, 0777, true);
} 
if(isset($_FILES["myfile"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["myfile"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["myfile"]["name"])) //single file
	{
			$info = new SplFileInfo($_FILES["myfile"]["name"]);
			$ext = $info->getExtension();	
			$array = array(0 => 'jpg', 1 => 'jpeg', 2 => 'png', 3 => 'pdf', 3 => 'pdf');
			if (!array_search($ext, $array)) {
				echo 0;
				exit;
			}
			$str = new clean_string();
			$fileName = $str->sanear_string_especiales($_FILES["myfile"]["name"]);
			$fileName = time()."_".$fileName;
 			move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.'/'.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["myfile"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["myfile"]["name"][$i];
			move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.'/'.$fileName);
	  	$ret[]= $fileName;
	  }
	
	} 
  echo json_encode($ret);
 }

 class clean_string{
	function sanear_string_especiales($string){	
		$string = trim($string);
 		$string = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$string
		);
		$string = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$string
		);
		$string = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$string
		);
		$string = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$string
		);
		$string = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$string
		); 
		/*		$string = str_replace(
			array('ñ', 'Ñ', 'ç', 'Ç'),
			array('n', 'N', 'c', 'C',),
			$string
		);*/
		//Esta parte se encarga de eliminar cualquier caracter extraño
		$string = str_replace(
			array("\\", "¨", "º", "-", "~",
				 "#",  "|", "!", "\"",
				 "·", "$", "%", "&", "/",
				 "?", "¡",
				 "¿", "[", "^", "`", "]",
				 "+", "}", "{", "¨", "´",
				 ">", "< "
				 ),
			'',
			$string
		);
	
		return $string;
	}		 
 }
 ?>