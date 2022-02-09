<?php
// Permite gestionar las vistas de los controladores

class Views
{
	// la función Render recibe como parametros el nombre del controlador y el nombre de la vista
	public function Render($controllers,$view){
		
		$array = explode("Controller",get_class($controllers));

		$controller = $array[0];
		require VIEWS.DFT."header.php";
		require VIEWS.$controller.'/'.$view.'.php';
		require VIEWS.DFT."footer.php";
	}
}


?>