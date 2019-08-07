<?php

$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
require_once $parse_uri[0] . 'wp-load.php';

class ConvirzaApI {

    private $token = '';
    private $api_base_url = '';

    public function __construct() {
        $this->token = $this->convirza_auth();
        $this->api_base_url = 'https://apicfa.convirza.com/v2';
    }

    private function convirza_auth() {

        $auth_body = array(
            "grant_type" => "password",
            "client_id" => "system",
            "client_secret" => "f558ba166258089b2ef322c340554c",
            "username" => "devops@leadsnearby.com",
            "password" => "EEx99GnDppECGwHS",
        );

        $url = 'https://apicfa.convirza.com/oauth/token';

        $response = wp_remote_post($url, array(
            'method' => 'POST',
            'headers' => array(
                'content-type' => 'application/json',
            ),
            'body' => json_encode($auth_body),
        ));

        $response_body = json_decode($response['body'], true);

        //Return the auth token
        return $response_body['access_token'];
    }

    public function request($endpoint, $request, $body = '') {

        $response = wp_remote_get($this->api_base_url . $endpoint, array(
            'headers' => array(
                'Authorization' => 'bearer ' . $this->token,
                'Content-Type' => 'application/json',
            ),
        ));

        return $response;

    }

}

$id = get_option('gapi_dev_conv_profile');
$params = array(
    'external_id' => $id,
    'repeat_call' => false,
);

$query = http_build_query($params);

$convirza = new ConvirzaApI();
$call_data = $convirza->request('/call/detail?external_id[]=' . $id . '&recordURL=true', 'GET');

echo $call_data['body'];

?>