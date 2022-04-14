<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . DIRECTORY_SEPARATOR . "Model/Client.php";

class PasswordReminder
{
    private $clientDetails;
    private Client $client;
    private $clientId;

    public function __construct($clientDetails)
    {
        $this->clientDetails = $clientDetails;
        $this->client = new Client($clientDetails['id']);

    }

    public function checkPasswordExpiration()
    {
        $passwordExpirationTime = $this->client->getClientPasswordExpiration();

    }

    public function getPasswordExpirationTime()
    {
        $password_resetted_at = Capsule::table('passwordreset')
            ->where('client_id', $this->client->getId())
            ->first()->resetted_at;

        $passwordExpirationTime = \Carbon\Carbon::parse($password_resetted_at)
            ->addDays(ReminderConfiguration::passwordWillExpireAfter());

        return $passwordExpirationTime;
    }

    public function remindChangePassword()
    {

    }
}