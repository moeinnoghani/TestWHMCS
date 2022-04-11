<?php

class EmailApi
{

    private $emailAddress;
    private $validationCode;
    private $clientId;

    public function __construct($emailAddress, $validationCode, $clientId)
    {
        $this->validationCode = $validationCode;
        $this->emailAddress = $emailAddress;
        $this->clientId = $clientId;
    }

    public function send()
    {
        $postParams = [
            'messagename' => 'iranserver campaign email',
            'id' => $this->clientId,
            'customsubject' => 'test subject',
            'custommessage' => '.',
            'customtype' => 'general',
            'customvars' => base64_encode(serialize(array('code' => $this->validationCode))),
        ];

        $results = localAPI('SendEmail', $postParams);
        print json_encode($results);
        die();

    }
}