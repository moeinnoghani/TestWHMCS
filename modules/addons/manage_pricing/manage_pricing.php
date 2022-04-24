<?php

include __DIR__ . DIRECTORY_SEPARATOR . "/controllers/ManagePricing.php";

use Illuminate\Database\Capsule\Manager as Capsule;

function manage_pricing_config()
{

    $configArr = [
        'name' => 'Manage Pricing of Products/Services',
        'description' => 'ماژولی جهت افزایش/کاهش قیمت محصولات به صورت درصدی یا عدد قیمت مشخص',
        'author' => 'Moein Noghani',
        'language' => 'english',
        'version' => '1.0'
    ];

    return $configArr;
}

function manage_pricing_activate()
{

}

function manage_pricing_upgrade()
{

}

function manage_pricing_output($vars)
{

    $result = localAPI('getProducts', []);

    if (isset($_POST['changePriceValue'])) {

        $priceManager = new ManagePricing($_POST['checkboxes'], $_POST['changePriceValue']);
        $priceManager->handle();

    }


    return include __DIR__ . DIRECTORY_SEPARATOR . "/views/Modulepage_AdminArea.php";

}
