
<?php $myInfo = (isset($_SESSION['user'])) ? $_SESSION['user'] : null; ?>
<div class="" id="micuenta-inbox">
	<div class="page-title">
		<div class="title_left">
			<h3>Mi Cuenta <small>Inbox</small></h3>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
	  <div class="col-md-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Inbox <small>Bandeja de mensajes</small></h2>
			<ul class="nav navbar-right panel_toolbox">
			  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			  </li>
			  <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#">Settings 1</a>
				  </li>
				  <li><a href="#">Settings 2</a>
				  </li>
				</ul>
			  </li>
			  <li><a class="close-link"><i class="fa fa-close"></i></a>
			  </li>
			</ul>
			<div class="clearfix"></div>
		  </div>
		  <div class="x_content">
			<div class="row">
			  <div class="col-sm-3 mail_list_column">
				<!-- // <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button> -->
				<template v-if="records.length > 0" v-for="(inbox, i) in records">
					<a href="#"> <!-- //  v-bind:href="getLink(inbox)" -->
						<div class="mail_list">
							<div class="left">
								<i class="fa fa-circle" v-if="inbox.conversation.status.id == 1"></i> 
								<i class="fa fa-circle-o" v-else></i> 
								<i class="fa fa-edit"></i>
							</div>
							<div class="right">
								<h3>{{ inbox.conversation.conversations_replys[0].user.names }} <small>{{ inbox.conversation.conversations_replys[0].created }}</small> </h3>
								<p>{{ inbox.conversation.conversations_replys[0].reply.substring(-1,250) }}</p>
							</div>
						</div>
					</a>
				</template>
				<template v-else>
					<a href="#">
						<div class="mail_list">
							<div class="left">
								<i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
							</div>
							<div class="right">
								<h3> <small></small></h3>
								<p>No hay conversaciones.</p>
							</div>
						</div>
					</a>
				</template>
				
			  </div>
			  <!-- /MAIL LIST -->

			  <!-- CONTENT MAIL -->
			  <div class="col-sm-9 mail_view">
				<router-view></router-view>
			  </div>
			  <!-- /CONTENT MAIL -->
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>

<template id="micuenta-inbox-home">
	<div>
	</div>
</template>
		

<template id="micuenta-inbox-conversations-view">
	<div>
		<div class="inbox-body">
		  <div class="mail_heading row">
			<div class="col-md-8">
			  <div class="btn-group">
				<button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Responder</button>
				<!-- // <button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button> -->
				<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
				<!-- // <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button> -->
			  </div>
			</div>
			<div class="col-md-4 text-right">
			  <p class="date"> 8:02 PM 12 FEB 2014</p>
			</div>
			<div class="col-md-12">
			  <h4> Donec vitae leo at sem lobortis porttitor eu consequat risus. Mauris sed congue orci. Donec ultrices faucibus rutrum.</h4>
			</div>
		  </div>
		  <div class="sender-info">
			<div class="row">
			  <div class="col-md-12">
				<strong>Jon Doe</strong>
				<span>(jon.doe@gmail.com)</span> to
				<strong>me</strong>
				<a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
			  </div>
			</div>
		  </div>
		  <div class="view-mail">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
			  Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
			<p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
			  nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
			  mollit anim id est laborum.</p>
			<p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
			  velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		  </div>
		  <div class="attachment">
			<p>
			  <span><i class="fa fa-paperclip"></i> 3 attachments — </span>
			  <a href="#">Download all attachments</a> |
			  <a href="#">View all images</a>
			</p>
			<ul>
			  <li>
				<a href="#" class="atch-thumb">
				  <img src="/crm-content/uploads/avatar001.jpg" alt="img" />
				</a>

				<div class="file-name">
				  image-name.jpg
				</div>
				<span>12KB</span>


				<div class="links">
				  <a href="#">View</a> -
				  <a href="#">Download</a>
				</div>
			  </li>

			  <li>
				<a href="#" class="atch-thumb">
				  <img src="/crm-content/uploads/avatar001.jpg" alt="img" />
				</a>

				<div class="file-name">
				  img_name.jpg
				</div>
				<span>40KB</span>

				<div class="links">
				  <a href="#">View</a> -
				  <a href="#">Download</a>
				</div>
			  </li>
			  <li>
				<a href="#" class="atch-thumb">
				  <img src="/crm-content/uploads/avatar001.jpg" alt="img" />
				</a>

				<div class="file-name">
				  img_name.jpg
				</div>
				<span>30KB</span>

				<div class="links">
				  <a href="#">View</a> -
				  <a href="#">Download</a>
				</div>
			  </li>

			</ul>
		  </div>
		  <div class="btn-group">
			<button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
			<button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
			<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
			<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
		  </div>
		</div>

	</div>
</template>

<script>
var InboxHome = Vue.extend({
	template: '#micuenta-inbox-home',
	data: function () {
		return {
		};
	},
	methods: {
	}
});

var InboxConversationsView = Vue.extend({
	template: '#micuenta-inbox-conversations-view',
	data: function () {
		return {
		};
	},
	methods: {
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: InboxHome, name: 'MiCuenta-Inbox' },
	]
});


var Inbox = new Vue({
	router: router,
	data(){
		return {
			count: 0,
			records: []
		};
	},
	created(){
		var self = this;
		self.load();
	},
	methods: {
		load(){
			var self = this;
			api.get('/records/conversations_groups', {
				params: {
					filter: [
						'user,in,<?php echo ($myInfo['id']); ?>',
						// 'conversations.status,eq,2'
					],
					join: [
						'conversations',
						'conversations,conversations_status',
						'conversations,conversations_replys',
						'conversations,conversations_replys,users_login',
					]
				}
			})
			.then(response => {
				self.validateResult(response);
			})
			.catch(e => {
				// Capturamos los errores
				self.validateResult(e);
			});
		},
		getLink(pqrs){
			var self = this;
			action = '';
			pqrs.id = (pqrs.id != undefined && pqrs.id > 0) ? pqrs.id : 0;
			typeId = (pqrs.type.id != undefined && pqrs.type.id > 0) ? pqrs.type.id : ((pqrs.type != undefined && pqrs.type > 0) ? pqrs.type : 0);
			return '/index.php?controller=PQRSF&action=ver_pqrsf&type=' + typeId + '&id=' + pqrs.id;
		},
		validateResult(response){
			var self = this;
			if (response.data != undefined && response.data.records != undefined){
				self.records = [];
				self.count = 0;
				if(response.data.records[0]){
					response.data.records.forEach(item => {
							self.records.push(item);
							self.count++;
					});
				} else {
					self.searchBox.errorText = "Esta queja no fue encontrada";
				}
			} else {
				 console.log('Error: consulta'); 
				 console.log(response.data); 
			}
		},
	},
}).$mount('#micuenta-inbox');

</script>

