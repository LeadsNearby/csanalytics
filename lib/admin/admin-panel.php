<?php
	function csanalytics_panel() {
        $dev_conv_profile = get_option('gapi_dev_conv_profile');
        $payment = get_option('gapi_dev_client_monthly');
        $paymentperlead = get_option('gapi_dev_client_perlead');
        $chats = get_option('gapi_dev_chat');
        //$calls = get_option('gapi_dev_calls');
        $weatherenable = get_option('gapi_weather_enable');
        $weatherapi = get_option('gapi_weather_api');
        $weatherzip = get_option('gapi_weather_zip');
        $fromDate = get_option('gapi_calendar_start');
        $toDate = get_option('gapi_calendar_end');
        $diff = get_option('gapi_calendar_diff');
        $gapi_dev_industry = get_option('gapi_dev_industry');
        $gapi_dev_industry_other = get_option('gapi_dev_industry_other');
        $gapi_lead_appt = get_option('gapi_lead_appt');
        $gapi_appt_sale = get_option('gapi_appt_sale');
        $dev_web_rank_url = get_option('gapi_dev_web_rank_url');
        $dev_keyword_rank = get_option('gapi_dev_keyword_rank');
        $dev_heatmap_page = get_option('gapi_dev_heatmap_page');
        $dev_bl_citations = get_option('gapi_dev_bl_citations');
        $dev_adwords_url = get_option('gapi_dev_adwords_url');
        $dev_bl_reviews = get_option('gapi_dev_bl_reviews');
        $gapi_rep_avg_tix = get_option('gapi_rep_avg_tix'); 
        $gapi_inst_avg_tix = get_option('gapi_inst_avg_tix'); 
        $gapi_rep_percent = get_option('gapi_rep_percent');
        $gapi_inst_percent = get_option('gapi_inst_percent');
        $gapi_primary_dimension = get_option('gapi_primary_dimension');
        $gapi_secondary_dimension = get_option('gapi_secondary_dimension');
		$gapi_adw_primary_dimension = get_option('gapi_adw_primary_dimension');
		$gapi_adw_secondary_dimension = get_option('gapi_adw_secondary_dimension');
		$gapi_speed_primary_dimension = get_option('gapi_speed_primary_dimension');
		$gapi_speed_secondary_dimension = get_option('gapi_speed_secondary_dimension');
		$speed_enable = get_option('gapi_speed_enable');
		$gapi_max_results = get_option('gapi_max_results');
		$gapi_max_results_list = $gapi_max_results ?: '5';
		$gapi_adw_max_results = get_option('gapi_adw_max_results');
		$gapi_adw_max_results_list = $gapi_adw_max_results ?: '3';
		$gapi_speed_max_results = get_option('gapi_speed_max_results');
		$gapi_speed_max_results_list = $gapi_speed_max_results ?: '5';
	?>

	<link  type="text/css" href="//www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet">
    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/pie.js"></script>	
	<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
	<script src="//www.amcharts.com/lib/3/plugins/export/export.js"></script>
	<script src="//www.amcharts.com/lib/3/plugins/export/examples/export.config.default.js"></script>	

	<!-- Include Required Prerequisites -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
	 
	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

	<style>
	/* General Styles */
	.tall {height: 800px; width: 98%; float: none; margin: 0 1%;}
	.float-left {float: left;margin: 5% 0;width: 50%;}
	.col-1-2 {height: 400px;}
	.clear {clear:both;}
	.chart-data {width: 900px; max-width: 100%; height: 400px; position: absolute; top: 0; left: 0; background: rgba(255, 255, 255, 0.9); overflow: auto; border: 2px solid #eee;}	
	body, html {font-family: Verdana; font-size: 12px;}
	#csanalytics-data input[type="text"],#csanalytics-data input[type="password"],#csanalytics-data input[type="checkbox"],#csanalytics-data input[type="color"],#csanalytics-data input[type="date"],#csanalytics-data input[type="datetime"],#csanalytics-data input[type="datetime-local"],#csanalytics-data input[type="email"],#csanalytics-data input[type="month"],#csanalytics-data input[type="number"],#csanalytics-data input[type="radio"],#csanalytics-data input[type="tel"],#csanalytics-data input[type="time"],#csanalytics-data input[type="url"],#csanalytics-data input[type="week"],#csanalytics-data input[type="search"],
	#csanalytics-data textarea {background-color: #fff; border: 1px solid #ddd; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07) inset; color: #32373c; outline: 0 none; transition: border-color 0.05s ease-in-out 0s;}
	#csanalytics-data table {width: 100%;}
	#csanalytics-data table th, table td {text-align: left; padding: 5px 7px;}
	#csanalytics-data table th {background: #E9E9E9; color: #333;}
	#csanalytics-data table td {border: 1px solid #ccc;}
	#csanalytics-data table td.row-title {font-weight: bold;}
	ul{list-style-image:none;list-style:none}
	.csa-select select {padding:3px;margin: 0;-webkit-border-radius:4px;-moz-border-radius:4px;border: 1px solid #ccc !important;border-radius:4px;-webkit-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;-moz-box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;box-shadow: 0 3px 0 #ccc, 0 -1px #fff inset;background: #f8f8f8;color:#888;border:none;outline:none;display: inline-block;-webkit-appearance:none;-moz-appearance:none;appearance:none;cursor:pointer;line-height: 16px;height: 25px;}
	@media screen and (-webkit-min-device-pixel-ratio:0) {.csa-select select {padding-right:18px}}
	.csa-select label {position:relative}
	.csa-select label:after {content:'<>';font:11px "Consolas", monospace;color:#aaa;-webkit-transform:rotate(90deg);-moz-transform:rotate(90deg);-ms-transform:rotate(90deg);transform:rotate(90deg);right:8px; top:2px;padding:0 0 2px;border-bottom:1px solid #ddd;position:absolute;pointer-events:none;}
	.csa-select label:before {content:'';right:6px; top:6px;width:20px; height:18px;background:#f8f8f8;position:absolute;pointer-events:none;display:block;} 
	#csa_business_unit select, #csa_primary_dimension select, #csa_speed_primary_dimension select,#csa_adw_primary_dimension select {min-width: 200px;}
	#analytics-header {background: #333 none repeat scroll 0 0;margin-top:20px;padding: 20px 25px;}
	#analytics-logo {float:left; width:20%}
	#analytics-logo > img {width: 100%;}
	#csa-controls {float:right; width: calc(100% - 20% - 20px)}
	#csa-nav {float: left;margin-top: 10px;}
	#csa-nav > a {color: #ddd;font-size: 13px;padding: 5px;}
	#csa-nav > a span {margin-right:5px}
	#csa-nav > a:hover { color: #0073AA; text-decoration:none;}
	#admin-panel-container {background-color: #333;}
	.tabs .active {width:21px;height:21px;background-position:0 21px !important}
	#panel-links-container{background-color:#333;float:left;padding:10px;width:15%}
	#panel-links-container a{display:block;margin-bottom: 25px;position:relative;transition-duration: 1s;transition-property: border, background, color;transition-timing-function: step-start;}
	#panel-links-container a span {color: #fff;display: inline-block;padding: 2px 0 3px 35px;z-index: 9999;width: 126px;font-size: 14px;}
	#panel-links-container a span:hover, .tabs .active > span {color: #00b9eb !important}
	.dashicons.dashicons-info {position: relative;}	
	.dashicons-info span {background: rgba(0,0,0, 0.85); none repeat scroll 0 0;border-radius: 5px;color: #fff;display: none;font-family: verdana;font-size: 13px;left: 35px;padding: 10px; line-height:125%; position: absolute;top: -18px;width: 250px;z-index: 9999;}
	.dashicons-info:hover span {display:block;}
	.dashicons-info span:after, .dashicons-info span:before {right: 100%;top: 14%;border: solid transparent;content: " ";height: 0;width: 0;position: absolute;pointer-events: none;}
	.dashicons-info span:after {border-right-color: #000;border-width: 10px;margin-top: -10px;}
	.dashicons-info span:before {border-right-color: #000;border-width: 10px;margin-top: -10px;}	
	#panel-links-container .icon {float:none;cursor: pointer;width:21px;height:21px;background-position:0 0px}
	#panel-links-container .icon:hover, #panel-links-container.icon:active, #panel-links-container .selected {width:21px;height:21px;background-position:0 21px}	
	#panel-board-container{background-color:#f9f9f9;border:1px solid #333;float:left;width: calc(100% - 15% - 10px);}
	#panel-board-container h1{font-weight:bold;font-size:20px;}	
	#panel-board-container #search-override {background-color:#333;color:#fff;padding:5px 2% 2%;position:absolute;width:88%;z-index:9999}
	#panel-board-container .board-title-container {border-radius: 0;background-color: #0073AA;color: #fff;padding: 12px;margin: 0 0 10px 0;}
	#panel-board-container .board-name {float: left;width: 50%; color:#fff; margin: 10px 0; position: relative;}
	#panel-board-container .showMoreData {float:right; width:50% color: #fff ;cursor: pointer;font-size: 16px;margin: 10px 0;text-align: right;}
	#panel-board-container .secondary-board-data {display:none}
	.primary-board-data, .secondary-board-data {padding: 0 1% 1%;}	
	.primary-board-data > h2 {font-size: 20px;}	
	.data-name-info {margin:10px 0}
	.data-name-info > h2 {display: inline-block;font-size: 22px;margin:0;}
	.edu-img {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/education.png'); ?>');display: block;float: right;height: 18px;cursor: pointer;width: 25px;}	
	#icon-pin {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/lnb-pin.png'); ?>'); width:60px; height:82px}
	#icon-global {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-global-21px.png'); ?>')}
	#icon-roi {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-roi-21px.png'); ?>')}
	#icon-conversion {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-conversion-21px.png'); ?>')}
	#icon-dni {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-dni-21px.png'); ?>')}
	#icon-visitation {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-visitation-21px.png'); ?>')}
	#icon-visibility {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-visibility-21px.png'); ?>')}
	#icon-citation {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-citations-21px.png'); ?>')}
	#icon-weather {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-weather-21px.png'); ?>')}
    #icon-heatmap {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-heatmap-21px.png'); ?>')}
    #icon-reviews {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-reviews-21px.png'); ?>')}
	#icon-adwords {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-adwords-21px.png'); ?>')}
	#icon-speed {background-image:url('<?php echo plugins_url('/CSAnalytics/lib/admin/images/icon-rocket-21px.png'); ?>')}
	/* ROI Styles */
	.goalcontainer {width: 25%; font-family: "OpenSans-Bold",Helvetica,Arial,sans-serif;}
	.goalcontainer h2 {color: #fff; font-size: 15px; font-weight: bold; line-height: 110%; margin: 0; padding: 10px; text-transform: uppercase;}
	.goalcontainer.green {background-color:#05D215;}
	.goalcontainer.gray {background-color:#acacac;}
	.goalcontainer.blk {background-color:#585858;}	
	.goalcontainer.orange {background-color:#ffa400;}		
	.goalcontainer.red {background-color:#ff4242;}		
	.goalcontainer.green > h2 {background: #05bc15 none repeat scroll 0 0;}
	.goalcontainer.gray > h2 {background: #8f8f8f none repeat scroll 0 0;}
	.goalcontainer.blk > h2 {background: #383838 none repeat scroll 0 0;}	
	.goalcontainer.orange > h2 {background: #da8c00 none repeat scroll 0 0;}
	.goalcontainer.red > h2 {background: #ff0000 none repeat scroll 0 0;}
	.cosvalue,.costperlead, .leadstoappt, .appttosale, .totalInv, .estimatedrev,.calls.DispositionAnswered,.calls.ValueCalls{color: #fff; font-weight:bold; font-size: 48px; line-height: 110%; opacity: 1; padding: 30px 10px; text-align: center;}
	/* Conversion Panel Styles */
	#conversion-btns{float:left;margin:40px 0 0;width:22%}
	#conversion-panel{float:left;width: 78%;}			
	#goals-data li {border: 1px solid #ccc;margin:5% 0; background-color: #f9f9f9; width: 100%; text-align: center;}	
	#goals-data label {width: 100%; display: block; font-size:1.5em;}
	#conversion-btns label span.subtext {color: #333;font-size: 9px;}
	.showSingle {display: block; padding: 2%;}	
	/* Weather Styles */
	.week {border-right: 1px solid #ededed; border-top: 1px solid white; display: table; position: relative; width: 100%;}
	.week ul {list-style-type: none; margin: 0; padding: 0;}
	.week .day {border: 1px solid #ccc; display: block; float: left; height: 250px; margin: 0.05%; min-height: 202px; position: relative; text-align: center; width: 139.5px}
	.date {background-color: #3c8ed2; color: #fff; margin-bottom: 20px;}
	.week .day p {margin:5px 0;}
	.week .day .hi-temp {font-size: 26px;}
	.week .day .lo-temp, .goal-content {color: #666; font-size: 14px;}
	.goal-value {font-size: 20px;}
	.week .day img {border-radius: 50px;}
	.content {background: #fff none repeat scroll 0 0; border-color: #ccc #ccc #ccc -moz-use-text-color; border-image: none; border-style: solid solid solid none; border-width: 1px 1px 1px medium; display: none; height: 197px; left: 139px; padding: 5px 10px; position: absolute; top: 17px; width: 123.5px; z-index: 9999;}
	.goal-content, .goal-value {display: block; margin: 6px 0; color: #666;}
	.highlighter, .highlighter .content {background: #f9f9f9 none repeat scroll 0 0;}
	/* Misc */
	#rt-content-bottom,#rt-content-top{clear:both;overflow:visible;width:100%;font-family: arial;font-size:14px}
	#rt-content-bottom .rt-omega,#rt-content-top .rt-omega{margin-right:0;width:100%}
	.box2 #rt-mainbody,.box2 .rt-block{background:#fff;border:1px solid #e5e5e3}
	.rt-block{border-radius:6px;margin:10px 0;padding: 8px 8px 16px;;position:relative}
	.title1 .module-title{background:#e36c25;border:1px solid #e36c25}
	.title1 .module-title{border-radius:6px;padding:7px}
	.title1 .module-title .title{color:#fff;font-size:1.1em; font-weight: normal;margin:0}
	.summary-list{float:left;font-weight:700;line-height:1.8em;margin:0 0 -15px 2px;width:33%}		
	.tg  {border-collapse:collapse;border-spacing:0;}
	.tg td{color:#333;font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border:1px solid #ccc;overflow:hidden;word-break:normal;}
	.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border:1px solid #ccc;overflow:hidden;word-break:normal;}
	.tg .tg-yw4l{line-height: normal;vertical-align:top}
	.tg-yw4l > a {color: royalblue !important;}
	#search-filter td {border: none; font-size:14px; text-align: left;}
    #search-filter .hasDatepicker {font-size: 12px; width: 100px;}	
	#keyword_ranking th span, #conv_table th span {cursor: pointer;}
	#loading {max-height:1500px; height:100%}
	#loading img {padding:408px 0;width: 420px; top: 50%; margin: 0 auto; position: relative; display: block;}
	/* Override Styles */
	#csa-search > form {float: right; width: 55%; padding: 0 22px;}
	#csa-override {display:none}
	#gapi-overrides {color:#FEA408;line-height: 20px;text-decoration: underline;}
	.gapi-submit-container {float: left;margin: 0 0 0 10px;width: 130px;}
	.gapi-button {background: #0073aa none repeat scroll 0 0;border: medium none;border-radius: 5px; color: #fff;cursor: pointer;float: none;margin-top:4px; padding:4px; width:90%;}    	
	#reportrange > span {color: #000;}
	#override-form table {width: 100%;}
	#override-form table #override-form th, #override-form table td {text-align:left; padding: 15px 7px;}
	#override-form table th {background: #E9E9E9; color: #333;}
	#override-form table td {border: none;}
	#override-form table td.row-title {font-weight: bold;}
	#board-roi .board-name {display: block;width: 170px !important;}
	#csa_business_unit {float: left;margin-top: 8px;}	
	.dashicons-calendar-alt:before {margin: 0 10px 0 0;}
	#csa_primary_dimension input[type="radio"],#csa_adw_primary_dimension input[type="radio"],#csa_speed_primary_dimension input[type="radio"] {width: 0;visibility: hidden;height: 0;min-width: 0;}
	#csa_primary_dimension form span.label,#csa_primary_dimension label > span,#csa_adw_primary_dimension form span.label,#csa_adw_primary_dimension label > span,#csa_speed_primary_dimension form span.label,#csa_speed_primary_dimension label > span {font-size: 12px;font-weight: bold;padding: 7px 0;color: #000;}
	#csa_primary_dimension span,#csa_adw_primary_dimension span,#csa_speed_primary_dimension span {cursor: pointer;margin-right: 10px;}
	#csa_primary_dimension span.active,#csa_adw_primary_dimension span.active,#csa_speed_primary_dimension span.active {color:#0073aa; font-weight:bold}
	#panel-board-container .edu-tabs {display:none}
	#panel-board-container .ui-tabs-vertical {width: 100%;margin: 0 0 10px;}
	#panel-board-container .ui-widget-content {background: #e3e3e3 none repeat scroll 0 0;}
	#panel-board-container .ui-tabs .ui-tabs-nav .ui-tabs-anchor {padding: 1em;}
	#panel-board-container .ui-tabs-vertical .ui-tabs-nav { padding:0;float: left; width: 25%; }
	#panel-board-container .ui-tabs-vertical .ui-tabs-nav li { clear: left; width: 100%; border-bottom-width: 1px !important; border-right-width: 0 !important; margin: 0 -1px .2em 0; }
	#panel-board-container .ui-tabs-vertical .ui-tabs-nav li a { display:block; }
	#panel-board-container .ui-tabs-vertical .ui-tabs-nav li.ui-tabs-active { padding-bottom: 0; padding-right: .1em; border-right-width: 1px; }
	#panel-board-container .ui-tabs-vertical .ui-tabs-panel {background: #ebebeb none repeat scroll 0 0;float: right;padding: 1em;width: 75%;}
	#panel-board-container .edu-tabs h2 {font-size: 18px;}
	#search-filter label {color: #fff;}
	.pulsate {
		-webkit-animation: color_change 1s infinite alternate;
		-moz-animation: color_change 1s infinite alternate;
		-ms-animation: color_change 1s infinite alternate;
		-o-animation: color_change 1s infinite alternate;
		animation: color_change 1s infinite alternate;
	}
	@-webkit-keyframes color_change {
		from { color: red; }
		to { color: orange; }
	}
	@-moz-keyframes color_change {
		from { color: red; }
		to { color: orange; }
	}
	@-ms-keyframes color_change {
		from { color: red; }
		to { color: orange; }
	}
	@-o-keyframes color_change {
		from { color: red; }
		to { color: orange; }
	}
	@keyframes color_change {
		from { color: red; }
		to { color: orange; }
	}	
	</style>
	<script>
	//Date Variables
	<?php  if (get_option('gapi_calendar_diff') <> ""){ ?> 
	var diff = <?php echo $diff ?>;
	<?php  } else { ?>
	var diff = 0;
	<?php  } ?>
	var startdate = '<?php echo $fromDate  ?>';
	var enddate = '<?php echo $toDate  ?>';
	//World Weather API Data
	<?php  if (get_option('gapi_weather_enable') == 1){ ?>
		//Weather Data
		var zipcode = '<?php echo $weatherzip  ?>';
		var appid = '<?php echo $weatherapi  ?>';
		var timeperiod ='24';			
		var WeatherAPI = '//api.worldweatheronline.com/premium/v1/past-weather.ashx?q='+ zipcode +'&format=json&date='+ startdate +'&enddate='+ enddate +'&tp='+ timeperiod +'&key='+ appid
	<?php  } ?>
	//Convirza Tracking
	var ConvExtID = '<?php echo $dev_conv_profile  ?>';
	var ConvAPIKey = '369281456857b6910b0b8e0b1d7b046c';   
	var ConvAPISec= '%241%24SVUTmT1e%24hqQHTUvAFOoUuZ5bFVqle.';
	var NewConvData ='https://api.logmycalls.com/services/getCallDetails?criteria[external_ouid]='+ConvExtID+'&criteria[start_calldate]='+startdate+'&criteria[end_calldate]='+enddate+'&api_key='+ConvAPIKey+'&api_secret='+ConvAPISec+'&limit=1000&sort_by=id&sort_order=asc';	
	//Google Goal Data
	var GoalOneData = '<?php echo plugins_url('csanalytics/lib/data/data-GoalOneData.php'); ?>';
	var GoalTwoData = '<?php echo plugins_url('csanalytics/lib/data/data-GoalTwoData.php'); ?>';
	var GoalThreeData = '<?php echo plugins_url('csanalytics/lib/data/data-GoalThreeData.php'); ?>';
	var GoalFourData = '<?php echo plugins_url('csanalytics/lib/data/data-GoalFourData.php'); ?>';
	var GoalFiveData = '<?php echo plugins_url('csanalytics/lib/data/data-GoalFiveData.php'); ?>';
	var GoalCompletionRateAll = '<?php echo plugins_url('csanalytics/lib/data/data-GoalCompletionRateAll.php'); ?>';
	var GoalValueTotals = '<?php echo plugins_url('csanalytics/lib/data/data-GoalValueTotals.php'); ?>';				
	var dataChannelGroupingAll = '<?php echo plugins_url('csanalytics/lib/data/data-ChannelData.php'); ?>';	
	var countryBySession = '<?php echo plugins_url('csanalytics/lib/data/data-CountryBySessions.php'); ?>';
	var dataDevicesAll = '<?php echo plugins_url('csanalytics/lib/data/data-Devices.php'); ?>';
	var newVSReturning = '<?php echo plugins_url('csanalytics/lib/data/data-NewVsReturningUsers.php'); ?>';
	var VisitorsByDate = '<?php echo plugins_url('csanalytics/lib/data/data-VisitorsByDate.php'); ?>';
	var SessionsPageViews = '<?php echo plugins_url('csanalytics/lib/data/data-SessionsPageViews.php'); ?>';
	var UsersSessionsPageViews = '<?php echo plugins_url('csanalytics/lib/data/data-UsersSessionsPageViews.php'); ?>';   
	var SiteSpeed = '<?php echo plugins_url('csanalytics/lib/data/data-SiteSpeed.php'); ?>';  	
	var ReferralPath = '<?php echo plugins_url('csanalytics/lib/data/data-SiteSpeed.php'); ?>';  	
	//Industry
	var Plumber = 300;
	var Electrician = 350;
	var HVAC = 700;	
	<?php if (get_option('gapi_dev_industry_other') <> ""){ ?>
	var OGI = <?php echo $gapi_dev_industry_other  ?>;
	<?php } else { ?>
	var OGI = 450;
	<?php } ?>
	<?php if (get_option('gapi_rep_avg_tix') <> ""){ ?>
	var gapiRepAvgTix = <?php echo $gapi_rep_avg_tix  ?>;
	<?php } ?>
	<?php if (get_option('gapi_inst_avg_tix') <> ""){ ?>
	var gapiInstAvgTix = <?php echo $gapi_inst_avg_tix  ?>;
	<?php } ?>
	<?php if (get_option('gapi_rep_percent') <> ""){ ?>
	var gapiRepPercent = .<?php echo $gapi_rep_percent  ?>;
	<?php } ?>
	<?php if (get_option('gapi_inst_percent') <> ""){ ?>
	var gapiInstPercent = .<?php echo $gapi_inst_percent  ?>;
	<?php } ?>
	<?php if (get_option('gapi_lead_appt') <> ""){ ?>
	var lta = .<?php echo $gapi_lead_appt  ?>;
	<?php } else { ?>
	var lta = .70; //Displays default lead to appt
	<?php } ?>
	<?php  if (get_option('gapi_appt_sale') <> ""){ ?>
	var ats = .<?php echo $gapi_appt_sale  ?>;
	<?php } else { ?>
	var ats = .50; //Displays default appt to sale
	<?php } ?>	
	var leadstoappt = 0;
	var appttosale = 0;
	var leadtoapptamount = 0;
	var apptsaleamount = 0;	
	var plumbestimatedrev = 0;			
	var elecestimatedrev = 0;			
	var hvacestimatedrev = 0;
	//Convirza Variables
	var chatHTML = ''
	var DispositionAnswered = '';
	var DispositionNoAnswer = '';
	var TotalCallMin = 0;
	var TotalCount = '';
	var TotalCallMinutes = 0;
	var AvgCallDuration = 0;
	var ValueCallsSingle = '';
	var ValueCalls = '';
	var ValueCallMinutes = 0;
	var ValueCallSec = 0;
	//Sum Data Goal One
	var compsum1 = 0;
	//Sum Data Goal Two
	var compsum2 = 0;
	//Sum Data Goal Three
	var compsum3 = 0;
	//Sum Data Goal Four
	var compsum4 = 0;
	//Sum Data Goal Five
	var compsum5 = 0;
	//Sum Data Goal Value All
	var compsumvalueall = 0;
	var valuesumvalueall = 0;
	var conversionrateall = 0;
	//Speed Data
	var avgPageLoadTime = 0;
	var pageviews = 0;
	var bounceRate = 0;
	var exitRate = 0;
	var pageValue = 0;
	var goalCompletionsAll = 0;
	var goalConversionRateAll = 0;
	var TotalAvgPageLoadTime = 0;
	//Device Data
	var devicesessionall = 0;
	var deviceusersall = 0;
	var devicepageviewssessionsall = 0;
	//Value Data
	var valuegoalcomp = 0;
	//Channel Grouping Data
	var channelsessions = 0;
	var channelpercentNewSessions = 0;
	var channelnewUsers = 0;
	var channelbounceRate = 0;
	var channelpageviewsPerSession = 0;
	var channelavgSessionDuration = 0;
	var channelgoalConversionRateAll = 0;
	var channelgoalCompletionsAll = 0;
	var channelgoalValueAll = 0;
	//Used for Creating Weather Chart
	var remaining = 2;
	var chartData1 = null;
	var chartData2 = null;
	//Calculate Per Lead Value
	var minutes = ValueCallMinutes;
	var costperminute = minutes*.05;
	var channelobject = '';
	<?php if (get_option('gapi_dev_chat') <> ""){ ?> 		
	var chats = <?php echo $chats  ?>;
	<?php } else { ?>
	var chats = 0;
	<?php } ?>
	var chatscost = chats*10;
	<?php if (get_option('gapi_dev_client_payment_type') == "monthly"){ ?>
	var payment = <?php echo $payment ?>;
	var calendarMonth = diff / 30;
	var totalMonthlyPayment = payment*calendarMonth;	
	<?php } else if (get_option('gapi_dev_client_payment_type') == "perlead"){ ?>
	var perleadpayment = <?php echo $paymentperlead ?>;
	<?php } ?>
	<?php if (get_option('gapi_dev_client_payment_type') == "monthly" && get_option('gapi_industry_business_unit') == "wholeBU"){ ?>
	var totalInv = parseFloat(costperminute) + parseFloat(chatscost) + parseFloat(totalMonthlyPayment);
	<?php } else if (get_option('gapi_dev_client_payment_type') == "monthly" && get_option('gapi_industry_business_unit') == "installBU" && get_option('gapi_inst_percent') <> ""){ ?>
	var totalInv = (parseFloat(costperminute) + parseFloat(chatscost) + parseFloat(totalMonthlyPayment)) * gapiInstPercent;			
	<?php } else if (get_option('gapi_dev_client_payment_type') == "monthly" && get_option('gapi_industry_business_unit') == "repairBU" && get_option('gapi_rep_percent') <> ""){ ?>
	var totalInv = (parseFloat(costperminute) + parseFloat(chatscost) + parseFloat(totalMonthlyPayment)) * gapiRepPercent;
	<?php } else if (get_option('gapi_dev_client_payment_type') == "monthly"){ ?>
	var totalInv = parseFloat(costperminute) + parseFloat(chatscost) + parseFloat(totalMonthlyPayment);
	<?php } ?>
	var totalleads = 0;
	var costperlead = 0;
	/**
	* Add additional menu items to default export menu
	*/
	AmCharts.exportCFG.fileName = "myChartExport";
	AmCharts.exportCFG.menu[0].menu.push({
		"label": "Display data",
		"click": function() {
			// get chart object
			var chart = this.setup.chart;
			// get chart data
			var data = chart.dataProvider;
			// create a table
			var holder = document.createElement("div");
			holder.className = "chart-data";
			var table = document.createElement("table");
			holder.appendChild(table);
			var tr, td;
			// add first row
			for (var x = 0; x < chart.dataProvider.length; x++) {
				// first row
				if (x == 0) {
					tr = document.createElement("tr");
					table.appendChild(tr);
					td = document.createElement("th");
					td.innerHTML = chart.categoryAxis.title;
					tr.appendChild(td);
					for (var i = 0; i < chart.graphs.length; i++) {
						td = document.createElement('th');
						td.innerHTML = chart.graphs[i].title;
						tr.appendChild(td);
					}
				}
				// add rows
				tr = document.createElement("tr");
				table.appendChild(tr);
				td = document.createElement("td");
				td.className = "row-title";
				td.innerHTML = chart.dataProvider[x][chart.categoryField];
				tr.appendChild(td);
				for (var i = 0; i < chart.graphs.length; i++) {
					td = document.createElement('td');
					td.innerHTML = chart.dataProvider[x][chart.graphs[i].valueField];
					tr.appendChild(td);
				}
			}
			// append to the document
			chart.containerDiv.appendChild(holder);
			// replace menu
			this.createMenu([{
				"class": "export-main export-close",
				label: "Done",
				click: function() {
					this.createMenu(this.config.menu);
					chart.containerDiv.removeChild(holder);
				}
			}]);
		}
	});		
	var chart = AmCharts.makeChart( "chartdiv", {
		"type": "pie",
		"dataLoader": {
			"url": countryBySession,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "sessions",
		"titleField": "country",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Percentage of Visitors by City"
		}],		
		//"legend": {}
	});
    var chart = AmCharts.makeChart( "chartdiv-Devices", {
		"type": "pie",
		"dataLoader": {
			"url": dataDevicesAll,
			"format": "json"
		},
		"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
		"titleField": "devices",
		"valueField": "sessions",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Device Overview"
		}],		
		"legend": {
			"align": "center",
			"markerType": "circle"
		},
		"export": AmCharts.exportCFG		
	});
    var chart = AmCharts.makeChart( "chartdiv2", {
		"type": "pie",
		"dataLoader": {
			"url": newVSReturning,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "sessions",
		"titleField": "users",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "New vs Returning Visitors"
		}],		
		"legend": {}
	});
	var chart = AmCharts.makeChart("chartdiv3", {
		"type": "serial",
		"dataLoader": {
			"url": VisitorsByDate,
			"format": "json"
		},
		"categoryField": "date",
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"categoryAxis": {
			"parseDates": true
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"valueAxes": [{
			"gridColor":"#FFFFFF",
			"gridAlpha": 0.2,
			"dashLength": 0
		}],
		"gridAboveGraphs": true,
		"graphs": [{
			"lineAlpha": 1,
			"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[visitors]]",
			"bullet": "round",
			"lineColor": "#058DC7",
			"fillAlphas": 0.33,
			"fillColors": "#AADFF3",
			"type": "line",
			"title": "Visitors",
			"valueField": "visitors"		
		}],
		"valueAxes": [{
			"id": "ValueAxis-1",
			"stackType": "regular",
			"title": "Visitors"
		}],		
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Visitors By Date Chart"
		}],		
	        "legend": {
		       "enabled": true,
		       "align": "center",
		       "markerType": "circle"
	        },
	});	
	var chart = AmCharts.makeChart("chartdiv4",{
		"type": "serial",
		"dataLoader": {
			"url": SessionsPageViews,
			"format": "json"
		},			
		"categoryField": "date",
		"marginRight": 80,
		"autoMarginOffset": 20,			
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"categoryAxis": {
			"parseDates": true,
			"dashLength": 1,
			"minorGridEnabled": true
		},
		"chartScrollbar": {
			"graph": "g1",
			"oppositeAxis":false,
			"offset":30,
			"scrollbarHeight": 80,
			"backgroundAlpha": 0,
			"selectedBackgroundAlpha": 0.1,
			"selectedBackgroundColor": "#888888",
			"graphFillAlpha": 0,
			"graphLineAlpha": 0.5,
			"selectedGraphFillAlpha": 0,
			"selectedGraphLineAlpha": 1,
			"autoGridCount":true,
			"color":"#AAAAAA"
		},
		"chartCursor": {
			"pan": true,
			"valueLineEnabled": true,
			"valueLineBalloonEnabled": true,
			"cursorAlpha":0,
			"valueLineAlpha":0.2
		},
		"trendLines": [],
		"graphs": [{
			"balloonText": "[[title]] on [[date]]:[[sessions]]",
			"bullet": "round",
			"bulletSize": 5,
			"hideBulletsCount": 50,					
			"id": "g1",
			"lineColor": "#058DC7",
			"title": "Sessions",
			"valueField": "sessions"
		},{
			"balloonText": "[[title]] of [[date]]:[[pageviews]]",
			"bullet": "square",
			"id": "AmGraph-2",
			"lineColor": "#AADFF3",
			"title": "Page Views",
			"valueField": "pageviews"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "ValueAxis-1",
			"stackType": "regular",
			"title": "Sessions & Page Views"
		}],
		"allLabels": [],
		"balloon": {
			"borderThickness": 1,
			"shadowAlpha": 0
		},
		"legend": {
			"useGraphSettings": true
		},
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Sessions & Page Views Chart"
		}]
	});
	//Adds date zoom to charts
	chart.addListener("rendered", zoomChart);
	zoomChart();
	function zoomChart() {
		chart.zoomToIndexes(chart.length - 100, chart.length - 1);
	}		
	var chart = AmCharts.makeChart( "chartdiv5", {
		"type": "serial",
		"dataLoader": {
			"url": UsersSessionsPageViews,
			"format": "json"
		},
		"creditsPosition": "top-right",
		"categoryField": "country",
		"startDuration": 1,
		"categoryAxis": {
			"gridAlpha": 0.07,
			"gridPosition": "start",
			"tickPosition": "start",
			"title": "City"
		},
		"guides": [],
		"valueAxes": [{
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Users/Sessions"
		},{
			"id": "v2",
			"gridAlpha": 0,
			"position": "right",
			"title": "Page views"
		}],
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],	  
		"graphs": [ {
		"type": "column",
		"title": "Sessions",
		"valueField": "sessions",
		"labelText": "[[value]]",
		"lineAlpha": 0,
		"fillAlphas": 0.6
		},{
			"type": "column",
			"title": "Users",
			"valueField": "users",
			"labelText": "[[value]]",
			"lineAlpha": 0,
			"fillAlphas": 0.6
		},{
		"type": "line",
		"valueAxis": "v2",
		"title": "Page views",
		"valueField": "pageviews",
		"labelText": "[[value]]",
		"lineThickness": 2,
		"bullet": "round"
		}],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Combined View City/Users/Pageviews"
		}],	  
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG
	});
	//Start Goal 1 Chart
	var chart = AmCharts.makeChart("chartdiv6", {
		"type": "serial",
		"dataLoader": {
			"url": GoalOneData,
			"format": "json"
		},	
		"categoryField": "month",
		"dataDateFormat": "YYYYMM",
		"startDuration": 1,
		"categoryAxis": {
			"title": "Months",
			"gridPosition": "start",
			"minPeriod": "MM",
			"parseDates": true,			
			"dateFormats": [{
				"period": "YYYY",
				"format": "YYYY"
			},{
				"period": "MM",
				"format": "MMM"
			}],			
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal1completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 1 Completions",
			"type": "column",
			"valueField": "goal1completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal1values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 1 Values",
			"valueField": "goal1values"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "GoalValue-1",
			"title": "Goal Value"
		}],
		"allLabels": [],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Contact Page Visit (Goal 1 Completions)"
		}],
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG					
	});
	//Start Goal 2 Chart
	var chart = AmCharts.makeChart("chartdiv7", {
		"type": "serial",
		"dataLoader": {
			"url": GoalTwoData,
			"format": "json"
		},	
		"categoryField": "month",
		"dataDateFormat": "YYYYMM",
		"startDuration": 1,
		"categoryAxis": {
		"title": "Months",
		"gridPosition": "start",
		"minPeriod": "MM",
		"parseDates": true,			
		"dateFormats": [{
			"period": "YYYY",
			"format": "YYYY"
		},{
			"period": "MM",
			"format": "MMM"
		}],			
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal2completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 2 Completions",
			"type": "column",
			"valueField": "goal2completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal2values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 2 Values",
			"valueField": "goal2values"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "GoalValue-2",
			"title": "Goal Value"
		}],
		"allLabels": [],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Contact Form Submission (Goal 2 Completions)"
		}],
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG					
	});	
	//Start Goal 3 Chart
	var chart = AmCharts.makeChart("chartdiv8", {
		"type": "serial",
		"dataLoader": {
			"url": GoalThreeData,
			"format": "json"
		},	
		"categoryField": "month",
		"dataDateFormat": "YYYYMM",
		"startDuration": 1,
		"categoryAxis": {
			"title": "Months",
			"gridPosition": "start",
			"minPeriod": "MM",
			"parseDates": true,			
			"dateFormats": [{
				"period": "YYYY",
				"format": "YYYY"
			},{
				"period": "MM",
				"format": "MMM"
			}],			
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal3completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 3 Completions",
			"type": "column",
			"valueField": "goal3completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal3values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 3 Values",
			"valueField": "goal3values"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "GoalValue-3",
			"title": "Goal Value"
		}],
		"allLabels": [],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Mobile Click to Call (Goal 3 Completions)"
		}],
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG	
	});
	//Start Goal 4 Chart
	var chart = AmCharts.makeChart("chartdiv9", {
		"type": "serial",
		"dataLoader": {
			"url": GoalFourData,
			"format": "json"
		},	
		"categoryField": "month",
		"dataDateFormat": "YYYYMM",
		"startDuration": 1,
		"categoryAxis": {
			"title": "Months",
			"gridPosition": "start",
			"minPeriod": "MM",
			"parseDates": true,			
			"dateFormats": [{
				"period": "YYYY",
				"format": "YYYY"
			},{
				"period": "MM",
				"format": "MMM"
			}],			
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal4completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 3 Completions",
			"type": "column",
			"valueField": "goal3completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal4values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 4 Values",
			"valueField": "goal4values"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "GoalValue-4",
			"title": "Goal Value"
		}],
		"allLabels": [],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Chat Leads Sent (Goal 4 Completions)"
		}],
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG	
	});	
	//Start Goal 5 Chart
	var chart = AmCharts.makeChart("chartdiv10", {
		"type": "serial",
		"dataLoader": {
			"url": GoalFiveData,
			"format": "json"
		},	
		"categoryField": "month",
		"dataDateFormat": "YYYYMM",
		"startDuration": 1,
		"categoryAxis": {
			"title": "Months",
			"gridPosition": "start",
			"minPeriod": "MM",
			"parseDates": true,			
			"dateFormats": [{
				"period": "YYYY",
				"format": "YYYY"
			},{
				"period": "MM",
				"format": "MMM"
			}],			
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal5completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 5 Completions",
			"type": "column",
			"valueField": "goal5completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal5values]]",
			"id": "AmGraph-5",
			"labelText": "[[value]]",
			"title": "Goal 3 Values",
			"valueField": "goal3values"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "GoalValue-5",
			"title": "Goal Value"
		}],
		"allLabels": [],

		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Print Coupon (Goal 5 Completions)"
		}],
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG	
	});	
	/*
	 * GOAL Values
	 ***********************************************************************************
	 */ 
	// Goal Conversion Rate - 30 day cycle
	var chart = AmCharts.makeChart("chartdiv-goalcompletionall",{
		"type": "serial",
		"dataLoader": {
			"url": GoalCompletionRateAll,
			"format": "json"
		},			
		"categoryField": "date",
		"marginRight": 80,
		"autoMarginOffset": 20,			
		"dataDateFormat": "YYYYMMDD",
		"percentPrecision": 0,
		"precision": 2,
		"startDuration": 1,
		"categoryAxis": {
			"parseDates": true,
			"dashLength": 1,
			"minorGridEnabled": true
		},
		"chartScrollbar": {
			"graph": "goalconversionall",
			"oppositeAxis":false,
			"offset":30,
			"scrollbarHeight": 80,
			"backgroundAlpha": 0,
			"selectedBackgroundAlpha": 0.1,
			"selectedBackgroundColor": "#888888",
			"graphFillAlpha": 0,
			"graphLineAlpha": 0.5,
			"selectedGraphFillAlpha": 0,
			"selectedGraphLineAlpha": 1,
			"autoGridCount":true,
			"color":"#AAAAAA"
		},
		"chartCursor": {
			"pan": true,
			"valueLineEnabled": true,
			"valueLineBalloonEnabled": true,
			"cursorAlpha":0,
			"valueLineAlpha":0.2
		},
		"trendLines": [],
		"graphs": [{
			"balloonText": "[[title]] on [[date]]:[[goalconversions]]",
			"bullet": "round",
			"bulletSize": 5,
			"hideBulletsCount": 50,					
			"id": "goalconversionall",
			"lineColor": "#058DC7",
			"title": "Goal Conversion Rate",
			"valueField": "goalconversions"
		}],
		"guides": [],
		"valueAxes": [{
			"id": "ValueAxis-1",
			"stackType": "regular",
			"title": "Total Goal Conversion Rate"
		}],
		"allLabels": [],
		"balloon": {
			"borderThickness": 1,
			"shadowAlpha": 0
		},			
		"legend": {
			"useGraphSettings": true
		},
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Goal Conversion Rate"
		}]
	});
	// Goal Value All - 30 day cycle					
	var chart = AmCharts.makeChart( "chartdiv-goalvaluetotal", {
		"type": "serial",
		"dataLoader": {
			"url": GoalValueTotals,
			"format": "json"
		},
		"creditsPosition": "top-right",
		"categoryField": "date",
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"precision": 2,		
		"categoryAxis": {
			"parseDates": true
		},
		"guides": [],
		"valueAxes": [{
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Users/Sessions"
		},{
			"id": "v2",
			"gridAlpha": 0,
			"position": "right",
			"title": "Page views"
		}],
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],	  
		"graphs": [{
			"balloonText": "[[title]] on [[date]]:[[goalCompletionsAll]]",  
			"type": "column",
			"title": "Goal Completions",
			"valueField": "goalCompletionsAll",
			"labelText": "[[value]]",
			"lineAlpha": 0,
			"fillAlphas": 0.6
		},{
			"balloonText": "[[title]] on [[date]]:[[goalConversionRateAll]]%",  
			"type": "column",
			"title": "Goal Conversions",
			"valueField": "goalConversionRateAll",
			"labelText": "[[value]]%",
			"lineAlpha": 0,
			"fillAlphas": 0.6
		},{
			"balloonText": "[[title]] on [[date]]: $[[goalvalueall]]",  
			"type": "line",
			"valueAxis": "v2",
			"title": "Goal Value",
			"valueField": "goalvalueall",
			"labelText": "$[[value]]",
			"lineThickness": 2,
			"bullet": "round"
		}],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Goals Total"
		}],	  
	        "legend": {
		       "enabled": true,
		       "align": "center",
		       "markerType": "circle"
	        },
		"export": AmCharts.exportCFG
	});				
	//jQuery Scripts	
	jQuery(function() {

		<?php if(get_option('gapi_dev_industry') == 'custom'){ ?> 
			<?php if (get_option('gapi_rep_percent') == '' || get_option('gapi_rep_avg_tix') == '' || get_option('gapi_inst_percent') == '' || get_option('gapi_inst_avg_tix') == '') { ?>
				jQuery('.override-btn').addClass('pulsate');
			<?php } ?>		
		<?php } ?>	
		
		//Activates loading image while AJAX completes
		jQuery('#loading').html('<img src="<?php echo plugins_url('/csanalytics/lib/admin/images/lnb-logo-loading.gif'); ?>" /> loading...');
		jQuery('#csanalytics-data').hide();
		// Date Range Scripts
		jQuery('#from').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
                        defaultDate: -30,
		});
		jQuery('#to').datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			defaultDate: -1,
		});
		jQuery('#from').datepicker().bind("change", function () {
			var minValue = jQuery(this).val();
			minValue = jQuery.datepicker.parseDate("yy-mm-dd", minValue);
			jQuery('#to').datepicker("option", "minDate", minValue);
			calculate();
		});
		jQuery('#to').datepicker().bind("change", function () {
			var maxValue = jQuery(this).val();
			maxValue = jQuery.datepicker.parseDate("yy-mm-dd", maxValue);
			jQuery('#from').datepicker("option", "maxDate", maxValue);
			calculate();
		});
		function calculate() {
			var d1 = jQuery('#from').datepicker('getDate');
			var d2 = jQuery('#to').datepicker('getDate');
			var oneDay = 24*60*60*1000;
			if (d1 && d2) {
			  diff = Math.round(Math.abs((d2.getTime() - d1.getTime())/(oneDay)));
			}
			 jQuery('#calendar_diff').val(diff);
		}		
		//Show / Hide Goal Metrics
		jQuery('.showSingle').on('click', function () {
			jQuery(this).addClass('selected').siblings('.anchor').removeClass('selected');
			jQuery('.goal-metrics').hide();
			jQuery('.chart-' + jQuery(this).data('target') + '-container').show();
		});
		jQuery('.showSingle').first().click();

		<?php if (get_option('gapi_dev_conv_profile') <> ""){ ?> //Checks to see if Convirza has been activated with in CSAnalytics
		jQuery.when(
			jQuery.getJSON(GoalValueTotals),
			jQuery.getJSON(NewConvData)
		).done (function (data, data2) {
			jQuery.each(data[0], function(i, item){
				compsumvalueall += parseFloat(item.goalCompletionsAll);
				valuesumvalueall += parseFloat(item.goalvalueall);
				conversionrateall += parseFloat(item.goalConversionRateAll) / 30;
			});
			jQuery('.gapiGoalCompletionsAll').append(compsumvalueall);
			jQuery('.gapiGoalValueAll').append(valuesumvalueall);
			jQuery('.gapiGoalConversionsAll').prepend(conversionrateall.toFixed(2));
			jQuery.each(data2[0].results, function(i, value) {
				TotalCount = data2[0].results.length;
				TotalCallMinutes += parseFloat(data2[0].results[i].duration);			
				var phoneNumbers = data2[0].results[i].caller_id;			
				if ( !phoneNumbers.match(/^(\+?1)?(8(00|44|55|66|77|88)[2-9]\d{6})$/) && data2[0].results[i].duration > 90 && data2[0].results[i].disposition === "ANSWERED") {
					ValueCalls+++1;
					if(TotalCallMinutes > 60000) { 
						ValueCallMinutes += Math.floor(parseFloat(data2[0].results[i].duration) / 60);
					}					
					else {
						ValueCallMinutes += Math.floor(parseFloat(data2[0].results[i].duration) / 60);
						jQuery('.ValueCallMinutes').append(ValueCallMinutes);
					}
				}
				if (value.disposition === "ANSWERED") {DispositionAnswered++;}	
				if (value.disposition === "NO ANSWER") {DispositionNoAnswer++;}
				TotalCallMin += parseFloat(data2[0].results[i].duration) / 60;
				AvgCallDuration = TotalCallMin / TotalCount;
				chatHTML += '<tr><td class="tg-yw4l">' + data2[0].results[i].calldate + '</td><td class="tg-yw4l">' + data2[0].results[i].tracking_number + '</td><td class="tg-yw4l">' + data2[0].results[i].disposition + '</td><td class="tg-yw4l">' + data2[0].results[i].duration + '</td><td class="tg-yw4l">' + data2[0].results[i].id + '</td><td class="tg-yw4l">' + data2[0].results[i].is_outbound + '</td><td class="tg-yw4l">' + data2[0].results[i].ouid + '</td><td class="tg-yw4l">' + data2[0].results[i].repeat_call + '</td><td class="tg-yw4l">' + data2[0].results[i].caller_id + '</td><td class="tg-yw4l">' + data2[0].results[i].ringto_number + '</td><td class="tg-yw4l"><audio src="' + data2[0].results[i].file_url + '" controls></audio></td></tr>';
			});

			//line used to segement whole vs repair vs Installation

			<?php if (get_option('gapi_industry_business_unit') == "wholeBU" || get_option('gapi_dev_industry') == "plumbing" || get_option('gapi_dev_industry') == "electrical" || get_option('gapi_dev_industry') == "hvac" || get_option('gapi_dev_industry') == "other" || get_option('gapi_dev_industry') == "custom"){ ?>
				totalleads = compsumvalueall + ValueCalls;
				leadstoappt = totalleads*lta;
				appttosale = leadstoappt*ats;
			<?php } else if (get_option('gapi_industry_business_unit') == "installBU" && get_option('gapi_inst_percent') <> ""){ ?>
				totalleads = (compsumvalueall + ValueCalls) * gapiInstPercent;	
				leadstoappt = totalleads * lta;
				appttosale = leadstoappt * ats;		
			<?php } else if (get_option('gapi_industry_business_unit') == "repairBU" && get_option('gapi_rep_percent') <> ""){ ?>
				totalleads = (compsumvalueall + ValueCalls) * gapiRepPercent;
				leadstoappt = totalleads * lta;
				appttosale = leadstoappt * ats;
			<?php } ?>	
			<?php if (get_option('gapi_dev_client_payment_type') == "perlead"){ ?>
			totalInv = perleadpayment * totalleads;
			<?php } ?>

			costperlead = totalInv / totalleads;
			leadtoapptsale = totalInv / leadstoappt;
			apptsaleamount = totalInv / appttosale;
			jQuery('#TotalCount span').html(TotalCount);
			jQuery('.DispositionAnswered span').html(DispositionAnswered);
			jQuery('.gapiTotalCallsSix').append(DispositionAnswered);
			jQuery('#DispositionNoAnswer span').html(DispositionNoAnswer);
			jQuery('#TotalCallMin span').html(TotalCallMin.toFixed(2));
			jQuery('#AvgCallDuration span').html(AvgCallDuration.toFixed(2));
			jQuery('.ValueCalls span, #CallLeads').append(ValueCalls);
			jQuery('.gapiConversionCallsSix').append(ValueCalls);
			jQuery('#ValueCallMinutes span').html(ValueCallMinutes);
			jQuery('#GoalCompletions span').html(compsumvalueall);
			jQuery('#conv_table').append(chatHTML);
			jQuery('#ChatLeads').append(chats);
			jQuery('#GTL').append(compsumvalueall);
			jQuery('.totalInv').append(totalInv.toFixed(2));
			jQuery('.totalleads').append(totalleads);
			jQuery('.costperlead').append(costperlead.toFixed(2));
			<?php  if ($gapi_dev_industry == 'plumbing') { ?>
				//Plumber Data
				plumbestimatedrev = Plumber*appttosale;
				plumbroi = totalInv / plumbestimatedrev;
				jQuery('.estimatedrev').append(plumbestimatedrev.toFixed(2));
				jQuery('.cosvalue').prepend((plumbroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'electrical') { ?>
				//Electrician Data
				elecestimatedrev = Electrician*appttosale;
				elecroi = totalInv / elecestimatedrev;
				jQuery('.estimatedrev').append(elecestimatedrev.toFixed(2));
				jQuery('.cosvalue').prepend((elecroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'hvac') { ?>
				//HVAC Data
				hvacestimatedrev = HVAC*appttosale;
				hvacroi = totalInv / hvacestimatedrev;			
				jQuery('.estimatedrev').append(hvacestimatedrev.toFixed(2));
				jQuery('.cosvalue').prepend((hvacroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'other') {?>
				//OGI Data
				ogiestimatedrev = OGI*appttosale;
				ogiroi = totalInv / ogiestimatedrev;			
				jQuery('.estimatedrev').append(ogiestimatedrev.toFixed(2));
				jQuery('.cosvalue').prepend((ogiroi*100).toFixed(2));									
			<?php } elseif ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "wholeBU") { ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					//Custom Data				
					customestimatedRev = <?php echo $gapi_rep_avg_tix ?>*(appttosale * .<?php echo $gapi_rep_percent ?>);
					customestimatedInstRev = <?php echo $gapi_inst_avg_tix ?>*(appttosale * .<?php echo $gapi_inst_percent ?>);
					customestimatedrev = customestimatedRev + customestimatedInstRev;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
					jQuery("#cos_data").val((customroi*100).toFixed(2));
				<?php } ?>
			<?php } else if ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "installBU"){ ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					customestimatedrev = <?php echo $gapi_inst_avg_tix ?>*appttosale;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
				<?php } ?>
			<?php } else if ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "repairBU"){ ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					customestimatedrev = <?php echo $gapi_rep_avg_tix ?>*appttosale;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
				<?php } ?>
			<?php } else { ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					//Custom Data				
					customestimatedRev = <?php echo $gapi_rep_avg_tix ?>*(appttosale * .<?php echo $gapi_rep_percent ?>);
					customestimatedInstRev = <?php echo $gapi_inst_avg_tix ?>*(appttosale * .<?php echo $gapi_inst_percent ?>);
					customestimatedrev = customestimatedRev + customestimatedInstRev;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
					jQuery("#cos_data").val((customroi*100).toFixed(2));
				<?php } ?>
			<?php } ?>

			jQuery('.leadstoappt').append(leadtoapptsale.toFixed(2));
			jQuery('.appttosale').append(apptsaleamount.toFixed(2));
		});
		 <?php  } else { ?> //If Convirza is NOT ACTIVE
		jQuery.getJSON(GoalValueTotals, function(data){    
			jQuery.each(data, function(i){
				compsumvalueall += parseFloat(data[i].goalCompletionsAll);
				valuesumvalueall += parseFloat(data[i].goalvalueall);
				conversionrateall += parseFloat(data[i].goalConversionRateAll) / 30;
			});
			jQuery('.gapiGoalCompletionsAll').append(compsumvalueall);
			jQuery('.gapiGoalValueAll').append(valuesumvalueall);
			jQuery('.gapiGoalConversionsAll').prepend(conversionrateall.toFixed(2));

			<?php if (get_option('gapi_industry_business_unit') == "wholeBU" || get_option('gapi_dev_industry') == "plumbing" || get_option('gapi_dev_industry') == "electrical" || get_option('gapi_dev_industry') == "hvac" || get_option('gapi_dev_industry') == "other" || get_option('gapi_dev_industry') == "custom"){ ?>			
				totalleads = compsumvalueall;
				leadstoappt = totalleads*lta;
				appttosale = leadstoappt*ats;
			<?php } else if (get_option('gapi_industry_business_unit') == "installBU" && get_option('gapi_inst_percent') <> ""){ ?>
				totalleads = compsumvalueall * gapiInstPercent;	
				leadstoappt = totalleads * lta;
				appttosale = leadstoappt * ats;		
			<?php } else if (get_option('gapi_industry_business_unit') == "repairBU" && get_option('gapi_rep_percent') <> ""){ ?>
				totalleads = compsumvalueall * gapiRepPercent;
				leadstoappt = totalleads * lta;
				appttosale = leadstoappt * ats;
			<?php } ?>			
			<?php if (get_option('gapi_dev_client_payment_type') == "perlead"){ ?>
			totalInv = perleadpayment * totalleads;
			<?php } ?>		

			costperlead = totalInv / totalleads;
			leadtoapptsale = totalInv / leadstoappt;
			apptsaleamount = totalInv / appttosale;			
			jQuery('#ChatLeads').append(chats);
			jQuery('#GTL').append(compsumvalueall);
			jQuery('.totalInv').append(totalInv.toFixed(2));
			jQuery('.totalleads').append(totalleads);
			jQuery('.costperlead').append(costperlead.toFixed(2));
			<?php  if ($gapi_dev_industry == 'plumbing') { ?>
			//Plumber Data
			plumbestimatedrev = Plumber*appttosale;
			plumbroi = totalInv / plumbestimatedrev;
			jQuery('.estimatedrev').append(plumbestimatedrev.toFixed(2));
			jQuery('.cosvalue').prepend((plumbroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'electrical') { ?>
			//Electrician Data
			elecestimatedrev = Electrician*appttosale;
			elecroi = totalInv / elecestimatedrev;
			jQuery('.estimatedrev').append(elecestimatedrev.toFixed(2));
			jQuery('.cosvalue').prepend((elecroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'hvac') { ?>
			//HVAC Data
			hvacestimatedrev = HVAC*appttosale;
			hvacroi = totalInv / hvacestimatedrev;			
			jQuery('.estimatedrev').append(hvacestimatedrev.toFixed(2));
			jQuery('.cosvalue').prepend((hvacroi*100).toFixed(2));
			<?php } elseif ($gapi_dev_industry == 'other') { ?>
			//OGI Data
			ogiestimatedrev = OGI*appttosale;
			ogiroi = totalInv / ogiestimatedrev;			
			jQuery('.estimatedrev').append(ogiestimatedrev.toFixed(2));
			jQuery('.cosvalue').prepend((ogiroi*100).toFixed(2));			
			<?php } elseif ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "wholeBU") { ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					//Custom Data				
					customestimatedRev = <?php echo $gapi_rep_avg_tix ?>*(appttosale * .<?php echo $gapi_rep_percent ?>);
					customestimatedInstRev = <?php echo $gapi_inst_avg_tix ?>*(appttosale * .<?php echo $gapi_inst_percent ?>);
					customestimatedrev = customestimatedRev + customestimatedInstRev;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
					jQuery("#cos_data").val((customroi*100).toFixed(2));	
				<?php } ?>
			<?php } else if ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "installBU"){ ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					customestimatedrev = <?php echo $gapi_inst_avg_tix ?>*appttosale;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
				<?php } ?>
			<?php } else if ($gapi_dev_industry == 'custom' && get_option('gapi_industry_business_unit') == "repairBU"){ ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					customestimatedrev = <?php echo $gapi_rep_avg_tix ?>*appttosale;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
				<?php } ?>
			<?php } else { ?>
				<?php if ($gapi_rep_avg_tix <> '' && $gapi_rep_percent <> '' && $gapi_inst_avg_tix <> '' && $gapi_inst_percent <> '') { ?>
					customestimatedRev = <?php echo $gapi_rep_avg_tix ?>*(appttosale * .<?php echo $gapi_rep_percent ?>);
					customestimatedInstRev = <?php echo $gapi_inst_avg_tix ?>*(appttosale * .<?php echo $gapi_inst_percent ?>);
					customestimatedrev = customestimatedRev + customestimatedInstRev;
					customroi = totalInv / customestimatedrev;			
					jQuery('.estimatedrev').append(customestimatedrev.toFixed(2));
					jQuery('.cosvalue').prepend((customroi*100).toFixed(2));
					jQuery("#cos_data").val((customroi*100).toFixed(2));
				<?php } ?>
			<?php } ?>
			jQuery('.leadstoappt').append(leadtoapptsale.toFixed(2));
			jQuery('.appttosale').append(apptsaleamount.toFixed(2));			
		});
		<?php } ?>//end if convira statement
		//Creates Table for Device Data	

		//Data Channel Scripts
		jQuery.when(
			jQuery.getJSON(dataChannelGroupingAll),
			jQuery.getJSON(dataChannelGroupingAll)
		).done (function (data, data2) { 
				setTimeout(function(){
					jQuery('#loading').hide();
					//loads CSA Container data set on full load
					jQuery('#csanalytics-data').show();
					//loads primary data set on full load
					jQuery('.showSingleBoard').first().click();
				}, 2000);
				var channelHTML = '';
				jQuery.each(data[0], function (i, item) {
					
					var raw = item.avgSessionDuration;
					var time = parseInt(raw,10)
					var hour = Math.floor(time / 3600);
					var minute = Math.floor(time / 60);
					var second = time % 60;
					var hours = ("00" + hour).substr(-2);            
					var minutes = ("00" + minute).substr(-2);
					var seconds = ("00" + second).substr(-2);

					<?php if ($gapi_primary_dimension <> '' && $gapi_secondary_dimension <> '') { ?>
						channelHTML += '<tr><td class="tg-yw4l">' + item.channelGrouping + '</td><td class="sec tg-yw4l">' + item.secondayDimension + '</td><td class="tg-yw4l">' + item.sessions + '</td><td class="tg-yw4l">' + (+item.percentNewSessions).toFixed(2) + '%</td><td class="tg-yw4l">' + item.newUsers + '</td><td class="tg-yw4l">' + (+item.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+item.pageviewsPerSession).toFixed(2) + '</td><td class="tg-yw4l">' + hours +':'+ minutes +':'+ seconds +'</td><td class="tg-yw4l">' + (+item.goalConversionRateAll).toFixed(2) + '%</td><td class="tg-yw4l">' + (+item.goalCompletionsAll).toFixed(0) + '</td></tr>';
					<?php } else { ?>
						channelHTML += '<tr><td class="tg-yw4l">' + item.channelGrouping + '</td><td class="tg-yw4l">' + item.sessions + '</td><td class="tg-yw4l">' + (+item.percentNewSessions).toFixed(2) + '%</td><td class="tg-yw4l">' + item.newUsers + '</td><td class="tg-yw4l">' + (+item.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+item.pageviewsPerSession).toFixed(2) + '</td><td class="tg-yw4l">' + hours +':'+ minutes +':'+ seconds +'</td><td class="tg-yw4l">' + (+item.goalConversionRateAll).toFixed(2) + '%</td><td class="tg-yw4l">' + (+item.goalCompletionsAll).toFixed(0) + '</td></tr>';
					<?php } ?>	

					channelsessions += parseFloat(item.sessions);
					channelpercentNewSessions += parseFloat(item.percentNewSessions);
					channelnewUsers += parseFloat(item.newUsers);
					channelbounceRate += parseFloat(item.bounceRate) / <?php echo $gapi_max_results_list ?>;
					channelpageviewsPerSession += parseFloat(item.pageviewsPerSession) / <?php echo $gapi_max_results_list ?>;
					channelavgSessionDuration += parseFloat(item.avgSessionDuration);
					channelgoalConversionRateAll += parseFloat(item.goalConversionRateAll) / <?php echo $gapi_max_results_list ?>;
					channelgoalCompletionsAll += parseFloat(item.goalCompletionsAll);
					channelgoalValueAll += parseFloat(item.goalValueAll);
					
					TotalPerNewSessions = channelpercentNewSessions / <?php echo $gapi_max_results_list ?>;
					
				});
				jQuery('#channeldata_table').append(channelHTML);
				var raw = channelavgSessionDuration / 5;
				var time = parseInt(raw,10)
				var hour = Math.floor(time / 3600);
				var minute = Math.floor(time / 60);
				var second = time % 60;
				var hours = ("00" + hour).substr(-2);            
				var minutes = ("00" + minute).substr(-2);
				var seconds = ("00" + second).substr(-2);
				jQuery('.gapiChannelSessionsAll').append(channelsessions);
				jQuery('.gapiChannelNewSessionsAll').prepend(TotalPerNewSessions.toFixed(2));
				jQuery('.gapiChannelUsersAll').append(channelnewUsers);
				jQuery('.gapiChannelBounceAll').prepend(channelbounceRate.toFixed(2));
				jQuery('.gapiChannelPageViewsAll').prepend(channelpageviewsPerSession.toFixed(2));
				jQuery('.gapiChannelSessionDurationAll').append(hours+":"+minutes+":"+seconds);
				jQuery('.gapiChannelGoalConversionsAll').prepend(channelgoalConversionRateAll.toFixed(2));
				jQuery('.gapiChannelGoalCompletionsAll').append(channelgoalCompletionsAll.toFixed(0));
		});
		
		//Site Speed Scripts
		jQuery.getJSON(SiteSpeed, function(speed){    
			jQuery.each(speed, function(i, val){
				
					var speedobject = speed
					var primaryDimCount = Object.keys(speedobject).length;
					avgPageLoadTime += parseFloat(val.avgPageLoadTime);
					pageviews += parseFloat(val.pageviews);
					bounceRate += parseFloat(val.bounceRate);
					exitRate += parseFloat(val.exitRate);
					pageValue += parseFloat(val.pageValue);

					TotalPageValue = pageValue / primaryDimCount;
					TotalAvgPageLoadTime = avgPageLoadTime / primaryDimCount;
					TotalBounceRate = bounceRate / primaryDimCount;
					TotalExitRate = exitRate / primaryDimCount;
					
					var speedHTML = ''
					
					<?php if ($gapi_speed_primary_dimension <> '' && $gapi_speed_secondary_dimension <> '') { ?>
					speedHTML += '<tr><td class="tg-yw4l">' + val.primaryDimension + '</td><td class="sec tg-yw4l sec">' + val.secondayDimension + '</td><td class="tg-yw4l">' + (+val.avgPageLoadTime).toFixed(2) + '</td><td class="tg-yw4l">' + val.pageviews + '</td><td class="tg-yw4l">' + (+val.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+val.exitRate).toFixed(2) + '%</td><td class="tg-yw4l">$' + (+val.pageValue).toFixed(2) + '</td></tr>';
					<?php } else { ?>
					speedHTML += '<tr><td class="tg-yw4l prim">' + val.primaryDimension + '</td><td class="tg-yw4l">' + (+val.avgPageLoadTime).toFixed(2) + '</td><td class="tg-yw4l">' + val.pageviews + '</td><td class="tg-yw4l">' + (+val.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+val.exitRate).toFixed(2) + '%</td><td class="tg-yw4l">$' + (+val.pageValue).toFixed(2) + '</td></tr>';
					<?php } ?>	
					
					jQuery('#speed_table').append(speedHTML);
				
			});	
			
			jQuery('.gapiavgPageLoadTime').append(TotalAvgPageLoadTime.toFixed(2));
			jQuery('.gapipageviews').append(pageviews);
			jQuery('.gapibounceRate').prepend(TotalBounceRate.toFixed(2));
			jQuery('.gapiexitRate').prepend(TotalExitRate.toFixed(2));
			jQuery('.gapipageValue').append(TotalPageValue.toFixed(2));
		
		});	
		
		//Conversion Scripts
		jQuery.when(
			jQuery.getJSON(GoalOneData),
			jQuery.getJSON(GoalTwoData),
			jQuery.getJSON(GoalThreeData),
			jQuery.getJSON(GoalFourData),
			jQuery.getJSON(GoalFiveData),
			jQuery.getJSON(dataDevicesAll)
		).done (function (data, data2, data3, data4, data5, data6) {
			var trHTML = '';
			jQuery.each(data[0], function(i, item){
				compsum1 += parseFloat(item.goal1completions);
			});	
			jQuery.each(data2[0], function(i, item){
				compsum2 += parseFloat(item.goal2completions);
			});
			jQuery.each(data3[0], function(i, item){
				compsum3 += parseFloat(item.goal3completions);
			});
			jQuery.each(data4[0], function(i, item){
				compsum4 += parseFloat(item.goal4completions);
			});
			jQuery.each(data5[0], function(i, item){
				compsum5 += parseFloat(item.goal5completions);
			});
			jQuery.each(data6[0], function(i, item){
				devicesessionall += parseFloat(item.sessions);
				deviceusersall += parseFloat(item.users);
				devicepageviewssessionsall += parseFloat(item.pageviewsessions);
				trHTML += '<tr><td class="tg-yw4l">' + item.devices + '</td><td class="tg-yw4l">' + item.sessions + '</td><td class="tg-yw4l">' + item.users + '</td><td class="tg-yw4l">' + (+item.pageviewsessions).toFixed(2) + '</td><td class="tg-yw4l">' + (+item.goalconversionrateall).toFixed(2) + '%</td><td class="tg-yw4l">' + item.goalcompletionsall + '</td><td class="tg-yw4l">$' + (+item.goalvalueall).toFixed(0) + '</td></tr>';
			});		
			jQuery('.gapiCompletionsOne').append(compsum1);
			jQuery('.gapiCompletionsTwo').append(compsum2);
			jQuery('.gapiCompletionsThree').append(compsum3);
			jQuery('.gapiCompletionsFour').append(compsum4);
			jQuery('.gapiCompletionsFive').append(compsum5);
			jQuery('.gapiDeviceSessionsAll').append(devicesessionall);
			jQuery('.gapiDeviceUsersAll').append(deviceusersall);
			jQuery('.gapiDevicePageViewsAll').prepend(devicepageviewssessionsall.toFixed(2));
			jQuery('#records_table').append(trHTML);
		});		
			
		//Sort Convirza Table
		var conv_table = jQuery('#conv_table');   
		jQuery('#convcalldate, #convtrackingnumber, #convdeposition, #convduration, #convid, #convisoutbound, #convouid, #convrepeatcall, #convcallerid, #convringtonumber')
			.wrapInner('<span title="sort this column"/>')
			.each(function(){    
				var th_conv = jQuery(this),
					thconvIndex = th_conv.index(),
					inverse = false;
				th_conv.click(function(){          
					conv_table.find('td').filter(function(){             
						return jQuery(this).index() === thconvIndex;           
					}).sortElements(function(a, b){          
						return jQuery.text([a]) > jQuery.text([b]) ?
							inverse ? -1 : 1
							: inverse ? 1 : -1;           
					}, function(){     
						// parentNode is the element we want to move
						return this.parentNode;                     
					});                
					inverse = !inverse;     
				});               
			});		
			
		<?php if (get_option('gapi_weather_enable') == 1){ ?>
		var ZIPCode = '<?php  echo $weatherzip  ?>'
		jQuery.ajax({
			dataType: "json",
			cache: false,
			url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' +  ZIPCode + '&sensor=false',
			success: function (jsonData) {
				var city =	jsonData.results[0].address_components[1].long_name;
				var county =  jsonData.results[0].address_components[2].long_name;
				var state; // =	jsonData.results[0].address_components[3].long_name;
				for (i=0;i<jsonData.results[0].address_components.length;i++) {
					 if (jsonData.results[0].address_components[i].types[0] == 'administrative_area_level_1') {
						state = jsonData.results[0].address_components[i].long_name;
					 }
				}
				jQuery('.location-city').append(city.toString());
				jQuery('.location-state').append(state.toString());			
			}
		});		
		//Creates Table for Weather Data       
		jQuery.when(
			jQuery.getJSON(WeatherAPI),
			jQuery.getJSON(GoalValueTotals)
		).done (function (data, data2) {
			var data = data[0].data;
			//console.log(data, data2);
			var weatherHTML = '';
			var lookup = {};
			var weather = data.weather;
			for (var i = 0; i < weather.length; ++i) {
				var key = weather[i].date.replace(/-/g,'');
				lookup[key] = i;
				weatherHTML += '<li id="day'+[i]+'" class="day day-container"><div class="date">' + weather[i].date + '</div><div class="svg-icon"><img src="' + weather[i].hourly[0].weatherIconUrl[0].value + '" /></div><div class="data-wrap col2"><p class="data hi-temp"><span>&deg;' + weather[i].maxtempF + '</span><sup class="deg ng-scope" data-ng-if="hasValue()"></sup></p><p class="data lo-temp"><span>&deg;' + weather[i].mintempF + '</span><sup class="deg ng-scope" data-ng-if="hasValue()"></sup></p></div><p class="data desc">' + weather[i].hourly[0].weatherDesc[0].value + '</p></li>';
			}
			jQuery('#weather_report').append(weatherHTML);
			jQuery.each(data2[0], function (i, item) {
				var day = jQuery("#day" + lookup[item.date]);
				day.append('<div class="content"><div class="content-conv-rate"><span class="goal-content">Goal Conversion Rate: </span><span class="goal-value">' + (+item.goalConversionRateAll).toFixed(2) + '%</span></div><div class="content-comp"><span class="goal-content">Goal Completions: </span><span class="goal-value">' + item.goalCompletionsAll + '</span></div><div class="content-value"></div></div>');
			})
			jQuery('.day-container').click(function() {
			  jQuery(this).prev('.highlighter').find('.content').hide();
			  jQuery(this).children('.content').animate({width: 'toggle'});
			  jQuery(this).toggleClass('highlighter');
			});			
		});
        <?php } ?>		

		//Show Hide Extra Data
		jQuery('.showMoreData').on('click', function () {
			jQuery(this).closest('.analytics-board').find('.secondary-board-data').toggle();
			
			if(jQuery('.secondary-board-data').is(":visible")){
				jQuery(this).closest('.analytics-board').find('.showMoreData').html('Hide More Data&nbsp;<span class="dashicons dashicons-arrow-up"></span>');
			}else {
				jQuery('.showMoreData').html('Show more data&nbsp;<span class="dashicons dashicons-arrow-down"></span>');  
			} 
			
		});

		// added multi usable standard javascript nyHashTabs()
		function nyHashTabs(){
			var Cookie = jQuery.cookie("nyacord"); // this will set the cookie 'nyacord'
			var activeTab = '';
			var navIndex = '';
			jQuery('.analytics-board').hide(); // hides all content

			// check if 'noacord' cookie is exist, if not then show the content of first anchor
			if(!Cookie){
				jQuery(".tabs a:first").addClass("active").show();
				jQuery(".analytics-board:first").show();

			// check if 'Cookie' is not empty
			} else if (Cookie != "") {
				jQuery('.tabs > a:eq('+ Cookie +')').addClass('active').next().show(); // setting cookie for first anchor link
				activeTab = jQuery('.tabs > a:eq('+ Cookie +')').attr("href"); // getting content for first set cookie
				jQuery(activeTab).fadeIn(0); // 0 is the fastest

			// if 'noacord' cookie does not exist then show the content of first anchor
			}

			jQuery(".tabs > a").click(function() {
				jQuery(".tabs a").removeClass("active"); // removes 'active' class from all anchors in '.tabs'
				jQuery(this).addClass("active"); // current tab will be 'active'
				navIndex = jQuery('.tabs > a').index(this); // check the index
				jQuery.cookie("nyacord", navIndex); // set the index for cookie

				jQuery('.analytics-board').hide();
				activeTab = jQuery(this).attr("href"); // the active tab + content
				jQuery(activeTab).fadeIn(0);
				return false;
			});
		}

		jQuery('#panel-links-container').each(function(){
			return nyHashTabs(); // applies to this ID only
		});	

		//Show Hide Goal Data	
		jQuery('#icon-global').on('click', function () {
			jQuery('.analytics-board').fadeIn( 1000 );			
		});		

		if(jQuery('#icon-global').hasClass("active")){
			jQuery('.analytics-board').fadeIn( 1000 );
		}	
		
	    //var start = moment().subtract(30, 'days');
	    //var end = moment().subtract(1, 'days');

		//function cb(start, end) {
		  	//console.log("Callback has been called!");
			//jQuery('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			//jQuery('#from').val(start.format('YYYY-MM-DD'));
			//jQuery('#to').val(end.format('YYYY-MM-DD'));
		 //}  

	    //jQuery('#reportrange').daterangepicker({
	        //startDate: start,
	        //endDate: end,
	        //ranges: {
	           //'Today': [moment(), moment()],
	           //'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	           //'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	           //'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	           //'This Month': [moment().startOf('month'), moment().endOf('month')],
	           //'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	        //}
	    //}, cb);

	    //cb(start, end);		

		jQuery('#industry_business_unit').change(function(){
	         jQuery(this).closest('form').trigger('submit');
	    });

		//Start Channel Data JS
		jQuery('#csa_primary_dimension input[type="radio"], #secondary_dimension, #max_results').change(function(){
	         jQuery(this).closest('form').trigger('submit');
	    });	   

		jQuery('#csa_primary_dimension span').click(function() {
			jQuery(this).prev('input[type="radio"]').click();
				jQuery('#csa_primary_dimension input[type="radio"][checked="checked"]').next('span').removeClass('active');
				jQuery('#csa_primary_dimension span').removeClass('active');
				jQuery(this).addClass('active');
				
		});

		jQuery('#csa_primary_dimension input[type="radio"][checked="checked"]').next('span').addClass('active');
		//End Channel Data JS
		
		//Speed JS
		jQuery('#csa_speed_primary_dimension input[type="radio"], #speed_secondary_dimension, #speed_max_results').change(function(){
	         jQuery(this).closest('form').trigger('submit');
	    });	   

		jQuery('#csa_speed_primary_dimension span').click(function() {
			jQuery(this).prev('input[type="radio"]').click();
				jQuery('#csa_speed_primary_dimension input[type="radio"][checked="checked"]').next('span').removeClass('active');
				jQuery('#csa_speed_primary_dimension span').removeClass('active');
				jQuery(this).addClass('active');
				
		});

		jQuery('#csa_speed_primary_dimension input[type="radio"][checked="checked"]').next('span').addClass('active');		
		//End Speed JS		
		
		jQuery( ".edu-tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
		jQuery( ".edu-tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

		jQuery( ".edu-img" ).click(function() {
		  jQuery(this).parent('.data-name-info').next('.edu-tabs').toggle();
		});		
		    		
	});	
	</script>
  <div id="admin-panel-wrapper">
		<div id="analytics-header">
			<div id="analytics-logo" style="float:left; width:20%; margin-right:2%"><img src="<?php echo plugins_url('/csanalytics/lib/admin/images/lnb-logo.png'); ?>" /></div>
			<div id="csa-controls">
				<div id="csa-nav"><a href="?page=csanalytics-settings"><span class="dashicons dashicons-admin-generic"></span>Admin Settings</a>
				<?php if(get_option('gapi_dev_industry') == 'other' || get_option('gapi_dev_industry') == 'custom' ){ ?>	
				|<a href="#TB_inline?width=600&height=550&inlineId=csa-override" class="thickbox override-btn"><span class="dashicons dashicons-admin-tools"></span>ROI Settings</a>
				<?php } ?>
				</div>
				<div id="csa-search">
					<form id="search-filter" method="post" action="">
						<fieldset class="alignleft">
							<table>
							<tr>
								<td>
									<label for="calendar_start">Start Date:</label> <input type="text" name="calendar_start" id="from" value="<?php echo get_option('gapi_calendar_start'); ?>" />&nbsp;
									<label for="calendar_end">End Date:</label> <input type="text" name="calendar_end" id="to" value="<?php echo get_option('gapi_calendar_end'); ?>" />
									<div style="display:none"><label for="calendar_diff">Statistical Day(s)</label> <input type="text" name="calendar_diff" id="calendar_diff" value="<?php  echo get_option('gapi_calendar_diff'); ?>" /></div>
								</td>
							</tr>
							</table>
						</fieldset>
						<p class="gapi-submit-container">
							<input type="submit" name="Submit" class="gapi-button" style="background-color:#FEA408; color:#333" value="Save Changes" />
							<input type="hidden" name="gapi_date_settings" value="save" style="display:none;" />
						</p>
						<div class="clear"></div>
					</form>				
				</div><!-- #search-override -->
			<div id="csa-controls">
			<?php add_thickbox(); ?>
			<div id="csa-override" style="display:none">
				<form id="override-form" method="post" action="">
					<fieldset>
						<table>
							<tr>
								<td colspan="2">
									<label for="dev_industry_custom"><?php _e( 'Custom Settings', 'inputname' ); ?></label><br />
									<em>If Custom Settings was chosen then please enter information below.</em>				
								</td>
							</tr>
							<?php if(get_option('gapi_dev_industry') == 'other'){ ?>
							<tr class="gapi-override-settings">
								<td>
									<label for="dev_industry_other"><?php _e( 'Industry Override', 'inputname' ); ?></label><br />
									<em>If other great industries was chosen then please enter in an amount here.</em><br />					
									<input name="dev_industry_other" type="text" id="dev_industry_other" class="" value="<?php  echo get_option('gapi_dev_industry_other'); ?>" class="regular-text" placeholder="450"/>
								</td>
							</tr>
							<?php } ?>
							<?php if(get_option('gapi_dev_industry') == 'other' || get_option('gapi_dev_industry') == 'custom' ){ ?>							
							<tr>
								<td colspan="2">
									<label for="lead_appt"><?php _e( 'Lead to Appointment Override', 'inputname' ); ?></label><br />
									<em>Enter a new Lead to Appointment Percentage to override default.</em><br />					
									<input name="lead_appt" type="text" id="lead_appt" class="" value="<?php echo get_option('gapi_lead_appt'); ?>" class="regular-text" placeholder="70" /><span>%</span>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<label for="appt_sale"><?php _e( 'Appointment to Sale Override', 'inputname' ); ?></label><br />
									<em>Enter a new Appointment to Sale Percentage to override default.</em><br />					
									<input name="appt_sale" type="text" id="appt_sale" class="" value="<?php echo get_option('gapi_appt_sale'); ?>" class="regular-text" placeholder="50" /><span>%</span>
								</td>
							</tr>
							<?php } ?>
							<?php if(get_option('gapi_dev_industry') == 'custom'){ ?>
							<tr>
								<td>
									<label for="rep_percent"><?php _e( 'Repair / Maintenance Percentage', 'inputname' ); ?></label><br />
									<em>Enter a new Repair and Maintenance Percentage.</em><br />					
									<input name="rep_percent" type="text" id="rep_percent" class="" value="<?php  echo get_option('gapi_rep_percent'); ?>" class="regular-text" placeholder="80" /><span>%</span>
								</td>
								<td>
									<label for="rep_avg_tix"><?php _e( 'Repair / Maintenance Avg Ticket', 'inputname' ); ?></label><br />
									<em>Enter the average Repair and Maintenance ticket cost.</em><br />					
									<span>$</span><input name="rep_avg_tix" type="text" id="rep_avg_tix" class="" value="<?php echo get_option('gapi_rep_avg_tix'); ?>" class="regular-text" placeholder="250" />
								</td>
							</tr>
							<tr>
								<td>
									<label for="rep_percent"><?php _e( 'Installation Percentage', 'inputname' ); ?></label><br />
									<em>Enter a new Installation Percentage.</em><br />					
									<input name="inst_percent" type="text" id="inst_percent" class="" value="<?php echo get_option('gapi_inst_percent'); ?>" class="regular-text" placeholder="20" /><span>%</span>
								</td>
								<td>
									<label for="inst_avg_tix"><?php _e( 'Installation Avg Ticket', 'inputname' ); ?></label><br />
									<em>Enter the average Installation ticket cost.</em><br />					
									<span>$</span><input name="inst_avg_tix" type="text" id="inst_avg_tix" class="" value="<?php echo get_option('gapi_inst_avg_tix'); ?>" class="regular-text" placeholder="2500" />
								</td>
							</tr>
							<?php } ?>
						</table>
					</fieldset>
					<p class="gapi-submit-container">
						<input type="submit" name="Submit" class="gapi-button" style="background-color:#FEA408; color:#333" value="Save Changes" />
						<input type="hidden" name="gapi_override_settings" value="save" style="display:none;" />
					</p>
					<div class="clear"></div>
				</form>	
			</div>				
			<div class="clear"></div>
		</div><!-- #analytics-header -->
