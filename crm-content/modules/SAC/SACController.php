<?php 

class SACController extends ControladorBase {
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
	
	public function calendar(){
		$this->viewInTemplate(
			"calendar", array(
				"title" => "Calendario SAC",
				"template" => $this->template,
			)
		);
	}
}