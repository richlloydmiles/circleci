<?php

use PHPUnit\Framework\TestCase;
use circlePlugin\CurrencyConverter as SUT;

require(dirname(__FILE__) . '/../CurrencyConverter.php');

class CurrencyConverterTest extends TestCase {
  protected static $currencyConverter;

  protected function setUp() {
    self::$currencyConverter = SUT\CurrencyConverter::init();
  }

  public function testCurrencyFormat() {
    $this->assertEquals(self::$currencyConverter->formatCurrency(10), '$10.00');
  }

  public function testCurrencyConverter() {
    $this->assertEquals(count(self::$currencyConverter->convertCurrency('EUR', 'USD')), 1);
  }
}
