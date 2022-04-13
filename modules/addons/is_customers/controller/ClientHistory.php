<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . "/../lib/returner.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../EmailValidator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../api/EmailApi.php";

date_default_timezone_set("Asia/Tehran");

class ClientHistory extends mainController
{
    private $clientEmail;
    private $clientId;
    private $verifiedUser;

    const EXPIRED_AFTER = 3;

    public function __construct()
    {

    }



    public function getClientHistoryInDays($clientEmail)
    {
        $user = Capsule::table('tblclients')
            ->where('email', $clientEmail)
            ->first();

        $startTime = new \Carbon\Carbon($user->created_at);
        $nowTime = \Carbon\Carbon::now();
        $timeDifference = $nowTime->diffInDays($startTime);

        return $timeDifference;
    }


}