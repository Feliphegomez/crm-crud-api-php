<?php if(isset($_SESSION['user'])){ ?>

<?php 
	#echo json_encode($this);
?>
<div class="nav_menu">
	<nav>
		<div class="nav toggle">
		<a id="menu_toggle"><i class="fa fa-bars"></i></a>
		</div>

		<ul class="nav navbar-nav navbar-right">
			<li class="">
				  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<img src="images/img.jpg" alt=""><?php echo $this->getUserNames(); ?>
					<span class=" fa fa-angle-down"></span>
				  </a>
				  <ul class="dropdown-menu dropdown-usermenu pull-right">
					<li><a href="<?php echo $this->linkUrl('Usuarios', 'mi_perfil'); ?>"> Profile</a></li>
					<li>
					  <a href="<?php echo $this->linkUrl('Usuarios', 'settings'); ?>">
						<span class="badge bg-red pull-right">50%</span>
						<span>Settings</span>
					  </a>
					</li>
					<li><a href="javascript:;">Help</a></li>
					<li>
						<form method="POST" action="/logout">
							<a >
								<button style="background-color: transparent;border: 0px;" type="submit">
									<i class="fa fa-sign-out pull-right"></i> Log Out
								</button>
							</a>
						</form>
					</li>
			
					<a data-toggle="tooltip" data-placement="top" title="Salir" href="#"></a>
				</ul>
			</li>
			
			
			<li role="presentation" class="dropdown">
				<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-legal"></i>
					<span class="badge bg-green">0</span>
				</a>
				<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
					<li>
					  <a>
						<span>
						  <span>John Smith</span>
						  <span class="time">3 mins ago</span>
						</span>
						<span class="message">
						  Film festivals used to be do-or-die moments for movie makers. They were where...
						</span>
					  </a>
					</li>
				</ul>
			</li>
			
			
			
			<li role="presentation" class="dropdown">
				<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-envelope-o"></i>
					<span class="badge bg-green">6</span>
				</a>
				<ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
					<li>
					  <a>
						<span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
						<span>
						  <span>John Smith</span>
						  <span class="time">3 mins ago</span>
						</span>
						<span class="message">
						  Film festivals used to be do-or-die moments for movie makers. They were where...
						</span>
					  </a>
					</li>
					
				</ul>
			</li>
		</ul>
	</nav>
</div>
<?php } ?>