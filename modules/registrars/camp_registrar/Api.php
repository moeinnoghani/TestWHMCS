<?php

class Api
{

//include

    private $token;
    private $basse_url;
    private $client;

    public function __construct($token, $base_url)
    {
        $this->token = $token;
        $this->basse_url = $base_url;
        $this->client = new \GuzzleHttp\Client($base_url);
    }

    public function request($method, $endpoint, $formParams, $dataform)
    {
        try {

            $respone = $this->client()

        } catch (Exception $e) {

        }

    }

    public function post()
    {
return $this->request('post',)
    }

    public function put()
    {

    }

    public function get()
    {

    }
}