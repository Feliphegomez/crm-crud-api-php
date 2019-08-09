<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * Git: https://github.com/Feliphegomez/crm-crud-api-php
 * *******************************
 */

class MiCuentaController extends ControladorBase {
	public $options;
	public $identification_type;
	public $identification_number;
	public $user;
	
    public function __construct() {
        parent::__construct();
		// htmlspecialchars
    }
	
	public function inbox(){
		$this->viewInTemplate(
			"inbox", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}
	
	public function outbox(){
		$this->viewInTemplate(
			"outbox", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}
	
	public function mis_cuentas(){
		$this->viewInTemplate(
			"mis_cuentas", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}
	
	public function mis_pqrsf(){
		$this->viewInTemplate(
			"mis_pqrsf", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}
	
	public function create_pqrsf(){
		$type = (isset($_GET) && isset($_GET['type'])) ? $_GET['type'] : 'ninguna';
		
		
		switch($type){
			case "peticion":
				$pageView = 'crear_pqrsf_peticion';
			break;
			case "queja":
				$pageView = 'crear_pqrsf_queja';
			break;
			case "reclamo":
				$pageView = 'crear_pqrsf_reclamo';
			break;
			case "sugerencia":
				$pageView = 'crear_pqrsf_sugerencia';
			break;
			case "felicitacion":
				$pageView = 'crear_pqrsf_felicitacion';
			break;
			default:
				$pageView = 'error';
			break;
		}
		
		$this->viewInTemplate(
			$pageView, array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente.",
				"type" => $type,
				"myInfo" => $this->userData->userInfo
			)
		);
	}
	
	public function ver_cuenta(){
		$this->viewInTemplate(
			"ver_cuenta", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}
	
	public function crear_solicitud(){
		$this->viewInTemplate(
			"crear_solicitud", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente.",
				"myInfo" => $this->userData->userInfo
			)
		);
	}
	
	public function mis_solicitudes(){
		$this->viewInTemplate(
			"mis_solicitudes", array(
				"title" => "Titulo",
				"subtitle" => "",
				"description" => "Los datos estan incorrectos intenta nuevamente."
			)
		);
	}

}