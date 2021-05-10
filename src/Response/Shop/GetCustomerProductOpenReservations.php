<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\CustomerProductDelta;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductOpenReservations
 * @package JoliooAPI\Response\Shop
 * @property-read CustomerProductDelta[] $deltas
 */
class GetCustomerProductOpenReservations extends ResponseAbstract {
    /**
     * @param string $val
     * @return CustomerProductDelta[]
     */
    protected function format_deltas_attribute($val) {
        return array_map(
            function(\stdClass $v) {
                return new CustomerProductDelta($v);
            },
            $val
        );
    }
}