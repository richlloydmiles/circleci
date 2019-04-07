<?php

namespace circlePlugin\CurrencyConverter;

use Fadion\Fixerio\Exchange;
use Fadion\Fixerio\Currency;
use Dotenv\Dotenv;

class CurrencyConverter
{
    private static $instance;
    private static $exchange;
    private static $currencies;
    private static $apiKey;

    public static function init()
    {
        if (!isset(self::$instance)) {
            self::$instance = new CurrencyConverter();
            self::$exchange = new Exchange();

            $dotenv = Dotenv::create(__DIR__);
            if (file_exists('.env')) {
                $dotenv->load();
            }
            
            self::$apiKey = getenv('FIXER_API_KEY');
            self::$currencies = [
            'USD' => Currency::USD,
            'EUR' => Currency::EUR,
            'GBP' => Currency::GBP
            ];
        }

        return self::$instance;
    }

    public function formatCurrency($amount)
    {
        return '$' . number_format($amount, 2);
    }

    public function convertCurrency($from, $to)
    {
        self::$exchange->key(self::$apiKey);
        self:: $exchange->base(self::$currencies[strtoupper($from)]);
        self::$exchange->symbols(self::$currencies[strtoupper($to)]);

        return self::$exchange->get();
    }
}
