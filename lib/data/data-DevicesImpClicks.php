<?php header('Access-Control-Allow-Origin: *'); ?>
<?php

ob_start();

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );;

$gapi_dev_email = get_option('gapi_dev_email');
$gapi_dev_key = get_option('gapi_dev_key');
$gapi_dev_profile = get_option('gapi_dev_profile');

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

  // Set the Cache Directory
	$client->setClassConfig('Google_Cache_File', 'directory', plugin_dir_path(__DIR__) . 'data/cache/');
  $cache = new Google_Cache_File($client);

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
$results = $analytics->data_ga->get(
  'ga:' . $google_account[ 'profile' ],
  $fromDate,
  $toDate,
 'ga:impressions,ga:adClicks',
  array(
    'dimensions'  => 'ga:deviceCategory',
    'sort'        => 'ga:deviceCategory',
    'max-results' => 20
  ) );
$rows = $results->getRows();

/**
 * Format and output data as JSON
 */
$data = array();
foreach( $rows as $row ) {
  $data[] = array(
    'device'   => $row[0],
    'impressions'  => $row[1],
    'clicks' => $row[2]
  );
}

ob_end_clean();

echo json_encode( $data );