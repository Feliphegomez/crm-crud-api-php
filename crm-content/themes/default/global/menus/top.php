<?php if(isset($_SESSION['user'])){ ?>
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
					<li><a href="<?php echo $this->linkUrl('Usuarios', 'mi_perfil'); ?>"> Mi Cuenta</a></li>
					<!-- //
					<li>
						<a href="<?php echo $this->linkUrl('Usuarios', 'settings'); ?>">
							<span class="badge bg-red pull-right">50%</span>
							<span>Settings</span>
						</a>
					</li>
					-->
					<li><a target="_blank" href="https://help.monteverdeltda.com">Ayuda y Soporte</a></li>
					<li>
						<a data-toggle="tooltip" data-placement="top" title="Salir">
							<form method="POST" action="/logout">
								<button style="background-color: transparent;border: 0px;" type="submit"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</button>
							</form>
						</a>
					</li>
					<a  href="#"></a>
				</ul>
			</li>
			<?php if(ControladorBase::validatePermission("PQRSF", "navbar_legal") == true){ ?>
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
			<?php if(ControladorBase::validatePermission("SAC", "inbox") == true){ ?>
				<li role="presentation" class="dropdown" id="navbartop-notifications-inbox-sac" @click="load()">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-square"></i>
						<span class="badge bg-green" v-if="count > 0">{{ count }}</span>
					</a>
					<ul class="dropdown-menu list-unstyled msg_list" role="menu">
						<template v-if="records.length > 0">
							<li v-for="(inbox, i) in records">
								<a v-if="inbox.conversations_replys[0]"> <!-- //  v-bind:href="getLink(inbox)" -->
									<span>
										<span><b>{{ inbox.conversations_replys[0].user.names }} </b></span>
										<span class="time">{{ inbox.conversations_replys[0].created }}</span>
									</span>
									<span class="message">
										{{ inbox.conversations_replys[0].reply }}
										<!-- <br><b>Estado PQRS: </b> {{ inbox.status.name }} -->
									</span>
								</a>
							</li>
						</template>
						<template v-else>
							<li>
								<a>
									<span><span></span><span class="time"></span></span>
									<span class="message">No hay conversaciones.</span>
								</a>
							</li>
						</template>
						
						<li>
							<div class="text-center">
								<a href="<?php echo $this->linkUrl('MiCuenta', 'inbox'); ?>">
									<strong>Bandeja de Mensajes</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			<?php } ?>
				
			<?php if(ControladorBase::validatePermission("MiCuenta", "inbox") == true){ ?>
				<li role="presentation" class="dropdown" id="navbartop-notifications-inbox" @click="load()">
					<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-envelope-o"></i>
						<span class="badge bg-green" v-if="count > 0">{{ count }}</span>
					</a>
					<ul class="dropdown-menu list-unstyled msg_list" role="menu">
						<template v-if="records.length > 0">
							<li v-for="(inbox, i) in records">
								<a v-if="inbox.conversation.conversations_replys[0]"> <!-- //  v-bind:href="getLink(inbox)" -->
									<span>
										<span><b>{{ inbox.conversation.conversations_replys[0].user.names }} </b></span>
										<span class="time">{{ inbox.conversation.conversations_replys[0].created }}</span>
									</span>
									<span class="message">
										{{ inbox.conversation.conversations_replys[0].reply }}
										<!-- <br><b>Estado PQRS: </b> {{ inbox.status.name }} -->
									</span>
								</a>
							</li>
						</template>
						<template v-else>
							<li>
								<a>
									<span><span></span><span class="time"></span></span>
									<span class="message">No hay conversaciones.</span>
								</a>
							</li>
						</template>
						
						<li>
							<div class="text-center">
								<a href="<?php echo $this->linkUrl('MiCuenta', 'inbox'); ?>">
									<strong>Bandeja de Mensajes</strong>
									<i class="fa fa-angle-right"></i>
								</a>
							</div>
						</li>
					</ul>
				</li>
			<?php } ?>
		</ul>
	</nav>
</div>
<?php } ?>