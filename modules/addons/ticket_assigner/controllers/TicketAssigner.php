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

    public function handle($ticketID)
    {
        $adminWithMinimumTickets = $this->getSupporterWithMinimumTickets();
        $this->assignTicketToSupporter($ticketID, $adminWithMinimumTickets);

    }

    public function getSupporterWithMinimumTickets()
    {
        $allSupporters = $this->getAllSupporters();
        $tickets = localAPI('GetTickets', []);

        $supportersWithTicketNumbers = $allSupporters->mapWithKeys(function ($supporter) use ($tickets) {
            $supporterTickets = 0;
            collect($tickets['tickets']['ticket'])->each(function ($ticket) use ($supporter, &$supporterTickets) {
                if ($supporter['id'] === $ticket['flag']) {
                    $supporterTickets++;
                }
            });
            return [$supporter['id'] => $supporterTickets];
        })->sort()->toArray();


        return key($supportersWithTicketNumbers);
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

        return collect($allAdmins)->mapWithKeys(function ($supporter) use ($tickets) {
            $supporterTickets = 0;
            collect($tickets)->each(function ($ticket) use ($supporter, &$supporterTickets) {
                if ($supporter['id'] === $ticket['flag']) {
                    $supporterTickets++;
                }
            });

            return [
                'id' => $supporter['id'],
                'name' => $supporter['firstname'] . $supporter['lastname'],
                'departments' => $supporter['supportDepartmentIds'],
                'numberOfTickets' => $supporterTickets

            ];
        });
    }

}