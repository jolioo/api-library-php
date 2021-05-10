<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Currency;
use JoliooAPI\ResponseAbstract;

/**
 * Class CustomerAccount
 * @package JoliooAPI\Response\Shop
 * @property-read Currency $currency
 * @property-read float $customer_account_current_value
 */
class CustomerAccount extends ResponseAbstract {
    /**
     * @param \stdClass $obj
     * @return Currency
     */
    protected function format_currency_attribute($obj) {
        return new Currency($obj);
    }
}