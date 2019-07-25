<?php 

class FrontPageController extends ControladorBase {
	public $section_active;
	public $module_active;
	public $template;
	public $template_module;
	
    public function __construct() {
        parent::__construct();
		$this->module_active = $this->getModuleActive();
		$this->section_active = $this->getSectionActive();
		// htmlspecialchars
		
		
    }
	
	public function validateFileExist($fileUrl){
		return (!file_exists($fileUrl)) ? false : true;
	}
	
	public function validateDirExist($dirUrl){
		return (is_dir($dirUrl)) ? true : false;
	}
	
	public function getModuleActive(){
		if(isset($this->get['module_active'])){
			$mc = $this->get['module_active'];
			
			# Validar Modulo (Existencia de todos los archivos)
				# folder_admin . "/modules/{$this->module_active}"
				# folder_admin . "/themes/{$this->theme}/includes/{$this->module_active}.php"
			if(
				$this->validateDirExist(folder_admin . "/modules/{$mc}") == false
				|| $this->validateFileExist(folder_admin . "/themes/{$this->theme}/includes/{$mc}.php") == false
			){
				$mc = MODULO_DEFECTO;
			}
		}else{
			$mc = MODULO_DEFECTO;
		}
		return $mc;
	}
	
	public function getSectionActive(){
		$mc = $this->module_active;
		if(isset($this->get['section_active'])){
			$sa = $this->get['section_active'];
			
			# Archivos requeridos en el tema y carpeta
			if(
				$this->validateFileExist(folder_admin . "/modules/{$mc}/{$mc}Module.php") == false
				|| $this->validateFileExist(folder_admin . "/themes/{$this->theme}/includes/modules/{$mc}/{$sa}View.php") == false
			){
				$sa = SECCION_DEFECTO;
			}
		}else{
			$sa = SECCION_DEFECTO;
		}
		return $sa;
	}
	
    public function index(){
		require_once folder_admin . "/core/TemplateBase.php";
		$themeFileBase = folder_admin . "/themes/{$this->theme}/global/template.php";
		#if($this->validateFileExist($themeFileBase) == true){
			#require_once $themeFileBase;
			/*
			$template_name = "Template".ucwords(strtolower($this->theme));
			$template = new $template_name();
			$this->template = $template->getTemplate();
			$controllerModule = folder_admin . "/modules/{$this->module_active}/{$this->module_active}Module.php";
			if($this->validateFileExist($controllerModule) == true){
				require_once $controllerModule;
			}
			$nameModuleClass = "{$this->module_active}Module";
			
			$viewSection_file = folder_admin . "/themes/{$this->theme}/includes/modules/{$this->module_active}/{$this->section_active}View.php";
			if($this->validateFileExist($viewSection_file)){
				#require_once $viewSection_file;
			}
			
			$this->view(
				"FrontPage", array(
					"title" => "Vista FrontPage",
					"module" => $this->module_active,
					"section" => $this->section_active,
					"template" => $template,
				)
			);
			*/
		#}else{
			#echo "Template no encontrado en el tema.";
			#exit();
		#}
    }
	
	
	/*
	public function getHead(){
		$file = folder_admin . "/themes/{$this->theme}/global/head.php";
		if($this->validateFileExist($file) == true){
			include_once $file;
		}
	}
	
	public function getSection(){
		$file = folder_admin . "/themes/{$this->theme}/includes/{$this->module_active}.php";
		if($this->validateFileExist($file) == true){
			require_once $file;
		}		
	}*/
	
	public function __toString(){
		if(isset($this->body)){
			return $this->body;
		}else{
			return json_encode($this);
		}
	}
}