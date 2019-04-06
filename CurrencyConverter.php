<?php

Class CurrencyConverter {
  private static $instance;

  public static function init() {
    if (!isset(self::$instance)) {
      self::$instance = new CurrencyConverter();
    }

    return self::$instance;
  }

  public function formatCurrency($amount) {
    return '$' . number_format($amount, 2);
  }
}
