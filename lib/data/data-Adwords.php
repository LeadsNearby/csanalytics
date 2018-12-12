<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

ob_start();

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );;

$gapi_dev_email = get_option('gapi_dev_email');
$gapi_dev_key = get_option('gapi_dev_key');
$gapi_dev_profile = get_option('gapi_dev_profile');
$gapi_adw_primary_dimension = get_option('gapi_adw_primary_dimension');
$gapi_adw_secondary_dimension = get_option('gapi_adw_secondary_dimension');
$gapi_adw_max_results = get_option('gapi_adw_max_results');
$gapi_adw_max_results_list = $gapi_adw_max_results ?: '3';

/**
 * Set Google service account details
 */
$google_account = array(
  'email'   => $gapi_dev_email,
  'key'     => file_get_contents( $gapi_dev_key ),
  'profile' => $gapi_dev_profile
);

/**
 * Returns Analytics API object
 */
function getService( $service_account_email, $key ) {
  // Creates and returns the Analytics service object.

  // Load the Google API PHP Client Library.
  require_once 'Google/autoload.php';

  // Create and configure a new client object.
  $client = new Google_Client();
  $client->setApplicationName( 'Google Analytics Dashboard' );
  $analytics = new Google_Service_Analytics( $client );

  // Read the generated client_secrets.p12 key.
  $cred = new Google_Auth_AssertionCredentials(
      $service_account_email,
      array( Google_Service_Analytics::ANALYTICS_READONLY ),
      $key
  );
  $client->setAssertionCredentials( $cred );
  if( $client->getAuth()->isAccessTokenExpired() ) {
    $client->getAuth()->refreshTokenWithAssertion( $cred );
  }

  return $analytics;
}

/**
 * Get Analytics API instance
 */
$analytics = getService(
  $google_account[ 'email' ],
  $google_account[ 'key' ]
);

/**
 * Variables for Start and End Dates
 */
$fromDate = get_option('gapi_calendar_start');
$toDate = get_option('gapi_calendar_end'); 

/**
 * Query the Analytics data Sessions and Page Views by Date
 */ 

if($gapi_adw_primary_dimension <> "" && $gapi_adw_secondary_dimension <> ""){
  $array = array(
	'dimensions'  => 'ga:'.$gapi_adw_primary_dimension.',ga:'.$gapi_adw_secondary_dimension,
        'sort'        => '-ga:adClicks',
        'max-results' => $gapi_adw_max_results_list
  );
} elseif($gapi_adw_primary_dimension <> ""){
  $array = array(
        'dimensions'  => 'ga:'.$gapi_adw_primary_dimension,
        'sort'        => '-ga:adClicks',
        'max-results' => $gapi_adw_max_results_list
  );    
} else {
    $array = array(
        'dimensions'  => 'ga:campaign',
        'sort'        => '-ga:adClicks',
        'max-results' => $gapi_adw_max_results_list      
    );   
}  

$results = $analytics->data_ga->get(
  'ga:' . $google_account[ 'profile' ],
  $fromDate,
  $toDate, 'ga:CTR,ga:CPC,ga:impressions,ga:adClicks,ga:adCost,ga:bounceRate,ga:pageviewsPerSession,ga:goalCompletionsAll,ga:goalConversionRateAll', $array);	
$rows = $results->getRows();

/**
 * Format and output data as JSON
 */

if($gapi_adw_primary_dimension <> "" && $gapi_adw_secondary_dimension <> ""){
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'campaign'   => $row[0],
		'secondayDimension' => $row[1],
		'ctr'  => $row[2],
		'cpc' => $row[3],
		'impressions' => $row[4],
		'adclicks' => $row[5],
		'adcost' => $row[6],
		'bounceRate' => $row[7],
		'pageviewsPerSession' => $row[8],
		'goalCompletionsAll' => $row[9],
		'goalConversionRateAll' => $row[10]
	  );
	}
} elseif($gapi_adw_primary_dimension <> ""){
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'campaign'   => $row[0],
		'ctr' => $row[1],
		'cpc' => $row[2],
		'impressions' => $row[3],
		'adclicks' => $row[4],
		'adcost' => $row[5],
		'bounceRate' => $row[6],
		'pageviewsPerSession' => $row[7],
		'goalCompletionsAll' => $row[8],
		'goalConversionRateAll' => $row[9]
	  );
	}   
} else {
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'campaign'   => $row[0],
		'ctr' => $row[1],
		'cpc' => $row[2],
		'impressions' => $row[3],
		'adclicks' => $row[4],
		'adcost' => $row[5],
		'bounceRate' => $row[6],
		'pageviewsPerSession' => $row[7],
		'goalCompletionsAll' => $row[8],
		'goalConversionRateAll' => $row[9]
	  );
	}
} 

ob_end_clean();

echo json_encode( $data );