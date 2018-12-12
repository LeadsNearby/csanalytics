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
	//ServiceTitan Data
	var ServiceTitanPageSize = '<?php echo $gapi_st_max_results ?>';
	var ServiceTitan_apikey = '<?php echo $dev_servicetitan_apikey ?>';
	var ServiceTitanCampaigns = 'https://api.servicetitan.com/v1/campaigns?serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanCalls = 'https://api.servicetitan.com/v1/calls?filter.pageSize='+ ServiceTitanPageSize +'&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanJobs = 'https://api.servicetitan.com/v1/jobs?filter.pageSize='+ ServiceTitanPageSize +'&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	var ServiceTitanJobsTotal = 'https://api.servicetitan.com/v1/jobs?filter.pageSize=2000&filter.createdAfter='+ startdate +'&filter.createdBefore='+ enddate +'&serviceTitanApiKey='+ ServiceTitan_apikey;
	//Convirza Tracking
	var ConvExtID = '<?php echo $dev_conv_profile ?>';
	var ConvAPIKey = '369281456857b6910b0b8e0b1d7b046c';   
	var ConvAPISec= '%241%24SVUTmT1e%24hqQHTUvAFOoUuZ5bFVqle.';
	var NewConvData ='https://api.logmycalls.com/services/getCallDetails?criteria[external_ouid]='+ConvExtID+'&criteria[start_calldate]='+startdate+'&criteria[end_calldate]='+enddate+'&api_key='+ConvAPIKey+'&api_secret='+ConvAPISec+'&limit=1000&sort_by=id&sort_order=asc';	
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
				var totalcallcount = data[0].totalCount;

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
			jQuery('#stcalls_table').append(stCallsHTML);
			
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
			jQuery('#stjobs_table').append(stJobsHTML);

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
		
		});			

//-------- ServiceTitan Data End		


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
					
					jQuery('#adwords_table').append(adwordsHTML);
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

				var campaignNotOpened = emailSent - emailOpened;
				var campaignNotClicked = emailOpened - emailClicked;

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
				conversionsHTML += '<tr><td class="tg-yw4l">' + item.campaign + '</td><td class="tg-yw4l">' + item.conversion_type + '</td><td class="tg-yw4l">' + item.conversion_name + '</td><td class="tg-yw4l">' + item.contact_name + '</td><td class="tg-yw4l">' + item.job_total + '</td></tr>';
			}); 
			jQuery('.gapiOntraPortNewContactsAll').append(newContacts);
			jQuery('#conversions_records').append(conversionsHTML);
					

            //Total Messages
			jQuery.each(data3[0].data, function(i, item){

				emailSentTotal += parseFloat(data3[0].data[i].mcsent);
				emailOpenedTotal += parseFloat(data3[0].data[i].mcopened);
				emailClickedTotal += parseFloat(data3[0].data[i].mcclicked);
				contactUnsubscribedTotal += parseFloat(data3[0].data[i].mcunsub);
				
				var notOpened = emailSentTotal - emailOpenedTotal;
				var notClicked = emailOpenedTotal - emailClickedTotal;

				messagesHTML += '<tr><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].alias + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].subject + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcsent + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcopened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcclicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + notOpened + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + notClicked + '</span></td><td class="tg-yw4l ussr-component-collection-cell"><span class="text-overflow-ellipsis">' + data3[0].data[i].mcunsub + '</span></td></tr>';
				
			});
			jQuery('.gapiTotalOntraPortEmailSent').append(emailSentTotal);
			jQuery('.gapiTotalOntraPortEmailOpened').append(emailOpenedTotal);
			jQuery('.gapiTotalOntraPortEmailClicked').append(emailClickedTotal);
			jQuery('.gapiTotalOntraPortUnsubscribed').append(contactUnsubscribedTotal);
			jQuery('#campaign_delivery_records').append(campaignMessagesHTML);
			jQuery('#delivery_records').append(messagesHTML);
					
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
		    		
	});