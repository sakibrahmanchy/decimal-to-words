<?php
require_once __DIR__ . './../vendor/autoload.php';

use SakibRahaman\DecimalToWords\DecimalToWords;
use PHPUnit\Framework\TestCase;

$converted_number = DecimalToWords::convert(0);
var_dump($converted_number);

$converted_number = DecimalToWords::convert(123.529);
var_dump($converted_number);
//class BasicTest extends TestCase  {
//    public function decimalCheck()
//    {
//        $basic = new BasicTest;
//        $converted = $basic->convert(992222135.299123,'Taka',
//            'Poisha',null, 'Only');
//        $converted->assertEquals('inety Nine Crore Twenty Two Lakh Twenty Two Thousand One Hundred Thirty Five Taka And Thirty  Poisha Only');
//    }
//}
