<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class ProductsStatus
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $offset
 * @property-read int $limit
 * @property-read int $count
 * @property-read int $countAll
 * @property-read ProductStatus[] $items
 */
class ProductsStatus extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return ProductStatus[]
     */
    protected function format_items_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductStatus($item);
            },
            $arr
        );
    }
}