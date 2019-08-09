<?php $myInfo = (isset($_SESSION['user'])) ? $_SESSION['user'] : null; ?>
<div class="" id="micuenta-inbox">
	<div class="page-title">
		<div class="title_left">
			<h3>SAC <small>Inbox</small></h3>
		</div>
	</div>
	<div class="clearfix"></div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Inbox <small>Bandeja de mensajes</small></h2>
					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					<div class="row">
						<div class="col-sm-3 mail_list_column">
							<button id="compose" class="btn btn-sm btn-success btn-block" type="button">Redactar</button>
							<template v-if="records.length > 0" v-for="(inbox, i) in records">
								<router-link tag="a" :to="{ name: 'MiCuenta-Inbox-Conversation-View', params: { conversation_id: inbox.conversation.id }}">
									<div class="mail_list">
										<div class="left">
											<i class="fa fa-circle" v-if="inbox.conversation.status.id == 1"></i> 
											<i class="fa fa-circle-o" v-else></i> 
											<!-- // <i class="fa fa-edit"></i> -->
										</div>
										<div class="right">
											<h3>{{ inbox.conversation.conversations_replys[0].user.names }} <small>{{ inbox.conversation.conversations_replys[0].created }}</small> </h3>
											<p>{{ inbox.conversation.conversations_replys[0].reply.slice(0,100) }}...</p>
										</div>
									</div>
								</router-link>
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
						
						<div class="col-sm-9 mail_view">
							<router-view></router-view>
						</div>
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
			<template v-if="replys[0]">
				<div class="mail_heading row">
					<div class="col-md-8">
						<div class="btn-group">
							<!-- // <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Responder</button> -->
							<!-- // <button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button> -->
							<button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
							<!-- // <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button> -->
						</div>
					</div>
					<div class="col-md-4 text-right">
						<p class="date"> {{ replys[0].created }}</p>
					</div>
					<div class="col-md-12">
						<h4> {{ replys[0].user.names }} {{ replys[0].user.surname }}</h4>
					</div>
				</div>
				
				<div class="sender-info">
					<div class="row">
						<div class="col-md-12">
							<strong>{{ conversation.status.name }}</strong>
							<span>Usuario: ({{ replys[0].user.username }})</span> <strong></strong>
							<a class="sender-dropdown"><i class="fa fa-chevron-down"></i></a>
						</div>
					</div>
				</div>
			
				<div class="view-mail" v-html="replys[0].reply">
				</div>
				
			
				<div class="view-mail" v-html="replys[0].reply">
				</div>
				<div class="ln_solid"></div>
				<div class="x_content">
					<textarea v-model="me.compose.text" class="form-control"></textarea>
				</div>
				
				<div class="btn-group pull-right">
					<!-- // <button v-if="conversation.status.id == 0 || conversation.status.id == 2" class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> </button> -->
					<button @click="sendMessage" class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i> Enviar Mensaje</button>
					<!-- // <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button> -->
				</div>
			</template>
			
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
			replys: [],
			conversation: {
				id: '',
				created: '',
				status: {
					id: '',
					name: ''
				},
				updated: ''
			},
			me: {
				avatar: "https://lh6.googleusercontent.com/-lr2nyjhhjXw/AAAAAAAAAAI/AAAAAAAARmE/MdtfUmC0M4s/photo.jpg?sz=48",				
				compose: {
					text: '',
				},
			},
			you: {
				avatar: "https://a11.t26.net/taringa/avatares/9/1/2/F/7/8/Demon_King1/48x48_5C5.jpg"
			},
		};
	},
	methods: {
		validateResultConversation(r){
			var self = this;
			if (r.data != undefined){
				console.log(r.data);
				self.conversation.id = r.data.id;
				self.conversation.created = r.data.created;
				self.conversation.status = r.data.status;
				self.conversation.updated = r.data.updated;
				self.replys = r.data.conversations_replys;
			} else {
				 console.log('Error: consulta validateResultConversation'); 
				 console.log(response); 
			}
		},
		showErrorAlert(reason, detail){
          var msg = '';
          if (reason === 'unsupported-file-type') {
            msg = "Unsupported format " + detail;
          } else {
            console.log("error uploading file", reason, detail);
          }
          $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
		},
		sendMessage(){
			var self = this;
			if(self.me.compose.text != ''){
				console.log('enviar');
				// Se reinicia por que se detecta que se esta viendo la pantalla en otros pcs. Se retoma 20190809-154200	
			}
		},
	},
	created(){},
	mounted(){
		var self = this;
		conversation_id = (!self.$route.params.conversation_id) ? 0 : self.$route.params.conversation_id;
		console.log(conversation_id);
		api.get('/records/conversations/' + conversation_id, {
			params: {
				filter: [],
				join: [
					'conversations_status',
					'conversations_replys',
					'conversations_replys,users_login',
				]
			}
		})
		.then(response => { self.validateResultConversation(response); })
		.catch(e => { self.validateResultConversation(e); });
	},
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: InboxHome, name: 'MiCuenta-Inbox' },
		{ path: '/conversation/:conversation_id/view', component: InboxConversationsView, name: 'MiCuenta-Inbox-Conversation-View' },
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
						//'status,in,0,1'
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
				 console.log('Error: consulta validateResult'); 
				 console.log(response); 
			}
		},
	},
}).$mount('#micuenta-inbox');

</script>

