<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'configs/OrderConfiguration.php';
include __DIR__.DIRECTORY_SEPARATOR.'controllers/OrderManager.php';

function orderByConfigs_config()
{

    $configArr = [
        'name' => 'Order a Service By Custom Confgis',
        'description' => 'در این حالت پس از انتخاب کانفیگ ها پلن های مشخص شده لیست می شوند',
        'author' => 'Moein Noghani',
        'language' => 'english',
        'version' => '1.0'
    ];

    return $configArr;
}

function orderByConfigs_clientarea()
{
    $orderManager = new OrderManager();

    if (isset($_POST['step1'])) {
        $HDDs = OrderConfiguration::getHDDs();
        $operatingSystems = OrderConfiguration::getOS($_POST['region']);

    }
    if (isset($_POST['step2'])) {
     var_dump($_POST);
     die();
    }

    return array(
        'templatefile' => 'Views/orderByConfigs',
        'requirelogin' => true, # accepts true/false
        'forcessl' => false, # accepts true/false
        'vars' => [
            'regions' => OrderConfiguration::getRegions(),
            'operatingSystems'=>$operatingSystems
        ]

    );
}

