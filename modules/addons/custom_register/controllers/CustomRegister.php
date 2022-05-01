<?php

class CustomRegister
{

    private $registrationData;

    public function __construct($registrationData)
    {
        $this->registrationData = $registrationData;
    }

    public function register()
    {
        print json_encode($this->registrationData);
        die();
    }

}