<?php 

?>
<div class="" id="app">
	<div class="page-title">
		<div class="title_left">
			<h3>Form Validation</h3>
		</div>	
	</div>
	<div class="clearfix"></div>
	<router-view></router-view>
</div>

<template id="Forms-Create-Diynamic">
	<div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ title }} <small>sub title</small></h2>
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
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<!-- // -->
						<div class="clearfix"></div>
						<!-- // -->
						<!-- // -->
						<div>
							<!-- //
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							</div>
							-->
							<div id="messageBox"></div>
							
							<div class="clearfix"></div>
							<br />
						</div>
						<!-- // -->
						
						<form id="jvalidate" role="form" class="form-horizontal" action="javascript:alert('Error Enviando datos.');">
							<p>
								For alternative validation library <code>parsleyJS</code> check out in the <a href="form.html">form page</a>
							</p>
							<div class="clearfix"></div>
							<br />
							<!-- // -->
							<span class="section">Información Personal</span>
							
							<div class="" v-if="inputs !== null">
								<div class="item form-group" v-for="(item, i) in inputs">
									<label class="control-label col-md-4 col-sm-4 col-xs-12" for="identification_type">
										{{ item.label }} <span class="required" v-if="item.required === true">*</span>
									</label>
									
									<div class="col-md-8 col-sm-8 col-xs-12">
										<input class="form-control col-xs-12" v-if="item.tag === 'input'" 
											:name="item.name"
											:required="item.required" 
											:readonly="item.readonly" 
											:disabled="item.disabled" 
											:type="item.type" 
											:title="item.title" 
											:value="item.value" 
										/>
										
										<select v-if="item.tag === 'select'" class="form-control col-xs-12" 
											:name="item.name"
											:required="item.required" 
											:readonly="item.readonly" 
											:disabled="item.disabled" 
											:type="item.type" 
											:title="item.title" 
											:value="item.value"
										>
											<option :value="option.value" v-if="item.options != undefined && item.options != null" v-for="(option, index) in item.options">{{ option.text }}</option>
										</select>
										
										<textarea v-if="item.tag === 'textarea'" class="form-control col-xs-12" 
											:name="item.name"
											:required="item.required" 
											:readonly="item.readonly" 
											:disabled="item.disabled" 
											:title="item.title" 
										>{{ item.value }}</textarea>
										<!---
										< v-if="item.tag === ''" class="form-control col-xs-12" :name="item.name"></textarea>-->
									</div>
									
									<!--
									<div class="col-md-8 col-sm-8 col-xs-12">
										
									</div>
									--->
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-3">
									<button type="reset" class="btn btn-default">Limpiar</button>
									<button type="submit" class="btn btn-success">Guardar</button>
								</div>
							</div>
						</form>
					</div>
			
					<div class="x_content">
						<!-- // {{ record }} -->
						<br />
						<button v-on:click="count++">You clicked me {{ count }} times.</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="x_panel">
			<div class="x_content">
				{{ rules }}
				<hr>
				{{ record }}
				<hr>
					<!-- //
					<template v-if="fields !== null" v-for="(value, key) in record">						
					</template> -->
					
					<!-- //
					<template v-if="fields !== null" v-for="(value, key) in record">
						<div class="form-group" v-if="fields[key] != undefined && fields[key].show === undefined || fields[key] != undefined && fields[key].show === true">
							<label v-if="fields[key] != undefined && fields[key].title != undefined" class="control-label col-md-3 col-sm-3 col-xs-12" v-bind:for="key">
								{{ fields[key].title }} 
								<span v-if="fields[key] != undefined && fields[key].required != undefined && fields[key].required  == true" class="required">*</span>
							</label>
							<label v-else="" class="control-label col-md-4 col-sm-4 col-xs-12" v-bind:for="key">
								{{ key }} 
								<span v-if="fields[key] != undefined && fields[key].required != undefined && fields[key].required  == true" class="required">*</span>
							</label>
							<div class="col-md-8 col-sm-8 col-xs-12">
								<input type="text" v-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'text'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="number" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'number'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="date" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'date'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="datetime-local" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'datetime-local'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="email" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'email'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="month" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'month'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="password" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'password'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="tel" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'tel'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="time" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'time'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<input type="url" v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput === 'url'"  class="form-control col-md-7 col-xs-12" v-bind:id="key" :disabled="key === primaryKey" v-model="record[key]"  />
								<select 
									v-else-if="references[key] != false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput == 'select'" 
									class="form-control col-md-7 col-xs-12" v-bind:id="key" v-model="record[key]">
									<option value=""></option>
									<option v-for="option in options[references[key]]" v-bind:value="option.key">
										{{ option.value }}
									</option>
								</select>
								<textarea 
									v-else-if="references[key] === false && fields[key] != undefined && fields[key].typeInput != undefined && fields[key].typeInput == 'textarea'" 
									class="form-control col-md-7 col-xs-12" v-bind:id="key" v-model="record[key]"></textarea>
								< !-- // <input v-else="" class="form-control col-md-7 col-xs-12" v-bind:id="key" v-model="record[key]" :disabled="key === primaryKey" />  -- >
							</div>
						</div>
					</template>
					-->
				
			</div>
		</div>
	</div>
