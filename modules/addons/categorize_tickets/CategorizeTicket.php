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

    public function getTicketsDetails()
    {
        $temp = Capsule::table('tbltickets')
            ->join('tbltags', 'tbltickets.id', '=', 'ticketstags.ticket_id')
            ->join('tblclients', 'tbltickets.userid', '=', 'tblclients.id')
            ->select('ticketstags.', 'tbltickets.', 'tblclients.*')->get();


        return $temp;
    }

}