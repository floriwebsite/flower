<?php  
function error_save($message){
	$Error 			=	M('error_message');
	$data['error_page']	=	 dirname($_SERVER['SCRIPT_FILENAME']);
	$data['error_message']	=	$message;
	$Error->data($data)->add();

}
?>
