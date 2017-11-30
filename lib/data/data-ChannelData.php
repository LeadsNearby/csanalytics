<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

ob_start();

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );;

$gapi_dev_email = get_option('gapi_dev_email');
$gapi_dev_key = get_option('gapi_dev_key');
$gapi_dev_profile = get_option('gapi_dev_profile');
$gapi_primary_dimension = get_option('gapi_primary_dimension');
$gapi_secondary_dimension = get_option('gapi_secondary_dimension');
$gapi_max_results = get_option('gapi_max_results');
$gapi_max_results_list = $gapi_max_results ?: '5';

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

if($gapi_primary_dimension <> "" && $gapi_secondary_dimension <> ""){
  $array = array(
		'dimensions'  => 'ga:'.$gapi_primary_dimension.',ga:'.$gapi_secondary_dimension,
        'sort'        => '-ga:goalCompletionsAll',
        'max-results' => $gapi_max_results_list
  );
} elseif($gapi_primary_dimension <> ""){
  $array = array(
        'dimensions'  => 'ga:'.$gapi_primary_dimension,
        'sort'        => '-ga:goalCompletionsAll',
        'max-results' => $gapi_max_results_list
  );    
} else {
    $array = array(
        'dimensions'  => 'ga:channelGrouping',
        'sort'        => '-ga:goalCompletionsAll',
        'max-results' => $gapi_max_results_list      
    );   
}   

$results = $analytics->data_ga->get(
  'ga:' . $google_account[ 'profile' ],
  $fromDate,
  $toDate, 'ga:sessions,ga:percentNewSessions,ga:newUsers,ga:bounceRate,ga:pageviewsPerSession,ga:avgSessionDuration,ga:goalConversionRateAll,ga:goalCompletionsAll', $array);	
$rows = $results->getRows();

/**
 * Format and output data as JSON
 */

if($gapi_primary_dimension <> "" && $gapi_secondary_dimension <> ""){
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'channelGrouping'   => $row[0],
		'secondayDimension' => $row[1],
		'sessions'  => $row[2],
		'percentNewSessions' => $row[3],
		'newUsers' => $row[4],
		'bounceRate' => $row[5],
		'pageviewsPerSession' => $row[6],
		'avgSessionDuration' => $row[7],
		'goalConversionRateAll' => $row[8],
		'goalCompletionsAll' => $row[8]
	  );
	}
} elseif($gapi_primary_dimension <> ""){
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'channelGrouping'   => $row[0],
		'sessions'  => $row[1],
		'percentNewSessions' => $row[2],
		'newUsers' => $row[3],
		'bounceRate' => $row[4],
		'pageviewsPerSession' => $row[5],
		'avgSessionDuration' => $row[6],
		'goalConversionRateAll' => $row[7],
		'goalCompletionsAll' => $row[8]
	  );
	}   
} else {
	$data = array();
	foreach( $rows as $row ) {
	  $data[] = array(
		'channelGrouping'   => $row[0],
		'sessions'  => $row[1],
		'percentNewSessions' => $row[2],
		'newUsers' => $row[3],
		'bounceRate' => $row[4],
		'pageviewsPerSession' => $row[5],
		'avgSessionDuration' => $row[6],
		'goalConversionRateAll' => $row[7],
		'goalCompletionsAll' => $row[8]
	  );
	}
} 

ob_end_clean();

echo json_encode( $data );