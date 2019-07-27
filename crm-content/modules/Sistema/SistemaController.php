<?php 
class SistemaController extends ControladorBase {	
    public function __construct() {
        parent::__construct();
    }
	
    public function index(){
		
    }
	
    public function table_debug(){
		$this->viewInTemplate(
			"debug", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
	
    public function database_vue(){
		$this->viewInTemplate(
			"database_vue", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
	
    public function api_readme(){
		$this->viewInTemplate(
			"api_readme", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
	
    public function api_docs(){
		$this->viewInTemplate(
			"api_docs", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
	
    public function api_examples(){
		$this->viewInTemplate(
			"api_examples", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
	
    public function users_list(){
        //Creamos el objeto usuario
        $usuario = new Usuario();
        //Conseguimos todos los usuarios
        $allusers=$usuario->getAll();
        //Cargamos la vista index y le pasamos valores
		
		$this->viewInTemplate(
			"users_list", array(
				"title" => "Modo Debug",
				"allusers"=>$allusers,
				"template" => $this->template,
			)
		);
    }
	
    public function modules_list(){
		$this->viewInTemplate(
			"modules_list", array(
				"title" => "Modo Debug",
				"template" => $this->template,
			)
		);
    }
}