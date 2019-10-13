<?php namespace SakibRahaman\DecimalToWords;

class DecimalToWords
{
    public static function convert($number, $currency_whole = '', $currency_decimal = '',
                             $case = null) {
        return (new Basic())->convert($number,$currency_whole,
                                $currency_decimal,$case);
    }
}