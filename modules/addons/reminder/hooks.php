<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'ChangePasswordReminder.php';
include __DIR__ . DIRECTORY_SEPARATOR . "configs/ReminderConfiguration.php";

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('ClientAreaPage', 1, function ($vars) {

    $passwordExpiration_InDay = Capsule::table('tbladdonmodules')
        ->where('module', 'reminder')
        ->where('setting', 'passwordExpirationTime')
        ->first('value');

    ReminderConfiguration::setPasswordExpirationTime($passwordExpiration_InDay->value);

    $changePasswordReminder = new ChangePasswordReminder($vars['clientsdetails']['id']);

});

add_hook('UserChangePassword', 1, function ($vars) {

    $user_id = $vars['user_id'];

    $postParams = array(
        'clientid' => $user_id,
        'stats' => true,
    );
    $respone = localAPI('GetClientsDetails', $postParams);

    $changePasswordReminder = new ChangePasswordReminder($respone['client']);

    $changePasswordReminder->setPasswordResetTime(\Carbon\Carbon::now());

});








