<?php namespace SakibRahaman\DecimalToWords;

class DecimalToWords
{
    public static function convert($number, $currency_whole = '', $currency_decimal = '',
                             $case = null, $decimal_denominator='Point', $ending_denominator = null) {
        return (new Basic())->convert($number,$currency_whole,
                                $currency_decimal,$case,$decimal_denominator, $ending_denominator);
    }
}