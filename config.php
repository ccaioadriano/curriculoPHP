<?php 
	//ESTE ARQUIVO CONFIGURA O SISTEMA.
	$autoload = function($class){
		if($class == 'Email') {
			include('classes/phpMailer/src/PHPMailer.php');
		}
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);

	define('INCLUDE_PATH', 'http://localhost/projeto01/');
	
 ?>