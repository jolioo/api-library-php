<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class CustomerProducts
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $offset
 * @property-read int $limit
 * @property-read int $count
 * @property-read int $countAll
 * @property-read CustomerProduct[] $items
 */
class CustomerProducts extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return CustomerProduct[]
     */
    protected function format_items_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new CustomerProduct($item);
            },
            $arr
        );
    }
}