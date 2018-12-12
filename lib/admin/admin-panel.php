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
        $dev_social_url = get_option('gapi_dev_social_url');
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
		$adwords_enable = get_option('gapi_adwords_enable');
		$speed_enable = get_option('gapi_speed_enable');
		$gapi_max_results = get_option('gapi_max_results');
		$gapi_max_results_list = $gapi_max_results ?: '5';
		$gapi_adw_max_results = get_option('gapi_adw_max_results');
		$gapi_adw_max_results_list = $gapi_adw_max_results ?: '3';
		$gapi_speed_max_results = get_option('gapi_speed_max_results');
		$gapi_speed_max_results_list = $gapi_speed_max_results ?: '5';
		$dev_ontraport_enable = get_option('gapi_dev_ontraport_enable');
		$dev_ontraport_clientkey = get_option('gapi_dev_ontraport_clientkey');
		$dev_servicetitan_apikey = get_option('gapi_dev_servicetitan_apikey');
		$gapi_st_max_results = get_option('gapi_st_max_results');
		$gapi_st_max_results_list = $gapi_st_max_results ?: '50';
	?>

<script src="//canvg.github.io/canvg/canvg.js" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.min.js" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/canvg/1.4.0/canvg.min.js" crossorigin="anonymous"></script>


	<link  type="text/css" href="//www.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet">
    <script src="//www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="//www.amcharts.com/lib/3/serial.js"></script>
    <script src="//www.amcharts.com/lib/3/pie.js"></script>	
    <script src="//www.amcharts.com/lib/3/funnel.js"></script>
	<script src="//www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="//www.amcharts.com/lib/3/plugins/dataloader/dataloader.min.js"></script>
	<script src="//www.amcharts.com/lib/3/plugins/export/export.js"></script>
	<script src="//www.amcharts.com/lib/3/plugins/export/examples/export.config.default.js"></script>	

	<!-- Include Required Prerequisites -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />-->
	 
	<!-- Include Date Range Picker -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Icomoon -->
	<link rel="stylesheet" href="https://s3.amazonaws.com/icomoon.io/145106/CSAnalytics/style.css?nuc54k">

