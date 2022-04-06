<?php

function phone_verify_clientarea($vars)
{
    return array(
        'pagetitle' => 'phone_verify',
        'breadcrumb' => array('index.php?m=phone_verify'=>'phone_verify.tpl'),
        'templatefile' => 'login',
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
