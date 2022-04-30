<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class TicketAssigner
{

    private const supportingDeptNo = 2;

    public function __construct()
    {
    }

    public function getTicketsOfSupporter($supporterID)
    {
        return Capsule::table('tbltickets')->where('flag', $supporterID)->get();
    }

    public function assign($assignBy, $ticketID)
    {
        $supporterWithMinimumTicket = $this->getSupporterWithMinimumTickets($assignBy);
        $this->assignTicketToSupporter($ticketID, $supporterWithMinimumTicket['id']);;
    }

    public function getSupporterWithMinimumTickets($supporterStatus)
    {
        $supportersWithTickets = $this->getSupportersWithTickets();

        if ($supporterStatus == 'offline') {
            return collect($supportersWithTickets)->sortBy('numberOfTickets')->first();

        } else if ($supporterStatus == 'online') {
            $supportersWithTickets = $this->getSupportersWithTickets();
            $onlineSupporters = localAPI('GetStaffOnline')['staffonline']['staff'];

            $supportersSortedByNumberOfTickets = collect($supportersWithTickets)->sortBy('numberOfTickets');

            foreach ($supportersSortedByNumberOfTickets as $supporter) {
                if (collect($onlineSupporters)->contains('adminusername', $supporter['username'])) {
                    return $supporter;
                }
            }
        }
    }


    public function getAllSupporters($deptID = null)
    {

        $response = localAPI('GetAdminUsers', []);
        $allAdmins = $response['admin_users'];

        return collect($allAdmins)->filter(function ($admin) {
            $is_supporter = 0;
            collect($admin['supportDepartmentIds'])->each(function ($depts) use (&$is_supporter) {

                if ($depts == $this::supportingDeptNo) {
                    $is_supporter = 1;
                }

            });
            if ($is_supporter == 1) {
                return $admin;
            }
        });
    }

    public function assignTicketToSupporter($ticketID, $supporterID)
    {

        $updateTicketParams = [
            'ticketid' => $ticketID,
            'flag' => $supporterID
        ];

        $respone = localAPI('UpdateTicket', $updateTicketParams);

    }

    public function getSupportersWithTickets()
    {

        $response = localAPI('GetAdminUsers', []);
        $allAdmins = $response['admin_users'];
        $tickets = localAPI('GetTickets', [])['tickets']['ticket'];

        return collect($allAdmins)->map(function ($supporter) use ($tickets) {
            $supporterTickets = 0;

            collect($tickets)->each(function ($ticket) use ($supporter, &$supporterTickets) {
                if ($supporter['id'] === $ticket['flag']) {
                    $supporterTickets++;
                }
            });

            return [
                'id' => $supporter['id'],
                'name' => $supporter['firstname'] . " " . $supporter['lastname'],
                'departments' => $supporter['supportDepartmentIds'],
                'username' => $supporter['username'],
                'numberOfTickets' => $supporterTickets
            ];
        })->sortBy('id');
    }


}