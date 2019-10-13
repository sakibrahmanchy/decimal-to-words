<?php
require_once __DIR__ . './../vendor/autoload.php';

use SakibRahaman\DecimalToWords\DecimalToWords;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase {

    public function testNoNumbers()
    {
        $converted_number = DecimalToWords::convert(123.5292123);
        $this->assertRegExp("/[^0-9.]/",$converted_number, "Not a number");
    }
    
    public function testZero()
    {
        $converted_number = DecimalToWords::convert(0);
        $this->assertEquals($converted_number, 'Zero');
    }

    public function testDecimal()
    {
        $converted_number = DecimalToWords::convert(123.529);
        $this->assertContains('Point', $converted_number);

        $converted_number = DecimalToWords::convert(123.529,'dollar','cents');
        $this->assertNotContains('Point', $converted_number);
    }

    public function testCurrency()
    {
        $currency_whole = 'dollar';
        $currency_decimal = 'cents';

        $converted_number = DecimalToWords::convert(42123,$currency_whole,$currency_decimal);
        $this->assertContains($currency_whole,$converted_number);
        $this->assertNotContains($currency_decimal,$converted_number);

        $converted_number = DecimalToWords::convert(1.23,$currency_whole,$currency_decimal);
        $this->assertContains($currency_whole,$converted_number);
        $this->assertContains($currency_decimal,$converted_number);
    }

    public function testStrCase()
    {
        $converted_number = DecimalToWords::convert(42123,'','','lower');
        $this->assertTrue($converted_number === strtolower($converted_number),"Output is not lower case");

        $converted_number = DecimalToWords::convert(42123.235,'','','upper');
        $this->assertTrue($converted_number === strtoupper($converted_number), "Output is not upper case");
    }
}