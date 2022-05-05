<?php

include __DIR__ . DIRECTORY_SEPARATOR . "../Response/ResponseBuilder.php";

class PasswordValidator
{

    private string $password;
    private string $confirmPassword;
    private ResponseBuilder $passwordValidationResponse;


    public function __construct($password, $confirmPassword)
    {
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
        $this->passwordValidationResponse = new ResponseBuilder();
    }

    public function validate()
    {
        if ($this->checkPasswordAndConfirmPasswordEquality()) {

            $this->checkPasswordLength();
            $this->checkPasswordContainsUppercase();

            if (count($this->passwordValidationResponse->getResponseDescriptionArray()) > 0) {
                $this->passwordValidationResponse->setResponseStatus('notValid');
                return $this->passwordValidationResponse->getResponse();

            } else {
                $this->passwordValidationResponse->setResponseStatus('valid');
                return $this->passwordValidationResponse->getResponse();
            }

        } else {
            $this->passwordValidationResponse->setResponseStatus('notValid');
            $this->passwordValidationResponse->addResponseDescription("your confirm password must be equal to password");
            return $this->passwordValidationResponse->getResponse();
        }
    }

    private function checkPasswordLength()
    {
        if (strlen($this->password) < 8) {
            $this->passwordValidationResponse->addResponseDescription("your password must be greater than 8");
        }
    }

    private function checkPasswordAndConfirmPasswordEquality(): bool
    {
        if (strcmp($this->password, $this->confirmPassword) !== 0) {
            return false;
        } else {
            return true;
        }
    }

    private function checkPasswordContainsUppercase()
    {
        if (!preg_match('/[A-Z]/', $this->password)) {
            $this->passwordValidationResponse->addResponseDescription("your password must be have at least one Uppercase character");
        }
    }

}

