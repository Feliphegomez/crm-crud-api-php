<?php 

?>
<div class="" id="app">
	<router-view></router-view>
</div>

<template id="create-PQRs-Peticion">
	<div>
		<forms-create-dynamic :options_form="thisForm"></forms-create-dynamic>
	</div>
</template>

<script>
var AddPQRsPeticion = Vue.extend({
	template: '#create-PQRs-Peticion',
	data: function () {
		return {
			thisForm: {
				titulo: 'PQRs',
				subtitulo: 'Nueva Petición',
				descripcion: 'Esta información se enviara al departamento <code>Asistencia Juridica</code> y serán ellos los encargados de continuar su  <a href="#">proceso</a>',
				action: "create",
				tabla: "pqrs",
				fields: {
					spanTitle001: {
						label: "Informacion del Peticionario",
						typeInput: "section",
					},
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
					spanTitle002: {
						label: "Relacion de los hechos",
						typeInput: "section",
					},
					event_occurred: {
						label: "Relacion de los Hechos",
						required: true,
						typeInput: "textarea",
						valueDataDynamic: {
							fields: {
								"lugar": {
									label: "Lugar de los hechos",
									required: true,
									typeInput: "text"
								},
								"direccion": {
									label: "Dirección de los hechos",
									required: true,
									typeInput: "textarea",
								},
								"daño": {
									label: "Daño causado",
									required: true,
									typeInput: "textarea"
								},
								"masinfo": {
									label: "Información Adicional",
									required: true,
									typeInput: "textarea"
								}
							},
							result: [
								[
									"Lugar de los hechos: ",
									"lugar",
									'\n'
								],
								[
									"Dirección de los hechos: ",
									"direccion",
									'\n'
								],
								[
									"Daño causado: ",
									"daño",
									'\n'
								],
								[
									"Información Adicional: ",
									"masinfo",
								]
							]
						},
					},
					event_date: {
						label: "Fecha y Hora de los hechos",
						required: true,
						typeInput: "datetime",
						valueDataDynamic: {
							fields: {
								"fecha": {
									label: "Fecha de los hechos",
									required: true,
									typeInput: "date"
								},
								"hora": {
									label: "Hora de los hechos",
									required: true,
									typeInput: "time"
								}
							},
							result: [ [ "fecha", " ", "hora" ] ]
						},
					},
					spanTitle003: {
						label: "Peticion",
						typeInput: "section",
					},
					petition: {
						label: "Peticion",
						required: true,
						typeInput: "textarea"
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
 