<?php
$upload_folder = '../uploads';


if(isset($_POST['filename'])) {

	$context = stream_context_create(array('http' => array('header'=>'Connection: close')));
	$content = file_get_contents($_POST['file'], false, $context);
	$fileName = $_POST['filename'];
	$ext = substr($fileName, strrpos($fileName, '.') + 1);
	$saved_file = str_replace( '.' . $ext, '', $fileName );
	$saved_file .= '_' . crypt($saved_file) . '.' . $ext;
	$saved_file = str_replace('/', '', $saved_file);
	while( @ file_exists($upload_folder.'/'.$saved_file) ) {
		$saved_file = str_replace( '.' . $ext, '', $saved_file );
		$saved_file .= crypt($saved_file) . '.' . $ext;
	}
	
	
	 if(file_put_contents($upload_folder.'/'.$saved_file, $content, 0, $context)) {
		echo $saved_file;
	}
	exit();
}
?>