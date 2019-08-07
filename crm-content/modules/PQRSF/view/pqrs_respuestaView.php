<?php
	$idpqrs = (isset($_GET) && isset($_GET['id_pqrs']) && $_GET['id_pqrs'] > 0) ? $_GET['id_pqrs'] : 0;
	$typepqrs = (isset($_GET) && isset($_GET['type_pqrs']) && $_GET['type_pqrs'] > 0) ? $_GET['type_pqrs'] : 0;
?>
<div class="" id="app">
	<router-view></router-view>
</div>

<template id="response-PQRs-AsistenciaJuridica">
	<div>
		<div class="clearfix"></div>
		<template v-if="searchBox.error === false">
			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>{{ record.type.name }}</h2>
							
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
											<button class="btn btn-default" onclick="window.print();">
												<i class="fa fa-print"></i> Imprimir
											</button>
											<button class="btn btn-success pull-right">
												<i class="fa fa-credit-card"></i> ¿?¿?
											</button>
											<button class="btn btn-primary pull-right" style="margin-right: 5px;">
												<i class="fa fa-download"></i> ¿?¿?
											</button>
										</div>
									</div>
								</section>
							</template>
						</div>
						
					</div>
					<forms-create-dynamic :options_form="closedPQRs"></forms-create-dynamic>
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
var SearchPQRsRespuesta = Vue.extend({
	template: '#response-PQRs-AsistenciaJuridica',
	data: function () {
		return {
			searchBox: {
				error:  true,
				errorText:  "Ingresa el numero del radicado o el numero de la peticion.",
				text:  "",
			},
			record: null,
			recordDateText: '',
			recordId: '',
			
			/*
			responsePQRs: {
				id_edit: <?php echo $idpqrs; ?>,
				titulo: 'Ingresar Respuesta',
				subtitulo: 'Responder',
				descripcion: 'Esta información XXXX <code>XXXXX</code> y serán ellos los encargados de continuar su  <a href="#">proceso</a>',
				action: "edit",
				tabla: "pqrs",
				fields: {
					status: {
						label: "Estado",
						required: true,
						value: "",
						typeInput: "select",
						options: "status_pqrs"
					},
					response: {
						label: "Respuesta",
						required: true,
						typeInput: "textarea",
						valueDataDynamic: {
							fields: {
								"response": {
									label: "Agregar",
									required: true,
									value: "",
									typeInput: "textarea"
								},
							},
							result: [
								[
									{ "parent": "response" }, 
									"\n - - - - \n", 
									"response"
								]
							]
						},
					},
				},
				callEvent(resultado){
					if(resultado.id != undefined && resultado.id > 0){
						bootbox.alert({
							message: "<h1>Muy Bien!</h1><br>La PQRs se a creado y enviado con éxito, el # del Radicado es <h5>" + resultado.recordId + "</h5>",
							callback: function () {
								// console.log('This was logged in the callback!');
								location.reload();
							}
						})
					}
				}
			},
			*/
			closedPQRs: {
				id_edit: <?php echo $idpqrs; ?>,
				titulo: 'PQRs',
				subtitulo: 'Cerrar',
				descripcion: 'Esta información XXXX <code>XXXXX</code> y serán ellos los encargados de continuar su  <a href="#">proceso</a>',
				action: "edit",
				tabla: "pqrs",
				fields: {
					spanTitle001: {
						label: "Cerrar",
						typeInput: "section",
					},
					response: {
						label: "Respuesta",
						required: true,
						typeInput: "textarea",
						valueDataDynamic: {
							fields: {
								"response": {
									label: "Agregar",
									required: true,
									value: "",
									typeInput: "textarea"
								},
							},
							result: [
								[
									{ "parent": "response" }, 
									"\n - - - - \n", 
									"response"
								]
							]
						},
					},
					status: {
						label: "Estado",
						required: true,
						value: "",
						typeInput: "select",
						options: "status_pqrs"
					},
					close: {
						label: "¿Cerrar PQRs?",
						required: false,
						value: 0,
						typeInput: "checkbox",
					},
					closed	: {
						label: "Fecha y Hora de cierre",
						required: false,
						typeInput: "datetime",
						valueDataDynamic: {
							fields: {
								"fecha": {
									label: "Fecha",
									required: false,
									typeInput: "date"
								},
								"hora": {
									label: "Hora",
									required: false,
									typeInput: "time"
								}
							},
							result: [ [ "fecha", "hora" ] ]
						},
					},
				},
				callEvent(resultado){
					if(resultado.id != undefined && resultado.id > 0){
						bootbox.alert({
							className: 'rubberBand animated',
							size: 'small',
							buttons: {
								ok: {
									label: 'Vale',
									className: 'btn-success'
								},
							},
							message: "<h1>Guardado!</h1><br>La PQRs se a guardado con éxito, el radicado modificado fue <h5>" + resultado.recordId + "</h5>",
							callback: function () {
								// console.log('This was logged in the callback!');
								location.reload();
							}
						})
					}
				}
			},
		};
	},
	created(){
		var self = this;
		self.getPQRs();
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
		getPQRs(){
			var self = this;
			self.record = null;
			self.searchBox.error = true;
			
			api.get('/records/pqrs', {
				params: {
					core: 'api',
					filter: [
						'id,eq,' + <?php echo $idpqrs; ?>,
						'type,eq,' + <?php echo $typepqrs; ?>,
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
		},
		validateNumberPQRs(text){
			var a = { "error": true, "message": "", "id":0, "created": '2019-01-01', "datumIn": 0, "datumOut": 0 };
			if(text.length <= 8){
				a.message = "El numero del radico no fue encontrado."
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
		{ path: '/', component: SearchPQRsRespuesta, name: 'SearchPQRs-Peticion', params: { subject: 'pqrs' } },
	]
});

var app = new Vue({
	router: router,
	components: {
		
	},
}).$mount('#app');
</script>