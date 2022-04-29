<?php


include __DIR__ . "\controllers\TicketAssigner.php";



add_hook('TicketOpen', 1, function ($vars) {

    $ticketAssigner = new TicketAssigner();
    $ticketAssigner->handle($vars['ticketid']);
});

add_hook('AdminSupportTicketPagePreTickets', 1, function ($vars) {
//    var_dump($vars);
//    die();
    $ticketAssigner = new TicketAssigner();
    $supportersDetails = $ticketAssigner->getSupportersWithTickets();

    return include __DIR__ . "\\views\AdminsTicketsStatus.tpl";

});
