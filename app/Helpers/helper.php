<?php

use Morilog\Jalali\Jalalian;

function jalaliDate($date, $format = '%A, %d %B %Y')
{
    return Jalalian::forge($date)->format($format);
}

function convertPersianToEnglish($number)
{
    $pNumber = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $eNumber = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $number = str_replace($pNumber, $eNumber, $number);
    return $number;
}

function convertEnglishToPersian($number)
{
    $pNumber = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    $eNumber = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
    $number = str_replace($eNumber, $pNumber, $number);
    return $number;
}

function priceFormat($price)
{
    $price = number_format($price, 0, '/', '،');
    $price = convertEnglishToPersian($price);
    return $price;
}

function validateNationalCode($nationalCode)
{
    $nationalCode = trim($nationalCode, ' .');
    $nationalCode = convertPersianToEnglish($nationalCode);
    $bannedArray = ['0000000000', '1111111111', '2222222222', '3333333333', '4444444444', '5555555555', '6666666666', '7777777777', '8888888888', '9999999999'];

    if (empty($nationalCode)) {
        return false;
    } else if (count(str_split($nationalCode)) != 10) {
        return false;
    } else if (in_array($nationalCode, $bannedArray)) {
        return false;
    } else {
        $sum = 0;

        for ($i = 0; $i < 9; $i++) {
            $sum += (int) $nationalCode[$i] * (10 - $i);
        }

        $divideRemaining = $sum % 11;

        if ($divideRemaining < 2) {
            $lastDigit = $divideRemaining;
        } else {
            $lastDigit = 11 - ($divideRemaining);
        }

        if ((int) $nationalCode[9] == $lastDigit) {
            return true;
        } else {
            return false;
        }
    }
}
