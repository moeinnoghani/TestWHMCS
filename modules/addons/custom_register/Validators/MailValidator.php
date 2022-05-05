<?php

class MailValidator
{
    private string $email;
    private ResponseBuilder $mailValidationResponse;
    private array $mailValidationResponseData = [];

    public function __construct($email)
    {
        $this->email = $email;
        $this->mailValidationResponse = new ResponseBuilder();
    }

    public function validate(): array
    {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $this->mailValidationResponse->addResponseDescription('your email must be enter in correct format');
        }

        if (count($this->mailValidationResponse->getResponseDescriptionArray()) > 0) {
            $this->mailValidationResponse->setResponseStatus('notValid');
            return $this->mailValidationResponse->getResponse();

        } else {
            $this->mailValidationResponse->setResponseStatus('valid');
            return $this->mailValidationResponse->getResponse();

        }
    }
}