<?php


use WHMCS\View\Menu\Item as MenuItem;

add_hook('ClientAreaPrimaryNavbar', 1, function (MenuItem $primaryNavbar)
{
    $primaryNavbar->addChild('َAdd Order By Configs')
        ->setUri('http://localhost/whmcs-8/index.php?m=orderByConfigs')
        ->setOrder(70);
});