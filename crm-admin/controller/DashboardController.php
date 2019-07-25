<?php 
/* *******************************
 *
 * Developer by FelipheGomez
 *
 * Git: https://github.com/Feliphegomez/crm-crud-api-php
 * *******************************
 */

class DashboardController extends ControladorBase {     
    public function __construct() {
        parent::__construct();
    }
     
    public function index(){
		echo 'index';
		
    }
     
    public function php(){
		echo 'dashboardPHP';
        $this->viewInTemplate(
			"dashboardPHP", array(
				"title" => "Dashboard PHP",
				"subtitle" => "",
				"description" => "Estos son los perfiles o permisos de los usuarios"
			)
		);
    }
     
    public function vue(){
		echo 'dashboardVue';
        $this->viewInTemplate(
			"dashboardVue", array(
				"title" => "Dashboard Vue",
				"subtitle" => "",
				"description" => "Estos son los perfiles o permisos de los usuarios"
			)
		);
    }
     
    public function hola(){
		echo 'hola';
    }
}