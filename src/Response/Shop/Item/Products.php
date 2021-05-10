<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class Products
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $offset
 * @property-read int $limit
 * @property-read int $count
 * @property-read int $countAll
 * @property-read Product[] $items
 */
class Products extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return Product[]
     */
    protected function format_items_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new Product($item);
            },
            $arr
        );
    }
}