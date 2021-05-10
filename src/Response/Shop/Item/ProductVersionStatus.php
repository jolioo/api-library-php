<?php namespace JoliooAPI\Response\Shop\Item;

use JoliooAPI\AbstractClass;

/**
 * Class ProductVersionStatus
 * @package JoliooAPI\Response\Shop\Item
 * @property-read int $product_version_id
 * @property-read \DateTime $product_version_updated_at
 * @property-read boolean $product_version_enabled
 */
class ProductVersionStatus extends AbstractClass {
    /**
     * @param string $val
     * @return \DateTime|null
     */
    protected function format_product_version_updated_at_attribute($val) {
        if ($val) {
            return \DateTime::createFromFormat(\DateTime::W3C, $val);
        }
        return null;
    }
}