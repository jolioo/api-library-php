<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class ProductStatus
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $product_id
 * @property-read string|null $product_external_id
 * @property-read ProductVersionStatus[] $product_versions
 * @property-read \DateTime $product_updated_at
 * @property-read boolean $product_enabled
 */
class ProductStatus extends AbstractClass {
    /**
     * @param \stdClass[] $arr
     * @return ProductVersionStatus[]
     */
    protected function format_product_versions_attribute(array $arr) {
        return array_map(
            function(\stdClass $item) {
                return new ProductVersionStatus($item);
            },
            $arr
        );
    }

    /**
     * @param string $val
     * @return \DateTime|null
     */
    protected function format_product_updated_at_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }
}