<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . DIRECTORY_SEPARATOR . "Model/Client.php";

class ChangePasswordReminder
{
    private $clientDetails;
//    private Client $client;
    private $clientId;

    public function __construct($clientDetails)
    {
        $this->clientDetails = $clientDetails;
        $this->clientId = $clientDetails['id'];

    }

//    public function checkPasswordExpiration()
//    {
//        $passwordExpirationTime = $this->client->getClientPasswordExpiration();
//
//    }

    public function isPasswordExpired()
    {
        $passwordExpirationTime = $this->getPasswordExpirationTime();

        if ($passwordExpirationTime->lt(\Carbon\Carbon::now())) {
            return true;
        } else {
            return false;
        }

    }

    public function getPasswordExpirationTime()
    {
        $password_resetted_at = Capsule::table('passwordreset')
            ->where('client_id', $this->clientId)
            ->first()->resetted_at;

        $passwordExpirationTime = \Carbon\Carbon::parse($password_resetted_at)
            ->addDays(ReminderConfiguration::passwordWillExpireAfter());

        return $passwordExpirationTime;
    }

    public function remindChangePassword()
    {
        if ($this->isPasswordExpired()){
            //Redirect to ChangePassword Page
        }
    }

    public function setPasswordResetTime($time)
    {
        Capsule::table('passwordreset')
            ->where('client_id', $this->clientId)
            ->update([
                'resetted_at' => $time
            ]);

    }
}