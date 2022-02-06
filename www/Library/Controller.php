<?php

class Controller
{
	public function __construct() {
		$this->loadClassmodels();
	}

	public function loadClassmodels()
	{
		// captura el nombre del controlador requerido
		$class = get_class($this);
		// Dividimos el nombre del controlador y lo almacenamos en un array
		$array = explode("Controller", $class);
		// Creamos un objeto model que contendra el nombre de la clase 
		$model = $array[0].'_model';
		// Obtenemos el path del modelo correspondiente
		$path = 'Models/'.$model.'.php';
		// Si existe el path se importa el archivo modelo con un require
		if(file_exists($path)){
			require $path;
			// Se crea una instancia de la clase
			$this->model = new $model();
		}
	}
}


?>