<div id="admin-panel-container"><!-- Start #admin-panel-container -->
	<div id="panel-links-container" class="tabs"><!-- Start #panel-links -->    
		<a href="#board-global" id="icon-global" class="icon"><span style="right:-90px">Global</span></a>	
		<a href="#board-roi" id="icon-roi" class="icon"><span style="right:-74px">ROI</span></a>	
		<a href="#board-conversion" id="icon-conversion" class="icon"><span style="right:-120px">Conversion</span></a>	
		<a href="#board-dni" id="icon-dni" class="icon"><span style="right:-133px">Call Tracking</span></a>	
		<a href="#board-visitation" id="icon-visitation" class="icon"><span style="right:-107px">Visitation</span></a>	
		<a href="#board-visibility" id="icon-visibility" class="icon"><span style="right:-105px">Visibility</span></a>	
		<a href="#board-citations" id="icon-citation" class="icon"><span style="right:-105px">Citations</span></a>	
		<a href="#board-weather" id="icon-weather" class="icon"><span style="right:-98px">Weather</span></a>	
		<a href="#board-heatmap" id="icon-heatmap" class="icon"><span style="right:-98px">Heatmap</span></a>
		<a href="#board-reviews" id="icon-reviews" class="icon"><span style="right:-98px">Reviews</span></a>		
		<a href="#board-adwords" id="icon-adwords" class="icon"><span style="right:-98px">AdWords</span></a>		      
		<a href="#board-speed" id="icon-speed" class="icon"><span style="right:-98px">Site Speed</span></a>		      
    </div>    
	<div id="panel-board-container"><!-- Start #panel-board-container -->
		<div id="csanalytics-data">
			<div id="board-global" class="analytics-board"></div>
			<div id="board-roi" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">ROI Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">The LeadsNearby Return on investment (ROI) Board displays the benefits of your program resulting from your monthly investment. A high Estimated Revenue, matched with low Cost of Sale and Cost per Lead means the investment gains compare favorably to investment cost. As a performance measure, ROI is used to evaluate the efficiency of your investment.</span>
						</span>
					</h1>
					<?php if(get_option('gapi_dev_industry') == 'custom'){ ?>
					<div id="csa_business_unit" class="csa-select"> 
						<form method="post" action="">
                                                    <label>
							<select name="industry_business_unit" id="industry_business_unit" onchange='ibuSubmit()'>
								<option value="wholeBU" <?php if(get_option('gapi_industry_business_unit') == 'wholeBU'){?>selected="selected"<?php }?>>Overall</option>
								<option value="installBU" <?php if(get_option('gapi_industry_business_unit') == 'installBU'){?>selected="selected"<?php }?>>Installations</option>
								<option value="repairBU" <?php if(get_option('gapi_industry_business_unit') == 'repairBU'){?>selected="selected"<?php }?>>Repair and Maintenance</option>
							</select>
                                                    </label>
							<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
							<input type="hidden" name="gapi_segment_settings" value="save" style="display:none;" />
						</form>		
					</div>
					<?php } ?>			
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>ROI Data</h2>
						<span class="edu-img"></span>
					</div>	
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction to ROI</a></li>
							<li><a href="#tabs-2">How to analyize ROI Data</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Use CSAnalytics ROI to measure how well your site meets business objectives.</h2>
							<p>The LeadsNearby Return on investment (ROI) Board displays the benefits of your program resulting from your monthly investment. A high Estimated Revenue, matched with low Cost of Sale and Cost per Lead means the investment gains compare favorably to investment cost. As a performance measure, ROI is used to evaluate the efficiency of your investment.</p>
						</div>
						<div id="tabs-2">
							<h2>Each of the segements below provides ROI metrics specific to how you do business.</h2>
							<p>Use the ROI board to measure how well your LeadsNearby program is performing. From Investment to Total Estimated Revenue and the complete break down of your Lead, Appointment and Sale cost you can get a high level of information detailing your websites performance. A defined list of each segment is below:</p>
							<ol>
								<li><strong>Cost of Sale</strong> - Every company usually has a marketing budget set as a percentage of sales and here we attempt to show case our Cost of Sale as a percentage as well. As an example if your overall marketing budget is 10% of sales we strongly believe in that your online component should overall fall in the 3% range. This is a good target for you to know you are getting excellent value from your site. Your results may vary month to month but as an average we target a sub 3% figure.</li>
								<li><strong>Total Estimated Revenue</strong> - This metric signifies the amount projected to be collected during the date range selected.</li>
								<li><strong>Total Investment</strong> - The Total investment metric displays the total capital or the total money you used when investing in your LeadsNearby program.</li>
								<li><strong>Cost Per Lead</strong> - This metric measures how cost-effective your marketing campaigns are when it comes to generating new leads for your sales team. A lead is an individual that has expressed interest in your product or service by completing a goal. This metric is closely related to other key business metrics such as the cost to acquire new customers. The purpose of this metric is to provide your marketing team with a tangible dollar figure so they understand how much money is appropriate to spend on acquiring new leads.</li>
								<li><strong>Cost Per Appointment</strong> - Not every call that comes into your company results in an appointment. We attempt to take that into account by asking simple question - if 10 calls come in today how many on average will result in a 'booked call'? We use this percentage to help you see that value of the leads coming from your site. If we notice a low % of calls booking to appointments we must question the value of the value. This is also an opportunity to help your team possibly convert more calls to appointments via our call tracking program that will allow us to listen to the calls coming in.</li>
								<li><strong>Cost Per Sale</strong> - Not every appointment will result in a sale. The percentage however is typically fairly high when considering repair and maintenance calls almost always results in an average sale. This is a barometer to gauge value in our program with you. Depending on your area of the country, industry, time of the year and even the weather - we are looking for an average of sub $25 cost per sale. If our programs are not yielding the value we can start to use this figure to backwards engineer the problem or even to lower your payment (available after 12 months) to us until we are achieving your both our goals.</li>
							</ol>
						</div>
					</div>				
					<!-- Total Goal Info -->
					<div class="goalcontainer alignleft green" style="width:50%">
						<h2>Cost Of Sale</h2>
						<div class="cosvalue">%</div>
					</div>
					<div class="goalcontainer alignleft orange" style="width:50%">
						<h2>Total Estimated Revenue</h2>
						<div class="estimatedrev">$</div>
					</div>	
					<div class="goalcontainer alignleft gray">
						<h2>Total Investment</h2>
						<div class="totalInv">$</div>
					</div>
					<div class="goalcontainer alignleft blk">
						<h2>Cost Per Lead</h2>
						<div class="costperlead">$</div>
					</div>
					<div class="goalcontainer alignleft gray">
						<h2>Cost Per Appointment</h2>
						<div class="leadstoappt">$</div>
					</div>
					<div class="goalcontainer alignleft blk">
						<h2>Cost Per Sale</h2>
						<div class="appttosale">$</div>
					</div>
					<div class="clear"></div>
					<div class="data-name-info">
						<h2>Goals by Channel Data Table</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">Evaluate your traffic sources mix</a></li>
							<li><a href="#tabs-3">Identify your highest converting traffic sources</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Use this section to evaluate referrals and campaigns.</h2>
							<p> Use this section to compare traffic from search, referrals, email, and your marketing campaigns. When evaluating traffic sources, consider the following.</p>
							<p>How actively are users engaging with your site and content? Review engagement metrics like Bounce Rate, Pages/Session, and Avg. Session Duration.</p>
							<p>Do users complete activities important to the success of your business or site/app? Look at conversion metrics like Goal Conversion Rate, Goal Completions, and Goal Value. To measure ecommerce outcomes, look at Transactions, Revenue, and Ecommerce Conversion Rate.</p>
						</div>
						<div id="tabs-2">
							<h2>Evaluate your mix of traffic from different sources.</h2>
							<p>Use the Overview report to review your traffic mix. Your mix of traffic sources will depend on your marketing strategy. Also, check your mix of keywords and referrals.
								<ol>
									<li>Navigate to Goals by Channel Data.</li>
									<li>Select <strong>Keyword</strong> as the Primary Dimension (above the table) to see the top searches that led to your site/app. Are the top searches for your brand(s) or are they for products that you sell?</li>
									<li>Select <strong>Source</strong> as the Primary Dimension to see the top sites that send you traffic. Do you depend on one or two sites for referrals or do you receive traffic from a variety of sites?</li>
								</ol>
							</p>
						</div>
						<div id="tabs-3">
							<h2>Use the Source/Medium report to compare conversion rates for your traffic sources.</h2>
							<p>A conversion is the completion of an activity on your site, such as a registration or download, that is important to the success of your business. You'll see conversion rates for each goal you have set up.</p>
								<ol>
									<li>Navigate to <strong>Source/Medium</strong>.</li>
									<li>To compare conversion rates, take a look under the <Strong>Conversions</strong> header.</li>
								</ol>
							<p>If your conversion rates are low, it may be because users never progressed past the first page on your site. Select <strong>Landing Page</strong> as the Primary Dimension (above the table) and look at the Bounce Rate, the percentage of sessions in which users left from the entrance page without any further interaction with your site. A high bounce rate is a clear signal that the landing page in question needs to be made more relevant. For example, it may indicate that the ad or campaign is simply sending traffic to the wrong landing page.</p>
						</div>
					</div>						
					<div id="csa_primary_dimension" class="csa-select">
						<form method="post" action="">
							<span class="label">Primary Dimension:</span> 
					        <input type="radio" name="primary_dimension" value="channelGrouping" <?php checked(channelGrouping, get_option('gapi_primary_dimension'), true); ?>><span>Default Channel Grouping</span>
					        <input type="radio" name="primary_dimension" value="landingPagePath" <?php checked(landingPagePath, get_option('gapi_primary_dimension'), true); ?>><span>Landing Page</span>
					        <input type="radio" name="primary_dimension" value="sourceMedium" <?php checked(sourceMedium, get_option('gapi_primary_dimension'), true); ?>><span>Source / Medium</span>
					        <input type="radio" name="primary_dimension" value="source" <?php checked(source, get_option('gapi_primary_dimension'), true); ?>><span>Source</span>
					        <input type="radio" name="primary_dimension" value="medium" <?php checked(medium, get_option('gapi_primary_dimension'), true); ?>><span>Medium</span>
					        <input type="radio" name="primary_dimension" value="keyword" <?php checked(keyword, get_option('gapi_primary_dimension'), true); ?>><span>Keyword</span>
					        <div style="display: block; border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(241, 241, 241); margin-top: 10px;">
								<div style="display:none">
									<label>
										<span class="label">Secondary Dimension:</span> 
										<select name="secondary_dimension" id="secondary_dimension">
											<option value="" <?php if(get_option('gapi_secondary_dimension') == ''){?>selected="selected"<?php }?>>Secondary Dimension</option>
											<option value="exitPagePath" <?php if(get_option('gapi_secondary_dimension') == 'exitPagePath'){?>selected="selected"<?php }?>>Exit Page</option>
											<option value="sourceMedium" <?php if(get_option('gapi_secondary_dimension') == 'sourceMedium'){?>selected="selected"<?php }?>>Source / Medium</option>
											<option value="source" <?php if(get_option('gapi_secondary_dimension') == 'source'){?>selected="selected"<?php }?>>Source</option>
											<option value="medium" <?php if(get_option('gapi_secondary_dimension') == 'medium'){?>selected="selected"<?php }?>>Medium</option>
											<option value="keyword" <?php if(get_option('gapi_secondary_dimension') == 'keyword'){?>selected="selected"<?php }?>>Keyword</option>
											<option value="campaign" <?php if(get_option('gapi_secondary_dimension') == 'campaign'){?>selected="selected"<?php }?>>Campaign</option>
										</select>
									</label>
								</div>
								<div style="display:inline-block; float: right;">
									<label>
										<span class="label">Show Rows:</span> 
										<select name="max_results" id="max_results">
											<option value="5" <?php if(get_option('gapi_max_results') == '5'){?>selected="selected"<?php }?>>5</option>
											<option value="10" <?php if(get_option('gapi_max_results') == '10'){?>selected="selected"<?php }?>>10</option>
											<option value="25" <?php if(get_option('gapi_max_results') == '25'){?>selected="selected"<?php }?>>25</option>
											<option value="50" <?php if(get_option('gapi_max_results') == '50'){?>selected="selected"<?php }?>>50</option>
											<option value="100" <?php if(get_option('gapi_max_results') == '100'){?>selected="selected"<?php }?>>100</option>
										</select>
									</label>
								</div>	
								<div class="clear"></div>
							</div>							
							<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
							<input type="hidden" name="gapi_metrics_dimensions" value="save" style="display:none;" />
						</form>		
					</div>					
					<table class="tg" id="channeldata_table" border='1'>
						<tr>
							<?php if ($gapi_primary_dimension == 'channelGrouping') { ?>
							<th class="tg-031e" rowspan="2">Default Channel Grouping</th>
							<?php } elseif ($gapi_primary_dimension == 'landingPagePath') { ?>
							<th class="tg-031e" rowspan="2">Landing Page</th>
							<?php } elseif ($gapi_primary_dimension == 'sourceMedium') { ?>
							<th class="tg-031e" rowspan="2">Source / Medium</th>
							<?php } elseif ($gapi_primary_dimension == 'source') { ?>
							<th class="tg-031e" rowspan="2">Source</th>
							<?php } elseif ($gapi_primary_dimension == 'medium') { ?>
							<th class="tg-031e" rowspan="2">Medium</th>
							<?php } elseif ($gapi_primary_dimension == 'keyword') { ?>
							<th class="tg-031e" rowspan="2">Keyword</th>
							<?php } else { ?>
							<th class="tg-031e" rowspan="2">Default Channel Grouping</th>
							<?php } ?>
							<!-- Secondary Channel Group Addition -->
							<?php if ($gapi_secondary_dimension == 'exitPagePath') { ?>
							<th class="tg-031e" rowspan="2">Exit Page</th>
							<?php } elseif ($gapi_secondary_dimension == 'sourceMedium') { ?>
							<th class="tg-031e" rowspan="2">Source / Medium</th>
							<?php } elseif ($gapi_secondary_dimension == 'source') { ?>
							<th class="tg-031e" rowspan="2">Source</th>
							<?php } elseif ($gapi_secondary_dimension == 'medium') { ?>
							<th class="tg-031e" rowspan="2">Medium</th>
							<?php } elseif ($gapi_secondary_dimension == 'keyword') { ?>
							<th class="tg-031e" rowspan="2">Keyword</th>
							<?php } ?>
							<th class="tg-yw4l" colspan="3">Acquisition</th>
							<th class="tg-yw4l" colspan="3">Behavior</th>
							<th class="tg-yw4l" colspan="2">Conversions</th>
						</tr>
						<tr>
							<td id="channelsessions" class="tg-yw4l">Sessions</td>
							<td id="channelnewsessions" class="tg-yw4l">%New Sessions</td>
							<td id="channelusers" class="tg-yw4l">New Users</td>
							<td id="channelbounce" class="tg-yw4l">Bounce Rate</td>
							<td id="channepagesl" class="tg-yw4l">Pages / Sessions</td>
							<td id="channelduration" class="tg-yw4l">Avg. Session Duration</td>
							<td id="channelconversion" class="tg-yw4l">Goal Conversion Rate</td>
							<td id="channelcompletions" class="tg-yw4l">Goal Completions</td>
						</tr>
						<tr>
							<td class="tg-yw4l"></td>
							<?php if ($gapi_primary_dimension <> '' && $gapi_secondary_dimension <> '') { ?>
							<td class="sec tg-yw4l"></td>
							<?php } ?>
							<td class="tg-yw4l gapiChannelSessionsAll"></td>
							<td class="tg-yw4l gapiChannelNewSessionsAll">%</td>
							<td class="tg-yw4l gapiChannelUsersAll"></td>
							<td class="tg-yw4l gapiChannelBounceAll">%</td>
							<td class="tg-yw4l gapiChannelPageViewsAll"></td>
							<td class="tg-yw4l gapiChannelSessionDurationAll"></td>
							<td class="tg-yw4l gapiChannelGoalConversionsAll">%</td>
							<td class="tg-yw4l gapiChannelGoalCompletionsAll"></td>
						</tr>
					</table>					
				</div>
				<div class="secondary-board-data">		
					<!-- Goal Total Chart -->
					<div id="chartdiv-goalvaluetotal" class="tall"></div>
				</div>		
			</div>
			<div id="board-conversion" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Conversion Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">A website conversion is the most important factor to the success of your online marketing strategy and goals. It means getting your visitors to do what you want them to do, whether that is to buy your product, sign up for your Maintenance Plans, schdule service or repair, or fill out a lead/contact form.</span>
						</span>
					</h1>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Goals Conversions</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">Goal Examples</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Use Goals to measure how well your site/app meets business objectives.</h2>
							<p>A conversion is the completion of an activity on your site, such as a registration or download, that is important to the success of your business. Conversion rates for each of your goals are provided in this section.</p>
						</div>
						<div id="tabs-2">
							<h2>LeadsNearby CSAnalytics Core Goal Examples</h2>
							<p>Each of these common business objectives can be associated with specific, quantifiable Goals</p>
								<ol>
									<li><strong>Contact Page Visits</strong>: A prospect visits the contact page to either acquire a phone number, address information.</li>
									<li><strong>Contact Form Submissions</strong>: A prospect contacts you using one your contact submission forms.</li>
									<li><strong>Mobile Click to Call</strong>: Someone presses on your phone number to initiate a call to you from their mobile device.</li>
									<li><strong>Chat Leads Sent</strong>: A user chooses to interact with you using the LeadsNearby chat functionality.</li>
									<li><strong>Printed Promotion or Coupon</strong>: A user prints a coupon for future use.</li>
									<li><strong>Dynamic Call Tracking</strong>: A user comes to your website organically and initiates a phone call either.</li>								
								</ol>
						</div>
					</div>	
					<!-- Goal Conversion Data -->
					<div id="conversion-btns">
						<ul id="goals-data">
							<li>
								<a class="showSingle anchor" data-target="1" id="goal-metric-1">
									<label>Contact Page Visit<br /><span class="subtext">(Goal 1 Completions)</span></label>
									<span class="gapiCompletionsOne">Goal Completions: </span>
								</a>
							</li>
							<li>
								<a class="showSingle anchor" data-target="2" id="goal-metric-2">
									<label>Contact Form Submission<br /><span class="subtext">(Goal 2 Completions)</span></label>
									<span class="gapiCompletionsTwo">Goal Completions: </span>
								</a>
							</li>
							<li>
								<a class="showSingle anchor" data-target="3" id="goal-metric-3">
									<label>Mobile Click to Call<br /><span class="subtext">(Goal 3 Completions)</span></label>
									<span class="gapiCompletionsThree">Goal Completions: </span>
								</a>
							</li>
							<li>
								<a class="showSingle anchor" data-target="4" id="goal-metric-4">
									<label>Chat Lead Sent<br /><span class="subtext">(Goal 4 Completions)</span></label>
									<span class="gapiCompletionsFour">Goal Completions: </span>
								</a>
							</li>
							<li>
								<a class="showSingle anchor" data-target="5" id="goal-metric-5">
									<label>Print Coupon<br /><span class="subtext">Goal 5 Completions)</span></label>
									<span class="gapiCompletionsFive">Goal Completions: </span>
								</a>
							</li>
							<li>
								<a class="showSingle anchor" data-target="6" id="goal-metric-6">
									<label>Dynamic Call Tracking<br /><span class="subtext">Goal 6 Completions)</span></label>
									<span class="gapiTotalCallsSix">Total Calls: </span> | <span class="gapiConversionCallsSix">Conversion Calls: </span>
								</a>
							</li>
						</ul>
					</div>
					<div id="conversion-panel">
						<div id="chartdiv6" class="tall goal-metrics chart-1-container"></div>
						<div id="chartdiv7" class="tall goal-metrics chart-2-container"></div>
						<div id="chartdiv8" class="tall goal-metrics chart-3-container"></div>
						<div id="chartdiv9" class="tall goal-metrics chart-4-container"></div>
						<div id="chartdiv10" class="tall goal-metrics chart-5-container"></div>
					</div>
					<div class="clear"></div>
				</div>		
			</div>
			<div id="board-dni" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Call Tracking Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Most agencies will take credit for all calls being generated from your website, what they dont tell you is that they should not be claiming calls that did not come organically. Our advanced Call Tracking reporting algorithm tracks only calls that come in organically but also evaluates whether or not they provided any value. Calls can also be listed to for quality control.</span>
						</span>
					</h1>
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Dynamic Call Tracking</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">How Does Dynamic Number Insertion Work?</a></li>
							<li><a href="#tabs-3">How to analyze this data.</a></li>
						</ul>
						<div id="tabs-1">
							<h2>What is Dynamic Call Tracking?</h2>
							<p>Dynamic Number Insertion (DNI) shows you how many calls each specific method of online marketing is generating.</p>
							<p>You can track leads from web source, to phone call, to close sale. Dynamic Number Insertion fills in the ‘blind spots’ that exist in most companies’ marketing metrics. Dynamic Number Insertion will allow you to get answers about your marketing ROI. Answers save you money.</p>
						</div>
						<div id="tabs-2">
							<h2>How Does Dynamic Number Insertion Work?</h2>
							<p>Visitors to your website via different online sources (Google search, Yahoo search, PPC, email, banner ads, etc.) will actually see unique phone numbers on your website.</p>
							<p>Most agencies will take credit for all calls being generated from your website, what they dont tell you is that they should not be claiming calls that did not come organically. Our advanced Call Tracking reporting algorithm tracks only calls that come in organically but also evaluates whether or not they provided any value. Calls can also be listed to for quality control.</p>
							<p>For example: if I visit your website after a Google search I will see a different phone number on your website, than if I had visited via a PPC campaign. This is the case with any online marketing method. Dynamic Number Insertion automatically inserts a unique phone number on your website dependent on how someone reached your website.</p>
						</div>
						<div id="tabs-3">
							<h2>How to analyze this data</h2>
							<p>By using the Dynamic Call Tracking Board, your marketing team can benefit in various ways. Here are some of the benefits such software has to offer:</p>
							<p>Improved performance and productivity of sales teams – Our software provides features for sales reps to route the best leads to the right locations or agents. You can also identify which sales rep is performing the best and what techniques are working the most.</p>
						</div>
					</div>					
					<?php if (get_option('gapi_dev_conv_profile') <> ""){ ?>
					<div class="goalcontainer alignleft green" style="width:50%">
						<h2>Total Calls</h2>
						<div class="calls DispositionAnswered"><span></span></div>
					</div>
					<div class="goalcontainer alignleft orange" style="width:50%">
						<h2>Conversion Calls</h2>
						<div class="calls ValueCalls"><span></span></div>
					</div>
					<div class="clear"></div>
					<div id="rt-content-top">
						<div class="rt-grid-9 rt-alpha rt-omega">
							<div class="box2 title1">
								<div class="rt-block">
									<div class="module-title">
										<h2 class="title">Summary Information:</h2>
									</div>
									<div class="rt-module-inner">
										<div class="module-content" id="summary_box"> 
											<div class="summary-list">
												<ul class="bullet-9">
													<li id="TotalCount">Total Call Volume: <span style="text-align:right;"></span></li>
													<li class="DispositionAnswered">Answered Calls: <span style="text-align:right;"></span></li>
												</ul>
											</div>
											<div class="summary-list">
												<ul class="bullet-9">
													<li id="DispositionNoAnswer">Unanswered Calls: <span style="text-align:right;"></span></li>
													<li id="TotalCallMin">Total Call Minutes: <span style="text-align:right;"></span></li>
												</ul>
											</div>
											<div class="summary-list">
												<ul class="bullet-9">
													<li id="AvgCallDuration">Average Call Duration: <span style="text-align:right;"></span></li>
													<li class="ValueCalls">Total Call Conversions: <span style="text-align:right;"></span></li>
													<li id="ValueCallMinutes">Total Call Conversion Minutes: <span style="text-align:right;"></span></li>
												</ul>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<?php } else { ?>
					<h2>Call Tracking Data</h2>
					<p>Please call LeadsNearby and ask for more details about receiving Call Tracking data with Recording.</p>
					<?php } ?>					
				</div>
				<div class="secondary-board-data">
					<table class="tg tablesorter" id="conv_table" border='1'>
						<thead>
						<tr>
							<th id="convcalldate" class="tg-yw4l">Call Date</th>
							<th id="convtrackingnumber" class="tg-yw4l">Tracking Number</th>
							<th id="convdeposition" class="tg-yw4l">Disposition</th>
							<th id="convduration" class="tg-yw4l">Duration</th>
							<th id="convid" class="tg-yw4l">ID</th>
							<th id="convisoutbound" class="tg-yw4l">Is Outbound</th>
							<th id="convouid" class="tg-yw4l">OUID</th>
							<th id="convrepeatcall" class="tg-yw4l">Repeat Call</th>
							<th id="convcallerid" class="tg-yw4l">Caller ID</th>
							<th id="convringtonumber" class="tg-yw4l">Ring To Number</th>
							<th class="tg-yw4l">Play Audio File</th>
						</tr>
						</thead>
						<tbody>
						</tbody>
					</table>				
				</div>		
			</div>
			<div id="board-visitation" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Visitation Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Visitation data is collected to display how many people visit your website, whether they have visited before or not, as well what areas they are visiting from and what types of devices they are using to do their search.</span>
						</span>
					</h1>
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Audience Overview</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">Compare mobile conversion rates</a></li>
							<li><a href="#tabs-3">Target profitable geographic areas</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Use this section to understand your audience characteristics.</h2>
							<p>The Audience Overview reports provide insight into:</p>
							<ul>
								<li>The visitations of your audience</li>
								<li>The percentage of visitors by city.</li>
								<li>Your mix of new and return users</li>
								<li>The devices being used to access your site and the level of engagement of your users</li>
							</ul>
						</div>
						<div id="tabs-2">
							<h2>Compare mobile conversion rates.</h2>
							<p>Use the Overview report to review your traffic mix. Your mix of traffic sources will depend on your marketing strategy. Also, check your mix of keywords and referrals.</p>
							<ol>
								<li>Navigate to Device Overview.</li>
								<li>Look at Conversion Rates for your Devices. How do conversion rates for mobile (Yes) compare to those of desktop (No)?</li>
							</ol>
						</div>
						<div id="tabs-3">
							<h2>Target profitable geographic areas.</h2>
							<p>You can use the Location report to identify cities with higher than average performance metrics. You can then target campaigns to these areas.</p>
							<ol>
								<li>Navigate to Visitors by City</li>
								<li>You can now compare how regions/cities compare with respect to user traffic.</li>
							</ol>
						</div>
					</div>					
					<div id="chartdiv3" class="tall float-left col-1-2"></div>	
					<div id="chartdiv" class="tall float-left col-1-2"></div>
					<div class="clear"></div>
				</div>
				<div class="secondary-board-data">
					<h2>Device Overview</h2>
					<table class="tg" id="records_table" border='1'>
						<tr>
							<th class="tg-031e" rowspan="2">Device Category</th>
							<th class="tg-yw4l" colspan="2">Acquisition</th>
							<th class="tg-yw4l">Behavior</th>
							<th class="tg-yw4l" colspan="3">Conversions</th>
						</tr>
						<tr>
							<td class="tg-yw4l">Sessions</td>
							<td class="tg-yw4l">New Users</td>
							<td class="tg-yw4l">Pages / Sessions</td>
							<td class="tg-yw4l">Goal Conversion Rate</td>
							<td class="tg-yw4l">Goal Completions</td>
							<td class="tg-yw4l">Goal Values</td>
						</tr>
						<tr>
							<td class="tg-yw4l"></td>
							<td class="tg-yw4l gapiDeviceSessionsAll"></td>
							<td class="tg-yw4l gapiDeviceUsersAll"></td>
							<td class="tg-yw4l gapiDevicePageViewsAll"></td>
							<td class="tg-yw4l gapiGoalConversionsAll">%</td>
							<td class="tg-yw4l gapiGoalCompletionsAll"></td>
							<td class="tg-yw4l gapiGoalValueAll">$</td>
						</tr>
					</table>	
					<div id="chartdiv-Devices" class="float-left col-1-2"></div>
					<div id="chartdiv2" class="float-left col-1-2"></div>
					<div class="clear"></div>
				</div>		
			</div>
			<div id="board-visibility" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Visibility Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Our Visibility reporting shows you exactly where you stand with all of the popular search engines. With data such as Keyword ranking and Web ranking our subscribers can track rankings data over time to see which efforts are making the most impact.</span>
						</span>
					</h1>
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Web Ranking Data</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Track keywords and pages to save time and improve your SERP rankings.</h2>
							<p>Our powerful rank tracking software tool retrieves search engine rankings for pages and keywords, and stores them for easy comparison later. No need to manually check daily — Your LeadsNearby program subscribers can track rankings data over time to see which efforts are making the most impact.</p>
						</div>				
					</div>				
					<?php if (get_option('gapi_dev_web_rank_url') <> "") { ?>
						<iframe src="<?php echo $dev_web_rank_url ?>" height="1100" width="100%">
						  <p>Your browser does not support iframes.</p>
						</iframe>					
						<?php } else { ?>
						<p>Please call LeadsNearby and ask for more details about Web Ranking Data.</p>
					<?php } ?>				
				</div>
				<div class="secondary-board-data">
					<h2>Keyword Ranking Report</h2>	
					<?php if (get_option('gapi_dev_keyword_rank') <> ""){ ?>
						<iframe src="<?php echo $dev_keyword_rank ?>" height="1100" width="100%">
						  <p>Your browser does not support iframes.</p>
						</iframe>					
						<?php } else { ?>
						<p>Please call LeadsNearby and ask for more details about Web Ranking Data.</p>	
					<?php } ?>							
				</div>		
			</div>
			<div id="board-citations" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Citation Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Citations are defined as mentions of your business name and address on other webpages—even if there is no link to your website. Our advanced Citation reporting shows you your Top Citations, Active Citations, Pending Citations and Potential Citations.</span>
						</span>
					</h1>
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Citation Listing Report</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">Why are Citations important?</a></li>
						</ul>
						<div id="tabs-1">
							<h2>What are website citations?</h2>
							<p>Citations are defined as mentions of your business name and address on other webpages—even if there is no link to your website. An example of a citation might be an online yellow pages directory where your business is listed, but not linked to. Citations can also be found on local chamber of commerce pages, or on a local business association page that includes your business information, even if they are not linking at all to your website. </p>
						</div>
						<div id="tabs-2">
							<h2>Why are Citations important?</h2>
							<p>Citations are a key component of the ranking algorithms in Google and Bing. Other factors being equal, businesses with a greater number of citations will probably rank higher than businesses with fewer citations.
							<p>Citations from well-established and well-indexed portals (i.e., Superpages.com) help increase the degree of certainty the search engines have about your business's contact information and categorization. Citations help search engines confirm that businesses are who we thought they were.
							<p>Citations are particularly important in less-competitive niches, like plumbing or electrical, where many service providers don't have websites themselves. Without much other information, the search engines rely heavily on whatever information they can find.</p> 
						</div>					
					</div>					
					<?php if (get_option('gapi_dev_citations') <> ""){ ?>
					<table class="tg tablesorter" id="citation_report" border='1'>
						<tr>
							<th id="directory">Directory</th>
							<th id="listing">Listing URL</th>
							<th id="login">Login</th>
							<th id="password">Password</th>
							<th id="status">Status</th>
							<th id="accuracy">Accuracy</th>
						</tr>
					</table>
					<?php } elseif (get_option('gapi_dev_bl_citations') <> ""){ ?>
					<iframe src="<?php echo $dev_bl_citations  ?>" height="1500" width="100%">
					  <p>Your browser does not support iframes.</p>
					</iframe>					
					<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Citations.</p>
					<?php } ?>				
				</div>		
			</div>
			<div id="board-weather" class="analytics-board">
				<?php  if (get_option('gapi_weather_enable') == 1){ ?>
				<div class="board-title-container">
					<h1 class="board-name">Weather Board
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Are your Service and Installtion calls picking up, or slowing down and you cannot explain why? Have you taken the weather into consideration? The weather can have an incredible impact on your bottom line. Our Weather Reporting shows you a daily breakdown on how the weather is playing a lsrge role with website conversions.</span>
						</span>
					</h1>
					<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
					<div class="clear"></div>
				</div>
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2 id="location-data">Goals by Weather Data for <span class="location-city"></span>,&nbsp;<span class="location-state"></span></h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">How to analyze the data</a></li>
						</ul>
						<div id="tabs-1">
							<h2>How effective is Weather Based data.</h2>
							<p>Weather is a primary determinant of consumer purchase behaviour with everyday fluctuations affecting a wide range of industries - including food & drink, pharmaceuticals, apparel, travel & leisure, home & garden, energy and automotive.</p>
						</div>
						<div id="tabs-2">
							<h2>How you can use your weather data to analyze your user habits.</h2>
							<p>Weather targeting, or weather-based advertising is the practice of targeting consumers by local weather (past, current, or future). In other words, serving ads, or delivering promotions which correspond to the viewer’s weather conditions. For example, advertisements for Furnace installations could be served to consumers experiencing icy or snowy weather, or air duct cleaning could be promoted to audiences located in areas where there is a high pollen count.</p>
						</div>
					</div>
					<div id="monthly-calendar">
						<ul id="weather_report" class="week ng-scope first">
					</ul>
					</div>
				</div>
				<div class="secondary-board-data">
					<div id="chartdiv-weather" class="tall"></div>
				</div>
				<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Goal and Weather Data</p>
				<?php } ?>					
			</div>
			<div id="board-heatmap" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Home Page Heatmap
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Understand what users want, care about and do on your site by visually representing their clicks, taps and scrolling behavior – which are the strongest indicators of visitor motivation and desire.</span>
						</span>
					</h1>
					<div class="clear"></div>
				</div>
				<?php if (get_option('gapi_dev_heatmap_page') <> ""){ ?>
				<div class="primary-board-data">
					<iframe src="<?php echo $dev_heatmap_page  ?>" frameborder="0" width="100%" height="2500">
					  <p>Your browser does not support iframes.</p>
					</iframe>
				</div>
				<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Heatmap Data</p>
				<?php } ?>					
			</div>					
			<div id="board-reviews" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Review Flow
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Know exactly what your customers think about your business in real time. Our Review Flow data shows you all of your reviews in one place. View your aggregate score or drill down by individual review website to see how your measueing up.</span>
						</span>
					</h1>
					<div class="clear"></div>
				</div>
				<?php if (get_option('gapi_dev_bl_reviews') <> ""){ ?>
				<div class="primary-board-data">
					<iframe src="<?php echo $dev_bl_reviews  ?>" frameborder="0" width="100%" height="2500">
					  <p>Your browser does not support iframes.</p>
					</iframe>
				</div>
				<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Review Flow Data</p>
				<?php } ?>					
			</div>
			<div id="board-adwords" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Digital Advertisement
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Digital Advertisement Information</span>
						</span>
					</h1>
					<div class="clear"></div>
				</div>			
				<div class="primary-board-data">
					<div class="data-name-info">
						<h2>Campaign Data Table</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">Schedule your ads for optimal conversion hours</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Use the data in this section to optimize your AdWords campaigns.</h2>
							<p>The AdWords reports show you what happened after people clicked on your ads and arrived at your site. See the table below to see Impressions, Cost, and Revenue per Click metrics.</p>
						</div>
						<div id="tabs-2">
							<h2>Schedule your ads for optimal conversion hours.</h2>
							<p>Site traffic is not equally valuable at every hour of the day. For example, users may be more inclined to purchase items in the evening or on a weekend but still visit your site in the afternoon during the weekday.</p>
							<p>The Day Parts report helps you decide the best times to display your ads. You may wish to increase your bids during these times.
							<p><strong>Action</strong></p>
							<p>If your users convert or purchase more during specific day of the week or time of day, then you could set up ad scheduling in your AdWords campaign settings, whereby you increase or decrease your bids during specific times or days.</p>						
						</div>				
					</div>	
					<?php if (get_option('gapi_dev_adwords_url') <> "") { ?>
					<iframe src="<?php echo $dev_adwords_url ?>" height="1100" width="100%">
					  <p>Your browser does not support iframes.</p>
					</iframe>					
					<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Digital Advertising Data</p>
					<?php } ?>														
				</div>
			</div>
			<div id="board-speed" class="analytics-board">
				<div class="board-title-container">
					<h1 class="board-name">Site Speed
						<span class="dashicons dashicons-info">
							<span class="dashicons-info-box">Page speed is often confused with "site speed," which is actually the page speed for a sample of page views on a site. Page speed can be described in either "page load time" (the time it takes to fully display the content on a specific page) or "time to first byte" (how long it takes for your browser to receive the first byte of information from the web server).</span>
						</span>
					</h1>
					<div class="clear"></div>
				</div>
				<?php if (get_option('gapi_speed_enable') == 1){ ?>
				<div class="primary-board-data">

					<div class="data-name-info">
						<h2>Site Speed Page Timings</h2>
						<span class="edu-img"></span>
					</div>						
					<div class="edu-tabs">
						<ul>
							<li><a href="#tabs-1">Introduction</a></li>
							<li><a href="#tabs-2">How interpret Site Speed</a></li>
						</ul>
						<div id="tabs-1">
							<h2>Page Speed Insights measures the performance of a page for mobile devices and desktop devices. It fetches the url twice, once with a mobile user-agent, and once with a desktop-user agent.</h2>
							<p>The AdWords reports show you what happened after people clicked on your ads and arrived at your site. See the table below to see Impressions, Cost, and Revenue per Click metrics.</p>
							<p>In speed analysis, the average doesn't always provide an accurate accounting because a few outliers can skew that value. Being able to see the distribution of values provides a more accurate picture.</p>
						</div>
						<div id="tabs-2">
							<ul>
								<li><strong>Avg Page Load Time :</strong> The average amount of time (in seconds) it takes that page to load, from initiation of the pageview (e.g., click on a page link) to load completion in the browser.<br />
								<em>Avg. Page Load Time consists of two components: 1) network and server time, and 2) browser time. The Technical section of the Explorer tab provides details about the network and server metrics. The remaining time is the browser overhead for parsing and executing the JavaScript and rendering the page.</em></li>
								<li><strong>Pageviews :</strong> The number of times the page was viewed during the selected date range.</li>
								<li><strong>Page Load Sample :</strong> The number of pageviews that were sampled to calculate the average page-load time.</li>
								<li><strong>Bounce Rate :</strong> The percentage of views of a page where that page was the only one viewed in a session.</li>
								<li><strong>% Exit :</strong> The percentage of views of a page where that page was the last page in a session.</li>
								<li><strong>Page Value :</strong> The average value of the page or set of pages. Page Value = ((Transaction Revenue + Total Goal Value) / Unique Pageviews for the page or set of pages).</li>
							</ul>
						</div>
						<div id="tabs-2">
							<p>You can use the Site Speed report to measure where load times for your pages are having a critical impact. For example, you might learn that the target audience for your site is located in a geographic area where the Internet connection speed is generally slower than what is optimal for your pages. Or you might learn that the load times for your pages vary widely in different browsers. With these insights, you can take steps to improve your site performance in a very targeted way. For example:
							<ol>
								<li>For pages that show high load times in certain browsers, you can investigate browser issues, and deliver pages more streamlined for those browsers.</li>
								<li>If key geographic regions or ISPs are showing high load times, you can deliver alternate pages more suitable to lower bandwidth.</li>
								<li>If your landing pages show poor speeds, you can focus on improving the ones that have the most pageviews.</li>
								<li>If average load time is too high, you can determine the significance of the load time issue by exploring the spread across Page Load Time Buckets.</li>
							</ol>	
							<p>When you consider in which areas to increase speed, target the slowest speed metrics first (the ones with large values for load times). For example, if you have:</p>
							<ul>
								<li><strong>High Avg. Redirection Time :</strong> Analyze whether the redirects are necessary. Also check sources to see if a specific referrer is causing high redirect latency.</li>
								<li><strong>High Avg. Domain Lookup Time :</strong> Consider changing to a DNS provider that provides consistent and lower response times.</li>
								<li><strong>High Avg. Server Response Time :</strong> Reduce backend processing time or place a server closer to users.</li>
								<li><strong>High Avg. Page Download Time :</strong> Reduce your initial data size.</li>						
							</ul>
						</div>
					</div>				
									
					<div id="csa_speed_primary_dimension" class="csa-select">
						<form method="post" action="">
							<span class="label">Primary Dimension:</span> 
					        <input type="radio" name="speed_primary_dimension" value="pagePath" <?php checked(pagePath, get_option('gapi_speed_primary_dimension'), true); ?>><span>Page Path</span>
					        <input type="radio" name="speed_primary_dimension" value="pageTitle" <?php checked(pageTitle, get_option('gapi_speed_primary_dimension'), true); ?>><span>Page Title</span>
					        <div style="display: block; border: 1px solid rgb(204, 204, 204); padding: 10px; background-color: rgb(241, 241, 241); margin-top: 10px;">
								<div style="display:inline-block">
									<label>
										<span class="label">Secondary Dimension:</span> 
										<select name="speed_secondary_dimension" id="speed_secondary_dimension">
											<option value="" <?php if(get_option('gapi_speed_secondary_dimension') == ''){?>selected="selected"<?php }?>>Secondary Dimension</option>
											<option value="pagePath" <?php if(get_option('gapi_speed_secondary_dimension') == 'pagePath'){?>selected="selected"<?php }?>>Page Path</option>
											<option value="pageTitle" <?php if(get_option('gapi_speed_secondary_dimension') == 'pageTitle'){?>selected="selected"<?php }?>>Page Title</option>
										</select>
									</label>
								</div>
								<div style="display:inline-block; float: right;">
									<label>
										<span class="label">Show Rows:</span> 
										<select name="speed_max_results" id="speed_max_results">
											<option value="5" <?php if(get_option('gapi_speed_max_results') == '5'){?>selected="selected"<?php }?>>5</option>
											<option value="10" <?php if(get_option('gapi_speed_max_results') == '10'){?>selected="selected"<?php }?>>10</option>
											<option value="25" <?php if(get_option('gapi_speed_max_results') == '25'){?>selected="selected"<?php }?>>25</option>
											<option value="50" <?php if(get_option('gapi_speed_max_results') == '50'){?>selected="selected"<?php }?>>50</option>
											<option value="100" <?php if(get_option('gapi_speed_max_results') == '100'){?>selected="selected"<?php }?>>100</option>
										</select>
									</label>
								</div>							
							</div>							
							<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
							<input type="hidden" name="gapi_speed_metrics_dimensions" value="save" style="display:none;" />
						</form>		
					</div>
					<table class="tg" id="speed_table" border='1'>
						<tr>
							<?php if ($gapi_speed_primary_dimension == 'pagePath') { ?>
							<th class="tg-031e" rowspan="1">Page</th>
							<?php } elseif ($gapi_speed_primary_dimension == 'pageTitle') { ?>
							<th class="tg-031e" rowspan="1">Page Title</th>
							<?php } else { ?>
							<th class="tg-031e" rowspan="1">Page</th>
							<?php } ?>
							<!-- Secondary Channel Group Addition -->
							<?php if ($gapi_speed_secondary_dimension == 'pagePath') { ?>
							<th class="tg-031e" rowspan="1">Page Path</th>
							<?php } elseif ($gapi_speed_secondary_dimension == 'pageTitle') { ?>
							<th class="tg-031e" rowspan="1">Page Title</th>
							<?php } ?>
							<th class="tg-yw4l" colspan="1">Avg. Page Load Time (sec)</th>
                            <th class="tg-yw4l" colspan="1">Pageviews</th>
                            <th class="tg-yw4l" colspan="1">Bounce Rate</th>
                            <th class="tg-yw4l" colspan="1">%Exit</th>
                            <th class="tg-yw4l" colspan="1">Page Value</th>
						</tr>
						<tr>
							<td class="tg-yw4l"></td>
							<?php if ($gapi_speed_primary_dimension <> '' && $gapi_speed_secondary_dimension <> '') { ?>
							<td class="sec tg-yw4l"></td>
							<?php } ?>						
							<td class="tg-yw4l gapiavgPageLoadTime"></td>
							<td class="tg-yw4l gapipageviews"></td>
							<td class="tg-yw4l gapibounceRate">%</td>
							<td class="tg-yw4l gapiexitRate">%</td>
							<td class="tg-yw4l gapipageValue">$</td>
						</tr>
					</table>				

				</div>
				<?php } else { ?>
					<p>Please call LeadsNearby and ask for more details about Site Speed Data</p>
				<?php } ?>					
			</div>			
		</div><!-- End #csanalytics-data -->
	<div id="loading"></div>
	</div><!-- End #panel-Board -->
	<div class="clear"></div>
