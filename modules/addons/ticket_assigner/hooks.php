<?php


include __DIR__ . "\controllers\TicketAssigner.php";


add_hook('TicketOpen', 1, function ($vars) {

    $ticketAssigner = new TicketAssigner();
    $ticketAssigner->handle($vars['ticketid']);
});

add_hook('AdminSupportTicketPagePreTickets', 1, function ($vars) {
//    $response = localAPI('GetStaffOnline')['staffonline']['staff'];
//    print json_encode($response);
//    die();



    $ticketAssigner = new TicketAssigner();
    $temp = $ticketAssigner->getSupporterWithMinimumTickets('online');
//    print json_encode($temp);
//    die();
    $supportersDetails = $ticketAssigner->getSupportersWithTickets();

    return include __DIR__ . "\\views\AdminsTicketsStatus.php";

});
