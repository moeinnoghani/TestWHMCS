<?php

use Illuminate\Database\Capsule\Manager as Capsule;


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
            ->select('*','tbltickets.status')
            ->get();
    }


}