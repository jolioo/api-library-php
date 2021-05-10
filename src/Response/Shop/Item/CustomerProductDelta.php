<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class CustomerProductDelta
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $customer_product_delta_id
 * @property-read float $customer_product_delta_value
 * @property-read string $customer_product_delta_state
 * @property-read \DateTime $customer_product_delta_time
 * @property-read \DateTime|null $customer_product_delta_timeout_after
 * @property-read string|null $customer_product_delta_timeout_state
 * @property-read CustomerProductDelta|null $customer_product_delta_timeout_result
 */
class CustomerProductDelta extends AbstractClass {
    const STATE_SUBSTRACT = 'substract';
    const STATE_ADDED = 'added';
    const STATE_RESERVED = 'reserved';
    const STATE_REVERVED_ACCEPT = 'reserved-accept';
    const STATE_REVERVED_DECLINE = 'reserved-decline';

    /**
     * @param string $val
     * @return \DateTime
     */
    protected function format_customer_product_delta_time_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }

    /**
     * @param string $val
     * @return \DateTime
     */
    protected function format_customer_product_delta_timeout_after_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }

    /**
     * @param \stdClass|null $val
     * @return CustomerProductDelta|null
     */
    protected function format_customer_product_delta_timeout_result_attribute(\stdClass $val = null) {
        if ($val) {
            return new CustomerProductDelta($val);
        }
        return null;
    }
}