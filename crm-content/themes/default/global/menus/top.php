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
						<a data-toggle="tooltip" data-placement="top" title="Salir">
							<form method="POST" action="/logout">
								<button style="background-color: transparent;border: 0px;" type="submit">
									<i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</button>
							</form>
						</a>
					</li>
			
					<a  href="#"></a>
				</ul>
			</li>
			
			<?php if(ControladorBase::validatePermission("", "") == true){ ?>
				<li role="presentation" class="dropdown" id="navbartop-notifications-legal" @click="load()">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-legal"></i>
						<span class="badge bg-red" v-if="count > 0">{{ count }}</span>
					</a>
					<ul class="dropdown-menu list-unstyled msg_list" role="menu">
						<template v-if="records.length > 0">
							<li v-for="(pqrs, i) in records">
								<a v-bind:href="getLink(pqrs)">
									<span>
										<span>{{ pqrs.type.name }}</span>
										<span class="time">{{ pqrs.created }}</span>
									</span>
									<span class="message">
										{{ pqrs.name }} {{ pqrs.surname }}
										<!-- <br><b>Estado PQRS: </b> {{ pqrs.status.name }} -->
									</span>
								</a>
								
								
							</li>
						</template>
						<template v-else>
							<li>
								<a>
									<span><span></span><span class="time"></span></span>
									<span class="message">No hay PQRs pendientes para iniciar procesos</span>
								</a>
							</li>
						</template>
					</ul>
				</li>
			<?php } ?>
				
			
			
			<li role="presentation" class="dropdown">
				<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
					<i class="fa fa-envelope-o"></i>
					<span class="badge bg-green">6</span>
				</a>
				<ul class="dropdown-menu list-unstyled msg_list" role="menu">
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