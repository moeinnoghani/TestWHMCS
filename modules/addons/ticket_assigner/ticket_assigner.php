<?php

include __DIR__ . DIRECTORY_SEPARATOR . '/controllers/TicketAssigner.php';


function ticket_assigner_config()
{
    $configs = [
        'name' => 'Assign Tickets By Defined Rules',
        'description' => 'ماژولی جهت تخصیص تیکت ها به پیشتیبان ها بر اساس تیکت هایی که در دست انجام است',
        'author' => 'Moein Noghani',
        'version' => '1.0',
        'language' => 'english',
        'fields' => []
    ];

    return $configs;
}

function ticket_assigner_output()
{
    $ticketAssigner = new TicketAssigner();

    $updateTicketParams = [
        'ticketid' => 9,
        'flag' => 2
    ];

    $respone = localAPI('UpdateTicket', $updateTicketParams);

    $temp = $ticketAssigner->getTicketsOfSupporter(6);

    $temp2 = $ticketAssigner->getSupporterWithMinimumTickets();



}

function ticket_assigner_activate()
{

}
