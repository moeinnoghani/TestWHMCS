<?php

class EmailApi
{

    private $emailAddress;
    private $validationCode;
    private $clientId;
    private $emailTemplate;

    public function __construct($emailAddress, $validationCode, $clientId, $emailTemplate)
    {
        $this->validationCode = $validationCode;
        $this->emailAddress = $emailAddress;
        $this->clientId = $clientId;
        $this->emailTemplate = $emailTemplate;
    }

    public function send()
    {
        $postParams = [
            'messagename' => $this->emailTemplate,
            'id' => $this->clientId,
            'customsubject' => 'test subject',
            'custommessage' => '.',
            'customtype' => 'general',
            'customvars' => base64_encode(serialize(array('code' => $this->validationCode))),
        ];

        $results = localAPI('SendEmail', $postParams);
        return $results;

    }
}