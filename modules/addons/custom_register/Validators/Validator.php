<?php

include __DIR__ . DIRECTORY_SEPARATOR . "../Validators/MailValidator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../Validators/NameValidator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../Validators/PasswordValidator.php";

class Validator
{


    private array $validationParams;
    private ResponseBuilder $validationResponse;

    public function __construct($validationParams)
    {
        $this->validationParams = $validationParams;
        $this->validationResponse = new ResponseBuilder();
    }

    public function validate()
    {
    }

    public function getValidationResponse(): array
    {

        $passwordValidator = new PasswordValidator($this->validationParams['password'], $this->validationParams['confirm_password']);
        $passwordValidationResponse = $passwordValidator->validate();

        $nameValidator = new NameValidator($this->validationParams['firstname'], $this->validationParams['lastname']);
        $nameValidationResponse = $nameValidator->validate();

        $mailValidator = new MailValidator($this->validationParams['email']);
        $mailValidationResponse = $mailValidator->validate();


        if ($passwordValidationResponse['status'] == 'notValid'
            || $nameValidationResponse['status'] == 'notValid'
            || $mailValidationResponse['status'] == 'notValid') {

            $this->validationResponse->setResponseStatus('failed');

            foreach ($passwordValidationResponse['description'] as $description) {
                $this->validationResponse->addResponseDescription($description);
            }
            foreach ($nameValidationResponse['description'] as $description) {
                $this->validationResponse->addResponseDescription($description);
            }
            foreach ($mailValidationResponse['description'] as $description) {
                $this->validationResponse->addResponseDescription($description);
            }

            return $this->validationResponse->getResponse();
        } else {
            $this->validationResponse->setResponseStatus('success');
            $this->validationResponse->addResponseDescription("you submitted. now check your phone  and enter verify code");
            return $this->validationResponse->getResponse();

        }

    }

}