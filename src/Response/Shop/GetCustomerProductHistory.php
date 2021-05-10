<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\CustomerProductHistory;
use JoliooAPI\Response\Shop\Item\Products;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetCustomerProductHistory
 * @package JoliooAPI\Response\Shop
 * @property-read CustomerProductHistory[] $history
 */
class GetCustomerProductHistory extends ResponseAbstract {
    /**
     * @param string $val
     * @return CustomerProductHistory[]
     */
    protected function format_history_attribute($val) {
        return array_map(
            function(\stdClass $v) {
                return new CustomerProductHistory($v);
            },
            $val
        );
    }
}