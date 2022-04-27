<?php

use Illuminate\Database\Capsule\Manager as Capsule;

include __DIR__ . DIRECTORY_SEPARATOR . "CategorizeTicket.php";


function categorize_tickets_config()
{
    return [
        // Display name for your module
        'name' => 'Categorize Tickets By Tags',
        // Description displayed within the admin interface
        'description' => 'ماژولی جهت دسته بندی تیکت ها بر اساس تگ های ثبت شده',
        // Module author name
        'author' => 'Moein Noghani',
        // Default language

        // Version number
        'version' => '1.1',
        'fields' => [
            // a text field type allows for single line text input
            'ticket_tags' => [
                'FriendlyName' => 'Create New Ticket Tag',
                'Type' => 'text',
                'Size' => '25',
                'Default' => 'Default value',
                'Description' => []
            ],


        ]
    ];
}

function categorize_tickets_activate($vars)
{

}

function categorize_tickets_upgrade($vars)
{
    $currentVersion = $vars['version'];

    if ($currentVersion < 1.1) {
        Capsule::schema()
            ->create(
                'tbltags',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->text('type');
                    $table->text('tag');

                }
            );

        Capsule::schema()
            ->create(
                'ticketstags',
                function ($table) {
                    /** @var \Illuminate\Database\Schema\Blueprint $table */
                    $table->increments('id');
                    $table->text('ticket_id');
                    $table->text('tag');

                }
            );
    }
}

function categorize_tickets_output($vars)
{

    $categorizeTicket = new CategorizeTicket();
    $tickets = $categorizeTicket->getTicketsDetails();

    $tags = $categorizeTicket->getTicketTags();

   if(isset($_POST['exportExel'])){

       $categorizeTicket->exportToExel();

       header('Location: http://localhost/whmcs-8/modules/addons/categorize_tickets/getExel.php');
       exit();

   }


    if (isset($_POST['selectedTag']) && isset($_POST['ticketId'])) {
        $categorizeTicket->setTagToTicket($_POST['ticketId'], $_POST['selectedTag']);
    }

    if (isset($_POST['newtag'])) {
        $categorizeTicket->addNewTag($_POST['newtag']);
    }

    if (isset($_POST['selectTagBtn'])) {
        file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'file.json', 'ok');
        $tickets = $categorizeTicket->getFilteredTickets($_POST['selectedTag']);

        return include __DIR__ . DIRECTORY_SEPARATOR . 'views/Module_AdminArea.html';
    } else {
        return include __DIR__ . DIRECTORY_SEPARATOR . 'views/Module_AdminArea.html';
    }


}