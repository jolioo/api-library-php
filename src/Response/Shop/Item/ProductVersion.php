<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class ProductVersion
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $product_version_id
 * @property-read ProductPrice[] $prices
 * @property-read PropertyValue[] $properties
 * @property-read float $product_version_stock_current
 */
class ProductVersion extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return ProductPrice[]
     */
    protected function format_prices_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductPrice($item);
            },
            $arr
        );
    }

    /**
     * @param \stdClass[] $arr
     * @return PropertyValue[]
     */
    protected function format_properties_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new PropertyValue($item);
            },
            $arr
        );
    }
}