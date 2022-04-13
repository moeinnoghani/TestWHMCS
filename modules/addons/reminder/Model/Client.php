<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class Client
{
    private $table_name = 'tblclients';
    private $clientId;

    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    public function getClientById()
    {
        return Capsule::table($this->table_name)
            ->where('id', $this->clientId)
            ->first();
    }

    public function getClientPasswordExpiration()
    {
        return Capsule::table($this->table_name)
            ->where('id', $this->clientId)
            ->first('pwresetexpiry');
    }
}