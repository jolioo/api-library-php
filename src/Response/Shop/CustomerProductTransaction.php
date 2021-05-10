<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\CustomerProductDelta;
use JoliooAPI\ResponseAbstract;

/**
 * Class CustomerProductTransaction
 * @package JoliooAPI\Response\Shop
 * @property-read bool $success
 * @property-read CustomerProductDelta|null $delta
 */
class CustomerProductTransaction extends ResponseAbstract {
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