<?php
?>
<div class="" id="app">
	<router-view></router-view>
</div>

<template id="PQRSF-dashboard">
	<div>
		<div class="" id="">
			<div class="row top_tiles" style="margin: 10px 0;">
				<div class="col-md-3 col-sm-3 col-xs-6 tile">
					<span>PQRSF</span>
					<h2>{{ count.total }}</h2>
					<div id="graph_bar_total" style="width:100%; height:200px;"></div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 tile">
					<span>Resueltas</span>
					<h2>{{ count.resolved }}</h2>
					<div id="graph_bar_resolved" style="width:100%; height:200px;"></div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 tile">
					<span>En Gestión</span>
					<h2>{{ count.pending }}</h2>
					<div id="graph_bar_pending" style="width:100%; height:200px;"></div>
				</div>
				<div class="col-md-3 col-sm-3 col-xs-6 tile">
					<span>Total Sessions</span>
					<h2>231,809</h2>
					<span class="sparkline_pqrsf_total" style="height: 160px;">
						<canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					</span>
				</div>
			</div>
			<div class="row top_tiles" style="margin: 10px 0;">
				<div class="col-md-4 col-sm-4 col-xs-4 tile">
					<span>PQRSF</span>
					<h2>{{ count.total }}</h2>
					<div id="graph_bar_total_status" style="width:100%; height:200px;"></div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 tile">
					<span>Resueltas</span>
					<h2>{{ count.resolved }}</h2>
					<div id="graph_bar_resolved_status" style="width:100%; height:200px;"></div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-4 tile">
					<span>En Gestión</span>
					<h2>{{ count.pending }}</h2>
					<div id="graph_bar_pending_status" style="width:100%; height:200px;"></div>
				</div>
			</div>
		<br />
			<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="dashboard_graph x_panel">
				  <div class="row x_title">
					<div class="col-md-6">
					  <h3>Actividades de PQRSF <small>Graph title sub-title</small></h3>
					</div>
					<div class="col-md-6">
					  <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
						<i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
						<span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
					  </div>
					</div>
				  </div>
				  <div class="x_content">
					<div class="demo-container" style="height:250px">
					  <div id="chart_plot_03_total" class="demo-placeholder"></div>
					</div>
				  </div>
				</div>
			  </div>
			</div>

			<div class="row">
			  <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="x_panel fixed_height_320">
				  <div class="x_title">
					<h2>App Devices <small>Sessions</small></h2>
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
					<h4>App Versions</h4>
					<div class="widget_summary">
					  <div class="w_left w_25">
						<span>1.5.2</span>
					  </div>
					  <div class="w_center w_55">
						<div class="progress">
						  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
							<span class="sr-only">60% Complete</span>
						  </div>
						</div>
					  </div>
					  <div class="w_right w_20">
						<span>123k</span>
					  </div>
					  <div class="clearfix"></div>
					</div>

					<div class="widget_summary">
					  <div class="w_left w_25">
						<span>1.5.3</span>
					  </div>
					  <div class="w_center w_55">
						<div class="progress">
						  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
							<span class="sr-only">60% Complete</span>
						  </div>
						</div>
					  </div>
					  <div class="w_right w_20">
						<span>53k</span>
					  </div>
					  <div class="clearfix"></div>
					</div>
					<div class="widget_summary">
					  <div class="w_left w_25">
						<span>1.5.4</span>
					  </div>
					  <div class="w_center w_55">
						<div class="progress">
						  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
							<span class="sr-only">60% Complete</span>
						  </div>
						</div>
					  </div>
					  <div class="w_right w_20">
						<span>23k</span>
					  </div>
					  <div class="clearfix"></div>
					</div>
					<div class="widget_summary">
					  <div class="w_left w_25">
						<span>1.5.5</span>
					  </div>
					  <div class="w_center w_55">
						<div class="progress">
						  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
							<span class="sr-only">60% Complete</span>
						  </div>
						</div>
					  </div>
					  <div class="w_right w_20">
						<span>3k</span>
					  </div>
					  <div class="clearfix"></div>
					</div>
					<div class="widget_summary">
					  <div class="w_left w_25">
						<span>0.1.5.6</span>
					  </div>
					  <div class="w_center w_55">
						<div class="progress">
						  <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
							<span class="sr-only">60% Complete</span>
						  </div>
						</div>
					  </div>
					  <div class="w_right w_20">
						<span>1k</span>
					  </div>
					  <div class="clearfix"></div>
					</div>

				  </div>
				</div>
			  </div>

			  <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="x_panel fixed_height_320">
				  <div class="x_title">
					<h2>Daily users <small>Sessions</small></h2>
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
				  <table class="" style="width:100%">
					<tr>
					  <th style="width:37%;">
						<p>Top 5</p>
					  </th>
					  <th>
						<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
						  <p class="">Device</p>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
						  <p class="">Progress</p>
						</div>
					  </th>
					</tr>
					<tr>
					  <td>
						<canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
					  </td>
					  <td>
						<table class="tile_info">
						  <tr>
							<td>
							  <p><i class="fa fa-square blue"></i>IOS </p>
							</td>
							<td>30%</td>
						  </tr>
						  <tr>
							<td>
							  <p><i class="fa fa-square green"></i>Android </p>
							</td>
							<td>10%</td>
						  </tr>
						  <tr>
							<td>
							  <p><i class="fa fa-square purple"></i>Blackberry </p>
							</td>
							<td>20%</td>
						  </tr>
						  <tr>
							<td>
							  <p><i class="fa fa-square aero"></i>Symbian </p>
							</td>
							<td>15%</td>
						  </tr>
						  <tr>
							<td>
							  <p><i class="fa fa-square red"></i>Others </p>
							</td>
							<td>30%</td>
						  </tr>
						</table>
					  </td>
					</tr>
				  </table>
				  </div>
				</div>
			  </div>

			  <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="x_panel fixed_height_320">
				  <div class="x_title">
					<h2>Profile Settings <small>Sessions</small></h2>
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
					<div class="dashboard-widget-content">
					  <ul class="quick-list">
						<li><i class="fa fa-line-chart"></i><a href="#">Achievements</a></li>
						<li><i class="fa fa-thumbs-up"></i><a href="#">Favorites</a></li>
						<li><i class="fa fa-calendar-o"></i><a href="#">Activities</a></li>
						<li><i class="fa fa-cog"></i><a href="#">Settings</a></li>
						<li><i class="fa fa-area-chart"></i><a href="#">Logout</a></li>
					  </ul>

					  <div class="sidebar-widget">
						<h4>Profile Completion</h4>
						<canvas width="150" height="80" id="chart_gauge_01" class="" style="width: 160px; height: 100px;"></canvas>
						<div class="goal-wrapper">
						  <span id="gauge-text" class="gauge-value gauge-chart pull-left">0</span>
						  <span class="gauge-value pull-left">%</span>
						  <span id="goal-text" class="goal-value pull-right">100%</span>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>

			  <div class="col-md-4 col-sm-6 col-xs-12 widget_tally_box">
				<div class="x_panel">
				  <div class="x_title">
					<h2>User Uptake</h2>
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

					<div id="graph_bar" style="width:100%; height:200px;"></div>

					<div class="col-xs-12 bg-white progress_summary">

					  <div class="row">
						<div class="progress_title">
						  <span class="left">Escudor Wireless 1.0</span>
						  <span class="right">This sis</span>
						  <div class="clearfix"></div>
						</div>

						<div class="col-xs-2">
						  <span>SSD</span>
						</div>
						<div class="col-xs-8">
						  <div class="progress progress_sm">
							<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="89"></div>
						  </div>
						</div>
						<div class="col-xs-2 more_info">
						  <span>89%</span>
						</div>
					  </div>
					  <div class="row">
						<div class="progress_title">
						  <span class="left">Mobile Access</span>
						  <span class="right">Smart Phone</span>
						  <div class="clearfix"></div>
						</div>

						<div class="col-xs-2">
						  <span>App</span>
						</div>
						<div class="col-xs-8">
						  <div class="progress progress_sm">
							<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="79"></div>
						  </div>
						</div>
						<div class="col-xs-2 more_info">
						  <span>79%</span>
						</div>
					  </div>
					  <div class="row">
						<div class="progress_title">
						  <span class="left">WAN access users</span>
						  <span class="right">Total 69%</span>
						  <div class="clearfix"></div>
						</div>

						<div class="col-xs-2">
						  <span>Usr</span>
						</div>
						<div class="col-xs-8">
						  <div class="progress progress_sm">
							<div class="progress-bar bg-green" role="progressbar" data-transitiongoal="69"></div>
						  </div>
						</div>
						<div class="col-xs-2 more_info">
						  <span>69%</span>
						</div>
					  </div>

					</div>
				  </div>
				</div>
			  </div>

			  <!-- start of weather widget -->
			  <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Today's Weather <small>Sessions</small></h2>
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
					  <div class="col-sm-12">
						<div class="temperature"><b>Monday</b>, 07:30 AM
						  <span>F</span>
						  <span><b>C</b>
										  </span>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-4">
						<div class="weather-icon">
						  <span>
											  <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
										  </span>

						</div>
					  </div>
					  <div class="col-sm-8">
						<div class="weather-text">
						  <h2>Texas
											  <br><i>Partly Cloudy Day</i>
										  </h2>
						</div>
					  </div>
					</div>
					<div class="col-sm-12">
					  <div class="weather-text pull-right">
						<h3 class="degrees">23</h3>
					  </div>
					</div>
					<div class="clearfix"></div>


					<div class="row weather-days">
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Mon</h2>
						  <h3 class="degrees">25</h3>
						  <span>
												  <canvas id="clear-day" width="32" height="32">
												  </canvas>

										  </span>
						  <h5>15
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Tue</h2>
						  <h3 class="degrees">25</h3>
						  <canvas height="32" width="32" id="rain"></canvas>
						  <h5>12
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Wed</h2>
						  <h3 class="degrees">27</h3>
						  <canvas height="32" width="32" id="snow"></canvas>
						  <h5>14
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Thu</h2>
						  <h3 class="degrees">28</h3>
						  <canvas height="32" width="32" id="sleet"></canvas>
						  <h5>15
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Fri</h2>
						  <h3 class="degrees">28</h3>
						  <canvas height="32" width="32" id="wind"></canvas>
						  <h5>11
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="col-sm-2">
						<div class="daily-weather">
						  <h2 class="day">Sat</h2>
						  <h3 class="degrees">26</h3>
						  <canvas height="32" width="32" id="cloudy"></canvas>
						  <h5>10
											  <i>km/h</i>
										  </h5>
						</div>
					  </div>
					  <div class="clearfix"></div>
					</div>
				  </div>
				</div>

			  </div>
			  <!-- end of weather widget -->

			  <div class="col-md-4 col-sm-6 col-xs-12">
				<div class="x_panel fixed_height_320">
				  <div class="x_title">
					<h2>Incomes <small>Sessions</small></h2>
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
					<div class="dashboard-widget-content">
					  <ul class="quick-list">
						<li><i class="fa fa-bars"></i><a href="#">Subscription</a></li>
						<li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
						<li><i class="fa fa-support"></i><a href="#">Help Desk</a> </li>
						<li><i class="fa fa-heart"></i><a href="#">Donations</a> </li>
					  </ul>

					  <div class="sidebar-widget">
						<h4>Goal</h4>
						<canvas width="150" height="80" id="chart_gauge_02" class="" style="width: 160px; height: 100px;"></canvas>
						<div class="goal-wrapper">
						  <span class="gauge-value pull-left">$</span>
						  <span id="gauge-text2" class="gauge-value pull-left">3,200</span>
						  <span id="goal-text2" class="goal-value pull-right">$5,000</span>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	</div>
