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
		$classLink1 = (isset($section->controller) && isset($_GET['controller']) && $section->controller == $_GET['controller'] && isset($_GET['action']) && $_GET['action'] == $section->action) ? " class=\"active\"" : "";
		$classLink2 = (isset($section->controller) && isset($_GET['controller']) && $_GET['controller'] == $section->controller && isset($_GET['action']) && $_GET['action'] == $section->action) ? " style=\"display: block;\"" : "";
		// class=\"current-page\"
		// class=\"sub_menu\"
		// class=\"active\"
		
		$r = "";
		if(isset($section->tree) && count($section->tree) > 0){
			$r .= "<li{$classLink1}>\n".
				"<a><i class=\"fa fa-sitemap\"></i> {$section->title} <span class=\"fa fa-chevron-down\"></span></a>\n".
				"<ul class=\"nav child_menu\"{$classLink2}>\n";
					foreach($section->tree as $item){
						if(isset($item->tree) && count($item->tree) > 0){
							$r .= $this->menuConHijos($item);
						}else{
							$r .= $this->menuSinHijos($item);
						}
					}
						/*
					*/
			$r .= "</ul>\n".
			"</li>\n";
		}else{
			$r .= $this->menuSinHijos($section);
		}
		
		return $r;
	}
	
	public function menuSinHijos($section){
		$section->action = (!isset($section->action)) ? "index" : $section->action;
		$section->title = (!isset($section->title) || $section->title == "" || $section->title == null) ? "Sin Titulo" : $section->title;
		$urlLink = (isset($section->controller)) ? $this->linkUrl($section->controller, $section->action) : "#";
		$classLink1 = (isset($section->controller) && isset($_GET['controller']) && $section->controller == $_GET['controller'] && isset($_GET['action']) && $_GET['action'] == $section->action) ? " class=\"active\"" : "";
		$classLink2 = (isset($section->controller) && isset($_GET['controller']) && $_GET['controller'] == $section->controller && isset($_GET['action']) && $_GET['action'] == $section->action) ? " class=\"current-page\"" : "";
		
		return "<li{$classLink1}><a href=\"{$urlLink}\"><i class=\"fa fa-laptop\"></i> {$section->title} </a><li>\n";
	}
	
	public function listMenuLeft001() {
		$r = "";
		$modules = MenuLeft::getModules();
		foreach($modules as $modulo){
			$nombreclassModulo = ucwords($modulo)."Controller";
			if(!class_exists($nombreclassModulo)){ cargarControlador($modulo); }
			$infoThisModule = $nombreclassModulo::getThisModule();
			$infoThisModuleSections = $nombreclassModulo::getSections();
			$infoThisModule->name = (!isset($infoThisModule->name) || $infoThisModule->name == "") ? $modulo : $infoThisModule->name;
			$classLink = (isset($section->controller) && isset($_GET['controller']) && $section->controller == $_GET['controller']) ? " class=\"active\"" : "";
			#
			$r .= "<h3>{$infoThisModule->name}</h3>";
			$r .= "<ul class=\"nav side-menu\">";
				if(isset($infoThisModule->isActive) && $infoThisModule->isActive == true){
					foreach($infoThisModuleSections as $section){
						$r .= $this->menuConHijos($section);
					}
				}else{
					$r .= "<li><a href=\"#\"><i class=\"fa fa-laptop\"></i> {$infoThisModule->name} <span class=\"label label-success pull-right\">Inactivo</span></a></li>\n";
				}
			$r .= "</ul>";
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

	<!-- menu profile quick info -->
	<div class="profile clearfix">
	  <div class="profile_pic">
		<img src="images/img.jpg" alt="..." class="img-circle profile_img">
	  </div>
	  <div class="profile_info">
		<span>Bienvenid@,</span>
		<h2><?php echo $this->getUserNames(); ?></h2>
		<h2><?php echo $this->getUserSurname(); ?></h2>
	  </div>
	</div>
	<!-- /menu profile quick info -->

	<br />

	<!-- sidebar menu -->
	<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	  <div class="menu_section">
		<h3>-- Todos los modulos --</h3>
	  </div>
	  <div class="menu_section">
			<?php 
				$menuModules = $menu->listMenuLeft001();
				echo $menuModules;
			?>
	  </div>
	  <div class="menu_section">
		<h3>General</h3>
		<ul class="nav side-menu">
			<li>
				<a><i class="fa fa-home"></i> Dashboards <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="/<?php echo $this->linkUrl('FrontPage', 'index'); ?>">Debug</a></li>
					<li><a href="/<?php echo $this->linkUrl('dashboard', 'vue'); ?>">Dashboard Vue</a></li>
					<!-- // <li><a href="/<?php echo $this->linkUrl('dashboard', 'php'); ?>">Dashboard PHP</a></li> -->
					<li><a href="/<?php echo $this->linkUrl('wellcome', 'index'); ?>">Dashboard Wellcome</a></li>
				</ul>
			</li>
			
			
			<li>
				<a><i class="fa fa-home"></i> Formularios <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li><a href="/<?php echo $this->linkUrl('usuarios', 'index2'); ?>">Usuarios</a></li>
				</ul>
			</li>
			<!-- //
			<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="index.html">Dashboard</a></li>
			  <li><a href="index2.html">Dashboard2</a></li>
			  <li><a href="index3.html">Dashboard3</a></li>
			</ul>
			</li>
			<li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="form.html">General Form</a></li>
			  <li><a href="form_advanced.html">Advanced Components</a></li>
			  <li><a href="form_validation.html">Form Validation</a></li>
			  <li><a href="form_wizards.html">Form Wizard</a></li>
			  <li><a href="form_upload.html">Form Upload</a></li>
			  <li><a href="form_buttons.html">Form Buttons</a></li>
			</ul>
			</li>
			<li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="general_elements.html">General Elements</a></li>
			  <li><a href="media_gallery.html">Media Gallery</a></li>
			  <li><a href="typography.html">Typography</a></li>
			  <li><a href="icons.html">Icons</a></li>
			  <li><a href="glyphicons.html">Glyphicons</a></li>
			  <li><a href="widgets.html">Widgets</a></li>
			  <li><a href="invoice.html">Invoice</a></li>
			  <li><a href="inbox.html">Inbox</a></li>
			  <li><a href="calendar.html">Calendar</a></li>
			</ul>
			</li>
			<li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="tables.html">Tables</a></li>
			  <li><a href="tables_dynamic.html">Table Dynamic</a></li>
			</ul>
			</li>
			<li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="chartjs.html">Chart JS</a></li>
			  <li><a href="chartjs2.html">Chart JS2</a></li>
			  <li><a href="morisjs.html">Moris JS</a></li>
			  <li><a href="echarts.html">ECharts</a></li>
			  <li><a href="other_charts.html">Other Charts</a></li>
			</ul>
			</li>
			<li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
			  <li><a href="fixed_footer.html">Fixed Footer</a></li>
			</ul>
			</li>
			-->
		</ul>
	  </div>
	  
	  <!-- //
	  <div class="menu_section">
		<h3>Live On</h3>
		<ul class="nav side-menu">
		  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="e_commerce.html">E-commerce</a></li>
			  <li><a href="projects.html">Projects</a></li>
			  <li><a href="project_detail.html">Project Detail</a></li>
			  <li><a href="contacts.html">Contacts</a></li>
			  <li><a href="profile.html">Profile</a></li>
			</ul>
		  </li>
		  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
			  <li><a href="page_403.html">403 Error</a></li>
			  <li><a href="page_404.html">404 Error</a></li>
			  <li><a href="page_500.html">500 Error</a></li>
			  <li><a href="plain_page.html">Plain Page</a></li>
			  <li><a href="login.html">Login Page</a></li>
			  <li><a href="pricing_tables.html">Pricing Tables</a></li>
			</ul>
		  </li>
		  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
			<ul class="nav child_menu">
				<li><a href="#level1_1">Level One</a>
				<li><a>Level One<span class="fa fa-chevron-down"></span></a>
				  <ul class="nav child_menu">
					<li class="sub_menu"><a href="level2.html">Level Two</a>
					</li>
					<li><a href="#level2_1">Level Two</a>
					</li>
					<li><a href="#level2_2">Level Two</a>
					</li>
				  </ul>
				</li>
				<li><a href="#level1_2">Level One</a>
				</li>
			</ul>
		  </li>                  
		  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
		</ul>
	  </div>
	  -->
	</div>
	<!-- /sidebar menu -->

	<!-- /menu footer buttons -->
	<div class="sidebar-footer hidden-small">
	<!-- //
	  <a data-toggle="tooltip" data-placement="top" title="Settings">
		<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
	  </a>
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
	  
	  <a data-toggle="tooltip" data-placement="top" title="Salir" href="#">
		<form method="POST" action="/logout">
			<button style="background-color: transparent;border: 0px;" type="submit"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></button>
		</form>
	  </a>
	</div>
	<!-- /menu footer buttons -->
<?php } ?>