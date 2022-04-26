<?php

class OrderManager
{

    public function addCustomOrder()
    {

        $postParams = [
            'clientid' => '',
            'pid' => '',
            'hostname' => '',
            'priceoverride' => '',
            'paymentmethod' => '',
        ];


        $results = localAPI('AddOrder', $postParams);
        echo $results;

    }

}