</template>

<script>
var PQRSF_Dashboard = Vue.extend({
	template: '#PQRSF-dashboard',
	data: function () {
		return {
			records: {
				total: [],
				resolved: [],
				pending: [],
			},
			count: {
				total: 0,
				resolved: 0,
				pending: 0,
			},
		};
	},
	created(){
		var self = this;
		self.getPQRs();
	},
	methods: {
		zfill: zfill,
		validateResult(r){
			var self = this;
			self.records.total = [];
			self.records.resolved = [];
			self.records.pending = [];
			self.count.total = 0;
			self.count.resolved = 0;
			self.count.pending = 0;
			
			if (r.data != undefined && r.data.records != undefined){
				r.data.records.forEach(a => {
					if(a.id != undefined && a.id > 0){
						self.count.total++;
						self.records.total.push(a);
						
						if(a.close == 1) {
							self.count.resolved++;
							self.records.resolved.push(a);
						} else {
							self.count.pending++;
							self.records.pending.push(a);
						};
					}
				});
			} else {
				 console.log('Error: consulta'); 
				 console.log(r.data); 
			}
			
			self.getPlugins();
		},
		getCounts(){
			var self = this;
			
			/* Total */
			Morris.Bar({
			  element: 'graph_bar_total',
			  data: self.countCategories(self.records.total),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});
			Morris.Bar({
			  element: 'graph_bar_total_status',
			  data: self.countStatus(self.records.total),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});
			/* Pendientes */
			Morris.Bar({
			  element: 'graph_bar_pending',
			  data: self.countCategories(self.records.pending),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});
			Morris.Bar({
			  element: 'graph_bar_pending_status',
			  data: self.countStatus(self.records.pending),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});
			/* Resueltas */
			Morris.Bar({
			  element: 'graph_bar_resolved',
			  data: self.countCategories(self.records.resolved),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});
			Morris.Bar({
			  element: 'graph_bar_resolved_status',
			  data: self.countStatus(self.records.resolved),
			  xkey: "name",
			  ykeys: ['count'],
			  labels: ['PQRSF'],
			  barRatio: 1,
			  barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
			  xLabelAngle: 35,
			  hideHover: 'auto',
			  resize: true
			});

		},
		countCategories(data){
			var self = this;
			a = [];
			data.forEach(b => {
				if(a[b.type.name] == undefined){
					a[b.type.name] = {
						"name": b.type.name,
						"records": [],
						"count": 1
					}
				}else{
					a[b.type.name].count++;
				}
				a[b.type.name].records.push(b);
			});
			c = [];
			for (const [index, item] of Object.entries(a)) {
				c.push({
					"name": item.name,
					"count": item.count,
					"records": item.records,
				});
			}
			if(c.length == 0){
				c = [{name: 'Sin informacion', count: 0, records: [] }];
			}
			return c;
		},
		countStatus(data){
			var self = this;
			a = [];
			data.forEach(b => {
				if(a[b.status.name] == undefined){
					a[b.status.name] = {
						"name": b.status.name,
						"records": [],
						"count": 1
					}
				}else{
					a[b.status.name].count++;
				}
				a[b.status.name].records.push(b);
			});
			c = [];
			for (const [index, item] of Object.entries(a)) {
				c.push({
					"name": item.name,
					"count": item.count,
					"records": item.records,
				});
			}
			if(c.length == 0){
				c = [{name: 'Sin informacion', count: 0, records: [] }];
			}
			return c;
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
		extraerFecha(datetime){
			var fecha = new Date(datetime);
			dia  = fecha.getDate(); 
			mes  = fecha.getMonth();
			anio = fecha.getFullYear();
			//return String(anio + '-' + mes + "-" + dia);
			/* Con labels */
			meses = [
				'Enero',
				'Febrero',
				'Marzo',
				'Abril',
				'Mayo',
				'Junio',
				'Julio',
				'Agosto',
				'Septiembre',
				'Octubre',
				'Noviembre',
				'Diciembre',
			];
			return String(meses[mes] + ' ' + dia);
		},
		countDays(data){
			var self = this;
			a = [];
			data.forEach(b => {
				if(b.created != undefined){
					var label = self.extraerFecha(b.created);
					if(a[label] == undefined){
						a[label] = {
							"name": label,
							"records": [],
							"count": 1
						};
					}else{
						a[label].count++;
					}
					a[label].records.push(b);
				}
			});
			c = [];
			for (const [index, item] of Object.entries(a)) {
				i = [ item.name, item.count ];
				console.log(i)
				c.push(i);
			}
			if(c.length == 0){
				c = [ [ "Sin informacion", 0 ] ];
			}
			return c;
		},
		getPlugins(){
			var self = this;
			dataArrayD = [2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 5, 6, 4, 5, 6, 3, 5, 4, 5, 4, 5, 4, 3, 4, 5, 6, 7, 5, 4, 3, 5, 6];
			
			jQuery(".sparkline_pqrsf_total").sparkline(dataArrayD, {
				type: 'bar',
				height: '125',
				barWidth: 13,
				colorMap: {
					'7': '#a1a1a1'
				},
				barSpacing: 2,
				barColor: '#26B99A'
			});
			self.getCounts();
			
			jQuery.plot("#chart_plot_03_total", [ self.countDays(self.records.total) ], {
				series: {
					bars: {
						show: true,
						barWidth: 0.6,
						align: "center"
					}
				},
				xaxis: {
					mode: "categories",
					showTicks: false,
					gridLines: false
				}
			});
		},
		getPQRs(){
			var self = this;
			api.get('/records/pqrs', {
				params: {
					core: 'api',
					filter: [
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
			.then(r => { self.validateResult(r); })
			.catch(e => { self.validateResult(e.response); });
		},
		
	}
});

var router = new VueRouter({
	linkActiveClass: 'active',
	routes:[
		{ path: '/', component: PQRSF_Dashboard, name: 'PQRSF-Dashboard', params: { subject: 'pqrs' } },
	]
});

var app = new Vue({
	router: router,
	components: {
		
	},
}).$mount('#app');
</script>