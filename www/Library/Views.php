<?php
// Permite gestionar las vistas de los controladores

class Views
{
	// la función Render recibe como parametros el nombre del controlador y el nombre de la vista, así como las variables de sesión
	public function Render($controllers,$view,$model1,$model2,$model3){
		
		$array = explode("Controller",get_class($controllers));

		$controller = $array[0];
		require VIEWS.DFT."header.php";
		require VIEWS.$controller.'/'.$view.'.php';
		require VIEWS.DFT."footer.php";
	}
}


?>