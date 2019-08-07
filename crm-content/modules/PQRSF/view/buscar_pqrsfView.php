<div class="" id="app">
	<router-view></router-view>
</div>

<template id="search-PQRs-Peticion">
	<div>
		<div class="clearfix"></div>
		<div class="x_panel">
			<div id="custom-search-input">				
				<div class="input-group col-md-12">
					<input type="text" class=" search-query form-control" v-model="searchBox.text" placeholder="Radicado" @change="runSearch"  @keypress="runSearch" />
					<span class="input-group-btn">
						<button @click="runSearch" class="btn btn-danger" type="button">
							<span class=" glyphicon glyphicon-search"></span>
						</button>
					</span>
				</div>
            </div>
		</div>
		
		
		<template v-if="searchBox.error === false">
			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>PQRs <small> Viendo PQRS - Peticion</small></h2>
							
							<!-- //
							<ul class="nav navbar-right panel_toolbox">
								<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Settings 1</a></li>
										<li><a href="#">Settings 2</a></li>
									</ul>
								</li>
								<li><a class="close-link"><i class="fa fa-close"></i></a></li>
							</ul>
							-->
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<template v-if="record !== null">
								
								<div class="progress"><div class="progress-bar bg-warning" role="progressbar" v-bind:style="'width: ' + record.status.porcentage + '%'" v-bind:data-transitiongoal="record.status.porcentage" v-bind:aria-valuenow="record.status.porcentage" aria-valuemin="0" aria-valuemax="100"></div></div>
								
								<section class="content invoice">
									<div class="row">
										<div class="col-xs-12 invoice-header">
											<h1>
												<i class="fa fa-globe"></i> Radicado # {{ recordId }}
												<small class="pull-right">Fecha de Creación: {{ record.created }}</small>
											</h1>
										</div>
									</div>
									<div class="row invoice-info">
										<div class="col-sm-4 invoice-col">
											<address>
												<strong>{{ record.name }} {{ record.surname }}</strong>
												<br>{{ record.identification_type.name }}
												<br>{{ record.identification_number }}
											</address>
										</div>
										<div class="col-sm-4 invoice-col">
											<address>
												<br>{{ record.address }}, {{ record.city.name }} - {{ record.department.name }}
												<br>Teléfono Fijo: {{ record.phone }}
												<br>Teléfono Móvil: {{ record.phone }}
												<br>Correo Electronico: {{ record.email }}
												<!-- // <strong></strong> -->
											</address>
										</div>
										
										<div class="col-sm-4 invoice-col">
											<!-- //
											<b>Peticion # {{ record.id }}</b>
											<br>
											<br><b>Order ID:</b> 4F3S8J
											<br><b>Payment Due:</b> 2/22/2014
											<br><b>Account:</b> 968-34567
											-->
										</div>
									</div>
									
									<div class="row">
										<div class="col-xs-6">
											<p class="lead">Relacion de los hechos:</p>
											<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;" v-html="record.event_occurred">
											</p>
											<p class="lead">Peticion</p>
											<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;" v-html="record.petition"></p>
										</div>
										
										<div class="col-xs-6">
											<p class="lead">Fecha y Hora del Evento: {{ record.event_date }}</p>
											<div class="table-responsive">
												<table class="table">
													<tbody>
														<tr>
															<th style="width:50%">Cerrado</th>
															<td>
																<i v-if="record.close == 0" class="fa fa-times"></i>
																<i v-if="record.close == 1" class="fa fa-check"></i>
															</td>
														</tr>
														<tr>
															<th>Fecha y Hora de registro: </th>
															<td>{{ record.created }}</td>
														</tr>
														<tr>
															<th>Última Actualización:</th>
															<td>{{ record.updated }}</td>
														</tr>
														<tr>
															<th>Estado actual: </th>
															<td>{{ record.status.name }}</td>
														</tr>
														<tr>
															<th>Tipo de PQRs: </th>
															<td>
																{{ record.type.name }}
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
									<div class="row no-print">
										<div class="col-xs-12">
											<button class="btn btn-default" onclick="window.print();"><i class="fa fa-print"></i> Print</button>
											<button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
											<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>
										</div>
									</div>
								</section>
							</template>
						</div>
					</div>
				</div>
			</div>
		</template>
		<template v-else="">
			<div class="alert alert-danger alert-dismissible fade in" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				<strong>Ups!</strong> {{ searchBox.errorText }}
			</div>
		</template>
	</div>
