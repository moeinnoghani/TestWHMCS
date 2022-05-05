<?php

include __DIR__ . DIRECTORY_SEPARATOR . "Controllers/SubmitController.php";
include __DIR__ . DIRECTORY_SEPARATOR . "Controllers/VerifyController.php";
include __DIR__ . DIRECTORY_SEPARATOR . "/configs/VerifyCodeConfiguration.php";


use Illuminate\Database\Capsule\Manager as Capsule;

function custom_register_config()
{
    return [
        'name' => 'SignUp Authorization',
        'description' => 'asdasdasdaa////****',
        'author' => 'Moein Noghani',
        'version' => '1.1',
        'language' => 'english',
        'fields' => []
    ];
}

function custom_register_activate()
{

}


function custom_register_clientarea($vars)
{
    switch ($_POST['request_type']) {
        case 'submit':
        {
            file_put_contents(__DIR__ . "/testConfigs.json",
                VerifyCodeConfiguration::getVerifyCodeTriesTime() . VerifyCodeConfiguration::getVerifyCodeExpirationTime() . VerifyCodeConfiguration::getVerifyCodeDigits()
            );
//            VerifyCodeConfiguration::setVerifyCodeDigits(5);
//            VerifyCodeConfiguration::setVerifyCodeExpirationTime(2);
//            VerifyCodeConfiguration::setVerifyCodeTriesTime(3);

            $submitController = new SubmitController($_REQUEST);
            $submitController->submit();
            $response = $submitController->getResponse();

            echo json_encode($response);
            die();
        }

        case 'verify':
        {


//            VerifyCodeConfiguration::setVerifyCodeDigits(5);
//            VerifyCodeConfiguration::setVerifyCodeExpirationTime(2);
//            VerifyCodeConfiguration::setVerifyCodeTriesTime(3);

            $verifyController = new VerifyController($_REQUEST);
            $verifyController->verify();
            $response = $verifyController->getResponse();

            echo json_encode($response);
            die();
        }
    }


    return array(
        'pagetitle' => 'phone_verify',
        'breadcrumb' => array('index.php?m=custom_register' => 'client_custom_register.tpl'),
        'templatefile' => "Views/client_custom_register",
        'requirelogin' => false, # accepts true/false
        'forcessl' => false, # accepts true/false
//        'vars' => array(
//            'testvar' => 'phone_verify',
//            'anothervar' => 'value',
//            'sample' => 'phone_verify',
//        ),
    );
}

function Custom_register_output($vars)
{
    if ($_POST['submit'] == true) {
        VerifyCodeConfiguration::setVerifyCodeExpirationTime((int)$_POST['expiration_time']);
        VerifyCodeConfiguration::setVerifyCodeTriesTime((int)$_POST['tries_time']);
        VerifyCodeConfiguration::setVerifyCodeDigits((int)$_POST['digits']);
    }

    return include __DIR__ . DIRECTORY_SEPARATOR . "/Views/module_adminarea.html";
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
                    $table->string('firstname');
                    $table->string('lastname');
                    $table->string('email');
                    $table->string('phone_number');
                    $table->string('password');
                    $table->integer('tries_time')->nullable();
                    $table->integer('verify_code')->nullable();
                    $table->timestamp('verified_at')->nullable();
                    $table->timestamp('expired_at');
                    $table->timestamps();
                }
            );
    }
}