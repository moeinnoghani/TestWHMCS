<?php


add_hook('ClientAreaRegister', 1, function ($vars) {
//    print json_encode($vars);
//    die();
});

add_hook('ClientAreaPageRegister', 1, function ($vars) {

    ob_clean();
    header('Location: http://localhost:8080/whmcs-8/index.php?m=custom_register');
    exit();
});