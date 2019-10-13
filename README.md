[![CircleCI](https://circleci.com/gh/sakibrahmanchy/decimal-to-words.svg?style=svg)](https://circleci.com/gh/sakibrahmanchy/decimal-to-words)

# decimal-to-words
A simple decimal to word converter (Decimal numbers, currency etc.)

## Usage
```
use SakibRahaman\DecimalToWords\DecimalToWords;

$converted_number = DecimalToWords::convert(0);
var_dump($converted_number);
// Zero

$converted_number = DecimalToWords::convert(123.529);
var_dump($converted_number);
// One Hundred Twenty Three  Point Fifty Three

$converted_number = DecimalToWords::convert(42123.529,'dollar',
    'cents',null,'and','only');
var_dump($converted_number);
// Forty Two Thousand One Hundred Twenty Three dollar and Fifty Three cents only

$converted_number = DecimalToWords::convert(42123.529,'dollar',
    'cents','upper','and','only');
var_dump($converted_number);
// FORTY TWO THOUSAND ONE HUNDRED TWENTY THREE DOLLAR AND FIFTY THREE CENTS ONLY
```
