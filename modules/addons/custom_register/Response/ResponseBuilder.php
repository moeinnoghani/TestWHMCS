<?php

class ResponseBuilder
{

    private string $status;
    private string $description;
    private array $descriptionArray;

    public function __construct()
    {
        $this->descriptionArray = array();
    }

    public static function buildSingleResponse($status, $description)
    {
        return [
            'status' => $status,
            'description' => $description
        ];
    }

    public function addResponseDescription($description)
    {
        array_push($this->descriptionArray, $description);
    }

    public function setResponseStatus($status)
    {
        $this->status = $status;
    }

    public function getResponse()
    {
        return [
            'status' => $this->status,
            'description' => $this->descriptionArray
        ];
    }

    public function getResponseDescriptionArray(): array
    {
        return $this->descriptionArray;
    }

}