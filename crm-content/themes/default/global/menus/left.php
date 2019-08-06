<?php 
class MenuLeft extends MenuBase {
	public function __construct(){
		parent::__construct();
	}
	
    public function linkUrl($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        return ("index.php?controller=".$controlador."&action=".$accion);
    }
	
	public function menuConHijos($section){
		$section->action = (!isset($section->action)) ? "index" : $section->action;
		$section->title = (!isset($section->title) || $section->title == "" || $section->title == null) ? "Sin Titulo" : $section->title;
		$urlLink = (isset($section->controller)) ? $this->linkUrl($section->controller, $section->action) : "#";
		$classLink1 = "";
		if(isset($section->controller) && isset($_GET['controller']) && $_GET['controller'] == $section->controller && isset($_GET['action'])){
			$classLink1 = ($_GET['action'] == $section->action) ? " class=\"active\"" : "";
			$classLink1 = ($_GET['action'] == "#") ? " class=\"active\"" : "";
		}
		$classLink2 = "";
		if(isset($section->controller) && isset($_GET['controller']) && $_GET['controller'] == $section->controller && isset($_GET['action'])){
			$classLink2 = ($_GET['action'] == $section->action) ? " style=\"display: block;\"" : "";
			$classLink2 = ($_GET['action'] == "#") ? " style=\"display: block;\"" : "";
			$classLink2 = " style=\"display: block;\"";
		}
		
		$tagIcon = (isset($section->icon) && $section->icon != null && $section->icon != "") ? " <i class=\"{$section->icon}\"></i> " : "";
		
		$r = "";
		if(ControladorBase::validatePermission($section->controller, $section->action) == true){
			if(isset($section->tree) && count($section->tree) > 0){
				$r .= "<li{$classLink1}>\n".
					"<a>{$tagIcon} {$section->title} <span class=\"fa fa-chevron-down\"></span></a>\n".
					"<ul class=\"nav child_menu\" {$classLink2}>\n";
						foreach($section->tree as $item){
							
							if(ControladorBase::validatePermission($item->controller, $item->action) == true){
								
								if(isset($item->tree) && count($item->tree) > 0){
									$r .= $this->menuConHijos($item);
								}else{
									$r .= $this->menuSinHijos($item);
								}
							}
							
						}
				$r .= "</ul>\n".
				"</li>\n";
			}else{
				$r .= $this->menuSinHijos($section);
			}
		}
		return $r;
	}
	
	public function menuSinHijos($section){
		$section->action = (!isset($section->action)) ? "index" : $section->action;
		$section->title = (!isset($section->title) || $section->title == "" || $section->title == null) ? "Sin Titulo" : $section->title;
		$urlLink = (isset($section->controller)) ? $this->linkUrl($section->controller, $section->action) : "#";
		$classLink1 = (isset($section->controller) && isset($_GET['controller']) && $section->controller == $_GET['controller'] && isset($_GET['action']) && $_GET['action'] == $section->action) ? " class=\"active\"" : "";
		$classLink2 = (isset($section->controller) && isset($_GET['controller']) && $_GET['controller'] == $section->controller && isset($_GET['action']) && $_GET['action'] == $section->action) ? " class=\"current-page\"" : "";
		$tagIcon = (isset($section->icon) && $section->icon != null && $section->icon != "") ? " <i class=\"{$section->icon}\"></i> " : "";
		
		return "<li{$classLink1}><a href=\"{$urlLink}\">{$tagIcon} {$section->title} </a></li>\n";
	}
	
	public function listMenuLeft001($showNoActives = false) {
		$r = "";
		$modules = MenuLeft::getModules();
		foreach($modules as $modulo){
			$nombreclassModulo = ucwords($modulo)."Controller";
			if(!class_exists($nombreclassModulo)){ cargarControlador($modulo); }
			$infoThisModule = $nombreclassModulo::getThisModule();
			$infoThisModuleSections = $nombreclassModulo::getSections();
			$infoThisModule->name = (!isset($infoThisModule->name) || $infoThisModule->name == "") ? $modulo : $infoThisModule->name;
			$classLink = (isset($_GET['controller']) && $_GET['controller'] == ucwords($modulo)) ? " class=\"active\"" : "";
			$classLink2 = (isset($_GET['controller']) && $_GET['controller'] == ucwords($modulo)) ? " style=\"display: block;\"" : "";
			
			#
			$moduloIcon = (isset($infoThisModule->icon) && $infoThisModule->icon != null && $infoThisModule->icon != "") ? " <i class=\"{$infoThisModule->icon}\"></i> " : "";
			if(ControladorBase::validatePermission(ucwords($modulo), null) == true){
				if(isset($infoThisModule->showTitleModule) && $infoThisModule->showTitleModule == true){
					// $r .= "<h3>{$moduloIcon} Modulo {$infoThisModule->name}</h3>";
				}
				$r .= "<ul class=\"nav side-menu\">";
					$r .= "<li{$classLink}>";
						$r .= "<a>{$moduloIcon}{$infoThisModule->name} <span class=\"fa fa-chevron-down\"></span></a>";
						$r .= "<ul class=\"nav child_menu\"{$classLink2}>";
							if(isset($infoThisModule->isActive) && $infoThisModule->isActive == true){
								foreach($infoThisModuleSections as $section){
									$r .= $this->menuConHijos($section);
								}
							}else{
								if($showNoActives === true){
									$r .= "<li><a href=\"#\">{$moduloIcon}{$infoThisModule->name} <span class=\"label label-success pull-right\">Inactivo</span></a></li>\n";
								}
							}
						$r .= "</ul>";
					$r .= "</li>";
				$r .= "</ul>";
			}
		}
		
		return $r;
	}
}
$menu = new MenuLeft();

if($this->userActive() === true){ ?>
	<div class="navbar nav_title" style="border: 0;">
		<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>CMS</span></a>
	</div>
	<div class="clearfix"></div>

	<div class="profile clearfix">
		<div class="profile_pic">
			<img src="/crm-content/uploads/avatar001.jpg" alt="..." class="img-circle profile_img">
		</div>
		<div class="profile_info">
			<span>Bienvenid@,</span>
			<h2><?php echo $this->getUserNames(); ?></h2>
			<h2><?php echo $this->getUserSurname(); ?></h2>
		</div>
	</div>
	<br />
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
		<?php echo "<div class=\"menu_section\"><h3>Modulos</h3>".$menu->listMenuLeft001()."</div>"; ?>
	</div>
	<div class="sidebar-footer hidden-small">
		<!-- //
		<a data-toggle="tooltip" data-placement="top" title="Settings">
			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
		</a>
		-->
		
		<a data-toggle="tooltip" data-placement="top" title="Salir" href="#">
			<form method="POST" action="/logout">
				<button style="background-color: transparent;border: 0px;" type="submit"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
			</form>
		</a>
	<!-- //
	  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
		<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
	  </a>
	  <a data-toggle="tooltip" data-placement="top" title="Lock">
		<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
	  </a>
	  -->
	  <!--
	  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
		<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
	  </a>-->
	</div>
	<!-- /menu footer buttons -->
<?php } else { ?>
<style>
	.right_col {
		margin-left: 0px !important;
	}
	.left_col {
		visibility: hidden !important;
		display: none !important;
	}
</style>
<?php } ?>