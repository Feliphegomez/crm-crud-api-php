<?php 

class PQRSFController extends ControladorBase {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->viewInTemplate(
			"index", array(
				"title" => "Introduccion",
				"template" => $this->template,
			)
		);
	}
	
	public function listar_pqrsf(){
		$type = (!isset($_GET['type'])) ? 0 : $_GET['type'];
		$this->viewInTemplate(
			"listar_pqrsf", array(
				"title" => "Listar PQRSF",
				"type" => $type,
				"template" => $this->template,
			)
		);
	}
	
	public function buscar_pqrsf(){
		$idpqrsf = (!isset($_GET['id'])) ? 0 : $_GET['id'];
		$typepqrsf = (!isset($_GET['type'])) ? 0 : $_GET['type'];
		$this->viewInTemplate(
			"buscar_pqrsf", array(
				"title" => "Buscar PQRSF",
				"idpqrsf" => $idpqrsf,
				"typepqrsf" => $typepqrsf,
				"template" => $this->template,
			)
		);
	}
	
	public function ver_pqrsf(){
		$idpqrsf = (!isset($_GET['id'])) ? 0 : $_GET['id'];
		$typepqrsf = (!isset($_GET['type'])) ? 0 : $_GET['type'];
		
		$this->viewInTemplate(
			"ver_pqrsf", array(
				"title" => "Ver PQRSF",
				"idpqrsf" => $idpqrsf,
				"typepqrsf" => $typepqrsf,
				"template" => $this->template,
			)
		);
		
	}
	
	public function gestionar_pqrsf(){
		$idpqrsf = (!isset($_GET['id'])) ? 0 : $_GET['id'];
		$typepqrsf = (!isset($_GET['type'])) ? 0 : $_GET['type'];
		
		$this->viewInTemplate(
			"gestionar_pqrsf", array(
				"title" => "Gestionar PQRSF",
				"idpqrsf" => $idpqrsf,
				"typepqrsf" => $typepqrsf,
				"template" => $this->template,
			)
		);
	}
	
	public function create_pqrsf(){
		$this->viewInTemplate(
			"create_pqrsf", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function create_pqrsf_peticion(){
		$this->viewInTemplate(
			"create_pqrsf_peticion", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function create_pqrsf_reclamo(){
		$this->viewInTemplate(
			"create_pqrsf_reclamo", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function create_pqrsf_queja(){
		$this->viewInTemplate(
			"create_pqrsf_queja", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function types_pqrsf(){
		$this->viewInTemplate(
			"types_pqrsf", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);	
	}
	
	public function status_pqrsf(){
		$this->viewInTemplate(
			"status_pqrsf", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
	
	public function dashboard(){
		$this->viewInTemplate(
			"dashboard", array(
				"title" => "Calendario SAC",
				"template" => $this->template,
			)
		);
	}
	
	
	
	
	
	public function peticiones_pendientes(){
		$this->viewInTemplate(
			"gestionar_pqrsf", array(
				"title" => "Vista FrontPage",
				"template" => $this->template,
			)
		);
	}
}