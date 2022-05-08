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