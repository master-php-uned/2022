<?php
class IndexController extends Controller
{
	public function __construct() {
		// Se llama al método constructor del padre
		parent::__construct();
	}

	// creamos un método de acción 
	public function Index(){
		// con el objeto que contiene la instancia de View llamamos al método Render que recibe como parámetros el nombre de la clase y el nombre de una vista, así como las variables de sesión
		$this->view->Render($this,"index",null,null,null);
	}
}


?>