<?php

namespace App\Traits;


const VAT_PERCENTAGE = 20; // 20%
const VAT_AMOUNT = 1.20;

trait VatTrait
{
    public function calcAddVatToAmount(float $amount, int $vat_percentage = VAT_PERCENTAGE): float|int
    {
        return round($amount * (1 + $vat_percentage / 100), 2);

        //or simple
        /*
         * calculate 20% tax on x-amount
         * ((20 % 100) * x-amount) + x-amount
         * */

        // e.g Gross amount: 10.80
    }

    public function calcVatAddedValue(float $amount, int $vat_percentage = VAT_PERCENTAGE): float
    {
        $amount_including_vat = $this->calcAddVatToAmount($amount, $vat_percentage);

        return round($amount_including_vat - $amount, 2);

        // e.g VAT added: 1.80
    }

    public function calcExcludeVatFromAmount(float $amount, int $vat_percentage = VAT_PERCENTAGE): float|int
    {
        return round($amount - $amount / (1 + $vat_percentage / 100), 2);

        // e.g Net amount: 7.50
    }

    public function calcVatExcludedValue(float $amount, int $vat_percentage = VAT_PERCENTAGE): float|int
    {
        return round($amount - $amount / (1 + $vat_percentage / 100), 2);

        // e.g VAT excluded: 1.50
    }
}
