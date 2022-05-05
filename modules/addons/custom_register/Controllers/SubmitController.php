<?php

include __DIR__ . DIRECTORY_SEPARATOR . "../Models/ClientModel.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../Validators/Validator.php";
include __DIR__ . DIRECTORY_SEPARATOR . "../APIs/SmsApi.php";

class SubmitController
{
    private array $registrationData;
    private ClientModel $clientModel;

    public function __construct($registrationData)
    {
        $this->clientModel = new ClientModel();
        $this->registrationData = $registrationData;
    }

    public function submit()
    {
        if ($this->getResponse()['status'] === 'success') {
            $this->clientModel->insertClientRegistrationData($this->registrationData);
            $verifyCode = $this->generateVerifyCode(VerifyCodeConfiguration::getVerifyCodeDigits());
            $this->sendVerifyCodeUsingSMS($verifyCode);
        }
    }

    private function generateVerifyCode($numberOfDigits)
    {
        $verify_code = rand(pow(10, $numberOfDigits - 1), pow(10, $numberOfDigits) - 1);
        $this->clientModel->insertClientVerifyCode($this->registrationData['email'], $verify_code);
        return $verify_code;
    }

    private function sendVerifyCodeUsingSMS($verify_code)
    {
        SmsApi::sendSmsByCustomText("Hello " . $this->registrationData['firstname'] . " Your Verify Code is : " . $verify_code);
    }

    public function getResponse(): array
    {
        if ($this->checkClientExists()) {
            return ResponseBuilder::buildSingleResponse('failed', "account with this email already exists");

        } else {

            $validator = new Validator($this->registrationData);
            return $validator->getValidationResponse();

        }

    }

    private function checkClientExists(): bool
    {
        return $this->clientModel->isClientExists($this->registrationData['email'], $this->registrationData['phone_number']);
    }

}