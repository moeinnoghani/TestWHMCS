<?php

include __DIR__ . DIRECTORY_SEPARATOR . "PasswordReminder.php";
include __DIR__ . DIRECTORY_SEPARATOR . "configs/ReminderConfiguration.php";

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaPage', 1, function ($vars) {

    $passwordExpiration_InDay = Capsule::table('tbladdonmodules')
        ->where('module', 'reminder')
        ->where('setting', 'passwordExpirationTime')
        ->first('value')->value;

    ReminderConfiguration::setPasswordExpirationTime($passwordExpiration_InDay);

    $passwordReminder = new PasswordReminder($vars['clientsdetails']);
    var_dump($passwordReminder->getPasswordExpirationTime());
    die();

});






