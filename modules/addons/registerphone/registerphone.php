<?php

use WHMCS\Database\Capsule;

if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}


function registerphone_config()
{
    return [     // Display name for your module
        'name' => 'Register Phone Number',
        // Description displayed within the admin interface
        'description' => 'This module provides an example WHMCS Addon Module'
            . ' which can be used as a basis for building a custom addon module.',
        // Module author name
        'author' => 'Moein Noghani',
        // Default language
        'language' => 'english',
        // Version number
        'version' => '1.0',
       
    ];
}

function registerphone_activate()
{
    // Create custom tables and schema required by your module
    try {
        Capsule::schema()
            ->create(
                'registerphoneno',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->text('demo');
                }
            );

//        Capsule::table('registerphoneno_table')->insert([
//            'is_active' => true
//        ]);

        return [
            // Supported values here include: success, error or info
            'status' => 'success',
            'description' => 'This is a demo module only. '
                . 'In a real module you might report a success or instruct a '
                . 'user how to get started with it here.',
        ];
    } catch (\Exception $e) {
        return [
            // Supported values here include: success, error or info
            'status' => "error",
            'description' => 'Unable to create mod_addonexample: ' . $e->getMessage(),
        ];
    }
}

function registerphone_deactivate()
{
    // Undo any database and schema modifications made by your module here
    try {
        Capsule::schema()
            ->dropIfExists('mod_addonexample');

        return [
            // Supported values here include: success, error or info
            'status' => 'success',
            'description' => 'This is a demo module only. '
                . 'In a real module you might report a success here.',
        ];
    } catch (\Exception $e) {
        return [
            // Supported values here include: success, error or info
            "status" => "error",
            "description" => "Unable to drop mod_addonexample: {$e->getMessage()}",
        ];
    }
}

//function registerphone_config()
//{
//    return [
//        'name' => 'verify number',
//        'description' => 'This module provides an example WHMCS Addon Module'
//            . ' which can be used as a basis for building a custom addon module.',
//        'author' => 'alireza',
//        'language' => 'english',
//        'version' => '1.0',
//    ];
//}
//
//function registerphone_activate()
//{
//    try {
//        Capsule::schema()
//            ->create(
//                'security_table',
//                function ($table) {
//                    /** @var \Illuminate\Database\Schema\Blueprint $table */
//                    $table->increments('id');
//                    $table->boolean('is_active');
//                    $table->text('demo');
//                }
//            );
//        Capsule::table('security_table')->insert([
//            'is_active' => true
//        ]);
//        return [
//            // Supported values here include: success, error or info
//            'status' => 'success',
//            'description' => 'This is a demo module only. '
//                . 'In a real module you might report a success or instruct a '
//                . 'user how to get started with it here.',
//        ];
//    } catch (\Exception $e) {
//        return [
//            // Supported values here include: success, error or info
//            'status' => "error",
//            'description' => 'Unable to create security_table: ' . $e->getMessage(),
//        ];
//    }
//
//}
//
//function registerphone_deactivate()
//{
//    try {
//        Capsule::schema()
//            ->dropIfExists('security_table');
//
//        return [
//            'status' => 'success',
//            'description' => 'This is a demo module only. '
//                . 'In a real module you might report a success here.',
//        ];
//    } catch (\Exception $e) {
//        return [
//            "status" => "error",
//            "description" => "Unable to drop security_table : {$e->getMessage()}",
//        ];
//    }
//
//}
//
//function registerphone_clientarea($vars)
//{
//    return array(
//        'pagetitle' => 'phone_verify',
//        'breadcrumb' => array('index.php?m=phone_verify' => 'phone_verify.tpl'),
//        'templatefile' => 'phone_verify.tpl',
//        'requirelogin' => true,
//        'forcessl' => false,
//        'vars' => array(
//            'testvar' => 'phone_verify',
//            'anothervar' => 'value',
//            'sample' => 'phone_verify',
//        ),
//    );
//}
//
//function registerphone_output($vars)
//{
//
//    include __DIR__ . './adminOutput.tpl';
//    $modulelink = $vars['modulelink'];
//    $version = $vars['version'];
//
//}
//
//function activeVerify()
//{
//    if ($_POST['activeVerify']) {
//        Capsule::table('security_table')->update([
//            'is_active' => 'true'
//        ]);
//        return true;
//    }
//    if ($_POST['diactiveVerify']) {
//        Capsule::table('security_table')->update([
//            'is_active' => 'true'
//        ]);
//        return false;
//    }
//}
