<?php
// Se importan las constantes del fichero config.php
require "config.php";

// Variables
$controller = "";
$method = "";
$params = "";

// Se obtiene la url y se transforma en un array
$url = $_GET["url"] ?? "Index/index";
$arrayUrl = explode("/", $url);

// Se obtienen los parámetros que se constituyen y se pasan por la url
if(isset($arrayUrl[0])){
	$controller = $arrayUrl[0];
}
if(isset($arrayUrl[1])){
	if($arrayUrl[1] != ''){
		$method = $arrayUrl[1];
	}
}
if(isset($arrayUrl[2])){
	if($arrayUrl[2] != ''){
		$params = $arrayUrl[2];
	}
}

// registramos múltiples métodos para ser llamados secuencialmente
spl_autoload_register(function($class){
	if(file_exists(LBS.$class.".php")){
		require LBS.$class.".php";
	}
});

// Establecemos la ruta del controlador y si existe se importa y se crea una instancia de la clase.
$controller = $controller.'Controller';
$controllersPath = "Controllers/".$controller.'.php';
if(file_exists($controllersPath)){
	require $controllersPath;
	$controller = new $controller();
}

// echo $controller." ".$method. " ".$params;

?>