<?php

//include __DIR__ . DIRECTORY_SEPARATOR . "../Models/ClientModel.php";
//include __DIR__ . DIRECTORY_SEPARATOR . "../configs/VerifyCodeConfiguration.php";
//include __DIR__.DIRECTORY_SEPARATOR."../Response/ResponseBuilder.php";

class VerifyCodeValidator
{
    private string $verifyCode;
    private string $phoneNumber;
    private ClientModel $clientModel;
    private ResponseBuilder $verifyCodeValidationResponse;


    public function __construct($phoneNumber, $verifyCode)
    {
        $this->phoneNumber = $phoneNumber;
        $this->verifyCode = $verifyCode;
        $this->clientModel = new ClientModel();
        $this->verifyCodeValidationResponse = new ResponseBuilder();
    }


    public function getValidationResponse(): array
    {
        $this->isVerifyCodeExpired();
        $this->isVerifyTriesTimeMax();

        if (count($this->verifyCodeValidationResponse->getResponseDescriptionArray()) > 0) {
            $this->verifyCodeValidationResponse->setResponseStatus('failed');
            return $this->verifyCodeValidationResponse->getResponse();
        }

        if ($this->isVerifyCodeExists()) {
            $this->verifyCodeValidationResponse->setResponseStatus('success');
            $this->verifyCodeValidationResponse->addResponseDescription('your registration is done. you can login by go to LoginPage');
            return $this->verifyCodeValidationResponse->getResponse();
        } else {
            $this->verifyCodeValidationResponse->setResponseStatus('failed');
            return $this->verifyCodeValidationResponse->getResponse();
        }


    }

    private function isVerifyCodeExists(): bool
    {
        $clientVerifyCode = $this->clientModel->getClientVerifyCode($this->phoneNumber);

        if ($this->verifyCode == $clientVerifyCode) {
            return true;
        } else {
            $this->verifyCodeValidationResponse->addResponseDescription('the entered verify code is incorrect');
            return false;
        }
    }

    public function isVerifyCodeExpired(): bool
    {
        $verifyCodeExpirationTime = $this->clientModel->getClientVerifyCodeExpirationTime($this->phoneNumber);
        $expired_at = \Carbon\Carbon::parse($verifyCodeExpirationTime);
        $now = \Carbon\Carbon::now('Asia/Tehran');

        if ($expired_at->lt($now)) {
            $this->verifyCodeValidationResponse->addResponseDescription('your verify code is expired. please submit again');
            return true;
        } else {
            return false;
        }

    }

    private function isVerifyTriesTimeMax(): bool
    {
        $clientVerifyTriesTime = $this->clientModel->getClientVerifyTriesTime($this->phoneNumber);

        if ($clientVerifyTriesTime >= VerifyCodeConfiguration::getVerifyCodeTriesTime()) {
            $this->verifyCodeValidationResponse->addResponseDescription('you tried too many times to enter verify code. please submit again');
            return true;

        } else {
            return false;
        }
    }

}