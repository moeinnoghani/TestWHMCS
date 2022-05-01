<?php

include __DIR__ . DIRECTORY_SEPARATOR . "controllers/CustomRegister.php";

use Illuminate\Database\Capsule\Manager as Capsule;

function custom_register_config()
{
    return [
        'name' => 'SignUp Authorization',
        'description' => 'asdasdasdaa////****',
        'author' => 'Moein Noghani',
        'version' => '1.0',
        'language' => 'english',
        'fields' => []
    ];
}

function custom_register_activate()
{

}


function custom_register_clientarea($vars)
{

    if ($_POST['val']) {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'file.json', 'ok');
        $customRegister = new CustomRegister($_REQUEST);
        $customRegister->register();
    }

    return array(
        'pagetitle' => 'phone_verify',
        'breadcrumb' => array('index.php?m=custom_register' => 'client_custom_register.tpl'),
        'templatefile' => "views/client_custom_register",
        'requirelogin' => false, # accepts true/false
        'forcessl' => false, # accepts true/false
//        'vars' => array(
//            'testvar' => 'phone_verify',
//            'anothervar' => 'value',
//            'sample' => 'phone_verify',
//        ),
    );
}

function custom_register_upgrade($vars)
{
    $currentVersion = $vars['version'];

    if ($currentVersion < 1.1) {
        Capsule::schema()
            ->create(
                'registration_data',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->string('email');
                    $table->integer('validation_code');
                    $table->timestamp('verified_at');
                    $table->timestamp('expired_at');
                    $table->timestamps();
                }
            );
    }
}