</template>

<template id="create-PQRs-Peticion">
	<div>
		<forms-create-dynamic :options_form="thisForm"></forms-create-dynamic>
	</div>
</template>

<script>
var FormsCreateDynamic = Vue.component('forms-create-dynamic', {
	template: '#Forms-Create-Diynamic',
	props: {
		'options_form': {
			'titulo': 'Crear',
			'tabla': '',
			'fields': null
		}
	},
	data(){
		return {
			count: 0,
			title: "",
			table: "",
			rules: null,
			record: null,
			options: null,
			jvalidate: null,
			inputs: []
		};
	},
	computed: {
	},
	created(){
		var self = this;
	},
	mounted(){
		var self = this;
		self.getOptionsInputs();
	},
	methods: {
		returnFalse(){
			return false;
		},
		getValidatorForm(){
			var self = this;
			self.jvalidate = $("#jvalidate").validate({
				//wrapper: "alert alert-danger alert-dismissible fade in",
				///errorContainer: "#messageBox",
				debug: true,
				//errorLabelContainer: "#messageBox",
				//wrapper: "strong",
                ignore: [],
                rules: self.rules,
				submitHandler: function() {
					alert("Submit Form");
				},
				onsubmit: true,
				errorPlacement: function(error, element){
					console.log(error);
					console.log(element);
					console.log(element[0].title);
					var errorClone = error.clone();
					var errorHTML = '<div class="alert alert-danger alert-dismissible fade in" role="alert">';
						errorHTML += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
						errorHTML += '<strong>' + element[0].title + '</strong> revisa este campo.';
					errorHTML += '</div>';
					$("#messageBox").append(errorHTML);
				}
			});
		},
		getOptionsInputs(){
			var self = this;
			if(self.options === undefined || self.options === null){
				self.options = {};
			}
			if(self.options_form != undefined){
				fields = (self.options_form.fields != undefined) ? self.options_form.fields : {};
				
				for (const [key, value] of Object.entries(fields)) {
					if(self.options[value.options] === undefined){
						self.options[value.options] = [{ text: "Seleccione una opcion.", value: "" }];
					}
					
					if((value.options != undefined)){
							console.log("Cargar: " + value.options);							
							api.get('/records/' + value.options, {
								params: {}
							})
							.then(function (r) {
								if(!r.status){
									alert('Ocurrio un error creando el campo del formulario. [' + key + ']');
								} else {
									if(r.status === 200){
										console.log('creando el campo del formulario. [' + key + ']');
										for (const [kRecord, vRecord] of Object.entries(r.data.records)) {
											if(vRecord.name != undefined && vRecord.code != undefined){
												// console.log({ text: vRecord.name + ' - ' + vRecord.name, value: vRecord.id });
												self.options[value.options].push({ text: vRecord.code + ' - ' + vRecord.name, value: vRecord.id });
											} else if(vRecord.name != undefined && vRecord.code == undefined){
												self.options[value.options].push({ text: vRecord.name, value: vRecord.id });
											} else if(vRecord.names != undefined && vRecord.name == undefined){
												self.options[value.options].push({ text: vRecord.names, value: vRecord.id });
											}  else if(vRecord.title != undefined && vRecord.name == undefined){
												self.options[value.options].push({ text: vRecord.title, value: vRecord.id });
											} 
											else {
												self.options[value.options].push({ text: vRecord.id, value: vRecord.id });
											}
										};
									}
								}
							})
							.catch(function (e) {
								console.log(e);
							});
					}
				}
				self.getOptions();
			} else {
				console.log('options_form no definido.');
			}
			
			self.getValidatorForm();
		},
		getOptions(){
			var self = this;
			self.rules = {};
			self.record = {};
			self.inputs = [];
			if(self.options_form != undefined){
				self.title = (self.options_form.titulo != undefined) ? self.options_form.titulo : '';
				// self.subject = (self.options_form.tabla != undefined) ? self.options_form.tabla : '';
				fields = (self.options_form.fields != undefined) ? self.options_form.fields : {};
				
				for (const [key, value] of Object.entries(fields)) {
					var optionsRule = {};
					var optionsInput = {};
					
					if((value.required !== undefined)){ optionsRule.required = value.required; } else {}
					if((value.remote !== undefined)){ optionsRule.remote = value.remote; } else {}
					if((value.min !== undefined)){ optionsRule.min = value.min; } else {}
					if((value.max !== undefined)){ optionsRule.max = value.max; } else {}
					if((value.email !== undefined)){ optionsRule.email = value.email; } else {}
					if((value.minlength !== undefined)){ optionsRule.minlength = value.minlength; } else {}
					if((value.maxlength !== undefined)){ optionsRule.maxlength = value.maxlength; } else {}
					if((value.rangelength !== undefined)){ optionsRule.rangelength = value.rangelength; } else {}
					if((value.range !== undefined)){ optionsRule.range = value.range; } else {}
					if((value.step !== undefined)){ optionsRule.step = value.step; } else {}
					if((value.date !== undefined)){ optionsRule.date = value.date; } else {}
					if((value.dateISO !== undefined)){ optionsRule.dateISO = value.dateISO; } else {}
					if((value.url !== undefined)){ optionsRule.url = value.url; } else {}
					if((value.number !== undefined)){ optionsRule.number = value.number; } else {}
					if((value.digits !== undefined)){ optionsRule.digits = value.digits; } else {}
					if((value.equalTo !== undefined)){ optionsRule.equalTo = value.equalTo; } else {}
					
					// for (const [kValue, vValue] of Object.entries(value)) {};
					
					optionsInput.name = key;
					if(value.label !== undefined){ optionsInput.label = value.label; } else { optionsInput.label = key; }
					if(value.required !== undefined){ optionsInput.required = value.required; } else { optionsInput.required = false; }
					if(value.readonly !== undefined){ optionsInput.readonly = value.readonly; } else { optionsInput.readonly = false; }
					if(value.disabled !== undefined){ optionsInput.disabled = value.disabled; } else { optionsInput.disabled = false; }
					if(value.value !== undefined){
						optionsInput.value = value.value;
						self.record[key] = value.value;
					} else {
						optionsInput.value = null;
						self.record[key] = null;
					}
					
					if((value.typeInput != undefined)){
						switch(value.typeInput){
							case 'text':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'text';
							break;
							case 'email':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'email';
							break;
							case 'textarea':
								self.record[key] = '';
								optionsInput.tag = 'textarea';
							break;
							case 'date':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'date';
							break;
							case 'dateISO':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'dateISO';
							break;
							case 'datetime':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'datetime';
							break;
							case 'datetime-local':
								self.record[key] = '';
								optionsInput.tag = 'input';
								optionsInput.type = 'datetime-local';
							break;
							case 'number':
								self.record[key] = 0;
								optionsInput.tag = 'input';
								optionsInput.type = 'number';
							break;
							case 'select':
								self.record[key] = 0;
								optionsInput.tag = 'select';
								if((value.options != undefined)){
									if(self.options[value.options] != undefined){
										optionsInput.options = self.options[value.options];
									}
								}
							break;
							default:
								self.record[key] = null;
							break;
						}
						
					} else {
						self.record[key] = null;
						optionsInput.tag = 'none';
					}
					optionsInput.title = value.label;
					
					self.inputs.push(optionsInput);
					self.rules[key] = optionsRule;
				}
			} else {
				console.log('options_form no definido.');
			}
			
			self.getValidatorForm();
		},
	},
	computed: {
	},
});

