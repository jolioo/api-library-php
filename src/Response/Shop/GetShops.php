<?php namespace JoliooAPI\Response\Shop;

use JoliooAPI\Response\Shop\Item\Shop;
use JoliooAPI\ResponseAbstract;

/**
 * Class GetShops
 * @package JoliooAPI\Response\Shop
 * @property-read Shop[] $shops
 */
class GetShops extends ResponseAbstract {
    /**
     * @return Shop[]
     */
    protected function format_shops_attribute(array $shops) {
        return array_map(
            function(\stdClass $item) {
                return new Shop($item);
            },
            $shops
        );
    }
}