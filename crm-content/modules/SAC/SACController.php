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
	
	public function create_pqrs_peticion(){
		$this->viewInTemplate(
			"create_pqrs_peticion", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function create_pqrs_queja(){
		$this->viewInTemplate(
			"create_pqrs_queja", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function search_pqrs_peticion(){
		$this->viewInTemplate(
			"search_pqrs_peticion", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function search_pqrs_queja(){
		$this->viewInTemplate(
			"search_pqrs_queja", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
}