var AddPQRsPeticion = Vue.extend({
	template: '#create-PQRs-Peticion',
	data: function () {
		return {
			thisForm: {
				titulo: 'PQRs - Nueva Petición',
				tabla: "pqrs",
				fields: {
					type: {
						show: false,
						label: "Tipo de PQRs",
						required: true,
						typeInput: "number",
						min: 0,
						value: 1
					},
					name: {
						label: "Nombres o Razon social",
						required: true,
						typeInput: "text"
					},
					surname: {
						label: "Apellidos",
						required: true,
						typeInput: "text"
					},
					department: {
						label: "Departamento",
						required: true,
						typeInput: "select",
						options: "geo_departments"
					},
					city: {
						label: "Ciudad",
						required: true,
						typeInput: "select",
						options: "geo_citys"
					},
					identification_type: {
						label: "Tipo de Identificacion",
						required: true,
						typeInput: "select",
						options: "types_identifications"
					},
					identification_number: {
						label: "Numero de Identificacion",
						required: true,
						typeInput: "text"
					},
					email: {
						label: "Correo electronico",
						required: true,
						typeInput: "email"
					},
					phone: {
						label: "Teléfono Fijo",
						required: true,
						typeInput: "text"
					},
					mobile: {
						label: "Teléfono Móvil",
						required: true,
						typeInput: "text"
					},
					address: {
						label: "Dirección",
						required: true,
						typeInput: "textarea"
					},
					event_occurred: {
						label: "Hechos del evento",
						required: true,
						typeInput: "textarea"
					},
					event_date: {
						label: "Fecha del evento",
						required: true,
						typeInput: "date"
					},
					petition: {
						label: "Peticion",
						required: true,
						typeInput: "textarea"
					},
				},
				submitEvent(){
					
				}
			}
		};
	},
	
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: AddPQRsPeticion, name: 'AddPQRs-Peticion', params: { subject: 'pqrs' } },
	]
});

var app = new Vue({
	router: router,
	components: {
		'forms-create-dynamic': FormsCreateDynamic,
	},
}).$mount('#app');
</script>
 
</div>