</template>

<script>
var SearchPQRsPeticion = Vue.extend({
	template: '#search-PQRs-Peticion',
	data: function () {
		return {
			searchBox: {
				error:  true,
				errorText:  "Ingresa el numero del radicado.",
				text:  "",
			},
			record: null,
			recordDateText: '',
			recordId: '',
		};
	},
	methods: {
		zfill: zfill,
		validateResult(response){
			var self = this;
		
			self.searchBox.error = true;
			self.searchBox.errorText = "";
			self.record = null;
			if (response.data != undefined && response.data.records != undefined){
				if(response.data.records[0]){
					self.searchBox.error = false;
					self.record = response.data.records[0];
					self.record.event_occurred = self.record.event_occurred.replace(/(?:\r\n|\r|\n)/g, '<br>');
					self.record.petition = self.record.petition.replace(/(?:\r\n|\r|\n)/g, '<br>');
					
					radSeparate = response.data.records[0].created.split(" ");
					if(radSeparate[0] != undefined){
						radFecha = radSeparate[0].split("-");
						if(radFecha.length === 3){
							self.recordId = radFecha[0] + radFecha[1] + radFecha[2] + self.zfill(response.data.records[0].id, 5);
							self.recordDateText = radFecha[0] + radFecha[1] + radFecha[2];
						}
					}
					
					// self.recordId
					self.searchBox.errorText = "Esta peticion si fue encontrada";
				} else {
					self.searchBox.errorText = "Esta peticion no fue encontrada";
				}
			} else {
				 console.log('Error: consulta'); 
				 console.log(response.data); 
			}
		},
		runSearch(){
			var self = this;
			self.record = null;
			self.searchBox.error = true;
			if(self.searchBox.text != ""){
				// 2019080500003
				var radic = self.validateNumberPQRs(self.searchBox.text);
				console.log(radic);
				
				if(radic.error === false){
					api.get('/records/pqrs', {
						params: {
							core: 'api',
							filter: [
								'id,eq,' + radic.id,
								// 'created_t,bt,' + radic.datumIn + ',' + radic.datumOut,
								'created,ge,' + radic.created + ' 00:00:00',
								'created,le,' + radic.created + ' 23:59:00',
								'type,eq,<?php echo $typepqrsf; ?>',
							],
							join: [
								'types_identifications',
								'geo_departments',
								'geo_citys',
								'status_pqrs',
								'types_pqrs',
							]
						}
					})
					.then(response => {
						// Obtenemos los datos
						self.validateResult(response);
					})
					.catch(e => {
						// Capturamos los errores
						console.log(e);
						console.log(e.response);
					});
				} else {
					self.searchBox.errorText = radic.message;
				}
			}
		},
		validateNumberPQRs(text){
			var a = { "error": true, "message": "", "id":0, "created": '2019-01-01', "datumIn": 0, "datumOut": 0 };
			if(text.length <= 8){
				a.message = "El numero del radico del PQRs es demaciado corto."
			} else {
				radId = text.slice(8, text.length);
				radFecha = text.substr(0, 8);
				radFechaAnho = radFecha.substr(0, 4);
				radFechaMes = radFecha.substr(4, 2);
				radFechaDia = radFecha.substr(6, 2);
				radFechaFull = radFechaAnho + '-' + radFechaMes + '-' + radFechaDia;
				if(radFechaFull.length == 10){
					a.error = false;
					a.id = radId;
					a.created = radFechaAnho + '-' + radFechaMes + '-' + radFechaDia;
					a.datumIn = new Date(Date.UTC(radFechaAnho,radFechaMes,radFechaDia,'0','0','0'));
					// a.datumIn = datumIn.getTime()/1000;
					a.datumOut = new Date(Date.UTC(radFechaAnho,radFechaMes,radFechaDia,'23','59','0'));
					// a.datumOut = datumOut.getTime()/1000;
				}
			}
			
			return a;
		},
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: SearchPQRsPeticion, name: 'SearchPQRs-Peticion', params: { subject: 'pqrs' } },
	]
});

var app = new Vue({
	router: router,
	components: {
		
	},
}).$mount('#app');
</script>