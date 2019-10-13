![CircleCI](https://img.shields.io/circleci/build/github/sakibrahmanchy/decimal-to-words)
![GitHub](https://img.shields.io/github/v/release/sakibrahmanchy/decimal-to-words)

# decimal-to-words
A simple decimal to word converter (Decimal numbers, currency etc.)

## Installation
````
composer require sakibrahamanchy/decimal-to-words
````

## Configurations
### Methods
   ```
   convert($number, $currency_whole = '', $currency_decimal = '', $case = null)
   ```
   
   <b>$number</b> - Input number, can be either decimal or ineger, REQUIRED  
   <b>$currency_whole</b> - Currency Denominator for whole number, Optional, e.g: dollar, taka, rupee etc  
   <b>$currency_decimal</b> - Currency Denominator for decimal number, Optional, e.g: cents, paisa etc  
   <b>$case</b> - Case of the output sring, Optional, Can be either 'upper', 'lower' or null  
   
## Usage
```
use SakibRahaman\DecimalToWords\DecimalToWords;

$converted_number = DecimalToWords::convert(0);
var_dump($converted_number);
// Zero

// Basic
$converted_number = DecimalToWords::convert(123.529);
var_dump($converted_number);
// One Hundred Twenty Three Point Fifty Three

// With currency ( 'currency_whole' & 'currency_decimal')
$converted_number = DecimalToWords::convert(42123.529,'dollar',
    'cents');
var_dump($converted_number);
// Forty Two Thousand One Hundred Twenty Three dollar and Fifty Three cents

// With case ('lower' & 'upper')
$converted_number = DecimalToWords::convert(42123.529,'dollar',
    'cents','upper');
var_dump($converted_number);
// FORTY TWO THOUSAND ONE HUNDRED TWENTY THREE DOLLAR AND FIFTY THREE CENTS
```
