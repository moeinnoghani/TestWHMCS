<?php

use Illuminate\Database\Capsule\Manager as Capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

function reminder_config()
{
    return [
        'name' => 'Reminder Module',
        'description' => 'A Module To Remind something to clients',
        'author' => 'Moein Noghani',
        'version' => '1.1',
        "fields" => [
            "passwordExpirationTime" => [
                'FriendlyName' => 'Password Expiration Time',
                'Type' => 'text',
                'Size' => 5,
                'Description' => 'Please Enter Expiration Time in Day',
            ]
        ]
    ];


}

function reminder_activate()
{

}

function reminder_clientarea($vars)
{

}

function reminder_output($vars)
{


}

function reminder_sidebar($vars)
{

}

function reminder_upgrade($vars)
{
    $currentVersion = $vars['version'];

    if ($currentVersion < 1.1) {
        Capsule::schema()
            ->create(
                'passwordreset',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->integer('client_id');
                    $table->timestamp('resetted_at');

                }
            );
    }

}