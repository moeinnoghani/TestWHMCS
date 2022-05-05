<?php

class NameValidator
{
    private string $firstname;
    private string $lastName;
    private ResponseBuilder $nameValidationResponse;
    private array $nameValidationResponseData = [];

    public function __construct($firstname, $lastName)
    {
        $this->firstname = $firstname;
        $this->lastName = $lastName;
        $this->nameValidationResponse = new ResponseBuilder();
    }

    public function validate()
    {
        $this->checkNameLength();
        $this->checkNameStartWithLetter();

        if (count($this->nameValidationResponseData) > 0) {
            $this->nameValidationResponse->setResponseStatus('notValid');
            return $this->nameValidationResponse->getResponse();

        } else {
            $this->nameValidationResponse->setResponseStatus('valid');
            return $this->nameValidationResponse->getResponse();

        }


    }

    private function checkNameLength()
    {
        if (strlen($this->firstname) == 0 || strlen($this->lastName) == 0) {
            $this->nameValidationResponse->addResponseDescription("your firstname and lastname cannot empty");
        }
    }

    private function checkNameStartWithLetter()
    {
        if (is_numeric($this->firstname[0]) || is_numeric($this->lastName[0])) {
            $this->nameValidationResponse->addResponseDescription("your firstname and lastname cannot start with number");
        }
    }
}