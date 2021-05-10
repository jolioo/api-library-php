<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class ProductPrice
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $product_version_price_id
 * @property-read float $product_version_price
 * @property-read float $product_version_price_min
 * @property-read float $product_version_price_max
 * @property-read string $product_version_price_type
 * @property-read float[]|null $product_version_price_values_items
 * @property-read string|null $product_version_price_unit
 * @property-read float $product_version_price_netto
 * @property-read float $product_version_price_tax_sum
 * @property-read ProductPriceTax[] $product_version_price_taxes
 * @property-read int $currency_id
 * @property-read int|null $discount_id
 */
class ProductPrice extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return ProductPriceTax[]
     */
    protected function format_product_version_price_taxes_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductPriceTax($item);
            },
            $arr
        );
    }
}