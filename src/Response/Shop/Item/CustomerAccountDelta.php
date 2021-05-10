<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class CustomerAccountDelta
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $customer_account_delta_id
 * @property-read float $customer_account_delta_value
 * @property-read Currency $currency
 */
class CustomerAccountDelta extends AbstractClass {
    /**
     * @param \stdClass $val
     * @return Currency
     */
    protected function format_currency_attribute($val) {
        return new Currency($val);
    }
}