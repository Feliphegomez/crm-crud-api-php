<?php 

class AtencionAlclienteController extends ControladorBase {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->viewInTemplate(
			"nuevoUsuarioCliente", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
}