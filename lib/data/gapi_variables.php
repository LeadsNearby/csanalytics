<?php

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