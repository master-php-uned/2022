<?php
// Se gestionan las variables de sesión
class Session
{
	// Inicia una session
	static function start(){
		@session_start();
	}

	// Obtiene información de una session con nombre $name
	static function getSession($name){
		return $_SESSION[$name];
	}

	// Crear variable de sesión con nombre $name y con la información de la variable de session en $data
	static function setSession($name,$data){
		return $_SESSION[$name] = $data;
	}

	// Destruye las variables de session
	static function destroy(){
		@session_destroy();
	}
}




?>