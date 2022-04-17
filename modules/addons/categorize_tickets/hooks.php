<?php

use Illuminate\Database\Capsule\Manager as Capsule;

add_hook('AdminAreaViewTicketPage', 1, function ($vars) {

    $tags = Capsule::table('tbltags')->where('type', 'ticket')->get();

    ob_start();
    include __DIR__ . DIRECTORY_SEPARATOR . "/views/AdminAreaViewTicketPage.html";
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
});