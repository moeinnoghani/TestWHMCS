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

    public function getId()
    {
        return Capsule::table($this->table_name)
            ->where('id', $this->clientId)
            ->first()->id;
    }

    public function getClientPasswordExpiration()
    {
        return Capsule::table($this->table_name)
            ->where('id', $this->clientId)
            ->first('pwresetexpiry');
    }
}