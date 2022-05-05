<?php

include __DIR__ . DIRECTORY_SEPARATOR . "../Validators/VerifyCodeValidator.php";

use Illuminate\Database\Capsule\Manager as Capsule;

class VerifyController
{
    private array $verificationData;
    private ClientModel $clientModel;

    public function __construct($verificationData)
    {
        $this->clientModel = new ClientModel();
        $this->verificationData = $verificationData;

    }

    public function verify()
    {

        if (!$this->isClientSubmitted()) {
            return false;
        }

        if ($this->getResponse()['status'] == 'success') {
            $this->clientVerified();
        } else {
            $this->clientCantVerify();
        }

    }

    public function getResponse(): array
    {
        if ($this->isClientSubmitted() == false) {
            return [
                'status' => 'failed',
                'description' => 'your phone number is invalid'
            ];
        }

        $verifyCodeValidator = new VerifyCodeValidator($this->verificationData['phone_number'],
            $this->verificationData['verify_code']);

        return $verifyCodeValidator->getValidationResponse();
    }

    private function clientCantVerify()
    {
        $this->clientModel->increaseClientVerifyTriesTime($this->verificationData['phone_number']);
    }

    private function isClientSubmitted(): bool
    {
        return $this->clientModel->isClientSubmittedByPhoneNumber($this->verificationData['phone_number']);
    }

    private function clientVerified()
    {
        $this->clientModel->addNewClient($this->verificationData['phone_number']);
    }


}