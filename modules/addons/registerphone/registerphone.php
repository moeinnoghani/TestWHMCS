<?php


function registerphone_config()
{
    return [
        'name' => 'Register Phone.No Module',
        'description' => 'A Module To Remind something to clients',
        'author' => 'Moein Noghani',
        'version' => '1.0',
    ];
}

function registerphone_activate(){

}
function registerphone_clientarea($vars)
{

    return array(
        'pagetitle' => 'phone_verify',
        'breadcrumb' => array('index.php?m=registerphone'=>'phone_verify.tpl'),
        'templatefile' => 'phone_verify',
        'requirelogin' => true, # accepts true/false
        'forcessl' => false, # accepts true/false
        'vars' => array(
            'testvar' => 'phone_verify',
            'anothervar' => 'value',
            'sample' => 'phone_verify',
        ),
    );
}

//function phone_verify_clientarea($vars)
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