</div><!-- End #admin-panel-container -->
</div><!-- End #admin-panel-wrapper -->
<?php if (get_option('gapi_weather_enable') == 1){ ?>	
<script>	
/*
 * Weather Data
 ***********************************************************************************
 */ 
	function changeData() {
		var dataProvider = [];
		var weather = chartData1.data.weather;
		for (var i = 0; i < weather.length; ++i) {
			var date = AmCharts.stringToDate(weather[i].date, "YYYY-MM-DD");
			dataProvider.push({
				"date": date,
				"tempF": weather[i].hourly[0].tempF
			});
		}
		for (var i = 0; i < chartData2.length; ++i) {
			var data = chartData2[i];
			var date = AmCharts.stringToDate(data.date, "YYYYMMDD");
			dataProvider.push({
				"date": date,
				"goalCompletionsAll": data.goalCompletionsAll,
				"goalConversionRateAll": data.goalConversionRateAll,
				"goalvalueall": data.goalvalueall
			});
		}
		dataProvider.sort(function (x, y) {
			return x.date.getTime() - y.date.getTime();
		});
		chart.dataProvider = dataProvider;
		chart.validateData();
	}
	AmCharts.loadFile(WeatherAPI, { async: true }, function (response) {
		chartData1 = AmCharts.parseJSON(response);
		--remaining;
		if (remaining === 0) {
			changeData();
		}
	});
	AmCharts.loadFile(GoalValueTotals, { async: true }, function (response) {
		chartData2 = AmCharts.parseJSON(response);
		--remaining;
		if (remaining === 0) {
			changeData();
		}
	});
	var chart = AmCharts.makeChart( "chartdiv-weather", {
		"type": "serial",
		"creditsPosition": "top-right",
		"categoryField": "date",
		"startDuration": 1,
		"precision": 2,		
		"categoryAxis": {
			"parseDates": true
		},
		"guides": [],
		"valueAxes": [{
			"id": "v1",
			"gridAlpha": 0.07,
			"title": "Temperature"
		},{
			"id": "v2",
			"gridAlpha": 0,
			"position": "right",
			"title": "Goal Value"
		}],
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],	  
		"graphs": [{
			"balloonText": "[[title]] on [[date]]:[[goalCompletionsAll]]",  
			"type": "column",
			"title": "Goal Completions",
			"valueField": "goalCompletionsAll",
			"labelText": "[[value]]",
			"lineAlpha": 0,
			"fillAlphas": 0.6
		},{
			"balloonText": "[[title]] on [[date]]:[[goalConversionRateAll]]%",  
			"type": "column",
			"title": "Goal Conversions",
			"valueField": "goalConversionRateAll",
			"labelText": "[[value]]%",
			"lineAlpha": 0,
			"fillAlphas": 0.6
		},{
			"balloonText": "[[title]] on [[date]]: $[[goalvalueall]]",  
			"type": "line",
			"valueAxis": "v2",
			"title": "Goal Value",
			"valueField": "goalvalueall",
			"labelText": "$[[value]]",
			"lineThickness": 2,
			"bullet": "round"
		},{
			"balloonText": "[[title]] of [[date]]:[[value]]",
			"type": "line",
			"bullet": "round",
			"id": "webrank-graph",
			"labelText": "[[value]]",
			"title": "Daily Temperature",
			"valueField": "tempF"
		}],
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Goals / Weather Data"
		}],	  
		"legend": {
			"useGraphSettings": true
		},
		"export": AmCharts.exportCFG
	});	
</script>	
<?php  } ?>
<?php  } ?>