<?php 

class CalendarController extends ControladorBase {
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
	
	public function create_rooms_and_auditoriums(){
		$this->viewInTemplate(
			"create_rooms_and_auditoriums", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
}