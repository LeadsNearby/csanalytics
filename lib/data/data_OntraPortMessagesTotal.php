<?php

header('Access-Control-Allow-Origin: *');

ob_start();

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once $parse_uri[0] . 'wp-load.php';

$gapi_dev_ontraport_apikey = get_option('gapi_dev_ontraport_apikey');
$gapi_dev_ontraport_appid = get_option('gapi_dev_ontraport_appid');
$gapi_dev_campaign_group = get_option('gapi_dev_campaign_group');

$url = 'https://api.ontraport.com/1/Messages?listFields=alias%2Cmcsent%2Cmcopened%2Cmcclicked%2Cmcunsub%2Csubject';
$ch = curl_init($url);
$headers = array(
    'Accept: application/json',
    'Api-Key: ' . $gapi_dev_ontraport_apikey,
    'Api-Appid: ' . $gapi_dev_ontraport_appid,
    //'Api-Key: ' . strlen($data_string)
);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
//curl_setopt($ch, CURLOPT_TIMEOUT, 5);
//curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

$result = curl_exec($ch);

curl_close($ch);

ob_end_clean();

echo $result;