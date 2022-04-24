<?php

use Illuminate\Database\Capsule\Manager as Capsule;

class ManagePricing
{

    private $productDetails;
//
    private $changePrice;

    public function __construct($productDetails, $changePrice)
    {
        $this->productDetails = $productDetails;
        $this->changePrice = $changePrice;

    }

    public function handle()
    {

        switch ($this->checkOperator()) {
            case '%' :
            case '-%':
                $this->changePriceByPercent();
                break;

            case '+':
            case '-':
                $this->changePriceByFixedNumber();
                break;
        }
    }

    private function checkOperator()
    {
        if (str_ends_with($this->changePrice, '%')) {
            if (str_starts_with($this->changePrice, '-')) {
                return '-%';
            } else {
                return '%';
            }
        }

        if ($this->changePrice < 0) {
            return '-';
        }
        if ($this->changePrice > 0) {
            return '+';
        }
    }

    private function changePriceByPercent()
    {

        list($changePrice) = explode('%', $this->changePrice);

        foreach ($this->productDetails as $item) {
            list($productID, $period) = explode('.', $item);

            $oldPrice = Capsule::table('tblpricing')
                ->where('type', 'product')
                ->where('relid', $productID)
                ->where('currency', 1)
                ->first($period)->$period;

            $newPrice = $oldPrice + (($oldPrice) * (($changePrice) / 100));


            Capsule::table('tblpricing')
                ->where('type', 'product')
                ->where('relid', $productID)
                ->where('currency', 1)
                ->update([
                    $period => $newPrice
                ]);
        }

    }


    private function changePriceByFixedNumber()
    {
        foreach ($this->productDetails as $item) {

            list($productID, $period) = explode('.', $item);

            $oldPrice = Capsule::table('tblpricing')
                ->where('type', 'product')
                ->where('relid', $productID)
                ->where('currency', 1)
                ->first($period)->$period;

            $newPrice = $oldPrice + $this->changePrice;

            Capsule::table('tblpricing')
                ->where('type', 'product')
                ->where('relid', $productID)
                ->where('currency', 1)
                ->update([
                    $period => $newPrice
                ]);
        }
    }


}