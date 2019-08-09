<?php
	$idtype = (!isset($_GET['type'])) ? 0 : $_GET['type'];
?>

<div class="col-md-12 col-sm-12 col-xs-12" id="PQRS-List">
	<div class="x_panel">
	  <div class="x_title">
		<h2>PQRSF <small>{{ typeName }} ({{ count }})</small></h2>
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
	  <div class="x_content table-responsive">
		<p class="text-muted font-13 m-b-30">
		  The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
		</p>
		<table id="datatable-buttons" class="table table-striped table-bordered">
		  <thead>
			<tr>
			  <th>ID</th>
			  <th>Radicado</th>
			  <th>Tipo de PQRSF</th>
			  <th>Estado Actual</th>
			  <th>F. Creacion</th>
			  <th>¿Cerrada?</th>
			  <th>Mas Info</th>
			</tr>
		  </thead>

		  <tbody>
		  </tbody>
		</table>
	  </div>
	</div>
</div>



<script>
var PQRSFList = new Vue({
	data(){
		return {
			typeId: <?php echo $idtype; ?>,
			typeName: '',
			count: 0,
			records: []
		};
	},
	created(){
		var self = this;
		self.loadType();
	},
	methods: {
		zfill: zfill,
		loadType(){
			var self = this;
			api.get('/records/pqrs_types/' + self.typeId, {
				params: {
				}
			})
			.then(response => {
				self.validateResultType(response);
			})
			.catch(e => {
				// Capturamos los errores
				self.validateResultType(e.response);
			});
		},
		validateResultType(r){
			var self = this;
			if (r.data != undefined && r.data.id != undefined){
				self.typeId = r.data.id;
				self.typeName = r.data.name;
				self.count = self.records.length;
				self.load();
			} else {
				 console.log('Error: consulta'); 
				 console.log(r.data); 
			}
		},
		load(){
			var self = this;
			api.get('/records/pqrs', {
				params: {
					filter: [
						'type,eq,' + self.typeId,
					],
					join: [
						'types_identifications',
						'geo_departments',
						'geo_citys',
						'pqrs_status',
						'pqrs_types',
					]
				}
			})
			.then(response => {
				self.validateResult(response);
			})
			.catch(e => {
				// Capturamos los errores
				self.validateResult(e.response);
			});
		},
		getLinkPQRSF(pqrs){
			var self = this;
			action = '';
			pqrs.id = (pqrs.id != undefined && pqrs.id > 0) ? pqrs.id : 0;
			typeId = (pqrs.type.id != undefined && pqrs.type.id > 0) ? pqrs.type.id : ((pqrs.type != undefined && pqrs.type > 0) ? pqrs.type : 0);
			return '/index.php?controller=PQRSF&action=ver_pqrsf&type=' + typeId + '&id=' + pqrs.id;
		},
		getLinkPQRSF_Edit(pqrs){
			var self = this;
			action = '';
			pqrs.id = (pqrs.id != undefined && pqrs.id > 0) ? pqrs.id : 0;
			typeId = (pqrs.type.id != undefined && pqrs.type.id > 0) ? pqrs.type.id : ((pqrs.type != undefined && pqrs.type > 0) ? pqrs.type : 0);
			return '/index.php?controller=PQRSF&action=gestionar_pqrsf&type=' + typeId + '&id=' + pqrs.id;
		},
		validateResult(r){
			var self = this;
			if (r.data != undefined && r.data.records != undefined){
				// self.records = r.data.records;
				self.count = self.records.length;
				if(r.data.records[0]){
					if ($("#datatable-buttons").length) {
						t = $('#datatable-buttons').DataTable();
						r.data.records.forEach(function(a){
							console.log(a);
							a.event_occurred = a.event_occurred.replace(/(?:\r\n|\r|\n)/g, '<br>');
							a.petition = a.petition.replace(/(?:\r\n|\r|\n)/g, '<br>');
							
							
							recordId = '';
							recordDateText = '';
							radSeparate = a.created.split(" ");
							if(radSeparate[0] != undefined){
								radFecha = radSeparate[0].split("-");
								if(radFecha.length === 3){
									recordId = radFecha[0] + radFecha[1] + radFecha[2] + self.zfill(a.id, 5);
									recordDateText = radFecha[0] + radFecha[1] + radFecha[2];
								}
							}
							
							icon = (a.close === 1) ? '<i class="fa fa-check"></i>' : '<i class="fa fa-times"></i>';
							more = 'Razón Social o Nombre: ' + a.name + '<br>';
							more += 'Apellidos: ' + a.surname + '<br>';
							more += '#. Identificación: ' + a.identification_type.code + '. ' + a.identification_number + '<br>';
							more += 'Cerrada: ' + icon + '<br>';
							
							actions = '';
							actions += (a.close === 0) ? '<a class="btn btn-sm btn-default" href="' + self.getLinkPQRSF(a) + '"><i class="fa fa-eye"></i>' : '';
							actions += (a.close === 0) ? '<a class="btn btn-sm btn-default" href="' + self.getLinkPQRSF_Edit(a) + '"><i class="fa fa-pencil"></i>' : '';
							
							console.log(actions);
							
							t.row.add( [
								a.id,
								recordId,
								a.type.name,
								a.status.name,
								a.created,
								actions,
								'<br>' + more
							] ).draw( false );
						});
					  }
				} else {
					self.searchBox.errorText = "Esta queja no fue encontrada";
				}
			} else {
				 console.log('Error: consulta'); 
				 console.log(r.data); 
			}
		},
	},
}).$mount('#PQRS-List');

</script>