<?php 

class UserController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function Register() {
		$this->view->Render($this,"register");
	}
}


?>