<?php

use PHPUnit\Framework\TestCase;

require(dirname(__FILE__) . '/../CurrencyConverter.php');

class CurrencyConverterTest extends TestCase {
  protected static $currencyConverter;

  protected function setUp() {
    self::$currencyConverter = CurrencyConverter::init();
  }

  public function testCurrencyFormat() {
    $this->assertEquals(self::$currencyConverter->formatCurrency(10), '$10.00');
  }
}
