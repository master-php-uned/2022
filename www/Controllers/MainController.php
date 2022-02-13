<?php
class MainController extends Controller
{
	public function __construct() {
		parent::__construct();
	}
	public function Main(){
		if (null != Session::getSession("User")){
			$this->view->Render($this,"main",null,null,null);
		}else{
			header("Location:".URL);
		}
	}
}


?>