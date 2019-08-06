<?php

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

        return json_decode($response['body'], true);
    }

}

$convirza = new ConvirzaApI();

var_dump($convirza->request('/call/list', 'GET'));

?>