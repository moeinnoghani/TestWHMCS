<?php

use Illuminate\Database\Capsule\Manager as Capsule;

//use Rap2hpoutre\FastExcel\Facades\FastExcel;

include __DIR__ . DIRECTORY_SEPARATOR . "vendor/autoload.php";


class CategorizeTicket
{


    public function __construct()
    {
    }

    public function addNewTag($tagName)
    {
        Capsule::table('tbltags')->insert([
            'type' => 'ticket',
            'tag' => $tagName
        ]);

    }

    public function getTicketTags()
    {
        $tags = Capsule::table('tbltags')->where('type', 'ticket')->get('tag');

        return $tags;
    }


    public function setTagToTicket($ticketId, $tagName)
    {
        if (Capsule::table('ticketstags')->where('ticket_id', $ticketId)->exists()) {

            Capsule::table('ticketstags')
                ->where('ticket_id', $ticketId)
                ->update([
                    'tag' => $tagName
                ]);
        } else {
            Capsule::table('ticketstags')->insert([
                'ticket_id' => $ticketId,
                'tag' => $tagName
            ]);

        }
    }

    public function getTicketsDetails()
    {
        return Capsule::table('ticketstags')
            ->join('tbltickets', 'tbltickets.id', '=', 'ticketstags.ticket_id')
            ->join('tblclients', 'tbltickets.userid', '=', 'tblclients.id')
            ->join('tblticketdepartments', 'tbltickets.did', '=', 'tblticketdepartments.id')
            ->select('*', 'tbltickets.status')->orderBy('tbltickets.id')
            ->get();
    }

    public function getFilteredTickets($filterParameter)
    {
        return Capsule::table('ticketstags')->where('tag', $filterParameter)
            ->join('tbltickets', 'tbltickets.id', '=', 'ticketstags.ticket_id')
            ->join('tblclients', 'tbltickets.userid', '=', 'tblclients.id')
            ->join('tblticketdepartments', 'tbltickets.did', '=', 'tblticketdepartments.id')
            ->select('*', 'tbltickets.status')->orderBy('tbltickets.id')
            ->get();
    }

    public function exportToExel()
    {
        $temp = $this->getTicketsDetails();
//        (new FastExcel($temp))->export('file.xlsx');
        (new \Rap2hpoutre\FastExcel\FastExcel($temp))->export(__DIR__ . '/test.xlsx');
    }


}