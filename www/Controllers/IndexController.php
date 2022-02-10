<?php
class IndexController extends Controller
{
	public function __construct() {
		// Se llama al método constructor del padre
		parent::__construct();
	}

	// creamos un método de acción 
	public function Index(){

		// Obtenemos información de las variables de session
		$model1 = Session::getSession("model1");
		$model2 = Session::getSession("model2");
		// comprobamos que contengan su información correspondiente
		if(null != $model1 || null != $model2){
			// deserializamos la información que contienen
			$array1 = unserialize($model1);
			$array2 = unserialize($model2);
			// comprobamos que sean arrays
			if(is_array($array1) && is_array($array2)){
				// Inicializamos los objetos $model1 y $model2 con la información que nos proporciona la función TUser a la que se pasa como parámetro los objetos $array1 y $array2
				$model1 = $this->TUser($array1);
				$model2 = $this->TUser($array2);
				// pasamos al método Render la información para poder pasar la información a la vista de login
				this->view->Render($this,"index",$model1,$model2,null);
			}else{
				$this->view->Render($this,"index",null,null,null);
			}
		}else{
			// con el objeto que contiene la instancia de View llamamos al método Render que recibe como parámetros el nombre de la clase y el nombre de una vista, así como las variables de sesión
			$this->view->Render($this,"index",null,null,null);
		}
	}
}


?>