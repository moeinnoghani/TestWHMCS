<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class PasswordReminder
{
    private $clientDetails;
    private Client $client;

    public function __construct($clientDetails)
    {
        $this->clientDetails = $clientDetails;
        $this->client = new Client($clientDetails['id']);
    }

    public function checkPasswordExpiration()
    {
        $passwordExpirationTime = $this->client->getClientPasswordExpiration();
    }

    public function remindChangePassword()
    {

    }
}