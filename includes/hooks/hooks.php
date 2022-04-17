<?php

//add_hook('UserLogin', 1, function($vars) {
//
////    $command = 'GetClientsDetails';
//    $postData = array(
//        'clientid' => $vars['user']['id'],
//        'stats' => true,
//    );
//
//    $results = localAPI('GetClientsDetails', $postData);
//
////    print \GuzzleHttp\json_encode($results["customfields1"]);
////    die();
//    if ($results["customfields1"]!='on'){
//        echo 'phone.no is not valid';
//    }
//});
//
add_hook('ClientAreaPage', 1, function ($vars) {


    $postData = [
        'clientid' => $vars['client']['id'],
        'stats' => true,
    ];
    $results = localAPI('GetClientsDetails', $postData);


    if ($_SERVER['REQUEST_URI'] != '/whmcs-8/index.php?m=phone_verify'
        && $_SERVER['REQUEST_URI'] != '/whmcs-8/index.php?rp=/login') {
        if (!$results['customfields1'] == 'on') {
            file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'file.json', json_encode($results));
            header('Location: http://localhost:8080/whmcs-8/index.php?m=registerphone');
            exit();

        }
    }

    file_put_contents(__DIR__ . '/text.json', json_encode($vars['client']['id']), FILE_APPEND);

});

add_hook('AddonConfigSave', 1, function($vars) {
    var_dump($vars);
    die();
});



