<?php 

class ProductosYServiciosController extends ControladorBase {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->viewInTemplate(
			"index", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
}