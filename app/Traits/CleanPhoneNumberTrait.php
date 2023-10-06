<?php

namespace App\Traits;

trait CleanPhoneNumberTrait
{
    /**
     * @param $phoneNumber
     * @return array|string|string[]|null
     */
    public static function cleanPhoneNumber($phoneNumber)
    {
        return preg_replace('/[^0-9]/', '', $phoneNumber);
    }
}