<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<style>

	</style>
	<script>
	//Date Variables
	<?php  if (get_option('gapi_calendar_diff') <> ""){ ?> 
	var diff = <?php echo $diff ?>;
	<?php  } else { ?>
	var diff = 0;
	<?php  } ?>
	var startdate = '<?php echo $fromDate ?>';
	var enddate = '<?php echo $toDate ?>';
	//World Weather API Data
	<?php  if (get_option('gapi_weather_enable') == 1){ ?>
		//Weather Data
		var zipcode = '<?php echo $weatherzip ?>';
		var appid = '<?php echo $weatherapi ?>';
		var timeperiod ='24';			
		var WeatherAPI = '//api.worldweatheronline.com/premium/v1/past-weather.ashx?q='+ zipcode +'&format=json&date='+ startdate +'&enddate='+ enddate +'&tp='+ timeperiod +'&key='+ appid
	<?php  } ?>
	//OntraPort
	var OntraPortClientKey = '<?php echo $dev_ontraport_clientkey ?>';
	var OntraPortMessagesTotal = '<?php echo plugins_url('/csanalytics/lib/data/data_OntraPortMessagesTotal.php'); ?>';
	var OntraPortMessages = '<?php echo plugins_url('/csanalytics/lib/data/data-OntraPortMessages.php'); ?>';
	var OntraPortContacts = '<?php echo plugins_url('/csanalytics/lib/data/data-OntraPortContacts.php'); ?>';
	var OntraPortConversions = 'https://lnbdev.com/integrations/reporting/?apikey=90f49afe-e2aa-4f99-9e03-864ab2dfa9f5&client_key='+ OntraPortClientKey +'&before_date='+ enddate +'&after_date='+ startdate
	var OntraPortGroups = '<?php echo plugins_url('/csanalytics/lib/data/data-OntraPortGroups.php'); ?>';

    <?php if (get_option('gapi_dev_servicetitan_apikey') <> ""){ ?>

	//ServiceTitan Data
	var ServiceTitanPageSize = '<?php echo $gapi_st_max_results ?>';
	var ServiceTitan_apikey = '<?php echo $dev_servicetitan_apikey ?>';
	var ServiceTitanCampaigns = 'https://api.servicetitan.com/v1/campaigns?serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanCalls = 'https://api.servicetitan.com/v1/calls?filter.pageSize='+ ServiceTitanPageSize +'&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanJobs = 'https://api.servicetitan.com/v1/jobs?filter.pageSize='+ ServiceTitanPageSize +'&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanJobsTotal = 'https://api.servicetitan.com/v1/jobs?filter.pageSize=2000&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	
    <?php } ?>

    <?php if (get_option('gapi_dev_conv_profile') <> ""){ ?>
    //Convirza Tracking
	var ConvExtID = '<?php echo $dev_conv_profile ?>';
	var ConvAPIKey = '369281456857b6910b0b8e0b1d7b046c';   
	var ConvAPISec= '%241%24SVUTmT1e%24hqQHTUvAFOoUuZ5bFVqle.';
	var NewConvData ='https://api.logmycalls.com/services/getCallDetails?criteria[external_ouid]='+ConvExtID+'&criteria[start_calldate]='+startdate+'&criteria[end_calldate]='+enddate+'&api_key='+ConvAPIKey+'&api_secret='+ConvAPISec+'&limit=1000&sort_by=id&sort_order=asc';	
    <?php } ?>
    
    //Google Goal Data
	var AdWords = '<?php echo plugins_url('/csanalytics/lib/data/data-Adwords.php'); ?>';     
	var AdWordsDevices = '<?php echo plugins_url('/csanalytics/lib/data/data-DevicesImpClicks.php'); ?>';
	var AdWordsImpClicksSerial = '<?php echo plugins_url('/csanalytics/lib/data/data-AdWordsImpClicksSerial.php'); ?>';
	var GoalOneData = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalOneData.php'); ?>';
	var GoalTwoData = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalTwoData.php'); ?>';
	var GoalThreeData = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalThreeData.php'); ?>';
	var GoalFourData = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalFourData.php'); ?>';
	var GoalFiveData = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalFiveData.php'); ?>';
	var GoalCompletionRateAll = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalCompletionRateAll.php'); ?>';
	var GoalValueTotals = '<?php echo plugins_url('/csanalytics/lib/data/data-GoalValueTotals.php'); ?>';				
	var dataChannelGroupingAll = '<?php echo plugins_url('/csanalytics/lib/data/data-ChannelData.php'); ?>';	
	var countryBySession = '<?php echo plugins_url('/csanalytics/lib/data/data-CountryBySessions.php'); ?>';
	var dataDevicesAll = '<?php echo plugins_url('/csanalytics/lib/data/data-Devices.php'); ?>';
	var newVSReturning = '<?php echo plugins_url('/csanalytics/lib/data/data-NewVsReturningUsers.php'); ?>';
	var VisitorsByDate = '<?php echo plugins_url('/csanalytics/lib/data/data-VisitorsByDate.php'); ?>';
	var SessionsPageViews = '<?php echo plugins_url('/csanalytics/lib/data/data-SessionsPageViews.php'); ?>';
	var UsersSessionsPageViews = '<?php echo plugins_url('/csanalytics/lib/data/data-UsersSessionsPageViews.php'); ?>';   
	var SiteSpeed = '<?php echo plugins_url('/csanalytics/lib/data/data-SiteSpeed.php'); ?>';  	
	var ReferralPath = '<?php echo plugins_url('/csanalytics/lib/data/data-SiteSpeed.php'); ?>';

    //Keyword Data
    var KeywordRank = '<?php echo plugins_url('/csanalytics/lib/csv-json/keyword-csv-converter.php'); ?>';

    //Web Ranking Data
    var WebRank = '<?php echo plugins_url('/csanalytics/lib/csv-json/web-csv-converter.php'); ?>';

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
    <?php if (get_option('gapi_dev_servicetitan_apikey') <> ""){ ?>
	//ServiceTitan Variables
	var totalcallcount = 0;
	var totalbookedcalls = '';
	var totalbookedrevenue = 0;
	var totalpurchases = '';
	var callsid = '';
	var callscampaignType = '';
	var leadType = '';
	var recordingUrl = '';
	var duration = '';
	var receivedOn = '';
	var customerNumber = '';
	var jobsid = '';
	var jobscampaignType = '';
	var jobscustomerName = '';
	var jobSummary = '';
	var jobStartDate = '';
	var jobssubtotal = 0;
	var jobstotal = 0;
    <?php } ?>
	//OntraPort Variables
	var newContacts = 0;
	var emailSent = 0;
	var emailOpened = 0;
	var emailClicked = 0;
	var contactUnsubscribed = 0;
	var emailSentTotal = 0;
	var emailOpenedTotal = 0;
	var emailClickedTotal = 0;
	var contactUnsubscribedTotal = 0;
	var conversionsTotal = 0;
	var campaignNotOpened = 0;
	var campaignNotClicked = 0;	

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
    
	//AdWords Variables
    var NewAdGoalCompletions = 0;
    var NewAdGoalConversions = 0;
	var NewTotalAdClicks = 0;
	var NewTotalAdCost = 0;
	var NewTotalAdCPC = 0;
	var NewTotalAdCTR = 0;
    var NewTotalAdImpressions = 0;

	var AdGoalCompletions = 0;
	var AdGoalConversions = 0;
	var avgCPCTotal = '';	
	var avgCTRTotal = '';
	var TotalAdClicks = 0;
	var TotalAdCost = 0;
	var TotalAdCPC = 0;
	var TotalAdCTR = 0;
	var TotalAdBR = 0;
	var TotalAdPS = 0;
	var TotalAdCPM = 0;
	var TotalAdImpressions = 0;
	var TotalCampaigns = 0;
	var campaign = 0;
	var rpc = 0;
	var ctr = 0;
	var cpc = 0;
	var cpm = 0;
	var impressions = 0;
	var adclicks = 0;
	var adcost = 0;
	var ROAS = 0;
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
	
	<?php if (get_option('gapi_adwords_enable') == 1){ ?>	

	var chart = AmCharts.makeChart("chartdiv-adimpressions", {
		"type": "serial",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsImpClicksSerial,
			"format": "json"
		},
		"borderColor": "#FFFFFF",
		"categoryField": "date",
		"categoryAxis": {
			"gridPosition": "start",
			"startOnAxis": true,
			"autoGridCount": false,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF",
			"gridThickness": 0,
			"labelsEnabled": false
		},		
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"gridAboveGraphs": false,
		"graphs": [{
			//"lineAlpha": 1,
			//"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[impressions]]",
			"lineColor": "#058DC7",
			"fillAlphas": 0.7,
			"type": "smoothedLine",
			"title": "Impressions",
			"valueField": "impressions"		
		}],
		"valueAxes": [{
			"labelsEnabled": false,
			"gridThickness": 0,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF"
		}],			
	});

	var chart = AmCharts.makeChart("chartdiv-adclicks", {
		"type": "serial",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsImpClicksSerial,
			"format": "json"
		},
		"borderColor": "#FFFFFF",
		"categoryField": "date",
		"categoryAxis": {
			"gridPosition": "start",
			"startOnAxis": true,
			"autoGridCount": false,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF",
			"gridThickness": 0,
			"labelsEnabled": false
		},		
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"gridAboveGraphs": false,
		"graphs": [{
			"lineAlpha": 1,
			"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[adclicks]]",
			"lineColor": "#058DC7",
			"fillAlphas": 0.7,
			"type": "smoothedLine",
			"title": "Clicks",
			"valueField": "adclicks"		
		}],
		"valueAxes": [{
			"labelsEnabled": false,
			"gridThickness": 0,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF"
		}],			
	});			

	var chart = AmCharts.makeChart("chartdiv-adctr", {
		"type": "serial",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsImpClicksSerial,
			"format": "json"
		},
		"borderColor": "#FFFFFF",
		"categoryField": "date",
		"categoryAxis": {
			"gridPosition": "start",
			"startOnAxis": true,
			"autoGridCount": false,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF",
			"gridThickness": 0,
			"labelsEnabled": false
		},		
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"gridAboveGraphs": false,
		"graphs": [{
			"lineAlpha": 1,
			"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[adctr]]",
			"lineColor": "#058DC7",
			"fillAlphas": 0.7,
			"type": "smoothedLine",
			"title": "Clicks",
			"valueField": "adctr"		
		}],
		"valueAxes": [{
			"labelsEnabled": false,
			"gridThickness": 0,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF"
		}],			
	});	

	var chart = AmCharts.makeChart("chartdiv-adcpc", {
		"type": "serial",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsImpClicksSerial,
			"format": "json"
		},
		"borderColor": "#FFFFFF",
		"categoryField": "date",
		"categoryAxis": {
			"gridPosition": "start",
			"startOnAxis": true,
			"autoGridCount": false,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF",
			"gridThickness": 0,
			"labelsEnabled": false
		},		
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"gridAboveGraphs": false,
		"graphs": [{
			"lineAlpha": 1,
			"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[adcpc]]",
			"lineColor": "#058DC7",
			"fillAlphas": 0.7,
			"type": "smoothedLine",
			"title": "Clicks",
			"valueField": "adcpc"		
		}],
		"valueAxes": [{
			"labelsEnabled": false,
			"gridThickness": 0,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF"
		}],			
	});	

	var chart = AmCharts.makeChart("chartdiv-adcost", {
		"type": "serial",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsImpClicksSerial,
			"format": "json"
		},
		"borderColor": "#FFFFFF",
		"categoryField": "date",
		"categoryAxis": {
			"gridPosition": "start",
			"startOnAxis": true,
			"autoGridCount": false,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF",
			"gridThickness": 0,
			"labelsEnabled": false
		},		
		"dataDateFormat": "YYYYMMDD",
		"startDuration": 1,
		"gridAboveGraphs": false,
		"graphs": [{
			"lineAlpha": 1,
			"lineThickness": 2,
			"balloonText": "[[title]] on [[date]]:[[adcost]]",
			"lineColor": "#058DC7",
			"fillAlphas": 0.7,
			"type": "smoothedLine",
			"title": "Clicks",
			"valueField": "adcost"		
		}],
		"valueAxes": [{
			"labelsEnabled": false,
			"gridThickness": 0,
			"axisAlpha": 0,
			"axisColor": "#FFFFFF",
			"axisThickness": 0,
			"gridColor": "#FFFFFF"
		}],			
	});	

	var chart = AmCharts.makeChart( "AdWordsDevicesImpressions", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsDevices,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "impressions",
		"titleField": "device",
		"labelsEnabled": false,
		"radius": "42%",
		"innerRadius": "60%",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Impressions By Device"
		}],		
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},
		"export": AmCharts.exportCFG
	});
	var chart = AmCharts.makeChart( "AdWordsDevicesClicks", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": AdWordsDevices,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "clicks",
		"titleField": "device",
		"labelsEnabled": false,
		"radius": "42%",
		"innerRadius": "60%",		
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Clicks By Device"
		}],		
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},
		"export": AmCharts.exportCFG
	});	
	var chart = AmCharts.makeChart("AdWordsImpClicksSerial",{
    "type": "serial",
    "theme": "light",
    "dataLoader": {
        "url": AdWordsImpClicksSerial,
        "format": "json"
    },        
    "categoryField": "date",
    "plotAreaBorderAlpha": 1,
    "dataDateFormat": "YYYYMMDD",
    "autoMarginOffset": 0,
    "startDuration": 1,
    "autoMarginOffset": 0,
    "autoMargins": false,
    "categoryAxis": {
        "startOnAxis": true,
        "labelsEnabled": false,
        //"parseDates": true,
        "axisAlpha": 0,
        "gridPosition": "start"
    },
    "trendLines": [],
    "graphs": [
        {
            "balloonText": "[[title]] on [[category]]:[[value]]",
            "id": "AmGraph-1",
            "title": "Ad Impressions",
            "type": "smoothedLine",
            "valueField": "impressions",
            "fillAlphas": 0.7
        },
        {
            "balloonText": "[[title]] on [[category]]:[[value]]",
			"bullet": "round",
			"id": "AmGraph-2",
			"title": "Ad Clicks",
			"valueField": "adclicks",
			"valueAxis": "ValueAxis-2"
        },
        {
            "balloonText": "[[title]] on [[category]]:[[value]]",
			"bullet": "square",
			"id": "AmGraph-3",
			"title": "Ad Cost",
			"valueField": "adcost",
			"valueAxis": "ValueAxis-2"
        }
    ],
    "guides": [],
    "valueAxes": [
        {
            "id": "ValueAxis-1",
            "title": "Axis title",
            "labelsEnabled": false,
            "autoGridCount": false,
            "labelFrequency": 8
        },{
            "id": "ValueAxis-2",
            "position": "right",
            "labelsEnabled": false,
            "autoGridCount": false,
            "labelFrequency": 8
        }
    ],
    "allLabels": [],
    "balloon": {},
    "legend": {
        "enabled": true,
        "align": "center",
        "markerType": "circle"
    },
	"export": AmCharts.exportCFG
});
	<?php } ?>	

	var chart = AmCharts.makeChart( "chartdiv", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": countryBySession,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "sessions",
		"titleField": "country",
		"labelsEnabled": false,
		"radius": "42%",
  		"innerRadius": "60%",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Percentage of Visitors by City"
		}],		
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},
		"export": AmCharts.exportCFG
	});
	var chart = AmCharts.makeChart( "chartdiv-channeldata", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": dataChannelGroupingAll,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "sessions",
		"titleField": "channelGrouping",
		"labelsEnabled": false,
		"radius": "42%",
		"innerRadius": "60%",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "Website Visitors"
		}],		
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},
		"export": AmCharts.exportCFG
	});	
    var chart = AmCharts.makeChart( "chartdiv-Devices", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": dataDevicesAll,
			"format": "json"
		},
		"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
		"titleField": "devices",
		"valueField": "sessions",
		"radius": "42%",
		"innerRadius": "60%",
		"labelsEnabled": false,		
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},
		"export": AmCharts.exportCFG		
	});
    var chart = AmCharts.makeChart( "chartdiv2", {
		"type": "pie",
		"theme": "light",
		"dataLoader": {
			"url": newVSReturning,
			"format": "json"
		},
		"startDuration": 1,
		"valueField": "sessions",
		"titleField": "users",
		"labelsEnabled": false,
		"radius": "42%",
  		"innerRadius": "60%",
		"titles": [{
			"id": "Title-1",
			"size": 15,
			"text": "New vs Returning Visitors"
		}],
		"legend": {
			"enabled": true,
			"align": "center",
			"markerBorderAlpha": 0,
			"markerType": "circle",
			"position": "right",
			"valueWidth": 45
		},				
		"export": AmCharts.exportCFG
	});
	var chart = AmCharts.makeChart("chartdiv3", {
		"type": "serial",
		"theme": "light",
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
			"fillAlphas": 0.7,
			"fillColors": "#AADFF3",
			"type": "smoothedLine",
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
		"theme": "light",
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
			"startOnAxis": true,		
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Total of [[title]]:$[[goal1values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 1 Values",
			"type": "smoothedLine",
			"fillAlphas": 0.7,
			"valueField": "goal1values"
		},{
			"balloonText": "Number of [[title]]:[[goal1completions]]",
			"fillAlphas": 1,
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 1 Completions",
			"type": "smoothedLine",
			"fillAlphas": 0.5,
			"valueField": "goal1completions"
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
		"theme": "light",
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
			"startOnAxis": true,		
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal2completions]]",
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 2 Completions",
			"type": "smoothedLine",
			"fillAlphas": 0.7,
			"valueField": "goal2completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal2values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 2 Values",
			"type": "smoothedLine",
			"fillAlphas": 0.5,
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
		"theme": "light",
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
			"startOnAxis": true,		
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal3completions]]",
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 3 Completions",
			"type": "smoothedLine",
			"fillAlphas": 0.7,
			"valueField": "goal3completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal3values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 3 Values",
			"type": "smoothedLine",
			"fillAlphas": 0.5,
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
		"theme": "light",
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
			"startOnAxis": true,		
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal4completions]]",
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 3 Completions",
			"type": "smoothedLine",
			"fillAlphas": 0.7,
			"valueField": "goal3completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal4values]]",
			"id": "AmGraph-4",
			"labelText": "[[value]]",
			"title": "Goal 4 Values",
			"type": "smoothedLine",
			"fillAlphas": 0.5,
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
		"theme": "light",
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
			"startOnAxis": true,		
		},
		"chartCursor": {},
		"chartScrollbar": {},
		"trendLines": [],
		"graphs": [{
			"balloonText": "Number of [[title]]:[[goal5completions]]",
			"id": "AmGraph-1",
			"labelText": "[[value]]",
			"title": "Goal 5 Completions",
			"type": "smoothedLine",
			"fillAlphas": 0.7,
			"valueField": "goal5completions"
		},{
			"balloonText": "Total of [[title]]:$[[goal5values]]",
			"id": "AmGraph-5",
			"labelText": "[[value]]",
			"title": "Goal 3 Values",
			"type": "smoothedLine",
			"fillAlphas": 0.5,
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
		"theme": "light",
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
			"type": "smoothedLine",
			"title": "Goal Completions",
			"valueField": "goalCompletionsAll",
			"labelText": "[[value]]",
			"lineAlpha": 0,
			"fillAlphas": 0.7
		},{
			"balloonText": "[[title]] on [[date]]:[[goalConversionRateAll]]%",  
			"type": "smoothedLine",
			"title": "Goal Conversions",
			"valueField": "goalConversionRateAll",
			"labelText": "[[value]]%",
			"lineAlpha": 0,
			"fillAlphas": 0.7
		},{
			"balloonText": "[[title]] on [[date]]: $[[goalvalueall]]",  
			"type": "smoothedLine",
			"valueAxis": "v2",
			"title": "Goal Value",
			"valueField": "goalvalueall",
			"labelText": "$[[value]]",
			"lineThickness": 2,
			"fillAlphas": 0.7
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
		
		//Toggle Sidebar Menu
		jQuery(".sidebar-toggle").click(function() {
            jQuery('#admin-panel-wrapper').toggleClass("sidebar-collapse");
        });

    <?php if (get_option('gapi_dev_servicetitan_apikey') <> ""){ ?>
//-------- ServiceTitan Data Start

//-------- ServiceTitan Calls Start
        let stdropdown = jQuery('#st-campaign-dropdown');
        stdropdown.empty();
        stdropdown.append('<option selected="true" disabled>Choose Campaign</option>');
        stdropdown.prop('selectedIndex', 0);
        
        // Populate dropdown with list of campaigns
        jQuery.when (
            jQuery.getJSON(ServiceTitanCampaigns)
        ).done(function (data) {
          jQuery.each(data.data, function (i, item) {
                stdropdown.append(jQuery('<option></option>').attr('value', data.data[i].id).text(data.data[i].name));  
          })
        });
        
        jQuery("#st-campaign-dropdown").change(function(){
            var stcampaignselect = jQuery("#st-campaign-dropdown option:selected").val();
            var stcampaignname = jQuery("#st-campaign-dropdown option:selected").text();
            jQuery('#dev_st_campaign_group').val(stcampaignselect);
            jQuery('#dev_st_campaign_group_name').val(stcampaignname);
            alert("You have selected the campaign - " + stcampaignname);
            jQuery(this).closest('form').trigger('submit');
		});
		

		//Begin OntraPort Data
		jQuery.when(
			jQuery.getJSON(ServiceTitanCalls),
			jQuery.getJSON(ServiceTitanJobs),
			jQuery.getJSON(ServiceTitanJobsTotal)
		).done (function (data, data2, data3) {

			var stCallsHTML = '';
			var stJobsHTML = '';
			
			//ST Calls
			jQuery.each(data[0].data, function (i, item) {

				var callsid = data[0].data[i].leadCall.id;
				//var totalcallcount = data[0].totalCount;

				if (data[0].data[i].leadCall.campaign != null && data[0].data[i].leadCall.campaign.id == "<?php echo get_option('gapi_dev_st_campaign_group'); ?>") {							
					var callscampaignType = data[0].data[i].leadCall.campaign.name;
					var leadType = data[0].data[i].leadCall.callType;
					var recordingUrl = data[0].data[i].leadCall.recordingUrl;
					var duration = data[0].data[i].leadCall.duration;
					var receivedOn = data[0].data[i].leadCall.receivedOn;
					var customerNumber = data[0].data[i].leadCall.from;

					stCallsHTML += '<tr><td>' + callsid + '</td><td>' + callscampaignType + '</td><td>' + leadType + '</td><td>' + duration + '</td><td>' + receivedOn + '</td><td>' + customerNumber + '</td><td class="tg-yw4l"><audio src="https://api.servicetitan.com/v1/calls/recording/' + callsid + '?serviceTitanApiKey=' + ServiceTitan_apikey + '" controls></audio></td></tr>';

					var chart = AmCharts.makeChart("chartdiv-stleadtype",{
						"type": "pie",
						"balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
						"innerRadius": "40%",
						"titleField": "LeadType",
						"valueField": leadType,
						"allLabels": [],
						"balloon": {},
						"legend": {
							"enabled": true,
							"align": "center",
							"markerType": "circle"
						},
						"titles": [],
					});

				}									 	 
			});
			jQuery('#stcalls_table tbody').append(stCallsHTML);
			
			jQuery.each(data2[0].data, function (i, item) {
		
				var jobsid = data2[0].data[i].id;

				if (data2[0].data[i].campaign != null && data2[0].data[i].campaign.id == "<?php echo get_option('gapi_dev_st_campaign_group'); ?>") {							
					var jobscampaignType = data2[0].data[i].campaign.name;
					var jobscustomerName = data2[0].data[i].customer.name;
					var jobSummary = data2[0].data[i].summary;
					var jobStartDate = data2[0].data[i].start;
					var jobssubtotal = data2[0].data[i].invoice.subtotal;
					var jobstotal = data2[0].data[i].invoice.total;

					stJobsHTML += '<tr><td>' + jobsid + '</td><td>' + jobscampaignType + '</td><td>' + jobscustomerName + '</td><td>' + jobStartDate + '</td><td>' + jobstotal + '</td><td class="tg-yw4l">' + jobSummary + '</td></tr>';
				}										 
			});
			jQuery('#stjobs_table tbody').append(stJobsHTML);

			jQuery.each(data3[0].data, function (i, item) {

				if (data3[0].data[i].campaign != null && data3[0].data[i].campaign.id == "<?php echo get_option('gapi_dev_st_campaign_group'); ?>") {							

					totalbookedcalls = data3[0].data.filter(function(o) { 
						return o.campaign.name == "<?php echo get_option('gapi_dev_st_campaign_group_name'); ?>"
					}).length;

					if(data3[0].data[i].invoice.total != 0.00){
						totalpurchases = data3[0].data.filter(function(item){
							return item.invoice.total;
						}).length;
					}				
					
					totalbookedrevenue += parseFloat(data3[0].data[i].invoice.total);
				}										 
			});
  
				jQuery.each(data3[0], function(i, val){
					var callsobject = data3[0]
					var totalcallcount = Object.keys(callsobject).length;
				});

			var chart = AmCharts.makeChart("chartdiv-stcampaignfunnel", {
				"type": "funnel",
				"balloonText": "[[title]]:<b>[[value]]</b>",
				"labelsEnabled": false,
				"neckHeight": "20%",
				"neckWidth": "20%",
				"marginLeft": 0,
				"marginRight": 0,
				"titleField": "title",
				"valueField": "value",
				"allLabels": [],
				"balloon": {},
				"titles": [],
				"legend": {
					"enabled": true,
					"align": "center",
					"markerBorderAlpha": 0,
					"markerType": "circle",
					"position": "bottom",
					"valueWidth": 45
				},				
				"dataProvider": [{"title": "Total Calls","value": totalcallcount},{"title": "Calls Booked","value": totalbookedcalls},{"title": "Actual Revenue","value": totalpurchases}]
			});
			
			//jQuery('#stcalls_table').tablesorter();
			//jQuery('#stjobs_table').tablesorter();
			jQuery('#stcalls_table').DataTable();
			jQuery('#stjobs_table').DataTable();
		
		});			

//-------- ServiceTitan Data End
    <?php } ?>


//-------- Keyword Ranking Report
		jQuery.when(
			jQuery.getJSON(KeywordRank)
		).done (function (response) {
				var keywordHTML = '';
				jQuery.each(response, function (i, item) {
					
					var engineUrl;
					switch (item['Search Engine']) {
						case "Google":
							engineUrl = "https://www.google.com/search?q=";
							searchEngine = "Google";
							break;
						case "Google Mobile":
							engineUrl = "https://www.google.com/search?q=";
							searchEngine = "Mobile";
							break;
						case "Bing":
							engineUrl = "https://www.bing.com/search?q=";
							searchEngine = "Bing";
							break;
						case "Yahoo":
							engineUrl = "https://search.yahoo.com/search?p=";
							searchEngine = "Yahoo";
							break;
						default:
							engineUrl = "https://www.google.com/search?q=";
							searchEngine = "Google";
					}

					if(item.Position !== '-') {
						keywordHTML += '<tr><td class="tg-yw4l">' + searchEngine + '</td><td class="tg-yw4l"><a href="' + engineUrl + item.Keywords + '" target="_blank">' + item.Keywords + '</a></td><td class="tg-yw4l"><a href="' + item.Website + '" target="_blank">' + item.Website + '</a></td><td class="tg-yw4l">' + item.Position + '</td><td class="tg-yw4l">' + item.Previous + '</td><td class="tg-yw4l change">' + item.Change + '</td><td class="tg-yw4l">' + item.Page + '</td><td class="tg-yw4l">' + item.Best + '</td></tr>';
					}

				});
				jQuery('#keyword_ranking tbody').append(keywordHTML);
                jQuery('#keyword_ranking').DataTable();

			});	

//-------- End Keyword Ranking Report
//-------- Web Ranking Report
		jQuery.ajax({
		    url: WebRank,
		    dataType: 'json',
		 	success: function (response) {
				var webHTML = '';
				jQuery.each(response, function (i, item) {
					webHTML += '<tr><td class="tg-yw4l">' + item.Date + '</td><td class="tg-yw4l">' + item['<?php echo str_replace('www.','', $_SERVER['SERVER_NAME']); ?>'] + '</td></tr>';
				});
				jQuery('#web_ranking').append(webHTML);
			}
		});	
//-------- End Web Ranking Report

		//AdWords Data
		<?php if (get_option('gapi_adwords_enable') == 1){ ?>		
		//Start AdWords Campaigns

//---------- Start NEW ADWORDS COLLECTION

        jQuery.getJSON(AdWordsImpClicksSerial, function(data){    
			jQuery.each(data, function(i, val){

                NewAdGoalCompletions += parseFloat(val.adgoalcompletions);
                NewAdGoalConversions += parseFloat(val.adgoalconversionrate);
                NewTotalAdClicks += parseFloat(val.adclicks);
                NewTotalAdCost += parseFloat(val.adcost);
                NewTotalAdCPC += parseFloat(val.cpc);
                NewTotalAdCTR += parseFloat(val.ctr) / 100;
                NewTotalAdImpressions += parseFloat(val.impressions);					
                NewavgCPCTotal = NewTotalAdCost / NewTotalAdClicks;
                NewavgCTRTotal = (NewTotalAdClicks / NewTotalAdImpressions)*100;										
				
			});			
			jQuery('.gapiNewTotalAdClicks').append(NewTotalAdClicks);
			jQuery('.gapiNewTotalAdCost').append(NewTotalAdCost.toFixed(2));
			jQuery('.gapiNewTotalAdCPC').append(NewavgCPCTotal.toFixed(2));
			jQuery('.gapiNewTotalAdCTR').prepend(NewavgCTRTotal.toFixed(2));
			jQuery('.gapiNewTotalAdImpressions').append(NewTotalAdImpressions);
			jQuery('.gapiNewTotalAdconversions').prepend(NewAdGoalConversions.toFixed(2));
			jQuery('.gapiNewTotalAdCompletions').append(NewAdGoalCompletions);	
		});
//-------- End NEW ADWORDS DATA COLLECTOIN

		jQuery.getJSON(AdWords, function(adw){    
			jQuery.each(adw, function(i, val){
				if (val.campaign == "(not set)") // delete index
				{
					delete adw[i];
					//console.log(adw);
				} else {
					var adwobject = adw
					var impressionCount = Object.keys(adwobject).length;
					AdGoalCompletions += parseFloat(val.goalCompletionsAll);
					AdGoalConversions += parseFloat(val.goalConversionRateAll);
					TotalAdClicks += parseFloat(val.adclicks);
					TotalAdCost += parseFloat(val.adcost);
					TotalAdCPC += parseFloat(val.cpc);
					TotalAdCTR += parseFloat(val.ctr) / 100;
					TotalAdBR += parseFloat(val.bounceRate) / impressionCount;
					TotalAdPS += parseFloat(val.pageviewsPerSession) / impressionCount;
					TotalAdImpressions += parseFloat(val.impressions);					
					TotalCampaigns = AdGoalConversions / impressionCount;									
					avgCPCTotal = TotalAdCost / TotalAdClicks;
					avgCTRTotal = (TotalAdClicks / TotalAdImpressions)*100;										
					var adwordsHTML = ''					
					<?php if ($gapi_adw_primary_dimension <> '' && $gapi_adw_secondary_dimension <> '') { ?>
					adwordsHTML += '<tr><td class="tg-yw4l">' + val.campaign + '</td><td class="sec tg-yw4l sec">' + val.secondayDimension + '</td><td class="tg-yw4l">' + val.adclicks + '</td><td class="tg-yw4l">$' + val.adcost + '</td><td class="tg-yw4l">$' + (+val.cpc).toFixed(2) + '</td><td class="tg-yw4l">' + (+val.ctr).toFixed(2) + '%</td><td class="tg-yw4l">' + val.impressions + '</td><td class="tg-yw4l">' + (+val.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+val.pageviewsPerSession).toFixed(2) + '</td><td class="tg-yw4l">' + (+val.goalConversionRateAll).toFixed(2) + '%</td><td class="tg-yw4l">' + val.goalCompletionsAll + '</td></tr>';
					<?php } else { ?>
					adwordsHTML += '<tr><td class="tg-yw4l prim">' + val.campaign + '</td><td class="tg-yw4l">' + val.adclicks + '</td><td class="tg-yw4l">$' + val.adcost + '</td><td class="tg-yw4l">$' + (+val.cpc).toFixed(2) + '</td><td class="tg-yw4l">' + (+val.ctr).toFixed(2) + '%</td><td class="tg-yw4l">' + val.impressions + '</td><td class="tg-yw4l">' + (+val.bounceRate).toFixed(2) + '%</td><td class="tg-yw4l">' + (+val.pageviewsPerSession).toFixed(2) + '</td><td class="tg-yw4l">' + (+val.goalConversionRateAll).toFixed(2) + '%</td><td class="tg-yw4l">' + val.goalCompletionsAll + '</td></tr>';
					<?php } ?>	
					
					jQuery('#adwords_table tbody').append(adwordsHTML);
				}
				
			});			
			jQuery('.gapiTotalAdClicks').append(TotalAdClicks);
			jQuery('.gapiTotalAdCost').append(TotalAdCost.toFixed(2));
			jQuery('.gapiTotalAdCPC').append(avgCPCTotal.toFixed(2));
			jQuery('.gapiTotalAdCTR').prepend(avgCTRTotal.toFixed(2));
			jQuery('.gapiAdBounceRate').prepend(TotalAdBR.toFixed(2));
			jQuery('.gapiAdPageSessions').prepend(TotalAdPS.toFixed(2));
			jQuery('.gapiTotalAdImpressions').append(TotalAdImpressions);
			jQuery('.gapiTotalAdconversions').prepend(TotalCampaigns.toFixed(2));
			jQuery('.gapiTotalAdCompletions').append(AdGoalCompletions);

			jQuery('#adwords_table').tablesorter();	
		});
		//End AdWords
		<?php } ?>


		//Begin OntraPort Data
		jQuery.when(
			jQuery.getJSON(OntraPortMessages),
			jQuery.getJSON(OntraPortConversions),
			jQuery.getJSON(OntraPortMessagesTotal)
		).done (function (data, data2, data3) {

			var messagesHTML = '';
			var campaignMessagesHTML = '';
			var conversionsHTML = '';

            //Campaign Messages
			jQuery.each(data[0].data, function(i, item){

				emailSent += parseFloat(data[0].data[i].mcsent);
				emailOpened += parseFloat(data[0].data[i].mcopened);
				emailClicked += parseFloat(data[0].data[i].mcclicked);
				contactUnsubscribed += parseFloat(data[0].data[i].mcunsub);

				var campaignNotOpened = parseFloat(data[0].data[i].mcsent) - parseFloat(data[0].data[i].mcopened);
				var campaignNotClicked = parseFloat(data[0].data[i].mcopened) - parseFloat(data[0].data[i].mcclicked);

				campaignMessagesHTML += '<tr><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].alias + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].subject + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].mcsent + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].mcopened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].mcclicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + campaignNotOpened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + campaignNotClicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data[0].data[i].mcunsub + '</span></td></tr>';

			});
			
			jQuery('.gapiOntraPortEmailSentAll').append(emailSent);
			jQuery('.gapiOntraPortEmailOpenedAll').append(emailOpened);
			jQuery('.gapiOntraPortEmailClickedAll').append(emailClicked);
			jQuery('.gapiOntraPortUnsubscribedAll').append(contactUnsubscribed);

			//Campaign Funnel Chart
			var chart = AmCharts.makeChart("chartdiv-campaignfunnel", {
				"type": "funnel",
				"balloonText": "[[title]]:<b>[[value]]</b>",
				"labelsEnabled": false,
				"neckHeight": "20%",
				"neckWidth": "20%",
				"marginLeft": 0,
				"marginRight": 0,
				"titleField": "title",
				"valueField": "value",
				"allLabels": [],
				"balloon": {},
				"titles": [],
				"legend": {
					"enabled": true,
					"align": "center",
					"markerBorderAlpha": 0,
					"markerType": "circle",
					"position": "bottom",
					"valueWidth": 45
				},				
				"dataProvider": [
					{"title": "Email Sent","value": emailSent},
					{"title": "Email Opened","value": emailOpened},
					{"title": "Email Clicked","value": emailClicked},
					{"title": "Unsubscribed","value": contactUnsubscribed},
				]
			});		
			
            //Conversions
			jQuery.each(data2[0], function(i, item) {
			    
			    item.job_total = item.job_total.replace(/,/,'');
			    
                if(item.job_total !== '' ) {
                	conversionsTotal += parseFloat(item.job_total);
                }
			    console.log(conversionsTotal);

                conversionsHTML += '<tr><td class="tg-yw4l">' + item.id + '</td><td class="tg-yw4l">' + item.creation_date + '</td><td class="tg-yw4l">' + item.campaign + '</td><td class="tg-yw4l">' + item.conversion_type + '</td><td class="tg-yw4l">' + item.conversion_name + '</td><td class="tg-yw4l">' + item.contact_name + '</td><td class="tg-yw4l">' + item.job_info + '</td><td class="tg-yw4l">$' + item.job_total + '</td></tr>';

			}); 
			jQuery('.gapiOntraPortNewContactsAll').append(newContacts);
			jQuery('#conversions_records tbody').append(conversionsHTML);
			jQuery('.gapiTotalOntraPortConverstions').append(conversionsTotal.toFixed(2));
					

            //Total Messages
			jQuery.each(data3[0].data, function(i, item){

				emailSentTotal += parseFloat(data3[0].data[i].mcsent);
				emailOpenedTotal += parseFloat(data3[0].data[i].mcopened);
				emailClickedTotal += parseFloat(data3[0].data[i].mcclicked);
				contactUnsubscribedTotal += parseFloat(data3[0].data[i].mcunsub);
				
				var notOpened = emailSentTotal - emailOpenedTotal;
				var notClicked = emailOpenedTotal - emailClickedTotal;

				messagesHTML += '<tbody><tr><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].alias + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].subject + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcsent + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcopened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcclicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + notOpened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + notClicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcunsub + '</span></td></tr></tbody>';
				
			});
			jQuery('.gapiTotalOntraPortEmailSent').append(emailSentTotal);
			jQuery('.gapiTotalOntraPortEmailOpened').append(emailOpenedTotal);
			jQuery('.gapiTotalOntraPortEmailClicked').append(emailClickedTotal);
			jQuery('.gapiTotalOntraPortUnsubscribed').append(contactUnsubscribedTotal);
			jQuery('#campaign_delivery_records').append(campaignMessagesHTML);
			jQuery('#delivery_records').append(messagesHTML);

			jQuery('#conversions_records').tablesorter();
			jQuery('#campaign_delivery_records').tablesorter();
					
		});
		
		
        let dropdown = jQuery('#campaign-dropdown');
        dropdown.empty();
        dropdown.append('<option selected="true" disabled>Choose Campaign</option>');
        dropdown.prop('selectedIndex', 0);
        
        // Populate dropdown with list of campaigns
        jQuery.when (
            jQuery.getJSON(OntraPortGroups)
        ).done(function (data) {
          jQuery.each(data.data, function (i, item) {
            var type = data.data[i].type;
            if (type === "7") {
                dropdown.append(jQuery('<option></option>').attr('value', data.data[i].id).text(data.data[i].name));
            }    
          })
        });
        
        jQuery("#campaign-dropdown").change(function(){
            var campaignselect = jQuery("#campaign-dropdown option:selected").val();
            var campaignname = jQuery("#campaign-dropdown option:selected").text();
            jQuery('#dev_campaign_group').val(campaignselect);
            jQuery('#dev_campaign_group_name').val(campaignname);
            alert("You have selected the campaign - " + campaignname);
            jQuery(this).closest('form').trigger('submit');
        });        
		
		//End OntraPort Data

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
				jQuery('#channeldata_table tbody').append(channelHTML);
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

				jQuery('#channeldata_table').tablesorter();
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
			
        <?php if (get_option('gapi_dev_conv_profile') <> ""){ ?>    
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
        <?php } ?>    		
			
		<?php if (get_option('gapi_weather_enable') == 1){ ?>
			var ZIPCode = '<?php  echo $weatherzip  ?>'
			jQuery.ajax({
				dataType: "json",
				cache: false,
				url: 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA9hXXOek9v2w5H8sjQfUrv5vjsJvL_Ac0&address=' +  ZIPCode + '&sensor=false',
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
				jQuery(".tabs li a:first").addClass("active").show();
				jQuery(".analytics-board:first").show();

			// check if 'Cookie' is not empty
			} else if (Cookie != "") {
				jQuery('.tabs li > a:eq('+ Cookie +')').addClass('active').next().show(); // setting cookie for first anchor link
				activeTab = jQuery('.tabs li > a:eq('+ Cookie +')').attr("href"); // getting content for first set cookie
				jQuery(activeTab).fadeIn(0); // 0 is the fastest

			// if 'noacord' cookie does not exist then show the content of first anchor
			}

			jQuery(".tabs li > a").click(function() {
				jQuery(".tabs li a").removeClass("active"); // removes 'active' class from all anchors in '.tabs'
				jQuery(this).addClass("active"); // current tab will be 'active'
				navIndex = jQuery('.tabs li > a').index(this); // check the index
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

		//AdWords JS
		jQuery('#csa_adw_primary_dimension input[type="radio"], #adw_secondary_dimension, #adw_max_results').change(function(){
	         jQuery(this).closest('form').trigger('submit');
	    });	   

		jQuery('#csa_adw_primary_dimension span').click(function() {
			jQuery(this).prev('input[type="radio"]').click();
				jQuery('#csa_adw_primary_dimension input[type="radio"][checked="checked"]').next('span').removeClass('active');
				jQuery('#csa_adw_primary_dimension span').removeClass('active');
				jQuery(this).addClass('active');
				
		});

		jQuery('#csa_adw_primary_dimension input[type="radio"][checked="checked"]').next('span').addClass('active');		
		//End AdWords JS		
		
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

		//ServiceTitan JS
		jQuery('#csa_st_primary_sort input[type="radio"], #st_secondary_sort, #st_max_results').change(function(){
	         jQuery(this).closest('form').trigger('submit');
	    });
		//End ServiceTitan JS	 				
		
		jQuery( ".edu-tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
		jQuery( ".edu-tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );

		jQuery( ".edu-img" ).click(function() {
		  jQuery(this).parent('.data-name-info').next('.edu-tabs').toggle();
		});
		
		
        function startPrintProcess(canvasObj, fileName, callback) {
          var pdf = new jsPDF('10', 'pt', 'a4'),
            pdfConf = {
              pagesplit: false,
              background: '#fff'
            };
          document.body.appendChild(canvasObj); //appendChild is required for html to add page in pdf
          pdf.addHTML(canvasObj, 0, 0, pdfConf, function() {
            document.body.removeChild(canvasObj);
            pdf.addPage();
            pdf.save(fileName + '.pdf');
            callback();
          });
        }
        
        jQuery('#pdfDownloader').click(()=>{
        
        html2canvas(document.getElementById('panel-board-container'), {
            onrendered: function(canvasObj) {
              startPrintProcess(canvasObj, 'printedPDF',function (){
                alert('PDF saved');
              });
              //save this object to the pdf
            }
          });
        })
						
		    		
	});	
	</script>
  <div id="admin-panel-wrapper" class="skin-blue sidebar-mini">
		<div id="analytics-header" class="main-header">
			<a href="dashboard" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><b>CS</b>A</span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>CS</b>Analytics</span>
			</a>
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<!-- Navbar Right Menu -->
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					    <li>
					        <button type="button" id="pdfDownloader">Download</button>
					    </li>
						<li>
							<div id="csa-search">
								<form id="search-filter" method="post" action="">
									<fieldset class="alignleft">
										<table>
										<tr>
											<td>
												<label for="calendar_start">Start Date:</label> <input type="text" class="form-control" name="calendar_start" id="from" value="<?php echo get_option('gapi_calendar_start'); ?>" />&nbsp;
												<label for="calendar_end">End Date:</label> <input type="text" class="form-control" name="calendar_end" id="to" value="<?php echo get_option('gapi_calendar_end'); ?>" />
												<div style="display:none"><label for="calendar_diff">Statistical Day(s)</label> <input type="text" name="calendar_diff" id="calendar_diff" value="<?php  echo get_option('gapi_calendar_diff'); ?>" /></div>
											</td>
										</tr>
										</table>
									</fieldset>
									<p class="gapi-submit-container">
										<input type="submit" name="Submit" class="btn btn-warning btn-flat" value="Save Changes" />
										<input type="hidden" name="gapi_date_settings" value="save" style="display:none;" />
									</p>
									<div class="clear"></div>
								</form>				
							</div><!-- #search-override -->						
						</li>
						<!-- Control Sidebar Toggle Button -->
						<?php if(get_option('gapi_dev_industry') == 'other' || get_option('gapi_dev_industry') == 'custom' ){ ?>
						<li>
							<a href="#TB_inline?width=600&amp;height=550&amp;inlineId=csa-override" data-toggle="control-sidebar" class="thickbox override-btn"><i class="fa fa-gears"></i></a>
						</li>
						<?php } ?>
					</ul>
				</div>
			</nav>
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
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar" style="height: auto;">
 
 		<?php  if ( is_user_logged_in() ):
			$current_user = wp_get_current_user(); 
			
			if ( ($current_user instanceof WP_User) ) {?>
			<div class="user-panel">
				<div class="pull-left image">
					<?php echo get_avatar( $current_user->user_email, 32 ); ?>
				</div>
				<div class="pull-left info">
					<p><?php echo $current_user->display_name ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
 		<?php } endif; ?>			

				<ul id="panel-links-container" class="tabs sidebar-menu"><!-- Start #panel-links -->    
					<li>
						<a href="#board-global" id="icon-global">
							<i class="fa fa-globe"></i> <span>Global</span>
						</a>
					</li>
					<li>	
						<a href="#board-roi">
							<i class="fa fa-line-chart"></i> <span>ROI</span>
						</a>
					</li> 
					<li>	
						<a href="#board-conversion">
							<i class="fa fa-bullseye"></i> <span>Conversion</span>
						</a>	
					</li>
                    <?php if (get_option('gapi_dev_conv_profile') <> ""){ ?>
                        <li>
                            <a href="#board-dni">
                                <i class="fa fa-phone"></i> <span>Call Tracking</span>
                            </a>	
                        </li>
                    <?php } ?>
					<li>
						<a href="#board-visitation">
							<i class="fa fa-users"></i> <span>Visitation</span>
						</a>	
					</li>
					<li>
						<a href="#board-visibility">
							<i class="fa fa-eye"></i> <span>Visibility</span>
						</a>	
					</li>
					<li>
						<a href="#board-citations">
							<i class="fa fa-binoculars"></i> <span>Citations</span>
						</a>	
					</li>
					<li>
						<a href="#board-weather">
							<i class="fa fa-sun-o"></i> <span>Weather</span>
						</a>	
					</li>
					<li>
						<a href="#board-heatmap">
							<i class="fa fa-location-arrow"></i> <span>Heatmap</span>
						</a>
					</li>
					<li>
						<a href="#board-ontraport">
							<i class="fa fa-share"></i> <span>Automation</span>
						</a>		
					</li>
					<li>
						<a href="#board-reviews">
							<i class="fa fa-star"></i> <span>Reviews</span>
						</a>		
					</li>
					<li>
						<a href="#board-adwords">
							<i class="fa fa-area-chart"></i> <span>AdWords</span>
						</a>
					</li>
					<li>
						<a href="#board-social">
							<i class="fa fa-share-square-o"></i> <span>Social</span>
						</a>		      
					</li>
					<li>
						<a href="#board-speed">
							<i class="fa fa-bolt"></i> <span>Site Speed</span>
						</a>		      
					</li>
                    <?php if (get_option('gapi_dev_servicetitan_apikey') <> ""){ ?>
					<li>
						<a href="#board-servicetitan">
							<i class="fa icon-ServiceTitan-Logo"></i> <span>ServiceTitan</span>
						</a>		      
					</li>
                    <?php } ?>
				</ul> 
			</section>
		</aside>   
	<div id="panel-board-container" class="content-wrapper"><!-- Start #panel-board-container -->
		<div id="csanalytics-data">

		<section class="content-header">
			<h1>
				CSAnalytics Dashboard <small>Version 3.0</small>
			</h1>
		</section>

		<section class="csa-data-content">


			<div id="board-global" class="analytics-board row"></div>

			<div id="board-roi" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">ROI Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">The LeadsNearby Return on investment (ROI) Board displays the benefits of your program resulting from your monthly investment. A high Estimated Revenue, matched with low Cost of Sale and Cost per Lead means the investment gains compare favorably to investment cost. As a performance measure, ROI is used to evaluate the efficiency of your investment.</span>
							</span>
						</h2>
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
							<h3>ROI Data</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
							<h3>Goals by Channel Data Table</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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

						<div class="grid">
							<div class="col-1-1">
								<div id="csa_primary_dimension" class="csa-select">
									<form method="post" action="">
										<span class="label">Primary Dimension:</span> 
										<input type="radio" name="primary_dimension" value="channelGrouping" <?php checked(channelGrouping, get_option('gapi_primary_dimension'), true); ?>><span>Default Channel Grouping</span>
										<input type="radio" name="primary_dimension" value="landingPagePath" <?php checked(landingPagePath, get_option('gapi_primary_dimension'), true); ?>><span>Landing Page</span>
										<input type="radio" name="primary_dimension" value="sourceMedium" <?php checked(sourceMedium, get_option('gapi_primary_dimension'), true); ?>><span>Source / Medium</span>
										<input type="radio" name="primary_dimension" value="source" <?php checked(source, get_option('gapi_primary_dimension'), true); ?>><span>Source</span>
										<input type="radio" name="primary_dimension" value="medium" <?php checked(medium, get_option('gapi_primary_dimension'), true); ?>><span>Medium</span>
										<input type="radio" name="primary_dimension" value="keyword" <?php checked(keyword, get_option('gapi_primary_dimension'), true); ?>><span>Keyword</span>
										<div class="analytics-sort-container">
											<div>
												<label>
													<span class="label wht">Secondary Dimension:</span> 
													<select name="secondary_dimension" id="secondary_dimension">
														<option value="" <?php if(get_option('gapi_secondary_dimension') == ''){?>selected="selected"<?php }?>>Secondary Dimension</option>
														<option value="exitPagePath" <?php if(get_option('gapi_secondary_dimension') == 'exitPagePath'){?>selected="selected"<?php }?>>Exit Page</option>
														<option value="sourceMedium" <?php if(get_option('gapi_secondary_dimension') == 'sourceMedium'){?>selected="selected"<?php }?>>Source / Medium</option>
														<option value="source" <?php if(get_option('gapi_secondary_dimension') == 'source'){?>selected="selected"<?php }?>>Source</option>
														<option value="medium" <?php if(get_option('gapi_secondary_dimension') == 'medium'){?>selected="selected"<?php }?>>Medium</option>
														<option value="keyword" <?php if(get_option('gapi_secondary_dimension') == 'keyword'){?>selected="selected"<?php }?>>Keyword</option>
														<option value="campaign" <?php if(get_option('gapi_secondary_dimension') == 'campaign'){?>selected="selected"<?php }?>>Campaign</option>
														<option value="adContent" <?php if(get_option('gapi_secondary_dimension') == 'adContent'){?>selected="selected"<?php }?>>Ad Content</option>
													</select>
												</label>

												<label style="display:inline-block; float: right;">
													<span class="label wht">Show Rows:</span> 
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

                                <div style="overflow-x:auto;">

                                    <table class="tg" id="channeldata_table" border='1'>
                                        <thead>
                                            <tr>
                                            <?php if ($gapi_primary_dimension == 'channelGrouping') { ?>
                                                <th class="tg-031e" rowspan="1">Default Channel Grouping</th>
                                                <?php } elseif ($gapi_primary_dimension == 'landingPagePath') { ?>
                                                <th class="tg-031e" rowspan="1">Landing Page</th>
                                                <?php } elseif ($gapi_primary_dimension == 'sourceMedium') { ?>
                                                <th class="tg-031e" rowspan="1">Source / Medium</th>
                                                <?php } elseif ($gapi_primary_dimension == 'source') { ?>
                                                <th class="tg-031e" rowspan="1">Source</th>
                                                <?php } elseif ($gapi_primary_dimension == 'medium') { ?>
                                                <th class="tg-031e" rowspan="1">Medium</th>
                                                <?php } elseif ($gapi_primary_dimension == 'keyword') { ?>
                                                <th class="tg-031e" rowspan="1">Keyword</th>
                                                <?php } else { ?>
                                                <th class="tg-031e" rowspan="1">Default Channel Grouping</th>
                                                <?php } ?>
                                                <!-- Secondary Channel Group Addition -->
                                                <?php if ($gapi_secondary_dimension == 'exitPagePath') { ?>
                                                <th class="tg-031e" rowspan="1">Exit Page</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'sourceMedium') { ?>
                                                <th class="tg-031e" rowspan="1">Source / Medium</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'source') { ?>
                                                <th class="tg-031e" rowspan="1">Source</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'medium') { ?>
                                                <th class="tg-031e" rowspan="1">Medium</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'keyword') { ?>
                                                <th class="tg-031e" rowspan="1">Keyword</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'campaign') { ?>
                                                <th class="tg-031e" rowspan="1">Campaign</th>
                                                <?php } elseif ($gapi_secondary_dimension == 'adContent') { ?>
                                                <th class="tg-031e" rowspan="1">Ad Content</th>
                                                <?php } ?>										
                                                <th id="channelsessions" class="tg-yw4l">Sessions</th>
                                                <th id="channelnewsessions" class="tg-yw4l">%New Sessions</th>
                                                <th id="channelusers" class="tg-yw4l">New Users</th>
                                                <th id="channelbounce" class="tg-yw4l">Bounce Rate</th>
                                                <th id="channepagesl" class="tg-yw4l">Pages / Sessions</th>
                                                <th id="channelduration" class="tg-yw4l">Avg. Session Duration</th>
                                                <th id="channelconversion" class="tg-yw4l">Goal Conversion Rate</th>
                                                <th id="channelcompletions" class="tg-yw4l">Goal Completions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="tg-yw4l">Totals</td>
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
                                        </tbody>
                                    </table>

                                </div>

							</div>
						</div>
					</div>

					<div class="grid secondary-board-data">		
						<!-- Goal Total Chart -->
						<div class="col-1-1">    
						    <div id="chartdiv-goalvaluetotal" class="tall"></div>
						</div>
					    <div class="col-1-1" data-html2canvas-ignore="true">
						<!-- Channel data will go here -->
							<div id="chartdiv-channeldata" style="height:500px"></div>
						</div>
					</div>

				</div><!-- .box -->		
			</div>

			<div id="board-conversion" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h3 class="board-name">Conversion Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">A website conversion is the most important factor to the success of your online marketing strategy and goals. It means getting your visitors to do what you want them to do, whether that is to buy your product, sign up for your Maintenance Plans, schdule service or repair, or fill out a lead/contact form.</span>
							</span>
						</h2>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Goals Conversions</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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

						<div class="grid">
							<div class="col-1-3">
						
								<a class="info-box bg-yellow showSingle anchor" data-target="1" id="goal-metric-1">
									<span class="info-box-icon"><i class="ion ion-ios-email-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Contact Page Visit</span>
										<span class="info-box-number gapiCompletionsOne"></span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
										Goal 1 Completions
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>

								<a class="info-box bg-green showSingle anchor" data-target="2" id="goal-metric-2">
									<span class="info-box-icon"><i class="ion ion-ios-list-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Contact Form Submission</span>
										<span class="info-box-number gapiCompletionsTwo"></span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
										Goal 2 Completions
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>

								<a class="info-box bg-red showSingle anchor" data-target="3" id="goal-metric-3">
									<span class="info-box-icon"><i class="ion ion-iphone"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Mobile Click to Call</span>
										<span class="info-box-number gapiCompletionsThree"></span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
										Goal 3 Completions
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>

								<a class="info-box bg-aqua showSingle anchor" data-target="4" id="goal-metric-4">
									<span class="info-box-icon"><i class="ion ion-ios-chatbubble-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Chat Lead Sent</span>
										<span class="info-box-number gapiCompletionsFour"></span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
										Goal 4 Completions
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>

								<a class="info-box bg-yellow showSingle anchor" data-target="5" id="goal-metric-5">
									<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Print Coupon</span>
										<span class="info-box-number gapiCompletionsFive"></span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description">
										Goal 5 Completions
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>

								<a class="info-box bg-red showSingle anchor" data-target="6" id="goal-metric-6">
									<span class="info-box-icon"><i class="ion ion-ios-telephone-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Dynamic Call Tracking</span>
										<span class="info-box-number gapiTotalCallsSix">Total Calls:</span>

										<div class="progress">
											<div class="progress-bar" style="width: 50%"></div>
										</div>
										<span class="progress-description gapiTotalCallsSix">
										Total Calls:
										</span>
									</div>
									<!-- /.info-box-content -->
								</a>
						
							</div>
							<div class="col-2-3">
								<div id="conversion-panel">
									<div id="chartdiv6" class="tall goal-metrics chart-1-container"></div>
									<div id="chartdiv7" class="tall goal-metrics chart-2-container"></div>
									<div id="chartdiv8" class="tall goal-metrics chart-3-container"></div>
									<div id="chartdiv9" class="tall goal-metrics chart-4-container"></div>
									<div id="chartdiv10" class="tall goal-metrics chart-5-container"></div>
								</div>
							</div>
						</div>
					</div>	
				</div>		
			</div>

            <?php if (get_option('gapi_dev_conv_profile') <> ""){ ?>

			<div id="board-dni" class="analytics-board row">
				<div class="box">					
					<div class="board-title-container">
						<h2 class="board-name">Call Tracking Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Most agencies will take credit for all calls being generated from your website, what they dont tell you is that they should not be claiming calls that did not come organically. Our advanced Call Tracking reporting algorithm tracks only calls that come in organically but also evaluates whether or not they provided any value. Calls can also be listed to for quality control.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Dynamic Call Tracking</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
							<h3>Total Calls</h3>
							<div class="calls DispositionAnswered"><span></span></div>
						</div>
						<div class="goalcontainer alignleft orange" style="width:50%">
							<h3>Conversion Calls</h3>
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
			</div>

            <?php } ?>

			<div id="board-visitation" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Visitation Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Visitation data is collected to display how many people visit your website, whether they have visited before or not, as well what areas they are visiting from and what types of devices they are using to do their search.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Audience Overview</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
						<div class="grid">
							<div class="col-1-2">	
								<div id="chartdiv" style="height:500px"></div>
							</div>
							<div class="col-1-2">	
								<div id="chartdiv2" style="height:500px"></div>
							</div>
						</div>	
						<div class="grid">
							<div class="col-1-1">											
								<div id="chartdiv3" style="height:500px"></div>	
							</div>
						</div>	
					</div>
					<div class="secondary-board-data">
						<h3>Device Overview</h3>

						<div class="grid">
							<div class="col-2-3">
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
							</div>
							<div class="col-1-3">
								<div id="chartdiv-Devices" style="height:500px"></div>
							</div>
						</div>
					</div>	
				</div>		
			</div>

			<div id="board-visibility" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Visibility Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Our Visibility reporting shows you exactly where you stand with all of the popular search engines. With data such as Keyword ranking and Web ranking our subscribers can track rankings data over time to see which efforts are making the most impact.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Web Ranking Data</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
							<table class="tg" id="keyword_ranking" border='1'>
                                <thead>
								<tr>
                                    <th id="engine">Search Engine</th>
                                    <th id="keywords">Keywords</th>
                                    <th id="website">Website</th>
                                    <th id="positions">Position</th>
                                    <th id="prev">Previous</th>
                                    <th id="change">Change</th>
                                    <th id="page">Page</th>
                                    <th id="best">Best</th>
                                </tr>
								</thead>
								<tbody>
								</tbody>
                            </table>					
							<?php } else { ?>
							<p>Please call LeadsNearby and ask for more details about Web Ranking Data.</p>	
						<?php } ?>							
					</div>
				</div>			
			</div>

			<div id="board-citations" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Citation Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Citations are defined as mentions of your business name and address on other webpages—even if there is no link to your website. Our advanced Citation reporting shows you your Top Citations, Active Citations, Pending Citations and Potential Citations.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Citation Listing Report</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
			</div>

			<div id="board-weather" class="analytics-board row">
				<div class="box">
					<?php  if (get_option('gapi_weather_enable') == 1){ ?>
					<div class="board-title-container">
						<h2 class="board-name">Weather Board
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Are your Service and Installtion calls picking up, or slowing down and you cannot explain why? Have you taken the weather into consideration? The weather can have an incredible impact on your bottom line. Our Weather Reporting shows you a daily breakdown on how the weather is playing a lsrge role with website conversions.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3 id="location-data">Goals by Weather Data for <span class="location-city"></span>,&nbsp;<span class="location-state"></span></h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
			</div>

			<div id="board-heatmap" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Home Page Heatmap
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Understand what users want, care about and do on your site by visually representing their clicks, taps and scrolling behavior – which are the strongest indicators of visitor motivation and desire.</span>
							</span>
						</h2>
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
			</div>

			<div id="board-ontraport" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Marketing Automation
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Marketing automation refers to the software that exists with the goal of automating marketing actions. Many marketing departments have to automate repetitive tasks such as emails, social media, and other website actions. The technology of marketing automation makes these tasks easier.</span>
							</span>
						</h2>
						<span class="showMoreData">Show More Data&nbsp;<span class="dashicons dashicons-arrow-down"></span></span>					
						<div class="clear"></div>
					</div>
					<?php if (get_option('gapi_dev_ontraport_enable') <> ""){ ?>
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Lifetime Delivery Dashboard</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
						</div>
						<div class="edu-tabs">
							<ul>
								<li><a href="#tabs-1">Introduction</a></li>
								<li><a href="#tabs-2">How Does Marketing Automation Work?</a></li>
								<li><a href="#tabs-3">How to analyze this data.</a></li>
							</ul>
							<div id="tabs-1">
								<h2>What is Marketing Automation?</h2>
								<p>Marketing automation refers to the software that exists with the goal of automating marketing actions. Many marketing departments have to automate repetitive tasks such as emails, social media, and other website actions. The technology of marketing automation makes these tasks easier.</p>
							</div>
							<div id="tabs-2">
								<h2>How Does Marketing Automation Work?</h2>
								<p>Marketing automation enables you increase operational efficiency and grow revenue faster by scoring, profiling, and prioritizing leads and then automating programs that nurture those leads based on buying stage. It’s far more data-reliant and rigorous than any system you might administer manually, and it leverages the efficiencies gained by automating marketing activities to increase actual sales while reducing cost per lead. Good for marketing. Good for sales.</p>
							</div>
							<div id="tabs-3">
								<h2>How to analyze this data</h2>
								<p>Revenue Generated: When looking at your revenue growth, monitor not only whether you're closing more deals, but also whether the average sale price is increasing along with it.</p>
								<p>Close Rate on Marketing-Sourced Leads: See if the leads being providing them with marketing automation are closing at a higher rate</p>
							</div>
						</div>
						
						<!-- Lifetime Messages -->
						<div class="grid">
							<!--<div class="col-1-5">
								<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Contacts</span>
										<span class="info-box-number">41,410</span>
									</div>
								</div>
							</div> -->
							<div class="col-1-4">
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Sent</span>
										<span class="info-box-number gapiTotalOntraPortEmailSent"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							</div>	
							<div class="col-1-4">
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-eye"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Opened</span>
										<span class="info-box-number gapiTotalOntraPortEmailOpened"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							</div>
							<div class="col-1-5">
								<div class="info-box">
									<span class="info-box-icon bg-green"><i class="fa fa-mouse-pointer"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Clicked</span>
										<span class="info-box-number gapiTotalOntraPortEmailClicked"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							</div>
							<div class="col-1-4">
								<div class="info-box">
									<span class="info-box-icon bg-blue"><i class="fa fa-sign-out"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Unsubscribed</span>
										<span class="info-box-number gapiTotalOntraPortUnsubscribed"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
							</div>						
						</div>
						
						<!-- Campaign Data -->
						<div class="grid">
							<div class="col-1-1">
								<div class="data-name-info">
									<h3>Campaign Data</h3>
									<?php if (get_option('gapi_dev_campaign_group') <> "" ) { ?>
										<h4>Campaign Selected: <?php echo get_option('gapi_dev_campaign_group_name'); ?></h4>
									<?php } ?>							
								</div>
								<form method="post" action="">
									<span class="label">Select A Campaign:</span> 
									<select id="campaign-dropdown" name="campaign"></select>
									<input name="dev_campaign_group" type="hidden" id="dev_campaign_group" class="" value="<?php echo get_option('gapi_dev_campaign_group'); ?>" class="regular-text" placeholder="450"/>
									<input name="dev_campaign_group_name" type="hidden" id="dev_campaign_group_name" class="" value="<?php echo get_option('gapi_dev_campaign_group_name'); ?>" class="regular-text" placeholder="450"/>
									<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
									<input type="hidden" name="gapi_ontraport_campaign_options" value="save" style="display:none;" />
								</form>
							</div>
						</div>
						<div class="grid">
							<div class="col-1-2">
							<!-- Campaign Messages -->
								<!--<div class="info-box">
									<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Contacts</span>
										<span class="info-box-number">41,410</span>
									</div>
								</div>-->
								<div class="info-box">
									<span class="info-box-icon bg-red"><i class="fa fa-envelope-o"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Sent</span>
										<span class="info-box-number gapiOntraPortEmailSentAll"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
								<div class="info-box">
									<span class="info-box-icon bg-aqua"><i class="fa fa-eye"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Opened</span>
										<span class="info-box-number gapiOntraPortEmailOpenedAll"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
								<div class="info-box">
									<span class="info-box-icon bg-green"><i class="fa fa-mouse-pointer"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Email Clicked</span>
										<span class="info-box-number gapiOntraPortEmailClickedAll"></span>
									</div>
								<!-- /.info-box-content -->
								</div>
								<div class="info-box">
									<span class="info-box-icon bg-blue"><i class="fa fa-sign-out"></i></span>

									<div class="info-box-content">
										<span class="info-box-text">Unsubscribed</span>
										<span class="info-box-number gapiOntraPortUnsubscribedAll"></span>
									</div>
								<!-- /.info-box-content -->
								</div>					
							</div>
							<div class="col-1-2">
								<div id="chartdiv-campaignfunnel" style="height:500px"></div>
							</div>
						</div>	

						<div class="grid">
							<div class="col-1-1">
							<div class="data-name-info">
								<?php if (get_option('gapi_dev_campaign_group') <> "" ) { ?>
									<h3><?php echo get_option('gapi_dev_campaign_group_name'); ?> Campaign Messages:</h3>
								<?php } ?>							
							</div>							
							<!-- Messages List -->
								<table class="tg" id="campaign_delivery_records" border='1'>
									<thead>
										<tr>
											<th class="tg-yw4l">Name</th>
											<th class="tg-yw4l">Subject</th>
											<th class="tg-yw4l">Sent</th>
											<th class="tg-yw4l">Opened</th>
											<th class="tg-yw4l">Clicked</th>
											<th class="tg-yw4l">Not Opened</th>
											<th class="tg-yw4l">Not Clicked</th>
											<th class="tg-yw4l">Opt Outs</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
						
						<!-- Conversion Data -->
						<div class="grid">
							<div class="col-1-1">
								<div class="data-name-info">
									<h3>Message Conversions</h3>
								</div>
								<table class="tg" id="conversions_records" border='1'>
									<thead>
										<tr>
										    <th class="tg-yw4l">ID</th>
										    <th class="tg-yw4l">Date</th>
											<th class="tg-yw4l">Campaign</th>
											<th class="tg-yw4l">Conversion Type</th>
											<th class="tg-yw4l">Conversion Name</th>
											<th class="tg-yw4l">Contact Name</th>
											<th class="tg-yw4l">Job Information</th>
											<th class="tg-yw4l">Job Amount</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
									<tfoot>
									    <tr>
									        <td colspan="7" class="tg-yw4l">Total Amount</td>
									        <td class="tg-yw4l gapiTotalOntraPortConverstions">$</td>
									    </tr>
									</tfoot>
								</table>	
							</div>	
						</div>
					</div>
					<!-- Messages List -->
					<div class="secondary-board-data">
						<div class="grid">
							<div class="col-1-1">
								<div class="data-name-info">
									<h3>Message Delivery</h3>
								</div>
								<table class="tg" id="delivery_records" border='1'>
									<tr>
										<th class="tg-yw4l">Name</th>
										<th class="tg-yw4l">Subject</th>
										<th class="tg-yw4l">Sent</th>
										<th class="tg-yw4l">Opened</th>
										<th class="tg-yw4l">Clicked</th>
										<th class="tg-yw4l">Not Opened</th>
										<th class="tg-yw4l">Not Clicked</th>
										<th class="tg-yw4l">Opt Outs</th>
									</tr>
								</table>	
							</div>
						</div>
					</div>	
					<?php } else { ?>
						<p>Please call LeadsNearby and ask for more details about Marketing Automation Data</p>
					<?php } ?>
				</div>					
			</div>				

			<div id="board-reviews" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Review Flow
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Know exactly what your customers think about your business in real time. Our Review Flow data shows you all of your reviews in one place. View your aggregate score or drill down by individual review website to see how your measueing up.</span>
							</span>
						</h2>
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
			</div>

			<div id="board-adwords" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h1 class="board-name">Google AdWords
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">The AdWords Board Information</span>
							</span>
						</h1>
						<div class="clear"></div>
					</div>
					<?php if (get_option('gapi_adwords_enable') == 1){ ?>				
					<div class="primary-board-data">
						<div class="data-name-info">
							<h2>AdWords Campaign Data Table</h2>
							<i class="edu-img fa fa-graduation-cap"></i>
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
								<ol>
									<li>Go to Seconday Dimension select Hour of Day.</li>
									<li>Goal Sets show conversion rates for the goals you have defined.</li>
									<li>Make sure Hour is selected as the primary dimension. Change the dimension to Day of the Week to find any weekday/weekend trends.</li>
								</ol>
								<p><strong>Action</strong></p>
								<p>If your users convert or purchase more during specific day of the week or time of day, then you could set up ad scheduling in your AdWords campaign settings, whereby you increase or decrease your bids during specific times or days.</p>						
							</div>				
						</div>			

						<div class="grid adwords-data-main">
							<div class="col-1-4">
								<div class="value gapiNewTotalAdCost">$</div>
								<small class="text">Cost</small>
							</div>
							<div class="col-1-4">
								<div class="value gapiNewTotalAdImpressions"></div>
								<small class="text">Impressions</small>
							</div>
							<div class="col-1-4">
								<div class="value gapiNewTotalAdClicks"></div>
								<small class="text">Clicks</small>
							</div>
							<div class="col-1-4">
								<div class="value gapiNewTotalAdCompletions"></div>
								<small class="text">Goal Completions</small>
							</div>
						</div>
						<div class="grid">	
							<div class="col-1-1">	
								<div id="AdWordsImpClicksSerial" style="height:500px"></div>
							</div>
						</div>

						<div class="grid">
							<div class="col-1-5">
								<div class="info-box">
									<div class="info-box-content-full">
										<span class="info-box-text">AdWords Impressions</span>
										<span class="info-box-number gapiNewTotalAdImpressions"></span>
										<div id="chartdiv-adimpressions" style="height:80px"></div>
									</div>
								</div>
							</div>
							<div class="col-1-5">
								<div class="info-box">
									<div class="info-box-content-full">
										<span class="info-box-text">AdWords Clicks</span>
										<span class="info-box-number gapiNewTotalAdClicks"></span>
										<div id="chartdiv-adclicks" style="height:80px"></div>									
									</div>
								</div>
							</div>
							<div class="col-1-5">
								<div class="info-box">
									<div class="info-box-content-full">
										<span class="info-box-text">AdWords CTR</span>
										<span class="info-box-number gapiNewTotalAdCTR">%</span>
										<div id="chartdiv-adctr" style="height:80px"></div>
									</div>
								</div>
							</div>
							<div class="col-1-5">
								<div class="info-box">
									<div class="info-box-content-full">
										<span class="info-box-text">AdWords CPC</span>
										<span class="info-box-number gapiNewTotalAdCPC">$</span>
										<div id="chartdiv-adcpc" style="height:80px"></div>
									</div>
								</div>
							</div>
							<div class="col-1-5">
								<div class="info-box">
									<div class="info-box-content-full">
										<span class="info-box-text">AdWords Spend</span>
										<span class="info-box-number gapiNewTotalAdCost">$</span>
										<div id="chartdiv-adcost" style="height:80px"></div>
									</div>
								</div>
							</div>
						</div>		
										
						<div class="grid">
							<div class="col-1-1">				
								<div id="csa_adw_primary_dimension" class="csa-select">
									<form method="post" action="">
										<span class="label">Primary Dimension:</span> 
										<input type="radio" name="adw_primary_dimension" value="campaign" <?php checked(campaign, get_option('gapi_adw_primary_dimension'), true); ?>><span>Campaign / Campaign ID</span>
										<input type="radio" name="adw_primary_dimension" value="adGroup" <?php checked(adGroup, get_option('gapi_adw_primary_dimension'), true); ?>><span>Ad Group</span>
										<input type="radio" name="adw_primary_dimension" value="keyword" <?php checked(keyword, get_option('gapi_adw_primary_dimension'), true); ?>><span>Keyword</span>								
										<div class="analytics-sort-container">
											<div style="display:inline-block">
												<label>
													<span class="label wht">Secondary Dimension:</span> 
													<select name="adw_secondary_dimension" id="adw_secondary_dimension">
														<option value="" <?php if(get_option('gapi_adw_secondary_dimension') == ''){?>selected="selected"<?php }?>>Secondary Dimension</option>
														<option value="campaign" <?php if(get_option('gapi_adw_secondary_dimension') == 'campaign'){?>selected="selected"<?php }?>>Campaign / Campaign ID</option>
														<option value="adGroup" <?php if(get_option('gapi_adw_secondary_dimension') == 'adGroup'){?>selected="selected"<?php }?>>Ad Group</option>
														<option value="keyword" <?php if(get_option('gapi_adw_secondary_dimension') == 'keyword'){?>selected="selected"<?php }?>>Keyword</option>
														<option value="adContent" <?php if(get_option('gapi_adw_secondary_dimension') == 'adContent'){?>selected="selected"<?php }?>>Ad Content</option>
														<option value="adMatchedQuery" <?php if(get_option('gapi_adw_secondary_dimension') == 'adMatchedQuery'){?>selected="selected"<?php }?>>Search Query</option>
														<!-- <option value="hour" <?php //if(get_option('gapi_adw_secondary_dimension') == 'hour'){?>selected="selected"<?php //}?>>Hour of Day</option>-->
														<option value="dayOfWeekName" <?php if(get_option('gapi_adw_secondary_dimension') == 'dayOfWeekName'){?>selected="selected"<?php }?>>Day of Week</option>
													</select>
												</label>
											</div>
											<div style="display:inline-block; float: right;">
												<label>
													<span class="label wht">Show Rows:</span> 
													<select name="adw_max_results" id="adw_max_results">
														<option value="5" <?php if(get_option('gapi_adw_max_results') == '5'){?>selected="selected"<?php }?>>5</option>
														<option value="10" <?php if(get_option('gapi_adw_max_results') == '10'){?>selected="selected"<?php }?>>10</option>
														<option value="25" <?php if(get_option('gapi_adw_max_results') == '25'){?>selected="selected"<?php }?>>25</option>
														<option value="50" <?php if(get_option('gapi_adw_max_results') == '50'){?>selected="selected"<?php }?>>50</option>
														<option value="100" <?php if(get_option('gapi_adw_max_results') == '100'){?>selected="selected"<?php }?>>100</option>
													</select>
												</label>
											</div>							
										</div>							
										<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
										<input type="hidden" name="gapi_adwords_metrics_dimensions" value="save" style="display:none;" />
									</form>		
								</div>
								<table class="tg" id="adwords_table" border='1'>
									<thead>
											<tr>
											<?php if ($gapi_adw_primary_dimension == 'campaign') { ?>
												<th class="tg-031e" rowspan="1">Campaign</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'adGroup') { ?>
												<th class="tg-031e" rowspan="1">Ad Group</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'keyword') { ?>
												<th class="tg-031e" rowspan="1">Keyword</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'adContent') { ?>
												<th class="tg-031e" rowspan="1">Ad Content</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'adMatchedQuery') { ?>
												<th class="tg-031e" rowspan="1">Search Query</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'hour') { ?>
												<th class="tg-031e" rowspan="1">Hour of Day</th>
												<?php } elseif ($gapi_adw_primary_dimension == 'dayOfWeekName') { ?>
												<th class="tg-031e" rowspan="1">Day of Week</th>
												<?php } else { ?>
												<th class="tg-031e" rowspan="1">Campaign</th>
												<?php } ?>
												<!-- Secondary Channel Group Addition -->
												<?php if ($gapi_adw_secondary_dimension == 'campaign') { ?>
												<th class="tg-031e" rowspan="1">Campaign</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'adGroup') { ?>
												<th class="tg-031e" rowspan="1">Ad Group</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'keyword') { ?>
												<th class="tg-031e" rowspan="1">Keyword</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'adContent') { ?>
												<th class="tg-031e" rowspan="1">Ad Content</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'adMatchedQuery') { ?>
												<th class="tg-031e" rowspan="1">Search Query</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'hour') { ?>
												<th class="tg-031e" rowspan="1">Hour of Day</th>
												<?php } elseif ($gapi_adw_secondary_dimension == 'dayOfWeekName') { ?>
												<th class="tg-031e" rowspan="1">Day of Week</th>
												<?php } ?>

												<th class="table-parent tg-yw4l">Clicks</th>
												<th class="table-parent tg-yw4l">Cost</th>
												<th class="table-parent tg-yw4l">CPC</th>
												<th class="table-parent tg-yw4l">CTR</th>
												<th class="table-parent tg-yw4l">Impressions</th>
												<th class="table-parent tg-yw4l">Bounce Rate</th>
												<th class="table-parent tg-yw4l">Pages / Session</th>
												<th class="table-parent tg-yw4l">Goal Conversion Rate</th>
												<th class="table-parent tg-yw4l">Goal Completions</th>
											</tr>
										</thead>
										<tbody>										
											<tr>
												<td class="tg-yw4l">Totals</td>
												<?php if ($gapi_adw_primary_dimension <> '' && $gapi_adw_secondary_dimension <> '') { ?>
												<td class="sec tg-yw4l"></td>
												<?php } ?>						
												<td class="tg-yw4l gapiTotalAdClicks"></td>
												<td class="tg-yw4l gapiTotalAdCost">$</td>
												<td class="tg-yw4l gapiTotalAdCPC">$</td>
												<td class="tg-yw4l gapiTotalAdCTR">%</td>
												<td class="tg-yw4l gapiTotalAdImpressions"></td>
												<td class="tg-yw4l gapiAdBounceRate">%</td>
												<td class="tg-yw4l gapiAdPageSessions"></td>
												<td class="tg-yw4l gapiTotalAdconversions">%</td>
												<td class="tg-yw4l gapiTotalAdCompletions"></td>
											</tr>
										</tbody>
								</table>
							</div>
						</div>		

						<div class="grid">
							<div class="col-1-2">	
								<div id="AdWordsDevicesImpressions" style="height:500px"></div>
							</div>
							<div class="col-1-2">			
								<div id="AdWordsDevicesClicks" style="height:500px"></div>
							</div>
						</div>

					</div>
					<?php } else { ?>
						<p>Please call LeadsNearby and ask for more details about AdWords Data</p>
					<?php } ?>
				</div>    						
			</div>

			<div id="board-social" class="analytics-board row">
				<div class="box">			
					<div class="board-title-container">
						<h2 class="board-name">Social Media
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Social Media Information</span>
							</span>
						</h2>
						<div class="clear"></div>
					</div>			
					<div class="primary-board-data">
						<div class="data-name-info">
							<h3>Social Media Data</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
						</div>						
						<div class="edu-tabs">
							<ul>
								<li><a href="#tabs-1">Overview</a></li>
							</ul>
							<div id="tabs-1">
								<h2>Use the data in this section to view how well your Social Media is performing.</h2>
								<p>You can view all of your social data (at a glance). You can also view individual KPI's such as Click, Impressions, Likes, Engagement, and Click Type</p>
							</div>				
						</div>	
						<?php if (get_option('gapi_dev_social_url') <> "") { ?>
						<a href="<?php echo $dev_social_url ?>" target="_Blank">
						<p>You will be redirected to a new tab to display Social Media data</p>
						</a>					
						<?php } else { ?>
						<p>Please call LeadsNearby and ask for more details about Social Media Data</p>
						<?php } ?>														
					</div>
				</div>	
			</div>	
			
	        <div id="board-speed" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">Site Speed
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Page speed is often confused with "site speed," which is actually the page speed for a sample of page views on a site. Page speed can be described in either "page load time" (the time it takes to fully display the content on a specific page) or "time to first byte" (how long it takes for your browser to receive the first byte of information from the web server).</span>
							</span>
						</h2>
						<div class="clear"></div>
					</div>
					<?php if (get_option('gapi_speed_enable') == 1){ ?>
					<div class="primary-board-data">

						<div class="data-name-info">
							<h3>Site Speed Page Timings</h3>
							<i class="edu-img fa fa-graduation-cap"></i>
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
								<div class="analytics-sort-container">
									<div style="display:inline-block">
										<label>
											<span class="label wht">Secondary Dimension:</span> 
											<select name="speed_secondary_dimension" id="speed_secondary_dimension">
												<option value="" <?php if(get_option('gapi_speed_secondary_dimension') == ''){?>selected="selected"<?php }?>>Secondary Dimension</option>
												<option value="pagePath" <?php if(get_option('gapi_speed_secondary_dimension') == 'pagePath'){?>selected="selected"<?php }?>>Page Path</option>
												<option value="pageTitle" <?php if(get_option('gapi_speed_secondary_dimension') == 'pageTitle'){?>selected="selected"<?php }?>>Page Title</option>
											</select>
										</label>
									</div>
									<div style="display:inline-block; float: right;">
										<label>
											<span class="label wht">Show Rows:</span> 
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
			</div>

            <?php if (get_option('gapi_dev_servicetitan_apikey') <> ""){ ?>

			<div id="board-servicetitan" class="analytics-board row">
				<div class="box">
					<div class="board-title-container">
						<h2 class="board-name">ServiceTitan Data
							<span class="dashicons dashicons-info">
								<span class="dashicons-info-box">Most agencies will take credit for all calls being generated from your website, what they dont tell you is that they should not be claiming calls that did not come organically. Our advanced Call Tracking reporting algorithm tracks only calls that come in organically but also evaluates whether or not they provided any value. Calls can also be listed to for quality control.</span>
							</span>
						</h2>
						<div class="clear"></div>
					</div>
					<div class="primary-board-data">
						<div class="grid">
							<div class="col-1-1">
								<div id="csa_st_primary_sort" class="csa-select">
									<form method="post" action="">
										<div style="display: block; border: 1px solid #eee; padding: 10px; background-color: #f9f9f9; margin-top: 10px;">
											<label>
												<span class="label">Select A Campaign:</span> 
												<select id="st-campaign-dropdown" name="campaign"></select>
												<input name="dev_st_campaign_group" type="hidden" id="dev_st_campaign_group" class="" value="<?php echo get_option('gapi_dev_st_campaign_group'); ?>" class="regular-text" placeholder="450"/>
												<input name="dev_st_campaign_group_name" type="hidden" id="dev_st_campaign_group_name" class="" value="<?php echo get_option('gapi_dev_st_campaign_group_name'); ?>" class="regular-text" placeholder="450"/>
											</label>
											<label style="display:inline-block; float: right;">
												<span class="label">Show Rows:</span> 
												<select name="st_max_results" id="st_max_results">
													<option value="10" <?php if(get_option('gapi_st_max_results') == '10'){?>selected="selected"<?php }?>>10</option>
													<option value="25" <?php if(get_option('gapi_st_max_results') == '25'){?>selected="selected"<?php }?>>25</option>
													<option value="50" <?php if(get_option('gapi_st_max_results') == '50'){?>selected="selected"<?php }?>>50</option>
													<option value="100" <?php if(get_option('gapi_st_max_results') == '100'){?>selected="selected"<?php }?>>100</option>
													<option value="250" <?php if(get_option('gapi_st_max_results') == '250'){?>selected="selected"<?php }?>>250</option>
													<option value="500" <?php if(get_option('gapi_st_max_results') == '500'){?>selected="selected"<?php }?>>500</option>
													<option value="1000" <?php if(get_option('gapi_st_max_results') == '1000'){?>selected="selected"<?php }?>>1000</option>
												</select>
											</label>
											<div class="clear"></div>
										</div>							
										<input type="submit" name="Submit" class="gapi-button" style="display:none;" value="Save Changes" />
										<input type="hidden" name="gapi_st_sort_data" value="save" style="display:none;" />
									</form>
								</div>
							</div>
							<div class="col-1-1">
								<div class="data-name-info">
									<h3>Jobs Data</h3>
									<i class="edu-img fa fa-graduation-cap"></i>
									<?php if (get_option('gapi_dev_st_campaign_group') <> "" ) { ?>
										<h4>Campaign Selected: <?php echo get_option('gapi_dev_st_campaign_group_name'); ?></h4>
									<?php } ?>							
								</div>
        		                <div class="edu-tabs">
        							<ul>
        								<li><a href="#tabs-1">Introduction</a></li>
        								<li><a href="#tabs-2">How to analyze this data.</a></li>
        							</ul>
        							<div id="tabs-1">
        								<h2>What is ServiceTitan Job Data?</h2>
        								<p>The ServiceTitan Jobs by Campaign can display how well your invidual campaigns are performing.</p>
        							</div>
        							<div id="tabs-2">
        								<h2>How to analyze this data</h2>
        								<p>By using the ServiceTitan Jobs Board, your marketing team can benefit in various ways. Here are some of the benefits such software has to offer:</p>
        								<p>Track the performance of each of your campaigns by selecting the campaign you would like to see. Once selected we will display all of the recent jobs as well as how many how many calls came in as well as how many were booked as a result of that campaign.</p>

        							</div>
        						</div>					
							</div>
							<div class="col-1-2">
								<table class="tg" id="stjobs_table" border='1'>
								    <thead>
    									<tr>
    										<th class="tg-yw4l" colspan="1">Job ID</th>					
    										<th class="tg-yw4l" colspan="1">Campaigns Name</th>
    										<th class="tg-yw4l" colspan="1">Customer Name</th>
    										<th class="tg-yw4l" colspan="1">Job Start Date</th>
    										<!--<th class="tg-yw4l" colspan="1">SubTotal</th>-->
    										<th class="tg-yw4l" colspan="1">Total</th>
    										<th class="tg-yw4l" colspan="1">Job Summary</th>
    									</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>	
							<div class="col-1-2">
								<div id="chartdiv-stcampaignfunnel" style="height:500px"></div>
							</div>
							<div class="col-1-1">
								<div class="data-name-info">
									<h3>Calls Data</h3>
									<i class="edu-img fa fa-graduation-cap"></i>
									<?php if (get_option('gapi_dev_st_campaign_group') <> "" ) { ?>
										<h4>Campaign Selected: <?php echo get_option('gapi_dev_st_campaign_group_name'); ?></h4>
									<?php } ?>							
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
								<table class="tg" id="stcalls_table" border='1'>
								    <thead>
    									<tr>
    										<th class="tg-yw4l" colspan="1">Call ID</th>					
    										<th class="tg-yw4l" colspan="1">Campaigns Name</th>
    										<th class="tg-yw4l" colspan="1">Lead Type</th>
    										<th class="tg-yw4l" colspan="1">Duration</th>
    										<th class="tg-yw4l" colspan="1">Received On</th>
    										<th class="tg-yw4l" colspan="1">Customer Number</th>
    										<th class="tg-yw4l" colspan="1">Recording URL</th>
    									</tr>
									</thead>
									<tbody></tbody>
								</table>
								<div id="chartdiv-stleadtype" style="height:500px"></div>	
							</div>
						</div>
					</div>
				</div>					
			</div>
            <?php } ?>

		</section>			
	</div><!-- End #csanalytics-data -->
<div id="loading"></div>
</div><!-- End #panel-Board -->
<div class="clear"></div>
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