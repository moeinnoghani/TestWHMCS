<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class TicketAssigner
{

    public function getTicketsOfSupporter($supporterID)
    {
        return Capsule::table('tbltickets')->where('flag', $supporterID)->count();
    }

}