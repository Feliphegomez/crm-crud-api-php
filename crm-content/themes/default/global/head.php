    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>CMS  | </title>
    <!-- Bootstrap -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">	
    <!-- bootstrap-progressbar -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo $this->urlNav; ?>/assets/build/css/custom.min.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- Ion.RangeSlider -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/normalize-css/normalize.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Bootstrap Colorpicker -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/cropper/dist/cropper.min.css" rel="stylesheet">	
    <!-- Datatables -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">	
    <!-- FullCalendar -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo $this->urlNav; ?>/assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.2/vue-router.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.js"></script>
	
	<script>
		function zfill(number, width) {
			var numberOutput = Math.abs(number);
			var length = number.toString().length;
			var zero = "0";
			if (width <= length) {
				if (number < 0) { return ("-" + numberOutput.toString()); } 
				else { return numberOutput.toString(); }
			} else {
				if (number < 0) { return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); } 
				else { return ((zero.repeat(width - length)) + numberOutput.toString()); }
			}
		};
		
		function formatMoney(n, c, d, t){
			var c = isNaN(c = Math.abs(c)) ? 2 : c,
				d = d == undefined ? "." : d,
				t = t == undefined ? "," : t,
				s = n < 0 ? "-" : "",
				i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
				j = (j = i.length) > 3 ? j % 3 : 0;
			return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
		};
	
		var api = axios.create({
			baseURL: '/',
			withCredentials: true,
			headers: {
				'X-CORE': 'api'
			}
		});
		api.interceptors.response.use(function (response) {
		  if (response.headers['<?php echo API_xsrf_headerName; ?>']) {
			document.cookie = '<?php echo API_xsrf_cookieName; ?>=' + response.headers['<?php echo API_xsrf_headerName; ?>'] + '; path=/';
			console.log('Cookie');
			console.log(document.cookie);
		  }
		  return response;
		});

		var util = {
		  methods: {
			resolve: function (path, obj) {
			  return path.reduce(function(prev, curr) {
				return prev ? prev[curr] : undefined
			  }, obj || this);
			},
			getDisplayColumn: function (columns) {
			  var index = -1;
			  var names = ['name', 'title', 'description', 'username'];
			  for (var i in names) {
				index = columns.indexOf(names[i]);
				if (index >= 0) {
				  return names[i];
				}
			  }
			  return columns[0];
			},
			getPrimaryKey: function (properties) {
			  for (var key in properties) {
				if (properties[key]['x-primary-key']) {
				  return key;
				}
			  }
			  return false;
			},
			getReferenced: function (properties) {
			  var referenced = [];
			  for (var key in properties) {
				if (properties[key]['x-referenced']) {
				  for (var i = 0; i < properties[key]['x-referenced'].length; i++) {
					referenced.push(properties[key]['x-referenced'][i].split('.'));
				  }
				}
			  }
			  return referenced;
			},
			getReferences: function (properties) {
			  var references = {};
			  for (var key in properties) {
				if (properties[key]['x-references']) {
				  references[key] = properties[key]['x-references'];
				} else {
				  references[key] = false; 
				}
			  }
			  return references;
			},
			getProperties: function (action, subject, definition) {
			  if (action == 'list') {
				path = ['components', 'schemas', action + '-' + subject, 'properties', 'records', 'items', 'properties'];
			  } else {
				path = ['components', 'schemas', action + '-' + subject, 'properties'];
			  }
			  return this.resolve(path, definition);
			}
		  }
		};
		var orm = {
		  methods: {
			readRecord: function () {
			  this.id = this.$route.params.id;
			  this.subject = this.$route.params.subject;
			  this.record = null;
			  var self = this;
			  api.get('/records/' + this.subject + '/' + this.id).then(function (response) {
				self.record = response.data;
			  }).catch(function (error) {
				console.log(error);console.log(error.response);
			  });
			},
			readRecords: function () {
			  this.subject = this.$route.params.subject;
			  this.records = null;
			  var url = '/records/' + this.subject;
			  var params = [];
			  for (var i=0;i<this.join.length;i++) {
				params.push('join='+this.join[i]);
			  }        
			  if (this.field) {
				params.push('filter='+this.field+',eq,'+this.id);
			  }        
			  if (params.length>0) {
				url += '?'+params.join('&');
			  }
			  var self = this;
			  api.get(url).then(function (response) {
				self.records = response.data.records;
			  }).catch(function (error) {
				console.log(error);console.log(error.response);
			  });
			},
			readOptions: function() {
			  this.options = {};
			  var self = this;
			  for (var key in this.references) {
				var subject = this.references[key];
				if (subject !== false) {
				  var properties = this.getProperties('list', subject, this.definition);
				  var displayColumn = this.getDisplayColumn(Object.keys(properties));
				  var primaryKey = this.getPrimaryKey(properties);
				  api.get('/records/' + subject + '?include=' + primaryKey + ',' + displayColumn).then(function (subject, primaryKey, displayColumn, response) {
					self.options[subject] = response.data.records.map(function (record) {
					  return {key: record[primaryKey], value: record[displayColumn]};
					});
					self.$forceUpdate();
				  }.bind(null, subject, primaryKey, displayColumn)).catch(function (error) {
					console.log(error);console.log(error.response);
				  });
				}
			  }
			},
			updateRecord: function () {
			  api.put('/records/' + this.subject + '/' + this.id, this.record).then(function (response) {
				console.log(response.data);
			  }).catch(function (error) {
				console.log(error);console.log(error.response);
			  });
			  router.push({name: 'List', params: {subject: this.subject}});
			},
			initRecord: function () {
			  this.record = {};
			  for (var key in this.properties) {
				if (!this.properties[key]['x-primary-key']) {
				  if (this.properties[key].default) {
					this.record[key] = this.properties[key].default;
				  } else {
					this.record[key] = '';
				  }
				}
			  }
			},
			createRecord: function() {
			  var self = this;
			  api.post('/records/' + this.subject, this.record).then(function (response) {
				self.record.id = response.data;
			  }).catch(function (error) {
				console.log(error);console.log(error.response);
			  });
			  router.push({name: 'List', params: {subject: this.subject}});
			},
			deleteRecord: function () {
			  api.delete('/records/' + this.subject + '/' + this.id).then(function (response) {
				console.log(response.data);
			  }).catch(function (error) {
				console.log(error);console.log(error.response);
			  });
			  router.push({name: 'List', params: {subject: this.subject}});
			}
		  }
		};
	</script>
		
	<!-- FOOTER FROM -->
    <!-- jQuery -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.saturated.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.browser.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.drawSeries.js"></script> -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.errorbars.js"></script>
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.uiConstants.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.logaxis.js"></script> -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.symbol.js"></script>
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.flatdata.js"></script> -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.navigate.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.fillbetween.js"></script>
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.touchNavigate.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.hover.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.touch.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.axislabels.js"></script> -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.selection.js"></script>
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.composeImages.js"></script> -->
    <!-- // <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.legend.js"></script> -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/Flot/jquery.flot.categories.js"></script>
	
    <!-- Flot plugins -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Ion.RangeSlider -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <!-- Bootstrap Colorpicker -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- jquery.inputmask -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <!-- jQuery Knob -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery-knob/dist/jquery.knob.min.js"></script>
    <!-- Cropper -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/cropper/dist/cropper.min.js"></script>
    <!-- validator -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/validator/validator.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery-validation/jquery.validate.js"></script>
	<script src="<?php echo $this->urlNav; ?>/assets/vendors/bootbox/bootbox.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootbox/bootbox.locales.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/fullcalendar/dist/fullcalendar.min.js"></script>
	
    <!-- jQuery Sparklines -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- morris.js -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/raphael/raphael.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/google-code-prettify/src/prettify.js"></script>

    <!-- jQuery Smart Wizard -->
    <script src="<?php echo $this->urlNav; ?>/assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
	<script>
		Date.prototype.toMysqlFormat = function() {
			function twoDigits(d) {
				if(0 <= d && d < 10) return "0" + d.toString();
				if(-10 < d && d < 0) return "-0" + (-1*d).toString();
				return d.toString();
			}
			return this.getUTCFullYear() + "-" + twoDigits(1 + this.getUTCMonth()) + "-" + twoDigits(this.getUTCDate()) + " " + twoDigits(this.getUTCHours()) + ":" + twoDigits(this.getUTCMinutes()) + ":" + twoDigits(this.getUTCSeconds());
		};
	</script>